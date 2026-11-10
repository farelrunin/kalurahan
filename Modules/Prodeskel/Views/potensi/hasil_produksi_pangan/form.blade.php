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
        <small>Hasil Produksi Tanaman Pangan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li>Potensi Pertanian</li>
    <li>Tanaman Pangan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.hasilProduksiPangan') }}">Hasil Produksi Tanaman Pangan</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.hasilProduksiPangan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Hasil Produksi Tanaman Pangan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group">
                <label for="tahun" class="col-sm-2 control-label">Tahun {{ $default['tahun'] }}</label>
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
                <label for="jenis_produksi_pangan" class="col-sm-2 control-label">Nama Komoditas</label>
                <div class="col-sm-10">
                    <select name="jenis_produksi_pangan" class="form-control select2 required">
                        <option value="">Pilih Komoditas</option>
                        @foreach (Modules\Prodeskel\Enums\KomoditasTanamanPanganEnum::all() as $key => $item)
                            <option @selected($default['jenis_produksi_pangan'] == $key) value="{{ $key }}">{{ $item }}</option>
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
                <label for="harga_local" class="col-sm-2 control-label">Harga Lokal (Rp/Ton)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="harga_local" value="{{ $default['harga_local'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="nilai_produksi_tahun_ini" class="col-sm-2 control-label text-primary">1. Nilai Produksi Tahun
                    Ini (Rp)</label>
                <div class="col-sm-10">
                    <input
                        type="text"
                        class="form-control  angka-inputmask"
                        readonly
                        name="nilai_produksi_tahun_ini"
                        data-pengali=1
                        data-summary="saldo_produksi"
                        value="{{ $default['nilai_produksi_tahun_ini'] ?? 0 }}"
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_pemupukan" class="col-sm-2 control-label">2. Biaya Pemupukan (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="biaya_pemupukan" data-pengali=-1 data-summary="saldo_produksi" value="{{ $default['biaya_pemupukan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_bibit" class="col-sm-2 control-label">3. Biaya Bibit (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="biaya_bibit" data-pengali=-1 data-summary="saldo_produksi" value="{{ $default['biaya_bibit'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_obat" class="col-sm-2 control-label">4. Biaya Obat (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="biaya_obat" data-pengali=-1 data-summary="saldo_produksi" value="{{ $default['biaya_obat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya_lainnya" class="col-sm-2 control-label">5. Biaya Lainnya (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="biaya_lainnya" data-pengali=-1 data-summary="saldo_produksi" value="{{ $default['biaya_lainnya'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="saldo_produksi" class="col-sm-2 control-label text-primary">Saldo Produksi (Rp)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="saldo_produksi" value="{{ $default['saldo_produksi'] ?? 0 }}">
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
            $('.angka-inputmask').inputmask(decimalObj);

            $('input[name=luas_produksi],input[name=hasil_produksi], input[name=harga_local]').change(function() {                
                let hasil = getRawValue('hasil_produksi')
                let luas = getRawValue('luas_produksi')
                let hargaLocal = getRawValue('harga_local')
                let total = hasil * luas * hargaLocal                             
                $(`input[name=nilai_produksi_tahun_ini]`).val(indonesiaFormat(total))
            })

            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name')) * $(this).data('pengali')
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })
        });
    </script>
@endpush
