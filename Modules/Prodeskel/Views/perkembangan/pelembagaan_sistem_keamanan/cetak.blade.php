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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN PELEMBAGAAB SISTEM KEAMANAN</u></h4>
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
                            <th>Organisasi Siskamling</th>
                            <th>Organisasi Pertahanan Sipil dan Perlindungan Masyarakat</th>
                            <th>Jumlah RT atau sebutan lainnya yang ada Siskamling/Pos Ronda</th>
                            <th>Jumlah anggota Hansip dan Linmas</th>
                            <th>Jadwal kegiatan Siskamling dan Pos Ronda</th>
                            <th>Buku anggota Hansip dan Linmas</th>
                            <th>Jumlah kelompok Satuan Pengamanan (SATPAM) swasta</th>
                            <th>Jumlah pembinaan Siskamling oleh Pengurus dan Kades/Lurah</th>
                            <th>Jumlah Pos Jaga Induk Desa/Kelurahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['siskamling']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pertahanan']) }}</td>
                                <td align="right">{{ $value->data['jumlah_siskamling'] }}</td>
                                <td align="right">{{ $value->data['jumlah_hansip'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['jadwal']) }}</td>
                                <td align="right">{{ $value->data['buku_anggota'] }}</td>
                                <td align="right">{{ $value->data['satpam'] }}</td>
                                <td align="right">{{ $value->data['pembinaan'] }}</td>
                                <td align="right">{{ $value->data['pos_jaga'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="13">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
