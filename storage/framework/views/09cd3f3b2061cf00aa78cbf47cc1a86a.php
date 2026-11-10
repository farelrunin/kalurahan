<?php echo $__env->make('admin.pengaturan_surat.asset_tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('title'); ?>
    <h1>
        Widget
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Widget</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="mainform" name="mainform" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <?php if(can('u')): ?>
                            <a href="<?php echo e(ci_route('web_widget.form')); ?>" class="btn btn-social btn-success btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Widget">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        <?php endif; ?>
                        <?php if(can('u')): ?>
                            <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('web_widget.delete_all')); ?>')"
                                class="btn btn-social btn-danger btn-sm
                        visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block
                        hapus-terpilih"
                            ><i class='fa fa-trash-o'></i> Hapus</a>
                        <?php endif; ?>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <form id="mainform" name="mainform" method="post">
                                        <div class="row mepet">
                                            <div class="col-sm-2">
                                                <select name="status" id="status" class="form-control input-sm select2">
                                                    <option value="">Semua</option>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr class="batas">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover" id="tabeldata">
                                                        <thead class="bg-gray disabled color-palette">
                                                            <tr>
                                                                <th>#</th>
                                                                <th><input type="checkbox" id="checkall" /></th>
                                                                <th>No</th>
                                                                <th>Aksi</th>
                                                                <th width="20%">Judul</th>
                                                                <th nowrap>Jenis Widget</th>
                                                                <th>Isi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="dragable">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

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
                    url: "<?php echo e(ci_route('web_widget.datatables')); ?>",
                    data: function(req) {
                        req.status = $('#status').val();
                    }
                },
                columns: [{
                        data: 'drag-handle',
                        class: 'padat',
                        searchable: false,
                        orderable: false
                    },
                    {
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
                        data: 'judul',
                        name: 'judul',
                        searchable: true,
                        orderable: false,
                    },
                    {
                        data: 'jenis_widget',
                        name: 'jenis_widget',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'isi',
                        name: 'isi',
                        searchable: true,
                        orderable: false
                    },
                ],
                aaSorting: [],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-id', data.id)
                    $(row).addClass('dragable-handle');
                }
            });

            $('#status').change(function() {
                TableData.draw();
            })

            if (hapus == 0) {
                TableData.column(1).visible(false);
            }

            if (ubah == 0) {
                TableData.column(0).visible(false);
                TableData.column(3).visible(false);
            }

            // harus diletakkan didalam blok ini, jika tidak maka object TableData tidak dikenal
            <?php echo $__env->make('admin.layouts.components.draggable', ['urlDraggable' => ci_route('web_widget.tukar')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/web/widget/index.blade.php ENDPATH**/ ?>