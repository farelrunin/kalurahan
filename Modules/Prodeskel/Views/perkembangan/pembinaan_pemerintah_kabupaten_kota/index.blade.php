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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan Pemerintah Kabupaten/Kota</a>
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
                                    <th>Pelimpahan tugas Bupati/Walikota kepada Lurah dan Kepala Desa</th>
                                    <th>Penetapan pengaturan kewenangan kabupaten/kota yang diserahkan pengaturannya kepada
                                        desa</th>
                                    <th>Pedoman pelaksanaan tugas pembantuan dari kabupaten/kota kepada desa</th>
                                    <th>Pedoman teknis penyusunan peraturan desa, peraturan kepala desa, keputusan Lurah dan
                                        peraturan daerah kepada kepala desa dan lurah</th>
                                    <th>Pedoman teknis penyusunan perencanaan pembangunan partisipatif serta pengembangan
                                        lembaga kemasyarakatan desa dan kelurahan</th>
                                    <th>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat
                                        dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan pemerintahan
                                        desa/kelurahan</th>
                                    <th>Penetapan pembiayaan alokasi dana perimbangan untuk desa</th>
                                    <th>Fasilitasi Pelaksanaan pedoman administrasi, tata naskah dan pelaporan bagi kepala
                                        desa dan lurah</th>
                                    <th>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa
                                        dan kelurahan berskala kabupaten/kota</th>
                                    <th>Kegiatan penanggulangan kemiskinan yang dibiayai APBD kabupaten/kota yang masuk desa
                                        dan kelurahan</th>
                                    <th>Kegiatan penanganan bencana yang dibiayai APBD kabupaten/kota untuk desa dan
                                        kelurahan</th>
                                    <th>Kegiatan peningkatan pendapatan keluarga yang dibiayai APBD kabupaten/kota di desa
                                        dan kelurahan</th>
                                    <th>Fasilitasi penetapan pedoman dan standar tanda jabatan, pakaian dinas dan atribut
                                        bagi Kepala Desa, Lurah, Perangkat Desa/Kelurahan dan BPD</th>
                                    <th>Kegiatan fasilitasi keberadaan kesatuan masyarakat hukum adat, nilai adat istiadat
                                        dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan pemerintahan
                                        desa/kelurahan</th>
                                    <th>Pedoman pendataan dan pendayagunaan profil desa dan kelurahan</th>
                                    <th>Program dan kegiatan pemeliharaan motivasi desa/kelurahan berprestasi
                                        pascaperlombaan desa dan kelurahan</th>
                                    <th>Pemberian penghargaan atas prestasi yang dicapai pemerintahan desa dan kelurahan
                                        dalam penyelenggaraan pemerintahan dan pemberdayaan lembaga kemasyarakatan</th>
                                    <th>Pemberian sanksi atas penyimpangan yang dilakukan kepala desa, lurah dan perangkat
                                        masing-masing</th>
                                    <th>Mengawasi pengelolaan keuangan desa serta anggaran kelurahan dan pendayagunaan aset
                                        pemerintahan desa, badan usaha milik desa dan sumber pendapatan daerah yang dikelola
                                        lurah</th>
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
                                        <td align="right">{{ $value->data['1dad44d3e5c1d'] }}</td>
                                        <td align="right">{{ $value->data['2e98a743fbc2e'] }}</td>
                                        <td align="right">{{ $value->data['3c7b01a5de8f3'] }}</td>
                                        <td align="right">{{ $value->data['4f6e32b4a91d2'] }}</td>
                                        <td align="right">{{ $value->data['543df8c2e7a5b'] }}</td>
                                        <td align="right">{{ $value->data['6a2bc957d3e4f'] }}</td>
                                        <td align="right">{{ $value->data['7f9a81e632bd1'] }}</td>
                                        <td align="right">{{ $value->data['8954c3de1ab2e'] }}</td>
                                        <td align="right">{{ $value->data['9d7c5e1a3b2f4'] }}</td>
                                        <td align="right">{{ $value->data['a4fb92c6e5d1a'] }}</td>
                                        <td align="right">{{ $value->data['b8dc4f63e2a1d'] }}</td>
                                        <td align="right">{{ $value->data['c7eab19d3f2a4'] }}</td>
                                        <td align="right">{{ $value->data['d3bfc6a9e2d4f'] }}</td>
                                        <td align="right">{{ $value->data['e5ac9f2d3b1e4'] }}</td>
                                        <td align="right">{{ $value->data['f1c32d9ea5b7d'] }}</td>
                                        <td align="right">{{ $value->data['g8b9a23f1c6d5'] }}</td>
                                        <td align="right">{{ $value->data['h6e5fbc3d9a2d'] }}</td>
                                        <td align="right">{{ $value->data['i4f3b91e8d2c7'] }}</td>
                                        <td align="right">{{ $value->data['j2a9bd1f6c8e5'] }}</td>
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
