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
                <h4><u>DATA STRUKTUR MATA PENCAHARIAN MENURUT PASANGAN USIA SUBUR DAN KB</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr>
                            <th rowspan="2" class="padat">No</th>
                            <th rowspan="2" class="padat" style="min-width: 120px">Aksi</th>
                            <th rowspan="2">Bulan</th>
                            <th rowspan="2">Tahun</th>
                            <th rowspan="2">Tanggal</th>
                            <th colspan="4" align="center">Pasangan Usia Subur</th>
                            <th colspan="11" align="center">Keluarga Berencana</th>
                        </tr>
                        <tr>
                            <th>Jumlah remaja putri usia 12 - 17 tahun</th>
                            <th>Jumlah perempuan usia subur 15-49 tahun</th>
                            <th>Jumlah wanita kawin muda usia kurang dari 16 tahun</th>
                            <th>Jumlah pasangan usia subur (Pasangan)</th>
                            <th>Jumlah pengguna alat kontrasepsi suntik</th>
                            <th>Jumlah pengguna metode kontrasepsi spiral</th>
                            <th>Jumlah pengguna alat kontrasepsi kondom</th>
                            <th>Jumlah pengguna metode kontrasepsi pil</th>
                            <th>Jumlah pengguna metode vasektomi</th>
                            <th>Jumlah pengguna metode kontrasepsi tubektomi</th>
                            <th>Jumlah pengguna metode KB Kelender/KB Alamiah</th>
                            <th>Jumlah pengguna metode KB obat tradisional</th>
                            <th>Jumlah pengguna alat kontrasepsi metode lainnya</th>
                            <th>Jumlah Akseptor KB</th>
                            <th>Jumlah PUS yang tidak menggunakan metode KB</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['remaja_putri_usia_12_17_tahun'] }}</td>
                                <td align="right">{{ $value->data['perempuan_usia_subur_15_49_tahun'] }}</td>
                                <td align="right">{{ $value->data['wanita_kawin_muda_usia_kurang_dari_16_tahun'] }}</td>
                                <td align="right">{{ $value->data['pasangan_usia_subur_pasangan'] }}</td>
                                <td align="right">{{ $value->data['pengguna_alat_kontrasepsi_suntik'] }}</td>
                                <td align="right">{{ $value->data['pengguna_metode_kontrasepsi_spiral'] }}</td>
                                <td align="right">{{ $value->data['pengguna_alat_kontrasepsi_kondom'] }}</td>
                                <td align="right">{{ $value->data['pengguna_metode_kontrasepsi_pil'] }}</td>
                                <td align="right">{{ $value->data['pengguna_metode_vasektomi'] }}</td>
                                <td align="right">{{ $value->data['pengguna_metode_kontrasepsi_tubektomi'] }}</td>
                                <td align="right">{{ $value->data['pengguna_metode_kb_kelender_kb_alamiah'] }}</td>
                                <td align="right">{{ $value->data['pengguna_metode_kb_obat_tradisional'] }}</td>
                                <td align="right">{{ $value->data['pengguna_alat_kontrasepsi_metode_lainnya'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kb'] }}</td>
                                <td align="right">{{ $value->data['jumlah_pus'] }}</td>
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
