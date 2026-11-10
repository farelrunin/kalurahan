@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Prodeskel</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'jenis_lahan'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.jenisLahan.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    @if (can('h'))
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '{{ ci_route('prodeskel.jenisLahan.delete') }}')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.jenisLahan.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.jenisLahan.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
                            class="fa fa-download"
                        ></i> Unduh</a>
                </div>
                <div class="box-body">
                    {!! form_open(null, 'id="mainform" name="mainform"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkall" /></th>
                                    <th class="padat">No</th>
                                    <th class="padat" style="min-width: 120px">Aksi</th>
                                    <th>Tanggal</th>
                                    <th>Tanah Sawah (Ha)</th>
                                    <th>Tanah Kering (Ha)</th>
                                    <th>Tanah Basah (Ha)</th>
                                    <th>Tanah Perkebunan (Ha)</th>
                                    <th>Tanah Fasilitas <br> Umum (Ha)</th>
                                    <th>Tanah Hutan (Ha)</th>
                                    <th>Total Luas Tanah (Ha)</th>
                                    <th>Luas {{ setting('sebutan_desa') }} (Ha)</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataObjs as $index => $lahan)
                                    <tr>
                                        <td>
                                            @if (can('h'))
                                                <input type="checkbox" name="id_cb[]" value="{{ $lahan->id }}" />
                                            @endif
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.jenisLahan.show', $lahan->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.jenisLahan.form', $lahan->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.jenisLahan.delete', $lahan->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $lahan->data['tanggal'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_sawah'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_kering'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_basah'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_perkebunan'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_fasilitas_umum'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_hutan'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_entri_data'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanah_desa'] }}</td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="13">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
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
                    targets: [0, 1, 2]
                }],
                order: [
                    [4, 'desc']
                ],
            });

            TableData.on('order.dt search.dt', function() {
                TableData.column(1, {
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
