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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN KONFLIK SARA</u></h4>
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
                            <th>Kasus konflik pada tahun ini</th>
                            <th>Kasus konflik SARA pada tahun ini</th>
                            <th>Jumlah kasus pertengkaran dan atau perkelahian antar tetangga</th>
                            <th>Jumlah kasus pertengkaran dan atau perkelahian antar RT/RW</th>
                            <th>Jumlah konflik antar masyarakat pendatang dengan penduduk asli</th>
                            <th>Jumlah kasus antar kelompok masyarakat dalam desa/kelurahan dengan kelompok masyarakat dari desa/kelurahan lain</th>
                            <th>Jumlah konflik antara masyarakat dengan pemerintah</th>
                            <th>Jumlah kerugian material akibat konflik antara masyarakat dan pemerintah</th>
                            <th>Jumlah korban jiwa akibat konflik antara masyarakat dengan pemerintah</th>
                            <th>Jumlah konflik antara masyarakat dengan perusahaan</th>
                            <th>Jumlah korban jiwa akibat konflik antara masyarakat dengan perusahaan</th>
                            <th>Jumlah kerugian material akibat konflik antara masyarakat dan perusahaan</th>
                            <th>Jumlah konflik politik antara masyarakat dengan lembaga politik</th>
                            <th>Jumlah korban jiwa akibat konflik politik antara masyarakat dengan lembaga politik</th>
                            <th>Jumlah kerugian material akibat konflik politik antara masyarakat dengan lembaga politik</th>
                            <th>Jumlah prasaranan dan sarana yang rusak/terbakar akibat konflik Sara</th>
                            <th>Jumlah rumah penduduk yang rusak/terbakar akibat konflik Sara</th>
                            <th>Jumlah korban luka akibat konflik Sara</th>
                            <th>Jumlah korban meninggal akibat konflik Sara</th>
                            <th>Jumlah janda akibat konflik Sara</th>
                            <th>Jumlah anak yatim akibat konflik Sara</th>
                            <th>Jumlah pelaku konflik yang diadili atau diproses secara hukum</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['konflik_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['konflik_sara_tahun_ini'] }}</td>
                                <td align="right">{{ $value->data['kasus_antar_tetangga'] }}</td>
                                <td align="right">{{ $value->data['kasus_antar_rt'] }}</td>
                                <td align="right">{{ $value->data['konflik_masyarakat_penduduk'] }}</td>
                                <td align="right">{{ $value->data['kasus_kelompok_masyarakat'] }}</td>
                                <td align="right">{{ $value->data['konflik_masyarakat_pemerintah'] }}</td>
                                <td align="right">{{ $value->data['kerugian_masyarakat_pemerintah'] }}</td>
                                <td align="right">{{ $value->data['korban_masyarakat_pemerintah'] }}</td>
                                <td align="right">{{ $value->data['konflik_masyarakat_perusahaan'] }}</td>
                                <td align="right">{{ $value->data['korban_masyarakat_perusahaan'] }}</td>
                                <td align="right">{{ $value->data['kerugian_masyarakat_perusahaan'] }}</td>
                                <td align="right">{{ $value->data['konflik_masyarakat_politik'] }}</td>
                                <td align="right">{{ $value->data['korban_masyarakat_politik'] }}</td>
                                <td align="right">{{ $value->data['kerugian_masyarakat_politik'] }}</td>
                                <td align="right">{{ $value->data['sarpras_rusak'] }}</td>
                                <td align="right">{{ $value->data['rumah_terbakar'] }}</td>
                                <td align="right">{{ $value->data['korban_luka'] }}</td>
                                <td align="right">{{ $value->data['korban_meninggal'] }}</td>
                                <td align="right">{{ $value->data['janda'] }}</td>
                                <td align="right">{{ $value->data['anak_yatim'] }}</td>
                                <td align="right">{{ $value->data['pelaku'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="26">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
