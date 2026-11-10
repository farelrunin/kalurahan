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
                            <th>Tempat Pembungan Sementara (Lokasi)</th>
                            <th>Tempat Pembungan Akhir (Tpa/Lokasi)</th>
                            <th>Alat Penghancur / Incenerator</th>
                            <th>Gerobak Sampah (Unit)</th>
                            <th>Tong Sampah (Unit)</th>
                            <th>Truk Pengangkut Sampah (Unit)</th>
                            <th>Satgas Kebersihan (Kelompok)</th>
                            <th>Anggota Satgas Kebersihan (Orang)</th>
                            <th>Pemulung (Orang)</th>
                            <th>Tempat Pengelolaan Sampah</th>
                            <th>Pengeloaan Sampah Lingkungan / RT</th>
                            <th>Pengeloaan Sampah Lainnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td align="right">{{ $item->data['tempat_pembungan_sementara'] }}</td>
                                <td align="right">{{ $item->data['tempat_pembungan_akhir'] }}</td>
                                <td>{{ $item->data['alat_penghancur_incenerator'] ? 'Ada' : 'Tidak Ada' }}</td>
                                <td align="right">{{ $item->data['gerobak_sampah'] }}</td>
                                <td align="right">{{ $item->data['tong_sampah'] }}</td>
                                <td align="right">{{ $item->data['truk_pengangkut_sampah'] }}</td>
                                <td align="right">{{ $item->data['satgas_kebersihan'] }}</td>
                                <td align="right">{{ $item->data['anggota_satgas_kebersihan'] }}</td>
                                <td align="right">{{ $item->data['pemulung'] }}</td>
                                <td align="right">{{ $item->data['pengelolaan_sampah'] ? 'Ada' : 'Tidak Ada' }}</td>
                                <td>{{ Modules\Prodeskel\Enums\SaranaKebersihanEnum::valueOf($item->data['sarana_kebersihan']) }}
                                <td>{{ $item->data['pengelolaan_sampah_dll'] ? 'Ada' : 'Tidak Ada' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="14">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
