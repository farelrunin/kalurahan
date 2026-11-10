<div class="btn-group-vertical">
    <a class="btn btn-social bg-navy btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Impor / Ekspor</a>
    <ul class="dropdown-menu" role="menu">
        <?php if (can('u')) : ?>
        <li>
            <a href="<?php echo e(site_url($impor)); ?>" class="btn btn-social btn-block btn-sm" data-title="Impor Data"><i class="fa fa-upload"></i> Impor Data</a>
        </li>
        <?php endif; ?>
        <li>
            <a href="<?php echo e(site_url($ekspor)); ?>" target="_blank" class="btn btn-social btn-block btn-sm" title="Ekspor Data"><i class="fa fa-download"></i> Ekspor Data</a>
        </li>
    </ul>
</div>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/layouts/components/tombol_impor_ekspor.blade.php ENDPATH**/ ?>