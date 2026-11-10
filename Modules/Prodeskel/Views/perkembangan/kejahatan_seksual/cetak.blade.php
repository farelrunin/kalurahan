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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN KEJAHATAN SEKSUAL</u></h4>
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
                            <th>Jumlah kasus perkosaan pada tahun ini</th>
                            <th>Jumlah kasus perkosaan pada anak tahun ini</th>
                            <th>Jumlah kasus kehamilan di luar nikah menurut hukum negara</th>
                            <th>Jumlah kasus kehamilan di luar nikah menurut hukum adat</th>
                            <th>Jumlah tempat penampungan/persewaan kamar bagi pekerja seks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['kejadian'] }}</td>
                                <td align="right">{{ $value->data['anak'] }}</td>
                                <td align="right">{{ $value->data['hukum_negara'] }}</td>
                                <td align="right">{{ $value->data['hukum_adat'] }}</td>
                                <td align="right">{{ $value->data['penampungan'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="9">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
