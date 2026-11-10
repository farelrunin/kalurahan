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
                <h4><u>DATA PENDAPATAN PERKAPITA<br>PENDAPATAN RIIL KELUARGA</u></h4>
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
                            <th>Jumlah Kepala Keluarga (KK)</th>
                            <th>Jumlah Anggota Keluarga (Orang)</th>
                            <th>Jumlah Pendapatan Kepala Keluarga (Rp)</th>
                            <th>Jumlah pendapatan dari anggota keluarga yang bekerja (Rp)</th>
                            <th>Total Pendapatan (Rp)</th>
                            <th>Pendapatan Anggota Keluarga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kepala_keluarga'] }}</td>
                                <td align="right">{{ $value->data['jumlah_anggota_keluarga'] }}</td>
                                <td align="right">{{ $value->data['jumlah_pendapatan_kepala_keluarga'] }}</td>
                                <td align="right">{{ $value->data['jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja'] }}</td>
                                <td align="right">{{ $value->data['total_pendapatan'] }}</td>
                                <td align="right">{{ $value->data['pendapatan_anggota_keluarga'] }}</td>
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
