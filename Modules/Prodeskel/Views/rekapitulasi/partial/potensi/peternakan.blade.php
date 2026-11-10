<p><strong>E. PETERNAKAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>1. Jenis populasi ternak</strong></td>
        </tr>
        <tr>
            <td><strong>Jenis Ternak</strong></td>
            <td><strong>Jumlah Pemilik</strong></td>
            <td><strong>Perkiraan Jumlah Populasi</strong></td>
        </tr>
        @foreach ($data['jenis_populasi_ternak'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah_pemilik'] }} orang</td>
                <td>{{ $item['populasi'] }} ekor</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Produksi Peternakan</strong></td>
        </tr>
        @foreach ($data['produksi_peternakan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['hasil_produksi'] }} {{ Modules\Prodeskel\Enums\SatuanTernakEnum::valueOf($item['satuan']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>3. Ketersediaan Hijauan Pakan Ternak </strong></td>
        </tr>
        <tr>
            <td>Luas tanaman pakan ternak (rumput gajah, dll)</td>
            <td>{{ $data['ketersediaan_hijauan_pakan_ternak']['luas_tanaman_pakan_ternak_rumput_gajah_dll'] }} ha</td>
        </tr>
        <tr>
            <td>Produksi hijauan makanan ternak</td>
            <td>{{ $data['ketersediaan_hijauan_pakan_ternak']['produksi_hijauan_makanan_ternak'] }} Ton/ha</td>
        </tr>
        <tr>
            <td>Luas lahan gembalaan</td>
            <td>{{ $data['ketersediaan_hijauan_pakan_ternak']['luas_lahan_gembalaan'] }} ha</td>
        </tr>
        <tr>
            <td>Dipasok dari luar desa/kelurahan</td>
            <td>{{ $data['ketersediaan_hijauan_pakan_ternak']['dipasok_dari_luar_desa_kelurahan'] }} Ton</td>
        </tr>
        <tr>
            <td>Disubsidi dinas</td>
            <td>{{ $data['ketersediaan_hijauan_pakan_ternak']['disubsidi_dinas'] }} Ton</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ $data['ketersediaan_hijauan_pakan_ternak']['lainnya'] }} Ton</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4. Pemilik Usaha Pengolahan Hasil Ternak</strong></td>
        </tr>
        @foreach ($data['pemilik_usaha_pengolahan_hasil_ternak'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah_pemilik'] }} orang</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>5. Pemasaran Hasil Ternak</strong></td>
        </tr>
        <tr>
            <td>Dijual langsung ke konsumen</td>
            <td>{{ $data['pemasaran_hasil_ternak']['dijual_langsung_ke_konsumen'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke pasar</td>
            <td>{{ $data['pemasaran_hasil_ternak']['dijual_ke_pasar'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui KUD</td>
            <td>{{ $data['pemasaran_hasil_ternak']['dijual_melalui_kud'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Tengkulak</td>
            <td>{{ $data['pemasaran_hasil_ternak']['dijual_melalui_tengkulak'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Pengecer</td>
            <td>{{ $data['pemasaran_hasil_ternak']['dijual_melalui_pengecer'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke lumbung desa/kel</td>
            <td>{{ $data['pemasaran_hasil_ternak']['dijual_ke_lumbung_desa_kel'] }}</td>
        </tr>
        <tr>
            <td>Tidak dijual</td>
            <td>{{ $data['pemasaran_hasil_ternak']['tidak_dijual'] }}</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>6. Ketersediaan lahan pemeliharaan ternak/padangpenggembalaan</strong></td>
        </tr>
        <tr>
            <td>Milik masyarakat umum</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['milik_masyarakat_umum'] }} ha</td>
        </tr>
        <tr>
            <td>Milik perusahaan peternakan (ranch)</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['milik_perusahaan_peternakan_ranch'] }} ha</td>
        </tr>
        <tr>
            <td>Milik perorangan</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['milik_perorangan'] }} ha</td>
        </tr>
        <tr>
            <td>Sewa pakai</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['sewa_pakai'] }} ha</td>
        </tr>
        <tr>
            <td>Milik pemerintah</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['milik_pemerintah'] }} ha</td>
        </tr>
        <tr>
            <td>Milik masyarakat adat</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['milik_masyarakat_adat'] }} ha</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ $data['ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan']['lainnya'] }} ha</td>
        </tr>
    </tbody>
</table>
