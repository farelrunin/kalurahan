<p><strong>I. KUALITAS UDARA</strong></p>
<table>
    <tbody>
        <tr>
            <td rowspan="2"><strong>Sumber</strong></td>
            <td rowspan="2"><strong>Jumlah Lokasi Sumber Pencemaran</strong></td>
            <td rowspan="2"><strong>Polutan Pencemaran</strong></td>
            <td rowspan="2">
                <div align="center"><strong>Efek terhadap<br> Kesehatan<br> (ganguan penglihatan/ kabut,ISPA,
                        dll<br></strong></div>
            </td>
            <td colspan="3"><strong>Kepemilikan</strong></td>
        </tr>
        <tr>
            <td><strong>Pemda</strong></td>
            <td><strong>Swasta</strong></td>
            <td><strong>Perorangan</strong></td>
        </tr>
        @foreach ($data['kualitas_udara'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah_lokasi'] }}</td>
                <td>{{ $item['jenis_polutan'] }}</td>
                <td>{{ Modules\Prodeskel\Enums\EfekKualitasUdaraEnum::valueOf($item['efek_kesehatan']) }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['kepemilikan_pemda']) }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['kepemilikan_swasta']) }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['kepemilikan_perorangan']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
