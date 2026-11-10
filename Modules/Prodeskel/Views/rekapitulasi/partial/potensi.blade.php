<style>
    table {
        font-size: 7.5pt;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid gray;
        border-collapse: collapse;
    }

    table.no-border td,
    table.no-border th {
        border: none;
    }

    table.main-content {
        width: 100%;
        border-collapse: collapse;
        border: 2px solid #000000
    }

    table.main-content>tbody>tr>td {
        border: none;
    }
</style>
<table class="main-content" cellpadding="2">
    <tbody>
        <tr>
            <td colspan="3">
                <table class="no-border" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr valign="top">
                            <td colspan="2" align="center">
                                <p>
                                    <strong>DAFTAR
                                        ISIAN <br>
                                        POTENSI DESA DAN KELURAHAN</strong>
                                </p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr valign="top">
                            <td style="width:28%" align="right"> Desa</td>
                            <td style="width:72%">
                                : {{ strtoupper(identitas('nama_desa')) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right"> Kecamatan</td>
                            <td>
                                : {{ strtoupper(identitas('nama_kecamatan')) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right"> Kabupaten</td>
                            <td>
                                : {{ strtoupper(identitas('nama_kabupaten')) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right"> Provinsi</td>
                            <td>
                                : {{ strtoupper(identitas('nama_propinsi')) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Bulan
                            </td>
                            <td>
                                : 1</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Tahun
                            </td>
                            <td>
                                : {{ $tahun }}</td>
                        </tr>
                        <tr valign="top">
                            <td colspan="2"></td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Nama
                                Pengisi
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['nama_pengisi']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Pekerjaan
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['pekerjaan']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Jabatan
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['jabatan']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Kepala
                                Desa / Lurah
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['nama_kepala_desa']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                SUMBER DATA YANG DIGUNAKAN <br>
                                UNTUK MENGISI PROFIL <br>DESA/KELURAHAN
                            </td>
                            <td>
                                &nbsp;</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Referensi 1
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['referensi_1']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Referensi 2
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['referensi_2']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Referensi 3
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['referensi_3']) }}</td>
                        </tr>
                        <tr valign="top">
                            <td align="right">
                                Referensi 4
                            </td>
                            <td>
                                : {{ strtoupper($data['data_umum']['referensi_4']) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>

            </td>
        </tr>
        <tr>
            <td style="width:0.25%"></td>
            <td style="width:99.5%">
                @include('prodeskel::rekapitulasi.partial.potensi.sumber_daya')
                @include('prodeskel::rekapitulasi.partial.potensi.pertanian')
                @include('prodeskel::rekapitulasi.partial.potensi.perkebunan')
                @include('prodeskel::rekapitulasi.partial.potensi.kehutanan')
                @include('prodeskel::rekapitulasi.partial.potensi.peternakan')
                @include('prodeskel::rekapitulasi.partial.potensi.perikanan')
                @include('prodeskel::rekapitulasi.partial.potensi.bahan_galian')
                @include('prodeskel::rekapitulasi.partial.potensi.sumber_daya_air')
                @include('prodeskel::rekapitulasi.partial.potensi.kualitas_udara')
                @include('prodeskel::rekapitulasi.partial.potensi.kebisingan')
                @include('prodeskel::rekapitulasi.partial.potensi.ruang_publik')
                @include('prodeskel::rekapitulasi.partial.potensi.potensi_wisata')
                @include('prodeskel::rekapitulasi.partial.potensi.sumber_daya_manusia')
                @include('prodeskel::rekapitulasi.partial.potensi.kelembagaan')
                @include('prodeskel::rekapitulasi.partial.potensi.sarana_prasarana')
            </td>
            <td style="width:0.25%"></td>
        </tr>
        <tr>
            <td colspan="3">
                <p></p>
                <table class="no-border" style="border-collapse: collapse" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                            <td valign="top"> KAB. {{ strtoupper(identitas('nama_kabupaten')) }},
                                {{ tgl_indo(date('Y-m-d')) }}<br>
                                {{ strtoupper(identitas('nama_desa')) }}<br> Kecamatan
                                {{ strtoupper(identitas('nama_kecamatan')) }}<br>
                                Kabupaten KAB. {{ strtoupper(identitas('nama_kabupaten')) }} <br> <br> <br>
                                <p> <u>{{ $kades->pamongNama }}</u><br> Kepala Desa </p>
                                <p> Tembusan :<br> 1. Camat {{ strtoupper(identitas('nama_kecamatan')) }}<br> 2. Bupati
                                    KAB.
                                    {{ strtoupper(identitas('nama_kabupaten')) }}<br> 3. Arsip </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
