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
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Penderita Sakit</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Penderita Sakit</a>
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
                <label for="{{ $item }}" class="col-sm-4 control-label">Jenis Penyakit</label>
                <div class="col-sm-8">
                    <select name="{{ $item }}" class="form-control select2 required">
                        <option value="">Pilih Jenis Penyakit</option>
                        @foreach (\Modules\Prodeskel\Enums\JenisPenyakitEnum::all() as $k => $val)
                            <option @selected($default[$item] == $k) value="{{ $k }}">{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_penderita" class="col-sm-4 control-label">Jumlah Penderita (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_penderita" value="{{ $default['jumlah_penderita'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tempat_perawatan" class="col-sm-4 control-label">Tempat Perawatan</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label><input type="radio" name="tempat_perawatan" @checked($default['tempat_perawatan'] == 'Rumah') value="Rumah">
                            Rumah</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="tempat_perawatan" @checked($default['tempat_perawatan'] == 'Rumah Sakit') value="Rumah Sakit">
                            Rumah Sakit</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="tempat_perawatan" @checked($default['tempat_perawatan'] == 'Puskesmas') value="Puskesmas">
                            Puskesmas</label>
                    </div>
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
            $('input[name=jumlah_penderita]').inputmask(integerObj);

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
