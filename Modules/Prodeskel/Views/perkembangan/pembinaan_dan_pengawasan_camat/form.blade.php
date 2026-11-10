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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan dan Pengawasan Camat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pembinaan dan Pengawasan Camat</a>
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
                <label for="jumlah_kegiatan_fasilitasi_peraturan" class="col-sm-4 control-label">Jumlah Kegiatan fasilitasi
                    penyusunan peraturan desa dan peraturan kepala desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1dad44d3e5c1d" value="{{ $default['1dad44d3e5c1d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_administrasi" class="col-sm-4 control-label">Jumlah Kegiatan
                    fasilitasi administrasi tata pemerintahan desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="2e98a743fbc2e" value="{{ $default['2e98a743fbc2e'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_pengelolaan_keuangan" class="col-sm-4 control-label">Fasilitasi pengelolaan keuangan
                    desa dan pendayagunaan aset desa serta anggaran kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="3c7b01a5de8f3" value="{{ $default['3c7b01a5de8f3'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_pelaksanaan_urusan_otonomi" class="col-sm-4 control-label">Jumlah
                    kegiatan fasilitasi pelaksanaan urusan otonomi daerah kabupaten/kota yang diserahkan kepada desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="4f6e32b4a91d2" value="{{ $default['4f6e32b4a91d2'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_penerapan_penegakan_peraturan" class="col-sm-4 control-label">Fasilitasi penerapan
                    dan penegakan peraturan perundang-undangan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="543df8c2e7a5b" value="{{ $default['543df8c2e7a5b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_penyediaan_pendayagunaan_data_profil" class="col-sm-4 control-label">Fasilitasi
                    penyediaan data dan pendayagunaan data profil desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6a2bc957d3e4f" value="{{ $default['6a2bc957d3e4f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_pelaksanaan_tugas" class="col-sm-4 control-label">Jumlah kegiatan
                    fasilitasi pelaksanaan tugas, wewenang, fungsi, hak dan kewajiban kepala desa, BPD, Lurah dan lembaga
                    kemasyarakatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="7f9a81e632bd1" value="{{ $default['7f9a81e632bd1'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_upaya_penyelenggaraan_ketenteraman" class="col-sm-4 control-label">Jumlah kegiatan fasilitasi upaya penyelenggaraan ketenteraman dan
                    ketertiban umum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="8954c3de1ab2e" value="{{ $default['8954c3de1ab2e'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_penataan_penguatan_efektivitas" class="col-sm-4 control-label">Fasilitasi penataan,
                    penguatan dan efektivitas pelaksanaan tugas, fungsi dan kewajiban lembaga kemasyarakatan desa dan
                    kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="9d7c5e1a3b2f4" value="{{ $default['9d7c5e1a3b2f4'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_partisipasi_masyarakat" class="col-sm-4 control-label">Jumlah
                    kegiatan fasilitasi partisipasi masyarakat dalam perencanaan, pelaksanaan, pemanfaatan dan pemeliharaan
                    serta pengembangan dan pelestarian hasil pembangunan.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="a4fb92c6e5d1a" value="{{ $default['a4fb92c6e5d1a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="fasilitasi_kerjasama_antar_desa" class="col-sm-4 control-label">Fasilitasi kerjasama antar
                    desa/kelurahan dan kerjasama desa/kelurahan dengan pihak ketiga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="b8dc4f63e2a1d" value="{{ $default['b8dc4f63e2a1d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_pelaksanaan_program" class="col-sm-4 control-label">Jumlah kegiatan
                    fasilitasi pelaksanaan program dan kegiatan pemberdayaan masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="c7eab19d3f2a4" value="{{ $default['c7eab19d3f2a4'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pemeliharaan_motivasi" class="col-sm-4 control-label">Jumlah kegiatan
                    pemeliharaan motivasi bagi desa dan kelurahan juara perlombaan dan pasca perlombaan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="d3bfc6a9e2d4f" value="{{ $default['d3bfc6a9e2d4f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_kerjasama_antar_lembaga" class="col-sm-4 control-label">Jumlah
                    kegiatan fasilitasi kerjasama antar lembaga kemasyarakatan dan lembaga kemasyarakatan dengan organisasi
                    anggota lembaga kemasyarakatan serta dengan pihak ketiga sebagai mitra
                    percepatan keberdayaan masyarakat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="e5ac9f2d3b1e4" value="{{ $default['e5ac9f2d3b1e4'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_fasilitasi_bantuan_teknis" class="col-sm-4 control-label">Jumlah kegiatan
                    fasilitasi bantuan teknis dan pendampingan kepada lembaga kemasyarakatan dan organisasi
                    anggotanya</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="f1c32d9ea5b7d" value="{{ $default['f1c32d9ea5b7d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_koordinasi_unit_kerja" class="col-sm-4 control-label">Jumlah kegiatan koordinasi
                    unit kerja pemerintahan dalam pengembangan lembaga kemasyarakatan desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="g8b9a23f1c6d5" value="{{ $default['g8b9a23f1c6d5'] ?? 0 }}">
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
