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
    <li>Pemerintahan Desa dan Kelurahan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">APB-Desa dan Anggaran Kelurahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar APB-Desa dan Anggaran Kelurahan</a>
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
                <label for="apbd_kabupaten_kota" class="col-sm-4 control-label">APBD Kabupaten/Kota (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="ac1e34b29f3d5" value="{{ $value->data['ac1e34b29f3d5'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="bantuan_pemkab_pemkot" class="col-sm-4 control-label">Bantuan Pemerintah Kabupaten/Kota
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="5f2b8c1d9a6e7" value="{{ $value->data['5f2b8c1d9a6e7'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="bantuan_pemprov" class="col-sm-4 control-label">Bantuan Pemerintah Provinsi (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="4c2d5e6f1a3b" value="{{ $value->data['4c2d5e6f1a3b'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="bantuan_pemerintah_pusat" class="col-sm-4 control-label">Bantuan Pemerintah Pusat (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="9d2e3f4a5b6c" value="{{ $value->data['9d2e3f4a5b6c'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendapatan_asli_desa" class="col-sm-4 control-label">Pendapatan Asli Desa (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="7e8f1c3d4b5a" value="{{ $value->data['7e8f1c3d4b5a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="swadaya_masyarakat" class="col-sm-4 control-label">Swadaya Masyarakat Desa dan Kelurahan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="6a7b8c9d1e2f" value="{{ $value->data['6a7b8c9d1e2f'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="alokasi_dana_desa" class="col-sm-4 control-label">Alokasi Dana Desa (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="5b6c7d8e9f1a" value="{{ $value->data['5b6c7d8e9f1a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendapatan_perusahaan" class="col-sm-4 control-label">Sumber Pendapatan dari Perusahaan yang ada
                    di desa/kelurahan (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="8c9d1a2b3e4f" value="{{ $value->data['8c9d1a2b3e4f'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="sumber_pendapatan_lainnya" class="col-sm-4 control-label">Sumber pendapatan lain yang sah dan
                    tidak mengikat (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="3e4f5a6b7c8" name="2d3e4f5a6b7" value="{{ $value->data['2d3e4f5a6b7'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_penerimaan" class="col-sm-4 control-label">Jumlah Penerimaan Desa/Kelurahan tahun ini
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" readonly name="3e4f5a6b7c8" value="{{ $value->data['3e4f5a6b7c8'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="belanja_publik" class="col-sm-4 control-label">Jumlah Belanja Publik/belanja pembangunan
                    (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="4e5f6a7b8c9" name="f1e2d3c4b5a6" value="{{ $value->data['f1e2d3c4b5a6'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="belanja_aparatur" class="col-sm-4 control-label">Jumlah Belanja Aparatur/pegawai (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="4e5f6a7b8c9" name="7d8e9f1a2b3" value="{{ $value->data['7d8e9f1a2b3'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_belanja" class="col-sm-4 control-label">Jumlah Belanja (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" readonly name="4e5f6a7b8c9" value="{{ $value->data['4e5f6a7b8c9'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="saldo_anggaran" class="col-sm-4 control-label">Saldo Anggaran (Rp)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" readonly name="1d2e3f4a5b6" value="{{ $value->data['1d2e3f4a5b6'] ?? 0 }}">
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

                $("input[name='4e5f6a7b8c9']").change(function() {
                    let penerimaan = getRawValue('3e4f5a6b7c8')
                    let belanja = getRawValue('4e5f6a7b8c9')
                    let saldo = penerimaan - belanja
                    $("input[name='1d2e3f4a5b6']").val(indonesiaFormat(saldo))
                })
            });
        </script>
    @endpush
