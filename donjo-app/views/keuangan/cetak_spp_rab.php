<?php

defined('BASEPATH') || exit('No direct script access allowed');

$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');
$quantity = static function ($value): string {
	$formatted = number_format((float) $value, 4, ',', '.');

	return rtrim(rtrim($formatted, '0'), ',');
};
$activities = [];

foreach ($spp['rincian'] as $item) {
	$activityId = (string) ($item['sub_kegiatan_id'] ?? ((string) $item['bidang_kode'] . '|' . (string) $item['kegiatan']));
	if (! isset($activities[$activityId])) {
		$activities[$activityId] = [
			'items' => [],
			'tax_columns' => [],
			'first_item' => $item,
			'jumlah_bruto' => 0.0,
			'jumlah_pajak' => 0.0,
			'jumlah_netto' => 0.0,
		];
	}

	$item['pajak_by_key'] = [];
	$itemTaxTotal = 0.0;
	foreach ($item['pajak'] as $tax) {
		$taxKey = (string) $tax['nama_pajak'] . '|' . (string) $tax['persentase'];
		$activities[$activityId]['tax_columns'][$taxKey] = [
			'nama' => (string) $tax['nama_pajak'],
			'persentase' => (float) $tax['persentase'],
		];
		$item['pajak_by_key'][$taxKey] = (float) $tax['nilai_pajak'];
		$itemTaxTotal += (float) $tax['nilai_pajak'];
	}
	$item['jumlah_netto_item'] = (float) $item['jumlah_bruto'] - $itemTaxTotal;
	$activities[$activityId]['items'][] = $item;
	$activities[$activityId]['jumlah_bruto'] += (float) $item['jumlah_bruto'];
	$activities[$activityId]['jumlah_pajak'] += $itemTaxTotal;
	$activities[$activityId]['jumlah_netto'] += $item['jumlah_netto_item'];
}

?>
<div class="content-wrapper">
	<section class="content-header no-print">
		<h1>Cetak SPP</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">SPP Belanja</a></li>
			<li class="active">Cetak SPP</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="box box-default">
			<div class="box-header with-border no-print">
				<button type="button" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Cetak</button>
				<a class="btn btn-default" href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">Kembali</a>
			</div>
			<div class="box-body document-page">
				<?php $pageNumber = 0; foreach ($activities as $activity): ?>
					<?php
					$pageNumber++;
					$firstItem = $activity['first_item'];
					$taxColumns = $activity['tax_columns'];
					$columnCount = 12 + count($taxColumns);
					$activityTitle = trim((string) ($firstItem['kegiatan_sumber'] ?? ''));
					if ($activityTitle === '') {
						$activityTitle = (string) $firstItem['kegiatan'];
					}
					$activityCode = trim((string) ($firstItem['kd_kegiatan'] ?? ''));
					if ($activityCode === '') {
						$activityCode = (string) ($firstItem['sub_bidang'] ?? '');
					}
					$requestedDate = DateTime::createFromFormat('!Y-m-d', (string) $spp['tanggal_spp']);
					$lineDate = $requestedDate ? $requestedDate->format('d-M-y') : (string) $spp['tanggal_spp'];
					?>
					<article class="spp-page">
						<h2 class="document-title">PENGAJUAN DANA <?= html_escape(strtoupper($activityTitle)) ?></h2>
						<div class="spp-meta">
							<table>
								<tr><th>Bidang</th><td><?= html_escape((string) ($firstItem['nama_bidang'] ?? $firstItem['bidang_kode'])) ?></td></tr>
								<tr><th>Sub Bidang</th><td><?= html_escape((string) ($firstItem['nama_sub_bidang'] ?? $firstItem['sub_bidang'])) ?></td></tr>
								<tr><th>Kegiatan</th><td><?= html_escape((string) ($firstItem['nama_kegiatan'] ?? $firstItem['kegiatan'])) ?></td></tr>
								<tr><th>Pengajuan</th><td><?= (int) $spp['tahun'] ?></td></tr>
							</table>
							<table>
								<tr><th>PK</th><td><?= html_escape((string) ($firstItem['pka'] ?? '-')) ?></td></tr>
								<tr><th>Kode</th><td><?= html_escape($activityCode) ?></td></tr>
								<tr><th>Hal</th><td><?= $pageNumber ?></td></tr>
								<tr><th>No</th><td><?= html_escape((string) $spp['nomor_spp']) ?></td></tr>
							</table>
						</div>
						<div class="table-responsive">
							<table class="table spp-details">
								<thead>
									<tr class="package-heading"><th colspan="<?= $columnCount ?>"><?= html_escape((string) ($firstItem['nama_paket'] ?: $firstItem['rekening_nama'])) ?></th></tr>
									<tr>
										<th>NO</th>
										<th>TANGGAL</th>
										<th>POS BELANJA</th>
										<th>TOKO/PENERIMA</th>
										<th>BELANJA</th>
										<th>QTY</th>
										<th>HARGA SATUAN</th>
										<th>JUMLAH</th>
										<?php foreach ($taxColumns as $tax): ?>
											<th>PAJAK <?= html_escape(strtoupper($tax['nama'])) ?><br>(<?= number_format($tax['persentase'], 2, ',', '.') ?>%)</th>
										<?php endforeach; ?>
										<th>TOTAL</th>
										<th>NO REK</th>
										<th>NAMA REKENING BPD</th>
										<th>NPWP</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($activity['items'] as $index => $item): ?>
										<?php
										$unitPrice = (float) $item['harga_satuan'];
										$paidQuantity = $unitPrice > 0
											? (float) $item['jumlah_bruto'] / $unitPrice
											: (float) $item['volume'];
										$packageName = trim((string) ($item['nama_paket'] ?: $item['rekening_nama']));
										?>
										<?php if ($index > 0 && $packageName !== trim((string) ($activity['items'][$index - 1]['nama_paket'] ?: $activity['items'][$index - 1]['rekening_nama']))): ?>
											<tr class="package-heading"><th colspan="<?= $columnCount ?>"><?= html_escape($packageName) ?></th></tr>
										<?php endif; ?>
										<tr>
											<td><?= $index + 1 ?></td>
											<td><?= html_escape($lineDate) ?></td>
											<td><?= html_escape((string) $item['rekening_nama']) ?></td>
											<td><?= html_escape((string) $spp['penerima']) ?></td>
											<td><?= html_escape((string) $item['keterangan']) ?></td>
											<td class="number"><?= html_escape($quantity($paidQuantity)) ?></td>
											<td class="number">Rp <?= $money($unitPrice) ?></td>
											<td class="number">Rp <?= $money($item['jumlah_bruto']) ?></td>
											<?php
											$itemTaxTotal = 0.0;
											foreach ($taxColumns as $taxKey => $tax) {
												$taxAmount = (float) ($item['pajak_by_key'][$taxKey] ?? 0);
												$itemTaxTotal += $taxAmount;
												?>
												<td class="number">Rp <?= $money($taxAmount) ?></td>
											<?php } ?>
											<td class="number">Rp <?= $money($item['jumlah_bruto'] - $itemTaxTotal) ?></td>
											<td><?= html_escape((string) ($spp['nomor_rekening_bpd'] ?? '')) ?></td>
											<td><?= html_escape((string) ($spp['nama_rekening_bpd'] ?? '')) ?></td>
											<td><?= html_escape((string) ($spp['npwp'] ?? '')) ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class="total-row">
										<th colspan="7">JUMLAH TOTAL</th>
										<th class="number">Rp <?= $money($activity['jumlah_bruto']) ?></th>
										<?php foreach ($taxColumns as $taxKey => $tax): ?>
											<?php
											$taxTotal = 0.0;
											foreach ($activity['items'] as $item) {
												$taxTotal += (float) ($item['pajak_by_key'][$taxKey] ?? 0);
											}
											?>
											<th class="number">Rp <?= $money($taxTotal) ?></th>
										<?php endforeach; ?>
										<th class="number">Rp <?= $money($activity['jumlah_netto']) ?></th>
										<th colspan="3"></th>
									</tr>
									<tr class="paid-row">
										<th colspan="<?= 8 + count($taxColumns) ?>">TOTAL DIBAYARKAN</th>
										<th class="number">Rp <?= $money($activity['jumlah_netto']) ?></th>
										<th colspan="3"></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="signature-row">
							<div>Verifikasi<br><br><br><strong>....................................</strong></div>
							<div>
								<?= html_escape((string) identitas('nama_desa')) ?>, <?= (int) $spp['tahun'] ?><br>
								Pelaksana Kegiatan<br><br><br>
								<strong><?= html_escape((string) ($firstItem['pka'] ?? '....................................')) ?></strong>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
<style>
	.document-page { color: #111; margin: 0 auto; padding: 25px; }
	.spp-page { max-width: 1500px; margin: 0 auto 35px; page-break-after: always; }
	.spp-page:last-child { page-break-after: auto; }
	.document-title { text-align: center; font-size: 15px; font-weight: bold; margin: 0 0 12px; }
	.spp-meta { display: flex; justify-content: space-between; gap: 30px; margin: 0 8px 8px; font-size: 10px; }
	.spp-meta table { border-collapse: collapse; }
	.spp-meta th { text-align: left; padding-right: 8px; white-space: nowrap; }
	.spp-meta td { padding-right: 14px; }
	.spp-details { width: 100%; table-layout: fixed; border-collapse: collapse; font-size: 9px; }
	.spp-details th, .spp-details td { border: 1px solid #222 !important; padding: 3px 2px !important; vertical-align: middle !important; overflow-wrap: anywhere; }
	.spp-details thead th { background: #f3df63 !important; text-align: center; }
	.spp-details .package-heading th { background: #f3df63 !important; text-align: left; font-weight: bold; }
	.spp-details .number { text-align: right; white-space: nowrap; }
	.spp-details .total-row th { background: #c9ddb6 !important; }
	.spp-details .paid-row th { background: #b7d2e8 !important; }
	.signature-row { display: flex; justify-content: space-between; text-align: center; margin: 12px 25px 0; font-size: 10px; }
	.signature-row > div { min-width: 200px; }
	@page { size: A4 landscape; margin: 8mm; }
	@media print {
		.main-header, .main-sidebar, .control-sidebar, .content-header, .no-print, .main-footer { display: none !important; }
		.content-wrapper { margin-left: 0 !important; min-height: 0 !important; }
		.content { padding: 0 !important; }
		.box, .box-body { border: 0 !important; padding: 0 !important; }
		.document-page { width: 100%; padding: 0; }
		.spp-page { width: 100%; max-width: none; margin: 0; }
		.spp-details { font-size: 9px; }
		.spp-details tr { page-break-inside: avoid; }
		.spp-details thead, .spp-details tfoot { print-color-adjust: exact; -webkit-print-color-adjust: exact; }
	}
</style>
