]@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Pemerintahan Desa dan Kelurahan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan Pemerintah Provinsi</a></li>
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
                                    <th>Pedoman pelaksanaan tugas pembantuan dari provinsi ke desa/kelurahan</th>
                                    <th>Pedoman bantuan keuangan dari provinsi</th>
                                    <th>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat
                                        dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan pemerintahan
                                        desa/kelurahan</th>
                                    <th>Fasilitasi Pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala
                                        desa dan lurah</th>
                                    <th>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa
                                        dan kelurahan berskala provinsi</th>
                                    <th>Kegiatan penanggulangan kemiskinan yang dibiayai APBD Provinsi yang masuk desa dan
                                        kelurahan</th>
                                    <th>Kegiatan penanganan bencana yang dibiayai APBD Provinsi untuk desa dan kelurahan
                                    </th>
                                    <th>Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD Provinsi di desa dan
                                        kelurahan</th>
                                    <th>Kegiatan penyediaan sarana dan prasarana desa dan kelurahan yang dibiayai APBD
                                        Provinsi yang masuk desa dan kelurahan</th>
                                    <th>Kegiatan pemanfaatan sumber daya alam dan pengembangan teknologi tepat guna yang
                                        dibiayai APBD Provinsi di desa dan kelurahan</th>
                                    <th>Kegiatan pengembangan sosial budaya masyarakat</th>
                                    <th>Pedoman pendataan dan pendayagunaan data profil desa dan kelurahan</th>
                                    <th>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat
                                        masing-masing</th>
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
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1005b160e3f22']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['50d9f91a97220']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['59948998e7025']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['76a507d1c90a0']) }}</td>
                                        <td align="right">{{ $value->data['bea54f5e0ba2c'] }}</td>
                                        <td align="right">{{ $value->data['aba260e5a36cb'] }}</td>
                                        <td align="right">{{ $value->data['9b1d9204efafe'] }}</td>
                                        <td align="right">{{ $value->data['a4a4fa2014f3a'] }}</td>
                                        <td align="right">{{ $value->data['03019b8a5fb24'] }}</td>
                                        <td align="right">{{ $value->data['fb318be147185'] }}</td>
                                        <td align="right">{{ $value->data['9a8f6b01f383a'] }}</td>
                                        <td align="right">{{ $value->data['1127ed873f26b'] }}</td>
                                        <td align="right">{{ $value->data['1dad44d3e5c1d'] }}</td>
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
