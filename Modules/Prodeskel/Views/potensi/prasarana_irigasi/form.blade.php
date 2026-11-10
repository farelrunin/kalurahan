@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Prasarana Irigasi</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.prasaranaIrigasi') }}">Prasarana Irigasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.prasaranaIrigasi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Irigasi</a>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="panjang_saluran_primer" class="col-sm-4 control-label">Panjang Saluran Primer
                            (M)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="panjang_saluran_primer" value="{{ $default['panjang_saluran_primer'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_saluran_sekunder" class="col-sm-4 control-label">Panjang Saluran Sekunder
                            (M)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="panjang_saluran_sekunder" value="{{ $default['panjang_saluran_sekunder'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="panjang_saluran_tersier" class="col-sm-4 control-label">Panjang Saluran Tersier
                            (M)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="panjang_saluran_tersier" value="{{ $default['panjang_saluran_tersier'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pintu_sadap" class="col-sm-4 control-label">Pintu Sadap (Unit)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="pintu_sadap" value="{{ $default['pintu_sadap'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pintu_pembagi_air" class="col-sm-4 control-label">Pintu Pembagi Air (Unit)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="pintu_pembagi_air" value="{{ $default['pintu_pembagi_air'] ?? 0 }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="saluran_primer_rusak" class="col-sm-4 control-label">Kondisi Rusak (M)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="saluran_primer_rusak" value="{{ $default['saluran_primer_rusak'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="saluran_sekunder_rusak" class="col-sm-4 control-label">Kondisi Rusak (M)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="saluran_sekunder_rusak" value="{{ $default['saluran_sekunder_rusak'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="saluran_tersier_rusak" class="col-sm-4 control-label">Kondisi Rusak (M)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="saluran_tersier_rusak" value="{{ $default['saluran_tersier_rusak'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="pintu_sadap_rusak" class="col-sm-4 control-label">Kondisi Rusak (Unit)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="pintu_sadap_rusak" value="{{ $default['pintu_sadap_rusak'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pintu_pembagi_air_rusak" class="col-sm-4 control-label">Kondisi Rusak (Unit)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask" name="pintu_pembagi_air_rusak" value="{{ $default['pintu_pembagi_air_rusak'] ?? 0 }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
            </form>
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
            $('input[name=pintu_sadap], input[name=pintu_pembagi_air], input[name=pintu_sadap_rusak], input[name=pintu_pembagi_air_rusak]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=panjang_saluran_primer], input[name=panjang_saluran_sekunder], input[name=panjang_saluran_tersier], input[name=saluran_primer_rusak], input[name=saluran_sekunder_rusak], input[name=saluran_tersier_rusak]').inputmask(decimalObj);;
        });
    </script>
@endpush
