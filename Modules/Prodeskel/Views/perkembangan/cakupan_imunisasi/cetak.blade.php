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
                <h4><u>DATA STRUKTUR MATA PENCAHARIAN MENURUT CAKUPAN IMUNISASI</u></h4>
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
                            <th>Jumlah Bayi usia 2 bulan</th>
                            <th>Jumlah bayi 2 bulan Imunisasi DPT-1, BCG dan Polio -1</th>
                            <th>Jumlah bayi usia 3 bulan</th>
                            <th>Jumlah bayi 3 bulan yang imunisasi DPT-2 dan Polio-2</th>
                            <th>Jumlah bayi usia 4 bulan</th>
                            <th>Jumlah bayi 4 bulan yang imunisasi DPT-3 dan Polio-3</th>
                            <th>Jumlah bayi 9 bulan</th>
                            <th>Jumlah bayi 9 bulan yang imunisasi campak</th>
                            <th>Jumlah bayi yang sudah imunisasi cacar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['bayi_usia_2_bulan'] }}</td>
                                <td align="right">{{ $value->data['bayi_2_bulan_imunisasi_dpt_1_bcg_dan_polio_1'] }}</td>
                                <td align="right">{{ $value->data['bayi_usia_3_bulan'] }}</td>
                                <td align="right">{{ $value->data['bayi_3_bulan_yang_imunisasi_dpt_2_dan_polio_2'] }}</td>
                                <td align="right">{{ $value->data['bayi_usia_4_bulan'] }}</td>
                                <td align="right">{{ $value->data['bayi_4_bulan_yang_imunisasi_dpt_3_dan_polio_3'] }}</td>
                                <td align="right">{{ $value->data['bayi_9_bulan'] }}</td>
                                <td align="right">{{ $value->data['bayi_9_bulan_yang_imunisasi_campak'] }}</td>
                                <td align="right">{{ $value->data['bayi_yang_sudah_imunisasi_cacar'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="8">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
