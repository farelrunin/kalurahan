<style>
    table {
        font-size: 7.5pt;
        border-collapse: collapse;
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

    table.main-content>tr>td {
        border: none
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
                                        TINGKAT PERKEMBANGAN DESA DAN KELURAHAN</strong>
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
                @include('prodeskel::rekapitulasi.partial.perkembangan.perkembangan')
                @include('prodeskel::rekapitulasi.partial.perkembangan.ekonomi_masyarakat')
                @include('prodeskel::rekapitulasi.partial.perkembangan.produk_domestik')
                @include('prodeskel::rekapitulasi.partial.perkembangan.pendapatan')
                @include('prodeskel::rekapitulasi.partial.perkembangan.matapencaharian')
                @include('prodeskel::rekapitulasi.partial.perkembangan.penguasaan_asset_ekonomi')
                @include('prodeskel::rekapitulasi.partial.perkembangan.pemilikan_asset')
                @include('prodeskel::rekapitulasi.partial.perkembangan.pendidikan_masyarakat')
                @include('prodeskel::rekapitulasi.partial.perkembangan.kesehatan_masyarakat')
                @include('prodeskel::rekapitulasi.partial.perkembangan.keamanan_ketertiban')
                @include('prodeskel::rekapitulasi.partial.perkembangan.kedaulatan_politik_masyarakat')
                @include('prodeskel::rekapitulasi.partial.perkembangan.peranserta_masyarakat')
                @include('prodeskel::rekapitulasi.partial.perkembangan.pemerintahan_desa')
            </td>
            <td style="width:0.25%"></td>
        </tr>
    </tbody>
</table>
