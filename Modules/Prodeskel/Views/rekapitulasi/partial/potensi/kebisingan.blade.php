<p><strong>J. KEBISINGAN</strong></p>
<table>
    <tbody>
        <tr>
            <td>
                <p align="center"><strong>Tingkat Kebisingan</strong></p>
            </td>
            <td>
                <p align="center"><strong>Ekses dampak kebisingan </strong></p>
            </td>
            <td>
                <div align="center"><strong>Sumber Kebisingan<br> (kendaraan<br> bermotor, Kereta Api,Pelabuhan,Airport,
                        pabrik, dll)<br> </strong></div>
            </td>
        </tr>
        @foreach ($data['kebisingan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['ekses_kebisingan']) }}</td>
                <td>{{ $item['sumber_kebisingan'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
