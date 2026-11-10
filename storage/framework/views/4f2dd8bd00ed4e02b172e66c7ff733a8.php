<?php $__env->startSection('title'); ?>
    <h1>
        OpenDK Error
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-danger">
        <div class="box-header with-border">
            <i class="icon fa fa-ban"></i>
            <h3 class="box-title">Koneksi Ke OpenDK Gagal.</h3>
        </div>
        <div class="box-body">
            <?php if($message): ?>
                <div class="callout callout-danger">
                    <h5>Pesan Error : <?php echo $message; ?></h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\database kelurahan\app\resources\views/admin/opendkpesan/error.blade.php ENDPATH**/ ?>