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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan Pemerintah Kabupaten/Kota</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pembinaan Pemerintah Kabupaten/Kota</a>
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
                <label for="pelimpahan_tugas" class="col-sm-4 control-label">Pelimpahan tugas Bupati/Walikota kepada Lurah
                    dan Kepala Desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1dad44d3e5c1d" value="{{ $default['1dad44d3e5c1d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pengaturan_kewenangan" class="col-sm-4 control-label">Penetapan pengaturan kewenangan
                    kabupaten/kota yang diserahkan pengaturannya kepada desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="2e98a743fbc2e" value="{{ $default['2e98a743fbc2e'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pedoman_pelaksanaan" class="col-sm-4 control-label">Pedoman pelaksanaan tugas pembantuan dari
                    kabupaten/kota kepada desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="3c7b01a5de8f3" value="{{ $default['3c7b01a5de8f3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pedoman_teknis" class="col-sm-4 control-label">Pedoman teknis penyusunan peraturan desa,
                    peraturan kepala desa, keputusan Lurah dan peraturan daerah kepada kepala desa dan lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="4f6e32b4a91d2" value="{{ $default['4f6e32b4a91d2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pedoman_teknis" class="col-sm-4 control-label">Pedoman teknis penyusunan perencanaan pembangunan
                    partisipatif serta pengembangan lembaga kemasyarakatan desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="543df8c2e7a5b" value="{{ $default['543df8c2e7a5b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan_fasilitasi" class="col-sm-4 control-label">Kegiatan fasilitasi keberadaan kesatuan
                    masyarakat hukum adat, nilai adat istiadat dan lembaga adat beserta hak dan kewajibannya dalam
                    pelaksanaan pemerintahan desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6a2bc957d3e4f" value="{{ $default['6a2bc957d3e4f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penetapan_pembiayaan" class="col-sm-4 control-label">Penetapan pembiayaan alokasi dana
                    perimbangan untuk desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="7f9a81e632bd1" value="{{ $default['7f9a81e632bd1'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_pelaksanaan" class="col-sm-4 control-label">Fasilitasi Pelaksanaan pedoman
                    administrasi, tata naskah dan pelaporan bagi kepala desa dan lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="8954c3de1ab2e" value="{{ $default['8954c3de1ab2e'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan" class="col-sm-4 control-label">Jumlah kegiatan pendidikan dan pelatihan tentang
                    penyelenggaraan pemerintahan desa dan kelurahan berskala kabupaten/kota</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="9d7c5e1a3b2f4" value="{{ $default['9d7c5e1a3b2f4'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan_penanggulangan" class="col-sm-4 control-label">Kegiatan penanggulangan kemiskinan yang
                    dibiayai APBD kabupaten/kota yang masuk desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="a4fb92c6e5d1a" value="{{ $default['a4fb92c6e5d1a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan_penanganan" class="col-sm-4 control-label">Kegiatan penanganan bencana yang dibiayai
                    APBD kabupaten/kota untuk desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="b8dc4f63e2a1d" value="{{ $default['b8dc4f63e2a1d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan_peningkatan" class="col-sm-4 control-label">Kegiatan peningkatan pendapatan keluarga
                    yang dibiayai APBD kabupaten/kota di desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="c7eab19d3f2a4" value="{{ $default['c7eab19d3f2a4'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_penetapan" class="col-sm-4 control-label">Fasilitasi penetapan pedoman dan standar
                    tanda jabatan, pakaian dinas dan atribut bagi Kepala Desa, Lurah, Perangkat Desa/Kelurahan dan
                    BPD</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="d3bfc6a9e2d4f" value="{{ $default['d3bfc6a9e2d4f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan_fasilitasi" class="col-sm-4 control-label">Kegiatan fasilitasi keberadaan kesatuan
                    masyarakat hukum adat, nilai adat istiadat dan lembaga adat beserta hak dan kewajibannya dalam
                    pelaksanaan pemerintahan desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="e5ac9f2d3b1e4" value="{{ $default['e5ac9f2d3b1e4'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pedoman_pendataan" class="col-sm-4 control-label">Pedoman pendataan dan pendayagunaan profil
                    desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="f1c32d9ea5b7d" value="{{ $default['f1c32d9ea5b7d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="program_kegiatan" class="col-sm-4 control-label">Program dan kegiatan pemeliharaan motivasi
                    desa/kelurahan berprestasi pascaperlombaan desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="g8b9a23f1c6d5" value="{{ $default['g8b9a23f1c6d5'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pemberian_penghargaan" class="col-sm-4 control-label">Pemberian penghargaan atas prestasi yang
                    dicapai pemerintahan desa dan kelurahan dalam penyelenggaraan pemerintahan dan pemberdayaan lembaga
                    kemasyarakatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="h6e5fbc3d9a2d" value="{{ $default['h6e5fbc3d9a2d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pemberian_sanksi" class="col-sm-4 control-label">Pemberian sanksi atas penyimpangan yang
                    dilakukan kepala desa, lurah dan perangkat masing-masing</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="i4f3b91e8d2c7" value="{{ $default['i4f3b91e8d2c7'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="mengawasi_pengelolaan" class="col-sm-4 control-label">Mengawasi pengelolaan keuangan desa serta
                    anggaran kelurahan dan pendayagunaan aset pemerintahan desa, badan usaha milik desa dan sumber
                    pendapatan daerah yang dikelola lurah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="j2a9bd1f6c8e5" value="{{ $default['j2a9bd1f6c8e5'] ?? 0 }}">
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
