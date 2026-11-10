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
                            <th nowrap>Dasar Hukum Pembentukan</th>
                            <th nowrap>Dasar Hukum Pembentukan BPD</th>
                            <th nowrap>Jumlah Aparat Pemerintahan (Orang)</th>
                            <th nowrap>Jumlah Perangkat {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th nowrap>Sekretaris {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th nowrap>Kepala Urusan/Seksi Pemerintahan</th>
                            <th nowrap>Kepala Urusan/Seksi Pembangunan</th>
                            <th nowrap>Kepala Urusan/Seksi Pemberdayaan Masyarakat</th>
                            <th nowrap>Kepala Urusan/Seksi Kesejahteraan Rakyat</th>
                            <th nowrap>Kepala Urusan/Seksi Umum</th>
                            <th nowrap>Kepala Urusan/Seksi Keuangan</th>
                            <th nowrap>Kepala Urusan/Seksi Perekonomian</th>
                            <th nowrap>Kepala Urusan/Seksi Data dan Informasi</th>
                            <th nowrap>Jumlah Staf</th>
                            <th nowrap>Jumlah {{ ucwords(setting('sebutan_dusun')) }}</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 1</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 2</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 3</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 4</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 5</th>
                            <th nowrap>Kepala {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th nowrap>Pangkat/Golongan</th>
                            <th nowrap>NIP</th>
                            <th nowrap>Pelatihan yang pernah diikuti</th>
                            <th nowrap>Jenis Kelamin</th>
                            <th nowrap>Sekretaris {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th nowrap>Nama Sekretaris {{ ucwords(setting('sebutan_desa')) }}</th>
                            <th nowrap>Pangkat/Golongan</th>
                            <th nowrap>NIP</th>
                            <th nowrap>Pelatihan yang pernah diikuti</th>
                            <th nowrap>Jenis Kelamin</th>
                            <th nowrap>Kepala Urusan/Seksi Pemerintahan</th>
                            <th nowrap>Kepala Urusan/Seksi Pembangunan</th>
                            <th nowrap>Kepala Urusan/Seksi Pemberdayaan Masyarakat</th>
                            <th nowrap>Kepala Urusan/Seksi Kesejahteraan Rakyat</th>
                            <th nowrap>Kepala Urusan/Seksi Umum</th>
                            <th nowrap>Kepala Urusan/Seksi Keuangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\DasarHukumDesaEnum::valueOf($item->data['dasar_pembentukan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\DasarHukumBpdEnum::valueOf($item->data['dasar_pembentukan_bpd']) }}
                                </td>
                                <td align="right">{{ $item->data['jumlah_aparat_pemerintah'] }}</td>
                                <td align="right">{{ $item->data['jumlah_perangkat_desa'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['kepala_desa']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['sekretaris_desa']) }}</td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_pemerintahan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_pembangunan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_pemberdayaan_masyarakat']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_kesejahteraan_rakyat']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_umum']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_keuangan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_perekonomian']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_data_informasi']) }}
                                </td>
                                <td align="right">{{ $item->data['jumlah_staff'] }}</td>
                                <td align="right">{{ $item->data['jumlah_dusun'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_1']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_2']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_3']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_4']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_5']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_desa']) }}
                                </td>
                                <td>{{ $item->data['pangkat_golongan_kades'] }}</td>
                                <td>{{ $item->data['nip_kades'] }}</td>
                                <td>{{ $item->data['pelatihan_kades'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\JenisKelaminEnum::valueOf($item->data['jenis_kelamin_kades']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_sekretaris_desa']) }}
                                </td>
                                <td>{{ $item->data['nama_sekdes'] }}</td>
                                <td>{{ $item->data['pangkat_golongan_sekdes'] }}</td>
                                <td>{{ $item->data['nip_sekdes'] }}</td>
                                <td>{{ $item->data['pelatihan_sekdes'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\JenisKelaminEnum::valueOf($item->data['jenis_kelamin_sekdes']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_pemerintahan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_pembangunan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_pemberdayaan']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_kesejahteraan_rakyat']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_umum']) }}
                                </td>
                                <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_keuangan']) }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="39">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
