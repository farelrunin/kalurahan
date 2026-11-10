@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Keamanan dan Ketertiban</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kejahatan Seksual</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kejahatan Seksual</a>
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
                <label for="kejadian" class="col-sm-4 control-label">Jumlah kasus perkosaan pada tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kejadian" value="{{ $default['kejadian'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="anak" class="col-sm-4 control-label">Jumlah kasus perkosaan pada anak tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="anak" value="{{ $default['anak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hukum_negara" class="col-sm-4 control-label">Jumlah kasus kehamilan di luar nikah menurut hukum
                    negara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="hukum_negara" value="{{ $default['hukum_negara'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hukum_adat" class="col-sm-4 control-label">Jumlah kasus kehamilan di luar nikah menurut hukum
                    adat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="hukum_adat" value="{{ $default['hukum_adat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penampungan" class="col-sm-4 control-label">Jumlah tempat penampungan/persewaan kamar bagi
                    pekerja seks</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penampungan" value="{{ $default['penampungan'] ?? 0 }}">
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
            $('input[name=kejadian], input[name=anak], input[name=hukum_negara], input[name=hukum_adat], input[name=penampungan]').inputmask(integerObj);
        });
    </script>
@endpush
