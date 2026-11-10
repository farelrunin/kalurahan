<?php $__currentLoopData = $form_kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- jika bukan array maka jadikan array dulu, karena data lama bukan bentuk array -->
    <?php
        $sumberDataPenduduk = !is_array($surat->form_isian->{$key}->data) ? [$surat->form_isian->individu->data] : $surat->form_isian->{$key}->data;
    ?>
    <div id="kategori-<?php echo e($key); ?>">
        <?php if($judul_kategori[$key] != '-'): ?>
            <div class="form-group subtitle_head">
                <label class="col-sm-3 control-label" for="status"><?php echo e(str_replace('_', ' ', strtoupper($judul_kategori[$key] ?? $key))); ?></label>
                <?php echo $__env->renderWhen(count($sumberDataPenduduk) > 1 && ($surat->form_isian->{$key}->sumber ?? 1) == 1, 'admin.surat.opsi_sumber_penduduk', ['opsiSumberPenduduk' => $surat->form_isian->{$key}->data, 'kategori' => $key, 'pendudukLuar' => $pendudukLuar], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
                <input name="anchor" type="hidden" value="<?= $anchor ?>" />
            </div>
        <?php endif; ?>
        <?php if($surat->form_isian->{$key}->info): ?>
            <div class="callout callout-warning">
                <b><?php echo e($surat->form_isian->{$key}->info); ?></b>
            </div>
        <?php endif; ?>
        <?php echo $__env->renderWhen(in_array(1, $sumberDataPenduduk) && ($surat->form_isian->{$key}->sumber ?? 1) == 1, 'admin.surat.penduduk_desa', ['opsiSumberPenduduk' => $surat->form_isian->{$key}->data, 'kategori' => $key], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php $__currentLoopData = $pendudukLuar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $penduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->renderWhen(in_array($index, $sumberDataPenduduk), 'admin.surat.penduduk_luar_desa', ['index' => $index, 'opsiSumberPenduduk' => $surat->form_isian->{$key}->data, 'kategori' => $key, 'input' => explode(',', $penduduk['input'])], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($kategori["saksi_{$key}"]): ?>
            <?php
                $individu = $kategori["saksi_{$key}"];
                $list_dokumen = $kategori["list_dokumen_{$key}"];
            ?>

            <?php echo $__env->make('admin.surat.konfirmasi_pemohon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php $__currentLoopData = $kategori['kode_isian']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('admin.surat.baris_kode_isian', ['groupLabel' => $item, 'keyname' => $key, 'label' => $label], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($surat->form_isian->$key->sebagai == 2): ?>
            <input type="hidden" name="sebagai" value="<?php echo e($key); ?>">
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function submit_form_ambil_data() {
            $('input').removeClass('required');
            $('select').removeClass('required');
            $('#' + 'validasi').attr('action', '');
            $('#' + 'validasi').attr('target', '');
            $('#' + 'validasi').submit();
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/surat/kategori_isian.blade.php ENDPATH**/ ?>