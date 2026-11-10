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
                <h4><u>DATA PEMERINTAHAN DESA DAN KELURAHAN<br>PEMBINAAN DAN PENGAWASAN CAMAT</u></h4>
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
                            <th>Jumlah Kegiatan fasilitasi penyusunan peraturan desa dan peraturan kepala desa</th>
                            <th>Jumlah Kegiatan fasilitasi administrasi tata pemerintahan desa dan kelurahan</th>
                            <th>Fasilitasi pengelolaan keuangan desa dan pendayagunaan aset desa serta anggaran kelurahan</th>
                            <th>Jumlah kegiatan fasilitasi pelaksanaan urusan otonomi daerah kabupaten/kota yang diserahkan kepada desa</th>
                            <th>Fasilitasi penerapan dan penegakan peraturan perundang-undangan</th>
                            <th>Fasilitasi penyediaan data dan pendayagunaan data profil desa dan kelurahan</th>
                            <th>Jumlah kegiatan fasilitasi pelaksanaan tugas, wewenang, fungsi, hak dan kewajiban kepala desa, BPD, Lurah dan lembaga kemasyarakatan</th>
                            <th>Jumlah kegiatan fasilitasi upaya penyelenggaraan ketenteraman dan ketertiban umum</th>
                            <th>Fasilitasi penataan, penguatan dan efektivitas pelaksanaan tugas, fungsi dan kewajiban lembaga kemasyarakatan desa dan kelurahan</th>
                            <th>Jumlah kegiatan fasilitasi partisipasi masyarakat dalam perencanaan, pelaksanaan, pemanfaatan dan pemeliharaan serta pengembangan dan pelestarian hasil pembangunan.</th>
                            <th>Fasilitasi kerjasama antar desa/kelurahan dan kerjasama desa/kelurahan dengan pihak ketiga</th>
                            <th>Jumlah kegiatan fasilitasi pelaksanaan program dankegiatan pemberdayaan masyarakat</th>
                            <th>Jumlah kegiatan pemeliharaan motivasi bagi desa dan kelurahan juara perlombaan dan pasca perlombaan</th>
                            <th>Jumlah kegiatan fasilitasi kerjasama antar lembaga kemasyarakatan dan lembaga kemasyarakatan dengan organisasi anggota lembaga kemasyarakatan serta dengan pihak ketiga sebagai mitra percepatan keberdayaan masyarakat</th>
                            <th>Jumlah kegiatan fasilitasi bantuan teknis dan pendampingan kepada lembaga kemasyarakatan dan organisasi anggotanya</th>
                            <th>Jumlah kegiatan koordinasi unit kerja pemerintahan dalam pengembangan lembaga kemasyarakatan desa/kelurahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['1dad44d3e5c1d'] }}</td>
                                <td align="right">{{ $value->data['2e98a743fbc2e'] }}</td>
                                <td align="right">{{ $value->data['3c7b01a5de8f3'] }}</td>
                                <td align="right">{{ $value->data['4f6e32b4a91d2'] }}</td>
                                <td align="right">{{ $value->data['543df8c2e7a5b'] }}</td>
                                <td align="right">{{ $value->data['6a2bc957d3e4f'] }}</td>
                                <td align="right">{{ $value->data['7f9a81e632bd1'] }}</td>
                                <td align="right">{{ $value->data['8954c3de1ab2e'] }}</td>
                                <td align="right">{{ $value->data['9d7c5e1a3b2f4'] }}</td>
                                <td align="right">{{ $value->data['a4fb92c6e5d1a'] }}</td>
                                <td align="right">{{ $value->data['b8dc4f63e2a1d'] }}</td>
                                <td align="right">{{ $value->data['c7eab19d3f2a4'] }}</td>
                                <td align="right">{{ $value->data['d3bfc6a9e2d4f'] }}</td>
                                <td align="right">{{ $value->data['e5ac9f2d3b1e4'] }}</td>
                                <td align="right">{{ $value->data['f1c32d9ea5b7d'] }}</td>
                                <td align="right">{{ $value->data['g8b9a23f1c6d5'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="20">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
