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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Bangunan Konstruksi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Bangunan Konstruksi</a>
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
                <label for="jumlah_bangunan_yang_ada_tahun_ini" class="col-sm-4 control-label">Jumlah bangunan yang ada
                    tahun ini (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="jumlah_bangunan_yang_ada_tahun_ini" value="{{ $default['jumlah_bangunan_yang_ada_tahun_ini'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_pemeliharaan_yang_dikeluarkan" class="col-sm-4 control-label">Biaya pemeliharaan yang
                    dikeluarkan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="biaya_pemeliharaan_yang_dikeluarkan" value="{{ $default['biaya_pemeliharaan_yang_dikeluarkan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="total_nilai_bangunan_yang_ada" class="col-sm-4 control-label">Total nilai bangunan yang ada
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="total_nilai_bangunan_yang_ada" value="{{ $default['total_nilai_bangunan_yang_ada'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_antara_lainnya" class="col-sm-4 control-label">Biaya antara lainnya (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="biaya_antara_lainnya" value="{{ $default['biaya_antara_lainnya'] ?? 0 }}">
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
            $('input[name=jumlah_bangunan_yang_ada_tahun_ini]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=biaya_pemeliharaan_yang_dikeluarkan], input[name=total_nilai_bangunan_yang_ada], input[name=biaya_antara_lainnya]').inputmask(decimalObj);

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
