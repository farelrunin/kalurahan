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
                            <th>Jenis Bahan Galian</th>
                            <th>Status</th>
                            <th>Hasil Produksi</th>
                            <th>Dijual Langsung Ke Konsumen</th>
                            <th>Dijual Ke Pasar</th>
                            <th>Dijual Melalui KUD</th>
                            <th>Dijual Melalui Tengkulak</th>
                            <th>Dijual Melalui Pengecer</th>
                            <th>Dijual Ke Lumbung {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th>Tidak Dijual</th>
                            <th>Kepemilikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $depositProduksiGalian)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $depositProduksiGalian->data['tanggal'] }}</td>
                                <td class="text-right">{{ Modules\Prodeskel\Enums\JenisBahanGalianEnum::valueOf($depositProduksiGalian->komoditas, '-') }}</td>
                                <td class="text-right">{{ $depositProduksiGalian->data['status'] }}</td>
                                <td class="text-right">{{ Modules\Prodeskel\Enums\VolumeEnum::valueOf($depositProduksiGalian->data['hasil_produksi'], '-') }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['dijual_langsung_ke_konsumen']) }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['dijual_ke_pasar']) }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['dijual_melalui_KUD']) }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['dijual_melalui_tengkulak']) }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['dijual_melalui_pengecer']) }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['dijual_ke_lumbung_desa']) }}</td>
                                <td class="text-right">{{ App\Enums\StatusEnum::valueOf($depositProduksiGalian->data['tidak_dijual']) }}</td>
                                @php
                                    $kepemilikanLabels = Modules\Prodeskel\Enums\KepemilikanEnum::all();
                                    $kepemilikan = array_map(function ($value) use ($kepemilikanLabels) {
                                        return Modules\Prodeskel\Enums\KepemilikanEnum::valueOf($value);
                                    }, $depositProduksiGalian->data['kepemilikan'] ?? []);
                                @endphp
                                <td class="text-right">{{ implode(', ', $kepemilikan) }}</td>
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
