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
                            <th>Jenis Lembaga</th>
                            <th>Jumlah</th>
                            <th>Dasar Hukum Pembentukan</th>
                            <th>Jumlah Pengurus (Orang)</th>
                            <th>Alamat Kantor</th>
                            <th>Jumlah Jenis Kegiatan</th>
                            <th>Ruang Lingkup Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasJenisLembagaEnum::valueOf($value->komoditas, '-') }}
                                </td>
                                <td class="text-right">{{ $value->data['jumlah'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasDasarHukumPembentukanEnum::valueOf($value->data['dasar_hukum_pembentukan'], '-') }}</td>
                                <td class="text-right">{{ $value->data['jumlah_pengurus'] }}</td>
                                <td>{{ $value->data['alamat_kantor'] }}</td>
                                <td class="text-right">{{ $value->data['jumlah_jenis_kegiatan'] }}</td>
                                <td>{{ $value->data['ruang_lingkup_kegiatan'] }}</td>
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
