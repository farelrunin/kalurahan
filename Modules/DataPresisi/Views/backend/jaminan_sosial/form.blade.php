@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data Jaminan Sosial
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.jaminan-sosial') }}">Data Jaminan Sosial</a></li>
    <li class="active">Formulir</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.jaminan-sosial') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Jaminan
                        Sosial</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $jaminanSosial->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Kepala Rumah Tangga</td>
                            <td>:</td>
                            <td>{{ $jaminanSosial->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $jaminanSosial->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td>:</td>
                            <td> {{ $jaminanSosial->rtm->jumlah_kk }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td>:</td>
                            <td>{{ count($anggota) }}</td>
                        </tr>
                        <tr>
                            <td>Status Kelengkapan</td>
                            <td>:</td>
                            <td>
                                <select class="form-control input-sm select2" name="status_kelengkapan" id="status_kelengkapan" style="width:100%;">
                                    @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                        <option value="{{ $key }}" @selected($jaminanSosial->status_kelengkapan == $key)>{{ $value }}
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
                                    <th>TERDAFTAR DALAM DTKS</th>
                                    <th>JENIS BANTUAN SOSIAL YANG PERNAH DITERIMA</th>
                                    <th>JENIS GANGGUAN MENTAL YANG DIDERITA</th>
                                    <th>JENIS PENANGANAN PENDERITA GANGGUAN MENTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($anggota) > 0)
                                    @foreach ($anggota as $key => $data)
                                        <tr>
                                            <td class="padat">{{ $loop->iteration }}</td>
                                            <td>{{ $data->penduduk?->nik }}</td>
                                            <td>{{ $data->keluarga?->no_kk }}</td>
                                            <td nowrap>{{ strtoupper($data->penduduk?->nama) }}</td>
                                            <td>
                                                <select class="form-control input-sm select2" style="width:100%;" @disabled(true)>
                                                    <option value="">-- Pilih--</option>
                                                    @foreach (\Modules\DataPresisi\Enums\TerdaftarEnum::all() as $key => $value)
                                                        <option value="{{ $value }}" @selected($dtks == $key)>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2" style="width:100%;" name="items[{{ $data->uuid }}][jns_bantuan]">
                                                    @if ($defaultBantuan)
                                                        <option value="{{ $defaultBantuan }}" @selected(true)>
                                                            {{ $defaultBantuan }}</option>
                                                    @else
                                                        <option value="">-- Pilih--</option>
                                                        @foreach (\Modules\DataPresisi\Enums\JenisBantuanEnum::all() as $key => $value)
                                                            <option value="{{ $value }}" @selected($data->jns_bantuan == $key)>
                                                                {{ $value }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2 jns_gangguan_mental" style="width:100%;" name="items[{{ $data->uuid }}][jns_gangguan_mental]">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach (\Modules\DataPresisi\Enums\JenisGangguanMentalEnum::all() as $key => $value)
                                                        <option value="{{ $value }}" @selected($data->jns_gangguan_mental == $key)>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control input-sm select2 terapi_gangguan_mental" style="width:100%;" name="items[{{ $data->uuid }}][terapi_gangguan_mental]">
                                                    <option value="">-- Pilih--</option>
                                                    @foreach (\Modules\DataPresisi\Enums\PenangananGangguanMentalEnum::all() as $key => $value)
                                                        <option value="{{ $value }}" @selected($data->terapi_gangguan_mental == $key)>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="7">Data Tidak Tersedia</td>
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

            $('select.jns_gangguan_mental').change(function() {
                const selectedValue = $(this).val();
                if (selectedValue == 'Normal') {
                    $(this).closest('tr').find('select.terapi_gangguan_mental').val('Tidak Ada').prop(
                        'disabled', true).trigger('change');
                } else {
                    $(this).closest('tr').find('select.terapi_gangguan_mental').val('').prop('disabled',
                        false).trigger('change');
                }
            });

            $('#form-1').on('submit', function(ev) {
                ev.preventDefault();

                var formData = $('#form-1').serializeArray();
                // Tambahkan status_kelengkapan yang ada di luar form
                formData.push({
                    name: 'status_kelengkapan',
                    value: $('#status_kelengkapan').val()
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.jaminan-sosial.update', $jaminanSosial->uuid) }}",
                    data: formData,
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
