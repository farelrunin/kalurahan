<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= gambar_desa($desa['logo']) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <strong><?= ucwords(setting('sebutan_desa') . ' ' . $desa['nama_desa']) ?></strong>
                </br>

                <?php
                $seb_kec = setting('sebutan_kecamatan');
                $nam_kec = $desa['nama_kecamatan'];
                $seb_kab = setting('sebutan_kabupaten');
                $nam_kab = $desa['nama_kabupaten'];
                ?>

                <?php if (strlen($nam_kec) <= 12 && strlen($nam_kab) <= 12): ?>
                <?= ucwords($seb_kec . ' ' . $nam_kec) ?>
                </br>
                <?= ucwords($seb_kab . ' ' . $nam_kab) ?>
                <?php else: ?>
                <?= ucwords(substr($seb_kec, 0, 3) . '. ' . $nam_kec) ?>
                </br>
                <?= ucwords(substr($seb_kab, 0, 3) . '. ' . $nam_kab) ?>
                <?php endif ?>

            </div>
        </div>

        <div class="sidebar-form">
            <div class="input-group mb-0">
                <input type="text" id="cari-menu" class="form-control" placeholder="Pencarian...">
                <span class="input-group-btn">
                    <button type="button" name="search" id="search-btn" class="btn btn-sm"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>
            <?php $modul = admin_menu(); ?>
            <?php foreach ($modul as $mod): ?>
            <?php $financeMenuOpen = $mod['slug'] === 'keuangan' && (
                $modul_ini === 'keuangan'
                || in_array($sub_modul_ini, ['identitas-desa', 'wilayah-administratif'], true)
            ); ?>
            <?php if (is_array($mod['childrens']) && count($mod['childrens']) > 0): ?>
            <li class="treeview <?= $financeMenuOpen ? 'active menu-open' : jecho($modul_ini, $mod['slug'], 'active') ?>">
                <a href="<?= ci_route($mod['url']) ?>">
                    <i class="fa <?= $mod['ikon'] ?> <?= $financeMenuOpen ? 'text-aqua' : jecho($modul_ini, $mod['slug'], 'text-aqua') ?>"></i><span><?= $mod['modul'] ?></span>
                    <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
                </a>
                <ul class="treeview-menu <?= $financeMenuOpen ? 'menu-open' : jecho($modul_ini, $mod['slug'], 'active') ?>">
                    <?php if ($mod['slug'] === 'keuangan' && $finance_filter_years !== []): ?>
                    <?php
                    $financeFilterQuery = $finance_filter_query;
                    unset($financeFilterQuery['tahun_anggaran']);
                    if ($finance_filter_type !== 'rab') {
                        unset($financeFilterQuery['tahun']);
                    }
                    ?>
                    <li class="finance-sidebar-year">
                        <form method="get" action="<?= html_escape($finance_filter_action) ?>">
                            <?php foreach ($financeFilterQuery as $key => $value): ?>
                            <?php if (is_scalar($value)): ?>
                            <input type="hidden" name="<?= html_escape((string) $key) ?>" value="<?= html_escape((string) $value) ?>">
                            <?php endif ?>
                            <?php endforeach ?>
                            <label for="finance-sidebar-year"><?= html_escape($finance_filter_label) ?></label>
                            <select class="form-control input-sm" id="finance-sidebar-year" name="tahun_anggaran" onchange="this.form.submit()">
                                <?php foreach ($finance_filter_years as $year): ?>
                                <option value="<?= html_escape((string) $year) ?>" <?= (string) $year === $finance_filter_year ? 'selected' : '' ?>>
                                    <?= html_escape((string) $year) ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                        </form>
                    </li>
                    <?php endif ?>

                    <?php foreach ($mod['childrens'] as $submod): ?>
                    <?php if ($mod['slug'] === 'keuangan' && count($submod['childrens'] ?? []) > 0): ?>
                    <li class="treeview <?= $financeMenuOpen ? 'active menu-open' : '' ?>">
                        <a href="#" onclick="return false;">
                            <i class="fa <?= $submod['ikon'] != null ? $submod['ikon'] : 'fa-list-alt' ?>"></i>
                            <?= $submod['modul'] ?>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu <?= $financeMenuOpen ? 'menu-open' : '' ?>">
                            <?php foreach ($submod['childrens'] as $item): ?>
                            <?php
                            $itemActive = $sub_modul_ini === $item['slug']
                                || ($item['slug'] === 'param-profil-kalurahan' && $sub_modul_ini === 'identitas-desa')
                                || ($item['slug'] === 'param-wilayah-kalurahan' && $sub_modul_ini === 'wilayah-administratif');
                            ?>
                            <li class="<?= $itemActive ? 'active' : '' ?>">
                                <a href="<?= ci_route($item['url']) ?>">
                                    <i class="fa <?= $item['ikon'] != null ? $item['ikon'] : 'fa-circle-o' ?> <?= $itemActive ? 'text-red' : '' ?>"></i>
                                    <?= $item['modul'] ?>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li class="<?= jecho($sub_modul_ini, $submod['slug'], 'active') ?>">
                        <a href="<?= ci_route($submod['url']) ?>">
                            <i class="fa <?= $submod['ikon'] != null ? $submod['ikon'] : 'fa-circle-o' ?> <?= jecho($sub_modul_ini, $submod['slug'], 'text-red') ?>"></i>
                            <?= $submod['modul'] ?>
                        </a>
                    </li>
                    <?php endif ?>
                    <?php endforeach ?>

                </ul>
            </li>
            <?php elseif ($mod['slug'] === 'keuangan'): ?>
            <li class="<?= jecho($modul_ini, $mod['slug'], 'active') ?>">
                <a aria-disabled="true">
                    <i class="fa <?= $mod['ikon'] ?> <?= jecho($modul_ini, $mod['slug'], 'text-aqua') ?>"></i><span><?= $mod['modul'] ?></span>
                </a>
            </li>
            <?php elseif (! empty($mod['url'])): ?>
            <li class="<?= jecho($modul_ini, $mod['slug'], 'active') ?>">
                <a href="<?= ci_route($mod['url']) ?>">
                    <i class="fa <?= $mod['ikon'] ?> <?= jecho($modul_ini, $mod['slug'], 'text-aqua') ?>"></i><span><?= $mod['modul'] ?></span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <?php endif ?>
            <?php endforeach ?>

        </ul>

    </section>
</aside>
<style>
    .finance-sidebar-year {
        padding: 10px 15px 10px 25px;
    }

    .finance-sidebar-year label {
        color: #b8c7ce;
        font-weight: 400;
        margin-bottom: 5px;
    }

    .finance-sidebar-year select {
        width: 100%;
    }
</style>
