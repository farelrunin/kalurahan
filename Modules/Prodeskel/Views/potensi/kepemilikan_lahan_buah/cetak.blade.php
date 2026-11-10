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
                            <th>Tanggal</th>
                            <th>Memiliki Kurang 10 (KK)</th>
                            <th>Memiliki 10 - 50 (KK)</th>
                            <th>Memiliki 50 - 100 (KK)</th>
                            <th>Memiliki Lebih Dari 100 (KK)</th>
                            <th>Jumlah Keluarga Memiliki Tanah (KK)</th>
                            <th>Jumlah Keluarga Tidak Memiliki Tanah (KK)</th>
                            <th>Jumlah Keluarga Petani Tanaman Buah-Buahan (KK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $lahan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lahan->data['tanggal'] }}</td>
                                <td>{{ $lahan->data['memiliki_kurang_10_ha'] }}</td>
                                <td>{{ $lahan->data['memiliki_10_50_ha'] }}</td>
                                <td>{{ $lahan->data['memiliki_50_100_ha'] }}</td>
                                <td>{{ $lahan->data['memiliki_lebih_dari_100_ha'] }}</td>
                                <td>{{ $lahan->data['jumlah_keluarga_memiliki_tanah'] }}</td>
                                <td>{{ $lahan->data['jumlah_keluarga_tidak_memiliki_tanah'] }}</td>
                                <td>{{ $lahan->data['jumlah_keluarga_petani_tanaman_buah'] }}</td>
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
