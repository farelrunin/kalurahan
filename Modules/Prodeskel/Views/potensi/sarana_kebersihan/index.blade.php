@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.saranaKebersihan') }}">Prasarana Kebersihan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'sarana_kebersihan'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.saranaKebersihan.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.saranaKebersihan.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.saranaKebersihan.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Tempat Pembungan Sementara (Lokasi)</th>
                                    <th>Tempat Pembungan Akhir (Tpa/Lokasi)</th>
                                    <th>Alat Penghancur / Incenerator</th>
                                    <th>Gerobak Sampah (Unit)</th>
                                    <th>Tong Sampah (Unit)</th>
                                    <th>Truk Pengangkut Sampah (Unit)</th>
                                    <th>Satgas Kebersihan (Kelompok)</th>
                                    <th>Anggota Satgas Kebersihan (Orang)</th>
                                    <th>Pemulung (Orang)</th>
                                    <th>Tempat Pengelolaan Sampah</th>
                                    <th>Pengeloaan Sampah Lingkungan / RT</th>
                                    <th>Pengeloaan Sampah Lainnya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $item)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.saranaKebersihan.show', $item->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.saranaKebersihan.form', $item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $item->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.saranaKebersihan.delete', $item->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $item->data['tanggal'] }}</td>
                                        <td align="right">{{ $item->data['tempat_pembungan_sementara'] }}</td>
                                        <td align="right">{{ $item->data['tempat_pembungan_akhir'] }}</td>
                                        <td>{{ $item->data['alat_penghancur_incenerator'] ? 'Ada' : 'Tidak Ada' }}</td>
                                        <td align="right">{{ $item->data['gerobak_sampah'] }}</td>
                                        <td align="right">{{ $item->data['tong_sampah'] }}</td>
                                        <td align="right">{{ $item->data['truk_pengangkut_sampah'] }}</td>
                                        <td align="right">{{ $item->data['satgas_kebersihan'] }}</td>
                                        <td align="right">{{ $item->data['anggota_satgas_kebersihan'] }}</td>
                                        <td align="right">{{ $item->data['pemulung'] }}</td>
                                        <td align="right">{{ $item->data['pengelolaan_sampah'] ? 'Ada' : 'Tidak Ada' }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\SaranaKebersihanEnum::valueOf($item->data['sarana_kebersihan']) }}
                                        <td>{{ $item->data['pengelolaan_sampah_dll'] ? 'Ada' : 'Tidak Ada' }}</td>
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
