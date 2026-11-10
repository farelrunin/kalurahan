<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title'); ?>
    <h1>
        Daftar Terdata Suplemen
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Terdata Suplemen</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <div class="btn-group btn-group-vertical">
                    <a class="btn btn-social btn-flat btn-success btn-sm" data-toggle="dropdown"><i class='fa fa-plus'></i> Tambah</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="<?php echo e(site_url("suplemen/form_terdata/{$suplemen->id}/1")); ?>" class="btn btn-social btn-block btn-sm" title="Tambah Satu Data Warga"><i class="fa fa-plus"></i> Tambah Satu Data Warga</a>
                        </li>
                        <li>
                            <a href="<?php echo e(site_url("suplemen/form_terdata/{$suplemen->id}/2")); ?>" class="btn btn-social btn-block btn-sm" title="Tambah Beberapa Data Warga"><i class="fa fa-plus"></i> Tambah Beberapa Data Warga</a>
                        </li>
                    </ul>
                </div>
                <?php echo $__env->make('admin.layouts.components.tombol_cetak_unduh', [
                    'cetak' => "suplemen/dialog_daftar/{$suplemen->id}/cetak",
                    'unduh' => "suplemen/dialog_daftar/{$suplemen->id}/unduh",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('admin.layouts.components.tombol_impor_ekspor', [
                    'impor' => "suplemen/impor_data/{$suplemen->id}",
                    'ekspor' => "suplemen/ekspor/{$suplemen->id}",
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('suplemen.delete_all_terdata')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'
                    ></i> Hapus</a>
            <?php endif; ?>
            <?php if(can('u')): ?>
                <a href="<?php echo e(ci_route('suplemen')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Data Suplemen</a>
            <?php endif; ?>
        </div>
        <?php echo $__env->make('admin.suplemen.rincian', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <hr style="margin-bottom: 5px;">
        <div class="box-body">
            <h5><b>Daftar Terdata</b></h5>
            <div class="row mepet">
                <div class="col-sm-2">
                    <select class="form-control input-sm" id="sex" name="sex">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                </div>
                <?php echo $__env->make('admin.layouts.components.wilayah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <hr>
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">NO</th>
                            <th class="padat">AKSI</th>
                            <th><?php echo e($suplemen->sasaran == 1 ? 'NO.' : 'NIK'); ?> KK</th>
                            <th><?php echo e($suplemen->sasaran == 1 ? 'NIK PENDUDUK' : 'NO. KK'); ?></th>
                            <th><?php echo e($suplemen->sasaran == 1 ? 'NAMA PENDUDUK' : 'KEPALA KELUARGA'); ?></th>
                            <th>TEMPAT LAHIR</th>
                            <th>TANGGAL LAHIR</th>
                            <th>JENIS KELAMIN</th>
                            <th>ALAMAT</th>
                            <th>KETERANGAN</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.components.filter_wilayah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('suplemen.datatables_terdata')); ?>",
                    data: function(req) {
                        req.id = <?php echo e($suplemen->id); ?>;
                        req.sasaran = <?php echo e($suplemen->sasaran); ?>;
                        req.sex = $('#sex').val();
                        req.dusun = $('#dusun').val();
                        req.rw = $('#rw').val();
                        req.rt = $('#rt').val();
                    },
                },
                columns: [{
                        data: 'ceklist',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'terdata_info',
                        name: `<?php echo e($suplemen->sasaran == '1' ? 'tweb_keluarga.no_kk' : 'tweb_penduduk.nik'); ?>`,
                        orderable: true
                    },
                    {
                        data: 'terdata_plus',
                        name: `<?php echo e($suplemen->sasaran == '1' ? 'tweb_penduduk.nik' : 'tweb_keluarga.no_kk'); ?>`,
                        orderable: true
                    },
                    {
                        data: 'terdata_nama',
                        name: 'tweb_penduduk.nama',
                        orderable: true
                    },
                    {
                        data: 'tempatlahir',
                        name: 'tweb_penduduk.tempatlahir',
                        orderable: true
                    },
                    {
                        data: 'tanggallahir',
                        name: 'tanggallahir',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'sex',
                        name: 'sex',
                        searchable: false,
                        orderable: true,
                        class: 'padat'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        searchable: false,
                        orderable: false,
                        class: 'padat'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                        orderable: false,
                        class: 'padat'
                    },
                ],
                order: [
                    [3, 'asc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }

            $('#sex, #dusun, #rw, #rt').change(function() {
                TableData.draw()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/suplemen/detail.blade.php ENDPATH**/ ?>