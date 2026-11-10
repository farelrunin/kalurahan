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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN TEROR DAN INTIMIDASI</u></h4>
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
                            <th>Jumlah kasus intimidasi dan atau teror anggota masyarakat dari pihak dalam desa dan kelurahan</th>
                            <th>Jumlah kasus intimidasi dan atau teror anggota masyarakat dari pihak luar desa dan kelurahan</th>
                            <th>Jumlah kasus selebaran gelap dan atau isu yang bersifat teror dan ancaman untuk menimbulkan ketakukan penduduk</th>
                            <th>Jumlah kasus terorisme yang terjadi di desa dan kelurahan pada tahun ini</th>
                            <th>Jumlah kasus hasutan dan pemaksaan kehendak kelompok tertentu kepada masyarakat</th>
                            <th>Jumlah penyelesaian kasus teror dan intimidasi serta hasutam di masyarakat baik secara adat maupun hukum formal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['intimidasi_pihak_dalam'] }}</td>
                                <td align="right">{{ $value->data['intimidasi_pihak_luar'] }}</td>
                                <td align="right">{{ $value->data['selebaran_gelap'] }}</td>
                                <td align="right">{{ $value->data['terorisme'] }}</td>
                                <td align="right">{{ $value->data['hasutan'] }}</td>
                                <td align="right">{{ $value->data['penyelesaian'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="10">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
