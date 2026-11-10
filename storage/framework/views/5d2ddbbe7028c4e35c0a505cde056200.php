<div class="btn-group col-sm-8" data-toggle="buttons">
    <?php $__currentLoopData = $opsiSumberPenduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sumberPenduduk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <label style="text-transform: uppercase;" for="penduduk_<?php echo e($sumberPenduduk); ?>" class="btn btn-info btn-flat btn-sm col-sm-6 col-md-6 col-lg-6 form-check-label <?php echo e($sumberPenduduk == 1 ? 'active' : ''); ?>">
            <input name="<?php echo e($kategori); ?>[opsi_penduduk]" type="radio" class="form-check-input" value="<?php echo e($sumberPenduduk); ?>" autocomplete="off" onchange="dataPenduduk(this);"> <?php echo e(sebutanDesa($sumberPenduduk == 1 ? 'PENDUDUK [desa]' : $pendudukLuar[$sumberPenduduk]['title'] ?? 'Luar [desa]')); ?>

        </label>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function dataPenduduk(elm) {
            let _formGroup = $(elm).closest('.form-group')
            let _val = $(elm).val()
            _formGroup.nextAll('.penduduk_form').addClass('hide')
            _formGroup.next('.penduduk_desa').addClass('hide')
            // reset semua data yang telah dimasukkan
            _formGroup.next('.penduduk_desa').find('select.select2-nik-ajax').empty()
            _formGroup.next('.penduduk_desa').find('.data_penduduk_desa').empty()
            _formGroup.nextAll('.penduduk_luar_desa').find('input, select, textarea').val('')
            if (_val == 1) {
                _formGroup.next('.penduduk_desa').removeClass('hide')
                _formGroup.next('.penduduk_luar_desa').find('.isi-penduduk-luar').removeClass('required')
                _formGroup.next('.penduduk_desa').find('.isi-penduduk-desa').addClass('required')
                $('[data-visible-required=1]:hidden').removeClass('required')
            } else {
                _formGroup.next('.penduduk_luar_desa').find('.isi-penduduk-luar').addClass('required')
                _formGroup.next('.penduduk_desa').find('.isi-penduduk-desa').removeClass('required')
                _formGroup.nextAll('.penduduk_luar_' + _val).first().removeClass('hide')
                $('[data-visible-required=1]:visible').addClass('required')
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/surat/opsi_sumber_penduduk.blade.php ENDPATH**/ ?>