<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        <h1>Widget</h1>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('web_widget')); ?>"> Widget</a></li>
    <li class="active"><?php echo e($aksi); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo form_open_multipart($form_action, 'class="form-horizontal" id="validasi"'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="<?php echo e(ci_route('web_widget')); ?>" class="btn btn-social  btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Widget">
                        <i class="fa fa-arrow-circle-left "></i>Kembali Ke Widget
                    </a>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="judul">Judul Widget</label>
                        <div class="col-sm-6">
                            <input id="judul" name="judul" class="form-control input-sm strip_tags judul required" type="text" placeholder="Judul Widget" value="<?php echo e($widget['judul']); ?>"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="judul">Gambar Widget</label>
                        <div class="col-sm-6">
                            <?php if(is_file(LOKASI_GAMBAR_WIDGET . $widget['foto'])): ?>
                                <img class="img-responsive" src="<?php echo e(to_base64(LOKASI_GAMBAR_WIDGET . $widget['foto'])); ?>" alt="Gambar Utama Widget">
                            <?php else: ?>
                                <img class="img-responsive" src="<?php echo e(to_base64('assets/images/404-image-not-found.jpg')); ?>" alt="Gambar Utama Widget" />
                            <?php endif; ?>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="file_path">
                                <input type="file" class="hidden" id="file" name="foto" accept=".jpg,.jpeg,.png,.gif">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info " id="file_browser"><i class="fa fa-search"></i></button>
                                </span>
                                <span class="input-group-addon" style="background-color: red; border: 1px solid #ccc;">
                                    <input type="checkbox" title="Centang Untuk Hapus Gambar" name="hapus_foto" value="hapus">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="jenis">Jenis Widget</label>
                        <div class="col-sm-6">
                            <select id="jenis_widget" name="jenis_widget" class="form-control input-sm select2 required">
                                <option value="">-- Pilih Jenis Widget --</option>
                                <option value="2" <?= ($widget['jenis_widget'] === 2) ? 'selected' : ''; ?>>Statis</option>
                                <option value="3" <?= ($widget['jenis_widget'] === 3) ? 'selected' : ''; ?>>Dinamis</option>
                            </select>
                        </div>
                    </div>
                    <?php
                        if ($widget['jenis_widget'] && $widget['jenis_widget'] !== 1 && $widget['jenis_widget'] !== 2) {
                            $dinamis = true;
                        }
                    ?>

                    <div id="dinamis" class="form-group" <?php if(!$dinamis): ?> style="display:none;" <?php endif; ?>>
                        <label class="col-sm-3 control-label" for="isi-dinamis">Kode Widget</label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;height:150px;" id="isi-dinamis" name="isi-dinamis" class="form-control input-sm required" placeholder="Kode Widget"><?php echo e($widget['isi']); ?></textarea>
                        </div>
                    </div>
                    <?php
                        if ($widget['jenis_widget'] && $widget['jenis_widget'] === 2) {
                            $statis = true;
                        }
                    ?>
                    <div id="statis" class="form-group">
                        <label class="col-sm-3 control-label" for="isi-statis">Nama File Widget (.php)</label>
                        <div class="col-sm-6">
                            <?php if($list_widget): ?>
                                <select id="isi-statis" name="isi-statis" class="form-control input-sm select2 required">
                                    <option value="">-- Pilih Widget --</option>
                                    <?php $__currentLoopData = $list_widget; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($list); ?>" <?php echo e(selected($list, $widget['isi'])); ?>>
                                            <?php echo e($list); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <span class="help-block"><code>Widget tidak tersedia atau sudah ditambahkan semua (desa/widgets atau desa/themes/nama_tema/widgets)</code></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class='box-footer'>
                    <button type='reset' class='btn btn-social  btn-danger btn-sm'><i class='fa fa-times'></i>
                        Batal</button>
                    <button type='submit' class='btn btn-social  btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#jenis_widget").change(function() {
                var selectedValue = $(this).val();
                var dinamis = $("#dinamis");
                var statis = $("#statis");
                var isiStatisInput = $("#isi-statis");
                var isiDinamisInput = $("#isi-dinamis");

                if (selectedValue == 2) {
                    dinamis.hide();
                    statis.show();
                    isiStatisInput.addClass("required");
                    isiDinamisInput.removeClass("required");
                } else if (selectedValue == 3) {
                    dinamis.show();
                    statis.hide();
                    isiStatisInput.removeClass("required");
                    isiDinamisInput.addClass("required");
                } else {
                    dinamis.hide();
                    statis.hide();
                    isiStatisInput.removeClass("required");
                    isiDinamisInput.removeClass("required");
                }
            });

            $("#jenis_widget").trigger("change");
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/web/widget/form.blade.php ENDPATH**/ ?>