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
                <h4><u>DATA PENGUASAAN ASET EKONOMI MASYARAKAT<br>SARANA PRODUKSI</u></h4>
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
                            <th>Memiliki penggilingan padi (Orang)</th>
                            <th>Memiliki traktor (Orang)</th>
                            <th>Memiliki pabrik pengolahan hasil pertanian (Orang)</th>
                            <th>Memiliki kapal penangkap ikan (Orang)</th>
                            <th>Memiliki alat pengolahan hasil perikanan (Orang)</th>
                            <th>Memiliki alat pengolahan hasil peternakan (Orang)</th>
                            <th>Memiliki alat pengolahan hasil perkebunan (Orang)</th>
                            <th>Memiliki alat pengolahan hasil hutan (Orang)</th>
                            <th>Memiliki alat produksi dan pengolah hasil pertambangan (Orang)</th>
                            <th>Memiliki alat produksi dan pengolah hasil pariwisata (Orang)</th>
                            <th>Memiliki alat produksi dan pengolah hasil industri jasa Perdagangan (Orang)</th>
                            <th>Memiliki alat produksi dan pengolah hasil Industri kerajinan keluarga skala kecil dan menengah (Orang)</th>
                            <th>Memiliki alat produksi dan pengolahan hasil industri Migas (Orang)</th>
                            <th>Jumlah (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['penggilingan_padi'] }}</td>
                                <td align="right">{{ $value->data['traktor'] }}</td>
                                <td align="right">{{ $value->data['pabrik_pengolahan_pertanian'] }}</td>
                                <td align="right">{{ $value->data['kapal_penangkap_ikan'] }}</td>
                                <td align="right">{{ $value->data['alat_pengolahan_hasil_perikanan'] }}</td>
                                <td align="right">{{ $value->data['alat_pengolahan_hasil_peternakan'] }}</td>
                                <td align="right">{{ $value->data['alat_pengolahan_hasil_perkebunan'] }}</td>
                                <td align="right">{{ $value->data['alat_pengolahan_hasil_hutan'] }}</td>
                                <td align="right">{{ $value->data['alat_produksi_pengolah_hasil_tambang'] }}</td>
                                <td align="right">{{ $value->data['alat_produksi_pengolah_hasil_pariwisata'] }}</td>
                                <td align="right">{{ $value->data['alat_produksi_pengolah_hasil_industri_jasa_perdagangan'] }}</td>
                                <td align="right">{{ $value->data['alat_produksi_pengolah_hasil_industri_kerajinan'] }}</td>
                                <td align="right">{{ $value->data['alat_produksi_pengolah_hasil_industri_migas'] }}</td>
                                <td align="right">{{ $value->data['jumlah'] }}</td>
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
