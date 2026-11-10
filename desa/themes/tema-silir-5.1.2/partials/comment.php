<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
  .accordion-button:not(.collapsed) {
    --tw-text-opacity: 1;
    color: rgb(55 65 81 / var(--tw-text-opacity))
  }
  .dark .accordion-button:not(.collapsed) {
    color: white;
  }
</style>
<?php
  $comments = array();
  foreach ($komentar as $comment ) {
    if($comment['is_archived'] != 1) array_push($comments, $comment);
  }
  $comments = array_reverse($comments);
  $forms = array(
    'owner' => 'Nama',
    'email' => 'Alamat Email',
    'no_hp' => 'No. HP'
  )
?>

<?php $notif = $this->session->flashdata('notif'); ?>

<hr>
<?php if($comments) : ?>
  <div class="accordion" id="semuaKomentar">
    <div class="accordion-item bg-white dark:bg-dark-secondary border border-gray-200">
      <h2 class="accordion-header mb-0" id="komentarLabel">
        <button class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-left bg-white dark:bg-dark-secondary border-0 rounded-none transition focus:outline-none font-heading font-bold dark:text-white text-gray-700" type="button" data-bs-toggle="collapse" data-bs-target="#listKomentar" aria-expanded="false" aria-controls="listKomentar">
          Semua Komentar
        </button>
      </h2>
      <div id="listKomentar" class="accordion-collapse border-0 collapse show" aria-labelledby="komentarLabel" data-bs-parent="#semuaKomentar">
        <div class="accordion-body py-4 px-3 lg:px-5 divide-y">
          <!-- List Komentar -->
          <?php foreach($comments as $comment) : ?>
            <div class="flex gap-x-3 py-4">
              <div class="mr-1"><i class="ti ti-message text-lg lg:text-2xl"></i></div>
              <div class="space-y-2">
                <blockquote class="italic">"<?= $comment['komentar'] ?></blockquote>
                <div class="space-y-1 space-x-3 text-xs lg:text-sm">
                  <span><i class="ti ti-user mr-1 text-accent-100"></i> <?= $comment['pengguna']['nama'] ?></span>
                  <span><i class="ti ti-calendar mr-1 text-accent-100"></i> <?= tgl_indo($comment['tgl_upload']) ?></span>
                </div>
              </div>
            </div>
            <?php if (count($comment['children']) > 0): ?>
              <?php foreach($comment['children'] as $children) : ?>
                <div class="flex gap-x-3 py-4 ml-3 pl-2">
                  <div class="mr-1"><i class="ti ti-message text-lg lg:text-2xl"></i></div>
                  <div class="space-y-2">
                    <blockquote class="italic">"<?= $children['komentar'] ?></blockquote>
                    <div class="space-y-1 space-x-3 text-xs lg:text-sm">
                      <span><i class="ti ti-user mr-1 text-accent-100"></i> <?= $children['pengguna']['nama'] ?> <code class="text-xs">(<?= $children['pengguna']['level'] ?>)</code></span>
                      <span><i class="ti ti-calendar mr-1 text-accent-100"></i> <?= tgl_indo($children['tgl_upload']) ?></span>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            <?php endif ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<?php if($single_artikel['boleh_komentar'] == 1) : ?>
  <span class="block text-heading text-lg lg:text-xl comment">Kirim Komentar</span>
  <div class="bg-slate-200 dark:bg-dark-primary py-3 px-5 border-l-4 border-secondary comment">
    <p class="text-sm">Komentar baru terbit setelah disetujui Admin</p>
  </div>
  <form action="<?= site_url('/add_comment/'.$single_artikel['id'])?>" method="POST" class="space-y-3"  id="kolom-komentar">
    <div class="flex flex-col space-y-1">
      <label for="komentar" class="form-label">Komentar <span style="color:red">*</span></label>
      <textarea class="form-textarea" name="komentar" id="komentar" cols="30" rows="4" required><?= $notif['data']['komentar'] ?></textarea>
    </div>
    <div class="grid gap-2 lg:grid-cols-3 grid-cols-1">
      <?php foreach($forms as $name => $label) : ?>
        <div class="flex flex-col space-y-1">
          <label for="<?= $name ?>" class="form-label"><?= $label ?> <?php if($name !== 'email') : ?><span style="color:red">*</span><?php endif ?></label>
          <input type="text" class="form-input" id="<?= $name ?>" name="<?= $name ?>" value="<?= $name === 'owner' && !empty($notif['data']['nama']) ? $notif['data']['nama'] : $notif['data'][$name] ?>" <?php $name !== 'email' and print('required') ?>>
        </div>
      <?php endforeach ?>
    </div>
    <div class="flex flex-col lg:flex-row">
      <div class="w-full lg:w-5/12 overflow-hidden">
        <img loading="lazy" id="captcha" src="<?= site_url('captcha') ?>" alt="CAPTCHA Image" class="w-full lg:w-11/12">
        <button type="button" class="button button-transparent text-sm" onclick="document.getElementById('captcha').src = '<?= site_url("captcha") ?>?' + Math.random()" data-mdb-ripple="true" data-mdb-ripple-color="light">[Ganti Gambar]</button>
      </div>
      <div class="w-full lg:w-7/12">
        <input type="text" class="form-input required" name="captcha_code" maxlength="6" value="<?= $notif['data']['captcha_code']; ?>" placeholder="Isikan sesuai kode captcha">
      </div>
    </div>
    <button type="submit" class="button button-secondary" data-mdb-ripple="true" data-mdb-ripple-color="light">Kirim Komentar <span class="ti ti-send ml-2"></span></button>
  </form>
<?php endif ?>

<?php $alert = ($notif['status'] == -1) ? 'danger' : 'success'; ?>
<?php if ($flash_message = $notif['pesan']): ?>
  <div class="alert is-<?= $alert ?>"><?= $flash_message?></div>
<?php endif; ?>