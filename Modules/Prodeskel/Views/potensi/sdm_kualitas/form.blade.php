@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@push('css')
    <style>
        .form-horizontal .form-group {
            margin-right: -10px;
            margin-left: -10px;
        }

        .form-horizontal .control-label {
            padding-top: 5px;
            padding-bottom: 5px;
            margin-bottom: 0;
        }
    </style>
@endpush

@section('title')
    <h1>
        Prodeskel
        <small>Kualitas Angkatan Kerja</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumberdaya Manusia</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.sdmKualitas') }}">Kualitas Angkatan Kerja</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.sdmKualitas') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kualitas Angkatan Kerja</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group">
                <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-10">
                    <select name="tahun" class="form-control required">
                        @for ($i = $default['tahun'] - 2; $i <= $default['tahun']; $i++)
                            <option @selected($default['tahun'] == $i) value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
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
                <label for="kualitas_angkatan_kerja" class="col-sm-2 control-label">Angkatan Kerja</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\AngkatanKerjaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kualitas_angkatan_kerja" class="required" @checked($default['kualitas_angkatan_kerja'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="laki_laki" class="col-sm-2 control-label">Laki-laki (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="laki_laki" value="{{ $default['laki_laki'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="perempuan" class="col-sm-2 control-label">Perempuan (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="perempuan" value="{{ $default['perempuan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label text-primary">Jumlah (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
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
            $('input[name=laki_laki], input[name=perempuan], input[name=jumlah]').inputmask(integerObj);

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
