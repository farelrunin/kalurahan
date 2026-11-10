<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php
    $tipe = ucfirst($ci->controller);
?>

<?php $__env->startSection('title'); ?>
    <h1>
        Pengelolaan <?php echo e($tipe); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Pengelolaan <?php echo e($tipe); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <a href="<?php echo e(site_url("{$ci->controller}/form")); ?>" title="Tambah" class="btn btn-social bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    <?php endif; ?>
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus" onclick="deleteAllBox('mainform','<?php echo e(site_url("{$ci->controller}/delete_all")); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(site_url("{$ci->controller}/dialog/cetak")); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="<?php echo e(site_url("{$ci->controller}/dialog/unduh")); ?>" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
                            class="fa fa-download"
                        ></i> Unduh</a>
                    <a href="<?php echo e(site_url("{$ci->controller}_master")); ?>" class="btn btn-social bg-orange btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kategori">
                        <i class="fa fa fa-list"></i>Kategori
                    </a>
                    <a href="<?php echo e(site_url("{$ci->controller}/clear")); ?>" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-refresh"></i>Bersihkan</a>
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="status_dasar" class="form-control input-sm select2" name="status_dasar">
                                <option value="">Pilih Status</option>
                                <option value="1" selected>Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select id="filter" class="form-control input-sm select2" name="filter">
                                <option value="">Pilih Kategori <?php echo e($tipe); ?></option>
                                <?php $__currentLoopData = $list_master; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->kelompok); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <hr class="batas">
                    <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                            <thead class="bg-gray">
                                <tr>
                                    <th class="padat"><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">No</th>
                                    <th class="aksi">Aksi</th>
                                    <th class="padat">Kode <?php echo e($tipe); ?></th>
                                    <th>Nama <?php echo e($tipe); ?></th>
                                    <th class="padat">Ketua <?php echo e($tipe); ?></th>
                                    <th class="padat">Kategori <?php echo e($tipe); ?></th>
                                    <th class="padat">Jumlah Anggota <?php echo e($tipe); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e($ci->controller); ?>",
                    data: function(req) {
                        req.status_dasar = $('#status_dasar').val();
                        req.filter = $('#filter').val();
                    }
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
                        data: 'kode',
                        name: 'kode',
                        class: 'padat',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'nama',
                        name: 'kelompok.nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'ketua.nama',
                        name: 'ketua.nama',
                        class: 'padat',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kelompok_master.kelompok',
                        name: 'kelompokMaster.kelompok',
                        class: 'padat',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jml_anggota',
                        name: 'jml_anggota',
                        class: 'padat',
                        searchable: false,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'asc']
                ],
                pageLength: 25,
                createdRow: function(row, data, dataIndex) {
                    if (data.jenis == 0 || data.jenis == 1) {
                        $(row).addClass('select-row');
                    }
                }
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            $('#status_dasar').on('select2:select', function(e) {
                TableData.draw();
            });
            $('#filter').on('select2:select', function(e) {
                TableData.draw();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/kelompok/index.blade.php ENDPATH**/ ?>