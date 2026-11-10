@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Prasarana Kebersihan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.saranaDesa') }}">Desa/Kelurahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.saranaDesa') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Desa/Kelurahan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-2 control-label">Gedung Kantor</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['gedung_kantor'] == $key) ">
                            <input type="radio" name="gedung_kantor" class="form-check-input" @checked($default['gedung_kantor'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_ruang_kerja_ruang" class="col-sm-2 control-label">Jumlah Ruang Kerja (Ruang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_ruang_kerja_ruang" value="{{ $default['jumlah_ruang_kerja_ruang'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kondisi" class="col-sm-2 control-label">Kondisi</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\RusakEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kondisi'] == $key) ">
                            <input type="radio" name="kondisi" class="form-check-input" @checked($default['kondisi'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="balai_desa_kelurahan_sejenisnya" class="col-sm-2 control-label">Balai
                    Desa/Kelurahan/Sejenisnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['balai_desa_kelurahan_sejenisnya'] == $key) ">
                            <input type="radio" name="balai_desa_kelurahan_sejenisnya" class="form-check-input" @checked($default['balai_desa_kelurahan_sejenisnya'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="listrik" class="col-sm-2 control-label">Listrik</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['listrik'] == $key) ">
                            <input type="radio" name="listrik" class="form-check-input" @checked($default['listrik'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="air_bersih" class="col-sm-2 control-label">Air Bersih</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['air_bersih'] == $key) ">
                            <input type="radio" name="air_bersih" class="form-check-input" @checked($default['air_bersih'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="telepon" class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['telepon'] == $key) ">
                            <input type="radio" name="telepon" class="form-check-input" @checked($default['telepon'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="rumah_dinas_kepala_desa_lurah" class="col-sm-2 control-label">Air Bersih</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['rumah_dinas_kepala_desa_lurah'] == $key) ">
                            <input type="radio" name="rumah_dinas_kepala_desa_lurah" class="form-check-input" @checked($default['rumah_dinas_kepala_desa_lurah'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="rumah_dinas_perangkat" class="col-sm-2 control-label">Rumah Dinas Perangkat</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['rumah_dinas_perangkat'] == $key) ">
                            <input type="radio" name="rumah_dinas_perangkat" class="form-check-input" @checked($default['rumah_dinas_perangkat'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="fasilitas_lainnya" class="col-sm-2 control-label">Fasilitas Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['fasilitas_lainnya'] == $key) ">
                            <input type="radio" name="fasilitas_lainnya" class="form-check-input" @checked($default['fasilitas_lainnya'] == $key) value="{{ $key }}" autocomplete="off">{{ $item }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="mesin_tik_buah" class="col-sm-2 control-label">Mesin Tik (Buah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="mesin_tik_buah" value="{{ $default['mesin_tik_buah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="meja_buah" class="col-sm-2 control-label">Meja (Buah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="meja_buah" value="{{ $default['meja_buah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kursi_buah" class="col-sm-2 control-label">Kursi (Buah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kursi_buah" value="{{ $default['kursi_buah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lemari_arsip_buah" class="col-sm-2 control-label">Lemari Arsip (Buah)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="lemari_arsip_buah" value="{{ $default['lemari_arsip_buah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="komputer_unit" class="col-sm-2 control-label">Komputer (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="komputer_unit" value="{{ $default['komputer_unit'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="mesin_fax_unit" class="col-sm-2 control-label">Mesin Fax (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="mesin_fax_unit" value="{{ $default['mesin_fax_unit'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kendaraan_dinas_unit" class="col-sm-2 control-label">Kendaraan Dinas (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kendaraan_dinas_unit" value="{{ $default['kendaraan_dinas_unit'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_peraturan_desa" class="col-sm-2 control-label">Buku Data Peraturan Desa</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_peraturan_desa" @if ($loop->first) required @endif @checked($default['buku_data_peraturan_desa'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_keputusan_kepala_desa_lurah" class="col-sm-2 control-label">Buku Keputusan Kepala Desa
                    Lurah</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_keputusan_kepala_desa_lurah" @if ($loop->first) required @endif @checked($default['buku_keputusan_kepala_desa_lurah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_kependudukan" class="col-sm-2 control-label">Buku Administrasi
                    Kependudukan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_administrasi_kependudukan" @if ($loop->first) required @endif @checked($default['buku_administrasi_kependudukan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_inventaris" class="col-sm-2 control-label">Buku Data Inventaris</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_inventaris" @if ($loop->first) required @endif @checked($default['buku_data_inventaris'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_aparat" class="col-sm-2 control-label">Buku Data Aparat</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_aparat" @if ($loop->first) required @endif @checked($default['buku_data_aparat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_tanah_kas_desa" class="col-sm-2 control-label">Buku Data Tanah Kas Desa</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_tanah_kas_desa" @if ($loop->first) required @endif @checked($default['buku_data_tanah_kas_desa'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_pajak_dan_retribusi" class="col-sm-2 control-label">Buku Administrasi Pajak
                    dan Retribusi</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_administrasi_pajak_dan_retribusi" @if ($loop->first) required @endif @checked($default['buku_administrasi_pajak_dan_retribusi'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_tanah" class="col-sm-2 control-label">Buku Data Tanah</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_tanah" @if ($loop->first) required @endif @checked($default['buku_data_tanah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_laporan_pengaduan_masyarakat" class="col-sm-2 control-label">Buku Laporan Pengaduan
                    Masyarakat</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_laporan_pengaduan_masyarakat" @if ($loop->first) required @endif @checked($default['buku_laporan_pengaduan_masyarakat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_agenda_ekspedisi" class="col-sm-2 control-label">Buku Agenda Ekspedisi</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_agenda_ekspedisi" @if ($loop->first) required @endif @checked($default['buku_agenda_ekspedisi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_profil_desa_dan_kelurahan" class="col-sm-2 control-label">Buku Profil Desa dan
                    Kelurahan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_profil_desa_dan_kelurahan" @if ($loop->first) required @endif @checked($default['buku_profil_desa_dan_kelurahan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="buku_data_induk_penduduk" class="col-sm-2 control-label">Buku Data Induk Penduduk</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_induk_penduduk" @if ($loop->first) required @endif @checked($default['buku_data_induk_penduduk'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_mutasi_penduduk" class="col-sm-2 control-label">Buku Data Mutasi Penduduk</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_mutasi_penduduk" @if ($loop->first) required @endif @checked($default['buku_data_mutasi_penduduk'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_rekapitulasi_penduduk_akhir_bulan" class="col-sm-2 control-label">Buku Rekapitulasi
                    Penduduk Akhir Bulan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_rekapitulasi_penduduk_akhir_bulan" @if ($loop->first) required @endif @checked($default['buku_rekapitulasi_penduduk_akhir_bulan'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_registrasi_pelayanan_penduduk" class="col-sm-2 control-label">Buku Registrasi Pelayanan
                    Penduduk</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_registrasi_pelayanan_penduduk" @if ($loop->first) required @endif @checked($default['buku_registrasi_pelayanan_penduduk'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_penduduk_sementara" class="col-sm-2 control-label">Buku Data Penduduk
                    Sementara</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_penduduk_sementara" @if ($loop->first) required @endif @checked($default['buku_data_penduduk_sementara'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_anggaran_penerimaan" class="col-sm-2 control-label">Buku Anggaran Penerimaan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_anggaran_penerimaan" @if ($loop->first) required @endif @checked($default['buku_anggaran_penerimaan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_anggaran_pengeluaran_pegawai_pembangunan" class="col-sm-2 control-label">Buku Anggaran
                    Pengeluaran Pegawai Pembangunan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_anggaran_pengeluaran_pegawai_pembangunan" @if ($loop->first) required @endif @checked($default['buku_anggaran_pengeluaran_pegawai_pembangunan'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_kas_umum" class="col-sm-2 control-label">Buku Kas Umum</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_kas_umum" @if ($loop->first) required @endif @checked($default['buku_kas_umum'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_kas_pembantu_penerimaan" class="col-sm-2 control-label">Buku Kas Pembantu
                    Penerimaan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_kas_pembantu_penerimaan" @if ($loop->first) required @endif @checked($default['buku_kas_pembantu_penerimaan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_kas_pembantu_pengeluaran_rutin_pembangunan" class="col-sm-2 control-label">Buku Kas
                    Pembantu Pengeluaran Rutin/Pembangunan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_kas_pembantu_pengeluaran_rutin_pembangunan" @if ($loop->first) required @endif @checked($default['buku_kas_pembantu_pengeluaran_rutin_pembangunan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="buku_data_lembaga_kemasyarakatan" class="col-sm-2 control-label">Buku Data Lembaga
                    Kemasyarakatan</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\IsiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_lembaga_kemasyarakatan" @if ($loop->first) required @endif @checked($default['buku_data_lembaga_kemasyarakatan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                Simpan</button>
        </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('bootstrap/js/jquery.inputmask.js') }}"></script>
    <script>
        @include('prodeskel::assets.extension.numeric')
        $(document).ready(function() {
                        @include('prodeskel::assets.script')
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_ruang_kerja_ruang], input[name=mesin_tik_buah], input[name=meja_buah], input[name=kursi_buah], input[name=lemari_arsip_buah], input[name=komputer_unit], input[name=mesin_fax_unit], input[name=kendaraan_dinas_unit]').inputmask(integerObj);
        });
    </script>
@endpush
