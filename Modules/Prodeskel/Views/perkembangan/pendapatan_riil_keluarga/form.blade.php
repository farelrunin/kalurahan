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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pendapatan Riil Keluarga</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pendapatan Riil Keluarga</a>
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
                <label for="jumlah_kepala_keluarga" class="col-sm-4 control-label">Jumlah Kepala Keluarga (KK)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kepala_keluarga" value="{{ $default['jumlah_kepala_keluarga'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_keluarga" class="col-sm-4 control-label">Jumlah Anggota Keluarga (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_keluarga" value="{{ $default['jumlah_anggota_keluarga'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pendapatan_kepala_keluarga" class="col-sm-4 control-label">Jumlah Pendapatan Kepala
                    Keluarga (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="total_pendapatan" name="jumlah_pendapatan_kepala_keluarga" value="{{ $default['jumlah_pendapatan_kepala_keluarga'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja" class="col-sm-4 control-label">Jumlah
                    pendapatan dari anggota keluarga yang bekerja (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="total_pendapatan" name="jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja" value="{{ $default['jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_pendapatan" class="col-sm-4 control-label">Total Pendapatan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" readonly name="total_pendapatan" value="{{ $default['total_pendapatan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendapatan_anggota_keluarga" class="col-sm-4 control-label">Pendapatan Anggota Keluarga
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" readonly name="pendapatan_anggota_keluarga" value="{{ $default['pendapatan_anggota_keluarga'] ?? 0 }}">
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
            $('input[name=jumlah_kepala_keluarga], input[name=jumlah_anggota_keluarga], input[name=jumlah_pendapatan_kepala_keluarga], input[name=jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=total_pendapatan], input[name=pendapatan_anggota_keluarga]').inputmask(decimalObj);

            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
                $(`input[name=${summary}]`)// .trigger('change')
            })

            $("input[name='total_pendapatan']").change(function() {
                $("input[name='pendapatan_anggota_keluarga']")
                    .val(
                        parseInt($("input[name='total_pendapatan']").val().replace('.', '')) / (parseInt($("input[name='jumlah_kepala_keluarga']").val().replace('.', '')) + parseInt($("input[name='jumlah_anggota_keluarga']").val().replace('.', '')))
                    )
                    // .trigger('change')
            })
        });
    </script>
@endpush
