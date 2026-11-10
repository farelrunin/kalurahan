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
                <h4><u>DATA PEMERINTAHAN DESA DAN KELURAHAN<br>PEMBINAAN PEMERINTAH PUSAT</u></h4>
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
                            <th>Pedoman dan standar pelaksanaan urusan pemerintahan desa, kelurahan, lembaga kemasyarakatan</th>
                            <th>Pedoman dan standar bantuan pembiayaan dari pemerintah, pemerintah provinsi dan kabupaten/kota kepada desa dan kelurahan</th>
                            <th>Pedoman umum administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</th>
                            <th>Pedoman dan standar tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa, Lurah dan Perangkat Desa/Kelurahan serta BPD</th>
                            <th>Pedoman pendidikan dan pelatihan bagi pemerintahan desa, kelurahan, lembaga kemasyarakatan dan perangkat masing-masing</th>
                            <th>Jumlah bimbingan, supervisi dan konsultasi pelaksanaan pemerintahan desa dan kelurahan serta pemberdayaan lembaga kemasyarakatan</th>
                            <th>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa dan kelurahan</th>
                            <th>Penelitian dan pengkajian penyelenggaraan pemerintahan desa dan kelurahan</th>
                            <th>Jumlah kegiatan yang terkait dengan upaya percepatan atau akselerasi pembangunan desa dan kelurahan dalam bidang ekonomi keluarga, penanganan bencana, penanggulangan kemiskinan, percepatan keberdayaan masyarakat, peningkatan prasarana dan sarana pedesaan/kelurahan,
                                pemanfaatan sumber daya alam dan teknologi tepat guna, pengembangan sosial budaya masyarakat di desa dan kelurahan yang dibiayai APBN</th>
                            <th>Pemberian penghargaan atas prestasi yang dilaksanakan pemerintahan desa dan kelurahan dalam penyelenggaraan pemerintahan dan lembaga kemasyarakatan</th>
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
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desakelurahan_lembaga_kemasyarakatan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkat_desa_kelurahan_serta_bpd']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing']) }}</td>
                                <td align="right">{{ $value->data['jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] }}</td>
                                <td align="right">{{ $value->data['penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] }}</td>
                                <td align="right">
                                    {{ $value->data['jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn'] }}
                                </td>
                                <td align="right">{{ $value->data['pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'] }}</td>
                                <td align="right">{{ $value->data['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="15">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
