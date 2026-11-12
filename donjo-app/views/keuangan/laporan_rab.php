<?php

defined('BASEPATH') || exit('No direct script access allowed');

$reportTypes = [
    'pendapatan' => 'Pendapatan',
    'belanja' => 'Belanja',
    'pembiayaan' => 'Pembiayaan',
    'apbdes' => 'APBDes',
    'penjabaran' => 'Penjabaran APBDes',
    'sumber_dana' => 'APBDes per Sumber Dana',
    'konsolidasi' => 'Perubahan APBDes (Konsolidasian)',
];
$money = static fn ($value): string => 'Rp ' . number_format((float) $value, 0, ',', '.');
$reportMoney = static fn ($value): string => number_format((float) $value, 2, '.', ',');
$reportVolume = static fn ($value): string => number_format((float) $value, 2, '.', '');
$summary = $summary ?? [];
$months = [1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
$isPrimaryReport = in_array($report_key, ['pendapatan', 'belanja', 'pembiayaan'], true);

?>
<style>
	.report-primary, .report-extra { border-collapse: collapse !important; font-size: 14px; }
	.report-primary td, .report-primary th, .report-extra td, .report-extra th {
		border: 1px solid #ddd !important;
		padding: 7px 8px !important;
	}
	.report-primary th, .report-extra th { text-align: center; vertical-align: middle !important; }
	.report-primary tbody tr, .report-extra tbody tr { background: #fff !important; }
	.report-primary .report-metadata { background: #f5f5f5; }
	.report-primary .report-account { font-weight: 600; }
	.report-primary .report-package, .report-primary .report-activity_total { font-weight: 700; }
	.report-primary .report-section { background: #e8eef3; font-weight: 700; }
	.report-primary .report-subtotal, .report-primary .report-grand_total { font-weight: 700; }
	.report-primary .report-grand_total { border-top: 2px solid #444; }
	.report-primary .report-spacer td { height: 10px; padding: 0 !important; border: 0; }
	.report-primary .report-header th { background: #f5f5f5; text-align: center; }
	.report-primary-pendapatan, .report-primary-pembiayaan { font-size: 15px; }
	.report-primary-pendapatan .report-account { font-weight: 400; }
	.report-primary-pendapatan .report-account.report-level-0 td:nth-child(-n+2),
	.report-primary-pendapatan .report-account.report-level-1 td:nth-child(-n+2),
	.report-primary-pendapatan .report-account.report-level-2 td:nth-child(-n+2) { font-weight: 700; }
	.report-primary-pembiayaan .report-account { font-weight: 400; }
	.report-primary-pembiayaan .report-account.report-level-0 td:nth-child(-n+2),
	.report-primary-pembiayaan .report-account.report-level-1 td:nth-child(-n+2),
	.report-primary-pembiayaan .report-account.report-level-2 td:nth-child(-n+2) { font-weight: 700; }
	.report-opensid-extra { margin: 0 0 15px; }
	.report-opensid-extra summary { cursor: pointer; font-weight: 600; padding: 8px 0; }
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
		<h1><?= html_escape($report_title) ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/manual_apbdes') ?>">Keuangan</a></li>
			<li class="active">Laporan e-RAB</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= html_escape([
						'pendapatan' => 'PENDAPATAN',
						'belanja' => 'BELANJA',
						'pembiayaan' => 'PEMBIAYAAN',
						'apbdes' => 'ANGGARAN PENDAPATAN DAN BELANJA DESA (APBDes)',
						'penjabaran' => 'PENJABARAN ANGGARAN PENDAPATAN DAN BELANJA DESA',
						'sumber_dana' => 'APBDes PER SUMBER DANA',
						'konsolidasi' => 'PERUBAHAN ANGGARAN PENDAPATAN DAN BELANJA DESA (APBDes)',
					][$report_key] ?? $report_title) ?>
				</h3>
				<div class="box-tools pull-right no-print">
					<a href="<?= site_url('keuangan_manual/parameter_rab') ?>" class="btn btn-default btn-sm">
						<i class="fa fa-gears"></i> Parameter Keuangan
					</a>
					<a href="<?= site_url('keuangan_manual/rincian_rab') ?>" class="btn btn-info btn-sm">
						<i class="fa fa-list-alt"></i> Rincian e-RAB
					</a>
				</div>
			</div>
			<div class="box-body">
				<form method="get" action="<?= site_url('keuangan_manual/laporan_rab') ?>" class="no-print">
					<input type="hidden" name="tahun_anggaran" value="<?= html_escape((string) $finance_filter_year) ?>">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="laporan-jenis">Jenis Laporan</label>
								<select name="laporan" id="laporan-jenis" class="form-control">
									<?php foreach ($reportTypes as $key => $label): ?>
										<option value="<?= html_escape($key) ?>" <?= $report_key === $key ? 'selected' : '' ?>><?= html_escape($label) ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="form-group">
								<label for="laporan-tahap">Tahap Anggaran</label>
								<select name="tahap" id="laporan-tahap" class="form-control">
									<option value="">Semua</option>
									<option value="murni" <?= $filters['tahap'] === 'murni' ? 'selected' : '' ?>>Murni</option>
									<option value="perubahan" <?= $filters['tahap'] === 'perubahan' ? 'selected' : '' ?>>Perubahan</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-6" id="filter-bidang-wrap">
							<div class="form-group">
								<label for="laporan-bidang">Bidang</label>
								<select name="bidang" id="laporan-bidang" class="form-control">
									<option value="">Semua</option>
									<?php foreach ($references['bidang'] as $bidang): ?>
										<option value="<?= html_escape($bidang['kode']) ?>" <?= $filters['bidang'] === $bidang['kode'] ? 'selected' : '' ?>>
											<?= html_escape($bidang['kode'] . ' ' . $bidang['nama']) ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6" id="filter-kegiatan-wrap">
							<div class="form-group">
								<label for="laporan-kegiatan">Kegiatan</label>
								<select name="kegiatan" id="laporan-kegiatan" class="form-control">
									<option value="">Semua</option>
									<?php foreach ($references['kegiatan'] as $kegiatan): ?>
										<option value="<?= html_escape($kegiatan['kode']) ?>" <?= $filters['kegiatan'] === $kegiatan['kode'] ? 'selected' : '' ?>>
											<?= html_escape($kegiatan['kode'] . ' ' . $kegiatan['nama']) ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-6" id="filter-sumber-wrap">
							<div class="form-group">
								<label for="laporan-sumber">Sumber Dana</label>
								<select name="sumber_dana" id="laporan-sumber" class="form-control">
									<option value="">Semua</option>
									<?php foreach ($references['sumber_dana'] as $source): ?>
										<option value="<?= html_escape($source['kode'] ?? $source['nama']) ?>" <?= $filters['sumber_dana'] === ($source['kode'] ?? $source['nama']) ? 'selected' : '' ?>>
											<?= html_escape($source['nama']) ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
					<a href="<?= html_escape($export_url) ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Ekspor Excel</a>
					<button type="button" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Cetak PDF</button>
				</form>

				<hr>
				<?php if (! empty($source_match) && (
					($source_match['expected'] !== null && $source_match['matched'] !== $source_match['expected'])
					|| $source_match['unmatched'] > 0
				)): ?>
					<div class="alert alert-warning">
						Struktur paket sumber Belanja 2027 Murni belum sepenuhnya cocok. Rincian terpetakan:
						<?= (int) $source_match['matched'] ?>
						<?php if ($source_match['expected'] !== null): ?>dari <?= (int) $source_match['expected'] ?><?php endif; ?>;
						rincian lokal yang tidak cocok: <?= (int) $source_match['unmatched'] ?>
						(kegiatan tidak cocok: <?= (int) $source_match['activity_unmatched'] ?>,
						rincian: <?= (int) $source_match['item_unmatched'] ?>).
					</div>
				<?php endif; ?>
				<p class="text-muted">
					Periode: <?= $filters['tahun'] !== '' ? html_escape($filters['tahun']) : 'Semua tahun' ?>
					<?= $filters['tahap'] !== '' ? ' · ' . html_escape(ucfirst($filters['tahap'])) : '' ?>
				</p>

				<?php if ($isPrimaryReport): ?>
					<div class="table-responsive">
						<table class="table table-bordered report-primary report-primary-<?= html_escape($report_key) ?>">
							<thead>
								<?php if ($report_key === 'belanja'): ?>
									<tr>
										<th>KODE</th>
										<th>URAIAN</th>
										<th>SUMBERDANA</th>
										<th>VOLUME</th>
										<th>HARGA SATUAN</th>
										<th>JUMLAH</th>
									</tr>
								<?php else: ?>
									<tr>
										<th rowspan="2">KODE</th>
										<th colspan="2" rowspan="2">URAIAN</th>
										<th colspan="3">ANGGARAN</th>
									</tr>
									<tr>
										<th>VOLUME</th>
										<th>HARGA SATUAN</th>
										<th>JUMLAH</th>
									</tr>
								<?php endif; ?>
							</thead>
							<tbody>
								<?php foreach ($table_rows as $row): ?>
									<?php if ($row['kind'] === 'spacer'): ?>
										<tr class="report-spacer"><td colspan="6"></td></tr>
									<?php elseif ($row['kind'] === 'header'): ?>
										<tr class="report-header">
											<th>KODE</th>
											<th>URAIAN</th>
											<th>SUMBERDANA</th>
											<th>VOLUME</th>
											<th>HARGA SATUAN</th>
											<th>JUMLAH</th>
										</tr>
									<?php elseif ($row['kind'] === 'metadata'): ?>
										<tr class="report-metadata">
											<th><?= html_escape($row['kode']) ?></th>
											<td colspan="5"><?= html_escape($row['uraian']) ?></td>
										</tr>
									<?php elseif ($row['kind'] === 'section'): ?>
										<tr class="report-section">
											<th colspan="6"><?= html_escape($row['uraian']) ?></th>
										</tr>
									<?php else: ?>
										<tr class="report-<?= html_escape($row['kind']) ?> report-level-<?= (int) $row['level'] ?>">
											<td><?= html_escape($row['kode']) ?></td>
											<td style="padding-left: <?= 8 + ((int) $row['level'] * 16) ?>px !important;">
												<?= html_escape($row['uraian']) ?>
											</td>
											<td><?= html_escape($row['sumber_dana']) ?></td>
											<td class="text-right">
												<?= $row['volume'] === null ? '' : ($report_key === 'belanja' ? $reportVolume($row['volume']) : $reportMoney($row['volume'])) . (trim((string) ($row['satuan'] ?? '')) !== '' ? ' ' . html_escape((string) $row['satuan']) : '') ?>
											</td>
											<td class="text-right"><?= $row['harga_satuan'] === null ? '' : $reportMoney($row['harga_satuan']) ?></td>
											<td class="text-right"><?= $row['jumlah'] === null ? '' : $reportMoney($row['jumlah']) ?></td>
										</tr>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php if ($table_rows === []): ?>
									<tr><td colspan="6" class="text-center">Belum ada data e-RAB untuk filter ini.</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				<?php else: ?>
					<div class="table-responsive">
						<table class="table table-bordered report-extra report-extra-<?= html_escape($report_key) ?>">
							<thead>
								<?php if (in_array($report_key, ['apbdes', 'sumber_dana'], true)): ?>
									<tr>
										<th>Kode</th>
										<th>Rekening</th>
										<th>Uraian</th>
										<th>Anggaran (Rp)</th>
										<th>Sumberdana</th>
									</tr>
								<?php elseif ($report_key === 'penjabaran'): ?>
									<tr>
										<th>Kode</th>
										<th>Rekening</th>
										<th>Uraian</th>
										<th>Volume</th>
										<th>Satuan</th>
										<th>Anggaran (Rp)</th>
										<th>Sumberdana</th>
									</tr>
								<?php else: ?>
									<tr>
										<th>Kode</th>
										<th>Rekening</th>
										<th>Uraian</th>
										<th>Semula (Rp)</th>
										<th>Menjadi (Rp)</th>
										<th>Bertambah / (Berkurang)</th>
										<th>Sumberdana</th>
									</tr>
								<?php endif; ?>
							</thead>
							<tbody>
								<?php foreach ($detail_table_rows as $row): ?>
									<tr>
										<td><?= html_escape($row['kode']) ?></td>
										<td><?= html_escape($row['rekening']) ?></td>
										<td>
											<?= html_escape($row['uraian']) ?>
											<?php if ($row['kegiatan'] !== ''): ?><br><small><?= html_escape($row['kegiatan']) ?></small><?php endif; ?>
										</td>
										<?php if (in_array($report_key, ['apbdes', 'sumber_dana'], true)): ?>
											<td class="text-right"><?= $reportMoney($row['jumlah_menjadi']) ?></td>
										<?php elseif ($report_key === 'penjabaran'): ?>
											<td class="text-right"><?= $reportMoney($row['volume']) ?></td>
											<td><?= html_escape($row['satuan']) ?></td>
											<td class="text-right"><?= $reportMoney($row['jumlah_menjadi']) ?></td>
										<?php else: ?>
											<td class="text-right"><?= $reportMoney($row['jumlah_semula']) ?></td>
											<td class="text-right"><?= $reportMoney($row['jumlah_menjadi']) ?></td>
											<td class="text-right"><?= $reportMoney($row['selisih']) ?></td>
										<?php endif; ?>
										<td><?= html_escape($row['sumber_dana']) ?></td>
									</tr>
								<?php endforeach; ?>
								<?php if ($detail_table_rows === []): ?>
									<tr><td colspan="<?= $report_key === 'penjabaran' || $report_key === 'konsolidasi' ? 7 : 5 ?>" class="text-center">Belum ada data e-RAB untuk filter ini.</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
					<?php if ($filters['tahun'] !== ''): ?>
						<details class="report-opensid-extra">
							<summary>Komparasi Anggaran dan Realisasi OpenSID (<?= html_escape($filters['tahun']) ?>)</summary>
							<p class="text-muted">
								Realisasi bersumber dari APBDes manual. Pencocokan dilakukan berdasarkan tahun, jenis, dan kode rekening,
								bukan per kegiatan atau sumber dana; baris yang tidak memiliki pasangan ditandai pada kolom status.
							</p>
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Jenis</th>
											<th>Kode Rekening</th>
											<th>Uraian</th>
											<th class="text-right">e-RAB Murni</th>
											<th class="text-right">e-RAB Perubahan</th>
											<th class="text-right">Anggaran APBDes Manual</th>
											<th class="text-right">Realisasi APBDes Manual</th>
											<th>Status Pencocokan</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($account_comparison as $comparison): ?>
											<tr>
												<td><?= html_escape($comparison['jenis']) ?></td>
												<td><?= html_escape($comparison['kode']) ?></td>
												<td><?= html_escape($comparison['uraian'] !== '' ? $comparison['uraian'] : '-') ?></td>
												<td class="text-right"><?= $money($comparison['murni']) ?></td>
												<td class="text-right"><?= $money($comparison['perubahan']) ?></td>
												<td class="text-right"><?= $money($comparison['anggaran_manual']) ?></td>
												<td class="text-right"><?= $money($comparison['realisasi_manual']) ?></td>
												<td><?= html_escape($comparison['status']) ?></td>
											</tr>
										<?php endforeach; ?>
										<?php if ($account_comparison === []): ?>
											<tr><td colspan="8" class="text-center">Belum ada data e-RAB atau APBDes manual untuk tahun ini.</td></tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</details>
					<?php endif; ?>
				<?php endif; ?>
				<?php if (in_array($report_key, ['apbdes', 'konsolidasi'], true)): ?>
					<details class="report-opensid-extra">
						<summary>Ringkasan APBDes OpenSID</summary>
						<div class="table-responsive">
							<table class="table table-bordered report-extra">
								<thead>
									<tr>
										<th>Komponen APBDes</th>
										<th>Semula (Rp)</th>
										<th>Menjadi (Rp)</th>
										<th>Selisih (Rp)</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ([
										'Pendapatan' => ['pendapatan_semula', 'pendapatan_menjadi'],
										'Belanja' => ['belanja_semula', 'belanja_menjadi'],
										'Surplus / (Defisit)' => ['surplus_semula', 'surplus_menjadi'],
										'Pembiayaan Netto' => ['pembiayaan_netto_semula', 'pembiayaan_netto_menjadi'],
										'SiLPA Akhir' => ['silpa_semula', 'silpa_menjadi'],
									] as $label => [$oldKey, $newKey]): ?>
										<tr>
											<td><?= html_escape($label) ?></td>
											<td class="text-right"><?= $money($summary[$oldKey] ?? 0) ?></td>
											<td class="text-right"><?= $money($summary[$newKey] ?? 0) ?></td>
											<td class="text-right"><?= $money(($summary[$newKey] ?? 0) - ($summary[$oldKey] ?? 0)) ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</details>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<script>
	(function () {
		'use strict';
		var report = document.getElementById('laporan-jenis');
		var bidang = document.getElementById('filter-bidang-wrap');
		var kegiatan = document.getElementById('filter-kegiatan-wrap');
		var sumber = document.getElementById('filter-sumber-wrap');
		function updateFilters() {
			bidang.style.display = report.value === 'belanja' ? '' : 'none';
			kegiatan.style.display = report.value === 'belanja' ? '' : 'none';
			sumber.style.display = report.value === 'sumber_dana' ? '' : 'none';
		}
		report.addEventListener('change', updateFilters);
		updateFilters();
	})();
</script>
