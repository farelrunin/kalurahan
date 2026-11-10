@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Ruang Publik</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.ruangPublik') }}">Ruang Publik</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.ruangPublik') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Ruang Publik</a>
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
                <label for="ruang_publik" class="col-sm-2 control-label">Jenis Ruang Publik/Taman</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasRuangPublikEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ruang_publik" @if ($loop->first) required @endif @checked($default['ruang_publik'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="keberadaan" class="col-sm-2 control-label">Keberadaan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan'] == 1) ">
                        <input type="radio" name="keberadaan" class="form-check-input" @checked($default['keberadaan'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan'] == 0)">
                        <input type="radio" name="keberadaan" class="form-check-input" @checked($default['keberadaan'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Luas (M2)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="luas" value="{{ $default['luas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tingkat_pemanfaatan" class="col-sm-2 control-label">Tingkat Pemanfaatan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['tingkat_pemanfaatan'] == 1) ">
                        <input type="radio" name="tingkat_pemanfaatan" class="form-check-input" @checked($default['tingkat_pemanfaatan'] == 1) value="1" autocomplete="off">Aktif
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['tingkat_pemanfaatan'] == 0)">
                        <input type="radio" name="tingkat_pemanfaatan" class="form-check-input" @checked($default['tingkat_pemanfaatan'] == 0) value="0" autocomplete="off">Pasif
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
        });
    </script>
@endpush
