<table>
    <tbody>
        <tr>
            <td>
                @if ($aksi != 'unduh')
                    <img class="logo" src="{{ gambar_desa($config['logo']) }}" alt="logo-desa">
                @endif
                <h1 class="judul" align="center">
                    PEMERINTAH {!! strtoupper(setting('sebutan_kabupaten') . ' ' . $config['nama_kabupaten'] . ' <br>' . setting('sebutan_kecamatan') . ' ' . $config['nama_kecamatan'] . ' <br>' . setting('sebutan_desa') . ' ' . $config['nama_desa']) !!}
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <hr class="garis">
            </td>
        </tr>
        <tr>
            <td align="center">
                <h4><u>DATA PERANSERTA MASYARAKAT DALAM PEMBANGUNAN<br>SIKAP DAN MENTAL MASYARAKAT</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tanggal</th>
                            <th>Jumlah jenis pungutan liar dari anak gelandangan di sudut jalanan</th>
                            <th>Jumlah jenis pungutan liar di terminal, pelabuhan dan pasar</th>
                            <th>Peminta-minta sumbangan perorangan dari rumah ke rumah</th>
                            <th>Peminta-minta sumbangan terorganisasi dari rumah ke rumah</th>
                            <th>Semakin berkembang praktek jalan pintas dalam mencari uang secara gampang walau tidak halal</th>
                            <th>Jenis pungutan dari RT atau sebutan lain kepada warga</th>
                            <th>Jenis pungutan dari RW atau sebutan lain kepada warga</th>
                            <th>Jenis pungutan dari desa/kelurahan kepada warga</th>
                            <th>Kasus aparat RT/RW atau sebutan lainnya di desa dan kelurahan yang dipecat kena kasus pungutan liar, pemerasan dan sejenisnya</th>
                            <th>Dipindah karena kena kasus pungutan liar, pemerasan dan sejenisnya</th>
                            <th>Diberhentikan dengan hormat karena kena kasus pungutan liar, pemerasan dan sejenisnya</th>
                            <th>Dimutasi karena kena kasus pungutan liar, pemerasan dan sejenisnya</th>
                            <th>Banyak masyarakat yang memberikan biaya lebih dari yang ditentukan sebagai uang rokok atau ucapan terimakasih dalam proses pelayanan administrasi di kantor desa/kelurahan</th>
                            <th>Banyak warga yang ingin mendapatkan pelayanan gratis dari aparat desa/kelurahan</th>
                            <th>Banyak penduduk yang mengeluhkan memburuknya kualitas pelayanan kepada masyarakat</th>
                            <th>Banyak kegiatan yang bersifat hiburan dan rekreasi yang di inisiatifi masyarakat sendiri</th>
                            <th>Masyarakat agak kurang toleran dengan keberadaan kelompok masyarakat dari unsur etnis, agama dan kelompok kepentingan lain</th>
                            <th>Luas Wilayah Desa/Kelurahan sangat luas</th>
                            <th>Banyak lahan terlantar yang tidak dikelola pemiliknya/petani berdasi</th>
                            <th>Banyak lahan pekarangan di sekitar perumahan yang tidak dimanfaatkan</th>
                            <th>Banyak lahan tidur milik masyarakat yang tidak dimanfaatkan</th>
                            <th>Jumlah petani pada musim gagal tanam/panen yang pasrah dan tidak mencari pekerjaan lain</th>
                            <th>Jumlah nelayan pada musim tidak melaut yang memanfaatkan keterampilan /keahlian lainnya untuk mencari pekerjaan lain</th>
                            <th>Banyak penduduk yang mencari pekerjaan diluar desa/kelurahan tetapi masih dalam wilayah kabupaten/kota</th>
                            <th>Banyak penduduk yang mencari pekerjaan di kota besar lainnya</th>
                            <th>Kebiasaan masyarakat merayakan pesta dengan menghadirkan undangan yang banyak</th>
                            <th>Masyarakat sering mendatangi kantor desa dan lurah menuntut penyediaan kebutuhan dasar sembilan bahan pokok pada saat kelaparan dan kekeringan</th>
                            <th>Kebiasaan masyarakat untuk mencari/mengumpulkan bahan makanan pengganti beras/jagung pada saat rawan pangan/kelaparan/gagal panen</th>
                            <th>Kebiasaan pemotongan hewan dalam jumlah besar untuk pesta adat dan perayaan upacara tertentu</th>
                            <th>Kebiasaan masyarakat mendemonstrasi/protes terhadapat kebijakan pemerintah</th>
                            <th>Kebiasaan masyarakat terprovokasi karena isu-isu yang menyesatkan</th>
                            <th>Kebiasaan masyarakat bermusyawarah untuk menyelesaikan berbagai persoalan sosial kemasyarakatan</th>
                            <th>Lebih banyak masyarakat yang diam/masa bodoh/apatis ketika ada persoalan yang terjadi di lingkungan sekitarnya</th>
                            <th>Kebiasaan aparat pemerintah desa/kelurahan terlebih di tingkat RT, RW, Dusun dan Lingkungan yang kurang menanggapi kesuliatan yang dihadapi masyarakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal']) }}</td>
                                <td align="right">{{ $value->data['jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga'] }}</td>
                                <td align="right">{{ $value->data['jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga'] }}</td>
                                <td align="right">{{ $value->data['jenis_pungutan_dari_desa_kelurahan_kepada_warga'] }}</td>
                                <td align="right">{{ $value->data['kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] }}</td>
                                <td align="right">{{ $value->data['dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] }}</td>
                                <td align="right">{{ $value->data['diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] }}</td>
                                <td align="right">{{ $value->data['dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terimakasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_warga_yang_ingin_mendapatkan_pelayanan_gratis_dari_aparat_desa_kelurahan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_di_inisiatifi_masyarakat_sendiri']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['luas_wilayah_desa_kelurahan_sangat_luas']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_masyarakat_mendemonstrasi_protes_terhadap_kebijakan_pemerintah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['lebih_banyak_masyarakat_yang_diam_masa_bodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KetinggianEnum::valueOf($value->data['kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_RT_RW_Dusun_dan_Lingkungan_yang_kurang_menanggapi_kesuliatan_yang_dihadapi_masyarakat']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="10">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
