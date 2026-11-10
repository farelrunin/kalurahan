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
                            <th>Gedung Kantor Atau Balai Pertemuan</th>
                            <th>Alat Tulis Kantor</th>
                            <th>Barang Inventaris</th>
                            <th>Buku Administrasi</th>
                            <th>Jenis Kegiatan</th>
                            <th>Jumlah Pengurus</th>
                            <th>Lainnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['gedung_kantor_atau_balai_pertemuan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['alat_tulis_kantor']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['barang_inventaris']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['buku_administrasi']) }}</td>
                                <td align="right">{{ $item->data['jenis_kegiatan'] }}</td>
                                <td align="right">{{ $item->data['jumlah_pengurus'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['lainnya']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
