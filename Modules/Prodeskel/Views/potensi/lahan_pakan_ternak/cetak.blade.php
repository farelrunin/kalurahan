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
                            <th>Luas Tanaman Pakan Ternak/Rumput (Ha)</th>
                            <th>Produksi Hijauan Makanan Ternak (Ton/Ha)</th>
                            <th>Dipasok Dari Luar Desa/Kelurahan (Ton)</th>
                            <th>Disubsidi Dinas (Ton)</th>
                            <th>Lainnya (Ton)</th>
                            <th>Milik Masyarakat Umum (Ha)</th>
                            <th>Milik Perusahaan Peternakan/Ranch (Ha)</th>
                            <th>Milik Perorangan (Ha)</th>
                            <th>Sewa Pakai (Ha)</th>
                            <th>Milik Pemerintah (Ha)</th>
                            <th>Milik Masyarakat Adat (Ha)</th>
                            <th>Lainnya (Ha)</th>
                            <th>Luas Lahan Gembalan (Ha)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $lahan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $lahan->data['tanggal'] }}</td>
                                <td>{{ $lahan->data['luas_tanaman_pakan_ternak'] }}</td>
                                <td>{{ $lahan->data['produksi_hijauan'] }}</td>
                                <td>{{ $lahan->data['dipasok_luar'] }}</td>
                                <td>{{ $lahan->data['disubsidi_dinas'] }}</td>
                                <td>{{ $lahan->data['ketersediaan_lainnya'] }}</td>
                                <td>{{ $lahan->data['milik_masyarakat'] }}</td>
                                <td>{{ $lahan->data['milik_perusahaan'] }}</td>
                                <td>{{ $lahan->data['milik_perorangan'] }}</td>
                                <td>{{ $lahan->data['sewa_pakai'] }}</td>
                                <td>{{ $lahan->data['milik_pemerintah'] }}</td>
                                <td>{{ $lahan->data['milik_adat'] }}</td>
                                <td>{{ $lahan->data['milik_lainnya'] }}</td>
                                <td>{{ $lahan->data['luas_lahan_gembalan'] }}</td>
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
