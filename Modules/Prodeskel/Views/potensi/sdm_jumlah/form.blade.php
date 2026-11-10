@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Jumlah</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Manusia</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.sdmJumlah') }}">Jumlah</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.sdmJumlah') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Jumlah</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_laki" class="col-sm-2 control-label">Jumlah Laki-Laki (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah_warga" name="jumlah_laki" value="{{ $default['jumlah_laki'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pr" class="col-sm-2 control-label">Jumlah Perempuan (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah_warga" name="jumlah_pr" value="{{ $default['jumlah_pr'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_warga" class="col-sm-2 control-label text-primary">Jumlah Total (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah_warga" value="{{ $default['jumlah_warga'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kk" class="col-sm-2 control-label">Jumlah Kepala Keluarga (KK)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kk" value="{{ $default['jumlah_kk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Luas {{ ucwords(setting('sebutan_desa')) }} (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="luas" value="{{ $default['luas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kepadatan" class="col-sm-2 control-label text-primary">Kepadatan Penduduk (Jiwa/Km2)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control text-right" readonly name="kepadatan" value="{{ $default['kepadatan'] ?? 0 }}">
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
            // Gunakan integerObj untuk field jumlah orang dan KK
            $('input[name=jumlah_laki], input[name=jumlah_pr], input[name=jumlah_warga], input[name=jumlah_kk]').inputmask(integerObj);
            // Gunakan decimalObj untuk field luas (bisa desimal)
            $('input[name=luas]').inputmask(decimalObj);
            
            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })

            $('input[name=luas], input[name=jumlah_warga]').change(function() {
                let luasKm = getRawValue('luas') / 100; // Convert Ha to Km2
                let warga = getRawValue('jumlah_warga');
                let kepadatan = luasKm > 0 ? parseFloat(warga / luasKm) : 0

                $('input[name=kepadatan]').val(indonesiaFormat(kepadatan))
            })

        });
    </script>
@endpush
