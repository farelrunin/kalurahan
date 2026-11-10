@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Prasarana Kebersihan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.saranaKebersihan') }}">Prasarana Kebersihan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.saranaKebersihan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Kebersihan</a>
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
                <label for="luas" class="col-sm-2 control-label">Tempat Pembungan Sementara (Lokasi)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tempat_pembungan_sementara" value="{{ $default['tempat_pembungan_sementara'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Tempat Pembungan Akhir (Tpa/Lokasi)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tempat_pembungan_akhir" value="{{ $default['tempat_pembungan_akhir'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_penghancur_incenerator" class="col-sm-2 control-label">Alat Penghancur /
                    Incenerator</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['alat_penghancur_incenerator'] == 1) ">
                        <input type="radio" name="alat_penghancur_incenerator" class="form-check-input" @checked($default['alat_penghancur_incenerator'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['alat_penghancur_incenerator'] == 0)">
                        <input type="radio" name="alat_penghancur_incenerator" class="form-check-input" @checked($default['alat_penghancur_incenerator'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Gerobak Sampah (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="gerobak_sampah" value="{{ $default['gerobak_sampah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Tong Sampah (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tong_sampah" value="{{ $default['tong_sampah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Truk Pengangkut Sampah (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="truk_pengangkut_sampah" value="{{ $default['truk_pengangkut_sampah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Satgas Kebersihan (Kelompok)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="satgas_kebersihan" value="{{ $default['satgas_kebersihan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Anggota Satgas Kebersihan (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="anggota_satgas_kebersihan" value="{{ $default['anggota_satgas_kebersihan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="luas" class="col-sm-2 control-label">Pemulung (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="pemulung" value="{{ $default['pemulung'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tingkat_pemanfaatan" class="col-sm-2 control-label">Tempat Pengelolaan Sampah</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pengelolaan_sampah'] == 1) ">
                        <input type="radio" name="pengelolaan_sampah" class="form-check-input" @checked($default['pengelolaan_sampah'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pengelolaan_sampah'] == 0)">
                        <input type="radio" name="pengelolaan_sampah" class="form-check-input" @checked($default['pengelolaan_sampah'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="sarana_kebersihan" class="col-sm-2 control-label">Pengelolaan Sampah Lingkungan/RT</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\SaranaKebersihanEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="sarana_kebersihan" @if ($loop->first) required @endif @checked($default['sarana_kebersihan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="tingkat_pemanfaatan" class="col-sm-2 control-label">Pengelola Sampah Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pengelolaan_sampah_dll'] == 1) ">
                        <input type="radio" name="pengelolaan_sampah_dll" class="form-check-input" @checked($default['pengelolaan_sampah_dll'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pengelolaan_sampah_dll'] == 0)">
                        <input type="radio" name="pengelolaan_sampah_dll" class="form-check-input" @checked($default['pengelolaan_sampah_dll'] == 0) value="0" autocomplete="off">Tidak Ada
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
