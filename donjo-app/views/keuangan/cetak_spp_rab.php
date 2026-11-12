<?php

defined('BASEPATH') || exit('No direct script access allowed');

$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');
$stageLabel = $spp['tahap'] === 'perubahan' ? 'Perubahan' : 'Murni';

?>
<div class="content-wrapper">
	<section class="content-header no-print">
		<h1>Cetak SPP</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">SPP &amp; Kuitansi</a></li>
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
				<div class="document-header">
					<strong>PEMERINTAH KALURAHAN <?= html_escape(strtoupper((string) identitas('nama_desa'))) ?></strong><br>
					<?= html_escape((string) identitas('nama_kecamatan')) ?>, <?= html_escape((string) identitas('nama_kabupaten')) ?>
					<hr>
					<h2>SURAT PERMINTAAN PEMBAYARAN (SPP)</h2>
					<p>Tahun Anggaran <?= (int) $spp['tahun'] ?> · <?= html_escape($stageLabel) ?></p>
				</div>
				<table class="table table-condensed document-meta">
					<tr><th style="width: 180px;">Nomor SPP</th><td><?= html_escape((string) $spp['nomor_spp']) ?></td></tr>
					<tr><th>Tanggal SPP</th><td><?= html_escape((string) $spp['tanggal_spp']) ?></td></tr>
					<tr><th>Jenis SPP</th><td><?= html_escape((string) $spp['jenis_spp']) ?></td></tr>
					<tr><th>Penerima</th><td><?= html_escape((string) $spp['penerima']) ?></td></tr>
					<tr><th>Alamat</th><td><?= html_escape((string) ($spp['alamat'] ?? '-')) ?></td></tr>
					<tr><th>NPWP</th><td><?= html_escape((string) ($spp['npwp'] ?? '-')) ?></td></tr>
					<tr><th>Keperluan</th><td><?= nl2br(html_escape((string) $spp['keperluan'])) ?></td></tr>
				</table>
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 45px;">No.</th>
								<th>Uraian</th>
								<th class="text-right" style="width: 160px;">Jumlah Bruto</th>
								<th class="text-right" style="width: 160px;">Potongan Pajak</th>
								<th class="text-right" style="width: 160px;">Jumlah Netto</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($spp['rincian'] as $index => $item): ?>
								<?php $taxAmount = array_sum(array_map(static fn (array $tax): float => (float) $tax['nilai_pajak'], $item['pajak'])); ?>
								<tr>
									<td><?= $index + 1 ?></td>
									<td>
										<?= html_escape((string) $item['keterangan']) ?>
										<?php if ($item['pajak'] !== []): ?>
											<br><small>
												<?php foreach ($item['pajak'] as $taxIndex => $tax): ?>
													<?= $taxIndex > 0 ? ' · ' : '' ?><?= html_escape((string) $tax['nama_pajak']) ?> <?= number_format((float) $tax['persentase'], 4, ',', '.') ?>%
												<?php endforeach; ?>
											</small>
										<?php endif; ?>
									</td>
									<td class="text-right"><?= $money($item['jumlah_bruto']) ?></td>
									<td class="text-right"><?= $money($taxAmount) ?></td>
									<td class="text-right"><?= $money((float) $item['jumlah_bruto'] - $taxAmount) ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
						<tfoot>
							<tr>
								<th colspan="2" class="text-right">Total</th>
								<th class="text-right"><?= $money($spp['jumlah_bruto']) ?></th>
								<th class="text-right"><?= $money($spp['jumlah_pajak']) ?></th>
								<th class="text-right"><?= $money($spp['jumlah_netto']) ?></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<p>Jumlah yang diminta dibayarkan secara netto sebesar <strong>Rp <?= $money($spp['jumlah_netto']) ?></strong>.</p>
				<div class="signature-grid">
					<div>Mengetahui,<br>Kepala Kalurahan<br><br><br><strong>( ................................ )</strong></div>
					<div>Diajukan oleh,<br>Pelaksana Kegiatan<br><br><br><strong>( ................................ )</strong></div>
					<div>Diperiksa oleh,<br>Kaur Keuangan<br><br><br><strong>( ................................ )</strong></div>
				</div>
			</div>
		</div>
	</section>
</div>
<style>
	.document-page { color: #111; max-width: 1000px; margin: 0 auto; padding: 35px; }
	.document-header { text-align: center; }
	.document-header h2 { font-size: 20px; font-weight: bold; margin-bottom: 5px; }
	.document-meta th { padding-left: 0 !important; }
	.signature-grid { display: flex; justify-content: space-between; gap: 20px; text-align: center; margin-top: 45px; }
	.signature-grid > div { flex: 1; }
	@media print {
		.main-header, .main-sidebar, .control-sidebar, .content-header, .no-print, .main-footer { display: none !important; }
		.content-wrapper { margin-left: 0 !important; min-height: 0 !important; }
		.content { padding: 0 !important; }
		.box { border: 0 !important; }
		.document-page { max-width: none; padding: 0; }
	}
</style>
