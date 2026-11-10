@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Air Panas</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Sumber Daya Air</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.airPanas') }}">Air Panas</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.airPanas') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Air Panas</a>
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
                <label for="air_panas" class="col-sm-2 control-label">Jenis Sumber</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasAirPanasEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="air_panas" @if ($loop->first) required @endif @checked($default['air_panas'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_lokasi" class="col-sm-2 control-label">Jumlah Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_lokasi" value="{{ $default['jumlah_lokasi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pemanfaatan" class="col-sm-2 control-label">Pemanfaatan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\PemanfaatanAirPanasEnum::all() as $key => $item)
                        <div class="checkbox">
                            <label><input type="checkbox" name="pemanfaatan[]" @checked(in_array($key, $default['pemanfaatan'] ?? [])) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="kepemilikan" class="col-sm-2 control-label">Kepemilikan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KepemilikanAirPanasEnum::all() as $key => $item)
                        <div class="checkbox">
                            <label><input type="checkbox" name="kepemilikan[]" @checked(in_array($key, $default['kepemilikan'] ?? [])) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
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
