@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data Pendidikan
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.pendidikan') }}">Data Pendidikan</a></li>
    <li class="active">Formulir</li>
@endsection

@section('content')
    <div class="row">
        <style>
            .title {
                color: #000
            }
        </style>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.pendidikan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Pendidikan</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $pendidikan->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Kepala Rumah Tangga</td>
                            <td>:</td>
                            <td>{{ $pendidikan->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $pendidikan->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td>:</td>
                            <td> {{ $pendidikan->rtm?->jumlah_kk }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td>:</td>
                            <td>{{ count($pendidikan->rtm->anggota ?? []) }}</td>
                        </tr>
                        <tr>
                            <td>Status Kelengkapan</td>
                            <td>:</td>
                            <td>
                                <select class="form-control input-sm select2" name="status_kelengkapan" id="status_kelengkapan" style="width:100%;">
                                    @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                        <option value="{{ $key }}" @selected($pendidikan->status_kelengkapan == $key)>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="box-body">
                    <h5><b>Daftar Anggota</b></h5>
                    {!! form_open('', 'class="form-validasi" id="form-1"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                            <thead class="bg-gray disabled color-palette">
                                <tr>

                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NOMOR KK</th>
                                    <th>NAMA</th>
                                    <th>PENDIDIKAN DALAM KK</th>
                                    <th>PENDIDIKAN SEDANG DITEMPUH</th>
                                    <th>KEIKUTSERTAAN KIP</th>
                                    <th>JENIS PENDIDIKAN KESETARAAN YANG DIIKUTI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($anggota) > 0)
                                    @foreach ($anggota as $key => $data)
                                        <tr>
                                            <td class="padat">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->no_kk }}</td>
                                            <td nowrap>{{ strtoupper($data->nama) }}</td>
                                            <td>
                                                <input type="hidden" name="nik[]" value="{{ $data->nik }}">
                                                <input type="hidden" name="rtm_id[]" value="{{ $data->rtm_id }}">
                                                <input type="hidden" name="keluarga_id[]" value="{{ $data->keluarga_id }}">
                                                <input type="hidden" name="anggota_id[]" value="{{ $data->anggota_id }}">
                                                <select class="form-control input-sm select2" name="pendidikan_dalam_kk[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($pendidikan_dalam_kk as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->pendidikan_dalam_kk == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="pendidikan_sedang_ditempuh[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($pendidikan_sedang_ditempuh as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->pendidikan_sedang_ditempuh == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="keikutsertaan_kip[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($keikutsertaan_kip as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->keikutsertaan_kip == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <select class="form-control input-sm select2" name="jenis_pendidikan_kesetaraan_yg_diikuti[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($jenis_pendidikan_kesetaraan_yg_diikuti as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->jenis_pendidikan_kesetaraan_yg_diikuti == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="9">Data Tidak Tersedia</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if (!$readonly)
                        <div class="modal-footer">
                            {!! batal() !!}
                            <button type="submit" class="btn btn-social btn-info btn-sm"><i class='fa fa-check'></i>
                                Simpan</button>
                        </div>
                    @endif
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            @if ($readonly)
                $('table.dataTable tbody tr>td>select').each(function() {
                    const _td = $(this).parent();
                    let _text = $(this).find('option:selected').text();
                    if (_text == '-- Pilih--') {
                        _text = '';
                    }
                    _td.html(_text)
                })
            @endif
            $('#form-1').on('submit', function(ev) {
                ev.preventDefault();

                var structuredData = []; // Array untuk menyusun data berdasarkan index

                // Inisialisasi jumlah data berdasarkan jumlah rtm_id[]
                var totalRows = $("input[name='rtm_id[]']").length;

                // Loop sesuai jumlah baris
                for (var i = 0; i < totalRows; i++) {
                    structuredData[i] = {
                        nik: $("input[name='nik[]']").eq(i).val(),
                        rtm_id: $("input[name='rtm_id[]']").eq(i).val(),
                        keluarga_id: $("input[name='keluarga_id[]']").eq(i).val(),
                        anggota_id: $("input[name='anggota_id[]']").eq(i).val(),
                        pendidikan_sedang_id: $("select[name='pendidikan_sedang_ditempuh[]']").eq(i)
                            .find(":selected").data('id'),
                        pendidikan_sedang_ditempuh: $("select[name='pendidikan_sedang_ditempuh[]']").eq(
                            i).val(),
                        pendidikan_kk_id: $("select[name='pendidikan_dalam_kk[]']").eq(i).find(
                            ":selected").data('id'),
                        pendidikan_dalam_kk: $("select[name='pendidikan_dalam_kk[]']").eq(i).val(),
                        keikutsertaan_kip: $("select[name='keikutsertaan_kip[]']").eq(i).val(),
                        jenis_pendidikan_kesetaraan_yg_diikuti: $(
                            "select[name='jenis_pendidikan_kesetaraan_yg_diikuti[]']").eq(i).val(),
                    };
                }

                console.log(structuredData)

                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.pendidikan.update', $pendidikan->rtm_id) }}",
                    data: {
                        form: structuredData,
                        status_kelengkapan: $('#status_kelengkapan').val()
                    },
                    success: function(response) {

                        console.log(response)
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
                        console.log(xhr)
                        Swal.fire({
                            icon: 'error',
                            text: 'Terjadi kesalahan saat menyimpan data',
                        });
                    }
                });
            });
        });
    </script>
@endpush
