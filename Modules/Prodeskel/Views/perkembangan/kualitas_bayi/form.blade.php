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
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kualitas Bayi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kualitas Bayi</a>
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
                <label for="keguguran_kandungan" class="col-sm-4 control-label">Jumlah Keguguran Kandungan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="keguguran_kandungan" value="{{ $default['keguguran_kandungan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_lahir" class="col-sm-4 control-label">Jumlah Bayi Lahir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_lahir" value="{{ $default['bayi_lahir'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_lahir_mati" class="col-sm-4 control-label">Jumlah Bayi Lahir Mati</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_lahir_mati" value="{{ $default['bayi_lahir_mati'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_lahir_hidup" class="col-sm-4 control-label">Jumlah Bayi Lahir Hidup</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_lahir_hidup" value="{{ $default['bayi_lahir_hidup'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_mati_usia_0_1_bulan" class="col-sm-4 control-label">Jumlah Bayi Mati Usia 0-1 Bulan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_mati_usia_0_1_bulan" value="{{ $default['bayi_mati_usia_0_1_bulan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_mati_usia_1_12_bulan" class="col-sm-4 control-label">Jumlah Bayi Mati Usia 1-12
                    Bulan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_mati_usia_1_12_bulan" value="{{ $default['bayi_mati_usia_1_12_bulan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_lahir_berat_kurang_dari_2_5_kg" class="col-sm-4 control-label">Jumlah Bayi Lahir Berat
                    Kurang dari 2,5 Kg</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_lahir_berat_kurang_dari_2_5_kg" value="{{ $default['bayi_lahir_berat_kurang_dari_2_5_kg'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental" class="col-sm-4 control-label">Jumlah Bayi 0-5 Tahun Hidup yang Menderita Kelainan Organ Tubuh Fisik dan
                    Mental</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental" value="{{ $default['bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental'] ?? 0 }}">
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
            $('input[name=keguguran_kandungan], input[name=bayi_lahir], input[name=bayi_lahir_mati], input[name=bayi_lahir_hidup], input[name=bayi_mati_usia_0_1_bulan], input[name=bayi_mati_usia_1_12_bulan], input[name=bayi_lahir_berat_kurang_dari_2_5_kg], input[name=bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental]').inputmask(integerObj);

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
