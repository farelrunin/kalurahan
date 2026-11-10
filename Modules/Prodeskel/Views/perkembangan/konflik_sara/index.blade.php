@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Konflik SARA</a></li>
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
                                    <th nowrap>Kasus konflik pada tahun ini</th>
                                    <th nowrap>Kasus konflik SARA pada tahun ini</th>
                                    <th nowrap>Jumlah kasus pertengkaran dan atau perkelahian antar tetangga</th>
                                    <th nowrap>Jumlah kasus pertengkaran dan atau perkelahian antar RT/RW</th>
                                    <th nowrap>Jumlah konflik antar masyarakat pendatang dengan penduduk asli</th>
                                    <th nowrap>Jumlah kasus antar kelompok masyarakat dalam desa/kelurahan dengan kelompok
                                        masyarakat dari desa/kelurahan lain</th>
                                    <th nowrap>Jumlah konflik antara masyarakat dengan pemerintah</th>
                                    <th nowrap>Jumlah kerugian material akibat konflik antara masyarakat dan pemerintah</th>
                                    <th nowrap>Jumlah korban jiwa akibat konflik antara masyarakat dengan pemerintah</th>
                                    <th nowrap>Jumlah konflik antara masyarakat dengan perusahaan</th>
                                    <th nowrap>Jumlah korban jiwa akibat konflik antara masyarakat dengan perusahaan</th>
                                    <th nowrap>Jumlah kerugian material akibat konflik antara masyarakat dan perusahaan</th>
                                    <th nowrap>Jumlah konflik politik antara masyarakat dengan lembaga politik</th>
                                    <th nowrap>Jumlah korban jiwa akibat konflik politik antara masyarakat dengan lembaga
                                        politik</th>
                                    <th nowrap>Jumlah kerugian material akibat konflik politik antara masyarakat dengan
                                        lembaga politik</th>
                                    <th nowrap>Jumlah prasaranan dan sarana yang rusak/terbakar akibat konflik Sara</th>
                                    <th nowrap>Jumlah rumah penduduk yang rusak/terbakar akibat konflik Sara</th>
                                    <th nowrap>Jumlah korban luka akibat konflik Sara</th>
                                    <th nowrap>Jumlah korban meninggal akibat konflik Sara</th>
                                    <th nowrap>Jumlah janda akibat konflik Sara</th>
                                    <th nowrap>Jumlah anak yatim akibat konflik Sara</th>
                                    <th nowrap>Jumlah pelaku konflik yang diadili atau diproses secara hukum</th>
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
                                        <td class="text-right">{{ $value->data['konflik_tahun_ini'] }}</td>
                                        <td class="text-right">{{ $value->data['konflik_sara_tahun_ini'] }}</td>
                                        <td class="text-right">{{ $value->data['kasus_antar_tetangga'] }}</td>
                                        <td class="text-right">{{ $value->data['kasus_antar_rt'] }}</td>
                                        <td class="text-right">{{ $value->data['konflik_masyarakat_penduduk'] }}</td>
                                        <td class="text-right">{{ $value->data['kasus_kelompok_masyarakat'] }}</td>
                                        <td class="text-right">{{ $value->data['konflik_masyarakat_pemerintah'] }}</td>
                                        <td class="text-right">{{ $value->data['kerugian_masyarakat_pemerintah'] }}</td>
                                        <td class="text-right">{{ $value->data['korban_masyarakat_pemerintah'] }}</td>
                                        <td class="text-right">{{ $value->data['konflik_masyarakat_perusahaan'] }}</td>
                                        <td class="text-right">{{ $value->data['korban_masyarakat_perusahaan'] }}</td>
                                        <td class="text-right">{{ $value->data['kerugian_masyarakat_perusahaan'] }}</td>
                                        <td class="text-right">{{ $value->data['konflik_masyarakat_politik'] }}</td>
                                        <td class="text-right">{{ $value->data['korban_masyarakat_politik'] }}</td>
                                        <td class="text-right">{{ $value->data['kerugian_masyarakat_politik'] }}</td>
                                        <td class="text-right">{{ $value->data['sarpras_rusak'] }}</td>
                                        <td class="text-right">{{ $value->data['rumah_terbakar'] }}</td>
                                        <td class="text-right">{{ $value->data['korban_luka'] }}</td>
                                        <td class="text-right">{{ $value->data['korban_meninggal'] }}</td>
                                        <td class="text-right">{{ $value->data['janda'] }}</td>
                                        <td class="text-right">{{ $value->data['anak_yatim'] }}</td>
                                        <td class="text-right">{{ $value->data['pelaku'] }}</td>
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
