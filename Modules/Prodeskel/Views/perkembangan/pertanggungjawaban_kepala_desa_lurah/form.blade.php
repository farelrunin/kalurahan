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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pertanggungjawaban Kepala Desa/Lurah</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pertanggungjawaban Kepala Desa/Lurah</a>
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
                <label for="gedung_kantor" class="col-sm-4 control-label">Penyampaian laporan keterangan pertanggunganjawab
                    Kepala Desa kepada BPD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="1008ff221d4d7" class="required" @checked($default['1008ff221d4d7'] !== null && $default['1008ff221d4d7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Jumlah informasi yang disampaikan kepala
                    desa dan lurah tentang laporan penyelenggaraan tugas, wewenang, hak dan kewajiban kepala desa dan lurah
                    kepada masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="abda02914eb96" value="{{ $default['abda02914eb96'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Status laporan keterangan pertanggungjawaban
                    kepala Desa </label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\TerimaTolakEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="a1d8c8f48d313" class="required" @checked($default['a1d8c8f48d313'] !== null && $default['a1d8c8f48d313'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Laporan kinerja penyelenggaraan tugas, wewenang,
                    kewajiban dan hak kepala desa dan lurah kepada Bupati/Walikota </label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\TerimaRevisiEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="598e4d0f9e4d5" class="required" @checked($default['598e4d0f9e4d5'] !== null && $default['598e4d0f9e4d5'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_jenis_media_informasi" class="col-sm-4 control-label">Jumlah jenis media informasi
                    kinerja kepala desa dan lurah kepada masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="de7ff7a974539" value="{{ $default['de7ff7a974539'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_pengaduan_masyarakat" class="col-sm-4 control-label">Jumlah kasus pengaduan
                    masyarakat terhadap masalah pembangunan, pelayanan dan pembinaan kemasyarakatan yang disampaikan kepada
                    kepala desa/lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="77288087cd133" value="{{ $default['77288087cd133'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kasus_pengaduan_masyarakat_diselesaikan" class="col-sm-4 control-label">Jumlah kasus
                    pengaduan masyarakat terhadap masalah pembangunan, pelayanan dan pembinaan kemasyarakatan yang
                    diselesaikan kepala desa/lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="f6920f31228ac" value="{{ $default['f6920f31228ac'] ?? 0 }}">
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
