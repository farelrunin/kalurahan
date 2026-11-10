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
                            <th>Nama Tanaman Apotik Hidup</th>
                            <th>Luas Produksi (Ha)</th>
                            <th>Hasil Produksi (Ton/Ha)</th>
                            <th>Jumlah Produksi (Ton)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $apotikHidup)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $apotikHidup->data['tanggal'] }}</td>
                                <td class="text-right">
                                    {{ Modules\Prodeskel\Enums\KomoditasApotikHidupEnum::valueOf($apotikHidup->komoditas, '-') }}
                                </td>
                                <td class="text-right">{{ $apotikHidup->data['luas_produksi'] }}</td>
                                <td class="text-right">{{ $apotikHidup->data['hasil_produksi'] }}</td>
                                <td class="text-right">{{ $apotikHidup->data['jumlah_produksi'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
