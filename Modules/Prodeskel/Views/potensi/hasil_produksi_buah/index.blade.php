@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Hasil Produksi Tanaman Buah</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'hasil_produksi_buah'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.hasilProduksiBuah.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.hasilProduksiBuah.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.hasilProduksiBuah.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Nama Komoditas</th>
                                    <th>Luas Produksi (Ha)</th>
                                    <th>Hasil Produksi (Ton/Ha)</th>
                                    <th>Dijual Langsung Ke Konsumen</th>
                                    <th>Dijual Ke Pasar</th>
                                    <th>Dijual Melalui KUD</th>
                                    <th>Dijual Melalui Tengkulak</th>
                                    <th>Dijual Melalui Pengecer</th>
                                    <th>Dijual Ke Lumbung {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th>Tidak Djual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $hasilProduksiBuah)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.hasilProduksiBuah.show', $hasilProduksiBuah->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.hasilProduksiBuah.form', $hasilProduksiBuah->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $hasilProduksiBuah->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.hasilProduksiBuah.delete', $hasilProduksiBuah->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $hasilProduksiBuah->data['tanggal'] }}</td>
                                        <td class="text-right">{{ Modules\Prodeskel\Enums\KomoditasTanamanBuahEnum::valueOf($hasilProduksiBuah->komoditas, '-') }}</td>
                                        <td class="text-right">{{ $hasilProduksiBuah->data['luas_produksi'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiBuah->data['hasil_produksi'] }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_langsung_ke_konsumen']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_ke_pasar']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_melalui_KUD']) }}
                                        </td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_melalui_tengkulak']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_melalui_pengecer']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['dijual_ke_lumbung_desa']) }}
                                        </td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiBuah->data['tidak_dijual']) }}</td>
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
                TableData.column(1).visible(false);
            }
        });
    </script>
@endpush
