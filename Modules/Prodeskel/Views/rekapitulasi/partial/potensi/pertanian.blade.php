<p><strong>B. PERTANIAN</strong></p>
<p><strong>B.1. TANAMAN PANGAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Pemilikan Lahan Pertanian Tanaman Pangan</strong></td>
        </tr>
        <tr>
            <td>Jumlah keluarga memiliki tanah pertanian</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['jumlah_keluarga_memiliki_tanah_pertanian'] }} keluarga</td>
        </tr>
        <tr>
            <td>Tidak memiliki</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['tidak_memiliki'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki kurang 10 ha</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['memiliki_kurang_10_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 10 – 50 ha</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['memiliki_10_50_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 50 – 100 ha</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['memiliki_50_100_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki lebih dari 100 ha</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['memiliki_lebih_dari_100_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Jumlah total keluarga petani</td>
            <td>{{ $data['pemilikan_lahan_pertanian_tanaman_pangan']['jumlah_total_keluarga_petani'] }} keluarga</td>
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
            <td colspan="3"><strong>2. Luas tanaman pangan menurut komoditas pada tahun ini</strong></td>
        </tr>
    </tbody>
</table>
<p></p>
<p><strong>3. Jenis komoditas buah-buahan yang dibudidayakan</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>A. Kepemilikan Lahan Tanaman Buah-buahan</strong></td>
        </tr>
        <tr>
            <td>Jumlah keluarga memiliki tanah perkebunan</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['jumlah_keluarga_memiliki_tanah_perkebunan'] }} keluarga</td>
        </tr>
        <tr>
            <td>Tidak memiliki</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['tidak_memiliki'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki kurang dari 10 ha</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['memiliki_kurang_dari_10_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 10 – 50 ha</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['memiliki_10_50_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 50 – 100 ha</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['memiliki_50_100_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 100 – 500 ha</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['memiliki_100_500_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 500 – 1000 ha</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['memiliki_500_1000_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki lebih dari 1000 ha</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['memiliki_lebih_dari_1000_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Jumlah total keluarga perkebunan</td>
            <td>{{ $data['kepemilikan_lahan_tanaman_buah_buahan']['jumlah_total_keluarga_perkebunan'] }} keluarga</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>B. Hasil Tanaman Dan Luas Tanaman Buah-buahan</strong></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td align="center"><strong>Jenis Tanaman </strong></td>
            <td align="center"><strong>Luas (ha) </strong></td>
            <td align="center"><strong>Hasil panen (Ton/ha)</strong></td>
        </tr>
        @foreach ($data['hasil_tanaman_dan_luas_tanaman_buah_buahan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['luas_produksi'] }}</td>
                <td>{{ $item['hasil_produksi'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4. Pemasaran Hasil Tanaman Pangan Dan Tanaman Buah-buahan ...</strong></td>
        </tr>
        <tr>
            <td>Dijual langsung ke konsumen</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['dijual_langsung_ke_konsumen'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke pasar</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['dijual_ke_pasar'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui KUD</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['dijual_melalui_kud'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui tengkulak</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['dijual_melalui_tengkulak'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui pengecer</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['dijual_melalui_pengecer'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke lumbung desa/kel</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['dijual_ke_lumbung_desa_kel'] }}</td>
        </tr>
        <tr>
            <td>Tidak dijual</td>
            <td>{{ $data['pemasaran_hasil_tanaman_pangan_dan_tanaman_buah']['tidak_dijual'] }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
