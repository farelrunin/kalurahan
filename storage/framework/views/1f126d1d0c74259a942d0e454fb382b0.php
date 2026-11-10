<?php $__env->startSection('content'); ?>
    <form id="validasi" class="login-form" action="<?= site_url('siteman/kirim_lupa_sandi') ?>" method="post">
        <div class="form-group">
            <input name="email" type="text" placeholder="Email Pengguna" class="form-control required">
        </div>
        <div class="form-group">
            <a href="#" id="b-captcha" onclick="document.getElementById('captcha').src = '<?= site_url('captcha') ?>?' + Math.random();" style="color: #000000;">
                <img id="captcha" src="<?= site_url('captcha') ?>" alt="CAPTCHA Image" />
            </a>
        </div>
        <div class="form-group captcha">
            <input
                name="captcha_code"
                type="text"
                class="form-control"
                maxlength="6"
                placeholder="Masukkan kode diatas"
                autocomplete="off"
                required
            />
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Kirim Lupa Sandi</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $('#b-captcha').click();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.auth.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/auth/forgot-password.blade.php ENDPATH**/ ?>