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
                <h4><u>DATA KESEHATAN MASYARAKAT<br>KUALITAS BAYI</u></h4>
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
                            <th>Jumlah keguguran kandungan (Orang)</th>
                            <th>Jumlah bayi lahir (Orang)</th>
                            <th>Jumlah bayi lahir mati (Orang)</th>
                            <th>Jumlah bayi lahir hidup (Orang)</th>
                            <th>Jumlah bayi mati usia 0 - 1 bulan (Orang)</th>
                            <th>Jumlah bayi mati usia 1 - 12 bulan (Orang)</th>
                            <th>Jumlah bayi lahir berat kurang dari 2,5 kg (Orang)</th>
                            <th>Jumlah bayi 0-5 tahun hidup yang menderita kelainan organ tubuh, fisik dan mental (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['keguguran_kandungan'] }}</td>
                                <td align="right">{{ $value->data['bayi_lahir'] }}</td>
                                <td align="right">{{ $value->data['bayi_lahir_mati'] }}</td>
                                <td align="right">{{ $value->data['bayi_lahir_hidup'] }}</td>
                                <td align="right">{{ $value->data['bayi_mati_usia_0_1_bulan'] }}</td>
                                <td align="right">{{ $value->data['bayi_mati_usia_1_12_bulan'] }}</td>
                                <td align="right">{{ $value->data['bayi_lahir_berat_kurang_dari_2_5_kg'] }}</td>
                                <td align="right">{{ $value->data['bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental'] }}</td>
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
