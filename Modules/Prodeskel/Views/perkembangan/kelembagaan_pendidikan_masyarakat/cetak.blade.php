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
                <h4><u>DATA PENDIDIKAN MASYARAKAT<br>KELEMBAGAAN PENDIDIKAN MASYARAKAT</u></h4>
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
                            <th nowrap>Jumlah perpustakaan desa/kelurahan (Unit)</th>
                            <th nowrap>Jumlah taman bacaan desa/kelurahan (Unit)</th>
                            <th nowrap>Jumlah perpustakaan keliling (Unit)</th>
                            <th nowrap>Jumlah sanggar belajar (Unit)</th>
                            <th nowrap>Jumlah kegiatan lembaga pendidikan luar sekolah (Kegiatan)</th>
                            <th nowrap>Jumlah kelompok belajar Paket A (Kelompok)</th>
                            <th nowrap>Jumlah peserta ujian Paket A (Orang)</th>
                            <th nowrap>Jumlah kelompok belajar Paket B (Kelompok)</th>
                            <th nowrap>Jumlah peserta ujian Paket B (Orang)</th>
                            <th nowrap>Jumlah kelompok belajar Paket C (Kelompok)</th>
                            <th nowrap>Jumlah peserta ujian Paket C (Orang)</th>
                            <th nowrap>Jumlah lembaga kursus keterampilan (Unit)</th>
                            <th nowrap>Jumlah peserta kursus keterampilan (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <th align="right">{{ $value->data['jumlah_perpustakaan_desa_kelurahan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_taman_bacaan_desa_kelurahan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_perpustakaan_keliling'] }}</th>
                                <th align="right">{{ $value->data['jumlah_sanggar_belajar'] }}</th>
                                <th align="right">{{ $value->data['jumlah_kegiatan_lembaga_pendidikan_luar_sekolah'] }}</th>
                                <th align="right">{{ $value->data['jumlah_kelompok_belajar_paket_a'] }}</th>
                                <th align="right">{{ $value->data['jumlah_peserta_ujian_paket_a'] }}</th>
                                <th align="right">{{ $value->data['jumlah_kelompok_belajar_paket_b'] }}</th>
                                <th align="right">{{ $value->data['jumlah_peserta_ujian_paket_b'] }}</th>
                                <th align="right">{{ $value->data['jumlah_kelompok_belajar_paket_c'] }}</th>
                                <th align="right">{{ $value->data['jumlah_peserta_ujian_paket_c'] }}</th>
                                <th align="right">{{ $value->data['jumlah_lembaga_kursus_keterampilan'] }}</th>
                                <th align="right">{{ $value->data['jumlah_peserta_kursus_keterampilan'] }}</th>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="11">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
