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
                <h4><u>DATA PRODUK DOMESTIK DESA BRUTO<br>SEKTOR PERDAGANGAN, HOTEL DAN RESTORAN</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th rowspan="2" class="padat">No</th>
                            <th rowspan="2">Bulan</th>
                            <th rowspan="2">Tahun</th>
                            <th rowspan="2">Tanggal</th>
                            <th colspan="5" class="text-center">Sub-Sektor Perdagangan Besar</th>
                            <th colspan="4" class="text-center">Sub-Sektor Perdagangan Kecil</th>
                            <th colspan="5" class="text-center">Sub-Sektor Hotel</th>
                            <th colspan="4" class="text-center">Sub-Sektor Restoran</th>
                        </tr>
                        <tr class="border thick">
                            <th>Total jumlah jenis perdagangan besar (Jenis)</th>
                            <th>Total nilai transaksi (Rp)</th>
                            <th>Total nilai aset perdagangan yang ada (Rp)</th>
                            <th>Total nilai biaya yang dikeluarkan (Rp)</th>
                            <th>Total biaya antara lainnya (Rp)</th>
                            <th>Jumlah total jenis perdagangan eceran (Jenis)</th>
                            <th>Total nilai transaksi (Rp)</th>
                            <th>Total nilai biaya yang dikeluarkan (Rp)</th>
                            <th>Total nilai aset perdagangan eceran (Rp)</th>
                            <th>Jumlah total penginapan dan penyediaan akomodasi yang ada (Jenis)</th>
                            <th>Jumlah total pendapatan (Rp)</th>
                            <th>Jumlah total biaya pemeliharaan (Rp)</th>
                            <th>Jumlah biaya antara yang dikeluarkan (Rp)</th>
                            <th>Jumlah total pendapatan yang diperoleh (Rp)</th>
                            <th>Jumlah tempat penyediaan konsumsi (Unit)</th>
                            <th>Biaya konsumsi yang dikeluarkan (Rp)</th>
                            <th>Biaya antara lainnya (Rp)</th>
                            <th>Jumlah total pendapatan yang diperoleh (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['total_jumlah_jenis_perdagangan_besar'] }}</td>
                                <td align="right">{{ $value->data['besar_total_nilai_transaksi'] }}</td>
                                <td align="right">{{ $value->data['total_nilai_aset_perdagangan_yang_ada'] }}</td>
                                <td align="right">{{ $value->data['besar_total_nilai_biaya_yang_dikeluarkan'] }}</td>
                                <td align="right">{{ $value->data['total_biaya_antara_lainnya'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_jenis_perdagangan_eceran'] }}</td>
                                <td align="right">{{ $value->data['kecil_total_nilai_transaksi'] }}</td>
                                <td align="right">{{ $value->data['kecil_total_nilai_biaya_yang_dikeluarkan'] }}</td>
                                <td align="right">{{ $value->data['total_nilai_aset_perdagangan_eceran'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_pendapatan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_biaya_pemeliharaan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_biaya_antara_yang_dikeluarkan'] }}</td>
                                <td align="right">{{ $value->data['hotel_jumlah_total_pendapatan_yang_diperoleh'] }}</td>
                                <td align="right">{{ $value->data['jumlah_tempat_penyediaan_konsumsi'] }}</td>
                                <td align="right">{{ $value->data['biaya_konsumsi_yang_dikeluarkan'] }}</td>
                                <td align="right">{{ $value->data['biaya_antara_lainnya'] }}</td>
                                <td align="right">{{ $value->data['resto_jumlah_total_pendapatan_yang_diperoleh'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="11">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
