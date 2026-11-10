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
                            <th>Jenis Potensi Air dan Sumber Daya Air</th>
                            <th>Jumlah (Luas) atau Luas (Ha)</th>
                            <th>Debit/Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $pemanfaatanAir)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pemanfaatanAir->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\JenisPotensiAirEnum::valueOf($pemanfaatanAir->komoditas, '-') }}</td>
                                <td>{{ $pemanfaatanAir->data['jumlah_luas'] }}</td>
                                <td class="text-right">{{ Modules\Prodeskel\Enums\VolumeEnum::valueOf($pemanfaatanAir->data['volume'], '-') }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
