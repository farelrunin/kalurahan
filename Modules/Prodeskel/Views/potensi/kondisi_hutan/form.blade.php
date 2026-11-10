@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Kepemilikan Lahan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.kondisiHutan') }}">Kondisi Hutan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.kondisiHutan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kondisi Hutan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_hutan" class="col-sm-2 control-label">Nama Komoditas</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasJenisHutanEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jenis_hutan" @checked($default['jenis_hutan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="kondisi_baik" class="col-sm-2 control-label">Kondisi Baik (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kondisi_baik" data-summary="jumlah_luas_hutan" value="{{ $default['kondisi_baik'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kondisi_rusak" class="col-sm-2 control-label">Kondisi Rusak (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kondisi_rusak" data-summary="jumlah_luas_hutan" value="{{ $default['kondisi_rusak'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_luas_hutan" class="col-sm-2 control-label text-primary">Jumlah Luas Hutan (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_luas_hutan" readonly value="{{ $default['jumlah_luas_hutan'] ?? 0 }}">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
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
            $('input[name=jumlah_luas_hutan]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=kondisi_baik], input[name=kondisi_rusak]').inputmask(decimalObj);
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
