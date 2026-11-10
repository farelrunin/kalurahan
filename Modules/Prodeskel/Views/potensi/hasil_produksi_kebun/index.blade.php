@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Hasil Produksi Tanaman Kebun</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'hasil_produksi_kebun'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.hasilProduksiKebun.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.hasilProduksiKebun.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.hasilProduksiKebun.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Luas Perkebunan Swasta/Negara (Ha)</th>
                                    <th>Hasil Perkebunan Swasta/Negara (Ton/Ha)</th>
                                    <th>Luas Perkebunan Rakyat (Ha)</th>
                                    <th>Hasil Perkebunan Rakyat (Ton/Ha)</th>
                                    <th>Harga Lokal (Rp)</th>
                                    <th>Nilai Produksi (Rp)</th>
                                    <th>Biaya Pemupukan (Rp)</th>
                                    <th>Biaya Bibit (Rp)</th>
                                    <th>Biaya Obat (Rp)</th>
                                    <th>Biaya Lainnya (Rp)</th>
                                    <th>Saldo Produksi (Rp)</th>
                                    <th>Dijual Langsung Ke Konsumen</th>
                                    <th>Dijual Melalui KUD</th>
                                    <th>Dijual Melalui Tengkulak</th>
                                    <th>Dijual Melalui Pengecer</th>
                                    <th>Dijual Ke Lumbung {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th>Tidak Djual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $hasilProduksiKebun)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.hasilProduksiKebun.show', $hasilProduksiKebun->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.hasilProduksiKebun.form', $hasilProduksiKebun->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $hasilProduksiKebun->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.hasilProduksiKebun.delete', $hasilProduksiKebun->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $hasilProduksiKebun->data['tanggal'] }}</td>
                                        <td class="text-right">{{ Modules\Prodeskel\Enums\KomoditasTanamanKebunEnum::valueOf($hasilProduksiKebun->komoditas, '-') }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['luas_perkebunan_swasta'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['hasil_perkebunan_swasta'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['luas_perkebunan_rakyat'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['hasil_perkebunan_rakyat'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['harga_lokal'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['nilai_produksi_tahun_ini'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['biaya_pemupukan'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['biaya_bibit'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['biaya_obat'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['biaya_lainnya'] }}</td>
                                        <td class="text-right">{{ $hasilProduksiKebun->data['saldo_produksi'] }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_langsung_ke_konsumen']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_melalui_KUD']) }}
                                        </td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_melalui_tengkulak']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_melalui_pengecer']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['dijual_ke_lumbung_desa']) }}</td>
                                        <td class="text-right">{{ App\Enums\StatusEnum::valueOf($hasilProduksiKebun->data['tidak_dijual']) }}</td>
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
