<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(data_lengkap()): ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <a
                href="<?php echo e(ci_route('bumindes_penduduk_mutasi/dialog/cetak')); ?>"
                class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Cetak Buku Mutasi Penduduk Desa"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Cetak Buku Mutasi Penduduk Desa"
            ><i class="fa fa-print "></i> Cetak</a>
            <a
                href="<?php echo e(ci_route('bumindes_penduduk_mutasi/dialog/unduh')); ?>"
                class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Unduh Buku Mutasi Penduduk Desa"
                data-remote="false"
                data-toggle="modal"
                data-target="#modalBox"
                data-title="Unduh Buku Mutasi Penduduk Desa"
            ><i class="fa fa-download"></i> Unduh</a>
        </div>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="tahun" class="form-control input-sm select2">
                        <option value="">Pilih Tahun</option>
                        <?php $__currentLoopData = $tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?= ($value == date('Y')) ? 'selected' : ''; ?> value="<?php echo e($value); ?>"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <select id="bulan" class="form-control input-sm select2">
                        <option value="">Pilih Bulan</option>
                        <?php $__currentLoopData = bulan(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?= ($index == date('m')) ? 'selected' : ''; ?> value="<?php echo e($index); ?>"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr class="batas">
            <div class="table-responsive">
                <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                    <thead class="bg-gray color-palette">
                        <tr>
                            <th rowspan="2">Nomor Urut</th>
                            <th rowspan="2">Nama Lengkap / Panggilan</th>
                            <th colspan="2">Tempat & Tanggal Lahir</th>
                            <th rowspan="2">Jenis Kelamin</th>
                            <th rowspan="2">Kewarganegaraan</th>
                            <th colspan="2">Penambahan</th>
                            <th colspan="4">Pengurangan</th>
                            <th rowspan="2">Ket</th>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <th>Tanggal</th>
                            <th>Datang Dari</th>
                            <th>Tanggal</th>
                            <th>Pindah Ke</th>
                            <th>Tanggal</th>
                            <th>Meninggal</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <?php if($hapus > 0): ?>
                <hr class="batas">
                <div class="box-header with-border">
                    <div class="form-group">
                        <label class="col-sm-12 control-label">
                            <h5><strong>BUKU MUTASI PENDUDUK TERHAPUS</strong></h5>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Total Hapus</label>
                        <div class="col-sm-9">
                            <p class="text-muted">: <?php echo e($hapus); ?></p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover tabel-daftar" id="tabeldatahapus">
                        <thead class="bg-gray color-palette">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Dihapus Pada</th>
                                <th class="text-center">Catatan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <?php echo $__env->make('admin.bumindes.penduduk.data_lengkap', ['judul' => 'Buku Mutasi Penduduk'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('bumindes_penduduk_mutasi.datatables')); ?>",
                    data: function(req) {
                        req.tahun = $('#tahun').val();
                        req.bulan = $('#bulan').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'penduduk.nama',
                        name: 'penduduk.nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'penduduk.tempatlahir',
                        name: 'penduduk.tempatlahir',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tanggallahir',
                        name: 'tanggallahir',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'sex',
                        name: 'sex',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'warganegara',
                        name: 'warganegara',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'alamat_sebelumnya',
                        name: 'alamat_sebelumnya',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tanggal_sebelumnya',
                        name: 'tanggal_sebelumnya',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'alamat_tujuan',
                        name: 'alamat_tujuan',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tanggal_tujuan',
                        name: 'tanggal_tujuan',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'meninggal_di',
                        name: 'meninggal_di',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'tanggal_meninggal',
                        name: 'tanggal_meninggal',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'ket',
                        name: 'ket',
                        searchable: false,
                        orderable: false
                    }
                ],
                order: []
            });

            $('#tahun').change(function() {
                TableData.draw()
            })

            $('#bulan').change(function() {
                TableData.draw()
            })

            var TableDataHapus = $('#tabeldatahapus').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "<?php echo e(ci_route('bumindes_penduduk_mutasi.datatablesHapus')); ?>",
                    data: function(req) {
                        req.tahun = $('#tahun').val();
                        req.bulan = $('#bulan').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'deleted_at',
                        name: 'deleted_at',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'catatan',
                        name: 'catatan',
                        searchable: false,
                        orderable: false
                    }
                ],
                order: []
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/bumindes/penduduk/mutasi/index.blade.php ENDPATH**/ ?>