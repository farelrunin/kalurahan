@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pasangan Usia Subur dan KB</a></li>
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
                                    <th rowspan="2" class="padat">No</th>
                                    <th rowspan="2" class="padat" style="min-width: 120px">Aksi</th>
                                    <th rowspan="2">Bulan</th>
                                    <th rowspan="2">Tahun</th>
                                    <th rowspan="2">Tanggal</th>
                                    <th colspan="4" class="text-center">Pasangan Usia Subur</th>
                                    <th colspan="11" class="text-center">Keluarga Berencana</th>
                                </tr>
                                <tr>
                                    <th nowrap>Jumlah remaja putri usia 12 - 17 tahun</th>
                                    <th nowrap>Jumlah perempuan usia subur 15-49 tahun</th>
                                    <th nowrap>Jumlah wanita kawin muda usia kurang dari 16 tahun</th>
                                    <th nowrap>Jumlah pasangan usia subur (Pasangan)</th>
                                    <th nowrap>Jumlah pengguna alat kontrasepsi suntik</th>
                                    <th nowrap>Jumlah pengguna metode kontrasepsi spiral</th>
                                    <th nowrap>Jumlah pengguna alat kontrasepsi kondom</th>
                                    <th nowrap>Jumlah pengguna metode kontrasepsi pil</th>
                                    <th nowrap>Jumlah pengguna metode vasektomi</th>
                                    <th nowrap>Jumlah pengguna metode kontrasepsi tubektomi</th>
                                    <th nowrap>Jumlah pengguna metode KB Kelender/KB Alamiah</th>
                                    <th nowrap>Jumlah pengguna metode KB obat tradisional</th>
                                    <th nowrap>Jumlah pengguna alat kontrasepsi metode lainnya</th>
                                    <th nowrap>Jumlah Akseptor KB</th>
                                    <th nowrap>Jumlah PUS yang tidak menggunakan metode KB</th>
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
                                        <td class="text-right">{{ $value->data['remaja_putri_usia_12_17_tahun'] }}</td>
                                        <td class="text-right">{{ $value->data['perempuan_usia_subur_15_49_tahun'] }}</td>
                                        <td class="text-right">{{ $value->data['wanita_kawin_muda_usia_kurang_dari_16_tahun'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['pasangan_usia_subur_pasangan'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_alat_kontrasepsi_suntik'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_metode_kontrasepsi_spiral'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_alat_kontrasepsi_kondom'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_metode_kontrasepsi_pil'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_metode_vasektomi'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_metode_kontrasepsi_tubektomi'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_metode_kb_kelender_kb_alamiah'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_metode_kb_obat_tradisional'] }}</td>
                                        <td class="text-right">{{ $value->data['pengguna_alat_kontrasepsi_metode_lainnya'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_kb'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_pus'] }}</td>
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
