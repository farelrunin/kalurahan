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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kualitas Ibu Hamil</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kualitas Ibu Hamil</a>
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
                <label for="ibu_hamil" class="col-sm-4 control-label">Jumlah Ibu Hamil (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil" value="{{ $default['ibu_hamil'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_periksa_di_posyandu" class="col-sm-4 control-label">Jumlah Ibu Hamil Periksa di
                    Posyandu (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_periksa_di_posyandu" value="{{ $default['ibu_hamil_periksa_di_posyandu'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_periksa_di_puskesmas" class="col-sm-4 control-label">Jumlah Ibu Hamil Periksa di
                    Puskesmas (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_periksa_di_puskesmas" value="{{ $default['ibu_hamil_periksa_di_puskesmas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_periksa_di_rumah_sakit" class="col-sm-4 control-label">Jumlah Ibu Hamil Periksa di
                    Rumah Sakit (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_periksa_di_rumah_sakit" value="{{ $default['ibu_hamil_periksa_di_rumah_sakit'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_periksa_di_dokter_praktek" class="col-sm-4 control-label">Jumlah Ibu Hamil Periksa di
                    Dokter Praktek (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_periksa_di_dokter_praktek" value="{{ $default['ibu_hamil_periksa_di_dokter_praktek'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_periksa_di_bidan_praktek" class="col-sm-4 control-label">Jumlah Ibu Hamil Periksa di
                    Bidan Praktek (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_periksa_di_bidan_praktek" value="{{ $default['ibu_hamil_periksa_di_bidan_praktek'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_periksa_di_dukun_terlatih" class="col-sm-4 control-label">Jumlah Ibu Hamil Periksa di
                    Dukun Terlatih (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_periksa_di_dukun_terlatih" value="{{ $default['ibu_hamil_periksa_di_dukun_terlatih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kematian_ibu_hamil" class="col-sm-4 control-label">Jumlah Kematian Ibu Hamil (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="kematian_ibu_hamil" value="{{ $default['kematian_ibu_hamil'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_hamil_melahirkan" class="col-sm-4 control-label">Jumlah Ibu Hamil Melahirkan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_hamil_melahirkan" value="{{ $default['ibu_hamil_melahirkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_nifas" class="col-sm-4 control-label">Jumlah Ibu Nifas (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_nifas" value="{{ $default['ibu_nifas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kematian_ibu_nifas" class="col-sm-4 control-label">Jumlah Kematian Ibu Nifas (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="kematian_ibu_nifas" value="{{ $default['kematian_ibu_nifas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ibu_nifas_hidup" class="col-sm-4 control-label">Jumlah Ibu Nifas Hidup (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="ibu_nifas_hidup" value="{{ $default['ibu_nifas_hidup'] ?? 0 }}">
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
            $('input[name=ibu_hamil], input[name=ibu_hamil_periksa_di_posyandu], input[name=ibu_hamil_periksa_di_puskesmas], input[name=ibu_hamil_periksa_di_rumah_sakit], input[name=ibu_hamil_periksa_di_dokter_praktek], input[name=ibu_hamil_periksa_di_bidan_praktek], input[name=ibu_hamil_periksa_di_dukun_terlatih], input[name=kematian_ibu_hamil], input[name=ibu_hamil_melahirkan], input[name=ibu_nifas], input[name=kematian_ibu_nifas], input[name=ibu_nifas_hidup]').inputmask(integerObj);

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
