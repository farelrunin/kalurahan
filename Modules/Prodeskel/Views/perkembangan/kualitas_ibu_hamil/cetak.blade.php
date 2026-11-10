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
                <h4><u>DATA KESEHATAN MASYARAKAT<br>KUALITAS IBU HAMIL</u></h4>
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
                            <th>Jumlah ibu hamil (Orang)</th>
                            <th>Jumlah ibu hamil periksa di Posyandu (Orang)</th>
                            <th>Jumlah ibu hamil periksa di Puskesmas (Orang)</th>
                            <th>Jumlah ibu hamil periksa di Rumah Sakit (Orang)</th>
                            <th>Jumlah ibu hamil periksa di Dokter Praktek (Orang)</th>
                            <th>Jumlah ibu hamil periksa di Bidan Praktek (Orang)</th>
                            <th>Jumlah ibu hamil periksa di Dukun Terlatih (Orang)</th>
                            <th>Jumlah kematian ibu hamil (Orang)</th>
                            <th>Jumlah ibu hamil melahirkan (Orang)</th>
                            <th>Jumlah ibu nifas (Orang)</th>
                            <th>Jumlah kematian ibu nifas (Orang)</th>
                            <th>Jumlah ibu nifas hidup (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_periksa_di_posyandu'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_periksa_di_puskesmas'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_periksa_di_rumah_sakit'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_periksa_di_dokter_praktek'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_periksa_di_bidan_praktek'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_periksa_di_dukun_terlatih'] }}</td>
                                <td align="right">{{ $value->data['kematian_ibu_hamil'] }}</td>
                                <td align="right">{{ $value->data['ibu_hamil_melahirkan'] }}</td>
                                <td align="right">{{ $value->data['ibu_nifas'] }}</td>
                                <td align="right">{{ $value->data['kematian_ibu_nifas'] }}</td>
                                <td align="right">{{ $value->data['ibu_nifas_hidup'] }}</td>
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
