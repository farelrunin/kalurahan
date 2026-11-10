@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Produk Domestik Desa Bruto</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Jasa-Jasa</a></li>
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
                                    <th rowspan="2" class="padat">No</th>
                                    <th rowspan="2" class="padat" style="min-width: 120px">Aksi</th>
                                    <th rowspan="2">Bulan</th>
                                    <th rowspan="2">Tahun</th>
                                    <th rowspan="2">Tanggal</th>
                                    <th colspan="3" class="text-center">Sub-Sektor Jasa Pemerintahan Umum</th>
                                    <th colspan="3" class="text-center">Sub-Sektor Jasa Swasta</th>
                                    <th colspan="3" class="text-center">Sub-Sektor Jasa Hiburan Dan Rekreasi</th>
                                    <th colspan="4" class="text-center">Sub-Sektor Jasa Perorangan Dan Rumah Tangga</th>
                                </tr>
                                <tr>
                                    <th nowrap>Jumlah jenis jasa pelayanan pemerintahan kepada masyarakat (Jenis)</th>
                                    <th nowrap>Nilai transaksi pelayanan pemerintahan kepada masyarakat (Rp)</th>
                                    <th nowrap>Biaya yang dikeluarkan dalam pelayanan (Rp)</th>
                                    <th nowrap>Jumlah usaha jasa pelayanan sosial yang disediakan masyarakat (Jenis)</th>
                                    <th nowrap>Nilai aset produksi jasa pelayanan sosial (Rp)</th>
                                    <th nowrap>Biaya yang dikeluarkan (Rp)</th>
                                    <th nowrap>Jumlah jenis jasa hiburan dan rekreasi (Jenis)</th>
                                    <th nowrap>Nilai transaksi usaha jasa hiburan dan rekreasi (Rp)</th>
                                    <th nowrap>Biaya antara yang dikeluarkan (Rp)</th>
                                    <th nowrap>Jumlah jenis kegiatan jasa pelayanan perorangan dan rumah tanggan (Jenis)
                                    </th>
                                    <th nowrap>Nilai aset jasa pelayanan perorangan dan rumah tangga (Rp)</th>
                                    <th nowrap>Nilai transaksi jasa pelayanan perorangan dan rumah tangga (Rp)</th>
                                    <th nowrap>Biaya antara yang dikeluarkan (Rp)</th>
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
                                        <th class="text-right">{{ $value->data['jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat'] }}</th>
                                        <th class="text-right">{{ $value->data['nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp'] }}</th>
                                        <th class="text-right">{{ $value->data['biaya_yang_dikeluarkan_dalam_pelayanan_rp'] }}
                                        </th>
                                        <th class="text-right">{{ $value->data['jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis'] }}</th>
                                        <th class="text-right">{{ $value->data['nilai_aset_produksi_jasa_pelayanan_sosial_rp'] }}</th>
                                        <th class="text-right">{{ $value->data['biaya_yang_dikeluarkan_rp'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis'] }}</th>
                                        <th class="text-right">{{ $value->data['nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp'] }}</th>
                                        <th class="text-right">{{ $value->data['biaya_antara_yang_dikeluarkan_rp'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis'] }}</th>
                                        <th class="text-right">{{ $value->data['nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] }}</th>
                                        <th class="text-right">{{ $value->data['nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] }}
                                        </th>
                                        <th class="text-right">{{ $value->data['biaya_antara_yang_dikeluarkan_rp_dua'] }}</th>
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
