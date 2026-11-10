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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan Pemerintah Pusat</a></li>
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
                                    <th>Pedoman dan standar pelaksanaan urusan pemerintahan desa, kelurahan, lembaga
                                        kemasyarakatan</th>
                                    <th>Pedoman dan standar bantuan pembiayaan dari pemerintah, pemerintah provinsi dan
                                        kabupaten/kota kepada desa dan kelurahan</th>
                                    <th>Pedoman umum administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</th>
                                    <th>Pedoman dan standar tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa, Lurah
                                        dan Perangkat Desa/Kelurahan serta BPD</th>
                                    <th>Pedoman pendidikan dan pelatihan bagi pemerintahan desa, kelurahan, lembaga
                                        kemasyarakatan dan perangkat masing-masing</th>
                                    <th>Jumlah bimbingan, supervisi dan konsultasi pelaksanaan pemerintahan desa dan
                                        kelurahan serta pemberdayaan lembaga kemasyarakatan</th>
                                    <th>Jumlah kegiatan pendidikan dan pelatihan tentang penyelenggaraan pemerintahan desa
                                        dan kelurahan</th>
                                    <th>Penelitian dan pengkajian penyelenggaraan pemerintahan desa dan kelurahan</th>
                                    <th>Jumlah kegiatan yang terkait dengan upaya percepatan atau akselerasi pembangunan
                                        desa dan kelurahan dalam bidang ekonomi keluarga, penanganan bencana, penanggulangan
                                        kemiskinan, percepatan keberdayaan masyarakat, peningkatan prasarana dan sarana
                                        pedesaan/kelurahan, pemanfaatan sumber daya alam dan teknologi tepat guna,
                                        pengembangan sosial budaya masyarakat di desa dan kelurahan yang dibiayai APBN</th>
                                    <th>Pemberian penghargaan atas prestasi yang dilaksanakan pemerintahan desa dan
                                        kelurahan dalam penyelenggaraan pemerintahan dan lembaga kemasyarakatan</th>
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
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desakelurahan_lembaga_kemasyarakatan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkat_desa_kelurahan_serta_bpd']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing']) }}</td>
                                        <td align="right">{{ $value->data['jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan'] }}</td>
                                        <td align="right">{{ $value->data['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] }}</td>
                                        <td align="right">{{ $value->data['penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] }}</td>
                                        <td align="right">
                                            {{ $value->data['jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn'] }}
                                        </td>
                                        <td align="right">{{ $value->data['pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'] }}</td>
                                        <td align="right">{{ $value->data['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] }}</td>
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
