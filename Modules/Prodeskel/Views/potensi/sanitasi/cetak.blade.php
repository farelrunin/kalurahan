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
                            <th>Sumur Serapan Air Rumah Tangga (Rumah)</th>
                            <th>MCK Umum (Unit)</th>
                            <th>Jamban Keluarga (KK)</th>
                            <th>Saluran Drainase / Saluran Pembuangan Air Limbah</th>
                            <th>Kondisi Saluran Drainase / Saluran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td align="right">{{ $item->data['sumur_resapan'] }}</td>
                                <td align="right">{{ $item->data['mck_umum'] }}</td>
                                <td align="right">{{ $item->data['jamban_keluarga'] }}</td>
                                <td>{{ $item->data['kondisi_saluran'] ? 'Ada' : 'Tidak Ada' }}</td>
                                <td>{{ Modules\Prodeskel\Enums\SanitasiEnum::valueOf($item->data['sanitasi']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
