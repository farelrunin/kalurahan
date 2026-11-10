@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Usia</small>
    </h1>
@endsection
@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Manusia</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.sdmUsia') }}">Usia</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.sdmUsia') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Usia</a>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Laki-Laki</label>
                    </div>
                    @foreach (range(0, 76) as $umur)
                        <div class="form-group">
                            <label for="lk_{{ $umur }}" class="col-sm-6 control-label">{{ $umur }}
                                Tahun</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control  angka-inputmask" name="lk_{{ $umur }}" value="{{ $default['lk_' . $umur] ?? 0 }}">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Perempuan</label>
                    </div>

                    @foreach (range(0, 76) as $umur)
                        <div class="form-group">
                            <label for="pr_{{ $umur }}" class="col-sm-6 control-label">{{ $umur }}
                                Tahun</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control  angka-inputmask" name="pr_{{ $umur }}" value="{{ $default['pr_' . $umur] ?? 0 }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
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

        $('input[name=lk_76], input[name=pr_76]').closest('.form-group').find('label').text('> 75 Tahun')
    </script>
@endpush
