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
                            <th nowrap>Jenis Ruang Publik/Taman</th>
                            <th>Keberadaan</th>
                            <th>Luas (M2)</th>
                            <th>Tingkat Pemanfaatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasRuangPublikEnum::valueOf($item->komoditas) }}
                                </td>
                                <td>{{ $item->data['keberadaan'] ? 'Ada' : 'Tidak Ada' }}</td>
                                <td align="right">{{ $item->data['luas'] }}</td>
            </td>
            <td>{{ $item->data['tingkat_pemanfaatan'] ? 'Aktif' : 'Pasif' }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Data tidak ditemukan</td>
        </tr>
        @endforelse
    </tbody>
</table>
</td>
</tr>
</tbody>
</table>
