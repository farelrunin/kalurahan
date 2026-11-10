@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Pendidikan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Tingkat Pendidikan Masyarakat</a></li>
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
                                    <th nowrap>Jumlah penduduk buta aksara dan huruf latin (Orang)</th>
                                    <th nowrap>Jumlah penduduk usia 3-6 tahun yang masuk TK dan Kelompok Bermain Anak
                                        (Orang)</th>
                                    <th nowrap>Jumlah anak dan penduduk cacat fisik dan mental (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang SD/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat SD/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk tidak tamat SD/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang SLTP/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat SLTP/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang SLTA/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk tidak tamat SLTP/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat SLTA/sederajat (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang D-1 (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat D-2 (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang D-3 (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat D-3 (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang S-1 (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat S-1 (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang S-2 (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat S-2 (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat S-3 (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang SLB A (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat SLB A (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang SLB B (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat SLB B (Orang)</th>
                                    <th nowrap>Jumlah penduduk sedang SLB C (Orang)</th>
                                    <th nowrap>Jumlah penduduk tamat SLB C (Orang)</th>
                                    <th nowrap>Jumlah penduduk cacat fisik dan mental (Orang)</th>
                                    <th nowrap>Jumlah penduduk Buta huruf (%)</th>
                                    <th nowrap>Jumlah penduduk tamat SLTP/sederajat (%)</th>
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
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_buta_aksara_dan_huruf_latin'] }}
                                        </th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_anak_dan_penduduk_cacat_fisik_dan_mental'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_sdsederajat'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_sdsederajat'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tidak_tamat_sdsederajat'] }}
                                        </th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_sltpsederajat'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_sltpsederajat'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_slta_sederajat'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tidak_tamat_sltpsederajat'] }}
                                        </th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_slta_sederajat'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_d1'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_d2'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_d3'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_d3'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_s1'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_s1'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_s2'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_s2'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_s3'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_slb_a'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_slb_a'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_slb_b'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_slb_b'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_sedang_slb_c'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_slb_c'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_cacat_fisik_dan_mental'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_buta_huruf'] }}</th>
                                        <th class="text-right">{{ $value->data['jumlah_penduduk_tamat_sltpsederajat_dua'] }}
                                        </th>
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
