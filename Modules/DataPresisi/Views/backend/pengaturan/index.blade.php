@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Pengaturan Data Presisi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Beranda</li>
    <li class="active">Pengaturan Data Presisi</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="row">
        <div class="col-md-12" id="main-content">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h5>Pengaturan Dasar</h5>
                    <div class="form-group">
                        <label for="tahun" class="col-sm-2 control-label">Data entri saat ini</label>
                        <div class="col-sm-6">
                            <input
                                type="number"
                                class="form-control input-sm required angka"
                                id="tahun"
                                name="tahun"
                                value="{{ $tahunAktif->tahun }}"
                                readonly
                                disabled
                            >
                        </div>
                        <label class="col-sm-4 control-label">Tahun berjalan pengisian data presisi</label>
                    </div>
                </div>
                <div class="box-body">
                    <hr class="batas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead>
                                <tr>
                                    <th nowrap>NO</th>
                                    <th nowrap>AKSI</th>
                                    <th nowrap>TAHUN</th>
                                    <th nowrap>STATUS</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.components.konfirmasi_hapus', [
        'pesan_hapus' => 'Apakah Anda yakin ingin menghapus data ini dan data akan terhapus secara permanen ?',
    ])
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                ajax: {
                    url: "{{ ci_route('data_presisi.pengaturan') }}",
                    data: function(req) {

                    }
                },
                columns: [{
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
                        data: 'tahun',
                        name: 'tahun',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: true
                    },
                ],
                order: [
                    [3, 'desc'],
                    [2, 'desc']
                ]
            });
            $('#tabeldata tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });
        });
    </script>
@endpush
