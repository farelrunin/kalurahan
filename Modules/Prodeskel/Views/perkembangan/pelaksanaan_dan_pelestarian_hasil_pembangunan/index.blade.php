@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Peranserta Masyarakat dalam Pembangunan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pelaksanaan dan Pelestarian Hasil Pembangunan</a></li>
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
                                    <th>Jumlah masyarakat yang terlibat dalam pelaksanaan pembangunan fisik di desa dan
                                        kelurahan sesuai hasil Musrenbang</th>
                                    <th>Jumlah penduduk yang dilibatkan dalam pelaksanaan proyek padat karya oleh pengelola
                                        proyek yang ditunjuk pemerintah desa/kelurahan dan kabupaten/kota</th>
                                    <th>Jumlah kegiatan yang dilaksanakan oleh masyarakat dan lembaga kemasyarakatan
                                        desa/kelurahan yang sudah ada sesuai ketetapan dalam APB-Desa</th>
                                    <th>Jumlah kegiatan yang dilaksanakan oleh pihak ketiga tanpa melibatkan masyarakat
                                        sesuai ketentuan dalam APB-Daerah</th>
                                    <th>Jumlah kegiatan yang masuk desa/kelurahan di luar yang telah direncakanan dan
                                        disepakati masyarakat dalam Musrenbang</th>
                                    <th>Usulan masyarakat yang disetujui menjadi Rencana Kerja Desa dan Kelurahan</th>
                                    <th>Usulan Pemerintah Desa dan Kelurahan yang disetujui menjadi Rencana Kerja
                                        Desa/Kelurahan</th>
                                    <th>Usulan rencana kerja program dan kegiatan dari pemerintah kabupaten/kota/provinsi
                                        dan pusat yang dibahas saat Musrenbang dan disetujui untuk dilaksanakan di desa dan
                                        kelurahan oleh masyrakat</th>
                                    <th>Penyelenggaraan musyawarah desa/kelurahan untuk menerima, memelihara, dan
                                        melestarikan hasil pembangunan yang sudah ada</th>
                                    <th>Pelaksanaan kegiatan dari masyarakat untuk menyelesaikan atau menindaklanjuti
                                        kegiatan yang belum diselesaikan oleh pelaksana sebelumnya</th>
                                    <th>Jumlah kasus penyimpangan pelaksanaan kegiatan pembangunan yang dilaporkan
                                        masyarakat atau lembaga kemasyarakatan desa/kelurahan kepada Kepala Desa/Lurah</th>
                                    <th>Jumlah kasus penyimpangan pelaksaan pembangunan yang diselesaikan di tingkat
                                        desa/kelurahan</th>
                                    <th>Jumlah kasus penyimpangan pelaksanaan kegiatan pembangunan desa/kelurahan yang
                                        diselesaikan secara hukum</th>
                                    <th>Jenis kegiatan masyarakat untuk melestarikan hasil pembangunan yang dikoordinasikan
                                        pemerintah desa/kelurahan</th>
                                    <th>Jumlah kegiatan yang didanai dari APB-Desa dan swadaya masyarakat di kelurahan</th>
                                    <th>Jumlah kegiatan di desa/kelurahan yang didanai dari APB Daerah Kabupaten/Kota</th>
                                    <th>Jumlah kegiatan di desa/kelurahan yang didanai dari APBD Provinsi</th>
                                    <th>Jumlah kegiatan di desa dan kelurahan yang didanai APBN</th>
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
                                        <td class="text-right">{{ $value->data['jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pelaksanaa_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya']) }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum'] }}</td>
                                        <td class="text-right">{{ $value->data['jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi'] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN'] }}</td>
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
