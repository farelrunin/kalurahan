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
                            <th class="padat">NO</th>
                            <th>Tanggal</th>
                            <th>Jenis Produksi</th>
                            <th>Hasil Produksi</th>
                            <th>Satuan</th>
                            <th>Nilai Produksi Tahun Ini (Rp)</th>
                            <th>Nilai Bahan Baku yang Digunakan (Rp)</th>
                            <th>Nilai Bahan Penolong yang Digunakan (Rp)</th>
                            <th>Jumlah Ternak Tahun Ini (Ekor)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $komoditas)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $komoditas->data['tanggal'] }}</td>
                                <td>{{ $komoditas->data['jenis_produksi'] }}</td>
                                <td>{{ $komoditas->data['hasil_produksi'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\SatuanTernakEnum::valueOf($komoditas->data['satuan']) }}</td>
                                <td>{{ $komoditas->data['nilai_produksi'] }}</td>
                                <td>{{ $komoditas->data['nilai_bahan_baku'] }}</td>
                                <td>{{ $komoditas->data['nilai_bahan_penolong'] }}</td>
                                <td>{{ $komoditas->data['jumlah_ternak'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="11">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
