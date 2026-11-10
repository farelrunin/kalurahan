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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lembagaKeamanan') }}">Lembaga Keamanan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'lembaga_keamanan'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.lembagaKeamanan.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.lembagaKeamanan.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.lembagaKeamanan.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Keberadaan Hansip dan Linmas</th>
                                    <th>Jumlah Anggota Hansip</th>
                                    <th>Jumlah Anggota Satgas Linmas</th>
                                    <th>Pelaksanaan SISKAMLING</th>
                                    <th>Jumlah Pos Kamling</th>
                                    <th>Keberadaan SATPAM SWAKARSA</th>
                                    <th>Jumlah Anggota SATPAM SWAKARSA</th>
                                    <th>Nama Organisasi Induk</th>
                                    <th>Pemilik Organisasi</th>
                                    <th>Keberadaan Organisasi Keamanan Lainnya</th>
                                    <th>Mitra Koramil / TNI</th>
                                    <th>Jumlah Anggota Mitra Koramil / TNI</th>
                                    <th>Jumlah Kegiatan Mitra Koramil / TNI</th>
                                    <th>Babinkamtibmas / POLRI</th>
                                    <th>Jumlah Anggota Babinkamtibmas / POLRI</th>
                                    <th>Jumlah Kegiatan Babinkamtibmas / POLRI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataObjs as $index => $item)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.lembagaKeamanan.show', $item->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.lembagaKeamanan.form', $item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $item->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.lembagaKeamanan.delete', $item->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $item->data['tanggal'] }}</td>
                                        <td>{{ App\Enums\StatusEnum::all()[$item->data['keberadaan_hansip_dan_linmas'] ?? 0] }}
                                        </td>
                                        <td class="text-right">{{ $item->data['jumlah_anggota_hansip'] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_anggota_satgas_linmas'] }}</td>
                                        <td>{{ App\Enums\StatusEnum::all()[$item->data['pelaksanaan_siskamling'] ?? 0] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_pos_kamling'] }}</td>
                                        <td>{{ App\Enums\StatusEnum::all()[$item->data['keberadaan_satpam_swakarsa'] ?? 0] }}
                                        </td>
                                        <td class="text-right">{{ $item->data['jumlah_anggota_satpam_swakarsa'] }}</td>
                                        <td>{{ $item->data['nama_organisasi_induk'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KomoditasPemilikOrganisasiEnum::valueOf($item->komoditas, '-') }}</td>
                                        <td>{{ App\Enums\StatusEnum::all()[$item->data['keberadaan_organisasi_keamanan_lainnya'] ?? 0] }}</td>
                                        <td>{{ App\Enums\StatusEnum::all()[$item->data['mitra_koramil_tni'] ?? 0] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_anggota_satpam_swakarsa'] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_kegiatan_mitra_koramil_tni'] }}</td>
                                        <td>{{ App\Enums\StatusEnum::all()[$item->data['babinkamtibmas_polri'] ?? 0] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_anggota_babinkamtibmas_polri'] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_kegiatan_babinkamtibmas_polri'] }}</td>
                                    </tr>
                                @empty
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
            // tidak menggunakan server side, dengan pertimbangan data sedikit dan disimpan dalam bentuk json
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
