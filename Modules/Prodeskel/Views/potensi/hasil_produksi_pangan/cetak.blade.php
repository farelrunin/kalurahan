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
                            <th>Nama Komoditas</th>
                            <th>Luas Produksi (Ha)</th>
                            <th>Hasil Produksi (Ton/Ha)</th>
                            <th>Harga Lokal (Rp)</th>
                            <th>Nilai Produksi (Rp)</th>
                            <th>Biaya Pemupukan (Rp)</th>
                            <th>Biaya Bibit (Rp)</th>
                            <th>Biaya Obat (Rp)</th>
                            <th>Biaya Lainnya (Rp)</th>
                            <th>Saldo Produksi (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $hasilProduksiPangan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $hasilProduksiPangan->data['tanggal'] }}</td>
                                <td>
                                    {{ Modules\Prodeskel\Enums\KomoditasTanamanPanganEnum::valueOf($hasilProduksiPangan->komoditas, '-') }}
                                </td>
                                <td>{{ $hasilProduksiPangan->data['luas_produksi'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['hasil_produksi'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['harga_local'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['nilai_produksi_tahun_ini'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['biaya_pemupukan'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['biaya_bibit'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['biaya_obat'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['biaya_lainnya'] }}</td>
                                <td>{{ $hasilProduksiPangan->data['saldo_produksi'] }}</td>
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
