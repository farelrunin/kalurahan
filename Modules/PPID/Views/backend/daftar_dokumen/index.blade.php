@include('admin.layouts.components.asset_datatables')
@extends('admin.layouts.index')

@section('title')
    <h1>
        Daftar Dokumen
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Daftar Dokumen</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            @if (can('u'))
                <a href="{{ ci_route('ppid.daftar-dokumen.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
            @endif
            @if (can('h'))
                <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '{{ ci_route('ppid.daftar-dokumen.delete_all') }}')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                        class='fa fa-trash-o'
                    ></i> Hapus</a>
            @endif
        </div>
        <div class="box-body">

            {{-- filter --}}
            <div class="row mepet">
                <div class="col-md-2">
                    <select class="form-control input-sm select2" id="tahun_filter">
                        <option value="">Pilih Tahun</option>
                        @for ($year = date('Y'); $year >= 2020; $year--)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control input-sm select2" id="bulan_filter">
                        <option value="">Pilih Bulan</option>
                        @foreach (bulan() as $index => $value)
                            <option @selected($index == date('m')) value="{{ $index }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control input-sm select2" id="kategori_info_publik" name="kategori_info_publik">
                        <option value="">Pilih Jenis Dokumen</option>
                        @foreach ($jenisDokumen as $tipe)
                            <option value="{{ $tipe->external_code }}">{{ $tipe->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr class="batas">

            {!! form_open(null, 'id="mainform" name="mainform"') !!}
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabeldata">
                    <thead class="bg-gray">
                        <tr>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th>Id</th>
                            <th class="padat">No</th>
                            <th class="padat">Aksi</th>
                            <th>Jenis Dokumen</th>
                            <th>Judul Dokumen</th>
                            <th>Waktu Retensi Dokumen</th>
                            <th>Tanggal Terbit</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        @include('admin.layouts.components.konfirmasi_hapus')
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {
                var TableData = $('#tabeldata').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    searching: true,
                    ajax: {
                        url: "{{ ci_route('ppid.daftar-dokumen.datatables') }}",
                        data: function(d) {
                            d.tahun = $('#tahun_filter').val();
                            d.bulan = $('#bulan_filter').val();
                            d.kategori_info_publik = $('#kategori_info_publik').val();
                        }
                    },
                    columns: [{
                            data: 'ceklist',
                            class: 'padat',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'id',
                            searchable: false,
                            orderable: true,
                            visible: false
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
                            data: 'kategori_info_publik',
                            name: 'kategori_info_publik',
                            searchable: false,
                            orderable: true
                        },
                        {
                            data: 'nama',
                            name: 'nama',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'retensi',
                            name: 'retensi',
                            searchable: false,
                            orderable: true
                        },
                        {
                            data: 'tanggal_terbit',
                            name: 'tanggal_terbit',
                            searchable: false,
                            orderable: true
                        },
                        {
                            data: 'keterangan',
                            name: 'keterangan',
                            searchable: true,
                            orderable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            searchable: true,
                            orderable: true
                        }
                    ],
                    order: [
                        [1, 'desc']
                    ],
                });

                $('#tahun_filter').change(function() {
                    TableData.draw();
                });

                $('#bulan_filter').change(function() {
                    TableData.draw();
                });

                $('#kategori_info_publik').on('select2:select', function(e) {
                    TableData.draw();
                });
            });
        </script>
    @endpush
