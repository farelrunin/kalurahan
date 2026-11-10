@extends('admin.layouts.index')
@include('admin.layouts.components.asset_datatables')

@section('title')
    <h1>
        Data {{ $pangan?->rtm?->kepalaKeluarga?->nama }} ( {{ $pangan?->rtm?->kepalaKeluarga?->nik }} )
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.pangan') }}">Data Pangan</a></li>
    <li class="breadcrumb-item">{{ $pangan?->rtm?->kepalaKeluarga?->nama }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.pangan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Pangan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Pangan</a>
                </div>
                <div class="box-body" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga (KRT)</td>
                            <td>:</td>
                            <td>{{ $pangan?->rtm?->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td>{{ $pangan?->rtm?->kepalaKeluarga?->nik }}</td>
                        </tr>
                        <tr>
                            <td>Nama KRT</td>
                            <td>:</td>
                            <td>{{ $pangan?->rtm?->kepalaKeluarga?->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $pangan?->rtm?->kepalaKeluarga?->keluarga?->wilayah?->dusun ?? '-' }}
                                RW {{ $pangan?->rtm?->kepalaKeluarga?->keluarga?->wilayah?->rw ?? '-' }}
                                RT {{ $pangan?->rtm?->kepalaKeluarga?->keluarga?->wilayah?->rt ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota Keluarga</td>
                            <td>:</td>
                            <td>{{ $pangan?->rtm?->kepalaKeluarga?->keluarga?->anggota?->count() }}</td>
                        </tr>
                        <tr>
                            <td>Status Kelengkapan</td>
                            <td>:</td>
                            <td>
                                <span class="label {{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::getBadgeClass($pangan->status_kelengkapan) }}">
                                    {{ \Modules\DataPresisi\Enums\StatusKelengkapanEnum::valueOf($pangan->status_kelengkapan ?? 0) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td>{{ $pangan?->updated_at ? tgl_indo($pangan->updated_at) : '-' }}</td>
                        </tr>
                    </table>
                    <hr>

                    <div>
                        <h4><strong>Daftar Kepemilikan Tanah</strong></h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="bg-gray">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Jenis Lahan</th>
                                        <th>Luas Lahan/ Pekarangan</th>
                                        <th>Luas Tanam</th>
                                        <th>Status Lahan</th>
                                        <th>Komoditi Utama Tanaman Pangan</th>
                                        <th>Komoditi Tanaman Pangan Lainnya</th>
                                        <th>Jumlah Berdasarkan Jenis Komoditi</th>
                                        <th>Usia Komoditi</th>
                                        <th>Jenis Peternakan</th>
                                        <th>Jumlah Populasi</th>
                                        <th>Jenis Perikanan</th>
                                        <th>Frekwensi Makan Per-Hari</th>
                                        <th>Frekwensi Konsumsi Sayur Per-Hari</th>
                                        <th>Frekwensi Konsumsi Buah Per-Hari</th>
                                        <th>Frekwensi Konsumsi Daging Per-Hari</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Tanggal Pengisian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($semuaKepemilikanTanah as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $item->jenis_lahan ?? '-' }}</td>
                                            <td>{{ $item->luas_lahan ?? '-' }}</td>
                                            <td>{{ $item->luas_tanam ?? '-' }}</td>
                                            <td>{{ $item->status_lahan ?? '-' }}</td>
                                            <td>{{ $item->komoditi_utama_tanaman_pangan ?? '-' }}</td>
                                            <td>{{ $item->komoditi_tanaman_pangan_lainnya ?? '-' }}</td>
                                            <td>{{ $item->jumlah_berdasarkan_jenis_komoditi ?? '-' }}</td>
                                            <td>{{ $item->usia_komoditi ?? '-' }}</td>
                                            <td>{{ $item->jenis_peternakan ?? '-' }}</td>
                                            <td>{{ $item->jumlah_populasi ?? '-' }}</td>
                                            <td>{{ $item->jenis_perikanan ?? '-' }}</td>
                                            <td>{{ $item->frekwensi_makanan_perhari ?? '-' }}</td>
                                            <td>{{ $item->frekwensi_konsumsi_sayur_perhari ?? '-' }}</td>
                                            <td>{{ $item->frekwensi_konsumsi_buah_perhari ?? '-' }}</td>
                                            <td>{{ $item->frekwensi_konsumsi_daging_perhari ?? '-' }}</td>
                                            <td>{{ $item->latitude ?? '-' }}</td>
                                            <td>{{ $item->longitude ?? '-' }}</td>
                                            <td>{{ $item->tanggal_pengisian ? tgl_indo($item->tanggal_pengisian) : '-' }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="19" class="text-center">Tidak ada data kepemilikan tanah</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
