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
                <h4><u>DATA PRODUK DOMESTIK DESA/KELURAHAN BRUTO<br>SEKTOR ANGKUTAN DAN KOMUNIKASI</u></h4>
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
                            <th>Jumlah jenis kegiatan pengangkutan orang dan barang dengan alat angkut kendaraan jalan raya, laut, rel, udara, dan sungai / danau / penyeberangan</th>
                            <th>Jumlah total kendaraan angkutan</th>
                            <th>Nilai total transaksi pengangkutan</th>
                            <th>Nilai total biaya yang dikeluarkan</th>
                            <th>Jumlah jenis kegiatan jasa pelabuhan, terminal, tambatan, agensi, ekspedisi, tol, bongkar muat dan parkir</th>
                            <th>Jumlah total nilai transaksi jasa penunjang angkutan</th>
                            <th>Nilai biaya antara yang dikeluarkan</th>
                            <th>Jumlah jenis kegiatan informasi dan telekomunikasi serta jasa penunjang lainnya</th>
                            <th>Jumlah nilai aset telekomunikasi dan informasi yang ada</th>
                            <th>Nilai transaksi informasi dan telekomunikasi yang dicapai</th>
                            <th>Biaya antara yang dikeluarkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">
                                    {{ $value->data['jumlah_jenis_kegiatan_pengangkutan'] }}
                                </td>
                                <td align="right">{{ $value->data['jumlah_total_kendaraan_angkutan'] }}</td>
                                <td align="right">{{ $value->data['nilai_total_transaksi_pengangkutan'] }}</td>
                                <td align="right">{{ $value->data['nilai_total_biaya_yang_dikeluarkan'] }}
                                </td>
                                <td align="right">{{ $value->data['jumlah_jenis_kegiatan_jasa_pelabuhan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_nilai_transaksi_jasa_penunjang_angkutan'] }}</td>
                                <td align="right">{{ $value->data['nilai_biaya_antara_yang_dikeluarkan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_jenis_kegiatan_informasi_dan_telekomunikasi_serta_jasa_penunjang_lainnya'] }}</td>
                                <td align="right">{{ $value->data['jumlah_nilai_aset_telekomunikasi_dan_informasi_yang_ada'] }}</td>
                                <td align="right">{{ $value->data['nilai_transaksi_informasi_dan_telekomunikasi_yang_dicapai'] }}</td>
                                <td align="right">{{ $value->data['biaya_antara_yang_dikeluarkan'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="16">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
