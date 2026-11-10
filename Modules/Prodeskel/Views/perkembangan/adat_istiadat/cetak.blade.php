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
                <h4><u>DATA PERANSERTA MASYARAKAT DALAM PEMBANGUNAN<br>ADAT ISTIADAT</u></h4>
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
                            <th>Tanggal</th>
                            <th>Adat istiadat dalam perkawinan</th>
                            <th>Adat istiadat dalam kelahiran anak</th>
                            <th>Adat istiadat dalam upacara kematian</th>
                            <th>Adat istiadat dalam pengelolaan hutan</th>
                            <th>Adat istiadat dalam tanah pertanian</th>
                            <th>Adat istiadat dalam pengelolaan laut/pantai</th>
                            <th>Adat istiadat dalam memecahkan konflik warga</th>
                            <th>Adat istiadat dalam menjauhkan bala penyakit dan bencana alam</th>
                            <th>Adat istiadat dalam memulihkan hubungan antara alam semesta dengan manusia dan lingkungannya</th>
                            <th>Adat istiadat dalam penanggulangan kemiskinan bagi keluarga tidak mampu/fakir miskin/terlantar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_perkawinan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_kelahiran_anak']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_upacara_kematian']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_pengelolaan_hutan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_tanah_pertanian']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_pengelolaan_laut_pantai']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_memecahkan_konflik_warga']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar']) }}</td>

                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="10">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
