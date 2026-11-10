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
                            <th>Luas Perkebunan Swasta/Negara (Ha)</th>
                            <th>Hasil Perkebunan Swasta/Negara (Ton/Ha)</th>
                            <th>Luas Perkebunan Rakyat (Ha)</th>
                            <th>Hasil Perkebunan Rakyat (Ton/Ha)</th>
                            <th>Harga Lokal (Rp)</th>
                            <th>Nilai Produksi (Rp)</th>
                            <th>Biaya Pemupukan (Rp)</th>
                            <th>Biaya Bibit (Rp)</th>
                            <th>Biaya Obat (Rp)</th>
                            <th>Biaya Lainnya (Rp)</th>
                            <th>Saldo Produksi (Rp)</th>
                            <th>Dijual Langsung Ke Konsumen</th>
                            <th>Dijual Melalui KUD</th>
                            <th>Dijual Melalui Tengkulak</th>
                            <th>Dijual Melalui Pengecer</th>
                            <th>Dijual Ke Lumbung {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th>Tidak Djual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $hasilProduksiKebun)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $hasilProduksiKebun->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasTanamanKebunEnum::valueOf($hasilProduksiKebun->komoditas, '-') }}
                                </td>
                                <td>{{ $hasilProduksiKebun->data['luas_perkebunan_swasta'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['hasil_perkebunan_swasta'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['luas_perkebunan_rakyat'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['hasil_perkebunan_rakyat'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['harga_lokal'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['nilai_produksi_tahun_ini'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['biaya_pemupukan'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['biaya_bibit'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['biaya_obat'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['biaya_lainnya'] }}</td>
                                <td>{{ $hasilProduksiKebun->data['saldo_produksi'] }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_langsung_ke_konsumen']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_melalui_KUD']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_melalui_tengkulak']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_melalui_pengecer']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_ke_lumbung_desa']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['tidak_dijual']) }}</td>
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
