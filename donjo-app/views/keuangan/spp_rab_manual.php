<?php

defined('BASEPATH') || exit('No direct script access allowed');

$spp = is_array($spp) ? $spp : null;
$locked = $spp !== null && in_array($spp['status'], ['dibayar', 'batal'], true);
$preselectedItemId = (int) ($preselected_item_id ?? 0);
$selectedItems = [];
if ($spp !== null) {
	foreach ($spp['rincian'] as $item) {
		$selectedItems[(int) $item['rab_item_id']] = (float) $item['jumlah_bruto'];
	}
}
$money = static fn ($value): string => number_format((float) $value, 2, ',', '.');
$stageLabels = ['murni' => 'Murni', 'perubahan' => 'Perubahan'];
$selectedActivityLabel = '';
foreach ($activity_options as $activityOption) {
	if ($activityOption['id'] === $selected_sub_kegiatan) {
		$selectedActivityLabel = $activityOption['label'];
		break;
	}
}
$statusLabels = [
	'draft' => 'Draft',
	'diajukan' => 'Diajukan',
	'dibayar' => 'Dibayar',
	'batal' => 'Dibatalkan',
];
$jsonFlags = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>SPP Belanja e-RAB</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li>Anggaran</li>
			<li><a href="<?= site_url('keuangan_manual/anggaran_rab/belanja') ?>">Belanja</a></li>
			<li class="active">SPP Belanja</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar SPP Belanja</h3>
			</div>
			<div class="box-body">
				<form method="get" action="<?= site_url('keuangan_manual/spp_rab') ?>" class="form-inline" style="margin-bottom:20px;">
					<div class="form-group">
						<label for="spp-filter-year">Tahun Anggaran</label>
						<select class="form-control" id="spp-filter-year" name="tahun_anggaran">
							<?php foreach ($finance_filter_years as $filterYear): ?>
								<option value="<?= html_escape((string) $filterYear) ?>" <?= (string) $filterYear === (string) $year ? 'selected' : '' ?>><?= html_escape((string) $filterYear) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group" style="margin-left:8px;">
						<label for="spp-filter-stage">Tahap Anggaran</label>
						<select class="form-control" id="spp-filter-stage" name="tahap">
							<?php foreach ($stageLabels as $stageValue => $stageLabel): ?>
								<option value="<?= html_escape($stageValue) ?>" <?= $stageValue === $stage ? 'selected' : '' ?>><?= html_escape($stageLabel) ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary" style="margin-left:8px;">Tampilkan</button>
					<?php if ($can_edit && ! $spp): ?>
						<a class="btn btn-success pull-right" href="<?= site_url('keuangan_manual/spp_rab?tahun_anggaran=' . urlencode((string) $year) . '&tahap=' . urlencode($stage) . '&baru=1') ?>">
							<i class="fa fa-plus"></i> Buat SPP
						</a>
					<?php endif; ?>
				</form>

				<?php if ($spp !== null && $locked): ?>
					<div class="alert alert-info">
						SPP ini berstatus <strong><?= html_escape($statusLabels[$spp['status']] ?? $spp['status']) ?></strong> dan tidak dapat diubah.
						<a class="btn btn-default btn-sm" target="_blank" rel="noopener" href="<?= site_url('keuangan_manual/cetak_spp_rab/' . (int) $spp['id']) ?>">Cetak SPP</a>
					</div>
				<?php elseif ($can_edit && $show_form && ! $show_spp_form): ?>
					<?php if ($mixed_spp): ?>
						<div class="alert alert-warning">SPP lama ini mencakup lebih dari satu sub-kegiatan sehingga tidak dapat diubah sebagai satu SPP. Cetak SPP akan dipisah per sub-kegiatan.</div>
					<?php elseif ($activity_options !== []): ?>
						<form method="get" action="<?= site_url('keuangan_manual/spp_rab') ?>" class="form-inline panel panel-primary">
							<div class="panel-body">
								<input type="hidden" name="tahun_anggaran" value="<?= (int) $year ?>">
								<input type="hidden" name="tahap" value="<?= html_escape($stage) ?>">
								<input type="hidden" name="baru" value="1">
								<?php if ($preselected_item_id > 0): ?>
									<input type="hidden" name="rab_item_id" value="<?= (int) $preselected_item_id ?>">
								<?php endif; ?>
								<div class="form-group">
									<label for="spp-sub-kegiatan">Sub-kegiatan</label>
									<select class="form-control" id="spp-sub-kegiatan" name="sub_kegiatan" required>
										<option value="">Pilih sub-kegiatan</option>
										<?php foreach ($activity_options as $activity): ?>
											<option value="<?= html_escape($activity['id']) ?>" <?= $selected_sub_kegiatan === $activity['id'] ? 'selected' : '' ?>><?= html_escape($activity['label']) ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<button type="submit" class="btn btn-primary">Pilih Sub-kegiatan</button>
							</div>
						</form>
					<?php else: ?>
						<div class="alert alert-info">Belum ada rincian belanja aktif yang dapat diajukan sebagai SPP.</div>
					<?php endif; ?>
				<?php elseif ($can_edit && $show_spp_form): ?>
					<div class="panel panel-primary">
						<div class="panel-heading"><strong><?= $spp ? 'Ubah SPP' : 'Buat SPP Baru' ?></strong></div>
						<div class="panel-body">
							<?php if ($selectedActivityLabel !== ''): ?>
								<div class="alert alert-info">SPP ini dibatasi untuk satu sub-kegiatan: <strong><?= html_escape($selectedActivityLabel) ?></strong>.</div>
							<?php endif; ?>
							<?php if ($preselectedItemId > 0): ?>
								<div class="alert alert-info">Rincian dipilih dari Anggaran Belanja. SPP dibatasi pada sub-kegiatan ini; Anda dapat memilih rincian lain dalam sub-kegiatan yang sama.</div>
							<?php endif; ?>
							<form method="post" action="<?= site_url('keuangan_manual/spp_rab') ?>" id="spp-rab-form">
								<input type="hidden" name="<?= html_escape($csrf_name) ?>" value="<?= html_escape($csrf_value) ?>">
								<input type="hidden" name="action" value="simpan">
								<input type="hidden" name="id" value="<?= $spp ? (int) $spp['id'] : '' ?>">
								<input type="hidden" name="tahun" value="<?= (int) $year ?>">
								<input type="hidden" name="tahap" value="<?= html_escape($stage) ?>">
								<div class="row">
									<div class="col-md-3 form-group">
										<label for="spp-nomor">Nomor SPP</label>
										<input type="text" class="form-control" id="spp-nomor" name="nomor_spp" maxlength="100" required value="<?= html_escape((string) ($spp['nomor_spp'] ?? '')) ?>">
									</div>
									<div class="col-md-3 form-group">
										<label for="spp-date">Tanggal SPP</label>
										<input type="date" class="form-control" id="spp-date" name="tanggal_spp" required value="<?= html_escape((string) ($spp['tanggal_spp'] ?? date('Y-m-d'))) ?>">
									</div>
									<div class="col-md-3 form-group">
										<label for="spp-type">Jenis SPP</label>
										<select class="form-control" id="spp-type" name="jenis_spp" required>
											<?php foreach (['LS', 'UP', 'GU', 'TU'] as $type): ?>
												<option value="<?= $type ?>" <?= ($spp['jenis_spp'] ?? 'LS') === $type ? 'selected' : '' ?>><?= $type ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-3 form-group">
										<label for="spp-status">Status</label>
										<select class="form-control" id="spp-status" name="status" required>
											<?php foreach (['draft', 'diajukan', 'dibayar', 'batal'] as $status): ?>
												<?php if ($status !== 'batal' || $spp): ?>
													<option value="<?= $status ?>" <?= ($spp['status'] ?? 'draft') === $status ? 'selected' : '' ?>><?= html_escape($statusLabels[$status]) ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 form-group">
										<label for="spp-recipient">Penerima</label>
										<input type="text" class="form-control" id="spp-recipient" name="penerima" maxlength="191" required value="<?= html_escape((string) ($spp['penerima'] ?? '')) ?>">
									</div>
									<div class="col-md-2 form-group">
										<label for="spp-nik">NIK</label>
										<input type="text" class="form-control" id="spp-nik" name="nik" maxlength="16" inputmode="numeric" pattern="[0-9]{16}" value="<?= html_escape((string) ($spp['nik'] ?? '')) ?>">
									</div>
									<div class="col-md-2 form-group">
										<label for="spp-bank-number">No. Rekening BPD</label>
										<input type="text" class="form-control" id="spp-bank-number" name="nomor_rekening_bpd" maxlength="50" value="<?= html_escape((string) ($spp['nomor_rekening_bpd'] ?? '')) ?>">
									</div>
									<div class="col-md-3 form-group">
										<label for="spp-bank-account">Nama Rekening BPD</label>
										<input type="text" class="form-control" id="spp-bank-account" name="nama_rekening_bpd" maxlength="191" value="<?= html_escape((string) ($spp['nama_rekening_bpd'] ?? '')) ?>">
									</div>
									<div class="col-md-2 form-group">
										<label for="spp-npwp">NPWP</label>
										<input type="text" class="form-control" id="spp-npwp" name="npwp" maxlength="30" value="<?= html_escape((string) ($spp['npwp'] ?? '')) ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="spp-address">Alamat</label>
									<input type="text" class="form-control" id="spp-address" name="alamat" maxlength="255" value="<?= html_escape((string) ($spp['alamat'] ?? '')) ?>">
								</div>
								<div class="form-group">
									<label for="spp-purpose">Keperluan</label>
									<textarea class="form-control" id="spp-purpose" name="keperluan" rows="2" maxlength="500" required><?= html_escape((string) ($spp['keperluan'] ?? '')) ?></textarea>
								</div>

								<h4>Rincian Anggaran yang Dibayarkan</h4>
								<div class="table-responsive">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Pilih</th>
												<th>Rekening / Kegiatan</th>
												<th>Keterangan</th>
												<th class="text-right">Pagu Item</th>
												<th class="text-right">Sudah Dialokasikan</th>
												<th class="text-right">Nilai Bruto SPP</th>
												<th class="text-right">Potongan Pajak</th>
												<th class="text-right">Netto</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($sources as $source): ?>
												<?php
												$itemId = (int) $source['rab_item_id'];
												$currentAmount = $selectedItems[$itemId] ?? 0;
												$limit = (float) $source['tersedia'] + $currentAmount;
												$rates = array_map(static fn (array $tax): float => (float) $tax['persentase'], $source['pajak']);
												$selected = isset($selectedItems[$itemId]) || (! $spp && $itemId === $preselectedItemId);
												?>
												<tr class="spp-source-row" data-rates="<?= html_escape(json_encode($rates, $jsonFlags)) ?>">
													<td>
														<input type="checkbox" class="spp-select-item" name="rab_item_ids[]" value="<?= $itemId ?>" <?= $selected ? 'checked' : '' ?> <?= $limit <= 0 && ! $selected ? 'disabled' : '' ?>>
													</td>
													<td>
														<strong><?= html_escape((string) $source['rekening_kode']) ?> — <?= html_escape((string) $source['rekening_nama']) ?></strong><br>
														<small><?= html_escape((string) $source['kegiatan']) ?> · <?= html_escape((string) $stageLabels[$stage]) ?></small>
													</td>
													<td>
														<?= html_escape((string) $source['keterangan']) ?><br>
														<small>Pajak: <?php foreach ($source['pajak'] as $taxIndex => $tax): ?><?= $taxIndex > 0 ? ', ' : '' ?><?= html_escape((string) $tax['nama_pajak']) ?> <?= number_format((float) $tax['persentase'], 4, ',', '.') ?>%<?php endforeach; ?><?= $source['pajak'] === [] ? 'Tidak ada' : '' ?></small>
													</td>
													<td class="text-right"><?= $money($source['jumlah_anggaran']) ?></td>
													<td class="text-right"><?= $money($source['terpakai']) ?></td>
													<td>
														<input type="number" class="form-control input-sm spp-item-amount" name="jumlah_bruto[<?= $itemId ?>]" min="0.01" max="<?= number_format($limit, 2, '.', '') ?>" step="0.01" value="<?= isset($selectedItems[$itemId]) ? number_format($currentAmount, 2, '.', '') : '' ?>" <?= $selected ? '' : 'disabled' ?>>
														<small>Sisa maksimal: <?= $money($limit) ?></small>
													</td>
													<td class="text-right spp-item-tax">0,00</td>
													<td class="text-right spp-item-net">0,00</td>
												</tr>
											<?php endforeach; ?>
											<?php if ($sources === []): ?>
												<tr><td colspan="8" class="text-center">Belum ada rincian Belanja aktif pada tahun dan tahap ini.</td></tr>
											<?php endif; ?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="5" class="text-right">Total SPP</th>
												<th id="spp-total-gross" class="text-right">0,00</th>
												<th id="spp-total-tax" class="text-right">0,00</th>
												<th id="spp-total-net" class="text-right">0,00</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan SPP</button>
								<a class="btn btn-default" href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['tahun_anggaran' => $year, 'tahap' => $stage])) ?>">Batal</a>
							</form>
						</div>
					</div>
				<?php endif; ?>

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nomor / Tanggal SPP</th>
								<th>Penerima</th>
								<th>Jenis</th>
								<th class="text-right">Bruto</th>
								<th class="text-right">Pajak</th>
								<th class="text-right">Netto</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($spps as $index => $record): ?>
								<tr>
									<td><?= $index + 1 ?></td>
									<td><?= html_escape((string) $record['nomor_spp']) ?><br><small><?= html_escape((string) $record['tanggal_spp']) ?></small></td>
									<td><?= html_escape((string) $record['penerima']) ?><br><small><?= (int) $record['jumlah_item'] ?> rincian</small></td>
									<td><?= html_escape((string) $record['jenis_spp']) ?></td>
									<td class="text-right"><?= $money($record['jumlah_bruto']) ?></td>
									<td class="text-right"><?= $money($record['jumlah_pajak']) ?></td>
									<td class="text-right"><?= $money($record['jumlah_netto']) ?></td>
									<td><?= html_escape($statusLabels[$record['status']] ?? $record['status']) ?></td>
									<td class="text-nowrap">
										<?php if ($record['status'] !== 'batal'): ?>
											<a class="btn btn-default btn-xs" target="_blank" rel="noopener" href="<?= site_url('keuangan_manual/cetak_spp_rab/' . (int) $record['id']) ?>">Cetak SPP</a>
											<?php if ($record['status'] !== 'dibayar' && $can_edit): ?>
												<a class="btn btn-warning btn-xs" href="<?= site_url('keuangan_manual/spp_rab?' . http_build_query(['edit' => $record['id'], 'tahun_anggaran' => $year, 'tahap' => $stage])) ?>">Ubah</a>
											<?php endif; ?>
										<?php endif; ?>
										<?php if ($can_delete && $record['status'] === 'draft'): ?>
											<form method="post" action="<?= site_url('keuangan_manual/spp_rab') ?>" style="display:inline;" onsubmit="return confirm('Hapus SPP draft ini?');">
												<input type="hidden" name="<?= html_escape($csrf_name) ?>" value="<?= html_escape($csrf_value) ?>">
												<input type="hidden" name="action" value="hapus">
												<input type="hidden" name="id" value="<?= (int) $record['id'] ?>">
												<input type="hidden" name="tahun" value="<?= (int) $year ?>">
												<input type="hidden" name="tahap" value="<?= html_escape($stage) ?>">
												<button type="submit" class="btn btn-danger btn-xs">Hapus</button>
											</form>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
							<?php if ($spps === []): ?>
								<tr><td colspan="9" class="text-center">Belum ada SPP untuk tahun dan tahap ini.</td></tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</div>
<style>
	.spp-source-row small { color: #777; }
	.spp-source-row .form-control { min-width: 115px; }
</style>
<?php if ($can_edit && $show_form): ?>
	<script>
		(function ($) {
			'use strict';
			var money = function (value) {
				return (Number(value) || 0).toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2});
			};
			function recalculate() {
				var gross = 0;
				var taxTotal = 0;
				$('.spp-source-row').each(function () {
					var row = $(this);
					var selected = row.find('.spp-select-item').is(':checked');
					var input = row.find('.spp-item-amount').prop('disabled', !selected);
					var amount = selected ? (Number(input.val()) || 0) : 0;
					var rates = [];
					try {
						rates = JSON.parse(row.attr('data-rates') || '[]');
					} catch (error) {
						window.alert('Data tarif pajak tidak dapat dibaca. Muat ulang halaman.');
					}
					var tax = rates.reduce(function (sum, rate) {
						return sum + Math.round(amount * Number(rate)) / 100;
					}, 0);
					tax = Math.round(tax * 100) / 100;
					row.find('.spp-item-tax').text(money(tax));
					row.find('.spp-item-net').text(money(amount - tax));
					gross += amount;
					taxTotal += tax;
				});
				$('#spp-total-gross').text(money(gross));
				$('#spp-total-tax').text(money(taxTotal));
				$('#spp-total-net').text(money(gross - taxTotal));
			}
			$('.spp-select-item').on('change', function () {
				recalculate();
			});
			$('.spp-item-amount').on('change input', recalculate);
			recalculate();
		})(jQuery);
	</script>
<?php endif; ?>
