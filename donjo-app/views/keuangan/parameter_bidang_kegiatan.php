<?php

defined('BASEPATH') || exit('No direct script access allowed');

$jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;
$typeIcons = [
    'bidang' => 'fa-building',
    'sub_bidang' => 'fa-folder-open-o',
    'kegiatan' => 'fa-tasks',
];
$parentOptions = static function (array $rows, string $parentType): string {
    $html = '';
    foreach ($rows as $row) {
        $html .= '<option data-parent-type="' . html_escape($parentType) . '" value="' . (int) $row['id'] . '">'
            . html_escape(trim(($row['kode'] ?? '') . ' ' . $row['nama'])) . '</option>';
    }

    return $html;
};

?>
<div class="content-wrapper">
	<style>
		#parameter-rab-page .box {
			overflow: hidden;
			border: 0;
			border-radius: 10px;
			box-shadow: 0 3px 14px rgba(30, 55, 80, .08);
		}
		#parameter-rab-page .box-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 16px;
			padding: 18px 20px;
			border-bottom: 1px solid #edf1f5;
		}
		#parameter-rab-page .box-header:before,
		#parameter-rab-page .box-header:after {
			display: none;
		}
		#parameter-rab-page .parameter-heading {
			display: flex;
			align-items: center;
			gap: 12px;
		}
		#parameter-rab-page .parameter-heading-icon {
			display: inline-flex;
			width: 42px;
			height: 42px;
			align-items: center;
			justify-content: center;
			border-radius: 12px;
			background: #eaf5ff;
			color: #2585c5;
			font-size: 19px;
		}
		#parameter-rab-page .parameter-heading-copy .box-title {
			display: block;
			margin-bottom: 3px;
			font-size: 17px;
			font-weight: 600;
		}
		#parameter-rab-page .parameter-heading-copy small {
			color: #8995a3;
		}
		#parameter-rab-page .parameter-header-actions {
			display: flex;
			align-items: center;
			gap: 8px;
			margin-top: 5px;
		}
		#parameter-rab-page .parameter-export-actions {
			display: inline-flex;
			gap: 5px;
		}
		#parameter-rab-page .parameter-export-actions .btn,
		#parameter-rab-page .parameter-add-button {
			border-radius: 7px;
			padding: 7px 10px;
			transition: transform .15s ease, box-shadow .15s ease;
		}
		#parameter-rab-page .parameter-export-actions .btn:hover,
		#parameter-rab-page .parameter-add-button:hover {
			transform: translateY(-1px);
			box-shadow: 0 3px 9px rgba(30, 55, 80, .12);
		}
		#parameter-rab-page .parameter-export-pdf { color: #d65b5b; }
		#parameter-rab-page .parameter-export-excel { color: #319568; }
		#parameter-rab-page .parameter-export-csv { color: #5182bb; }
		#parameter-rab-page .parameter-add-button {
			border: 0;
			background: #2585c5;
		}
		#parameter-rab-page .box-body {
			padding: 20px;
		}
		#parameter-rab-page .parameter-import-card {
			display: flex;
			align-items: flex-start;
			gap: 16px;
			margin-bottom: 22px;
			padding: 18px;
			border: 1px solid #dcecf8;
			border-radius: 10px;
			background: linear-gradient(120deg, #f3f9ff 0%, #fbfdff 70%);
		}
		#parameter-rab-page .parameter-import-icon {
			display: inline-flex;
			width: 46px;
			height: 46px;
			flex: 0 0 46px;
			align-items: center;
			justify-content: center;
			border-radius: 13px;
			background: #e0f0ff;
			color: #3284bd;
			font-size: 20px;
		}
		#parameter-rab-page .parameter-import-content {
			min-width: 0;
			flex: 1;
		}
		#parameter-rab-page .parameter-import-title {
			margin: 1px 0 5px;
			color: #35495e;
			font-size: 15px;
			font-weight: 600;
		}
		#parameter-rab-page .parameter-import-description {
			margin-bottom: 12px;
			color: #748292;
			line-height: 1.65;
		}
		#parameter-rab-page .parameter-import-description code {
			padding: 2px 5px;
			border-radius: 4px;
			background: #e8f1f8;
			color: #37688d;
		}
		#parameter-rab-page .parameter-import-actions {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 9px;
		}
		#parameter-rab-page .parameter-file-input {
			max-width: 100%;
			min-height: 34px;
			padding: 5px 8px;
			border: 1px solid #d4e0ea;
			border-radius: 6px;
			background: #fff;
		}
		#parameter-rab-page .parameter-template-link {
			display: inline-flex;
			align-items: center;
			gap: 6px;
			padding: 7px 10px;
			border: 1px solid #d7e6f1;
			border-radius: 6px;
			background: #fff;
			color: #397ba8;
			font-size: 12px;
			font-weight: 600;
		}
		#parameter-rab-page .parameter-template-link:hover {
			border-color: #9dc8e5;
			background: #fafdff;
			text-decoration: none;
		}
		#parameter-rab-page .parameter-import-submit {
			border-radius: 6px;
			padding: 7px 12px;
		}
		#parameter-rab-page .parameter-import-note {
			margin: 9px 0 0;
			color: #93a0ad;
			font-size: 12px;
		}
		#parameter-rab-page .parameter-form-panel {
			border: 1px solid #dcecf8;
			border-radius: 9px;
			box-shadow: 0 4px 14px rgba(30, 55, 80, .06);
		}
		#parameter-rab-page .parameter-form-panel .panel-heading {
			border-radius: 8px 8px 0 0;
			background: #f5f9fc;
			color: #40566b;
		}
		#parameter-rab-page .parameter-toolbar {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			margin-bottom: 12px;
			color: #7d8996;
			font-size: 13px;
		}
		#parameter-rab-page .parameter-toolbar label { margin: 0; font-weight: 400; }
		#parameter-rab-page .parameter-toolbar select,
		#parameter-rab-page .parameter-toolbar input {
			border-color: #dce3e9;
			border-radius: 6px;
			box-shadow: none;
		}
		#parameter-rab-page .parameter-search-wrap {
			position: relative;
		}
		#parameter-rab-page .parameter-search-wrap .fa-search {
			position: absolute;
			top: 9px;
			left: 10px;
			color: #a0acb7;
		}
		#parameter-rab-page #parameter-search {
			width: 190px;
			padding-left: 29px;
		}
		#parameter-rab-page .table-responsive {
			border: 1px solid #e8edf1;
			border-radius: 8px;
		}
		#parameter-rab-page #tabel-parameter-rab {
			margin-bottom: 0;
		}
		#parameter-rab-page #tabel-parameter-rab > thead > tr > th {
			padding: 12px 14px;
			border-bottom: 1px solid #e4eaf0;
			background: #f7f9fb;
			color: #687889;
			font-size: 12px;
			font-weight: 600;
			letter-spacing: .2px;
		}
		#parameter-rab-page #tabel-parameter-rab > tbody > tr > td {
			padding: 11px 14px;
			border-top-color: #eef1f4;
			color: #566575;
			vertical-align: middle;
		}
		#parameter-rab-page #tabel-parameter-rab > tbody > tr:hover > td {
			background: #f8fbfd;
		}
		#parameter-rab-page .parameter-row-number {
			color: #9aa6b2 !important;
		}
		#parameter-rab-page .parameter-code {
			display: inline-block;
			padding: 3px 7px;
			border: 1px solid #e6edf2;
			border-radius: 5px;
			background: #f7f9fb;
			color: #586d80;
			font-family: monospace;
			font-size: 12px;
		}
		#parameter-rab-page .parameter-name {
			display: inline-flex;
			align-items: center;
			gap: 8px;
		}
		#parameter-rab-page .parameter-type-icon {
			width: 17px;
			color: #86a1b7;
			text-align: center;
		}
		#parameter-rab-page .parameter-field-name {
			color: #354b5f;
			font-weight: 600;
		}
		#parameter-rab-page .parameter-edit-button,
		#parameter-rab-page .parameter-delete-button {
			border-radius: 5px;
		}
		#parameter-rab-page .parameter-edit-button { border-color: #f0dfb8; }
		#parameter-rab-page .parameter-delete-button { border-color: #f0d0d0; }
		#parameter-rab-page .parameter-empty-state {
			padding: 34px 15px !important;
			color: #8a98a6 !important;
			text-align: center;
		}
		#parameter-rab-page .parameter-empty-state .fa {
			display: block;
			margin-bottom: 10px;
			color: #b7c9d8;
			font-size: 30px;
		}
		#parameter-rab-page .parameter-empty-state strong {
			display: block;
			margin-bottom: 4px;
			color: #647789;
			font-size: 14px;
		}
		#parameter-rab-page #parameter-page-info {
			color: #93a0ad;
			font-size: 12px;
		}
		#parameter-rab-page .pagination > li > a {
			margin-left: 3px;
			border-radius: 5px;
		}
		@media (max-width: 767px) {
			#parameter-rab-page .box-header {
				display: flex;
				align-items: flex-start;
				flex-direction: column;
				gap: 14px;
			}
			#parameter-rab-page .parameter-header-actions {
				align-items: flex-start;
				flex-wrap: wrap;
				margin-top: 0;
			}
			#parameter-rab-page .box-body { padding: 14px; }
			#parameter-rab-page .parameter-import-card { gap: 11px; padding: 14px; }
			#parameter-rab-page .parameter-import-icon { width: 38px; height: 38px; flex-basis: 38px; }
			#parameter-rab-page .parameter-toolbar { align-items: flex-start; flex-direction: column; }
			#parameter-rab-page #parameter-search { width: 100%; }
		}
	</style>
	<section class="content-header">
		<h1>Bidang/Sub Bidang/Kegiatan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/manual_apbdes') ?>">Parameter</a></li>
			<li class="active">Bidang dan Kegiatan</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
	<div id="parameter-rab-page">
		<div class="box box-info">
			<div class="box-header with-border">
				<div class="parameter-heading">
					<span class="parameter-heading-icon"><i class="fa fa-sitemap"></i></span>
					<div class="parameter-heading-copy">
						<h3 class="box-title">Parameter Bidang dan Kegiatan</h3>
						<small>Kelola struktur referensi anggaran kalurahan</small>
					</div>
				</div>
				<div class="parameter-header-actions">
					<?php if ($can_export): ?>
						<div class="parameter-export-actions">
							<a href="<?= site_url('keuangan_manual/ekspor_parameter_rab/pdf') ?>" class="btn btn-default btn-sm parameter-export-pdf" title="Ekspor PDF"><i class="fa fa-file-pdf-o"></i> PDF</a>
							<a href="<?= site_url('keuangan_manual/ekspor_parameter_rab/xlsx') ?>" class="btn btn-default btn-sm parameter-export-excel" title="Ekspor Excel"><i class="fa fa-file-excel-o"></i> Excel</a>
							<a href="<?= site_url('keuangan_manual/ekspor_parameter_rab/csv') ?>" class="btn btn-default btn-sm parameter-export-csv" title="Ekspor CSV"><i class="fa fa-download"></i> CSV</a>
						</div>
					<?php endif; ?>
					<?php if ($can_edit): ?>
						<button type="button" class="btn btn-primary btn-sm parameter-add-button" id="btn-tambah-parameter">
							<i class="fa fa-plus-circle"></i> Tambah Parameter
						</button>
					<?php endif; ?>
				</div>
			</div>
			<div class="box-body">
				<?php if ($can_edit): ?>
					<div class="parameter-import-card">
						<span class="parameter-import-icon"><i class="fa fa-cloud-upload"></i></span>
						<div class="parameter-import-content">
							<h4 class="parameter-import-title">Impor data parameter</h4>
							<p class="parameter-import-description">Unggah berkas CSV atau Excel berisi kolom <code>jenis</code>, <code>kode</code>, <code>nama</code>, dan <code>kode_induk</code>. Jenis: <code>bidang</code>, <code>sub_bidang</code>, atau <code>kegiatan</code>. Kode induk Bidang dikosongkan; Sub Bidang merujuk Bidang dan Kegiatan merujuk Sub Bidang. Impor mengganti daftar aktif, data sebelumnya tetap tersimpan.</p>
							<form method="post" action="<?= site_url('keuangan_manual/parameter_rab') ?>" enctype="multipart/form-data">
								<input type="hidden" name="action" value="impor">
								<div class="parameter-import-actions">
									<a href="<?= site_url('keuangan_manual/template_parameter_rab') ?>" class="parameter-template-link"><i class="fa fa-file-text-o"></i> Unduh template</a>
									<label class="sr-only" for="parameter-file">Berkas CSV atau Excel</label>
									<input type="file" class="parameter-file-input" id="parameter-file" name="userfile" accept=".csv,.xlsx" required>
									<button type="submit" class="btn btn-success btn-sm parameter-import-submit"><i class="fa fa-upload"></i> Impor data</button>
								</div>
								<p class="parameter-import-note"><i class="fa fa-info-circle"></i> Maksimal 10 MB. Seluruh tingkat induk dan turunannya harus ada di dalam berkas.</p>
							</form>
						</div>
					</div>
					<div class="panel panel-default parameter-form-panel" id="parameter-form-panel" style="display:none;">
						<div class="panel-heading"><strong id="parameter-form-title">Tambah Parameter</strong></div>
						<div class="panel-body">
							<form method="post" action="<?= site_url('keuangan_manual/parameter_rab') ?>" id="form-parameter-rab">
								<input type="hidden" name="action" value="simpan">
								<input type="hidden" name="id" id="parameter-id" value="">
								<div class="row">
									<div class="col-md-4 form-group">
										<label for="parameter-jenis">Tingkatan</label>
										<select class="form-control" name="jenis" id="parameter-jenis" required>
											<?php foreach ($types as $key => $label): ?>
												<option value="<?= html_escape($key) ?>"><?= html_escape($label) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-4 form-group" id="parameter-parent-group">
										<label for="parameter-parent">Induk</label>
										<select class="form-control" name="parent_id" id="parameter-parent">
											<option value="">Pilih induk</option>
											<?= $parentOptions($parents['bidang'], 'bidang') ?>
											<?= $parentOptions($parents['sub_bidang'], 'sub_bidang') ?>
										</select>
										<p class="help-block" id="parameter-parent-help"></p>
									</div>
									<div class="col-md-4 form-group">
										<label for="parameter-kode">Kode</label>
										<input type="text" class="form-control" name="kode" id="parameter-kode" maxlength="50" required>
										<p class="help-block" id="parameter-kode-help"></p>
									</div>
									<div class="col-md-8 form-group">
										<label for="parameter-nama">Nama</label>
										<input type="text" class="form-control" name="nama" id="parameter-nama" maxlength="191" required>
									</div>
								</div>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								<button type="button" class="btn btn-default" id="btn-reset-parameter">Batal</button>
							</form>
						</div>
					</div>
				<?php endif; ?>

				<div class="parameter-toolbar">
					<label><i class="fa fa-list-ol"></i> Tampilkan
							<select class="form-control input-sm" id="parameter-page-size" style="width:auto;display:inline-block;">
								<option value="10">10</option>
								<option value="25">25</option>
								<option value="50">50</option>
								<option value="0">Semua</option>
							</select>
							baris per halaman
					</label>
					<label for="parameter-search">Cari parameter:
						<span class="parameter-search-wrap">
							<i class="fa fa-search"></i>
							<input type="search" class="form-control input-sm" id="parameter-search" autocomplete="off" placeholder="Kode atau nama...">
						</span>
						</label>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="tabel-parameter-rab">
						<thead>
							<tr>
								<th style="width:60px;">No</th>
								<th style="width:140px;"><i class="fa fa-hashtag"></i> Kode</th>
								<th><i class="fa fa-sitemap"></i> Bidang/Sub Bidang/Kegiatan</th>
								<?php if ($can_edit || $can_delete): ?><th style="width:150px;">Aksi</th><?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($parameters as $index => $parameter): ?>
								<tr data-search="<?= html_escape(mb_strtolower($parameter['kode_tampil'] . ' ' . $parameter['nama'] . ' ' . $types[$parameter['jenis']])) ?>">
									<td class="parameter-row-number"><?= $index + 1 ?></td>
									<td><span class="parameter-code"><?= html_escape($parameter['kode_tampil']) ?></span></td>
									<td>
										<span class="parameter-name">
											<i class="fa <?= html_escape($typeIcons[$parameter['jenis']] ?? 'fa-circle-o') ?> parameter-type-icon"></i>
											<span class="<?= $parameter['jenis'] === 'bidang' ? 'parameter-field-name' : '' ?>"><?= html_escape($parameter['nama']) ?></span>
										</span>
									</td>
									<?php if ($can_edit || $can_delete): ?>
										<td class="text-nowrap">
											<?php if ($can_edit): ?>
												<button type="button" class="btn btn-warning btn-xs parameter-edit-button btn-edit-parameter" title="Ubah parameter" aria-label="Ubah parameter" data-parameter="<?= html_escape(json_encode($parameter, $jsonFlags)) ?>">
													<i class="fa fa-pencil"></i>
												</button>
											<?php endif; ?>
											<?php if ($can_delete): ?>
												<form method="post" action="<?= site_url('keuangan_manual/parameter_rab') ?>" style="display:inline" data-confirm="Hapus parameter ini? Parameter induk yang masih memiliki turunan tidak dapat dihapus.">
													<input type="hidden" name="action" value="hapus">
													<input type="hidden" name="id" value="<?= (int) $parameter['id'] ?>">
													<button type="submit" class="btn btn-danger btn-xs parameter-delete-button" title="Hapus parameter" aria-label="Hapus parameter"><i class="fa fa-trash-o"></i></button>
												</form>
											<?php endif; ?>
										</td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
							<?php if ($parameters === []): ?>
								<tr><td colspan="<?= $can_edit || $can_delete ? '4' : '3' ?>" class="parameter-empty-state">
									<i class="fa fa-folder-open-o"></i>
									<strong>Belum ada data parameter</strong>
									<span>Tambahkan secara manual atau impor dari berkas Excel/CSV untuk mulai mengisi daftar ini.</span>
								</td></tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-sm-6"><span class="text-muted" id="parameter-page-info"></span></div>
					<div class="col-sm-6"><ul class="pagination pagination-sm pull-right" id="parameter-pagination" style="margin:0;"></ul></div>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
<script>
	(function () {
		'use strict';
		var table = document.getElementById('tabel-parameter-rab');
		if (!table) { return; }
		var rows = Array.prototype.slice.call(table.tBodies[0].rows).filter(function (row) {
			return row.hasAttribute('data-search');
		});
		var size = document.getElementById('parameter-page-size');
		var search = document.getElementById('parameter-search');
		var pagination = document.getElementById('parameter-pagination');
		var info = document.getElementById('parameter-page-info');
		var page = 1;
		function render() {
			var term = search.value.trim().toLocaleLowerCase();
			var matches = rows.filter(function (row) {
				return row.getAttribute('data-search').toLocaleLowerCase().indexOf(term) !== -1;
			});
			var pageSize = Number(size.value) || matches.length || 1;
			var pages = Math.max(1, Math.ceil(matches.length / pageSize));
			page = Math.min(page, pages);
			rows.forEach(function (row) { row.style.display = 'none'; });
			matches.forEach(function (row, index) {
				var visible = size.value === '0' || (index >= (page - 1) * pageSize && index < page * pageSize);
				if (visible) {
					row.style.display = '';
					row.querySelector('.parameter-row-number').textContent = String(index + 1);
				}
			});
			var first = matches.length ? (size.value === '0' ? 1 : (page - 1) * pageSize + 1) : 0;
			var last = size.value === '0' ? matches.length : Math.min(page * pageSize, matches.length);
			info.textContent = 'Menampilkan ' + first + ' sampai ' + last + ' dari ' + matches.length + ' data';
			pagination.innerHTML = '';
			if (size.value === '0' || pages < 2) { return; }
			for (var i = 1; i <= pages; i++) {
				if (pages > 9 && i > 5 && i < pages - 2 && Math.abs(i - page) > 1) {
					if (i === 6 || i === page + 2) {
						var ellipsis = document.createElement('li');
						ellipsis.className = 'disabled';
						ellipsis.innerHTML = '<span>...</span>';
						pagination.appendChild(ellipsis);
					}
					continue;
				}
				var item = document.createElement('li');
				if (i === page) { item.className = 'active'; }
				var link = document.createElement('a');
				link.href = '#';
				link.textContent = String(i);
				link.addEventListener('click', function (event) {
					event.preventDefault();
					page = Number(this.textContent);
					render();
				});
				item.appendChild(link);
				pagination.appendChild(item);
			}
		}
		size.addEventListener('change', function () { page = 1; render(); });
		search.addEventListener('input', function () { page = 1; render(); });
		render();
	})();
</script>
<?php if ($can_edit): ?>
	<script>
		(function ($) {
			'use strict';
			var allParentOptions = $('#parameter-parent option').clone();
			var parentTypes = {sub_bidang: 'bidang', kegiatan: 'sub_bidang'};
			function updateParentOptions(selected) {
				var type = $('#parameter-jenis').val();
				var parentType = parentTypes[type] || '';
				var select = $('#parameter-parent').empty().append(allParentOptions.filter('[value=""]').first().clone());
				if (parentType) {
					allParentOptions.filter('[data-parent-type="' + parentType + '"]').each(function () {
						select.append($(this).clone());
					});
					select.prop('required', true);
					$('#parameter-parent-group').show();
					$('#parameter-parent-help').text(type === 'sub_bidang' ? 'Pilih Bidang induk.' : 'Pilih Sub Bidang induk.');
				} else {
					select.prop('required', false);
					$('#parameter-parent-group').hide();
					$('#parameter-parent-help').text('');
				}
				$('#parameter-kode-help').text(type === 'bidang'
					? 'Isi nomor Bidang (contoh: 1) atau kode lengkap.'
					: (type === 'sub_bidang' ? 'Isi kode Sub Bidang (contoh: 1.1).' : 'Isi kode Kegiatan (contoh: 1.1.01).'));
				if (selected) { select.val(String(selected)); }
			}
			function showForm(title) {
				$('#parameter-form-title').text(title);
				$('#parameter-form-panel').show();
				$('#parameter-form-panel')[0].scrollIntoView({behavior: 'smooth', block: 'start'});
			}
			$('#btn-tambah-parameter').on('click', function () {
				$('#form-parameter-rab')[0].reset();
				$('#parameter-id').val('');
				$('#parameter-jenis').val('bidang');
				updateParentOptions('');
				showForm('Tambah Parameter');
			});
			$('#parameter-jenis').on('change', function () { updateParentOptions(''); });
			$('.btn-edit-parameter').on('click', function () {
				var row = JSON.parse($(this).attr('data-parameter'));
				$('#parameter-id').val(row.id);
				$('#parameter-jenis').val(row.jenis);
				updateParentOptions(row.parent_id);
				$('#parameter-kode').val(row.kode || '');
				$('#parameter-nama').val(row.nama || '');
				showForm('Ubah Parameter');
			});
			$('#btn-reset-parameter').on('click', function () {
				$('#form-parameter-rab')[0].reset();
				$('#parameter-id').val('');
				updateParentOptions('');
				$('#parameter-form-panel').hide();
			});
			updateParentOptions('');
		})(jQuery);
	</script>
<?php endif; ?>
