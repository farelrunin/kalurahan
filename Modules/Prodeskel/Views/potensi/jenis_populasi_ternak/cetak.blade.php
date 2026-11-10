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
                            <th>Jenis Ternak</th>
                            <th>Jumlah Pemilik (Orang)</th>
                            <th>Populasi (Ekor)</th>
                            <th>Dijual Langsung ke Konsumen</th>
                            <th>Dijual ke Pasar Hewan</th>
                            <th>Dijual Melalui KUD</th>
                            <th>Dijual Melalui Tengkulak</th>
                            <th>Dijual Melalui Pengecer</th>
                            <th>Dijual ke Lumbung Desa/Kelurahan</th>
                            <th>Tidak Dijual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $komoditas)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $komoditas->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\JenisTernakEnum::valueOf($komoditas->data['jenis_ternak']) }}</td>
                                <td>{{ $komoditas->data['jumlah_pemilik'] }}</td>
                                <td>{{ $komoditas->data['populasi'] }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['jual_konsumen']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['jual_pasar']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['jual_kud']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['jual_tengkulak']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['jual_pengecer']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['jual_desa']) }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($komoditas->data['tidak_jual']) }}</td>
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
