@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Iklim</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.iklim') }}">Iklim</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.iklim') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Iklim</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Iklim</label>
            </div>
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="curah_hujan" class="col-sm-2 control-label">Curah Hujan (mm)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="curah_hujan" value="{{ $default['curah_hujan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_bulan_hujan" class="col-sm-2 control-label">Jumlah Bulan Hujan (bulan)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_bulan_hujan" value="{{ $default['jumlah_bulan_hujan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kelembaban_udara" class="col-sm-2 control-label">Kelembaban Udara (%)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kelembaban_udara" value="{{ $default['kelembaban_udara'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="suhu_rata_harian" class="col-sm-2 control-label">Suhu Rata-Rata Harian (&#176;C)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="suhu_rata_harian" value="{{ $default['suhu_rata_harian'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tinggi_diatas_laut" class="col-sm-2 control-label">Tinggi Diatas Permukaan Laut (M)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tinggi_diatas_laut" value="{{ $default['tinggi_diatas_laut'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Tanah</label>
            </div>
            <div class="form-group">
                <label for="warna_tanah" class="col-sm-2 control-label">Warna Tanah</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label><input type="radio" name="warna_tanah" @checked($default['warna_tanah'] == 'Kuning') value="Kuning">
                            Kuning</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="warna_tanah" @checked($default['warna_tanah'] == 'Hitam') value="Hitam">
                            Hitam</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="warna_tanah" @checked($default['warna_tanah'] == 'Abu-Abu') value="Abu-Abu">
                            Abu-Abu</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="warna_tanah" @checked($default['warna_tanah'] == 'Merah') value="Merah">
                            Merah</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tekstur_tanah" class="col-sm-2 control-label">Tekstur Tanah</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label><input type="radio" name="tekstur_tanah" @checked($default['tekstur_tanah'] == 'Pasiran') value="Pasiran">
                            Pasiran</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="tekstur_tanah" @checked($default['tekstur_tanah'] == 'Debuan') value="Debuan">
                            Debuan</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="tekstur_tanah" @checked($default['tekstur_tanah'] == 'Lempungan') value="Lempungan"> Lempungan</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kemiringan_tanah" class="col-sm-2 control-label">Kemiringan Tanah (derajat)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kemiringan_tanah" value="{{ $default['kemiringan_tanah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lahan_kritis" class="col-sm-2 control-label">Lahan Kritis (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="lahan_kritis" value="{{ $default['lahan_kritis'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="lahan_terlantar" class="col-sm-2 control-label">Lahan Terlantar (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="lahan_terlantar" value="{{ $default['lahan_terlantar'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Erosi</label>
            </div>
            <div class="form-group">
                <label for="tanah_erosi_ringan" class="col-sm-2 control-label">Luas Tanah Erosi Ringan (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tanah_erosi_ringan" value="{{ $default['tanah_erosi_ringan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tanah_erosi_sedang" class="col-sm-2 control-label">Luas Tanah Erosi Sedang (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tanah_erosi_sedang" value="{{ $default['tanah_erosi_sedang'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tanah_erosi_berat" class="col-sm-2 control-label">Luas Tanah Erosi Berat (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tanah_erosi_berat" value="{{ $default['tanah_erosi_berat'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tanah_tidak_ada_erosi" class="col-sm-2 control-label">Luas Tanah yang Tidak Ada Erosi
                    (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tanah_tidak_ada_erosi" value="{{ $default['tanah_tidak_ada_erosi'] ?? 0 }}">
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
            $('input[name=jumlah_bulan_hujan]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=curah_hujan], input[name=kelembaban_udara], input[name=suhu_rata_harian], input[name=tinggi_diatas_laut], input[name=kemiringan_tanah], input[name=lahan_kritis], input[name=lahan_terlantar], input[name=tanah_erosi_ringan], input[name=tanah_erosi_sedang], input[name=tanah_erosi_berat], input[name=tanah_tidak_ada_erosi]').inputmask(decimalObj);

            if (!$('input[name=warna_tanah]:checked').length) {
                $('input[name=warna_tanah]:first').prop('checked', true)
            }
            if (!$('input[name=tekstur_tanah]:checked').length) {
                $('input[name=tekstur_tanah]:first').prop('checked', true)
            }

        });
    </script>
@endpush
