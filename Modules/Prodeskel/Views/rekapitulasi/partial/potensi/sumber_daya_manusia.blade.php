<p><strong>II. POTENSI SUMBER DAYA MANUSIA</strong></p>
<table>
    <tbody>
        <tr>
            <td colspan="2"><strong>A. JUMLAH</strong></td>
        </tr>
        <tr>
            <td>Jumlah laki-laki</td>
            <td>{{ $data['sdm_jumlah']['jumlah_laki_laki'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah perempuan</td>
            <td>{{ $data['sdm_jumlah']['jumlah_perempuan'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah total</td>
            <td>{{ $data['sdm_jumlah']['jumlah_total'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah kepala keluarga</td>
            <td>{{ $data['sdm_jumlah']['jumlah_kepala_keluarga'] }} KK</td>
        </tr>
        <tr>
            <td>Kepadatan Penduduk</td>
            <td>{{ $data['sdm_jumlah']['kepadatan_penduduk'] }} per KM</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="7"><strong>B. USIA</strong></td>
        </tr>
        <tr>
            <td><strong>Usia</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
            <td>&nbsp;</td>
            <td><strong>Usia</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @php
            $sum_pr = 0;
            $sum_lk = 0;
            foreach ($data['usia_sdm'] as $key => $value) {
                if (strpos($key, 'pr_') === 0) {
                    $sum_pr += (int) to_rupiah($value);
                } elseif (strpos($key, 'lk_') === 0) {
                    $sum_lk += (int) to_rupiah($value);
                }
            }
        @endphp
        @foreach (range(0, 38) as $umur)
            <tr>
                @if ($loop->first)
                    <td>{{ $umur }} {{ $umur == 0 ? '-12 bulan' : ' tahun' }}</td>
                @else
                    <td>{{ $umur }} {{ $umur == 1 ? ' tahun' : '' }}</td>
                @endif
                <td>{{ $data['usia_sdm']['lk_' . $umur] }} orang</td>
                <td>{{ $data['usia_sdm']['pr_' . $umur] }} orang</td>
                @if ($loop->last)
                    <td colspan="2">Total</td>
                    <td><strong>{{ $sum_lk }} orang</strong></td>
                    <td><strong>{{ $sum_pr }} orang</strong></td>
                @else
                    <td>&nbsp;</td>
                    <td>{{ $umur + 39 > 75 ? 'Lebih dari 75' : $umur + 39 }} {{ $loop->first ? ' tahun' : '' }}</td>
                    <td>{{ $data['usia_sdm']['lk_' . ($umur + 39)] }} orang</td>
                    <td>{{ $data['usia_sdm']['pr_' . ($umur + 39)] }} orang</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table> <br>

<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>C. PENDIDIKAN</strong></td>
        </tr>
        <tr>
            <td><strong>Tingkatan Pendidikan</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>

        @foreach (Modules\Prodeskel\Enums\KomoditasSdmPendidikanEnum::all() as $key => $item)
            <tr>
                <td>{{ $item }}</td>
                <td>{{ $data['tingkatan_pendidikan'][$key] ? $data['tingkatan_pendidikan'][$key]['jumlah_laki'] : 0 }} orang</td>
                <td>{{ $data['tingkatan_pendidikan'][$key] ? $data['tingkatan_pendidikan'][$key]['jumlah_pr'] : 0 }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah Total</td>
            <td colspan="2">{{ collect($data['tingkatan_pendidikan'])->sum(static fn($q) => intval(to_rupiah($q['jumlah_total']))) }} <strong>orang</strong></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>D. MATA PENCAHARIAN POKOK</strong></td>
        </tr>
        <tr>
            <td><strong>Jenis Pekerjaan</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['mata_pencaharian_pokok'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah Total Penduduk</td>
            <td colspan="2">{{ collect($data['mata_pencaharian_pokok'])->sum(static fn($q) => intval(to_rupiah($q['jumlah']))) }} <strong>orang</strong></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>E. AGAMA/ALIRAN KEPERCAYAAN</strong></td>
        </tr>
        <tr>
            <td><strong>Agama</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['agama'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah </td>
            <td><strong>{{ ribuan(collect($data['agama'])->sum(static fn($q) => intval(to_rupiah($q['laki_laki'])))) }} </strong>orang</td>
            <td><strong>{{ ribuan(collect($data['agama'])->sum(static fn($q) => intval(to_rupiah($q['perempuan'])))) }} </strong>orang</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>F. KEWARGANEGARAAN</strong></td>
        </tr>
        <tr>
            <td><strong>Kewarganegaraan</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['kewarganegaraan'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah </td>
            <td><strong>{{ ribuan(collect($data['kewarganegaraan'])->sum(static fn($q) => intval(to_rupiah($q['laki_laki'])))) }} </strong>orang</td>
            <td><strong>{{ ribuan(collect($data['kewarganegaraan'])->sum(static fn($q) => intval(to_rupiah($q['perempuan'])))) }} </strong>orang</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>G. ETNIS</strong></td>
        </tr>
        <tr>
            <td><strong>Etnis</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['etnis'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah </td>
            <td><strong>{{ ribuan(collect($data['etnis'])->sum(static fn($q) => intval(to_rupiah($q['laki_laki'])))) }} </strong>orang</td>
            <td><strong>{{ ribuan(collect($data['etnis'])->sum(static fn($q) => intval(to_rupiah($q['perempuan'])))) }} </strong>orang</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>H. CACAT MENTAL DAN FISIK</strong></td>
        </tr>
        <tr>
            <td><strong>Jenis Cacat</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['cacat_mental_dan_fisik'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah </td>
            <td><strong>{{ ribuan(collect($data['cacat_mental_dan_fisik'])->sum(static fn($q) => intval(to_rupiah($q['laki_laki'])))) }} </strong>orang</td>
            <td><strong>{{ ribuan(collect($data['cacat_mental_dan_fisik'])->sum(static fn($q) => intval(to_rupiah($q['perempuan'])))) }} </strong>orang</td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>I. TENAGA KERJA</strong></td>
        </tr>
        <tr>
            <td><strong>Tenaga Kerja</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['tenaga_kerja'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Total Jumlah</td>
            <td colspan="2"><strong>{{ ribuan(collect($data['tenaga_kerja'])->sum(static fn($q) => intval(to_rupiah($q['jumlah'])))) }} orang</strong></td>
        </tr>
    </tbody>
</table> <br>
<table>
    <tbody>
        <tr>
            <td colspan="3"><strong>J. KUALITAS ANGKATAN KERJA</strong></td>
        </tr>
        <tr>
            <td><strong>Angkatan Kerja</strong></td>
            <td><strong>Laki-laki</strong></td>
            <td><strong>Perempuan</strong></td>
        </tr>
        @foreach ($data['kualitas_angkatan_kerja'] as $key => $item)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $item['laki_laki'] }} orang</td>
                <td>{{ $item['perempuan'] }} orang</td>
            </tr>
        @endforeach
        <tr>
            <td>Jumlah </td>
            <td><strong>{{ ribuan(collect($data['kualitas_angkatan_kerja'])->sum(static fn($q) => intval(to_rupiah($q['laki_laki'])))) }} </strong>orang</td>
            <td><strong>{{ ribuan(collect($data['kualitas_angkatan_kerja'])->sum(static fn($q) => intval(to_rupiah($q['perempuan'])))) }} </strong>orang</td>
        </tr>
    </tbody>
</table>
