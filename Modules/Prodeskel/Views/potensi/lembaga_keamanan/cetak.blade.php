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
                            <th>Keberadaan Hansip dan Linmas</th>
                            <th>Jumlah Anggota Hansip</th>
                            <th>Jumlah Anggota Satgas Linmas</th>
                            <th>Pelaksanaan SISKAMLING</th>
                            <th>Jumlah Pos Kamling</th>
                            <th>Keberadaan SATPAM SWAKARSA</th>
                            <th>Jumlah Anggota SATPAM SWAKARSA</th>
                            <th>Nama Organisasi Induk</th>
                            <th>Pemilik Organisasi</th>
                            <th>Keberadaan Organisasi Keamanan Lainnya</th>
                            <th>Mitra Koramil / TNI</th>
                            <th>Jumlah Anggota Mitra Koramil / TNI</th>
                            <th>Jumlah Kegiatan Mitra Koramil / TNI</th>
                            <th>Babinkamtibmas / POLRI</th>
                            <th>Jumlah Anggota Babinkamtibmas / POLRI</th>
                            <th>Jumlah Kegiatan Babinkamtibmas / POLRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$item->data['keberadaan_hansip_dan_linmas'] ?? 0] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_anggota_hansip'] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_anggota_satgas_linmas'] }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$item->data['pelaksanaan_siskamling'] ?? 0] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_pos_kamling'] }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$item->data['keberadaan_satpam_swakarsa'] ?? 0] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_anggota_satpam_swakarsa'] }}</td>
                                <td>{{ $item->data['nama_organisasi_induk'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KomoditasPemilikOrganisasiEnum::valueOf($item->komoditas, '-') }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$item->data['keberadaan_organisasi_keamanan_lainnya'] ?? 0] }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$item->data['mitra_koramil_tni'] ?? 0] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_anggota_satpam_swakarsa'] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_kegiatan_mitra_koramil_tni'] }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$item->data['babinkamtibmas_polri'] ?? 0] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_anggota_babinkamtibmas_polri'] }}</td>
                                <td class="text-right">{{ $item->data['jumlah_kegiatan_babinkamtibmas_polri'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="18">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
