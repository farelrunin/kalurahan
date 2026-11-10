@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Kepemilikan Lahan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.kepemilikanLahanHutan') }}">Kepemilikan Lahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.kepemilikanLahanHutan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kepemilikan Lahan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun', ['controlLabel' => 'col-sm-4', 'controlInput' => 'col-sm-8'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control input-sm datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="milik_negara_ha" class="col-sm-4 control-label">- Milik Negara (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="milik_negara_ha" data-summary="jumlah_luas_hutan" value="{{ $default['milik_negara_ha'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_adat_ulayat_ha" class="col-sm-4 control-label">- Milik Adat/Ulayat (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="milik_adat_ulayat_ha" data-summary="jumlah_luas_hutan" value="{{ $default['milik_adat_ulayat_ha'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="perhutan_instansi_sektoral" class="col-sm-4 control-label">- Perhutan/Instansi Sektoral
                    (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="perhutan_instansi_sektoral" data-summary="jumlah_luas_hutan" value="{{ $default['perhutan_instansi_sektoral'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_masyarakat_perorangan" class="col-sm-4 control-label">- Milik Masyarakat Perorangan
                    (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="milik_masyarakat_perorangan" data-summary="jumlah_luas_hutan" value="{{ $default['milik_masyarakat_perorangan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="luas_hutan" class="col-sm-4 control-label text-primary">Luas Hutan (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_luas_hutan" readonly data-summary="jumlah_keluarga_petani_tanaman_kebun" value="{{ $default['luas_hutan'] ?? 0 }}">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
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
            $('input[name=milik_masyarakat_perorangan], input[name=jumlah_luas_hutan]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=milik_negara_ha], input[name=milik_adat_ulayat_ha], input[name=perhutan_instansi_sektoral]').inputmask(decimalObj);
            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })
        });
    </script>
@endpush
