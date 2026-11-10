<p>
    <strong>IV. POTENSI PRASARANA DAN SARANA</strong>
</p>
<p><strong>A. PRASARANA DAN SARANA TRANSPORTASI</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="3">
                <p><strong>1. Prasarana Transportasi Darat</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p align="center"><strong>Jenis Sarana dan Prasarana</strong></p>
            </td>
            <td><strong>Baik (km atau unit)</strong></td>
            <td><strong>Rusak (km atau unit)</strong></td>
        </tr>
        @foreach ($data['sarana_transportasi_darat'] as $key => $item)
            <tr>
                <td>{{ Modules\Prodeskel\Enums\SaranaTransportasiDaratEnum::valueOf($item['kategori']) }} -
                    {{ Modules\Prodeskel\Enums\JenisPrasaranaTransportasiDaratEnum::valueOf($item['jenis']) }}</td>
                <td>{{ $item['kondisi_baik'] }}</td>
                <td>{{ $item['kondisi_rusak'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@foreach (Modules\Prodeskel\Enums\SaranaAngkutanLainEnum::all() as $key => $item)
    <br>
    <table>
        <tbody>
            <tr>
                <td colspan="2"><strong>{{ $loop->iteration + 1 }}. {{ $item }}</strong></td>
            </tr>
            <tr>
                <td>Jenis Sarana/Prasarana Jumlah (Unit)</td>
                <td>{{ $data['prasarana_transportasi_laut_sungai'][$key]['jumlah'] ?? '0' }}</td>
            </tr>
        </tbody>
    </table>
@endforeach
<p>
    <strong>B. PRASARANA KOMUNIKASI DAN INFORMASI</strong>
</p>
@foreach (Modules\Prodeskel\Enums\SaranaKomunikasiInformasiEnum::all() as $key => $item)
    <table>
        <tbody>
            <tr>
                <td colspan="2"><strong>{{ $loop->iteration }}. {{ $item }}</strong></td>
            </tr>
            @foreach ($data['sarana_komunikasi_informasi'][$key] as $items)
                <tr>
                    <td>{{ Modules\Prodeskel\Enums\JenisPrasaranaKomunikasiInformasiEnum::valueOf($items['jenis']) }}</td>
                    <td>{{ $items['jumlah'] }} {{ Modules\Prodeskel\Enums\SatuanEnum::valueOf($items['satuan']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br>
@endforeach
<p><strong>C. PRASARANA AIR BERSIH DAN SANITASI</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Prasarana air bersih</strong></td>
        </tr>
        <tr>
            <td>Jumlah sumur pompa</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_sumur_pompa'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah sumur gali</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_sumur_gali'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah hidran umum</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_hidran_umum'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah PAH</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_pah'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah tangki air bersih</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_tangki_air_bersih'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah embung</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_embung'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah mata air</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_mata_air'] }} unit</td>
        </tr>
        <tr>
            <td> Jumlah bangunan pengolahan air bersih/air minum</td>
            <td>{{ $data['prasarana_air_bersih']['jumlah_bangunan_pengolahan_air_bersih'] }} unit</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Sanitasi</strong></td>
        </tr>
        <tr>
            <td>Saluran drainase/saluran pembuangan air limbah</td>
            <td>{{ $data['sanitasi']['saluran_drainase_pembuangan_air_limbah'] }}</td>
        </tr>
        <tr>
            <td>Sumur resapan air rumah tangga</td>
            <td>{{ $data['sanitasi']['sumur_resapan_air_rumah_tangga'] }} rumah</td>
        </tr>
        <tr>
            <td>Jumlah MCK Umum</td>
            <td>{{ $data['sanitasi']['jumlah_mck_umum'] }} unit</td>
        </tr>
        <tr>
            <td> Pemilik jumlah jamban keluarga</td>
            <td>{{ $data['sanitasi']['pemilik_jumlah_jamban_keluarga'] }} KK</td>
        </tr>
        <tr>
            <td> Kondisi saluran drainase/saluran<br> pembuangan air limbah</td>
            <td>{{ $data['sanitasi']['kondisi_saluran_drainase_pembuangan_air_limbah'] }}</td>
        </tr>
    </tbody>
</table>
<p><strong>D. PRASARANA DAN KONDISI IRIGASI</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Prasarana Irigasi</strong></td>
        </tr>
        <tr>
            <td>Panjang saluran primer</td>
            <td>{{ $data['prasarana_irigasi']['panjang_saluran_primer'] }} m</td>
        </tr>
        <tr>
            <td>Panjang saluran sekunder</td>
            <td>{{ $data['prasarana_irigasi']['panjang_saluran_sekunder'] }} m</td>
        </tr>
        <tr>
            <td>Panjang saluran tersier</td>
            <td>{{ $data['prasarana_irigasi']['panjang_saluran_tersier'] }} m</td>
        </tr>
        <tr>
            <td>Jumlah pintu sadap</td>
            <td>{{ $data['prasarana_irigasi']['jumlah_pintu_sadap'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah pintu pembagi air</td>
            <td>{{ $data['prasarana_irigasi']['jumlah_pintu_pembagi_air'] }} unit</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Kondisi</strong></td>
        </tr>
        <tr>
            <td>Panjang saluran primer rusak</td>
            <td>{{ $data['kondisi']['panjang_saluran_primer_rusak'] }} m</td>
        </tr>
        <tr>
            <td>Panjang saluran sekunder rusak</td>
            <td>{{ $data['kondisi']['panjang_saluran_sekunder_rusak'] }} m</td>
        </tr>
        <tr>
            <td>Panjang saluran tersier rusak</td>
            <td>{{ $data['kondisi']['panjang_saluran_tersier_rusak'] }} m</td>
        </tr>
        <tr>
            <td>Jumlah pintu sadap rusak</td>
            <td>{{ $data['kondisi']['jumlah_pintu_sadap_rusak'] }} unit</td>
        </tr>
        <tr>
            <td>Jumlah pintu pembagi air rusak</td>
            <td>{{ $data['kondisi']['jumlah_pintu_pembagi_air_rusak'] }} unit</td>
        </tr>
    </tbody>
</table>
<p><strong><br> E. PRASARANA DAN SARANA PEMERINTAHAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Prasarana dan Sarana Pemerintahan Desa/Kelurahan</strong></td>
        </tr>
        <tr>
            <td>Gedung Kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['gedung_kantor']) }}</td>
        </tr>
        <tr>
            <td>Kondisi</td>
            <td>{{ Modules\Prodeskel\Enums\RusakEnum::valueOf($data['sarana_desa']['kondisi']) }}</td>
        </tr>
        <tr>
            <td>Jumlah ruang kerja</td>
            <td>{{ $data['sarana_desa']['jumlah_ruang_kerja'] }} Ruang</td>
        </tr>
        <tr>
            <td>Balai Desa/Kelurahan/sejenisnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['balai_desa_kelurahan_sejenisnya']) }}</td>
        </tr>
        <tr>
            <td>Listrik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['listrik']) }}</td>
        </tr>
        <tr>
            <td>Air bersih</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['air_bersih']) }}</td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['telepon']) }}</td>
        </tr>
        <tr>
            <td>Rumah Dinas Kepala Desa/Lurah</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['rumah_dinas_kepala_desa_lurah']) }}</td>
        </tr>
        <tr>
            <td>Rumah Dinas Perangkat Desa/Kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['rumah_dinas_perangkat_desa']) }}</td>
        </tr>
        <tr>
            <td>Lainnya 1</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['lainnya_1']) }}</td>
        </tr>
        <tr>
            <td>Lainnya 2</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_desa']['lainnya_2']) }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Inventaris dan alat tulis kantor</strong></td>
        </tr>
        <tr>
            <td>Jumlah mesin tik</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['jumlah_mesin_tik'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah meja</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['jumlah_meja'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah kursi</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['jumlah_kursi'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah almari arsip</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['jumlah_almari_arsip'] }} buah</td>
        </tr>
        <tr>
            <td>Komputer</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['komputer'] }} unit</td>
        </tr>
        <tr>
            <td>Mesin fax</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['mesin_fax'] }} unit</td>
        </tr>
        <tr>
            <td>Kendaraan dinas</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['kendaraan_dinas'] }} unit</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Administrasi Pemerintahan Desa/Kelurahan</strong></td>
        </tr>
        <tr>
            <td>Buku Data Peraturan Desa</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_peraturan_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku Keputusan Kepala Desa/Lurah</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_keputusan_kepala_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi kependudukan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_administrasi_kependudukan']) }}</td>
        </tr>
        <tr>
            <td>Buku data inventaris</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_inventaris']) }}</td>
        </tr>
        <tr>
            <td>Buku data aparat</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_aparat']) }}</td>
        </tr>
        <tr>
            <td>Buku data tanah milik desa/tanah kas desa/milik kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_tanah_milik_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi pajak dan retribusi</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_administrasi_pajak_dan_retribusi']) }}</td>
        </tr>
        <tr>
            <td>Buku data tanah</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_tanah']) }}</td>
        </tr>
        <tr>
            <td>Buku laporan pengaduan masyarakat</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_laporan_pengaduan_masyarakat']) }}</td>
        </tr>
        <tr>
            <td>Buku agenda ekspedisi</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_agenda_ekspedisi']) }}</td>
        </tr>
        <tr>
            <td>Buku profil desa/kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_profil_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku data induk penduduk</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_induk_penduduk']) }}</td>
        </tr>
        <tr>
            <td>Buku buku data mutasi penduduk</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_buku_data_mutasi_penduduk']) }}</td>
        </tr>
        <tr>
            <td>Buku rekapitulasi jumlah penduduk akhir bulan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_rekapitulasi_jumlah_penduduk_akhir_bulan']) }}</td>
        </tr>
        <tr>
            <td>Buku registrasi pelayanan penduduk</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_registrasi_pelayanan_penduduk']) }}</td>
        </tr>
        <tr>
            <td>Buku data penduduk sementara</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_penduduk_sementara']) }}</td>
        </tr>
        <tr>
            <td>Buku anggaran penerimaan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_anggaran_penerimaan']) }}</td>
        </tr>
        <tr>
            <td>Buku anggaran pengeluaran pegawai dan pembangunan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_anggaran_pengeluaran_pegawai_dan_pembangunan']) }}</td>
        </tr>
        <tr>
            <td>Buku kas umum</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_kas_umum']) }}</td>
        </tr>
        <tr>
            <td>Buku kas pembantu penerimaan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_kas_pembantu_penerimaan']) }}</td>
        </tr>
        <tr>
            <td>Buku kas pembantu pengeluaran rutin dan pembangunan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_kas_pembantu_pengeluaran_rutin_dan_pembangunan']) }}</td>
        </tr>
        <tr>
            <td>Buku data lembaga kemasyarakatan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa']['buku_data_lembaga_kemasyarakatan']) }}</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Prasarana dan Sarana Badan Permusyawaratan Desa/BPD</strong></td>
        </tr>
        <tr>
            <td>Gedung Kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_bpd']['gedung_kantor']) }}</td>
        </tr>
        <tr>
            <td>Ruangan Kerja</td>
            <td>{{ $data['sarana_bpd']['ruangan_kerja'] }} Ruang</td>
        </tr>
        <tr>
            <td>Balai BPD</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_bpd']['balai_bpd']) }}</td>
        </tr>
        <tr>
            <td>Kondisi</td>
            <td>{{ Modules\Prodeskel\Enums\RusakEnum::valueOf($data['sarana_bpd']['kondisi']) }}</td>
        </tr>
        <tr>
            <td>Listrik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_bpd']['listrik']) }}</td>
        </tr>
        <tr>
            <td>Air bersih</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_bpd']['air_bersih']) }}</td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['sarana_bpd']['telepon']) }}</td>
        </tr>
        <tr>
            <td>Inventaris dan alat tulis kantor</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Jumlah mesin tik</td>
            <td>{{ $data['sarana_bpd']['jumlah_mesin_tik'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah meja</td>
            <td>{{ $data['sarana_bpd']['jumlah_meja'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah kursi</td>
            <td>{{ $data['sarana_bpd']['jumlah_kursi'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah almari arsip</td>
            <td>{{ $data['sarana_bpd']['jumlah_almari_arsip'] }} buah</td>
        </tr>
        <tr>
            <td>Komputer</td>
            <td>{{ $data['sarana_bpd']['komputer'] }} unit</td>
        </tr>
        <tr>
            <td>Mesin fax</td>
            <td>{{ $data['sarana_bpd']['mesin_fax'] }} unit</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ $data['sarana_bpd']['lainnya'] }} </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Administrasi BPD</strong></td>
        </tr>
        <tr>
            <td>Buku-buku administrasi keanggotaan BPD</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_buku_administrasi_keanggotaan_bpd']) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi kegiatan BPD</td>
            <td>{{ $data['administrasi_bpd']['buku_administrasi_kegiatan_bpd'] }}Jenis</td>
        </tr>
        <tr>
            <td>Buku kegiatan BPD</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_kegiatan_bpd']) }}</td>
        </tr>
        <tr>
            <td>Buku Himpunan Peraturan Desa yang ditetapkan BPD dan Kepala Desa</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_himpunan_peraturan_desa_yang_ditetapkan_bpd_dan_kepala_desa']) }}</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['lainnya']) }}</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>3. Prasarana dan Sarana Dusun/Lingkungan atau Sebutan Lain</strong></td>
        </tr>
        <tr>
            <td>Gedung kantor atau Balai Pertemuan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun']['gedung_kantor_atau_balai_pertemuan']) }}</td>
        </tr>
        <tr>
            <td>Alat tulis kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun']['alat_tulis_kantor']) }}</td>
        </tr>
        <tr>
            <td>Barang inventaris</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun']['barang_inventaris']) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun']['buku_administrasi']) }} jenis</td>
        </tr>
        <tr>
            <td>Jenis kegiatan</td>
            <td>{{ $data['prasarana_dan_sarana_dusun']['jenis_kegiatan'] }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah pengurus</td>
            <td>{{ $data['prasarana_dan_sarana_dusun']['jumlah_pengurus'] }} Orang</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun']['lainnya']) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<p><strong>F. PRASARANA DAN SARANA LEMBAGA KEMASYARAKATAN DESA/KELURAHAN</strong></p>
<table>
    <tbody>
        <tr>
            <td>Gedung/kantor Lembaga Kemasyarakatan Desa dan Kelurahan/LKD/LK</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['gedung_kantor_lkd_lkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Peralatan Kantor: komputer, fax</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['peralatan_kantor_lkd_lkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Mesin tik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['mesin_tik_lkd_lkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kardek</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kardek_lkd_lkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi lembaga kemasyarakatan</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_lkd_lkk'] ?? 0 }} jenis</td>
        </tr>
        <tr>
            <td>Jumlah meja dan kursi</td>
            <td>{{ $data['prasarana_lkm']['jml_meja_kursi_lkd_lkk'] ?? 0 }} unit</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['lainnya_lkd_lkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>LKMD/LPM atau sebutan lain</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Memiliki kantor sendiri</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['memiliki_kantor_sendiri_lkmd_lpm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Peralatan Kantor : komputer, fax</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['peralatan_kantor_lkmd_lpm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Mesin tik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['mesin_tik_lkmd_lkm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kardek</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kardek_lkmd_lkm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi lembaga kemasyarakatan</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_lkmd_lkm'] ?? 0 }} jenis</td>
        </tr>
        <tr>
            <td>Jumlah meja dan kursi</td>
            <td>{{ $data['prasarana_lkm']['jml_meja_kursi_lkmd_lkm'] ?? 0 }} unit</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_kmd_lkm'] ?? 0 }} jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_lkmd_lkm'] ?? 0 }} jenis</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['lainnya_lkmd_lkm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>PKK</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['pkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Gedung/kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['gedung_kantor_pkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Peralatan kantor/ATK/inventaris</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['peralatan_kantor_atk_inventaris'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_pkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi PKK</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['buku_administrasi_pkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kegiatan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kegiatan_pkk'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_pkk'] ?? 0 }} jenis</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Karang Taruna</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['karang_taruna'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_kt'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_kt'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_kt'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['lainnya_kt'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>RT</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['rt'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_rt'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_rt'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_rt'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>RW</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['rw'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_rw'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_rw'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_rw'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['lainnya_rw'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Lembaga adat</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['lembaga_adat'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Memiliki kantor/gedung/menumpang</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['memiliki_kantor_la'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_la'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_la'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_la'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>BUMDES</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['bumdes'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Memiliki kantor/gedung/menumpang</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['memiliki_kantor_bumdes'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_bumdes'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_bumdes'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_bumdes'] ?? 0 }} Jenis</td>
        </tr>
    </tbody>
</table>
<br>
<table>
    <tbody>
        <tr>
            <td><strong>Forum Komunikasi Kader Pemberdayaan Masyarakat</strong></td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['forum_komunikasi_kader_pemberdayaan_masyarakat'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Memiliki kantor/gedung/menumpang</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['memiliki_kantor_fkkm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kepengurusan_fkkm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_lkm']['buku_administrasi_fkkm'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan</td>
            <td>{{ $data['prasarana_lkm']['jml_kegiatan_fkkm'] ?? 0 }} Jenis</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['lainnya_fkkm'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><strong>Kantor/gedung Organisasi Sosial Kemasyarakatan lainnya</strong></td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Memiliki kantor/gedung/menumpang</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf(0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf(0) }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Kantor/gedung Organisasi Profesi yang ada</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_lkm']['kantor_gedung_organisasi_profesi_yang_ada'] ?? 0) }}</td>
        </tr>
        <tr>
            <td>Memiliki kantor/gedung/menumpang</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf(0) }}</td>
        </tr>
        <tr>
            <td>Kepengurusan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf(0) }}</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>0 Jenis</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<p><strong>G. PRASARANA PERIBADATAN</strong></p>
<table>
    <tbody>
        @foreach ($data['sarana_agama'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }} buah</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>H. PRASARANA OLAH RAGA </strong></p>
<table>
    <tbody>
        @foreach ($data['sarana_olahraga'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }} buah</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>I. PRASARANA DAN SARANA KESEHATAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Prasarana Kesehatan</strong></td>
        </tr>
        @foreach ($data['prasarana_kesehatan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }} buah</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Sarana Kesehatan</strong></td>
        </tr>
        @foreach ($data['sarana_kesehatan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }} buah</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>J. PRASARANA DAN SARANA PENDIDIKAN</strong></p>
<table>
    <tbody>
        @foreach ($data['sarana_pendidikan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }} buah</td>
                <td>milik sendiri {{ $item['jumlah_sendiri'] }} buah</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>K. PRASARANA ENERGI DAN PENERANGAN</strong></p>
<table>
    <tbody>
        <tr>
            <td>Listrik PLN</td>
            <td>{{ $data['prasarana_energi']['listrik_pln'] }} unit</td>
        </tr>
        <tr>
            <td>Diesel umum</td>
            <td>{{ $data['prasarana_energi']['diesel_umum'] }} unit</td>
        </tr>
        <tr>
            <td>Genset pribadi</td>
            <td>{{ $data['prasarana_energi']['genset_pribadi'] }} unit</td>
        </tr>
        <tr>
            <td>Lampu minyak tanah/jarak/kelapa</td>
            <td>{{ $data['prasarana_energi']['lampu_minyak_tanah'] }} Keluarga</td>
        </tr>
        <tr>
            <td>Kayu bakar</td>
            <td>{{ $data['prasarana_energi']['kayu_bakar'] }} Keluarga</td>
        </tr>
        <tr>
            <td>Batu bara</td>
            <td>{{ $data['prasarana_energi']['batu_bara'] }} Keluarga</td>
        </tr>
        <tr>
            <td>Tanpa penerangan</td>
            <td>{{ $data['prasarana_energi']['tanpa_penerangan'] }} Keluarga</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
<p><strong>L. PRASARANA HIBURAN DAN WISATA</strong></p>
<table>
    <tbody>
        @foreach ($data['sarana_wisata'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }} buah</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>M. PRASARANA DAN SARANA KEBERSIHAN</strong></p>
<table>
    <tbody>
        <tr>
            <td>Tempat Pembuangan Sementara (TPS)</td>
            <td>{{ $data['sarana_kebersihan']['tempat_pembuangan_sementara'] }} Lokasi</td>
        </tr>
        <tr>
            <td>Tempat Pembuangan Akhir (TPA)</td>
            <td>{{ $data['sarana_kebersihan']['tempat_pembuangan_akhir'] }} Lokasi</td>
        </tr>
        <tr>
            <td>Alat penghancur sampah</td>
            <td>{{ $data['sarana_kebersihan']['alat_penghancur_sampah'] }}</td>
        </tr>
        <tr>
            <td>Jumlah gerobak sampah</td>
            <td>{{ $data['sarana_kebersihan']['jumlah_gerobak_sampah'] }} Unit</td>
        </tr>
        <tr>
            <td>Jumlah tong sampah</td>
            <td>{{ $data['sarana_kebersihan']['jumlah_tong_sampah'] }} Unit</td>
        </tr>
        <tr>
            <td>Jumlah truck pengangkut sampah</td>
            <td>{{ $data['sarana_kebersihan']['jumlah_truck_pengangkut_sampah'] }} Unit</td>
        </tr>
        <tr>
            <td>Jumlah Satgas Kebersihan</td>
            <td>{{ $data['sarana_kebersihan']['jumlah_satgas_kebersihan'] }} Kelompok</td>
        </tr>
        <tr>
            <td>Jumlah anggota Satgas Kebersihan</td>
            <td>{{ $data['sarana_kebersihan']['jumlah_anggota_satgas_kebersihan'] }} Orang</td>
        </tr>
        <tr>
            <td>Jumlah pemulung</td>
            <td>{{ $data['sarana_kebersihan']['jumlah_pemulung'] }} Orang</td>
        </tr>
        <tr>
            <td>Tempat pengelolaan sampah</td>
            <td>{{ $data['sarana_kebersihan']['tempat_pengelolaan_sampah'] }} </td>
        </tr>
        <tr>
            <td>Pengelolaan sampah lingkungan/RT</td>
            <td>{{ $data['sarana_kebersihan']['pengelolaan_sampah_lingkungan'] }} </td>
        </tr>
        <tr>
            <td>Pengelola sampah lainnya</td>
            <td>{{ $data['sarana_kebersihan']['pengelola_sampah_lainnya'] }} </td>
        </tr>
    </tbody>
</table>
<p>&nbsp;</p>
