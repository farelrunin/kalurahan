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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kekerasan Dalam Rumah Tangga</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kekerasan Dalam Rumah Tangga</a>
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
                <label for="suami" class="col-sm-4 control-label">Jumlah kasus kekerasan suami terhadap istri</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="suami" value="{{ $default['suami'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="istri" class="col-sm-4 control-label">Jumlah kasus kekerasan istri terhadap suami</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="istri" value="{{ $default['istri'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ortu" class="col-sm-4 control-label">Jumlah kasus kekerasan orang tua terhadap anak</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="ortu" value="{{ $default['ortu'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="anak" class="col-sm-4 control-label">Jumlah kasus kekerasan anak terhadap orang tua</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="anak" value="{{ $default['anak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kepala_keluarga" class="col-sm-4 control-label">Jumlah kasus kekerasan kepala keluarga terhadap
                    anggota keluarga lainnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kepala_keluarga" value="{{ $default['kepala_keluarga'] ?? 0 }}">
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
            $('input[name=suami], input[name=istri], input[name=ortu], input[name=anak], input[name=kepala_keluarga]').inputmask(integerObj);
        });
    </script>
@endpush
