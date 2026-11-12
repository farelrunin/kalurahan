<?php

defined('BASEPATH') || exit('No direct script access allowed');

$rabReportUrl = site_url('keuangan_manual/laporan_rab');
$reportYear = ['tahun_anggaran' => (string) $finance_filter_year];
$rabPerKegiatanUrl = $rabReportUrl . '?' . http_build_query($reportYear + ['laporan' => 'belanja_per_kegiatan']);
$rabSemuaKegiatanUrl = $rabReportUrl . '?' . http_build_query($reportYear + ['laporan' => 'belanja']);
$rkpUrl = $rabReportUrl . '?' . http_build_query($reportYear + ['laporan' => 'rkp']);
$rkkUrl = $rabReportUrl . '?' . http_build_query($reportYear + ['laporan' => 'rkk']);

?>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Laporan Anggaran Belanja</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('keuangan_manual/laporan_anggaran_belanja') ?>">Laporan</a></li>
			<li class="active">Belanja</li>
		</ol>
	</section>

	<section class="content" id="maincontent">
		<div class="box box-info">
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="list-group">
							<a class="list-group-item" href="<?= html_escape($rabPerKegiatanUrl) ?>">
								RAB Per Kegiatan
							</a>
							<a class="list-group-item" href="<?= html_escape($rabSemuaKegiatanUrl) ?>">
								RAB Semua Kegiatan
							</a>
							<a class="list-group-item" href="<?= html_escape($rkpUrl) ?>">RKP</a>
							<a class="list-group-item" href="<?= html_escape($rkkUrl) ?>">RKK</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
