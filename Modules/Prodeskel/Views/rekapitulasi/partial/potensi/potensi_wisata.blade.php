<p><strong>L. POTENSI WISATA</strong></p>
<table>
    <tbody>
        <tr>
            <td>
                <p align="center"><strong>Lokasi/ Tempat/ Area Wisata </strong></p>
            </td>
            <td><strong>Keberadaan</strong>
            </td>
            <td><strong>Luas</strong>
            </td>
            <td><strong>Tingkat Pemanfaatan (Aktif/Pasif)</strong>
            </td>
        </tr>
        @foreach ($data['potensi_wisata'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item['keberadaan']) }}</td>
                <td>{{ $item['luas'] }} ha</td>
                <td>{{ $item['tingkat_pemanfaatan'] ? 'Aktif' : 'Pasif' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
