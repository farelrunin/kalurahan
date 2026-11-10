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
    <li>Penguasaan Aset Ekonomi Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sarana Produksi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sarana Produksi</a>
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
                <label for="penggilingan_padi" class="col-sm-4 control-label">Memiliki penggilingan padi (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="penggilingan_padi" value="{{ $default['penggilingan_padi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="traktor" class="col-sm-4 control-label">Memiliki traktor (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="traktor" value="{{ $default['traktor'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pabrik_pengolahan_pertanian" class="col-sm-4 control-label">Memiliki pabrik pengolahan hasil
                    pertanian (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="pabrik_pengolahan_pertanian" value="{{ $default['pabrik_pengolahan_pertanian'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kapal_penangkap_ikan" class="col-sm-4 control-label">Memiliki kapal penangkap ikan
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="kapal_penangkap_ikan" value="{{ $default['kapal_penangkap_ikan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_pengolahan_hasil_perikanan" class="col-sm-4 control-label">Memiliki alat pengolahan hasil
                    perikanan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_pengolahan_hasil_perikanan" value="{{ $default['alat_pengolahan_hasil_perikanan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_pengolahan_hasil_peternakan" class="col-sm-4 control-label">Memiliki alat pengolahan hasil
                    peternakan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_pengolahan_hasil_peternakan" value="{{ $default['alat_pengolahan_hasil_peternakan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_pengolahan_hasil_perkebunan" class="col-sm-4 control-label">Memiliki alat pengolahan hasil
                    perkebunan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_pengolahan_hasil_perkebunan" value="{{ $default['alat_pengolahan_hasil_perkebunan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_pengolahan_hasil_hutan" class="col-sm-4 control-label">Memiliki alat pengolahan hasil hutan
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_pengolahan_hasil_hutan" value="{{ $default['alat_pengolahan_hasil_hutan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_produksi_pengolah_hasil_tambang" class="col-sm-4 control-label">Memiliki alat produksi dan
                    pengolah hasil pertambangan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_produksi_pengolah_hasil_tambang" value="{{ $default['alat_produksi_pengolah_hasil_tambang'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_produksi_pengolah_hasil_pariwisata" class="col-sm-4 control-label">Memiliki alat produksi
                    dan pengolah hasil pariwisata (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_produksi_pengolah_hasil_pariwisata" value="{{ $default['alat_produksi_pengolah_hasil_pariwisata'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_produksi_pengolah_hasil_industri_jasa_perdagangan" class="col-sm-4 control-label">Memiliki
                    alat produksi dan pengolah hasil industri jasa Perdagangan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_produksi_pengolah_hasil_industri_jasa_perdagangan" value="{{ $default['alat_produksi_pengolah_hasil_industri_jasa_perdagangan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_produksi_pengolah_hasil_industri_kerajinan" class="col-sm-4 control-label">Memiliki alat
                    produksi dan pengolahan hasil industri kerajinan keluarga skala kecil dan menengah (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_produksi_pengolah_hasil_industri_kerajinan" value="{{ $default['alat_produksi_pengolah_hasil_industri_kerajinan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alat_produksi_pengolah_hasil_industri_migas" class="col-sm-4 control-label">Memiliki alat
                    produksi dan pengolahan hasil industri Migas (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="alat_produksi_pengolah_hasil_industri_migas" value="{{ $default['alat_produksi_pengolah_hasil_industri_migas'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-4 control-label text-primary">Jumlah (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
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
            $('input[name=penggilingan_padi], input[name=traktor], input[name=pabrik_pengolahan_pertanian], input[name=kapal_penangkap_ikan], input[name=alat_pengolahan_hasil_perikanan], input[name=alat_pengolahan_hasil_peternakan], input[name=alat_pengolahan_hasil_perkebunan], input[name=alat_pengolahan_hasil_hutan], input[name=alat_produksi_pengolah_hasil_tambang], input[name=alat_produksi_pengolah_hasil_pariwisata], input[name=alat_produksi_pengolah_hasil_industri_jasa_perdagangan], input[name=alat_produksi_pengolah_hasil_industri_kerajinan], input[name=alat_produksi_pengolah_hasil_industri_migas], input[name=jumlah]').inputmask(integerObj);

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
