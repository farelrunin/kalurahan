<?php

defined('BASEPATH') || exit('No direct script access allowed');

$actions = [
    'Input / Entry' => 'input',
    'Lihat Data' => 'lihat',
    'Perubahan' => 'perubahan',
];

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Anggaran <?= html_escape($title) ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
            <li>Anggaran</li>
            <li class="active"><?= html_escape($title) ?></li>
        </ol>
    </section>

    <section class="content" id="maincontent">
        <div class="box box-info">
            <div class="box-body">
                <div class="list-group anggaran-rab-menu">
                    <?php foreach ($actions as $label => $mode): ?>
                        <a class="list-group-item" href="<?= site_url('keuangan_manual/rincian_rab/' . $pos . '?mode=' . $mode) ?>">
                            <?= html_escape($label) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
    .anggaran-rab-menu {
        margin: 40px 3%;
    }

    .anggaran-rab-menu .list-group-item {
        border-radius: 0;
        font-size: 20px;
        padding: 12px 20px;
    }
</style>
