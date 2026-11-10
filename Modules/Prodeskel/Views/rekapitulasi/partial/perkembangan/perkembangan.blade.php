<p> <strong>I. PERKEMBANGAN KEPENDUDUKAN</strong></p>
<table width="100%" style="border-collapse: collapse;" border="1">
    <tbody>
        <tr>
            <td colspan="3"><strong>A. Jumlah Penduduk</strong></td>
        </tr>
        <tr>
            <td style="width:50%;vertical-align:middle" rowspan="2"> <br> Jumlah</td>
            <td style="width:50%" align="center" colspan="2"> Jenis Kelamin</td>
        </tr>
        <tr>
            <td style="width:25%" align="center"> Laki-laki</td>
            <td style="width:25%" align="center"> Perempuan</td>
        </tr>
        <tr>
            <td style="width:50%"> Jumlah penduduk tahun ini</td>
            <td align="right" style="width:25%"> {{ $data['jumlah_penduduk']['lk_tahun_ini'] }} orang</td>
            <td align="right" style="width:25%"> {{ $data['jumlah_penduduk']['pr_tahun_ini'] }} orang</td>
        </tr>
        <tr>
            <td>Jumlah penduduk tahun lalu</td>
            <td align="right"> {{ $data['jumlah_penduduk']['lk_tahun_lalu'] }} orang</td>
            <td align="right"> {{ $data['jumlah_penduduk']['pr_tahun_lalu'] }} orang</td>
        </tr>
        <tr>
            <td>Persentase perkembangan</td>
            <td align="right"> {{ $data['jumlah_penduduk']['lk_perkembangan'] }}</td>
            <td align="right"> {{ $data['jumlah_penduduk']['pr_perkembangan'] }}</td>
        </tr>
    </tbody>
</table>
<div></div>
<table style="border-collapse: collapse" width="100%" border="1">
    <tbody>
        <tr>
            <td colspan="4"> <strong>B. Jumlah Keluarga</strong></td>
        </tr>
        <tr>
            <td style="width:40%"> Jumlah</td>
            <td style="width:20%" align="right"> KK Laki-laki</td>
            <td style="width:20%" align="right"> KK Perempuan</td>
            <td style="width:20%" align="right"> Jumlah Total</td>
        </tr>
        <tr>
            <td>Jumlah Kepala Keluarga tahun ini</td>
            <td align="right"> {{ $data['jumlah_keluarga']['lk_kk_tahun_ini'] }} KK</td>
            <td align="right"> {{ $data['jumlah_keluarga']['pr_kk_tahun_ini'] }} KK</td>
            <td align="right"> {{ $data['jumlah_keluarga']['total_kk_tahun_ini'] }} KK</td>
        </tr>
        <tr>
            <td>Jumlah Kepala Keluarga tahun lalu</td>
            <td align="right"> {{ $data['jumlah_keluarga']['lk_kk_tahun_lalu'] }} KK</td>
            <td align="right"> {{ $data['jumlah_keluarga']['pr_kk_tahun_lalu'] }} KK</td>
            <td align="right"> {{ $data['jumlah_keluarga']['total_kk_tahun_lalu'] }} KK</td>
        </tr>
        <tr>
            <td>Prosentase Perkembangan</td>
            <td align="right"> {{ $data['jumlah_keluarga']['lk_kk_perkembangan'] }}</td>
            <td align="right"> {{ $data['jumlah_keluarga']['pr_kk_perkembangan'] }}</td>
            <td align="right"></td>
        </tr>
    </tbody>
</table>
