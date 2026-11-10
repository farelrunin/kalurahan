<table>
    <tbody>
        <tr>
            <td>
                @if ($aksi != 'unduh')
                    <img class="logo" src="{{ gambar_desa($config['logo']) }}" alt="logo-desa">
                @endif
                <h1 class="judul" align="center">
                    PEMERINTAH {!! strtoupper(setting('sebutan_kabupaten') . ' ' . $config['nama_kabupaten'] . ' <br>' . setting('sebutan_kecamatan') . ' ' . $config['nama_kecamatan'] . ' <br>' . setting('sebutan_desa') . ' ' . $config['nama_desa']) !!}
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <hr class="garis">
            </td>
        </tr>
        <tr>
            <td align="center">
                <h4><u>DATA {{ strtoupper($tipe) }}</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">NO</th>
                            <th>Tanggal</th>
                            <th>Jenis Sumber Air Bersih</th>
                            <th>Jumlah (Unit)</th>
                            <th>Pemanfaat (KK)</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $sumberAir)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $sumberAir->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\JenisSumberAirEnum::valueOf($sumberAir->komoditas, '-') }}</td>
                                <td>{{ $sumberAir->data['jumlah'] }}</td>
                                <td>{{ $sumberAir->data['pemanfaat'] }}</td>
                                <td class="text-right">{{ Modules\Prodeskel\Enums\KondisiEnum::valueOf($sumberAir->data['kondisi'], '-') }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
