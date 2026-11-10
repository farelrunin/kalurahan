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
                <h3> Data Presisi Ketenagakerjaan </h3>
            </div>
            <br>
            <table class="border thick">
                <thead>
                    <tr class="border thick">
                        <th>No</th>
                        <th nowrap>STATUS</th>
                        <th nowrap>STATUS KELENGKAPAN</th>
                        <th nowrap>NO RTM</th>
                        <th nowrap>KEPALA RTM</th>
                        <th nowrap>NIK</th>
                        <th nowrap>JUMLAH KK</th>
                        <th nowrap>JUMLAH ANGGOTA</th>
                        <th nowrap>ALAMAT</th>
                        <th nowrap>{{ strtoupper(setting('sebutan_dusun')) }}</th>
                        <th nowrap>RW</th>
                        <th nowrap>RT</th>
                        <th nowrap>TANGGAL PENGISIAN</th>
                        <th nowrap>TANGGAL TERDAFTAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($main as $key => $data)
                        <tr>
                            <td class="text-center" width="2">{{ $key + 1 }}</td>
                            <td>{{ $data->status }}</td>
                            <td>{{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::valueOf($data->status_kelengkapan ?? 0) }}
                            </td>
                            <td>{{ $data->no_kk }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->nama) }}</td>
                            <td>{{ $privasi_nik ? sensor_nik_kk($data->kepalaKeluarga->nik) : $data->kepalaKeluarga->nik }}
                            </td>
                            <td>{{ $data->jumlah_kk }}</td>
                            <td>{{ $data->anggota_count }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->alamat_wilayah) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->dusun) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->rw) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->rt) }}</td>
                            <td>{{ tgl_indo($data->tanggal_pengisian) }}</td>
                            <td>{{ tgl_indo($data->tgl_daftar) }}</td>
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
