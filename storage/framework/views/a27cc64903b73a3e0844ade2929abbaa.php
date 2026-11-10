<?php echo $__env->make('admin.layouts.components.form_modal_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form action="<?php echo e($form_action); ?>" method="post" id="validasi">
    <div class='modal-body'>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="tabel2" class="table table-bordered dataTable table-hover nowrap">
                                <thead class="bg-gray disabled color-palette">
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Hubungan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($data->nik); ?></td>
                                            <td><?php echo e($data->nama); ?></td>
                                            <td><?php echo e(\App\Enums\SHDKEnum::valueOf($data->kk_level)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nik">NIK / Nama Penduduk (dari penduduk yang tidak memiliki No. KK)</label>
                            <?php if(!$penduduk->isEmpty()): ?>
                                <select class="form-control input-sm select2 required" id="nik" name="nik" style="width:100%;">
                                    <option option value="">-- Silakan Cari NIK / Nama Penduduk --</option>
                                    <?php $__currentLoopData = $penduduk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>">NIK
                                            :<?php echo e($data->nik . ' - ' . $data->nama); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            <?php else: ?>
                                <div class="alert alert-danger" role="alert">
                                    <p>Tidak ada penduduk 'lepas' yang bukan anggota Keluarga. Silakan masukkan dulu
                                        data
                                        penduduk yang akan ditambahkan atau pecahkan dari KK yang ada. Pastikan penduduk
                                        tersebut tidak diisi data nomor KK-nya.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if(!$penduduk->isEmpty()): ?>
                            <div class="form-group">
                                <label for="kk_level">Hubungan Keluarga</label>
                                <select class="form-control input-sm select2 required" id="kk_level" name="kk_level" style="width:100%;">
                                    <option option value="">-- Silakan Cari Hubungan Keluarga --</option>
                                    <?php $__currentLoopData = $hubungan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
            <?php if(!$penduduk->isEmpty()): ?>
                <button type="submit" class="btn btn-social btn-info btn-sm" id="ok"><i class='fa fa-check'></i> Simpan</button>
            <?php endif; ?>
        </div>
    </div>
</form>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/penduduk/keluarga/modal/ajax_add_anggota_form.blade.php ENDPATH**/ ?>