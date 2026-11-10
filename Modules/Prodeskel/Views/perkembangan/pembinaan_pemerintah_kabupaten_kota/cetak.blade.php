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
                <h4><u>DATA PEMERINTAHAN DESA DAN KELURAHAN<br>PEMBINAAN PEMERINTAH KABUPATEN/KOTA</u></h4>
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
                            <th>Pelimpahan tugas Bupati/Walikota kepada Lurah dan Kepala Desa</th>
                            <th>Penetapan pengaturan kewenangan kabupaten/kota yang diserahkan pengaturannya kepada desa</th>
                            <th>Pedoman pelaksanaan tugas pembantuan dari kabupaten/kota kepada desa</th>
                            <th>Pedoman teknis penyusunan peraturan desa, peraturan kepala desa, keputusan Lurah dan peraturan daerah kepada kepala desa dan lurah</th>
                            <th>Pedoman teknis penyusunan perencanaan pembangunan partisipatif serta pengembangan lembaga kemasyarakatan desa dan kelurahan</th>
                            <th>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan pemerintahan desa/kelurahan</th>
                            <th>Penetapan pembiayaan alokasi dana perimbangan untuk desa</th>
                            <th>Fasilitasi Pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</th>
                            <th>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan berskala kabupaten/kota</th>
                            <th>Kegiatan penanggulangan kemiskinan yang dibiayai APBD kabupaten/kota yang masuk desa dan kelurahan</th>
                            <th>Kegiatan penanganan bencana yang dibiayai APBD kabupaten/kota untuk desa dan kelurahan</th>
                            <th>Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD kabupaten/kota di desa dan kelurahan</th>
                            <th>Fasilitasi penetapan pedoman dan standar tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa, Lurah, Perangkat Desa/Kelurahan dan BPD</th>
                            <th>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan pemerintahan desa/kelurahan</th>
                            <th>Pedoman pendataan dan pendayagunaan profil desa dan kelurahan</th>
                            <th>Program dan kegiatan pemeliharaan motivasi desa/kelurahan berprestasi pascaperlombaan desa dan kelurahan</th>
                            <th>Pemberian penghargaan atas prestasi yang dicapai pemerintahan desa dan kelurahan dalam penyelenggaraan pemerintahan dan pemberdayaan lembaga kemasyarakatan</th>
                            <th>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing</th>
                            <th>Mengawasi pengelolaan keuangan desa serta anggaran kelurahan dan pendayagunaan aset pemerintahan desa, badan usaha milik desa dan sumber pendapatan daerah yang dikelola lurah</th>
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
                                <td align="right">{{ $value->data['h6e5fbc3d9a2d'] }}</td>
                                <td align="right">{{ $value->data['i4f3b91e8d2c7'] }}</td>
                                <td align="right">{{ $value->data['j2a9bd1f6c8e5'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="22">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
