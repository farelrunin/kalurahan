<?php

defined('BASEPATH') || exit('No direct script access allowed');

$jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Parameter Pajak dan Potongan</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/manual_apbdes') ?>">Parameter</a></li>
			<li class="active">Parameter Pajak</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Master Pajak dan Potongan</h3>
				<?php if ($can_edit): ?>
					<button type="button" class="btn btn-primary btn-sm pull-right" id="pajak-add">
						<i class="fa fa-plus"></i> Tambah Pajak
					</button>
				<?php endif; ?>
			</div>
			<div class="box-body">
				<div class="alert alert-info">
					Tarif berlaku untuk rincian Belanja. Jika ambang otomatis diisi, pajak akan dipilih otomatis saat bruto per rincian melebihi ambang tersebut; kolom pajak pada rincian tetap dapat dikoreksi manual.
					Kosongkan ambang untuk pemilihan manual saja. Jenis pajak awal bernilai 0% dan nonaktif; isi tarif yang berlaku lalu aktifkan sebelum digunakan.
					Jenis pajak yang sudah dipakai tidak dapat dinonaktifkan atau dihapus agar snapshot anggaran tetap terjaga.
					Nominal lebih/kurang bayar akan dihubungkan pada tahap Kuitansi/SPP.
				</div>

				<?php if ($can_edit): ?>
					<div class="panel panel-default" id="pajak-form-panel" style="display:none;">
						<div class="panel-heading"><strong id="pajak-form-title">Tambah Pajak</strong></div>
						<div class="panel-body">
							<form method="post" action="<?= site_url('keuangan_manual/parameter_rab?jenis=pajak') ?>" id="pajak-form">
								<input type="hidden" name="jenis_parameter" value="pajak">
								<input type="hidden" name="action" value="simpan">
								<input type="hidden" name="id" id="pajak-id" value="">
								<div class="row">
									<div class="col-md-2 form-group">
										<label for="pajak-kode">Kode</label>
										<input type="text" class="form-control" name="kode" id="pajak-kode" maxlength="50" pattern="[A-Za-z0-9_-]+" required>
									</div>
									<div class="col-md-3 form-group">
										<label for="pajak-nama">Nama</label>
										<input type="text" class="form-control" name="nama" id="pajak-nama" maxlength="191" required>
									</div>
									<div class="col-md-2 form-group">
										<label for="pajak-persentase">Tarif (%)</label>
										<input type="number" class="form-control" name="persentase" id="pajak-persentase" min="0" max="100" step="0.0001" required>
									</div>
									<div class="col-md-3 form-group">
										<label for="pajak-batas-otomatis">Ambang bruto per rincian (Rp)</label>
										<input type="number" class="form-control" name="batas_otomatis" id="pajak-batas-otomatis" min="0" step="0.01" placeholder="Kosong = manual saja">
									</div>
									<div class="col-md-2 form-group">
										<label class="checkbox-inline" style="margin-top:25px;">
											<input type="checkbox" name="aktif" id="pajak-aktif" value="1"> Aktif
										</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								<button type="button" class="btn btn-default" id="pajak-cancel">Batal</button>
							</form>
						</div>
					</div>
				<?php endif; ?>

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th style="width:60px;">No</th>
								<th style="width:180px;">Kode</th>
								<th>Nama</th>
								<th class="text-right" style="width:140px;">Tarif</th>
								<th class="text-right" style="width:190px;">Ambang Otomatis</th>
								<th style="width:110px;">Status</th>
								<?php if ($can_edit || $can_delete): ?><th style="width:110px;">Aksi</th><?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($taxes as $index => $tax): ?>
								<tr>
									<td><?= $index + 1 ?></td>
									<td><?= html_escape($tax['kode']) ?></td>
									<td><?= html_escape($tax['nama']) ?></td>
									<td class="text-right"><?= number_format((float) $tax['persentase'], 4, ',', '.') ?>%</td>
									<td class="text-right"><?= $tax['batas_otomatis'] === null ? 'Manual saja' : 'Otomatis jika > Rp' . number_format((float) $tax['batas_otomatis'], 2, ',', '.') ?></td>
									<td>
										<?php if ((int) $tax['aktif'] === 1): ?>
											<span class="label label-success">Aktif</span>
										<?php else: ?>
											<span class="label label-default">Nonaktif</span>
										<?php endif; ?>
									</td>
									<?php if ($can_edit || $can_delete): ?>
										<td class="text-nowrap">
											<?php if ($can_edit): ?>
												<button type="button" class="btn btn-warning btn-xs pajak-edit" data-pajak="<?= html_escape(json_encode($tax, $jsonFlags)) ?>" title="Ubah">
													<i class="fa fa-pencil"></i>
												</button>
											<?php endif; ?>
											<?php if ($can_delete): ?>
															<form method="post" action="<?= site_url('keuangan_manual/parameter_rab?jenis=pajak') ?>" style="display:inline;" data-confirm="Hapus jenis pajak ini? Pajak yang sudah dipakai pada rincian belanja tidak dapat dihapus.">
													<input type="hidden" name="jenis_parameter" value="pajak">
													<input type="hidden" name="action" value="hapus">
													<input type="hidden" name="id" value="<?= (int) $tax['id'] ?>">
													<button type="submit" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></button>
												</form>
											<?php endif; ?>
										</td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
							<?php if ($taxes === []): ?>
								<tr><td colspan="<?= 6 + ($can_edit || $can_delete ? 1 : 0) ?>" class="text-center">Belum ada parameter pajak.</td></tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
<?php if ($can_edit): ?>
	<script>
		(function ($) {
			'use strict';
			var panel = $('#pajak-form-panel');
			var form = $('#pajak-form');
			function openForm(tax) {
				form[0].reset();
				$('#pajak-id').val(tax ? tax.id : '');
				$('#pajak-kode').val(tax ? tax.kode : '');
				$('#pajak-nama').val(tax ? tax.nama : '');
				$('#pajak-persentase').val(tax ? tax.persentase : '0');
				$('#pajak-batas-otomatis').val(tax && tax.batas_otomatis !== null ? tax.batas_otomatis : '');
				$('#pajak-aktif').prop('checked', tax ? Number(tax.aktif) === 1 : true);
				$('#pajak-form-title').text(tax ? 'Ubah Pajak' : 'Tambah Pajak');
				panel.show()[0].scrollIntoView({behavior: 'smooth', block: 'start'});
			}
			$('#pajak-add').on('click', function () { openForm(null); });
			$('#pajak-cancel').on('click', function () { panel.hide(); form[0].reset(); });
			$('.pajak-edit').on('click', function () {
				try {
					openForm(JSON.parse($(this).attr('data-pajak')));
				} catch (error) {
					if (window.Swal && typeof Swal.fire === 'function') {
										Swal.fire({
											title: 'Gagal',
											text: 'Data parameter tidak dapat dibaca. Muat ulang halaman dan coba lagi.',
											icon: 'error',
											confirmButtonText: 'OK'
										});
									} else if (typeof notification === 'function') {
										notification('error', 'Data parameter tidak dapat dibaca. Muat ulang halaman dan coba lagi.');
									}

				}
			});
		})(jQuery);
	</script>
<?php endif; ?>
