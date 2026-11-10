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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pelaksanaan dan Pelestarian Hasil Pembangunan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pelaksanaan dan Pelestarian Hasil Pembangunan</a>
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
                <label for="jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang" class="col-sm-4 control-label">Jumlah masyarakat yang terlibat dalam pelaksanaan pembangunan fisik di
                    desa dan kelurahan sesuai hasil Musrenbang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang"
                        name="jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang" value="{{ $default['jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota" class="col-sm-4 control-label">Jumlah penduduk yang dilibatkan dalam pelaksanaan proyek padat karya oleh
                    pengelola proyek
                    yang ditunjuk pemerintah desa/kelurahan dan kabupaten/kota</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota"
                        name="jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota"
                        value="{{ $default['jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa" class="col-sm-4 control-label">Jumlah kegiatan yang dilaksanakan oleh masyarakat dan lembaga
                    kemasyarakatan desa/kelurahan yang sudah
                    ada sesuai ketetapan dalam APB-Desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa"
                        name="jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa"
                        value="{{ $default['jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah" class="col-sm-4 control-label">Jumlah kegiatan yang dilaksanakan oleh pihak ketiga tanpa melibatkan
                    masyarakat sesuai ketentuan dalam APB-Daerah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah"
                        name="jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah" value="{{ $default['jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang" class="col-sm-4 control-label">Jumlah kegiatan yang masuk desa/kelurahan di luar yang telah direncakanan
                    dan disepakati masyarakat dalam Musrenbang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang"
                        name="jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang" value="{{ $default['jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan" class="col-sm-4 control-label">Usulan masyarakat yang disetujui menjadi Rencana Kerja Desa dan
                    Kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan" name="usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan"
                        value="{{ $default['usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan" class="col-sm-4 control-label">Usulan Pemerintah Desa dan Kelurahan yang disetujui menjadi Rencana Kerja
                    Desa/Kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan" name="usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan"
                        value="{{ $default['usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat" class="col-sm-4 control-label">Usulan rencana kerja program dan kegiatan dari
                    pemerintah kabupaten/kota/provinsi dan pusat yang dibahas saat Musrenbang dan disetujui untuk
                    dilaksanakan di desa dan kelurahan oleh masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat"
                        name="usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat"
                        value="{{ $default['usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada" class="col-sm-4 control-label">Penyelenggaraan musyawarah desa/kelurahan untuk menerima, memelihara, dan
                    melestarikan hasil pembangunan yang sudah
                    ada</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada" class="required" @checked($default['penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada'] !== null && $default['penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="pelaksanaa_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya" class="col-sm-4 control-label">Pelaksanaan kegiatan dari masyarakat untuk menyelesaikan atau
                    menindaklanjuti kegiatan yang belum
                    diselesaikan oleh pelaksana sebelumnya</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pelaksanaa_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya" class="required" @checked(
                                $default['pelaksanaa_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya'] !== null &&
                                    $default['pelaksanaa_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah" class="col-sm-4 control-label">Jumlah kasus penyimpangan pelaksanaan kegiatan pembangunan yang
                    dilaporkan masyarakat
                    atau lembaga kemasyarakatan desa/kelurahan kepada Kepala Desa/Lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah"
                        name="jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah"
                        value="{{ $default['jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan" class="col-sm-4 control-label">Jumlah kasus penyimpangan pelaksaan pembangunan yang diselesaikan di
                    tingkat desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan" name="jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan"
                        value="{{ $default['jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum" class="col-sm-4 control-label">Jumlah kasus penyimpangan pelaksanaan kegiatan pembangunan desa/kelurahan
                    yang diselesaikan secara hukum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum" name="jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum"
                        value="{{ $default['jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan" class="col-sm-4 control-label">Jenis kegiatan masyarakat untuk melestarikan hasil pembangunan yang
                    dikoordinasikan pemerintah desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan"
                        name="jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan" value="{{ $default['jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan" class="col-sm-4 control-label">Jumlah kegiatan yang didanai dari APB-Desa dan swadaya masyarakat di
                    kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan" name="jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan"
                        value="{{ $default['jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota" class="col-sm-4 control-label">Jumlah kegiatan di desa/kelurahan yang didanai dari APB Daerah
                    Kabupaten/Kota</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota" name="jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota"
                        value="{{ $default['jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi" class="col-sm-4 control-label">Jumlah kegiatan di desa/kelurahan yang didanai dari APBD Provinsi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi" name="jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi"
                        value="{{ $default['jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN" class="col-sm-4 control-label">Jumlah
                    kegiatan di desa dan kelurahan yang didanai APBN</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN" name="jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN" value="{{ $default['jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN'] ?? 0 }}">
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
            $('input[name=jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang], input[name=jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota], input[name=jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa], input[name=jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah], input[name=jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang], input[name=usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat], input[name=jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah], input[name=jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan], input[name=jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum], input[name=jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan], input[name=jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan], input[name=jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota], input[name=jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi], input[name=jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan], input[name=usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan]').inputmask(decimalObj);
        });
    </script>
@endpush
