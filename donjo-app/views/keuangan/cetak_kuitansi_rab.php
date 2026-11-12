<?php

defined('BASEPATH') || exit('No direct script access allowed');

$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');
$difference = (float) $spp['selisih_bayar'];
$differenceLabel = $difference > 0 ? 'Lebih bayar' : ($difference < 0 ? 'Kurang bayar' : 'Sesuai');

?>
<div class="content-wrapper">
	<section class="content-header no-print">
		<h1>Cetak Kuitansi</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">SPP &amp; Kuitansi</a></li>
			<li class="active">Cetak Kuitansi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="box box-default">
			<div class="box-header with-border no-print">
				<button type="button" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Cetak</button>
				<a class="btn btn-default" href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">Kembali</a>
			</div>
			<div class="box-body receipt-page">
				<div class="receipt">
					<div class="receipt-header">
						<strong>PEMERINTAH KALURAHAN <?= html_escape(strtoupper((string) identitas('nama_desa'))) ?></strong><br>
						<?= html_escape((string) identitas('nama_kecamatan')) ?>, <?= html_escape((string) identitas('nama_kabupaten')) ?>
						<h2>KUITANSI</h2>
					</div>
					<table class="table table-condensed receipt-meta">
						<tr><th style="width: 180px;">Nomor Kuitansi</th><td><?= html_escape((string) $spp['nomor_kuitansi']) ?></td></tr>
						<tr><th>Tanggal</th><td><?= html_escape((string) $spp['tanggal_bayar']) ?></td></tr>
						<tr><th>Sudah diterima dari</th><td>Pemerintah Kalurahan <?= html_escape((string) identitas('nama_desa')) ?></td></tr>
						<tr><th>Nama penerima</th><td><?= html_escape((string) $spp['penerima_kuitansi']) ?></td></tr>
						<tr><th>Alamat</th><td><?= html_escape((string) ($spp['alamat_kuitansi'] ?? '-')) ?></td></tr>
						<tr><th>NPWP</th><td><?= html_escape((string) ($spp['npwp_kuitansi'] ?? '-')) ?></td></tr>
						<tr><th>Terbilang</th><td><strong>Rp <?= $money($spp['jumlah_dibayar']) ?></strong></td></tr>
						<tr><th>Untuk pembayaran</th><td><?= nl2br(html_escape((string) $spp['keperluan'])) ?></td></tr>
						<tr><th>Nomor SPP</th><td><?= html_escape((string) $spp['nomor_spp']) ?></td></tr>
					</table>
					<table class="table table-bordered">
						<tbody>
							<tr><th>Jumlah bruto SPP</th><td class="text-right">Rp <?= $money($spp['jumlah_bruto']) ?></td></tr>
							<tr><th>Total potongan pajak</th><td class="text-right">Rp <?= $money($spp['jumlah_pajak']) ?></td></tr>
							<tr><th>Jumlah netto SPP</th><td class="text-right">Rp <?= $money($spp['jumlah_netto']) ?></td></tr>
							<tr><th>Jumlah dibayar</th><td class="text-right">Rp <?= $money($spp['jumlah_dibayar']) ?></td></tr>
							<tr><th><?= html_escape($differenceLabel) ?></th><td class="text-right">Rp <?= $money(abs($difference)) ?></td></tr>
						</tbody>
					</table>
					<div class="receipt-signature">
						<div>Yang menerima,<br><br><br><strong><?= html_escape((string) $spp['penerima_kuitansi']) ?></strong></div>
						<div><?= html_escape((string) identitas('nama_desa')) ?>, <?= html_escape((string) $spp['tanggal_bayar']) ?><br>Yang membayar,<br><br><br><strong>( ................................ )</strong></div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<style>
	.receipt-page { padding: 25px; }
	.receipt { max-width: 850px; border: 1px solid #333; padding: 30px; margin: 0 auto; color: #111; }
	.receipt-header { text-align: center; }
	.receipt-header h2 { border-top: 2px solid #111; border-bottom: 2px solid #111; font-size: 21px; font-weight: bold; padding: 10px; }
	.receipt-meta th { padding-left: 0 !important; }
	.receipt-signature { display: flex; justify-content: space-between; gap: 25px; text-align: center; margin-top: 40px; }
	.receipt-signature > div { flex: 1; }
	@media print {
		.main-header, .main-sidebar, .control-sidebar, .content-header, .no-print, .main-footer { display: none !important; }
		.content-wrapper { margin-left: 0 !important; min-height: 0 !important; }
		.content { padding: 0 !important; }
		.box { border: 0 !important; }
		.receipt-page { padding: 0; }
	}
</style>
