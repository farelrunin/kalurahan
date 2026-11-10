@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Lembaga Ekonomi</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lembagaEkonomi') }}">Lembaga Ekonomi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lembagaEkonomi') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga Ekonomi</a>
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
            <div class="form-group">
                <label for="lembaga_pendidikan" class="col-sm-2 control-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-control select2 required">
                        <option value="">Pilih Kategori</option>
                        @foreach (Modules\Prodeskel\Enums\KomoditasLembagaEkonomiEnum::all() as $key => $item)
                            <option @selected($default['kategori'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Jenis Lembaga Ekonomi</label>
                <div class="col-sm-10">
                    <select name="jenis" class="form-control select2 required">
                        <option value="">Pilih Jenis Lembaga</option>
                        @foreach (Modules\Prodeskel\Enums\JenisLembagaEkonomiEnum::allMap() as $key => $items)
                            <optgroup @disabled($default['kategori'] != $key) value="{{ $key }}" label="{{ Modules\Prodeskel\Enums\KomoditasLembagaEkonomiEnum::valueOf($key) }}">
                                @foreach ($items as $k => $item)
                                    <option @selected($default['jenis'] == $k) value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kegiatan" class="col-sm-2 control-label">Jumlah Kegiatan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kegiatan" value="{{ $default['jumlah_kegiatan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pengurus" class="col-sm-2 control-label">Jumlah Pengurus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pengurus" value="{{ $default['jumlah_pengurus'] ?? 0 }}">
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
            </form>
        </div>
        </form>
    </div>
@endsection
@push('css')
    <style>
        .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{ asset('bootstrap/js/jquery.inputmask.js') }}"></script>
    <script>
        @include('prodeskel::assets.extension.numeric')
        $(document).ready(function() {
                        @include('prodeskel::assets.script')
            // Gunakan integerObj untuk field jumlah/count
            $('input[name=jumlah_kegiatan], input[name=jumlah_pengurus]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=jumlah]').inputmask(decimalObj);

            $('select[name=kategori]').change(function() {
                let _val = $(this).find('option:selected').val()
                $('select[name=jenis]').val('')
                $('select[name=jenis]').find('optgroup').prop('disabled', 1)
                if ($(this).val()) {
                    $('select[name=jenis]').find(`optgroup[value="${_val}"]`).prop('disabled', 0)
                }
            })
        });
    </script>
@endpush
