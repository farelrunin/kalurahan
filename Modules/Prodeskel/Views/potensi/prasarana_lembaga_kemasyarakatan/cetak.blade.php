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
                        <tr>
                            <th colspan="2"></th>
                            <th colspan="7" class="text-center">Gedung Kantor LKD/LKK</th>
                            <th colspan="9" class="text-center">LKDM/LPM atau Sebutan Lainnya</th>
                            <th colspan="9" class="text-center">Pemberdayaan Kesejahteraan Keluarga</th>
                            <th colspan="5" class="text-center">Karang Taruna</th>
                            <th colspan="4" class="text-center">Rukun Tetangga</th>
                            <th colspan="5" class="text-center">Rukun Warga</th>
                            <th colspan="5" class="text-center">Lembaga Adat</th>
                            <th colspan="5" class="text-center">BUMDES</th>
                            <th colspan="6" class="text-center">Forum Komunikasi Kader Pemberdayaan Masyarakat</th>
                            <th colspan="2" class="text-center">Lain-Lain</th>
                        </tr>
                        <tr>
                            <th class="padat">No</th>
                            <th>Tanggal</th>
                            <th>Gedung/Kantor Lembaga Kemasyarakatan Desa/Kelurahan</th>
                            <th>Peralatan Kantor: Komputer, Fax</th>
                            <th>Mesin Tik</th>
                            <th>Kardek</th>
                            <th align="right">Buku Administrasi Lembaga (Jenis)</th>
                            <th align="right">Jumlah Meja dan Kursi</th>
                            <th>Lainnya</th>
                            <th>Memiliki Kantor Sendiri</th>
                            <th>Peralatan Kantor: Komputer, Fax</th>
                            <th>Mesin Tik</th>
                            <th>Kardek</th>
                            <th align="right">Buku Administrasi Lembaga (Jenis)</th>
                            <th align="right">Jumlah Meja dan Kursi (Unit)</th>
                            <th align="right">Buku Administrasi (Jenis)</th>
                            <th align="right">Jumlah Kegiatan (Jenis)</th>
                            <th>Lainnya</th>
                            <th>PKK</th>
                            <th>Gedung/Kantor</th>
                            <th>Peralatan Kantor/ATK/Inventaris</th>
                            <th>Kepengurusan</th>
                            <th>Buku Administrasi PKK</th>
                            <th>Kegiatan</th>
                            <th align="right">Jumlah Kegiatan</th>
                            <th>Kelengkapan Organisasi Dasawisma</th>
                            <th>Kelengkapan Organisasi Pokja</th>
                            <th>Karang Taruna</th>
                            <th>Kepengurusan</th>
                            <th>Buku Administrasi</th>
                            <th align="right">Jumlah Kegiatan</th>
                            <th>Lainnya</th>
                            <th>Rukun Tetangga</th>
                            <th>Kepengurusan</th>
                            <th align="right">Buku Administrasi (Jenis)</th>
                            <th align="right">Jumlah Kegiatan (Jenis)</th>
                            <th>RW</th>
                            <th>Kepengurusan</th>
                            <th align="right">Buku Administrasi</th>
                            <th align="right">Jumlah Kegiatan</th>
                            <th>Lainnya</th>
                            <th>Lembaga Adat</th>
                            <th>Memiliki Kantor Gedung/Menumpang</th>
                            <th>Kepengurusan</th>
                            <th align="right">Buku Administrasi (Jenis)</th>
                            <th align="right">Jumlah Kegiatan (Jenis)</th>
                            <th>Bumdes</th>
                            <th>Memiliki Kantor Gedung Menumpang</th>
                            <th>Kepengurusan</th>
                            <th align="right">Buku Administrasi (Jenis)</th>
                            <th align="right">Jumlah Kegiatan (Jenis)</th>
                            <th>Forum Komunikasi Kader Pemberdayaan Masyarakat</th>
                            <th>Kantor/Gedung/Menumpang</th>
                            <th>Kepengurusan</th>
                            <th>Buku Administrasi (Jenis)</th>
                            <th align="right">Jumlah Kegiatan (Jenis)</th>
                            <th align="right">Lainnya (Jenis)</th>
                            <th>Kantor/Gedung Organisasi Sosial Kemasyarakatan Lainnya</th>
                            <th>Kantor/Gedung Organisasi Profesi Yang Ada</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['gedung_kantor_lkd_lkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['peralatan_kantor_lkd_lkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['mesin_tik_lkd_lkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kardek_lkd_lkk']] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_lkd_lkk'] }}</td>
                                <td align="right">{{ $value->data['jml_meja_kursi_lkd_lkk'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_lkd_lkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_sendiri_lkmd_lpm']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['peralatan_kantor_lkmd_lpm']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['mesin_tik_lkmd_lkm']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kardek_lkmd_lkm']] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_lkmd_lkm'] }}</td>
                                <td align="right">{{ $value->data['jml_meja_kursi_lkmd_lkm'] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_kmd_lkm'] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_lkmd_lkm'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_lkmd_lkm']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['pkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['gedung_kantor_pkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['peralatan_kantor_atk_inventaris']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_pkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['buku_administrasi_pkk']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kegiatan_pkk']] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_pkk'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kelengkapan_organisasi_dasawisma']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kelengkapan_organisasi_pokja']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['karang_taruna']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_kt']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['buku_administrasi_kt']] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_kt'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_kt']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['rt']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_rt']] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_rt'] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_rt'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['rw']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_rw']] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_rw'] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_rw'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_rw']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lembaga_adat']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_la']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_la']] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_la'] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_la'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['bumdes']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_bumdes']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_bumdes']] }}</td>
                                <td align="right">{{ $value->data['buku_administrasi_bumdes'] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_bumdes'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['forum_komunikasi_kader_pemberdayaan_masyarakat']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_fkkm']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_fkkm']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['buku_administrasi_fkkm']] }}</td>
                                <td align="right">{{ $value->data['jml_kegiatan_fkkm'] }}</td>
                                <td align="right">{{ $value->data['lainnya_fkkm'] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya']] }}</td>
                                <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kantor_gedung_organisasi_profesi_yang_ada']] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="63">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
