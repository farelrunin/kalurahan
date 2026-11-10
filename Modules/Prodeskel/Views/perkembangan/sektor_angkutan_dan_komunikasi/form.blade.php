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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Angkutan dan Komunikasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Angkutan dan Komunikasi</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Angkutan</label>
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
                <label for="jumlah_jenis_kegiatan_pengangkutan" class="col-sm-4 control-label">Jumlah jenis kegiatan
                    pengangkutan orang dan barang dengan alat angkut kendaraan jalan raya, laut, rel, udara, dan sungai /
                    danau / penyeberangan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_jenis_kegiatan_pengangkutan" value="{{ $default['jumlah_jenis_kegiatan_pengangkutan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_total_kendaraan_angkutan" class="col-sm-4 control-label">Jumlah total kendaraan
                    angkutan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_total_kendaraan_angkutan" value="{{ $default['jumlah_total_kendaraan_angkutan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_total_transaksi_pengangkutan" class="col-sm-4 control-label">Nilai total transaksi
                    pengangkutan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_total_transaksi_pengangkutan" value="{{ $default['nilai_total_transaksi_pengangkutan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_total_biaya_yang_dikeluarkan" class="col-sm-4 control-label">Nilai total biaya yang
                    dikeluarkan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_total_biaya_yang_dikeluarkan" value="{{ $default['nilai_total_biaya_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Jasa Penunjang Angkutan</label>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_kegiatan_jasa_pelabuhan" class="col-sm-4 control-label">Jumlah jenis kegiatan jasa
                    pelabuhan, terminal, tambatan, agensi, ekspedisi, tol, bongkar muat dan parkir</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_jenis_kegiatan_jasa_pelabuhan" value="{{ $default['jumlah_jenis_kegiatan_jasa_pelabuhan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_total_nilai_transaksi_jasa_penunjang_angkutan" class="col-sm-4 control-label">Jumlah
                    total nilai transaksi jasa penunjang angkutan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_total_nilai_transaksi_jasa_penunjang_angkutan" value="{{ $default['jumlah_total_nilai_transaksi_jasa_penunjang_angkutan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_biaya_antara_yang_dikeluarkan" class="col-sm-4 control-label">Nilai biaya antara yang
                    dikeluarkan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_biaya_antara_yang_dikeluarkan" value="{{ $default['nilai_biaya_antara_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Komunikasi</label>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_kegiatan_informasi_dan_telekomunikasi_serta_jasa_penunjang_lainnya" class="col-sm-4 control-label">Jumlah jenis kegiatan informasi dan telekomunikasi serta jasa penunjang
                    lainnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_jenis_kegiatan_informasi_dan_telekomunikasi_serta_jasa_penunjang_lainnya" value="{{ $default['jumlah_jenis_kegiatan_informasi_dan_telekomunikasi_serta_jasa_penunjang_lainnya'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_nilai_aset_telekomunikasi_dan_informasi_yang_ada" class="col-sm-4 control-label">Jumlah
                    nilai aset telekomunikasi dan informasi yang ada</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_nilai_aset_telekomunikasi_dan_informasi_yang_ada" value="{{ $default['jumlah_nilai_aset_telekomunikasi_dan_informasi_yang_ada'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_transaksi_informasi_dan_telekomunikasi_yang_dicapai" class="col-sm-4 control-label">Nilai
                    transaksi informasi dan telekomunikasi yang dicapai</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="nilai_transaksi_informasi_dan_telekomunikasi_yang_dicapai" value="{{ $default['nilai_transaksi_informasi_dan_telekomunikasi_yang_dicapai'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_antara_yang_dikeluarkan" class="col-sm-4 control-label">Biaya antara yang
                    dikeluarkan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="biaya_antara_yang_dikeluarkan" value="{{ $default['biaya_antara_yang_dikeluarkan'] ?? 0 }}">
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
            $('input[name=jumlah_jenis_kegiatan_pengangkutan], input[name=jumlah_total_kendaraan_angkutan], input[name=jumlah_jenis_kegiatan_jasa_pelabuhan], input[name=jumlah_total_nilai_transaksi_jasa_penunjang_angkutan], input[name=jumlah_jenis_kegiatan_informasi_dan_telekomunikasi_serta_jasa_penunjang_lainnya], input[name=jumlah_nilai_aset_telekomunikasi_dan_informasi_yang_ada]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=nilai_total_transaksi_pengangkutan], input[name=nilai_total_biaya_yang_dikeluarkan], input[name=nilai_biaya_antara_yang_dikeluarkan], input[name=nilai_transaksi_informasi_dan_telekomunikasi_yang_dicapai], input[name=biaya_antara_yang_dikeluarkan]').inputmask(decimalObj);

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
