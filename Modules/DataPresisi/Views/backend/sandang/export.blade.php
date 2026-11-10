<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Data Rumah Tangga</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{ asset('css/report.css') }}" rel="stylesheet" type="text/css">
    <!-- TODO: Pindahkan ke external css -->
    <style>
        td,
        th {
            mso-number-format: "\@";
        }
    </style>
</head>

<body>
    <div id="container">
        <!-- Print Body -->
        <div id="body">
            <div class="header" align="center">
                <label align="left">{{ get_identitas() }}</label>
                <h3> Data Presisi Sandang </h3>
            </div>
            <br>
            <table class="border thick">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Status<br>Kelengkapan</th>
                        <th rowspan="2">No. RTM</th>
                        <th colspan="2">Kepala RTM</th>
                        <th rowspan="2">NIK</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">{{ ucwords(setting('sebutan_dusun')) }}</th>
                        <th rowspan="2">RW</th>
                        <th rowspan="2">RT</th>
                        <th rowspan="2">Jml Pakaian Yang Dimiliki</th>
                        <th rowspan="2">Frekwensi Beli Pakaian Pertahun</th>
                        <th rowspan="2">Jenis Pakaian</th>
                        <th rowspan="2">Frekwensi Ganti Pakaian</th>
                        <th rowspan="2">Tmpt Cuci Pakaian</th>
                        <th rowspan="2">Jml Pakaian Seragam</th>
                        <th rowspan="2">Jml Pakaian Sembahyang</th>
                        <th rowspan="2">Jml Pakaian Kerja</th>
                        <th rowspan="2">Tanggal<br>Pengisian</th>
                        <th rowspan="2">Tanggal<br>Terdaftar</th>
                    </tr>

                    <tr>
                        <th>NIK</th>
                        <th nowrap>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($main as $key => $data)
                        <tr>
                            <td class="text-center" width="2">{{ $key + 1 }}</td>
                            <td>{{ $data->tanggal_pengisian ? 'Sudah Isi' : 'Belum Isi' }}</td>
                            <td>{{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::valueOf($data->status_kelengkapan ?? 0) }}</td>
                            <td>{{ $data->rtm->no_kk }}</td>
                            <td>{{ $privasi_nik ? sensor_nik_kk($data->rtm->kepalaKeluarga->nik) : $data->rtm->kepalaKeluarga->nik }}</td>
                            <td>{{ strtoupper($data->rtm->kepalaKeluarga->nama) }}</td>
                            <td>{{ $privasi_nik ? sensor_nik_kk($data->penduduk->nik) : $data->penduduk->nik }}</td>
                            <td>{{ strtoupper($data->penduduk->nama) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->alamat_wilayah) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->dusun) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->rw) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->rt) }}</td>
                            <td>{{ $data->jml_pakaian_yg_dimiliki }} </td>
                            <td>{{ $data->frekwensi_beli_pakaian_pertahun }} </td>
                            <td>{{ $data->jenis_pakaian }} </td>
                            <td>{{ $data->frekwensi_ganti_pakaian }} </td>
                            <td>{{ $data->tmpt_cuci_pakaian }} </td>
                            <td>{{ $data->jml_pakaian_seragam }} </td>
                            <td>{{ $data->jml_pakaian_sembahyang }} </td>
                            <td>{{ $data->jml_pakaian_kerja }} </td>
                            <td>{{ tgl_indo($data->tanggal_pengisian) }}</td>
                            <td>{{ tgl_indo($data->rtm->tgl_daftar) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <label>Tanggal cetak : &nbsp; </label>
        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}
    </div>
</body>

</html>
