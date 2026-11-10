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
                <h4><u>LEMBAGA KEMASYARAKATAN<br>ORGANISASI LEMBAGA KEMASYARAKATAN</u></h4>
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
                            <th nowrap>Jenis Organisasi</th>
                            <th nowrap>Kepengurusan</th>
                            <th nowrap>Buku Administrasi</th>
                            <th nowrap>Jumlah kegiatan</th>
                            <th nowrap>Dasar Hukum Pembentukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ \Modules\Prodeskel\Enums\JenisOrganisasiEnum::valueOf($value->item) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($value->data['kepengurusan']) }}</td>
                                <td class="text-right">{{ $value->data['buku'] }}</td>
                                <td class="text-right">{{ $value->data['kegiatan'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DasarHukumPembentukanEnum::valueOf($value->data['hukum']) }}</td>

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
