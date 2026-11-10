@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@push('css')
    <style>
        .form-horizontal .form-group {
            margin-right: -10px;
            margin-left: -10px;
        }

        .form-horizontal .control-label {
            padding-top: 5px;
            padding-bottom: 5px;
            margin-bottom: 0;
        }
    </style>
@endpush

@section('title')
    <h1>
        Prodeskel
        <small>Hasil Hutan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.hasilHutan') }}">Hasil Hutan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.hasilHutan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Hasil Hutan</a>
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
                <label for="hasil_hutan" class="col-sm-2 control-label">Nama Komoditas</label>
                <div class="col-sm-10">
                    <select name="hasil_hutan" class="form-control select2 required">
                        <option value="">Pilih Komoditas</option>
                        @foreach (Modules\Prodeskel\Enums\KomoditasHasilHutanEnum::all() as $key => $item)
                            <option @selected($default['hasil_hutan'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="hasil_produksi" class="col-sm-2 control-label">Hasil Produksi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="hasil_produksi" value="{{ $default['hasil_produksi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="satuan" class="col-sm-2 control-label">Satuan</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label><input type="radio" name="satuan" @checked($default['satuan'] == 'BATANG/TH' || $default['satuan'] == '') value="BATANG/TH">
                            BATANG/TH</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="satuan" @checked($default['satuan'] == 'LITER/TH') value="LITER/TH">
                            LITER/TH</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="satuan" @checked($default['satuan'] == 'M3/TH') value="M3/TH">
                            M3/TH</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="satuan" @checked($default['satuan'] == 'TON/TH') value="TON/TH">
                            TON/TH</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="dijual_langsung_ke_konsumen" class="col-sm-2 control-label">Dijual Langsung Ke Konsumen</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_langsung_ke_konsumen'] == 1) ">
                        <input type="radio" name="dijual_langsung_ke_konsumen" class="form-check-input" @checked($default['dijual_langsung_ke_konsumen'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_langsung_ke_konsumen'] == 0)">
                        <input type="radio" name="dijual_langsung_ke_konsumen" class="form-check-input" @checked($default['dijual_langsung_ke_konsumen'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="dijual_ke_pasar" class="col-sm-2 control-label">Dijual Ke Pasar</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_ke_pasar'] == 1) ">
                        <input type="radio" name="dijual_ke_pasar" class="form-check-input" @checked($default['dijual_ke_pasar'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_ke_pasar'] == 0)">
                        <input type="radio" name="dijual_ke_pasar" class="form-check-input" @checked($default['dijual_ke_pasar'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="dijual_melalui_KUD" class="col-sm-2 control-label">Dijual Melalui KUD</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_melalui_KUD'] == 1) ">
                        <input type="radio" name="dijual_melalui_KUD" class="form-check-input" @checked($default['dijual_melalui_KUD'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_melalui_KUD'] == 0)">
                        <input type="radio" name="dijual_melalui_KUD" class="form-check-input" @checked($default['dijual_melalui_KUD'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="dijual_melalui_tengkulak" class="col-sm-2 control-label">Dijual Melalui Tengkulak</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_melalui_tengkulak'] == 1) ">
                        <input type="radio" name="dijual_melalui_tengkulak" class="form-check-input" @checked($default['dijual_melalui_tengkulak'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_melalui_tengkulak'] == 0)">
                        <input type="radio" name="dijual_melalui_tengkulak" class="form-check-input" @checked($default['dijual_melalui_tengkulak'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="dijual_melalui_pengecer" class="col-sm-2 control-label">Dijual Melalui Pengecer</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_melalui_pengecer'] == 1) ">
                        <input type="radio" name="dijual_melalui_pengecer" class="form-check-input" @checked($default['dijual_melalui_pengecer'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_melalui_pengecer'] == 0)">
                        <input type="radio" name="dijual_melalui_pengecer" class="form-check-input" @checked($default['dijual_melalui_pengecer'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="dijual_ke_lumbung_desa" class="col-sm-2 control-label">Dijual Ke Lumbung {{ ucwords(setting('sebutan_desa')) }}</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_ke_lumbung_desa'] == 1) ">
                        <input type="radio" name="dijual_ke_lumbung_desa" class="form-check-input" @checked($default['dijual_ke_lumbung_desa'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['dijual_ke_lumbung_desa'] == 0)">
                        <input type="radio" name="dijual_ke_lumbung_desa" class="form-check-input" @checked($default['dijual_ke_lumbung_desa'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="tidak_dijual" class="col-sm-2 control-label">Tidak Dijual</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['tidak_dijual'] == 1) ">
                        <input type="radio" name="tidak_dijual" class="form-check-input" @checked($default['tidak_dijual'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['tidak_dijual'] == 0)">
                        <input type="radio" name="tidak_dijual" class="form-check-input" @checked($default['tidak_dijual'] == 0) value="0" autocomplete="off">Tidak
                    </label>
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
            $('.angka-inputmask').inputmask(decimalObj);
        });
    </script>
@endpush
