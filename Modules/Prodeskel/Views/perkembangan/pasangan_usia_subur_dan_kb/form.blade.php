@extends('admin.layouts.index')
@include('prodeskel::assets.style')
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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pasangan Usia Subur dan KB</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pasangan Usia Subur dan KB</a>
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

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pasangan Usia Subur</label>
            </div>
            <div class="form-group">
                <label for="remaja_putri_usia_12_17_tahun" class="col-sm-4 control-label">Jumlah remaja putri usia 12 - 17
                    tahun</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="remaja_putri_usia_12_17_tahun" value="{{ $default['remaja_putri_usia_12_17_tahun'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="perempuan_usia_subur_15_49_tahun" class="col-sm-4 control-label">Jumlah perempuan usia subur
                    15-49 tahun</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="perempuan_usia_subur_15_49_tahun" value="{{ $default['perempuan_usia_subur_15_49_tahun'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="wanita_kawin_muda_usia_kurang_dari_16_tahun" class="col-sm-4 control-label">Jumlah wanita kawin
                    muda usia kurang dari 16 tahun</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="wanita_kawin_muda_usia_kurang_dari_16_tahun" value="{{ $default['wanita_kawin_muda_usia_kurang_dari_16_tahun'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pasangan_usia_subur_pasangan" class="col-sm-4 control-label">Jumlah pasangan usia subur
                    (Pasangan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_pus" name="pasangan_usia_subur_pasangan" value="{{ $default['pasangan_usia_subur_pasangan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Keluarga Berencana</label>
            </div>
            <div class="form-group">
                <label for="pengguna_alat_kontrasepsi_suntik" class="col-sm-4 control-label">Jumlah pengguna alat
                    kontrasepsi suntik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_alat_kontrasepsi_suntik" value="{{ $default['pengguna_alat_kontrasepsi_suntik'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_metode_kontrasepsi_spiral" class="col-sm-4 control-label">Jumlah pengguna metode
                    kontrasepsi spiral</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_metode_kontrasepsi_spiral" value="{{ $default['pengguna_metode_kontrasepsi_spiral'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_alat_kontrasepsi_kondom" class="col-sm-4 control-label">Jumlah pengguna alat
                    kontrasepsi kondom</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_alat_kontrasepsi_kondom" value="{{ $default['pengguna_alat_kontrasepsi_kondom'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_metode_kontrasepsi_pil" class="col-sm-4 control-label">Jumlah pengguna metode
                    kontrasepsi pil</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_metode_kontrasepsi_pil" value="{{ $default['pengguna_metode_kontrasepsi_pil'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_metode_vasektomi" class="col-sm-4 control-label">Jumlah pengguna metode
                    vasektomi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_metode_vasektomi" value="{{ $default['pengguna_metode_vasektomi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_metode_kontrasepsi_tubektomi" class="col-sm-4 control-label">Jumlah pengguna metode
                    kontrasepsi tubektomi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_metode_kontrasepsi_tubektomi" value="{{ $default['pengguna_metode_kontrasepsi_tubektomi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_metode_kb_kelender_kb_alamiah" class="col-sm-4 control-label">Jumlah pengguna metode KB
                    Kelender/KB Alamiah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_metode_kb_kelender_kb_alamiah" value="{{ $default['pengguna_metode_kb_kelender_kb_alamiah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_metode_kb_obat_tradisional" class="col-sm-4 control-label">Jumlah pengguna metode KB
                    obat tradisional</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_metode_kb_obat_tradisional" value="{{ $default['pengguna_metode_kb_obat_tradisional'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengguna_alat_kontrasepsi_metode_lainnya" class="col-sm-4 control-label">Jumlah pengguna alat
                    kontrasepsi metode lainnya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_kb" name="pengguna_alat_kontrasepsi_metode_lainnya" value="{{ $default['pengguna_alat_kontrasepsi_metode_lainnya'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kb" class="col-sm-4 control-label text-primary">Jumlah Akseptor KB</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" readonly name="jumlah_kb" value="{{ $default['jumlah_kb'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pus" class="col-sm-4 control-label text-primary">Jumlah PUS yang tidak menggunakan metode
                    KB</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" readonly name="jumlah_pus" value="{{ $default['jumlah_pus'] ?? 0 }}">
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
            $('input[name=remaja_putri_usia_12_17_tahun], input[name=perempuan_usia_subur_15_49_tahun], input[name=wanita_kawin_muda_usia_kurang_dari_16_tahun], input[name=pasangan_usia_subur_pasangan], input[name=pengguna_alat_kontrasepsi_suntik], input[name=pengguna_metode_kontrasepsi_spiral], input[name=pengguna_alat_kontrasepsi_kondom], input[name=pengguna_metode_kontrasepsi_pil], input[name=pengguna_metode_vasektomi], input[name=pengguna_metode_kontrasepsi_tubektomi], input[name=pengguna_metode_kb_kelender_kb_alamiah], input[name=pengguna_metode_kb_obat_tradisional], input[name=pengguna_alat_kontrasepsi_metode_lainnya], input[name=jumlah_kb], input[name=jumlah_pus]').inputmask(integerObj);

            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })

                $(`input[name=${summary}]`).val(indonesiaFormat(total))

                var jml_kb = parseInt($(`input[name=jumlah_kb]`).val().replace('.', ''));
                var jml_pus = parseInt($(`input[name=pasangan_usia_subur_pasangan]`).val().replace('.', ''));
                totalPus = jml_kb - jml_pus;
                console.log(`${jml_kb} - ${jml_pus} = ${totalPus}`);
                if (totalPus < 0) {
                    $(`input[name=jumlah_pus]`).css('backgroundColor', '#ff000078');
                } else {
                    $(`input[name=jumlah_pus]`).css('color', '#555');
                }
                $(`input[name=jumlah_pus]`).val(totalPus)
            })
        });
    </script>
@endpush
