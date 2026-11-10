<?php

defined('BASEPATH') || exit('No direct script access allowed');

$json_flags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;
$position_titles = [
	'4.PENDAPATAN' => 'Pendapatan',
	'5.BELANJA' => 'Belanja',
	'6.PEMBIAYAAN' => 'Pembiayaan',
];
$page_title = $position_titles[$initial_pos] ?? 'Rincian Anggaran APBDes';
$is_income = $initial_pos === '4.PENDAPATAN';
$is_expense = $initial_pos === '5.BELANJA';
$is_finance = $initial_pos === '6.PEMBIAYAAN';
$income_input = $is_income && $initial_mode === 'input';
$income_view = $is_income && $initial_mode === 'lihat';
$income_change = $is_income && $initial_mode === 'perubahan';
$expense_input = $is_expense && $initial_mode === 'input';
$expense_view = $is_expense && $initial_mode === 'lihat';
$expense_change = $is_expense && $initial_mode === 'perubahan';
$finance_input = $is_finance && $initial_mode === 'input';
$finance_view = $is_finance && $initial_mode === 'lihat';
$finance_change = $is_finance && $initial_mode === 'perubahan';

?>

<div class="content-wrapper">
	<section class="content-header">
		<h1>Anggaran <?= html_escape($page_title) ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li>Anggaran</li>
			<li><a href="<?= site_url('keuangan_manual/anggaran_rab/' . strtolower($page_title)) ?>"><?= html_escape($page_title) ?></a></li>
			<li class="active"><?= $initial_mode === 'input' ? 'Input Data' : ($initial_mode === 'lihat' ? 'Lihat Data' : ($initial_mode === 'perubahan' ? 'Perubahan' : 'Rincian e-RAB')) ?></li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info" id="rab-page"
			data-initial-pos="<?= html_escape($initial_pos) ?>"
			data-initial-mode="<?= html_escape($initial_mode) ?>"
			data-api="<?= html_escape(json_encode($api, $json_flags)) ?>"
			data-references="<?= html_escape(json_encode($references, $json_flags)) ?>"
			data-csrf-name="<?= html_escape($csrf_name) ?>"
			data-csrf-value="<?= html_escape($csrf_value) ?>"
			data-can-edit="<?= $can_edit && $initial_mode !== 'lihat' ? '1' : '0' ?>"
			data-can-delete="<?= $can_delete && $initial_mode !== 'lihat' ? '1' : '0' ?>">
			<div class="box-header with-border" <?= ($income_input || $expense_input || $finance_input) ? 'style="display:none;"' : '' ?>>
				<a href="<?= site_url('keuangan_manual/manual_apbdes') ?>" class="btn btn-default btn-sm">
					<i class="fa fa-arrow-left"></i> Rekap Manual
				</a>
			</div>

			<div class="box-body">
				<?php if ($income_view || $income_change): ?>
					<?php if ($income_change): ?>
						<div class="alert alert-info">
							Perubahan dibuat dari rincian e-RAB Murni. Data APBDes lama di bawah hanya menyimpan kode, anggaran, dan realisasi; data tersebut tidak memiliki volume, satuan, harga satuan, atau sumber dana untuk diimpor sebagai rincian.
						</div>
					<?php else: ?>
						<h4>Data Anggaran Pendapatan</h4>
						<div class="alert alert-info">
							Data lama yang tersedia merupakan rekap anggaran dan realisasi. Rincian volume, satuan, harga satuan, dan sumber dana tidak tersimpan pada data tersebut.
						</div>
					<?php endif; ?>
					<div class="panel panel-default">
						<div class="panel-heading"><?= $income_change ? 'Rekap Historis Pendapatan APBDes' : 'Rekap Pendapatan APBDes Tersimpan' ?></div>
						<div class="panel-body">
							<form method="get" class="form-inline" action="<?= site_url('keuangan_manual/rincian_rab/pendapatan') ?>">
								<input type="hidden" name="mode" value="<?= $income_change ? 'perubahan' : 'lihat' ?>">
								<div class="form-group">
									<label for="income-year">Tahun</label>
									<select class="form-control" id="income-year" name="tahun">
										<?php foreach ($income_years as $year): ?>
											<option value="<?= html_escape((string) $year) ?>" <?= (string) $year === $selected_income_year ? 'selected' : '' ?>><?= html_escape((string) $year) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary">Tampilkan</button>
							</form>
							<div class="table-responsive" style="margin-top: 15px;">
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<tr>
											<th>Kode</th>
											<th>Uraian</th>
											<th class="text-right"><?= $income_change ? 'Anggaran Historis' : 'Jumlah Anggaran' ?></th>
											<th class="text-right">Realisasi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($historical_income as $row): ?>
											<?php
											$accountText = trim((string) $row['Kd_Rincian']);
											$accountParts = preg_split('/\s+/', $accountText, 2);
											$accountCode = rtrim((string) ($accountParts[0] ?? ''), '.');
											$accountName = trim((string) ($accountParts[1] ?? ''));
											if ($accountName === '') {
												foreach ($references['rekening'] as $accountReference) {
													if (rtrim((string) $accountReference['kode'], '.') === $accountCode) {
														$accountName = (string) $accountReference['nama'];
														break;
													}
												}
											}
											?>
											<tr>
												<td><?= html_escape($accountCode) ?></td>
												<td><?= html_escape($accountName !== '' ? $accountName : $accountText) ?></td>
												<td class="text-right"><?= number_format((float) $row['Nilai_Anggaran'], 2, ',', '.') ?></td>
												<td class="text-right"><?= number_format((float) $row['Nilai_Realisasi'], 2, ',', '.') ?></td>
											</tr>
										<?php endforeach; ?>
										<?php if ($historical_income === []): ?>
											<tr><td colspan="4" class="text-center">Data rekap pendapatan untuk tahun ini belum tersedia.</td></tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php if ($expense_view || $expense_change): ?>
					<h4><?= $expense_change ? 'Data Perubahan Anggaran Belanja' : 'Lihat Data Anggaran Belanja' ?></h4>
					<?php if ($expense_view): ?>
						<div class="clearfix" style="margin-bottom: 20px;">
							<?php if ($can_edit): ?>
								<button type="button" class="btn btn-primary pull-right" id="btn-impor-tahun-lalu">
									Impor Anggaran Tahun Lalu
								</button>
							<?php endif; ?>
							<button type="button" class="btn btn-primary pull-right" style="margin-right: 8px;" disabled title="Data RKP belum tersedia pada referensi atau tabel aplikasi yang diperiksa.">
								Impor RKP
							</button>
						</div>
						<p class="text-muted text-right">Impor RKP belum aktif karena data sumber RKP belum tersedia pada modul ini.</p>
						<div class="alert alert-info" id="expense-import-message" style="display:none;"></div>
					<?php else: ?>
						<div class="clearfix" style="margin-bottom: 20px;">
							<?php if ($can_edit): ?>
								<button type="button" class="btn btn-primary pull-right" id="btn-impor-anggaran-semula">
									Impor Anggaran Semula
								</button>
							<?php endif; ?>
						</div>
						<?php if ($can_edit): ?>
							<div class="form-inline" id="expense-change-source" style="display:none; margin-bottom:15px;">
								<label for="expense-change-source-rab">Pilih Anggaran Belanja Murni</label>
								<select id="expense-change-source-rab" class="form-control"><option value="">Pilih anggaran</option></select>
								<button type="button" class="btn btn-primary" id="btn-konfirmasi-impor-semula">Impor</button>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($finance_view || $finance_change): ?>
					<h4><?= $finance_change ? 'Data Perubahan Anggaran Pembiayaan' : 'Data Anggaran Pembiayaan' ?></h4>
					<div class="alert alert-info">
						Rekap APBDes lama hanya menyimpan kode rekening, nilai anggaran, dan realisasi. Volume, satuan, harga satuan, serta sumber dana hanya tersedia untuk rincian yang dibuat di e-RAB.
					</div>
					<?php if ($can_edit): ?>
						<div class="clearfix" style="margin-bottom: 15px;">
							<button type="button" class="btn btn-primary pull-right" id="btn-impor-anggaran-semula">
								<?= $finance_change ? 'Impor Anggaran Semula' : 'Impor Anggaran Tahun Lalu' ?>
							</button>
						</div>
						<?php if ($finance_view): ?>
							<div class="form-inline" id="finance-source-wrap" style="display:none; margin-bottom:15px;">
								<label for="finance-source-rab">Anggaran Murni Pembiayaan Tahun Lalu</label>
								<select id="finance-source-rab" class="form-control"><option value="">Pilih anggaran</option></select>
								<button type="button" class="btn btn-primary" id="btn-finance-copy">Impor</button>
							</div>
						<?php else: ?>
							<div class="form-inline" id="finance-source-wrap" style="display:none; margin-bottom:15px;">
								<label for="finance-source-rab">Anggaran Murni Pembiayaan Tahun Berjalan</label>
								<select id="finance-source-rab" class="form-control"><option value="">Pilih anggaran</option></select>
								<button type="button" class="btn btn-primary" id="btn-finance-copy">Impor</button>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					<form method="get" class="form-inline" action="<?= site_url('keuangan_manual/rincian_rab/pembiayaan') ?>">
						<input type="hidden" name="mode" value="<?= $finance_change ? 'perubahan' : 'lihat' ?>">
						<div class="form-group">
							<label for="finance-year">Tahun APBDes</label>
							<select class="form-control" id="finance-year" name="tahun">
								<?php foreach ($finance_years as $year): ?>
									<option value="<?= html_escape((string) $year) ?>" <?= (string) $year === $selected_finance_year ? 'selected' : '' ?>><?= html_escape((string) $year) ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Tampilkan</button>
					</form>
					<div class="table-responsive" style="margin-top:15px;">
						<table class="table table-bordered table-striped table-hover">
							<thead>
								<tr><th>Kode</th><th>Uraian</th><th class="text-right">Anggaran Historis</th><th class="text-right">Realisasi</th></tr>
							</thead>
							<tbody>
								<?php foreach ($historical_finance as $row): ?>
									<?php
									$accountText = trim((string) $row['Kd_Rincian']);
									$accountParts = preg_split('/\s+/', $accountText, 2);
									$accountCode = rtrim((string) ($accountParts[0] ?? ''), '.');
									$accountName = trim((string) ($accountParts[1] ?? ''));
									if ($accountName === '') {
										foreach ($references['rekening'] as $accountReference) {
											if (rtrim((string) $accountReference['kode'], '.') === $accountCode) {
												$accountName = (string) $accountReference['nama'];
												break;
											}
										}
									}
									?>
									<tr>
										<td><?= html_escape($accountCode) ?></td>
										<td><?= html_escape($accountName !== '' ? $accountName : $accountText) ?></td>
										<td class="text-right"><?= number_format((float) $row['Nilai_Anggaran'], 2, ',', '.') ?></td>
										<td class="text-right"><?= number_format((float) $row['Nilai_Realisasi'], 2, ',', '.') ?></td>
									</tr>
								<?php endforeach; ?>
								<?php if ($historical_finance === []): ?>
									<tr><td colspan="4" class="text-center">Rekap historis pembiayaan untuk tahun ini belum tersedia.</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
					<?php if ($finance_view): ?>
						<div class="alert alert-info">Rincian item e-RAB Pembiayaan yang tersimpan:</div>
					<?php endif; ?>
					<?php if ($finance_view || $finance_change): ?>
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>Tahun</th><th>Tahap</th><th>Rekening</th>
										<th class="text-right">Semula</th><th class="text-right">Menjadi</th>
										<th class="text-right">Selisih</th><th>Aksi</th>
									</tr>
								</thead>
								<tbody id="rab-daftar"><tr><td colspan="7" class="text-center">Memuat data...</td></tr></tbody>
							</table>
						</div>
					<?php endif; ?>
					<?php if ($finance_view): ?>
						<div class="modal fade" id="finance-rab-detail" tabindex="-1" role="dialog" aria-labelledby="finance-rab-detail-title">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="finance-rab-detail-title">Rincian Anggaran Pembiayaan</h4>
									</div>
									<div class="modal-body table-responsive">
										<table class="table table-bordered table-striped">
											<thead><tr><th>Keterangan</th><th>Volume</th><th>Satuan</th><th>Harga</th><th>Sumber Dana</th><th>Jumlah</th></tr></thead>
											<tbody id="finance-rab-detail-items"></tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($expense_input && ! $can_edit): ?>
					<div class="alert alert-warning">Akun Anda tidak memiliki izin untuk menginput anggaran belanja.</div>
				<?php endif; ?>
				<?php if ($finance_input && ! $can_edit): ?>
					<div class="alert alert-warning">Akun Anda tidak memiliki izin untuk menginput anggaran pembiayaan.</div>
				<?php endif; ?>

				<?php if ($income_change && $can_edit): ?>
					<div class="form-inline" style="margin-bottom: 15px;">
						<label for="income-source-rab">Impor Anggaran Semula</label>
						<select id="income-source-rab" class="form-control">
							<option value="">Pilih anggaran Murni</option>
						</select>
						<button type="button" class="btn btn-primary" id="btn-impor-anggaran-semula">
							<i class="fa fa-download"></i> Impor
						</button>
					</div>
				<?php endif; ?>

				<?php if ($expense_view || $expense_change): ?>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-4">
								<label for="filter-bidang">Bidang</label>
								<select class="form-control" id="filter-bidang"><option value="">Pilih</option></select>
							</div>
							<div class="col-md-4">
								<label for="filter-sub-bidang">Sub Bidang</label>
								<select class="form-control" id="filter-sub-bidang" disabled><option value="">Pilih</option></select>
							</div>
							<div class="col-md-4">
								<label for="filter-kegiatan">Kegiatan</label>
								<select class="form-control" id="filter-kegiatan" disabled><option value="">Pilih</option></select>
							</div>
						</div>
						<div class="text-center" style="margin-top: 15px;">
							<button type="button" class="btn btn-primary" id="btn-tampilkan-rab"><i class="fa fa-paper-plane"></i> Submit</button>
						</div>
					</div>
					<div class="form-inline" id="expense-import-source" style="display:none; margin-bottom:15px;">
						<label for="expense-source-rab">Pilih e-RAB Belanja Murni tahun lalu</label>
						<select id="expense-source-rab" class="form-control"><option value="">Pilih anggaran</option></select>
						<button type="button" class="btn btn-primary" id="btn-konfirmasi-impor-tahun-lalu">Impor</button>
					</div>
				<?php endif; ?>

				<?php if (! $expense_view && ! $expense_change && ! $finance_view && ! $finance_change): ?>
				<div class="well well-sm" id="rab-filter" <?= ($initial_mode === 'input' || $income_view) ? 'style="display:none;"' : '' ?>>
					<div class="row">
						<div class="col-md-2 col-sm-4">
							<div class="form-group">
								<label for="filter-tahun">Tahun</label>
								<input type="number" min="2000" max="2199" class="form-control input-sm" id="filter-tahun" placeholder="Semua">
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="form-group">
								<label for="filter-tahap">Tahap</label>
								<select class="form-control input-sm" id="filter-tahap">
									<option value="">Semua</option>
									<option value="Murni">Murni</option>
									<option value="Perubahan">Perubahan (P-APBDes)</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="form-group">
								<label for="filter-pos">Pos</label>
								<select class="form-control input-sm" id="filter-pos">
									<option value="">Semua</option>
									<option value="4.PENDAPATAN" <?= $initial_pos === '4.PENDAPATAN' ? 'selected' : '' ?>>Pendapatan</option>
									<option value="5.BELANJA" <?= $initial_pos === '5.BELANJA' ? 'selected' : '' ?>>Belanja</option>
									<option value="6.PEMBIAYAAN" <?= $initial_pos === '6.PEMBIAYAAN' ? 'selected' : '' ?>>Pembiayaan</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="form-group">
								<label for="filter-bidang">Bidang</label>
								<select class="form-control input-sm" id="filter-bidang">
									<option value="">Semua</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="form-group">
								<label for="filter-sub-bidang">Sub Bidang</label>
								<select class="form-control input-sm" id="filter-sub-bidang">
									<option value="">Semua</option>
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-4">
							<div class="form-group">
								<label for="filter-kegiatan">Kegiatan</label>
								<select class="form-control input-sm" id="filter-kegiatan">
									<option value="">Semua</option>
								</select>
							</div>
						</div>
					</div>
					<button type="button" class="btn btn-primary btn-sm" id="btn-tampilkan-rab">
						<i class="fa fa-search"></i> Tampilkan
					</button>
				</div>
				<?php endif; ?>

				<?php if ($can_edit && ! $income_view && ! $expense_view && ! $finance_view): ?>
					<div id="rab-form-section" <?= ($initial_mode === 'lihat' || $expense_change || $finance_change) ? 'style="display:none;"' : '' ?>>
					<?php if ($income_input): ?>
						<h3>Form Input</h3>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="rab-tahun">Tahun Anggaran</label>
									<input type="number" min="2000" max="2199" class="form-control" id="rab-tahun" value="<?= html_escape((string) date('Y')) ?>" required>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="income-kategori">Pendapatan</label>
									<select class="form-control" id="income-kategori">
										<option value="">Pilih</option>
										<option value="4.1">Pendapatan Asli Desa</option>
										<option value="4.2">Pendapatan Transfer</option>
										<option value="4.3">Pendapatan Lain-lain</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="income-subkategori">Sub Pendapatan</label>
									<select class="form-control" id="income-subkategori" disabled>
										<option value="">Pilih</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<label for="income-detail">Sub-sub Pendapatan</label>
									<select class="form-control" id="income-detail" disabled>
										<option value="">Pilih</option>
									</select>
								</div>
							</div>
						</div>
						<input type="hidden" id="rab-tahap" value="Murni">
						<input type="hidden" id="rab-pos" value="4.PENDAPATAN">
						<select id="rab-rekening" style="display:none;" aria-hidden="true"></select>
						<div class="alert alert-warning" id="income-no-reference" style="display:none;">
							Belum ada rekening untuk kategori yang dipilih. Lengkapi Referensi Rekening APBDesa terlebih dahulu.
						</div>
					<?php elseif ($finance_input): ?>
						<h3>Form Input</h3>
						<div class="row">
							<div class="col-md-3 form-group">
								<label for="rab-tahun">Tahun Anggaran</label>
								<input type="number" min="2000" max="2199" class="form-control" id="rab-tahun" value="<?= html_escape((string) date('Y')) ?>" required>
							</div>
							<div class="col-md-3 form-group">
								<label for="rab-tahap">Jenis Anggaran</label>
								<select class="form-control" id="rab-tahap" required>
									<option value="Murni">Anggaran Awal</option>
									<option value="Perubahan">Anggaran Perubahan</option>
								</select>
							</div>
							<div class="col-md-2 form-group">
								<label for="finance-category">Pembiayaan</label>
								<select class="form-control" id="finance-category" required><option value="">Pilih</option></select>
							</div>
							<div class="col-md-2 form-group">
								<label for="finance-subcategory">Sub Pembiayaan</label>
								<select class="form-control" id="finance-subcategory" disabled required><option value="">Pilih</option></select>
							</div>
							<div class="col-md-2 form-group">
								<label for="finance-detail">Sub-sub Pembiayaan</label>
								<select class="form-control" id="finance-detail" disabled required><option value="">Pilih</option></select>
							</div>
						</div>
						<input type="hidden" id="rab-pos" value="6.PEMBIAYAAN">
						<select id="rab-rekening" style="display:none;" aria-hidden="true"></select>
					<?php elseif ($expense_input): ?>
						<h3>Form Input</h3>
						<div class="panel panel-default">
							<div class="panel-heading text-center">ANGGARAN</div>
							<div class="panel-body">
								<div class="form-group">
									<label>Tahun Anggaran</label>
									<input type="number" min="2000" max="2199" class="form-control" id="rab-tahun" value="<?= html_escape((string) date('Y')) ?>" required>
								</div>
								<div class="form-group">
									<label>Pilih Anggaran</label><br>
									<label class="radio-inline"><input type="radio" name="expense-stage" value="Murni" checked> Anggaran Awal</label>
									<label class="radio-inline"><input type="radio" name="expense-stage" value="Perubahan"> Anggaran Perubahan</label>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading text-center">KEGIATAN</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6 form-group">
										<label for="rab-bidang">Bidang</label>
										<select class="form-control" id="rab-bidang" required><option value="">Pilih</option></select>
									</div>
									<div class="col-md-6 form-group">
										<label for="rab-sub-bidang">Sub Bidang</label>
										<select class="form-control" id="rab-sub-bidang" disabled required><option value="">Pilih</option></select>
									</div>
									<div class="col-md-6 form-group">
										<label for="rab-kegiatan">Kegiatan</label>
										<select class="form-control" id="rab-kegiatan" disabled required><option value="">Pilih</option></select>
									</div>
									<div class="col-md-6 form-group">
										<label for="rab-output">Output/Keluaran</label>
										<select class="form-control" id="rab-output" disabled>
											<option value="">Pilih</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 form-group">
										<label>Waktu Pelaksanaan</label>
										<input type="text" class="form-control" id="expense-waktu" readonly placeholder="Pilih bulan pelaksanaan">
									</div>
									<div class="col-md-4 form-group">
										<label for="rab-bulan-mulai">Dari bulan</label>
										<select class="form-control" id="rab-bulan-mulai" required><option value="">Pilih</option>
											<?php foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month): ?>
												<option value="<?= $index + 1 ?>"><?= html_escape($month) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-4 form-group">
										<label for="rab-bulan-selesai">Sampai bulan</label>
										<select class="form-control" id="rab-bulan-selesai" required><option value="">Pilih</option>
											<?php foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month): ?>
												<option value="<?= $index + 1 ?>"><?= html_escape($month) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 form-group"><label>Laki-laki</label><input type="number" min="0" class="form-control" id="rab-penerima-laki" value="0"></div>
									<div class="col-md-4 form-group"><label>Perempuan</label><input type="number" min="0" class="form-control" id="rab-penerima-perempuan" value="0"></div>
									<div class="col-md-4 form-group"><label>A-RTM</label><input type="number" min="0" class="form-control" id="rab-penerima-rtm" value="0"></div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group"><label>Data Eksisting Tahun Berjalan</label><input type="text" class="form-control" id="rab-data-eksisting" maxlength="4000" placeholder="Data Eksisting"></div>
									<div class="col-md-6 form-group"><label>Target Tahun Depan</label><input type="text" class="form-control" id="rab-target-tahun-depan" maxlength="4000" placeholder="Target"></div>
								</div>
								<div class="row">
									<div class="col-md-4 form-group"><label for="rab-lokasi">Lokasi</label><input type="text" class="form-control" id="rab-lokasi" maxlength="4000" placeholder="Lokasi"></div>
									<div class="col-md-4 form-group"><label>Rencana Volume</label><input type="number" min="0" step="0.0001" class="form-control" id="rab-volume-rencana" placeholder="Volume"></div>
									<div class="col-md-4 form-group"><label>Satuan</label><input type="text" class="form-control" id="rab-satuan-rencana" maxlength="50" placeholder="Satuan"></div>
								</div>
								<div class="row">
									<div class="col-md-4 form-group"><label for="rab-target-sdgs">Mendukung SDGs ke</label><input type="text" class="form-control" id="rab-target-sdgs" maxlength="100" placeholder="SDGs"></div>
									<div class="col-md-4 form-group"><label for="rab-pka">Pelaksana Kegiatan Anggaran</label><input type="text" class="form-control" id="rab-pka" maxlength="191" placeholder="Nama PKA"></div>
									<div class="col-md-4 form-group"><label for="rab-tpk">Tim Pelaksana Kegiatan</label><input type="text" class="form-control" id="rab-tpk" maxlength="191" placeholder="TPK"></div>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading text-center">PAKET KEGIATAN</div>
							<div class="panel-body row">
								<div class="col-md-8 form-group"><label>Nama Paket Kegiatan</label><input type="text" class="form-control" id="rab-nama-paket" maxlength="191" placeholder="Nama Paket"></div>
								<div class="col-md-4 form-group"><label>Kode Paket Kegiatan</label><input type="text" class="form-control" id="rab-kode-paket" maxlength="50" placeholder="Kode Paket"></div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading text-center">URAIAN / RINCIAN PAKET</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4 form-group"><label>Jenis Belanja</label><select class="form-control" id="rab-klasifikasi-belanja" required><option value="">Pilih</option></select></div>
									<div class="col-md-4 form-group"><label>Obyek belanja</label><select class="form-control" id="expense-obyek" disabled><option value="">Pilih</option></select></div>
									<div class="col-md-4 form-group"><label>Rincian Obyek belanja</label><select class="form-control" id="rab-rekening" disabled required><option value="">Pilih</option></select></div>
								</div>
							</div>
						</div>
						<input type="hidden" id="rab-tahap" value="Murni">
						<input type="hidden" id="rab-pos" value="5.BELANJA">
					<?php else: ?>
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="rab-tahun">Tahun Anggaran</label>
								<input type="number" min="2000" max="2199" class="form-control" id="rab-tahun" value="<?= html_escape((string) date('Y')) ?>" required>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="rab-tahap">Jenis Anggaran</label>
								<select class="form-control" id="rab-tahap" required>
									<?php if (! $income_change && ! $finance_change): ?>
										<option value="Murni">Murni</option>
									<?php endif; ?>
									<option value="Perubahan">Perubahan (P-APBDes)</option>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="rab-pos">Pos Anggaran</label>
								<select class="form-control" id="rab-pos" required>
									<?php if ($income_change || $finance_change): ?>
										<option value="<?= $income_change ? '4.PENDAPATAN' : '6.PEMBIAYAAN' ?>"><?= $income_change ? 'Pendapatan' : 'Pembiayaan' ?></option>
									<?php else: ?>
										<option value="4.PENDAPATAN">Pendapatan</option>
										<option value="5.BELANJA">Belanja</option>
										<option value="6.PEMBIAYAAN">Pembiayaan</option>
									<?php endif; ?>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="form-group">
								<label for="rab-rekening">Rekening</label>
								<select class="form-control" id="rab-rekening" required>
									<option value="">Pilih rekening</option>
								</select>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<div class="alert alert-info" id="rab-edit-notice" style="display: none;">
						Tahun, tahap, dan pos anggaran tidak dapat diubah saat mengedit. Klik Reset untuk membuat anggaran baru dengan jenis berbeda.
					</div>

					<?php if (! $expense_input && ! $finance_input): ?>
					<div class="row" id="rab-klasifikasi" style="display: none;">
						<div class="col-md-4">
							<div class="form-group">
								<label for="rab-bidang">Bidang</label>
								<select class="form-control" id="rab-bidang">
									<option value="">Pilih bidang</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rab-sub-bidang">Sub Bidang</label>
								<select class="form-control" id="rab-sub-bidang" disabled>
									<option value="">Pilih sub bidang</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rab-kegiatan">Kegiatan</label>
								<select class="form-control" id="rab-kegiatan" disabled>
									<option value="">Pilih kegiatan</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="rab-klasifikasi-belanja">Jenis Belanja</label>
								<select class="form-control" id="rab-klasifikasi-belanja">
									<option value="">Pilih jenis belanja</option>
									<option value="5.1">Belanja Pegawai (5.1)</option>
									<option value="5.2">Belanja Barang &amp; Jasa (5.2)</option>
									<option value="5.3">Belanja Modal (5.3)</option>
									<option value="5.4">Belanja Tak Terduga (5.4)</option>
								</select>
							</div>
						</div>
					</div>

					<div id="rab-detail-belanja" style="display: none;">
						<h4>Informasi Kegiatan Belanja</h4>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-output">Output / Keluaran</label>
									<input type="text" class="form-control" id="rab-output" list="rab-output-options" maxlength="191">
									<datalist id="rab-output-options"></datalist>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="rab-bulan-mulai">Bulan Mulai</label>
									<select class="form-control" id="rab-bulan-mulai">
										<option value="">Pilih bulan</option>
										<?php foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month): ?>
											<option value="<?= $index + 1 ?>"><?= html_escape($month) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="rab-bulan-selesai">Bulan Selesai</label>
									<select class="form-control" id="rab-bulan-selesai">
										<option value="">Pilih bulan</option>
										<?php foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $index => $month): ?>
											<option value="<?= $index + 1 ?>"><?= html_escape($month) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="rab-penerima-laki">Laki-laki</label>
									<input type="number" min="0" step="1" class="form-control" id="rab-penerima-laki" value="0">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="rab-penerima-perempuan">Perempuan</label>
									<input type="number" min="0" step="1" class="form-control" id="rab-penerima-perempuan" value="0">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="rab-penerima-rtm">RTM</label>
									<input type="number" min="0" step="1" class="form-control" id="rab-penerima-rtm" value="0">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-lokasi">Lokasi</label>
									<input type="text" class="form-control" id="rab-lokasi" maxlength="4000">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-target-sdgs">Target SDGs</label>
									<input type="text" class="form-control" id="rab-target-sdgs" maxlength="100">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-pka">Nama PKA</label>
									<input type="text" class="form-control" id="rab-pka" maxlength="191">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-tpk">Nama TPK</label>
									<input type="text" class="form-control" id="rab-tpk" maxlength="191">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="rab-data-eksisting">Data Eksisting Tahun Berjalan</label>
									<input type="text" class="form-control" id="rab-data-eksisting" maxlength="4000">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="rab-target-tahun-depan">Target Tahun Depan</label>
									<input type="text" class="form-control" id="rab-target-tahun-depan" maxlength="4000">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-volume-rencana">Rencana Volume</label>
									<input type="number" min="0" step="0.0001" class="form-control" id="rab-volume-rencana">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-satuan-rencana">Satuan Rencana</label>
									<input type="text" class="form-control" id="rab-satuan-rencana" maxlength="50">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-nama-paket">Nama Paket Kegiatan</label>
									<input type="text" class="form-control" id="rab-nama-paket" maxlength="191">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="rab-kode-paket">Kode Paket Kegiatan</label>
									<input type="text" class="form-control" id="rab-kode-paket" maxlength="50">
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>

					<input type="hidden" id="rab-id">
					<hr>
					<div class="clearfix">
						<h3 class="pull-left" style="margin-top: 0;">Rincian Item Anggaran</h3>
						<button type="button" class="btn btn-success btn-sm pull-right" id="btn-tambah-baris-rab" <?= ($income_input || $expense_input || $finance_input) ? 'style="display:none;"' : '' ?>>
							<i class="fa fa-plus"></i> Tambah Baris
						</button>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="min-width: 240px;">Keterangan</th>
									<th style="min-width: 90px;">Volume</th>
									<th style="min-width: 95px;">Satuan</th>
									<th style="min-width: 135px;">Harga Satuan</th>
									<th style="min-width: 130px;">Sumber Dana</th>
									<th style="min-width: 140px;">Total Jumlah</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody id="rab-items"></tbody>
							<tfoot>
								<tr>
									<th colspan="5" class="text-right">Total</th>
									<th id="rab-total" class="text-right">Rp0</th>
									<th></th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="text-right">
						<button type="button" class="btn btn-default" id="btn-reset-rab">Reset</button>
						<button type="button" class="btn btn-primary" id="btn-simpan-rab">
							<i class="fa fa-save"></i> Simpan Anggaran
						</button>
					</div>
					<hr>
					</div>
				<?php endif; ?>

				<?php if (! $finance_view && ! $finance_change): ?>
				<div id="rab-list-section" <?= ($initial_mode === 'input' || $expense_view || $expense_change) ? 'style="display:none;"' : '' ?>>
				<div id="rab-perbandingan-wrap" style="display: none;">
					<h4>Perbandingan Rincian Anggaran</h4>
					<div class="table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Keterangan</th>
									<th class="text-right">Semula</th>
									<th class="text-right">Menjadi</th>
									<th class="text-right">Selisih</th>
								</tr>
							</thead>
							<tbody id="rab-perbandingan"></tbody>
							<tfoot>
								<tr>
									<th>Total</th>
									<th id="rab-perbandingan-semula" class="text-right">Rp0</th>
									<th id="rab-perbandingan-menjadi" class="text-right">Rp0</th>
									<th id="rab-perbandingan-selisih" class="text-right">Rp0</th>
								</tr>
							</tfoot>
						</table>
					</div>
					</div>

				<h4><?= $income_view ? 'Rincian e-RAB Tersimpan' : ($expense_view ? 'Data Anggaran Belanja' : 'Daftar Rincian dan Perbandingan Anggaran') ?></h4>
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Tahun</th>
								<th>Tahap</th>
								<th>Pos</th>
								<th>Bidang/Kegiatan</th>
								<th>Rekening</th>
								<th class="text-right">Semula</th>
								<th class="text-right">Menjadi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody id="rab-daftar">
							<tr><td colspan="8" class="text-center">Memuat data...</td></tr>
						</tbody>
					</table>
				</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<script src="<?= asset('js/keuangan_manual_rab.js') ?>"></script>
