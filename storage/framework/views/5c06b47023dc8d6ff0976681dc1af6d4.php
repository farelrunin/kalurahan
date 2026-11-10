<form action="<?php echo e($form_action); ?>" method="post" target="_blank" id="validasi">
    <div class='modal-body'>
        <p>
            Ekspor data dan dokumen informasi publik untuk diimpor ke aplikasi di tingkat supra-desa, seperti PPID kabupaten atau ke aplikasi OpenDK
        </p>
        <?php if($log_semua): ?>
            <p>
                Ekspor lengkap terakhir pada <?php echo e(tgl_indo_out($log_semua->tgl_ekspor)); ?> dengan total data <?php echo e($log_semua->total); ?>.
            </p>
        <?php endif; ?>
        <?php if($log_perubahan): ?>
            <p>
                Ekspor perubahan terakhir pada <?php echo e(tgl_indo_out($log_perubahan->tgl_ekspor)); ?> dengan total data <?php echo e($log_perubahan->total); ?>.
            </p>
        <?php endif; ?>
        <div class="form-group">
            <label class="control-label">Data untuk diekspor</label>
            <select class="form-control input-sm select2 required" name="data_ekspor" id="data_ekspor">>
                <option value="">Pilih data untuk diekspor</option>
                <option value="1">Semua</option>
                <?php if($log_semua): ?>
                    <option value="2">Perubahan saja</option>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group" id="tanggal_dari" style="display: none;">
            <label class="control-label">Perubahan sejak tanggal</label>
            <div class="input-group input-group-sm date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control input-sm pull-right tgl" name="tgl_dari" type="text" value="">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php echo batal(); ?>

        <button type="submit" class="btn btn-social btn-info btn-sm" id="btn-ok">
            <i class='fa fa-download'></i> Unduh
        </button>
    </div>
</form>
<?php echo $__env->make('admin.layouts.components.form_modal_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    $('document').ready(function() {
        $("#data_ekspor").change(function(e) {
            e.preventDefault();
            var tgl_dari = $("input[name='tgl_dari']");
            if ($(this).val() == '2') {
                $('#tanggal_dari').show();
                tgl_dari.addClass('required');
            } else {
                $('#tanggal_dari').hide();
                tgl_dari.removeClass('required');
            }
        });

        $('#validasi').submit(function(e) {
            if ($('#validasi').valid())
                $('#modalBox').modal('hide');
        });
        $('.tgl').data('DateTimePicker').date('<?php echo e(date('d/m/Y H:i:s', strtotime($log_perubahan ? $log_perubahan->tgl_ekspor : $log_semua->tgl_ekspor))); ?>');
    });
</script>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/dokumen/informasi_publik/ekspor.blade.php ENDPATH**/ ?>