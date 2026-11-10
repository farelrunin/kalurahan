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
                <h3> Data Presisi Pangan </h3>
            </div>
            <br>
            <table class="border thick">
                <thead>
                    <tr class="border thick">
                        <th rowspan="2">No</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Status<br>Kelengkapan</th>
                        <th rowspan="2">No. RTM</th>
                        <th colspan="2">Kepala RTM</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">{{ strtoupper(setting('sebutan_dusun')) }}</th>
                        <th rowspan="2">RW</th>
                        <th rowspan="2">RT</th>
                        <th rowspan="2">Jenis Lahan</th>
                        <th rowspan="2">Luas Lahan</th>
                        <th rowspan="2">Luas Tanam</th>
                        <th rowspan="2">Status Lahan</th>
                        <th rowspan="2">Komoditi Utama TanamanPangan </th>
                        <th rowspan="2">Komoditi Tanaman Pangan Lainnya </th>
                        <th rowspan="2">Jumlah Berdasarkan Jenis Komoditi </th>
                        <th rowspan="2">Usia Komoditi </th>
                        <th rowspan="2">Jenis Peternakan </th>
                        <th rowspan="2">Jumlah Populasi </th>
                        <th rowspan="2">Jenis Perikanan </th>
                        <th rowspan="2">Frekwensi Makanan Perhari </th>
                        <th rowspan="2">Frekwensi Konsumsi Sayur Perhari </th>
                        <th rowspan="2">Frekwensi Konsumsi Buah Perhari </th>
                        <th rowspan="2">Frekwensi Konsumsi Daging Perhari </th>
                        <th rowspan="2">Tanggal<br>Pengisian</th>
                        <th rowspan="2">Tanggal<br>Terdaftar</th>
                    </tr>

                    <tr class="border thick">
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
                            <td>{{ strtoupper($data->rtm->kepalaKeluarga->alamat_wilayah) }}</td>
                            <td>{{ strtoupper($data->rtm->kepalaKeluarga->keluarga->wilayah->dusun) }}</td>
                            <td>{{ strtoupper($data->rtm->kepalaKeluarga->keluarga->wilayah->rw) }}</td>
                            <td>{{ strtoupper($data->rtm->kepalaKeluarga->keluarga->wilayah->rt) }}</td>
                            <td>{{ $data->jenis_lahan }}</td>
                            <td>{{ $data->luas_lahan }}</td>
                            <td>{{ $data->luas_tanam }}</td>
                            <td>{{ $data->status_lahan }}</td>
                            <td>{{ $data->komoditi_utama_tanaman_pangan }}</td>
                            <td>{{ $data->komoditi_tanaman_pangan_lainnya }}</td>
                            <td>{{ $data->jumlah_berdasarkan_jenis_komoditi }}</td>
                            <td>{{ $data->usia_komoditi }}</td>
                            <td>{{ $data->jenis_peternakan }}</td>
                            <td>{{ $data->jumlah_populasi }}</td>
                            <td>{{ $data->jenis_perikanan }}</td>
                            <td>{{ $data->Frekwensi_makanan_perhari }}</td>
                            <td>{{ $data->Frekwensi_konsumsi_sayur_perhari }}</td>
                            <td>{{ $data->Frekwensi_konsumsi_buah_perhari }}</td>
                            <td>{{ $data->Frekwensi_konsumsi_daging_perhari }}</td>
                            <td>{{ $data->tanggal_pengisian ? tgl_indo($data->tanggal_pengisian) : '-' }}</td>
                            <td>{{ $data->rtm->tgl_daftar ? tgl_indo($data->rtm->tgl_daftar) : '-' }}</td>
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
