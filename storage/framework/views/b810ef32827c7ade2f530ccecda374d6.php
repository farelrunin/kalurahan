<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Data Kepuasan
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Data Kepuasan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('buku_keperluan.delete')); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'></i> Hapus</a>
            <?php endif; ?>
        </div>
        <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">NO</th>
                            <th class="padat">AKSI</th>
                            <th>PERTANYAAN</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        </form>
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
                ajax: "<?php echo e(ci_route('buku_kepuasan')); ?>",
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
                        data: 'pertanyaan',
                        searchable: true,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'asc']
                ]
            });

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/buku_tamu/kepuasan/index.blade.php ENDPATH**/ ?>