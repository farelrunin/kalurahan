@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Perkembangan </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Masalah Kesejahteraan Sosial</a></li>
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
                                    <th nowrap>Jumlah anak, remaja, preman dan pengangguran</th>
                                    <th nowrap>Jumlah gelandangan</th>
                                    <th nowrap>Jumlah pengemis jalanan dan terlantar</th>
                                    <th nowrap>Jumlah manusia lanjut usia terlantar</th>
                                    <th nowrap>Jumlah orang gila/stress/cacat mental</th>
                                    <th nowrap>Jumlah orang cacat fisik</th>
                                    <th nowrap>Jumlah orang kelainan kulit</th>
                                    <th nowrap>Jumlah orang yang tidur di kolong jembatan/emperan</th>
                                    <th nowrap>Jumlah rumah dan kawasan kumuh (Unit)</th>
                                    <th nowrap>Jumlah panti jompo (Unit)</th>
                                    <th nowrap>Jumlah panti asuhan anak (Unit)</th>
                                    <th nowrap>Jumlah rumah singgah anak jalanan (Unit)</th>
                                    <th nowrap>Jumlah penghuni jalur hijau dan taman kota</th>
                                    <th nowrap>Jumlah penghuni bantaran sungai</th>
                                    <th nowrap>Jumlah penghuni pinggiran rel kereta api</th>
                                    <th nowrap>Jumlah penghuni liar di lahan dan fasilitas umum lainnya</th>
                                    <th nowrap>Jumlah anggota kelompok masyarakat/suku/keluarga terasing, terisolir,
                                        terlantar dan primitif</th>
                                    <th nowrap>Jumlah anak yatim usia 0-18 tahun</th>
                                    <th nowrap>Jumlah anak piatu 0-18 tahun</th>
                                    <th nowrap>Jumlah anak yatim piatu 0-18 tahun</th>
                                    <th nowrap>Jumlah janda</th>
                                    <th nowrap>Jumlah anak usia 7-12 tahun yang tidak sekolah di SD/sederajat</th>
                                    <th nowrap>Jumlah anak usia 13-15 tahun yang tidak sekolah di SLTP/sederajat</th>
                                    <th nowrap>Jumlah anak usia 15-18 tahun yang tidak sekolah di SLTA/sederajat</th>
                                    <th nowrap>Jumlah anak yang bekerja membantu keluarga menghasilkan uang</th>
                                    <th nowrap>Jumlah perempuan yang menjadi kepala keluarga</th>
                                    <th nowrap>Jumlah penduduk eks napi</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana banjir</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana gunung berapi</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana tsunami</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana gempa bumi</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana kebakaran rumah</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana kekeringan</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana tanah longsor</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan bencana kebakaran hutan</th>
                                    <th nowrap>Jumlah penduduk rawan bencana kelaparan</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah rawan air bersih</th>
                                    <th nowrap>Jumlah penduduk tinggal di daerah lahan kritis dan tandus</th>
                                    <th nowrap>Jumlah penduduk tinggal di kawasan padat penduduk dan kumuh</th>
                                    <th nowrap>Jumlah warga pendatang yang tidak memiliki keterangan penduduk</th>
                                    <th nowrap>Jumlah warga pendatang dan atau pekerja musiman</th>
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
                                        <td class="text-right">{{ $value->data['pengangguran'] }}</td>
                                        <td class="text-right">{{ $value->data['gelandangan'] }}</td>
                                        <td class="text-right">{{ $value->data['pengemis'] }}</td>
                                        <td class="text-right">{{ $value->data['manula'] }}</td>
                                        <td class="text-right">{{ $value->data['orang_gila'] }}</td>
                                        <td class="text-right">{{ $value->data['cacat'] }}</td>
                                        <td class="text-right">{{ $value->data['kelainan'] }}</td>
                                        <td class="text-right">{{ $value->data['emperan'] }}</td>
                                        <td class="text-right">{{ $value->data['kumuh'] }}</td>
                                        <td class="text-right">{{ $value->data['jompo'] }}</td>
                                        <td class="text-right">{{ $value->data['asuhan'] }}</td>
                                        <td class="text-right">{{ $value->data['rumah_singgah'] }}</td>
                                        <td class="text-right">{{ $value->data['taman_kota'] }}</td>
                                        <td class="text-right">{{ $value->data['bantaran_sungai'] }}</td>
                                        <td class="text-right">{{ $value->data['rel_kereta'] }}</td>
                                        <td class="text-right">{{ $value->data['liar'] }}</td>
                                        <td class="text-right">{{ $value->data['primitif'] }}</td>
                                        <td class="text-right">{{ $value->data['yatim'] }}</td>
                                        <td class="text-right">{{ $value->data['piatu'] }}</td>
                                        <td class="text-right">{{ $value->data['yatim_piatu'] }}</td>
                                        <td class="text-right">{{ $value->data['janda'] }}</td>
                                        <td class="text-right">{{ $value->data['sd'] }}</td>
                                        <td class="text-right">{{ $value->data['sltp'] }}</td>
                                        <td class="text-right">{{ $value->data['slta'] }}</td>
                                        <td class="text-right">{{ $value->data['anak_bekerja'] }}</td>
                                        <td class="text-right">{{ $value->data['perempuan_kepala'] }}</td>
                                        <td class="text-right">{{ $value->data['napi'] }}</td>
                                        <td class="text-right">{{ $value->data['banjir'] }}</td>
                                        <td class="text-right">{{ $value->data['gunung'] }}</td>
                                        <td class="text-right">{{ $value->data['tsunami'] }}</td>
                                        <td class="text-right">{{ $value->data['gempa'] }}</td>
                                        <td class="text-right">{{ $value->data['kebakaran'] }}</td>
                                        <td class="text-right">{{ $value->data['kekeringan'] }}</td>
                                        <td class="text-right">{{ $value->data['longsor'] }}</td>
                                        <td class="text-right">{{ $value->data['hutan'] }}</td>
                                        <td class="text-right">{{ $value->data['kelaparan'] }}</td>
                                        <td class="text-right">{{ $value->data['air_bersih'] }}</td>
                                        <td class="text-right">{{ $value->data['tandus'] }}</td>
                                        <td class="text-right">{{ $value->data['padat'] }}</td>
                                        <td class="text-right">{{ $value->data['pendatang'] }}</td>
                                        <td class="text-right">{{ $value->data['musiman'] }}</td>
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
