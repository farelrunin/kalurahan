<?php

defined('BASEPATH') || exit('No direct script access allowed');

$filters = $filters ?? ['tahun' => '', 'tahap' => 'murni', 'bidang' => '', 'sub_bidang' => '', 'kegiatan' => ''];
$references = $references ?? ['bidang' => [], 'sub_bidang' => [], 'kegiatan' => []];
$table_rows = $table_rows ?? [];
$reportVolume = static fn ($value): string => number_format((float) $value, 2, '.', '');
$reportMoney = static fn ($value): string => number_format((float) $value, 2, '.', ',');
$fieldCodesById = [];
foreach ($references['bidang'] as $field) {
	$fieldCodesById[(string) $field['id']] = (string) $field['kode'];
}
$subFieldCodesById = [];
$subFieldFieldCodesByCode = [];
foreach ($references['sub_bidang'] as $subField) {
	$subFieldCodesById[(string) $subField['id']] = (string) $subField['kode'];
	$subFieldFieldCodesByCode[(string) $subField['kode']] = $fieldCodesById[(string) $subField['parent_id']] ?? '';
}
$activitySubFieldCodesByCode = [];
foreach ($references['kegiatan'] as $activity) {
	$activitySubFieldCodesByCode[(string) $activity['kode']] = $subFieldCodesById[(string) $activity['parent_id']] ?? '';
}

?>
<style>
	.report-primary { border-collapse: collapse !important; font-size: 14px; }
	.report-primary td, .report-primary th { border: 1px solid #ddd !important; padding: 7px 8px !important; }
	.report-primary th { text-align: center; vertical-align: middle !important; }
	.report-primary tbody tr { background: #fff !important; }
	.report-primary .report-metadata { background: #f5f5f5; }
	.report-primary .report-account { font-weight: 600; }
	.report-primary .report-package, .report-primary .report-activity_total,
	.report-primary .report-subtotal { font-weight: 700; }
	.report-primary .report-spacer td { height: 10px; padding: 0 !important; border: 0; }
	.report-primary .report-header th { background: #f5f5f5; }
	@media print {
		.no-print, .content-header .breadcrumb, .main-footer, .main-sidebar { display: none !important; }
		.content-wrapper { margin-left: 0 !important; }
		.content { padding: 0 !important; }
		table { font-size: 9px; }
		thead { display: table-header-group; }
		tr { page-break-inside: avoid; }
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>RAB Per Kegiatan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/laporan_anggaran_belanja') ?>">Laporan Anggaran Belanja</a></li>
			<li class="active">RAB Per Kegiatan</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">RAB PER KEGIATAN</h3>
				<div class="box-tools pull-right no-print">
					<a href="<?= site_url('keuangan_manual/laporan_anggaran_belanja') ?>" class="btn btn-default btn-sm">
						<i class="fa fa-arrow-left"></i> Kembali ke Laporan Belanja
					</a>
				</div>
			</div>
			<div class="box-body">
				<form method="get" action="<?= site_url('keuangan_manual/laporan_rab') ?>" class="no-print">
					<input type="hidden" name="laporan" value="belanja_per_kegiatan">
					<input type="hidden" name="tahun_anggaran" value="<?= html_escape((string) $finance_filter_year) ?>">
					<input type="hidden" name="cari" value="1">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="laporan-tahap">Tahap Anggaran</label>
								<select name="tahap" id="laporan-tahap" class="form-control">
									<option value="murni" <?= $filters['tahap'] === 'murni' ? 'selected' : '' ?>>Murni</option>
									<option value="perubahan" <?= $filters['tahap'] === 'perubahan' ? 'selected' : '' ?>>Perubahan</option>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="laporan-bidang">Bidang</label>
								<select name="bidang" id="laporan-bidang" class="form-control" required>
									<option value="">Pilih Bidang</option>
									<?php foreach ($references['bidang'] as $field): ?>
										<option value="<?= html_escape((string) $field['kode']) ?>" <?= $filters['bidang'] === $field['kode'] ? 'selected' : '' ?>>
											<?= html_escape($field['kode'] . ' ' . $field['nama']) ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="laporan-sub-bidang">Sub Bidang</label>
								<select name="sub_bidang" id="laporan-sub-bidang" class="form-control" required>
									<option value="">Pilih Sub Bidang</option>
									<?php foreach ($references['sub_bidang'] as $subField): ?>
										<option
											value="<?= html_escape((string) $subField['kode']) ?>"
											data-bidang="<?= html_escape($subFieldFieldCodesByCode[(string) $subField['kode']] ?? '') ?>"
											<?= $filters['sub_bidang'] === $subField['kode'] ? 'selected' : '' ?>
										>
											<?= html_escape($subField['kode'] . ' ' . $subField['nama']) ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="laporan-kegiatan">Kegiatan</label>
								<select name="kegiatan" id="laporan-kegiatan" class="form-control" required>
									<option value="">Pilih Kegiatan</option>
									<?php foreach ($references['kegiatan'] as $activity): ?>
										<option
											value="<?= html_escape((string) $activity['kode']) ?>"
											data-sub-bidang="<?= html_escape($activitySubFieldCodesByCode[(string) $activity['kode']] ?? '') ?>"
											<?= $filters['kegiatan'] === $activity['kode'] ? 'selected' : '' ?>
										>
											<?= html_escape($activity['kode'] . ' ' . $activity['nama']) ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
					<?php if (! empty($has_report_selection) && ! empty($can_export)): ?>
						<a href="<?= html_escape($export_url) ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Ekspor Excel</a>
						<button type="button" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Cetak PDF</button>
					<?php endif; ?>
				</form>

				<?php if (! empty($has_report_selection)): ?>
					<hr>
					<p class="text-muted">
						Tahun Anggaran <?= html_escape($filters['tahun']) ?> · <?= html_escape(ucfirst($filters['tahap'])) ?>
					</p>
					<?php if (! empty($source_match) && $source_match['unmatched'] > 0): ?>
						<div class="alert alert-warning">
							Beberapa rincian RAB tidak dapat dipadankan dengan struktur sumber 2027 Murni
							(<?= (int) $source_match['unmatched'] ?> rincian tidak cocok).
						</div>
					<?php endif; ?>
					<div class="table-responsive">
						<table class="table table-bordered report-primary">
							<thead>
								<tr>
									<th>KODE</th>
									<th>URAIAN</th>
									<th>SUMBERDANA</th>
									<th>VOLUME</th>
									<th>HARGA SATUAN</th>
									<th>JUMLAH</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($table_rows as $row): ?>
									<?php if ($row['kind'] === 'spacer'): ?>
										<tr class="report-spacer"><td colspan="6"></td></tr>
									<?php elseif ($row['kind'] === 'header'): ?>
										<tr class="report-header">
											<th>KODE</th><th>URAIAN</th><th>SUMBERDANA</th>
											<th>VOLUME</th><th>HARGA SATUAN</th><th>JUMLAH</th>
										</tr>
									<?php elseif ($row['kind'] === 'metadata'): ?>
										<tr class="report-metadata">
											<th><?= html_escape($row['kode']) ?></th>
											<td colspan="5"><?= html_escape($row['uraian']) ?></td>
										</tr>
									<?php elseif ($row['kind'] === 'section'): ?>
										<tr class="report-section"><th colspan="6"><?= html_escape($row['uraian']) ?></th></tr>
									<?php else: ?>
										<tr class="report-<?= html_escape($row['kind']) ?> report-level-<?= (int) $row['level'] ?>">
											<td><?= html_escape($row['kode']) ?></td>
											<td style="padding-left: <?= 8 + ((int) $row['level'] * 16) ?>px !important;">
												<?= html_escape($row['uraian']) ?>
											</td>
											<td><?= html_escape($row['sumber_dana']) ?></td>
											<td class="text-right">
												<?= $row['volume'] === null ? '' : $reportVolume($row['volume']) . (trim((string) ($row['satuan'] ?? '')) !== '' ? ' ' . html_escape((string) $row['satuan']) : '') ?>
											</td>
											<td class="text-right"><?= $row['harga_satuan'] === null ? '' : $reportMoney($row['harga_satuan']) ?></td>
											<td class="text-right"><?= $row['jumlah'] === null ? '' : $reportMoney($row['jumlah']) ?></td>
										</tr>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if ($table_rows === []): ?>
									<tr><td colspan="6" class="text-center">Belum ada data e-RAB untuk kegiatan ini.</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				<?php else: ?>
					<div class="alert alert-info">
						Pilih Bidang, Sub Bidang, dan Kegiatan untuk menampilkan RAB.
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<script>
	(function () {
		'use strict';
		var bidang = document.getElementById('laporan-bidang');
		var subBidang = document.getElementById('laporan-sub-bidang');
		var kegiatan = document.getElementById('laporan-kegiatan');

		function updateSubBidang() {
			Array.prototype.forEach.call(subBidang.options, function (option) {
				var visible = !option.value || option.getAttribute('data-bidang') === bidang.value;
				option.hidden = !visible;
			});
			if (subBidang.selectedOptions.length && subBidang.selectedOptions[0].hidden) {
				subBidang.value = '';
			}
			updateKegiatan();
		}

		function updateKegiatan() {
			Array.prototype.forEach.call(kegiatan.options, function (option) {
				var visible = !option.value || option.getAttribute('data-sub-bidang') === subBidang.value;
				option.hidden = !visible;
			});
			if (kegiatan.selectedOptions.length && kegiatan.selectedOptions[0].hidden) {
				kegiatan.value = '';
			}
		}

		bidang.addEventListener('change', function () {
			subBidang.value = '';
			kegiatan.value = '';
			updateSubBidang();
		});
		subBidang.addEventListener('change', function () {
			kegiatan.value = '';
			updateKegiatan();
		});
		updateSubBidang();
	})();
</script>
