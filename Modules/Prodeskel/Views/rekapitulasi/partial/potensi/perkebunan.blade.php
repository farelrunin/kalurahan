<p><strong>B.2 TANAMAN APOTIK HIDUP DAN SEJENISNYA</strong></p>
<p><strong>C. PERKEBUNAN </strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Pemilikan Lahan Perkebunan</strong></td>
        </tr>
        <tr>
            <td>Jumlah keluarga memiliki tanah perkebunan</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['jumlah_keluarga_memiliki_tanah_perkebunan'] }} keluarga</td>
        </tr>
        <tr>
            <td>Tidak memiliki</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['tidak_memiliki'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki kurang dari 5 ha</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['memiliki_kurang_dari_5_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 10 – 50 ha</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['memiliki_10_50_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 50 – 100 ha</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['memiliki_50_100_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 100 – 500 ha</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['memiliki_100_500_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki 500 – 1000 ha</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['memiliki_500_1000_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Memiliki lebih dari 1000 ha</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['memiliki_lebih_dari_1000_ha'] }} keluarga</td>
        </tr>
        <tr>
            <td>Jumlah total keluarga perkebunan</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['jumlah_total_keluarga_perkebunan'] }} keluarga</td>
        </tr>
        <tr>
            <td>Kepemilikan Usaha Perkebunan Yang Dimiliki Negara</td>
            <td>{{ $data['pemilikan_lahan_perkebunan']['kepemilikan_usaha_perkebunan_yang_dimiliki_negara'] }} keluarga</td>
        </tr>
        <tr>
            <td>Total Luas Perkebunan</td>
            <td>{{ $data['tanah_perkebunan']['total_luas'] }} Ha</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="5"><strong>2. Luas dan hasil perkebunan menurut jenis komoditas</strong></td>
        </tr>
        <tr>
            <td rowspan="2">Jenis</td>
            <td colspan="2"></td>
            <td colspan="2">Rakyat</td>
        </tr>
        <tr>
            <td><strong>Luas (ha)</strong></td>
            <td><strong>Hasil (kw/ha)</strong></td>
            <td><strong>Luas (ha)</strong></td>
            <td><strong>Hasil (kw/ha)</strong></td>
        </tr>
        @foreach ($data['luas_dan_hasil_perkebunan_menurut_jenis_komoditas'] as $key => $item)
            <tr>
                <td><strong>{{ $key }}</strong></td>
                <td><strong>{{ $item['luas_perkebunan_swasta'] }}</strong></td>
                <td><strong>{{ $item['hasil_perkebunan_swasta'] }}</strong></td>
                <td><strong>{{ $item['luas_perkebunan_rakyat'] }}</strong></td>
                <td><strong>{{ $item['hasil_perkebunan_rakyat'] }}</strong></td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>3. Pemasaran Hasil Perkebunan</strong></td>
        </tr>
        <tr>
            <td>Dijual langsung ke konsumen</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['dijual_langsung_ke_konsumen'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke pasar hewan</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['dijual_ke_pasar_hewan'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui KUD</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['dijual_melalui_kud'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Tengkulak</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['dijual_melalui_tengkulak'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Pengecer</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['dijual_melalui_pengecer'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke lumbung desa/kel</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['dijual_ke_lumbung_desa_kel'] }}</td>
        </tr>
        <tr>
            <td>Tidak dijual</td>
            <td>{{ $data['pemasaran_hasil_perkebunan']['tidak_dijual'] }}</td>
        </tr>
    </tbody>
</table>
