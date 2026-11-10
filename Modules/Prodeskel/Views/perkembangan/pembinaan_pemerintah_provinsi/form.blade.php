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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan Pemerintah Provinsi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pembinaan Pemerintah Provinsi</a>
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
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman pelaksanaan tugas pembantuan dari provinsi
                    ke desa/kelurahan</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="1005b160e3f22" class="required" @checked($default['1005b160e3f22'] !== null && $default['1005b160e3f22'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman bantuan keuangan dari provinsi</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="50d9f91a97220" class="required" @checked($default['50d9f91a97220'] !== null && $default['50d9f91a97220'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Kegiatan fasilitasi keberadaan kesatuan masyarakat
                    hukum adat, nilai adat istiadat dan lembaga adat beserta hak dan kewajibannya dalam pelaksanaan
                    pemerintahan desa/kelurahan</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="59948998e7025" class="required" @checked($default['59948998e7025'] !== null && $default['59948998e7025'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Fasilitasi Pelaksanaan pedoman administrasi, tata
                    naskah dan pelaporan bagi kepala desa dan lurah</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="76a507d1c90a0" class="required" @checked($default['76a507d1c90a0'] !== null && $default['76a507d1c90a0'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Jumlah kegiatan pendidikan dan pelatihan
                    tentang penyelenggaraan pemerintahan desa dan kelurahan berskala provinsi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="bea54f5e0ba2c" value="{{ $default['bea54f5e0ba2c'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Kegiatan penanggulangan kemiskinan yang
                    dibiayai APBD Provinsi yang masuk desa dan kelurahan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="aba260e5a36cb" value="{{ $default['aba260e5a36cb'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Kegiatan penanganan bencana yang dibiayai
                    APBD Provinsi untuk desa dan kelurahan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="9b1d9204efafe" value="{{ $default['9b1d9204efafe'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Kegiatan peningkatan pendapatan keluarga
                    yang dibiayai APBD Provinsi di desa dan kelurahan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="a4a4fa2014f3a" value="{{ $default['a4a4fa2014f3a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Kegiatan penyediaan sarana dan prasarana
                    desa dan kelurahan yang dibiayai APBD Provinsi yang masuk desa dan kelurahan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="03019b8a5fb24" value="{{ $default['03019b8a5fb24'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Kegiatan pemanfaatan sumber daya alam dan
                    pengembangan teknologi tepat guna yang dibiayai APBD Provinsi di desa dan kelurahan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="fb318be147185" value="{{ $default['fb318be147185'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Kegiatan pengembangan sosial budaya
                    masyarakat </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="9a8f6b01f383a" value="{{ $default['9a8f6b01f383a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Pedoman pendataan dan pendayagunaan data
                    profil desa dan kelurahan </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="1127ed873f26b" value="{{ $default['1127ed873f26b'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Pemberian sanksi atas penyimpangan yang
                    dilakukan kepala desa, lurah dan perangkat masing-masing </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="1dad44d3e5c1d" value="{{ $default['1dad44d3e5c1d'] ?? 0 }}">
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
