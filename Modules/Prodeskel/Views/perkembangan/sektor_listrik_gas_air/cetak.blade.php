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
                <h4><u>DATA PRODUK DOMESTIK DESA/KELURAHAN BRUTO<br>SEKTOR LISTRIK, GAS DAN AIR MINUM</u></h4>
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
                            <th>Jumlah Jenis Kegiatan Pembangkit Dan Penyaluran Tenaga Listrik</th>
                            <th>Jumlah Nilai Produksi Listrik</th>
                            <th>Jumlah Total Nilai Transaksi</th>
                            <th>Jumlah Biaya Antara Yang Dikeluarkan</th>
                            <th>Jumlah Kegiatan Penyediaan Gas</th>
                            <th>Nilai Aset Produksi Gas</th>
                            <th>Nilai Transaksi</th>
                            <th>Biaya Antara Yang Dikeluarkan</th>
                            <th>Jumlah Jenis Kegiatan Penyediaan Dan Penyaluran Air Minum</th>
                            <th>Nilai Aset Penyediaan Air Minum</th>
                            <th>Nilai Produksi Air Minum</th>
                            <th>Nilai Transaksi Air Minum</th>
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
                                    {{ $value->data['jumlah_jenis_kegiatan_pembangkit_dan_penyaluran_tenaga_listrik'] }}
                                </td>
                                <td align="right">{{ $value->data['jumlah_nilai_produksi_listrik'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_nilai_transaksi'] }}</td>
                                <td align="right">{{ $value->data['jumlah_biaya_antara_yang_dikeluarkan'] }}
                                </td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_penyediaan_gas'] }}</td>
                                <td align="right">{{ $value->data['nilai_aset_produksi_gas'] }}</td>
                                <td align="right">{{ $value->data['nilai_transaksi'] }}</td>
                                <td align="right">{{ $value->data['biaya_antara_yang_dikeluarkan'] }}</td>
                                <td align="right">
                                    {{ $value->data['jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum'] }}
                                </td>
                                <td align="right">{{ $value->data['nilai_aset_penyediaan_air_minum'] }}</td>
                                <td align="right">{{ $value->data['nilai_produksi_air_minum'] }}</td>
                                <td align="right">{{ $value->data['nilai_transaksi_air_minum'] }}</td>
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
