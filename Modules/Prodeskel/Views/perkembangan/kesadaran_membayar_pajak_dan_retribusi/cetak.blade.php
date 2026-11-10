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
                <h4><u>DATA STRUKTUR KESADARAN MEMBAYAR PAJAK DAN RETRIBUSI</u></h4>
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
                            <th>Jenis pajak yang dipungut sebagai kewenangan dan atau tugas desa/kelurahan (Jenis)</th>
                            <th>Jumlah Wajib Pajak (Orang)</th>
                            <th>Target PBB (Rp)</th>
                            <th>Realisasi PBB (%)</th>
                            <th>Jumlah Tindakan terhadap penunggak PBB (Tindakan)</th>
                            <th>Retribusi yang dipungut sebagai tugas dan kewenangan desa/kelurahan (Jenis)</th>
                            <th>Jumlah wajib retribusi yang menjadi tugas/kewenangan desa/kelurahan (Orang)</th>
                            <th>Target retribusi yang menjadi tugas/kewenangan desa/kelurahan (Rp)</th>
                            <th>Realisasi retribusi yang menjadi tugas/kewenangan desa/kelurahan (%)</th>
                            <th>pungutan resmi lainnya di Desa/Kelurahan (Jenis)</th>
                            <th>Target pungutan resmi tingkat desa/kelurahan (Rp)</th>
                            <th>Realisasi pungutan resmi di desa/kelurahan (%)</th>
                            <th>Jumlah kasus pungutan liar</th>
                            <th>Jumlah penyelesaian kasus pungutan liar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['7a2891c06625f'] }}</td>
                                <td align="right">{{ $value->data['af23bc98e4d57'] }}</td>
                                <td align="right">{{ $value->data['1b4c3d82e5f96'] }}</td>
                                <td align="right">{{ $value->data['c6a7d8e2b9f34'] }}</td>
                                <td align="right">{{ $value->data['5e4a3b2c1d8f9'] }}</td>
                                <td align="right">{{ $value->data['92c3b5e7d8f1a'] }}</td>
                                <td align="right">{{ $value->data['6b7c2d8e1f9a3'] }}</td>
                                <td align="right">{{ $value->data['3a4b5c2d8f1e9'] }}</td>
                                <td align="right">{{ $value->data['8d1e4f7c2b9a6'] }}</td>
                                <td align="right">{{ $value->data['5a2b8c3d4f1e9'] }}</td>
                                <td align="right">{{ $value->data['4b6c9d1e2f3a5'] }}</td>
                                <td align="right">{{ $value->data['d5a6b7c3e8f2'] }}</td>
                                <td align="right">{{ $value->data['6c2d3e4a5b8f'] }}</td>
                                <td align="right">{{ $value->data['1a3b4c6d8e5f'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="18">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
