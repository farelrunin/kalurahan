<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>Pengaturan
        <?php echo e($kat_nama); ?> Di
        <?php echo e(ucwords(setting('sebutan_desa'))); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="#" onclick="window.history.back()"> Daftar
            <?php echo e($kat_nama); ?>

        </a></li>
    <li class="active">Pengaturan
        <?php echo e($kat_nama); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <?php echo form_open_multipart($form_action, 'class="form-horizontal" id="validasi"'); ?>

        <div class="box-header with-border">
            <a href="#" onclick="window.history.back()" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Artikel">
                <i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar
                <?php echo e($kat_nama); ?> Di
                <?php echo e(ucwords(setting('sebutan_desa'))); ?>

            </a>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Judul Dokumen</label>
                <div class="col-sm-6">
                    <input name="nama" class="form-control input-sm nomor_sk required" type="text" maxlength="200" value="<?php echo e($dokumen['nama']); ?>"></input>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4" for="nama">Tipe Dokumen</label>
                <div class="col-sm-6">
                    <select name="tipe" id="tipe" class="form-control input-sm required">
                        <option value="1" <?= ($dokumen['tipe'] == 1) ? 'selected' : ''; ?>>File</option>
                        <option value="2" <?= ($dokumen['tipe'] == 2) ? 'selected' : ''; ?>>URL</option>
                    </select>
                </div>
            </div>
            <div id="d-dokumen" style="display: <?php echo e($dokumen['tipe'] == 2 ? 'none' : ''); ?>;">
                <?php if($dokumen['satuan']): ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Dokumen</label>
                        <div class="col-sm-4">
                            <i class="fa fa-file-pdf-o pop-up-pdf" aria-hidden="true" style="font-size: 60px;" data-title="Berkas <?php echo e($dokumen['nomor_surat']); ?>" data-url="<?php echo e(ci_route('dokumen.tampilkan_berkas', [$dokumen['id'], 0, 1])); ?>"></i>

                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="upload">Unggah Dokumen</label>
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control <?php echo e($dokumen['tipe'] == 2 || $dokumen['tipe'] ? '' : 'required'); ?>" id="file_path" name="satuan">
                            <input id="file" type="file" class="hidden" name="satuan" accept=".jpg,.jpeg,.png,.pdf" />
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info" id="file_browser"><i class="fa fa-search"></i>
                                    Browse</button>
                            </span>
                        </div>
                        <?php if($dokumen): ?>
                            <p class="small">(Kosongkan jika tidak ingin mengubah dokumen)</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nama">Kategori Informasi Publik</label>
                    <div class="col-sm-6">
                        <select name="kategori_info_publik" class="form-control select2 input-sm required">
                            <option value="">Pilih Kategori Informasi Publik</option>
                            <?php $__currentLoopData = $list_kategori_publik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?= ($dokumen['kategori_info_publik'] == $key) ? 'selected' : ''; ?>><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="nama">Tahun</label>
                    <div class="col-sm-6">
                        <input name="tahun" maxlength="4" class="form-control input-sm number required" type="text" placeholder="Contoh: 2019" value="<?= $dokumen['tahun'] ?>"></input>
                    </div>
                </div>
            </div>
            <div id="d-url" class="form-group" style="display: <?php echo e($dokumen['tipe'] == 2 ? '' : 'none'); ?>;">
                <label class="control-label col-sm-4" for="nama">Link/URL Dokumen</label>
                <div class="col-sm-6">
                    <input id="url" name="url" class="form-control input-sm <?php echo e($dokumen['tipe'] == 2 ? 'required' : ''); ?>" type="text" value="<?php echo e($dokumen['url']); ?>"></input>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <?php echo batal(); ?>

            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                Simpan</button>
        </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#tipe').on('change', function() {
            if (this.value == 1) {
                $('#d-dokumen').show();
                $('#d-url').hide();
                $("#file_path").addClass("required");
                $("#url").removeClass("required");
            } else {
                $('#d-dokumen').hide();
                $('#d-url').show();
                $("#file_path").removeClass("required");
                $("#url").addClass("required");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/dokumen/informasi_publik/form.blade.php ENDPATH**/ ?>