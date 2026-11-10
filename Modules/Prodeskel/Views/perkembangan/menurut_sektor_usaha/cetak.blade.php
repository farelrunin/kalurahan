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
                <h4><u>DATA PENDAPATAN PERKAPITA<br>MENURUT SEKTOR USAHA</u></h4>
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
                            <th>Jenis Sektor</th>
                            <th>Jumlah rumah tangga (KK)</th>
                            <th>Jumlah total anggota rumah tangga (Orang)</th>
                            <th>Jumlah rumah tangga buruh (KK)</th>
                            <th>Jumlah anggota rumah tangga buruh (Orang)</th>
                            <th>Jumlah pendapatan perkapita dari sektor tersebut untuk setiap rumah tangga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ \Modules\Prodeskel\Enums\MenurutSektorUsahaEnum::valueOf($value->item) }}</td>
                                <td align="right">{{ $value->data['jumlah_rumah_tangga'] }}</td>
                                <td align="right">{{ $value->data['jumlah_total_anggota_rumah_tangga'] }}</td>
                                <td align="right">{{ $value->data['jumlah_rumah_tangga_buruh'] }}</td>
                                <td align="right">{{ $value->data['jumlah_anggota_rumah_tangga_buruh'] }}</td>
                                <td align="right">{{ $value->data['jumlah_pendapatan_perkapita_dari_sektor_tersebut_untuk_setiap_rumah_tangga'] }}</td>
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
