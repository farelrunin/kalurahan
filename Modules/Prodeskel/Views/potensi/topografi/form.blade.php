@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Topografi</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.topografi') }}">topografi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.topografi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar topografi</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun', ['controlLabel' => 'col-sm-5', 'controlInput' => 'col-sm-7'])
            <div class="form-group subtitle_head">
                <label for="tanggal" class="col-sm-12 control-label">Bentangan Wilayah</label>
            </div>
            <div class="form-group">
                <label for="tanggal" class="col-sm-5 control-label">Tanggal</label>
                <div class="col-sm-7">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control input-sm datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="dataran_rendah" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Dataran
                    Rendah (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="dataran_rendah" value="{{ $default['dataran_rendah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="berbukit_bukit" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Berbukit
                    Bukit (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="berbukit_bukit" value="{{ $default['berbukit_bukit'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="dataran" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Dataran
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="dataran" value="{{ $default['dataran'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lereng_gunung" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Lereng
                    Gunung (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lereng_gunung" value="{{ $default['lereng_gunung'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tepi_pantai_pesisir" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Tepi
                    Pantai Pesisir (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="tepi_pantai_pesisir" value="{{ $default['tepi_pantai_pesisir'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_rawa" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan Rawa
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_rawa" value="{{ $default['kawasan_rawa'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_gambut" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan
                    Gambut (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_gambut" value="{{ $default['kawasan_gambut'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="aliran_sungai" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Aliran
                    Sungai (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="aliran_sungai" value="{{ $default['aliran_sungai'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="bantaran_sungai" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Bantaran
                    Sungai (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="bantaran_sungai" value="{{ $default['bantaran_sungai'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lain_lain" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Lain Lain
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lain_lain" value="{{ $default['lain_lain'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="tanggal" class="col-sm-12 control-label">Letak Wilayah</label>
            </div>
            <div class="form-group">
                <label for="kawasan_perkantoran" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }}
                    Kawasan Perkantoran (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_perkantoran" value="{{ $default['kawasan_perkantoran'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_pertokoan" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan
                    Pertokoan (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_pertokoan" value="{{ $default['kawasan_pertokoan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_campuran" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan
                    Campuran (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_campuran" value="{{ $default['kawasan_campuran'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_industri" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan
                    Industri (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_industri" value="{{ $default['kawasan_industri'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kepulauan" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kepulauan
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kepulauan" value="{{ $default['kepulauan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pantai_pesisir" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Pantai
                    Pesisir (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="pantai_pesisir" value="{{ $default['pantai_pesisir'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_hutan" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan
                    Hutan (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_hutan" value="{{ $default['kawasan_hutan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="taman_suaka" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Taman Suaka
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="taman_suaka" value="{{ $default['taman_suaka'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kawasan_wisata" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Kawasan
                    Wisata (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kawasan_wisata" value="{{ $default['kawasan_wisata'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="perbatasan_dengan_negara_lain" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Perbatasan Dengan Negara Lain (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="perbatasan_dengan_negara_lain" value="{{ $default['perbatasan_dengan_negara_lain'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="perbatasan_dengan_provinsi_lain" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Perbatasan Dengan Provinsi Lain (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="perbatasan_dengan_provinsi_lain" value="{{ $default['perbatasan_dengan_provinsi_lain'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="perbatasan_dengan_kabupaten_lain" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Perbatasan Dengan Kabupaten Lain (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="perbatasan_dengan_kabupaten_lain" value="{{ $default['perbatasan_dengan_kabupaten_lain'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="perbatasan_antar_kecamatan_lain" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Perbatasan Antar Kecamatan Lain (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="perbatasan_antar_kecamatan_lain" value="{{ $default['perbatasan_antar_kecamatan_lain'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="DAS_bantaran_sungai" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} DAS
                    Bantaran Sungai (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="DAS_bantaran_sungai" value="{{ $default['DAS_bantaran_sungai'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="rawan_banjir" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Rawan Banjir
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="rawan_banjir" value="{{ $default['rawan_banjir'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="bebas_banjir" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Bebas Banjir
                    (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="bebas_banjir" value="{{ $default['bebas_banjir'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="potensi_tsunami" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Potensial
                    Tsunami (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="potensi_tsunami" value="{{ $default['potensi_tsunami'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="rawan_jalur_gempa" class="col-sm-5 control-label">{{ ucwords(setting('sebutan_desa')) }} Rawan
                    Jalur Gempa (Ha)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="rawan_jalur_gempa" value="{{ $default['rawan_jalur_gempa'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="tanggal" class="col-sm-12 control-label">Orbitasi</label>
            </div>
            <div class="form-group">
                <label for="jarak_ke_ibukota_kecamatan" class="col-sm-5 control-label">Jarak Ke Ibukota Kecamatan
                    (Km)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="jarak_ke_ibukota_kecamatan" value="{{ $default['jarak_ke_ibukota_kecamatan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_kendaraan_bermotor" class="col-sm-5 control-label">Lama Jarak Tempuh Ke Ibukota Kecamatan dengan Kendaraan Bermotor
                    (Jam)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_kendaraan_bermotor" value="{{ $default['lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_kendaraan_bermotor'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_jalan_kaki" class="col-sm-5 control-label">Lama
                    Jarak Tempuh Ke Ibukota Kecamatan dengan Jalan Kaki/Kendaraan Non Bermotor (Jam)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_jalan_kaki" value="{{ $default['lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_jalan_kaki'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kendaraan_umum_ke_ibukota_kecamatan" class="col-sm-5 control-label">Kendaraan Umum Ke Ibukota
                    Kecamatan (Unit)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kendaraan_umum_ke_ibukota_kecamatan" value="{{ $default['kendaraan_umum_ke_ibukota_kecamatan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jarak_ke_ibukota_kabupaten_kota" class="col-sm-5 control-label">Jarak Ke Ibukota Kabupaten Kota
                    (Km)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="jarak_ke_ibukota_kabupaten_kota" value="{{ $default['jarak_ke_ibukota_kabupaten_kota'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_kendaraan_bermotor" class="col-sm-5 control-label">Lama Jarak Tempuh Ke Ibukota Kabupaten dengan Kendaraan Bermotor
                    (Km)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_kendaraan_bermotor" value="{{ $default['lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_kendaraan_bermotor'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_jalan_kaki" class="col-sm-5 control-label">Lama
                    Jarak Tempuh Ke Ibukota Kabupaten dengan Jalan Kaki/Kendaraan Non Bermotor (Jam)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_jalan_kaki" value="{{ $default['lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_jalan_kaki'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kendaraan_umum_ke_ibukota_kabupaten" class="col-sm-5 control-label">Kendaraan Umum Ke Ibukota
                    Kabupaten (Unit)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kendaraan_umum_ke_ibukota_kabupaten" value="{{ $default['kendaraan_umum_ke_ibukota_kabupaten'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jarak_ke_ibukota_provinsi_kota" class="col-sm-5 control-label">Jarak Ke Ibukota Provinsi Kota
                    (Km)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="jarak_ke_ibukota_provinsi_kota" value="{{ $default['jarak_ke_ibukota_provinsi_kota'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lama_jarak_tempuh_ke_ibukota_provinsi_dengan_kendaraan_bermotor" class="col-sm-5 control-label">Lama Jarak Tempuh Ke Ibukota Provinsi dengan Kendaraan Bermotor
                    (Jam)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lama_jarak_tempuh_ke_ibukota_provinsi_dengan_kendaraan_bermotor" value="{{ $default['lama_jarak_tempuh_ke_ibukota_provinsi_dengan_kendaraan_bermotor'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lama_jarak_tempuh_ke_ibukota_provinsi_dengan_jalan_kaki" class="col-sm-5 control-label">Lama
                    Jarak Tempuh Ke Ibukota Provinsi dengan Jalan Kaki/Kendaraan Non Bermotor (Jam)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="lama_jarak_tempuh_ke_ibukota_provinsi_dengan_jalan_kaki" value="{{ $default['lama_jarak_tempuh_ke_ibukota_provinsi_dengan_jalan_kaki'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kendaraan_umum_ke_ibukota_provinsi" class="col-sm-5 control-label">Kendaraan Umum Ke Ibukota
                    Provinsi (Unit)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control  angka-inputmask" name="kendaraan_umum_ke_ibukota_provinsi" value="{{ $default['kendaraan_umum_ke_ibukota_provinsi'] ?? 0 }}">
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
            $('input[name=kendaraan_umum_ke_ibukota_kecamatan], input[name=kendaraan_umum_ke_ibukota_kabupaten], input[name=kendaraan_umum_ke_ibukota_provinsi]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=dataran_rendah], input[name=berbukit_bukit], input[name=dataran], input[name=lereng_gunung], input[name=tepi_pantai_pesisir], input[name=kawasan_rawa], input[name=kawasan_gambut], input[name=aliran_sungai], input[name=bantaran_sungai], input[name=lain_lain], input[name=kawasan_perkantoran], input[name=kawasan_pertokoan], input[name=kawasan_campuran], input[name=kawasan_industri], input[name=kepulauan], input[name=pantai_pesisir], input[name=kawasan_hutan], input[name=taman_suaka], input[name=kawasan_wisata], input[name=perbatasan_dengan_negara_lain], input[name=perbatasan_dengan_provinsi_lain], input[name=perbatasan_dengan_kabupaten_lain], input[name=perbatasan_antar_kecamatan_lain], input[name=DAS_bantaran_sungai], input[name=rawan_banjir], input[name=bebas_banjir], input[name=potensi_tsunami], input[name=rawan_jalur_gempa], input[name=jarak_ke_ibukota_kecamatan], input[name=lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_kendaraan_bermotor], input[name=lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_jalan_kaki], input[name=jarak_ke_ibukota_kabupaten_kota], input[name=lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_kendaraan_bermotor], input[name=lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_jalan_kaki], input[name=jarak_ke_ibukota_provinsi_kota], input[name=lama_jarak_tempuh_ke_ibukota_provinsi_dengan_kendaraan_bermotor], input[name=lama_jarak_tempuh_ke_ibukota_provinsi_dengan_jalan_kaki]').inputmask(decimalObj);
        });
    </script>
@endpush
