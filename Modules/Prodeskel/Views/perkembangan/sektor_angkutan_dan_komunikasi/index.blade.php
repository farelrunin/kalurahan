@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Produk Domestik Desa Bruto</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Angkutan dan Komunikasi</a></li>
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
                                    <th nowrap>Jumlah jenis kegiatan pengangkutan orang dan barang dengan alat angkut
                                        kendaraan jalan raya, laut, rel, udara, dan sungai / danau / penyeberangan</th>
                                    <th nowrap>Jumlah total kendaraan angkutan</th>
                                    <th nowrap>Nilai total transaksi pengangkutan</th>
                                    <th nowrap>Nilai total biaya yang dikeluarkan</th>
                                    <th nowrap>Jumlah jenis kegiatan jasa pelabuhan, terminal, tambatan, agensi, ekspedisi,
                                        tol, bongkar muat dan parkir</th>
                                    <th nowrap>Jumlah total nilai transaksi jasa penunjang angkutan</th>
                                    <th nowrap>Nilai biaya antara yang dikeluarkan</th>
                                    <th nowrap>Jumlah jenis kegiatan informasi dan telekomunikasi serta jasa penunjang
                                        lainnya</th>
                                    <th nowrap>Jumlah nilai aset telekomunikasi dan informasi yang ada</th>
                                    <th nowrap>Nilai transaksi informasi dan telekomunikasi yang dicapai</th>
                                    <th nowrap>Biaya antara yang dikeluarkan</th>
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
                                        <td class="text-right">
                                            {{ $value->data['jumlah_jenis_kegiatan_pengangkutan'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_total_kendaraan_angkutan'] }}</td>
                                        <td class="text-right">{{ $value->data['nilai_total_transaksi_pengangkutan'] }}</td>
                                        <td class="text-right">{{ $value->data['nilai_total_biaya_yang_dikeluarkan'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_jenis_kegiatan_jasa_pelabuhan'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_total_nilai_transaksi_jasa_penunjang_angkutan'] }}</td>
                                        <td class="text-right">{{ $value->data['nilai_biaya_antara_yang_dikeluarkan'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_jenis_kegiatan_informasi_dan_telekomunikasi_serta_jasa_penunjang_lainnya'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_nilai_aset_telekomunikasi_dan_informasi_yang_ada'] }}</td>
                                        <td class="text-right">{{ $value->data['nilai_transaksi_informasi_dan_telekomunikasi_yang_dicapai'] }}</td>
                                        <td class="text-right">{{ $value->data['biaya_antara_yang_dikeluarkan'] }}</td>
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
