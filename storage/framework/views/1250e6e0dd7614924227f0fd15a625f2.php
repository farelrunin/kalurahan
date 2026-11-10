<div class="box box-<?php echo e($status == 1 ? 'success' : 'info'); ?>">
    <div class="box-header with-border text-center">
        <strong><?php echo e($nama); ?></strong>

        <?php if($sistem === 1): ?>
            <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Tema Bawaan">
                <i class="fa fa-square text-green"></i>
            </div>
        <?php endif; ?>
    </div>

    <div class="box-body">
        <div class="text-center">
            <center>
                <?php $file = $path . '/assets/thumbnail/preview-1.jpg' ?>
                <?php if(file_exists(FCPATH . $file)): ?>
                    <img style="width:100%; max-height: 160px;" src="<?php echo e(base_url($asset_path . '/assets/thumbnail/preview-1.jpg')); ?>" class="img-responsive" alt="<?php echo e($nama); ?>">
                <?php else: ?>
                    <img style="max-height: 160px;" src="<?php echo e(asset('images/404-image-not-found.jpg')); ?>" class="img-responsive" alt="<?php echo e($nama); ?>">
                <?php endif; ?>
            </center>
        </div>
        <br>
        <div class="text-center">
            <?php if($status == 1): ?>
                <a href="#" class="btn btn-social btn-success btn-sm" readonly><i class="fa fa-star"></i>Aktif</a>
            <?php else: ?>
                <?php if(can('u')): ?>
                    <a href="<?php echo e(site_url('theme/aktifkan/' . $id)); ?>" class="btn btn-info btn-sm" title="Aktifkan Tema"><i class="fa fa-star-o"></i></a>
                <?php else: ?>
                    <br style="margin-top: 5px;">
                <?php endif; ?>
                <?php if(can('h') && $sistem !== 1): ?>
                    <a href="#" data-href="<?php echo e(site_url('theme/delete/' . $id)); ?>" class="btn btn-danger btn-sm" title="Hapus Tema" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(can('u')): ?>
                <a href="<?php echo e(site_url('theme/pengaturan/' . $id)); ?>" class="btn bg-navy btn-sm" title="Pengaturan Tema"><i class="fa fa-cog"></i></a>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/theme/components/general/box.blade.php ENDPATH**/ ?>