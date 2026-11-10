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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Pembinaan Pemerintah Pusat</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Pembinaan Pemerintah Pusat</a>
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
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman dan standar pelaksanaan urusan
                    pemerintahan desa, kelurahan, lembaga kemasyarakatan</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desakelurahan_lembaga_kemasyarakatan" class="required" @checked($default['pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desakelurahan_lembaga_kemasyarakatan'] !== null && $default['pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desakelurahan_lembaga_kemasyarakatan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman dan standar bantuan pembiayaan dari
                    pemerintah, pemerintah provinsi dan kabupaten/kota kepada desa dan kelurahan</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan" class="required" @checked($default['pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan'] !== null && $default['pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman umum administrasi, tata naskah dan
                    pelaporan bagi kepala desa dan lurah</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah" class="required" @checked($default['pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'] !== null && $default['pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman dan standar tanda jabatan, pakaian dinas
                    dan atribut bagi Kepala Desa, Lurah dan Perangkat Desa/Kelurahan serta BPD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkat_desa_kelurahan_serta_bpd" class="required" @checked($default['pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkat_desa_kelurahan_serta_bpd'] !== null && $default['pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkat_desa_kelurahan_serta_bpd'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pedoman pendidikan dan pelatihan bagi pemerintahan
                    desa, kelurahan, lembaga kemasyarakatan dan perangkat masing-masing</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label_class="radio-inline"><input type="radio" name="pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing" class="required" @checked($default['pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing'] !== null && $default['pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Jumlah bimbingan, supervisi dan konsultasi
                    pelaksanaan pemerintahan desa dan kelurahan serta pemberdayaan lembaga kemasyarakatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan"
                        value="{{ $default['jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Jumlah kegiatan pendidikan dan pelatihan
                    tentang penyelenggaraan pemerintahan desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan"
                        value="{{ $default['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Penelitian dan pengkajian penyelenggaraan
                    pemerintahan desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan" value="{{ $default['penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Jumlah kegiatan yang terkait dengan upaya
                    percepatan atau akselerasi pembangunan desa dan kelurahan dalam bidang ekonomi keluarga, penanganan
                    bencana, penanggulangan kemiskinan, percepatan keberdayaan masyarakat,
                    peningkatan prasarana dan sarana pedesaan/kelurahan, pemanfaatan sumber daya alam dan teknologi tepat
                    guna, pengembangan sosial budaya masyarakat di desa dan kelurahan yang dibiayai APBN</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask"
                        name="jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn"
                        value="{{ $default['jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Pemberian penghargaan atas prestasi yang
                    dilaksanakan pemerintahan desa dan kelurahan dalam penyelenggaraan pemerintahan dan lembaga
                    kemasyarakatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan"
                        value="{{ $default['pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'] ?? 0 }}"
                    >
                </div>
            </div>
            <div class="form-group">
                <label for="total_nilai_produksi" class="col-sm-4 control-label">Pemberian sanksi atas penyimpangan yang
                    dilakukan kepala desa, lurah dan perangkat masing-masing</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing"
                        value="{{ $default['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] ?? 0 }}"
                    >
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
            $('input[name=jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan], input[name=jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan], input[name=jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan], input[name=pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan], input[name=pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing]').inputmask(decimalObj);

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
