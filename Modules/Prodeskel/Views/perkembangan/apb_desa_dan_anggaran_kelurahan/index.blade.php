@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Pemerintahan Desa dan Kelurahan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">APB-Desa dan Anggaran Kelurahan</a></li>
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
                                    <th>APBD Kabupaten/Kota (Rp)</th>
                                    <th>Bantuan Pemerintah Kabupaten/Kota (Rp)</th>
                                    <th>Bantuan Pemerintah Provinsi (Rp)</th>
                                    <th>Bantuan Pemerintah Pusat (Rp)</th>
                                    <th>Pendapatan Asli Desa (Rp)</th>
                                    <th>Swadaya Masyarakat Desa dan Kelurahan (Rp)</th>
                                    <th>Alokasi Dana Desa (Rp)</th>
                                    <th>Sumber Pendapatan dari Perusahaan yang ada di desa/kelurahan (Rp)</th>
                                    <th>Sumber pendapatan lain yang sah dan tidakmengikat (Rp)</th>
                                    <th>Jumlah Penerimaan Desa/Kelurahan tahun ini (Rp)</th>
                                    <th>Jumlah Belanja Publik/belanja pembangunan (Rp)</th>
                                    <th>Jumlah Belanja Aparatur/pegawai (Rp)</th>
                                    <th>Jumlah Belanja (Rp)</th>
                                    <th>Saldo Anggaran (Rp)</th>
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
                                        <td class="text-right">{{ $value->data['ac1e34b29f3d5'] }}</td>
                                        <td class="text-right">{{ $value->data['5f2b8c1d9a6e7'] }}</td>
                                        <td class="text-right">{{ $value->data['4c2d5e6f1a3b'] }}</td>
                                        <td class="text-right">{{ $value->data['9d2e3f4a5b6c'] }}</td>
                                        <td class="text-right">{{ $value->data['7e8f1c3d4b5a'] }}</td>
                                        <td class="text-right">{{ $value->data['6a7b8c9d1e2f'] }}</td>
                                        <td class="text-right">{{ $value->data['5b6c7d8e9f1a'] }}</td>
                                        <td class="text-right">{{ $value->data['8c9d1a2b3e4f'] }}</td>
                                        <td class="text-right">{{ $value->data['2d3e4f5a6b7'] }}</td>
                                        <td class="text-right">{{ $value->data['3e4f5a6b7c8'] }}</td>
                                        <td class="text-right">{{ $value->data['f1e2d3c4b5a6'] }}</td>
                                        <td class="text-right">{{ $value->data['7d8e9f1a2b3'] }}</td>
                                        <td class="text-right">{{ $value->data['4e5f6a7b8c9'] }}</td>
                                        <td class="text-right">{{ $value->data['1d2e3f4a5b6'] }}</td>
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
