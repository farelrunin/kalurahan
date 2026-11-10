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
                <h4><u>DATA PRODUK DOMESTIK DESA BRUTO<br>SEKTOR KEUANGAN - JASA PERUSAHAAN</u></h4>
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
                            <th colspan="3" class="text-center">Sub-Sektor Bank</th>
                            <th colspan="4" class="text-center">Sub-Sektor Lembaga Keuangan Bukan Bank</th>
                            <th colspan="4" class="text-center">Sub-Sektor Sewa Bangunan</th>
                            <th colspan="4" class="text-center">Sub-Sektor Jasa Perusahaan</th>
                        </tr>
                        <tr class="border thick">
                            <th>Jumlah transaksi perbankan (Rp)</th>
                            <th>Jumlah nilai transaksi perbankan (Rp)</th>
                            <th>Jumlah biaya yang dikeluarkan (Rp)</th>
                            <th>Jumlah lembaga keuangan bukan bank (Unit)</th>
                            <th>Jumlah kegiatan jasa penunjang lembaga keuangan bukan bank (Jenis)</th>
                            <th>Nilai transaksi lembaga keuangan bukan bank (Rp)</th>
                            <th>Biaya yang dikeluarkan (Rp)</th>
                            <th>Jumlah usaha persewaan bangunan dan tanah (Unit)</th>
                            <th>Total nilai persewaan yang dicapai (Rp)</th>
                            <th>Biaya yang dikeluarkan (Rp)</th>
                            <th>Biaya lainnya (Rp)</th>
                            <th>Jumlah perusahaan jasa (Jenis)</th>
                            <th>Nilai transaksi perusahaan jasa (Rp)</th>
                            <th>Biaya yang dikeluarkan (Rp)</th>
                            <th>Biaya lainnya (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <th align="right">{{ $value->data['jumlah_transaksi_perbankan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_nilai_transaksi_perbankan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_biaya_yang_dikeluarkan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_lembaga_keuangan_bukan_bank'] }}</th>
                                <th align="right">{{ $value->data['jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank'] }}</th>
                                <th align="right">{{ $value->data['nilai_transaksi_lembaga_keuangan_bukan_bank'] }}</th>
                                <th align="right">{{ $value->data['biaya_yang_dikeluarkan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_usaha_persewaan_bangunan_dan_tanah'] }}</th>
                                <th align="right">{{ $value->data['total_nilai_persewaan_yang_dicapai'] }}</th>
                                <th align="right">{{ $value->data['biaya_yang_dikeluarkan_A'] }}</th>
                                <th align="right">{{ $value->data['biaya_lainnya_A'] }}</th>
                                <th align="right">{{ $value->data['jumlah_perusahaan_jasa'] }}</th>
                                <th align="right">{{ $value->data['nilai_transaksi_perusahaan_jasa'] }}</th>
                                <th align="right">{{ $value->data['biaya_yang_dikeluarkan_B'] }}</th>
                                <th align="right">{{ $value->data['biaya_lainnya_B'] }}</th>
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
