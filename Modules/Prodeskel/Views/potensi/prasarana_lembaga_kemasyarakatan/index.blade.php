@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan') }}">Prasarana Lembaga
            Kemasyarakatan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-3">
            @include('prodeskel::potensi.menu', ['childMenu' => 'prasarana_lembaga_kemasyarakatan'])
        </div>
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    @if (can('u'))
                        <a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan.form') }}" class="btn btn-social btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah</a>
                    @endif
                    <a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan.dialog.cetak') }}" class="btn btn-social bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox"
                        data-title="Cetak"
                    ><i class="fa fa-print "></i> Cetak</a>
                    <a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan.dialog.unduh') }}" class="btn btn-social bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" data-remote="false" data-toggle="modal" data-target="#modalBox"
                        data-title="Unduh"
                    ><i class="fa fa-download"></i> Unduh</a>
                </div>
                <div class="box-body">
                    {!! form_open(null, 'id="mainform" name="mainform"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tabeldata">
                            <thead>
                                <tr>
                                    <th colspan="3"></th>
                                    <th colspan="7" class="text-center">Gedung Kantor LKD/LKK</th>
                                    <th colspan="9" class="text-center">LKDM/LPM atau Sebutan Lainnya</th>
                                    <th colspan="9" class="text-center">Pemberdayaan Kesejahteraan Keluarga</th>
                                    <th colspan="5" class="text-center">Karang Taruna</th>
                                    <th colspan="4" class="text-center">Rukun Tetangga</th>
                                    <th colspan="5" class="text-center">Rukun Warga</th>
                                    <th colspan="5" class="text-center">Lembaga Adat</th>
                                    <th colspan="5" class="text-center">BUMDES</th>
                                    <th colspan="6" class="text-center">Forum Komunikasi Kader Pemberdayaan Masyarakat</th>
                                    <th colspan="2" class="text-center">Lain-Lain</th>
                                </tr>
                                <tr>
                                    <th class="padat">No</th>
                                    <th class="padat" style="min-width: 120px">Aksi</th>
                                    <th>Tanggal</th>
                                    <th>Gedung/Kantor Lembaga Kemasyarakatan Desa/Kelurahan</th>
                                    <th>Peralatan Kantor: Komputer, Fax</th>
                                    <th>Mesin Tik</th>
                                    <th>Kardek</th>
                                    <th class="text-right">Buku Administrasi Lembaga (Jenis)</th>
                                    <th class="text-right">Jumlah Meja dan Kursi</th>
                                    <th>Lainnya</th>
                                    <th>Memiliki Kantor Sendiri</th>
                                    <th>Peralatan Kantor: Komputer, Fax</th>
                                    <th>Mesin Tik</th>
                                    <th>Kardek</th>
                                    <th class="text-right">Buku Administrasi Lembaga (Jenis)</th>
                                    <th class="text-right">Jumlah Meja dan Kursi (Unit)</th>
                                    <th class="text-right">Buku Administrasi (Jenis)</th>
                                    <th class="text-right">Jumlah Kegiatan (Jenis)</th>
                                    <th>Lainnya</th>
                                    <th>PKK</th>
                                    <th>Gedung/Kantor</th>
                                    <th>Peralatan Kantor/ATK/Inventaris</th>
                                    <th>Kepengurusan</th>
                                    <th>Buku Administrasi PKK</th>
                                    <th>Kegiatan</th>
                                    <th class="text-right">Jumlah Kegiatan</th>
                                    <th>Kelengkapan Organisasi Dasawisma</th>
                                    <th>Kelengkapan Organisasi Pokja</th>
                                    <th>Karang Taruna</th>
                                    <th>Kepengurusan</th>
                                    <th>Buku Administrasi</th>
                                    <th class="text-right">Jumlah Kegiatan</th>
                                    <th>Lainnya</th>
                                    <th>Rukun Tetangga</th>
                                    <th>Kepengurusan</th>
                                    <th class="text-right">Buku Administrasi (Jenis)</th>
                                    <th class="text-right">Jumlah Kegiatan (Jenis)</th>
                                    <th>RW</th>
                                    <th>Kepengurusan</th>
                                    <th class="text-right">Buku Administrasi</th>
                                    <th class="text-right">Jumlah Kegiatan</th>
                                    <th>Lainnya</th>
                                    <th>Lembaga Adat</th>
                                    <th>Memiliki Kantor Gedung/Menumpang</th>
                                    <th>Kepengurusan</th>
                                    <th class="text-right">Buku Administrasi (Jenis)</th>
                                    <th class="text-right">Jumlah Kegiatan (Jenis)</th>
                                    <th>Bumdes</th>
                                    <th>Memiliki Kantor Gedung Menumpang</th>
                                    <th>Kepengurusan</th>
                                    <th class="text-right">Buku Administrasi (Jenis)</th>
                                    <th class="text-right">Jumlah Kegiatan (Jenis)</th>
                                    <th>Forum Komunikasi Kader Pemberdayaan Masyarakat</th>
                                    <th>Kantor/Gedung/Menumpang</th>
                                    <th>Kepengurusan</th>
                                    <th>Buku Administrasi (Jenis)</th>
                                    <th class="text-right">Jumlah Kegiatan (Jenis)</th>
                                    <th class="text-right">Lainnya (Jenis)</th>
                                    <th>Kantor/Gedung Organisasi Sosial Kemasyarakatan Lainnya</th>
                                    <th>Kantor/Gedung Organisasi Profesi Yang Ada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataObjs as $index => $value)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan.show', $value->id) }}" class="btn btn-primary btn-sm" title="Detail Data"><i class="fa fa-eye"></i></a>
                                            @if (can('u'))
                                                <a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan.form', $value->id) }}" class="btn btn-warning btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (can('h') && $value->data['tahun'] == date('Y'))
                                                <a href="#" data-href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan.delete', $value->id) }}" class="btn bg-maroon btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <td>{{ $value->data['tanggal'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['gedung_kantor_lkd_lkk']] }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['peralatan_kantor_lkd_lkk']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['mesin_tik_lkd_lkk']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kardek_lkd_lkk']] }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_lkd_lkk'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_meja_kursi_lkd_lkk'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_lkd_lkk']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_sendiri_lkmd_lpm']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['peralatan_kantor_lkmd_lpm']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['mesin_tik_lkmd_lkm']] }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kardek_lkmd_lkm']] }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_lkmd_lkm'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_meja_kursi_lkmd_lkm'] }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_kmd_lkm'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_lkmd_lkm'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_lkmd_lkm']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['pkk']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['gedung_kantor_pkk']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['peralatan_kantor_atk_inventaris']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_pkk']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['buku_administrasi_pkk']] }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kegiatan_pkk']] }}</td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_pkk'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kelengkapan_organisasi_dasawisma']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kelengkapan_organisasi_pokja']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['karang_taruna']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_kt']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['buku_administrasi_kt']] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_kt'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_kt']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['rt']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_rt']] }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_rt'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_rt'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['rw']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_rw']] }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_rw'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_rw'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lainnya_rw']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['lembaga_adat']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_la']] }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_la']] }}</td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_la'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_la'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['bumdes']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_bumdes']] }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_bumdes']] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['buku_administrasi_bumdes'] }}</td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_bumdes'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['forum_komunikasi_kader_pemberdayaan_masyarakat']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['memiliki_kantor_fkkm']] }}
                                        </td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kepengurusan_fkkm']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['buku_administrasi_fkkm']] }}
                                        </td>
                                        <td class="text-right">{{ $value->data['jml_kegiatan_fkkm'] }}</td>
                                        <td class="text-right">{{ $value->data['lainnya_fkkm'] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya']] }}</td>
                                        <td>{{ Modules\Prodeskel\Enums\AdaEnum::all()[$value->data['kantor_gedung_organisasi_profesi_yang_ada']] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
