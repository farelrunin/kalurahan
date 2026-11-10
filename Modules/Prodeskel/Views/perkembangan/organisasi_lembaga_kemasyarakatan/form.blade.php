@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Perkembangan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Lembaga Kemasyarakatan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Organisasi Lembaga Kemasyarakatan</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Organisasi Lembaga Kemasyarakatan</a>
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
                <label for="{{ $item }}" class="col-sm-4 control-label">Jenis Organisasi</label>
                <div class="col-sm-8">
                    <select name="{{ $item }}" class="form-control select2 required">
                        <option value="">Pilih Jenis Organisasi</option>
                        @foreach (\Modules\Prodeskel\Enums\JenisOrganisasiEnum::all() as $k => $val)
                            <option @selected($default[$item] == $k) value="{{ $k }}">{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="kepengurusan" class="col-sm-4 control-label">Kepengurusan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="kepengurusan" class="required" @checked($default['kepengurusan'] !== null && $default['kepengurusan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="buku" class="col-sm-4 control-label">Buku Administrasi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="buku" name="buku" value="{{ $default['buku'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan" class="col-sm-4 control-label">Jumlah kegiatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="kegiatan" name="kegiatan" value="{{ $default['kegiatan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="hukum" class="col-sm-4 control-label">Dasar Hukum Pembentukan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\DasarHukumPembentukanEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="hukum" class="required" @checked($default['hukum'] !== null && $default['hukum'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
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
            $('input[name=kegiatan]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=buku]').inputmask(decimalObj);
        });
    </script>
@endpush
