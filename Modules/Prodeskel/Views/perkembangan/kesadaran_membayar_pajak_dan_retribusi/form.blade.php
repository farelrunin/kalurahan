@extends('admin.layouts.index')
@include('prodeskel::assets.style')
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
    <li>Kedaulatan Politik Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Kesadaran Membayar Pajak dan Retribusi</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Kesadaran Berbangsa dan Bernegara</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Subsektor Listrik</label>
            </div>
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
                <label for="jenis_pajak" class="col-sm-4 control-label">Jenis pajak yang dipungut sebagai kewenangan dan
                    atau tugas desa/kelurahan (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="7a2891c06625f" value="{{ $value->data['7a2891c06625f'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_wajib_pajak" class="col-sm-4 control-label">Jumlah Wajib Pajak (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="af23bc98e4d57" value="{{ $value->data['af23bc98e4d57'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="target_pbb" class="col-sm-4 control-label">Target PBB (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1b4c3d82e5f96" value="{{ $value->data['1b4c3d82e5f96'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="realisasi_pbb" class="col-sm-4 control-label">Realisasi PBB (%)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="c6a7d8e2b9f34" value="{{ $value->data['c6a7d8e2b9f34'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_tindakan_pbb" class="col-sm-4 control-label">Jumlah Tindakan terhadap penunggak PBB
                    (Tindakan)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5e4a3b2c1d8f9" value="{{ $value->data['5e4a3b2c1d8f9'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_retribusi" class="col-sm-4 control-label">Jenis Retribusi yang dipungut sebagai tugas dan
                    kewenangan desa/kelurahan (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="92c3b5e7d8f1a" value="{{ $value->data['92c3b5e7d8f1a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_wajib_retribusi" class="col-sm-4 control-label">Jumlah wajib retribusi yang menjadi
                    tugas/kewenangan desa/kelurahan (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6b7c2d8e1f9a3" value="{{ $value->data['6b7c2d8e1f9a3'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="target_retribusi" class="col-sm-4 control-label">Target retribusi yang menjadi tugas/kewenangan
                    desa/kelurahan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="3a4b5c2d8f1e9" value="{{ $value->data['3a4b5c2d8f1e9'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="realisasi_retribusi" class="col-sm-4 control-label">Realisasi retribusi yang menjadi
                    tugas/kewenangan desa/kelurahan (%)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="8d1e4f7c2b9a6" value="{{ $value->data['8d1e4f7c2b9a6'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_pungutan_resmi" class="col-sm-4 control-label">Jenis pungutan resmi lainnya di
                    Desa/Kelurahan (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5a2b8c3d4f1e9" value="{{ $value->data['5a2b8c3d4f1e9'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="target_pungutan_resmi" class="col-sm-4 control-label">Target pungutan resmi tingkat
                    desa/kelurahan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="4b6c9d1e2f3a5" value="{{ $value->data['4b6c9d1e2f3a5'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="realisasi_pungutan_resmi" class="col-sm-4 control-label">Realisasi pungutan resmi di
                    desa/kelurahan (%)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="d5a6b7c3e8f2" value="{{ $value->data['d5a6b7c3e8f2'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_kasus_pungutan_liar" class="col-sm-4 control-label">Jumlah kasus pungutan liar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6c2d3e4a5b8f" value="{{ $value->data['6c2d3e4a5b8f'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_penyelesaian_kasus_pungutan_liar" class="col-sm-4 control-label">Jumlah penyelesaian
                    kasus pungutan liar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1a3b4c6d8e5f" value="{{ $value->data['1a3b4c6d8e5f'] ?? 0 }}">
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

            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += getRawValue($(this).attr('name'))
                })
                $(`input[name=${summary}]`).val(indonesiaFormat(total))
            })
        });
    </script>
@endpush
