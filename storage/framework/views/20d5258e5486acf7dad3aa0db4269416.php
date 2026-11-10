<?php $__env->startSection('title'); ?>
    <h1>
        Pengaduan
        <small><?php echo e($action); ?></small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('pengaduan_admin')); ?>">Daftar Pengaduan</a></li>
    <li class="active"><?php echo e($action); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="<?php echo e(ci_route('pengaduan_admin')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pengaduan</a>
        </div>
        <div class="box-body">
            <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-blue">
                        <?php echo e(tgl_indo($pengaduan->created_at)); ?>

                    </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-user bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> <?php echo e($pengaduan->created_at->format('H:i')); ?></span>

                        <h3 class="timeline-header"><b><?php echo e($pengaduan->nama); ?></b> <?php echo e($pengaduan->judul); ?></h3>

                        <div class="timeline-body">
                            <?php echo e($pengaduan->isi); ?>

                        </div>
                        <div class="timeline-footer">
                            <p><i class="fa fa-id-card"></i> <?php echo e($pengaduan->nik); ?></p>
                            <p><i class="fa fa-phone"></i> <?php echo e($pengaduan->telepon); ?></p>
                            <p><i class="fa fa-envelope"></i> <?php echo e($pengaduan->email); ?></p>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <?php if($pengaduan->foto): ?>
                    <li>
                        <i class="fa fa-image bg-blue"></i>

                        <div class="timeline-item">
                            <div class="timeline-body">
                                <img class="img-responsive" src="<?php echo e(to_base64(LOKASI_PENGADUAN . $pengaduan->foto)); ?>">
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <?php if(count($pengaduan->child) > 0): ?>
                    <?php $__currentLoopData = $pengaduan->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="time-label">
                            <span class="bg-green">
                                <?php echo e(tgl_indo($item->created_at)); ?>

                            </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-comments bg-green"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo e($item->created_at->format('H:i')); ?></span>

                                <h3 class="timeline-header"><a href="#"><?php echo e($item->nama); ?></a> Menanggapi</h3>

                                <div class="timeline-body">
                                    <?php echo e($item->isi); ?>

                                </div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/pengaduan_warga/detail.blade.php ENDPATH**/ ?>