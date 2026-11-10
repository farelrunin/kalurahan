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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.sanitasi') }}">Prasarana Sanitasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.sanitasi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Sanitasi</a>
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
                <label for="sumur_resapan" class="col-sm-2 control-label">Sumur Serapan Air Rumah Tangga (Rumah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="sumur_resapan" value="{{ $default['sumur_resapan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="mck_umum" class="col-sm-2 control-label">MCK Umum (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="mck_umum" value="{{ $default['mck_umum'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jamban_keluarga" class="col-sm-2 control-label">Jamban Keluarga (KK)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jamban_keluarga" value="{{ $default['jamban_keluarga'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kondisi_saluran" class="col-sm-2 control-label">Pengelola Sampah Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kondisi_saluran'] == 1) ">
                        <input type="radio" name="kondisi_saluran" class="form-check-input" @checked($default['kondisi_saluran'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kondisi_saluran'] == 0)">
                        <input type="radio" name="kondisi_saluran" class="form-check-input" @checked($default['kondisi_saluran'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="sanitasi" class="col-sm-2 control-label">Kondisi Saluran Drainase / Saluran</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\SanitasiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="sanitasi" @if ($loop->first) required @endif @checked($default['sanitasi'] == $key) value="{{ $key }}"> {{ $item }}</label>
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
            $('input[name=mck_umum], input[name=jamban_keluarga]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=sumur_resapan]').inputmask(decimalObj);
        });
    </script>
@endpush
