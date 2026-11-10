@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Pendidikan Masyarakat</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Pendidikan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Tingkat Pendidikan Masyarakat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Tingkat Pendidikan Masyarakat</a>
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
                <label for="jumlah_penduduk_buta_aksara_dan_huruf_latin" class="col-sm-4 control-label">Jumlah penduduk buta
                    aksara dan huruf latin (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_buta_aksara_dan_huruf_latin" name="jumlah_penduduk_buta_aksara_dan_huruf_latin" value="{{ $default['jumlah_penduduk_buta_aksara_dan_huruf_latin'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak" class="col-sm-4 control-label">Jumlah penduduk usia 3-6 tahun yang masuk TK dan Kelompok Bermain Anak
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak" name="jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak"
                        value="{{ $default['jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_anak_dan_penduduk_cacat_fisik_dan_mental" class="col-sm-4 control-label">Jumlah anak dan
                    penduduk cacat fisik dan mental (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_anak_dan_penduduk_cacat_fisik_dan_mental" name="jumlah_anak_dan_penduduk_cacat_fisik_dan_mental" value="{{ $default['jumlah_anak_dan_penduduk_cacat_fisik_dan_mental'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_sdsederajat" class="col-sm-4 control-label">Jumlah penduduk sedang
                    SD/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_sdsederajat" name="jumlah_penduduk_sedang_sdsederajat" value="{{ $default['jumlah_penduduk_sedang_sdsederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_sdsederajat" class="col-sm-4 control-label">Jumlah penduduk tamat
                    SD/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_sdsederajat" name="jumlah_penduduk_tamat_sdsederajat" value="{{ $default['jumlah_penduduk_tamat_sdsederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tidak_tamat_sdsederajat" class="col-sm-4 control-label">Jumlah penduduk tidak
                    tamat SD/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tidak_tamat_sdsederajat" name="jumlah_penduduk_tidak_tamat_sdsederajat" value="{{ $default['jumlah_penduduk_tidak_tamat_sdsederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_sltpsederajat" class="col-sm-4 control-label">Jumlah penduduk sedang
                    SLTP/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_sltpsederajat" name="jumlah_penduduk_sedang_sltpsederajat" value="{{ $default['jumlah_penduduk_sedang_sltpsederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_sltpsederajat" class="col-sm-4 control-label">Jumlah penduduk tamat
                    SLTP/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_sltpsederajat" name="jumlah_penduduk_tamat_sltpsederajat" value="{{ $default['jumlah_penduduk_tamat_sltpsederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_slta_sederajat" class="col-sm-4 control-label">Jumlah penduduk sedang
                    SLTA/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_slta_sederajat" name="jumlah_penduduk_sedang_slta_sederajat" value="{{ $default['jumlah_penduduk_sedang_slta_sederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tidak_tamat_sltpsederajat" class="col-sm-4 control-label">Jumlah penduduk tidak
                    tamat SLTP/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tidak_tamat_sltpsederajat" name="jumlah_penduduk_tidak_tamat_sltpsederajat" value="{{ $default['jumlah_penduduk_tidak_tamat_sltpsederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_slta_sederajat" class="col-sm-4 control-label">Jumlah penduduk tamat
                    SLTA/sederajat (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_slta_sederajat" name="jumlah_penduduk_tamat_slta_sederajat" value="{{ $default['jumlah_penduduk_tamat_slta_sederajat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_d1" class="col-sm-4 control-label">Jumlah penduduk sedang D-1
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_d1" name="jumlah_penduduk_sedang_d1" value="{{ $default['jumlah_penduduk_sedang_d1'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_d2" class="col-sm-4 control-label">Jumlah penduduk tamat D-2
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_d2" name="jumlah_penduduk_tamat_d2" value="{{ $default['jumlah_penduduk_tamat_d2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_d3" class="col-sm-4 control-label">Jumlah penduduk sedang D-3
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_d3" name="jumlah_penduduk_sedang_d3" value="{{ $default['jumlah_penduduk_sedang_d3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_d3" class="col-sm-4 control-label">Jumlah penduduk tamat D-3
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_d3" name="jumlah_penduduk_tamat_d3" value="{{ $default['jumlah_penduduk_tamat_d3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_s1" class="col-sm-4 control-label">Jumlah penduduk sedang S-1
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_s1" name="jumlah_penduduk_sedang_s1" value="{{ $default['jumlah_penduduk_sedang_s1'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_s1" class="col-sm-4 control-label">Jumlah penduduk tamat S-1
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_s1" name="jumlah_penduduk_tamat_s1" value="{{ $default['jumlah_penduduk_tamat_s1'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_s2" class="col-sm-4 control-label">Jumlah penduduk sedang S-2
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_s2" name="jumlah_penduduk_sedang_s2" value="{{ $default['jumlah_penduduk_sedang_s2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_s2" class="col-sm-4 control-label">Jumlah penduduk tamat S-2
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_s2" name="jumlah_penduduk_tamat_s2" value="{{ $default['jumlah_penduduk_tamat_s2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_s3" class="col-sm-4 control-label">Jumlah penduduk tamat S-3
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_s3" name="jumlah_penduduk_tamat_s3" value="{{ $default['jumlah_penduduk_tamat_s3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_slb_a" class="col-sm-4 control-label">Jumlah penduduk sedang SLB A
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_slb_a" name="jumlah_penduduk_sedang_slb_a" value="{{ $default['jumlah_penduduk_sedang_slb_a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_slb_a" class="col-sm-4 control-label">Jumlah penduduk tamat SLB A
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_slb_a" name="jumlah_penduduk_tamat_slb_a" value="{{ $default['jumlah_penduduk_tamat_slb_a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_slb_b" class="col-sm-4 control-label">Jumlah penduduk sedang SLB B
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_slb_b" name="jumlah_penduduk_sedang_slb_b" value="{{ $default['jumlah_penduduk_sedang_slb_b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_slb_b" class="col-sm-4 control-label">Jumlah penduduk tamat SLB B
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_slb_b" name="jumlah_penduduk_tamat_slb_b" value="{{ $default['jumlah_penduduk_tamat_slb_b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_sedang_slb_c" class="col-sm-4 control-label">Jumlah penduduk sedang SLB C
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_sedang_slb_c" name="jumlah_penduduk_sedang_slb_c" value="{{ $default['jumlah_penduduk_sedang_slb_c'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_slb_c" class="col-sm-4 control-label">Jumlah penduduk tamat SLB C
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_slb_c" name="jumlah_penduduk_tamat_slb_c" value="{{ $default['jumlah_penduduk_tamat_slb_c'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_cacat_fisik_dan_mental" class="col-sm-4 control-label">Jumlah penduduk cacat
                    fisik dan mental (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_cacat_fisik_dan_mental" name="jumlah_penduduk_cacat_fisik_dan_mental" value="{{ $default['jumlah_penduduk_cacat_fisik_dan_mental'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_buta_huruf" class="col-sm-4 control-label">Jumlah penduduk Buta huruf
                    (%)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_buta_huruf" name="jumlah_penduduk_buta_huruf" value="{{ $default['jumlah_penduduk_buta_huruf'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_tamat_sltpsederajat_dua" class="col-sm-4 control-label">Jumlah penduduk tamat
                    SLTP/sederajat (%)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_tamat_sltpsederajat_dua" name="jumlah_penduduk_tamat_sltpsederajat_dua" value="{{ $default['jumlah_penduduk_tamat_sltpsederajat_dua'] ?? 0 }}">
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
            $('input[name=jumlah_penduduk_buta_aksara_dan_huruf_latin], input[name=jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak], input[name=jumlah_anak_dan_penduduk_cacat_fisik_dan_mental], input[name=jumlah_penduduk_sedang_sdsederajat], input[name=jumlah_penduduk_tamat_sdsederajat], input[name=jumlah_penduduk_tidak_tamat_sdsederajat], input[name=jumlah_penduduk_sedang_sltpsederajat], input[name=jumlah_penduduk_tamat_sltpsederajat], input[name=jumlah_penduduk_sedang_slta_sederajat], input[name=jumlah_penduduk_tidak_tamat_sltpsederajat], input[name=jumlah_penduduk_tamat_slta_sederajat], input[name=jumlah_penduduk_sedang_d1], input[name=jumlah_penduduk_tamat_d2], input[name=jumlah_penduduk_sedang_d3], input[name=jumlah_penduduk_tamat_d3], input[name=jumlah_penduduk_sedang_s1], input[name=jumlah_penduduk_tamat_s1], input[name=jumlah_penduduk_sedang_s2], input[name=jumlah_penduduk_tamat_s2], input[name=jumlah_penduduk_tamat_s3], input[name=jumlah_penduduk_sedang_slb_a], input[name=jumlah_penduduk_tamat_slb_a], input[name=jumlah_penduduk_sedang_slb_b], input[name=jumlah_penduduk_tamat_slb_b], input[name=jumlah_penduduk_sedang_slb_c], input[name=jumlah_penduduk_tamat_slb_c], input[name=jumlah_penduduk_cacat_fisik_dan_mental], input[name=jumlah_penduduk_buta_huruf], input[name=jumlah_penduduk_tamat_sltpsederajat_dua]').inputmask(integerObj);
        });
    </script>
@endpush
