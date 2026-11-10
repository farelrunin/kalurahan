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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.saranaEnergi') }}">Prasarana Energi dan Penerangan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.saranaEnergi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Energi dan Penerangan</a>
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
                <label for="sarana_energi" class="col-sm-2 control-label">Listrik PLN (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="sarana_energi" value="{{ $default['sarana_energi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="diesel_umum" class="col-sm-2 control-label">Diesel Umum (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="diesel_umum" value="{{ $default['diesel_umum'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="genset_pribadi" class="col-sm-2 control-label">Genset Pribadi (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="genset_pribadi" value="{{ $default['genset_pribadi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="lampu_minyak" class="col-sm-2 control-label">Lampu Minyak Tanah / Jarak / Kelapak (KK)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="lampu_minyak" value="{{ $default['lampu_minyak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kayu_bakar" class="col-sm-2 control-label">Kayu Bakar (KK)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kayu_bakar" value="{{ $default['kayu_bakar'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batu_bara" class="col-sm-2 control-label">Batu Bara (KK)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="batu_bara" value="{{ $default['batu_bara'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanpa_penerangan" class="col-sm-2 control-label">Tanpa Penerangan (KK)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tanpa_penerangan" value="{{ $default['tanpa_penerangan'] ?? 0 }}">
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
            $('input[name=sarana_energi], input[name=diesel_umum], input[name=genset_pribadi], input[name=lampu_minyak], input[name=kayu_bakar], input[name=batu_bara], input[name=tanpa_penerangan]').inputmask(integerObj);
        });
    </script>
@endpush
