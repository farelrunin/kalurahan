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
                            <th class="padat">No</th>
                            <th>Tanggal</th>
                            <th>Jenis Air Minum</th>
                            <th>Baik</th>
                            <th>Berbau</th>
                            <th>Berwarna</th>
                            <th>Berasa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $lahan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lahan->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasKualitasAirEnum::valueOf($lahan->komoditas, '-') }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($lahan->data['baik']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($lahan->data['berbau']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($lahan->data['berwarna']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($lahan->data['berasa']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
