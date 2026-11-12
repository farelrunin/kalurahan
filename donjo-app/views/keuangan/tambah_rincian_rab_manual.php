<?php

defined('BASEPATH') || exit('No direct script access allowed');

$jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;
$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Anggaran Belanja</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li>Anggaran</li>
			<li><a href="<?= site_url('keuangan_manual/rincian_rab/belanja?mode=lihat&tahun_anggaran=' . urlencode((string) $rab['tahun'])) ?>">Belanja</a></li>
			<li><a href="<?= site_url('keuangan_manual/rincian_rab/belanja?mode=lihat&tahun_anggaran=' . urlencode((string) $rab['tahun'])) ?>">Lihat Data</a></li>
			<li class="active">Tambah Rincian</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info" id="rab-detail-page"
			data-api="<?= html_escape(json_encode($api, $jsonFlags)) ?>"
			data-references="<?= html_escape(json_encode($references, $jsonFlags)) ?>"
			data-csrf-name="<?= html_escape($csrf_name) ?>"
			data-csrf-value="<?= html_escape($csrf_value) ?>">
			<div class="box-header with-border">
				<a class="btn btn-default btn-sm" href="<?= site_url('keuangan_manual/rincian_rab/belanja?mode=lihat&tahun_anggaran=' . urlencode((string) $rab['tahun'])) ?>">
					<i class="fa fa-arrow-left"></i> Kembali ke Anggaran
				</a>
			</div>
			<div class="box-body">
				<div class="well well-sm">
					<h4 style="margin-top:0;">Tambah Rincian : <?= html_escape((string) $rab['rekening_nama']) ?></h4>
					<div>
						<strong><?= html_escape((string) $rab['rekening_kode']) ?></strong>
						&middot; <?= html_escape((string) $rab['kegiatan']) ?>
						&middot; Tahun <?= html_escape((string) $rab['tahun']) ?>
						&middot; <?= html_escape((string) $rab['tahap']) ?>
					</div>
				</div>

				<div class="alert alert-danger" id="rab-detail-error" style="display:none;"></div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="rab-detail-table">
						<thead>
							<tr>
								<th style="min-width:220px;">Keterangan</th>
								<th style="min-width:95px;">Volume</th>
								<th style="min-width:95px;">Satuan</th>
								<th style="min-width:135px;">Harga</th>
								<th style="min-width:150px;">Sumber dana</th>
								<th class="text-right" style="min-width:140px;">Jumlah</th>
								<th style="min-width:190px;">Pajak / Potongan</th>
								<th class="text-right" style="min-width:140px;">Potongan Pajak</th>
								<th class="text-right" style="min-width:140px;">Netto</th>
								<th style="min-width:135px;">Aksi</th>
							</tr>
						</thead>
						<tbody id="rab-detail-items"></tbody>
						<tfoot>
							<tr>
								<th colspan="6" class="text-right">Total</th>
								<th id="rab-detail-total" class="text-right"><?= $money(0) ?></th>
								<th id="rab-detail-tax-total" class="text-right"><?= $money(0) ?></th>
								<th id="rab-detail-net-total" class="text-right"><?= $money(0) ?></th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<p class="text-muted">
					Tambahkan satu atau beberapa rincian, lalu simpan. Pajak otomatis mengikuti ambang parameter dan dapat disesuaikan pada setiap rincian.
				</p>
				<div class="text-right">
					<a class="btn btn-default" href="<?= site_url('keuangan_manual/tambah_rincian_rab_manual/' . (int) $rab['id']) ?>">Reset</a>
					<button type="button" class="btn btn-primary" id="btn-simpan-rab-detail"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="<?= asset('js/keuangan_manual_rab_detail.js') ?>"></script>
