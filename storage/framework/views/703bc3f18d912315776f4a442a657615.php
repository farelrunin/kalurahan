<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Komentar
        <small><?php echo e($komentar ? 'Ubah' : 'Tambah'); ?> Komentar</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('komentar')); ?>"> Daftar Komentar</a></li>
    <li class="active"><?php echo e($komentar ? 'Ubah' : 'Tambah'); ?> Komentar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="validasi" action="<?php echo e($form_action); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <a href="<?php echo e(site_url('komentar')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Artikel">
                            <i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Komentar
                        </a>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="owner">Pengirim</label>
                            <div class="col-sm-9">
                                <input name="owner" class="form-control input-sm required" type="text" maxlength="50" value="<?php echo e($komentar['owner']); ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="no_hp">No. HP</label>
                            <div class="col-sm-9">
                                <input name="no_hp" class="form-control input-sm required bilangan" type="text" value="<?php echo e($komentar['no_hp']); ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email</label>
                            <div class="col-sm-9">
                                <input name="email" class="form-control input-sm email" type="text" value="<?php echo e($komentar['email']); ?>"></input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="komentar">Komentar</label>
                            <div class="col-sm-9">
                                <textarea id="komentar" name="komentar" class="form-control input-sm required" placeholder="Isi Komentar" style="height: 200px;"><?php echo e($komentar['komentar']); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-12 col-sm-2 col-lg-2 control-label" for="status">Status</label>
                            <div class="btn-group col-xs-12 col-sm-9" data-toggle="buttons">
                                <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?= ($komentar['status'] == '1' || $komentar['status'] == null) ? 'active' : ''; ?>">
                                    <input
                                        id="sx1"
                                        type="radio"
                                        name="status"
                                        class="form-check-input"
                                        type="radio"
                                        value="1"
                                        <?= ($komentar['status'] == '1' || $komentar['status'] == null) ? 'selected' : ''; ?>
                                        autocomplete="off"
                                    > Aktif
                                </label>
                                <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-4 col-lg-2 form-check-label <?= ($komentar['status'] == '2') ? 'active' : ''; ?>">
                                    <input
                                        id="sx2"
                                        type="radio"
                                        name="status"
                                        class="form-check-input"
                                        type="radio"
                                        value="2"
                                        <?= ($komentar['status'] == '2') ? 'selected' : ''; ?>
                                        autocomplete="off"
                                    > Tidak Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class='box-footer'>
                        <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i>Batal</button>
                        <button type='submit' class='btn btn-social btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/komentar/form.blade.php ENDPATH**/ ?>