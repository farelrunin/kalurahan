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
    <li>Tanaman Pangan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.kepemilikanLahan') }}">Kepemilikan Lahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.kepemilikanLahan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kepemilikan Lahan</a>
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
                <label for="memiliki_kurang_10_ha" class="col-sm-4 control-label">- Memiliki Kurang 10 Ha (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="memiliki_kurang_10_ha" data-summary="jumlah_keluarga_memiliki_tanah" value="{{ $default['memiliki_kurang_10_ha'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="memiliki_10_50_ha" class="col-sm-4 control-label">- Memiliki 10 - 50 Ha (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="memiliki_10_50_ha" data-summary="jumlah_keluarga_memiliki_tanah" value="{{ $default['memiliki_10_50_ha'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="memiliki_50_100_ha" class="col-sm-4 control-label">- Memiliki 50 - 100 Ha (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="memiliki_50_100_ha" data-summary="jumlah_keluarga_memiliki_tanah" value="{{ $default['memiliki_50_100_ha'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="memiliki_lebih_dari_100_ha" class="col-sm-4 control-label">- Memiliki Lebih Dari 100 Ha
                    (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="memiliki_lebih_dari_100_ha" data-summary="jumlah_keluarga_memiliki_tanah" value="{{ $default['memiliki_lebih_dari_100_ha'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_keluarga_memiliki_tanah" class="col-sm-4 control-label text-primary">Jumlah Keluarga
                    Memiliki Tanah (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_keluarga_memiliki_tanah" readonly data-summary="jumlah_keluarga_petani_tanaman_pangan" value="{{ $default['jumlah_keluarga_memiliki_tanah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_keluarga_tidak_memiliki_tanah" class="col-sm-4 control-label">Jumlah Keluarga Tidak
                    Memiliki Tanah (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_keluarga_tidak_memiliki_tanah" data-summary="jumlah_keluarga_petani_tanaman_pangan" value="{{ $default['jumlah_keluarga_tidak_memiliki_tanah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_keluarga_petani_tanaman_pangan" class="col-sm-4 control-label text-primary">Jumlah
                    Keluarga Petani Tanaman Pangan (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_keluarga_petani_tanaman_pangan" readonly value="{{ $default['jumlah_keluarga_petani_tanaman_pangan'] ?? 0 }}">
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
            $('input[name=memiliki_kurang_10_ha], input[name=memiliki_10_50_ha], input[name=memiliki_50_100_ha], input[name=memiliki_lebih_dari_100_ha], input[name=jumlah_keluarga_memiliki_tanah], input[name=jumlah_keluarga_tidak_memiliki_tanah], input[name=jumlah_keluarga_petani_tanaman_pangan]').inputmask(integerObj);
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
