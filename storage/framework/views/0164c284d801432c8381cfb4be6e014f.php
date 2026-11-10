<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kehadiran Perangkat <?php echo e(ucwords($setting->sebutan_desa)); ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" href="<?= favico_desa() ?>" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>" />
    <!-- Jquery UI -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/jquery-ui.min.css')); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/font-awesome.min.css')); ?>" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/ionicons.min.css')); ?>" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/select2.min.css')); ?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>" />
    <!-- AdminLTE Skins. -->
    <link rel="stylesheet" href="<?php echo e(asset('css/skins/_all-skins.min.css')); ?>" />
    <!-- AdminLTE Modifikasi -->
    <link rel="stylesheet" href="<?php echo e(asset('css/admin-style.css')); ?>" />
    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-toggle.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/kehadiran-style.css')); ?>" />
    <?php if($setting->latar_kehadiran && file_exists(FCPATH . $setting->latar_kehadiran)): ?>
        <style type="text/css">
            .form-left {
                background-image: url('<?php echo e(asset($setting->latar_kehadiran, false)); ?>');
            }
        </style>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('css'); ?>

    <?php if (cek_koneksi_internet()): ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php endif ?>
</head>

<body class="hold-transition login-page">
    <div style="margin: 0%; padding-right: 15px; padding-left: 15px;">

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('bootstrap/js/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo e(asset('bootstrap/js/jquery.slimscroll.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('bootstrap/js/fastclick.js')); ?>"></script>
    <!-- plugins -->
    <script src="<?php echo e(asset('js/bootstrap-toggle.min.js')); ?>"></script>
    <?php if(!setting('inspect_element')): ?>
        <script src="<?php echo e(asset('js/disabled.min.js')); ?>"></script>
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script>
        // Notifikasi
        window.setTimeout(function() {
            $("#notifikasi").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 1000);
    </script>
</body>

</html>
<?php /**PATH /home/sitb2342/public_html/resources/views/kehadiran/layouts/index.blade.php ENDPATH**/ ?>