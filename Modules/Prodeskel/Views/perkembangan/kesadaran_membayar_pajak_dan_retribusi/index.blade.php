@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Kedaulatan Politik Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kesadaran Membayar Pajak dan Retribusi</a></li>
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
                                    <th>Jenis pajak yang dipungut sebagai kewenangan dan atau tugas desa/kelurahan (Jenis)
                                    </th>
                                    <th>Jumlah Wajib Pajak (Orang)</th>
                                    <th>Target PBB (Rp)</th>
                                    <th>Realisasi PBB (%)</th>
                                    <th>Jumlah Tindakan terhadap penunggak PBB (Tindakan)</th>
                                    <th>Retribusi yang dipungut sebagai tugas dan kewenangan desa/kelurahan (Jenis)</th>
                                    <th>Jumlah wajib retribusi yang menjadi tugas/kewenangan desa/kelurahan (Orang)</th>
                                    <th>Target retribusi yang menjadi tugas/kewenangan desa/kelurahan (Rp)</th>
                                    <th>Realisasi retribusi yang menjadi tugas/kewenangan desa/kelurahan (%)</th>
                                    <th>pungutan resmi lainnya di Desa/Kelurahan (Jenis)</th>
                                    <th>Target pungutan resmi tingkat desa/kelurahan (Rp)</th>
                                    <th>Realisasi pungutan resmi di desa/kelurahan (%)</th>
                                    <th>Jumlah kasus pungutan liar</th>
                                    <th>Jumlah penyelesaian kasus pungutan liar</th>
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
                                        <td class="text-right">{{ $value->data['7a2891c06625f'] }}</td>
                                        <td class="text-right">{{ $value->data['af23bc98e4d57'] }}</td>
                                        <td class="text-right">{{ $value->data['1b4c3d82e5f96'] }}</td>
                                        <td class="text-right">{{ $value->data['c6a7d8e2b9f34'] }}</td>
                                        <td class="text-right">{{ $value->data['5e4a3b2c1d8f9'] }}</td>
                                        <td class="text-right">{{ $value->data['92c3b5e7d8f1a'] }}</td>
                                        <td class="text-right">{{ $value->data['6b7c2d8e1f9a3'] }}</td>
                                        <td class="text-right">{{ $value->data['3a4b5c2d8f1e9'] }}</td>
                                        <td class="text-right">{{ $value->data['8d1e4f7c2b9a6'] }}</td>
                                        <td class="text-right">{{ $value->data['5a2b8c3d4f1e9'] }}</td>
                                        <td class="text-right">{{ $value->data['4b6c9d1e2f3a5'] }}</td>
                                        <td class="text-right">{{ $value->data['d5a6b7c3e8f2'] }}</td>
                                        <td class="text-right">{{ $value->data['6c2d3e4a5b8f'] }}</td>
                                        <td class="text-right">{{ $value->data['1a3b4c6d8e5f'] }}</td>

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
