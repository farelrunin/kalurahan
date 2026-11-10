@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Kualitas Udara</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.kualitasUdara') }}">Kualitas Udara</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.kualitasUdara') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kualitas Udara</a>
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
                <label for="kualitas_udara" class="col-sm-2 control-label">Sumber Pencemaran</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasKualitasUdaraEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kualitas_udara" @if ($loop->first) required @endif @checked($default['kualitas_udara'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_lokasi" class="col-sm-2 control-label">Jumlah Lokasi Sumber Pencemaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_lokasi" value="{{ $default['jumlah_lokasi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_polutan" class="col-sm-2 control-label">Jenis Polutan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis_polutan" value="{{ $default['jenis_polutan'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="efek_kesehatan" class="col-sm-2 control-label">Efek Kesehatan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\EfekKualitasUdaraEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="efek_kesehatan" @if ($loop->first) required @endif @checked($default['efek_kesehatan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="kepemilikan_pemda" class="col-sm-2 control-label">Kepemilikan Pemda</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepemilikan_pemda'] == 1) ">
                        <input type="radio" name="kepemilikan_pemda" class="form-check-input" @checked($default['kepemilikan_pemda'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepemilikan_pemda'] == 0)">
                        <input type="radio" name="kepemilikan_pemda" class="form-check-input" @checked($default['kepemilikan_pemda'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepemilikan_swasta" class="col-sm-2 control-label">Kepemilikan Swasta</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepemilikan_swasta'] == 1) ">
                        <input type="radio" name="kepemilikan_swasta" class="form-check-input" @checked($default['kepemilikan_swasta'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepemilikan_swasta'] == 0)">
                        <input type="radio" name="kepemilikan_swasta" class="form-check-input" @checked($default['kepemilikan_swasta'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepemilikan_perorangan" class="col-sm-2 control-label">Kepemilikan Perorangan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepemilikan_perorangan'] == 1) ">
                        <input type="radio" name="kepemilikan_perorangan" class="form-check-input" @checked($default['kepemilikan_perorangan'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepemilikan_perorangan'] == 0)">
                        <input type="radio" name="kepemilikan_perorangan" class="form-check-input" @checked($default['kepemilikan_perorangan'] == 0) value="0" autocomplete="off">Tidak
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
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_lokasi]').inputmask(integerObj);
        });
    </script>
@endpush
