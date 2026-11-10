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
                            <th>Sumur Pompa (Unit)</th>
                            <th>Sumur Gali (Unit)</th>
                            <th>Hidran Umum (Unit)</th>
                            <th>Penampung Air Hujan (Unit)</th>
                            <th>Tangki Air Bersih (Unit)</th>
                            <th>Embung (Unit)</th>
                            <th>Mata Air (Unit)</th>
                            <th>Bangunan Pengelolaan Air (Unit)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td align="right">{{ $item->data['air_bersih'] }}</td>
                                <td align="right">{{ $item->data['sumur_gali'] }}</td>
                                <td align="right">{{ $item->data['hidran_umum'] }}</td>
                                <td align="right">{{ $item->data['penampung_air'] }}</td>
                                <td align="right">{{ $item->data['tangki_air'] }}</td>
                                <td align="right">{{ $item->data['embung'] }}</td>
                                <td align="right">{{ $item->data['mata_air'] }}</td>
                                <td align="right">{{ $item->data['bangunan'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="10">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
