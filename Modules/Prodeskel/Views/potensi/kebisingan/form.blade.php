@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Kebisingan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.kebisingan') }}">Kebisingan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.kebisingan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kebisingan</a>
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
                <label for="kebisingan" class="col-sm-2 control-label">Tingkat Kebisingan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasKebisinganEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebisingan" @if ($loop->first) required @endif @checked($default['kebisingan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="sumber_kebisingan" class="col-sm-2 control-label">Sumber Kebisingan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sumber_kebisingan" value="{{ $default['sumber_kebisingan'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="ekses_kebisingan" class="col-sm-2 control-label">Ekses Dampak Kebisingan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['ekses_kebisingan'] == 1) ">
                        <input type="radio" name="ekses_kebisingan" class="form-check-input" @checked($default['ekses_kebisingan'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['ekses_kebisingan'] == 0)">
                        <input type="radio" name="ekses_kebisingan" class="form-check-input" @checked($default['ekses_kebisingan'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="efek_kebisingan" class="col-sm-2 control-label">Efek Terhadap Penduduk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="efek_kebisingan" value="{{ $default['efek_kebisingan'] ?? '' }}">
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
