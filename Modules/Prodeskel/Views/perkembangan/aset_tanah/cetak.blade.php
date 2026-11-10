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
                <h4><u>DATA PENGUASAAN ASET EKONOMI MASYARAKAT<br>ASET TANAH</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tanggal</th>
                            <th>Tidak Memiliki Tanah (Orang)</th>
                            <th>Memiliki Tanah kurang dari 0,2 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,21-0,3 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,31-0,4 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,41-0,5 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,51-0,6 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,61-0,7 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,71-0,8 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,81-0,9 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 0,91-1,0 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 1,00-5,0 Ha (Orang)</th>
                            <th>Memiliki Tanah antara 5,00-10 Ha (Orang)</th>
                            <th>Memiliki Tanah lebih dari 10 Ha (Orang)</th>
                            <th>Jumlah Total Penduduk (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['tanah_00'] }}</td>
                                <td align="right">{{ $value->data['tanah_01'] }}</td>
                                <td align="right">{{ $value->data['tanah_02'] }}</td>
                                <td align="right">{{ $value->data['tanah_03'] }}</td>
                                <td align="right">{{ $value->data['tanah_04'] }}</td>
                                <td align="right">{{ $value->data['tanah_05'] }}</td>
                                <td align="right">{{ $value->data['tanah_06'] }}</td>
                                <td align="right">{{ $value->data['tanah_07'] }}</td>
                                <td align="right">{{ $value->data['tanah_08'] }}</td>
                                <td align="right">{{ $value->data['tanah_09'] }}</td>
                                <td align="right">{{ $value->data['tanah_10'] }}</td>
                                <td align="right">{{ $value->data['tanah_50'] }}</td>
                                <td align="right">{{ $value->data['tanah_100'] }}</td>
                                <td align="right">{{ $value->data['jumlah'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="8">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
