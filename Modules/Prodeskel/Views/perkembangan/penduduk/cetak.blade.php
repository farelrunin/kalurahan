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
                <h4><u>DATA PERKEMBANGAN KEPENDUDUKAN<br>PENDUDUK DAN KEPALA KELUARGA</u></h4>
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
                            <th>Jumlah Penduduk Laki-Laki Tahun ini (Orang)</th>
                            <th>Jumlah Penduduk Perempuan Tahun ini (Orang)</th>
                            <th>Jumlah Penduduk Laki-Laki Tahun Lalu (Orang)</th>
                            <th>Jumlah Penduduk Perempuan Tahun Lalu (Orang)</th>
                            <th>Jumlah Kepala Keluarga Laki-Laki Tahun ini (KK)</th>
                            <th>Jumlah Kepala Keluarga Perempuan Tahun ini (KK)</th>
                            <th>Jumlah Kepala Keluarga Laki-Laki Tahun Lalu (KK)</th>
                            <th>Jumlah Kepala Keluarga Perempuan Tahun Lalu (KK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_laki_laki_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_perempuan_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_laki_laki_tahun_lalu'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_perempuan_tahun_lalu'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kepala_keluarga_laki_laki_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kepala_keluarga_perempuan_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kepala_keluarga_laki_laki_tahun_lalu'] }}
                                </td>
                                <td align="right">{{ $value->data['jumlah_kepala_keluarga_perempuan_tahun_lalu'] }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="10">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
