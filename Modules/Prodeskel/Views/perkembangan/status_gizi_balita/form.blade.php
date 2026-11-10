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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Status Gizi Balita</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Status Gizi Balita</a>
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
                <label for="jumlah_balita_bergizi_buruk" class="col-sm-4 control-label">Jumlah Balita bergizi buruk</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_balita" name="jumlah_balita_bergizi_buruk" value="{{ $default['jumlah_balita_bergizi_buruk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_balita_bergizi_baik" class="col-sm-4 control-label">Jumlah Balita bergizi baik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_balita" name="jumlah_balita_bergizi_baik" value="{{ $default['jumlah_balita_bergizi_baik'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_balita_bergizi_kurang" class="col-sm-4 control-label">Jumlah Balita bergizi
                    kurang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_balita" name="jumlah_balita_bergizi_kurang" value="{{ $default['jumlah_balita_bergizi_kurang'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_balita_bergizi_lebih" class="col-sm-4 control-label">Jumlah Balita bergizi lebih</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah_balita" name="jumlah_balita_bergizi_lebih" value="{{ $default['jumlah_balita_bergizi_lebih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_balita" class="col-sm-4 control-label text-primary">Jumlah Balita</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" readonly name="jumlah_balita" value="{{ $default['jumlah_balita'] ?? 0 }}">
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
            $('input[name=jumlah_balita_bergizi_buruk], input[name=jumlah_balita_bergizi_baik], input[name=jumlah_balita_bergizi_kurang], input[name=jumlah_balita_bergizi_lebih], input[name=jumlah_balita]').inputmask(integerObj);

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
