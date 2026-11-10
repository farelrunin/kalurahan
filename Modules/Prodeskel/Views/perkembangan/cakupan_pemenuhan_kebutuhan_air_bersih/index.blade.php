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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Cakupan Pemenuhan Kebutuhan Air Bersih</a></li>
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
                                    <th nowrap>Jumlah keluarga menggunakan sumur gali</th>
                                    <th nowrap>Jumlah keluarga pelanggan PAM</th>
                                    <th nowrap>Jumlah keluarga menggunakan Penampung Air Hujan</th>
                                    <th nowrap>Jumlah keluarga menggunakan sumur pompa</th>
                                    <th nowrap>Jumlah keluarga menggunakan perpipaan air kran</th>
                                    <th nowrap>Jumlah keluarga menggunakan hidran umum</th>
                                    <th nowrap>Jumlah keluarga menggunakan air sungai</th>
                                    <th nowrap>Jumlah keluarga menggunakan embung</th>
                                    <th nowrap>Jumlah keluarga yang menggunakan mata air</th>
                                    <th nowrap>Jumlah keluarga yang tidak mendapatkan akses air minum dari air laut</th>
                                    <th nowrap>Jumlah keluarga yang tidak mendapatkan akses air minum dari sumber di atas
                                    </th>
                                    <th nowrap>Total jumlah keluarga</th>
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
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_sumur_gali'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_pelanggan_pam'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_penampung_air_hujan'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_sumur_pompa'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_perpipaan_air_kran'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_hidran_umum'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_air_sungai'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_menggunakan_embung'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_yang_menggunakan_mata_air'] }}</td>
                                        <td class="text-right">{{ $value->data['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas'] }}</td>
                                        <td class="text-right">{{ $value->data['total_jumlah_keluarga'] }}</td>
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
