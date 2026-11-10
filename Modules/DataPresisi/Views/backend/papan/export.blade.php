<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Data Presisi Papan</title>

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
                <h3> Data Presisi Papan </h3>
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
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">{{ ucwords(setting('sebutan_dusun')) }}</th>
                        <th rowspan="2">RW</th>
                        <th rowspan="2">RT</th>
                        <th rowspan="2">Status<br>Kepemilikan<br>Bangunan</th>
                        <th rowspan="2">Luas<code>(m<sup>2</sup>)</code><br>Lahan/<br>Pekarangan</th>
                        <th rowspan="2">Jumlah<br>Kamar<br>Tidur</th>
                        <th rowspan="2">Luas <code>(m<sup>2</sup>)</code><br>Lantai/<br>Bangunan</th>
                        <th rowspan="2">Jenis<br>Lantai<br>Terluas</th>
                        <th rowspan="2">Jenis<br>Dinding<br>Terluas</th>
                        <th rowspan="2">Jenis<br>Atap<br>Terluas</th>
                        <th rowspan="2">Sumber<br>Air<br>Minum</th>
                        <th rowspan="2">Tempat<br>Pembuangan<br>Akhir Tinja</th>
                        <th rowspan="2">Sumber<br>Penerangan<br>Utama</th>
                        <th rowspan="2">Daya<br>Terpasang</th>
                        <th rowspan="2">Daya<br>Terpasang 2</th>
                        <th rowspan="2">Daya<br>Terpasang 3</th>
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
                            <td class="text-center" width="2">{{ ++$start }}</td>
                            <td>{{ $data->tanggal_pengisian ? 'Sudah Isi' : 'Belum Isi' }}</td>
                            <td>{{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::valueOf($data->status_kelengkapan ?? 0) }}</td>
                            <td>{{ $data->rtm->no_kk }}</td>
                            <td>{{ $privasi_nik ? sensor_nik_kk($data->rtm->kepalaKeluarga->nik) : $data->rtm->kepalaKeluarga->nik }}</td>
                            <td>{{ strtoupper($data->rtm->kepalaKeluarga->nama) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->alamat_wilayah) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->dusun) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->rw) }}</td>
                            <td>{{ strtoupper($data->kepalaKeluarga->keluarga->wilayah->rt) }}</td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_stat_bangunan_tinggal']][$data->kd_stat_bangunan_tinggal] }}
                            </td>
                            <td>{{ $data->luas_lahan_pekarangan }}</td>
                            <td>{{ $data->jumlah_kamar_tidur }}</td>
                            <td>{{ $data->luas_lantai }}</td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_jenis_lantai_terluas']][$data->kd_jenis_lantai_terluas] }}
                            </td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_jenis_dinding']][$data->kd_jenis_dinding] }}
                            </td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_jenis_atap']][$data->kd_jenis_atap] }}</td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_sumber_air_minum']][$data->kd_sumber_air_minum] }}
                            </td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_pembuangan_akhir_tinja']][$data->kd_pembuangan_akhir_tinja] }}
                            </td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_sumber_penerangan_utama']][$data->kd_sumber_penerangan_utama] }}
                            </td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_daya_terpasang']][$data->kd_daya_terpasang] }}</td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_daya_terpasang2']][$data->kd_daya_terpasang2] }}</td>
                            <td>{{ $pilihanRegsosek[$dtksFieldMapping['kd_daya_terpasang3']][$data->kd_daya_terpasang3] }}</td>
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
