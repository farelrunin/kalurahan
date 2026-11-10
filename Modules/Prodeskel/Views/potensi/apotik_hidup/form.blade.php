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
        <small>Apotik Hidup</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.apotikHidup') }}">Apotik Hidup</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.apotikHidup') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Apotik Hidup</a>
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
                <label for="jenis_apotik_hidup" class="col-sm-2 control-label">Nama Tanaman Apotik Hidup</label>
                <div class="col-sm-10">
                    <select name="jenis_apotik_hidup" class="form-control select2 required">
                        <option value="">Pilih tanaman</option>
                        @foreach (Modules\Prodeskel\Enums\KomoditasApotikHidupEnum::all() as $key => $item)
                            <option @selected($default['jenis_apotik_hidup'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="luas_produksi" class="col-sm-2 control-label">Luas Produksi (Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="luas_produksi" value="{{ $default['luas_produksi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hasil_produksi" class="col-sm-2 control-label">Hasil Produksi (Ton/Ha)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="hasil_produksi" value="{{ $default['hasil_produksi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_produksi" class="col-sm-2 control-label text-primary">Jumlah Produksi (Ton)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah_produksi" value="{{ $default['jumlah_produksi'] ?? 0 }}">
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
            $('input[name=jumlah_produksi]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=luas_produksi], input[name=hasil_produksi]').inputmask(decimalObj);

            $('input[name=luas_produksi],input[name=hasil_produksi]').change(function() {
                let hasil = parseInt($('input[name=hasil_produksi]').val().replace('.', ''))
                let luas = parseInt($('input[name=luas_produksi]').val().replace('.', ''))
                let total = hasil * luas

                $(`input[name=jumlah_produksi]`).val(total)
            })
        });
    </script>
@endpush
