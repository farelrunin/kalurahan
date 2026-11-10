<?php

defined('BASEPATH') || exit('No direct script access allowed');

$jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;
$selectedType = (string) $this->input->get('jenis', true);
$searchTerm = (string) $this->input->get('cari', true);
$parentOptions = static function (array $rows, string $type) use ($jsonFlags): string {
    $html = '';
    foreach ($rows as $row) {
        $html .= '<option data-parent-type="' . html_escape($type) . '" value="' . (int) $row['id'] . '">'
            . html_escape(trim(($row['kode'] ?? '') . ' ' . $row['nama'])) . '</option>';
    }

    return $html;
};

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Parameter Keuangan e-RAB</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/manual_apbdes') ?>">Keuangan</a></li>
			<li class="active">Parameter Keuangan</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Referensi yang digunakan e-RAB</h3>
				<div class="box-tools pull-right">
					<a href="<?= site_url('keuangan_manual/rincian_rab') ?>" class="btn btn-info btn-sm">
						<i class="fa fa-list-alt"></i> Rincian e-RAB
					</a>
					<a href="<?= site_url('keuangan_manual/laporan_rab') ?>" class="btn btn-default btn-sm">
						<i class="fa fa-file-text-o"></i> Laporan e-RAB
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="alert alert-info">
					Referensi bidang, kegiatan, rekening, output, dan sumber dana dikelola di halaman ini.
				</div>
				<div class="row">
					<?php if ($can_edit): ?>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-heading"><strong>Tambah / Ubah Parameter</strong></div>
								<div class="panel-body">
									<form method="post" action="<?= site_url('keuangan_manual/parameter_rab') ?>" id="form-parameter-rab">
										<input type="hidden" name="action" value="simpan">
										<input type="hidden" name="id" id="parameter-id" value="">
										<div class="form-group">
											<label for="parameter-jenis">Jenis Parameter</label>
											<select class="form-control" name="jenis" id="parameter-jenis" required>
												<?php foreach ($types as $key => $label): ?>
													<option value="<?= html_escape($key) ?>"><?= html_escape($label) ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="form-group">
											<label for="parameter-parent">Induk</label>
											<select class="form-control" name="parent_id" id="parameter-parent">
												<option value="">Tanpa induk</option>
												<?= $parentOptions($parents['kegiatan'], 'kegiatan') ?>
												<?= $parentOptions($parents['output'], 'output') ?>
											</select>
											<p class="help-block" id="parameter-parent-help">Kegiatan mengikuti bidang; output mengikuti kegiatan.</p>
										</div>
										<div class="form-group">
											<label for="parameter-kode">Kode</label>
											<input type="text" class="form-control" name="kode" id="parameter-kode" maxlength="50">
										</div>
										<div class="form-group">
											<label for="parameter-nama">Nama</label>
											<input type="text" class="form-control" name="nama" id="parameter-nama" maxlength="191" required>
										</div>
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-save"></i> Simpan
										</button>
										<button type="button" class="btn btn-default" id="btn-reset-parameter">Kosongkan</button>
									</form>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<div class="<?= $can_edit ? 'col-md-8' : 'col-md-12' ?>">
						<form method="get" action="<?= site_url('keuangan_manual/parameter_rab') ?>" class="form-inline" style="margin-bottom: 12px;">
							<div class="form-group">
								<label for="filter-jenis-parameter">Jenis </label>
								<select name="jenis" id="filter-jenis-parameter" class="form-control input-sm">
									<option value="">Semua</option>
									<?php foreach ($types as $key => $label): ?>
										<option value="<?= html_escape($key) ?>" <?= $selectedType === $key ? 'selected' : '' ?>><?= html_escape($label) ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="cari-parameter">Cari </label>
								<input type="search" name="cari" id="cari-parameter" class="form-control input-sm" value="<?= html_escape($searchTerm) ?>" placeholder="Kode atau nama">
							</div>
							<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Cari</button>
						</form>
						<div class="row">
							<div class="col-sm-6">
								<label class="text-muted">Tampilkan
									<select class="form-control input-sm" id="parameter-page-size" style="width: auto; display: inline-block;">
										<option>10</option><option>25</option><option>50</option><option value="0">Semua</option>
									</select> entri
								</label>
							</div>
							<div class="col-sm-6 text-right">
								<span class="text-muted" id="parameter-page-info"></span>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover" id="tabel-parameter-rab">
								<thead>
									<tr>
										<th>Jenis</th>
										<th>Kode</th>
										<th>Nama</th>
										<th>Induk</th>
										<?php if ($can_edit || $can_delete): ?><th>Aksi</th><?php endif; ?>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($parameters as $parameter): ?>
										<tr>
											<td><?= html_escape($types[$parameter['jenis']] ?? $parameter['jenis']) ?></td>
											<td><?= html_escape($parameter['kode'] ?? '-') ?></td>
											<td><?= html_escape($parameter['nama']) ?></td>
											<td><?= html_escape($parameter['parent_nama'] ?? '-') ?></td>
											<?php if ($can_edit || $can_delete): ?>
												<td class="text-nowrap">
													<?php if ($can_edit): ?>
														<button type="button" class="btn btn-warning btn-xs btn-edit-parameter" data-parameter="<?= html_escape(json_encode($parameter, $jsonFlags)) ?>">
															<i class="fa fa-edit"></i> Ubah
														</button>
													<?php endif; ?>
													<?php if ($can_delete): ?>
														<form method="post" action="<?= site_url('keuangan_manual/parameter_rab') ?>" style="display:inline" onsubmit="return confirm('Nonaktifkan parameter ini? Data e-RAB lama tetap disimpan.');">
															<input type="hidden" name="action" value="hapus">
															<input type="hidden" name="id" value="<?= (int) $parameter['id'] ?>">
															<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> Nonaktifkan</button>
														</form>
													<?php endif; ?>
												</td>
											<?php endif; ?>
										</tr>
									<?php endforeach; ?>
									<?php if ($parameters === []): ?>
										<tr><td colspan="<?= $can_edit || $can_delete ? '5' : '4' ?>" class="text-center">Parameter tidak ditemukan.</td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<ul class="pagination pagination-sm pull-right" id="parameter-pagination"></ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php if ($can_edit): ?>
	<script>
		(function ($) {
			'use strict';
			var allParentOptions = $('#parameter-parent option').clone();
			var parentTypes = {kegiatan: 'kegiatan', output: 'output'};
			function updateParentOptions(selected) {
				var type = $('#parameter-jenis').val();
				var parentType = parentTypes[type] || '';
				var select = $('#parameter-parent').empty().append(allParentOptions.filter('[value=""]').first().clone());
				if (parentType) {
					allParentOptions.filter('[data-parent-type="' + parentType + '"]').each(function () {
						select.append($(this).clone());
					});
					select.prop('required', true).closest('.form-group').show();
					$('#parameter-parent-help').text(type === 'kegiatan'
						? 'Pilih bidang induk. Kode kegiatan menentukan sub bidang secara otomatis.'
						: 'Pilih kegiatan induk untuk output ini.');
				} else {
					select.prop('required', false).closest('.form-group').hide();
				}
				if (selected) {
					select.val(String(selected));
				}
			}
			$('#parameter-jenis').on('change', function () { updateParentOptions(''); });
			$('.btn-edit-parameter').on('click', function () {
				var row = JSON.parse($(this).attr('data-parameter'));
				$('#parameter-id').val(row.id);
				$('#parameter-jenis').val(row.jenis);
				updateParentOptions(row.parent_id);
				$('#parameter-kode').val(row.kode || '');
				$('#parameter-nama').val(row.nama || '');
				$('#form-parameter-rab')[0].scrollIntoView({behavior: 'smooth', block: 'start'});
			});
			$('#btn-reset-parameter').on('click', function () {
				$('#form-parameter-rab')[0].reset();
				$('#parameter-id').val('');
				updateParentOptions('');
			});
			updateParentOptions('');
		})(jQuery);
	</script>
<?php endif; ?>
<script>
	(function () {
		'use strict';
		var table = document.getElementById('tabel-parameter-rab');
		if (!table) { return; }
		var rows = Array.prototype.slice.call(table.tBodies[0].rows);
		var size = document.getElementById('parameter-page-size');
		var pagination = document.getElementById('parameter-pagination');
		var info = document.getElementById('parameter-page-info');
		var page = 1;
		function render() {
			var pageSize = Number(size.value) || rows.length || 1;
			var pages = Math.max(1, Math.ceil(rows.length / pageSize));
			page = Math.min(page, pages);
			rows.forEach(function (row, index) {
				row.style.display = index >= (page - 1) * pageSize && index < page * pageSize ? '' : 'none';
			});
			info.textContent = rows.length ? 'Halaman ' + page + ' dari ' + pages + ' (' + rows.length + ' entri)' : '0 entri';
			pagination.innerHTML = '';
			for (var i = 1; i <= pages; i++) {
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
		render();
	})();
</script>
