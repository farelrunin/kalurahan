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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN PEMAKAIAN MIRAS DAN NARKOBA</u></h4>
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
                            <th>Jumlah warung/toko yang menyediakan Miras (Buah)</th>
                            <th>Jumlah penduduk yang mengkonsumsi Miras (Orang)</th>
                            <th>Jumlah kasus mabuk akibat Miras (Buah)</th>
                            <th>Jumlah pengedar Narkoba (Orang)</th>
                            <th>Jumlah penduduk yang mengkonsumsi Narkoba (Orang)</th>
                            <th>Jumlah kasus mabuk/teler akibat Narkoba (Buah)</th>
                            <th>Jumlah kasus kematian akibat Narkoba (Buah)</th>
                            <th>Jumlah pelaku Miras yang diadili atau diproses secara hukum (Orang)</th>
                            <th>Jumlah pelaku Narkoba yang diadili atau diproses secara hukum (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['warung_miras'] }}</td>
                                <td align="right">{{ $value->data['penduduk_miras'] }}</td>
                                <td align="right">{{ $value->data['mabuk_miras'] }}</td>
                                <td align="right">{{ $value->data['pengedar_narkoba'] }}</td>
                                <td align="right">{{ $value->data['penduduk_narkoba'] }}</td>
                                <td align="right">{{ $value->data['mabuk_narkoba'] }}</td>
                                <td align="right">{{ $value->data['kematian_narkoba'] }}</td>
                                <td align="right">{{ $value->data['pelaku_miras'] }}</td>
                                <td align="right">{{ $value->data['pelaku_narkoba'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="13">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
