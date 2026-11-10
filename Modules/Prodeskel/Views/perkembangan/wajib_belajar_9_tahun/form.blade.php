@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Pendidikan Masyarakat</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Pendidikan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Wajib Belajar 9 Tahun</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Wajib Belajar 9 Tahun</a>
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
                <label for="penduduk" class="col-sm-4 control-label">Jumlah penduduk usia 7-15 tahun (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="penduduk" name="penduduk" value="{{ $default['penduduk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="masih_sekolah" class="col-sm-4 control-label">Jumlah penduduk usia 7-15 tahun yang masih sekolah
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="masih_sekolah" name="masih_sekolah" value="{{ $default['masih_sekolah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tidak_sekolah" class="col-sm-4 control-label">Jumlah penduduk usia 7-15 tahun yang tidak sekolah
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="tidak_sekolah" name="tidak_sekolah" value="{{ $default['tidak_sekolah'] ?? 0 }}">
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
            $('input[name=penduduk], input[name=masih_sekolah], input[name=tidak_sekolah]').inputmask(integerObj);
        });
    </script>
@endpush
