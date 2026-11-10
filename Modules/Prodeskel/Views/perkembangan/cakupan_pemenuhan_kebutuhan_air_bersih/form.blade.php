@extends('admin.layouts.index')
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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Cakupan Pemenuhan Kebutuhan Air Bersih</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Cakupan Pemenuhan Kebutuhan Air Bersih</a>
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

            <div class="form-group">
                <label for="keluarga_menggunakan_sumur_gali" class="col-sm-4 control-label">Jumlah keluarga menggunakan
                    sumur gali</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_sumur_gali" value="{{ $default['keluarga_menggunakan_sumur_gali'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_pelanggan_pam" class="col-sm-4 control-label">Jumlah keluarga pelanggan PAM</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_pelanggan_pam" value="{{ $default['keluarga_pelanggan_pam'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_menggunakan_penampung_air_hujan" class="col-sm-4 control-label">Jumlah keluarga
                    menggunakan Penampung Air Hujan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_penampung_air_hujan" value="{{ $default['keluarga_menggunakan_penampung_air_hujan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_menggunakan_sumur_pompa" class="col-sm-4 control-label">Jumlah keluarga menggunakan
                    sumur pompa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_sumur_pompa" value="{{ $default['keluarga_menggunakan_sumur_pompa'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_menggunakan_perpipaan_air_kran" class="col-sm-4 control-label">Jumlah keluarga
                    menggunakan perpipaan air kran</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_perpipaan_air_kran" value="{{ $default['keluarga_menggunakan_perpipaan_air_kran'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_menggunakan_hidran_umum" class="col-sm-4 control-label">Jumlah keluarga menggunakan
                    hidran umum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_hidran_umum" value="{{ $default['keluarga_menggunakan_hidran_umum'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_menggunakan_air_sungai" class="col-sm-4 control-label">Jumlah keluarga menggunakan air
                    sungai</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_air_sungai" value="{{ $default['keluarga_menggunakan_air_sungai'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_menggunakan_embung" class="col-sm-4 control-label">Jumlah keluarga menggunakan
                    embung</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_menggunakan_embung" value="{{ $default['keluarga_menggunakan_embung'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_yang_menggunakan_mata_air" class="col-sm-4 control-label">Jumlah keluarga yang
                    menggunakan mata air</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_yang_menggunakan_mata_air" value="{{ $default['keluarga_yang_menggunakan_mata_air'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut" class="col-sm-4 control-label">Jumlah keluarga yang tidak mendapatkan akses air minum dari air
                    laut</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut" value="{{ $default['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas" class="col-sm-4 control-label">Jumlah keluarga yang tidak mendapatkan akses air minum dari sumber di
                    atas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas" value="{{ $default['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="total_jumlah_keluarga" class="col-sm-4 control-label">Total jumlah keluarga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="total_jumlah_keluarga" value="{{ $default['total_jumlah_keluarga'] ?? 0 }}">
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
            $('input[name=keluarga_menggunakan_sumur_gali], input[name=keluarga_pelanggan_pam], input[name=keluarga_menggunakan_penampung_air_hujan], input[name=keluarga_menggunakan_sumur_pompa], input[name=keluarga_menggunakan_perpipaan_air_kran], input[name=keluarga_menggunakan_hidran_umum], input[name=keluarga_menggunakan_air_sungai], input[name=keluarga_menggunakan_embung], input[name=keluarga_yang_menggunakan_mata_air], input[name=keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut], input[name=keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas], input[name=total_jumlah_keluarga]').inputmask(integerObj);

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
