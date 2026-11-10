@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Perkembangan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kualitas Persalinan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kualitas Persalinan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::perkembangan.bulan_tahun', ['controlLabel' => 'col-sm-4', 'controlInput' => 'col-sm-8'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Tempat Persalinan</label>
            </div>
            <div class="form-group">
                <label for="persalinan_rumah_sakit_umum" class="col-sm-4 control-label">Tempat persalinan Rumah Sakit Umum
                    (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_rumah_sakit_umum" value="{{ $default['persalinan_rumah_sakit_umum'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_rumah_bersalin" class="col-sm-4 control-label">Tempat persalinan Rumah Bersalin
                    (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_rumah_bersalin" value="{{ $default['persalinan_rumah_bersalin'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_puskesmas" class="col-sm-4 control-label">Tempat persalinan Puskesmas (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_puskesmas" value="{{ $default['persalinan_puskesmas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_polindes" class="col-sm-4 control-label">Tempat persalinan Polindes (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_polindes" value="{{ $default['persalinan_polindes'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_balai_kesehatan_ibu_anak" class="col-sm-4 control-label">Tempat persalinan Balai
                    Kesehatan Ibu dan Anak (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_balai_kesehatan_ibu_anak" value="{{ $default['persalinan_balai_kesehatan_ibu_anak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_rumah_praktek_bidan" class="col-sm-4 control-label">Tempat persalinan Rumah Praktek
                    Bidan (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_rumah_praktek_bidan" value="{{ $default['persalinan_rumah_praktek_bidan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="praktek_dokter" class="col-sm-4 control-label">Tempat praktek dokter (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="praktek_dokter" value="{{ $default['praktek_dokter'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="rumah_dukun" class="col-sm-4 control-label">Rumah dukun (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="rumah_dukun" value="{{ $default['rumah_dukun'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="rumah_sendiri" class="col-sm-4 control-label">Rumah sendiri (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="rumah_sendiri" value="{{ $default['rumah_sendiri'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pertolongan Persalinan</label>
            </div>
            <div class="form-group">
                <label for="persalinan_ditolong_dokter" class="col-sm-4 control-label">Jumlah Persalinan ditolong Dokter
                    (Tindakan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_ditolong_dokter" value="{{ $default['persalinan_ditolong_dokter'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_ditolong_bidan" class="col-sm-4 control-label">Jumlah persalinan ditolong bidan
                    (Tindakan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_ditolong_bidan" value="{{ $default['persalinan_ditolong_bidan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_ditolong_perawat" class="col-sm-4 control-label">Jumlah persalinan ditolong perawat
                    (Tindakan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_ditolong_perawat" value="{{ $default['persalinan_ditolong_perawat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_ditolong_dukun_bersalin" class="col-sm-4 control-label">Jumlah persalinan ditolong
                    dukun bersalin (Tindakan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_ditolong_dukun_bersalin" value="{{ $default['persalinan_ditolong_dukun_bersalin'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persalinan_ditolong_keluarga" class="col-sm-4 control-label">Jumlah persalinan ditolong keluarga
                    (Tindakan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="persalinan_ditolong_keluarga" value="{{ $default['persalinan_ditolong_keluarga'] ?? 0 }}">
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                Simpan</button>
        </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bootstrap/js/jquery.inputmask.js') }}"></script>
    <script>
        @include('prodeskel::assets.extension.numeric')
        $(document).ready(function() {
                        @include('prodeskel::assets.script')
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=persalinan_rumah_sakit_umum], input[name=persalinan_rumah_bersalin], input[name=persalinan_puskesmas], input[name=persalinan_polindes], input[name=persalinan_balai_kesehatan_ibu_anak], input[name=persalinan_rumah_praktek_bidan], input[name=praktek_dokter], input[name=rumah_dukun], input[name=rumah_sendiri], input[name=persalinan_ditolong_dokter], input[name=persalinan_ditolong_bidan], input[name=persalinan_ditolong_perawat], input[name=persalinan_ditolong_dukun_bersalin], input[name=persalinan_ditolong_keluarga]').inputmask(integerObj);

            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })
        });
    </script>
@endpush
