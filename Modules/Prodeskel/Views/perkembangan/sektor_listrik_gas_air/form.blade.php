@extends('admin.layouts.index')
@include('prodeskel::assets.style')
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
    <li>Produk Domestik Desa Bruto</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Listrik, Gas dan Air Minum</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Listrik, Gas dan Air Minum</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Listrik</label>
            </div>
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
                <label for="jumlah_jenis_kegiatan_pembangkit_dan_penyaluran_tenaga_listrik" class="col-sm-4 control-label">Jumlah Jenis Kegiatan Pembangkit Dan Penyaluran Tenaga Listrik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_jenis_kegiatan_pembangkit_dan_penyaluran_tenaga_listrik" value="{{ $default['jumlah_jenis_kegiatan_pembangkit_dan_penyaluran_tenaga_listrik'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_nilai_produksi_listrik" class="col-sm-4 control-label">Jumlah Nilai Produksi
                    Listrik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_nilai_produksi_listrik" value="{{ $default['jumlah_nilai_produksi_listrik'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_total_nilai_transaksi" class="col-sm-4 control-label">Jumlah Total Nilai
                    Transaksi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_total_nilai_transaksi" value="{{ $default['jumlah_total_nilai_transaksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_biaya_antara_yang_dikeluarkan" class="col-sm-4 control-label">Jumlah Biaya Antara Yang
                    Dikeluarkan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_biaya_antara_yang_dikeluarkan" value="{{ $default['jumlah_biaya_antara_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Gas</label>
            </div>
            <div class="form-group">
                <label for="jumlah_kegiatan_penyediaan_gas" class="col-sm-4 control-label">Jumlah Kegiatan Penyediaan
                    Gas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kegiatan_penyediaan_gas" value="{{ $default['jumlah_kegiatan_penyediaan_gas'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_aset_produksi_gas" class="col-sm-4 control-label">Nilai Aset Produksi Gas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_aset_produksi_gas" value="{{ $default['nilai_aset_produksi_gas'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_transaksi" class="col-sm-4 control-label">Nilai Transaksi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_transaksi" value="{{ $default['nilai_transaksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_antara_yang_dikeluarkan" class="col-sm-4 control-label">Biaya Antara Yang
                    Dikeluarkan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="biaya_antara_yang_dikeluarkan" value="{{ $default['biaya_antara_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Air Minum</label>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum" class="col-sm-4 control-label">Jumlah
                    Jenis Kegiatan Penyediaan Dan Penyaluran Air Minum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum" value="{{ $default['jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_aset_penyediaan_air_minum" class="col-sm-4 control-label">Nilai Aset Penyediaan Air
                    Minum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_aset_penyediaan_air_minum" value="{{ $default['nilai_aset_penyediaan_air_minum'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_produksi_air_minum" class="col-sm-4 control-label">Nilai Produksi Air Minum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_produksi_air_minum" value="{{ $default['nilai_produksi_air_minum'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_transaksi_air_minum" class="col-sm-4 control-label">Nilai Transaksi Air Minum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_transaksi_air_minum" value="{{ $default['nilai_transaksi_air_minum'] ?? 0 }}">
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
            $('input[name=jumlah_jenis_kegiatan_pembangkit_dan_penyaluran_tenaga_listrik], input[name=jumlah_nilai_produksi_listrik], input[name=jumlah_total_nilai_transaksi], input[name=jumlah_biaya_antara_yang_dikeluarkan], input[name=jumlah_kegiatan_penyediaan_gas], input[name=jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=nilai_aset_produksi_gas], input[name=nilai_transaksi], input[name=biaya_antara_yang_dikeluarkan], input[name=nilai_aset_penyediaan_air_minum], input[name=nilai_produksi_air_minum], input[name=nilai_transaksi_air_minum]').inputmask(decimalObj);

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
