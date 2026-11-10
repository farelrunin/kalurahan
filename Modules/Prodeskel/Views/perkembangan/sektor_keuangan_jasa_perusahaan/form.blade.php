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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Keuangan - Jasa
            Perusahaan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Keuangan - Jasa
                Perusahaan</a>
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
                <label for="" class="col-sm-12 control-label">Sub-Sektor Bank</label>
            </div>
            <div class="form-group">
                <label for="jumlah_transaksi_perbankan" class="col-sm-4 control-label">Jumlah transaksi perbankan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_transaksi_perbankan" name="jumlah_transaksi_perbankan" value="{{ $default['jumlah_transaksi_perbankan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_nilai_transaksi_perbankan" class="col-sm-4 control-label">Jumlah nilai transaksi
                    perbankan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_nilai_transaksi_perbankan" name="jumlah_nilai_transaksi_perbankan" value="{{ $default['jumlah_nilai_transaksi_perbankan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_biaya_yang_dikeluarkan" class="col-sm-4 control-label">Jumlah biaya yang dikeluarkan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_biaya_yang_dikeluarkan" name="jumlah_biaya_yang_dikeluarkan" value="{{ $default['jumlah_biaya_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Lembaga Keuangan Bukan Bank</label>
            </div>
            <div class="form-group">
                <label for="jumlah_lembaga_keuangan_bukan_bank" class="col-sm-4 control-label">Jumlah lembaga keuangan bukan
                    bank (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_lembaga_keuangan_bukan_bank" name="jumlah_lembaga_keuangan_bukan_bank" value="{{ $default['jumlah_lembaga_keuangan_bukan_bank'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank" class="col-sm-4 control-label">Jumlah kegiatan jasa penunjang lembaga keuangan bukan bank
                    (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank" name="jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank" value="{{ $default['jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nilai_transaksi_lembaga_keuangan_bukan_bank" class="col-sm-4 control-label">Nilai transaksi
                    lembaga keuangan bukan bank (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_transaksi_lembaga_keuangan_bukan_bank" name="nilai_transaksi_lembaga_keuangan_bukan_bank" value="{{ $default['nilai_transaksi_lembaga_keuangan_bukan_bank'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_yang_dikeluarkan" class="col-sm-4 control-label">Biaya yang dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_yang_dikeluarkan" name="biaya_yang_dikeluarkan" value="{{ $default['biaya_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Sewa Bangunan</label>
            </div>
            <div class="form-group">
                <label for="jumlah_usaha_persewaan_bangunan_dan_tanah" class="col-sm-4 control-label">Jumlah usaha persewaan
                    bangunan dan tanah (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_usaha_persewaan_bangunan_dan_tanah" name="jumlah_usaha_persewaan_bangunan_dan_tanah" value="{{ $default['jumlah_usaha_persewaan_bangunan_dan_tanah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="total_nilai_persewaan_yang_dicapai" class="col-sm-4 control-label">Total nilai persewaan yang
                    dicapai (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="total_nilai_persewaan_yang_dicapai" name="total_nilai_persewaan_yang_dicapai" value="{{ $default['total_nilai_persewaan_yang_dicapai'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_yang_dikeluarkan_A" class="col-sm-4 control-label">Biaya yang dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_yang_dikeluarkan_A" name="biaya_yang_dikeluarkan_A" value="{{ $default['biaya_yang_dikeluarkan_A'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_lainnya_A" class="col-sm-4 control-label">Biaya lainnya (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_lainnya_A" name="biaya_lainnya_A" value="{{ $default['biaya_lainnya_A'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Jasa Perusahaan</label>
            </div>
            <div class="form-group">
                <label for="jumlah_perusahaan_jasa" class="col-sm-4 control-label">Jumlah perusahaan jasa (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_perusahaan_jasa" name="jumlah_perusahaan_jasa" value="{{ $default['jumlah_perusahaan_jasa'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nilai_transaksi_perusahaan_jasa" class="col-sm-4 control-label">Nilai transaksi perusahaan jasa
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="nilai_transaksi_perusahaan_jasa" name="nilai_transaksi_perusahaan_jasa" value="{{ $default['nilai_transaksi_perusahaan_jasa'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_yang_dikeluarkan_B" class="col-sm-4 control-label">Biaya yang dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_yang_dikeluarkan_B" name="biaya_yang_dikeluarkan_B" value="{{ $default['biaya_yang_dikeluarkan_B'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_lainnya_B" class="col-sm-4 control-label">Biaya lainnya (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_lainnya_B" name="biaya_lainnya_B" value="{{ $default['biaya_lainnya_B'] ?? 0 }}">
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
            $('input[name=jumlah_transaksi_perbankan], input[name=jumlah_nilai_transaksi_perbankan], input[name=jumlah_biaya_yang_dikeluarkan], input[name=jumlah_lembaga_keuangan_bukan_bank], input[name=jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank], input[name=jumlah_usaha_persewaan_bangunan_dan_tanah], input[name=jumlah_perusahaan_jasa]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=nilai_transaksi_lembaga_keuangan_bukan_bank], input[name=biaya_yang_dikeluarkan], input[name=total_nilai_persewaan_yang_dicapai], input[name=biaya_yang_dikeluarkan_A], input[name=biaya_lainnya_A], input[name=nilai_transaksi_perusahaan_jasa], input[name=biaya_yang_dikeluarkan_B], input[name=biaya_lainnya_B]').inputmask(decimalObj);
        });
    </script>
@endpush
