@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Sumber Air Bersih</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.sumberAir') }}">Sumber Air Bersih</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.sumberAir') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sumber Air Bersih</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group">
                <label for="tahun" class="col-sm-2 control-label">Tahun {{ $default['tahun'] }}</label>
                <div class="col-sm-10">
                    <select name="tahun" class="form-control required">
                        @for ($i = $default['tahun'] - 2; $i <= $default['tahun']; $i++)
                            <option @selected($default['tahun'] == $i) value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
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
                <label for="jenis_sumber_air" class="col-sm-2 control-label">Jenis Sumber Air Bersih</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\JenisSumberAirEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jenis_sumber_air" class="required" @checked($default['jenis_sumber_air'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Jumlah (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pemanfaat" class="col-sm-2 control-label">Pemanfaat KK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="pemanfaat" value="{{ $default['pemanfaat'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kondisi" class="col-sm-2 control-label">Kondisi</label>
                <div class="col-sm-10" style="display: flex;">
                    @foreach (Modules\Prodeskel\Enums\KondisiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kondisi" @checked($default['kondisi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
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
            $('input[name=jumlah], input[name=pemanfaat]').inputmask(integerObj);
        });
    </script>
@endpush
