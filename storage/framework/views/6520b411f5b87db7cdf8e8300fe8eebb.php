<?php echo $__env->make('admin.layouts.components.datetime_picker', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="form-left vertical-align">
    <div class="row text-center">
        <div class="col-xm-12 col-sm-12">
            <img src="<?php echo e(gambar_desa($desa['logo'])); ?>" alt="Lambang Desa" class="img-responsive center-block" />
        </div>
        <div class="col-xm-12 col-sm-12">
            <div class="col-sm-1"></div>
            <div class="text-ceter col-sm-10">
                <h1>Aplikasi Rekam Kehadiran Perangkat <?php echo e(ucwords($setting->sebutan_desa)); ?></h1>
                <h5>IP Address : <?php echo e($ip_address); ?></h5>
                <?php if($mac_address): ?>
                    <h5> MAC Address : <?php echo e($mac_address); ?></h5>
                <?php endif; ?>
                <h5>ID Pengunjung : <span id="pengunjung"></span>&nbsp;<span><a href="#" class="copy" title="Copy" style="color: white"><i class="fa fa-copy"></i></a></span></h5>
            </div>
        </div>
        <div class="col-xm-12 col-sm-2"></div>
    </div>
    <div class="callout">
        <h4> <?php echo e(ucwords($setting->sebutan_desa . ' ' . $desa['nama_desa'])); ?>

        </h4>
        <p> <?php echo e(ucwords($setting->sebutan_kecamatan . ' ' . $desa['nama_kecamatan'])); ?>

        </p>
    </div>

    <div class="jam">
        <div class="row text-center" style="margin-top: 10%; margin-right: 10px;margin-left: 10px;">
            <div class="col-sm-12" style="background-color:#289DA5">
                <h4 style="margin: 10px 0px; color:white"><?php echo e(date('F Y')); ?></h4>
            </div>
            <div class="col-sm-12" style="background-color:#E7E7E7">
                <h1 style="margin: 10px 0px; color:#505050"><?php echo e(date('d')); ?></h1>
            </div>
        </div>

        <div class="row text-center" style="margin-top: 10%; margin-right: 10px;margin-left: 10px;">
            <div class="col-sm-12" style="background-color:#E7E7E7">
                <h3 style="margin: 10px 0px; color:#505050" id="jam"> </h3>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('admin.layouts.components.konfirmasi_cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.aktifkan_cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('js/id_browser.js')); ?>"></script>
    <script>
        $(function() {
            // Refrensi https://www.w3schools.com/js/tryit.asp?filename=tryjs_timing_clock
            function startTime() {
                const today = moment();
                let h = today.hours();
                let m = today.minutes();
                let s = today.seconds();
                m = checkTime(m);
                s = checkTime(s);
                $('#jam').html(h + ":" + m + ":" + s);
                setTimeout(startTime, 1000);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i
                }; // add zero in front of numbers < 10
                return i;
            }
            startTime();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/kehadiran/left.blade.php ENDPATH**/ ?>