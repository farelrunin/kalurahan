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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Rasio Guru dan Murid</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Rasio Guru dan Murid</a>
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
                <label for="guru_tk" class="col-sm-4 control-label">Jumlah guru TK dan kelompok bermain anak (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="guru_tk" name="guru_tk" value="{{ $default['guru_tk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="siswa_tk" class="col-sm-4 control-label">Jumlah siswa TK dan kelompok bermain anak
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="siswa_tk" name="siswa_tk" value="{{ $default['siswa_tk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="guru_sd" class="col-sm-4 control-label">Jumlah guru SD dan sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="guru_sd" name="guru_sd" value="{{ $default['guru_sd'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="siswa_sd" class="col-sm-4 control-label">Jumlah siswa SD dan sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="siswa_sd" name="siswa_sd" value="{{ $default['siswa_sd'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="guru_sltp" class="col-sm-4 control-label">Jumlah guru SLTP dan sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="guru_sltp" name="guru_sltp" value="{{ $default['guru_sltp'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="siswa_sltp" class="col-sm-4 control-label">Jumlah siswa SLTP dan sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="siswa_sltp" name="siswa_sltp" value="{{ $default['siswa_sltp'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="guru_slta" class="col-sm-4 control-label">Jumlah guru SLTA/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="guru_slta" name="guru_slta" value="{{ $default['guru_slta'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="siswa_slta" class="col-sm-4 control-label">Jumlah siswa SLTA/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="siswa_slta" name="siswa_slta" value="{{ $default['siswa_slta'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="siswa_slb" class="col-sm-4 control-label">Jumlah siswa SLB (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="siswa_slb" name="siswa_slb" value="{{ $default['siswa_slb'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="guru_slb" class="col-sm-4 control-label">Jumlah guru SLB (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="guru_slb" name="guru_slb" value="{{ $default['guru_slb'] ?? 0 }}">
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
            $('input[name=guru_tk], input[name=siswa_tk], input[name=guru_sd], input[name=siswa_sd], input[name=guru_sltp], input[name=siswa_sltp], input[name=guru_slta], input[name=siswa_slta], input[name=siswa_slb], input[name=guru_slb]').inputmask(integerObj);
        });
    </script>
@endpush
