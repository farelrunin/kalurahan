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
                <h4><u>DATA PERANSERTA MASYARAKAT DALAM PEMBANGUNAN<br>MUSRENBANG DESA/KELURAHAN</u></h4>
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
                            <th>Jumlah musyawarah perencanaan pembangunan tingkat Desa/Kelurahan yang dilakukan pada tahun ini, termasuk di tingkat dusun dan lingkungan</th>
                            <th>Jumlah kehadiran masyarakat dalam setiap kali musyawarah tingkat dusun/lingkungan dan desa/kelurahan</th>
                            <th>Jumlah peserta laki-laki dalam Musrenbang di desa/kelurahan</th>
                            <th>Jumlah peserta perempuan dalam Musrenbang di desa dan kelurahan</th>
                            <th>Jumlah Musyawarah Antar Desa dalam perencanaan pembangunan yang dikoordinasikan Kecamatan</th>
                            <th>Penggunaan Profil Desa/Kelurahan sebagai sumber data dasar yang digunakan dalam perencanaan pembangunan desa dan forum Musrenbang Partisipatif</th>
                            <th>Penggunaan data BPS dan data sektoral dalam perencanaan pembangunan partisipatif dan Musrenbang di desa dan kelurahan</th>
                            <th>Pelibatan masyarakat dalam pemutakhiran data profil desa dan kelurahan sebagai bahan dalam Musrenbang partisipatif</th>
                            <th>Usulan masyarakat yang disetujui menjadi Rencana Kerja Desa dan Kelurahan</th>
                            <th>Usulan Pemerintah Desa dan Kelurahan yang disetujui menjadi Rencana Kerja Desa/Kelurahan dan dimuat dalam RAPB-Desa</th>
                            <th>Usulan rencana kerja program dan kegiatan dari pemerintah kabupaten/kota/provinsi dan pusat yang dibahas saat Musrenbang dan disetujui untuk dilaksanakan di desa dan kelurahan oleh masyarakat dan lembaga kemasyarakatan desa/kelurahan</th>
                            <th>Penggunaan data BPS dan data sektoral dalam perencanaan pembangunan partisipatif dan Musrenbang di desa dan kelurahan</th>
                            <th>Pelibatan masyarakat dalam pemutakhiran data profil desa dan kelurahan sebagai bahan dalam Musrenbang partisipatif</th>
                            <th>Usulan masyarakat yang disetujui menjadi Rencana Kerja Desa dan Kelurahan</th>
                            <th>Usulan Pemerintah dan Kelurahan yang disetujui menjadi Rencana Kerja Desa/Kelurahan dan dimuat dalam RAPB-Desa</th>
                            <th>Usulan rencana kerja program dan kegiatan dari pemerintah kabupaten/kota/provinsi dan pusat yang dibahas saat Musrenbang dan disetujui untuk dilaksanakan di desa dan kelurahan oleh masyarakat dan lembaga kemasyarakatan desa/kelurahan</th>
                            <th>Usulan rencana kerja pemerintah tingkat atas yang ditolak dalam Musrenbangdes/kel</th>
                            <th>Pemilikan dokumen Rencana Kerja Pembangunan Desa/Kelurahan (RKPD/K)</th>
                            <th>Pemilikan Rencana Pembangunan Jangka Menengah Desa/Kelurahan (RPJMD/K)</th>
                            <th>Pemilikan dokumen hasil Musrenbang tingkat Desa dan Kelurahan yang diusulkan ke pemerintah tingkat atas untuk dibiayai dari APBD Kab/Kota, APBD Provinsi dan APBN maupun sumber biaya dari perusahaan swasta yang investasi di desa/kelurahan</th>
                            <th>Jumlah kegiatan yang diusulkan masyarakat melalui forum Musrenbangdes/kel yang tidak direalisasikan dalam APB-Desa, APB-Daerah Kabupaten/Kota dan Provinsi</th>
                            <th>Jumlah kegiatan yang diusulkan masyarakat melalui forum Musrenbangdes/kel yang pelaksanaannya tidak sesuai dengan hasil Musrenbang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['jumlah_musyawarah'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kehadiran'] }}</td>
                                <td align="right">{{ $value->data['jumlah_laki'] }}</td>
                                <td align="right">{{ $value->data['jumlah_perempuan'] }}</td>
                                <td align="right">{{ $value->data['musyawarah_desa'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['penggunaan_profil']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['penggunaan_data']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['pelibatan_masyarakat']) }}</td>
                                <td align="right">{{ $value->data['usulan_masyarakat'] }}</td>
                                <td align="right">{{ $value->data['usulan_pemerintah'] }}</td>
                                <td align="right">{{ $value->data['usulan_rencana'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['penggunaan_data_bps']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['pelibatan_masyarakat_rencana']) }}</td>
                                <td align="right">{{ $value->data['usulan_masyarakat_setuju'] }}</td>
                                <td align="right">{{ $value->data['usulan_pemerintah_setuju'] }}</td>
                                <td align="right">{{ $value->data['usulan_rencana_setuju'] }}</td>
                                <td align="right">{{ $value->data['usulan_rencana_ditolak'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pemilik_dokumen']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pemilik_rencana']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pemilik_dokumen_hasil']) }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_a'] }}</td>
                                <td align="right">{{ $value->data['jumlah_kegiatan_b'] }}</td>
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
