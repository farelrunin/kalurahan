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
                            <th>Dijual Langsung Ke Konsumen</th>
                            <th>Dijual Ke Pasar</th>
                            <th>Dijual Melalui KUD</th>
                            <th>Dijual Melalui Tengkulak</th>
                            <th>Dijual Melalui Pengecer</th>
                            <th>Dijual Ke Lumbung {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th>Tidak Djual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $hasilProduksiBuah)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $hasilProduksiBuah->data['tanggal'] }}</td>
                                <td>
                                    {{ Modules\Prodeskel\Enums\KomoditasTanamanBuahEnum::valueOf($hasilProduksiBuah->komoditas, '-') }}
                                </td>
                                <td>{{ $hasilProduksiBuah->data['luas_produksi'] }}</td>
                                <td>{{ $hasilProduksiBuah->data['hasil_produksi'] }}</td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_langsung_ke_konsumen']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_ke_pasar']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_melalui_KUD']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_melalui_tengkulak']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_melalui_pengecer']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_ke_lumbung_desa']) }}
                                </td>
                                <td>{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['tidak_dijual']) }}</td>
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
