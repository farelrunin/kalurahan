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
                <h4><u>DATA {{ strtoupper($tipe) }}</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Tanggal</th>
                            <th>Gedung Kantor</th>
                            <th>Jumlah Ruang Kerja (Ruang)</th>
                            <th>Kondisi</th>
                            <th>Balai Desa/Kelurahan/Sejenisnya</th>
                            <th>Listrik</th>
                            <th>Air Bersih</th>
                            <th>Telepon</th>
                            <th>Rumah Dinas Kepala Desa/Lurah</th>
                            <th>Rumah Dinas Perangkat</th>
                            <th>Fasilitas Lainnya</th>
                            <th>Mesin Tik (Buah)</th>
                            <th>Meja (Buah)</th>
                            <th>Kursi (Buah)</th>
                            <th>Lemari Arsip (Buah)</th>
                            <th>Komputer (Unit)</th>
                            <th>Mesin Fax (Unit)</th>
                            <th>Kendaraan Dinas (Unit)</th>
                            <th>Buku Data Peraturan Desa</th>
                            <th>Buku Keputusan Kepala Desa Lurah</th>
                            <th>Buku Administrasi Kependudukan</th>
                            <th>Buku Data Inventaris</th>
                            <th>Buku Data Aparat</th>
                            <th>Buku Data Tanah Kas Desa</th>
                            <th>Buku Administrasi Pajak dan Retribusi</th>
                            <th>Buku Data Tanah</th>
                            <th>Buku Laporan Pengaduan Masyarakat</th>
                            <th>Buku Agenda Ekspedisi</th>
                            <th>Buku Profil Desa dan Kelurahan</th>
                            <th>Buku Data Induk Penduduk</th>
                            <th>Buku Data Mutasi Penduduk</th>
                            <th>Buku Rekapitulasi Penduduk Akhir Bulan</th>
                            <th>Buku Registrasi Pelayanan Penduduk</th>
                            <th>Buku Data Penduduk Sementara</th>
                            <th>Buku Anggaran Penerimaan</th>
                            <th>Buku Anggaran Pengeluaran Pegawai Pembangunan</th>
                            <th>Buku Kas Umum</th>
                            <th>Buku Kas Pembantu Penerimaan</th>
                            <th>Buku Kas Pembantu Pengeluaran Rutin/Pembangunan</th>
                            <th>Buku Data Lembaga Kemasyarakatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['gedung_kantor']) }}</td>
                                <td align="right">{{ $item->data['jumlah_ruang_kerja_ruang'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\RusakEnum::valueOf($item->data['kondisi']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['balai_desa_kelurahan_sejenisnya']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['listrik']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['air_bersih']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['telepon']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['rumah_dinas_kepala_desa_lurah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['rumah_dinas_perangkat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['fasilitas_lainnya']) }}</td>
                                <td align="right">{{ $item->data['mesin_tik_buah'] }}</td>
                                <td align="right">{{ $item->data['meja_buah'] }}</td>
                                <td align="right">{{ $item->data['kursi_buah'] }}</td>
                                <td align="right">{{ $item->data['lemari_arsip_buah'] }}</td>
                                <td align="right">{{ $item->data['komputer_unit'] }}</td>
                                <td align="right">{{ $item->data['mesin_fax_unit'] }}</td>
                                <td align="right">{{ $item->data['kendaraan_dinas_unit'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_peraturan_desa']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_keputusan_kepala_desa_lurah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_administrasi_kependudukan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_inventaris']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_aparat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_tanah_kas_desa']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_administrasi_pajak_dan_retribusi']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_tanah']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_laporan_pengaduan_masyarakat']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_agenda_ekspedisi']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_profil_desa_dan_kelurahan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_induk_penduduk']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_mutasi_penduduk']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_rekapitulasi_penduduk_akhir_bulan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_registrasi_pelayanan_penduduk']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_penduduk_sementara']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_anggaran_penerimaan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_anggaran_pengeluaran_pegawai_pembangunan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_kas_umum']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_kas_pembantu_penerimaan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_kas_pembantu_pengeluaran_rutin_pembangunan']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_lembaga_kemasyarakatan']) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="14">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
