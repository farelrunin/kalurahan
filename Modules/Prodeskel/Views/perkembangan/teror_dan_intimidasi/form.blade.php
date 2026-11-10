@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Keamanan dan Ketertiban</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Teror dan Intimidasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Teror dan Intimidasi</a>
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
                <label for="intimidasi_pihak_dalam" class="col-sm-4 control-label">Jumlah kasus intimidasi dan atau teror
                    anggota masyarakat dari pihak dalam desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="intimidasi_pihak_dalam" value="{{ $default['intimidasi_pihak_dalam'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="intimidasi_pihak_luar" class="col-sm-4 control-label">Jumlah kasus intimidasi dan atau teror
                    anggota masyarakat dari pihak luar desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="intimidasi_pihak_luar" value="{{ $default['intimidasi_pihak_luar'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="selebaran_gelap" class="col-sm-4 control-label">Jumlah kasus selebaran gelap dan atau isu yang
                    bersifat teror dan ancaman untuk menimbulkan ketakukan penduduk</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="selebaran_gelap" value="{{ $default['selebaran_gelap'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="terorisme" class="col-sm-4 control-label">Jumlah kasus terorisme yang terjadi di desa dan
                    kelurahan pada tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="terorisme" value="{{ $default['terorisme'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hasutan" class="col-sm-4 control-label">Jumlah kasus hasutan dan pemaksaan kehendak kelompok
                    tertentu kepada masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="hasutan" value="{{ $default['hasutan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penyelesaian" class="col-sm-4 control-label">Jumlah penyelesaian kasus teror dan intimidasi
                    serta hasutam di masyarakat baik secara adat maupun hukum formal</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penyelesaian" value="{{ $default['penyelesaian'] ?? 0 }}">
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
            $('input[name=intimidasi_pihak_dalam], input[name=intimidasi_pihak_luar], input[name=selebaran_gelap], input[name=terorisme], input[name=hasutan], input[name=penyelesaian]').inputmask(integerObj);
        });
    </script>
@endpush
