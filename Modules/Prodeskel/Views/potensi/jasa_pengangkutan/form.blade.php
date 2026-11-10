@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Jasa Pengangkutan Umum</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.jasaPengangkutan') }}">Jasa Pengangkutan Umum</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.jasaPengangkutan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Jasa Pengangkutan Umum</a>
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
                <label for="jasa_pengangkutan" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\KomoditasKategoriPengangkutanEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jasa_pengangkutan" @if ($loop->first) required @endif @checked($default['jasa_pengangkutan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_angkutan" class="col-sm-2 control-label">Jenis Angkutan</label>
                <div class="col-sm-10">
                    <select name="jenis_angkutan" class="form-control select2 required">
                        <option value="">Pilih Jenis Angkutan</option>
                        @foreach (Modules\Prodeskel\Enums\KomoditasJenisAngkutanEnum::allMap() as $key => $items)
                            <optgroup @disabled($default['kategori'] != $key) value="{{ $key }}" label="{{ Modules\Prodeskel\Enums\KomoditasKategoriPengangkutanEnum::valueOf($key) }}">
                                @foreach ($items as $k => $item)
                                    <option @selected($default['jenis_angkutan'] == $k) value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_unit" class="col-sm-2 control-label">Jumlah Unit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_unit" value="{{ $default['jumlah_unit'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pemilik" class="col-sm-2 control-label">Jumlah Pemilik Orang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pemilik" value="{{ $default['jumlah_pemilik'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="kapasitas" class="col-sm-2 control-label">Kapasitas Orang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="kapasitas" value="{{ $default['kapasitas'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="tenaga_kerja" class="col-sm-2 control-label">Tenaga Kerja Orang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="tenaga_kerja" value="{{ $default['tenaga_kerja'] ?? 0 }}">
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
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_unit], input[name=jumlah_pemilik], input[name=kapasitas], input[name=tenaga_kerja]').inputmask(integerObj);

            $('[name=jasa_pengangkutan]').change(function() {
                let _val = $(this).val()
                console.log(_val);
                $('select[name=jenis_angkutan]').val('')
                $('select[name=jenis_angkutan]').find('optgroup').prop('disabled', 1)
                if ($(this).val()) {
                    $('select[name=jenis_angkutan]').find(`optgroup[value="${_val}"]`).prop('disabled', 0)
                }
            })
        });
    </script>
@endpush
