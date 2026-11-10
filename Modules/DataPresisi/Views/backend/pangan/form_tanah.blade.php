@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data PANGAN
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.pangan') }}">Data PANGAN</a></li>
    <li>Formulir</li>
    <li class="active">{{ $pageTitle ?? 'Tambah' }}</li>
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
                    <a href="{{ ci_route('data_presisi.pangan', $rtm_id) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Pangan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Detail Data
                        Pangan</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <div>
                        {!! form_open('', 'class="form-validasi" id="form-3"') !!}
                        <input type="hidden" name="rtm_id" value="{{ $rtm_id }}">
                        <div class="row">
                            <h4>Kepemilikan Lahan</h4>
                            <hr>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jumlah_anggota_keluarga">Jumlah anggota keluarga</label>
                                    <input id="jumlah_anggota_keluarga" readonly class="form-control input-sm luas" type="text" value="{{ $jumlah_anggota }}">
                                </div>
                            </div>

                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Status Lahan</label>
                                    <select class="form-control input-sm select2" id="status_lahan" name="status_lahan" style="width:100%;">
                                        @foreach ($status_lahan as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected(($pangan->status_lahan ?? Modules\DataPresisi\Enums\StatusLahanEnum::labelTidakMemiliki()) == $value)>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Lahan</label>
                                    <select class="form-control input-sm select2" name="jenis_lahan" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($jenis_lahan as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->jenis_lahan == $value)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="luas_lahan">Luas Lahan <code>(m<sup>2</sup>)</code></label>
                                    <input maxlength="99" name="luas_lahan" id="luas_lahan" class="form-control input-sm luas" type="text" value="{{ $pangan->luas_lahan }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="luas_tanam">Luas Tanam <code>(m<sup>2</sup>)</code></label>
                                    <input maxlength="99" name="luas_tanam" id="luas_tanam" class="form-control input-sm luas" type="text" value="{{ $pangan->luas_tanam }}">
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Komoditi Utama Tanaman Pangan</label>
                                    <select class="form-control input-sm select2" name="komoditi_utama_tanaman_pangan" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($komoditi_utama_tanaman_pangan as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan['komoditi_utama_tanaman_pangan'] == $value)>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Komoditi Tanaman Pangan Lainnya</label>
                                    <select class="form-control input-sm select2" name="komoditi_tanaman_pangan_lainnya" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($komoditi_tanaman_pangan_lainnya as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->komoditi_tanaman_pangan_lainnya == $value)>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jumlah_berdasarkan_jenis_komoditi">Jumlah Berdasakan jenis Komoditi </label>
                                    <input maxlength="99" name="jumlah_berdasarkan_jenis_komoditi" id="jumlah_berdasarkan_jenis_komoditi" class="form-control input-sm luas" type="text" value="{{ $pangan['jumlah_berdasarkan_jenis_komoditi'] }}">
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Usia Komoditi </label>
                                    <select class="form-control input-sm select2" name="usia_komoditi" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($usia_komoditi as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->usia_komoditi == $value)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Peternakan</label>
                                    <select class="form-control input-sm select2" name="jenis_peternakan" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($jenis_peternakan as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan['jenis_peternakan'] == $value)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jumlah_populasi">Jumlah Populasi</label>
                                    <input maxlength="99" name="jumlah_populasi" id="jumlah_populasi" class="form-control input-sm luas" type="text" value="{{ $pangan['jumlah_populasi'] }}">
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Jenis Perikanan</label>
                                    <select class="form-control input-sm select2" name="jenis_perikanan" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($jenis_perikanan as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan['jenis_perikanan'] == $value)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input name="longitude" id="longitude" class="form-control input-sm" type="text" value="{{ $pangan['longitude'] }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input name="latitude" id="latitude" class="form-control input-sm" type="text" value="{{ $pangan['latitude'] }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4>Kebutuhan Konsumsi Perhari</h4>
                            <hr>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Frekwensi Makan Per-Hari</label>
                                    <select class="form-control input-sm select2" name="frekwensi_makanan_perhari" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($frekwensi_makan as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->frekwensi_makanan_perhari == $value)>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Frekwensi Konsumsi Sayur Per-Hari</label>
                                    <select class="form-control input-sm select2" name="frekwensi_konsumsi_sayur_perhari" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($frekwensi_sayur as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->frekwensi_konsumsi_sayur_perhari == $value)>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Frekwensi Konsumsi Buah Per-Hari</label>
                                    <select class="form-control input-sm select2" name="frekwensi_konsumsi_buah_perhari" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($frekwensi_buah as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->frekwensi_konsumsi_buah_perhari == $value)>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label>Frekwensi Konsumsi Daging Per-Hari</label>
                                    <select class="form-control input-sm select2" name="frekwensi_konsumsi_daging_perhari" style="width:100%;">
                                        <option value="">-- Pilih--</option>
                                        @foreach ($frekwensi_daging as $key => $value)
                                            <option value="{{ $value }}" data-id="{{ $key }}" @selected($pangan->frekwensi_konsumsi_daging_perhari == $value)>{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr class="col-sm-12">
                            <div class="col-sm-12 text-center">
                                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class='fa fa-times'></i>Batal</button>
                                <button type="subumit" class="btn btn-social btn-info btn-sm"><i class="fa fa-check"></i>Simpan</button>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function show_when_otherwise_hide(condition, element_ids_to_show, element_ids_to_hide) {
            if (condition) {
                element_ids_to_show.forEach(function(el) {
                    $('#' + el).show();
                });
            } else {
                element_ids_to_hide.forEach(function(el) {
                    $('#' + el).hide();
                });
            }
        };
        $(document).ready(function() {
            $('#status_lahan').on('change', function() {
                let value = $(this).val();
                if (value == '{{ Modules\DataPresisi\Enums\StatusLahanEnum::labelTidakMemiliki() }}') {
                    $('.luas').prop('readonly', true);
                    $('.luas').not('#jumlah_anggota_keluarga').val('');

                    $('select[name="jenis_lahan"],select[name="komoditi_utama_tanaman_pangan"],select[name="komoditi_tanaman_pangan_lainnya"],select[name="usia_komoditi"],select[name="jenis_peternakan"],select[name="jenis_perikanan"]').val('')
                    $('select[name="jenis_lahan"],select[name="komoditi_utama_tanaman_pangan"],select[name="komoditi_tanaman_pangan_lainnya"],select[name="usia_komoditi"],select[name="jenis_peternakan"],select[name="jenis_perikanan"]').find('option').prop('disabled', true)
                    $('select[name="jenis_lahan"],select[name="komoditi_utama_tanaman_pangan"],select[name="komoditi_tanaman_pangan_lainnya"],select[name="usia_komoditi"],select[name="jenis_peternakan"],select[name="jenis_perikanan"]').trigger('change')
                } else {
                    $('.luas').prop('readonly', false);
                    $('select[name="jenis_lahan"],select[name="komoditi_utama_tanaman_pangan"],select[name="komoditi_tanaman_pangan_lainnya"],select[name="usia_komoditi"],select[name="jenis_peternakan"],select[name="jenis_perikanan"]').find('option').prop('disabled', false)
                }
            });
            $(document).ready(function() {
                $('#status_lahan').trigger('change');
            });
            $('#form-3').on('submit', function(ev) {
                ev.preventDefault();

                let form = $('#form-3').serializeArray();

                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.pangan.update', $pangan->uuid) }}",
                    data: form,
                    success: function(response) {
                        if (response.success) {

                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                            }).then(function() {
                                window.location.href = "{{ ci_route('data_presisi.pangan', $rtm_id) }}";
                            });

                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        let message = 'Terjadi kesalahan saat menyimpan data';

                        // Coba ambil pesan dari response JSON
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            message = xhr.responseJSON.message;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: message,
                        });
                    }
                });
            });
        });
    </script>
@endpush
