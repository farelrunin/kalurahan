(function ($) {
	'use strict';

	$(function () {
		var page = $('#rab-page');
		if (!page.length) {
			return;
		}

		var api = JSON.parse(page.attr('data-api'));
		var refs = JSON.parse(page.attr('data-references'));
		var subBidangLabels = JSON.parse(page.attr('data-sub-bidang-labels') || '{}');
		var incomeHierarchy = JSON.parse(page.attr('data-income-account-hierarchy') || '{}');
		var accountHierarchy = JSON.parse(page.attr('data-account-hierarchy') || '{}');
		var canEdit = page.data('can-edit') === 1;
		var canManagePayment = page.data('can-payment') === 1;
		var canDelete = page.data('can-delete') === 1;
		var initialPos = page.attr('data-initial-pos') || '';
		var initialMode = page.attr('data-initial-mode') || '';
		var globalYear = Number(page.attr('data-finance-year')) || new Date().getFullYear();
		var incomeInput = initialPos === '4.PENDAPATAN' && initialMode === 'input';
		var incomeView = initialPos === '4.PENDAPATAN' && initialMode === 'lihat';
		var incomeChange = initialPos === '4.PENDAPATAN' && initialMode === 'perubahan';
		var expenseInput = initialPos === '5.BELANJA' && initialMode === 'input';
		var expenseView = initialPos === '5.BELANJA' && initialMode === 'lihat';
		var expenseChange = initialPos === '5.BELANJA' && initialMode === 'perubahan';
		var financeInput = initialPos === '6.PEMBIAYAAN' && initialMode === 'input';
		var financeView = initialPos === '6.PEMBIAYAAN' && initialMode === 'lihat';
		var financeChange = initialPos === '6.PEMBIAYAAN' && initialMode === 'perubahan';
		var funds = (refs.sumber_dana || []).map(function (item) {
			return item.kode || item.nama;
		});
		var lastRows = [];

		function escapeHtml(value) {
			return $('<div>').text(value == null ? '' : String(value)).html();
		}

		function csrfData() {
			var name = page.attr('data-csrf-name');
			var value = name && $.cookie ? $.cookie(name) : '';
			if (!value) {
				value = page.attr('data-csrf-value') || '';
			}
			if (!value && typeof getCsrfToken === 'function') {
				value = getCsrfToken();
			}

			var data = {};
			if (name && value) {
				data[name] = value;
			}

			return data;
		}

		function refreshCsrf(response) {
			if (response && response.csrf_name && response.csrf_value) {
				page.attr('data-csrf-name', response.csrf_name);
				page.attr('data-csrf-value', response.csrf_value);
			}
			var data = csrfData();
			if (data[page.attr('data-csrf-name')]) {
				page.attr('data-csrf-value', data[page.attr('data-csrf-name')]);
			}
		}

		function notify(type, message) {
			if (typeof notification === 'function') {
				notification(type, message);
			} else {
				window.alert(message);
			}
		}

		function requestError(xhr, fallback) {
			if (xhr.responseJSON && xhr.responseJSON.message) {
				refreshCsrf(xhr.responseJSON);
				return xhr.responseJSON.message;
			}
			refreshCsrf();
			if (xhr.status === 403) {
				if ((xhr.responseText || '').indexOf('The action you have requested is not allowed.') !== -1) {
					return 'Token keamanan formulir kedaluwarsa atau tidak cocok. Muat ulang halaman, lalu simpan kembali.';
				}
				return 'Server menolak permintaan (HTTP 403). Admin seharusnya punya akses; muat ulang dan masuk kembali. Jika tetap gagal, periksa izin grup akun.';
			}
			if (xhr.status === 404) {
				return 'Alamat fitur tidak ditemukan. Muat ulang halaman dengan Ctrl+F5.';
			}
			if (xhr.status >= 500) {
				return 'Server gagal memproses permintaan (HTTP ' + xhr.status + '). Periksa log aplikasi lokal.';
			}
			if (xhr.status === 200 && xhr.responseText) {
				return 'Server mengirim halaman selain JSON, kemungkinan sesi atau token keamanan kedaluwarsa. Muat ulang halaman dan coba lagi.';
			}
			return fallback + (xhr.status ? ' (HTTP ' + xhr.status + ')' : '. Periksa koneksi lokal lalu coba lagi.');
		}

		function optionList(items, placeholder, formatCode) {
			var html = '<option value="">' + escapeHtml(placeholder) + '</option>';
			items.forEach(function (item) {
				var code = formatCode ? formatCode(item.kode) : item.kode;
				html += '<option value="' + escapeHtml(item.kode) + '">' +
					escapeHtml(code + ' ' + item.nama) + '</option>';
			});
			return html;
		}

		function subCode(activityCode) {
			var parts = String(activityCode || '').replace(/\.+$/, '').split('.');
			return parts.length >= 2 ? parts[0] + '.' + parts[1] : '';
		}

		function bidangNumber(code) {
			return String(code || '').slice(-2);
		}

		function filteredActivities(bidangCode, subBidangCode) {
			var number = bidangNumber(bidangCode);
			return refs.kegiatan.filter(function (item) {
				var activityParts = String(item.kode || '').replace(/\.+$/, '').split('.');
				return activityParts[0] === number &&
					(!subBidangCode || subCode(item.kode) === subBidangCode);
			});
		}

		function subBidangOptions(bidangCode, selectedCode, placeholder) {
			var keys = {};
			var names = Object.create(null);
			(refs.sub_bidang || []).forEach(function (item) {
				names[String(item.kode || '').replace(/\.+$/, '')] = item.nama || '';
			});
			filteredActivities(bidangCode, '').forEach(function (item) {
				var code = subCode(item.kode);
				if (code) {
					keys[code] = true;
				}
			});

			var codes = Object.keys(keys).sort();
			var html = '<option value="">' + escapeHtml(placeholder) + '</option>';
			codes.forEach(function (code) {
				var label = displayHierarchyCode(code, 'sub_bidang');
				var name = names[code] || '';
				html += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml(subBidangLabels[code] || label + (name ? ' ' + name : '')) + '</option>';
			});
			return { html: html, selected: selectedCode };
		}

		function populateActivities(prefix, selectedActivity) {
			var bidang = $('#' + prefix + '-bidang').val();
			var sub = $('#' + prefix + '-sub-bidang').val();
			var activities = filteredActivities(bidang, sub);
			var html = optionList(activities, 'Pilih kegiatan', function (code) {
				return displayHierarchyCode(code, 'kegiatan');
			});
			$('#' + prefix + '-kegiatan').html(html).prop('disabled', !bidang || !sub);
			if (selectedActivity) {
				$('#' + prefix + '-kegiatan').val(selectedActivity);
			}
			if (prefix === 'rab' && (expenseInput || expenseView)) {
				populateOutputs($('#rab-kegiatan').val());
			}
		}

		function populateSubBidang(prefix, selectedSub, selectedActivity) {
			var select = $('#' + prefix + '-sub-bidang');
			var options = subBidangOptions($('#' + prefix + '-bidang').val(), selectedSub, 'Pilih sub bidang');
			select.html(options.html).prop('disabled', !$('#' + prefix + '-bidang').val());
			if (selectedSub) {
				select.val(selectedSub);
			}
			populateActivities(prefix, selectedActivity);
		}

		function populateRekening(prefix) {
			var pos = $('#' + prefix + '-pos').val();
			var digit = String(pos || '').charAt(0);
			var accounts = refs.rekening.filter(function (item) {
				return String(item.kode).charAt(0) === digit;
			});
			$('#' + prefix + '-rekening').html(optionList(accounts, 'Pilih rekening'));
		}

		function accountParts(code) {
			return String(code || '').replace(/\.+$/, '').split('.');
		}

		function displayHierarchyCode(code, level) {
			var value = String(code || '').trim();
			var parts = accountParts(value);
			if (level === 'bidang' && parts.length === 3 && parts[0] === '00' && parts[1] === '0000') {
				parts = parts.slice(2);
			}
			if (!parts.length || parts.some(function (part) { return !/^\d+$/.test(part); })) {
				return value;
			}

			parts = parts.map(function (part) {
				return String(Number(part));
			});
			if (level === 'kegiatan' && parts.length === 3) {
				parts[2] = ('0' + parts[2]).slice(-2);
			}

			return parts.join('.') + (parts.length > 1 ? '.' : '');
		}

		function expenseAccountClasses() {
			var classes = {};
			(refs.rekening || []).forEach(function (item) {
				var parts = accountParts(item.kode);
				if (parts[0] === '5' && parts.length >= 2) {
					classes[parts[0] + '.' + parts[1]] = true;
				}
			});
			return Object.keys(classes).sort();
		}

		function populateExpenseClasses(selectedCode) {
			var labels = {
				'5.1': 'Belanja Pegawai',
				'5.2': 'Belanja Barang & Jasa',
				'5.3': 'Belanja Modal',
				'5.4': 'Belanja Tak Terduga'
			};
			var html = '<option value="">Pilih</option>';
			expenseAccountClasses().forEach(function (code) {
				html += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml((labels[code] || code) + ' (' + code + ')') + '</option>';
			});
			$('#rab-klasifikasi-belanja').html(html).val(selectedCode || '');
			populateExpenseObjects('');
		}

		function populateExpenseObjects(selectedCode) {
			var classification = $('#rab-klasifikasi-belanja').val();
			var objects = {};
			(refs.rekening || []).forEach(function (item) {
				var parts = accountParts(item.kode);
				if (parts.length >= 3 && parts[0] + '.' + parts[1] === classification) {
					var code = parts.slice(0, 3).join('.');
					objects[code] = objects[code] || item.nama;
				}
			});
			var html = '<option value="">Pilih</option>';
			Object.keys(objects).sort().forEach(function (code) {
				html += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml(code + ' ' + objects[code]) + '</option>';
			});
			$('#expense-obyek').html(html).val(selectedCode || '')
				.prop('disabled', !classification || !Object.keys(objects).length);
			populateExpenseDetails('');
		}

		function populateExpenseDetails(selectedCode) {
			var objectCode = $('#expense-obyek').val();
			var matches = (refs.rekening || []).filter(function (item) {
				var normalized = String(item.kode || '').replace(/\.+$/, '');
				return normalized === objectCode || normalized.indexOf(objectCode + '.') === 0;
			});
			$('#rab-rekening').html(optionList(matches, 'Pilih'))
				.val(selectedCode || '').prop('disabled', !objectCode || !matches.length);
		}

		function populateOutputs(activityCode, selectedOutput) {
			var activity = (refs.kegiatan || []).filter(function (item) {
				return String(item.kode) === String(activityCode);
			})[0];
			var outputs = (refs.output || []).filter(function (item) {
				return activity && Number(item.parent_id) === Number(activity.id);
			});
			var html = '<option value="">Pilih</option>';
			outputs.forEach(function (item) {
				html += '<option value="' + escapeHtml(item.nama) + '">' + escapeHtml(item.nama) + '</option>';
			});
			$('#rab-output').html(html).prop('disabled', !activity || !outputs.length);
			if (selectedOutput) {
				$('#rab-output').val(selectedOutput);
			}
		}

		function financeAccountsForPrefix(prefix, minimumParts) {
			return (refs.rekening || []).filter(function (item) {
				var parts = accountParts(item.kode);
				return parts[0] === '6' && parts.length >= minimumParts &&
					(!prefix || parts.slice(0, accountParts(prefix).length).join('.') === prefix);
			});
		}

		function financeAccountOptions(accounts, placeholder) {
			var html = '<option value="">' + escapeHtml(placeholder) + '</option>';
			accounts.forEach(function (item) {
				html += '<option value="' + escapeHtml(item.kode) + '">' +
					escapeHtml(item.kode + ' ' + item.nama) + '</option>';
			});
			return html;
		}

		function populateFinanceCategories(selectedCode) {
			var grouped = {};
			financeAccountsForPrefix('', 2).forEach(function (item) {
				var code = accountParts(item.kode).slice(0, 2).join('.');
				grouped[code] = grouped[code] || item.nama;
			});
			var html = '<option value="">Pilih</option>';
			Object.keys(grouped).sort().forEach(function (code) {
				var label = code === '6.1' ? 'Penerimaan Pembiayaan' :
					(code === '6.2' ? 'Pengeluaran Pembiayaan' : grouped[code]);
				html += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml(label) + '</option>';
			});
			$('#finance-category').html(html).val(selectedCode || '');
			populateFinanceSubcategories('');
		}

		function populateFinanceSubcategories(selectedCode) {
			var category = $('#finance-category').val();
			var grouped = {};
			financeAccountsForPrefix(category, 3).forEach(function (item) {
				var code = accountParts(item.kode).slice(0, 3).join('.');
				grouped[code] = grouped[code] || item.nama;
			});
			var accounts = Object.keys(grouped).map(function (code) {
				return { kode: code, nama: grouped[code] };
			});
			$('#finance-subcategory').html(financeAccountOptions(accounts, 'Pilih'))
				.val(selectedCode || '').prop('disabled', !category || !accounts.length);
			populateFinanceDetails('');
		}

		function populateFinanceDetails(selectedCode) {
			var subcategory = $('#finance-subcategory').val();
			var allChildren = financeAccountsForPrefix(subcategory, 4);
			var details = allChildren.length
				? allChildren
				: financeAccountsForPrefix(subcategory, 3).filter(function (item) {
					return accountParts(item.kode).length === 3;
				});
			$('#finance-detail').html(financeAccountOptions(details, 'Pilih'))
				.val(selectedCode || '').prop('disabled', !subcategory || !details.length);
			$('#rab-rekening').html(financeAccountOptions(details, 'Pilih rekening'))
				.val(selectedCode || '');
			if (selectedCode) {
				$('#rab-rekening').val(selectedCode);
			}
		}

		function incomeCodeParts(code) {
			return accountParts(code);
		}

		function populateIncomeCategories() {
			var accounts = refs.rekening.filter(function (item) {
				return /^[4]\.\d+/.test(String(item.kode || ''));
			});
			var categories = {};
			accounts.forEach(function (item) {
				var parts = incomeCodeParts(item.kode);
				if (parts.length >= 2) {
					categories[parts[0] + '.' + parts[1]] = true;
				}
			});

			var labels = {
				'4.1': 'Pendapatan Asli Desa',
				'4.2': 'Pendapatan Transfer',
				'4.3': 'Pendapatan Lain-lain'
			};
			var html = '<option value="">Pilih</option>';
			Object.keys(categories).sort().forEach(function (code) {
				html += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml(labels[code] || code) + '</option>';
			});
			$('#income-kategori').html(html);
			$('#income-subkategori, #income-detail').html('<option value="">Pilih</option>').prop('disabled', true);
			$('#rab-rekening').html('<option value="">Pilih rekening</option>').val('');
			$('#income-no-reference').toggle(!Object.keys(categories).length);
		}

		function populateIncomeSubcategories() {
			var category = $('#income-kategori').val();
			var groups = {};
			(refs.rekening || []).forEach(function (item) {
				var parts = incomeCodeParts(item.kode);
				if (parts.length >= 3 && parts[0] + '.' + parts[1] === category) {
					var code = parts.slice(0, 3).join('.');
					groups[code] = groups[code] || item.nama;
				}
			});

			var html = '<option value="">Pilih</option>';
			Object.keys(groups).sort().forEach(function (code) {
				html += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml(groups[code]) + '</option>';
			});
			$('#income-subkategori').html(html).prop('disabled', !category || !Object.keys(groups).length);
			$('#income-detail').html('<option value="">Pilih</option>').prop('disabled', true);
			$('#rab-rekening').html('<option value="">Pilih rekening</option>').val('');
			$('#income-no-reference').toggle(Boolean(category) && !Object.keys(groups).length);
		}

		function populateIncomeDetails() {
			var category = $('#income-kategori').val();
			var subgroup = $('#income-subkategori').val();
			var matches = (refs.rekening || []).filter(function (item) {
				var parts = incomeCodeParts(item.kode);
				return parts.length >= 3 && parts[0] + '.' + parts[1] === category &&
					parts.slice(0, 3).join('.') === subgroup;
			});
			var html = '<option value="">Pilih</option>';
			matches.forEach(function (item) {
				html += '<option value="' + escapeHtml(item.kode) + '">' +
					escapeHtml(item.kode + ' ' + item.nama) + '</option>';
			});
			$('#income-detail').html(html).prop('disabled', !subgroup || !matches.length);
			$('#rab-rekening').html('<option value="">Pilih rekening</option>' +
				matches.map(function (item) {
					return '<option value="' + escapeHtml(item.kode) + '">' +
						escapeHtml(item.kode + ' ' + item.nama) + '</option>';
				}).join('')).val('');
			$('#income-no-reference').toggle(Boolean(subgroup) && !matches.length);
		}

		function updatePosForm() {
			var isBelanja = $('#rab-pos').val() === '5.BELANJA';
			$('#rab-klasifikasi').toggle(isBelanja);
			$('#rab-detail-belanja').toggle(isBelanja);
			$('#rab-pajak-heading, #rab-potongan-heading, #rab-netto-heading, #rab-tax-total, #rab-net-total').toggle(isBelanja);
			$('#rab-total-label').attr('colspan', isBelanja ? 6 : 5);
			$('#rab-items .rab-pajak-cell, #rab-items .rab-potongan-cell, #rab-items .rab-netto-cell').toggle(isBelanja);
			$('#rab-output-options').html((refs.output || []).map(function (item) {
				return '<option value="' + escapeHtml(item.nama) + '"></option>';
			}).join(''));
			if (!isBelanja) {
				$('#rab-bidang, #rab-sub-bidang, #rab-kegiatan').val('');
				$('#rab-klasifikasi-belanja').val('');
				$('#rab-items .rab-pajak').val([]);
			}
			if ((expenseInput || expenseView) && isBelanja) {
				populateExpenseClasses('');
			} else if (financeInput && $('#rab-pos').val() === '6.PEMBIAYAAN') {
				populateFinanceCategories($('#finance-category').val());
			} else {
				populateRekening('rab');
			}
		}

		function money(value) {
			return new Intl.NumberFormat('id-ID', {
				style: 'currency',
				currency: 'IDR',
				maximumFractionDigits: 2
			}).format(Number(value) || 0);
		}

		function tableMoney(value) {
			return new Intl.NumberFormat('en-US', {
				minimumFractionDigits: 2,
				maximumFractionDigits: 2
			}).format(Number(value) || 0);
		}

		function automaticTaxIds(row) {
			var amount = (Number(row.find('.rab-volume').val()) || 0) *
				(Number(row.find('.rab-harga').val()) || 0);
			amount = Math.round(amount * 100) / 100;

			return row.find('.rab-pajak option').filter(function () {
				var threshold = $(this).attr('data-threshold');
				return threshold !== undefined && threshold !== '' && amount > Number(threshold);
			}).map(function () {
				return String(this.value);
			}).get().sort();
		}

		function sameTaxIds(left, right) {
			return left.map(String).sort().join(',') === right.map(String).sort().join(',');
		}

		function addItem(item) {
			var addItemLabel = (expenseInput || expenseView || financeInput) ? '<i class="fa fa-plus"></i> Tambah' : '<i class="fa fa-plus"></i>';
			var rowAddAction = (incomeInput || expenseInput || expenseView || financeInput)
				? '<button type="button" class="btn btn-success btn-xs rab-tambah-baris" title="Tambah baris">' + addItemLabel + '</button> '
				: '';
			var taxOptions = (refs.pajak || []).map(function (tax) {
				var rate = Number(tax.persentase) || 0;
				var threshold = tax.batas_otomatis == null ? '' : Number(tax.batas_otomatis);
				return '<option value="' + escapeHtml(tax.id) + '" data-percent="' + escapeHtml(rate) +
					'" data-threshold="' + escapeHtml(threshold) + '">' +
					escapeHtml(tax.nama + ' (' + rate + '%)') + '</option>';
			}).join('');
			var taxSelector = taxOptions
				? '<select class="form-control rab-pajak" multiple size="3" aria-label="Pilih pajak dan potongan">' + taxOptions + '</select>' +
					'<small class="text-danger rab-tax-warning" style="display:none;">Jumlah tarif pajak melebihi 100%.</small>'
				: '<select class="form-control rab-pajak" multiple disabled aria-label="Pilih pajak dan potongan"><option value="" disabled>Tidak ada pajak aktif</option></select>';
			var row = $('<tr>' +
				'<td><input type="text" class="form-control rab-keterangan" maxlength="255" required></td>' +
				'<td><input type="number" class="form-control rab-volume" min="0" step="0.0001" required></td>' +
				'<td><input type="text" class="form-control rab-satuan" maxlength="50"></td>' +
				'<td><input type="number" class="form-control rab-harga" min="0" step="0.01" required></td>' +
				'<td><select class="form-control rab-sumber-dana" required></select></td>' +
				'<td class="rab-pajak-cell">' + taxSelector + '</td>' +
				'<td class="text-right rab-jumlah">Rp0</td>' +
				'<td class="text-right rab-potongan-cell rab-potongan">Rp0</td>' +
				'<td class="text-right rab-netto-cell rab-netto">Rp0</td>' +
				'<td><input type="hidden" class="rab-item-id">' + rowAddAction +
					'<button type="button" class="btn btn-default btn-xs rab-kembali-otomatis" title="Kembali ke pilihan otomatis" style="display:none;">Otomatis</button> ' +
					'<button type="button" class="btn btn-danger btn-xs rab-hapus-baris" title="Hapus baris"><i class="fa fa-trash"></i></button></td>' +
				'</tr>');
			row.data('tax-manual', false);
			var fundOptions = '<option value="">Pilih sumber</option>';
			funds.forEach(function (fund) {
				fundOptions += '<option value="' + escapeHtml(fund) + '">' + escapeHtml(fund) + '</option>';
			});
			row.find('.rab-sumber-dana').html(fundOptions);
			if (item) {
				row.find('.rab-keterangan').val(item.keterangan);
				row.find('.rab-volume').val(item.volume);
				row.find('.rab-satuan').val(item.satuan);
				row.find('.rab-harga').val(item.harga_satuan);
				row.find('.rab-sumber-dana').val(item.sumber_dana);
				row.find('.rab-item-id').val(item.id || '');
				var selectedTaxes = [];
				(item.pajak || []).forEach(function (tax) {
					selectedTaxes.push(String(tax.pajak_id));
					row.find('.rab-pajak option').filter(function () {
						return this.value === String(tax.pajak_id);
					}).attr('data-percent', tax.persentase)
						.text(tax.nama_pajak + ' (' + tax.persentase + '%)');
				});
				row.find('.rab-pajak').val(selectedTaxes);
				row.data('tax-manual', !sameTaxIds(selectedTaxes, automaticTaxIds(row)));
				row.find('.rab-kembali-otomatis').toggle(Boolean(row.data('tax-manual')));
			}
			$('#rab-items').append(row);
			var isBelanja = $('#rab-pos').val() === '5.BELANJA';
			row.find('.rab-pajak-cell, .rab-potongan-cell, .rab-netto-cell').toggle(isBelanja);
			calculateTotal(!item);
		}

		function calculateTotal(autoSelectTaxes) {
			var total = 0;
			var totalTax = 0;
			$('#rab-items tr').each(function () {
				var row = $(this);
				var amount = (Number(row.find('.rab-volume').val()) || 0) *
					(Number(row.find('.rab-harga').val()) || 0);
				if (autoSelectTaxes && !row.data('tax-manual')) {
					row.find('.rab-pajak').val(automaticTaxIds(row));
				}
				row.find('.rab-kembali-otomatis').toggle(Boolean(row.data('tax-manual')));
				var taxAmount = 0;
				var totalRate = 0;
				row.find('.rab-pajak option:selected').each(function () {
					var rate = Number($(this).attr('data-percent')) || 0;
					totalRate += rate;
					taxAmount += Math.round(amount * rate) / 100;
				});
				total += amount;
				totalTax += taxAmount;
				row.find('.rab-jumlah').text(money(amount));
				row.find('.rab-potongan').text(money(taxAmount));
				row.find('.rab-netto').text(money(amount - taxAmount));
				row.find('.rab-tax-warning').toggle(totalRate > 100);
				row.data('tax-rate-valid', totalRate <= 100);
			});
			$('#rab-total').text(money(total));
			$('#rab-tax-total').text(money(totalTax));
			$('#rab-net-total').text(money(total - totalTax));
		}

		function posLabel(code) {
			var labels = {
				'4.PENDAPATAN': 'Pendapatan',
				'5.BELANJA': 'Belanja',
				'6.PEMBIAYAAN': 'Pembiayaan'
			};
			return labels[code] || code || '-';
		}

		function rowActions(row) {
			var html = '';
			if (canEdit) {
				if (incomeView) {
					html += '<button type="button" class="btn btn-success btn-xs rab-add-detail" data-id="' +
						escapeHtml(row.id) + '"><i class="fa fa-plus"></i> Rincian</button> ';
				} else if (expenseView) {
					html += '<a class="btn btn-success btn-xs" href="' + escapeHtml(api.add_detail) +
						'/' + encodeURIComponent(row.id) + '"><i class="fa fa-plus"></i> Rincian</a> ';
				}
				html += '<button type="button" class="btn btn-warning btn-xs rab-edit" data-id="' +
					escapeHtml(row.id) + '"><i class="fa fa-edit"></i> Ubah</button> ';
				if (!incomeView && row.tahap === 'Murni') {
					html += '<button type="button" class="btn btn-info btn-xs rab-copy" data-id="' +
						escapeHtml(row.id) + '"><i class="fa fa-copy"></i> ' +
						(financeView || financeChange ? 'Salin ke Perubahan' : 'Salin ke P-APBDes') +
						'</button> ';
				}
			}
			if (financeView) {
				html += '<button type="button" class="btn btn-info btn-xs rab-view" data-id="' +
						escapeHtml(row.id) + '"><i class="fa fa-eye"></i> Rincian</button> ';
			}
			if (canDelete) {
				html += '<button type="button" class="btn btn-danger btn-xs rab-delete" data-id="' +
					escapeHtml(row.id) + '"><i class="fa fa-trash"></i>' +
					(incomeView ? ' Hapus' : '') + '</button>';
			}
			return html || '-';
		}

		function renderIncomeRows(rows) {
			lastRows = rows;
			if (!rows.length) {
				$('#rab-daftar').html('<tr><td colspan="8" class="text-center">Belum ada rincian anggaran pendapatan pada tahun ini.</td></tr>');
				return;
			}

			var recordsByCode = Object.create(null);
			var accounts = Object.create(null);
			var groupTotals = Object.create(null);
			var typeTotals = Object.create(null);
			var grandTotal = 0;
			rows.forEach(function (row) {
				var code = String(row.kd_rekening || '').replace(/\.+$/, '');
				var parts = code.split('.');
				if (parts[0] !== '4' || parts.length < 2) {
					return;
				}
				var groupCode = parts.slice(0, 2).join('.');
				var typeCode = parts.length >= 3 ? parts.slice(0, 3).join('.') : groupCode;
				var amount = Number(row.nilai_menjadi) || 0;
				if (!recordsByCode[code]) {
					recordsByCode[code] = [];
				}
				recordsByCode[code].push(row);
				groupTotals[groupCode] = (groupTotals[groupCode] || 0) + amount;
				typeTotals[typeCode] = (typeTotals[typeCode] || 0) + amount;
				grandTotal += amount;
				if (parts.length > 3) {
					if (!accounts[code]) {
						accounts[code] = {code: code, name: row.nama_rekening || '', total: 0, records: []};
					}
					accounts[code].total += amount;
					accounts[code].records.push(row);
				}
			});

			var groupCodes = Object.keys(groupTotals).sort();
			if (!groupCodes.length) {
				$('#rab-daftar').html('<tr><td colspan="8" class="text-center">Belum ada rincian anggaran pendapatan pada tahun ini.</td></tr>');
				return;
			}
			var root = (incomeHierarchy.akun || []).filter(function (item) {
				return String(item.Akun || '').replace(/\.+$/, '') === '4';
			})[0];
			var html = '<tr class="rab-income-level-0">' +
				'<td>4</td><td>' + escapeHtml(root ? root.Nama_Akun : 'PENDAPATAN') + '</td>' +
				'<td></td><td></td><td></td><td></td>' +
				'<td class="text-right">' + escapeHtml(tableMoney(grandTotal)) + '</td><td></td></tr>';

			function referenceName(list, codeKey, nameKey, code, fallback) {
				var found = (list || []).filter(function (item) {
					return String(item[codeKey] || '').replace(/\.+$/, '') === code;
				})[0];
				return found ? found[nameKey] : (fallback || code);
			}

			function hasIncomeAccountReference(record) {
				var code = String(record.kd_rekening || '').replace(/\.+$/, '');
				return (refs.rekening || []).some(function (item) {
					return String(item.kode || '').replace(/\.+$/, '') === code;
				});
			}

			function incomeActions(records) {
				return (records || []).map(function (record) {
					if (hasIncomeAccountReference(record)) {
						return rowActions(record);
					}
					var html = '';
					if (canEdit) {
						if (incomeView) {
							html += '<button type="button" class="btn btn-success btn-xs rab-add-detail" data-id="' +
								escapeHtml(record.id) + '"><i class="fa fa-plus"></i> Rincian</button> ';
						}
						html += '<button type="button" class="btn btn-warning btn-xs rab-edit" data-id="' +
							escapeHtml(record.id) + '"><i class="fa fa-edit"></i> Ubah</button> ';
					}
					if (canDelete) {
						html += '<button type="button" class="btn btn-danger btn-xs rab-delete" data-id="' +
							escapeHtml(record.id) + '"><i class="fa fa-trash"></i> Hapus</button>';
					}
					return html || '-';
				}).join('<br>');
			}

			function renderDetails(records) {
				var details = '';
				(records || []).forEach(function (record) {
					(record.rincian || []).forEach(function (item, index) {
						var amount = (Number(item.volume) || 0) * (Number(item.harga_satuan) || 0);
						var actions = '';
						if (canEdit) {
							actions += '<button type="button" class="btn btn-warning btn-xs rab-edit-item" data-rab-id="' +
								escapeHtml(record.id) + '" data-item-id="' + escapeHtml(item.id) +
								'"><i class="fa fa-edit"></i> Ubah</button> ';
						}
						if (canDelete) {
							actions += '<button type="button" class="btn btn-danger btn-xs rab-delete-item" data-rab-id="' +
								escapeHtml(record.id) + '" data-item-id="' + escapeHtml(item.id) +
								'"><i class="fa fa-trash"></i> Hapus</button>';
						}
						details += '<tr class="rab-income-item">' +
							'<td></td>' +
							'<td>' + escapeHtml((index + 1) + '. ' + item.keterangan) + '</td>' +
							'<td class="text-right">' + escapeHtml(Number(item.volume).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 4})) + '</td>' +
							'<td>' + escapeHtml(item.satuan || '') + '</td>' +
							'<td class="text-right">' + escapeHtml(tableMoney(item.harga_satuan)) + '</td>' +
							'<td>' + escapeHtml(item.sumber_dana || '') + '</td>' +
							'<td class="text-right">' + escapeHtml(tableMoney(amount)) + '</td>' +
							'<td class="text-nowrap">' + (actions || '-') + '</td></tr>';
					});
				});
				return details;
			}

			groupCodes.forEach(function (groupCode) {
				var groupRecords = recordsByCode[groupCode] || [];
				html += '<tr class="rab-income-level-1">' +
					'<td>' + escapeHtml(groupCode + '.') + '</td>' +
					'<td>' + escapeHtml(referenceName(incomeHierarchy.kelompok, 'Kelompok', 'Nama_Kelompok', groupCode)) + '</td>' +
					'<td></td><td></td><td></td><td></td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(groupTotals[groupCode])) + '</td>' +
					'<td class="text-nowrap">' + incomeActions(groupRecords) + '</td></tr>';
				html += renderDetails(groupRecords);

				var typeCodes = Object.keys(typeTotals).filter(function (typeCode) {
					return typeCode.indexOf(groupCode + '.') === 0 && typeCode.split('.').length === 3;
				}).sort();
				typeCodes.forEach(function (typeCode) {
					var typeRecords = recordsByCode[typeCode] || [];
					html += '<tr class="rab-income-level-2">' +
						'<td>' + escapeHtml(typeCode + '.') + '</td>' +
						'<td>' + escapeHtml(referenceName(incomeHierarchy.jenis, 'Jenis', 'Nama_Jenis', typeCode)) + '</td>' +
						'<td></td><td></td><td></td><td></td>' +
						'<td class="text-right">' + escapeHtml(tableMoney(typeTotals[typeCode])) + '</td>' +
						'<td class="text-nowrap">' + incomeActions(typeRecords) + '</td></tr>';
					html += renderDetails(typeRecords);

					Object.keys(accounts).filter(function (accountCode) {
						return accountCode.indexOf(typeCode + '.') === 0;
					}).sort().forEach(function (accountCode) {
						var account = accounts[accountCode];
						var actions = incomeActions(account.records);
						html += '<tr class="rab-income-level-3">' +
							'<td>' + escapeHtml(accountCode + '.') + '</td>' +
							'<td>' + escapeHtml(account.name) + '</td>' +
							'<td></td><td></td><td></td><td></td>' +
							'<td class="text-right">' + escapeHtml(tableMoney(account.total)) + '</td>' +
							'<td class="text-nowrap">' + actions + '</td></tr>';
						html += renderDetails(account.records);
					});
				});
			});

			$('#rab-daftar').html(html);
		}

		function compareAccountCodes(left, right) {
			var leftParts = accountParts(left);
			var rightParts = accountParts(right);
			for (var index = 0; index < Math.min(leftParts.length, rightParts.length); index++) {
				var difference = Number(leftParts[index]) - Number(rightParts[index]);
				if (difference !== 0) {
					return difference;
				}
			}

			return leftParts.length - rightParts.length;
		}

		function accountReferenceName(code) {
			var account = (refs.rekening || []).filter(function (item) {
				return accountParts(item.kode).join('.') === code;
			})[0];
			if (account) {
				return account.nama;
			}

			var parts = accountParts(code);
			var levelReference = {
				1: {rows: accountHierarchy.akun, code: 'Akun', name: 'Nama_Akun'},
				2: {rows: accountHierarchy.kelompok, code: 'Kelompok', name: 'Nama_Kelompok'},
				3: {rows: accountHierarchy.jenis, code: 'Jenis', name: 'Nama_Jenis'}
			}[parts.length];
			if (levelReference) {
				var legacyAccount = (levelReference.rows || []).filter(function (item) {
					return String(item[levelReference.code] || '').replace(/\.+$/, '') === code;
				})[0];
				if (legacyAccount) {
					return legacyAccount[levelReference.name];
				}
			}

			return '';
		}

		function accountCodeLabel(code) {
			return code ? code.replace(/\.+$/, '') + '.' : '';
		}

		function buildAccountNodes(records, minimumDepth) {
			var nodes = Object.create(null);
			records.forEach(function (record) {
				var parts = accountParts(record.kd_rekening || '');
				if (!parts.length || parts.some(function (part) { return !/^\d+$/.test(part); })) {
					return;
				}
				var amount = Number(record.nilai_menjadi) || 0;
				var firstDepth = Math.min(minimumDepth || 3, parts.length);
				for (var depth = firstDepth; depth <= parts.length; depth++) {
					var code = parts.slice(0, depth).join('.');
					if (!nodes[code]) {
						nodes[code] = {code: code, depth: depth, total: 0, records: []};
					}
					nodes[code].total += amount;
					if (depth === parts.length) {
						nodes[code].records.push(record);
					}
				}
			});

			return nodes;
		}

		function renderBudgetItems(record) {
			var html = '';
			(record.rincian || []).forEach(function (item, index) {
				var amount = (Number(item.volume) || 0) * (Number(item.harga_satuan) || 0);
				var actions = '';
				if (canEdit) {
					actions += '<button type="button" class="btn btn-warning btn-xs rab-edit-item" data-rab-id="' +
						escapeHtml(record.id) + '" data-item-id="' + escapeHtml(item.id) +
						'"><i class="fa fa-edit"></i> Ubah</button> ';
				}
				if (record.pos === '5.BELANJA' && canManagePayment) {
					var receiptUrl = escapeHtml(api.item_receipt) + '/' + encodeURIComponent(item.id);
					if (item.kuitansi) {
						actions += '<a class="btn btn-info btn-xs" href="' + receiptUrl +
							'"><i class="fa fa-edit"></i> Ubah Kuitansi</a> ' +
							'<a class="btn btn-default btn-xs" href="' + escapeHtml(api.print_item_receipt) +
							'/' + encodeURIComponent(item.id) + '" target="_blank" rel="noopener">' +
							'<i class="fa fa-print"></i> Cetak Kuitansi</a> ';
					} else {
						actions += '<a class="btn btn-info btn-xs" href="' + receiptUrl +
							'"><i class="fa fa-credit-card"></i> Buat Kuitansi</a> ';
					}
				}
				if (canDelete) {
					actions += '<button type="button" class="btn btn-danger btn-xs rab-delete-item" data-rab-id="' +
						escapeHtml(record.id) + '" data-item-id="' + escapeHtml(item.id) +
						'"><i class="fa fa-trash"></i> Hapus</button>';
				}
				var itemClass = record.pos === '6.PEMBIAYAAN' ? 'rab-finance-item' : 'rab-expense-item';
				html += '<tr class="' + itemClass + '"><td></td><td>' +
					escapeHtml((index + 1) + '. ' + item.keterangan) + '</td><td class="text-right">' +
					escapeHtml(Number(item.volume).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 4})) +
					'</td><td>' + escapeHtml(item.satuan || '') + '</td><td class="text-right">' +
					escapeHtml(tableMoney(item.harga_satuan)) + '</td><td>' + escapeHtml(item.sumber_dana || '') +
					'</td><td class="text-right">' + escapeHtml(tableMoney(amount)) + '</td><td class="text-nowrap">' +
					(actions || '-') + '</td></tr>';
			});

			return html;
		}

		function renderAccountNodes(records, showActions, minimumDepth) {
			var nodes = buildAccountNodes(records, minimumDepth);
			var html = '';
			Object.keys(nodes).sort(compareAccountCodes).forEach(function (code) {
				var node = nodes[code];
				var firstRecord = node.records[0];
				var name = firstRecord
					? firstRecord.nama_rekening
					: accountReferenceName(code) || code;
				var actions = showActions && firstRecord
					? node.records.map(rowActions).join('<br>')
					: '';
				var rowClass = firstRecord
					? 'rab-expense-account'
					: 'rab-expense-account-level rab-expense-account-level-' + node.depth;
				html += '<tr class="' + rowClass + '"><td>' + escapeHtml(accountCodeLabel(code)) +
					'</td><td>' + escapeHtml(name) + '</td><td></td><td></td><td></td><td></td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(node.total)) +
					'</td><td class="text-nowrap">' + actions + '</td></tr>';
				if (firstRecord) {
					node.records.forEach(function (record) {
						html += renderBudgetItems(record);
					});
				}
			});

			return html;
		}

		function updateExpenseSummary(rows) {
			var selectedValues = [
				$('#filter-bidang').val(),
				$('#filter-sub-bidang').val(),
				$('#filter-kegiatan').val()
			];
			if (!selectedValues.some(Boolean)) {
				$('#rab-expense-summary').hide();
				return;
			}

			function selectedLabel(selector) {
				return $(selector).val() ? $(selector + ' option:selected').text() : '-';
			}

			function distinctValues(property) {
				var values = [];
				(rows || []).forEach(function (row) {
					var value = String(row[property] || '').trim();
					if (value && values.indexOf(value) === -1) {
						values.push(value);
					}
				});
				return values;
			}

			var hasActivity = Boolean(selectedValues[2]);
			$('#rab-summary-bidang').text(selectedLabel('#filter-bidang'));
			$('#rab-summary-sub-bidang').text(selectedLabel('#filter-sub-bidang'));
			$('#rab-summary-kegiatan').text(selectedLabel('#filter-kegiatan'));
			$('#rab-summary-waktu').text(hasActivity ? distinctValues('waktu_pelaksanaan').join(', ') || '-' : '-');
			$('#rab-summary-output').text(hasActivity ? distinctValues('output').join(', ') || '-' : '-');
			$('#rab-expense-summary').show();
		}

		function renderExpenseRows(rows) {
			lastRows = rows;
			updateExpenseSummary(rows);
			if (!rows.length) {
				$('#rab-daftar').html('<tr><td colspan="8" class="text-center">Belum ada rincian anggaran belanja pada tahun ini.</td></tr>');
				return;
			}

			var activities = Object.create(null);
			var total = 0;
			rows.forEach(function (row) {
				var activityCode = displayHierarchyCode(row.kd_kegiatan || row.nama_kegiatan || '-', 'kegiatan');
				var packageCode = String(row.kode_paket || '').trim();
				var packageName = String(row.nama_paket || '').trim();
				var packageLabel = [packageCode, packageName].filter(Boolean).join(' ')
					|| row.output || row.kegiatan_sumber || row.nama_kegiatan || activityCode;
				var activityKey = activityCode + '|' + packageLabel;
				if (!activities[activityKey]) {
					activities[activityKey] = {
						code: activityCode,
						name: packageLabel,
						total: 0,
						records: []
					};
				}
				var activity = activities[activityKey];
				var amount = Number(row.nilai_menjadi) || 0;
				activity.total += amount;
				activity.records.push(row);
				total += amount;
			});

			var html = '<tr class="rab-expense-level-0"><td>5</td><td>BELANJA</td><td></td><td></td><td></td><td></td><td class="text-right">' +
				escapeHtml(tableMoney(total)) + '</td><td></td></tr>';
			Object.keys(activities).sort(function (left, right) {
				var leftGroup = activities[left];
				var rightGroup = activities[right];
				return compareAccountCodes(leftGroup.code, rightGroup.code)
					|| leftGroup.name.localeCompare(rightGroup.name);
			}).forEach(function (activityKey) {
				var activity = activities[activityKey];
				var activityRecord = activity.records[0];
				var hasAvailableBudget = activity.records.some(function (record) {
					return (record.rincian || []).some(function (item) {
						return Number(item.tersedia) > 0;
					});
				});
				var activityActions = '';
				if (canManagePayment && hasAvailableBudget && activityRecord) {
					var subActivityId = String(activityRecord.kd_bidang || '') + '|' + String(activityRecord.kegiatan || '');
					activityActions = '<a class="btn btn-success btn-xs" href="' + escapeHtml(api.spp) +
						'?tahun_anggaran=' + encodeURIComponent(globalYear) + '&tahap=' +
						encodeURIComponent(expenseChange ? 'perubahan' : 'murni') + '&baru=1&sub_kegiatan=' +
						encodeURIComponent(subActivityId) + '"><i class="fa fa-file-text-o"></i> Buat SPP</a>';
				}
				html += '<tr class="rab-expense-output"><td>' + escapeHtml(activity.code) + '</td><td>' +
					escapeHtml(activity.name) + '</td><td></td><td></td><td></td><td></td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(activity.total)) +
					'</td><td class="text-nowrap">' + activityActions + '</td></tr>';
				html += renderAccountNodes(activity.records, true);
			});
			$('#rab-daftar').html(html);
		}

		function renderFinanceRows(rows) {
			lastRows = rows;
			if (!rows.length) {
				$('#rab-daftar').html('<tr><td colspan="8" class="text-center">Belum ada rincian anggaran pembiayaan pada tahun ini.</td></tr>');
				return;
			}

			var categories = Object.create(null);
			var total = 0;
			rows.forEach(function (row) {
				var code = accountParts(row.kd_rekening || '').join('.');
				var parts = accountParts(code);
				if (parts.length < 2) {
					return;
				}
				var categoryCode = parts.slice(0, 2).join('.');
				var amount = Number(row.nilai_menjadi) || 0;
				if (!categories[categoryCode]) {
					categories[categoryCode] = {total: 0, types: Object.create(null)};
				}
				var category = categories[categoryCode];
				category.total += amount;
				if (parts.length >= 3) {
					var typeCode = parts.slice(0, 3).join('.');
					if (!category.types[typeCode]) {
						category.types[typeCode] = {total: 0, exactRecords: [], accounts: []};
					}
					category.types[typeCode].total += amount;
					if (parts.length > 3) {
						category.types[typeCode].accounts.push(row);
					} else {
						category.types[typeCode].exactRecords.push(row);
					}
				}
				total += amount;
			});

			var html = '<tr class="rab-expense-level-0"><td>6</td><td>PEMBIAYAAN</td>' +
				'<td></td><td></td><td></td><td></td><td class="text-right">' +
				escapeHtml(tableMoney(total)) + '</td><td></td></tr>';
			Object.keys(categories).sort(compareAccountCodes).forEach(function (categoryCode) {
				var category = categories[categoryCode];
				html += '<tr class="rab-income-level-1"><td>' + escapeHtml(accountCodeLabel(categoryCode)) +
					'</td><td>' + escapeHtml(accountReferenceName(categoryCode) || categoryCode) +
					'</td><td></td><td></td><td></td><td></td><td class="text-right">' +
					escapeHtml(tableMoney(category.total)) + '</td><td></td></tr>';
				Object.keys(category.types).sort(compareAccountCodes).forEach(function (typeCode) {
					var type = category.types[typeCode];
					var typeActions = type.exactRecords.map(rowActions).join('<br>');
					html += '<tr class="rab-income-level-2"><td>' + escapeHtml(accountCodeLabel(typeCode)) +
						'</td><td>' + escapeHtml(accountReferenceName(typeCode) || typeCode) +
						'</td><td></td><td></td><td></td><td></td><td class="text-right">' +
						escapeHtml(tableMoney(type.total)) + '</td><td class="text-nowrap">' + typeActions + '</td></tr>';
					type.exactRecords.forEach(function (record) {
						html += renderBudgetItems(record);
					});
					if (type.accounts.length) {
						html += renderAccountNodes(type.accounts, true, 4);
					}
				});
			});
			$('#rab-daftar').html(html);
		}

		function renderRows(rows) {
			if (incomeView) {
				renderIncomeRows(rows);
				return;
			}
			if (expenseView || expenseChange) {
				renderExpenseRows(rows);
				return;
			}
			if (financeView) {
				renderFinanceRows(rows);
				return;
			}
			lastRows = rows;
			if (!rows.length) {
				$('#rab-daftar').html('<tr><td colspan="' + (financeChange ? '7' : '8') +
					'" class="text-center">Belum ada rincian anggaran.</td></tr>');
				return;
			}

			var html = '';
			rows.forEach(function (row) {
				if (financeChange) {
					html += '<tr>' +
						'<td>' + escapeHtml(row.tahun) + '</td>' +
						'<td>' + escapeHtml(row.tahap) + '</td>' +
						'<td>' + escapeHtml(row.kd_rekening + ' ' + row.nama_rekening) + '</td>' +
						'<td class="text-right">' + escapeHtml(tableMoney(row.nilai_semula)) + '</td>' +
						'<td class="text-right">' + escapeHtml(tableMoney(row.nilai_menjadi)) + '</td>' +
						'<td class="text-right">' + escapeHtml(tableMoney(Number(row.nilai_menjadi) - Number(row.nilai_semula))) + '</td>' +
						'<td class="text-nowrap">' + rowActions(row) + '</td>' +
						'</tr>';
					return;
				}
				var klasifikasi = row.pos === '5.BELANJA'
					? [row.nama_bidang, row.nama_sub_bidang, row.kegiatan_sumber || row.nama_kegiatan].filter(Boolean).join(' / ')
					: '-';
				if (row.pos === '5.BELANJA' && row.output) {
					klasifikasi += ' / Output: ' + row.output;
				}
				if (row.pos === '5.BELANJA' && row.nama_paket) {
					klasifikasi += ' / Paket: ' + row.nama_paket;
				}
				if (row.pos === '5.BELANJA' && row.kode_paket) {
					klasifikasi += ' / Kode paket: ' + row.kode_paket;
				}
				if (row.pos === '5.BELANJA' && row.volume_rencana) {
					klasifikasi += ' / Rencana: ' + row.volume_rencana + ' ' + (row.satuan_rencana || '');
				}
				html += '<tr>' +
					'<td>' + escapeHtml(row.tahun) + '</td>' +
					'<td>' + escapeHtml(row.tahap) + '</td>' +
					'<td>' + escapeHtml(posLabel(row.pos)) + '</td>' +
					'<td>' + escapeHtml(klasifikasi) + '</td>' +
					'<td>' + escapeHtml(row.kd_rekening + ' ' + row.nama_rekening) + '</td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(row.nilai_semula)) + '</td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(row.nilai_menjadi)) + '</td>' +
					'<td class="text-nowrap">' + rowActions(row) + '</td>' +
					'</tr>';
			});
			$('#rab-daftar').html(html);
		}

		function filters() {
			if (incomeView) {
				return {
					tahun: $('#finance-sidebar-year').val() || globalYear,
					tahap: 'Murni',
					pos: '4.PENDAPATAN',
					include_details: '1'
				};
			}
			if (financeView || financeChange) {
				return {
					tahun: $('#finance-sidebar-year').val() || globalYear,
					tahap: financeChange ? 'Perubahan' : '',
					pos: '6.PEMBIAYAAN',
					include_details: financeView ? '1' : '0'
				};
			}
			if (expenseView || expenseChange) {
				return {
					tahun: $('#finance-sidebar-year').val() || globalYear,
					tahap: expenseChange ? 'Perubahan' : 'Murni',
					pos: '5.BELANJA',
					kd_bidang: $('#filter-bidang').val(),
					kd_sub_bidang: $('#filter-sub-bidang').val(),
					kd_kegiatan: $('#filter-kegiatan').val(),
					include_details: '1'
				};
			}
			return {
				tahun: $('#filter-tahun').val(),
				tahap: $('#filter-tahap').val(),
				pos: $('#filter-pos').val(),
				kd_bidang: $('#filter-bidang').val(),
				kd_sub_bidang: $('#filter-sub-bidang').val(),
				kd_kegiatan: $('#filter-kegiatan').val()
			};
		}

		function loadRows() {
			var columnCount = financeChange ? '7' : '8';
			$('#rab-daftar').html('<tr><td colspan="' + columnCount + '" class="text-center">Memuat data...</td></tr>');
			if (expenseView || expenseChange) {
				$('#rab-list-section').show();
			}
			$.ajax({
				url: api.list,
				type: 'GET',
				dataType: 'json',
				data: filters()
			}).done(renderRows).fail(function (xhr) {
				$('#rab-daftar').html('<tr><td colspan="' + (financeChange ? '7' : '8') + '" class="text-center text-danger">Gagal memuat data rincian.</td></tr>');
				notify('error', xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Gagal memuat data rincian');
			});
		}

		function resetForm() {
			$('#rab-id').val('');
			$('#rab-kegiatan-sumber').val('');
			$('#rab-tahun, #rab-tahap, #rab-pos').prop('disabled', false);
			$('#rab-edit-notice').hide();
			$('#rab-tahun').val(globalYear);
			$('#rab-tahap').val(initialMode === 'perubahan' ? 'Perubahan' : 'Murni');
			$('input[name="expense-stage"]').prop('disabled', false).val(['Murni']);
			$('input[name="expense-stage"][value="' + $('#rab-tahap').val() + '"]').prop('checked', true);
			$('#rab-pos').val(initialPos || '4.PENDAPATAN');
			$('#rab-output, #rab-lokasi, #rab-target-sdgs, #rab-pka, #rab-tpk, #rab-data-eksisting, #rab-target-tahun-depan, #rab-volume-rencana, #rab-satuan-rencana, #rab-nama-paket, #rab-kode-paket').val('');
			$('#expense-waktu').val('');
			$('#rab-bulan-mulai, #rab-bulan-selesai, #rab-waktu-pelaksanaan').val('');
			$('#rab-penerima-laki, #rab-penerima-perempuan, #rab-penerima-rtm').val('0');
			$('#rab-perbandingan-wrap').hide();
			$('#rab-perbandingan').empty();
			$('#rab-perbandingan-semula, #rab-perbandingan-menjadi, #rab-perbandingan-selisih').text(tableMoney(0));
			$('#rab-bidang').val('');
			$('#rab-sub-bidang').html('<option value="">Pilih sub bidang</option>').prop('disabled', true);
			$('#rab-kegiatan').html('<option value="">Pilih kegiatan</option>').prop('disabled', true);
			$('#rab-output').html('<option value="">Pilih</option>').prop('disabled', true);
			$('#rab-items').empty();
			updatePosForm();
			if (expenseInput || expenseView) {
				populateExpenseClasses('');
			}
			if (financeInput) {
				populateFinanceCategories('');
			}
			addItem();
		}

		function loadForEdit(id, appendDetail, focusItemId) {
			$.getJSON(api.get + '/' + encodeURIComponent(id)).done(function (rab) {
				$('#rab-id').val(rab.id);
				$('#rab-tahun').val(rab.tahun);
				$('#rab-tahap').val(rab.tahap);
				$('#rab-pos').val(rab.pos);
				$('#rab-tahun, #rab-tahap, #rab-pos').prop('disabled', true);
				if (rab.pos === '5.BELANJA') {
					$('input[name="expense-stage"]').val([rab.tahap]).prop('disabled', true);
				}
				$('#rab-edit-notice').show();
				updatePosForm();
				$('#rab-rekening').val(rab.kd_rekening);
				if (rab.pos === '4.PENDAPATAN') {
					var incomePartsForEdit = accountParts(rab.kd_rekening);
					$('#income-kategori').val(incomePartsForEdit.slice(0, 2).join('.'));
					populateIncomeSubcategories();
					$('#income-subkategori').val(incomePartsForEdit.slice(0, 3).join('.'));
					populateIncomeDetails();
					$('#income-detail').val(rab.kd_rekening);
					$('#rab-rekening').val(rab.kd_rekening);
				}
				if (rab.pos === '5.BELANJA') {
					$('#rab-bidang').val(rab.kd_bidang);
					populateSubBidang('rab', rab.kd_sub_bidang, rab.kd_kegiatan);
					$('#rab-kegiatan-sumber').val(rab.kegiatan_sumber || '');
					$('#rab-klasifikasi-belanja').val(rab.klasifikasi_belanja || '');
					if (expenseInput || expenseView) {
						populateExpenseClasses(rab.klasifikasi_belanja || '');
						populateExpenseObjects(String(rab.kd_rekening || '').replace(/\.+$/, '').split('.').slice(0, 3).join('.'));
						populateExpenseDetails(rab.kd_rekening);
						populateOutputs(rab.kd_kegiatan, rab.output);
					}
					$('#rab-output').val(rab.output || '');
					$('#rab-bulan-mulai').val(rab.bulan_mulai || '');
					$('#rab-bulan-selesai').val(rab.bulan_selesai || '');
					$('#rab-waktu-pelaksanaan').val(rab.waktu_pelaksanaan || '');
					$('#rab-penerima-laki').val(rab.penerima_laki || 0);
					$('#rab-penerima-perempuan').val(rab.penerima_perempuan || 0);
					$('#rab-penerima-rtm').val(rab.penerima_rtm || 0);
					$('#rab-lokasi').val(rab.lokasi || '');
					$('#rab-target-sdgs').val(rab.target_sdgs || '');
					$('#rab-pka').val(rab.pka || '');
					$('#rab-tpk').val(rab.tpk || '');
					$('#rab-data-eksisting').val(rab.data_eksisting || '');
					$('#rab-target-tahun-depan').val(rab.target_tahun_depan || '');
					$('#rab-volume-rencana').val(rab.volume_rencana || '');
					$('#rab-satuan-rencana').val(rab.satuan_rencana || '');
					$('#rab-nama-paket').val(rab.nama_paket || '');
					$('#rab-kode-paket').val(rab.kode_paket || '');
				}
				if (rab.pos === '6.PEMBIAYAAN' && financeChange) {
					var accountPartsForEdit = accountParts(rab.kd_rekening);
					var category = accountPartsForEdit.slice(0, 2).join('.');
					var subcategory = accountPartsForEdit.slice(0, 3).join('.');
					populateFinanceCategories(category);
					populateFinanceSubcategories(subcategory);
					populateFinanceDetails(rab.kd_rekening);
					$('#rab-rekening').val(rab.kd_rekening);
				}
				$('#rab-items').empty();
				var items = rab.rincian || [];
				items.forEach(addItem);
				if (!items.length || appendDetail) {
					addItem();
				}
				renderComparison(rab.perbandingan || []);
				if (incomeView || expenseView || expenseChange || financeChange) {
					$('#rab-form-section').show();
				}
				if (focusItemId) {
					var focusedItem = $('#rab-items tr').filter(function () {
						return String($(this).find('.rab-item-id').val()) === String(focusItemId);
					}).first();
					if (focusedItem.length) {
						focusedItem.addClass('info');
						focusedItem.find('.rab-keterangan').trigger('focus');
						focusedItem[0].scrollIntoView({behavior: 'smooth', block: 'center'});
					}
				} else {
					window.scrollTo(0, 0);
				}
			}).fail(function (xhr) {
				notify('error', xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Gagal memuat rincian anggaran');
			});
		}

		function renderComparison(rows) {
			var semula = 0;
			var menjadi = 0;
			var html = '';
			rows.forEach(function (row) {
				semula += Number(row.jumlah_semula) || 0;
				menjadi += Number(row.jumlah_menjadi) || 0;
				html += '<tr><td>' + escapeHtml(row.keterangan) + '</td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(row.jumlah_semula)) + '</td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(row.jumlah_menjadi)) + '</td>' +
					'<td class="text-right">' + escapeHtml(tableMoney(row.selisih)) + '</td></tr>';
			});
			$('#rab-perbandingan').html(html || '<tr><td colspan="4" class="text-center">Belum ada data pembanding.</td></tr>');
			$('#rab-perbandingan-semula').text(tableMoney(semula));
			$('#rab-perbandingan-menjadi').text(tableMoney(menjadi));
			$('#rab-perbandingan-selisih').text(tableMoney(menjadi - semula));
			$('#rab-perbandingan-wrap').show();
		}

		var formatBidangCode = function (code) {
			return displayHierarchyCode(code, 'bidang');
		};
		$('#filter-bidang').html(optionList(refs.bidang, 'Semua', formatBidangCode));
		$('#rab-bidang').html(optionList(refs.bidang, 'Pilih bidang', formatBidangCode));
		$('#filter-bidang').on('change', function () {
			populateSubBidang('filter', '', '');
		});
		$('#filter-sub-bidang').on('change', function () {
			populateActivities('filter', '');
		});
		$('#rab-bidang').on('change', function () {
			populateSubBidang('rab', '', '');
		});
		$('#rab-sub-bidang').on('change', function () {
			populateActivities('rab', '');
		});
		$('#rab-pos').on('change', updatePosForm);
		$('#rab-klasifikasi-belanja').on('change', function () {
			$('#rab-rekening').val('');
			if (expenseInput || expenseView) {
				populateExpenseObjects('');
			}
		});
		$('#expense-obyek').on('change', function () {
			populateExpenseDetails('');
		});
		$('#rab-kegiatan').on('change', function () {
			$('#rab-kegiatan-sumber').val('');
			if (expenseInput || expenseView) {
				populateOutputs($(this).val());
			}
		});
		$('input[name="expense-stage"]').on('change', function () {
			$('#rab-tahap').val($(this).val());
		});
		$('#rab-bulan-mulai, #rab-bulan-selesai').on('change', function () {
			var start = $('#rab-bulan-mulai option:selected').text();
			var end = $('#rab-bulan-selesai option:selected').text();
			var period = $('#rab-bulan-mulai').val() && $('#rab-bulan-selesai').val()
				? start + ' - ' + end
				: '';
			$('#expense-waktu').val(period);
			$('#rab-waktu-pelaksanaan').val(period);
		});
		$('#income-kategori').on('change', populateIncomeSubcategories);
		$('#income-subkategori').on('change', populateIncomeDetails);
		$('#income-detail').on('change', function () {
			$('#rab-rekening').val($(this).val());
		});
		$('#finance-category').on('change', function () {
			populateFinanceSubcategories('');
		});
		$('#finance-subcategory').on('change', function () {
			populateFinanceDetails('');
		});
		$('#finance-detail').on('change', function () {
			$('#rab-rekening').val($(this).val());
		});
		$('#btn-tampilkan-rab').on('click', loadRows);
		$('#btn-tambah-baris-rab').on('click', function () {
			addItem();
		});
		$('#rab-items').on('input', '.rab-volume, .rab-harga', function () {
			calculateTotal(true);
		});
		$('#rab-items').on('change', '.rab-pajak', function () {
			var row = $(this).closest('tr');
			row.data('tax-manual', !sameTaxIds($(this).val() || [], automaticTaxIds(row)));
			row.find('.rab-kembali-otomatis').toggle(Boolean(row.data('tax-manual')));
			calculateTotal(false);
		});
		$('#rab-items').on('click', '.rab-kembali-otomatis', function () {
			$(this).closest('tr').data('tax-manual', false);
			calculateTotal(true);
		});
		$('#rab-items').on('click', '.rab-hapus-baris', function () {
			$(this).closest('tr').remove();
			calculateTotal(false);
		});
		$('#rab-items').on('click', '.rab-tambah-baris', function () {
			addItem();
		});
		$('#btn-reset-rab').on('click', resetForm);

		$('#btn-simpan-rab').on('click', function () {
			var tahun = $('#rab-tahun').val();
			var pos = $('#rab-pos').val();
			var rows = $('#rab-items tr');
			var items = [];
			if (!/^\d{4}$/.test(tahun) || !$('#rab-rekening').val() || !rows.length) {
				notify('error', 'Isi tahun, rekening, dan minimal satu baris rincian.');
				return;
			}
			if (pos === '5.BELANJA' &&
				(!$('#rab-bidang').val() || !$('#rab-sub-bidang').val() || !$('#rab-kegiatan').val()
					|| !$('#rab-klasifikasi-belanja').val()
					|| ((!$('#rab-bulan-mulai').val() || !$('#rab-bulan-selesai').val())
						&& !$('#rab-waktu-pelaksanaan').val()))) {
				notify('error', 'Lengkapi bidang, sub bidang, kegiatan, jenis belanja, dan waktu pelaksanaan.');
				return;
			}
			if ((expenseInput || expenseView) && $('#rab-klasifikasi-belanja').val() !== String($('#rab-rekening').val() || '').substring(0, 3)) {
				notify('error', 'Pilih rekening rincian yang sesuai dengan jenis belanja.');
				return;
			}
			if (pos === '5.BELANJA' && rows.filter(function () {
				return $(this).data('tax-rate-valid') === false;
			}).length) {
				notify('error', 'Jumlah tarif pajak dan potongan per item tidak boleh melebihi 100%.');
				return;
			}

			var valid = true;
			rows.each(function () {
				var row = $(this);
				row.find(':input').each(function () {
					if (!this.reportValidity()) {
						valid = false;
						return false;
					}
				});
				if (!valid) {
					return false;
				}
				items.push({
					id: row.find('.rab-item-id').val(),
					keterangan: row.find('.rab-keterangan').val(),
					volume: row.find('.rab-volume').val(),
					satuan: row.find('.rab-satuan').val(),
					harga_satuan: row.find('.rab-harga').val(),
					sumber_dana: row.find('.rab-sumber-dana').val(),
					pajak_manual: row.data('tax-manual') ? 1 : 0,
					pajak_ids: row.find('.rab-pajak').val() || []
				});
			});
			if (!valid) {
				return;
			}

			var tahap = $('#rab-tahap').val();
			var bidang = $('#rab-bidang').val();
			var subBidang = $('#rab-sub-bidang').val();
			var kegiatan = $('#rab-kegiatan').val();

			$.ajax({
				url: api.save,
				type: 'POST',
				dataType: 'json',
				data: $.extend({
					id: $('#rab-id').val(),
					tahun: tahun,
					tahap: $('#rab-tahap').val(),
					pos: pos,
					kd_bidang: $('#rab-bidang').val(),
					kd_sub_bidang: $('#rab-sub-bidang').val(),
					kd_kegiatan: $('#rab-kegiatan').val(),
					kegiatan_sumber: $('#rab-kegiatan-sumber').val(),
					kd_rekening: $('#rab-rekening').val(),
					klasifikasi_belanja: $('#rab-klasifikasi-belanja').val(),
					output: $('#rab-output').val(),
					bulan_mulai: $('#rab-bulan-mulai').val(),
					bulan_selesai: $('#rab-bulan-selesai').val(),
					waktu_pelaksanaan: $('#rab-waktu-pelaksanaan').val(),
					penerima_laki: $('#rab-penerima-laki').val(),
					penerima_perempuan: $('#rab-penerima-perempuan').val(),
					penerima_rtm: $('#rab-penerima-rtm').val(),
					lokasi: $('#rab-lokasi').val(),
					target_sdgs: $('#rab-target-sdgs').val(),
					pka: $('#rab-pka').val(),
					tpk: $('#rab-tpk').val(),
					data_eksisting: $('#rab-data-eksisting').val(),
					target_tahun_depan: $('#rab-target-tahun-depan').val(),
					volume_rencana: $('#rab-volume-rencana').val(),
					satuan_rencana: $('#rab-satuan-rencana').val(),
					nama_paket: $('#rab-nama-paket').val(),
					kode_paket: $('#rab-kode-paket').val(),
					rincian: JSON.stringify(items)
				}, csrfData())
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				$('#filter-tahun').val(tahun);
				$('#filter-tahap').val(tahap);
				$('#filter-pos').val(pos);
				$('#filter-bidang').val(pos === '5.BELANJA' ? bidang : '').trigger('change');
				if (pos === '5.BELANJA') {
					$('#filter-sub-bidang').val(subBidang).trigger('change');
					$('#filter-kegiatan').val(kegiatan);
				}
				resetForm();
				if (expenseInput || incomeInput || financeInput) {
					$('#rab-list-section').hide();
				} else {
					loadRows();
				}
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal menyimpan rincian anggaran'));
			});
		});

		$('#btn-finance-copy').on('click', function () {
			var sourceId = $('#finance-source-rab').val();
			if (!sourceId) {
				notify('error', 'Pilih anggaran Murni Pembiayaan yang akan diimpor.');
				return;
			}
			if (financeView) {
				var targetYear = Number($('#finance-sidebar-year').val()) || globalYear;
				if (!window.confirm('Salin rincian Pembiayaan tahun lalu ke tahun anggaran ' + targetYear + '?')) {
					return;
				}
				$.ajax({
					url: api.copy_previous_year,
					type: 'POST',
					dataType: 'json',
					data: $.extend({ id: sourceId, tahun: targetYear, pos: '6.PEMBIAYAAN' }, csrfData())
				}).done(function (response) {
					refreshCsrf(response);
					notify('success', response.message);
					$('#finance-source-wrap').hide();
					loadRows();
				}).fail(function (xhr) {
					notify('error', requestError(xhr, 'Gagal mengimpor Pembiayaan tahun lalu'));
				});
				return;
			}
			$.ajax({
				url: api.copy + '/' + encodeURIComponent(sourceId),
				type: 'POST',
				dataType: 'json',
				data: csrfData()
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				$('#finance-source-wrap').hide();
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal menyalin anggaran Murni Pembiayaan'));
			});
		});

		$('#rab-daftar').on('click', '.rab-edit', function () {
			loadForEdit($(this).data('id'));
		});
		$('#rab-daftar').on('click', '.rab-add-detail', function () {
			loadForEdit($(this).data('id'), true);
		});
		$('#rab-daftar').on('click', '.rab-edit-item', function () {
			loadForEdit($(this).data('rab-id'), false, $(this).data('item-id'));
		});
		$('#rab-daftar').on('click', '.rab-delete-item', function () {
			var rabId = $(this).data('rab-id');
			var itemId = $(this).data('item-id');
			if (!window.confirm('Hapus rincian item ini?')) {
				return;
			}
			$.ajax({
				url: api.delete_item + '/' + encodeURIComponent(rabId) + '/' + encodeURIComponent(itemId),
				type: 'POST',
				dataType: 'json',
				data: csrfData()
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal menghapus rincian item'));
			});
		});
		$('#rab-daftar').on('click', '.rab-view', function () {
			$.getJSON(api.get + '/' + encodeURIComponent($(this).data('id'))).done(function (rab) {
				var rows = '';
				(rab.rincian || []).forEach(function (item) {
					rows += '<tr>' +
						'<td>' + escapeHtml(item.keterangan) + '</td>' +
						'<td class="text-right">' + escapeHtml(item.volume) + '</td>' +
						'<td>' + escapeHtml(item.satuan) + '</td>' +
						'<td class="text-right">' + escapeHtml(tableMoney(item.harga_satuan)) + '</td>' +
						'<td>' + escapeHtml(item.sumber_dana) + '</td>' +
						'<td class="text-right">' + escapeHtml(tableMoney(Number(item.volume) * Number(item.harga_satuan))) + '</td>' +
						'</tr>';
				});
				$('#finance-rab-detail-items').html(rows || '<tr><td colspan="6" class="text-center">Belum ada item rincian.</td></tr>');
				$('#finance-rab-detail').modal('show');
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal memuat rincian Pembiayaan'));
			});
		});
		$('#rab-daftar').on('click', '.rab-copy', function () {
			var id = $(this).data('id');
			if (!window.confirm('Salin rincian anggaran Murni ini ke P-APBDes?')) {
				return;
			}
			$.ajax({
				url: api.copy + '/' + encodeURIComponent(id),
				type: 'POST',
				dataType: 'json',
				data: csrfData()
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal menyalin anggaran'));
			});
		});
		function loadExpenseSources(year, targetSelector) {
			$.ajax({
				url: api.list,
				type: 'GET',
				dataType: 'json',
				data: { tahun: year, tahap: 'Murni', pos: '5.BELANJA' }
			}).done(function (rows) {
				var options = '<option value="">Pilih anggaran Murni</option>';
				rows.forEach(function (row) {
					options += '<option value="' + escapeHtml(row.id) + '">' +
						escapeHtml(row.tahun + ' - ' + row.nama_bidang + ' / ' +
							row.nama_kegiatan + ' - ' + row.kd_rekening + ' ' + row.nama_rekening) +
						'</option>';
				});
				$(targetSelector).html(options);
				if (!rows.length) {
					notify('info', 'Tidak ada rincian e-RAB Belanja Murni pada tahun ' + year + '.');
				}
			}).fail(function (xhr) {
				notify('error', xhr.responseJSON && xhr.responseJSON.message
					? xhr.responseJSON.message
					: 'Gagal memuat daftar e-RAB Belanja Murni');
			});
		}

		function loadFinanceSources(year) {
			$.ajax({
				url: api.list,
				type: 'GET',
				dataType: 'json',
				data: { tahun: year, tahap: 'Murni', pos: '6.PEMBIAYAAN' }
			}).done(function (rows) {
				var options = '<option value="">Pilih anggaran Murni</option>';
				rows.forEach(function (row) {
					options += '<option value="' + escapeHtml(row.id) + '">' +
						escapeHtml(row.tahun + ' - ' + row.kd_rekening + ' ' + row.nama_rekening) +
						'</option>';
				});
				$('#finance-source-rab').html(options);
				if (!rows.length) {
					notify('info', 'Tidak ada e-RAB Pembiayaan Murni pada tahun ' + year + '.');
				}
			}).fail(function (xhr) {
				notify('error', xhr.responseJSON && xhr.responseJSON.message
					? xhr.responseJSON.message
					: 'Gagal memuat anggaran Murni Pembiayaan');
			});
		}

		$('#btn-impor-anggaran-semula').on('click', function () {
			if (financeView || financeChange) {
				$('#finance-source-wrap').toggle();
				var selectedYear = Number($('#finance-sidebar-year').val()) || globalYear;
				var year = financeView
					? selectedYear - 1
					: selectedYear;
				loadFinanceSources(year);
				return;
			}
			if (expenseChange) {
				$('#expense-change-source').toggle();
				loadExpenseSources($('#filter-tahun').val() || globalYear, '#expense-change-source-rab');
				return;
			}
			var sourceId = $('#income-source-rab').val();
			if (!sourceId) {
				notify('error', 'Pilih anggaran Murni yang akan disalin.');
				return;
			}
			$.ajax({
				url: api.copy + '/' + encodeURIComponent(sourceId),
				type: 'POST',
				dataType: 'json',
				data: csrfData()
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal menyalin anggaran Murni'));
			});
		});

		$('#btn-konfirmasi-impor-semula').on('click', function () {
			var sourceId = $('#expense-change-source-rab').val();
			if (!sourceId) {
				notify('error', 'Pilih anggaran Murni yang akan disalin.');
				return;
			}
			$.ajax({
				url: api.copy + '/' + encodeURIComponent(sourceId),
				type: 'POST',
				dataType: 'json',
				data: csrfData()
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				$('#expense-change-source').hide();
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal mengimpor anggaran semula'));
			});
		});

		$('#btn-impor-tahun-lalu').on('click', function () {
			var targetYear = globalYear;
			$('#expense-import-message').text('Sumber impor hanya mengambil rincian e-RAB Belanja Murni tahun ' +
				(targetYear - 1) + ', bukan rekap historis yang tidak menyimpan rincian paket.').show();
			$('#expense-import-source').toggle();
			loadExpenseSources(targetYear - 1, '#expense-source-rab');
		});

		$('#btn-konfirmasi-impor-tahun-lalu').on('click', function () {
			var sourceId = $('#expense-source-rab').val();
			if (!sourceId) {
				notify('error', 'Pilih rincian anggaran tahun lalu yang akan diimpor.');
				return;
			}
			if (!window.confirm('Salin rincian e-RAB Murni tahun lalu sebagai anggaran baru tahun ' +
				globalYear + '?')) {
				return;
			}
			$.ajax({
				url: api.copy_previous_year,
				type: 'POST',
				dataType: 'json',
				data: $.extend({
					id: sourceId,
					tahun: globalYear,
					pos: '5.BELANJA'
				}, csrfData())
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				$('#expense-import-source').hide();
				$('#filter-tahun').val(globalYear);
				$('#filter-tahap').val('Murni');
				$('#filter-pos').val('5.BELANJA');
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal mengimpor anggaran tahun lalu'));
			});
		});
		$('#rab-daftar').on('click', '.rab-delete', function () {
			var id = $(this).data('id');
			if (!window.confirm('Hapus rincian anggaran ini beserta semua itemnya?')) {
				return;
			}
			$.ajax({
				url: api.delete + '/' + encodeURIComponent(id),
				type: 'POST',
				dataType: 'json',
				data: csrfData()
			}).done(function (response) {
				refreshCsrf(response);
				notify('success', response.message);
				loadRows();
			}).fail(function (xhr) {
				notify('error', requestError(xhr, 'Gagal menghapus rincian anggaran'));
			});
		});

		$('#filter-tahun').val(globalYear);
		if (initialPos) {
			$('#filter-pos').val(initialPos);
		}
		if (initialMode === 'perubahan') {
			$('#filter-tahap').val('Perubahan');
		}
		if (expenseView || expenseChange) {
			$('#filter-tahun').val(globalYear);
			$('#filter-tahap').val(expenseChange ? 'Perubahan' : 'Murni');
			$('#filter-pos').val(initialPos);
		}
		populateSubBidang('filter', '', '');
		resetForm();
		if (incomeInput) {
			populateIncomeCategories();
			$('#rab-list-section').hide();
		}
		if (incomeView) {
			$('#filter-pos').val(initialPos);
		}
		if (incomeChange) {
			$('#filter-pos').val(initialPos);
			$.ajax({
				url: api.list,
				type: 'GET',
				dataType: 'json',
				data: { tahun: $('#income-year').val(), tahap: 'Murni', pos: initialPos }
			}).done(function (rows) {
				var options = '<option value="">Pilih anggaran Murni</option>';
				rows.forEach(function (row) {
					options += '<option value="' + escapeHtml(row.id) + '">' +
						escapeHtml(row.tahun + ' - ' + row.kd_rekening + ' ' + row.nama_rekening) +
						'</option>';
				});
				$('#income-source-rab').html(options);
			}).fail(function (xhr) {
				notify('error', xhr.responseJSON && xhr.responseJSON.message
					? xhr.responseJSON.message
					: 'Gagal memuat daftar anggaran Murni');
			});
			$('#filter-tahun').val($('#income-year').val() || '');
			$('#filter-tahap').val('Perubahan');
		}
		if (initialPos) {
			$('#rab-pos').val(initialPos).trigger('change');
		}
		loadRows();
	});
})(jQuery);
