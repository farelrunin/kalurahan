<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.aktifkan_cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row vertical-align" style="background-color: #ffffff">
        <div class="col-sm-8 hidden-xs" style="padding: 0px;">
            <?php echo $__env->make('kehadiran.left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-sm-4 col-xm-4">
            <div class="login-box">
                <div class="login-box-body">
                    <p class="login-logo"><b>Masuk Ke Aplikasi</b></p>
                    <div class="row">
                        <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php if($cek['status']): ?>
                        <?php echo form_open(ci_route('kehadiran.cek'), 'class="form-horizontal" id="validasi"'); ?>

                        <?php if($ektp): ?>
                            <div class="form-group thumbnail">
                                <img src="<?php echo e(asset('images/camera-scan.gif')); ?>" alt="scanner" class="center" style="width:30%">
                            </div>
                            <div class="form-group" style="<?php echo e(jecho(ENVIRONMENT == 'development', false, 'width: 0; overflow: hidden;')); ?>">
                                <input
                                    name="tag"
                                    id="tag"
                                    autocomplete="off"
                                    placeholder="Tempelkan e-KTP Pada Card Reader"
                                    class="form-control required number"
                                    type="password"
                                    onkeypress="if (event.keyCode == 13){$('#'+'validasi').attr('action', '<?php echo e(ci_route('kehadiran.cek-ektp')); ?>');$('#'+'validasi').submit();}"
                                >
                            </div>
                            <div class="form-group">
                                <a href="<?php echo e(ci_route('kehadiran.masuk')); ?>" class="btn btn-success btn-block btn-flat">MASUK DENGAN USERNAME/NIK</a>
                            </div>
                        <?php else: ?>
                            <div class="form-group has-feedback">
                                <input
                                    type="text"
                                    name="username"
                                    id="username"
                                    autocomplete="off"
                                    class="form-control"
                                    placeholder="Username / NIK"
                                    required
                                >
                                <span class="glyphicon glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    autocomplete="off"
                                    class="form-control"
                                    placeholder="Password"
                                    required
                                >
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block btn-flat">MASUK</button>
                                <a href="<?php echo e(ci_route('kehadiran.masuk-ektp')); ?>" class="btn btn-success btn-block btn-flat">MASUK DENGAN EKTP</a>
                            </div>
                        <?php endif; ?>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-danger">
                            <h4><i class="icon fa fa-ban"></i> <?php echo e($cek['judul']); ?></h4>
                            <?php echo e($cek['pesan']); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('document').ready(function() {
            var ektp = "<?php echo e($ektp); ?>";

            if (ektp) {
                $('#tag').focus();
            } else {
                $('#username').focus();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('kehadiran.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/kehadiran/masuk.blade.php ENDPATH**/ ?>