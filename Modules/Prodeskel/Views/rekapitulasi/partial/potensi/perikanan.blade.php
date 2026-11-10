<p><strong>F. PERIKANAN </strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>1. Jenis dan alat produksi budidaya ikan laut dan payau</strong></td>
        </tr>
        @foreach ($data['jenis_dan_alat_produksi_budidaya_ikan_laut_dan_payau'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah_alat'] }}</td>
                <td>{{ $item['hasil_produksi'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>2. Jenis dan sarana produksi budidaya ikan air tawar</strong></td>
        </tr>
        @foreach ($data['jenis_dan_sarana_produksi_budidaya_ikan_air_tawar'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah_alat'] }}</td>
                <td>{{ $item['hasil_produksi'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>3. Jenis ikan dan produksi</strong></td>
        </tr>
        @foreach ($data['jenis_ikan_dan_produksi'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['hasil_produksi'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4. Pemasaran Hasil Perikanan</strong></td>
        </tr>
        <tr>
            <td>Dijual langsung ke konsumen</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['dijual_langsung_ke_konsumen'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke pasar</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['dijual_ke_pasar'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui KUD</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['dijual_melalui_kud'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Tengkulak</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['dijual_melalui_tengkulak'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Pengecer</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['dijual_melalui_pengecer'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke lumbung desa/kel</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['dijual_ke_lumbung_desa_kel'] }}</td>
        </tr>
        <tr>
            <td>Tidak dijual</td>
            <td>{{ $data['pemasaran_hasil_perikanan']['tidak_dijual'] }}</td>
        </tr>
    </tbody>
</table>
