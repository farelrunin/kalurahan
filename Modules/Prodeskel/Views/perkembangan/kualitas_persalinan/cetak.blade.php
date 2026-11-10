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
                <h4><u>DATA STRUKTUR MATA PENCAHARIAN MENURUT KUALITAS PERSALINAN</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr>
                            <th rowspan="2" class="padat">No</th>
                            <th rowspan="2" class="padat" style="min-width: 120px">Aksi</th>
                            <th rowspan="2">Bulan</th>
                            <th rowspan="2">Tahun</th>
                            <th rowspan="2">Tanggal</th>
                            <th colspan="9" align="center">Tempat Persalinan</th>
                            <th colspan="5" align="center">Pertolongan Persalinan</th>
                        </tr>
                        <tr>
                            <th nowrap>Tempat persalinan Rumah Sakit Umum (Unit)</th>
                            <th nowrap>Tempat persalinan Rumah Bersalin (Unit)</th>
                            <th nowrap>Tempat persalinan Puskesmas (Unit)</th>
                            <th nowrap>Tempat persalinan Polindes (Unit)</th>
                            <th nowrap>Tempat persalinan Balai Kesehatan Ibu Anak (Unit)</th>
                            <th nowrap>Tempat persalinan rumah praktek bidan (Unit)</th>
                            <th nowrap>Tempat praktek dokter (Unit)</th>
                            <th nowrap>Rumah dukun (Unit)</th>
                            <th nowrap>Rumah sendiri (Unit)</th>
                            <th nowrap>Jumlah Persalinan ditolong Dokter (Tindakan)</th>
                            <th nowrap>Jumlah persalinan ditolong bidan (Tindakan)</th>
                            <th nowrap>Jumlah persalinan ditolong perawat (Tindakan)</th>
                            <th nowrap>Jumlah persalinan ditolong dukun bersalin (Tindakan)</th>
                            <th nowrap>Jumlah persalinan ditolong keluarga (Tindakan)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['persalinan_rumah_sakit_umum'] }}</td>
                                <td align="right">{{ $value->data['persalinan_rumah_bersalin'] }}</td>
                                <td align="right">{{ $value->data['persalinan_puskesmas'] }}</td>
                                <td align="right">{{ $value->data['persalinan_polindes'] }}</td>
                                <td align="right">{{ $value->data['persalinan_balai_kesehatan_ibu_anak'] }}</td>
                                <td align="right">{{ $value->data['persalinan_rumah_praktek_bidan'] }}</td>
                                <td align="right">{{ $value->data['praktek_dokter'] }}</td>
                                <td align="right">{{ $value->data['rumah_dukun'] }}</td>
                                <td align="right">{{ $value->data['rumah_sendiri'] }}</td>
                                <td align="right">{{ $value->data['persalinan_ditolong_dokter'] }}</td>
                                <td align="right">{{ $value->data['persalinan_ditolong_bidan'] }}</td>
                                <td align="right">{{ $value->data['persalinan_ditolong_perawat'] }}</td>
                                <td align="right">{{ $value->data['persalinan_ditolong_dukun_bersalin'] }}</td>
                                <td align="right">{{ $value->data['persalinan_ditolong_keluarga'] }}</td>
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
