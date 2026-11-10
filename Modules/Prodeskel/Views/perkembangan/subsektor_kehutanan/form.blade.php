@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Produk Domestik Desa Bruto</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Produk Domestik Desa Bruto</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Subsektor Kehutanan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Subsektor Kehutanan</a>
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
                <label for="produksi" class="col-sm-4 control-label">Total nilai produksi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="produksi" name="produksi" value="{{ $default['produksi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bahan_baku" class="col-sm-4 control-label">Total nilai bahan baku yang digunakan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="bahan_baku" name="bahan_baku" value="{{ $default['bahan_baku'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="bahan_penolong" class="col-sm-4 control-label">Total nilai bahan penolong yang digunakan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="bahan_penolong" name="bahan_penolong" value="{{ $default['bahan_penolong'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="biaya" class="col-sm-4 control-label">Total biaya antara yang dihabiskan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="biaya" name="biaya" value="{{ $default['biaya'] ?? 0 }}">
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
            $('.angka-inputmask').inputmask(decimalObj);
        });
    </script>
@endpush
