@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Lahan dan Pakan Ternak</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lahanPakanTernak') }}">Lahan dan Pakan Ternak</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lahanPakanTernak') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lahan dan Pakan Ternak</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Ketersediaan Hijauan Pakan Ternak</label>
            </div>
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
                <label for="luas_tanaman_pakan_ternak" class="col-sm-4 control-label">Luas Tanaman Pakan Ternak/Rumput
                    (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="luas_tanaman_pakan_ternak" value="{{ $default['luas_tanaman_pakan_ternak'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="produksi_hijauan" class="col-sm-4 control-label">Produksi Hijauan Makanan Ternak
                    (Ton/Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="produksi_hijauan" value="{{ $default['produksi_hijauan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="dipasok_luar" class="col-sm-4 control-label">Dipasok Dari Luar Desa/Kelurahan (Ton)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="dipasok_luar" value="{{ $default['dipasok_luar'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="disubsidi_dinas" class="col-sm-4 control-label">Disubsidi Dinas (Ton)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="disubsidi_dinas" value="{{ $default['disubsidi_dinas'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="ketersediaan_lainnya" class="col-sm-4 control-label">Lainnya (Ton)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="ketersediaan_lainnya" value="{{ $default['ketersediaan_lainnya'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Ketersediaan Hijauan Pakan Ternak</label>
            </div>
            <div class="form-group">
                <label for="milik_masyarakat" class="col-sm-4 control-label">Milik Masyarakat Umum (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="milik_masyarakat" data-summary="luas_lahan_gembalan" value="{{ $default['milik_masyarakat'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_perusahaan" class="col-sm-4 control-label">Milik Perusahaan Peternakan/Ranch (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="milik_perusahaan" data-summary="luas_lahan_gembalan" value="{{ $default['milik_perusahaan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_perorangan" class="col-sm-4 control-label">Milik Perorangan (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="milik_perorangan" data-summary="luas_lahan_gembalan" value="{{ $default['milik_perorangan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="sewa_pakai" class="col-sm-4 control-label">Sewa Pakai (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="sewa_pakai" data-summary="luas_lahan_gembalan" value="{{ $default['sewa_pakai'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_pemerintah" class="col-sm-4 control-label">Milik Pemerintah (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="milik_pemerintah" data-summary="luas_lahan_gembalan" value="{{ $default['milik_pemerintah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_adat" class="col-sm-4 control-label">Milik Masyarakat Adat (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="milik_adat" data-summary="luas_lahan_gembalan" value="{{ $default['milik_adat'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="milik_lainnya" class="col-sm-4 control-label">Lainnya (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="milik_lainnya" data-summary="luas_lahan_gembalan" value="{{ $default['milik_lainnya'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="luas_lahan_gembalan" class="col-sm-4 control-label text-primary">Luas Lahan Gembalan
                    (Ha)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="luas_lahan_gembalan" readonly value="{{ $default['luas_lahan_gembalan'] ?? 0 }}">
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
            $('input[name=milik_perorangan]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=luas_tanaman_pakan_ternak], input[name=produksi_hijauan], input[name=dipasok_luar], input[name=disubsidi_dinas], input[name=ketersediaan_lainnya], input[name=milik_masyarakat], input[name=milik_perusahaan], input[name=sewa_pakai], input[name=milik_pemerintah], input[name=milik_adat], input[name=milik_lainnya], input[name=luas_lahan_gembalan]').inputmask(decimalObj);
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
