@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="active">Lembaga Adat</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'lembaga_adat'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.lembagaAdat.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.lembagaAdat.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.lembagaAdat.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th nowrap>Pemangku Adat</th>
                                    <th nowrap>Kepengurusan Adat</th>
                                    <th nowrap>Rumah Adat</th>
                                    <th nowrap>Barang Pusaka</th>
                                    <th nowrap>Naskah-Naskah</th>
                                    <th nowrap>Lainnya</th>
                                    <th nowrap>Musyawarah Adat</th>
                                    <th nowrap>Sanksi Adat</th>
                                    <th nowrap>Upacara Adat Perkawinan</th>
                                    <th nowrap>Upacara Adat Kematian</th>
                                    <th nowrap>Upacara Adat Kelahiran</th>
                                    <th nowrap>Upacara Adat Dalam Bercocok Tanam</th>
                                    <th nowrap>Upacara Adat Bidang Perikanan/Laut</th>
                                    <th nowrap>Upacara Adat Bidang Kehutanan</th>
                                    <th nowrap>Upacara Adat Dalam Pengeloaan Sumber Daya Alam</th>
                                    <th nowrap>Upacara Adat Dalam Pembangunan Rumah</th>
                                    <th nowrap>Upacara Adat Dalam Penyelesaian Masalah/Konflik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $item)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.lembagaAdat.show', $item->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.lembagaAdat.form', $item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $item->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.lembagaAdat.delete', $item->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $item->data['tanggal'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['pemangku_adat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['kepengurusan_adat']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['rumah_adat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['barang_pusaka']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['naskah']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['lainnya']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['musyawarah_adat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['sanksi_adat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_perkawinan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_kematian']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_kelahiran']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_cocok_tanam']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_perikanan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_kehutanan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_sda']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_pembangunan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['upacara_adat_penyelesaian_masalah']) }}</td>

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
