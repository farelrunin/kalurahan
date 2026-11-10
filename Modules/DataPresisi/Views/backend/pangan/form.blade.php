@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.asset_datatables')

@section('title')
    <h1>
        Detail Data PANGAN
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.pangan') }}">Data PANGAN</a></li>
    <li class="active">Formulir</li>
@endsection

@section('content')
    <div class="row">
        <style>
            .title {
                color: #000
            }

            td.break {
                word-break: break-word;
                white-space: normal;
            }
        </style>
        <div class="col-md-12">
            <div class="box box-primary">
                @include('admin.layouts.components.notifikasi')
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.pangan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Pangan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Pangan</a>
                    @if ($pangan->status_pengisian == 'lengkap')
                        <a href="{{ ci_route('data_presisi.pangan.form', $pangan->rtm_id) }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Kepemilikan Tanah"><i class="fa fa-plus"></i>Tambah Kepemilikan
                            Tanah</a>
                    @endif
                    <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '{{ ci_route('data_presisi.pangan.delete_all', $pangan->rtm_id) }}')"
                        class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                    ><i class='fa fa-trash-o'></i> Hapus</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $pangan->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Nama KRT</td>
                            <td>:</td>
                            <td>{{ $pangan->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td class="break">{{ $pangan->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td>{{ $pangan->updated_at }}</td>
                        </tr>
                        <tr>
                            <td>Status Kelengkapan</td>
                            <td>:</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <select class="form-control input-sm" name="status_kelengkapan" id="status_kelengkapan" style="min-width:40%;max-width:60%">
                                        @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                            <option value="{{ $key }}" {{ ($pangan->status_kelengkapan ?? 0) == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" id="btn-simpan-status" class="btn btn-sm btn-primary">
                                        <i class="fa fa-save"></i> Simpan Status
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <div>
                        <h4>Daftar Kepemilikan Tanah</h4>
                        <div class="table-responsive">
                            {!! form_open(null, 'id="mainform" name="mainform"') !!}
                            <table class="table table-bordered table-hover" id="tabeldata">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No</th>
                                        <th class="padat">Aksi</th>
                                        <th class="padat">Jenis Lahan</th>
                                        <th class="padat">Luas Lahan/ Pekarangan</th>
                                        <th class="padat">Luas Tanam</th>
                                        <th class="padat">Status Lahan</th>
                                        <th class="padat">Komoditi Utama Tanaman Pangan</th>
                                        <th class="padat">Jumlah Populasi</th>
                                    </tr>
                                </thead>
                            </table>
                            {!! form_close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.components.konfirmasi_hapus')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Simpan status kelengkapan
            $('#btn-simpan-status').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.pangan.updateStatus', $pangan->rtm_id) }}",
                    data: {
                        status_kelengkapan: $('#status_kelengkapan').val()
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Terjadi kesalahan saat menyimpan data',
                        });
                    }
                });
            });

            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: false,
                lengthChange: false,
                ajax: {
                    url: "{{ ci_route('data_presisi.pangan.lahan-pangan') }}",
                    data: function(req) {
                        req.rtm_id = '{{ $pangan->rtm_id }}';
                    }
                },
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
                        data: 'jenis_lahan',
                        name: 'jenis_lahan',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'luas_lahan',
                        name: 'luas_lahan',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'luas_tanam',
                        name: 'luas_tanam',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'status_lahan',
                        name: 'status_lahan',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'komoditi_utama_tanaman_pangan',
                        name: 'komoditi_utama_tanaman_pangan',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                    {
                        data: 'jumlah_populasi',
                        name: 'jumlah_populasi',
                        searchable: false,
                        orderable: false,
                        defaultContent: '-',
                    },
                ],
                order: [
                    [2, 'asc']
                ],
                initComplete: function(settings, json) {
                    // Hapus checkbox pada baris pertama setelah tabel selesai diinisialisasi
                    $('#tabeldata tbody tr:first td:first input[type="checkbox"]').remove();
                    $('#tabeldata tbody tr:first td:eq(2) i.fa-trash').closest('a').remove();
                }
            });
        });
    </script>
@endpush
