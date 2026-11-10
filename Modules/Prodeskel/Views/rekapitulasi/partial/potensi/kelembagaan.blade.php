<p><strong>III. POTENSI KELEMBAGAAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>A. LEMBAGA PEMERINTAHAN</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>PEMERINTAH DESA/KELURAHAN</strong></td>
        </tr>
        <tr>
            <td>Dasar hukum pembentukan Pemerintah Desa / Kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\DasarHukumDesaEnum::valueOf($data['lembaga_pemerintahan']['dasar_hukum_pembentukan_pemerintah_desa_kelurahan']) }}</td>
        </tr>
        <tr>
            <td>Dasar hukum pembentukan BPD</td>
            <td>{{ Modules\Prodeskel\Enums\DasarHukumBpdEnum::valueOf($data['lembaga_pemerintahan']['dasar_hukum_pembentukan_bpd']) }}</td>
        </tr>
        <tr>
            <td>Jumlah aparat pemerintahan Desa/Kelurahan</td>
            <td>{{ $data['lembaga_pemerintahan']['jumlah_aparat_pemerintahan_desa_kelurahan'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah perangkat desa/kelurahan</td>
            <td>{{ $data['lembaga_pemerintahan']['jumlah_perangkat_desa_kelurahan'] }} unit kerja</td>
        </tr>
        <tr>
            <td>Kepala Desa/Lurah</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_pemerintahan']['kepala_desa_lurah']) }}</td>
        </tr>
        <tr>
            <td>Sekretaris Desa/Kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_pemerintahan']['sekretaris_desa_kelurahan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Pemerintahan</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_pemerintahan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Pembangunan</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_pembangunan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Pemberdayaan Masyarakat</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_pemberdayaan_masyarakat']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Kesejahteraan Rakyat</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_kesejahteraan_rakyat']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Umum</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_umum']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Keuangan</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_keuangan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan...............................</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_2']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan...............................</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['lembaga_pemerintahan']['kepala_urusan_2']) }}</td>
        </tr>
        <tr>
            <td>Jumlah Staf</td>
            <td>{{ $data['lembaga_pemerintahan']['jumlah_staf'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah Dusun di Desa/Lingkungan di Kelurahan atau sebutan lain</td>
            <td>{{ $data['lembaga_pemerintahan']['jumlah_dusun_di_desa'] }} dusun/lingkungan<br></td>
        </tr>
        <tr>
            <td>Kepala Dusun/Lingkungan ......</td>
            <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($data['lembaga_pemerintahan']['kepala_dusun_lingkungan_1']) }}</td>
        </tr>
        <tr>
            <td>Kepala Dusun/Lingkungan ......</td>
            <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($data['lembaga_pemerintahan']['kepala_dusun_lingkungan_2']) }}</td>
        </tr>
        <tr>
            <td>Kepala Dusun/Lingkungan ......</td>
            <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($data['lembaga_pemerintahan']['kepala_dusun_lingkungan_3']) }}</td>
        </tr>
        <tr>
            <td>Kepala Dusun/Lingkungan ......</td>
            <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($data['lembaga_pemerintahan']['kepala_dusun_lingkungan_4']) }}</td>
        </tr>
        <tr>
            <td>Kepala Dusun/Lingkungan ......</td>
            <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($data['lembaga_pemerintahan']['kepala_dusun_lingkungan_5']) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Tingkat Pendidikan Aparat Desa/Kelurahan</strong></td>
            <td>SD, SMP, SMA, Diploma, S1, Pascasarjana</td>
        </tr>
        <tr>
            <td>Kepala Desa/Lurah</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_desa_lurah']) }}</td>
        </tr>
        <tr>
            <td>Sekretaris Desa/Kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['sekretaris_desa_kelurahan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Pemerintahan</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_pemerintahan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Pembangunan</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_pembangunan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Pemberdayaan Masyarakat</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_pemberdayaan_masyarakat']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Kesejahteraan Rakyat</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_kesejahteraan_rakyat']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Umum</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_umum']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan Keuangan</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['lembagtingkat_pendidikan_aparat_desa_kelurahana_pemerintahan']['kepala_urusan_keuangan']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_1']) }}</td>
        </tr>
        <tr>
            <td>Kepala Urusan</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['tingkat_pendidikan_aparat_desa_kelurahan']['kepala_urusan_2']) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><strong>BADAN PERMUSYAWARATAN DESA</strong></td>
        </tr>
        <tr>
            <td>Keberadaan BPD</td>
            <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($data['badan_permusyawaratan_desa']['keberadaan_bpd']) }}</td>
        </tr>
        <tr>
            <td>Jumlah Anggota BPD</td>
            <td>{{ $data['badan_permusyawaratan_desa']['jumlah_anggota_bpd'] }} orang</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Pendidikan Anggota BPD</td>
            <td>SD, SMP, SMA, Diploma, S1, Pascasarjana</td>
        </tr>
        <tr>
            <td>Ketua</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['ketua']) }}</td>
        </tr>
        <tr>
            <td>Wakil Ketua</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['wakil_ketua']) }}</td>
        </tr>
        <tr>
            <td>Sekretaris</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['sekretaris']) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_1'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_1']) }}</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_2'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_2']) }}</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_3'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_3']) }}</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_4'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_4']) }}</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_5'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_5']) }}</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_6'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_6']) }}</td>
        </tr>
        <tr>
            <td>Anggota, Nama : {{ $data['nama_anggota_bpd']['anggota_7'] }}</td>
            <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($data['pendidikan_anggota_bpd']['anggota_7']) }}</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>B. LEMBAGA KEMASYARAKATAN</strong></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        @foreach ($data['lembaga_kemasyarakatan'] as $key => $item)
            <tr>
                <td colspan="2"><strong>{{ $key }}</strong></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>{{ $item['jumlah'] }}</td>
            </tr>
            <tr>
                <td>Dasar hukum pembentukan</td>
                <td>{{ Modules\Prodeskel\Enums\KomoditasDasarHukumPembentukanEnum::valueOf($item['dasar_hukum_pembentukan']) }}</td>
            </tr>
            <tr>
                <td>Jumlah pengurus</td>
                <td>{{ $item['jumlah_pengurus'] }} orang</td>
            </tr>
            <tr>
                <td>Alamat kantor</td>
                <td>{{ $item['alamat_kantor'] }}</td>
            </tr>
            <tr>
                <td>Ruang lingkup kegiatan</td>
                <td>{{ $item['jumlah_jenis_kegiatan'] }} Jenis , Yakni {{ $item['ruang_lingkup_kegiatan'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>C. TINGKAT PARTISIPASI POLITIK</strong></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="4"><strong>D. LEMBAGA EKONOMI</strong></td>
        </tr>
        @foreach ($data['lembaga_ekonomi'] as $key => $items)
            <tr>
                <td>
                    <strong>{{ $loop->iteration }}. {{ $key }}</strong>
                </td>
                <td><strong>Jumlah/unit</strong></td>
                <td><strong>Jumlah Kegiatan</strong></td>
                <td><strong>Jumlah pengurus dan Anggota</strong></td>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ Modules\Prodeskel\Enums\JenisLembagaEkonomiEnum::valueOf($item['jenis']) }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['jumlah_kegiatan'] }}</td>
                    <td>{{ $item['jumlah_pengurus'] }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table> <br>
<p><strong>E. LEMBAGA PENDIDIKAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="8"><strong>1. Pendidikan Formal</strong></td>
        </tr>
        <tr>
            <td rowspan="2"><strong>Nama</strong></td>
            <td rowspan="2"><strong>Jumlah</strong></td>
            <td rowspan="2"><strong>Status (Terdaftar, terakreditasi)</strong></td>
            <td colspan="3"><strong>Kepemilikan</strong></td>
            <td rowspan="2"><strong>Jumlah Tenaga Pengajar</strong></td>
            <td rowspan="2"><strong>Jumlah siswa/ Mahasiswa</strong></td>
        </tr>
        <tr>
            <td><strong>Pemerintah</strong></td>
            <td><strong>Swasta</strong></td>
            <td><strong>Kelurahan</strong></td>
        </tr>
        @foreach ($data['pendidikan_formal'] as $key => $items)
            @foreach ($items as $item)
                <tr>
                    <td>{{ Modules\Prodeskel\Enums\TingkatanPendidikanEnum::valueOf($item['tingkatan']) }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['status'] ? 'Terdaftar' : 'Terakreditasi' }}</td>
                    <td>{{ $item['jumlah_negeri'] }}</td>
                    <td>{{ $item['jumlah_swasta'] }}</td>
                    <td>{{ $item['jumlah_milik_desa'] }}</td>
                    <td>{{ $item['jumlah_pengajar'] }}</td>
                    <td>{{ $item['jumlah_siswa'] }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="8"><strong>2. Pendidikan Formal Keagamaan</strong></td>
        </tr>
        <tr>
            <td rowspan="2"><strong>Nama</strong></td>
            <td rowspan="2"><strong>Jumlah</strong></td>
            <td rowspan="2"><strong>Status (Terdaftar, terakreditasi)</strong></td>
            <td colspan="3"><strong>Kepemilikan</strong></td>
            <td rowspan="2"><strong>Jumlah Tenaga Pengajar</strong></td>
            <td rowspan="2"><strong>Jumlah siswa/ Mahasiswa</strong></td>
        </tr>
        <tr>
            <td><strong>Pemerintah</strong></td>
            <td><strong>Swasta</strong></td>
            <td><strong>Dll</strong></td>
        </tr>
        @foreach ($data['pendidikan_formal_keagamaan'] as $key => $items)
            @foreach ($items as $item)
                <tr>
                    <td>{{ Modules\Prodeskel\Enums\TingkatanPendidikanEnum::valueOf($item['tingkatan']) }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['status'] ? 'Terdaftar' : 'Terakreditasi' }}</td>
                    <td>{{ $item['jumlah_negeri'] }}</td>
                    <td>{{ $item['jumlah_swasta'] }}</td>
                    <td>{{ $item['jumlah_milik_desa'] }}</td>
                    <td>{{ $item['jumlah_pengajar'] }}</td>
                    <td>{{ $item['jumlah_siswa'] }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table> <br>

<table>
    <tbody>
        <tr>
            <td colspan="5"><strong>3. Pendidikan Non Formal/Kursus</strong></td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td><strong>Jumlah</strong></td>
            <td><strong>Status (Terdaftar, terakreditasi)</strong></td>
            <td><strong>Jumlah Tenaga Pengajar</strong></td>
            <td><strong>Jumlah siswa/ Mahasiswa</strong></td>
        </tr>
        @foreach ($data['pendidikan_non_formal_kursus'] as $key => $items)
            @foreach ($items as $item)
                <tr>
                    <td>{{ Modules\Prodeskel\Enums\TingkatanPendidikanEnum::valueOf($item['tingkatan']) }}</td>
                    <td>{{ $item['jumlah'] }}</td>
                    <td>{{ $item['status'] ? 'Terdaftar' : 'Terakreditasi' }}</td>
                    <td>{{ $item['jumlah_pengajar'] }}</td>
                    <td>{{ $item['jumlah_siswa'] }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>F. LEMBAGA ADAT</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>1. Keberadaan Lembaga Adat</strong></td>
        </tr>
        <tr>
            <td>Pemangku Adat</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['pemangku_adat']) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan Adat</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['kepengurusan_adat']) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>2. Simbol Adat</strong></td>
        </tr>
        <tr>
            <td>Rumah Adat</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['rumah_adat']) }}</td>
        </tr>
        <tr>
            <td>Barang Pusaka</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['barang_pusaka']) }}</td>
        </tr>
        <tr>
            <td>Naskah-naskah</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['naskah_naskah']) }}</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['lainnya']) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>3. Jenis Kegiatan Adat</strong></td>
        </tr>
        <tr>
            <td>Musyawarah adat</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['musyawarah_adat']) }}</td>
        </tr>
        <tr>
            <td>Sanksi Adat</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['sanksi_adat']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat Perkawinan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_perkawinan']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat Kematian</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_kematian']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat Kelahiran</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_kelahiran']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat dalam bercocok tanam</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_dalam_bercocok_tanam']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat bidang perikanan/laut</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_bidang_perikanan_laut']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat bidang kehutanan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_bidang_kehutanan']) }}</td>
        </tr>
        <tr>
            <td>Upacara Adat dalam Pengelolaan sumber daya alam</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_dalam_pengelolaan_sumber_daya_alam']) }}</td>
        </tr>
        <tr>
            <td>Upacara adat dalam Pembangunan rumah</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_dalam_pembangunan_rumah']) }}</td>
        </tr>
        <tr>
            <td>Upacara adat dalam penyelesaian masalah/konflik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['lembaga_adat']['upacara_adat_dalam_penyelesaian_masalah_konflik']) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>G. LEMBAGA KEAMANAN</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>1. Hansip dan Linmas</strong></td>
        </tr>
        <tr>
            <td>Keberadaan Hansip dan Linmas</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['hansip_dan_linmas']['keberadaan_hansip_dan_linmas']) }}</td>
        </tr>
        <tr>
            <td>Jumlah anggota Hansip</td>
            <td>{{ $data['hansip_dan_linmas']['jumlah_anggota_hansip'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah anggota Satgas Linmas</td>
            <td>{{ $data['hansip_dan_linmas']['jumlah_anggota_satgas_linmas'] }} orang</td>
        </tr>
        <tr>
            <td>Pelaksanaan SISKAMLING</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['hansip_dan_linmas']['pelaksanaan_siskamling']) }}</td>
        </tr>
        <tr>
            <td>Jumlah Pos Kamling</td>
            <td>{{ $data['hansip_dan_linmas']['jumlah_pos_kamling'] }} buah</td>
        </tr>
        <tr>
            <td colspan="2"><strong>2. Satpam Swakarsa</strong></td>
        </tr>
        <tr>
            <td>Keberadaan SATPAM SWAKARSA</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['satpam_swakarsa']['keberadaan_satpam_swakarsa']) }}</td>
        </tr>
        <tr>
            <td>Jumlah anggota</td>
            <td>{{ $data['satpam_swakarsa']['jumlah_anggota'] }} orang</td>
        </tr>
        <tr>
            <td>Nama organisasi induk</td>
            <td>{{ $data['satpam_swakarsa']['nama_organisasi_induk'] }}</td>
        </tr>
        <tr>
            <td>Pemilik organisasi</td>
            <td>{{ Modules\Prodeskel\Enums\KomoditasPemilikOrganisasiEnum::valueOf($data['satpam_swakarsa']['pemilik_organisasi']) }}</td>
        </tr>
        <tr>
            <td>Keberadaan organisasi keamanan lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['satpam_swakarsa']['keberadaan_organisasi_keamanan_lainnya']) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>3. Kerjasama Desa/Kelurahan dengan TNI – POLRI dalam Bidang TRANTIBLINMAS</strong>
            </td>
        </tr>
        <tr>
            <td>Mitra Koramil / TNI</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['kerjasama_desa_kelurahan_tni']['mitra_koramil_tni']) }}</td>
        </tr>
        <tr>
            <td>Jumlah anggota</td>
            <td>{{ $data['kerjasama_desa_kelurahan_tni']['jumlah_anggota_tni'] }} Orang</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['kerjasama_desa_kelurahan_tni']['jumlah_kegiatan_tni'] }} Jenis kegiatan</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['kerjasama_desa_kelurahan_tni']['lainnya']) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Babinkamtibmas / POLRI</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['kerjasama_desa_kelurahan_tni']['babinkamtibmas_polri']) }}</td>
        </tr>
        <tr>
            <td>Jumlah anggota</td>
            <td>{{ $data['kerjasama_desa_kelurahan_tni']['jumlah_anggota_polri'] }} Orang</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['kerjasama_desa_kelurahan_tni']['jumlah_kegiatan_polri'] }} Jenis kegiatan</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['kerjasama_desa_kelurahan_tni']['lainnya_polri']) }}</td>
        </tr>
    </tbody>
</table>
