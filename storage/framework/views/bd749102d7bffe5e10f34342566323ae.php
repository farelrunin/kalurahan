<?php echo $__env->make('admin.layouts.components.form_modal_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form action="<?php echo e($form_action); ?>" method="post" id="validasi">
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nik_kepala">Kepala Keluarga (dari penduduk yang tidak memiliki No. KK)</label>
                            <?php if($penduduk): ?>
                                <select class="form-control input-sm required select2" id="nik_kepala" name="nik_kepala" style="width:100%;">
                                    <option value="">-- Silakan Cari NIK / Nama Kepala Keluarga --</option>
                                    <?php $__currentLoopData = $penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data['id']); ?>">NIK
                                            :<?php echo e($data['nik'] . ' - ' . $data['nama']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <div class="alert alert-danger" role="alert">
                                    <p>Tidak ada penduduk 'lepas' yang bukan anggota Keluarga. Silakan masukkan dulu
                                        data penduduk yang akan ditambahkan atau pecahkan dari KK yang ada. Pastikan
                                        penduduk tersebut tidak diisi data nomor KK-nya.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if($penduduk): ?>
                            <div class="form-group">
                                <label for="nik_kepala">Nomor Kartu Keluarga (KK) <code id="tampil_nokk" style="display: none;"> (Sementara) </code> </label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon">
                                        <input type="checkbox" title="Centang jika belum memiliki No. KK" id="nokk_sementara">
                                    </span>
                                    <input id="no_kk" name="no_kk" class="form-control input-sm required no_kk" type="text" placeholder="Nomor KK"></input>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-social btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
        <?php if($penduduk): ?>
            <button type="submit" class="btn btn-social btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
        <?php endif; ?>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nokk_sementara').change(function() {
            var nokk_sementara_berikut = '<?php echo e($nokk_sementara); ?>';
            var nokk_asli = '<?php echo e($no_kk); ?>';

            if ($('#nokk_sementara').prop('checked')) {
                $('#no_kk').removeClass('no_kk');
                $('#no_kk').val(nokk_sementara_berikut);
                $('#no_kk').prop('readonly', true);
                $('#tampil_nokk').show();
            } else {
                $('#no_kk').addClass('no_kk');
                $('#no_kk').val(nokk_asli);
                $('#no_kk').prop('readonly', false);
                $('#tampil_nokk').hide();
            }
        });

        $('#nokk_sementara').change();

    });
</script>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/penduduk/keluarga/modal/ajax_add_keluarga.blade.php ENDPATH**/ ?>