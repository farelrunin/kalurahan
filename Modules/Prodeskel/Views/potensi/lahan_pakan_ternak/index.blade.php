@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="active">Lahan dan Pakan Ternak</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'lahan_pakan_ternak'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.lahanPakanTernak.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.lahanPakanTernak.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.lahanPakanTernak.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Luas Tanaman Pakan Ternak/Rumput (Ha)</th>
                                    <th>Produksi Hijauan Makanan Ternak (Ton/Ha)</th>
                                    <th>Dipasok Dari Luar Desa/Kelurahan (Ton)</th>
                                    <th>Disubsidi Dinas (Ton)</th>
                                    <th>Lainnya (Ton)</th>
                                    <th>Milik Masyarakat Umum (Ha)</th>
                                    <th>Milik Perusahaan Peternakan/Ranch (Ha)</th>
                                    <th>Milik Perorangan (Ha)</th>
                                    <th>Sewa Pakai (Ha)</th>
                                    <th>Milik Pemerintah (Ha)</th>
                                    <th>Milik Masyarakat Adat (Ha)</th>
                                    <th>Lainnya (Ha)</th>
                                    <th>Luas Lahan Gembalan (Ha)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $lahan)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.lahanPakanTernak.show', $lahan->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.lahanPakanTernak.form', $lahan->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $lahan->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.lahanPakanTernak.delete', $lahan->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $lahan->data['tanggal'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_tanaman_pakan_ternak'] }}</td>
                                        <td class="text-right">{{ $lahan->data['produksi_hijauan'] }}</td>
                                        <td class="text-right">{{ $lahan->data['dipasok_luar'] }}</td>
                                        <td class="text-right">{{ $lahan->data['disubsidi_dinas'] }}</td>
                                        <td class="text-right">{{ $lahan->data['ketersediaan_lainnya'] }}</td>
                                        <td class="text-right">{{ $lahan->data['milik_masyarakat'] }}</td>
                                        <td class="text-right">{{ $lahan->data['milik_perusahaan'] }}</td>
                                        <td class="text-right">{{ $lahan->data['milik_perorangan'] }}</td>
                                        <td class="text-right">{{ $lahan->data['sewa_pakai'] }}</td>
                                        <td class="text-right">{{ $lahan->data['milik_pemerintah'] }}</td>
                                        <td class="text-right">{{ $lahan->data['milik_adat'] }}</td>
                                        <td class="text-right">{{ $lahan->data['milik_lainnya'] }}</td>
                                        <td class="text-right">{{ $lahan->data['luas_lahan_gembalan'] }}</td>
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
