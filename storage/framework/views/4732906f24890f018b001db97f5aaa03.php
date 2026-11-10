<?php $__env->startSection('content'); ?>
    <form id="validasi" autocomplete="off" action="<?php echo e($form_action); ?>" method="post" class="login-form">
        <div class="form-group form-login">
            <input type="text" autocomplete="off" class="form-control required <?php echo jecho($cek_anjungan['keyboard'] == 1, true, 'kbvnumber'); ?>" name="nik" placeholder="NIK">
        </div>
        <div class="form-group form-login">
            <input type="password" autocomplete="off" class="form-control required <?php echo jecho($cek_anjungan['keyboard'] == 1, true, 'kbvnumber'); ?>" name="password" placeholder="PIN" id="pin">
        </div>
        <div class="form-group">
            <center><input type="checkbox" id="checkbox" style="display: initial;"> Tampilkan PIN</center>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block bg-green"><b>MASUK</b></button>
        </div>
        <div class="form-group">
            <a href="<?php echo e(site_url('layanan-mandiri/masuk-ektp')); ?>">
                <button type="button" class="btn btn-block bg-green"><b>MASUK DENGAN E-KTP</b></button>
            </a>
        </div>
        <?php if($setting->tampilkan_pendaftaran): ?>
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
                <a href="<?= route('anjungan.index') ?>">
                    <button type="button" class="btn btn-block bg-green"><b>ANJUNGAN</b></button>
                </a>
            </div>
        <?php endif; ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script type="text/javascript">
        $('document').ready(function() {
            var pass = $("#pin");
            $('#checkbox').click(function() {
                if (pass.attr('type') === "password") {
                    pass.attr('type', 'text');
                } else {
                    pass.attr('type', 'password')
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layanan_mandiri.auth.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/layanan_mandiri/auth/login.blade.php ENDPATH**/ ?>