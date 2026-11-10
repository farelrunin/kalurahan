@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Kedaulatan Politik Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Partisipasi Politik</a></li>
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

                                    <th>penduduk yang memiliki hak pilih</th>
                                    <th>penduduk yang menggunakan hak pilih pada pemilu legislatif yang lalu</th>
                                    <th>perempuan dari penduduk desa/kelurahan ini yang aktif di partai politik</th>
                                    <th>partai politik yang memiliki pengurus sampai di Desa/Kelurahan ini</th>
                                    <th>partai politik yang mempunyai kantor di wilayah desa/kelurahan ini</th>
                                    <th>penduduk yang menjadi pengurus partai politik dari desa/kelurahan</th>
                                    <th>penduduk yang dipilih dalam Pemilu Legislatif yang lalu</th>
                                    <th>pemilih yang menggunakan hak pilih dalam pemilihan presiden/wakil</th>

                                    <th>Jumlah penduduk yang mempunyai hak pilih</th>
                                    <th>Jumlah pemilih yang menggunakan hak pilih dalam pemilu Bupati/Walikota lalu</th>
                                    <th>Jumlah pemilih yang menggunakan hak pilih dalam pemilu Gubenur yang lalu</th>

                                    <th>Penentuan Jabatan Kepala Desa</th>
                                    <th>Penentuan Sekretaris Desa</th>
                                    <th>Penentuan Perangkat Desa termasuk Kepala Dusun</th>
                                    <th>Masa jabatan Kepala Desa</th>
                                    <th>Penentuan Jabatan Lurah dan Perangkat Kelurahan termasuk Kepala Lingkungan</th>

                                    <th>Jumlah anggota BPD</th>
                                    <th>Penentuan anggota BPD</th>
                                    <th>Pimpinan BPD</th>
                                    <th>Pemilikan kantor/ruang kerja BPD</th>
                                    <th>Anggaran untuk BPD</th>
                                    <th>Peraturan Desa (Perdes)</th>
                                    <th>Permintaan keterangan dari Kepala Desa (Kali)</th>
                                    <th>Rancangan Peraturan Desa (Buah)</th>
                                    <th>Menyalurkan aspirasi masyarakat (Kali)</th>
                                    <th>Menyatakan pendapat kepada Kepala Desa (Kali)</th>
                                    <th>Menyampaikan usul dan pendapat kepada Kepala Desa (Kali)</th>
                                    <th>Mengevaluasi efektivitas pelaksanaan APB Desa (Kali)</th>

                                    <th>Keberadaan organisasi lembaga kemasyarakatan desa/kelurahan</th>
                                    <th>Dasar hukum keberadaan Lembaga Kemasyarakatan Desa/LKD</th>
                                    <th>Jumlah organisasi anggota lembaga kemasyarakatan desa termasuk RT, RW, PKK, LKMD/K,
                                        LPM, Karang Taruna, Bumdes,Lembaga Adat, Kelompok Tani dan lembaga lainnya sesuai
                                        ketentuan</th>
                                    <th>Dasar hukum pembentukan Lembaga Kemasyarakatan Kelurahan/LKK</th>
                                    <th>Jumlah organisasi anggota lembaga kemasyarakatan kelurahan</th>
                                    <th>Pemilihan pengurus LKD/LKK</th>
                                    <th>Pemilihan pengurus organisasi anggota LKD/LKK termasuk PKK, LPM/LKMD/K, Karang
                                        Taruna, RT, RW, Bumdes, lembaga adat, kelompok tani dan organisasi anggota LKD/LKK
                                        lainnya</th>
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

                                        <td class="text-right">{{ $value->data['7a2891c06625f'] }}</td>
                                        <td class="text-right">{{ $value->data['3b98d28869cf6'] }}</td>
                                        <td class="text-right">{{ $value->data['f2a591e760a34'] }}</td>
                                        <td class="text-right">{{ $value->data['a4e5b5d17c902'] }}</td>
                                        <td class="text-right">{{ $value->data['6d91c7f48b530'] }}</td>
                                        <td class="text-right">{{ $value->data['8e2f0a1d45b9d'] }}</td>
                                        <td class="text-right">{{ $value->data['c7132b950e461'] }}</td>
                                        <td class="text-right">{{ $value->data['5f041d36a8e7b'] }}</td>

                                        <td class="text-right">{{ $value->data['3d35097eeba8d'] }}</td>
                                        <td class="text-right">{{ $value->data['5f041d36a8e7a'] }}</td>
                                        <td class="text-right">{{ $value->data['5f041d36a8e7c'] }}</td>

                                        <td>{{ Modules\Prodeskel\Enums\PenentuanJabatanKepalaDesaEnum::valueOf($value->data['1008ff221d4d7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PenentuanSektretarisDesaEnum::valueOf($value->data['1008ff221d4a7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PenentuanPerangkatDesaEnum::valueOf($value->data['1008ff221d4b7']) }}</td>
                                        <td class="text-right">{{ $value->data['1008ff221d4c7'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PenentuanJabatanLurahEnum::valueOf($value->data['1008ff221d4e7']) }}</td>

                                        <td class="text-right">{{ $value->data['1008ff221d4f7'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PenentuanAnggotaBPDEnum::valueOf($value->data['1008ff221d4g7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PimpinanBPDEnum::valueOf($value->data['1008ff221d4h7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff221d4i7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff221d4j7']) }}</td>
                                        <td class="text-right">{{ $value->data['b02797f4'] }}</td>
                                        <td class="text-right">{{ $value->data['aebd4c02'] }}</td>
                                        <td class="text-right">{{ $value->data['76cf9d8a'] }}</td>
                                        <td class="text-right">{{ $value->data['c36f4d05'] }}</td>
                                        <td class="text-right">{{ $value->data['da9e6fb2'] }}</td>
                                        <td class="text-right">{{ $value->data['852cb1d3'] }}</td>
                                        <td class="text-right">{{ $value->data['fceae1b9'] }}</td>

                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::valueOf($value->data['1008ff222d4k7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DasarHukumKeberadaanLembagaEnum::valueOf($value->data['1008ff021d4l7']) }}</td>
                                        <td class="text-right">{{ $value->data['1008ff221d47'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\DasarHukumPembentukanLembagaEnum::valueOf($value->data['1008ff211d4j7']) }}</td>
                                        <td class="text-right">{{ $value->data['1008ff221d4k7'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PemilihanPengurusEnum::valueOf($value->data['1008ff221d4l7']) }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\PemilihanPengurusOrganisasiEnum::valueOf($value->data['1008ff221d4m7']) }}</td>
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
