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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Perdagangan, Hotel
            dan Restoran</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Perdagangan, Hotel
                dan Restoran</a>
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
                <label for="" class="col-sm-12 control-label">Sub-Sektor Perdagangan Besar</label>
            </div>
            <div class="form-group">
                <label for="total_jumlah_jenis_perdagangan_besar" class="col-sm-4 control-label">Total jumlah jenis
                    perdagangan besar (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="total_jumlah_jenis_perdagangan_besar" name="total_jumlah_jenis_perdagangan_besar" value="{{ $default['total_jumlah_jenis_perdagangan_besar'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="besar_total_nilai_transaksi" class="col-sm-4 control-label">Total nilai transaksi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="besar_total_nilai_transaksi" name="besar_total_nilai_transaksi" value="{{ $default['besar_total_nilai_transaksi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="total_nilai_aset_perdagangan_yang_ada" class="col-sm-4 control-label">Total nilai aset
                    perdagangan yang ada (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="total_nilai_aset_perdagangan_yang_ada" name="total_nilai_aset_perdagangan_yang_ada" value="{{ $default['total_nilai_aset_perdagangan_yang_ada'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="besar_total_nilai_biaya_yang_dikeluarkan" class="col-sm-4 control-label">Total nilai biaya yang
                    dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="besar_total_nilai_biaya_yang_dikeluarkan" name="besar_total_nilai_biaya_yang_dikeluarkan" value="{{ $default['besar_total_nilai_biaya_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="total_biaya_antara_lainnya" class="col-sm-4 control-label">Total biaya antara lainnya
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="total_biaya_antara_lainnya" name="total_biaya_antara_lainnya" value="{{ $default['total_biaya_antara_lainnya'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Perdagangan Kecil</label>
            </div>
            <div class="form-group">
                <label for="jumlah_total_jenis_perdagangan_eceran" class="col-sm-4 control-label">Jumlah total jenis
                    perdagangan eceran (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_total_jenis_perdagangan_eceran" name="jumlah_total_jenis_perdagangan_eceran" value="{{ $default['jumlah_total_jenis_perdagangan_eceran'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kecil_total_nilai_transaksi" class="col-sm-4 control-label">Total nilai transaksi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="kecil_total_nilai_transaksi" name="kecil_total_nilai_transaksi" value="{{ $default['kecil_total_nilai_transaksi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kecil_total_nilai_biaya_yang_dikeluarkan" class="col-sm-4 control-label">Total nilai biaya yang
                    dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="kecil_total_nilai_biaya_yang_dikeluarkan" name="kecil_total_nilai_biaya_yang_dikeluarkan" value="{{ $default['kecil_total_nilai_biaya_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="total_nilai_aset_perdagangan_eceran" class="col-sm-4 control-label">Total nilai aset perdagangan
                    eceran (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="total_nilai_aset_perdagangan_eceran" name="total_nilai_aset_perdagangan_eceran" value="{{ $default['total_nilai_aset_perdagangan_eceran'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Hotel</label>
            </div>
            <div class="form-group">
                <label for="jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada" class="col-sm-4 control-label">Jumlah
                    total penginapan dan penyediaan akomodasi yang ada (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada" name="jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada" value="{{ $default['jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_total_pendapatan" class="col-sm-4 control-label">Jumlah total pendapatan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_total_pendapatan" name="jumlah_total_pendapatan" value="{{ $default['jumlah_total_pendapatan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_total_biaya_pemeliharaan" class="col-sm-4 control-label">Jumlah total biaya pemeliharaan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_total_biaya_pemeliharaan" name="jumlah_total_biaya_pemeliharaan" value="{{ $default['jumlah_total_biaya_pemeliharaan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_biaya_antara_yang_dikeluarkan" class="col-sm-4 control-label">Jumlah biaya antara yang
                    dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_biaya_antara_yang_dikeluarkan" name="jumlah_biaya_antara_yang_dikeluarkan" value="{{ $default['jumlah_biaya_antara_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hotel_jumlah_total_pendapatan_yang_diperoleh" class="col-sm-4 control-label">Jumlah total
                    pendapatan yang diperoleh (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="hotel_jumlah_total_pendapatan_yang_diperoleh" name="hotel_jumlah_total_pendapatan_yang_diperoleh" value="{{ $default['hotel_jumlah_total_pendapatan_yang_diperoleh'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Sub-Sektor Restoran</label>
            </div>
            <div class="form-group">
                <label for="jumlah_tempat_penyediaan_konsumsi" class="col-sm-4 control-label">Jumlah tempat penyediaan
                    konsumsi (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_tempat_penyediaan_konsumsi" name="jumlah_tempat_penyediaan_konsumsi" value="{{ $default['jumlah_tempat_penyediaan_konsumsi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_konsumsi_yang_dikeluarkan" class="col-sm-4 control-label">Biaya konsumsi yang dikeluarkan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_konsumsi_yang_dikeluarkan" name="biaya_konsumsi_yang_dikeluarkan" value="{{ $default['biaya_konsumsi_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_antara_lainnya" class="col-sm-4 control-label">Biaya antara lainnya (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya_antara_lainnya" name="biaya_antara_lainnya" value="{{ $default['biaya_antara_lainnya'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="resto_jumlah_total_pendapatan_yang_diperoleh" class="col-sm-4 control-label">Jumlah total
                    pendapatan yang diperoleh (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="resto_jumlah_total_pendapatan_yang_diperoleh" name="resto_jumlah_total_pendapatan_yang_diperoleh" value="{{ $default['resto_jumlah_total_pendapatan_yang_diperoleh'] ?? 0 }}">
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
            $('input[name=total_jumlah_jenis_perdagangan_besar], input[name=jumlah_total_jenis_perdagangan_eceran], input[name=jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada], input[name=jumlah_total_pendapatan], input[name=jumlah_total_biaya_pemeliharaan], input[name=jumlah_biaya_antara_yang_dikeluarkan], input[name=hotel_jumlah_total_pendapatan_yang_diperoleh], input[name=jumlah_tempat_penyediaan_konsumsi], input[name=resto_jumlah_total_pendapatan_yang_diperoleh]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=besar_total_nilai_transaksi], input[name=total_nilai_aset_perdagangan_yang_ada], input[name=besar_total_nilai_biaya_yang_dikeluarkan], input[name=total_biaya_antara_lainnya], input[name=kecil_total_nilai_transaksi], input[name=kecil_total_nilai_biaya_yang_dikeluarkan], input[name=total_nilai_aset_perdagangan_eceran], input[name=biaya_konsumsi_yang_dikeluarkan], input[name=biaya_antara_lainnya]').inputmask(decimalObj);
        });
    </script>
@endpush
