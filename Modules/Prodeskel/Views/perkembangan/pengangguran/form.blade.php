@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Ekonomi Masyarakat</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Ekonomi Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pengangguran</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pengangguran</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::perkembangan.bulan_tahun', ['controlLabel' => 'col-sm-4', 'controlInput' => 'col-sm-8'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_angkatan_kerja" class="col-sm-4 control-label">Jumlah Angkatan Kerja (penduduk usia 18-56
                    tahun) (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_angkatan_kerja" name="jumlah_angkatan_kerja" value="{{ $default['jumlah_angkatan_kerja'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_masih_sekolah_tidak_bekerja" class="col-sm-4 control-label">Jumlah penduduk usia
                    18-56 tahun yang masih sekolah dan tidak bekerja (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_masih_sekolah_tidak_bekerja" name="jumlah_penduduk_masih_sekolah_tidak_bekerja" value="{{ $default['jumlah_penduduk_masih_sekolah_tidak_bekerja'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_ibu_rumah_tangga" class="col-sm-4 control-label">Jumlah penduduk usia 18-56
                    tahun yang menjadi ibu rumah tangga (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_ibu_rumah_tangga" name="jumlah_penduduk_ibu_rumah_tangga" value="{{ $default['jumlah_penduduk_ibu_rumah_tangga'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_bekerja_penuh" class="col-sm-4 control-label">Jumlah penduduk usia 18-56 tahun
                    yang bekerja penuh (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_bekerja_penuh" name="jumlah_penduduk_bekerja_penuh" value="{{ $default['jumlah_penduduk_bekerja_penuh'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_bekerja_tidak_tentu" class="col-sm-4 control-label">Jumlah penduduk usia 18-56
                    tahun yang bekerja tidak tentu (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_bekerja_tidak_tentu" name="jumlah_penduduk_bekerja_tidak_tentu" value="{{ $default['jumlah_penduduk_bekerja_tidak_tentu'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_cacat_tidak_bekerja" class="col-sm-4 control-label">Jumlah penduduk usia 18-56
                    tahun yang cacat dan tidak bekerja (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_cacat_tidak_bekerja" name="jumlah_penduduk_cacat_tidak_bekerja" value="{{ $default['jumlah_penduduk_cacat_tidak_bekerja'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_cacat_bekerja" class="col-sm-4 control-label">Jumlah penduduk usia 18-56 tahun
                    yang cacat dan bekerja (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_cacat_bekerja" name="jumlah_penduduk_cacat_bekerja" value="{{ $default['jumlah_penduduk_cacat_bekerja'] ?? 0 }}">
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
@endsection

@push('scripts')
    <script src="{{ asset('bootstrap/js/jquery.inputmask.js') }}"></script>
    <script>
        @include('prodeskel::assets.extension.numeric')
        $(document).ready(function() {
                        @include('prodeskel::assets.script')
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_angkatan_kerja], input[name=jumlah_penduduk_masih_sekolah_tidak_bekerja], input[name=jumlah_penduduk_ibu_rumah_tangga], input[name=jumlah_penduduk_bekerja_penuh], input[name=jumlah_penduduk_bekerja_tidak_tentu], input[name=jumlah_penduduk_cacat_tidak_bekerja], input[name=jumlah_penduduk_cacat_bekerja]').inputmask(integerObj);
        });
    </script>
@endpush
