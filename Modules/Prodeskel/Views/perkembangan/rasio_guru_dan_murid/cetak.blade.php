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
                <h4><u>DATA PENDIDIKAN MASYARAKAT<br>RASIO GURU DAN MURID</u></h4>
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
                            <th nowrap>Jumlah guru TK dan kelompok bermain anak (Orang)</th>
                            <th nowrap>Jumlah siswa TK dan kelompok bermain anak (Orang)</th>
                            <th nowrap>Jumlah guru SD dan sederajat (Orang)</th>
                            <th nowrap>Jumlah siswa SD dan sederajat (Orang)</th>
                            <th nowrap>Jumlah guru SLTP dan sederajat (Orang)</th>
                            <th nowrap>Jumlah siswa SLTP dan sederajat (Orang)</th>
                            <th nowrap>Jumlah guru SLTA/sederajat (Orang)</th>
                            <th nowrap>Jumlah siswa SLTA/sederajat (Orang)</th>
                            <th nowrap>Jumlah siswa SLB (Orang)</th>
                            <th nowrap>Jumlah guru SLB (Orang)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <th align="right">{{ $value->data['guru_tk'] }}</th>
                                <th align="right">{{ $value->data['siswa_tk'] }}</th>
                                <th align="right">{{ $value->data['guru_sd'] }}</th>
                                <th align="right">{{ $value->data['siswa_sd'] }}</th>
                                <th align="right">{{ $value->data['guru_sltp'] }}</th>
                                <th align="right">{{ $value->data['siswa_sltp'] }}</th>
                                <th align="right">{{ $value->data['guru_slta'] }}</th>
                                <th align="right">{{ $value->data['siswa_slta'] }}</th>
                                <th align="right">{{ $value->data['siswa_slb'] }}</th>
                                <th align="right">{{ $value->data['guru_slb'] }}</th>
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
