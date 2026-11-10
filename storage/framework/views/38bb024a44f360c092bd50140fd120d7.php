<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap-datepicker.min.css')); ?>">

<form id="validasi" action="<?php echo e($formAction); ?>" method="post" target="_blank">
    <div class="modal-body">
        <input type="hidden" name="params" value="">
        <div class="form-group">
            <label class="control-label">Tanggal Cetak</label>
            <div class="input-group input-group-sm date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control input-sm pull-right required" id="tgl_1" name="tgl_cetak" type="text" value="<?php echo e(date('d-m-Y')); ?>">
            </div>
        </div>
        <?php if(isset($rekap) && $rekap == true): ?>
            <div class="form-group">
                <label for="tgl_cetak">Tampilkan Jumlah</label>
                <select class="form-control input-sm select2 required" id="tampil_jumlah" name="tampil_jumlah">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
        <?php else: ?>
            <label for="nama">Centang kotak berikut apabila NIK/No. KK ingin disensor</label>
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="1" name="privasi_nik">
                    <label class="form-check-label" for="cetak_privasi_nik">Sensor NIK/No. KK</label>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="modal-footer">
        <?php echo batal(); ?>

        <button type="submit" class="btn btn-social btn-info btn-sm" id="btn-ok">
            <?php if($aksi == 'cetak' || $aksi == 'pdf'): ?>
                <i class='fa fa-print'></i> Cetak
            <?php else: ?>
                <i class='fa fa-download'></i> Unduh
            <?php endif; ?>
        </button>
    </div>
</form>
<?php echo $__env->make('admin.layouts.components.validasi_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- moment js -->
<script src="<?php echo e(asset('bootstrap/js/moment.min.js')); ?>"></script>
<!-- bootstrap Date time picker -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('bootstrap/js/id.js')); ?>"></script>
<!-- bootstrap Date picker -->
<script src="<?php echo e(asset('bootstrap/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('bootstrap/js/bootstrap-datepicker.id.min.js')); ?>"></script>
<!-- Script-->
<script src="<?php echo e(asset('js/custom-datetimepicker.js')); ?>"></script>
<script type="text/javascript">
    $(function() {
        let _objParams = $('#tabeldata').DataTable().ajax.params()
        delete(_objParams.draw)
        delete(_objParams.search)
        $('input[name=params]').val(JSON.stringify(_objParams))
    });
</script>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/bumindes/penduduk/induk/dialog.blade.php ENDPATH**/ ?>