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
    <li>Peranserta Masyarakat dalam Pembangunan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sikap dan Mental Masyarakat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sikap dan Mental Masyarakat</a>
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
                <label for="jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan" class="col-sm-4 control-label">Jumlah jenis pungutan liar dari anak gelandangan di sudut jalanan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan" name="jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan"
                        value="{{ $default['jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar" class="col-sm-4 control-label">Jumlah jenis pungutan liar di terminal, pelabuhan dan pasar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar" name="jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar" value="{{ $default['jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah" class="col-sm-4 control-label">Peminta-minta sumbangan perorangan dari rumah ke rumah</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah" class="required" @checked($default['peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah'] !== null && $default['peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah" class="col-sm-4 control-label">Peminta-minta sumbangan terorganisasi dari rumah ke rumah</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah" class="required" @checked($default['peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah'] !== null && $default['peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal" class="col-sm-4 control-label">Semakin berkembang praktek jalan pintas dalam mencari uang secara gampang
                    walau tidak halal</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal" class="required" @checked($default['semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal'] !== null && $default['semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga" class="col-sm-4 control-label">Jenis
                    pungutan dari RT atau sebutan lain kepada warga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga" name="jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga" value="{{ $default['jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga" class="col-sm-4 control-label">Jenis
                    pungutan dari RW atau sebutan lain kepada warga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga" name="jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga" value="{{ $default['jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_pungutan_dari_desa_kelurahan_kepada_warga" class="col-sm-4 control-label">Jenis pungutan
                    dari desa/kelurahan kepada warga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jenis_pungutan_dari_desa_kelurahan_kepada_warga" name="jenis_pungutan_dari_desa_kelurahan_kepada_warga" value="{{ $default['jenis_pungutan_dari_desa_kelurahan_kepada_warga'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" class="col-sm-4 control-label">Kasus aparat RT/RW atau sebutan lainnya di desa dan kelurahan yang
                    dipecat kena kasus pungutan liar, pemerasan dan
                    sejenisnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya"
                        name="kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya"
                        value="{{ $default['kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" class="col-sm-4 control-label">Dipindah karena kena kasus pungutan liar, pemerasan dan
                    sejenisnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" name="dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya"
                        value="{{ $default['dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" class="col-sm-4 control-label">Diberhentikan dengan hormat karena kena kasus pungutan liar, pemerasan
                    dan sejenisnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" name="diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya"
                        value="{{ $default['diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" class="col-sm-4 control-label">Dimutasi karena kena kasus pungutan liar, pemerasan dan
                    sejenisnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya" name="dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya"
                        value="{{ $default['dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terimakasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan" class="col-sm-4 control-label">Banyak masyarakat yang memberikan biaya lebih dari yang ditentukan
                    sebagai uang rokok atau ucapan terimakasih dalam proses pelayanan administrasi di kantor
                    desa/kelurahan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terimakasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan" class="required" @checked(
                                $default['banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terimakasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan'] !== null &&
                                    $default['banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terimakasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan'] == $key)
                                    value="{{ $key }}"
                                > {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat" class="col-sm-4 control-label">Banyak penduduk yang mengeluhkan memburuknya kualitas pelayanan kepada
                    masyarakat</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat" class="required" @checked($default['banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat'] !== null && $default['banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_di_inisiatifi_masyarakat_sendiri" class="col-sm-4 control-label">Banyak kegiatan yang bersifat hiburan dan rekreasi yang di inisiatifi
                    masyarakat sendiri</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_di_inisiatifi_masyarakat_sendiri" class="required" @checked($default['banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_di_inisiatifi_masyarakat_sendiri'] !== null && $default['banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_di_inisiatifi_masyarakat_sendiri'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain" class="col-sm-4 control-label">Masyarakat agak kurang toleran dengan keberadaan kelompok masyarakat dari
                    unsur etnis, agama, dan kelompok kepentingan
                    lain</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain" class="required" @checked($default['masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain'] !== null && $default['masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="luas_wilayah_desa_kelurahan_sangat_luas" class="col-sm-4 control-label">Luas Wilayah
                    Desa/Kelurahan sangat luas</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="luas_wilayah_desa_kelurahan_sangat_luas" class="required" @checked($default['luas_wilayah_desa_kelurahan_sangat_luas'] !== null && $default['luas_wilayah_desa_kelurahan_sangat_luas'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi" class="col-sm-4 control-label">Banyak lahan terlantar yang tidak dikelola pemiliknya/petani
                    berdasi</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi" class="required" @checked($default['banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi'] !== null && $default['banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan" class="col-sm-4 control-label">Banyak lahan pekarangan di sekitar perumahan yang tidak
                    dimanfaatkan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan" class="required" @checked($default['banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan'] !== null && $default['banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan" class="col-sm-4 control-label">Banyak lahan tidur milik masyarakat yang tidak dimanfaatkan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan" class="required" @checked($default['banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan'] !== null && $default['banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain" class="col-sm-4 control-label">Jumlah petani pada musim gagal tanam/panen yang pasrah dan tidak mencari
                    pekerjaan lain</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain" class="required" @checked($default['jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain'] !== null && $default['jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain" class="col-sm-4 control-label">Jumlah nelayan pada musim tidak melaut yang memanfaatkan
                    keterampilan/keahlian lainnya untuk mencari pekerjaan lain</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain" class="required" @checked($default['jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain'] !== null && $default['jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota" class="col-sm-4 control-label">Banyak penduduk yang mencari pekerjaan diluar desa/kelurahan tetapi masih
                    dalam wilayah kabupaten/kota</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota" class="required" @checked($default['banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota'] !== null && $default['banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya" class="col-sm-4 control-label">Banyak penduduk yang mencari pekerjaan di kota besar lainnya</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya" class="required" @checked($default['banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya'] !== null && $default['banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak" class="col-sm-4 control-label">Kebiasaan masyarakat merayakan pesta dengan menghadirkan undangan yang
                    banyak</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak" class="required" @checked($default['kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak'] !== null && $default['kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan" class="col-sm-4 control-label">Masyarakat sering mendatangi kantor desa dan lurah menuntut penyediaan
                    kebutuhan dasar sembilan
                    bahan pokok pada saat kelaparan dan kekeringan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan" class="required" @checked(
                                $default['masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan'] !== null &&
                                    $default['masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen" class="col-sm-4 control-label">Kebiasaan masyarakat untuk mencari/mengumpulkan bahan makanan pengganti
                    beras/jagung pada saat rawan
                    pangan/kelaparan/gagal panen</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen" class="required" @checked(
                                $default['kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen'] !== null &&
                                    $default['kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu" class="col-sm-4 control-label">Kebiasaan pemotongan hewan dalam jumlah besar untuk pesta adat dan
                    perayaan upacara tertentu</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu" class="required" @checked($default['kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu'] !== null && $default['kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_masyarakat_mendemonstrasi_protes_terhadap_kebijakan_pemerintah" class="col-sm-4 control-label">Kebiasaan masyarakat mendemonstrasi/protes terhadapat kebijakan
                    pemerintah</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_masyarakat_mendemonstrasi_protes_terhadap_kebijakan_pemerintah" class="required" @checked($default['kebiasaan_masyarakat_mendemonstrasi_protes_terhadap_kebijakan_pemerintah'] !== null && $default['kebiasaan_masyarakat_mendemonstrasi_protes_terhadap_kebijakan_pemerintah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan" class="col-sm-4 control-label">Kebiasaan masyarakat terprovokasi karena isu-isu yang menyesatkan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan" class="required" @checked($default['kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan'] !== null && $default['kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan" class="col-sm-4 control-label">Kebiasaan masyarakat bermusyawarah untuk menyelesaikan berbagai persoalan
                    sosial kemasyarakatan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan" class="required" @checked($default['kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan'] !== null && $default['kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="lebih_banyak_masyarakat_yang_diam_masa_bodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya" class="col-sm-4 control-label">Lebih banyak masyarakat yang diam/masa bodoh/apatis ketika ada persoalan
                    yang terjadi di lingkungan sekitarnya</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="lebih_banyak_masyarakat_yang_diam_masa_bodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya" class="required" @checked($default['lebih_banyak_masyarakat_yang_diam_masa_bodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya'] !== null && $default['lebih_banyak_masyarakat_yang_diam_masa_bodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_RT_RW_Dusun_dan_Lingkungan_yang_kurang_menanggapi_kesuliatan_yang_dihadapi_masyarakat" class="col-sm-4 control-label">Kebiasaan aparat pemerintah desa/kelurahan terlebih di tingkat RT, RW,
                    Dusun dan Lingkungan
                    yang kurang menanggapi kesuliatan yang dihadapi masyarakat</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KetinggianEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_RT_RW_Dusun_dan_Lingkungan_yang_kurang_menanggapi_kesuliatan_yang_dihadapi_masyarakat" class="required" @checked(
                                $default['kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_RT_RW_Dusun_dan_Lingkungan_yang_kurang_menanggapi_kesuliatan_yang_dihadapi_masyarakat'] !== null &&
                                    $default['kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_RT_RW_Dusun_dan_Lingkungan_yang_kurang_menanggapi_kesuliatan_yang_dihadapi_masyarakat'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        </div>
                    @endforeach
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
            $('input[name=jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan], input[name=jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga], input[name=jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga], input[name=jenis_pungutan_dari_desa_kelurahan_kepada_warga], input[name=kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya], input[name=dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya], input[name=diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya], input[name=dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya]').inputmask(decimalObj);
        });
    </script>
@endpush
