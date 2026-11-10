<p><strong>K. RUANG PUBLIK/TAMAN</strong></p>
<table>
    <tbody>
        <tr>
            <td>
                <p align="center"><strong>Ruang Publik/ Taman</strong></p>
            </td>
            <td><strong>Keberadaan</strong>
            </td>
            <td><strong>Luas</strong>
            </td>
            <td><strong>Tingkat Pemanfaatan (Aktif/Pasif)</strong>
            </td>
        </tr>
        @foreach ($data['ruang_publik_taman'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item['keberadaan']) }}</td>
                <td>{{ $item['luas'] }}</td>
                <td>{{ $item['tingkat_pemanfaatan'] ? 'Aktif' : 'Pasif' }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2">Jumlah Total</td>
            <td>{{ collect($data['ruang_publik_taman'])->sum(function ($q) {return intval(to_rupiah($q['luas']));}) }} M²</td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>
