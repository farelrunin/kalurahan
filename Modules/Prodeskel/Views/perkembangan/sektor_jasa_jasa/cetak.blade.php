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
                <h4><u>DATA PRODUK DOMESTIK DESA BRUTO<br>SEKTOR JASA-JASA</u></h4>
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
                            <th colspan="3" class="text-center">Sub-Sektor Jasa Pemerintahan Umum</th>
                            <th colspan="3" class="text-center">Sub-Sektor Jasa Swasta</th>
                            <th colspan="3" class="text-center">Sub-Sektor Jasa Hiburan Dan Rekreasi</th>
                            <th colspan="4" class="text-center">Sub-Sektor Jasa Perorangan Dan Rumah Tangga</th>
                        </tr>
                        <tr class="border thick">
                            <th>Jumlah jenis jasa pelayanan pemerintahan kepada masyarakat (Jenis)</th>
                            <th>Nilai transaksi pelayanan pemerintahan kepada masyarakat (Rp)</th>
                            <th>Biaya yang dikeluarkan dalam pelayanan (Rp)</th>
                            <th>Jumlah usaha jasa pelayanan sosial yang disediakan masyarakat (Jenis)</th>
                            <th>Nilai aset produksi jasa pelayanan sosial (Rp)</th>
                            <th>Biaya yang dikeluarkan (Rp)</th>
                            <th>Jumlah jenis jasa hiburan dan rekreasi (Jenis)</th>
                            <th>Nilai transaksi usaha jasa hiburan dan rekreasi (Rp)</th>
                            <th>Biaya antara yang dikeluarkan (Rp)</th>
                            <th>Jumlah jenis kegiatan jasa pelayanan perorangan dan rumah tanggan (Jenis)</th>
                            <th>Nilai aset jasa pelayanan perorangan dan rumah tangga (Rp)</th>
                            <th>Nilai transaksi jasa pelayanan perorangan dan rumah tangga (Rp)</th>
                            <th>Biaya antara yang dikeluarkan (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <th align="right">{{ $value->data['jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat'] }}</th>
                                <th align="right">{{ $value->data['nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp'] }}</th>
                                <th align="right">{{ $value->data['biaya_yang_dikeluarkan_dalam_pelayanan_rp'] }}</th>
                                <th align="right">{{ $value->data['jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis'] }}</th>
                                <th align="right">{{ $value->data['nilai_aset_produksi_jasa_pelayanan_sosial_rp'] }}</th>
                                <th align="right">{{ $value->data['biaya_yang_dikeluarkan_rp'] }}</th>
                                <th align="right">{{ $value->data['jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis'] }}</th>
                                <th align="right">{{ $value->data['nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp'] }}</th>
                                <th align="right">{{ $value->data['biaya_antara_yang_dikeluarkan_rp'] }}</th>
                                <th align="right">{{ $value->data['jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis'] }}</th>
                                <th align="right">{{ $value->data['nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] }}</th>
                                <th align="right">{{ $value->data['nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] }}</th>
                                <th align="right">{{ $value->data['biaya_antara_yang_dikeluarkan_rp_dua'] }}</th>
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
