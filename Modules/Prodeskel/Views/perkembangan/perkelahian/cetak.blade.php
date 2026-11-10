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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN PERKELAHIAN</u></h4>
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
                            <th>Kasus perkelahian yang terjadi tahun ini</th>
                            <th>Kasus perkelahian yang menimbulkan korban jiwa</th>
                            <th>Kasus perkelahian yang menimbulkan luka parah</th>
                            <th>Kasus perkelahian yang menimbulkan kerugian material</th>
                            <th>Jumlah pelaku konflik yang diadili atau diproses secara hukum (Orang)</th>
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
                                <td align="right">{{ $value->data['korban_jiwa'] }}</td>
                                <td align="right">{{ $value->data['luka_parah'] }}</td>
                                <td align="right">{{ $value->data['kerugian'] }}</td>
                                <td align="right">{{ $value->data['jumlah'] }}</td>
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
