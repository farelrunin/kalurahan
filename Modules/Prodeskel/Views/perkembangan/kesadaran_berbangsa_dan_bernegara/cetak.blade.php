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
                <h4><u>DATA KEDAULATAN POLITIK MASYARAKAT<br>KESADARAN BERBANGSA DAN BERNEGARA</u></h4>
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
                            <th>Jenis kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara</th>
                            <th>Jumlah kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara</th>
                            <th>Jenis-jenis kegiatan pemantapan nilai Bhinneka Tunggal Ika</th>
                            <th>Jumlah kegiatan pemantapan nilai Bhinneka Tunggal Ika</th>
                            <th>Jenis kegiatan pemantapan kesatuan bangsa lainnya</th>
                            <th>Jumlah kegiatan pemantapan kesatuan bangsa lainnya</th>
                            <th>Jumlah kasus warga desa/kelurahan yang minta suaka/lari ke luarnegeri</th>
                            <th>Jumlah warga yang melintasi perbatasan ke negara tetangga secara resmi</th>
                            <th>Jumlah warga yang melintasi perbatasan negara tetangga secara tidak resmi</th>
                            <th>Jumlah kasus pertempuran atau perlawanan antar kelompok pengacau keamanan di perbatasan negara dengan warga/aparat dari desa/kelurahan</th>
                            <th>Jumlah serangan terhadap fasilitas umum dan milik masyarakat oleh kelompok pengacau di desa/kelurahan perbatasan negara tetangga</th>
                            <th>pengacau keamanan di perbatasan negara dengan warga/aparat dari desa/kelurahan</th>
                            <th>Jumlah serangan terhadap fasilitas umum dan milik masyarakat oleh kelompok pengacau di desa/kelurahan perbatasan negara tetangga</th>
                            <th>Jumlah kasus yang diklasifikasikan merongrong keutuhan NKRI dan Kesatuan Bangsa Indonesia di desa/kelurahan tahun ini</th>
                            <th>Jumlah korban manusia baik luka maupun tewas serta korban materi lainnya akibat serangan kelompok pengacau keamanan</th>
                            <th>Jumlah masalah ketenagakerjaan di perbatasan antar negara yang terjadi tahun ini</th>
                            <th>Jumlah kasus kejahatan pencurian, penjarahan, perampokan dan intimidasi serta teror yang terjadi di desa/kelurahan perbatasan antar negara</th>
                            <th>Jumlah sengketa perbatasan antar negara yang terjadi desa/kelurahan ini</th>
                            <th>Jumlah kasus sengketa perbatasan yang terjadi baik antar desa/kelurahan dalam kecamatan maupun antar kecamatan, antar kabupaten/kota dan desa/kelurahan antar provinsi</th>
                            <th>Jumlah kasus yang terkait dengan perbatasan antar negara yang dilaporkan Kepala Desa/Lurah ke pemerintah tingkat atasnya</th>
                            <th>Jumlah kasus yang mengarah kepada tindakan disintegrasi bangsa dan pengingkaran NKRI, Pancasila, UUD 1945 dan Bhinneka Tunggal Ika yang difasilitasi penyelesaiannya oleh Kepala Desa/Lurah</th>
                            <th>Jumlah kasus penangkapan nelayan asing di wilayah perairan desa/kelurahan</th>
                            <th>Jumlah kasus penangkapan nelayan/petani/peternak/pekebun/perambah hutan asal desa/kelurahan di perairan dan daratan wilayah negara lain</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['7a2891c06625f'] }}</td>
                                <td align="right">{{ $value->data['af23bc98e4d57'] }}</td>
                                <td align="right">{{ $value->data['1b4c3d82e5f96'] }}</td>
                                <td align="right">{{ $value->data['c6a7d8e2b9f34'] }}</td>
                                <td align="right">{{ $value->data['5e4a3b2c1d8f9'] }}</td>
                                <td align="right">{{ $value->data['92c3b5e7d8f1a'] }}</td>
                                <td align="right">{{ $value->data['6b7c2d8e1f9a3'] }}</td>
                                <td align="right">{{ $value->data['3a4b5c2d8f1e9'] }}</td>
                                <td align="right">{{ $value->data['8d1e4f7c2b9a6'] }}</td>
                                <td align="right">{{ $value->data['5a2b8c3d4f1e9'] }}</td>
                                <td align="right">{{ $value->data['4b6c9d1e2f3a5'] }}</td>
                                <td align="right">{{ $value->data['d5a6b7c3e8f2'] }}</td>
                                <td align="right">{{ $value->data['6c2d3e4a5b8f'] }}</td>
                                <td align="right">{{ $value->data['1a3b4c6d8e5f'] }}</td>
                                <td align="right">{{ $value->data['9c2d4e6f8a1b'] }}</td>
                                <td align="right">{{ $value->data['5d3e4f6a7b1c'] }}</td>
                                <td align="right">{{ $value->data['2e3f4c5d6b7a'] }}</td>
                                <td align="right">{{ $value->data['1d4e5f7b8c2a'] }}</td>
                                <td align="right">{{ $value->data['a3b4c5e6f8d9'] }}</td>
                                <td align="right">{{ $value->data['4c5d7e8f2a3b'] }}</td>
                                <td align="right">{{ $value->data['b2c3d5e7f8a1'] }}</td>
                                <td align="right">{{ $value->data['1d3e5f6a7c9b'] }}</td>
                                <td align="right">{{ $value->data['9a8b2c3d4e5f'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="27">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
