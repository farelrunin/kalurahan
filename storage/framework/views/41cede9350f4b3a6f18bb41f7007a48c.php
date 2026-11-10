<h5><b>Kode Isian</b></h5>
<div class="table-responsive">
    <table class="table table-hover table-striped kode-isian">
        <tbody id="dragable-<?php echo e($item); ?>">
            <tr style="font-weight: bold;">
                <td>#</td>
                <td>TIPE</td>
                <td>NAMA</td>
                <td>LABEL</td>
                <td>PLACEHOLDER</td>
                <td class="padat">HARUS DIISI</td>
                <td>KOLOM</td>
                <td>ATRIBUT</td>
                <td class="isian-pilihan">PILIHAN</td>
                <td>AKSI</td>
            </tr>
            <?php $jumlah_isian = 0; ?>
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $jumlah_isian++; ?>
                <tr class="duplikasi kategori ui-sortable-handle" id="gandakan-<?php echo e($value->kategori); ?>-<?php echo e($key); ?>" data-id="<?php echo e($key); ?>">
                    <td><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></td>
                    <td>
                        <select class="form-control input-sm pilih_tipe" name="kategori_tipe_kode[<?php echo e($value->kategori); ?>][]">
                            <option value="" selected>Pilihan Tipe</option>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr_key => $attr_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($attr_key); ?>" <?= ($attr_key == $value->tipe) ? 'selected' : ''; ?>><?php echo e($attr_value); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td><input type="text" name="kategori_nama_kode[<?php echo e($value->kategori); ?>][]" class="form-control input-sm isian" value="<?php echo e($value->nama); ?>" placeholder="Masukkan Nama" <?= ($value->tipe == '') ? 'disabled' : ''; ?>>
                    </td>
                    <td><input type="text" name="kategori_label_kode[<?php echo e($value->kategori); ?>][]" class="form-control input-sm isian" value="<?php echo e($value->label ?? ''); ?>" placeholder="Masukkan Label" <?= ($value->tipe == '') ? 'disabled' : ''; ?>>
                    </td>
                    <td><input type="text" name="kategori_deskripsi_kode[<?php echo e($value->kategori); ?>][]" class="form-control input-sm isian" value="<?php echo e($value->deskripsi); ?>" placeholder="Masukkan Placeholder" <?= ($value->tipe == '') ? 'disabled' : ''; ?>></td>
                    <td class="text-center">
                        <input class="isian-required" type="checkbox" value="1" <?= ($value->required) ? 'checked' : ''; ?> <?= ($value->tipe == '') ? 'disabled' : ''; ?> name="kategori_required_kode[<?php echo e($value->kategori); ?>][<?php echo e($jumlah_isian - 1); ?>]">
                    </td>
                    <td class="text-center">
                        <select class="form-control input-sm" name="kategori_kolom[<?php echo e($value->kategori); ?>][]">
                            <option value="" selected>Pilihan lebar kolom</option>
                            <?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKolom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($itemKolom); ?>" <?= ($itemKolom == $value->kolom) ? 'selected' : ''; ?>>col-<?php echo e($itemKolom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control input-sm isian isian-atribut" name="kategori_atribut_kode[<?php echo e($value->kategori); ?>][]" rows="5" placeholder="Masukkan Atribut" <?= ($value->tipe == '') ? 'disabled' : ''; ?>><?php echo e($value->atribut); ?></textarea>
                    </td>
                    <td>
                        <textarea class="form-control input-sm isian isian-pilihan <?php echo e($value->tipe == 'select-otomatis' || $value->tipe == 'select-manual' ? 'hide' : ''); ?>" name="kategori_pilihan_kode[<?php echo e($value->kategori); ?>][]" rows="5" placeholder="Masukkan Pilihan"
                            <?php echo e($value->tipe != 'select-otomatis' || $value->tipe != 'select-manual' ? 'disabled' : ''); ?>

                        ><?php echo e(json_encode($value->pilihan)); ?>

                        </textarea>
                        <select class="<?php echo e($value->tipe == 'select-manual' ? 'select2' : 'hide'); ?> form-control selectinput-sm isian select-manual" name="kategori_pilihan_kode[<?php echo e($value->kategori); ?>][<?php echo e($jumlah_isian); ?>][]" multiple placeholder="Masukkan Pilihan" <?= ($value->tipe == '') ? 'disabled' : ''; ?>>
                            <?php $__currentLoopData = $value->pilihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pilihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pilihan); ?>" selected><?php echo e($pilihan); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <select class="form-control input-sm isian isian-referensi <?= ($value->tipe == 'select-otomatis') ? 'show' : 'hide'; ?>" name="kategori_referensi_kode[<?php echo e($value->kategori); ?>][]" placeholder="Masukkan Pilihan" <?= ($value->tipe == '') ? 'disabled' : ''; ?>>
                            <option value="" selected>Pilihan Referensi</option>
                            <?php $__currentLoopData = \App\Enums\ReferensiEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val); ?>" <?= ($val == $value->refrensi) ? 'selected' : ''; ?>>
                                    <?php echo e($label); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td class="padat">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-flat btn-danger btn-sm hapus-kode" title="Hapus Kode Isian"><i class='fa fa-trash-o'></i></button>
                            <button type="button" class="btn btn-flat btn-warning btn-sm pindah-kode" title="Pindah Kode Isian"><i class='fa fa-exchange'></i></button>
                            <button type="button" class="btn btn-flat btn-primary btn-sm kaitkan-kode" title="Kaitkan Kode Isian"><i class='fa fa-link'></i></button>
                            <input type="hidden" class="form-control input-sm kaitkan hide" name="kategori_kaitkan_kode[<?php echo e($value->kategori); ?>][]" value="<?php echo e($value->kaitkan_kode ?? ''); ?>" />
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($jumlah_isian == 0): ?>
                <tr class="duplikasi kategori ui-sortable-handle" id="gandakan-<?php echo e($item); ?>-0" data-id="0">
                    <td><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></td>
                    <td>
                        <select class="form-control input-sm pilih_tipe" name="kategori_tipe_kode[<?php echo e($item); ?>][]">
                            <option value="" selected>Pilihan Tipe</option>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr_key => $attr_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($attr_key); ?>" <?= ($attr_key == 1) ? 'selected' : ''; ?>>
                                    <?php echo e($attr_value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td><input type="text" name="kategori_nama_kode[<?php echo e($item); ?>][]" class="form-control input-sm isian" placeholder="Masukkan Nama" <?= ($value->tipe == '') ? 'disabled' : ''; ?>></td>
                    <td><input type="text" name="kategori_label_kode[<?php echo e($item); ?>][]" class="form-control input-sm isian" placeholder="Masukkan Label" <?= ($value->tipe == '') ? 'disabled' : ''; ?>></td>
                    <td><input type="text" name="kategori_deskripsi_kode[<?php echo e($item); ?>][]" class="form-control input-sm isian" placeholder="Masukkan Placeholder" <?= ($value->tipe == '') ? 'disabled' : ''; ?>></td>
                    <td class="text-center">
                        <input class="isian-required" type="checkbox" value="1" <?= ($value->required) ? 'checked' : ''; ?> <?= ($value->tipe == '') ? 'disabled' : ''; ?> name="kategori_required_kode[<?php echo e($item); ?>][]">
                    </td>
                    <td class="text-center">
                        <select class="form-control input-sm" name="kategori_kolom[<?php echo e($value->kategori); ?>][]">
                            <option value="" selected>Pilihan lebar kolom</option>
                            <?php $__currentLoopData = range(1, 12); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemKolom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($itemKolom); ?>">col-<?php echo e($itemKolom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control input-sm isian isian-atribut" name="kategori_atribut_kode[<?php echo e($value->kategori); ?>][]" rows="5" placeholder="Masukkan Atribut" <?= ($value->tipe == '') ? 'disabled' : ''; ?>><?php echo e($value->atribut); ?></textarea>
                    </td>
                    <td>
                        <textarea class="form-control input-sm isian isian-pilihan  <?= ($value->tipe != 'select-manual') ? 'show' : 'hide'; ?>" name="kategori_atribut_kode[<?php echo e($item); ?>][]" rows="5" placeholder="Masukkan Pilihan" <?= ($value->tipe == '') ? 'disabled' : ''; ?>><?php echo e((string) $value->atribut); ?>

                        </textarea>
                        <select class="form-control input-sm isian select-manual <?= ($value->tipe == 'select-manual') ? 'show' : 'hide'; ?>" name="kategori_pilihan_kode[<?php echo e($item); ?>][<?php echo e($jumlah_isian); ?>][]" multiple placeholder="Masukkan Pilihan" <?= ($value->tipe == '') ? 'disabled' : ''; ?>>
                        </select>
                        <select class="form-control input-sm isian isian-referensi <?= ($value->tipe == 'select-otomatis') ? 'show' : 'hide'; ?>" name="kategori_referensi_kode[<?php echo e($item); ?>][]" placeholder="Masukkan Pilihan" <?= ($value->tipe == '') ? 'disabled' : ''; ?>>
                            <option value="" selected>Pilihan Referensi</option>
                            <?php $__currentLoopData = \App\Enums\ReferensiEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value); ?>"><?php echo e($key); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td class="padat">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-flat btn-danger btn-sm hapus-kode" title="Hapus Kode Isian"><i class="fa fa-trash-o"></i></button>
                            <button type="button" class="btn btn-flat btn-warning btn-sm pindah-kode hide" title="Pindah Kode Isian"><i class='fa fa-exchange'></i></button>
                            <button type="button" class="btn btn-flat btn-primary btn-sm kaitkan-kode" title="Kaitkan Kode Isian"><i class='fa fa-link'></i></button>
                            <input type="hidden" class="form-control input-sm kaitkan hide" name="kategori_kaitkan_kode[<?php echo e($value->kategori); ?>][]" value="" />
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-success btn-sm btn-block tambah-kode" data-type="gandakan-<?php echo e($item); ?>" data-kategori="<?php echo e($item); ?>"><i class="fa fa-plus"></i></button>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $("#dragable-<?php echo e($item); ?>").sortable({
            cursor: 'row-resize',
            placeholder: 'ui-state-highlight',
            items: '.ui-sortable-handle'
        }).disableSelection();
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/pengaturan_surat/kategori_isian.blade.php ENDPATH**/ ?>