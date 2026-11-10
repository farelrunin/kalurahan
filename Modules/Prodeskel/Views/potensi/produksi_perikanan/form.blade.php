@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Produksi Perikanan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.produksiPerikanan') }}">Produksi Perikanan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.produksiPerikanan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Produksi Perikanan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group">
                <label for="tahun" class="col-sm-4 control-label">Tahun {{ $default['tahun'] }}</label>
                <div class="col-sm-8">
                    <select name="tahun" class="form-control required">
                        @for ($i = $default['tahun'] - 2; $i <= ($default['tahun'] < date('Y') ? date('Y') : $default['tahun']); $i++)
                            <option @selected($default['tahun'] == $i) value="{{ $i }}">{{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
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
                <label for="jenis_produksi" class="col-sm-4 control-label">Jenis Produksi</label>
                <div class="col-sm-8">
                    <select name="jenis_produksi" class="form-control select2 required">
                        @foreach (Modules\Prodeskel\Enums\JenisPerikananEnum::all() as $key => $item)
                            <option @selected($default['jenis_produksi'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="hasil_produksi" class="col-sm-4 control-label">Hasil Produksi (Ton/Tahun)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="hasil_produksi" value="{{ $default['hasil_produksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="harga_jual" class="col-sm-4 control-label">Harga Jual (Rp/Ton)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="harga_jual" value="{{ $default['harga_jual'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_produksi" class="col-sm-4 control-label">Nilai Produksi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="nilai_produksi" value="{{ $default['nilai_produksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_bahan_baku" class="col-sm-4 control-label">Nilai Bahan Baku Yang (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="nilai_bahan_baku" value="{{ $default['nilai_bahan_baku'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_bahan_penolong" class="col-sm-4 control-label">Nilai Bahan Penolong Yang (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="nilai_bahan_penolong" value="{{ $default['nilai_bahan_penolong'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="biaya_antara_dihabiskan" class="col-sm-4 control-label">Biaya Antara Yang Dihabiskan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="biaya_antara_dihabiskan" value="{{ $default['biaya_antara_dihabiskan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="saldo_produksi" class="col-sm-4 control-label">Saldo Produksi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="saldo_produksi" value="{{ $default['saldo_produksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_usaha_perikanan" class="col-sm-4 control-label">Jumlah Jenis Usaha Perikanan
                    (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="jumlah_jenis_usaha_perikanan" value="{{ $default['jumlah_jenis_usaha_perikanan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jual_konsumen" class="col-sm-4 control-label">Dijual Langsung ke Konsumen</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_konsumen'] == 1)">
                        <input type="radio" name="jual_konsumen" class="form-check-input" @checked($default['jual_konsumen'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_konsumen'] == 0)">
                        <input type="radio" name="jual_konsumen" class="form-check-input" @checked($default['jual_konsumen'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jual_pasar" class="col-sm-4 control-label">Dijual ke Pasar Desa/Kelurahan</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_pasar'] == 1)">
                        <input type="radio" name="jual_pasar" class="form-check-input" @checked($default['jual_pasar'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_pasar'] == 0)">
                        <input type="radio" name="jual_pasar" class="form-check-input" @checked($default['jual_pasar'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jual_kud" class="col-sm-4 control-label">Dijual Melalui KUD</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_kud'] == 1)">
                        <input type="radio" name="jual_kud" class="form-check-input" @checked($default['jual_kud'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_kud'] == 0)">
                        <input type="radio" name="jual_kud" class="form-check-input" @checked($default['jual_kud'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jual_tengkulak" class="col-sm-4 control-label">Dijual Melalui Tengkulak</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_tengkulak'] == 1)">
                        <input type="radio" name="jual_tengkulak" class="form-check-input" @checked($default['jual_tengkulak'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_tengkulak'] == 0)">
                        <input type="radio" name="jual_tengkulak" class="form-check-input" @checked($default['jual_tengkulak'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jual_pengecer" class="col-sm-4 control-label">Dijual Melalui Pengecer</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_pengecer'] == 1)">
                        <input type="radio" name="jual_pengecer" class="form-check-input" @checked($default['jual_pengecer'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_pengecer'] == 0)">
                        <input type="radio" name="jual_pengecer" class="form-check-input" @checked($default['jual_pengecer'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jual_desa" class="col-sm-4 control-label">Dijual ke Lumbung Desa/Kelurahan</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_desa'] == 1)">
                        <input type="radio" name="jual_desa" class="form-check-input" @checked($default['jual_desa'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['jual_desa'] == 0)">
                        <input type="radio" name="jual_desa" class="form-check-input" @checked($default['jual_desa'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="tidak_jual" class="col-sm-4 control-label">Tidak Dijual</label>
                <div class="col-sm-8 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['tidak_jual'] == 1)">
                        <input type="radio" name="tidak_jual" class="form-check-input" @checked($default['tidak_jual'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['tidak_jual'] == 0)">
                        <input type="radio" name="tidak_jual" class="form-check-input" @checked($default['tidak_jual'] == 0) value="0" autocomplete="off">Tidak
                    </label>
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
            // Gunakan integerObj untuk jumlah unit usaha dan hasil produksi fisik
            $('input[name=jumlah_jenis_usaha_perikanan], input[name=hasil_produksi]').inputmask(integerObj);
            // Gunakan decimalObj untuk nilai/harga dalam rupiah
            $('input[name=harga_jual], input[name=nilai_produksi], input[name=nilai_bahan_baku], input[name=nilai_bahan_penolong], input[name=biaya_antara_dihabiskan], input[name=saldo_produksi]').inputmask(decimalObj);
        });
    </script>
@endpush
