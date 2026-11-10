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
                <h4><u>DATA EKONOMI MASYARAKAT<br>PENGANGGURAN</u></h4>
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
                            <th>Jumlah Angkatan Kerja (penduduk usia 18-56 tahun) (Orang)</th>
                            <th>Jumlah penduduk usia 18-56 tahun yang masih sekolah dan tidak bekerja (Orang)</th>
                            <th>Jumlah penduduk usia 18-56 tahun yang menjadi ibu rumah tangga (Orang)</th>
                            <th>Jumlah penduduk usia 18-56 tahun yang bekerja penuh (Orang)</th>
                            <th>Jumlah penduduk usia 18-56 tahun yang bekerja tidak tentu (Orang)</th>
                            <th>Jumlah penduduk usia 18-56 tahun yang cacat dan tidak bekerja (Orang)</th>
                            <th>Jumlah penduduk usia 18-56 tahun yang cacat dan bekerja (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_angkatan_kerja'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_masih_sekolah_tidak_bekerja'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_ibu_rumah_tangga'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_bekerja_penuh'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_bekerja_tidak_tentu'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_cacat_tidak_bekerja'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_cacat_bekerja'] }}</td>
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
