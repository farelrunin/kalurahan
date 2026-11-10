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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kualitas Persalinan</a></li>
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
                                    <th colspan="9" class="text-center">Tempat Persalinan</th>
                                    <th colspan="5" class="text-center">Pertolongan Persalinan</th>
                                </tr>
                                <tr>
                                    <th nowrap>Tempat persalinan Rumah Sakit Umum (Unit)</th>
                                    <th nowrap>Tempat persalinan Rumah Bersalin (Unit)</th>
                                    <th nowrap>Tempat persalinan Puskesmas (Unit)</th>
                                    <th nowrap>Tempat persalinan Polindes (Unit)</th>
                                    <th nowrap>Tempat persalinan Balai Kesehatan Ibu Anak (Unit)</th>
                                    <th nowrap>Tempat persalinan rumah praktek bidan (Unit)</th>
                                    <th nowrap>Tempat praktek dokter (Unit)</th>
                                    <th nowrap>Rumah dukun (Unit)</th>
                                    <th nowrap>Rumah sendiri (Unit)</th>
                                    <th nowrap>Jumlah Persalinan ditolong Dokter (Tindakan)</th>
                                    <th nowrap>Jumlah persalinan ditolong bidan (Tindakan)</th>
                                    <th nowrap>Jumlah persalinan ditolong perawat (Tindakan)</th>
                                    <th nowrap>Jumlah persalinan ditolong dukun bersalin (Tindakan)</th>
                                    <th nowrap>Jumlah persalinan ditolong keluarga (Tindakan)</th>
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
                                        <td class="text-right">{{ $value->data['persalinan_rumah_sakit_umum'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_rumah_bersalin'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_puskesmas'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_polindes'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_balai_kesehatan_ibu_anak'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_rumah_praktek_bidan'] }}</td>
                                        <td class="text-right">{{ $value->data['praktek_dokter'] }}</td>
                                        <td class="text-right">{{ $value->data['rumah_dukun'] }}</td>
                                        <td class="text-right">{{ $value->data['rumah_sendiri'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_ditolong_dokter'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_ditolong_bidan'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_ditolong_perawat'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_ditolong_dukun_bersalin'] }}</td>
                                        <td class="text-right">{{ $value->data['persalinan_ditolong_keluarga'] }}</td>
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
