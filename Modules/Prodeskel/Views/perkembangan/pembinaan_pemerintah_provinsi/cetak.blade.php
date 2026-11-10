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
                <h4><u>DATA PEMERINTAHAN DESA DAN KELURAHAN<br>PEMBINAAN PEMERINTAH PROVINSI</u></h4>
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
                            <th>Pedoman pelaksanaan tugas pembantuan dari provinsi ke desa/kelurahan</th>
                            <th>Pedoman bantuan keuangan dari provinsi</th>
                            <th>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan pemerintahan desa/kelurahan</th>
                            <th>Fasilitasi Pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</th>
                            <th>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan berskala provinsi</th>
                            <th>Kegiatan penanggulangan kemiskinan yang dibiayai APBD Provinsi yang masuk desa dan kelurahan</th>
                            <th>Kegiatan penanganan bencana yang dibiayai APBD Provinsi untuk desa dan kelurahan</th>
                            <th>Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD Provinsi di desa dan kelurahan</th>
                            <th>Kegiatan penyediaan sarana dan prasarana desa dan kelurahan yang dibiayai APBD Provinsi yang masuk desa dan kelurahan</th>
                            <th>Kegiatan pemanfaatan sumber daya alam dan pengembangan teknologi tepat guna yang dibiayai APBD Provinsi di desa dan kelurahan</th>
                            <th>Kegiatan pengembangan sosial budaya masyarakat</th>
                            <th>Pedoman pendataan dan pendayagunaan data profil desa dan kelurahan</th>
                            <th>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat masing-masing</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1005b160e3f22']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['50d9f91a97220']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['59948998e7025']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['76a507d1c90a0']) }}</td>
                                <td align="right">{{ $value->data['bea54f5e0ba2c'] }}</td>
                                <td align="right">{{ $value->data['aba260e5a36cb'] }}</td>
                                <td align="right">{{ $value->data['9b1d9204efafe'] }}</td>
                                <td align="right">{{ $value->data['a4a4fa2014f3a'] }}</td>
                                <td align="right">{{ $value->data['03019b8a5fb24'] }}</td>
                                <td align="right">{{ $value->data['fb318be147185'] }}</td>
                                <td align="right">{{ $value->data['9a8f6b01f383a'] }}</td>
                                <td align="right">{{ $value->data['1127ed873f26b'] }}</td>
                                <td align="right">{{ $value->data['1dad44d3e5c1d'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="13">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
