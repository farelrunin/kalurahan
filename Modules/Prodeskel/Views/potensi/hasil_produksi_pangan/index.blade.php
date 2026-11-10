@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Hasil Produksi Tanaman Pangan</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'hasil_produksi_pangan'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.hasilProduksiPangan.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.hasilProduksiPangan.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.hasilProduksiPangan.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Harga Lokal (Rp)</th>
                                    <th>Nilai Produksi (Rp)</th>
                                    <th>Biaya Pemupukan (Rp)</th>
                                    <th>Biaya Bibit (Rp)</th>
                                    <th>Biaya Obat (Rp)</th>
                                    <th>Biaya Lainnya (Rp)</th>
                                    <th>Saldo Produksi (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $hasilProduksiPangan)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.hasilProduksiPangan.show', $hasilProduksiPangan->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.hasilProduksiPangan.form', $hasilProduksiPangan->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $hasilProduksiPangan->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.hasilProduksiPangan.delete', $hasilProduksiPangan->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $hasilProduksiPangan->data['tanggal'] }}</td>
                                        <td class="text-right">{{ Modules\Prodeskel\Enums\KomoditasTanamanPanganEnum::valueOf($hasilProduksiPangan->komoditas, '-') }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['luas_produksi'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['hasil_produksi'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['harga_local'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['nilai_produksi_tahun_ini'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['biaya_pemupukan'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['biaya_bibit'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['biaya_obat'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['biaya_lainnya'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiPangan->data['saldo_produksi'] }}</td>
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
