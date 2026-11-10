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
            @include('prodeskel::potensi.menu', ['childMenu' => 'batas_wilayah'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.batasWilayah.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    @if (can('h'))
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '{{ ci_route('prodeskel.batasWilayah.delete') }}')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.batasWilayah.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.batasWilayah.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th class="padat">NO</th>
                                    <th class="padat" style="min-width: 120px">AKSI</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Tahun Pembentukan</th>
                                    <th>Luas Desa (Ha)</th>
                                    <th>Nama Kepala Desa/Lurah</th>
                                    <th>Desa/Kelurahan Sebelah Utara</th>
                                    <th>Desa/Kelurahan Sebelah Selatan</th>
                                    <th>Desa/Kelurahan Sebelah Timur</th>
                                    <th>Desa/Kelurahan Sebelah Barat</th>
                                    <th>Ada Penetapan Batas</th>
                                    <th>Dasar Hukum Perdes No.</th>
                                    <th>Dasar Hukum Perda No.</th>
                                    <th>Ada Peta Wilayah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataObjs as $index => $batas)
                                    <tr>
                                        <td>
                                            @if (can('h'))
                                                <input type="checkbox" name="id_cb[]" value="{{ $batas->id }}" />
                                            @endif
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.batasWilayah.show', $batas->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.batasWilayah.form', $batas->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.batasWilayah.delete', $batas->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $batas->bulan }}</td>
                                        <td>{{ $batas->tahun }}</td>
                                        <td>{{ $batas->data['tahun_pembentukan'] ?? '' }}</td>
                                        <td>{{ ribuan((int) $batas->data['luas_desa'] ?? 0) }}</td>
                                        <td>{{ $batas->data['nama_kepala_desa'] ?? '' }}</td>
                                        <td>{{ $batas->data['batas_desa_utara'] ?? '' }}</td>
                                        <td>{{ $batas->data['batas_desa_selatan'] ?? '' }}</td>
                                        <td>{{ $batas->data['batas_desa_timur'] ?? '' }}</td>
                                        <td>{{ $batas->data['batas_desa_barat'] ?? '' }}</td>
                                        <td>{{ App\Enums\StatusEnum::valueOf($batas->data['penetapan_batas']) }}</td>
                                        <td>{{ $batas->data['dasar_hukum_perdes'] ?? '' }}</td>
                                        <td>{{ $batas->data['dasar_hukum_perda'] ?? '' }}</td>
                                        <td>{{ App\Enums\StatusEnum::valueOf($batas->data['peta_wilayah']) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="16">Data tidak ditemukan</td>
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
                    [3, 'desc'],
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
