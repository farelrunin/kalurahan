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
                            <th>Jenis Hutan</th>
                            <th>Kondisi Baik (Ha)</th>
                            <th>Kondisi Rusak (Ha)</th>
                            <th>Jumlah Luas Hutan (Ha)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $lahan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lahan->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasJenisHutanEnum::valueOf($lahan->komoditas, '-') }}</td>
                                <td>{{ $lahan->data['kondisi_baik'] }}</td>
                                <td>{{ $lahan->data['kondisi_rusak'] }}</td>
                                <td>{{ $lahan->data['jumlah_luas_hutan'] }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
