@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Prasarana Komunikasi dan Informasi</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumberdaya Manusia</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.komunikasiInformasi') }}">Prasarana Komunikasi dan
            Informasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.komunikasiInformasi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Prasarana Komunikasi dan Informasi</a>
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
                <label for="kategori" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                    @foreach (\Modules\Prodeskel\Enums\SaranaKomunikasiInformasiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kategori" class="required" @checked($default['kategori'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Jenis Sarana / Prasarana</label>
                <div class="col-sm-10">
                    <select name="jenis" class="form-control select2 required">
                        <option value="">Pilih Jenis Sarana / Prasarana</option>
                        @foreach (\Modules\Prodeskel\Enums\JenisPrasaranaKomunikasiInformasiEnum::allMap() as $key => $items)
                            <optgroup @disabled($default['kategori'] != $key) value="{{ $key }}" label="{{ \Modules\Prodeskel\Enums\SaranakomunikasiInformasiEnum::valueOf($key) }}">
                                @foreach ($items as $k => $item)
                                    <option @selected($default['jenis'] == $k) value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="kondisi_baik" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Satuan</label>
                <div class="col-sm-10">
                    <select name="satuan" class="form-control select2 required">
                        <option value="">Pilih Satuan</option>
                        @foreach (Modules\Prodeskel\Enums\SatuanEnum::all() as $key => $item)
                            <option @selected($default['satuan'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
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

@push('css')
    <style>
        .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('bootstrap/js/jquery.inputmask.js') }}"></script>
    <script>
        @include('prodeskel::assets.extension.numeric')
        $(document).ready(function() {
            @include('prodeskel::assets.script')
            $('.angka-inputmask').inputmask(decimalObj);

            $('input[name=kategori]').change(function() {
                let _val = $(this).val();
                $('select[name=jenis]').val('');
                $('select[name=jenis] optgroup').prop('disabled', true);
                if ($(this).is(':checked')) {
                    $('select[name=jenis] optgroup[value="' + _val + '"]').prop('disabled', false);
                }
            });
        });
    </script>
@endpush
