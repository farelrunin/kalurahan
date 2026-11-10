<?php

defined('BASEPATH') || exit('No direct script access allowed');

$jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;
$isOutput = $jenis === 'output';

?>
<div class="content-wrapper">
	<style>
		#rab-katalog-page .box {
			overflow: hidden;
			border: 0;
			border-radius: 10px;
			box-shadow: 0 3px 14px rgba(30, 55, 80, .08);
		}
		#rab-katalog-page .box-header {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 16px;
			padding: 18px 20px;
			border-bottom: 1px solid #edf1f5;
		}
		#rab-katalog-page .box-header:before,
		#rab-katalog-page .box-header:after { display: none; }
		#rab-katalog-page .catalog-heading {
			display: flex;
			align-items: center;
			gap: 12px;
		}
		#rab-katalog-page .catalog-heading-icon {
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
		#rab-katalog-page .catalog-heading .box-title {
			display: block;
			margin-bottom: 3px;
			font-size: 17px;
			font-weight: 600;
		}
		#rab-katalog-page .catalog-heading small { color: #8995a3; }
		#rab-katalog-page .catalog-header-actions,
		#rab-katalog-page .catalog-export-actions {
			display: flex;
			align-items: center;
			gap: 6px;
		}
		#rab-katalog-page .catalog-header-actions .btn {
			border-radius: 7px;
			padding: 7px 10px;
		}
		#rab-katalog-page .catalog-export-pdf { color: #d65b5b; }
		#rab-katalog-page .catalog-export-excel { color: #319568; }
		#rab-katalog-page .catalog-export-csv { color: #5182bb; }
		#rab-katalog-page .catalog-header-actions .btn-primary { border: 0; background: #2585c5; }
		#rab-katalog-page .box-body { padding: 20px; }
		#rab-katalog-page .catalog-import-card {
			display: flex;
			align-items: flex-start;
			gap: 14px;
			margin-bottom: 20px;
			padding: 16px;
			border: 1px solid #dcecf8;
			border-radius: 10px;
			background: linear-gradient(120deg, #f3f9ff 0%, #fbfdff 70%);
		}
		#rab-katalog-page .catalog-import-icon {
			display: inline-flex;
			width: 42px;
			height: 42px;
			flex: 0 0 42px;
			align-items: center;
			justify-content: center;
			border-radius: 12px;
			background: #e0f0ff;
			color: #3284bd;
			font-size: 18px;
		}
		#rab-katalog-page .catalog-import-content { flex: 1; min-width: 0; }
		#rab-katalog-page .catalog-import-content h4 {
			margin: 1px 0 5px;
			color: #35495e;
			font-size: 15px;
			font-weight: 600;
		}
		#rab-katalog-page .catalog-import-content p {
			margin: 0 0 10px;
			color: #748292;
			line-height: 1.6;
		}
		#rab-katalog-page .catalog-import-content code {
			padding: 2px 5px;
			border-radius: 4px;
			background: #e8f1f8;
			color: #37688d;
		}
		#rab-katalog-page .catalog-import-actions {
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			gap: 8px;
		}
		#rab-katalog-page .catalog-template-link,
		#rab-katalog-page .catalog-file-input {
			min-height: 34px;
			padding: 7px 9px;
			border: 1px solid #d7e6f1;
			border-radius: 6px;
			background: #fff;
		}
		#rab-katalog-page .catalog-template-link {
			color: #397ba8;
			font-size: 12px;
			font-weight: 600;
		}
		#rab-katalog-page .catalog-template-link:hover { text-decoration: none; background: #fafdff; }
		#rab-katalog-page .catalog-note { margin: 8px 0 0 !important; color: #93a0ad !important; font-size: 12px; }
		#rab-katalog-page .catalog-form-panel {
			border: 1px solid #dcecf8;
			border-radius: 9px;
			box-shadow: 0 4px 14px rgba(30, 55, 80, .06);
		}
		#rab-katalog-page .catalog-form-panel .panel-heading {
			border-radius: 8px 8px 0 0;
			background: #f5f9fc;
			color: #40566b;
		}
		#rab-katalog-page .catalog-toolbar {
			display: flex;
			align-items: center;
			justify-content: space-between;
			gap: 12px;
			margin-bottom: 12px;
			color: #7d8996;
			font-size: 13px;
		}
		#rab-katalog-page .catalog-toolbar label { margin: 0; font-weight: 400; }
		#rab-katalog-page .catalog-toolbar select,
		#rab-katalog-page .catalog-toolbar input { border-color: #dce3e9; border-radius: 6px; box-shadow: none; }
		#rab-katalog-page .catalog-search { position: relative; }
		#rab-katalog-page .catalog-search .fa-search { position: absolute; top: 9px; left: 10px; color: #a0acb7; }
		#rab-katalog-page #catalog-search-input { width: 190px; padding-left: 29px; }
		#rab-katalog-page .table-responsive { border: 1px solid #e8edf1; border-radius: 8px; }
		#rab-katalog-page #catalog-table { margin-bottom: 0; }
		#rab-katalog-page #catalog-table > thead > tr > th {
			padding: 12px 14px;
			border-bottom: 1px solid #e4eaf0;
			background: #f7f9fb;
			color: #687889;
			font-size: 12px;
			font-weight: 600;
		}
		#rab-katalog-page #catalog-table > tbody > tr > td {
			padding: 11px 14px;
			border-top-color: #eef1f4;
			color: #566575;
			vertical-align: middle;
		}
		#rab-katalog-page #catalog-table > tbody > tr:hover > td { background: #f8fbfd; }
		#rab-katalog-page .catalog-code {
			display: inline-block;
			padding: 3px 7px;
			border: 1px solid #e6edf2;
			border-radius: 5px;
			background: #f7f9fb;
			color: #586d80;
			font-family: monospace;
			font-size: 12px;
		}
		#rab-katalog-page .catalog-actions .btn { border-radius: 5px; }
		#rab-katalog-page .catalog-actions form { display: inline; }
		#rab-katalog-page .catalog-empty {
			padding: 34px 15px !important;
			color: #8a98a6 !important;
			text-align: center;
		}
		#rab-katalog-page .catalog-empty .fa {
			display: block;
			margin-bottom: 10px;
			color: #b7c9d8;
			font-size: 30px;
		}
		#rab-katalog-page .catalog-empty strong {
			display: block;
			margin-bottom: 4px;
			color: #647789;
			font-size: 14px;
		}
		#rab-katalog-page .catalog-footer { display: flex; justify-content: space-between; align-items: center; }
		#rab-katalog-page #catalog-page-info { color: #93a0ad; font-size: 12px; }
		#rab-katalog-page .pagination > li > a { margin-left: 3px; border-radius: 5px; }
		@media (max-width: 767px) {
			#rab-katalog-page .box-header { align-items: flex-start; flex-direction: column; gap: 14px; }
			#rab-katalog-page .catalog-header-actions { flex-wrap: wrap; }
			#rab-katalog-page .box-body { padding: 14px; }
			#rab-katalog-page .catalog-import-card { gap: 10px; padding: 13px; }
			#rab-katalog-page .catalog-toolbar { align-items: flex-start; flex-direction: column; }
			#rab-katalog-page #catalog-search-input { width: 100%; }
		}
	</style>
	<section class="content-header">
		<h1><?= html_escape($title) ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/manual_apbdes') ?>">Parameter</a></li>
			<li class="active"><?= html_escape($title) ?></li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div id="rab-katalog-page">
			<div class="box box-info">
				<div class="box-header with-border">
					<div class="catalog-heading">
						<span class="catalog-heading-icon"><i class="fa <?= $isOutput ? 'fa-bullseye' : 'fa-book' ?>"></i></span>
						<div>
							<h3 class="box-title"><?= html_escape($title) ?></h3>
							<small>Kelola referensi yang digunakan dalam anggaran</small>
						</div>
					</div>
					<div class="catalog-header-actions">
						<?php if ($can_export): ?>
							<div class="catalog-export-actions">
								<a href="<?= site_url('keuangan_manual/ekspor_parameter_katalog_rab/' . $jenis . '/pdf') ?>" class="btn btn-default btn-sm catalog-export-pdf" title="Ekspor PDF"><i class="fa fa-file-pdf-o"></i> PDF</a>
								<a href="<?= site_url('keuangan_manual/ekspor_parameter_katalog_rab/' . $jenis . '/xlsx') ?>" class="btn btn-default btn-sm catalog-export-excel" title="Ekspor Excel"><i class="fa fa-file-excel-o"></i> Excel</a>
								<a href="<?= site_url('keuangan_manual/ekspor_parameter_katalog_rab/' . $jenis . '/csv') ?>" class="btn btn-default btn-sm catalog-export-csv" title="Ekspor CSV"><i class="fa fa-download"></i> CSV</a>
							</div>
						<?php endif; ?>
						<?php if ($can_edit): ?>
							<button type="button" class="btn btn-primary btn-sm" id="catalog-add-button"><i class="fa fa-plus-circle"></i> Tambah</button>
						<?php endif; ?>
					</div>
				</div>
				<div class="box-body">
					<?php if ($can_edit): ?>
						<div class="catalog-import-card">
							<span class="catalog-import-icon"><i class="fa fa-cloud-upload"></i></span>
							<div class="catalog-import-content">
								<h4>Impor data <?= html_escape($title) ?></h4>
								<?php if ($isOutput): ?>
									<p>Unggah CSV/Excel dengan kolom <code>kode_kegiatan</code>, <code>kode_output</code>, <code>uraian</code>, dan <code>satuan</code>. Kode kegiatan harus sudah tersedia di parameter Bidang dan Kegiatan.</p>
								<?php else: ?>
									<p>Unggah CSV/Excel dengan kolom <code>kode</code> dan <code>nama</code> sesuai struktur rekening APBDesa.</p>
								<?php endif; ?>
								<form method="post" action="<?= site_url('keuangan_manual/parameter_rab?jenis=' . $jenis) ?>" enctype="multipart/form-data">
									<input type="hidden" name="action" value="impor">
									<input type="hidden" name="jenis_parameter" value="<?= html_escape($jenis) ?>">
									<div class="catalog-import-actions">
										<a href="<?= site_url('keuangan_manual/template_parameter_katalog_rab/' . $jenis) ?>" class="catalog-template-link"><i class="fa fa-file-text-o"></i> Unduh template</a>
										<label class="sr-only" for="catalog-file">Pilih berkas</label>
										<input type="file" id="catalog-file" class="catalog-file-input" name="userfile" accept=".csv,.xlsx" required>
										<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-upload"></i> Impor data</button>
									</div>
									<p class="catalog-note"><i class="fa fa-info-circle"></i> Maksimal 10 MB. Impor mengganti daftar aktif, data sebelumnya tetap tersimpan.</p>
								</form>
							</div>
						</div>
						<div class="panel panel-default catalog-form-panel" id="catalog-form-panel" style="display:none;">
							<div class="panel-heading"><strong id="catalog-form-title">Tambah Parameter</strong></div>
							<div class="panel-body">
								<form method="post" action="<?= site_url('keuangan_manual/parameter_rab?jenis=' . $jenis) ?>" id="catalog-form">
									<input type="hidden" name="action" value="simpan">
									<input type="hidden" name="jenis_parameter" value="<?= html_escape($jenis) ?>">
									<input type="hidden" name="id" id="catalog-id" value="">
									<div class="row">
										<?php if ($isOutput): ?>
											<div class="col-md-4 form-group">
												<label for="catalog-parent">Kode Kegiatan</label>
												<select class="form-control" name="parent_id" id="catalog-parent" required>
													<option value="">Pilih kegiatan</option>
													<?php foreach ($activities as $activity): ?>
														<option value="<?= (int) $activity['id'] ?>"><?= html_escape($activity['kode'] . ' ' . $activity['nama']) ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										<?php endif; ?>
										<div class="col-md-<?= $isOutput ? '3' : '4' ?> form-group">
											<label for="catalog-code"><?= $isOutput ? 'Kode Output' : 'Kode' ?></label>
											<input type="text" class="form-control" name="kode" id="catalog-code" maxlength="50" required>
										</div>
										<?php if ($isOutput): ?>
											<div class="col-md-3 form-group">
												<label for="catalog-unit">Satuan</label>
												<input type="text" class="form-control" name="satuan" id="catalog-unit" maxlength="100" required>
											</div>
										<?php endif; ?>
										<div class="col-md-<?= $isOutput ? '12' : '8' ?> form-group">
											<label for="catalog-name"><?= $isOutput ? 'Uraian' : 'Rekening' ?></label>
											<input type="text" class="form-control" name="nama" id="catalog-name" maxlength="191" required>
										</div>
									</div>
									<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
									<button type="button" class="btn btn-default" id="catalog-cancel-button">Batal</button>
								</form>
							</div>
						</div>
					<?php endif; ?>

					<div class="catalog-toolbar">
						<label><i class="fa fa-list-ol"></i> Tampilkan
							<select class="form-control input-sm" id="catalog-page-size" style="width:auto;display:inline-block;">
								<option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="0">Semua</option>
							</select>
							baris per halaman
						</label>
						<label for="catalog-search-input">Cari:
							<span class="catalog-search"><i class="fa fa-search"></i><input type="search" class="form-control input-sm" id="catalog-search-input" autocomplete="off" placeholder="Kode atau nama..."></span>
						</label>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" id="catalog-table">
							<thead><tr>
								<th style="width:60px;">No</th>
								<?php if ($isOutput): ?>
									<th style="width:140px;">Kode Kegiatan</th>
									<th style="width:130px;">Kode Output</th>
									<th>Uraian</th>
									<th style="width:160px;">Satuan</th>
								<?php else: ?>
									<th style="width:180px;">Kode</th>
									<th>Rekening</th>
								<?php endif; ?>
								<?php if ($can_edit || $can_delete): ?><th style="width:100px;">Aksi</th><?php endif; ?>
							</tr></thead>
							<tbody>
								<?php foreach ($parameters as $index => $parameter): ?>
									<?php
									$searchText = implode(' ', [
										$parameter['kode'] ?? '',
										$parameter['nama'] ?? '',
										$parameter['parent_kode'] ?? '',
										$parameter['satuan'] ?? '',
									]);
									?>
									<tr data-search="<?= html_escape(mb_strtolower($searchText)) ?>">
										<td class="catalog-row-number"><?= $index + 1 ?></td>
										<?php if ($isOutput): ?>
											<td><span class="catalog-code"><?= html_escape($parameter['parent_kode'] ?? '-') ?></span></td>
											<td><span class="catalog-code"><?= html_escape($parameter['kode'] ?? '-') ?></span></td>
											<td><?= html_escape($parameter['nama']) ?></td>
											<td><?= html_escape($parameter['satuan'] ?? '-') ?></td>
										<?php else: ?>
											<td><span class="catalog-code"><?= html_escape($parameter['kode'] ?? '-') ?></span></td>
											<td><?= html_escape($parameter['nama']) ?></td>
										<?php endif; ?>
										<?php if ($can_edit || $can_delete): ?>
											<td class="catalog-actions text-nowrap">
												<?php if ($can_edit): ?>
													<button type="button" class="btn btn-warning btn-xs catalog-edit-button" title="Ubah" aria-label="Ubah" data-parameter="<?= html_escape(json_encode($parameter, $jsonFlags)) ?>"><i class="fa fa-pencil"></i></button>
												<?php endif; ?>
												<?php if ($can_delete): ?>
													<form method="post" action="<?= site_url('keuangan_manual/parameter_rab?jenis=' . $jenis) ?>" onsubmit="return confirm('Nonaktifkan parameter ini?');">
														<input type="hidden" name="action" value="hapus">
														<input type="hidden" name="jenis_parameter" value="<?= html_escape($jenis) ?>">
														<input type="hidden" name="id" value="<?= (int) $parameter['id'] ?>">
														<button type="submit" class="btn btn-danger btn-xs" title="Nonaktifkan" aria-label="Nonaktifkan"><i class="fa fa-trash-o"></i></button>
													</form>
												<?php endif; ?>
											</td>
										<?php endif; ?>
									</tr>
								<?php endforeach; ?>
								<?php if ($parameters === []): ?>
									<tr><td colspan="<?= ($isOutput ? 5 : 3) + ($can_edit || $can_delete ? 1 : 0) ?>" class="catalog-empty">
										<i class="fa <?= $isOutput ? 'fa-bullseye' : 'fa-book' ?>"></i>
										<strong>Belum ada data <?= html_escape($title) ?></strong>
										<span>Tambah data secara manual atau unggah CSV/Excel menggunakan template.</span>
									</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
					<div class="catalog-footer">
						<span id="catalog-page-info"></span>
						<ul class="pagination pagination-sm" id="catalog-pagination" style="margin:10px 0 0;"></ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	(function () {
		'use strict';
		var table = document.getElementById('catalog-table');
		var rows = Array.prototype.slice.call(table.tBodies[0].rows).filter(function (row) { return row.hasAttribute('data-search'); });
		var size = document.getElementById('catalog-page-size');
		var search = document.getElementById('catalog-search-input');
		var info = document.getElementById('catalog-page-info');
		var pagination = document.getElementById('catalog-pagination');
		var page = 1;
		function render() {
			var term = search.value.trim().toLocaleLowerCase();
			var matches = rows.filter(function (row) { return row.getAttribute('data-search').toLocaleLowerCase().indexOf(term) !== -1; });
			var pageSize = Number(size.value) || matches.length || 1;
			var pages = Math.max(1, Math.ceil(matches.length / pageSize));
			page = Math.min(page, pages);
			rows.forEach(function (row) { row.style.display = 'none'; });
			matches.forEach(function (row, index) {
				if (size.value === '0' || (index >= (page - 1) * pageSize && index < page * pageSize)) {
					row.style.display = '';
					row.querySelector('.catalog-row-number').textContent = String(index + 1);
				}
			});
			var first = matches.length ? (size.value === '0' ? 1 : (page - 1) * pageSize + 1) : 0;
			var last = size.value === '0' ? matches.length : Math.min(page * pageSize, matches.length);
			info.textContent = 'Menampilkan ' + first + ' sampai ' + last + ' dari ' + matches.length + ' data';
			pagination.innerHTML = '';
			if (size.value === '0' || pages < 2) { return; }
			for (var i = 1; i <= pages; i++) {
				var item = document.createElement('li');
				if (i === page) { item.className = 'active'; }
				var link = document.createElement('a');
				link.href = '#';
				link.textContent = String(i);
				link.addEventListener('click', function (event) { event.preventDefault(); page = Number(this.textContent); render(); });
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
			function openForm(title) {
				$('#catalog-form-title').text(title);
				$('#catalog-form-panel').show()[0].scrollIntoView({behavior: 'smooth', block: 'start'});
			}
			$('#catalog-add-button').on('click', function () {
				$('#catalog-form')[0].reset();
				$('#catalog-id').val('');
				openForm('Tambah Parameter');
			});
			$('.catalog-edit-button').on('click', function () {
				var row = JSON.parse($(this).attr('data-parameter'));
				$('#catalog-id').val(row.id);
				$('#catalog-code').val(row.kode || '');
				$('#catalog-name').val(row.nama || '');
				<?php if ($isOutput): ?>
					$('#catalog-parent').val(String(row.parent_id || ''));
					$('#catalog-unit').val(row.satuan || '');
				<?php endif; ?>
				openForm('Ubah Parameter');
			});
			$('#catalog-cancel-button').on('click', function () {
				$('#catalog-form')[0].reset();
				$('#catalog-id').val('');
				$('#catalog-form-panel').hide();
			});
		})(jQuery);
	</script>
<?php endif; ?>
