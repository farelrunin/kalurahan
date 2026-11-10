@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Keamanan dan Ketertiban</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pelembagaan Sistem Keamanan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pelembagaan Sistem Keamanan</a>
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
                <label for="siskamling" class="col-sm-4 control-label">Organisasi Siskamling</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="siskamling" class="required" @checked($default['siskamling'] !== null && $default['siskamling'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="pertahanan" class="col-sm-4 control-label">Organisasi Pertahanan Sipil dan Perlindungan
                    Masyarakat</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pertahanan" class="required" @checked($default['pertahanan'] !== null && $default['pertahanan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_siskamling" class="col-sm-4 control-label">Jumlah RT atau sebutan lainnya yang ada
                    Siskamling/Pos Ronda</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_siskamling" value="{{ $default['jumlah_siskamling'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_hansip" class="col-sm-4 control-label">Jumlah anggota Hansip dan Linmas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_hansip" value="{{ $default['jumlah_hansip'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jadwal" class="col-sm-4 control-label">Jadwal kegiatan Siskamling dan Pos Ronda</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="jadwal" class="required" @checked($default['jadwal'] !== null && $default['jadwal'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="buku_anggota" class="col-sm-4 control-label">Buku anggota Hansip dan Linmas</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="buku_anggota" value="{{ $default['buku_anggota'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="satpam" class="col-sm-4 control-label">Jumlah kelompok Satuan Pengamanan (SATPAM) swasta</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="satpam" value="{{ $default['satpam'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pembinaan" class="col-sm-4 control-label">Jumlah pembinaan Siskamling oleh Pengurus dan
                    Kades/Lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pembinaan" value="{{ $default['pembinaan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pos_jaga" class="col-sm-4 control-label">Jumlah Pos Jaga Induk Desa/Kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pos_jaga" value="{{ $default['pos_jaga'] ?? 0 }}">
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
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_siskamling], input[name=jumlah_hansip], input[name=satpam], input[name=pembinaan], input[name=pos_jaga]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=buku_anggota]').inputmask(decimalObj);
        });
    </script>
@endpush
