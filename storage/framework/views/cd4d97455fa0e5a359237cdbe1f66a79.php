<div class="col-md-4 col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title"><?php echo e($item['name'] ?? '__name__'); ?></div>
        </div>
        <div class="panel-body" style="min-height:200px">
            <div class="row">
                <div class="col-md-9">
                    <?php echo e($item['description'] ?? '__description__'); ?>

                </div>
                <div class="col-md-3">
                    <div class="row">
                        <img width="70px" class="img-thumbnail" src="<?php echo e($item['thumbnail'] ?? '__thumbnail__'); ?>" alt="Static Pages">
                        <div class="price-tag"><?php echo e($item['price'] ?? '__price__'); ?></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $button ?? '__button__'; ?>

                </div>
                <div class="col-md-6">
                    <div class="pull-right" style="margin-top:10px">
                        <?php echo e($item['totalInstall'] ?? '__totalInstall__'); ?> Terpasang
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/plugin/item.blade.php ENDPATH**/ ?>