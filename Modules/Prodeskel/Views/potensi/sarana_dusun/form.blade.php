@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Sarana Dusun</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Prasarana-Sarana</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.saranaDusun') }}">Sarana Dusun</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.saranaDusun') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sarana Dusun</a>
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
            {{-- gedung_kantor_atau_balai_pertemuan
        alat_tulis_kantor
        barang_inventaris
        buku_administrasi
        jenis_kegiatan
        jumlah_pengurus
        lainnya --}}
            <div class="form-group">
                <label for="gedung_kantor_atau_balai_pertemuan" class="col-sm-2 control-label">Gedung Kantor Atau Balai
                    Pertemuan</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['kondisi_saluran'] == 1) ">
                        <input type="radio" name="gedung_kantor_atau_balai_pertemuan" class="form-check-input" @checked($default['gedung_kantor_atau_balai_pertemuan'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['gedung_kantor_atau_balai_pertemuan'] == 0)">
                        <input type="radio" name="gedung_kantor_atau_balai_pertemuan" class="form-check-input" @checked($default['gedung_kantor_atau_balai_pertemuan'] == 0) value="0" autocomplete="off">Tidak
                        Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="alat_tulis_kantor" class="col-sm-2 control-label">Alat Tulis Kantor</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['alat_tulis_kantor'] == 1) ">
                        <input type="radio" name="alat_tulis_kantor" class="form-check-input" @checked($default['alat_tulis_kantor'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['alat_tulis_kantor'] == 0)">
                        <input type="radio" name="alat_tulis_kantor" class="form-check-input" @checked($default['alat_tulis_kantor'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="barang_inventaris" class="col-sm-2 control-label">Barang Inventaris</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['barang_inventaris'] == 1) ">
                        <input type="radio" name="barang_inventaris" class="form-check-input" @checked($default['barang_inventaris'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['barang_inventaris'] == 0)">
                        <input type="radio" name="barang_inventaris" class="form-check-input" @checked($default['barang_inventaris'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="buku_administrasi" class="col-sm-2 control-label">Buku Administrasi</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi'] == 1) ">
                        <input type="radio" name="buku_administrasi" class="form-check-input" @checked($default['buku_administrasi'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['buku_administrasi'] == 0)">
                        <input type="radio" name="buku_administrasi" class="form-check-input" @checked($default['buku_administrasi'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kegiatan" class="col-sm-2 control-label">Jenis Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jenis_kegiatan" value="{{ $default['jenis_kegiatan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pengurus" class="col-sm-2 control-label">Jumlah Pengurus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pengurus" value="{{ $default['jumlah_pengurus'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="lainnya" class="col-sm-2 control-label">Lainnya</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya'] == 1) ">
                        <input type="radio" name="lainnya" class="form-check-input" @checked($default['lainnya'] == 1) value="1" autocomplete="off">Ada
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['lainnya'] == 0)">
                        <input type="radio" name="lainnya" class="form-check-input" @checked($default['lainnya'] == 0) value="0" autocomplete="off">Tidak Ada
                    </label>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
            </form>
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
            $('input[name=jenis_kegiatan], input[name=jumlah_pengurus]').inputmask(integerObj);;
        });
    </script>
@endpush
