(function ($) {
	'use strict';

	$(function () {
		var page = $('#rab-detail-page');
		if (!page.length) {
			return;
		}

		var api = JSON.parse(page.attr('data-api'));
		var references = JSON.parse(page.attr('data-references'));
		var funds = references.sumber_dana || [];
		var taxes = references.pajak || [];

		function escapeHtml(value) {
			return $('<div>').text(value == null ? '' : String(value)).html();
		}

		function notify(type, message) {
			if (typeof notification === 'function') {
				notification(type, message);
			} else {
				window.alert(message);
			}
		}

		function csrfData() {
			var name = page.attr('data-csrf-name');
			var value = name && $.cookie ? $.cookie(name) : '';
			if (!value && typeof getCsrfToken === 'function') {
				value = getCsrfToken();
			}
			if (!value) {
				value = page.attr('data-csrf-value') || '';
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
		}

		function money(value) {
			return (Number(value) || 0).toLocaleString('id-ID', {
				minimumFractionDigits: 2,
				maximumFractionDigits: 2
			});
		}

		function selectedTaxIds(row) {
			return (row.find('.rab-detail-tax').val() || []).map(String).sort();
		}

		function automaticTaxIds(row) {
			var amount = (Number(row.find('.rab-detail-volume').val()) || 0) *
				(Number(row.find('.rab-detail-price').val()) || 0);
			amount = Math.round(amount * 100) / 100;

			return row.find('.rab-detail-tax option').filter(function () {
				var threshold = $(this).attr('data-threshold');
				return threshold !== undefined && threshold !== '' && amount > Number(threshold);
			}).map(function () {
				return String(this.value);
			}).get().sort();
		}

		function sameTaxIds(left, right) {
			return left.map(String).sort().join(',') === right.map(String).sort().join(',');
		}

		function recalculate(selectAutomaticTaxes) {
			var grossTotal = 0;
			var taxTotal = 0;
			$('#rab-detail-items tr').each(function () {
				var row = $(this);
				var gross = (Number(row.find('.rab-detail-volume').val()) || 0) *
					(Number(row.find('.rab-detail-price').val()) || 0);
				if (selectAutomaticTaxes && !row.data('tax-manual')) {
					row.find('.rab-detail-tax').val(automaticTaxIds(row));
				}

				var taxAmount = 0;
				var totalRate = 0;
				row.find('.rab-detail-tax option:selected').each(function () {
					var rate = Number($(this).attr('data-percent')) || 0;
					totalRate += rate;
					taxAmount += Math.round(gross * rate) / 100;
				});
				taxAmount = Math.round(taxAmount * 100) / 100;
				row.find('.rab-detail-gross').text(money(gross));
				row.find('.rab-detail-tax-amount').text(money(taxAmount));
				row.find('.rab-detail-net').text(money(gross - taxAmount));
				row.find('.rab-detail-tax-warning').toggle(totalRate > 100);
				row.find('.rab-detail-auto-tax').toggle(Boolean(row.data('tax-manual')));
				row.data('tax-rate-valid', totalRate <= 100);
				grossTotal += gross;
				taxTotal += taxAmount;
			});
			$('#rab-detail-total').text(money(grossTotal));
			$('#rab-detail-tax-total').text(money(taxTotal));
			$('#rab-detail-net-total').text(money(grossTotal - taxTotal));
		}

		function updateRemoveButtons() {
			var rows = $('#rab-detail-items tr');
			rows.find('.rab-detail-remove').prop('disabled', rows.length < 2);
		}

		function addRow() {
			var fundOptions = '<option value="">Pilih</option>';
			funds.forEach(function (fund) {
				var code = fund.kode || fund.nama;
				fundOptions += '<option value="' + escapeHtml(code) + '">' +
					escapeHtml(code + (fund.nama && fund.nama !== code ? ' — ' + fund.nama : '')) + '</option>';
			});
			var taxOptions = taxes.map(function (tax) {
				var threshold = tax.batas_otomatis == null ? '' : Number(tax.batas_otomatis);
				return '<option value="' + escapeHtml(tax.id) + '" data-percent="' +
					escapeHtml(tax.persentase) + '" data-threshold="' + escapeHtml(threshold) + '">' +
					escapeHtml(tax.nama + ' (' + tax.persentase + '%)') + '</option>';
			}).join('');
			var taxSelector = taxOptions
				? '<select class="form-control rab-detail-tax" multiple size="3" aria-label="Pilih pajak dan potongan">' +
					taxOptions + '</select>'
				: '<select class="form-control rab-detail-tax" multiple disabled aria-label="Pilih pajak dan potongan"><option>Tidak ada pajak aktif</option></select>';
			var row = $('<tr>' +
				'<td><input type="text" class="form-control rab-detail-description" maxlength="255" placeholder="Keterangan" required></td>' +
				'<td><input type="number" class="form-control rab-detail-volume" min="0" step="0.0001" placeholder="Volume" required></td>' +
				'<td><input type="text" class="form-control rab-detail-unit" maxlength="50" placeholder="Satuan"></td>' +
				'<td><input type="number" class="form-control rab-detail-price" min="0" step="0.01" placeholder="Harga" required></td>' +
				'<td><select class="form-control rab-detail-fund" required>' + fundOptions + '</select></td>' +
				'<td class="text-right rab-detail-gross">0,00</td>' +
				'<td>' + taxSelector + '<small class="text-danger rab-detail-tax-warning" style="display:none;">Tarif melebihi 100%.</small>' +
				'<button type="button" class="btn btn-link btn-xs rab-detail-auto-tax" style="display:none;">Otomatis</button></td>' +
				'<td class="text-right rab-detail-tax-amount">0,00</td>' +
				'<td class="text-right rab-detail-net">0,00</td>' +
				'<td class="text-nowrap"><button type="button" class="btn btn-success btn-xs rab-detail-add"><i class="fa fa-plus"></i> Tambah</button> ' +
				'<button type="button" class="btn btn-danger btn-xs rab-detail-remove" title="Hapus baris"><i class="fa fa-trash"></i></button></td>' +
				'</tr>');
			row.data('tax-manual', false);
			$('#rab-detail-items').append(row);
			updateRemoveButtons();
			recalculate(true);
		}

		$('#rab-detail-items').on('click', '.rab-detail-add', addRow);
		$('#rab-detail-items').on('click', '.rab-detail-remove', function () {
			if ($('#rab-detail-items tr').length > 1) {
				$(this).closest('tr').remove();
				updateRemoveButtons();
				recalculate(false);
			}
		});
		$('#rab-detail-items').on('input', '.rab-detail-volume, .rab-detail-price', function () {
			recalculate(true);
		});
		$('#rab-detail-items').on('change', '.rab-detail-tax', function () {
			var row = $(this).closest('tr');
			row.data('tax-manual', !sameTaxIds(selectedTaxIds(row), automaticTaxIds(row)));
			recalculate(false);
		});
		$('#rab-detail-items').on('click', '.rab-detail-auto-tax', function () {
			$(this).closest('tr').data('tax-manual', false);
			recalculate(true);
		});
		$('#btn-simpan-rab-detail').on('click', function () {
			var items = [];
			var valid = true;
			$('#rab-detail-items tr').each(function () {
				var row = $(this);
				row.find('input, select').each(function () {
					if (!this.reportValidity()) {
						valid = false;
						return false;
					}
				});
				if (!valid) {
					return false;
				}
				if (row.data('tax-rate-valid') === false) {
					notify('error', 'Jumlah tarif pajak dan potongan per item tidak boleh melebihi 100%.');
					valid = false;
					return false;
				}
				items.push({
					keterangan: row.find('.rab-detail-description').val(),
					volume: row.find('.rab-detail-volume').val(),
					satuan: row.find('.rab-detail-unit').val(),
					harga_satuan: row.find('.rab-detail-price').val(),
					sumber_dana: row.find('.rab-detail-fund').val(),
					pajak_manual: row.data('tax-manual') ? 1 : 0,
					pajak_ids: selectedTaxIds(row)
				});
			});
			if (!valid) {
				return;
			}

			$('#rab-detail-error').hide().empty();
			$('#btn-simpan-rab-detail').prop('disabled', true);
			$.ajax({
				url: api.save,
				type: 'POST',
				dataType: 'json',
				data: $.extend({rincian: JSON.stringify(items)}, csrfData())
			}).done(function (response) {
				refreshCsrf(response);
				if (!response.redirect_url) {
					notify('error', 'Respons penyimpanan tidak menyediakan alamat kembali.');
					$('#btn-simpan-rab-detail').prop('disabled', false);
					return;
				}
				window.location.href = response.redirect_url;
			}).fail(function (xhr) {
				var message = xhr.responseJSON && xhr.responseJSON.message
					? xhr.responseJSON.message
					: 'Gagal menyimpan rincian anggaran.';
				refreshCsrf(xhr.responseJSON);
				$('#rab-detail-error').text(message).show();
				notify('error', message);
				$('#btn-simpan-rab-detail').prop('disabled', false);
			});
		});

		addRow();
	});
})(jQuery);
