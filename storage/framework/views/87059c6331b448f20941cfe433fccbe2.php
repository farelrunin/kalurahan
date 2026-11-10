<?php $__env->startSection('title'); ?>
    <h1>
        Data Suplemen
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('suplemen')); ?>">Daftar Data Suplemen</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="<?php echo e(ci_route('suplemen')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Data Suplemen</a>
        </div>
        <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nama">Sasaran Data</label>
                <div class="col-sm-9">
                    <select class="form-control input-sm required" <?php echo e($suplemen->sasaran && $suplemen->terdata->count() > 0 ? 'disabled' : ''); ?> required name="sasaran">
                        <option value="">Pilih Sasaran</option>
                        <?php $__currentLoopData = $list_sasaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sasaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($key, ['1', '2'])): ?>
                                <option value="<?php echo e($key); ?>" <?php echo e(selected($key, $suplemen->sasaran)); ?>><?php echo e($sasaran); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nama">Nama Data Suplemen</label>
                <div class="col-sm-9">
                    <input class="form-control input-sm required" placeholder="Nama Data Suplemen" type="text" name="nama" value="<?php echo e($suplemen->nama); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="keterangan">Keterangan</label>
                <div class="col-sm-9">
                    <textarea name="keterangan" class="form-control input-sm" maxlength="300" placeholder="Keterangan" rows="3" style="resize:none;"><?php echo e($suplemen->keterangan); ?></textarea>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/suplemen/form.blade.php ENDPATH**/ ?>