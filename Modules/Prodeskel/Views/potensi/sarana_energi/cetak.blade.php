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
                            <th>Listrik PLN (Unit)</th>
                            <th>Diesel Umum (Unit)</th>
                            <th>Genset Pribadi (Unit)</th>
                            <th>Lampu Minyak Tanah / Jarak / Kelapak (KK)</th>
                            <th>Kayu Bakar (KK)</th>
                            <th>Batu Bara (KK)</th>
                            <th>Tanpa Penerangan (KK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td align="right">{{ $item->data['sarana_energi'] }}</td>
                                <td align="right">{{ $item->data['diesel_umum'] }}</td>
                                <td align="right">{{ $item->data['genset_pribadi'] }}</td>
                                <td align="right">{{ $item->data['lampu_minyak'] }}</td>
                                <td align="right">{{ $item->data['kayu_bakar'] }}</td>
                                <td align="right">{{ $item->data['batu_bara'] }}</td>
                                <td align="right">{{ $item->data['tanpa_penerangan'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="9">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
