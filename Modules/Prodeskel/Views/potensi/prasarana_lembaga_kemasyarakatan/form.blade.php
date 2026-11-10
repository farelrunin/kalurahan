@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Potensi Sumber Daya Manusia</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan') }}">Prasarana Lembaga
            Kemasyarakatan</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Lembaga Kemasyarakatan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Gedung Kantor LKD/LKK</label>
            </div>
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
                <label for="gedung_kantor_lkd_lkk" class="col-sm-2 control-label">Gedung/Kantor Lembaga Kemasyarakatan
                    Desa/Kelurahan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['gedung_kantor_lkd_lkk'] == 1) ">
                        <input type="radio" name="gedung_kantor_lkd_lkk" class="form-check-input" @checked($default['gedung_kantor_lkd_lkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['gedung_kantor_lkd_lkk'] == 0)">
                        <input type="radio" name="gedung_kantor_lkd_lkk" class="form-check-input" @checked($default['gedung_kantor_lkd_lkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="peralatan_kantor_lkd_lkk" class="col-sm-2 control-label">Peralatan Kantor: Komputer, Fax</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peralatan_kantor_lkd_lkk'] == 1) ">
                        <input type="radio" name="peralatan_kantor_lkd_lkk" class="form-check-input" @checked($default['peralatan_kantor_lkd_lkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peralatan_kantor_lkd_lkk'] == 0)">
                        <input type="radio" name="peralatan_kantor_lkd_lkk" class="form-check-input" @checked($default['peralatan_kantor_lkd_lkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="mesin_tik_lkd_lkk" class="col-sm-2 control-label">Mesin Tik</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['mesin_tik_lkd_lkk'] == 1) ">
                        <input type="radio" name="mesin_tik_lkd_lkk" class="form-check-input" @checked($default['mesin_tik_lkd_lkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['mesin_tik_lkd_lkk'] == 0)">
                        <input type="radio" name="mesin_tik_lkd_lkk" class="form-check-input" @checked($default['mesin_tik_lkd_lkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kardek_lkd_lkk" class="col-sm-2 control-label">Kardek</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kardek_lkd_lkk'] == 1) ">
                        <input type="radio" name="kardek_lkd_lkk" class="form-check-input" @checked($default['kardek_lkd_lkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kardek_lkd_lkk'] == 0)">
                        <input type="radio" name="kardek_lkd_lkk" class="form-check-input" @checked($default['kardek_lkd_lkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_lkd_lkk" class="col-sm-2 control-label">Buku Administrasi Lembaga
                    (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_lkd_lkk" value="{{ $default['buku_administrasi_lkd_lkk'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_meja_kursi_lkd_lkk" class="col-sm-2 control-label">Jumlah Meja dan Kursi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_meja_kursi_lkd_lkk" value="{{ $default['jml_meja_kursi_lkd_lkk'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lainnya_lkd_lkk" class="col-sm-2 control-label">Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_lkd_lkk'] == 1) ">
                        <input type="radio" name="lainnya_lkd_lkk" class="form-check-input" @checked($default['lainnya_lkd_lkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_lkd_lkk'] == 0)">
                        <input type="radio" name="lainnya_lkd_lkk" class="form-check-input" @checked($default['lainnya_lkd_lkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">LKMD/LPM atau Sebutan Lainnya</label>
            </div>
            <div class="form-group">
                <label for="memiliki_kantor_sendiri_lkmd_lpm" class="col-sm-2 control-label">Memiliki Kantor Sendiri</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_sendiri_lkmd_lpm'] == 1) ">
                        <input type="radio" name="memiliki_kantor_sendiri_lkmd_lpm" class="form-check-input" @checked($default['memiliki_kantor_sendiri_lkmd_lpm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_sendiri_lkmd_lpm'] == 0)">
                        <input type="radio" name="memiliki_kantor_sendiri_lkmd_lpm" class="form-check-input" @checked($default['memiliki_kantor_sendiri_lkmd_lpm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="peralatan_kantor_lkmd_lpm" class="col-sm-2 control-label">Peralatan Kantor: Komputer,
                    Fax</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peralatan_kantor_lkmd_lpm'] == 1) ">
                        <input type="radio" name="peralatan_kantor_lkmd_lpm" class="form-check-input" @checked($default['peralatan_kantor_lkmd_lpm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peralatan_kantor_lkmd_lpm'] == 0)">
                        <input type="radio" name="peralatan_kantor_lkmd_lpm" class="form-check-input" @checked($default['peralatan_kantor_lkmd_lpm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="mesin_tik_lkmd_lkm" class="col-sm-2 control-label">Mesin Tik</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['mesin_tik_lkmd_lkm'] == 1) ">
                        <input type="radio" name="mesin_tik_lkmd_lkm" class="form-check-input" @checked($default['mesin_tik_lkmd_lkm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['mesin_tik_lkmd_lkm'] == 0)">
                        <input type="radio" name="mesin_tik_lkmd_lkm" class="form-check-input" @checked($default['mesin_tik_lkmd_lkm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kardek_lkmd_lkm" class="col-sm-2 control-label">Kardek</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kardek_lkmd_lkm'] == 1) ">
                        <input type="radio" name="kardek_lkmd_lkm" class="form-check-input" @checked($default['kardek_lkmd_lkm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kardek_lkmd_lkm'] == 0)">
                        <input type="radio" name="kardek_lkmd_lkm" class="form-check-input" @checked($default['kardek_lkmd_lkm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_lkmd_lkm" class="col-sm-2 control-label">Buku Administrasi Lembaga
                    (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_lkmd_lkm" value="{{ $default['buku_administrasi_lkmd_lkm'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_meja_kursi_lkmd_lkm" class="col-sm-2 control-label">Jumlah Meja dan Kursi (Unit)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_meja_kursi_lkmd_lkm" value="{{ $default['jml_meja_kursi_lkmd_lkm'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_kmd_lkm" class="col-sm-2 control-label">Buku Administrasi (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_kmd_lkm" value="{{ $default['buku_administrasi_kmd_lkm'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_lkmd_lkm" class="col-sm-2 control-label">Jumlah Kegiatan (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_lkmd_lkm" value="{{ $default['jml_kegiatan_lkmd_lkm'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lainnya_lkmd_lkm" class="col-sm-2 control-label">Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_lkmd_lkm'] == 1) ">
                        <input type="radio" name="lainnya_lkmd_lkm" class="form-check-input" @checked($default['lainnya_lkmd_lkm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_lkmd_lkm'] == 0)">
                        <input type="radio" name="lainnya_lkmd_lkm" class="form-check-input" @checked($default['lainnya_lkmd_lkm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pemberdayaan dan Kesejahteraan Keluarga</label>
            </div>
            <div class="form-group">
                <label for="pkk" class="col-sm-2 control-label">PKK</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pkk'] == 1) ">
                        <input type="radio" name="pkk" class="form-check-input" @checked($default['pkk'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pkk'] == 0)">
                        <input type="radio" name="pkk" class="form-check-input" @checked($default['pkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor_pkk" class="col-sm-2 control-label">Gedung/Kantor</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['gedung_kantor_pkk'] == 1) ">
                        <input type="radio" name="gedung_kantor_pkk" class="form-check-input" @checked($default['gedung_kantor_pkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['gedung_kantor_pkk'] == 0)">
                        <input type="radio" name="gedung_kantor_pkk" class="form-check-input" @checked($default['gedung_kantor_pkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="peralatan_kantor_atk_inventaris" class="col-sm-2 control-label">Peralatan
                    Kantor/ATK/Inventaris</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peralatan_kantor_atk_inventaris'] == 1) ">
                        <input type="radio" name="peralatan_kantor_atk_inventaris" class="form-check-input" @checked($default['peralatan_kantor_atk_inventaris'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peralatan_kantor_atk_inventaris'] == 0)">
                        <input type="radio" name="peralatan_kantor_atk_inventaris" class="form-check-input" @checked($default['peralatan_kantor_atk_inventaris'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_pkk" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_pkk'] == 1) ">
                        <input type="radio" name="kepengurusan_pkk" class="form-check-input" @checked($default['kepengurusan_pkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_pkk'] == 0)">
                        <input type="radio" name="kepengurusan_pkk" class="form-check-input" @checked($default['kepengurusan_pkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_pkk" class="col-sm-2 control-label">Buku Administrasi PKK</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi_pkk'] == 1) ">
                        <input type="radio" name="buku_administrasi_pkk" class="form-check-input" @checked($default['buku_administrasi_pkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi_pkk'] == 0)">
                        <input type="radio" name="buku_administrasi_pkk" class="form-check-input" @checked($default['buku_administrasi_pkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kegiatan_pkk" class="col-sm-2 control-label">Buku Administrasi PKK</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kegiatan_pkk'] == 1) ">
                        <input type="radio" name="kegiatan_pkk" class="form-check-input" @checked($default['kegiatan_pkk'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kegiatan_pkk'] == 0)">
                        <input type="radio" name="kegiatan_pkk" class="form-check-input" @checked($default['kegiatan_pkk'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_pkk" class="col-sm-2 control-label">Jumlah Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_pkk" value="{{ $default['jml_kegiatan_pkk'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kelengkapan_organisasi_dasawisma" class="col-sm-2 control-label">Kelengkapan Organisasi
                    Dasawisma</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kelengkapan_organisasi_dasawisma'] == 1) ">
                        <input type="radio" name="kelengkapan_organisasi_dasawisma" class="form-check-input" @checked($default['kelengkapan_organisasi_dasawisma'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kelengkapan_organisasi_dasawisma'] == 0)">
                        <input type="radio" name="kelengkapan_organisasi_dasawisma" class="form-check-input" @checked($default['kelengkapan_organisasi_dasawisma'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kelengkapan_organisasi_pokja" class="col-sm-2 control-label">Kelengkapan Organisasi
                    Pokja</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kelengkapan_organisasi_pokja'] == 1) ">
                        <input type="radio" name="kelengkapan_organisasi_pokja" class="form-check-input" @checked($default['kelengkapan_organisasi_pokja'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kelengkapan_organisasi_pokja'] == 0)">
                        <input type="radio" name="kelengkapan_organisasi_pokja" class="form-check-input" @checked($default['kelengkapan_organisasi_pokja'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Karang Taruna</label>
            </div>
            <div class="form-group">
                <label for="karang_taruna" class="col-sm-2 control-label">Karang Taruna</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['karang_taruna'] == 1) ">
                        <input type="radio" name="karang_taruna" class="form-check-input" @checked($default['karang_taruna'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['karang_taruna'] == 0)">
                        <input type="radio" name="karang_taruna" class="form-check-input" @checked($default['karang_taruna'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_kt" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_kt'] == 1) ">
                        <input type="radio" name="kepengurusan_kt" class="form-check-input" @checked($default['kepengurusan_kt'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_kt'] == 0)">
                        <input type="radio" name="kepengurusan_kt" class="form-check-input" @checked($default['kepengurusan_kt'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_kt" class="col-sm-2 control-label">Buku Administrasi</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi_kt'] == 1) ">
                        <input type="radio" name="buku_administrasi_kt" class="form-check-input" @checked($default['buku_administrasi_kt'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi_kt'] == 0)">
                        <input type="radio" name="buku_administrasi_kt" class="form-check-input" @checked($default['buku_administrasi_kt'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_kt" class="col-sm-2 control-label">Jumlah Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_kt" value="{{ $default['jml_kegiatan_kt'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lainnya_kt" class="col-sm-2 control-label">Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_kt'] == 1) ">
                        <input type="radio" name="lainnya_kt" class="form-check-input" @checked($default['lainnya_kt'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_kt'] == 0)">
                        <input type="radio" name="lainnya_kt" class="form-check-input" @checked($default['lainnya_kt'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Rukun Tetangga</label>
            </div>
            <div class="form-group">
                <label for="rt" class="col-sm-2 control-label">RT</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['rt'] == 1) ">
                        <input type="radio" name="rt" class="form-check-input" @checked($default['rt'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['rt'] == 0)">
                        <input type="radio" name="rt" class="form-check-input" @checked($default['rt'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_rt" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_rt'] == 1) ">
                        <input type="radio" name="kepengurusan_rt" class="form-check-input" @checked($default['kepengurusan_rt'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_rt'] == 0)">
                        <input type="radio" name="kepengurusan_rt" class="form-check-input" @checked($default['kepengurusan_rt'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_rt" class="col-sm-2 control-label">Buku Administrasi (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_rt" value="{{ $default['buku_administrasi_rt'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_rt" class="col-sm-2 control-label">Jumlah Kegiatan (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_rt" value="{{ $default['jml_kegiatan_rt'] ?? 0 }}">
                </div>
            </div>

            {{-- RW --}}
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Rukun Warga</label>
            </div>
            <div class="form-group">
                <label for="rw" class="col-sm-2 control-label">RW</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['rw'] == 1) ">
                        <input type="radio" name="rw" class="form-check-input" @checked($default['rw'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['rw'] == 0)">
                        <input type="radio" name="rw" class="form-check-input" @checked($default['rw'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_rw" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_rw'] == 1) ">
                        <input type="radio" name="kepengurusan_rw" class="form-check-input" @checked($default['kepengurusan_rw'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_rw'] == 0)">
                        <input type="radio" name="kepengurusan_rw" class="form-check-input" @checked($default['kepengurusan_rw'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_rw" class="col-sm-2 control-label">Buku Administrasi (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_rw" value="{{ $default['buku_administrasi_rw'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_rw" class="col-sm-2 control-label">Jumlah Kegiatan (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_rw" value="{{ $default['jml_kegiatan_rw'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lainnya_rw" class="col-sm-2 control-label">Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_rw'] == 1) ">
                        <input type="radio" name="lainnya_rw" class="form-check-input" @checked($default['lainnya_rw'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya_rw'] == 0)">
                        <input type="radio" name="lainnya_rw" class="form-check-input" @checked($default['rw'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Lembaga Adat</label>
            </div>
            <div class="form-group">
                <label for="lembaga_adat" class="col-sm-2 control-label">Lembaga Adat</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lembaga_adat'] == 1) ">
                        <input type="radio" name="lembaga_adat" class="form-check-input" @checked($default['lembaga_adat'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lembaga_adat'] == 0)">
                        <input type="radio" name="lembaga_adat" class="form-check-input" @checked($default['lembaga_adat'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="memiliki_kantor_la" class="col-sm-2 control-label">Memiliki Kantor Gedung/Menumpang</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_la'] == 1) ">
                        <input type="radio" name="memiliki_kantor_la" class="form-check-input" @checked($default['memiliki_kantor_la'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_la'] == 0)">
                        <input type="radio" name="memiliki_kantor_la" class="form-check-input" @checked($default['memiliki_kantor_la'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_la" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_la'] == 1) ">
                        <input type="radio" name="kepengurusan_la" class="form-check-input" @checked($default['kepengurusan_la'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_la'] == 0)">
                        <input type="radio" name="kepengurusan_la" class="form-check-input" @checked($default['kepengurusan_la'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_la" class="col-sm-2 control-label">Buku Administrasi (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_la" value="{{ $default['buku_administrasi_la'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_la" class="col-sm-2 control-label">Jumlah Kegiatan (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_la" value="{{ $default['jml_kegiatan_la'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">BUMDES</label>
            </div>
            <div class="form-group">
                <label for="bumdes" class="col-sm-2 control-label">Bumdes</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['bumdes'] == 1) ">
                        <input type="radio" name="bumdes" class="form-check-input" @checked($default['bumdes'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['bumdes'] == 0)">
                        <input type="radio" name="bumdes" class="form-check-input" @checked($default['bumdes'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="memiliki_kantor_bumdes" class="col-sm-2 control-label">Memiliki Kantor
                    Gedung/Menumpang</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_bumdes'] == 1) ">
                        <input type="radio" name="memiliki_kantor_bumdes" class="form-check-input" @checked($default['memiliki_kantor_bumdes'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_bumdes'] == 0)">
                        <input type="radio" name="memiliki_kantor_bumdes" class="form-check-input" @checked($default['memiliki_kantor_bumdes'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_bumdes" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_bumdes'] == 1) ">
                        <input type="radio" name="kepengurusan_bumdes" class="form-check-input" @checked($default['kepengurusan_bumdes'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_bumdes'] == 0)">
                        <input type="radio" name="kepengurusan_bumdes" class="form-check-input" @checked($default['kepengurusan_bumdes'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_bumdes" class="col-sm-2 control-label">Buku Administrasi (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_bumdes" value="{{ $default['buku_administrasi_bumdes'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_bumdes" class="col-sm-2 control-label">Jumlah Kegiatan (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_bumdes" value="{{ $default['jml_kegiatan_bumdes'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Forum Komunikasi Kader Pemberdayaan Masyarakat</label>
            </div>
            <div class="form-group">
                <label for="forum_komunikasi_kader_pemberdayaan_masyarakat" class="col-sm-2 control-label">Forum
                    Komunikasi Kader Pemberdayaan Masyarakat</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['forum_komunikasi_kader_pemberdayaan_masyarakat'] == 1) ">
                        <input type="radio" name="forum_komunikasi_kader_pemberdayaan_masyarakat" class="form-check-input" @checked($default['forum_komunikasi_kader_pemberdayaan_masyarakat'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['forum_komunikasi_kader_pemberdayaan_masyarakat'] == 0)">
                        <input type="radio" name="forum_komunikasi_kader_pemberdayaan_masyarakat" class="form-check-input" @checked($default['forum_komunikasi_kader_pemberdayaan_masyarakat'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="memiliki_kantor_fkkm" class="col-sm-2 control-label">Memiliki Kantor
                    Gedung/Menumpang</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_fkkm'] == 1) ">
                        <input type="radio" name="memiliki_kantor_fkkm" class="form-check-input" @checked($default['memiliki_kantor_fkkm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['memiliki_kantor_fkkm'] == 0)">
                        <input type="radio" name="memiliki_kantor_fkkm" class="form-check-input" @checked($default['memiliki_kantor_fkkm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kepengurusan_fkkm" class="col-sm-2 control-label">Kepengurusan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_fkkm'] == 1) ">
                        <input type="radio" name="kepengurusan_fkkm" class="form-check-input" @checked($default['kepengurusan_fkkm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kepengurusan_fkkm'] == 0)">
                        <input type="radio" name="kepengurusan_fkkm" class="form-check-input" @checked($default['kepengurusan_fkkm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi_fkkm" class="col-sm-2 control-label">Buku Administrasi (Jenis)</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi_fkkm'] == 1) ">
                        <input type="radio" name="buku_administrasi_fkkm" class="form-check-input" @checked($default['buku_administrasi_fkkm'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi_fkkm'] == 0)">
                        <input type="radio" name="buku_administrasi_fkkm" class="form-check-input" @checked($default['buku_administrasi_fkkm'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jml_kegiatan_fkkm" class="col-sm-2 control-label">Jumlah Kegiatan (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jml_kegiatan_fkkm" value="{{ $default['jml_kegiatan_fkkm'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lainnya_fkkm" class="col-sm-2 control-label">Lainnya (Jenis)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="lainnya_fkkm" value="{{ $default['lainnya_fkkm'] ?? 0 }}">
                </div>
            </div>

            {{-- Lain-lain --}}
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Lainnya</label>
            </div>
            <div class="form-group">
                <label for="kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya" class="col-sm-2 control-label">Kantor/Gedung Organisasi Sosial Kemasyarakatan Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya'] == 1) ">
                        <input type="radio" name="kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya" class="form-check-input" @checked($default['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya'] == 0)">
                        <input type="radio" name="kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya" class="form-check-input" @checked($default['kantor_gedung_organisasi_sosial_kemasyarakatan_lainnya'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kantor_gedung_organisasi_profesi_yang_ada" class="col-sm-2 control-label">Kantor/Gedung
                    Organisasi Profesi Yang Ada</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kantor_gedung_organisasi_profesi_yang_ada'] == 1) ">
                        <input type="radio" name="kantor_gedung_organisasi_profesi_yang_ada" class="form-check-input" @checked($default['kantor_gedung_organisasi_profesi_yang_ada'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kantor_gedung_organisasi_profesi_yang_ada'] == 0)">
                        <input type="radio" name="kantor_gedung_organisasi_profesi_yang_ada" class="form-check-input" @checked($default['kantor_gedung_organisasi_profesi_yang_ada'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
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
            $('input[name=buku_administrasi_lkd_lkk], input[name=jml_meja_kursi_lkd_lkk], input[name=jml_meja_kursi_lkmd_lkm], input[name=jml_kegiatan_lkmd_lkm], input[name=jml_kegiatan_pkk], input[name=jml_kegiatan_kt], input[name=jml_kegiatan_rt], input[name=jml_kegiatan_rw], input[name=jml_kegiatan_la], input[name=jml_kegiatan_bumdes], input[name=jml_kegiatan_fkkm], input[name=lainnya_fkkm]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=buku_administrasi_lkmd_lkm], input[name=buku_administrasi_kmd_lkm], input[name=buku_administrasi_rt], input[name=buku_administrasi_rw], input[name=buku_administrasi_la], input[name=buku_administrasi_bumdes]').inputmask(decimalObj);
            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })
        });
    </script>
@endpush
