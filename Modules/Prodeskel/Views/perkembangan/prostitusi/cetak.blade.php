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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN PROSTITUSI</u></h4>
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
                            <th>Jumlah penduduk pekerja pramu nikmat (Orang)</th>
                            <th>Lokaliasi prostitusi</th>
                            <th>Jumlah tempat yang menyediakan wanita pramunikmat secara terselubung (Buah)</th>
                            <th>Jumlah kasus/konflik akibat maraknya praktek prostitusi (Kasus)</th>
                            <th>Jumlah pembinaan pelaku prostitusi (Kali)</th>
                            <th>Jumlah penertiban penyediaan tempat prostitusi (Kali)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['penduduk'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['lokalisasi']) }}</td>
                                <td align="right">{{ $value->data['wanita_pramunikmat'] }}</td>
                                <td align="right">{{ $value->data['kasus'] }}</td>
                                <td align="right">{{ $value->data['pembinaan'] }}</td>
                                <td align="right">{{ $value->data['penertiban'] }}</td>
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
