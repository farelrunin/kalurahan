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
$summary = $summary ?? [];
$months = [1 => 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

?>
<style>
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
		<h1>Laporan Keuangan e-RAB</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/manual_apbdes') ?>">Keuangan</a></li>
			<li class="active">Laporan e-RAB</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title"><?= html_escape($report_title) ?></h3>
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
					<button type="button" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Cetak / Simpan PDF</button>
				</form>

				<hr>
				<p class="text-muted">
					Periode: <?= $filters['tahun'] !== '' ? html_escape($filters['tahun']) : 'Semua tahun' ?>
					<?= $filters['tahap'] !== '' ? ' · ' . html_escape(ucfirst($filters['tahap'])) : '' ?>
				</p>

				<?php if (in_array($report_key, ['apbdes', 'konsolidasi'], true)): ?>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr><th>Komponen APBDes</th><th class="text-right">Semula</th><th class="text-right">Menjadi</th><th class="text-right">Selisih</th></tr>
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
										<th><?= html_escape($label) ?></th>
										<td class="text-right"><?= $money($summary[$oldKey] ?? 0) ?></td>
										<td class="text-right"><?= $money($summary[$newKey] ?? 0) ?></td>
										<td class="text-right"><?= $money(($summary[$newKey] ?? 0) - ($summary[$oldKey] ?? 0)) ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>

				<?php if ($filters['tahun'] !== ''): ?>
					<h4>Komparasi Anggaran dan Realisasi per Rekening (<?= html_escape($filters['tahun']) ?>)</h4>
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
				<?php endif; ?>

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Tahun / Tahap</th>
								<th>Pos / Kode Rekening</th>
								<th>Uraian / Kegiatan</th>
								<th>Output / Item</th>
								<th>Detail Kegiatan</th>
								<th>Sumber Dana</th>
								<th class="text-right">Volume</th>
								<th class="text-right">Harga Satuan</th>
								<th class="text-right">Semula</th>
								<th class="text-right">Menjadi</th>
								<th class="text-right">Selisih</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rows as $row): ?>
								<tr>
									<td><?= html_escape($row['tahun'] . ' / ' . $row['tahap_label']) ?></td>
									<td>
										<?= html_escape(strtoupper($row['jenis']) . ' / ' . ($row['rekening_kode'] ?? '-')) ?>
										<?php if (! empty($row['klasifikasi_belanja'])): ?><br><small><?= html_escape('Belanja ' . $row['klasifikasi_belanja']) ?></small><?php endif; ?>
									</td>
									<td>
										<?= html_escape($row['rekening_nama'] ?? '-') ?>
										<?php if (! empty($row['kegiatan'])): ?><br><small><?= html_escape(($row['bidang_kode'] ?? '') . ' ' . $row['kegiatan']) ?></small><?php endif; ?>
									</td>
									<td>
										<?= html_escape($row['output'] ?: '-') ?>
										<?php if (! empty($row['keterangan'])): ?><br><small><?= html_escape($row['keterangan']) ?></small><?php endif; ?>
									</td>
									<td>
										<?php if (! empty($row['bulan_mulai']) || ! empty($row['bulan_selesai'])): ?>
											<?= html_escape(($months[(int) $row['bulan_mulai']] ?? '-') . '–' . ($months[(int) $row['bulan_selesai']] ?? '-')) ?><br>
										<?php endif; ?>
										<small>
											Sasaran L/P/RTM:
											<?= (int) $row['penerima_laki'] ?>/<?= (int) $row['penerima_perempuan'] ?>/<?= (int) $row['penerima_rtm'] ?>
											<?php if (! empty($row['lokasi'])): ?><br>Lokasi: <?= html_escape($row['lokasi']) ?><?php endif; ?>
											<?php if (! empty($row['target_sdgs'])): ?><br>SDGs: <?= html_escape($row['target_sdgs']) ?><?php endif; ?>
											<?php if (! empty($row['pka']) || ! empty($row['tpk'])): ?><br>PKA/TPK: <?= html_escape(($row['pka'] ?: '-') . ' / ' . ($row['tpk'] ?: '-')) ?><?php endif; ?>
										</small>
									</td>
									<td><?= html_escape($row['sumber_dana'] ?? '-') ?></td>
									<td class="text-right"><?= number_format((float) ($row['volume'] ?? 0), 4, ',', '.') ?> <?= html_escape($row['satuan'] ?? '') ?></td>
									<td class="text-right"><?= $money($row['harga_satuan'] ?? 0) ?></td>
									<td class="text-right"><?= $money($row['jumlah_semula']) ?></td>
									<td class="text-right"><?= $money($row['jumlah_menjadi']) ?></td>
									<td class="text-right"><?= $money($row['selisih']) ?></td>
								</tr>
							<?php endforeach; ?>
							<?php if ($rows === []): ?>
								<tr><td colspan="11" class="text-center">Belum ada data e-RAB untuk filter ini.</td></tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
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
