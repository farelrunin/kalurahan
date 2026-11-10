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
                            <th>Jenis Pemilihan</th>
                            <th>Jumlah Wanita Yang Memiliki Hak Pilih</th>
                            <th>Jumlah Pria Yang Memiliki Hak Pilih</th>
                            <th>Jumlah Pemilih (Orang)</th>
                            <th>Jumlah Wanita Yang Memilih</th>
                            <th>Jumlah Pria Yang Memilih</th>
                            <th>Jumlah Penggunaan Hak Pilih (Orang)</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $partisipasiPolitik)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $partisipasiPolitik->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\JenisPemilihanEnum::valueOf($partisipasiPolitik->komoditas, '-') }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['wanita_hak_pilih'] }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['pria_hak_pilih'] }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['jumlah_pemilih'] }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['wanita_memilih'] }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['pria_memilih'] }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['jumlah_penggunaan_hak_pilih'] }}</td>
                                <td align="right">{{ $partisipasiPolitik->data['persentase'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="10">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
