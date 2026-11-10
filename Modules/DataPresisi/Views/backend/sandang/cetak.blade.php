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
                    <tr class="border thick">
                        <th>No</th>
                        <th width="100">STATUS</th>
                        <th width="150">STATUS KELENGKAPAN</th>
                        <th width="150">NO RTM</th>
                        <th width="200">KEPALA RTM</th>
                        <th width="100">NIK</th>
                        <th width="100">JML KK</th>
                        <th width="100">JML ANGGOTA</th>
                        <th width="100">ALAMAT</th>
                        <th width="100">{{ strtoupper(setting('sebutan_dusun')) }}</th>
                        <th width="50">RW</th>
                        <th width="50">RT</th>
                        <th width="100">TANGGAL PENGISIAN</th>
                        <th width="100">TANGGAL TERDAFTAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($main as $key => $data)
                        <tr>
                            <td class="text-center" width="2">{{ $key + 1 }}</td>
                            <td>{{ $data->sandang_status === 'lengkap' ? 'Sudah isi' : 'Belum isi' }}</td>
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
