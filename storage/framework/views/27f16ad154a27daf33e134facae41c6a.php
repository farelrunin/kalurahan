<?php echo $__env->make('admin.layouts.components.asset_datatables', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.components.jquery_ui', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startSection('title'); ?>
    <h1>
        Kategori
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="active">Daftar Kategori</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <?php if(can('u')): ?>
                <a
                    href="<?php echo e(ci_route('kategori.ajax_form', $parent)); ?>"
                    title="Tambah <?php echo e($parent > 0 ? 'Sub' : ''); ?> Kategori"
                    data-remote="false"
                    data-toggle="modal"
                    data-target="#modalBox"
                    data-title="Tambah <?php echo e($parent > 0 ? 'Sub' : ''); ?> Kategori"
                    class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                ><i class='fa fa-plus'></i> Tambah</a>
            <?php endif; ?>
            <?php if(can('h')): ?>
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?php echo e(ci_route('kategori.delete', $parent)); ?>')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'
                    ></i>
                    Hapus</a>
            <?php endif; ?>
            <?php if($parent): ?>
                <a href="<?php echo e(ci_route('kategori')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                    <i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Kategori
                </a>
            <?php endif; ?>
        </div>
        <?php if($subtitle): ?>
            <div class="box-header with-border">
                <strong><?php echo $subtitle; ?></strong>
            </div>
        <?php endif; ?>
        <div class="box-body">
            <div class="row mepet">
                <div class="col-sm-2">
                    <select id="status" class="form-control input-sm select2" name="status">
                        <option value="">Pilih Status</option>
                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <hr class="batas">
            <?php echo form_open(null, 'id="mainform" name="mainform"'); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead>
                        <tr>
                            <th class="padat">#</th>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">NO</th>
                            <th class="padat">Aksi</th>
                            <th nowrap>Nama <?php echo e($parent ? 'Sub Kategori' : 'Kategori'); ?></th>
                            <th>Aktif</th>
                            <th nowrap>Link</th>
                        </tr>
                    </thead>
                    <tbody id="dragable">
                    </tbody>
                </table>
            </div>
            </form>
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
                ajax: "<?php echo e(ci_route('kategori.datatables')); ?>?parent=<?php echo e($parent); ?>",
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
                        data: 'kategori',
                        name: 'kategori',
                        searchable: true,
                        orderable: false
                    },
                    {
                        data: 'enabled',
                        name: 'enabled',
                        searchable: true,
                        orderable: false,
                        render: function(data, type, row) {
                            if (row.enabled) {
                                return 'Ya'
                            }
                            return 'Tidak';
                        }
                    },
                    {
                        data: 'link',
                        name: 'link',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-'
                    },
                ],
                aaSorting: [],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-id', data.id)
                    $(row).addClass('dragable-handle');
                },
            });

            $('#status').change(function() {
                TableData.column(5).search($(this).val()).draw()
            })


            if (hapus == 0) {
                TableData.column(1).visible(false);
            }

            if (ubah == 0) {
                TableData.column(0).visible(false);
                TableData.column(3).visible(false);
            }

            // harus diletakkan didalam blok ini, jika tidak maka object TableData tidak dikenal
            <?php echo $__env->make('admin.layouts.components.draggable', ['urlDraggable' => ci_route('kategori.tukar')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sitb2342/public_html/resources/views/admin/web/kategori/index.blade.php ENDPATH**/ ?>