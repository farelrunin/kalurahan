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
                <h4><u>DATA PERANSERTA MASYARAKAT DALAM PEMBANGUNAN<br>SEMANGAT KEGOTONGROYONGAN PENDUDUK</u></h4>
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
                            <th>Jumlah kelompok arisan</th>
                            <th>Jumlah penduduk menjadi orangtua asuh</th>
                            <th>Ada tidaknya dana sehat</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pembangunan rumah</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pengolahan tanah</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pembiayaan pendidikan anak sekolah/kuliah/kursus</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pemeliharaan fasilitas umum dan fasilitas sosial/prasarana dan sarana</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pemberian modal usaha</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pengerjaan sawah atau kebun</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam penangkapan ikan dan usaha peternakan lainnya</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam menjaga ketertiban, ketentraman dan keamanan </th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam peristiwa kematian</th>
                            <th>Ada tidaknya kegiatan gotong royong menjaga kebersihan Desa/Kelurahan</th>
                            <th>Ada tidaknya kegiatan gotong royong membangun jalan/jembatan/saluran air/irigasi</th>
                            <th>Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pemberantasan sarang nyamuk dan kesehtan lingkungan lainnya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kelompok_arisan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_penduduk_menjadi_orangtua_asuh'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_dana_sehat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pembangunan_rumah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pengolahan_tanah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pembiayaan_pendidikan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pemeliharaan_fasilitas_umum']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pemberian_modal_usaha']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pengerjaan_sawah_kebun']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_penangkapan_ikan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_jaga_ketertiban']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_peristiwa_kematian']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_jaga_kebersihan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_membangun_infrastruktur']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['ada_tidaknya_kegiatan_gotong_royong_pemberantasan_nyamuk']) }}</td>
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
