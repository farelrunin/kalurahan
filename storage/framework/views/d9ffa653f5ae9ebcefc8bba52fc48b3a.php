<form action="<?php echo e($form_action); ?>" method="post" id="validasi">
    <div class='modal-body'>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <select class="form-control input-sm required" id="kategori" name="kategori" style="width:100%;">
                                <option option value="">-- Pilih Kategori --</option>
                                <?php $__currentLoopData = $list_kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?= ($kategori_sekarang == $kategori['id']) ? 'selected' : ''; ?> value="<?php echo e($kategori['id']); ?>"><?php echo e($kategori['kategori']); ?></option>
                                    <?php $__currentLoopData = $kategori['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?= ($kategori_sekarang == $sub_kategori['id']) ? 'selected' : ''; ?> value="<?php echo e($sub_kategori['id']); ?>">&emsp;<?php echo e($sub_kategori['kategori']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?php echo batal(); ?>

            <button type="submit" class="btn btn-social btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
        </div>
    </div>
</form>
<?php echo $__env->make('admin.layouts.components.form_modal_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/web/artikel/ajax_ubah_kategori_form.blade.php ENDPATH**/ ?>