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
                <h4><u>DATA PEMERINTAHAN DESA DAN KELURAHAN<br>PERTANGGUNGJAWABAN KEPALA DESA/LURAH</u></h4>
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
                            <th>Penyampaian laporan keterangan pertanggunganjawab Kepala Desa kepada BPD</th>
                            <th>Jumlah informasi yang disampaikan kepala desa dan lurah tentang laporan penyelenggaraan tugas, wewenang, hak dan kewajiban kepala desa dan lurah kepada masyarakat</th>
                            <th>Status laporan keterangan pertanggungjawaban kepala Desa</th>
                            <th>Laporan kinerja penyelenggaraan tugas, wewenang, kewajiban dan hak kepala desa dan lurah kepada Bupati/Walikota</th>
                            <th>Jumlah jenis media informasi kinerja kepala desa dan lurah kepada masyarakat</th>
                            <th>Jumlah kasus pengaduan masyarakat terhadap masalah pembangunan, pelayanan dan pembinaan kemasyarakatan yang disampaikan kepada kepala desa/lurah</th>
                            <th>Jumlah kasus pengaduan masyarakat terhadap masalah pembangunan, pelayanan dan pembinaan kemasyarakatan yang diselesaikan kepala desa/lurah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff221d4d7']) }}</td>
                                <td align="right">{{ $value->data['abda02914eb96'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TerimaTolakEnum::valueOf($value->data['a1d8c8f48d313']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\TerimaRevisiEnum::valueOf($value->data['598e4d0f9e4d5']) }}</td>
                                <td align="right">{{ $value->data['de7ff7a974539'] }}</td>
                                <td align="right">{{ $value->data['77288087cd133'] }}</td>
                                <td align="right">{{ $value->data['f6920f31228ac'] }}</td>
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
