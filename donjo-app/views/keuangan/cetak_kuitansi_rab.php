<?php

defined('BASEPATH') || exit('No direct script access allowed');

$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');

?>
<div class="content-wrapper">
	<section class="content-header no-print">
		<h1>Cetak Kuitansi</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">SPP Belanja</a></li>
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
				<?php foreach ($spp['kuitansi'] as $receipt): ?>
					<?php
					$item = $receipt['rincian'] ?? null;
					$taxes = $item['pajak'] ?? [];
					$gross = $item === null ? (float) $spp['jumlah_bruto'] : (float) $item['jumlah_bruto'];
					$taxTotal = $item === null
						? (float) $spp['jumlah_pajak']
						: array_sum(array_map(static fn (array $tax): float => (float) $tax['nilai_pajak'], $taxes));
					$net = $item === null ? (float) $spp['jumlah_netto'] : round($gross - $taxTotal, 2);
					$paid = (float) $receipt['jumlah_dibayar'];
					$difference = (float) $receipt['selisih_bayar'];
					$differenceLabel = $difference > 0 ? 'Lebih bayar' : ($difference < 0 ? 'Kurang bayar' : 'Sesuai');
					$paymentDescription = trim((string) ($receipt['sebagai_pembayaran'] ?? ''));
					if ($paymentDescription === '') {
						$paymentDescription = (string) $spp['keperluan'];
					}
					?>
					<div class="receipt">
						<div class="receipt-header">
							<strong>PEMERINTAH KALURAHAN <?= html_escape(strtoupper((string) identitas('nama_desa'))) ?></strong><br>
							<?= html_escape((string) identitas('nama_kecamatan')) ?>, <?= html_escape((string) identitas('nama_kabupaten')) ?>
							<h2>TANDA BUKTI PENGELUARAN UANG</h2>
						</div>
						<table class="table table-condensed receipt-meta">
							<tr><th style="width: 180px;">Nomor</th><td><?= html_escape((string) $receipt['nomor_kuitansi']) ?></td></tr>
							<tr><th>Tanggal</th><td><?= html_escape((string) $receipt['tanggal_bayar']) ?></td></tr>
							<tr><th>Sudah diterima dari</th><td>KAUR DANARTA</td></tr>
							<tr><th>Penerima</th><td><?= html_escape((string) $receipt['penerima']) ?></td></tr>
							<tr><th>Uang sebesar</th><td><strong>Rp <?= $money($paid) ?></strong></td></tr>
							<tr><th>Sebagai pembayaran</th><td><?= nl2br(html_escape($paymentDescription)) ?></td></tr>
							<?php if ($item !== null): ?>
								<tr><th>Sub-belanja</th><td><?= html_escape((string) $item['keterangan']) ?></td></tr>
							<?php endif; ?>
						</table>
						<table class="table table-bordered">
							<tbody>
								<tr><th>Jumlah bruto</th><td class="text-right">Rp <?= $money($gross) ?></td></tr>
								<?php foreach ($taxes as $tax): ?>
									<tr>
										<th>Potongan <?= html_escape((string) $tax['nama_pajak']) ?> (<?= number_format((float) $tax['persentase'], 4, ',', '.') ?>%)</th>
										<td class="text-right">Rp <?= $money($tax['nilai_pajak']) ?></td>
									</tr>
								<?php endforeach; ?>
								<tr><th>Total potongan pajak</th><td class="text-right">Rp <?= $money($taxTotal) ?></td></tr>
								<tr><th>Jumlah netto</th><td class="text-right">Rp <?= $money($net) ?></td></tr>
								<tr><th>Jumlah dibayar</th><td class="text-right">Rp <?= $money($paid) ?></td></tr>
								<tr><th><?= html_escape($differenceLabel) ?></th><td class="text-right">Rp <?= $money(abs($difference)) ?></td></tr>
							</tbody>
						</table>
						<div class="receipt-signature">
							<div>Yang membayar,<br>KAUR DANARTA<br><br><br><strong>( ................................ )</strong></div>
							<div>Yang menerima,<br><br><br><strong><?= html_escape((string) $receipt['penerima']) ?></strong></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
<style>
	.receipt-page { padding: 25px; }
	.receipt { max-width: 850px; border: 1px solid #333; padding: 30px; margin: 0 auto; color: #111; }
	.receipt:not(:last-child) { page-break-after: always; }
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
		.receipt { border: 1px solid #333; }
	}
</style>
