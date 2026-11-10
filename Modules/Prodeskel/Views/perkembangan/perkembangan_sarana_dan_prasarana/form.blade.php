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
    <li>Kesehatan Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Perkembangan Sarana dan Prasarana</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Perkembangan Sarana dan Prasarana</a>
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
                <label for="jumlah_mck_umum" class="col-sm-4 control-label">Jumlah MCK Umum (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_mck_umum" value="{{ $default['jumlah_mck_umum'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_posyandu" class="col-sm-4 control-label">Jumlah Posyandu (Unit)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_posyandu" value="{{ $default['jumlah_posyandu'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kader_posyandu_aktif" class="col-sm-4 control-label">Jumlah Kader Posyandu Aktif
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kader_posyandu_aktif" value="{{ $default['jumlah_kader_posyandu_aktif'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pembina_posyandu" class="col-sm-4 control-label">Jumlah Pembina Posyandu (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_pembina_posyandu" value="{{ $default['jumlah_pembina_posyandu'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_dasawisma" class="col-sm-4 control-label">Jumlah Dasawisma</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_dasawisma" value="{{ $default['jumlah_dasawisma'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_pengurus_dasa_wisma_aktif" class="col-sm-4 control-label">Jumlah Pengurus Dasa Wisma
                    Aktif (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_pengurus_dasa_wisma_aktif" value="{{ $default['jumlah_pengurus_dasa_wisma_aktif'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kader_bina_keluarga_balita_aktif" class="col-sm-4 control-label">Jumlah Kader Bina
                    Keluarga Balita Aktif (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kader_bina_keluarga_balita_aktif" value="{{ $default['jumlah_kader_bina_keluarga_balita_aktif'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_petugas_lapangan_keluarga_berencana_aktif" class="col-sm-4 control-label">Jumlah Petugas
                    Lapangan Keluarga Berencana Aktif (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_petugas_lapangan_keluarga_berencana_aktif" value="{{ $default['jumlah_petugas_lapangan_keluarga_berencana_aktif'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="buku_rencana_kegiatan_posyandu" class="col-sm-4 control-label">Buku Rencana Kegiatan Posyandu
                    *</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\DiisiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_rencana_kegiatan_posyandu" class="required" @checked($default['buku_rencana_kegiatan_posyandu'] !== null && $default['buku_rencana_kegiatan_posyandu'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="buku_data_pengunjung_posyandu" class="col-sm-4 control-label">Buku Data Pengunjung Posyandu
                    *</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\DiisiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_data_pengunjung_posyandu" class="required" @checked($default['buku_data_pengunjung_posyandu'] !== null && $default['buku_data_pengunjung_posyandu'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="buku_kegiatan_pelayanan_posyandu" class="col-sm-4 control-label">Buku Kegiatan Pelayanan
                    Posyandu *</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\DiisiEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="buku_kegiatan_pelayanan_posyandu" class="required" @checked($default['buku_kegiatan_pelayanan_posyandu'] !== null && $default['buku_kegiatan_pelayanan_posyandu'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="buku_administrasi_posyandu_lainnya" class="col-sm-4 control-label">Buku Administrasi Posyandu
                    Lainnya (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="buku_administrasi_posyandu_lainnya" value="{{ $default['buku_administrasi_posyandu_lainnya'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_posyandu_jenis" class="col-sm-4 control-label">Jumlah Kegiatan Posyandu
                    (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kegiatan_posyandu_jenis" value="{{ $default['jumlah_kegiatan_posyandu_jenis'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kader_kesehatan_lainnya" class="col-sm-4 control-label">Jumlah Kader Kesehatan Lainnya
                    (Orang)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kader_kesehatan_lainnya" value="{{ $default['jumlah_kader_kesehatan_lainnya'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pengobatan_gratis_jenis" class="col-sm-4 control-label">Jumlah Kegiatan
                    Pengobatan Gratis (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kegiatan_pengobatan_gratis_jenis" value="{{ $default['jumlah_kegiatan_pengobatan_gratis_jenis'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis" class="col-sm-4 control-label">Jumlah
                    Kegiatan Pemberantasan Sarang Nyamuk/PSN (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis" value="{{ $default['jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_pembersihan_lingkungan_jenis" class="col-sm-4 control-label">Jumlah Kegiatan
                    Pembersihan Lingkungan (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="jumlah_kegiatan_pembersihan_lingkungan_jenis" value="{{ $default['jumlah_kegiatan_pembersihan_lingkungan_jenis'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kegiatan_lainnya_jenis" class="col-sm-4 control-label">Kegiatan Lainnya (Jenis)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" data-summary="jumlah" name="kegiatan_lainnya_jenis" value="{{ $default['kegiatan_lainnya_jenis'] ?? 0 }}">
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
            $('input[name=jumlah_mck_umum], input[name=jumlah_posyandu], input[name=jumlah_kader_posyandu_aktif], input[name=jumlah_pembina_posyandu], input[name=jumlah_dasawisma], input[name=jumlah_pengurus_dasa_wisma_aktif], input[name=jumlah_kader_bina_keluarga_balita_aktif], input[name=jumlah_petugas_lapangan_keluarga_berencana_aktif], input[name=jumlah_kegiatan_posyandu_jenis], input[name=jumlah_kader_kesehatan_lainnya], input[name=jumlah_kegiatan_pengobatan_gratis_jenis], input[name=jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis], input[name=jumlah_kegiatan_pembersihan_lingkungan_jenis], input[name=kegiatan_lainnya_jenis]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=buku_administrasi_posyandu_lainnya]').inputmask(decimalObj);

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
