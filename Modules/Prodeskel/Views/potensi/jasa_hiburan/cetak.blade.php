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
                <h4><u>DATA {{ strtoupper($tipe) }}</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th nowrap>Jenis Usaha</th>
                            <th>Jumlah</th>
                            <th>Jenis Produk yang Diperdagangkan (jenis)</th>
                            <th>Jumlah Tenaga Kerja Yang Terserap (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasJasaHiburanEnum::valueOf($item->data['kategori']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\JenisJasaHiburanEnum::valueOf($item->data['jenis']) }}
                                </td>
                                <td align="right">{{ $item->data['jumlah'] }}</td>
                                <td align="right">{{ $item->data['jenis_produk'] }}</td>
                                <td align="right">{{ $item->data['jumlah_tenaga_kerja'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
