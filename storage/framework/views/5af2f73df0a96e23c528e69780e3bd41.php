<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_colorpicker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Pengaturan Tema
        <small>Ubah Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(site_url('theme')); ?>">Tema</a></li>
    <li class="active">Ubah Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="<?php echo e(site_url('theme')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-arrow-circle-left "></i>Kembali ke Tema
            </a>
        </div>
    </div>
    <div class="row">
        <?php
            $daftarPengaturan = collect($tema->config);
            $pengaturanUnggah = $daftarPengaturan
                ->filter(function ($item) {
                    return $item['type'] == 'unggah';
                })
                ->all();
            $viewUnggah = count($pengaturanUnggah) > 0;
            $pengaturanInput = $daftarPengaturan
                ->filter(function ($item) {
                    return $item['type'] != 'unggah';
                })
                ->all();
        ?>
        <?php if(count($pengaturanInput) > 0): ?>
            <?php echo form_open_multipart($form_action, 'id="validasi"'); ?>

            <?php $col = 9 ?>
            <?php if($viewUnggah): ?>
                <?php $__currentLoopData = $pengaturanUnggah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <?php echo $__env->make("admin.theme.components.form.{$value['type']}", [
                            'value' => [
                                'judul' => $value['judul'],
                                'key' => $value['key'],
                                'default' => $tema->opsi[$value['key']] ?? $value['value'],
                                'readonly' => $value['readonly'],
                            ],
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php $col = 12 ?>
            <?php endif; ?>
            <div class="col-md-<?php echo e($col); ?>">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="row">
                            <?php $__currentLoopData = $pengaturanInput; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(view()->exists("admin.theme.components.form.{$value['type']}")): ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="input<?php echo e($value['key']); ?>" class="col-sm-2 control-label"><?php echo e(SebutanDesa($value['judul'])); ?></label>
                                                <div class="col-sm-6">
                                                    <?php
                                                        $value['default'] = $tema->opsi[$value['key']] ?? $value['value'];
                                                        $value['readonly'] = $value['readonly'] == true ? 'readonly' : '';
                                                        $value['class'] = $value['attributes']['class'];
                                                        unset($value['attributes']['class'], $value['attributes']['readonly']);
                                                        if (!empty($value['attributes'])) {
                                                            $value['attributes'] = implode(
                                                                ' ',
                                                                array_map(
                                                                    function ($key, $value) {
                                                                        return "$key=\"$value\"";
                                                                    },
                                                                    array_keys($value['attributes']),
                                                                    $value['attributes'],
                                                                ),
                                                            );
                                                        }
                                                    ?>

                                                    <?php echo $__env->make("admin.theme.components.form.{$value['type']}", [
                                                        'value' => $value,
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                </div>
                                                <label class="col-sm-4 control-label"><?php echo SebutanDesa($value['keterangan']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
            </form>
        <?php else: ?>
            <div class="box-body">
                <div class="alert alert-danger alert-dismissible">
                    <h4><i class="icon fa fa-info"></i> Info</h4>
                    Pengaturan untuk tema ini belum tersedia.
                    <?php if(!$tema->sistem): ?>
                        <a href="<?php echo e(ci_route('theme/salin_config', $tema->id)); ?>" class="btn btn-social bg-navy btn-sm" style="text-decoration: none">
                            <i class="fa fa-download none"></i> Salin Config
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/theme/pengaturan.blade.php ENDPATH**/ ?>