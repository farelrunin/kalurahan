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
                            <th>Panjang Saluran Primer (M)</th>
                            <th>Kondisi Rusak (M)</th>
                            <th>Panjang Saluran Sekunder (M)</th>
                            <th>Kondisi Rusak (M)</th>
                            <th>Panjang Saluran Tersier (M)</th>
                            <th>Kondisi Rusak (M)</th>
                            <th>Pintu Sadap (Unit)</th>
                            <th>Kondisi Rusak (Unit)</th>
                            <th>Pintu Pembagi Air (Unit)</th>
                            <th>Kondisi Rusak (Unit)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td align="right">{{ $item->data['panjang_saluran_primer'] }}</td>
                                <td align="right">{{ $item->data['saluran_primer_rusak'] }}</td>
                                <td align="right">{{ $item->data['panjang_saluran_sekunder'] }}</td>
                                <td align="right">{{ $item->data['saluran_sekunder_rusak'] }}</td>
                                <td align="right">{{ $item->data['panjang_saluran_tersier'] }}</td>
                                <td align="right">{{ $item->data['saluran_tersier_rusak'] }}</td>
                                <td align="right">{{ $item->data['pintu_sadap'] }}</td>
                                <td align="right">{{ $item->data['pintu_sadap_rusak'] }}</td>
                                <td align="right">{{ $item->data['pintu_pembagi_air'] }}</td>
                                <td align="right">{{ $item->data['pintu_pembagi_air_rusak'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
