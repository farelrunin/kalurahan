<p><strong>D. KEHUTANAN </strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Luas Lahan Menurut Pemilikan</strong></td>
        </tr>
        <tr>
            <td>Milik Negara</td>
            <td>{{ $data['luas_lahan_menurut_pemilikan']['milik_negara'] }} ha</td>
        </tr>
        <tr>
            <td>Milik Adat/Ulayat</td>
            <td>{{ $data['luas_lahan_menurut_pemilikan']['milik_adat_ulayat'] }} ha</td>
        </tr>
        <tr>
            <td>Perhutani/Instansi Sektoral</td>
            <td>{{ $data['luas_lahan_menurut_pemilikan']['perhutani_instansi_sektoral'] }} ha</td>
        </tr>
        <tr>
            <td>Milik masyarakat perorangan</td>
            <td>{{ $data['luas_lahan_menurut_pemilikan']['milik_masyarakat_perorangan'] }} ha</td>
        </tr>
        <tr>
            <td>Total</td>
            <td><strong>{{ $data['luas_lahan_menurut_pemilikan']['total'] }} ha</strong></td>
        </tr>
    </tbody>
</table>
<br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Hasil Hutan</strong></td>
        </tr>
        @foreach ($data['hasil_hutan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['hasil_produksi'] }} {{ $item['satuan'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<table>
    <tbody>
        <tr>
            <td colspan="4"><strong>3. Kondisi Hutan </strong></td>
        </tr>
        <tr>
            <td><strong>Kondisi Hutan</strong></td>
            <td><strong>Baik </strong></td>
            <td><strong>Rusak </strong></td>
            <td><strong>Total</strong></td>
        </tr>
        @foreach ($data['kondisi_hutan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['kondisi_baik'] }}</td>
                <td>{{ $item['kondisi_rusak'] }}</td>
                <td>{{ $item['jumlah_luas_hutan'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4. Dampak yang Timbul dari Pengolahan Hutan</strong></td>
        </tr>
        @foreach ($data['dampak_yang_timbul_dari_pengolahan_hutan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['keterangan']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>5. Mekanisme Pemasaran Hasil Hutan</strong></td>
        </tr>
        <tr>
            <td>Dijual langsung ke konsumen</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['dijual_langsung_ke_konsumen'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke pasar</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['dijual_ke_pasar'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui KUD</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['dijual_melalui_kud'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Tengkulak</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['dijual_melalui_tengkulak'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Pengecer</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['dijual_melalui_pengecer'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke lumbung desa/kel</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['dijual_ke_lumbung_desa_kel'] }}</td>
        </tr>
        <tr>
            <td>Tidak dijual</td>
            <td>{{ $data['mekanisme_pemasaran_hasil_hutan']['tidak_dijual'] }}</td>
        </tr>
    </tbody>
</table>
