@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi Prasarana</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.prasaranaPeribadatan') }}">Prasarana Peribadatan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'prasarana_peribadatan'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.prasaranaPeribadatan.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.prasaranaPeribadatan.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox"
                        data-title="Cetak"><i class="fa fa-print "></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.prasaranaPeribadatan.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Tanggal</th>
                                    <th>Jenis Tempat Ibadah</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $value)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.prasaranaPeribadatan.show', $value->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.prasaranaPeribadatan.form', $value->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $value->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.prasaranaPeribadatan.delete', $value->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $value->data['tanggal'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KomoditasJenisTempatIbadahEnum::valueOf($value->komoditas, '-') }}</td>
                                        <td class="text-right">{{ $value->data['jumlah'] }}</td>
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
                    [2, 'desc']
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
