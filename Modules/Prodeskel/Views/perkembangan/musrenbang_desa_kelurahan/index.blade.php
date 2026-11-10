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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Musrenbang Desa/Kelurahan</a></li>
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
                                    <th>Jumlah musyawarah perencanaan pembangunan tingkat Desa/Kelurahan yang dilakukan pada
                                        tahun ini, termasuk di tingkat dusun dan lingkungan</th>
                                    <th>Jumlah kehadiran masyarakat dalam setiap kali musyawarah tingkat dusun/lingkungan
                                        dan desa/kelurahan</th>
                                    <th>Jumlah peserta laki-laki dalam Musrenbang di desa/kelurahan</th>
                                    <th>Jumlah peserta perempuan dalam Musrenbang di desa dan kelurahan</th>
                                    <th>Jumlah Musyawarah Antar Desa dalam perencanaan pembangunan yang dikoordinasikan
                                        Kecamatan</th>
                                    <th>Penggunaan Profil Desa/Kelurahan sebagai sumber data dasar yang digunakan dalam
                                        perencanaan pembangunan desa dan forum Musrenbang Partisipatif</th>
                                    <th>Penggunaan data BPS dan data sektoral dalam perencanaan pembangunan partisipatif dan
                                        Musrenbang di desa dan kelurahan</th>
                                    <th>Pelibatan masyarakat dalam pemutakhiran data profil desa dan kelurahan sebagai bahan
                                        dalam Musrenbang partisipatif</th>
                                    <th>Usulan masyarakat yang disetujui menjadi Rencana Kerja Desa dan Kelurahan</th>
                                    <th>Usulan Pemerintah Desa dan Kelurahan yang disetujui menjadi Rencana Kerja
                                        Desa/Kelurahan dan dimuat dalam RAPB-Desa</th>
                                    <th>Usulan rencana kerja program dan kegiatan dari pemerintah kabupaten/kota/provinsi
                                        dan pusat yang dibahas saat Musrenbang dan disetujui untuk dilaksanakan di desa dan
                                        kelurahan oleh masyarakat dan lembaga kemasyarakatan desa/kelurahan</th>
                                    <th>Penggunaan data BPS dan data sektoral dalam perencanaan pembangunan partisipatif dan
                                        Musrenbang di desa dan kelurahan</th>
                                    <th>Pelibatan masyarakat dalam pemutakhiran data profil desa dan kelurahan sebagai bahan
                                        dalam Musrenbang partisipatif</th>
                                    <th>Usulan masyarakat yang disetujui menjadi Rencana Kerja Desa dan Kelurahan</th>
                                    <th>Usulan Pemerintah dan Kelurahan yang disetujui menjadi Rencana Kerja Desa/Kelurahan
                                        dan dimuat dalam RAPB-Desa</th>
                                    <th>Usulan rencana kerja program dan kegiatan dari pemerintah kabupaten/kota/provinsi
                                        dan pusat yang dibahas saat Musrenbang dan disetujui untuk dilaksanakan di desa dan
                                        kelurahan oleh masyarakat dan lembaga kemasyarakatan desa/kelurahan</th>
                                    <th>Usulan rencana kerja pemerintah tingkat atas yang ditolak dalam Musrenbangdes/kel
                                    </th>
                                    <th>Pemilikan dokumen Rencana Kerja Pembangunan Desa/Kelurahan (RKPD/K)</th>
                                    <th>Pemilikan Rencana Pembangunan Jangka Menengah Desa/Kelurahan (RPJMD/K)</th>
                                    <th>Pemilikan dokumen hasil Musrenbang tingkat Desa dan Kelurahan yang diusulkan ke
                                        pemerintah tingkat atas untuk dibiayai dari APBD Kab/Kota, APBD Provinsi dan APBN
                                        maupun sumber biaya dari perusahaan swasta yang investasi di desa/kelurahan</th>
                                    <th>Jumlah kegiatan yang diusulkan masyarakat melalui forum Musrenbangdes/kel yang tidak
                                        direalisasikan dalam APB-Desa, APB-Daerah Kabupaten/Kota dan Provinsi</th>
                                    <th>Jumlah kegiatan yang diusulkan masyarakat melalui forum Musrenbangdes/kel yang
                                        pelaksanaannya tidak sesuai dengan hasil Musrenbang</th>
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
                                        <td class="text-right">{{ $value->data['jumlah_musyawarah'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kehadiran'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_laki'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_perempuan'] }}</td>
                                        <td class="text-right">{{ $value->data['musyawarah_desa'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['penggunaan_profil']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['penggunaan_data']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['pelibatan_masyarakat']) }}
                                        </td>
                                        <td class="text-right">{{ $value->data['usulan_masyarakat'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_pemerintah'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_rencana'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['penggunaan_data_bps']) }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\YaEnum::valueOf($value->data['pelibatan_masyarakat_rencana']) }}</td>
                                        <td class="text-right">{{ $value->data['usulan_masyarakat_setuju'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_pemerintah_setuju'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_rencana_setuju'] }}</td>
                                        <td class="text-right">{{ $value->data['usulan_rencana_ditolak'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pemilik_dokumen']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pemilik_rencana']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pemilik_dokumen_hasil']) }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_a'] }}</td>
                                        <td class="text-right">{{ $value->data['jumlah_kegiatan_b'] }}</td>
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
