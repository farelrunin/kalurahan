@extends('admin.layouts.index')

@section('title')
    <h1>
        Data {{ $namaKepala ?? '' }} ( {{ $nikKepala ?? '' }} )
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.papan') }}">Data Papan</a></li>
    <li class="breadcrumb-item">{{ $namaKepala ?? '' }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.papan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Papan</a>
                </div>
                <div class="box-body">
                    <div class="alert alert-{{ $alertClass }}">Status Sinkron DTKS <span class="label {{ $labelClass }}">{{ $syncLabel }}</span></div>
                    <table class="table table-bordered text-bold">
                        <tbody>
                            <tr>
                                <td width="30%">NIK</td>
                                <td>: {{ $nikKepala }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $namaKepala }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Anggota Keluarga</td>
                                <td>: {{ $item->rtm->kepalaKeluarga->keluarga->anggota->count() }}</td>
                            </tr>
                            <tr>
                                <td>Status Kelengkapan</td>
                                <td>:
                                    <span class="label {{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::getBadgeClass($item->status_kelengkapan) }}">
                                        {{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::valueOf($item->status_kelengkapan ?? 0) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Kepemilikan Bangungan</td>
                                <td>: {{ $item->value_kd_stat_bangunan_tinggal }}</td>
                            </tr>
                            <tr>
                                <td>Luas (M2) Lahan/Pekarangan</td>
                                <td>: {{ $item->luas_lahan_pekarangan }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Kamar Tidur</td>
                                <td>: {{ $item->jumlah_kamar_tidur }}</td>
                            </tr>
                            <tr>
                                <td>Luas (M2) Lantai/Bangunan</td>
                                <td>: {{ $item->luas_lantai }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Lantai Terluas</td>
                                <td>: {{ $item->value_kd_jenis_lantai_terluas }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Dinding Terluas</td>
                                <td>: {{ $item->value_kd_jenis_dinding }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Atap Terluas</td>
                                <td>: {{ $item->value_kd_jenis_atap }}</td>
                            </tr>
                            <tr>
                                <td>Sumber Air Bersih</td>
                                <td>: {{ $item->value_kd_sumber_air_minum }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Pembuangan Akhir Tinja</td>
                                <td>: {{ $item->value_kd_pembuangan_akhir_tinja }}</td>
                            </tr>
                            <tr>
                                <td>Sumber Penerangan Utama</td>
                                <td>: {{ $item->value_kd_sumber_penerangan_utama }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
