<p> <strong>XIII. PEMERINTAHAN DESA DAN KELURAHAN</strong></p>
<table style="border-collapse: collapse" width="100%" border="1">
    <tbody>
        <tr>
            <td colspan="2"><strong>A. APB-Desa dan Anggaran Kelurahan</strong></td>
        </tr>
        <tr>
            <td>Jumlah anggaran belanja dan penerimaan Desa/Kelurahan tahun ini</td>
            <td>Rp
                {{ $data['apb_desa_dan_anggaran_kelurahan']['jumlah_anggaran_belanja_dan_penerimaan_desa_kelurahan_tahun_ini'] }}
            </td>
        </tr>
        <tr>
            <td colspan="2">Sumber Anggaran</td>
        </tr>
        <tr>
            <td>APBD Kabupaten/Kota</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['apbd_kabupaten_kota'] }}</td>
        </tr>
        <tr>
            <td>Bantuan Pemerintah Kabupaten/Kota</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['bantuan_pemerintah_kabupaten_kota'] }}</td>
        </tr>
        <tr>
            <td>Bantuan Pemerintah Provinsi</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['bantuan_pemerintah_provinsi'] }}</td>
        </tr>
        <tr>
            <td>Bantuan Pemerintah Pusat</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['bantuan_pemerintah_pusat'] }}</td>
        </tr>
        <tr>
            <td>Pendapatan Asli Desa</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['pendapatan_asli_desa'] }}</td>
        </tr>
        <tr>
            <td>Swadaya Masyarakat Desa dan Kelurahan</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['swadaya_masyarakat_desa_dan_kelurahan'] }}</td>
        </tr>
        <tr>
            <td>Alokasi Dana Desa</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['alokasi_dana_desa'] }}</td>
        </tr>
        <tr>
            <td>Sumber Pendapatan dari Perusahaan yang ada di desa/kelurahan</td>
            <td>Rp
                {{ $data['apb_desa_dan_anggaran_kelurahan']['sumber_pendapatan_dari_perusahaan_yang_ada_di_desa_kelurahan'] }}
            </td>
        </tr>
        <tr>
            <td>Sumber pendapatan lain yang sah dan tidakmengikat</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['sumber_pendapatan_lain_yang_sah_dan_tidakmengikat'] }}
            </td>
        </tr>
        <tr>
            <td>Jumlah Belanja Publik/belanja pembangunan</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['jumlah_belanja_publik_belanja_pembangunan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah Belanja Aparatur/pegawai</td>
            <td>Rp {{ $data['apb_desa_dan_anggaran_kelurahan']['jumlah_belanja_aparatur_pegawai'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>B. Pertanggungjawaban Kepala Desa/Lurah</strong></td>
        </tr>
        <tr>
            <td>Penyampaian laporan keterangan pertanggungan jawab Kepala Desa kepada BPD</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['pertanggungjawaban_kepala_desa_lurah']['penyampaian_laporan_keterangan_pertanggungan_jawab_kepala_desa_kepada_bpd']) }}
            </td>
        </tr>
        <tr>
            <td>Jumlah informasi yang disampaikan kepala desa dan lurah tentang laporan penyelenggaraan tugas,
                wewenang, hak dan kewajiban kepala desa dan lurah kepada masyarakat</td>
            <td>{{ $data['pertanggungjawaban_kepala_desa_lurah']['jumlah_informasi_yang_disampaikan_kepala_desa_dan_lurah_tentang_laporan_penyelenggaraan_tugas_wewenang_hak_dan_kewajiban_kepala_desa_dan_lurah_kepada_masyarakat'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Status laporan keterangan pertanggungjawaban kepala Desa</td>
            <td>{{ Modules\Prodeskel\Enums\TerimaTolakEnum::valueOf($data['pertanggungjawaban_kepala_desa_lurah']['status_laporan_keterangan_pertanggungjawaban_kepala_desa']) }}
            </td>
        </tr>
        <tr>
            <td>Laporan kinerja penyelenggaraan tugas, wewenang, kewajiban dan hak kepala desa dan lurah kepada
                Bupati/Walikota</td>
            <td>{{ Modules\Prodeskel\Enums\TerimaRevisiEnum::valueOf($data['pertanggungjawaban_kepala_desa_lurah']['laporan_kinerja_penyelenggaraan_tugas_wewenang_kewajiban_dan_hak_kepala_desa_dan_lurah_kepada_bupati_walikota']) }}
            </td>
        </tr>
        <tr>
            <td>Jumlah jenis media informasi kinerja kepala desa dan lurah kepada masyarakat</td>
            <td>{{ $data['pertanggungjawaban_kepala_desa_lurah']['jumlah_jenis_media_informasi_kinerja_kepala_desa_dan_lurah_kepada_masyarakat'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Jumlah kasus pengaduan masyarakat terhadap masalah pembangunan, pelayanan dan pembinaan kemasyarakatan
                yang disampaikan kepada kepala desa/lurah</td>
            <td>{{ $data['pertanggungjawaban_kepala_desa_lurah']['jumlah_kasus_pengaduan_masyarakat_terhadap_masalah_pembangunan_pelayanan_dan_pembinaan_kemasyarakatan_yang_disampaikan_kepada_kepala_desa_lurah'] }}
                kasus</td>
        </tr>
        <tr>
            <td>Jumlah kasus pengaduan masyarakat terhadap masalah pembangunan, pelayanan dan pembinaan kemasyarakatan
                yang diselesaikan kepala desa/lurah</td>
            <td>{{ $data['pertanggungjawaban_kepala_desa_lurah']['jumlah_kasus_pengaduan_masyarakat_terhadap_masalah_pembangunan_pelayanan_dan_pembinaan_kemasyarakatan_yang_diselesaikan_kepala_desa_lurah'] }}
                kasus</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>C. Prasarana Dan Administrasi Pemerintahan Desa/Kelurahan</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>1. PEMERINTAH DESA/KELURAHAN</strong></td>
        </tr>
        <tr>
            <td>Gedung Kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_administrasi_pemerintahan_desa_kelurahan']['gedung_kantor']) }}</td>
        </tr>
        <tr>
            <td>Jumlah ruang kerja</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_administrasi_pemerintahan_desa_kelurahan']['jumlah_ruang_kerja_ruang']) }} Ruang</td>
        </tr>
        <tr>
            <td>Balai Desa/Kelurahan/sejenisnya</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_administrasi_pemerintahan_desa_kelurahan']['balai_desa_kelurahan_sejenisnya']) }}</td>
        </tr>
        <tr>
            <td>Listrik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_administrasi_pemerintahan_desa_kelurahan']['listrik']) }}</td>
        </tr>
        <tr>
            <td>Air bersih</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_administrasi_pemerintahan_desa_kelurahan']['air_bersih']) }}</td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_administrasi_pemerintahan_desa_kelurahan']['telepon']) }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>1.A. Inventaris dan Alat tulis kantor</strong></td>
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
            <td>Kendaraan Dinas Lurah/Kepala Desa</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor']['kendaraan_dinas_lurah_kepala_desa'] }} unit</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>1. B. Administrasi Pemerintahan Desa/Kelurahan</strong></td>
        </tr>
        <tr>
            <td>Buku Data Peraturan Desa</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_peraturan_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku Keputusan Kepala Desa/Lurah</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_keputusan_kepala_desa_lurah']) }}</td>
        </tr>
        <tr>
            <td>Buku Administrasi Kependudukan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_administrasi_kependudukan']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Inventaris</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_inventaris']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Aparat</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_aparat']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Tanah Kas Desa</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_tanah_kas_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku Administrasi Pajak dan Retribusi</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_administrasi_pajak_dan_retribusi']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Tanah</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_tanah']) }}</td>
        </tr>
        <tr>
            <td>Buku Laporan Pengaduan Masyarakat</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_laporan_pengaduan_masyarakat']) }}</td>
        </tr>
        <tr>
            <td>Buku Agenda Ekspedisi</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_agenda_ekspedisi']) }}</td>
        </tr>
        <tr>
            <td>Buku Profil Desa dan Kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_profil_desa_dan_kelurahan']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Induk Penduduk</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_induk_penduduk']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Mutasi Penduduk</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_mutasi_penduduk']) }}</td>
        </tr>
        <tr>
            <td>Buku Rekapitulasi Penduduk Akhir Bulan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_rekapitulasi_penduduk_akhir_bulan']) }}</td>
        </tr>
        <tr>
            <td>Buku Registrasi Pelayanan Penduduk</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_registrasi_pelayanan_penduduk']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Penduduk Sementara</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_penduduk_sementara']) }}</td>
        </tr>
        <tr>
            <td>Buku Anggaran Penerimaan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_anggaran_penerimaan']) }}</td>
        </tr>
        <tr>
            <td>Buku Anggaran Pengeluaran Pegawai/Pembangunan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_anggaran_pengeluaran_pegawai_pembangunan']) }}</td>
        </tr>
        <tr>
            <td>Buku Kas Umum</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_kas_umum']) }}</td>
        </tr>
        <tr>
            <td>Buku Kas Pembantu Penerimaan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_kas_pembantu_penerimaan']) }}</td>
        </tr>
        <tr>
            <td>Buku Kas Pembantu Pengeluaran Rutin/Pembangunan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_kas_pembantu_pengeluaran_rutin_pembangunan']) }}</td>
        </tr>
        <tr>
            <td>Buku Data Lembaga Kemasyarakatan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_pemerintahan_desa_kelurahan']['buku_data_lembaga_kemasyarakatan']) }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>2. PRASARANA DAN SARANA BADAN PERMUSYAWARATAN DESA/BPD</strong></td>
        </tr>
        <tr>
            <td>Gedung Kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_badan_permusyawaratan_desa_bpd']['gedung_kantor']) }}</td>
        </tr>
        <tr>
            <td>Jumlah ruang kerja</td>
            <td>{{ $data['prasarana_dan_sarana_badan_permusyawaratan_desa_bpd']['jumlah_ruang_kerja'] }} Ruang</td>
        </tr>
        <tr>
            <td>Balai BPD</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_badan_permusyawaratan_desa_bpd']['balai_bpd']) }} </td>
        </tr>
        <tr>
            <td>Listrik</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_badan_permusyawaratan_desa_bpd']['listrik']) }} </td>
        </tr>
        <tr>
            <td>Air bersih</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_badan_permusyawaratan_desa_bpd']['air_bersih']) }} </td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_badan_permusyawaratan_desa_bpd']['telepon']) }} </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>2.A. Inventaris dan Alat tulis kantor</strong></td>
        </tr>
        <tr>
            <td>Jumlah mesin tik</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor_bpd']['jumlah_mesin_tik'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah meja</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor_bpd']['jumlah_meja'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah kursi</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor_bpd']['jumlah_kursi'] }} buah</td>
        </tr>
        <tr>
            <td>Jumlah almari arsip</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor_bpd']['jumlah_almari_arsip'] }} buah</td>
        </tr>
        <tr>
            <td>Komputer</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor_bpd']['komputer'] }} unit</td>
        </tr>
        <tr>
            <td>Mesin fax</td>
            <td>{{ $data['inventaris_dan_alat_tulis_kantor_bpd']['mesin_fax'] }} unit</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>2.B. Administrasi BPD</strong></td>
        </tr>
        <tr>
            <td>Buku-buku administrasi kegiatan BPD</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_buku_administrasi_kegiatan_bpd']) }}</td>
        </tr>
        <tr>
            <td>Buku Buku Administrasi Keanggotaan</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_buku_administrasi_keanggotaan']) }}</td>
        </tr>
        <tr>
            <td>Buku kegiatan BPD</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_kegiatan_bpd']) }}</td>
        </tr>
        <tr>
            <td>Buku himpunan peraturan desa</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_himpunan_peraturan_desa']) }}</td>
        </tr>
        <tr>
            <td>Buku Lainnya</td>
            <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($data['administrasi_bpd']['buku_lainnya']) }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>3. PRASARANA DAN SARANA DUSUN/LINGKUNGAN/SEBUTAN LAIN</strong></td>
        </tr>
        <tr>
            <td>Gedung kantor atau Balai Pertemuan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['gedung_kantor_atau_balai_pertemuan']) }}</td>
        </tr>
        <tr>
            <td>Alat tulis kantor</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['alat_tulis_kantor']) }}</td>
        </tr>
        <tr>
            <td>Barang inventaris</td>
            <td>{{ $data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['barang_inventaris'] }} Jenis</td>
        </tr>
        <tr>
            <td>Buku administrasi</td>
            <td>{{ $data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['buku_administrasi'] }} Jenis</td>
        </tr>
        <tr>
            <td>Jenis kegiatan</td>
            <td>{{ $data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['jenis_kegiatan'] }} Jenis</td>
        </tr>
        <tr>
            <td>Jumlah pengurus</td>
            <td>{{ $data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['jumlah_pengurus'] }} Orang</td>
        </tr>
        <tr>
            <td>Jumlah ruang kerja</td>
            <td>{{ $data['prasarana_dan_sarana_dusun_lingkungan_sebutan_lain']['jumlah_ruang_kerja'] }} Ruang</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>D. PEMBINAAN DAN PENGAWASAN</strong></td>
        </tr>
        <tr>
            <td colspan="2"><strong>1. Jenis Pembinaan Pemerintah Pusat kepada Pemerintahan Desa dan Kelurahan</strong>
            </td>
        </tr>
        <tr>
            <td>Pedoman dan standar pelaksanaan urusan pemerintahan desa, kelurahan, lembaga kemasyarakatan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan']) }}
            </td>
        </tr>
        <tr>
            <td>Pedoman dan standar bantuan pembiayaan dari pemerintah, pemerintah provinsi dan kabupaten/kota kepada
                desa dan kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan']) }}
            </td>
        </tr>
        <tr>
            <td>Pedoman umum administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah']) }}
            </td>
        </tr>
        <tr>
            <td>Pedoman dan standar tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa, Lurah dan
                PerangkatDesa/Kelurahan serta BPD</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkatdesa_kelurahan_serta_bpd']) }}
            </td>
        </tr>
        <tr>
            <td>Pedoman pendidikan dan pelatihan bagi pemerintahan desa, kelurahan, lembaga kemasyarakatan dan
                perangkat masing-masing</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing']) }}
            </td>
        </tr>
        <tr>
            <td>Jumlah bimbingan, supervisi dan konsultasi pelaksanaan pemerintahan desa dan kelurahan serta
                pemberdayaan lembaga kemasyarakatan</td>
            <td>{{ $data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan'] }}
                kegiatan</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan</td>
            <td>{{ $data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] }}
                kegiatan</td>
        </tr>
        <tr>
            <td>Penelitian dan pengkajian penyelenggaraan pemerintahan desa dan kelurahan</td>
            <td>{{ $data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] }}
                kegiatan</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan yang terkait dengan upaya percepatan atau akselerasi pembangunan desa dan kelurahan
                dalam bidang ekonomi keluarga, penanganan bencana, penanggulangan kemiskinan, percepatan keberdayaan
                masyarakat, peningkatan prasarana dan sarana pedesaan/kelurahan, pemanfaatan sumber daya alam dan
                teknologi tepat guna, pengembangan sosial budaya masyarakat di desa dan kelurahan yang dibiayai APBN
            </td>
            <td>{{ $data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pemberian penghargaan atas prestasi yang dilaksanakan pemerintahan desa dan kelurahan dalam
                penyelenggaraan pemerintahan dan lembaga kemasyarakatan</td>
            <td>{{ $data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing</td>
            <td>{{ $data['jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan']['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] }}
                kali</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>2. Pembinaan Pemerintah Provinsi kepada Pemerintahan Desa dan Kelurahan</strong>
            </td>
        </tr>
        <tr>
            <td>Pedoman pelaksanaan tugas pembantuan dari provinsi ke desa/kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_pelaksanaan_tugas_pembantuan_dari_provinsi_ke_desa_kelurahan']) }}
            </td>
        </tr>
        <tr>
            <td>Pedoman bantuan keuangan dari provinsi</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_bantuan_keuangan_dari_provinsi']) }}
            </td>
        </tr>
        <tr>
            <td>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat
                beserta hak dan kewajibannya dalam pelaksanaan pemerintahan desa/kelurahan</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_fasilitasi_keberadaan_kesatuan_masyarakat_hukum_adat_nilai_adat_istiadat_dan_lembaga_adat_beserta_hak_dan_kewajibannya_dalam_pelaksanaan_pemerintahan_desa_kelurahan']) }}
            </td>
        </tr>
        <tr>
            <td>Fasilitasi Pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</td>
            <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['fasilitasi_pelaksanaan_pedoman_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah']) }}
            </td>
        </tr>
        <tr>
            <td>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan
                berskala provinsi</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan_berskala_provinsi'] }}
                kegiatan</td>
        </tr>
        <tr>
            <td>Kegiatan penanggulangan kemiskinan yang dibiayai APBD Provinsi yang masuk desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_penanggulangan_kemiskinan_yang_dibiayai_apbd_provinsi_yang_masuk_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan penanganan bencana yang dibiayai APBD Provinsi untuk desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_penanganan_bencana_yang_dibiayai_apbd_provinsi_untuk_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD Provinsi di desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_peningkatan_pendapatan_keluarga_yang_dibiayai_apbd_provinsi_di_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan penyediaan sarana dan prasarana desa dan kelurahan yang dibiayai APBD Provinsi yang masuk desa
                dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_penyediaan_sarana_dan_prasarana_desa_dan_kelurahan_yang_dibiayai_apbd_provinsi_yang_masuk_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan pemanfaatan sumber daya alam dan pengembangan teknologi tepat guna yang dibiayai APBD Provinsi
                di desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_pemanfaatan_sumber_daya_alam_dan_pengembangan_teknologi_tepat_guna_yang_dibiayai_apbd_provinsi_di_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan pengembangan sosial budaya masyarakat Pedoman pendataan dan pendayagunaan data profil desa dan
                kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_pengembangan_sosial_budaya_masyarakat_pedoman_pendataan_dan_pendayagunaan_data_profil_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pemberian penghargaan atas prestasi yang dilaksanakan pemerintahan desa dan kelurahan dalam
                penyelenggaraan pemerintahan dan lembaga kemasyarakatan</td>
            <td>{{ $data['pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan']['pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'] }}
                jenis</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>3. Pembinaan Pemerintah Kabupaten/Kota kepada Pemerintahan Desa dan
                    Kelurahan</strong></td>
        </tr>
        <tr>
            <td>Pelimpahan tugas Bupati/Walikota kepada Lurah dan Kepala Desa</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pelimpahan_tugas_bupati_walikota_kepada_lurah_dan_kepala_desa'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Penetapan pengaturan kewenangan kabupaten/kota yang diserahkan pengaturannya kepada desa</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['penetapan_pengaturan_kewenangan_kabupaten_kota_yang_diserahkan_pengaturannya_kepada_desa'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pedoman pelaksanaan tugas pembantuan dari kabupaten/kota kepada desa</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_pelaksanaan_tugas_pembantuan_dari_kabupaten_kota_kepada_desa'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pedoman teknis penyusunan peraturan desa, peraturan kepala desa, keputusan Lurah dan peraturan daerah
                kepada kepala desa dan lurah.</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_teknis_penyusunan_peraturan_desa_peraturan_kepala_desa_keputusan_lurah_dan_peraturan_daerah_kepada_kepala_desa_dan_lurah'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pedoman teknis penyusunan perencanaan pembangunan partisipatif serta pengembangan lembaga
                kemasyarakatan desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_teknis_penyusunan_perencanaan_pembangunan_partisipatif_serta_pengembangan_lembaga_kemasyarakatan_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat
                beserta hak dan kewajibannya dalam pelaksanaan pemerintahan desa/kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_fasilitasi_keberadaan_kesatuan_masyarakat_hukum_adat_nilai_adat_istiadat_dan_lembaga_adat_beserta_hak_dan_kewajibannya_dalam_pelaksanaan_pemerintahan_desa_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Penetapan pembiayaan alokasi dana perimbangan untuk desa</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['penetapan_pembiayaan_alokasi_dana_perimbangan_untuk_desa'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Fasilitasi Pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['fasilitasi_pelaksanaan_pedoman_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan
                berskala kabupaten/kota</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan_berskala_kabupaten_kota'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan penanggulangan kemiskinan yang dibiayai APBD kabupaten/kota yang masuk desa dan kelurahan
            </td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_penanggulangan_kemiskinan_yang_dibiayai_apbd_kabupaten_kota_yang_masuk_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan penanganan bencana yang dibiayai APBD kabupaten/kota untuk desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_penanganan_bencana_yang_dibiayai_apbd_kabupaten_kota_untuk_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD kabupaten/kota di desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_peningkatan_pendapatan_keluarga_yang_dibiayai_apbd_kabupaten_kota_di_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Fasilitasi penetapan pedoman dan standar tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa,
                Lurah, Perangkat Desa/Kelurahan dan BPD</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['fasilitasi_penetapan_pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_perangkat_desa_kelurahan_dan_bpd'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat
                beserta hak dan kewajibannya dalam pelaksanaan pemerintahan desa/kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['kegiatan_fasilitasi_keberadaan_kesatuan_masyarakat_hukum_adat_nilai_adat_istiadat_dan_lembaga_adat_beserta_hak_dan_kewajibannya_dalam_pelaksanaan_pemerintahan_desa'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pedoman pendataan dan pendayagunaan profil desa dan kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pedoman_pendataan_dan_pendayagunaan_profil_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Program dan kegiatan pemeliharaan motivasi desa/kelurahan berprestasi pascaperlombaan desa dan
                kelurahan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['program_dan_kegiatan_pemeliharaan_motivasi_desa_kelurahan_berprestasi_pascaperlombaan_desa_dan_kelurahan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pemberian penghargaan atas prestasi yang dicapai pemerintahan desa dan kelurahan dalam penyelenggaraan
                pemerintahan dan pemberdayaan lembaga kemasyarakatan</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pemberian_penghargaan_atas_prestasi_yang_dicapai_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_pemberdayaan_lembaga_kemasyarakatan'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] }}
                kasus</td>
        </tr>
        <tr>
            <td>Mengawasi pengelolaan keuangan desa serta anggaran kelurahan dan pendayagunaan aset pemerintahan desa,
                badan usaha milik desa dan sumber pendapatan daerah yang dikelola lurah</td>
            <td>{{ $data['pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan']['mengawasi_pengelolaan_keuangan_desa_serta_anggaran_kelurahan_dan_pendayagunaan_aset_pemerintahan_desa_badan_usaha_milik_desa_dan_sumber_pendapatan_daerah_yang_dikelola_lurah'] }}
                kasus</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>4. Pembinaan dan Pengawasan Camat kepada Desa/Kelurahan</strong></td>
        </tr>
        <tr>
            <td>Jumlah Kegiatan fasilitasi penyusunan peraturan desa dan peraturan kepala desa</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_penyusunan_peraturan_desa_dan_peraturan_kepala_desa'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah Kegiatan fasilitasi administrasi tata pemerintahan desa dan kelurahan</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_administrasi_tata_pemerintahan_desa_dan_kelurahan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Fasilitasi pengelolaan keuangan desa dan pendayagunaan aset desa serta anggaran kelurahan</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['fasilitasi_pengelolaan_keuangan_desa_dan_pendayagunaan_aset_desa_serta_anggaran_kelurahan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi pelaksanaan urusan otonomi daerah kabupaten/kota yang diserahkan kepada desa
            </td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_pelaksanaan_urusan_otonomi_daerah_kabupaten_kota_yang_diserahkan_kepada_desa'] }}
                kali</td>
        </tr>
        <tr>
            <td>Fasilitasi penerapan dan penegakan peraturan perundang- undangan</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['fasilitasi_penerapan_dan_penegakan_peraturan_perundang__undangan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Fasilitasi penyediaan data dan pendayagunaan data profil desa dan kelurahan</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['fasilitasi_penyediaan_data_dan_pendayagunaan_data_profil_desa_dan_kelurahan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi pelaksanaan tugas, wewenang, fungsi, hak dan kewajiban kepala desa, BPD,
                Lurah dan lembaga kemasyarakatan</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_pelaksanaan_tugas_wewenang_fungsi_hak_dan_kewajiban_kepala_desa_bpd_lurah_dan_lembaga_kemasyarakatan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi upaya penyelenggaraan ketenteraman dan ketertiban umum</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_upaya_penyelenggaraan_ketenteraman_dan_ketertiban_umum'] }}
                kali</td>
        </tr>
        <tr>
            <td>Fasilitasi penataan, penguatan dan efektivitas pelaksanaan tugas, fungsi dan kewajiban lembaga
                kemasyarakatan desa dan kelurahan</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['fasilitasi_penataan_penguatan_dan_efektivitas_pelaksanaan_tugas_fungsi_dan_kewajiban_lembaga_kemasyarakatan_desa_dan_kelurahan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi partisipasi masyarakat dalam perencanaan, pelaksanaan, pemanfaatan dan
                pemeliharaan serta pengembangan dan pelestarian hasil pembangunan.</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_partisipasi_masyarakat_dalam_perencanaan_pelaksanaan_pemanfaatan_dan_pemeliharaan_serta_pengembangan_dan_pelestarian_hasil_pembangunan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Fasilitasi kerjasama antar desa/kelurahan dan kerjasama desa/kelurahan dengan pihak ketiga</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['fasilitasi_kerjasama_antar_desa_kelurahan_dan_kerjasama_desa_kelurahan_dengan_pihak_ketiga'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi pelaksanaan program dan kegiatan pemberdayaan masyarakat</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_pelaksanaan_program_dan_kegiatan_pemberdayaan_masyarakat'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan pemeliharaan motivasi bagi desa dan kelurahan juara perlombaan dan pasca perlombaan
            </td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_pemeliharaan_motivasi_bagi_desa_dan_kelurahan_juara_perlombaan_dan_pasca_perlombaan'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi kerjasama antar lembaga kemasyarakatan dan lembaga kemasyarakatan dengan
                organisasi anggota lembaga kemasyarakatan serta dengan pihak ketiga sebagai mitra percepatan keberdayaan
                masyarakat</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_kerjasama_antar_lembaga_kemasyarakatan_dan_lembaga_kemasyarakatan_dengan_organisasi_anggota_lembaga_kemasyarakatan_serta_dengan_pihak_ketiga_sebagai_mitra_percepatan_keberdayaan_masyarakat'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan fasilitasi bantuan teknis dan pendampingan kepada lembaga kemasyarakatan dan organisasi
                anggotanya</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_fasilitasi_bantuan_teknis_dan_pendampingan_kepada_lembaga_kemasyarakatan_dan_organisasi_anggotanya'] }}
                kali</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan koordinasi unit kerja pemerintahan dalam pengembangan lembaga kemasyarakatan
                desa/kelurahan.</td>
            <td>{{ $data['pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan']['jumlah_kegiatan_koordinasi_unit_kerja_pemerintahan_dalam_pengembangan_lembaga_kemasyarakatan_desa_kelurahan'] }}
                kali</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
<p></p>
<table class="no-border" style="border-collapse: collapse" width="100%" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td valign="top"> KAB. {{ strtoupper(identitas('nama_kabupaten')) }}, {{ tgl_indo(date('Y-m-d')) }}<br>
                {{ strtoupper(identitas('nama_desa')) }}<br> Kecamatan {{ strtoupper(identitas('nama_kecamatan')) }}<br>
                Kabupaten KAB. {{ strtoupper(identitas('nama_kabupaten')) }} <br> <br> <br>
                <p> <u>{{ $kades->pamongNama }}</u><br> Kepala Desa </p>
                <p> Tembusan :<br> 1. Camat {{ strtoupper(identitas('nama_kecamatan')) }}<br> 2. Bupati KAB.
                    {{ strtoupper(identitas('nama_kabupaten')) }}<br> 3. Arsip </p>
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>
