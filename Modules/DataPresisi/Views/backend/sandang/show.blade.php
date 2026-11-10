@extends('admin.layouts.index')

@section('title')
    <h1>
        Data {{ $sandang->rtm->kepalaKeluarga->nama ?? '' }} ( {{ $sandang->rtm->kepalaKeluarga->nik ?? '' }} )
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.sandang') }}">Data Sandang</a></li>
    <li class="breadcrumb-item">{{ $sandang->rtm->kepalaKeluarga->nama ?? '' }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.sandang') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Sandang"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Sandang</a>
                </div>
                <div class="box-body">

                    <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                        <table>
                            <tr>
                                <td>No Kartu Rumah Tangga(KRT)</td>
                                <td>:</td>
                                <td>{{ $sandang->rtm->no_kk }}</td>
                            </tr>
                            <tr>
                                <td>Kepala Rumah Tangga</td>
                                <td>:</td>
                                <td>{{ $sandang->kepala_rumah_tangga->nama }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $sandang->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah KK</td>
                                <td>:</td>
                                <td> {{ $sandang->rtm->jumlah_kk }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Anggota</td>
                                <td>:</td>
                                <td>{{ count($sandang->rtm->anggota) }}</td>
                            </tr>
                            <tr>
                                <td>Status Kelengkapan</td>
                                <td>:</td>
                                <td>
                                    <span class="label {{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::getBadgeClass($sandang->status_kelengkapan) }}">
                                        {{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::valueOf($sandang->status_kelengkapan ?? 0) }}
                                    </span>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="box-body">
                        <h5><b>Daftar Anggota</b></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                                <thead class="bg-gray disabled color-palette">
                                    <tr>

                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NOMOR KK</th>
                                        <th>NAMA</th>
                                        <th>JML PAKAIAN YANG DIMILIKI</th>
                                        <th>FREKWENSI BELI PAKAIAN PERTAHUN</th>
                                        <th>JENIS PAKAIAN</th>
                                        <th>FREKWENSI GANTI PAKAIAN</th>
                                        <th>TMPT CUCI PAKAIAN</th>
                                        <th>JML PAKAIAN BERAGAM</th>
                                        <th>JML PAKAIAN SEMBAHYANG</th>
                                        <th>JML PAKAIAN KERJA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($anggota) > 0)
                                        @foreach ($anggota as $key => $data)
                                            <tr>
                                                <td class="padat">{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $data['nik'] }}

                                                </td>
                                                <td>
                                                    {{ $data['no_kk'] }}
                                                </td>
                                                <td nowrap>{{ strtoupper($data['nama']) }}</td>
                                                <td>
                                                    {{ $data['jml_pakaian_yg_dimiliki'] }}
                                                </td>

                                                <td>
                                                    {{ $data['frekwensi_beli_pakaian_pertahun'] }}
                                                </td>

                                                <td>
                                                    {{ $data['jenis_pakaian'] }}
                                                </td>

                                                <td>
                                                    {{ $data['frekwensi_ganti_pakaian'] }}
                                                </td>
                                                <td>
                                                    {{ $data['tmpt_cuci_pakaian'] }}
                                                </td>
                                                <td>
                                                    {{ $data['jml_pakaian_seragam'] }}
                                                </td>
                                                <td>
                                                    {{ $data['jml_pakaian_sembahyang'] }}
                                                </td>
                                                <td>
                                                    {{ $data['jml_pakaian_kerja'] }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center" colspan="9">Data Tidak Tersedia</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
