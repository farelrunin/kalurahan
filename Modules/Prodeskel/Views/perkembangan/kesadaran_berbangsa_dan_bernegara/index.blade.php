@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Kedaulatan Politik Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kesadaran Berbangsa dan Bernegara</a>
    </li>
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
                                    <th>Jenis kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara</th>
                                    <th>Jumlah kegiatan pemantapan nilai Ideologi Pancasila sebagai Dasar Negara</th>
                                    <th>Jenis-jenis kegiatan pemantapan nilai Bhinneka Tunggal Ika</th>
                                    <th>Jumlah kegiatan pemantapan nilai Bhinneka Tunggal Ika</th>
                                    <th>Jenis kegiatan pemantapan kesatuan bangsa lainnya</th>
                                    <th>Jumlah kegiatan pemantapan kesatuan bangsa lainnya</th>
                                    <th>Jumlah kasus warga desa/kelurahan yang minta suaka/lari ke luarnegeri</th>
                                    <th>Jumlah warga yang melintasi perbatasan ke negara tetangga secara resmi</th>
                                    <th>Jumlah warga yang melintasi perbatasan negara tetangga secara tidak resmi</th>
                                    <th>Jumlah kasus pertempuran atau perlawanan antar kelompok pengacau keamanan di
                                        perbatasan negara dengan warga/aparat dari desa/kelurahan</th>
                                    <th>Jumlah serangan terhadap fasilitas umum dan milik masyarakat oleh kelompok pengacau
                                        di desa/kelurahan perbatasan negara tetangga</th>
                                    <th>pengacau keamanan di perbatasan negara dengan warga/aparat dari desa/kelurahan</th>
                                    <th>Jumlah serangan terhadap fasilitas umum dan milik masyarakat oleh kelompok pengacau
                                        di desa/kelurahan perbatasan negara tetangga</th>
                                    <th>Jumlah kasus yang diklasifikasikan merongrong keutuhan NKRI dan Kesatuan Bangsa
                                        Indonesia di desa/kelurahan tahun ini</th>
                                    <th>Jumlah korban manusia baik luka maupun tewas serta korban materi lainnya akibat
                                        serangan kelompok pengacau keamanan</th>
                                    <th>Jumlah masalah ketenagakerjaan di perbatasan antar negara yang terjadi tahun ini
                                    </th>
                                    <th>Jumlah kasus kejahatan pencurian, penjarahan, perampokan dan intimidasi serta teror
                                        yang terjadi di desa/kelurahan perbatasan antar negara</th>
                                    <th>Jumlah sengketa perbatasan antar negara yang terjadi desa/kelurahan ini</th>
                                    <th>Jumlah kasus sengketa perbatasan yang terjadi baik antar desa/kelurahan dalam
                                        kecamatan maupun antar kecamatan, antar kabupaten/kota dan desa/kelurahan antar
                                        provinsi</th>
                                    <th>Jumlah kasus yang terkait dengan perbatasan antar negara yang dilaporkan Kepala
                                        Desa/Lurah ke pemerintah tingkat atasnya</th>
                                    <th>Jumlah kasus yang mengarah kepada tindakan disintegrasi bangsa dan pengingkaran
                                        NKRI, Pancasila, UUD 1945 dan Bhinneka Tunggal Ika yang difasilitasi penyelesaiannya
                                        oleh Kepala Desa/Lurah</th>
                                    <th>Jumlah kasus penangkapan nelayan asing di wilayah perairan desa/kelurahan</th>
                                    <th>Jumlah kasus penangkapan nelayan/petani/peternak/pekebun/perambah hutan asal
                                        desa/kelurahan di perairan dan daratan wilayah negara lain</th>
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
                                        <td class="text-right">{{ $value->data['7a2891c06625f'] }}</td>
                                        <td class="text-right">{{ $value->data['af23bc98e4d57'] }}</td>
                                        <td class="text-right">{{ $value->data['1b4c3d82e5f96'] }}</td>
                                        <td class="text-right">{{ $value->data['c6a7d8e2b9f34'] }}</td>
                                        <td class="text-right">{{ $value->data['5e4a3b2c1d8f9'] }}</td>
                                        <td class="text-right">{{ $value->data['92c3b5e7d8f1a'] }}</td>
                                        <td class="text-right">{{ $value->data['6b7c2d8e1f9a3'] }}</td>
                                        <td class="text-right">{{ $value->data['3a4b5c2d8f1e9'] }}</td>
                                        <td class="text-right">{{ $value->data['8d1e4f7c2b9a6'] }}</td>
                                        <td class="text-right">{{ $value->data['5a2b8c3d4f1e9'] }}</td>
                                        <td class="text-right">{{ $value->data['4b6c9d1e2f3a5'] }}</td>
                                        <td class="text-right">{{ $value->data['d5a6b7c3e8f2'] }}</td>
                                        <td class="text-right">{{ $value->data['6c2d3e4a5b8f'] }}</td>
                                        <td class="text-right">{{ $value->data['1a3b4c6d8e5f'] }}</td>
                                        <td class="text-right">{{ $value->data['9c2d4e6f8a1b'] }}</td>
                                        <td class="text-right">{{ $value->data['5d3e4f6a7b1c'] }}</td>
                                        <td class="text-right">{{ $value->data['2e3f4c5d6b7a'] }}</td>
                                        <td class="text-right">{{ $value->data['1d4e5f7b8c2a'] }}</td>
                                        <td class="text-right">{{ $value->data['a3b4c5e6f8d9'] }}</td>
                                        <td class="text-right">{{ $value->data['4c5d7e8f2a3b'] }}</td>
                                        <td class="text-right">{{ $value->data['b2c3d5e7f8a1'] }}</td>
                                        <td class="text-right">{{ $value->data['1d3e5f6a7c9b'] }}</td>
                                        <td class="text-right">{{ $value->data['9a8b2c3d4e5f'] }}</td>
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
