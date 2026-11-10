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
                <h3> Data Presisi Kesehatan </h3>
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
                        <th rowspan="2">NIK</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">{{ strtoupper(setting('sebutan_dusun')) }}</th>
                        <th rowspan="2">RW</th>
                        <th rowspan="2">RT</th>
                        <th rowspan="2">Jns Asuransi</th>
                        <th rowspan="2">Jns Penggunaan Alat Kontrasepsi</th>
                        <th rowspan="2">Jns Penyakit Yang Diderita</th>
                        <th rowspan="2">Kunjungan ke Faskes Dalam 1 Tahun</th>
                        <th rowspan="2">Rawat Inap Dalam 1 Tahun</th>
                        <th rowspan="2">Kunjungan Ke Dokter Dalam 1 Tahun</th>
                        <th rowspan="2">Kondisi Fisik Sejak Lahir</th>
                        <th rowspan="2">Status Gizi Balita</th>
                        <th rowspan="2">Tanggal<br>Pengisian</th>
                        <th rowspan="2">Tanggal<br>Terdaftar</th>
                    </tr>
                    <tr class="border thick">
                        <th>NIK</th>
                        <th>Nama</th>
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
                            <td>{{ $data->jns_ansuransi }}</td>
                            <td>{{ $data->jns_penggunaan_alat_kontrasepsi }}</td>
                            <td>{{ $data->jns_penyakit_diderita }}</td>
                            <td>{{ $data->frekwensi_kunjungan_faskes_pertahun }}</td>
                            <td>{{ $data->frekwensi_rawat_inap_pertahun }}</td>
                            <td>{{ $data->frekwensi_kunjungan_dokter_pertahun }}</td>
                            <td>{{ $data->kondisi_fisik_sejak_lahir }}</td>
                            <td>{{ $data->status_gizi_balita }}</td>
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
