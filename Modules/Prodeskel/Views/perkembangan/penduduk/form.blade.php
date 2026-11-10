@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Perkembangan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Perkembangan Kependudukan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Penduduk dan Kepala Keluarga</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Penduduk dan Kepala Keluarga</a>
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
                <label for="jumlah_penduduk_laki_laki_tahun_ini" class="col-sm-4 control-label">Jumlah Penduduk Laki-Laki
                    Tahun ini (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_penduduk_laki_laki_tahun_ini" value="{{ $default['jumlah_penduduk_laki_laki_tahun_ini'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_penduduk_perempuan_tahun_ini" class="col-sm-4 control-label">Jumlah Penduduk Perempuan
                    Tahun ini (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_penduduk_perempuan_tahun_ini" value="{{ $default['jumlah_penduduk_perempuan_tahun_ini'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_penduduk_laki_laki_tahun_lalu" class="col-sm-4 control-label">Jumlah Penduduk Laki-Laki
                    Tahun Lalu (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_penduduk_laki_laki_tahun_lalu" value="{{ $default['jumlah_penduduk_laki_laki_tahun_lalu'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_penduduk_perempuan_tahun_lalu" class="col-sm-4 control-label">Jumlah Penduduk Perempuan
                    Tahun Lalu (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_penduduk_perempuan_tahun_lalu" value="{{ $default['jumlah_penduduk_perempuan_tahun_lalu'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kepala_keluarga_laki_laki_tahun_ini" class="col-sm-4 control-label">Jumlah Kepala
                    Keluarga Laki-Laki Tahun ini (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kepala_keluarga_laki_laki_tahun_ini" value="{{ $default['jumlah_kepala_keluarga_laki_laki_tahun_ini'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kepala_keluarga_perempuan_tahun_ini" class="col-sm-4 control-label">Jumlah Kepala
                    Keluarga Perempuan Tahun ini (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kepala_keluarga_perempuan_tahun_ini" value="{{ $default['jumlah_kepala_keluarga_perempuan_tahun_ini'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kepala_keluarga_laki_laki_tahun_lalu" class="col-sm-4 control-label">Jumlah Kepala
                    Keluarga Laki-Laki Tahun Lalu (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kepala_keluarga_laki_laki_tahun_lalu" value="{{ $default['jumlah_kepala_keluarga_laki_laki_tahun_lalu'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kepala_keluarga_perempuan_tahun_lalu" class="col-sm-4 control-label">Jumlah Kepala
                    Keluarga Perempuan Tahun Lalu (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kepala_keluarga_perempuan_tahun_lalu" value="{{ $default['jumlah_kepala_keluarga_perempuan_tahun_lalu'] ?? 0 }}">
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
            $('input[name=jumlah_penduduk_laki_laki_tahun_ini], input[name=jumlah_penduduk_perempuan_tahun_ini], input[name=jumlah_penduduk_laki_laki_tahun_lalu], input[name=jumlah_penduduk_perempuan_tahun_lalu], input[name=jumlah_kepala_keluarga_laki_laki_tahun_ini], input[name=jumlah_kepala_keluarga_perempuan_tahun_ini], input[name=jumlah_kepala_keluarga_laki_laki_tahun_lalu], input[name=jumlah_kepala_keluarga_perempuan_tahun_lalu]').inputmask(integerObj);
        });
    </script>
@endpush
