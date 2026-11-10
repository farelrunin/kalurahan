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
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Perilaku Hidup Bersih dan Sehat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Perilaku Hidup Bersih dan Sehat</a>
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
                <label for="jumlah_keluarga_memiliki_wc_yang_sehat" class="col-sm-4 control-label">Jumlah keluarga memiliki
                    WC yang sehat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_keluarga_memiliki_wc_yang_sehat" value="{{ $default['jumlah_keluarga_memiliki_wc_yang_sehat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan" class="col-sm-4 control-label">Jumlah keluarga memiliki WC yang kurang memenuhi standar
                    kesehatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan" value="{{ $default['jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan" class="col-sm-4 control-label">Jumlah keluarga biasa buang air besar di sungai/parit/kebun/hutan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan" value="{{ $default['jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum" class="col-sm-4 control-label">Jumlah
                    keluarga yang menggunakan fasilitas MCK umum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum" value="{{ $default['jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_penduduk_makan_dalam_sehari_1_kali" class="col-sm-4 control-label">Kebiasaan penduduk
                    makan dlm sehari 1 kali</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_penduduk_makan_dalam_sehari_1_kali" class="required" @checked($default['kebiasaan_penduduk_makan_dalam_sehari_1_kali'] !== null && $default['kebiasaan_penduduk_makan_dalam_sehari_1_kali'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_penduduk_makan_sehari_2_kali" class="col-sm-4 control-label">Kebiasaan penduduk makan
                    sehari 2 kali</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_penduduk_makan_sehari_2_kali" class="required" @checked($default['kebiasaan_penduduk_makan_sehari_2_kali'] !== null && $default['kebiasaan_penduduk_makan_sehari_2_kali'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_penduduk_makan_sehari_3_kali" class="col-sm-4 control-label">Kebiasaan penduduk makan
                    sehari 3 kali</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_penduduk_makan_sehari_3_kali" class="required" @checked($default['kebiasaan_penduduk_makan_sehari_3_kali'] !== null && $default['kebiasaan_penduduk_makan_sehari_3_kali'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali" class="col-sm-4 control-label">Kebiasaan
                    penduduk makan sehari lebih dari 3 kali</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali" class="required" @checked($default['kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali'] !== null && $default['kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="penduduk_yang_belum_tentu_sehari_makan_1_kali" class="col-sm-4 control-label">Penduduk yang
                    belum tentu sehari makan 1 kali</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\TidakAdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="penduduk_yang_belum_tentu_sehari_makan_1_kali" class="required" @checked($default['penduduk_yang_belum_tentu_sehari_makan_1_kali'] !== null && $default['penduduk_yang_belum_tentu_sehari_makan_1_kali'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="dukun_terlatih" class="col-sm-4 control-label">Dukun Terlatih</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\BanyakEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="dukun_terlatih" class="required" @checked($default['dukun_terlatih'] !== null && $default['dukun_terlatih'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu" class="col-sm-4 control-label">Dokter/puskesmas/mantri kesehatan/perawat/bidan/posyandu</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\BanyakEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu" class="required" @checked($default['dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu'] !== null && $default['dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="obat_tradisional_dari_dukun_pengobatan_alternatif" class="col-sm-4 control-label">Obat
                    tradisional dari dukun pengobatan alternatif</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\BanyakEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="obat_tradisional_dari_dukun_pengobatan_alternatif" class="required" @checked($default['obat_tradisional_dari_dukun_pengobatan_alternatif'] !== null && $default['obat_tradisional_dari_dukun_pengobatan_alternatif'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="paranormal" class="col-sm-4 control-label">Paranormal</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\BanyakEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="paranormal" class="required" @checked($default['paranormal'] !== null && $default['paranormal'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="obat_tradisional_dari_keluarga_sendiri" class="col-sm-4 control-label">Obat tradisional dari
                    keluarga sendiri</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\BanyakEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="obat_tradisional_dari_keluarga_sendiri" class="required" @checked($default['obat_tradisional_dari_keluarga_sendiri'] !== null && $default['obat_tradisional_dari_keluarga_sendiri'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="tidak_diobati" class="col-sm-4 control-label">Tidak Diobati</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\BanyakEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="tidak_diobati" class="required" @checked($default['tidak_diobati'] !== null && $default['tidak_diobati'] == $key) value="{{ $key }}"> {{ $item }}</label>
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

@push('scripts')
    <script src="{{ asset('bootstrap/js/jquery.inputmask.js') }}"></script>
    <script>
        @include('prodeskel::assets.extension.numeric')
        $(document).ready(function() {
                        @include('prodeskel::assets.script')
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_keluarga_memiliki_wc_yang_sehat], input[name=jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan], input[name=jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan], input[name=jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum]').inputmask(integerObj);

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
