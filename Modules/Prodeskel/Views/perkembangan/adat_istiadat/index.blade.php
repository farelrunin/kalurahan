@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Peranserta Masyarakat dalam Pembangunan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Adat Istiadat</a></li>
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
                                    <th>Adat istiadat dalam perkawinan</th>
                                    <th>Adat istiadat dalam kelahiran anak</th>
                                    <th>Adat istiadat dalam upacara kematian</th>
                                    <th>Adat istiadat dalam pengelolaan hutan</th>
                                    <th>Adat istiadat dalam tanah pertanian</th>
                                    <th>Adat istiadat dalam pengelolaan laut/pantai</th>
                                    <th>Adat istiadat dalam memecahkan konflik warga</th>
                                    <th>Adat istiadat dalam menjauhkan bala penyakit dan bencana alam</th>
                                    <th>Adat istiadat dalam memulihkan hubungan antara alam semesta dengan manusia dan
                                        lingkungannya</th>
                                    <th>Adat istiadat dalam penanggulangan kemiskinan bagi keluarga tidak mampu/fakir
                                        miskin/terlantar</th>
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
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_perkawinan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_kelahiran_anak']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_upacara_kematian']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_pengelolaan_hutan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_tanah_pertanian']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_pengelolaan_laut_pantai']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_memecahkan_konflik_warga']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdatIstiadatEnum::valueOf($value->data['adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar']) }}</td>

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
