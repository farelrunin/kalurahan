@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Produk Domestik Desa Bruto</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Produk Domestik Desa Bruto</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Jasa-Jasa</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Jasa-Jasa</a>
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
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Jasa Pemerintahan Umum</label>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat" class="col-sm-4 control-label">Jumlah jenis jasa pelayanan pemerintahan kepada masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat" name="jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat" value="{{ $default['jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp" class="col-sm-4 control-label">Nilai transaksi pelayanan pemerintahan kepada masyarakat (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp" name="nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp" value="{{ $default['nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_yang_dikeluarkan_dalam_pelayanan_rp" class="col-sm-4 control-label">Biaya yang dikeluarkan
                    dalam pelayanan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_yang_dikeluarkan_dalam_pelayanan_rp" name="biaya_yang_dikeluarkan_dalam_pelayanan_rp" value="{{ $default['biaya_yang_dikeluarkan_dalam_pelayanan_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Jasa Swasta</label>
            </div>
            <div class="form-group">
                <label for="jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis" class="col-sm-4 control-label">Jumlah usaha jasa pelayanan sosial yang disediakan masyarakat
                    (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis" name="jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis"
                        value="{{ $default['jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_aset_produksi_jasa_pelayanan_sosial_rp" class="col-sm-4 control-label">Nilai aset produksi
                    jasa pelayanan sosial (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_aset_produksi_jasa_pelayanan_sosial_rp" name="nilai_aset_produksi_jasa_pelayanan_sosial_rp" value="{{ $default['nilai_aset_produksi_jasa_pelayanan_sosial_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_yang_dikeluarkan_rp" class="col-sm-4 control-label">Biaya yang dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_yang_dikeluarkan_rp" name="biaya_yang_dikeluarkan_rp" value="{{ $default['biaya_yang_dikeluarkan_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Jasa Hiburan Dan Rekreasi</label>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis" class="col-sm-4 control-label">Jumlah jenis jasa
                    hiburan dan rekreasi (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis" name="jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis" value="{{ $default['jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp" class="col-sm-4 control-label">Nilai
                    transaksi usaha jasa hiburan dan rekreasi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp" name="nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp" value="{{ $default['nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_antara_yang_dikeluarkan_rp" class="col-sm-4 control-label">Biaya antara yang dikeluarkan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_antara_yang_dikeluarkan_rp" name="biaya_antara_yang_dikeluarkan_rp" value="{{ $default['biaya_antara_yang_dikeluarkan_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Jasa Perorangan Dan Rumah Tangga</label>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis" class="col-sm-4 control-label">Jumlah jenis kegiatan jasa pelayanan perorangan dan rumah tanggan
                    (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis" name="jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis"
                        value="{{ $default['jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp" class="col-sm-4 control-label">Nilai
                    aset jasa pelayanan perorangan dan rumah tangga (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp" name="nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp" value="{{ $default['nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp" class="col-sm-4 control-label">Nilai transaksi jasa pelayanan perorangan dan rumah tangga (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp" name="nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp"
                        value="{{ $default['nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_antara_yang_dikeluarkan_rp_dua" class="col-sm-4 control-label">Biaya antara yang
                    dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_antara_yang_dikeluarkan_rp_dua" name="biaya_antara_yang_dikeluarkan_rp_dua" value="{{ $default['biaya_antara_yang_dikeluarkan_rp_dua'] ?? 0 }}">
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
            $('input[name=jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat], input[name=jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis], input[name=jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis], input[name=jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis], input[name=nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp], input[name=nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp], input[name=biaya_yang_dikeluarkan_dalam_pelayanan_rp], input[name=nilai_aset_produksi_jasa_pelayanan_sosial_rp], input[name=biaya_yang_dikeluarkan_rp], input[name=nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp], input[name=biaya_antara_yang_dikeluarkan_rp], input[name=biaya_antara_yang_dikeluarkan_rp_dua]').inputmask(decimalObj);
        });
    </script>
@endpush
