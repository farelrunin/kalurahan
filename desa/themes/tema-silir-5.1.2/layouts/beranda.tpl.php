<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php
  $title = (!empty($judul_kategori))? $judul_kategori: 'Artikel Terkini';
  $slug = 'terkini';
  if(is_array($title)){
    $slug = $title['slug'];
    $title = $title['kategori'];
  }
?>

<?php $this->load->view($folder_themes . '/commons/main_nav') ?>
<?php $bg_header = $latar_website ? $latar_website : base_url($this->theme_folder.'/'.$this->theme .'/assets/images/header-bg.jpg') ?>
<div class="min-h-screen relative w-full max-w-screen overflow-x-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $bg_header ?>');" id="header">
  <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed bg-black/60 z-10 dark:opacity-75">
  </div>
  <div
    class="absolute top-0 right-0 bottom-0 left-0 w-full h-full flex flex-col pb-20 space-y-8 items-center justify-center container max-w-container mx-auto px-3 text-center z-10">
    <a href="<?= site_url(); ?>" class="text-center space-y-5">
      <img loading="lazy" src="<?= gambar_desa($desa['logo']) ?>" alt="Logo <?= NAMA_DESA ?>" class="h-16 lg:h-24 mx-auto">
      <div class="text-white">
        <h1 class="brand-title text-lg lg:text-xl text-white typed">Sistem Informasi <?= NAMA_DESA ?></h1>
        <span id="typed" class="brand-title text-lg lg:text-xl"></span>
        <p class="brand-tagline text-sm lg:text-base"><?= ucwords($this->setting->sebutan_kecamatan_singkat) ?>
          <?= ucwords($desa['nama_kecamatan']) ?>
          <?= ucwords($this->setting->sebutan_kabupaten_singkat) ?>
          <?= ucwords($desa['nama_kabupaten']) ?></p>
      </div>
    </a>
    <div class="header-bottom-inner hidden lg:block">
      <form action="<?= site_url() ?>" class="form lg:mt-0" method="get">
        <div class="form-search dark:border dark:border-gray-500">
          <input type="search" name="cari" id="cari" class="form-search-input w-60" placeholder="Cari...">
          <button class="form-search-button"><span class="ti ti-search mx-2"></span></button>
        </div>
      </form>
    </div>
    <?php $show_shortcut_links = boolval(theme_config('shortcut_links')) ?>
    <?php if($show_shortcut_links) : ?>
      <?php $this->load->view($folder_themes .'/widgets/shortcut_links') ?>
    <?php endif ?>
  </div>
</div>
<?php if(empty($this->input->get('cari')) AND $this->uri->segment(2) != 'kategori' AND ($this->uri->segment(2) !== 'index' AND $this->uri->segment(1) !== 'index')) : ?>
  <div class="w-full max-w-container mx-auto px-3 -mt-12 z-20 relative">
    <div class="bg-slate-50 dark:bg-dark-secondary flex flex-col lg:flex-row rounded shadow overflow-hidden">
        <div class="lg:w-7/12 flex flex-col lg:flex-row gap-3 p-5 bg-emerald-500 text-white justify-center" style="align-items: flex-start;">
            <?php
            $kepalaDesa = null;
            if (isset($aparatur_desa['daftar_perangkat']) && is_array($aparatur_desa['daftar_perangkat'])) {
                $filteredPerangkat = array_filter($aparatur_desa['daftar_perangkat'], function($pamong) {
                    return isset($pamong['jabatan']) && $pamong['jabatan'] === setting('sebutan_kepala_desa');
                });
                $kepalaDesa = reset($filteredPerangkat) ?: null;
            }
            ?>
            <?php if ($kepalaDesa): ?>
                <img loading="lazy" src="<?= $kepalaDesa['foto'] ?>" style="width: 20%" class="h-auto w-auto object-cover flex-shrink-0 mx-auto"/>
            <?php endif; ?>
            <div class="detail-content pl-2 lg:text-left text-center">
                <h2 class="text-heading lg:text-xl text-lg font-bold">Sambutan <?= ucwords(setting('sebutan_kepala_desa')) ?></h2>
                <p class="text-sm italic py-2"><?= theme_config('sambutan_kades') ?></p>
                <p class="font-bold text-sm">-- <?= ucwords(identitas('nama_kepala_desa')) ?>, <?= ucwords(setting('sebutan_kepala_desa')) ?> <?= ucwords(identitas('nama_desa')) ?></p>
            </div>
        </div>
        <div class="lg:w-5/12 w-full px-2 lg:px-5 py-5 space-y-8 flex-grow">
          <?php $this->load->view($folder_themes .'/widgets/stat_penduduk') ?>
        </div>
    </div>
  </div>
<?php endif ?>

<main class="container px-3 max-w-container mx-auto space-y-5 my-5">

  <?php $this->load->view($folder_themes .'/partials/newsticker') ?>

  <?php if(empty($this->input->get('cari')) AND $this->uri->segment(2) != 'kategori' AND ($this->uri->segment(2) !== 'index' AND $this->uri->segment(1) !== 'index')) : ?>
    <section class="relative">
      <!-- <ul class="slider-nav">
        <li class="slider-nav-item slider-nav-prev" disabled><span class="ti ti-chevron-left"></span></li>
        <li class="slider-nav-item slider-nav-next"><span class="ti ti-chevron-right"></span></li>
      </ul> -->
      <aside class="grid grid-cols-1 lg:grid-cols-3 gap-5 rounded-lg owl-carousel dash-carousel relative">
        <?php $widgetDesa = ['new_prayer_time', 'peta_lokasi_kantor', 'jam_kerja'] ?>
        <?php foreach($widgetDesa as $widget) : ?>
          <div class="sidebar-item">
            <?php $this->load->view($folder_themes . '/widgets/' . $widget) ?>
          </div>
        <?php endforeach ?>
      </aside>
    </section>

    <?php $this->load->view($folder_themes .'/widgets/holiday') ?>

    <div class="bg-slate-300 dark:bg-dark-secondary flex flex-col lg:flex-row rounded shadow overflow-hidden">
      <div class="lg:w-2/3 lg:block p-3">
        <?php $this->load->view($folder_themes .'/partials/slider') ?>
      </div>
      <div class="lg:w-1/3 w-full p-3 space-y-8 bg-tertiary text-white">
        <?php $this->load->view($folder_themes .'/partials/headline') ?>
      </div>
    </div>
  <?php endif ?>

  <section id="article-list" class="space-y-4 py-5">
    <h2 class="text-heading text-xl lg:text-3xl font-bold mb-5"><i class="ti ti-file-text inline-block mr-2 h-10 text-primary dark:text-white"></i> <?= strip_tags($this->input->get('cari', TRUE)) ?: 'Berita ' . ucwords($this->setting->sebutan_desa) ?></h2>
    <ul class="flex space-x-2 lg:space-x-0 lg:gap-2 lg:flex-wrap overflow-x-auto pb-2">
      <li class="flex-shrink-0">
        <?php $active_home = $this->uri->segment(2) !== 'kategori' ?>
        <a href="<?= site_url('index/1') ?>" class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md <?= $active_home ? 'bg-secondary text-white border-transparent hover:border-secondary' : 'bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:text-white dark:bg-dark-secondary' ?>">
            Terbaru 
            <?php if ($active_home): ?>
              <i class="ti ti-check inline-block icon icon-sm"></i>
            <?php endif ?>
          </a>
      </li>
      <?php $category_slug = 'artikel' ?>
      <?php foreach($menu_kiri as $menu) : ?>
        <li class="flex-shrink-0">
          <?php $active_menu = $this->uri->segment(2) === 'kategori' && $this->uri->segment(3) === $menu['slug'] ?>
          <a href="<?= site_url("{$category_slug}/kategori/{$menu['slug']}") ?>" class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md <?= $active_menu ? 'bg-secondary text-white border-transparent hover:border-secondary' : 'bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white' ?>">
            <?= $menu['kategori'] ?>
            <?php if ($active_menu): ?>
              <i class="ti ti-check inline-block icon icon-sm"></i>
            <?php endif ?>
          </a>
        </li>
        <?php if(count($menu['submenu']) > 0) : ?>
          <?php foreach($menu['submenu'] as $submenu) : ?>
            <?php $active_menu = $this->uri->segment(2) === 'kategori' && $this->uri->segment(3) === $submenu['slug'] ?>
            <li class="flex-shrink-0">
              <a href="<?= site_url("{$category_slug}/kategori/{$submenu['slug']}") ?>" class="inline-block px-4 py-2 text-sm rounded-lg transition duration-200 shadow-md <?= $active_menu ? 'bg-secondary text-white border-transparent hover:border-secondary' : 'bg-white hover:text-secondary border-2 border-transparent hover:border-secondary dark:bg-dark-secondary dark:text-white' ?>">
                <?= $submenu['kategori'] ?>
                <?php if ($active_menu): ?>
                  <i class="ti ti-check inline-block icon icon-sm"></i>
                <?php endif ?>
              </a>
            </li>
          <?php endforeach ?>
        <?php endif ?>
      <?php endforeach ?>
    </ul>
    <?php if($artikel) : ?>
      <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2">
      <?php foreach($artikel as $article) : ?>
        <?php $data['article'] = $article ?>
          <?php $this->load->view($folder_themes .'/partials/article_list', $data) ?>
      <?php endforeach ?>
      </div>
      <?php $data['paging_page'] = $paging_page ?>
      <?php $this->load->view($folder_themes .'/commons/paging', $data) ?>
      <?php else : ?>
        <?php $data['title'] = $title ?>
        <?php $this->load->view($folder_themes .'/partials/empty_article', $data) ?>
    <?php endif ?>
  </section>

  <?php if(empty($this->input->get('cari')) AND $this->uri->segment(2) != 'kategori') : ?>
    <?php $show_layanan_mandiri = boolval(theme_config('layanan_mandiri')) ?>
    <?php if($show_layanan_mandiri) : ?>
      <?php $this->load->view($folder_themes .'/partials/self_service') ?>
    <?php endif ?>
  <?php endif ?>

  <?php if(empty($this->input->get('cari')) AND $this->uri->segment(2) != 'kategori' AND ($this->uri->segment(2) !== 'index' AND $this->uri->segment(1) !== 'index')) : ?>
    <?php $show_village_staffs = boolval(theme_config('village_staffs')) ?>
    <?php if($show_village_staffs) : ?>
      <?php $data['is_home'] = true ?>
      <?php $this->load->view($folder_themes .'/widgets/aparatur_desa', $data) ?>
    <?php endif ?>
  <?php endif ?>
</main>

<div class="fixed bottom-0 left-0 bg-slate-300 dark:bg-dark-secondary lg:mb-5 mb-16  ml-3 flex items-center justify-center w-16 h-16 rounded-full z-40 transition duration:300"
  x-data="{darkModeBtn: false}"
  @scroll.window="darkModeBtn = window.scrollY > (document.querySelector('#header').getBoundingClientRect().top + 200)"
  :class="{'opacity-100': darkModeBtn, 'opacity-0': !darkModeBtn}">
  <div class="toggle">
    <div class="toggle-track">
      <div class="toggle-item dark" title="dark mode"><span class="ti ti-moon text-lg"></span></div>
      <div class="toggle-item light" title="light mode"><span class="ti ti-sun text-lg"></span>
      </div>
    </div>
    <div class="toggle-indicator is-dark"></div>
    <input type="checkbox" class="toggle-check" />
  </div>
</div>