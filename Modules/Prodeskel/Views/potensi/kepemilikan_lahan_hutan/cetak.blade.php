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
                            <th>Milik Negara (Ha)</th>
                            <th>Milik Adat/Ulayat (Ha)</th>
                            <th>Perhutan/Instansi Sektoral (Ha)</th>
                            <th>Milik Masyarakat Perorangan (Ha)</th>
                            <th>Luas Hutan (Ha)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $lahan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lahan->data['tanggal'] }}</td>
                                <td>{{ $lahan->data['milik_negara_ha'] }}</td>
                                <td>{{ $lahan->data['milik_adat_ulayat_ha'] }}</td>
                                <td>{{ $lahan->data['perhutan_instansi_sektoral'] }}</td>
                                <td>{{ $lahan->data['milik_masyarakat_perorangan'] }}</td>
                                <td>{{ $lahan->data['jumlah_luas_hutan'] }}</td>
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
