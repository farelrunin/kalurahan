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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Cakupan Imunisasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Cakupan Imunisasi</a>
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
                <label for="bayi_usia_2_bulan" class="col-sm-4 control-label">Jumlah Bayi usia 2 bulan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_usia_2_bulan" value="{{ $default['bayi_usia_2_bulan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_2_bulan_imunisasi_dpt_1_bcg_dan_polio_1" class="col-sm-4 control-label">Jumlah bayi 2 bulan
                    Imunisasi DPT-1, BCG dan Polio -1</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_2_bulan_imunisasi_dpt_1_bcg_dan_polio_1" value="{{ $default['bayi_2_bulan_imunisasi_dpt_1_bcg_dan_polio_1'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="bayi_usia_3_bulan" class="col-sm-4 control-label">Jumlah bayi usia 3 bulan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_usia_3_bulan" value="{{ $default['bayi_usia_3_bulan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_3_bulan_yang_imunisasi_dpt_2_dan_polio_2" class="col-sm-4 control-label">Jumlah bayi 3
                    bulan yang imunisasi DPT-2 dan Polio-2</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_3_bulan_yang_imunisasi_dpt_2_dan_polio_2" value="{{ $default['bayi_3_bulan_yang_imunisasi_dpt_2_dan_polio_2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_usia_4_bulan" class="col-sm-4 control-label">Jumlah bayi usia 4 bulan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_usia_4_bulan" value="{{ $default['bayi_usia_4_bulan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_4_bulan_yang_imunisasi_dpt_3_dan_polio_3" class="col-sm-4 control-label">Jumlah bayi 4
                    bulan yang imunisasi DPT-3 dan Polio-3</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_4_bulan_yang_imunisasi_dpt_3_dan_polio_3" value="{{ $default['bayi_4_bulan_yang_imunisasi_dpt_3_dan_polio_3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_9_bulan" class="col-sm-4 control-label">Jumlah bayi 9 bulan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_9_bulan" value="{{ $default['bayi_9_bulan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_9_bulan_yang_imunisasi_campak" class="col-sm-4 control-label">Jumlah bayi 9 bulan yang
                    imunisasi campak</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_9_bulan_yang_imunisasi_campak" value="{{ $default['bayi_9_bulan_yang_imunisasi_campak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bayi_yang_sudah_imunisasi_cacar" class="col-sm-4 control-label">Jumlah bayi yang sudah imunisasi
                    cacar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="bayi_yang_sudah_imunisasi_cacar" value="{{ $default['bayi_yang_sudah_imunisasi_cacar'] ?? 0 }}">
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
            $('input[name=bayi_usia_2_bulan], input[name=bayi_2_bulan_imunisasi_dpt_1_bcg_dan_polio_1], input[name=bayi_usia_3_bulan], input[name=bayi_3_bulan_yang_imunisasi_dpt_2_dan_polio_2], input[name=bayi_usia_4_bulan], input[name=bayi_4_bulan_yang_imunisasi_dpt_3_dan_polio_3], input[name=bayi_9_bulan], input[name=bayi_9_bulan_yang_imunisasi_campak], input[name=bayi_yang_sudah_imunisasi_cacar]').inputmask(integerObj);

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
