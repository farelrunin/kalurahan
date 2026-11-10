@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Lembaga Keamanan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lembagaKeamanan') }}">Lembaga Keamanan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lembagaKeamanan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga Keamanan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Hansip dan Linmas</label>
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
                <label for="keberadaan_hansip_dan_linmas" class="col-sm-2 control-label">Keberadaan Hansip dan
                    Linmas</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan_hansip_dan_linmas'] == 1) ">
                        <input type="radio" name="keberadaan_hansip_dan_linmas" class="form-check-input" @checked($default['keberadaan_hansip_dan_linmas'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan_hansip_dan_linmas'] == 0)">
                        <input type="radio" name="keberadaan_hansip_dan_linmas" class="form-check-input" @checked($default['keberadaan_hansip_dan_linmas'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_hansip" class="col-sm-2 control-label">Jumlah Anggota Hansip</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_hansip" value="{{ $default['jumlah_anggota_hansip'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_satgas_linmas" class="col-sm-2 control-label">Jumlah Anggota Satgas
                    Linmas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_satgas_linmas" value="{{ $default['jumlah_anggota_satgas_linmas'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pelaksanaan_siskamling" class="col-sm-2 control-label">Pelaksanaan SISKAMLING</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pelaksanaan_siskamling'] == 1) ">
                        <input type="radio" name="pelaksanaan_siskamling" class="form-check-input" @checked($default['pelaksanaan_siskamling'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['pelaksanaan_siskamling'] == 0)">
                        <input type="radio" name="pelaksanaan_siskamling" class="form-check-input" @checked($default['pelaksanaan_siskamling'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pos_kamling" class="col-sm-2 control-label">Jumlah Pos Kamling</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pos_kamling" value="{{ $default['jumlah_pos_kamling'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Satpam Swakarsa</label>
            </div>
            <div class="form-group">
                <label for="keberadaan_satpam_swakarsa" class="col-sm-2 control-label">Keberadaan SATPAM SWAKARSA</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan_satpam_swakarsa'] == 1) ">
                        <input type="radio" name="keberadaan_satpam_swakarsa" class="form-check-input" @checked($default['keberadaan_satpam_swakarsa'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan_satpam_swakarsa'] == 0)">
                        <input type="radio" name="keberadaan_satpam_swakarsa" class="form-check-input" @checked($default['keberadaan_satpam_swakarsa'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_satpam_swakarsa" class="col-sm-2 control-label">Jumlah Anggota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_satpam_swakarsa" value="{{ $default['jumlah_anggota_satpam_swakarsa'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_organisasi_induk" class="col-sm-2 control-label">Nama Organisasi Induk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control " name="nama_organisasi_induk" value="{{ $default['nama_organisasi_induk'] }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pemilik_organisasi" class="col-sm-2 control-label">Pemilik Organisasi</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasPemilikOrganisasiEnum::all() as $key => $item)
                        <input
                            type="radio"
                            name="pemilik_organisasi"
                            class="form-check-input"
                            required
                            @checked($default['pemilik_organisasi'] == $key)
                            value="{{ $key }}"
                            autocomplete="off"
                        > {{ $item }}
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="keberadaan_organisasi_keamanan_lainnya" class="col-sm-2 control-label">Keberadaan Organisasi
                    Keamanan Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan_organisasi_keamanan_lainnya'] == 1) ">
                        <input type="radio" name="keberadaan_organisasi_keamanan_lainnya" class="form-check-input" @checked($default['keberadaan_organisasi_keamanan_lainnya'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['keberadaan_organisasi_keamanan_lainnya'] == 0)">
                        <input type="radio" name="keberadaan_organisasi_keamanan_lainnya" class="form-check-input" @checked($default['keberadaan_organisasi_keamanan_lainnya'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Kerjasama dengan TNI - POLRI</label>
            </div>
            <div class="form-group">
                <label for="mitra_koramil_tni" class="col-sm-2 control-label">Mitra Koramil / TNI</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['mitra_koramil_tni'] == 1) ">
                        <input type="radio" name="mitra_koramil_tni" class="form-check-input" @checked($default['mitra_koramil_tni'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['mitra_koramil_tni'] == 0)">
                        <input type="radio" name="mitra_koramil_tni" class="form-check-input" @checked($default['mitra_koramil_tni'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_mitra_koramil_tni" class="col-sm-2 control-label">Jumlah Anggota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_mitra_koramil_tni" value="{{ $default['jumlah_anggota_mitra_koramil_tni'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kegiatan_mitra_koramil_tni" class="col-sm-2 control-label">Jumlah Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kegiatan_mitra_koramil_tni" value="{{ $default['jumlah_kegiatan_mitra_koramil_tni'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="babinkamtibmas_polri" class="col-sm-2 control-label">Babinkamtibmas / POLRI</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['babinkamtibmas_polri'] == 1) ">
                        <input type="radio" name="babinkamtibmas_polri" class="form-check-input" @checked($default['babinkamtibmas_polri'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['babinkamtibmas_polri'] == 0)">
                        <input type="radio" name="babinkamtibmas_polri" class="form-check-input" @checked($default['babinkamtibmas_polri'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_babinkamtibmas_polri" class="col-sm-2 control-label">Jumlah Anggota</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_babinkamtibmas_polri" value="{{ $default['jumlah_anggota_babinkamtibmas_polri'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kegiatan_babinkamtibmas_polri" class="col-sm-2 control-label">Jumlah Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kegiatan_babinkamtibmas_polri" value="{{ $default['jumlah_kegiatan_babinkamtibmas_polri'] ?? 0 }}">
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
            $('input[name=jumlah_anggota_hansip], input[name=jumlah_anggota_satgas_linmas], input[name=jumlah_pos_kamling], input[name=jumlah_anggota_satpam_swakarsa], input[name=jumlah_anggota_mitra_koramil_tni], input[name=jumlah_kegiatan_mitra_koramil_tni], input[name=jumlah_anggota_babinkamtibmas_polri], input[name=jumlah_kegiatan_babinkamtibmas_polri]').inputmask(integerObj);
        });
    </script>
@endpush
