<?php $__env->startSection('content'); ?>
    <div class="box box-solid">
        <div class="box-header with-border bg-green">
            <h4 class="box-title">Surat</h4>
        </div>
        <div class="box-body box-line">
            <a href="<?php echo e(ci_route('layanan-mandiri.surat.buat')); ?>" class="btn btn-social btn-success visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-pencil-square-o"></i>Buat Surat
            </a>
            <a href="<?php echo e(ci_route('layanan-mandiri.arsip-surat')); ?>" class="btn btn-social btn-primary visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-file-zip-o"></i>Arsip Surat
            </a>
            <a href="<?php echo e(ci_route('layanan-mandiri.permohonan-surat')); ?>" class="btn btn-social bg-purple visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-file-word-o"></i>Permohonan Surat
            </a>
        </div>
        <div class="box-body box-line">
            <h4><b>DAFTAR PERMOHONAN SURAT</b></h4>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-data" id="tabeldata">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>No Antrean</th>
                            <th>Jenis Surat</th>
                            <th>Tanggal Kirim</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            var tabelData = $('#tabeldata').DataTable({
                'processing': true,
                'serverSide': true,
                'ajax': '<?php echo e(base_url('layanan-mandiri/permohonan-surat')); ?>',
                'order': [
                    [4, 'desc']
                ],
                'columnDefs': [{
                        'searchable': false,
                        'targets': [0, 1]
                    },
                    {
                        'orderable': false,
                        'targets': [0, 1]
                    }
                ],
                'columns': [{
                        data: 'DT_RowIndex',
                        class: 'padat',
                    },
                    {
                        data: 'aksi',
                        class: 'aksi',
                    },
                    {
                        data: 'no_antrian',
                        class: 'padat',
                    },
                    {
                        data: 'surat.nama',
                        name: 'surat.nama',
                    },
                    {
                        data: 'created_at',
                        class: 'padat',
                    },
                ],
            });

            $('button.keterangan').click(function(event) {
                $(this).popover('show');
            });

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layanan_mandiri.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/layanan_mandiri/surat/permohonan.blade.php ENDPATH**/ ?>