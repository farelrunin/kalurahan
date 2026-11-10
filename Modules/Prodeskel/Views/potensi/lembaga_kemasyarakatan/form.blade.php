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
        <small>Lembaga Kemasyarakatan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="active">Lembaga Kemasyarakatan</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lembagaKemasyarakatan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga Kemasyarakatan</a>
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
                <label for="jenis_lembaga" class="col-sm-2 control-label">Jenis Lembaga</label>
                <div class="col-sm-10">
                    <select name="jenis_lembaga" class="form-control select2 required">
                        @foreach (Modules\Prodeskel\Enums\KomoditasJenisLembagaEnum::all() as $key => $item)
                            <option @selected($default['jenis_lembaga'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="dasar_hukum_pembentukan" class="col-sm-2 control-label">Dasar Hukum Pembentukan</label>
                <div class="col-sm-10">
                    <select name="dasar_hukum_pembentukan" class="form-control select2 required">
                        @foreach (Modules\Prodeskel\Enums\KomoditasDasarHukumPembentukanEnum::all() as $key => $item)
                            <option @selected($default['dasar_hukum_pembentukan'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pengurus" class="col-sm-2 control-label">Jumlah Pengurus (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pengurus" value="{{ $default['jumlah_pengurus'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="alamat_kantor" class="col-sm-2 control-label">Alamat Kantor</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat_kantor" rows="3">{{ $default['alamat_kantor'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_jenis_kegiatan" class="col-sm-2 control-label">Jumlah Jenis Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control angka-inputmask" name="jumlah_jenis_kegiatan" value="{{ $default['jumlah_jenis_kegiatan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ruang_lingkup_kegiatan" class="col-sm-2 control-label">Ruang Lingkup Kegiatan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="ruang_lingkup_kegiatan" rows="3">{{ $default['ruang_lingkup_kegiatan'] ?? '' }}</textarea>
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
            $('input[name=jumlah_pengurus], input[name=jumlah_jenis_kegiatan]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=jumlah]').inputmask(decimalObj);

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
