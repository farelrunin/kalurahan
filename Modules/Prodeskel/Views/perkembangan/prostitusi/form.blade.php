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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Prostitusi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prostitusi</a>
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
                <label for="penduduk" class="col-sm-4 control-label">Jumlah penduduk pekerja pramu nikmat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penduduk" value="{{ $default['penduduk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="lokalisasi" class="col-sm-4 control-label">Lokaliasi prostitusi</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="lokalisasi" class="required" @checked($default['lokalisasi'] !== null && $default['lokalisasi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="wanita_pramunikmat" class="col-sm-4 control-label">Jumlah tempat yang menyediakan wanita
                    pramunikmat secara terselubung (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="wanita_pramunikmat" value="{{ $default['wanita_pramunikmat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kasus" class="col-sm-4 control-label">Jumlah kasus/konflik akibat maraknya praktek prostitusi
                    (Kasus)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kasus" value="{{ $default['kasus'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pembinaan" class="col-sm-4 control-label">Jumlah pembinaan pelaku prostitusi (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pembinaan" value="{{ $default['pembinaan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penertiban" class="col-sm-4 control-label">Jumlah penertiban penyediaan tempat prostitusi
                    (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penertiban" value="{{ $default['penertiban'] ?? 0 }}">
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
            $('input[name=penduduk], input[name=wanita_pramunikmat], input[name=kasus], input[name=pembinaan], input[name=penertiban]').inputmask(integerObj);
        });
    </script>
@endpush
