@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Kepemilikan Lahan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.kualitasAir') }}">Kualitas Sumber Air</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.kualitasAir') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kualitas Sumber Air</a>
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
                <label for="kualitas_air" class="col-sm-2 control-label">Jenis Air Minum</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasKualitasAirEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kualitas_air" @if ($loop->first) required @endif @checked($default['kualitas_air'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="dijual_ke_lumbung_desa" class="col-sm-2 control-label">Baik</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['baik'] == 1) ">
                        <input type="radio" name="baik" class="form-check-input" @checked($default['baik'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['baik'] == 0)">
                        <input type="radio" name="baik" class="form-check-input" @checked($default['baik'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="dijual_ke_lumbung_desa" class="col-sm-2 control-label">Berbau</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['berbau'] == 1) ">
                        <input type="radio" name="berbau" class="form-check-input" @checked($default['berbau'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['berbau'] == 0)">
                        <input type="radio" name="berbau" class="form-check-input" @checked($default['berbau'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="dijual_ke_lumbung_desa" class="col-sm-2 control-label">Berwarna</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['berwarna'] == 1) ">
                        <input type="radio" name="berwarna" class="form-check-input" @checked($default['berwarna'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['berwarna'] == 0)">
                        <input type="radio" name="berwarna" class="form-check-input" @checked($default['berwarna'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="dijual_ke_lumbung_desa" class="col-sm-2 control-label">Berasa</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['berasa'] == 1) ">
                        <input type="radio" name="berasa" class="form-check-input" @checked($default['berasa'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['berasa'] == 0)">
                        <input type="radio" name="berasa" class="form-check-input" @checked($default['berasa'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
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
            $('.angka-inputmask').inputmask(decimalObj);
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
