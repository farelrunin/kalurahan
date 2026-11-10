<p> <strong>III. PRODUK DOMESTIK DESA/KELURAHAN BRUTO</strong></p>
<table style="border-collapse: collapse" width="100%" border="1" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="8"><strong>A. SUBSEKTOR PERTANIAN</strong></td>
        </tr>
        <tr>
            <td style="width:12.5%" align="center"> Tanaman</td>
            <td style="width:12.5%" align="center"> Luas Produksi (Ha)</td>
            <td style="width:12.5%" align="center"> Hasil Produksi (Ton/Ha)</td>
            <td style="width:12.5%" align="center"> Nilai produksi (Rp)<br></td>
            <td style="width:12.5%" align="center"> Biaya pemupukan (Rp)</td>
            <td style="width:12.5%" align="center"> Biaya bibit (Rp)</td>
            <td style="width:12.5%" align="center"> Biaya obat (Rp)</td>
            <td style="width:12.5%" align="center"> Biaya lainnya (Rp)</td>
        </tr>
        @forelse($data['pertanian'] as $key => $item)
            <tr>
                <td>{{ Modules\Prodeskel\Enums\KomoditasTanamanPanganEnum::valueOf($key) }}</td>
                <td align="right">{{ $item->data['luas_produksi'] }}</td>
                <td align="right">{{ $item->data['hasil_produksi'] }}</td>
                <td align="right">{{ $item->data['nilai_produksi_tahun_ini'] }}</td>
                <td align="right">{{ $item->data['biaya_pemupukan'] }}</td>
                <td align="right">{{ $item->data['biaya_bibit'] }}</td>
                <td align="right">{{ $item->data['biaya_obat'] }}</td>
                <td align="right">{{ $item->data['biaya_lainnya'] }}</td>
            </tr>
        @empty
            <tr>
                <td></td>
                <td></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
            </tr>
        @endforelse

    </tbody>
</table>
<div></div>
<table style="border-collapse: collapse" width="100%" border="1" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="8"><strong>B. SUBSEKTOR PERKEBUNAN</strong></td>
        </tr>
        <tr>
            <td style="width:12.5%" align="center"> Tanaman</td>
            <td style="width:12.5%" align="center"> Luas Produksi (Ha)</td>
            <td style="width:12.5%" align="center"> Hasil Produksi (Ton/Ha)</td>
            <td style="width:12.5%" align="center"> Nilai produksi (Rp)<br></td>
            <td style="width:12.5%" align="center"> Biaya pemupukan (Rp)</td>
            <td style="width:12.5%" align="center"> Biaya bibit <br> (Rp)</td>
            <td style="width:12.5%" align="center"> Biaya obat <br> (Rp)</td>
            <td style="width:12.5%" align="center"> Biaya lainnya <br> (Rp)</td>
        </tr>
        @forelse($data['perkebunan'] as $key => $item)
            <tr>
                <td>{{ Modules\Prodeskel\Enums\KomoditasTanamanKebunEnum::valueOf($key) }}</td>
                <td align="right">{{ ribuan(intval(to_rupiah($item->data['luas_perkebunan_swasta'])) + intval(to_rupiah($item->data['luas_perkebunan_rakyat']))) }}</td>
                <td align="right">{{ ribuan(intval(to_rupiah($item->data['hasil_perkebunan_swasta'])) + intval(to_rupiah($item->data['hasil_perkebunan_rakyat']))) }}</td>
                <td align="right">{{ $item->data['nilai_produksi_tahun_ini'] }}</td>
                <td align="right">{{ $item->data['biaya_pemupukan'] }}</td>
                <td align="right">{{ $item->data['biaya_bibit'] }}</td>
                <td align="right">{{ $item->data['biaya_obat'] }}</td>
                <td align="right">{{ $item->data['biaya_lainnya'] }}</td>
            </tr>
        @empty
            <tr>
                <td></td>
                <td></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
            </tr>
        @endforelse
    </tbody>
</table>
<div></div>
<table style="border-collapse: collapse" width="100%" border="1" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="6"><strong>C. SUBSEKTOR PETERNAKAN</strong></td>
        </tr>
        <tr>
            <td style="width:16.6%" align="center"> Jenis Produksi</td>
            <td style="width:16.6%" align="center"> Hasil Produksi</td>
            <td style="width:16.6%" align="center"> Nilai produksi (Rp)</td>
            <td style="width:16.6%" align="center"> Nilai Bahan Baku yg <br>digunakan (Rp)</td>
            <td style="width:17%" align="center"> Nilai Bahan Penolong yg<br> digunakan(Rp)</td>
            <td style="width:16.6%" align="center"> Jumlah Ternak <br>(Ekor)</td>
        </tr>
        @forelse($data['peternakan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td align="right">{{ $item->data['hasil_produksi'] }}</td>
                <td align="right">{{ $item->data['nilai_produksi'] }}</td>
                <td align="right">{{ $item->data['nilai_bahan_baku'] }}</td>
                <td align="right">{{ $item->data['nilai_bahan_penolong'] }}</td>
                <td align="right">{{ $item->data['jumlah_ternak'] }}</td>
            </tr>
        @empty
            <tr>
                <td></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
            </tr>
        @endforelse
    </tbody>
</table>
<div></div>
<table style="border-collapse: collapse" width="100%" border="1" cellspacing="0">
    <tbody>
        <tr>
            <td colspan="7"><strong>D. SUBSEKTOR PERIKANAN</strong></td>
        </tr>
        <tr>
            <td style="width:14.2%" align="center"> Jenis Produksi</td>
            <td style="width:14.2%" align="center"> Hasil Produksi <br> (Ton/Tahun)</td>
            <td style="width:14.2%" align="center"> Nilai produksi (Rp)</td>
            <td align="center"> Nilai Bahan Baku yg<br> digunakan (Rp)</td>
            <td style="width:14.2%" align="center"> Nilai Bahan Penolong<br> yg digunakan<br> (Rp)</td>
            <td style="width:14.2%" align="center"> Total biaya antara <br>yang dihabiskan (Rp)</td>
            <td style="width:14.5%" align="center"> Jenis usaha<br> perikanan</td>
        </tr>
        @forelse($data['perikanan'] as $key => $item)
            <tr>
                <td>{{ Modules\Prodeskel\Enums\JenisPerikananEnum::valueOf($key) }}</td>
                <td align="right">{{ $item->data['hasil_produksi'] }}</td>
                <td align="right">{{ $item->data['nilai_produksi'] }}</td>
                <td align="right">{{ $item->data['nilai_bahan_baku'] }}</td>
                <td align="right">{{ $item->data['nilai_bahan_penolong'] }}</td>
                <td align="right">{{ $item->data['biaya_antara_dihabiskan'] }}</td>
                <td align="right">{{ $item->data['jumlah_jenis_usaha_perikanan'] }}</td>
            </tr>
        @empty
            <tr>
                <td></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td align="right"></td>
                <td></td>
                <td align="right"></td>
            </tr>
        @endforelse
    </tbody>
</table>
<div></div>
<table style="border-collapse: collapse" width="100%" border="1">
    <tbody>
        <tr>
            <td><strong> E. SEKTOR PERTAMBANGAN DAN GALIAN</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Total nilai produksi tahun ini</td>
            <td>Rp. {{ $data['sektor_pertambangan_dan_galian']['total_nilai_produksi_tahun_ini'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bahan baku yang digunakan</td>
            <td>Rp. {{ $data['sektor_pertambangan_dan_galian']['total_nilai_bahan_baku_yang_digunakan'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bahan penolong yang digunakan</td>
            <td>Rp. {{ $data['sektor_pertambangan_dan_galian']['total_nilai_bahan_penolong_yang_digunakan'] }}</td>
        </tr>
        <tr>
            <td>Total biaya antara yang dihabiskan</td>
            <td>Rp. {{ $data['sektor_pertambangan_dan_galian']['total_biaya_antara_yang_dihabiskan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah total jenis bahan tambang dan galian yang ada</td>
            <td>{{ $data['sektor_pertambangan_dan_galian']['jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada'] }}
                jenis</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> F. SUBSEKTOR KERAJINAN</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Total nilai produksi tahun ini</td>
            <td>Rp. {{ $data['subsektor_kerajinan']['total_nilai_produksi_tahun_ini'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bahan baku yang digunakan</td>
            <td>Rp. {{ $data['subsektor_kerajinan']['total_nilai_bahan_baku_yang_digunakan'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bahan penolong yang digunakan</td>
            <td>Rp. {{ $data['subsektor_kerajinan']['total_nilai_bahan_penolong_yang_digunakan'] }}</td>
        </tr>
        <tr>
            <td>Total biaya antara yang dihabiskan</td>
            <td>Rp. {{ $data['subsektor_kerajinan']['total_biaya_antara_yang_dihabiskan'] }}</td>
        </tr>
        <tr>
            <td>Total jenis kerajinan rumah tangga</td>
            <td>{{ $data['subsektor_kerajinan']['total_jenis_kerajinan_rumah_tangga'] }} jenis</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> G. SEKTOR INDUSTRI PENGOLAHAN</strong></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> H. SUBSEKTOR KEHUTANAN</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Total nilai produksi tahun ini</td>
            <td>Rp. {{ $data['subsektor_kehutanan']['total_nilai_produksi_tahun_ini'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bahan baku yang digunakan</td>
            <td>Rp. {{ $data['subsektor_kehutanan']['total_nilai_bahan_baku_yang_digunakan'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bahan penolong yang digunakan</td>
            <td>Rp. {{ $data['subsektor_kehutanan']['total_nilai_bahan_penolong_yang_digunakan'] }}</td>
        </tr>
        <tr>
            <td>Total biaya antara yang dihabiskan</td>
            <td>Rp. {{ $data['subsektor_kehutanan']['total_biaya_antara_yang_dihabiskan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> I. SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>I.1. Subsektor Perdagangan Besar</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Total nilai transaksi</td>
            <td>Rp. {{ $data['subsektor_perdagangan_besar']['total_nilai_transaksi'] }}</td>
        </tr>
        <tr>
            <td>Total nilai aset perdagangan yang ada</td>
            <td>Rp. {{ $data['subsektor_perdagangan_besar']['total_nilai_aset_perdagangan_yang_ada'] }}</td>
        </tr>
        <tr>
            <td>Total jumlah jenis perdagangan besar</td>
            <td>Rp. {{ $data['subsektor_perdagangan_besar']['total_jumlah_jenis_perdagangan_besar'] }}</td>
        </tr>
        <tr>
            <td>Total nilai biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_perdagangan_besar']['total_nilai_biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Total biaya antara lainnya</td>
            <td>Rp. {{ $data['subsektor_perdagangan_besar']['total_biaya_antara_lainnya'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>I.2. Subsektor Perdagangan Eceran</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah total jenis perdagangan eceran<br></td>
            <td>{{ $data['subsektor_perdagangan_eceran']['jumlah_total_jenis_perdagangan_eceran'] }} jenis</td>
        </tr>
        <tr>
            <td>Total nilai transaksi</td>
            <td>Rp. {{ $data['subsektor_perdagangan_eceran']['total_nilai_transaksi'] }}</td>
        </tr>
        <tr>
            <td>Total nilai biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_perdagangan_eceran']['total_nilai_biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Total nilai aset perdagangan eceran</td>
            <td>Rp. {{ $data['subsektor_perdagangan_eceran']['total_nilai_aset_perdagangan_eceran'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>I.3. Subsektor Hotel</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah total penginapan dan penyediaan akomodasi yang ada</td>
            <td>{{ $data['subsektor_hotel']['jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada'] }} jenis</td>
        </tr>
        <tr>
            <td>Jumlah total pendapatan</td>
            <td>Rp. {{ $data['subsektor_hotel']['jumlah_total_pendapatan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah total biaya pemeliharaan</td>
            <td>Rp. {{ $data['subsektor_hotel']['jumlah_total_biaya_pemeliharaan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah biaya antara yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_hotel']['jumlah_biaya_antara_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah total pendapatan yang diperoleh</td>
            <td>Rp. {{ $data['subsektor_hotel']['jumlah_total_pendapatan_yang_diperoleh'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>I.4. Subsektor Restoran</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah tempat penyediaan konsumsi</td>
            <td>{{ $data['subsektor_restoran']['jumlah_tempat_penyediaan_konsumsi'] }} Unit</td>
        </tr>
        <tr>
            <td>Biaya konsumsi yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_restoran']['biaya_konsumsi_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Biaya antara lainnya</td>
            <td>Rp. {{ $data['subsektor_restoran']['biaya_antara_lainnya'] }}</td>
        </tr>
        <tr>
            <td>Jumlah total pendapatan yang diperoleh</td>
            <td>Rp. {{ $data['subsektor_restoran']['jumlah_total_pendapatan_yang_diperoleh'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> J. Sektor Bangunan/Konstruksi</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah bangunan yang ada tahun ini<br></td>
            <td>{{ $data['sektor_bangunan_konstruksi']['jumlah_bangunan_yang_ada_tahun_ini'] }} unit</td>
        </tr>
        <tr>
            <td>Biaya pemeliharaan yang dikeluarkan</td>
            <td>Rp. {{ $data['sektor_bangunan_konstruksi']['biaya_pemeliharaan_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Total nilai bangunan yang ada</td>
            <td>Rp. {{ $data['sektor_bangunan_konstruksi']['total_nilai_bangunan_yang_ada'] }}</td>
        </tr>
        <tr>
            <td>Biaya antara lainnya</td>
            <td>Rp. {{ $data['sektor_bangunan_konstruksi']['biaya_antara_lainnya'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> K. Sektor Keuangan, Persewaan dan Jasa Perusahaan</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>K.1. Subsektor Bank</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah transaksi perbankan</td>
            <td>Rp. {{ $data['subsektor_bank']['jumlah_transaksi_perbankan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah nilai transaksi perbankan</td>
            <td>Rp. {{ $data['subsektor_bank']['jumlah_nilai_transaksi_perbankan'] }}</td>
        </tr>
        <tr>
            <td>Jumlah biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_bank']['jumlah_biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>K.2. Subsektor lembaga keuangan bukan bank</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah lembaga keuangan bukan bank</td>
            <td>{{ $data['subsektor_lembaga_keuangan_bukan_bank']['jumlah_lembaga_keuangan_bukan_bank'] }} Unit</td>
        </tr>
        <tr>
            <td>Jumlah kegiatan jasa penunjang lembaga keuangan bukan bank</td>
            <td>{{ $data['subsektor_lembaga_keuangan_bukan_bank']['jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank'] }}
                Jenis</td>
        </tr>
        <tr>
            <td>Nilai transaksi lembaga keuangan bukan bank</td>
            <td>Rp. {{ $data['subsektor_lembaga_keuangan_bukan_bank']['nilai_transaksi_lembaga_keuangan_bukan_bank'] }}
            </td>
        </tr>
        <tr>
            <td>Biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_lembaga_keuangan_bukan_bank']['biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>K.3. Subsektor Sewa Bangunan</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah usaha persewaan bangunan dan tanah</td>
            <td>{{ $data['subsektor_sewa_bangunan']['jumlah_usaha_persewaan_bangunan_dan_tanah'] }} unit</td>
        </tr>
        <tr>
            <td>Total nilai persewaan yang dicapai</td>
            <td>Rp. {{ $data['subsektor_sewa_bangunan']['total_nilai_persewaan_yang_dicapai'] }}</td>
        </tr>
        <tr>
            <td>Biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_sewa_bangunan']['biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Biaya lainnya</td>
            <td>Rp. {{ $data['subsektor_sewa_bangunan']['biaya_lainnya'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>K.4. Subsektor Jasa Perusahaan</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah perusahaan jasa</td>
            <td>{{ $data['subsektor_jasa_perusahaan']['jumlah_perusahaan_jasa'] }} Jenis</td>
        </tr>
        <tr>
            <td>Nilai transaksi perusahaan jasa</td>
            <td>Rp. {{ $data['subsektor_jasa_perusahaan']['nilai_transaksi_perusahaan_jasa'] }}</td>
        </tr>
        <tr>
            <td>Biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_jasa_perusahaan']['biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td>Biaya lainnya</td>
            <td>Rp. {{ $data['subsektor_jasa_perusahaan']['biaya_lainnya'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> L. SEKTOR JASA-JASA</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>L.1. Subsektor jasa pemerintahan umum</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah jenis jasa pelayanan pemerintahan kepada masyarakat</td>
            <td>{{ $data['subsektor_jasa_pemerintahan_umum']['jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat'] }}
                unit</td>
        </tr>
        <tr>
            <td>Nilai transaksi pelayanan pemerintahan kepada masyarakat<br></td>
            <td>Rp.
                {{ $data['subsektor_jasa_pemerintahan_umum']['nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat'] }}
            </td>
        </tr>
        <tr>
            <td>Biaya yang dikeluarkan dalam pelayanan</td>
            <td>Rp. {{ $data['subsektor_jasa_pemerintahan_umum']['biaya_yang_dikeluarkan_dalam_pelayanan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>L.2. Subsektor jasa swasta</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah usaha jasa pelayanan sosial yang disediakan masyarakat</td>
            <td>{{ $data['subsektor_jasa_swasta']['jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Nilai aset produksi jasa pelayanan sosial</td>
            <td>Rp. {{ $data['subsektor_jasa_swasta']['nilai_aset_produksi_jasa_pelayanan_sosial'] }}</td>
        </tr>
        <tr>
            <td>Biaya yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_jasa_swasta']['biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>L.3. Subsektor Jasa hiburan dan rekreasi</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah jenis jasa hiburan dan rekreasi</td>
            <td>{{ $data['subsektor_jasa_hiburan_dan_rekreasi']['jumlah_jenis_jasa_hiburan_dan_rekreasi'] }} jenis
            </td>
        </tr>
        <tr>
            <td>Nilai transaksi usaha jasa hiburan dan rekreasi</td>
            <td>Rp.
                {{ $data['subsektor_jasa_hiburan_dan_rekreasi']['nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi'] }}
            </td>
        </tr>
        <tr>
            <td>Biaya antara yang dikeluarkan</td>
            <td>Rp. {{ $data['subsektor_jasa_hiburan_dan_rekreasi']['biaya_antara_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>L.4. Subsektor Jasa Perorangan dan Rumah Tangga</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah jenis kegiatan jasa pelayanan perorangan dan rumah tangga</td>
            <td>{{ $data['subsektor_jasa_perorangan_dan_rumah_tangga']['jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tangga'] }}
                jenis</td>
        </tr>
        <tr>
            <td>Nilai aset jasa pelayanan perorangan dan rumah tangga</td>
            <td>Rp
                {{ $data['subsektor_jasa_perorangan_dan_rumah_tangga']['nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga'] }}
            </td>
        </tr>
        <tr>
            <td>Nilai transaksi jasa pelayanan perorangan dan rumah tangga</td>
            <td>Rp
                {{ $data['subsektor_jasa_perorangan_dan_rumah_tangga']['nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga'] }}
            </td>
        </tr>
        <tr>
            <td>Biaya antara yang dikeluarkan</td>
            <td>Rp {{ $data['subsektor_jasa_perorangan_dan_rumah_tangga']['biaya_antara_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> M. SEKTOR ANGKUTAN DAN KOMUNIKASI</strong></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>M.1. Subsektor Angkutan</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah jenis kegiatan pengangkutan orang dan barang dengan alat angkut kendaraan jalan raya, laut, rel,
                udara, dan sungai/danau/penyeberangan</td>
            <td>{{ $data['subsektor_angkutan']['jumlah_jenis_kegiatan_pengangkutan_orang_dan_barang_dengan_alat_angkut_kendaraan_jalan_raya_laut_rel_udara_dan_sungai_danau_penyeberangan'] }}
                Jenis</td>
        </tr>
        <tr>
            <td>Jumlah total kendaraan angkutan</td>
            <td>{{ $data['subsektor_angkutan']['jumlah_total_kendaraan_angkutan'] }} Unit</td>
        </tr>
        <tr>
            <td>Nilai total transaksi pengangkutan</td>
            <td>Rp {{ $data['subsektor_angkutan']['nilai_total_transaksi_pengangkutan'] }}</td>
        </tr>
        <tr>
            <td>Nilai total biaya yang dikeluarkan</td>
            <td>Rp {{ $data['subsektor_angkutan']['nilai_total_biaya_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong> N. SEKTOR LISTRIK, GAS &amp; AIR MINUM</strong></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>N.1. Subsektor Listrik</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah jenis kegiatan pembangkitan dan penyaluran tenaga listrik</td>
            <td>{{ $data['subsektor_listrik']['jumlah_jenis_kegiatan_pembangkitan_dan_penyaluran_tenaga_listrik'] }}
                Jenis</td>
        </tr>
        <tr>
            <td>Jumlah nilai produksi listrik</td>
            <td>Rp {{ $data['subsektor_listrik']['jumlah_nilai_produksi_listrik'] }}</td>
        </tr>
        <tr>
            <td>Jumlah total nilai transaksi</td>
            <td>Rp {{ $data['subsektor_listrik']['jumlah_total_nilai_transaksi'] }}</td>
        </tr>
        <tr>
            <td>Jumlah biaya antara yang dikeluarkan</td>
            <td>Rp {{ $data['subsektor_listrik']['jumlah_biaya_antara_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>N.2. Subsektor Gas</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah kegiatan penyediaan gas</td>
            <td>{{ $data['subsektor_gas']['jumlah_kegiatan_penyediaan_gas'] }} jenis</td>
        </tr>
        <tr>
            <td>Nilai aset produksi gas</td>
            <td>Rp {{ $data['subsektor_gas']['nilai_aset_produksi_gas'] }}</td>
        </tr>
        <tr>
            <td>Nilai transaksi</td>
            <td>Rp {{ $data['subsektor_gas']['nilai_transaksi'] }}</td>
        </tr>
        <tr>
            <td>Biaya antara yang dikeluarkan</td>
            <td>Rp {{ $data['subsektor_gas']['biaya_antara_yang_dikeluarkan'] }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>N.3. Subsektor Air Minum</strong></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah jenis kegiatan penyediaan dan penyaluran air minum</td>
            <td>{{ $data['subsektor_air_minum']['jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum'] }} jenis
            </td>
        </tr>
        <tr>
            <td>Nilai aset penyediaan air minum</td>
            <td>Rp {{ $data['subsektor_air_minum']['nilai_aset_penyediaan_air_minum'] }}</td>
        </tr>
        <tr>
            <td>Nilai produksi air minum</td>
            <td>Rp {{ $data['subsektor_air_minum']['nilai_produksi_air_minum'] }}</td>
        </tr>
        <tr>
            <td>Nilai transaksi air minum</td>
            <td>Rp {{ $data['subsektor_air_minum']['nilai_transaksi_air_minum'] }}</td>
        </tr>
        <tr>
            <td>Biaya antara yang dikeluarkan</td>
            <td>Rp {{ $data['subsektor_air_minum']['biaya_antara_yang_dikeluarkan'] }}</td>
        </tr>
    </tbody>
</table>
