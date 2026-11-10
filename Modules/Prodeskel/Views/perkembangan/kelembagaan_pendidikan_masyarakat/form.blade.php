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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kelembagaan Pendidikan Masyarakat</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kelembagaan Pendidikan Masyarakat</a>
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
                <label for="jumlah_perpustakaan_desa_kelurahan" class="col-sm-4 control-label">Jumlah perpustakaan
                    desa/kelurahan (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_perpustakaan_desa_kelurahan" name="jumlah_perpustakaan_desa_kelurahan" value="{{ $default['jumlah_perpustakaan_desa_kelurahan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_taman_bacaan_desa_kelurahan" class="col-sm-4 control-label">Jumlah taman bacaan
                    desa/kelurahan (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_taman_bacaan_desa_kelurahan" name="jumlah_taman_bacaan_desa_kelurahan" value="{{ $default['jumlah_taman_bacaan_desa_kelurahan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_perpustakaan_keliling" class="col-sm-4 control-label">Jumlah perpustakaan keliling
                    (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_perpustakaan_keliling" name="jumlah_perpustakaan_keliling" value="{{ $default['jumlah_perpustakaan_keliling'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_sanggar_belajar" class="col-sm-4 control-label">Jumlah sanggar belajar (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_sanggar_belajar" name="jumlah_sanggar_belajar" value="{{ $default['jumlah_sanggar_belajar'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kegiatan_lembaga_pendidikan_luar_sekolah" class="col-sm-4 control-label">Jumlah kegiatan
                    lembaga pendidikan luar sekolah (Kegiatan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_lembaga_pendidikan_luar_sekolah" name="jumlah_kegiatan_lembaga_pendidikan_luar_sekolah" value="{{ $default['jumlah_kegiatan_lembaga_pendidikan_luar_sekolah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kelompok_belajar_paket_a" class="col-sm-4 control-label">Jumlah kelompok belajar Paket A
                    (Kelompok)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kelompok_belajar_paket_a" name="jumlah_kelompok_belajar_paket_a" value="{{ $default['jumlah_kelompok_belajar_paket_a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta_ujian_paket_a" class="col-sm-4 control-label">Jumlah peserta ujian Paket A
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_peserta_ujian_paket_a" name="jumlah_peserta_ujian_paket_a" value="{{ $default['jumlah_peserta_ujian_paket_a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kelompok_belajar_paket_b" class="col-sm-4 control-label">Jumlah kelompok belajar Paket B
                    (Kelompok)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kelompok_belajar_paket_b" name="jumlah_kelompok_belajar_paket_b" value="{{ $default['jumlah_kelompok_belajar_paket_b'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta_ujian_paket_b" class="col-sm-4 control-label">Jumlah peserta ujian Paket B
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_peserta_ujian_paket_b" name="jumlah_peserta_ujian_paket_b" value="{{ $default['jumlah_peserta_ujian_paket_b'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kelompok_belajar_paket_c" class="col-sm-4 control-label">Jumlah kelompok belajar Paket C
                    (Kelompok)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kelompok_belajar_paket_c" name="jumlah_kelompok_belajar_paket_c" value="{{ $default['jumlah_kelompok_belajar_paket_c'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta_ujian_paket_c" class="col-sm-4 control-label">Jumlah peserta ujian Paket C
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_peserta_ujian_paket_c" name="jumlah_peserta_ujian_paket_c" value="{{ $default['jumlah_peserta_ujian_paket_c'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_lembaga_kursus_keterampilan" class="col-sm-4 control-label">Jumlah lembaga kursus
                    keterampilan (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_lembaga_kursus_keterampilan" name="jumlah_lembaga_kursus_keterampilan" value="{{ $default['jumlah_lembaga_kursus_keterampilan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta_kursus_keterampilan" class="col-sm-4 control-label">Jumlah peserta kursus
                    keterampilan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_peserta_kursus_keterampilan" name="jumlah_peserta_kursus_keterampilan" value="{{ $default['jumlah_peserta_kursus_keterampilan'] ?? 0 }}">
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
            $('input[name=jumlah_perpustakaan_desa_kelurahan], input[name=jumlah_taman_bacaan_desa_kelurahan], input[name=jumlah_perpustakaan_keliling], input[name=jumlah_sanggar_belajar], input[name=jumlah_kegiatan_lembaga_pendidikan_luar_sekolah], input[name=jumlah_kelompok_belajar_paket_a], input[name=jumlah_peserta_ujian_paket_a], input[name=jumlah_kelompok_belajar_paket_b], input[name=jumlah_peserta_ujian_paket_b], input[name=jumlah_kelompok_belajar_paket_c], input[name=jumlah_peserta_ujian_paket_c], input[name=jumlah_lembaga_kursus_keterampilan], input[name=jumlah_peserta_kursus_keterampilan]').inputmask(integerObj);
        });
    </script>
@endpush
