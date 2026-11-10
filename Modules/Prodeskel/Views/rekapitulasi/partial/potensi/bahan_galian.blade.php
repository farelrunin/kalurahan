<p><br> <strong>G. BAHAN GALIAN</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Jenis dan deposit bahan galian</strong></td>
        </tr>
        @foreach ($data['jenis_dan_deposit_bahan_galian'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['status'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>2. Produksi bahan galian</strong></td>
        </tr>
        @foreach ($data['produksi_bahan_galian'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['hasil_produksi']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>3. Kepemilikan dan Pengelolaan Bahan Galian</strong></td>
        </tr>
        @foreach ($data['kepemilikan_dan_pengelolaan_bahan_galian'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ collect($item['kepemilikan'])->map(static fn($item) => Modules\Prodeskel\Enums\KepemilikanEnum::valueOf($item))->join(', ') }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4. Pemasaran Hasil Galian </strong></td>
        </tr>
        <tr>
            <td>Dijual langsung ke konsumen</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_langsung_ke_konsumen'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke pasar</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_ke_pasar'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui KUD</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_melalui_kud'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Tengkulak</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_melalui_tengkulak'] }}</td>
        </tr>
        <tr>
            <td>Dijual melalui Pengecer</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_melalui_pengecer'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke Perusahaan</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_ke_perusahaan'] }}</td>
        </tr>
        <tr>
            <td>Dijual ke lumbung desa/kel</td>
            <td>{{ $data['pemasaran_hasil_galian']['dijual_ke_lumbung_desa_kel'] }}</td>
        </tr>
        <tr>
            <td>Tidak dijual</td>
            <td>{{ $data['pemasaran_hasil_galian']['tidak_dijual'] }}</td>
        </tr>
    </tbody>
</table>
