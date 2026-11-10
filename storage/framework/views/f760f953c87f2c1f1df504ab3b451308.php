<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Tema
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Tema</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border text-center">
            <?php if(can('u', 'theme', true, true)): ?>
                <a href="<?php echo e(site_url('theme/unggah')); ?>" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-upload"></i> Unggah</a>
            <?php endif; ?>
            <?php if(can('u')): ?>
                <a href="<?php echo e(site_url('theme/pindai')); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-retweet"></i> Pindai</a>
            <?php endif; ?>
            <a href="<?php echo e(site_url()); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $listTheme; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailTheme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <?php if ($__env->exists('admin.theme.components.general.box', $detailTheme)) echo $__env->make('admin.theme.components.general.box', $detailTheme, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/theme/index.blade.php ENDPATH**/ ?>