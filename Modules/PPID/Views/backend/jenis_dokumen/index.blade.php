@include('admin.layouts.components.asset_datatables')
@include('admin.layouts.components.jquery_ui')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .bi {
            font-size: 2.5rem;
        }
    </style>
@endpush

@extends('admin.layouts.index')

@section('title')
    <h1>
        Jenis Dokumen
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Jenis Dokumen</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    @include('admin.layouts.components.konfirmasi_hapus')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <?php if (can('u')) : ?>
                <div class="box-header with-border">
                    @if (can('u'))
                        <button type="button" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block add-btn"><i class="fa fa-plus"></i> Tambah</button>
                    @endif
                    @if (can('h'))
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','{{ ci_route('ppid.jenis-dokumen.delete-all') }}')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus</a>
                    @endif
                </div>
                @endif
                <div class="box-body">
                    <div class="row mepet">
                        <div class="col-sm-2">
                            <select id="status" class="form-control input-sm select2" name="status">
                                <option value="">Semua</option>
                                @foreach ($status as $key => $item)
                                    <option value="{{ $key }}" @selected($key == $defaultStatus)>{{ $item }}
                                    </option>
                                @endforeach
                                <option value="99">Terhapus</option>
                            </select>
                        </div>
                    </div>
                    <hr class="batas">
                    {!! form_open(null, 'id="mainform" name="mainform"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tabel-daftar" id="tabeldata">
                            <thead class="bg-gray">
                                <tr>
                                    <th class="padat">#</th>
                                    <th class="padat"><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">Aksi</th>
                                    <th class="">Nama Kategori</th>
                                    <th class="">Deskripsi</th>
                                    <th class="">Kode</th>
                                    <th class="padat">Icon</th>
                                    <th class="padat">Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="dragable">
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('ppid::backend.jenis_dokumen._form_modal')
@endsection

@push('scripts')
    <script>
        console.log($('#status').val())
        let TableData = null;
        $(document).ready(function() {
            TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ ci_route('ppid.jenis-dokumen.datatables') }}",
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
                        data: 'aksi',
                        class: 'aksi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'nama_kategori',
                        name: 'nama_kategori',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'icon_merge',
                        name: 'icon_merge',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: false,
                        className: 'padat'
                    },
                    {
                        data: 'urut',
                        name: 'urut',
                        searchable: false,
                        orderable: true,
                        visible: false
                    },
                ],
                order: [
                    [7, 'asc']
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-id', data.id);
                    $(row).addClass('dragable-handle');
                }
            });

            // harus diletakkan didalam blok ini, jika tidak maka object TableData tidak dikenal
            @include('admin.layouts.components.draggable', [
                'urlDraggable' => ci_route('ppid.jenis-dokumen.tukar'),
            ])

            if (hapus == 0) {
                TableData.column(1).visible(false);
            }

            if (ubah == 0) {
                TableData.column(0).visible(false);
                TableData.column(2).visible(false);
            }

            $('#status').on('select2:select', function(e) {
                TableData.draw();
            });

            $(document).on('click', '.btn-ok', function(e) {
                e.preventDefault();
                let href = $(this).attr('href');
                let id = href.split('#')[1];
                $.ajax({
                    url: "{{ ci_route('ppid.jenis-dokumen') }}/" + id,
                    type: 'DELETE',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        });
                        TableData.draw(); // Refresh the table
                        $('#confirm-delete').modal('hide'); // Hide the modal
                    }
                });
            });

            // AJAX for lock and unlock
            $(document).on('click', '.lock-btn, .unlock-btn', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ ci_route('ppid.jenis-dokumen.lock') }}/" + id,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                                timer: 2000,
                            });
                            TableData.draw(); // Refresh the table
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                                timer: 2000,
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error: ' + xhr.responseText,
                            timer: 2000,
                        });
                    }
                });
            });

            // Restore data
            $(document).on('click', '.restore-btn', function(e) {
                e.preventDefault();
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Pulihkan Data?',
                    text: "Data akan dipulihkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Pulihkan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ ci_route('ppid.jenis-dokumen.restore', ':id') }}".replace(':id', id),
                            type: 'POST',
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    timer: 2000
                                });
                                TableData.draw();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Gagal memulihkan data',
                                    timer: 2000
                                });
                            }
                        });
                    }
                });
            });


            $(document).on('click', '.btn-delete-permanen', function(e) {

                e.preventDefault();

                let id = $(this).data('id');

                Swal.fire({
                    title: 'Hapus Permanen?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus Permanen!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ ci_route('ppid.jenis-dokumen.delete-permanen', ':id') }}".replace(':id', id),
                            type: 'DELETE',
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Terhapus!',
                                    text: response.message,
                                    timer: 2000
                                });
                                TableData.draw();
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Data gagal dihapus permanen',
                                    timer: 2000
                                });
                            }
                        });
                    }
                });
            });



        });
    </script>
@endpush
