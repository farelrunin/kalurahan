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
    <li>Kedaulatan Politik Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kesadaran Berbangsa dan Bernegara</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kesadaran Berbangsa dan Bernegara</a>
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
                <label for="jenis_kegiatan_pemantapan_nilai_ideologi_pancasila" class="col-sm-4 control-label">Jenis
                    kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="7a2891c06625f" value="{{ $value->data['7a2891c06625f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pemantapan_nilai_ideologi_pancasila" class="col-sm-4 control-label">Jumlah
                    kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="af23bc98e4d57" value="{{ $value->data['af23bc98e4d57'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_kegiatan_pemantapan_nilai_bhinneka_tunggal_ika" class="col-sm-4 control-label">Jenis-jenis
                    kegiatan pemantapan nilai Bhinneka Tunggal Ika</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1b4c3d82e5f96" value="{{ $value->data['1b4c3d82e5f96'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pemantapan_nilai_bhinneka_tunggal_ika" class="col-sm-4 control-label">Jumlah
                    kegiatan pemantapan nilai Bhinneka Tunggal Ika</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="c6a7d8e2b9f34" value="{{ $value->data['c6a7d8e2b9f34'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_kegiatan_pemantapan_kesatuan_bangsa_lainnya" class="col-sm-4 control-label">Jenis kegiatan
                    pemantapan kesatuan bangsa lainnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5e4a3b2c1d8f9" value="{{ $value->data['5e4a3b2c1d8f9'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pemantapan_kesatuan_bangsa_lainnya" class="col-sm-4 control-label">Jumlah
                    kegiatan pemantapan kesatuan bangsa lainnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="92c3b5e7d8f1a" value="{{ $value->data['92c3b5e7d8f1a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_warga_minta_suaka_lari_ke_luar_negri" class="col-sm-4 control-label">Jumlah kasus
                    warga desa/kelurahan yang minta suaka/lari ke luar negeri</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6b7c2d8e1f9a3" value="{{ $value->data['6b7c2d8e1f9a3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_warga_melintasi_perbatasan_ke_negara_tetangga_resmi" class="col-sm-4 control-label">Jumlah warga yang melintasi perbatasan ke negara tetangga secara
                    resmi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="3a4b5c2d8f1e9" value="{{ $value->data['3a4b5c2d8f1e9'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_warga_melintasi_perbatasan_negara_tetangga_tidak_resmi" class="col-sm-4 control-label">Jumlah warga yang melintasi perbatasan negara tetangga secara tidak
                    resmi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="8d1e4f7c2b9a6" value="{{ $value->data['8d1e4f7c2b9a6'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_pertempuran_perlawanan_antar_kelompok_pengacau_keamanan_perbatasan_negara" class="col-sm-4 control-label">Jumlah kasus pertempuran atau perlawanan antar kelompok pengacau keamanan
                    di perbatasan negara dengan warga/aparat dari desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5a2b8c3d4f1e9" value="{{ $value->data['5a2b8c3d4f1e9'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_serangan_terhadap_fasilitas_umum_dan_milik_masyarakat_kelompok_pengacau_desa_kelurahan_perbatasan_negara_tetangga" class="col-sm-4 control-label">Jumlah serangan terhadap fasilitas umum dan milik masyarakat oleh
                    kelompok pengacau di desa/kelurahan perbatasan negara
                    tetangga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="4b6c9d1e2f3a5" value="{{ $value->data['4b6c9d1e2f3a5'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_diklasifikasikan_merongrong_keutuhan_nkri_kesatuan_bangsa_indonesia_desa_kelurahan_tahun_ini" class="col-sm-4 control-label">Jumlah kasus yang diklasifikasikan merongrong keutuhan NKRI dan Kesatuan
                    Bangsa Indonesia di desa/kelurahan tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="d5a6b7c3e8f2" value="{{ $value->data['d5a6b7c3e8f2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_korban_manusia_luka_tewas_korban_materi_serangan_kelompok_pengacau_keamanan" class="col-sm-4 control-label">Jumlah korban manusia baik luka maupun tewas serta korban materi lainnya
                    akibat serangan kelompok pengacau keamanan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6c2d3e4a5b8f" value="{{ $value->data['6c2d3e4a5b8f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_masalah_ketenagakerjaan_perbatasan_antar_negara_tahun_ini" class="col-sm-4 control-label">Jumlah masalah ketenagakerjaan di perbatasan antar negara yang terjadi
                    tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1a3b4c6d8e5f" value="{{ $value->data['1a3b4c6d8e5f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_kejahatan_pencurian_penjarahan_perampokan_intimidasi_teror_desa_kelurahan_perbatasan_antar_negara" class="col-sm-4 control-label">Jumlah kasus kejahatan pencurian, penjarahan, perampokan dan intimidasi
                    serta teror yang terjadi di desa/kelurahan perbatasan antar
                    negara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="9c2d4e6f8a1b" value="{{ $value->data['9c2d4e6f8a1b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_sengketa_perbatasan_antar_negara_desa_kelurahan_tahun_ini" class="col-sm-4 control-label">Jumlah sengketa perbatasan antar negara yang terjadi desa/kelurahan
                    ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5d3e4f6a7b1c" value="{{ $value->data['5d3e4f6a7b1c'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_sengketa_perbatasan_antar_desa_kelurahan_kecamatan_kabupaten_kota_provinsi" class="col-sm-4 control-label">Jumlah kasus sengketa perbatasan yang terjadi baik antar desa/kelurahan
                    dalam kecamatan maupun antar kecamatan, antar kabupaten/kota dan desa/kelurahan
                    antar provinsi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="2e3f4c5d6b7a" value="{{ $value->data['2e3f4c5d6b7a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_terkait_perbatasan_antar_negara_laporkan_kepala_desa_lurah_pemerintah_tingkat_atas" class="col-sm-4 control-label">Jumlah kasus yang terkait dengan perbatasan antar negara yang dilaporkan
                    Kepala Desa/Lurah ke pemerintah tingkat atasnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1d4e5f7b8c2a" value="{{ $value->data['1d4e5f7b8c2a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_mengarah_tindakan_disintegrasi_bangsa_pengingkaran_nkri_pancasila_uud_1945_bhinneka_tunggal_ika_fasilitasi_penyelesaian_kepala_desa_lurah" class="col-sm-4 control-label">Jumlah kasus yang mengarah kepada tindakan disintegrasi bangsa dan
                    pengingkaran NKRI,
                    Pancasila, UUD 1945 dan Bhinneka Tunggal Ika yang difasilitasi penyelesaiannya oleh Kepala
                    Desa/Lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="a3b4c5e6f8d9" value="{{ $value->data['a3b4c5e6f8d9'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_penangkapan_nelayan_asing_wilayah_perairan_desa_kelurahan" class="col-sm-4 control-label">Jumlah kasus penangkapan nelayan asing di wilayah perairan
                    desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="4c5d7e8f2a3b" value="{{ $value->data['4c5d7e8f2a3b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_penangkapan_nelayan_petani_peternak_pekebun_perambah_hutan_asal_desa_kelurahan_perairan_daratan_wilayah_negara_lain" class="col-sm-4 control-label">Jumlah kasus penangkapan nelayan/petani/peternak/pekebun/perambah hutan
                    asal desa/kelurahan di perairan dan
                    daratan wilayah negara lain</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="b2c3d5e7f8a1" value="{{ $value->data['b2c3d5e7f8a1'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="1d3e5f6a7c9b" class="col-sm-4 control-label">Jumlah kasus penangkapan nelayan asing di wilayah
                    perairan desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1d3e5f6a7c9b" value="{{ $value->data['1d3e5f6a7c9b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="9a8b2c3d4e5f" class="col-sm-4 control-label">Jumlah kasus penangkapan
                    nelayan/petani/peternak/pekebun/perambah hutan asal desa/kelurahan di perairan dan daratan wilayah
                    negara lain</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="9a8b2c3d4e5f" value="{{ $value->data['9a8b2c3d4e5f'] ?? 0 }}">
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
            $('input[name=1d3e5f6a7c9b], input[name=9a8b2c3d4e5f]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=7a2891c06625f], input[name=af23bc98e4d57], input[name=1b4c3d82e5f96], input[name=c6a7d8e2b9f34], input[name=5e4a3b2c1d8f9], input[name=92c3b5e7d8f1a], input[name=6b7c2d8e1f9a3], input[name=3a4b5c2d8f1e9], input[name=8d1e4f7c2b9a6], input[name=5a2b8c3d4f1e9], input[name=4b6c9d1e2f3a5], input[name=d5a6b7c3e8f2], input[name=6c2d3e4a5b8f], input[name=1a3b4c6d8e5f], input[name=9c2d4e6f8a1b], input[name=5d3e4f6a7b1c], input[name=2e3f4c5d6b7a], input[name=1d4e5f7b8c2a], input[name=a3b4c5e6f8d9], input[name=4c5d7e8f2a3b], input[name=b2c3d5e7f8a1]').inputmask(decimalObj);

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
