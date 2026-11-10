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
                <h4><u>DATA STRUKTUR MATA PENCAHARIAN MENURUT CAKUPAN PEMENUHAN KEBUTUHAN AIR BERSIH</u></h4>
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
                            <th>Jumlah keluarga menggunakan sumur gali</th>
                            <th>Jumlah keluarga pelanggan PAM</th>
                            <th>Jumlah keluarga menggunakan Penampung Air Hujan</th>
                            <th>Jumlah keluarga menggunakan sumur pompa</th>
                            <th>Jumlah keluarga menggunakan perpipaan air kran</th>
                            <th>Jumlah keluarga menggunakan hidran umum</th>
                            <th>Jumlah keluarga menggunakan air sungai</th>
                            <th>Jumlah keluarga menggunakan embung</th>
                            <th>Jumlah keluarga yang menggunakan mata air</th>
                            <th>Jumlah keluarga yang tidak mendapatkan akses air minum dari air laut</th>
                            <th>Jumlah keluarga yang tidak mendapatkan akses air minum dari sumber di atas</th>
                            <th>Total jumlah keluarga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_sumur_gali'] }}</td>
                                <td align="right">{{ $value->data['keluarga_pelanggan_pam'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_penampung_air_hujan'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_sumur_pompa'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_perpipaan_air_kran'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_hidran_umum'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_air_sungai'] }}</td>
                                <td align="right">{{ $value->data['keluarga_menggunakan_embung'] }}</td>
                                <td align="right">{{ $value->data['keluarga_yang_menggunakan_mata_air'] }}</td>
                                <td align="right">{{ $value->data['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut'] }}</td>
                                <td align="right">{{ $value->data['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas'] }}</td>
                                <td align="right">{{ $value->data['total_jumlah_keluarga'] }}</td>
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
