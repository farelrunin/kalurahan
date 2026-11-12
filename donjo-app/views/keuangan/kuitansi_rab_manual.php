<?php

defined('BASEPATH') || exit('No direct script access allowed');

$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Kelola Kuitansi SPP</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">SPP Belanja</a></li>
			<li class="active">Kelola Kuitansi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Kuitansi per Sub-belanja</h3>
			</div>
			<div class="box-body">
				<div class="well well-sm">
					<strong>SPP <?= html_escape((string) $spp['nomor_spp']) ?></strong>
					&middot; <?= html_escape((string) $spp['tanggal_spp']) ?>
					&middot; Penerima SPP: <?= html_escape((string) $spp['penerima']) ?>
					&middot; Total netto: Rp <?= $money($spp['jumlah_netto']) ?>
					<p class="help-block" style="margin-bottom:0;">SPP dan kuitansi dicatat terpisah. Isi data kuitansi untuk setiap sub-belanja yang memiliki kuitansi; selisih dihitung dari jumlah dibayar dikurangi netto item.</p>
				</div>

				<?php if (! empty($spp['legacy_kuitansi'])): ?>
					<div class="alert alert-warning">
						SPP ini masih memiliki kuitansi lama yang belum terkait ke sub-belanja. Kuitansi lama tetap akan ikut tercetak; periksa agar tidak terjadi pencatatan ganda.
					</div>
				<?php endif; ?>

				<?php if ($can_edit): ?>
					<form method="post" action="<?= site_url('keuangan_manual/kuitansi_rab/' . (int) $spp['id']) ?>">
						<input type="hidden" name="<?= html_escape($csrf_name) ?>" value="<?= html_escape($csrf_value) ?>">
						<div class="table-responsive">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sub-belanja</th>
										<th class="text-right">Bruto</th>
										<th class="text-right">Pajak</th>
										<th class="text-right">Netto</th>
										<th style="min-width: 180px;">Nomor</th>
										<th style="min-width: 180px;">Penerima</th>
										<th style="min-width: 220px;">Sebagai pembayaran</th>
										<th style="min-width: 150px;">Tanggal</th>
										<th style="min-width: 150px;">Jumlah dibayar</th>
										<th style="min-width: 180px;">Selisih dari netto</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($spp['rincian'] as $item): ?>
										<?php
										$itemId = (int) $item['id'];
										$receipt = $item['kuitansi'] ?? [];
										$taxTotal = array_sum(array_map(static fn (array $tax): float => (float) $tax['nilai_pajak'], $item['pajak']));
										$net = round((float) $item['jumlah_bruto'] - $taxTotal, 2);
										?>
										<tr class="kuitansi-item" data-net="<?= html_escape(number_format($net, 2, '.', '')) ?>">
											<td><?= html_escape((string) $item['keterangan']) ?></td>
											<td class="text-right"><?= $money($item['jumlah_bruto']) ?></td>
											<td class="text-right"><?= $money($taxTotal) ?></td>
											<td class="text-right"><?= $money($net) ?></td>
											<td><input type="text" class="form-control" name="kuitansi[<?= $itemId ?>][nomor_kuitansi]" maxlength="100" value="<?= html_escape((string) ($receipt['nomor_kuitansi'] ?? '')) ?>"></td>
											<td><input type="text" class="form-control" name="kuitansi[<?= $itemId ?>][penerima]" maxlength="191" value="<?= html_escape((string) ($receipt['penerima'] ?? '')) ?>"></td>
											<td><textarea class="form-control" name="kuitansi[<?= $itemId ?>][sebagai_pembayaran]" rows="2" maxlength="500"><?= html_escape((string) ($receipt['sebagai_pembayaran'] ?? '')) ?></textarea></td>
											<td><input type="date" class="form-control" name="kuitansi[<?= $itemId ?>][tanggal_bayar]" value="<?= html_escape((string) ($receipt['tanggal_bayar'] ?? '')) ?>"></td>
											<td><input type="number" class="form-control kuitansi-paid-amount" name="kuitansi[<?= $itemId ?>][jumlah_dibayar]" min="0.01" step="0.01" value="<?= html_escape((string) ($receipt['jumlah_dibayar'] ?? '')) ?>"></td>
											<td class="text-right kuitansi-difference">-</td>
										</tr>
									<?php endforeach; ?>
									<?php if ($spp['rincian'] === []): ?>
										<tr><td colspan="10" class="text-center">SPP ini belum memiliki rincian sub-belanja.</td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Kuitansi</button>
						<a class="btn btn-default" href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">Kembali ke SPP</a>
					</form>
				<?php else: ?>
					<div class="alert alert-warning">Anda tidak memiliki izin untuk mengubah kuitansi.</div>
					<a class="btn btn-default" href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $spp['tahun'], 'tahap' => $spp['tahap']])) ?>">Kembali ke SPP</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<script>
	(function ($) {
		'use strict';
		var money = function (value) {
			return value.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2});
		};
		function updateDifferences() {
			$('.kuitansi-item').each(function () {
				var row = $(this);
				var paid = Number(row.find('.kuitansi-paid-amount').val()) || 0;
				if (paid <= 0) {
					row.find('.kuitansi-difference').text('-');
					return;
				}
				var difference = Math.round((paid - Number(row.attr('data-net'))) * 100) / 100;
				var label = difference > 0 ? 'Lebih bayar' : (difference < 0 ? 'Kurang bayar' : 'Sesuai');
				row.find('.kuitansi-difference').text(label + ': Rp ' + money(Math.abs(difference)));
			});
		}
		$('.kuitansi-paid-amount').on('input change', updateDifferences);
		updateDifferences();
	})(jQuery);
</script>
