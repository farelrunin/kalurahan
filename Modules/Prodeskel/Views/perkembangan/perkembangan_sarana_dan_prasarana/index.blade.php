@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Perkembangan Sarana dan Prasarana</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::perkembangan.menu', ['childMenu' => $child_menu])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.' . $pathRoute . '.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.' . $pathRoute . '.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.' . $pathRoute . '.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
                            class="fa fa-download"
                        ></i> Unduh</a>
                </div>
                <div class="box-body">
                    {!! form_open(null, 'id="mainform" name="mainform"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead>
                                <tr>
                                    <th class="padat">No</th>
                                    <th class="padat" style="min-width: 120px">Aksi</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah MCK Umum (Unit)</th>
                                    <th>Jumlah Posyandu (Unit)</th>
                                    <th>Jumlah Kader Posyandu Aktif (Orang)</th>
                                    <th>Jumlah Pembina Posyandu (Orang)</th>
                                    <th>Jumlah Dasawisma</th>
                                    <th>Jumlah Pengurus Dasa Wisma Aktif (Orang)</th>
                                    <th>Jumlah Kader Bina Keluarga Balita Aktif (Orang)</th>
                                    <th>Jumlah Petugas Lapangan Keluarga Berencana Aktif (Orang)</th>
                                    <th>Buku Rencana Kegiatan Posyandu *</th>
                                    <th>Buku Data Pengunjung Posyandu *</th>
                                    <th>Buku Kegiatan Pelayanan Posyandu *</th>
                                    <th>Buku Administrasi Posyandu Lainnya (Jenis)</th>
                                    <th>Jumlah Kegiatan Posyandu (Jenis)</th>
                                    <th>Jumlah Kader Kesehatan Lainnya (Orang)</th>
                                    <th>Jumlah Kegiatan Pengobatan Gratis (Jenis)</th>
                                    <th>Jumlah Kegiatan Pemberantasan Sarang Nyamuk/PSN (Jenis)</th>
                                    <th>Jumlah Kegiatan Pembersihan Lingkungan (Jenis)</th>
                                    <th>Kegiatan Lainnya (Jenis)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $value)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.' . $pathRoute . '.show', $value->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.' . $pathRoute . '.form', $value->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $value->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.' . $pathRoute . '.delete', $value->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $value->bulan }}</td>
                                        <td>{{ $value->tahun }}</td>
                                        <td>{{ $value->data['tanggal'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_mck_umum'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_posyandu'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kader_posyandu_aktif'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_pembina_posyandu'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_dasawisma'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_pengurus_dasa_wisma_aktif'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kader_bina_keluarga_balita_aktif'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_petugas_lapangan_keluarga_berencana_aktif'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DiisiEnum::valueOf($value->data['buku_rencana_kegiatan_posyandu']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DiisiEnum::valueOf($value->data['buku_data_pengunjung_posyandu']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DiisiEnum::valueOf($value->data['buku_kegiatan_pelayanan_posyandu']) }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_posyandu_lainnya'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_posyandu_jenis'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kader_kesehatan_lainnya'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_pengobatan_gratis_jenis'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_pembersihan_lingkungan_jenis'] }}</td>
                                        <td class="text-right">{{ $value->data['kegiatan_lainnya_jenis'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.components.konfirmasi_hapus')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var TableData = $('#tabeldata').DataTable({
                responsive: true,
                processing: true,
                serverSide: false,
                columnDefs: [{
                    orderable: false,
                    targets: [0, 1]
                }],
                order: [
                    [2, 'desc'],
                    [3, 'desc'],
                    [4, 'desc']
                ],
            });

            TableData.on('order.dt search.dt', function() {
                TableData.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            if (hapus == 0) {
                TableData.column(0).visible(false);
            }

            if (ubah == 0) {
                TableData.column(2).visible(false);
            }
        });
    </script>
@endpush
