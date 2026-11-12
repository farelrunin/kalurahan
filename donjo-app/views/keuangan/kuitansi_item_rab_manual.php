<?php

defined('BASEPATH') || exit('No direct script access allowed');

$item = $record['item'];
$receipt = $item['kuitansi'] ?? [];
$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');
$backUrl = site_url('keuangan_manual/rincian_rab/belanja?' . http_build_query([
	'mode' => 'lihat',
	'tahun_anggaran' => $record['tahun'],
	'tahap' => $record['tahap'],
]));

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><?= empty($receipt) ? 'Buat Kuitansi' : 'Ubah Kuitansi' ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= $backUrl ?>">Anggaran Belanja</a></li>
			<li class="active">Kuitansi</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Kuitansi per Rincian Belanja</h3>
			</div>
			<div class="box-body">
				<div class="well well-sm">
					<strong><?= html_escape((string) $item['keterangan']) ?></strong>
					<br>
					Tahun <?= html_escape((string) $record['tahun']) ?>
					&middot; <?= html_escape((string) $record['tahap']) ?>
					&middot; Nilai bruto: Rp <?= $money($item['jumlah_bruto']) ?>
					&middot; Potongan pajak: Rp <?= $money($item['jumlah_pajak']) ?>
					&middot; Netto: Rp <?= $money($item['jumlah_netto']) ?>
				</div>
				<p class="help-block">Kuitansi ini disimpan langsung pada rincian belanja dan tidak membuat atau mengubah SPP. Tanggal kuitansi mengikuti tanggal pencatatan pertama.</p>

				<?php if ($can_edit): ?>
					<form method="post" action="<?= site_url('keuangan_manual/kuitansi_item_rab/' . (int) $item['id']) ?>">
						<input type="hidden" name="<?= html_escape($csrf_name) ?>" value="<?= html_escape($csrf_value) ?>">
						<div class="form-group">
							<label for="nomor-kuitansi">Nomor</label>
							<input type="text" class="form-control" id="nomor-kuitansi" name="nomor_kuitansi" maxlength="100" required value="<?= html_escape((string) ($receipt['nomor_kuitansi'] ?? '')) ?>">
						</div>
						<div class="form-group">
							<label for="penerima-kuitansi">Penerima</label>
							<input type="text" class="form-control" id="penerima-kuitansi" name="penerima" maxlength="191" required value="<?= html_escape((string) ($receipt['penerima'] ?? '')) ?>">
						</div>
						<div class="form-group">
							<label for="pembayaran-kuitansi">Sebagai pembayaran</label>
							<textarea class="form-control" id="pembayaran-kuitansi" name="sebagai_pembayaran" rows="3" maxlength="500" required><?= html_escape((string) ($receipt['sebagai_pembayaran'] ?? '')) ?></textarea>
						</div>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Kuitansi</button>
						<a class="btn btn-default" href="<?= $backUrl ?>">Kembali ke Anggaran</a>
						<?php if (! empty($receipt)): ?>
							<a class="btn btn-info" target="_blank" rel="noopener" href="<?= site_url('keuangan_manual/cetak_kuitansi_item_rab/' . (int) $item['id']) ?>"><i class="fa fa-print"></i> Cetak Kuitansi</a>
						<?php endif; ?>
					</form>
				<?php else: ?>
					<div class="alert alert-warning">Anda tidak memiliki izin untuk mengubah kuitansi.</div>
					<a class="btn btn-default" href="<?= $backUrl ?>">Kembali ke Anggaran</a>
					<?php if (! empty($receipt)): ?>
						<a class="btn btn-info" target="_blank" rel="noopener" href="<?= site_url('keuangan_manual/cetak_kuitansi_item_rab/' . (int) $item['id']) ?>"><i class="fa fa-print"></i> Cetak Kuitansi</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
