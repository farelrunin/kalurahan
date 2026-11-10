@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data Kesehatan
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.kesehatan') }}">Data Kesehatan</a></li>
    <li class="active">Formulir</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.kesehatan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Kesehatan</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $kesehatan->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Kepala Rumah Tangga</td>
                            <td>:</td>
                            <td>{{ $kesehatan->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td class="break-alamat">{{ $kesehatan->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td>:</td>
                            <td> {{ $kesehatan->rtm->jumlah_kk }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td>:</td>
                            <td>{{ count($kesehatan->rtm->anggota) }}</td>
                        </tr>
                        <tr>
                            <td>Status Kelengkapan</td>
                            <td>:</td>
                            <td>
                                <select class="form-control input-sm status-kelengkapan" name="status_kelengkapan" id="status_kelengkapan">
                                    @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                        <option value="{{ $key }}" {{ ($kesehatan->status_kelengkapan ?? 0) == $key ? 'selected' : '' }}>
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
                                    <th>JNS ASURANSI</th>
                                    <th>JNS PENGGUNAAN ALAT KONTRASEPSI</th>
                                    <th>JNS PENYAKIT YANG DIDERITA</th>
                                    <th>KUNJUNGAN KE FASKES DALAM 1 TAHUN</th>
                                    <th>RAWAT INAP DALAM 1 TAHUN</th>
                                    <th>KUNJUNGAN KE DOKTER DALAM 1 TAHUN</th>
                                    <th>KONDISI FISIK SEJAK LAHIR</th>
                                    <th>STATUS GIZI BALITA</th>
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
                                                <select class="form-control input-sm select2" name="jns_ansuransi[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($jns_ansuransi as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->jns_ansuransi == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="jns_penggunaan_alat_kontrasepsi[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($jns_penggunaan_alat_kontrasepsi as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->jns_penggunaan_alat_kontrasepsi == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="jns_penyakit_diderita[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($jns_penyakit_diderita as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->jns_penyakit_diderita == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="frekwensi_kunjungan_faskes_pertahun[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option data-id="1" value="1 Kali" {{ $data->frekwensi_kunjungan_faskes_pertahun == '1 Kali' ? 'selected' : '' }}>
                                                        1 Kali</option>
                                                    <option data-id="2" value="2 Kali" {{ $data->frekwensi_kunjungan_faskes_pertahun == '2 Kali' ? 'selected' : '' }}>
                                                        2 Kali</option>
                                                    <option data-id="3" value="3 Kali" {{ $data->frekwensi_kunjungan_faskes_pertahun == '3 Kali' ? 'selected' : '' }}>
                                                        3 Kali</option>
                                                    <option data-id="4" value="> 3 Kali" {{ $data->frekwensi_kunjungan_faskes_pertahun == '> 3 Kali' ? 'selected' : '' }}>
                                                        > 3 Kali</option>
                                                    <option data-id="5" value="Tidak Pernah" {{ $data->frekwensi_kunjungan_faskes_pertahun == 'Tidak Pernah' ? 'selected' : '' }}>
                                                        Tidak Pernah</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="frekwensi_rawat_inap_pertahun[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option data-id="1" value="1 Kali" {{ $data->frekwensi_rawat_inap_pertahun == '1 Kali' ? 'selected' : '' }}>
                                                        1 Kali</option>
                                                    <option data-id="2" value="2 Kali" {{ $data->frekwensi_rawat_inap_pertahun == '2 Kali' ? 'selected' : '' }}>
                                                        2 Kali</option>
                                                    <option data-id="3" value="3 Kali" {{ $data->frekwensi_rawat_inap_pertahun == '3 Kali' ? 'selected' : '' }}>
                                                        3 Kali</option>
                                                    <option data-id="4" value="> 3 Kali" {{ $data->frekwensi_rawat_inap_pertahun == '> 3 Kali' ? 'selected' : '' }}>
                                                        > 3 Kali</option>
                                                    <option data-id="5" value="Tidak Pernah" {{ $data->frekwensi_rawat_inap_pertahun == 'Tidak Pernah' ? 'selected' : '' }}>
                                                        Tidak Pernah</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="frekwensi_kunjungan_dokter_pertahun[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    <option data-id="1" value="1 Kali" {{ $data->frekwensi_kunjungan_dokter_pertahun == '1 Kali' ? 'selected' : '' }}>
                                                        1 Kali</option>
                                                    <option data-id="2" value="2 Kali" {{ $data->frekwensi_kunjungan_dokter_pertahun == '2 Kali' ? 'selected' : '' }}>
                                                        2 Kali</option>
                                                    <option data-id="3" value="3 Kali" {{ $data->frekwensi_kunjungan_dokter_pertahun == '3 Kali' ? 'selected' : '' }}>
                                                        3 Kali</option>
                                                    <option data-id="4" value="> 3 Kali" {{ $data->frekwensi_kunjungan_dokter_pertahun == '> 3 Kali' ? 'selected' : '' }}>
                                                        > 3 Kali</option>
                                                    <option data-id="5" value="Tidak Pernah" {{ $data->frekwensi_kunjungan_dokter_pertahun == 'Tidak Pernah' ? 'selected' : '' }}>
                                                        Tidak Pernah</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" name="kondisi_fisik_sejak_lahir[]" style="width:100%;">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach ($kondisi_fisik_sejak_lahir as $key => $value)
                                                        <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->kondisi_fisik_sejak_lahir == $value)>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <!-- select option hanya di tampilkan jika tanggallahir masuk rentang umur balita -->
                                                <select class="form-control input-sm select2" name="status_gizi_balita[]" style="width:100%;" @if (!isBalita($data->tanggallahir)) disabled @endif>
                                                    <option value="">
                                                        @if (isBalita($data->tanggallahir))
                                                            -- Pilih --
                                                        @else
                                                            -- Bukan Balita --
                                                        @endif
                                                    </option>
                                                    @if (isBalita($data->tanggallahir))
                                                        @foreach ($status_gizi_balita as $key => $value)
                                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($data->status_gizi_balita == $value)>{{ $value }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <!-- cek apakah data bulanan anak sudah di isi jika belum di isi tampilkan pesan -->
                                                @if (isBalita($data->tanggallahir))
                                                    @if (!$data->isBulananAnak)
                                                        <small class="text-danger">Tambahkan data anak pada : <a href="{{ ci_route('stunting.pemantauan_anak') }}" target="_blank">halaman ini</a></small>
                                                    @endif
                                                @endif
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
{{-- pakai cara ini, karena menggunakan module_assets ternyata jadi 404 --}}
@include('datapresisi::assets.css.presisi')
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
                        jns_ansuransi_id: $("select[name='jns_ansuransi[]']").eq(i).find(":selected")
                            .data('id'),
                        jns_ansuransi: $("select[name='jns_ansuransi[]']").eq(i).val(),

                        jns_penggunaan_alat_kontrasepsi_id: $(
                            "select[name='jns_penggunaan_alat_kontrasepsi[]']").eq(i).find(
                            ":selected").data('id'),
                        jns_penggunaan_alat_kontrasepsi: $(
                            "select[name='jns_penggunaan_alat_kontrasepsi[]']").eq(i).val(),

                        jns_penyakit_diderita_id: $("select[name='jns_penyakit_diderita[]']").eq(i)
                            .find(":selected").data('id'),
                        jns_penyakit_diderita: $("select[name='jns_penyakit_diderita[]']").eq(i).val(),

                        frekwensi_kunjungan_faskes_pertahun_id: $(
                            "select[name='frekwensi_kunjungan_faskes_pertahun[]']").eq(i).find(
                            ":selected").data('id'),
                        frekwensi_kunjungan_faskes_pertahun: $(
                            "select[name='frekwensi_kunjungan_faskes_pertahun[]']").eq(i).val(),

                        frekwensi_rawat_inap_pertahun_id: $(
                            "select[name='frekwensi_rawat_inap_pertahun[]']").eq(i).find(
                            ":selected").data('id'),
                        frekwensi_rawat_inap_pertahun: $(
                            "select[name='frekwensi_rawat_inap_pertahun[]']").eq(i).val(),

                        frekwensi_kunjungan_dokter_pertahun_id: $(
                            "select[name='frekwensi_kunjungan_dokter_pertahun[]']").eq(i).find(
                            ":selected").data('id'),
                        frekwensi_kunjungan_dokter_pertahun: $(
                            "select[name='frekwensi_kunjungan_dokter_pertahun[]']").eq(i).val(),

                        kondisi_fisik_sejak_lahir_id: $("select[name='kondisi_fisik_sejak_lahir[]']")
                            .eq(i).find(":selected").data('id'),
                        kondisi_fisik_sejak_lahir: $("select[name='kondisi_fisik_sejak_lahir[]']").eq(i)
                            .val(),

                        status_gizi_balita_id: $("select[name='status_gizi_balita[]']").eq(i).find(
                            ":selected").data('id'),
                        status_gizi_balita: $("select[name='status_gizi_balita[]']").eq(i).val()
                    };
                }


                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.kesehatan.update', $kesehatan->rtm_id) }}",
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
