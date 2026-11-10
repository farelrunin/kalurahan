@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Prasarana dan Sarana Angkutan Lainnya</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.angkutanLainnya') }}">Prasarana dan Sarana Angkutan
            Lainnya</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.angkutanLainnya') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana dan Sarana Angkutan Lainnya</a>
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
                <label for="sarana_angkutan_lainnya" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\SaranaAngkutanLainEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="sarana_angkutan_lainnya" @if ($loop->first) required @endif @checked($default['sarana_angkutan_lainnya'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Jenis Sarana/Prasarana Jumlah (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
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
            $('input[name=jumlah]').inputmask(integerObj);
        });
    </script>
@endpush
