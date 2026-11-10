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
    <li>Produk Domestik Desa Bruto</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Pertambangan dan Galian</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Pertambangan dan Galian</a>
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
                <label for="total_nilai_produksi_tahun_ini" class="col-sm-4 control-label">Total nilai produksi tahun ini
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="total_nilai_produksi_tahun_ini" value="{{ $default['total_nilai_produksi_tahun_ini'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_bahan_baku_yang_digunakan" class="col-sm-4 control-label">Total nilai bahan baku
                    yang digunakan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="total_nilai_bahan_baku_yang_digunakan" value="{{ $default['total_nilai_bahan_baku_yang_digunakan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_bahan_penolong_yang_digunakan" class="col-sm-4 control-label">Total nilai bahan
                    penolong yang digunakan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="total_nilai_bahan_penolong_yang_digunakan" value="{{ $default['total_nilai_bahan_penolong_yang_digunakan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_biaya_antara_yang_dihabiskan" class="col-sm-4 control-label">Total biaya antara yang
                    dihabiskan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="total_biaya_antara_yang_dihabiskan" value="{{ $default['total_biaya_antara_yang_dihabiskan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada" class="col-sm-4 control-label">Jumlah
                    total jenis bahan tambang dan galian yang ada (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada" value="{{ $default['jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada'] ?? 0 }}">
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
            $('input[name=jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=total_nilai_produksi_tahun_ini], input[name=total_nilai_bahan_baku_yang_digunakan], input[name=total_nilai_bahan_penolong_yang_digunakan], input[name=total_biaya_antara_yang_dihabiskan]').inputmask(decimalObj);

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
