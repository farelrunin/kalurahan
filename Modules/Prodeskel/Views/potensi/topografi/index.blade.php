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
    <li class="active">Topografi</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'topografi'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.topografi.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    @if (can('h'))
                        <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '{{ ci_route('prodeskel.topografi.delete') }}')" class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"><i
                                class='fa fa-trash-o'
                            ></i> Hapus</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.topografi.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.topografi.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Dataran Rendah (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Dataran Berbukit - Bukit (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Dataran (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Lereng Gunung (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Tepi Pantai/Pesisir (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Kawasan Rawa (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Kawasan Gambut (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Aliran Sungai (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Bantaran Sungai (Ha)</th>
                                    <th>Lain - Lain (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Rawan Banjir (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Potensial Tsunami (Ha)</th>
                                    <th>{{ ucwords(setting('sebutan_desa')) }} Rawan Jalur Gempa (Ha)</th>
                                    <th>Jarak Ke Ibu Kota Kecamatan (Km)</th>
                                    <th>Jarak Ke Ibu Kota Provinsi (Km)</th>
                                    <th>Jarak Ke Ibu Kota Kabupaten/Kota (Km)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $topografi)
                                    <tr>
                                        <td>
                                            @if (can('h'))
                                                <input type="checkbox" name="id_cb[]" value="{{ $topografi->id }}" />
                                            @endif
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.topografi.show', $topografi->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.topografi.form', $topografi->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.topografi.delete', $topografi->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $topografi->data['tanggal'] }}</td>
                                        <td class="text-right">{{ $topografi->data['dataran_rendah'] }}</td>
                                        <td class="text-right">{{ $topografi->data['berbukit_bukit'] }}</td>
                                        <td class="text-right">{{ $topografi->data['dataran'] }}</td>
                                        <td class="text-right">{{ $topografi->data['lereng_gunung'] }}</td>
                                        <td class="text-right">{{ $topografi->data['tepi_pantai_pesisir'] }}</td>
                                        <td class="text-right">{{ $topografi->data['kawasan_rawa'] }}</td>
                                        <td class="text-right">{{ $topografi->data['kawasan_gambut'] }}</td>
                                        <td class="text-right">{{ $topografi->data['aliran_sungai'] }}</td>
                                        <td class="text-right">{{ $topografi->data['bantaran_sungai'] }}</td>
                                        <td class="text-right">{{ $topografi->data['lain_lain'] }}</td>
                                        <td class="text-right">{{ $topografi->data['rawan_banjir'] }}</td>
                                        <td class="text-right">{{ $topografi->data['potensi_tsunami'] }}</td>
                                        <td class="text-right">{{ $topografi->data['rawan_jalur_gempa'] }}</td>
                                        <td class="text-right">{{ $topografi->data['jarak_ke_ibukota_kecamatan'] }}</td>
                                        <td class="text-right">{{ $topografi->data['jarak_ke_ibukota_provinsi_kota'] }}
                                        </td>
                                        <td class="text-right">{{ $topografi->data['jarak_ke_ibukota_kabupaten_kota'] }}
                                        </td>
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
                    targets: [0, 1, 2]
                }],
                order: [
                    [3, 'desc']
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
