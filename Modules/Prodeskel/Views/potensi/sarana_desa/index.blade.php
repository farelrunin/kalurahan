@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.saranaDesa') }}">Desa/Kelurahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'sarana_desa'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.saranaDesa.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.saranaDesa.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.saranaDesa.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th>Gedung Kantor</th>
                                    <th>Jumlah Ruang Kerja (Ruang)</th>
                                    <th>Kondisi</th>
                                    <th>Balai Desa/Kelurahan/Sejenisnya</th>
                                    <th>Listrik</th>
                                    <th>Air Bersih</th>
                                    <th>Telepon</th>
                                    <th>Rumah Dinas Kepala Desa/Lurah</th>
                                    <th>Rumah Dinas Perangkat</th>
                                    <th>Fasilitas Lainnya</th>
                                    <th>Mesin Tik (Buah)</th>
                                    <th>Meja (Buah)</th>
                                    <th>Kursi (Buah)</th>
                                    <th>Lemari Arsip (Buah)</th>
                                    <th>Komputer (Unit)</th>
                                    <th>Mesin Fax (Unit)</th>
                                    <th>Kendaraan Dinas (Unit)</th>
                                    <th>Buku Data Peraturan Desa</th>
                                    <th>Buku Keputusan Kepala Desa Lurah</th>
                                    <th>Buku Administrasi Kependudukan</th>
                                    <th>Buku Data Inventaris</th>
                                    <th>Buku Data Aparat</th>
                                    <th>Buku Data Tanah Kas Desa</th>
                                    <th>Buku Administrasi Pajak dan Retribusi</th>
                                    <th>Buku Data Tanah</th>
                                    <th>Buku Laporan Pengaduan Masyarakat</th>
                                    <th>Buku Agenda Ekspedisi</th>
                                    <th>Buku Profil Desa dan Kelurahan</th>
                                    <th>Buku Data Induk Penduduk</th>
                                    <th>Buku Data Mutasi Penduduk</th>
                                    <th>Buku Rekapitulasi Penduduk Akhir Bulan</th>
                                    <th>Buku Registrasi Pelayanan Penduduk</th>
                                    <th>Buku Data Penduduk Sementara</th>
                                    <th>Buku Anggaran Penerimaan</th>
                                    <th>Buku Anggaran Pengeluaran Pegawai Pembangunan</th>
                                    <th>Buku Kas Umum</th>
                                    <th>Buku Kas Pembantu Penerimaan</th>
                                    <th>Buku Kas Pembantu Pengeluaran Rutin/Pembangunan</th>
                                    <th>Buku Data Lembaga Kemasyarakatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $item)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.saranaDesa.show', $item->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.saranaDesa.form', $item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $item->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.saranaDesa.delete', $item->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $item->data['tanggal'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['gedung_kantor']) }}</td>
                                        <td align="right">{{ $item->data['jumlah_ruang_kerja_ruang'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\RusakEnum::valueOf($item->data['kondisi']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['balai_desa_kelurahan_sejenisnya']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['listrik']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['air_bersih']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['telepon']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['rumah_dinas_kepala_desa_lurah']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['rumah_dinas_perangkat']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['fasilitas_lainnya']) }}
                                        </td>
                                        <td align="right">{{ $item->data['mesin_tik_buah'] }}</td>
                                        <td align="right">{{ $item->data['meja_buah'] }}</td>
                                        <td align="right">{{ $item->data['kursi_buah'] }}</td>
                                        <td align="right">{{ $item->data['lemari_arsip_buah'] }}</td>
                                        <td align="right">{{ $item->data['komputer_unit'] }}</td>
                                        <td align="right">{{ $item->data['mesin_fax_unit'] }}</td>
                                        <td align="right">{{ $item->data['kendaraan_dinas_unit'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_peraturan_desa']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_keputusan_kepala_desa_lurah']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_administrasi_kependudukan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_inventaris']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_aparat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_tanah_kas_desa']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_administrasi_pajak_dan_retribusi']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_tanah']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_laporan_pengaduan_masyarakat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_agenda_ekspedisi']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_profil_desa_dan_kelurahan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_induk_penduduk']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_mutasi_penduduk']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_rekapitulasi_penduduk_akhir_bulan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_registrasi_pelayanan_penduduk']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_penduduk_sementara']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_anggaran_penerimaan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_anggaran_pengeluaran_pegawai_pembangunan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_kas_umum']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_kas_pembantu_penerimaan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_kas_pembantu_pengeluaran_rutin_pembangunan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\IsiEnum::valueOf($item->data['buku_data_lembaga_kemasyarakatan']) }}</td>
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
