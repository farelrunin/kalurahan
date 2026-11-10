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
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pencurian</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pencurian</a>
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
                <label for="kejadian" class="col-sm-4 control-label">Kasus pencurian dan perampokan yang terjadi tahun
                    ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kejadian" value="{{ $default['kejadian'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="korban" class="col-sm-4 control-label">Kasus pencurian/perampokan yang korbannya penduduk
                    desa/kelurahan setempat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="korban" value="{{ $default['korban'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pelaku" class="col-sm-4 control-label">Kasus pencurian/perampokan yang pelakunya penduduk
                    desa/kelurahan setempat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pelaku" value="{{ $default['pelaku'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pencurian" class="col-sm-4 control-label">Jumlah pencurian dengan kekerasan senjata
                    api</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pencurian" value="{{ $default['jumlah_pencurian'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pelaku" class="col-sm-4 control-label">Jumlah pelaku yang diadili atau diproses secara
                    hukum (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pelaku" value="{{ $default['jumlah_pelaku'] ?? 0 }}">
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
            $('input[name=jumlah_pencurian], input[name=jumlah_pelaku]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=kejadian], input[name=korban], input[name=pelaku]').inputmask(decimalObj);
        });
    </script>
@endpush
