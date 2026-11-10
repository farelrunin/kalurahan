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
                            <th nowrap>Gedung Kantor</th>
                            <th>Ruangan Kerja</th>
                            <th nowrap>Balai BPD</th>
                            <th nowrap>Kondisi</th>
                            <th nowrap>Listrik</th>
                            <th nowrap>Air Bersih</th>
                            <th nowrap>Telepon</th>
                            <th>Mesin Tik (Buah)</th>
                            <th>Meja (Buah)</th>
                            <th>Kursi (Buah)</th>
                            <th>Lemari Arsip (Buah)</th>
                            <th>Komputer (Unit)</th>
                            <th>Mesin Fax (Unit)</th>
                            <th nowrap>Lainnya</th>
                            <th>Buku Administrasi Kegiatan BPD</th>
                            <th nowrap>Buku-Buku Administrasi Keanggotaan</th>
                            <th nowrap>Buku Kegiatan BPD</th>
                            <th nowrap>Buku Himpunan Peraturan Desa</th>
                            <th nowrap>Lainnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['gedung_kantor']) }}</td>
                                <td align="right">{{ $item->data['ruangan_kerja'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['balai_bpd']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KondisiEnum::valueOf($item->data['kondisi']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['listrik']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AirBersihEnum::valueOf($item->data['air_bersih']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['telepon']) }}</td>
                                <td align="right">{{ $item->data['mesin_tik'] }}</td>
                                <td align="right">{{ $item->data['meja'] }}</td>
                                <td align="right">{{ $item->data['kursi'] }}</td>
                                <td align="right">{{ $item->data['lemari_arsip'] }}</td>
                                <td align="right">{{ $item->data['komputer'] }}</td>
                                <td align="right">{{ $item->data['mesin_fax'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['inventaris_lainnya']) }}</td>
                                <td align="right">{{ $item->data['buku_administrasi_bpd'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['buku_anggota']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['buku_kegiatan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['buku_perdes']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['buku_lainnya']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="21">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
