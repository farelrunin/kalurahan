<?php $__env->startPush('css'); ?>
    <style>
        .no-wrap {
            text-wrap: nowrap;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Data <?php echo e($tipe); ?>

        <?php echo e(ucwords($kelompok['nama'])); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(site_url($controller)); ?>"> Daftar <?php echo e($tipe); ?></a></li>
    <li class="active">
        <?php echo e(ucwords($kelompok['nama'])); ?>

    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <?php if(can('u')): ?>
                        <div class="btn-group btn-group-vertical">
                            <a class="btn btn-social btn-success btn-sm" data-toggle="dropdown"><i class='fa fa-plus'></i> Tambah
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(site_url($controller . '/aksi/1/' . $kelompok['id'])); ?>" class="btn btn-social
                                btn-block btn-sm" title="Tambah Satu Anggota <?php echo e($tipe); ?>"><i class="fa fa-plus"></i> Tambah Satu Anggota <?php echo e($tipe); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(site_url($controller . '/aksi/2/' . $kelompok['id'])); ?>" class="btn btn-social
                                btn-block btn-sm" title="Tambah Beberapa Anggota <?php echo e($tipe); ?>"><i class="fa fa-plus"></i> Tambah Beberapa Anggota <?php echo e($tipe); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if(can('h')): ?>
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?php echo e(route("{$controller}.delete_all", $kelompok['id'])); ?>')"
                            class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                        >
                            <i class='fa fa-trash-o'></i> Hapus
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(site_url("{$controller}/dialog/cetak/{$kelompok['id']}")); ?>" class="btn btn-social
                    bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block
                    visible-lg-inline-block" data-remote="false" data-toggle="modal"
                        data-target="#modalBox" data-title="Cetak Daftar Anggota
                    <?php echo e(ucwords($kelompok['nama'])); ?>"
                    ><i class="fa fa-print"></i> Cetak
                    </a>
                    <a href="<?php echo e(site_url("{$controller}/dialog/unduh/{$kelompok['id']}")); ?>" class="btn btn-social
                    bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block
                    visible-lg-inline-block" data-remote="false" data-toggle="modal"
                        data-target="#modalBox" data-title="Unduh Daftar Anggota
                    <?php echo e(ucwords($kelompok['nama'])); ?>"
                    ><i class="fa fa-download"></i> Unduh
                    </a>
                    <a href="<?php echo e(site_url(strtolower($tipe))); ?>" class="btn btn-social btn-info btn-sm visible-xs-block
                    visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left "></i> Kembali Ke Daftar
                        <?php echo e($tipe); ?>

                    </a>
                </div>
                <div class="box-body">
                    <h5><b>Rincian <?php echo e($tipe); ?></b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tabel-rincian">
                            <tbody>
                                <tr>
                                    <td width="20%">Kode <?php echo e($tipe); ?></td>
                                    <td width="1">:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['kode'])); ?>

                                    </td>
                                    <td class="padat" rowspan="5">
                                        <img src="<?php echo e(base_url(LOKASI_LOGO_DESA . $kelompok['logo'])); ?>" class="img-thumbnail" alt="Logo <?php echo e($tipe); ?>" style="max-width: 150px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama <?php echo e($tipe); ?>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['nama'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Ketua <?php echo e($tipe); ?>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['nama_ketua'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Kategori <?php echo e($tipe); ?>

                                    </td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e(strtoupper($kelompok['kategori'])); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>
                                        <?php echo e($kelompok['keterangan']); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="margin-bottom: 5px;">
                <div class="box-body">
                    <h5><b>Anggota <?php echo e($tipe); ?></b></h5>
                    <hr>
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <form id="mainform" name="mainform" method="post">
                            <div class="table-responsive dataTables_wrapper">
                                <table class="table table-bordered table-striped dataTable table-hover tabel-daftar" id="tabeldata">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th><input type="checkbox" id="checkall" /></th>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Foto</th>
                                            <th>No. Anggota</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat / Tanggal Lahir</th>
                                            <th>Umur (Tahun)</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Jabatan</th>
                                            <th>Nomor SK Jabatan</th>
                                            <?php if($tipe == 'Lembaga'): ?>
                                                <th>Nomor SK Pengangkatan</th>
                                                <th>Tanggal SK Pengangkatan</th>
                                                <th>Tanggal SK Pengangkatan</th>
                                                <th>Nomor SK Pemberhentian</th>
                                                <th>Tanggal SK Pemberhentian</th>
                                                <th>Masa Jabatan (Usia/Periode)</th>
                                            <?php endif; ?>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('admin.layouts.components.konfirmasi_hapus', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: `<?php echo e(route($controller . '.datatables')); ?>`,
                    data: function(req) {
                        req.id_kelompok = '<?php echo e($kelompok['id']); ?>';
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
                        data: 'foto',
                        name: 'foto',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'no_anggota',
                        name: 'no_anggota',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'anggota.nik',
                        name: 'anggota.nik',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'anggota.nama',
                        name: 'anggota.nama',
                        class: 'no-wrap',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'tanggallahir',
                        name: 'tanggallahir',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'umur',
                        name: 'umur',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'jk',
                        name: 'jk',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'anggota.alamat_wilayah',
                        name: 'anggota.alamat_wilayah',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'no_sk_jabatan',
                        name: 'no_sk_jabatan',
                        searchable: false,
                        orderable: false
                    },
                    <?php if($tipe == 'Lembaga'): ?>
                        {
                            data: 'nmr_sk_pengangkatan',
                            name: 'nmr_sk_pengangkatan',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'tgl_sk_pengangkatan',
                            name: 'tgl_sk_pengangkatan',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'tgl_sk_pengangkatan',
                            name: 'tgl_sk_pengangkatan',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'nmr_sk_pemberhentian',
                            name: 'nmr_sk_pemberhentian',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'tgl_sk_pemberhentian',
                            name: 'tgl_sk_pemberhentian',
                            searchable: false,
                            orderable: false
                        }, {
                            data: 'periode',
                            name: 'periode',
                            searchable: false,
                            orderable: false
                        },
                    <?php endif; ?> {
                        data: 'keterangan',
                        name: 'keterangan',
                        searchable: true,
                        orderable: false
                    },
                ],
                order: [
                    // [6, 'asc']
                ],
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/kelompok/anggota/index.blade.php ENDPATH**/ ?>