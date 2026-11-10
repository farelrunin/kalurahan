@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="active">Lembaga Pemerintah</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'lembaga_pemerintah'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.lembagaPemerintah.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.lembagaPemerintah.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak"><i
                            class="fa fa-print "
                        ></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.lembagaPemerintah.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh"><i
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
                                    <th nowrap>Dasar Hukum Pembentukan</th>
                                    <th nowrap>Dasar Hukum Pembentukan BPD</th>
                                    <th nowrap>Jumlah Aparat Pemerintahan (Orang)</th>
                                    <th nowrap>Jumlah Perangkat {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th nowrap>Sekretaris {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th nowrap>Kepala Urusan/Seksi Pemerintahan</th>
                                    <th nowrap>Kepala Urusan/Seksi Pembangunan</th>
                                    <th nowrap>Kepala Urusan/Seksi Pemberdayaan Masyarakat</th>
                                    <th nowrap>Kepala Urusan/Seksi Kesejahteraan Rakyat</th>
                                    <th nowrap>Kepala Urusan/Seksi Umum</th>
                                    <th nowrap>Kepala Urusan/Seksi Keuangan</th>
                                    <th nowrap>Kepala Urusan/Seksi Perekonomian</th>
                                    <th nowrap>Kepala Urusan/Seksi Data dan Informasi</th>
                                    <th nowrap>Jumlah Staf</th>
                                    <th nowrap>Jumlah {{ ucwords(setting('sebutan_dusun')) }}</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 1</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 2</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 3</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 4</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_dusun')) }} 5</th>
                                    <th nowrap>Kepala {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th nowrap>Pangkat/Golongan</th>
                                    <th nowrap>NIP</th>
                                    <th nowrap>Pelatihan yang pernah diikuti</th>
                                    <th nowrap>Jenis Kelamin</th>
                                    <th nowrap>Sekretaris {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th nowrap>Nama Sekretaris {{ ucwords(setting('sebutan_desa')) }}</th>
                                    <th nowrap>Pangkat/Golongan</th>
                                    <th nowrap>NIP</th>
                                    <th nowrap>Pelatihan yang pernah diikuti</th>
                                    <th nowrap>Jenis Kelamin</th>
                                    <th nowrap>Kepala Urusan/Seksi Pemerintahan</th>
                                    <th nowrap>Kepala Urusan/Seksi Pembangunan</th>
                                    <th nowrap>Kepala Urusan/Seksi Pemberdayaan Masyarakat</th>
                                    <th nowrap>Kepala Urusan/Seksi Kesejahteraan Rakyat</th>
                                    <th nowrap>Kepala Urusan/Seksi Umum</th>
                                    <th nowrap>Kepala Urusan/Seksi Keuangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $item)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.lembagaPemerintah.show', $item->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.lembagaPemerintah.form', $item->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $item->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.lembagaPemerintah.delete', $item->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $item->data['tanggal'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DasarHukumDesaEnum::valueOf($item->data['dasar_pembentukan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DasarHukumBpdEnum::valueOf($item->data['dasar_pembentukan_bpd']) }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_aparat_pemerintah'] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_perangkat_desa'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['kepala_desa']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($item->data['sekretaris_desa']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_pemerintahan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_pembangunan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_pemberdayaan_masyarakat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_kesejahteraan_rakyat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_umum']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_keuangan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_perekonomian']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\KeaktifanEnum::valueOf($item->data['kepala_urusan_seksi_data_informasi']) }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_staff'] }}</td>
                                        <td class="text-right">{{ $item->data['jumlah_dusun'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_1']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_2']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_3']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_4']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PasifEnum::valueOf($item->data['kepala_dusun_lingkungan_5']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_desa']) }}</td>
                                        <td>{{ $item->data['pangkat_golongan_kades'] }}</td>
                                        <td>{{ $item->data['nip_kades'] }}</td>
                                        <td>{{ $item->data['pelatihan_kades'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\JenisKelaminEnum::valueOf($item->data['jenis_kelamin_kades']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_sekretaris_desa']) }}</td>
                                        <td>{{ $item->data['nama_sekdes'] }}</td>
                                        <td>{{ $item->data['pangkat_golongan_sekdes'] }}</td>
                                        <td>{{ $item->data['nip_sekdes'] }}</td>
                                        <td>{{ $item->data['pelatihan_sekdes'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\JenisKelaminEnum::valueOf($item->data['jenis_kelamin_sekdes']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_pemerintahan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_pembangunan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_pemberdayaan']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_kesejahteraan_rakyat']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_umum']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PendidikanPerangkatEnum::valueOf($item->data['pendidikan_kepala_urusan_keuangan']) }}</td>
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
                TableData.column(1).visible(false);
            }
        });
    </script>
@endpush
