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
                            <th nowrap>Pemangku Adat</th>
                            <th nowrap>Kepengurusan Adat</th>
                            <th nowrap>Rumah Adat</th>
                            <th nowrap>Barang Pusaka</th>
                            <th nowrap>Naskah-Naskah</th>
                            <th nowrap>Lainnya</th>
                            <th nowrap>Musyawarah Adat</th>
                            <th nowrap>Sanksi Adat</th>
                            <th nowrap>Upacara Adat Perkawinan</th>
                            <th nowrap>Upacara Adat Kematian</th>
                            <th nowrap>Upacara Adat Kelahiran</th>
                            <th nowrap>Upacara Adat Dalam Bercocok Tanam</th>
                            <th nowrap>Upacara Adat Bidang Perikanan/Laut</th>
                            <th nowrap>Upacara Adat Bidang Kehutanan</th>
                            <th nowrap>Upacara Adat Dalam Pengeloaan Sumber Daya Alam</th>
                            <th nowrap>Upacara Adat Dalam Pembangunan Rumah</th>
                            <th nowrap>Upacara Adat Dalam Penyelesaian Masalah/Konflik</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['pemangku_adat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['kepengurusan_adat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['rumah_adat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['barang_pusaka']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['naskah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['lainnya']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['musyawarah_adat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['sanksi_adat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_perkawinan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_kematian']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_kelahiran']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_cocok_tanam']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_perikanan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_kehutanan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_sda']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_pembangunan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_penyelesaian_masalah']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="19">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
