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
                <h4><u>DATA STRUKTUR PARTISIPASI POLITIK</u></h4>
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
                            <th>penduduk yang memiliki hak pilih</th>
                            <th>penduduk yang menggunakan hak pilih pada pemilu legislatif yang lalu</th>
                            <th>perempuan dari penduduk desa/kelurahan ini yang aktif di partai politik</th>
                            <th>partai politik yang memiliki pengurus sampai di Desa/Kelurahan ini</th>
                            <th>partai politik yang mempunyai kantor di wilayah desa/kelurahan ini</th>
                            <th>penduduk yang menjadi pengurus partai politik dari desa/kelurahan</th>
                            <th>penduduk yang dipilih dalam Pemilu Legislatif yang lalu</th>
                            <th>pemilih yang menggunakan hak pilih dalam pemilihan presiden/wakil</th>

                            <th>Jumlah penduduk yang mempunyai hak pilih</th>
                            <th>Jumlah pemilih yang menggunakan hak pilih dalam pemilu Bupati/Walikota lalu</th>
                            <th>Jumlah pemilih yang menggunakan hak pilih dalam pemilu Gubenur yang lalu</th>

                            <th>Penentuan Jabatan Kepala Desa</th>
                            <th>Penentuan Sekretaris Desa</th>
                            <th>Penentuan Perangkat Desa termasuk Kepala Dusun</th>
                            <th>Masa jabatan Kepala Desa</th>
                            <th>Penentuan Jabatan Lurah dan Perangkat Kelurahan termasuk Kepala Lingkungan</th>

                            <th>Jumlah anggota BPD</th>
                            <th>Penentuan anggota BPD</th>
                            <th>Pimpinan BPD</th>
                            <th>Pemilikan kantor/ruang kerja BPD</th>
                            <th>Anggaran untuk BPD</th>
                            <th>Peraturan Desa (Perdes)</th>
                            <th>Permintaan keterangan dari Kepala Desa (Kali)</th>
                            <th>Rancangan Peraturan Desa (Buah)</th>
                            <th>Menyalurkan aspirasi masyarakat (Kali)</th>
                            <th>Menyatakan pendapat kepada Kepala Desa (Kali)</th>
                            <th>Menyampaikan usul dan pendapat kepada Kepala Desa (Kali)</th>
                            <th>Mengevaluasi efektivitas pelaksanaan APB Desa (Kali)</th>

                            <th>Keberadaan organisasi lembaga kemasyarakatan desa/kelurahan</th>
                            <th>Dasar hukum keberadaan Lembaga Kemasyarakatan Desa/LKD</th>
                            <th>Jumlah organisasi anggota lembaga kemasyarakatan desa termasuk RT, RW, PKK, LKMD/K, LPM, Karang Taruna, Bumdes,Lembaga Adat, Kelompok Tani dan lembaga lainnya sesuai ketentuan</th>
                            <th>Dasar hukum pembentukan Lembaga Kemasyarakatan Kelurahan/LKK</th>
                            <th>Jumlah organisasi anggota lembaga kemasyarakatan kelurahan</th>
                            <th>Pemilihan pengurus LKD/LKK</th>
                            <th>Pemilihan pengurus organisasi anggota LKD/LKK termasuk PKK, LPM/LKMD/K, Karang Taruna, RT, RW, Bumdes, lembaga adat, kelompok tani dan organisasi anggota LKD/LKK lainnya</th>
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
                                <td align="right">{{ $value->data['3b98d28869cf6'] }}</td>
                                <td align="right">{{ $value->data['f2a591e760a34'] }}</td>
                                <td align="right">{{ $value->data['a4e5b5d17c902'] }}</td>
                                <td align="right">{{ $value->data['6d91c7f48b530'] }}</td>
                                <td align="right">{{ $value->data['8e2f0a1d45b9d'] }}</td>
                                <td align="right">{{ $value->data['c7132b950e461'] }}</td>
                                <td align="right">{{ $value->data['5f041d36a8e7b'] }}</td>

                                <td align="right">{{ $value->data['3d35097eeba8d'] }}</td>
                                <td align="right">{{ $value->data['5f041d36a8e7a'] }}</td>
                                <td align="right">{{ $value->data['5f041d36a8e7c'] }}</td>

                                <td>{{ Modules\Prodeskel\Enums\PenentuanJabatanKepalaDesaEnum::valueOf($value->data['1008ff221d4d7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PenentuanSektretarisDesaEnum::valueOf($value->data['1008ff221d4a7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PenentuanPerangkatDesaEnum::valueOf($value->data['1008ff221d4b7']) }}</td>
                                <td align="right">{{ $value->data['1008ff221d4c7'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PenentuanJabatanLurahEnum::valueOf($value->data['1008ff221d4e7']) }}</td>

                                <td align="right">{{ $value->data['1008ff221d4f7'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PenentuanAnggotaBPDEnum::valueOf($value->data['1008ff221d4g7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PimpinanBPDEnum::valueOf($value->data['1008ff221d4h7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff221d4i7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff221d4j7']) }}</td>
                                <td align="right">{{ $value->data['b02797f4'] }}</td>
                                <td align="right">{{ $value->data['aebd4c02'] }}</td>
                                <td align="right">{{ $value->data['76cf9d8a'] }}</td>
                                <td align="right">{{ $value->data['c36f4d05'] }}</td>
                                <td align="right">{{ $value->data['da9e6fb2'] }}</td>
                                <td align="right">{{ $value->data['852cb1d3'] }}</td>
                                <td align="right">{{ $value->data['fceae1b9'] }}</td>

                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff222d4k7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DasarHukumKeberadaanLembagaEnum::valueOf($value->data['1008ff021d4l7']) }}</td>
                                <td align="right">{{ $value->data['1008ff221d47'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DasarHukumPembentukanLembagaEnum::valueOf($value->data['1008ff211d4j7']) }}</td>
                                <td align="right">{{ $value->data['1008ff221d4k7'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PemilihanPengurusEnum::valueOf($value->data['1008ff221d4l7']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PemilihanPengurusOrganisasiEnum::valueOf($value->data['1008ff221d4m7']) }}</td>
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
