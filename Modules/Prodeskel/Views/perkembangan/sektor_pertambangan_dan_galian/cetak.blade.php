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
                <h4><u>DATA PRODUK DOMESTIK DESA/KELURAHAN BRUTO<br>SEKTOR PERTAMBANGAN DAN GALIAN</u></h4>
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
                            <th>Total nilai produksi tahun ini (Rp)</th>
                            <th>Total nilai bahan baku yang digunakan (Rp)</th>
                            <th>Total nilai bahan penolong yang digunakan (Rp)</th>
                            <th>Total biaya antara yang dihabiskan (Rp)</th>
                            <th>Jumlah total jenis bahan tambang dan galian yang ada (Buah)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['total_nilai_produksi_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['total_nilai_bahan_baku_yang_digunakan'] }}</td>
                                <td align="right">{{ $value->data['total_nilai_bahan_penolong_yang_digunakan'] }}</td>
                                <td align="right">{{ $value->data['total_biaya_antara_yang_dihabiskan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada'] }}</td>
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
