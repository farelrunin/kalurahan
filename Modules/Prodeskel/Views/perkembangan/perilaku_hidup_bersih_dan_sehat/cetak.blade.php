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
                <h4><u>DATA KESEHATAN MASYARAKAT<br>PERILAKU HIDUP BERSIH DAN SEHAT</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tanggal</th>
                            <th>Jumlah keluarga memiliki WC yang sehat</th>
                            <th>Jumlah keluarga memiliki WC yang kurang memenuhi standar kesehatan</th>
                            <th>Jumlah keluarga biasa buang air besar di sungai/parit/kebun/hutan</th>
                            <th>Jumlah keluarga yang menggunakan fasilitas MCK umum</th>
                            <th>Kebiasaan penduduk makan dlm sehari 1 kali</th>
                            <th>Kebiasaan penduduk makan sehari 2 kali</th>
                            <th>Kebiasaan penduduk makan sehari 3 kali</th>
                            <th>Kebiasaan penduduk makan sehari lebih dari 3 kali</th>
                            <th>Penduduk yang belum tentu sehari makan 1 kali</th>
                            <th>Dukun Terlatih</th>
                            <th>Dokter/puskesmas/mantri kesehatan/perawat/bidan/posyandu</th>
                            <th>Obat tradisional dari dukun pengobatan alternatif</th>
                            <th>Paranormal</th>
                            <th>Obat tradisional dari keluarga sendiri</th>
                            <th>Tidak diobati</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_keluarga_memiliki_wc_yang_sehat'] }}</td>
                                <td align="right">{{ $value->data['jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_dalam_sehari_1_kali']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_sehari_2_kali']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_sehari_3_kali']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['penduduk_yang_belum_tentu_sehari_makan_1_kali']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['dukun_terlatih']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['obat_tradisional_dari_dukun_pengobatan_alternatif']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['paranormal']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['obat_tradisional_dari_keluarga_sendiri']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['tidak_diobati']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="8">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
