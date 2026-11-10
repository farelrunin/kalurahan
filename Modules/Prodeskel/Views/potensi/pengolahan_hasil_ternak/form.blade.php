@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Pengolahan Hasil Ternak</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.pengolahanHasilTernak') }}">Pengolahan Hasil Ternak</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.pengolahanHasilTernak') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pengolahan Hasil Ternak</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group">
                <label for="tahun" class="col-sm-4 control-label">Tahun {{ $default['tahun'] }}</label>
                <div class="col-sm-8">
                    <select name="tahun" class="form-control required">
                        @for ($i = $default['tahun'] - 2; $i <= ($default['tahun'] < date('Y') ? date('Y') : $default['tahun']); $i++)
                            <option @selected($default['tahun'] == $i) value="{{ $i }}">{{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
                <div class="col-sm-8">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control input-sm datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pengolahan_hasil_ternak" class="col-sm-4 control-label">Jenis Usaha Pengolahan Hasil
                    Ternak</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Abon' || $default['pengolahan_hasil_ternak'] == '') value="Abon">
                            Abon</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Biogas') value="Biogas">
                            Biogas</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Dendeng') value="Dendeng">
                            Dendeng</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Kerajinan Tangan (handy craft)') value="Kerajinan Tangan (handy craft)">
                            Kerajinan Tangan (handy craft)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Kerupuk Kulit') value="Kerupuk Kulit">
                            Kerupuk Kulit</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Madu Lebah') value="Madu Lebah">
                            Madu Lebah</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Minyak Hewani') value="Minyak Hewani">
                            Minyak Hewani</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Penyamakan Kulit') value="Penyamakan Kulit">
                            Penyamakan Kulit</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="pengolahan_hasil_ternak" @checked($default['pengolahan_hasil_ternak'] == 'Telur Asin') value="Telur Asin">
                            Telur Asin</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pemilik" class="col-sm-4 control-label">Jumlah Pemilik (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="jumlah_pemilik" value="{{ $default['jumlah_pemilik'] ?? 0 }}">
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
            $('input[name=jumlah_pemilik]').inputmask(integerObj);
        });
    </script>
@endpush
