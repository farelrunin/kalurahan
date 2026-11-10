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
                            <th>Tanah Sawah (Ha)</th>
                            <th>Tanah Kering (Ha)</th>
                            <th>Tanah Basah (Ha)</th>
                            <th>Tanah Perkebunan (Ha)</th>
                            <th>Tanah Fasilitas <br> Umum (Ha)</th>
                            <th>Tanah Hutan (Ha)</th>
                            <th>Total Luas Tanah (Ha)</th>
                            <th>Luas {{ setting('sebutan_desa') }} (Ha)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $lahan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lahan->data['tanggal'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_sawah'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_kering'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_basah'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_perkebunan'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_fasilitas_umum'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_hutan'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_entri_data'] }}</td>
                                <td>{{ $lahan->data['luas_tanah_desa'] }}</td>
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="11">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
