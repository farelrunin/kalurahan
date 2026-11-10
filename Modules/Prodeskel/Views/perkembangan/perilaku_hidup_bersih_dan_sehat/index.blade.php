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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Perilaku Hidup Bersih dan Sehat</a></li>
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
                                    <th>Jumlah keluarga memiliki WC yang sehat</th>
                                    <th>Jumlah keluarga memiliki WC yang kurang memenuhi standar kesehatan</th>
                                    <th>Jumlah keluarga biasa buang air besar di sungai/parit/kebun/hutan</th>
                                    <th>Jumlah keluarga yang menggunakan fasilitas MCK umum</th>
                                    <th>Kebiasaan penduduk makan dlm sehari 1 kali</th>
                                    <th>Kebiasaan penduduk makan sehari 2 kali</th>
                                    <th>Kebiasaan penduduk makan sehari 3 kali</th>
                                    <th>Kebiasaan penduduk makan sehari lebih dari 3 kali</th>
                                    <th>Penduduk yang belum tentu sehari makan 1 kali</th>
                                    <th>Dukun Terlatih</th>
                                    <th>Dokter/puskesmas/mantri kesehatan/perawat/bidan/posyandu</th>
                                    <th>Obat tradisional dari dukun pengobatan alternatif</th>
                                    <th>Paranormal</th>
                                    <th>Obat tradisional dari keluarga sendiri</th>
                                    <th>Tidak diobati</th>
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
                                        <td class="text-right">{{ $value->data['jumlah_keluarga_memiliki_wc_yang_sehat'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_dalam_sehari_1_kali']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_sehari_2_kali']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_sehari_3_kali']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\TidakAdaEnum::valueOf($value->data['penduduk_yang_belum_tentu_sehari_makan_1_kali']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['dukun_terlatih']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['obat_tradisional_dari_dukun_pengobatan_alternatif']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['paranormal']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['obat_tradisional_dari_keluarga_sendiri']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\BanyakEnum::valueOf($value->data['tidak_diobati']) }}
                                        </td>
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
