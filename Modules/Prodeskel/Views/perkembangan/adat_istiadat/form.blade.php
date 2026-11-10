@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Perkembangan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Peranserta Masyarakat dalam Pembangunan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Adat Istiadat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Adat Istiadat</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::perkembangan.bulan_tahun', ['controlLabel' => 'col-sm-4', 'controlInput' => 'col-sm-8'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_perkawinan" class="col-sm-4 control-label">Adat istiadat dalam
                    perkawinan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_perkawinan" class="required" @checked($default['adat_istiadat_dalam_perkawinan'] !== null && $default['adat_istiadat_dalam_perkawinan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_kelahiran_anak" class="col-sm-4 control-label">Adat istiadat dalam kelahiran
                    anak</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_kelahiran_anak" class="required" @checked($default['adat_istiadat_dalam_kelahiran_anak'] !== null && $default['adat_istiadat_dalam_kelahiran_anak'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_upacara_kematian" class="col-sm-4 control-label">Adat istiadat dalam upacara
                    kematian</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_upacara_kematian" class="required" @checked($default['adat_istiadat_dalam_upacara_kematian'] !== null && $default['adat_istiadat_dalam_upacara_kematian'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_pengelolaan_hutan" class="col-sm-4 control-label">Adat istiadat dalam
                    pengelolaan hutan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_pengelolaan_hutan" class="required" @checked($default['adat_istiadat_dalam_pengelolaan_hutan'] !== null && $default['adat_istiadat_dalam_pengelolaan_hutan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_tanah_pertanian" class="col-sm-4 control-label">Adat istiadat dalam tanah
                    pertanian</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_tanah_pertanian" class="required" @checked($default['adat_istiadat_dalam_tanah_pertanian'] !== null && $default['adat_istiadat_dalam_tanah_pertanian'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_pengelolaan_laut_pantai" class="col-sm-4 control-label">Adat istiadat dalam
                    pengelolaan laut/pantai</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_pengelolaan_laut_pantai" class="required" @checked($default['adat_istiadat_dalam_pengelolaan_laut_pantai'] !== null && $default['adat_istiadat_dalam_pengelolaan_laut_pantai'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_memecahkan_konflik_warga" class="col-sm-4 control-label">Adat istiadat dalam
                    memecahkan konflik warga</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_memecahkan_konflik_warga" class="required" @checked($default['adat_istiadat_dalam_memecahkan_konflik_warga'] !== null && $default['adat_istiadat_dalam_memecahkan_konflik_warga'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam" class="col-sm-4 control-label">Adat istiadat dalam menjauhkan bala penyakit dan bencana alam</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam" class="required" @checked($default['adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam'] !== null && $default['adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya" class="col-sm-4 control-label">Adat istiadat dalam memulihkan hubungan antara alam semesta dengan
                    manusia dan lingkungannya</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya" class="required" @checked($default['adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya'] !== null && $default['adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar" class="col-sm-4 control-label">Adat istiadat dalam penanggulangan kemiskinan bagi keluarga tidak
                    mampu/fakir miskin/terlantar</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdatIstiadatEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar" class="required" @checked($default['adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar'] !== null && $default['adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
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
