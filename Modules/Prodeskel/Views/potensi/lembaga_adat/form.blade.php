@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@push('css')
    <style>
        .radio-inline {
            min-width: 40px;
            margin-right: 20px;
        }

        div>.radio-inline:first-child {
            margin-left: 20px;
        }
    </style>
@endpush

@section('title')
    <h1>
        Prodeskel
        <small>Lembaga Adat</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lembagaAdat') }}">Lembaga Adat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lembagaAdat') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga Adat</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun', ['controlLabel' => 'col-sm-3', 'controlInput' => 'col-sm-9'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-9">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Lembaga Adat</label>
            </div>

            <div class="form-group">
                <label for="pemangku_adat" class="col-sm-3 control-label">Pemangku Adat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pemangku_adat" class="required" @checked($default['pemangku_adat'] !== null && $default['pemangku_adat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="kepengurusan_adat" class="col-sm-3 control-label">Kepengurusan Adat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepengurusan_adat" class="required" @checked($default['kepengurusan_adat'] !== null && $default['kepengurusan_adat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Simbol Adat</label>
            </div>

            <div class="form-group">
                <label for="rumah_adat" class="col-sm-3 control-label">Rumah Adat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="rumah_adat" class="required" @checked($default['rumah_adat'] !== null && $default['rumah_adat'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="barang_pusaka" class="col-sm-3 control-label">Barang Pusaka</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="barang_pusaka" class="required" @checked($default['barang_pusaka'] !== null && $default['barang_pusaka'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="naskah" class="col-sm-3 control-label">Naskah-Naskah</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="naskah" class="required" @checked($default['naskah'] !== null && $default['naskah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="lainnya" class="col-sm-3 control-label">Lainnya</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="lainnya" class="required" @checked($default['lainnya'] !== null && $default['lainnya'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Kegiatan Adat</label>
            </div>

            <div class="form-group">
                <label for="musyawarah_adat" class="col-sm-3 control-label">Musyawarah Adat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="musyawarah_adat" class="required" @checked($default['musyawarah_adat'] !== null && $default['musyawarah_adat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="sanksi_adat" class="col-sm-3 control-label">Sanksi Adat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="sanksi_adat" class="required" @checked($default['sanksi_adat'] !== null && $default['sanksi_adat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_perkawinan" class="col-sm-3 control-label">Upacara Adat Perkawinan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_perkawinan" class="required" @checked($default['upacara_adat_perkawinan'] !== null && $default['upacara_adat_perkawinan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_kematian" class="col-sm-3 control-label">Upacara Adat Kematian</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_kematian" class="required" @checked($default['upacara_adat_kematian'] !== null && $default['upacara_adat_kematian'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_kelahiran" class="col-sm-3 control-label">Upacara Adat Kelahiran</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_kelahiran" class="required" @checked($default['upacara_adat_kelahiran'] !== null && $default['upacara_adat_kelahiran'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_cocok_tanam" class="col-sm-3 control-label">Upacara Adat Dalam Bercocok
                    Tanam</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_cocok_tanam" class="required" @checked($default['upacara_adat_cocok_tanam'] !== null && $default['upacara_adat_cocok_tanam'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_perikanan" class="col-sm-3 control-label">Upacara Adat Bidang
                    Perikanan/Laut</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_perikanan" class="required" @checked($default['upacara_adat_perikanan'] !== null && $default['upacara_adat_perikanan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_kehutanan" class="col-sm-3 control-label">Upacara Adat Bidang Kehutanan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_kehutanan" class="required" @checked($default['upacara_adat_kehutanan'] !== null && $default['upacara_adat_kehutanan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_sda" class="col-sm-3 control-label">Upacara Adat Dalam Pengeloaan Sumber Daya
                    Alam</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_sda" class="required" @checked($default['upacara_adat_sda'] !== null && $default['upacara_adat_sda'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_pembangunan" class="col-sm-3 control-label">Upacara Adat Dalam Pembangunan
                    Rumah</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_pembangunan" class="required" @checked($default['upacara_adat_pembangunan'] !== null && $default['upacara_adat_pembangunan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="upacara_adat_penyelesaian_masalah" class="col-sm-3 control-label">Upacara Adat Dalam
                    Penyelesaian Masalah/Konflik</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="upacara_adat_penyelesaian_masalah" class="required" @checked($default['upacara_adat_penyelesaian_masalah'] !== null && $default['upacara_adat_penyelesaian_masalah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
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
        });
    </script>
@endpush
