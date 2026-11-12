<?php

defined('BASEPATH') || exit('No direct script access allowed');

$item = $record['item'];
$receipt = $item['kuitansi'];
$rab = $record['rab'];
$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');
$taxTotals = ['ppn' => 0.0, 'pph' => 0.0, 'lainnya' => 0.0];
$taxTotal = 0.0;
foreach ($item['pajak'] as $tax) {
	$taxName = (string) $tax['nama_pajak'];
	$taxAmount = (float) $tax['nilai_pajak'];
	$taxTotal += $taxAmount;
	if (stripos($taxName, 'ppn') !== false) {
		$taxTotals['ppn'] += $taxAmount;
	} elseif (stripos($taxName, 'pph') !== false) {
		$taxTotals['pph'] += $taxAmount;
	} else {
		$taxTotals['lainnya'] += $taxAmount;
	}
}
$gross = (float) ($receipt['jumlah_bruto'] ?? $item['jumlah_bruto']);
$paid = (float) ($receipt['jumlah_dibayar'] ?? ($gross - $taxTotal));
$paidInWords = number_to_words((int) round($paid), true);
$paymentDate = tgl_indo((string) $receipt['tanggal_bayar']);
$villageName = strtoupper((string) identitas('nama_desa'));
$districtName = strtoupper((string) identitas('nama_kabupaten'));
$sourceName = trim((string) ($item['sumber_dana'] ?? ''));
$activityDescription = trim((string) ($rab['kd_kegiatan'] ?? '') . ' ' . (string) ($rab['nama_kegiatan'] ?? $rab['kegiatan']));

?>
<div class="content-wrapper">
	<section class="content-header no-print">
		<h1>Cetak Kuitansi</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li class="active">Cetak Kuitansi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="box box-default">
			<div class="box-header with-border no-print">
				<button type="button" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Cetak</button>
				<a class="btn btn-default" href="<?= site_url('keuangan_manual/kuitansi_item_rab/' . (int) $item['id']) ?>">Kembali</a>
			</div>
			<div class="box-body receipt-page">
				<div class="receipt">
					<header class="receipt-heading">
						<div class="government-heading">
							<strong>PEMERINTAH KALURAHAN <?= html_escape($villageName) ?></strong><br>
							KABUPATEN <?= html_escape($districtName) ?>
						</div>
						<div class="source-fund">
							Sumberdana : <strong><?= html_escape($sourceName !== '' ? $sourceName : '-') ?></strong>
						</div>
					</header>
					<h2 class="receipt-title">TANDA BUKTI PENGELUARAN UANG</h2>
					<div class="receipt-number">
						<span>NOMOR : <strong><?= html_escape((string) $receipt['nomor_kuitansi']) ?></strong></span>
					</div>
					<table class="receipt-fields">
						<tr>
							<th>Sudah diterima dari</th><td>:</td><td colspan="2">KAUR DANARTA</td>
						</tr>
						<tr>
							<th>Uang sebesar</th><td>:</td><td colspan="2" class="amount"><strong>Rp. <?= $money($paid) ?></strong></td>
						</tr>
						<tr class="amount-words">
							<td></td><td></td><td colspan="2">=== <?= html_escape($paidInWords) ?> ===</td>
						</tr>
						<tr>
							<th>Sebagai pembayaran</th><td>:</td><td colspan="2"><?= nl2br(html_escape((string) $receipt['sebagai_pembayaran'])) ?></td>
						</tr>
						<tr>
							<th>Kegiatan</th><td>:</td><td colspan="2"><?= html_escape($activityDescription) ?></td>
						</tr>
						<tr>
							<th>Rek. Belanja</th><td>:</td><td colspan="2"><?= html_escape(trim((string) $rab['rekening_kode'] . ' ' . (string) $rab['rekening_nama'])) ?></td>
						</tr>
					</table>
					<div class="financial-heading">
						<strong>Catatan Keuangan</strong> : Potongan Pajak, Pajak Daerah dan potongan Lainnya :
					</div>
					<table class="receipt-financial">
						<tbody>
							<tr><th>Nilai</th><td>:</td><td class="amount">Rp. <?= $money($gross) ?></td></tr>
							<tr><th>Pot Pajak PPN</th><td>:</td><td class="amount">Rp. <?= $money($taxTotals['ppn']) ?></td></tr>
							<tr><th>Pot Pajak PPh</th><td>:</td><td class="amount">Rp. <?= $money($taxTotals['pph']) ?></td></tr>
							<tr><th>Pot Lainnya</th><td>:</td><td class="amount">Rp. <?= $money($taxTotals['lainnya']) ?></td></tr>
							<tr class="amount-paid"><th>Dibayarkan</th><td>:</td><td class="amount">Rp. <?= $money($paid) ?></td></tr>
						</tbody>
					</table>
					<div class="receipt-signature">
						<div>
							Yang Memberi,<br>
							<strong>KAUR DANARTA</strong><br><br><br>
							<strong>( ................................ )</strong>
						</div>
						<div>
							<?= html_escape($paymentDate) ?><br>
							Yang Menerima,<br><br><br><br>
							<strong><?= html_escape((string) $receipt['penerima']) ?></strong>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<style>
	.receipt-page { padding: 25px; }
	.receipt { box-sizing: border-box; width: 100%; max-width: 850px; border: 1px solid #222; padding: 28px 36px; margin: 0 auto; color: #111; font-family: Arial, sans-serif; font-size: 13px; }
	.receipt-heading { display: flex; justify-content: space-between; align-items: flex-start; min-height: 55px; border-bottom: 1px solid #222; padding-bottom: 8px; }
	.government-heading { text-align: left; }
	.source-fund { text-align: right; padding-top: 8px; }
	.receipt-title { text-align: center; font-size: 17px; font-weight: bold; margin: 12px 0 8px; }
	.receipt-number { display: flex; justify-content: center; margin-bottom: 15px; }
	.receipt-number span { display: block; min-width: 68%; border: 1px solid #222; padding: 5px 8px; text-align: center; }
	.receipt-fields, .receipt-financial { width: 100%; border-collapse: collapse; table-layout: fixed; }
	.receipt-fields { margin-bottom: 15px; }
	.receipt-fields th, .receipt-financial th { width: 190px; text-align: left; font-weight: normal; }
	.receipt-fields th, .receipt-fields td, .receipt-financial th, .receipt-financial td { vertical-align: top; padding: 3px 4px; }
	.receipt-fields td:nth-child(2), .receipt-financial td:nth-child(2) { width: 14px; }
	.receipt-fields .amount, .receipt-financial .amount { text-align: right; white-space: nowrap; }
	.amount-words { font-style: italic; }
	.financial-heading { margin: 8px 0 2px; }
	.receipt-financial td.amount { border-bottom: 1px solid #555; }
	.receipt-financial .amount-paid th, .receipt-financial .amount-paid td { font-weight: bold; }
	.receipt-financial .amount-paid td.amount { border-bottom: 3px double #222; }
	.receipt-signature { display: flex; justify-content: space-between; gap: 25px; text-align: center; margin-top: 35px; }
	.receipt-signature > div { flex: 1; }
	@page { size: A4 portrait; margin: 10mm; }
	@media print {
		.main-header, .main-sidebar, .control-sidebar, .content-header, .no-print, .main-footer { display: none !important; }
		.content-wrapper { margin-left: 0 !important; min-height: 0 !important; }
		.content { padding: 0 !important; }
		.box, .box-body { border: 0 !important; padding: 0 !important; }
		.receipt-page { width: 100%; padding: 0; }
		.receipt { width: 100%; max-width: none; padding: 10mm; page-break-inside: avoid; }
		.receipt-fields tr, .receipt-financial tr { page-break-inside: avoid; }
	}
</style>
