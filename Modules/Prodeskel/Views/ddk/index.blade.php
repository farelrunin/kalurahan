@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
<h1>
    Prodeskel <small>Data Dasar Keluarga (DDK)</small>
</h1>
@endsection

@section('breadcrumb')
<li class="active">Prodeskel</li>
@endsection

@section('content')
@include('admin.layouts.components.notifikasi')

<div class="row">
    <div class="col-md-12" id="main-content">
        <div class="box box-info">
            <div class="box-header with-border">
                @if (can('u'))
                <a href="{{ ci_route('prodeskel.ddk.impor') }}" class="btn btn-social bg-navy btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Impor Data Survey DDK">
                    <i class="fa fa-upload"></i>Impor
                </a>
                @endif
                <a href="#" data-remote="false" data-toggle="modal" data-target="#unduhDaftarKeluargaDanAnggotaDDK" class="btn btn-social btn-info btn-sm margin">
                    <i class="fa fa-download"></i> Daftar Keluarga dan Anggota Keluarga
                </a>
            </div>
            <div class="box-body">
                <h5><b>Filter Wilayah</b></h5>
                <div class="row mepet">
                    @include('admin.layouts.components.wilayah')
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabeldata">
                        <thead>
                            <tr>
                                <th class="padat">Aksi</th>
                                <th class="padat">Kode Keluarga</th>
                                <th class="padat">Nama Kepala Keluarga</th>
                                <th>Alamat</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>Nama Dusun</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Nama Pengisi</th>
                                <th>Pekerjaan</th>
                                <th>Jabatan</th>
                                <th>Sumber Data</th>
                            </tr>
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
@include('prodeskel::ddk.daftar_keluarga')
@push('scripts')
<script>
    $(document).ready(function() {
        var TableData = $('#tabeldata').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ ci_route('prodeskel.datatablesDDK') }}",
                data: function(d) {
                    d.dusun = $('#dusun').val();
                    d.rw = $('#rw').val();
                    d.rt = $('#rt').val();
                }
            },
            columns: [{
                    data: 'aksi',
                    class: 'aksi',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'no_kk',
                    name: 'no_kk',
                    searchable: true,
                    orderable: true,
                    render: function(data, type, row) {
                        if (type == 'display') {
                            return `<a href='{{ ci_route('keluarga.kartu_keluarga') }}/${row.id}'>${data}</a>`;
                        }

                        return data;
                    }
                },
                {
                    data: 'nama',
                    name: 'nama',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'alamat_sekarang',
                    name: 'alamat_sekarang',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'rw',
                    name: 'rw',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'rt',
                    name: 'rt',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'dusun',
                    name: 'dusun',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'bulan',
                    name: 'bulan',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'tahun',
                    name: 'tahun',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'nama_pengisi',
                    name: 'nama_pengisi',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'pekerjaan',
                    name: 'pekerjaan',
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
                    data: 'sumber_data_1',
                    name: 'sumber_data_1',
                    searchable: false,
                    orderable: false
                },
            ],
            order: [
                [2, 'asc']
            ]
        });
        $('#tabeldata tbody').on('click', 'tr', function() {
            $(this).toggleClass('selected');
        });

        $('#dusun, #rw, #rt').change(function() {
            TableData.draw()
        })
        $('#dusun').change(function() {
            $('#rw').val('').trigger('change'); // Reset RW dan perbarui tampilan
            $('#rt').val('').trigger('change'); // Reset RT dan perbarui tampilan
            TableData.draw();
        });


    });
</script>
@endpush