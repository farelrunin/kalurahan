@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Potensi Wisata</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.airBersih') }}">Prasarana Air Bersih</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.airBersih') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Air Bersih</a>
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
                <label for="air_bersih" class="col-sm-2 control-label">Sumur Pompa (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="air_bersih" value="{{ $default['air_bersih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="sumur_gali" class="col-sm-2 control-label">Sumur Gali (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="sumur_gali" value="{{ $default['sumur_gali'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hidran_umum" class="col-sm-2 control-label">Hidran Umum (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="hidran_umum" value="{{ $default['hidran_umum'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penampung_air" class="col-sm-2 control-label">Penampung Air Hujan (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="penampung_air" value="{{ $default['penampung_air'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tangki_air" class="col-sm-2 control-label">Tangki Air Bersih (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tangki_air" value="{{ $default['tangki_air'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="embung" class="col-sm-2 control-label">Embung (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="embung" value="{{ $default['embung'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="mata_air" class="col-sm-2 control-label">Mata Air (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="mata_air" value="{{ $default['mata_air'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bangunan" class="col-sm-2 control-label">Bangunan Pengelolaan Air (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="bangunan" value="{{ $default['bangunan'] ?? 0 }}">
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
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=air_bersih], input[name=sumur_gali], input[name=hidran_umum], input[name=penampung_air], input[name=tangki_air], input[name=embung], input[name=mata_air], input[name=bangunan]').inputmask(integerObj);
        });
    </script>
@endpush
