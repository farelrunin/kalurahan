@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Produksi Peternakan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.produksiPeternakan') }}">Produksi Peternakan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.produksiPeternakan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Produksi Peternakan</a>
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
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Air liur burung walet' || $default['jenis_produksi'] == '') value="Air liur burung walet">
                            Air liur burung walet</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Bulu') value="Bulu">
                            Bulu</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Burung walet') value="Burung walet">
                            Burung walet</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Cinderamata') value="Cinderamata">
                            Cinderamata</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Daging') value="Daging">
                            Daging</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Hiasan/lukisan') value="Hiasan/lukisan">
                            Hiasan/lukisan</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Kerupuk Kulit') value="Kerupuk Kulit">
                            Kerupuk Kulit</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Kulit') value="Kulit">
                            Kulit</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Madu') value="Madu">
                            Madu</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Susu') value="Susu">
                            Susu</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="jenis_produksi" @checked($default['jenis_produksi'] == 'Telur') value="Telur">
                            Telur</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="hasil_produksi" class="col-sm-4 control-label">Hasil Produksi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="hasil_produksi" value="{{ $default['hasil_produksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="satuan" class="col-sm-4 control-label">Satuan</label>
                <div class="col-sm-8">
                    <select name="satuan" class="form-control select2">
                        @foreach (Modules\Prodeskel\Enums\SatuanTernakEnum::all() as $key => $item)
                            <option @selected($default['satuan'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_produksi" class="col-sm-4 control-label">Nilai Produksi Tahun Ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="nilai_produksi" value="{{ $default['nilai_produksi'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_bahan_baku" class="col-sm-4 control-label">Nilai Bahan Baku yang Digunakan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="nilai_bahan_baku" value="{{ $default['nilai_bahan_baku'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nilai_bahan_penolong" class="col-sm-4 control-label">Nilai Bahan Penolong yang Digunakan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="nilai_bahan_penolong" value="{{ $default['nilai_bahan_penolong'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_ternak" class="col-sm-4 control-label">Jumlah Ternak Tahun Ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="jumlah_ternak" value="{{ $default['jumlah_ternak'] ?? 0 }}">
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
            // Gunakan integerObj untuk jumlah ternak dan hasil produksi fisik
            $('input[name=jumlah_ternak], input[name=hasil_produksi]').inputmask(integerObj);
            // Gunakan decimalObj untuk nilai/harga dalam rupiah
            $('input[name=nilai_produksi], input[name=nilai_bahan_baku], input[name=nilai_bahan_penolong]').inputmask(decimalObj);
        });
    </script>
@endpush
