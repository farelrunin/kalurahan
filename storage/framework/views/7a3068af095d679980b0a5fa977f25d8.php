<?php $__env->startSection('content'); ?>
    <form id="validasi" autocomplete="off" action="<?php echo e($form_action); ?>" method="post" class="login-form">
        <div class="login-footer-top">
            <?php if($cek_anjungan): ?>
                Tempelkan e-KTP Pada Card Reader
            <?php endif; ?>
            <div class="thumbnail">
                <img src="<?php echo e(asset('images/camera-scan.gif')); ?>" alt="scanner" class="center" style="width:30%">
            </div>
        </div>
        <div class="form-group form-login" style="<?php echo e(jecho($cek_anjungan == 0 || ENVIRONMENT == 'development', false, 'width: 0; height: 0; overflow: hidden;')); ?>">
            <input
                name="tag_id_card"
                id="tag"
                autocomplete="off"
                placeholder="Tempelkan e-KTP Pada Card Reader"
                class="form-control required number"
                type="password"
                onkeypress="if (event.keyCode == 13){$('#'+'validasi').attr('action', '<?php echo e($form_action); ?>');$('#'+'validasi').submit();}"
            >
        </div>
        <?php if(!$cek_anjungan): ?>
            <div class="form-group form-login">
                <input type="password" class="form-control required number" name="password" placeholder="Masukan PIN" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block bg-green"><b>MASUK</b></button>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <a href="<?php echo e(site_url('layanan-mandiri/masuk')); ?>">
                <button type="button" class="btn btn-block bg-green"><b>MASUK DENGAN NIK</b></button>
            </a>
        </div>
        <?php if($ci->setting->tampilkan_pendaftaran): ?>
            <div class="form-group">
                <a href="<?php echo e(site_url('layanan-mandiri/daftar')); ?>">
                    <button type="button" class="btn btn-block bg-green"><b>DAFTAR</b></button>
                </a>
            </div>
        <?php endif; ?>
        <div class="form-group">
            <a href="<?php echo e(site_url('layanan-mandiri/lupa-pin')); ?>">
                <button type="button" class="btn btn-block bg-green"><b>LUPA PIN</b></button>
            </a>
        </div>
        <?php if($cek_anjungan['tipe'] == 1): ?>
            <div class="form-group">
                <a href="<?php echo e(route('anjungan.index')); ?>">
                    <button type="button" class="btn btn-block bg-green"><b>ANJUNGAN</b></button>
                </a>
            </div>
        <?php endif; ?>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layanan_mandiri.auth.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/layanan_mandiri/auth/login-ektp.blade.php ENDPATH**/ ?>