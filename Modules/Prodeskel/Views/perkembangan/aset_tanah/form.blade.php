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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Aset Tanah</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Aset Tanah</a>
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
                <label for="tanah_00" class="col-sm-4 control-label">Tidak Memiliki Tanah (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_00" value="{{ $default['tanah_00'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_01" class="col-sm-4 control-label">Memiliki Tanah kurang dari 0,2 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_01" value="{{ $default['tanah_01'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_02" class="col-sm-4 control-label">Memiliki Tanah antara 0,21-0,3 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_02" value="{{ $default['tanah_02'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_03" class="col-sm-4 control-label">Memiliki Tanah antara 0,31-0,4 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_03" value="{{ $default['tanah_03'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_04" class="col-sm-4 control-label">Memiliki Tanah antara 0,41-0,5 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_04" value="{{ $default['tanah_04'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_05" class="col-sm-4 control-label">Memiliki Tanah antara 0,51-0,6 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_05" value="{{ $default['tanah_05'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_06" class="col-sm-4 control-label">Memiliki Tanah antara 0,61-0,7 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_06" value="{{ $default['tanah_06'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_07" class="col-sm-4 control-label">Memiliki Tanah antara 0,71-0,8 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_07" value="{{ $default['tanah_07'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_08" class="col-sm-4 control-label">Memiliki Tanah antara 0,81-0,9 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_08" value="{{ $default['tanah_08'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_09" class="col-sm-4 control-label">Memiliki Tanah antara 0,91-1,0 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_09" value="{{ $default['tanah_09'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_10" class="col-sm-4 control-label">Memiliki Tanah antara 1,00-5,0 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_10" value="{{ $default['tanah_10'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_50" class="col-sm-4 control-label">Memiliki Tanah antara 5,00-10 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_50" value="{{ $default['tanah_50'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="tanah_100" class="col-sm-4 control-label">Memiliki Tanah lebih dari 10 Ha (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah" name="tanah_100" value="{{ $default['tanah_100'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-4 control-label text-primary">Jumlah Total Penduduk (Orang)</label>
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
            $('input[name=tanah_00], input[name=tanah_01], input[name=tanah_02], input[name=tanah_03], input[name=tanah_04], input[name=tanah_05], input[name=tanah_06], input[name=tanah_07], input[name=tanah_08], input[name=tanah_09], input[name=tanah_10], input[name=tanah_50], input[name=tanah_100], input[name=jumlah]').inputmask(integerObj);

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
