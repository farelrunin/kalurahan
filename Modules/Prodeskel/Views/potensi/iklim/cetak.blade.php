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
                            <th>Curah Hujan (mm)</th>
                            <th>Jumlah Bulan Hujan (bulan)</th>
                            <th>Kelembaban Udara (%)</th>
                            <th>Suhu Rata-Rata Harian (&#176;C)</th>
                            <th>Tinggi Diatas Permukaan Laut (M)</th>
                            <th>Warna Tanah</th>
                            <th>Tekstur Tanah</th>
                            <th>Kemiringan Tanah (derajat)</th>
                            <th>Lahan Kritis (Ha)</th>
                            <th>Lahan Terlantar (Ha)</th>
                            <th>Erosi Ringan (Ha)</th>
                            <th>Erosi Sedang (Ha)</th>
                            <th>Erosi Berat (Ha)</th>
                            <th>Tidak Ada Erosi (Ha)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $iklim)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $iklim->data['tanggal'] }}</td>
                                <td>{{ $iklim->data['curah_hujan'] }}</td>
                                <td>{{ $iklim->data['jumlah_bulan_hujan'] }}</td>
                                <td>{{ $iklim->data['kelembaban_udara'] }}</td>
                                <td>{{ $iklim->data['suhu_rata_harian'] }}</td>
                                <td>{{ $iklim->data['tinggi_diatas_laut'] }}</td>
                                <td>{{ $iklim->data['warna_tanah'] }}</td>
                                <td>{{ $iklim->data['tekstur_tanah'] }}</td>
                                <td>{{ $iklim->data['kemiringan_tanah'] }}</td>
                                <td>{{ $iklim->data['lahan_kritis'] }}</td>
                                <td>{{ $iklim->data['lahan_terlantar'] }}</td>
                                <td>{{ $iklim->data['tanah_erosi_ringan'] }}</td>
                                <td>{{ $iklim->data['tanah_erosi_sedang'] }}</td>
                                <td>{{ $iklim->data['tanah_erosi_berat'] }}</td>
                                <td>{{ $iklim->data['tanah_tidak_ada_erosi'] }}</td>
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
