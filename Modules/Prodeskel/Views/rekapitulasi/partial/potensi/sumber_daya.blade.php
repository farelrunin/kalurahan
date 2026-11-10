<div style="border:1px solid gray">
    <table class="no-border" cellpadding="0">
        <tbody>
            <tr>
                <td colspan="3"><strong>1.a. Batas Wilayah</strong></td>
            </tr>
            <tr>
                <td width="15%" align="center"><strong>Batas</strong></td>
                <td width="30%" align="center"><strong>Desa/Kel</strong></td>
                <td width="40%" align="center"><strong>Kecamatan</strong></td>
            </tr>
            <tr>
                <td>Sebelah utara</td>
                <td>: {{ $data['batas_wilayah']['desa_sebelah_utara'] }}</td>
                <td>: {{ $data['batas_wilayah']['kec_sebelah_utara'] }}</td>
            </tr>
            <tr>
                <td>Sebelah selatan</td>
                <td>: {{ $data['batas_wilayah']['desa_sebelah_selatan'] }}</td>
                <td>: {{ $data['batas_wilayah']['kec_sebelah_selatan'] }}</td>
            </tr>
            <tr>
                <td>Sebelah timur</td>
                <td>: {{ $data['batas_wilayah']['desa_sebelah_timur'] }}</td>
                <td>: {{ $data['batas_wilayah']['kec_sebelah_timur'] }}</td>
            </tr>
            <tr>
                <td>Sebelah barat</td>
                <td>: {{ $data['batas_wilayah']['desa_sebelah_barat'] }}</td>
                <td>: {{ $data['batas_wilayah']['kec_sebelah_barat'] }}</td>
            </tr>
        </tbody>
    </table>
</div>
<p></p>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>1.b. Penetapan Batas dan Peta Wilayah</strong></td>
        </tr>
        <tr>
            <td>Penetapan Batas</td>
            <td>Dasar Hukum</td>
            <td>Peta Wilayah</td>
        </tr>
        <tr>
            <td rowspan="2">
                {{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['penetapan_batas_dan_peta_wilayah']['penetapan_batas']) }}
            </td>
            <td>Perdes No {{ $data['penetapan_batas_dan_peta_wilayah']['dasar_hukum_perdes'] }}</td>
            <td rowspan="2">
                {{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['penetapan_batas_dan_peta_wilayah']['peta_wilayah']) }}
            </td>
        </tr>
        <tr>
            <td>Perda No {{ $data['penetapan_batas_dan_peta_wilayah']['dasar_hukum_perda'] }}</td>
        </tr>
    </tbody>
</table>
<p></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Luas wilayah menurut penggunaan</strong></td>
        </tr>
        <tr>
            <td>Luas pemukiman</td>
            <td>{{ $data['luas_wilayah']['luas_pemukiman'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas persawahan</td>
            <td>{{ $data['luas_wilayah']['luas_persawahan'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas perkebunan</td>
            <td>{{ $data['luas_wilayah']['luas_perkebunan'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas kuburan</td>
            <td>{{ $data['luas_wilayah']['luas_kuburan'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas pekarangan</td>
            <td>{{ $data['luas_wilayah']['luas_pekarangan'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas taman</td>
            <td>{{ $data['luas_wilayah']['luas_taman'] }} Ha</td>
        </tr>
        <tr>
            <td>Perkantoran</td>
            <td>{{ $data['luas_wilayah']['perkantoran'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas prasarana umum lainnya</td>
            <td>{{ $data['luas_wilayah']['luas_prasarana_umum_lainnya'] }} Ha</td>
        </tr>
        <tr>
            <td>Total luas</td>
            <td><strong>{{ $data['luas_wilayah']['total_luas'] }} Ha</strong></td>
        </tr>
    </tbody>
</table>
<p></p>
<table>
    <tbody>
        <tr>
            <td>TANAH SAWAH</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Sawah irigasi teknis</td>
            <td>{{ $data['tanah_sawah']['sawah_irigasi_teknis'] }} Ha</td>
        </tr>
        <tr>
            <td>Sawah irigasi ½ teknis</td>
            <td>{{ $data['tanah_sawah']['sawah_irigasi_setengah_teknis'] }} Ha</td>
        </tr>
        <tr>
            <td>Sawah tadah hujan</td>
            <td>{{ $data['tanah_sawah']['sawah_tadah_hujan'] }} Ha</td>
        </tr>
        <tr>
            <td>Sawah pasang surut</td>
            <td>{{ $data['tanah_sawah']['sawah_pasang_surut'] }} Ha</td>
        </tr>
        <tr>
            <td>Total luas</td>
            <td><strong>{{ $data['tanah_sawah']['total_luas'] }} Ha</strong></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>TANAH KERING</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Tegal/ladang</td>
            <td>{{ $data['tanah_kering']['tegal_ladang'] }} Ha</td>
        </tr>
        <tr>
            <td>Pemukiman</td>
            <td>{{ $data['tanah_kering']['pemukiman'] }} Ha</td>
        </tr>
        <tr>
            <td>Pekarangan</td>
            <td>{{ $data['tanah_kering']['pekarangan'] }} Ha</td>
        </tr>
        <tr>
            <td>Total luas</td>
            <td><strong>{{ $data['tanah_kering']['total_luas'] }} Ha</strong></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>TANAH BASAH</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Tanah rawa</td>
            <td>{{ $data['tanah_basah']['tanah_rawa'] }} Ha</td>
        </tr>
        <tr>
            <td>Pasang surut</td>
            <td>{{ $data['tanah_basah']['pasang_surut'] }} Ha</td>
        </tr>
        <tr>
            <td>Lahan gambut</td>
            <td>{{ $data['tanah_basah']['lahan_gambut'] }} Ha</td>
        </tr>
        <tr>
            <td>Situ/waduk/danau</td>
            <td>{{ $data['tanah_basah']['situ_waduk_danau'] }} Ha</td>
        </tr>
        <tr>
            <td>Total luas</td>
            <td><strong>{{ $data['tanah_basah']['total_luas'] }} Ha</strong></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>TANAH PERKEBUNAN</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Tanah perkebunan rakyat</td>
            <td>{{ $data['tanah_perkebunan']['tanah_perkebunan_rakyat'] }} Ha</td>
        </tr>
        <tr>
            <td>Tanah perkebunan negara</td>
            <td>{{ $data['tanah_perkebunan']['tanah_perkebunan_negara'] }} Ha</td>
        </tr>
        <tr>
            <td>Tanah perkebunan swasta</td>
            <td>{{ $data['tanah_perkebunan']['tanah_perkebunan_swasta'] }} Ha</td>
        </tr>
        <tr>
            <td>Tanah perkebunan perorangan</td>
            <td>{{ $data['tanah_perkebunan']['tanah_perkebunan_perorangan'] }} Ha</td>
        </tr>
        <tr>
            <td><strong>Total luas</strong></td>
            <td><strong>{{ $data['tanah_perkebunan']['total_luas'] }} Ha</strong></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>TANAH FASILITAS UMUM</strong></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Kas Desa/Kelurahan:</td>
            <td>{{ $data['tanah_perkebunan']['kas_desa_kelurahan'] }} Ha</td>
        </tr>
        <tr>
            <td>a. Tanah bengkok</td>
            <td>{{ $data['tanah_fasilitas_umum']['tanah_bengkok'] }} Ha</td>
        </tr>
        <tr>
            <td>b. Tanah titi sara</td>
            <td>{{ $data['tanah_fasilitas_umum']['tanah_titi_sara'] }} Ha</td>
        </tr>
        <tr>
            <td>c. Kebun desa</td>
            <td>{{ $data['tanah_fasilitas_umum']['kebun_desa'] }} Ha</td>
        </tr>
        <tr>
            <td>d. Sawah desa</td>
            <td>{{ $data['tanah_fasilitas_umum']['sawah_desa'] }} Ha</td>
        </tr>
        <tr>
            <td>Lapangan olahraga</td>
            <td>{{ $data['tanah_fasilitas_umum']['lapangan_olahraga'] }} Ha</td>
        </tr>
        <tr>
            <td>Perkantoran pemerintah</td>
            <td>{{ $data['tanah_fasilitas_umum']['perkantoran_pemerintah'] }} Ha</td>
        </tr>
        <tr>
            <td>Ruang publik/taman kota</td>
            <td>{{ $data['tanah_fasilitas_umum']['ruang_publik_taman_kota'] }} Ha</td>
        </tr>
        <tr>
            <td>Tempat pemakaman desa/umum</td>
            <td>{{ $data['tanah_fasilitas_umum']['tempat_pemakaman_desa_umum'] }} Ha</td>
        </tr>
        <tr>
            <td>Tempat pembuangan sampah</td>
            <td>{{ $data['tanah_fasilitas_umum']['tempat_pembuangan_sampah'] }} Ha</td>
        </tr>
        <tr>
            <td>Bangunan sekolah/perguruan tinggi</td>
            <td>{{ $data['tanah_fasilitas_umum']['bangunan_sekolah_perguruan_tinggi'] }} Ha</td>
        </tr>
        <tr>
            <td>Pertokoan</td>
            <td>{{ $data['tanah_fasilitas_umum']['pertokoan'] }} Ha</td>
        </tr>
        <tr>
            <td>Fasilitas pasar</td>
            <td>{{ $data['tanah_fasilitas_umum']['fasilitas_pasar'] }} Ha</td>
        </tr>
        <tr>
            <td>Terminal</td>
            <td>{{ $data['tanah_fasilitas_umum']['terminal'] }} Ha</td>
        </tr>
        <tr>
            <td>Jalan</td>
            <td>{{ $data['tanah_fasilitas_umum']['jalan'] }} Ha</td>
        </tr>
        <tr>
            <td>Daerah tangkapan air</td>
            <td>{{ $data['tanah_fasilitas_umum']['daerah_tangkapan_air'] }} Ha</td>
        </tr>
        <tr>
            <td>Usaha perikanan</td>
            <td>{{ $data['tanah_fasilitas_umum']['usaha_perikanan'] }} Ha</td>
        </tr>
        <tr>
            <td>Sutet/aliran listrik tegangan tinggi</td>
            <td>{{ $data['tanah_fasilitas_umum']['sutet_aliran_listrik_tegangan_tinggi'] }} Ha</td>
        </tr>
        <tr>
            <td><strong>Total luas</strong></td>
            <td><strong>{{ $data['tanah_fasilitas_umum']['total_luas'] }} Ha</strong></td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>TANAH HUTAN</strong></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Hutan lindung</td>
            <td>{{ $data['tanah_hutan']['hutan_lindung'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan produksi</td>
            <td>{{ $data['tanah_hutan']['hutan_produksi'] }} Ha</td>
        </tr>
        <tr>
            <td>a. Hutan produksi tetap</td>
            <td>{{ $data['tanah_hutan']['hutan_produksi_tetap'] }} Ha</td>
        </tr>
        <tr>
            <td>b. Hutan terbatas</td>
            <td>{{ $data['tanah_hutan']['tanah_hutan_produksi_terbatas'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan konservasi</td>
            <td>{{ $data['tanah_hutan']['hutan_konservasi'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan adat</td>
            <td>{{ $data['tanah_hutan']['hutan_adat'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan asli</td>
            <td>{{ $data['tanah_hutan']['hutan_asli'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan sekunder</td>
            <td>{{ $data['tanah_hutan']['hutan_sekunder'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan buatan</td>
            <td>{{ $data['tanah_hutan']['hutan_buatan'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan mangrove</td>
            <td>{{ $data['tanah_hutan']['hutan_mangrove'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan suaka</td>
            <td>{{ $data['tanah_hutan']['hutan_suaka'] }} Ha</td>
        </tr>
        <tr>
            <td>a. Suaka alam</td>
            <td>{{ $data['tanah_hutan']['suaka_alam'] }} Ha</td>
        </tr>
        <tr>
            <td>b. Suaka margasatwa</td>
            <td>{{ $data['tanah_hutan']['suaka_margasatwa'] }} Ha</td>
        </tr>
        <tr>
            <td>Hutan rakyat</td>
            <td>{{ $data['tanah_hutan']['hutan_rakyat'] }} Ha</td>
        </tr>
        <tr>
            <td><strong>Total luas</strong></td>
            <td><strong>{{ $data['tanah_hutan']['total_luas'] }} Ha</strong></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<p></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>3. Iklim</strong></td>
        </tr>
        <tr>
            <td>Curah hujan</td>
            <td>{{ $data['iklim']['curah_hujan'] }} mm</td>
        </tr>
        <tr>
            <td>Jumlah bulan hujan</td>
            <td>{{ $data['iklim']['jumlah_bulan_hujan'] }} bulan</td>
        </tr>
        <tr>
            <td>Kelembapan</td>
            <td>{{ $data['iklim']['kelembapan'] }}</td>
        </tr>
        <tr>
            <td>Suhu rata-rata harian</td>
            <td>{{ $data['iklim']['suhu_rata_rata_harian'] }} <sub>o</sub>C</td>
        </tr>
        <tr>
            <td>Tinggi tempat dari permukaan laut</td>
            <td>{{ $data['iklim']['tinggi_tempat_dari_permukaan_laut'] }} mdl</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<p></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4.Jenis dan Kesuburan Tanah</strong></td>
        </tr>
        <tr>
            <td>Warna tanah (sebagian besar)</td>
            <td>{{ $data['jenis_dan_kesuburan_tanah']['warna_tanah'] }}</td>
        </tr>
        <tr>
            <td>Tekstur tanah</td>
            <td>{{ $data['jenis_dan_kesuburan_tanah']['tekstur_tanah'] }}</td>
        </tr>
        <tr>
            <td>Tingkat kemiringan tanah</td>
            <td>{{ $data['jenis_dan_kesuburan_tanah']['tingkat_kemiringan_tanah'] }} derajat</td>
        </tr>
        <tr>
            <td>Lahan kritis</td>
            <td>{{ $data['jenis_dan_kesuburan_tanah']['lahan_kritis'] }} Ha</td>
        </tr>
        <tr>
            <td>Lahan terlantar</td>
            <td>{{ $data['jenis_dan_kesuburan_tanah']['lahan_terlantar'] }} Ha</td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Tingkat erosi tanah</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Luas tanah erosi ringan</td>
            <td>{{ $data['tingkat_erosi_tanah']['luas_tanah_erosi_ringan'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas tanah erosi sedang</td>
            <td>{{ $data['tingkat_erosi_tanah']['luas_tanah_erosi_sedang'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas tanah erosi berat</td>
            <td>{{ $data['tingkat_erosi_tanah']['luas_tanah_erosi_berat'] }} Ha</td>
        </tr>
        <tr>
            <td>Luas tanah yang tidak ada erosi</td>
            <td>{{ $data['tingkat_erosi_tanah']['luas_tanah_yang_tidak_ada_erosi'] }} Ha</td>
        </tr>
    </tbody>
</table>
<p></p>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>5. Topografi</strong></td>
        </tr>
        <tr>
            <td>Desa/kelurahan dataran rendah</td>
            <td>{{ $data['topografi']['desa_kelurahan_dataran_rendah'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_dataran_rendah'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan berbukit-bukit</td>
            <td>{{ $data['topografi']['desa_kelurahan_berbukit'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_berbukit'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan dataran tinggi/pegunungan</td>
            <td>{{ $data['topografi']['desa_kelurahan_dataran_tinggi_pegunungan'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_dataran_tinggi_pegunungan'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan lereng gunung</td>
            <td>{{ $data['topografi']['desa_kelurahan_lereng_gunung'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_lereng_gunung'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan tepi pantai/pesisir</td>
            <td>{{ $data['topografi']['desa_kelurahan_tepi_pantai_pesisir'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_tepi_pantai_pesisir'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan kawasan rawa</td>
            <td>{{ $data['topografi']['desa_kelurahan_kawasan_rawa'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_kawasan_rawa'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan kawasan gambut</td>
            <td>{{ $data['topografi']['desa_kelurahan_kawasan_gambut'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_kawasan_gambut'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan aliran sungai</td>
            <td>{{ $data['topografi']['desa_kelurahan_aliran_sungai'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_aliran_sungai'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan bantaran sungai</td>
            <td>{{ $data['topografi']['desa_kelurahan_bantaran_sungai'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['topografi']['desa_kelurahan_bantaran_sungai'] }} Ha</td>
        </tr>
        <tr>
            <td>Lain-Lain</td>
            <td>&nbsp;</td>
            <td>{{ $data['topografi']['lain_lain'] }} Ha</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Letak</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Desa/kelurahan kawasan perkantoran</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_perkantoran'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_perkantoran'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan kawasan pertokoan/bisnis</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_pertokoan_bisnis'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_pertokoan_bisnis'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan kawasan campuran</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_campuran'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_campuran'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan kawasan industri</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_industri'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_industri'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan kepulauan</td>
            <td>{{ $data['letak']['desa_kelurahan_kepulauan'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kepulauan'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan pantai/pesisir</td>
            <td>{{ $data['letak']['desa_kelurahan_pantai_pesisir'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_pantai_pesisir'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan kawasan hutan</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_hutan'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_hutan'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan taman suaka</td>
            <td>{{ $data['letak']['desa_kelurahan_taman_suaka'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_taman_suaka'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan kawasan wisata</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_wisata'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_kawasan_wisata'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan perbatasan dengan negara lain</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_dengan_negara_lain'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_dengan_negara_lain'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan perbatasan dengan provinsi lain</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_dengan_provinsi_lain'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_dengan_provinsi_lain'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan perbatasan dengan kabupaten lain</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_dengan_kabupaten_lain'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_dengan_kabupaten_lain'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/Kelurahan perbatasan antar kecamatan lain</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_antar_kecamatan_lain'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_perbatasan_antar_kecamatan_lain'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan DAS/bantaran sungai</td>
            <td>{{ $data['letak']['desa_kelurahan_das_bantaran_sungai'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_das_bantaran_sungai'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan rawan banjir</td>
            <td>{{ $data['letak']['desa_kelurahan_rawan_banjir'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_rawan_banjir'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan bebas banjir</td>
            <td>{{ $data['letak']['desa_kelurahan_bebas_banjir'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_bebas_banjir'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan potensial tsunami</td>
            <td>{{ $data['letak']['desa_kelurahan_potensial_tsunami'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_potensial_tsunami'] }} Ha</td>
        </tr>
        <tr>
            <td>Desa/kelurahan rawan jalur gempa bumi</td>
            <td>{{ $data['letak']['desa_kelurahan_rawan_jalur_gempa_bumi'] ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $data['letak']['desa_kelurahan_rawan_jalur_gempa_bumi'] }} Ha</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Orbitasi</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Jarak ke ibu kota kecamatan</td>
            <td colspan="2">{{ $data['orbitasi']['jarak_ke_ibu_kota_kecamatan'] }} Km</td>
        </tr>
        <tr>
            <td>Lama jarak tempuh ke ibu kota kecamatan dengan kendaraan bermotor</td>
            <td colspan="2">{{ $data['orbitasi']['lama_jarak_tempuh_ke_ibu_kota_kecamatan_dengan_kendaraan_bermotor'] }} Jam</td>
        </tr>
        <tr>
            <td>Lama jarak tempuh ke ibu kota kecamatan dengan berjalan kaki atau kendaraan non bermotor</td>
            <td colspan="2">{{ $data['orbitasi']['lama_jarak_tempuh_ke_ibu_kota_kecamatan_dengan_berjalan_kaki_atau_kendaraan_non_bermotor'] }} Jam</td>
        </tr>
        <tr>
            <td>Kendaraan umum ke ibu kota kecamatan</td>
            <td>{{ $data['orbitasi']['kendaraan_umum_ke_ibu_kota_kecamatan'] }} unit</td>
            <td>{{ $data['orbitasi']['kendaraan_umum_ke_ibu_kota_kecamatan'] ? 'Ada' : 'Tidak Ada' }}</td>
        </tr>
        <tr>
            <td>Jarak ke ibu kota kabupaten/kota</td>
            <td colspan="2">{{ $data['orbitasi']['jarak_ke_ibu_kota_kabupaten_kota'] }} Km</td>
        </tr>
        <tr>
            <td>Lama jarak tempuh ke ibu kota kabupaten dengan kendaraan bermotor</td>
            <td colspan="2">{{ $data['orbitasi']['lama_jarak_tempuh_ke_ibu_kota_kabupaten_dengan_kendaraan_bermotor'] }} Jam</td>
        </tr>
        <tr>
            <td>Lama jarak tempuh ke ibu kota kabupaten dengan berjalan kaki atau kendaraan non bermotor</td>
            <td colspan="2">{{ $data['orbitasi']['lama_jarak_tempuh_ke_ibu_kota_kabupaten_dengan_berjalan_kaki_atau_kendaraan_non_bermotor'] }} Jam</td>
        </tr>
        <tr>
            <td>Kendaraan umum ke ibu kota kabupaten/kota</td>
            <td>{{ $data['orbitasi']['kendaraan_umum_ke_ibu_kota_kabupaten_kota'] }} unit</td>
            <td>{{ $data['orbitasi']['kendaraan_umum_ke_ibu_kota_kabupaten_kota'] ? 'Ada' : 'Tidak Ada' }}</td>
        </tr>
        <tr>
            <td>Jarak ke ibu kota provinsi</td>
            <td colspan="2">{{ $data['orbitasi']['jarak_ke_ibu_kota_provinsi'] }} Km</td>
        </tr>
        <tr>
            <td>Lama jarak tempuh ke ibu kota provinsi dengan kendaraan bermotor</td>
            <td colspan="2">{{ $data['orbitasi']['lama_jarak_tempuh_ke_ibu_kota_provinsi_dengan_kendaraan_bermotor'] }} Jam</td>
        </tr>
        <tr>
            <td>Lama jarak tempuh ke ibu kota provinsi dengan berjalan kaki atau kendaraan non bermotor</td>
            <td colspan="2">{{ $data['orbitasi']['lama_jarak_tempuh_ke_ibu_kota_provinsi_dengan_berjalan_kaki_atau_kendaraan_non_bermotor'] }} Jam</td>
        </tr>
        <tr>
            <td>Kendaraan umum ke ibu kota provinsi</td>
            <td>{{ $data['orbitasi']['kendaraan_umum_ke_ibu_kota_provinsi'] }} unit</td>
            <td>{{ $data['orbitasi']['kendaraan_umum_ke_ibu_kota_provinsi'] ? 'Ada' : 'Tidak Ada' }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
