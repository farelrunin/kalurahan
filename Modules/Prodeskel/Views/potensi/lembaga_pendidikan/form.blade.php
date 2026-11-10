@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Lembaga Pendidikan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lembagaPendidikan') }}">Lembaga Pendidikan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lembagaPendidikan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga Pendidikan</a>
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
                        <option value="">Pilih kategori</option>
                        @foreach (Modules\Prodeskel\Enums\KomoditasLembagaPendidikanEnum::all() as $key => $item)
                            <option @selected($default['kategori'] == $key) value="{{ $key }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="tingkatan" class="col-sm-2 control-label">Tingkatan/Jenis Sekolah</label>
                <div class="col-sm-10">
                    <select name="tingkatan" class="form-control select2 required">
                        <option value="">Pilih tingkatan</option>
                        @foreach (Modules\Prodeskel\Enums\TingkatanPendidikanEnum::allMap() as $key => $items)
                            <optgroup @disabled($default['kategori'] != $key) value="{{ $key }}" label="{{ Modules\Prodeskel\Enums\KomoditasLembagaPendidikanEnum::valueOf($key) }}">
                                @foreach ($items as $k => $item)
                                    <option @selected($default['tingkatan'] == $k) value="{{ $k }}">{{ $item }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-10 btn-group" data-toggle="buttons" style="margin: 0 0 5px 0">
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['status'] == 1) ">
                        <input type="radio" name="status" class="form-check-input" @checked($default['status'] == 1) value="1" autocomplete="off">Terdaftar
                    </label>
                    <label class="tipe btn btn-info btn-sm col-xs-12 col-sm-6 col-lg-3 form-check-label @active($default['status'] == 0)">
                        <input type="radio" name="status" class="form-check-input" @checked($default['status'] == 0) value="0" autocomplete="off">Terakreditasi
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_negeri" class="col-sm-2 control-label">Jumlah Negeri</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_negeri" data-summary="jumlah" value="{{ $default['jumlah_negeri'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_swasta" class="col-sm-2 control-label">Jumlah Swasta</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_swasta" data-summary="jumlah" value="{{ $default['jumlah_swasta'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_milik_desa" class="col-sm-2 control-label">Jumlah Dimiliki Desa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_milik_desa" data-summary="jumlah" value="{{ $default['jumlah_milik_desa'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah" class="col-sm-2 control-label text-primary">Jumlah </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" readonly name="jumlah" value="{{ $default['jumlah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_pengajar" class="col-sm-2 control-label">Jumlah Pengajar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_pengajar" value="{{ $default['jumlah_pengajar'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_siswa" class="col-sm-2 control-label">Jumlah Siswa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_siswa" value="{{ $default['jumlah_siswa'] ?? 0 }}">
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
            $('input[name=jumlah_negeri], input[name=jumlah_swasta], input[name=jumlah_milik_desa], input[name=jumlah], input[name=jumlah_pengajar], input[name=jumlah_siswa]').inputmask(integerObj);
            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })

            $('select[name=kategori]').change(function() {
                let _val = $(this).find('option:selected').val()
                $('select[name=tingkatan]').val('')
                $('select[name=tingkatan]').find('optgroup').prop('disabled', 1)
                if ($(this).val()) {
                    $('select[name=tingkatan]').find(`optgroup[value="${_val}"]`).prop('disabled', 0)
                }
            })
        });
    </script>
@endpush
