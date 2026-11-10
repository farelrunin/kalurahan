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
                <h4><u>DATA KESEHATAN MASYARAKAT<br>PERKEMBANGAN SARANA DAN PRASARANA</u></h4>
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
                            <th>Jumlah MCK Umum (Unit)</th>
                            <th>Jumlah Posyandu (Unit)</th>
                            <th>Jumlah Kader Posyandu Aktif (Orang)</th>
                            <th>Jumlah Pembina Posyandu (Orang)</th>
                            <th>Jumlah Dasawisma</th>
                            <th>Jumlah Pengurus Dasa Wisma Aktif (Orang)</th>
                            <th>Jumlah Kader Bina Keluarga Balita Aktif (Orang)</th>
                            <th>Jumlah Petugas Lapangan Keluarga Berencana Aktif (Orang)</th>
                            <th>Buku Rencana Kegiatan Posyandu *</th>
                            <th>Buku Data Pengunjung Posyandu *</th>
                            <th>Buku Kegiatan Pelayanan Posyandu *</th>
                            <th>Buku Administrasi Posyandu Lainnya (Jenis)</th>
                            <th>Jumlah Kegiatan Posyandu (Jenis)</th>
                            <th>Jumlah Kader Kesehatan Lainnya (Orang)</th>
                            <th>Jumlah Kegiatan Pengobatan Gratis (Jenis)</th>
                            <th>Jumlah Kegiatan Pemberantasan Sarang Nyamuk/PSN (Jenis)</th>
                            <th>Jumlah Kegiatan Pembersihan Lingkungan (Jenis)</th>
                            <th>Kegiatan Lainnya (Jenis)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_mck_umum'] }}</td>
                                <td align="right">{{ $value->data['jumlah_posyandu'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kader_posyandu_aktif'] }}</td>
                                <td align="right">{{ $value->data['jumlah_pembina_posyandu'] }}</td>
                                <td align="right">{{ $value->data['jumlah_dasawisma'] }}</td>
                                <td align="right">{{ $value->data['jumlah_pengurus_dasa_wisma_aktif'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kader_bina_keluarga_balita_aktif'] }}</td>
                                <td align="right">{{ $value->data['jumlah_petugas_lapangan_keluarga_berencana_aktif'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DiisiEnum::valueOf($value->data['buku_rencana_kegiatan_posyandu']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DiisiEnum::valueOf($value->data['buku_data_pengunjung_posyandu']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DiisiEnum::valueOf($value->data['buku_kegiatan_pelayanan_posyandu']) }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_posyandu_lainnya'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_posyandu_jenis'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kader_kesehatan_lainnya'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_pengobatan_gratis_jenis'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_pembersihan_lingkungan_jenis'] }}</td>
                                <td align="right">{{ $value->data['kegiatan_lainnya_jenis'] }}</td>
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
