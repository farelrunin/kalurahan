@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Produksi Perikanan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.alatProduksiIkanTawar') }}">Alat Produksi Budidaya Ikan Air
            Tawar</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.alatProduksiIkanTawar') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Produksi Perikanan</a>
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
                <label for="jenis_produksi" class="col-sm-4 control-label">Jenis Produksi</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Danau') value="Danau">
                            Danau (m2)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Empang/Kolam') value="Empang/Kolam">
                            Empang/Kolam (m2)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Jala') value="Jala">
                            Jala (Unit)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Keramba') value="Keramba">
                            Keramba (Unit)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Pancingan') value="Pancingan">
                            Pancingan (Unit)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Rawa') value="Rawa">
                            Rawa (m2)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Sawah') value="Sawah">
                            Sawah (m2)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Sungai') value="Sungai">
                            Sungai (m2)</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_alat" class="col-sm-4 control-label">Jumlah Alat / Luas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="jumlah_alat" value="{{ $default['jumlah_alat'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="hasil_produksi" class="col-sm-4 control-label">Hasil Produksi (Ton/Tahun)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="hasil_produksi" value="{{ $default['hasil_produksi'] ?? 0 }}">
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
            $('input[name=jumlah_alat]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=hasil_produksi]').inputmask(decimalObj);
        });
    </script>
@endpush
