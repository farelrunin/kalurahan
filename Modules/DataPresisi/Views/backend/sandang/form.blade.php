@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data Sandang
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.sandang') }}">Data Sandang</a></li>
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
                    <a href="{{ ci_route('data_presisi.sandang') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Sandang</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $sandang->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Kepala Rumah Tangga</td>
                            <td>:</td>
                            <td>{{ $sandang->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td class="break-alamat">{{ $sandang->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td>:</td>
                            <td> {{ $sandang->rtm->jumlah_kk }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td>:</td>
                            <td>{{ count($sandang->rtm->anggota) }}</td>
                        </tr>
                        <tr>
                            <td>Status Pengisian</td>
                            <td>:</td>
                            <td>
                                <select class="form-control input-sm status-kelengkapan" name="status_kelengkapan" id="status_kelengkapan">
                                    @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                        <option value="{{ $key }}" {{ ($sandang->status_kelengkapan ?? 0) == $key ? 'selected' : '' }}>
                                            {{ $value }}</option>
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
                                    <th>JML PAKAIAN YANG DIMILIKI</th>
                                    <th>FREKWENSI BELI PAKAIAN PERTAHUN</th>
                                    <th>JENIS PAKAIAN</th>
                                    <th>FREKWENSI GANTI PAKAIAN</th>
                                    <th>TMPT CUCI PAKAIAN</th>
                                    <th>JML PAKAIAN BERAGAM</th>
                                    <th>JML PAKAIAN SEMBAHYANG</th>
                                    <th>JML PAKAIAN KERJA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($anggota) > 0)
                                    @foreach ($anggota as $key => $data)
                                        <tr>
                                            <td class="padat">{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $data['nik'] }}

                                            </td>
                                            <td>
                                                {{ $data['no_kk'] }}
                                            </td>
                                            <td nowrap>{{ strtoupper($data['nama']) }}</td>
                                            <td>
                                                <input type="hidden" name="rtm_id[]" value="{{ $data['rtm_id'] }}">
                                                <input type="hidden" name="keluarga_id[]" value="{{ $data['keluarga_id'] }}">
                                                <input type="hidden" name="anggota_id[]" value="{{ $data['anggota_id'] }}">
                                                <select class="form-control input-sm select2" name="jml_pakaian_yg_dimiliki[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="1 Stel" {{ $data['jml_pakaian_yg_dimiliki'] == '1 Stel' ? 'selected' : '' }}>
                                                        1 Stel</option>
                                                    <option value="2 Stel" {{ $data['jml_pakaian_yg_dimiliki'] == '2 Stel' ? 'selected' : '' }}>
                                                        2 Stel</option>
                                                    <option value="3 Stel" {{ $data['jml_pakaian_yg_dimiliki'] == '3 Stel' ? 'selected' : '' }}>
                                                        3 Stel</option>
                                                    <option value="> 3 Stel" {{ $data['jml_pakaian_yg_dimiliki'] == '> 3 Stel' ? 'selected' : '' }}>
                                                        > 3 Stel</option>
                                                </select>
                                            </td>

                                            <td>
                                                <select class="form-control input-sm select2" name="frekwensi_beli_pakaian_pertahun[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="1 Kali" {{ $data['frekwensi_beli_pakaian_pertahun'] == '1 Kali' ? 'selected' : '' }}>
                                                        1 Kali</option>
                                                    <option value="2 Kali" {{ $data['frekwensi_beli_pakaian_pertahun'] == '2 Kali' ? 'selected' : '' }}>
                                                        2 Kali</option>
                                                    <option value="> dari 2 Kali" {{ $data['frekwensi_beli_pakaian_pertahun'] == '> dari 2 Kali' ? 'selected' : '' }}>
                                                        > dari 2 Kali</option>
                                                </select>
                                            </td>

                                            <td>
                                                <select class="form-control input-sm select2" name="jenis_pakaian[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="Pakaian Jadi" {{ $data['jenis_pakaian'] == 'Pakaian Jadi' ? 'selected' : '' }}>
                                                        Pakaian Jadi</option>
                                                    <option value="Menjahit di Taylor" {{ $data['jenis_pakaian'] == 'Menjahit di Taylor' ? 'selected' : '' }}>
                                                        Menjahit di Taylor</option>
                                                </select>
                                            </td>

                                            <td>
                                                <select class="form-control input-sm select2" name="frekwensi_ganti_pakaian[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="1 Kali" {{ $data['frekwensi_ganti_pakaian'] == '1 Kali' ? 'selected' : '' }}>
                                                        1 Kali</option>
                                                    <option value="2 Kali" {{ $data['frekwensi_ganti_pakaian'] == '2 Kali' ? 'selected' : '' }}>
                                                        2 Kali</option>
                                                    <option value="3 Kali" {{ $data['frekwensi_ganti_pakaian'] == '3 Kali' ? 'selected' : '' }}>
                                                        3 Kali</option>
                                                    <option value="> 3 Kali" {{ $data['frekwensi_ganti_pakaian'] == '> 3 Kali' ? 'selected' : '' }}>
                                                        > 3 Kali</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="tmpt_cuci_pakaian[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="Cuci Sendiri" {{ $data['tmpt_cuci_pakaian'] == 'Cuci Sendiri' ? 'selected' : '' }}>
                                                        Cuci Sendiri</option>
                                                    <option value="Laundry" {{ $data['tmpt_cuci_pakaian'] == 'Laundry' ? 'selected' : '' }}>
                                                        Laundry</option>
                                                    <option value="Cuci sendiri & Laundry" {{ $data['tmpt_cuci_pakaian'] == 'Cuci sendiri & Laundry' ? 'selected' : '' }}>
                                                        Cuci sendiri & Laundry</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="jml_pakaian_seragam[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="Tidak memiliki" {{ $data['jml_pakaian_seragam'] == 'Tidak memiliki' ? 'selected' : '' }}>
                                                        Tidak memiliki</option>
                                                    <option value="1 Stel" {{ $data['jml_pakaian_seragam'] == '1 Stel' ? 'selected' : '' }}>1
                                                        Stel</option>
                                                    <option value="2 Stel" {{ $data['jml_pakaian_seragam'] == '2 Stel' ? 'selected' : '' }}>2
                                                        Stel</option>
                                                    <option value="> 2 Stel" {{ $data['jml_pakaian_seragam'] == '> 2 Stel' ? 'selected' : '' }}>
                                                        > 2 Stel</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="jml_pakaian_sembahyang[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="Tidak memiliki" {{ $data['jml_pakaian_seragam'] == 'Tidak memiliki' ? 'selected' : '' }}>
                                                        Tidak memiliki</option>
                                                    <option value="1 Stel" {{ $data['jml_pakaian_sembahyang'] == '1 Stel' ? 'selected' : '' }}>
                                                        1 Stel</option>
                                                    <option value="2 Stel" {{ $data['jml_pakaian_sembahyang'] == '2 Stel' ? 'selected' : '' }}>
                                                        2 Stel</option>
                                                    <option value="> 2 Stel" {{ $data['jml_pakaian_sembahyang'] == '> 2 Stel' ? 'selected' : '' }}>
                                                        > 2 Stel</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="jml_pakaian_kerja[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option value="Tidak memiliki" {{ $data['jml_pakaian_seragam'] == 'Tidak memiliki' ? 'selected' : '' }}>
                                                        Tidak memiliki</option>
                                                    <option value="1 Stel" {{ $data['jml_pakaian_kerja'] == '1 Stel' ? 'selected' : '' }}>1
                                                        Stel</option>
                                                    <option value="2 Stel" {{ $data['jml_pakaian_kerja'] == '2 Stel' ? 'selected' : '' }}>2
                                                        Stel</option>
                                                    <option value="> 2 Stel" {{ $data['jml_pakaian_kerja'] == '> 2 Stel' ? 'selected' : '' }}>>
                                                        2 Stel</option>
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
                    <div class="modal-footer">
                        {!! batal() !!}
                        <button type="submit" class="btn btn-social btn-info btn-sm"><i class='fa fa-check'></i>
                            Simpan</button>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- pakai cara ini, karena menggunakan module_assets ternyata jadi 404 --}}
@include('datapresisi::assets.css.presisi')
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#form-1').on('submit', function(ev) {
                ev.preventDefault();

                var structuredData = []; // Array untuk menyusun data berdasarkan index

                // Inisialisasi jumlah data berdasarkan jumlah rtm_id[]
                var totalRows = $("input[name='rtm_id[]']").length;

                // Loop sesuai jumlah baris
                for (var i = 0; i < totalRows; i++) {
                    structuredData[i] = {
                        rtm_id: $("input[name='rtm_id[]']").eq(i).val(),
                        keluarga_id: $("input[name='keluarga_id[]']").eq(i).val(),
                        anggota_id: $("input[name='anggota_id[]']").eq(i).val(),
                        jml_pakaian_yg_dimiliki: $("select[name='jml_pakaian_yg_dimiliki[]']").eq(i)
                            .val(),
                        frekwensi_beli_pakaian_pertahun: $(
                            "select[name='frekwensi_beli_pakaian_pertahun[]']").eq(i).val(),
                        jenis_pakaian: $("select[name='jenis_pakaian[]']").eq(i).val(),
                        frekwensi_ganti_pakaian: $("select[name='frekwensi_ganti_pakaian[]']").eq(i)
                            .val(),
                        tmpt_cuci_pakaian: $("select[name='tmpt_cuci_pakaian[]']").eq(i).val(),
                        jml_pakaian_seragam: $("select[name='jml_pakaian_seragam[]']").eq(i).val(),
                        jml_pakaian_sembahyang: $("select[name='jml_pakaian_sembahyang[]']").eq(i)
                            .val(),
                        jml_pakaian_kerja: $("select[name='jml_pakaian_kerja[]']").eq(i).val()
                    };
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.sandang.update', $sandang->rtm_id) }}",
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
