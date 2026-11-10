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
        <small>Partisipasi Politik</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumberdaya Manusia</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.partisipasiPolitik') }}">Partisipasi Politik</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.partisipasiPolitik') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Partisipasi Politik</a>
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
                <label for="jenis_pemilihan" class="col-sm-2 control-label">Angkatan Kerja</label>
                <div class="col-sm-10">
                    @foreach (Modules\Prodeskel\Enums\JenisPemilihanEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jenis_pemilihan" class="required" @checked($default['jenis_pemilihan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="wanita_hak_pilih" class="col-sm-2 control-label">Jumlah Wanita Yang Memiliki Hak Pilih</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah_pemilih" name="wanita_hak_pilih" value="{{ $default['wanita_hak_pilih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pria_hak_pilih" class="col-sm-2 control-label">Jumlah Pria Yang Memiliki Hak Pilih</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah_pemilih" name="pria_hak_pilih" value="{{ $default['pria_hak_pilih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pemilih" class="col-sm-2 control-label text-primary">Jumlah Pemilih (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah_pemilih" value="{{ $default['jumlah_pemilih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="wanita_memilih" class="col-sm-2 control-label">Jumlah Wanita Yang Memilih</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah_penggunaan_hak_pilih" name="wanita_memilih" value="{{ $default['wanita_memilih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pria_memilih" class="col-sm-2 control-label">Jumlah Pria Yang Memilih</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" data-summary="jumlah_penggunaan_hak_pilih" name="pria_memilih" value="{{ $default['pria_memilih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penggunaan_hak_pilih" class="col-sm-2 control-label text-primary">Jumlah Penggunaan Hak
                    Pilih (Orang)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah_penggunaan_hak_pilih" value="{{ $default['jumlah_penggunaan_hak_pilih'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="persentase" class="col-sm-2 control-label">Persentase</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="persentase" value="{{ $default['persentase'] ?? 0 }}">
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
            $('input[name=wanita_hak_pilih], input[name=pria_hak_pilih], input[name=jumlah_pemilih], input[name=wanita_memilih], input[name=pria_memilih], input[name=jumlah_penggunaan_hak_pilih]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=persentase]').inputmask(decimalObj);

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
