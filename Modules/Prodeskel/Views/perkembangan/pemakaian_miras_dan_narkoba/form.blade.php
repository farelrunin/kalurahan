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
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pemakaian Miras dan Narkoba</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Perkelahian</a>
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
                <label for="warung_miras" class="col-sm-4 control-label">Jumlah warung/toko yang menyediakan Miras
                    (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="warung_miras" value="{{ $default['warung_miras'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penduduk_miras" class="col-sm-4 control-label">Jumlah penduduk yang mengkonsumsi Miras
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penduduk_miras" value="{{ $default['penduduk_miras'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="mabuk_miras" class="col-sm-4 control-label">Jumlah kasus mabuk akibat Miras (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="mabuk_miras" value="{{ $default['mabuk_miras'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengedar_narkoba" class="col-sm-4 control-label">Jumlah pengedar Narkoba (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pengedar_narkoba" value="{{ $default['pengedar_narkoba'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penduduk_narkoba" class="col-sm-4 control-label">Jumlah penduduk yang mengkonsumsi Narkoba
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penduduk_narkoba" value="{{ $default['penduduk_narkoba'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="mabuk_narkoba" class="col-sm-4 control-label">Jumlah kasus mabuk/teler akibat Narkoba
                    (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="mabuk_narkoba" value="{{ $default['mabuk_narkoba'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kematian_narkoba" class="col-sm-4 control-label">Jumlah kasus kematian akibat Narkoba
                    (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kematian_narkoba" value="{{ $default['kematian_narkoba'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pelaku_miras" class="col-sm-4 control-label">Jumlah pelaku Miras yang diadili atau diproses
                    secara hukum (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pelaku_miras" value="{{ $default['pelaku_miras'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pelaku_narkoba" class="col-sm-4 control-label">Jumlah pelaku Narkoba yang diadili atau diproses
                    secara hukum (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pelaku_narkoba" value="{{ $default['pelaku_narkoba'] ?? 0 }}">
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
            $('input[name=warung_miras], input[name=penduduk_miras], input[name=mabuk_miras], input[name=pengedar_narkoba], input[name=penduduk_narkoba], input[name=mabuk_narkoba], input[name=kematian_narkoba], input[name=pelaku_miras], input[name=pelaku_narkoba]').inputmask(integerObj);
        });
    </script>
@endpush
