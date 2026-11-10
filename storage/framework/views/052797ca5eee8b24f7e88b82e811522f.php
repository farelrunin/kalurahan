<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Biodata Anggota Keluarga
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('keluarga')); ?>"> Daftar Keluarga</a></li>
    <li class="active">Biodata Anggota Keluarga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="">
        <form id="mainform" name="mainform" action="<?php echo e($form_action); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <?php echo $__env->make('admin.layouts.components.ambil_foto', [
                        'id_sex' => $penduduk['id_sex'],
                        'foto' => $penduduk['foto'],
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class='box box-primary'>
                                <div class="box-header with-border">
                                    <a href="<?php echo e(ci_route('keluarga')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Keluarga">
                                        <i class="fa fa-arrow-circle-left"></i>Kembali Ke Daftar Keluarga
                                    </a>
                                    <a href="<?php echo e(ci_route("keluarga.anggota.{$id_kk}")); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Keluarga">
                                        <i class="fa fa-arrow-circle-left"></i>Kembali Ke Daftar Anggota Keluarga
                                    </a>
                                </div>
                                <div class='box-body'>
                                    <div class="row">
                                        <div class='col-sm-12'>
                                            <div class="form-group subtitle_head">
                                                <label class="text-right"><strong>DATA KELUARGA :</strong></label>
                                            </div>
                                        </div>
                                        <div class='col-sm-4'>
                                            <div class='form-group'>
                                                <label>No. KK </label>
                                                <input class="form-control input-sm" name="no_kk_keluarga" type="text" value="<?php echo e($kk['no_kk']); ?>" readonly></input>
                                                <input name="id_kk" type="hidden" value="<?php echo e($id_kk); ?>" id="id_kk">
                                                <input name="kk_level" type="hidden" value="0">
                                                <input name="jenis_peristiwa" type="hidden" value="<?php echo e($jenis_peristiwa); ?>">
                                                <input name="id_cluster" type="hidden" value="<?php echo e($kk['id_cluster']); ?>">
                                            </div>
                                        </div>
                                        <div class='col-sm-8'>
                                            <div class='form-group'>
                                                <label>Kepala KK</label>
                                                <input class="form-control input-sm" type="text" value="<?php echo e($kk['nama']); ?>" disabled></input>
                                            </div>
                                        </div>
                                        <div class='col-sm-12'>
                                            <div class='form-group'>
                                                <label>Alamat </label>
                                                <input class="form-control input-sm" type="text" value="<?php echo e($kk['alamat']); ?> Dusun <?php echo e($kk['dusun']); ?> - RW <?php echo e($kk['rw']); ?> - RT <?php echo e($kk['rt']); ?>" disabled></input>
                                            </div>
                                        </div>
                                        <div class='col-sm-12'>
                                            <div class="form-group subtitle_head">
                                                <label class="text-right"><strong>DATA ANGGOTA :</strong></label>
                                            </div>
                                        </div>
                                        <div class='col-sm-12'>
                                            <?php echo $__env->make('admin.penduduk.penduduk_form_isian_bersama', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='box-footer'>
                                    <div class='col-xs-12'>
                                        <?php echo batal(); ?>

                                        <button type='submit' class='btn btn-social btn-info btn-sm pull-right'><i class='fa fa-check'></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/penduduk/keluarga/anggota/form.blade.php ENDPATH**/ ?>