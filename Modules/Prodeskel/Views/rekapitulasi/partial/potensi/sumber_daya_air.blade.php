<p><br> <strong>H. SUMBER DAYA AIR</strong><br> </p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>1. Potensi Air dan Sumber Daya Air</strong></td>
        </tr>
        @foreach ($data['potensi_air_dan_sumber_daya_air'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah_luas'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="4"><strong>2. Sumber Air Bersih</strong></td>
        </tr>
        <tr>
            <td><strong>Jenis</strong></td>
            <td><strong>Jumlah (Unit)</strong></td>
            <td><strong>Pemanfaat (KK)</strong></td>
            <td><strong>Kondisi Baik/Rusak</strong></td>
        </tr>
        @foreach ($data['sumber_air_bersih'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['jumlah'] }}</td>
                <td>{{ $item['pemanfaat'] }}</td>
                <td>{{ Modules\Prodeskel\Enums\KondisiEnum::valueOf($item['kondisi']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="5"><strong>3. Kualitas Air Minum</strong></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>Berbau</td>
            <td>Berwarna</td>
            <td>Berasa</td>
            <td>Baik</td>
        </tr>
        @foreach ($data['kualitas_air_minum'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['berbau']) }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['berwarna']) }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['berasa']) }}</td>
                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($item['baik']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>4. Sungai </strong></td>
        </tr>
        <tr>
            <td>Jumlah sungai</td>
            <td>buah</td>
        </tr>
        <tr>
            <td colspan="2">Kondisi</td>
        </tr>
        <tr>
            <td>Tercemar</td>
            <td></td>
        </tr>
        <tr>
            <td>Pendangkalan/Pengendapan Lumpur Tinggi</td>
            <td></td>
        </tr>
        <tr>
            <td>Keruh</td>
            <td></td>
        </tr>
        <tr>
            <td>Jernih dan Tidak Tercemar/memenuhi baku mutu air</td>
            <td></td>
        </tr>
        <tr>
            <td>Berkurangnya biota sungai</td>
            <td></td>
        </tr>
        <tr>
            <td>Kering</td>
            <td></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>5. Rawa</strong></td>
        </tr>
        <tr>
            <td>Luas rawa</td>
            <td>0,00 ha</td>
        </tr>
        <tr>
            <td colspan="2">Pemanfaatan</td>
        </tr>
        <tr>
            <td>Perikanan darat maupun laut</td>
            <td></td>
        </tr>
        <tr>
            <td>Air baku untuk pengolahan air minum</td>
            <td></td>
        </tr>
        <tr>
            <td>Cuci dan mandi</td>
            <td></td>
        </tr>
        <tr>
            <td>Irigasi</td>
            <td></td>
        </tr>
        <tr>
            <td>Buang air besar</td>
            <td></td>
        </tr>
        <tr>
            <td>Perikanan</td>
            <td></td>
        </tr>
        <tr>
            <td>Sayuran</td>
            <td></td>
        </tr>
        <tr>
            <td>Pembudidayaan hutan manggrove</td>
            <td></td>
        </tr>
        <tr>
            <td>Lain-Lain</td>
            <td></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>6. Pemanfaatan dan kondisi danau/waduk/situ</strong></td>
        </tr>
        <tr>
            <td>Luas</td>
            <td>0,00 ha</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Pemanfaatan</strong></td>
        </tr>
        <tr>
            <td>Perikanan</td>
            <td></td>
        </tr>
        <tr>
            <td>Air Minum/Air Baku</td>
            <td></td>
        </tr>
        <tr>
            <td>Cuci dan mandi</td>
            <td></td>
        </tr>
        <tr>
            <td>Irigasi</td>
            <td></td>
        </tr>
        <tr>
            <td>Buang air besar</td>
            <td></td>
        </tr>
        <tr>
            <td>Pembangkit listrik</td>
            <td></td>
        </tr>
        <tr>
            <td>Prasarana transportasi</td>
            <td></td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2"><strong>Kondisi</strong></td>
        </tr>
        <tr>
            <td>Tercemar</td>
            <td></td>
        </tr>
        <tr>
            <td>Pendangkalan</td>
            <td></td>
        </tr>
        <tr>
            <td>Keruh</td>
            <td></td>
        </tr>
        <tr>
            <td>Berlumpur</td>
            <td></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="6"><strong>7. Air Panas</strong></td>
        </tr>
        <tr>
            <td rowspan="2"></td>
            <td rowspan="2"><strong>Jumlah Lokasi</strong></td>
            <td rowspan="2">
                <div align="center"><strong>Pemanfaatan<br> (wisata, Pengobatan Energi, dll)<br></strong></div>
            </td>
            <td colspan="3"><strong>Kepemilikan/Pengelolaan</strong></td>
        </tr>
        <tr>
            <td><strong>Pemda</strong></td>
            <td><strong>Swasta</strong></td>
            <td><strong>Adat/Perorangan</strong></td>
        </tr>
        @foreach ($data['air_panas'] as $key => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key }}</td>
                <td>{{ collect($item['pemanfaatan'])->map(static fn($val) => Modules\Prodeskel\Enums\PemanfaatanAirPanasEnum::valueOf($val))->join(', ') }}</td>
                <td>{{ in_array(Modules\Prodeskel\Enums\KepemilikanAirPanasEnum::PEMDA, $item['kepemilikan']) ? 'Ya' : 'Tidak' }}</td>
                <td>{{ in_array(Modules\Prodeskel\Enums\KepemilikanAirPanasEnum::SWASTA, $item['kepemilikan']) ? 'Ya' : 'Tidak' }}</td>
                <td>{{ in_array(Modules\Prodeskel\Enums\KepemilikanAirPanasEnum::ADAT_PERORANGAN, $item['kepemilikan']) ? 'Ya' : 'Tidak' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
