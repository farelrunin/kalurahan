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
                <h4><u>DATA STRUKTUR APB-DESA DAN ANGGARAN KELURAHAN</u></h4>
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
                            <th>APBD Kabupaten/Kota (Rp)</th>
                            <th>Bantuan Pemerintah Kabupaten/Kota (Rp)</th>
                            <th>Bantuan Pemerintah Provinsi (Rp)</th>
                            <th>Bantuan Pemerintah Pusat (Rp)</th>
                            <th>Pendapatan Asli Desa (Rp)</th>
                            <th>Swadaya Masyarakat Desa dan Kelurahan (Rp)</th>
                            <th>Alokasi Dana Desa (Rp)</th>
                            <th>Sumber Pendapatan dari Perusahaan yang ada di desa/kelurahan (Rp)</th>
                            <th>Sumber pendapatan lain yang sah dan tidakmengikat (Rp)</th>
                            <th>Jumlah Penerimaan Desa/Kelurahan tahun ini (Rp)</th>
                            <th>Jumlah Belanja Publik/belanja pembangunan (Rp)</th>
                            <th>Jumlah Belanja Aparatur/pegawai (Rp)</th>
                            <th>Jumlah Belanja (Rp)</th>
                            <th>Saldo Anggaran (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['ac1e34b29f3d5'] }}</td>
                                <td align="right">{{ $value->data['5f2b8c1d9a6e7'] }}</td>
                                <td align="right">{{ $value->data['4c2d5e6f1a3b'] }}</td>
                                <td align="right">{{ $value->data['9d2e3f4a5b6c'] }}</td>
                                <td align="right">{{ $value->data['7e8f1c3d4b5a'] }}</td>
                                <td align="right">{{ $value->data['6a7b8c9d1e2f'] }}</td>
                                <td align="right">{{ $value->data['5b6c7d8e9f1a'] }}</td>
                                <td align="right">{{ $value->data['8c9d1a2b3e4f'] }}</td>
                                <td align="right">{{ $value->data['2d3e4f5a6b7'] }}</td>
                                <td align="right">{{ $value->data['3e4f5a6b7c8'] }}</td>
                                <td align="right">{{ $value->data['f1e2d3c4b5a6'] }}</td>
                                <td align="right">{{ $value->data['7d8e9f1a2b3'] }}</td>
                                <td align="right">{{ $value->data['4e5f6a7b8c9'] }}</td>
                                <td align="right">{{ $value->data['1d2e3f4a5b6'] }}</td>
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
