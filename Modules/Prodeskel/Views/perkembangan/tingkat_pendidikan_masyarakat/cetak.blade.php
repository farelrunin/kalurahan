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
                <h4><u>DATA PENDIDIKAN MASYARAKAT<br>TINGKAT PENDIDIKAN MASYARAKAT</u></h4>
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
                            <th nowrap>Jumlah penduduk buta aksara dan huruf latin (Orang)</th>
                            <th nowrap>Jumlah penduduk usia 3-6 tahun yang masuk TK dan Kelompok Bermain Anak (Orang)</th>
                            <th nowrap>Jumlah anak dan penduduk cacat fisik dan mental (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang SD/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat SD/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk tidak tamat SD/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang SLTP/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat SLTP/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang SLTA/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk tidak tamat SLTP/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat SLTA/sederajat (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang D-1 (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat D-2 (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang D-3 (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat D-3 (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang S-1 (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat S-1 (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang S-2 (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat S-2 (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat S-3 (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang SLB A (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat SLB A (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang SLB B (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat SLB B (Orang)</th>
                            <th nowrap>Jumlah penduduk sedang SLB C (Orang)</th>
                            <th nowrap>Jumlah penduduk tamat SLB C (Orang)</th>
                            <th nowrap>Jumlah penduduk cacat fisik dan mental (Orang)</th>
                            <th nowrap>Jumlah penduduk Buta huruf (%)</th>
                            <th nowrap>Jumlah penduduk tamat SLTP/sederajat (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <th align="right">{{ $value->data['jumlah_penduduk_buta_aksara_dan_huruf_latin'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak'] }}</th>
                                <th align="right">{{ $value->data['jumlah_anak_dan_penduduk_cacat_fisik_dan_mental'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_sdsederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_sdsederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tidak_tamat_sdsederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_sltpsederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_sltpsederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_slta_sederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tidak_tamat_sltpsederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_slta_sederajat'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_d1'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_d2'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_d3'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_d3'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_s1'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_s1'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_s2'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_s2'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_s3'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_slb_a'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_slb_a'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_slb_b'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_slb_b'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_sedang_slb_c'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_slb_c'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_cacat_fisik_dan_mental'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_buta_huruf'] }}</th>
                                <th align="right">{{ $value->data['jumlah_penduduk_tamat_sltpsederajat_dua'] }}</th>
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
