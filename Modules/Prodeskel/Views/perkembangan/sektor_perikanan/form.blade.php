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
    <li>Struktur Mata Pencaharian Menurut Sektor</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Sektor Perikanan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Sektor Perikanan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::perkembangan.bulan_tahun', ['controlLabel' => 'col-sm-3', 'controlInput' => 'col-sm-9'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-9">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="nelayan" class="col-sm-3 control-label">Nelayan (Orang)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="nelayan" data-summary="jumlah" value="{{ $default['nelayan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pemilik_usaha_perikanan" class="col-sm-3 control-label">Pemilik Usaha Perikanan (Orang)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="pemilik_usaha_perikanan" data-summary="jumlah" value="{{ $default['pemilik_usaha_perikanan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="buruh_usaha_perikanan" class="col-sm-3 control-label">Buruh Usaha Perikanan (Orang)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="buruh_usaha_perikanan" data-summary="jumlah" value="{{ $default['buruh_usaha_perikanan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-3 control-label text-primary">Jumlah (Orang)</label>
                <div class="col-sm-9">
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
            $('input[name=nelayan], input[name=pemilik_usaha_perikanan], input[name=buruh_usaha_perikanan], input[name=jumlah]').inputmask(integerObj);

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
