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
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tahun Pembentukan</th>
                            <th>Luas Desa (Ha)</th>
                            <th>Nama Kepala Desa/Lurah</th>
                            <th>Desa/Kelurahan Sebelah Utara</th>
                            <th>Desa/Kelurahan Sebelah Selatan</th>
                            <th>Desa/Kelurahan Sebelah Timur</th>
                            <th>Desa/Kelurahan Sebelah Barat</th>
                            <th>Penetapan Batas</th>
                            <th>Dasar Hukum Perdes No.</th>
                            <th>Dasar Hukum Perda No.</th>
                            <th>Peta Wilayah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $batas)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $batas->bulan }}</td>
                                <td>{{ $batas->tahun }}</td>
                                <td>{{ $batas->data['tahun_pembentukan'] ?? '' }}</td>
                                <td>{{ ribuan((int) $batas->data['luas_desa'] ?? 0) }}</td>
                                <td>{{ $batas->data['nama_kepala_desa'] ?? '' }}</td>
                                <td>{{ $batas->data['batas_desa_utara'] ?? '' }}</td>
                                <td>{{ $batas->data['batas_desa_selatan'] ?? '' }}</td>
                                <td>{{ $batas->data['batas_desa_timur'] ?? '' }}</td>
                                <td>{{ $batas->data['batas_desa_barat'] ?? '' }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$batas->data['penetapan_batas'] ?? 0] }}</td>
                                <td>{{ $batas->data['dasar_hukum_perdes'] ?? '' }}</td>
                                <td>{{ $batas->data['dasar_hukum_perda'] ?? '' }}</td>
                                <td>{{ App\Enums\StatusEnum::all()[$batas->data['peta_wilayah'] ?? 0] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="16">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
