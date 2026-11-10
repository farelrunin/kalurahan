<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Daftar Anggota Keluarga
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(ci_route('keluarga')); ?>">Daftar Anggota Keluarga</a></li>
    <li class="active">Daftar Anggota Keluarga</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-social btn-success btn-sm" data-toggle="dropdown"><i class='fa fa-plus'></i> Tambah Anggota</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo e(ci_route('keluarga.form_peristiwa.1', $kk)); ?>" class="btn btn-social btn-block btn-sm" title="Anggota Keluarga Lahir"><i class="fa fa-plus"></i> Anggota Keluarga Lahir</a>
                        </li>
                        <li>
                            <a href="<?php echo e(ci_route('keluarga.form_peristiwa.5', $kk)); ?>" class="btn btn-social btn-block btn-sm" title="Anggota Keluarga Masuk"><i class="fa fa-plus"></i> Anggota Keluarga Masuk</a>
                        </li>
                        <li>
                            <a
                                href="<?php echo e(ci_route('keluarga.ajax_add_anggota', $kk)); ?>"
                                class="btn btn-social btn-block btn-sm"
                                title="Tambah Anggota Dari Penduduk Yang Sudah Ada"
                                data-remote="false"
                                data-toggle="modal"
                                data-target="#modalBox"
                                data-title="Tambah Anggota Keluarga"
                            ><i class="fa fa-plus"></i> Dari Penduduk Sudah Ada</a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            <a href="<?php echo e(ci_route('keluarga.kartu_keluarga', $kk)); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-book"></i> Kartu Keluarga</a>
            <a href="<?php echo e(ci_route('keluarga')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Keluarga"><i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Keluarga
            </a>
        </div>
        <div class="box-body">
            <h5><b>Rincian Keluarga</b></h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover tabel-rincian">
                    <tbody>
                        <tr>
                            <td width="20%">Nomor Kartu Keluarga (KK)</td>
                            <td width="1%">:</td>
                            <td><?php echo e($no_kk); ?></td>
                        </tr>
                        <tr>
                            <td>Kepala Keluarga</td>
                            <td>:</td>
                            <td><?php echo e($kepala_kk['nama']); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo e($kepala_kk['alamat_wilayah']); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo $program['programkerja'] ? anchor("peserta_bantuan/peserta/2/{$no_kk}", 'Program Bantuan', 'target="_blank"') : 'Program Bantuan'; ?>

                            </td>
                            <td>:</td>
                            <td>
                                <?php if($program['programkerja']): ?>
                                    <?php $__currentLoopData = $program['programkerja']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo anchor("peserta_bantuan/data_peserta/{$item['id']}", '<span class="label label-success">' . $item['bantuan']['nama'] . '</span>&nbsp;', 'target="_blank"'); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-body">
            <h5><b>Daftar Anggota Keluarga</b></h5>
            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <form id="mainform" name="mainform" method="post">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                            <thead class="bg-gray disabled color-palette">
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hubungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="padat"><?php echo e($key + 1); ?> </td>
                                        <td class="aksi">
                                            <?php if(can('u')): ?>
                                                <a href="<?php echo e(ci_route("penduduk.form.{$data['id']}")); ?>" class="btn bg-orange btn-sm" title="Ubah Biodata Penduduk"><i class="fa fa-edit"></i></a>
                                                <?php if($data['kk_level'] != 1): ?>
                                                    <a
                                                        href="#"
                                                        data-href="<?php echo e(ci_route('keluarga.delete_anggota.' . $kk, $data['id'])); ?>"
                                                        class="btn bg-purple btn-sm"
                                                        title="Pecah KK"
                                                        data-toggle="modal"
                                                        data-target="#confirm-status"
                                                        data-body="Apakah Anda yakin ingin memecah Data Keluarga ini?"
                                                    ><i class="fa fa-cut"></i></a>
                                                <?php endif; ?>
                                                <?php if($kepala_kk['status_dasar'] == 1): ?>
                                                    <a
                                                        href="<?php echo e(ci_route('keluarga.edit_anggota.' . $kk, $data['id'])); ?>"
                                                        data-remote="false"
                                                        data-toggle="modal"
                                                        data-target="#modalBox"
                                                        data-title="Ubah Hubungan Keluarga"
                                                        title="Ubah Hubungan Keluarga"
                                                        class="btn bg-navy btn-sm"
                                                    ><i class='fa fa-link'></i></a>
                                                <?php endif; ?>
                                                <?php if($data['kk_level'] != 1): ?>
                                                    <a
                                                        href="#"
                                                        data-href="<?php echo e(ci_route('keluarga.keluarkan_anggota.' . $kk, $data['id'])); ?>"
                                                        class="btn bg-maroon btn-sm"
                                                        title="Bukan anggota keluarga ini"
                                                        data-toggle="modal"
                                                        data-target="#confirm-status"
                                                        data-body="Apakah yakin akan dikeluarkan dari keluarga ini?"
                                                    ><i class="fa fa-times"></i></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($data['nik']); ?></td>
                                        <td nowrap width="45%"><?php echo e(strtoupper($data['nama'])); ?></td>
                                        <td nowrap><?php echo e(tgl_indo($data['tanggallahir'])); ?></td>
                                        <td><?php echo e($data['sex']); ?></td>
                                        <td nowrap><?php echo e($data['hubungan']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.layouts.components.konfirmasi', ['periksa_data' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/penduduk/keluarga/anggota/index.blade.php ENDPATH**/ ?>