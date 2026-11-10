@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('prodeskel::assets.style')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Batas Wilayah</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Umum</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.batasWilayah') }}">Batas Wilayah</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.potensi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Potensi</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi" style="margin-top: -25px;"') !!}
        <div class="box-body">
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">DATA UMUM</label>
            </div>

            @include('prodeskel::potensi.bulan_tahun')

            <div class="form-group">
                <label for="tahun_pembentukan" class="col-sm-2 control-label">Tahun Pembentukan</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control required" min="1945" max="2300" name="tahun_pembentukan" value="{{ $default['tahun_pembentukan'] ?? date('Y') }}">
                </div>
            </div>
            <div class="form-group">
                <label for="luas_desa" class="col-sm-2 control-label">Luas Desa (Ha)</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control bilangan" name="luas_desa" min="0" max="1000000" value="{{ $default['luas_desa'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_kepala_desa" class="col-sm-2 control-label">Nama {{ ucfirst(setting('sebutan_kepala_desa')) }}</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control required" name="nama_kepala_desa" value="{{ $default['nama_kepala_desa'] ?? '' }}" placeholder="Nama Kepala Desa/Lurah">
                </div>
            </div>
            <div class="form-group">
                <label for="nama_pengisi" class="col-sm-2 control-label">Nama Pengisi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pengisi" value="{{ $default['nama_pengisi'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pekerjaan" class="col-sm-2 control-label">Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pekerjaan" value="{{ $default['pekerjaan'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jabatan" value="{{ $default['jabatan'] ?? '' }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">BATAS WILAYAH</label>
            </div>
            <div class="form-group">
                <label for="batas_desa_utara" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_desa')) }} Sebelah
                    Utara</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_desa_utara" value="{{ $default['batas_desa_utara'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_desa_selatan" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_desa')) }}
                    Sebelah Selatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_desa_selatan" value="{{ $default['batas_desa_selatan'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_desa_timur" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_desa')) }} Sebelah
                    Timur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_desa_timur" value="{{ $default['batas_desa_timur'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_desa_barat" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_desa')) }} Sebelah
                    Barat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_desa_barat" value="{{ $default['batas_desa_barat'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_kecamatan_utara" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_kecamatan')) }} Sebelah Utara</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_kecamatan_utara" value="{{ $default['batas_kecamatan_utara'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_kecamatan_selatan" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_kecamatan')) }} Sebelah Selatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_kecamatan_selatan" value="{{ $default['batas_kecamatan_selatan'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_kecamatan_timur" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_kecamatan')) }} Sebelah Timur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_kecamatan_timur" value="{{ $default['batas_kecamatan_timur'] ?? '' }}">
                </div>
            </div>

            <div class="form-group">
                <label for="batas_kecamatan_barat" class="col-sm-2 control-label">{{ ucfirst(setting('sebutan_kecamatan')) }} Sebelah Barat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="batas_kecamatan_barat" value="{{ $default['batas_kecamatan_barat'] ?? '' }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">PENETAPAN BATAS</label>
            </div>

            <div class="form-group">
                <label for="penetapan_batas" class="col-sm-2 control-label">Ada Penetapan Batas</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['penetapan_batas'] == 1) ">
                        <input type="radio" name="penetapan_batas" class="form-check-input" @checked($default['penetapan_batas'] == 1) value="1" autocomplete="off">Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['penetapan_batas'] == 0)">
                        <input type="radio" name="penetapan_batas" class="form-check-input" @checked($default['penetapan_batas'] == 0) value="0" autocomplete="off">Tidak
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="dasar_hukum_perdes" class="col-sm-2 control-label">Dasar Hukum Perdes No.</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dasar_hukum_perdes" value="{{ $default['dasar_hukum_perdes'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="dasar_hukum_perda" class="col-sm-2 control-label">Dasar Hukum Perda No.</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="dasar_hukum_perda" value="{{ $default['dasar_hukum_perda'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="peta_willayah" class="col-sm-2 control-label">Ada Peta Willayah</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label id="lmg1" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peta_wilayah'] == 1) ">
                        <input
                            id="img1"
                            type="radio"
                            name="peta_wilayah"
                            class="form-check-input"
                            @checked($default['peta_wilayah'] == 1)
                            value="1"
                            autocomplete="off"
                        >Ya
                    </label>
                    <label id="lmg2" class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['peta_wilayah'] == 0)">
                        <input
                            id="img2"
                            type="radio"
                            name="peta_wilayah"
                            class="form-check-input"
                            @checked($default['peta_wilayah'] == 0)
                            value="0"
                            autocomplete="off"
                        >Tidak
                    </label>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">SUMBER DATA</label>
            </div>

            <div class="form-group">
                <label for="referensi_1" class="col-sm-2 control-label">Referensi 1</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="referensi_1" value="{{ $default['referensi_1'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="referensi_2" class="col-sm-2 control-label">Referensi 2</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="referensi_2" value="{{ $default['referensi_2'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="referensi_3" class="col-sm-2 control-label">Referensi 3</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="referensi_3" value="{{ $default['referensi_3'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="referensi_4" class="col-sm-2 control-label">Referensi 4</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="referensi_4" value="{{ $default['referensi_4'] ?? '' }}">
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
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
