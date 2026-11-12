<?php

defined('BASEPATH') || exit('No direct script access allowed');

$group_header = $group_header ?? [];
$columns = $columns ?? [];
$report_rows = $report_rows ?? [];
$isAvailable = ! empty($has_source_data);
$rightAlignedColumns = $report_key === 'rkp' ? [3, 6, 7, 8, 9, 13] : [3, 5, 6, 7, 8, 9];

?>
<style>
	.report-program { border-collapse: collapse !important; min-width: 1800px; font-size: 11px; }
	.report-program td, .report-program th { border: 1px solid #444 !important; padding: 4px 5px !important; }
	.report-program th { text-align: center; vertical-align: middle !important; }
	.report-program tbody tr { background: #fff !important; }
	.report-program .program-field, .report-program .program-sub-field { font-weight: 700; }
	.report-program .program-field { background: #e8eef3 !important; }
	.report-program .program-sub-field { background: #f5f5f5 !important; }
	@page { size: landscape; margin: 10mm; }
	@media print {
		.no-print, .content-header .breadcrumb, .main-footer, .main-sidebar { display: none !important; }
		.content-wrapper { margin-left: 0 !important; }
		.content { padding: 0 !important; }
		.content-program { overflow: visible !important; }
		.report-program { min-width: 0; width: 100%; font-size: 7px; }
		.report-program td, .report-program th { padding: 2px !important; }
		tr { page-break-inside: avoid; }
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Laporan <?= html_escape(strtoupper($report_key)) ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
			<li><a href="<?= site_url('keuangan_manual/laporan_anggaran_belanja') ?>">Laporan Anggaran Belanja</a></li>
			<li class="active"><?= html_escape(strtoupper($report_key)) ?></li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">LAPORAN <?= html_escape(strtoupper($report_key)) ?></h3>
				<div class="box-tools pull-right no-print">
					<a href="<?= site_url('keuangan_manual/laporan_anggaran_belanja') ?>" class="btn btn-default btn-sm">
						<i class="fa fa-arrow-left"></i> Kembali ke Laporan Belanja
					</a>
					<?php if ($isAvailable && ! empty($can_export)): ?>
						<a href="<?= html_escape($export_url) ?>" class="btn btn-success btn-sm">
							<i class="fa fa-file-excel-o"></i> Ekspor Excel
						</a>
						<button type="button" class="btn btn-default btn-sm" onclick="window.print()">
							<i class="fa fa-print"></i> Cetak PDF
						</button>
					<?php endif; ?>
				</div>
			</div>
			<div class="box-body">
				<h4 class="text-center">TAHUN ANGGARAN <?= html_escape($year) ?><?= $isAvailable ? ' MURNI' : '' ?></h4>
				<?php if (! $isAvailable): ?>
					<div class="alert alert-info">
						Data sumber <?= html_escape(strtoupper($report_key)) ?> yang sudah divalidasi tersedia untuk Tahun Anggaran 2027 Murni.
						Tahun <?= html_escape($year) ?> belum memiliki data sumber yang dapat ditampilkan.
					</div>
				<?php else: ?>
					<div class="table-responsive content-program">
						<table class="table table-bordered report-program">
							<thead>
								<tr>
									<?php foreach ($group_header as $header): ?>
										<th><?= html_escape((string) $header) ?></th>
									<?php endforeach; ?>
								</tr>
								<tr>
									<?php foreach ($columns as $column): ?>
										<th><?= html_escape((string) $column) ?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($report_rows as $row): ?>
									<?php
										$code = (string) ($row[0] ?? '');
										$rowClass = preg_match('/^\d+\.$/', $code) === 1
											? 'program-field'
											: (preg_match('/^\d+\.\d+\.$/', $code) === 1 ? 'program-sub-field' : 'program-activity');
									?>
									<tr class="<?= $rowClass ?>">
										<?php foreach ($columns as $index => $column): ?>
											<td class="<?= in_array($index, $rightAlignedColumns, true) ? 'text-right' : '' ?>">
												<?= html_escape((string) ($row[$index] ?? '')) ?>
											</td>
										<?php endforeach; ?>
									</tr>
								<?php endforeach; ?>
								<?php if ($report_rows === []): ?>
									<tr><td colspan="<?= count($columns) ?>" class="text-center">Belum ada data <?= html_escape(strtoupper($report_key)) ?>.</td></tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
