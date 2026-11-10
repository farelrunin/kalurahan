@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Data Presisi <small>Data Pendidikan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Data Pendidikan</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="row">
        <div class="col-md-12" id="main-content">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a
                        id="cetak_id"
                        href="{{ ci_route('data_presisi.pendidikan.ajax_cetak.cetak') }}"
                        class="btn btn-social bg-primary btn-sm"
                        title="Cetak Data"
                        data-remote="false"
                        data-toggle="modal"
                        data-target="#modalBox"
                        data-title="Cetak Data"
                    ><i class="fa fa-print"></i>
                        Cetak</a>
                    <a
                        id="unduh_id"
                        href="{{ ci_route('data_presisi.pendidikan.ajax_cetak.unduh') }}"
                        class="btn btn-social bg-navy btn-sm"
                        title="Unduh Data"
                        data-remote="false"
                        data-toggle="modal"
                        data-target="#modalBox"
                        data-title="Unduh Data"
                    ><i class="fa fa-download"></i> Unduh</a>
                    @include('datapresisi::components.eksport_button', [
                        'urlModal' => ci_route('data_presisi.pendidikan.ajax_export.unduh'),
                    ])
                    @include('datapresisi::components.periksa_button', [
                        'url' => ci_route('data_presisi.pendidikan.periksa', 1),
                    ])
                </div>
                <div class="box-body">
                    <div class="row mepet">
                        @include('admin.layouts.components.wilayah')
                        @include('datapresisi::components.status_pengisian')
                    </div>
                    <hr class="batas">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead>
                                <tr>
                                    <th nowrap>NO</th>
                                    <th nowrap>AKSI</th>
                                    <th nowrap>STATUS</th>
                                    <th nowrap>STATUS KELENGKAPAN</th>
                                    <th nowrap>NO RTM</th>
                                    <th nowrap>KEPALA RTM</th>
                                    <th nowrap>NIK</th>
                                    <th nowrap>JUMLAH KK</th>
                                    <th nowrap>JUMLAH ANGGOTA</th>
                                    <th nowrap>ALAMAT</th>
                                    <th nowrap>{{ strtoupper(setting('sebutan_dusun')) }}</th>
                                    <th nowrap>RW</th>
                                    <th nowrap>RT</th>
                                    <th nowrap>TANGGAL PENGISIAN</th>
                                    <th nowrap>TANGGAL TERDAFTAR</th>
                            </thead>
                        </table>
                    </div>
                    {!! form_open(ci_route('keluarga.filter.cari'), 'id="form-ke-keluarga"') !!}
                    <input id="cari" name="cari" type="hidden">
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    url: "{{ ci_route('data_presisi.pendidikan') }}",
                    data: function(req) {
                        req.dusun = $('#dusun').val();
                        req.rw = $('#rw').val();
                        req.rt = $('#rt').val();
                        req.status_pengisian = $('#status_pengisian').val();
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
                        data: 'status',
                        name: 'status',
                        searchable: false,
                        orderable: true,
                    },
                    {
                        data: 'status_kelengkapan_badge',
                        name: 'status_kelengkapan',
                        searchable: false,
                        orderable: true,
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kepala_keluarga.nama',
                        name: 'kepalaKeluarga.nama',
                        defaultContent: '-',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kepala_keluarga.nik',
                        name: 'kepalaKeluarga.nik',
                        defaultContent: '-',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jumlah_kk',
                        name: 'jumlah_kk',
                        searchable: false,
                        orderable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'anggota_count',
                        name: 'anggota_count',
                        searchable: false,
                        orderable: true,
                        className: 'text-center'
                    },
                    {
                        data: 'kepala_keluarga.alamat_wilayah',
                        name: 'alamat_wilayah',
                        searchable: false,
                        orderable: true,
                        defaultContent: '-',
                    },
                    {
                        data: 'kepala_keluarga.keluarga.wilayah.dusun',
                        name: 'dusun',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'kepala_keluarga.keluarga.wilayah.rw',
                        name: 'rw',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'kepala_keluarga.keluarga.wilayah.rt',
                        name: 'rt',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'tanggal_pengisian',
                        name: 'k.tanggal_pengisian',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'tgl_daftar',
                        name: 'tgl_daftar',
                        searchable: false,
                        orderable: true
                    },
                ],
                order: [
                    [4, 'asc']
                ]
            });
            $('#tabeldata tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });
            $('#jenis_kelamin, #dusun, #rw, #rt, #status_pengisian').change(function() {
                TableData.draw()
            })
        });
    </script>
@endpush
