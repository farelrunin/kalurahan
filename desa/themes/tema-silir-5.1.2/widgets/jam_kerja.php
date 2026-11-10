<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
  .jam-kerja td, .jam-kerja th {
    border: 1px solid #eee;
    padding: 5px 8px;
  }
  .jam-kerja tr {
    border: 1px solid #eee;
  }
  .jam-kerja tr:nth-child(even) {
    background-color: #efefef;
  }
  .dark .jam-kerja tr:nth-child(even) {
    background-color: #1a202c;
  }
  .jam-kerja th {
    background-color: var(--primary-color);
    color: #fff;
  }
</style>
<?php if ($jam_kerja) : ?>
  <div class="box box-primary box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="ti ti-clock"></i> Jam Kerja</h3>
    </div>
    <div class="box-body">
    <table class="w-full table border text-center jam-kerja" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>Hari</th>
          <th>Mulai</th>
          <th>Selesai</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($jam_kerja as $value) : ?>
        <tr>
          <td><?= $value->nama_hari ?></td>
          <?php if ($value->status) : ?>
            <td><?= $value->jam_masuk ?></td>
            <td><?= $value->jam_keluar ?></td>
          <?php else : ?>
            <td colspan="2"><span class="bg-red-500 text-white py-1 px-3 rounded inline-block"> Libur </span></td>
          <?php endif ?>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
<?php endif ?>