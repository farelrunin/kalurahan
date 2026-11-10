@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Data Presisi <small>Data PAPAN</small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Data Papan</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="row">
        <div class="col-md-12" id="main-content">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a
                        id="cetak_id"
                        href="{{ ci_route('data_presisi.papan.ajax_cetak.cetak') }}"
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
                        href="{{ ci_route('data_presisi.papan.ajax_cetak.unduh') }}"
                        class="btn btn-social bg-navy btn-sm"
                        title="Unduh Data"
                        data-remote="false"
                        data-toggle="modal"
                        data-target="#modalBox"
                        data-title="Unduh Data"
                    ><i class="fa fa-download"></i> Unduh</a>
                    @include('datapresisi::components.eksport_button', [
                        'urlModal' => ci_route('data_presisi.papan.ajax_export.unduh'),
                    ])
                    @include('datapresisi::components.periksa_button', [
                        'url' => ci_route('data_presisi.papan.periksa', 1),
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
                                    <th rowspan="2">No</th>
                                    <th rowspan="2" class="padat">Aksi</th>
                                    <th rowspan="2" class="padat">Status</th>
                                    <th rowspan="2" class="padat">Status<br>Kelengkapan</th>
                                    <th rowspan="2" class="padat">No. RTM</th>
                                    <th rowspan="2" class="padat">Singkron<br>DTKS</th>
                                    <th colspan="2" class="padat" kolom="3,4,5,6,7,8">Kepala RTM</th>
                                    <th rowspan="2" class="padat">Jumlah<br>Anggota</th>
                                    <th rowspan="2" class="padat">Alamat</th>
                                    <th rowspan="2" class="padat">{{ ucwords(setting('sebutan_dusun')) }}</th>
                                    <th rowspan="2" class="padat">RW</th>
                                    <th rowspan="2" class="padat">RT</th>
                                    <th rowspan="2" class="padat">Status<br>Kepemilikan<br>Bangunan</th>
                                    <th rowspan="2" class="padat">Luas<code>(m<sup>2</sup>)</code><br>Lahan/<br>Pekarangan</th>
                                    <th rowspan="2" class="padat">Jumlah<br>Kamar<br>Tidur</th>
                                    <th rowspan="2" class="padat">Luas
                                        <code>(m<sup>2</sup>)</code><br>Lantai/<br>Bangunan
                                    </th>
                                    <th rowspan="2" class="padat">Jenis<br>Lantai<br>Terluas</th>
                                    <th rowspan="2" class="padat">Jenis<br>Dinding<br>Terluas</th>
                                    <th rowspan="2" class="padat">Jenis<br>Atap<br>Terluas</th>
                                    <th rowspan="2" class="padat">Sumber<br>Air<br>Minum</th>
                                    <th rowspan="2" class="padat">Tempat<br>Pembuangan<br>Akhir Tinja</th>
                                    <th rowspan="2" class="padat">Sumber<br>Penerangan<br>Utama</th>
                                    <th rowspan="2" class="padat">Tanggal<br>Pengisian</th>
                                    <th rowspan="2" class="padat">Tanggal<br>Terdaftar</th>
                                </tr>

                                <tr>
                                    <th>NIK</th>
                                    <th nowrap>Nama</th>
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
                    url: "{{ ci_route('data_presisi.papan') }}",
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
                        data: 'status_pengisian',
                        name: 'status_pengisian',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'status_kelengkapan_badge',
                        name: 'status_kelengkapan_badge',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'no_kk',
                        name: 'no_kk',
                        searchable: true,
                        orderable: true,
                        render: function(row, data, item) {
                            return `<span class="text-bold">${item.no_kk}</span>`;
                        }
                    },
                    {
                        data: 'dtks',
                        class: 'padat',
                        searchable: false,
                        orderable: true,
                        render: function(data, type, row) {
                            let isSync = row.is_sync;
                            if (row.dtks) {
                                let syncLabel = isSync ? 'Data Sinkron' : 'Data Berbeda';
                                let labelClass = isSync ? 'label-success' : 'label-danger';
                                return `<span class='label ${labelClass}'>${syncLabel}</span>`;
                            }
                            return "<span class='label label-info'>Tidak Terdaftar</span>";
                        }
                    },
                    {
                        data: null,
                        name: 'kepalaKeluarga.nik',
                        searchable: true,
                        orderable: true,
                        render: function(data, type, row) {
                            if (type == 'display') {
                                return `<a href='{{ ci_route('keluarga.kartu_keluarga') }}/${row.kepala_keluarga.id_kk}'>${row.kepala_keluarga.nik}</a>`;
                            }

                            return data;
                        }
                    },
                    {
                        data: 'kepala_keluarga.nama',
                        name: 'kepalaKeluarga.nama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'jumlah_anggota',
                        name: 'jumlah_anggota',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'kepala_keluarga.alamat_wilayah',
                        name: 'alamat_wilayah',
                        searchable: false,
                        orderable: false,
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
                        data: 'kd_stat_bangunan_tinggal',
                        name: 'kd_stat_bangunan_tinggal',
                        searchable: true,
                        orderable: true
                    },

                    {
                        data: 'luas_lahan_pekarangan',
                        name: 'luas_lahan_pekarangan',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'jumlah_kamar_tidur',
                        name: 'jumlah_kamar_tidur',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'luas_lantai',
                        name: 'luas_lantai',
                        searchable: false,
                        orderable: true
                    },
                    {
                        data: 'kd_jenis_lantai_terluas',
                        name: 'kd_jenis_lantai_terluas',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kd_jenis_dinding',
                        name: 'kd_jenis_dinding',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kd_jenis_atap',
                        name: 'kd_jenis_atap',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kd_sumber_air_minum',
                        name: 'kd_sumber_air_minum',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kd_pembuangan_akhir_tinja',
                        name: 'kd_pembuangan_akhir_tinja',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'kd_sumber_penerangan_utama',
                        name: 'kd_sumber_penerangan_utama',
                        searchable: true,
                        orderable: true
                    },
                    {
                        data: 'tanggal_pengisian',
                        name: 'tanggal_pengisian',
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
