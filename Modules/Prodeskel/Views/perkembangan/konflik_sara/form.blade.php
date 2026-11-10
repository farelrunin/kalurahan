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
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Konflik SARA</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Perkelahian</a>
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
                <label for="konflik_tahun_ini" class="col-sm-4 control-label">Kasus konflik pada tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="konflik_tahun_ini" value="{{ $default['konflik_tahun_ini'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="konflik_sara_tahun_ini" class="col-sm-4 control-label">Kasus konflik SARA pada tahun ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="konflik_sara_tahun_ini" value="{{ $default['konflik_sara_tahun_ini'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kasus_antar_tetangga" class="col-sm-4 control-label">Jumlah kasus pertengkaran dan atau
                    perkelahian antar tetangga</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kasus_antar_tetangga" value="{{ $default['kasus_antar_tetangga'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kasus_antar_rt" class="col-sm-4 control-label">Jumlah kasus pertengkaran dan atau perkelahian
                    antar RT/RW</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kasus_antar_rt" value="{{ $default['kasus_antar_rt'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="konflik_masyarakat_penduduk" class="col-sm-4 control-label">Jumlah konflik antar masyarakat
                    pendatang dengan penduduk asli</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="konflik_masyarakat_penduduk" value="{{ $default['konflik_masyarakat_penduduk'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kasus_kelompok_masyarakat" class="col-sm-4 control-label">Jumlah kasus antar kelompok masyarakat
                    dalam desa/kelurahan dengan kelompok masyarakat dari desa/kelurahan lain</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kasus_kelompok_masyarakat" value="{{ $default['kasus_kelompok_masyarakat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="konflik_masyarakat_pemerintah" class="col-sm-4 control-label">Jumlah konflik antara masyarakat
                    dengan pemerintah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="konflik_masyarakat_pemerintah" value="{{ $default['konflik_masyarakat_pemerintah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kerugian_masyarakat_pemerintah" class="col-sm-4 control-label">Jumlah kerugian material akibat
                    konflik antara masyarakat dan pemerintah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kerugian_masyarakat_pemerintah" value="{{ $default['kerugian_masyarakat_pemerintah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="korban_masyarakat_pemerintah" class="col-sm-4 control-label">Jumlah korban jiwa akibat konflik
                    antara masyarakat dengan pemerintah</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="korban_masyarakat_pemerintah" value="{{ $default['korban_masyarakat_pemerintah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="konflik_masyarakat_perusahaan" class="col-sm-4 control-label">Jumlah konflik antara masyarakat
                    dengan perusahaan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="konflik_masyarakat_perusahaan" value="{{ $default['konflik_masyarakat_perusahaan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="korban_masyarakat_perusahaan" class="col-sm-4 control-label">Jumlah korban jiwa akibat konflik
                    antara masyarakat dengan perusahaan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="korban_masyarakat_perusahaan" value="{{ $default['korban_masyarakat_perusahaan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kerugian_masyarakat_perusahaan" class="col-sm-4 control-label">Jumlah kerugian material akibat
                    konflik antara masyarakat dan perusahaan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kerugian_masyarakat_perusahaan" value="{{ $default['kerugian_masyarakat_perusahaan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="konflik_masyarakat_politik" class="col-sm-4 control-label">Jumlah konflik politik antara
                    masyarakat dengan lembaga politik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="konflik_masyarakat_politik" value="{{ $default['konflik_masyarakat_politik'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="korban_masyarakat_politik" class="col-sm-4 control-label">Jumlah korban jiwa akibat konflik
                    politik antara masyarakat dengan lembaga politik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="korban_masyarakat_politik" value="{{ $default['korban_masyarakat_politik'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kerugian_masyarakat_politik" class="col-sm-4 control-label">Jumlah kerugian material akibat
                    konflik politik antara masyarakat dengan lembaga politik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="kerugian_masyarakat_politik" value="{{ $default['kerugian_masyarakat_politik'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="sarpras_rusak" class="col-sm-4 control-label">Jumlah prasaranan dan sarana yang rusak/terbakar
                    akibat konflik Sara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="sarpras_rusak" value="{{ $default['sarpras_rusak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="rumah_terbakar" class="col-sm-4 control-label">Jumlah rumah penduduk yang rusak/terbakar akibat
                    konflik Sara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="rumah_terbakar" value="{{ $default['rumah_terbakar'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="korban_luka" class="col-sm-4 control-label">Jumlah korban luka akibat konflik Sara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="korban_luka" value="{{ $default['korban_luka'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="korban_meninggal" class="col-sm-4 control-label">Jumlah korban meninggal akibat konflik
                    Sara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="korban_meninggal" value="{{ $default['korban_meninggal'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="janda" class="col-sm-4 control-label">Jumlah janda akibat konflik Sara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="janda" value="{{ $default['janda'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="anak_yatim" class="col-sm-4 control-label">Jumlah anak yatim akibat konflik Sara</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="anak_yatim" value="{{ $default['anak_yatim'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pelaku" class="col-sm-4 control-label">Jumlah pelaku konflik yang diadili atau diproses secara
                    hukum</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control  angka-inputmask" name="pelaku" value="{{ $default['pelaku'] ?? 0 }}">
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
            $('input[name=kasus_antar_tetangga], input[name=kasus_antar_rt], input[name=konflik_masyarakat_penduduk], input[name=kasus_kelompok_masyarakat], input[name=konflik_masyarakat_pemerintah], input[name=kerugian_masyarakat_pemerintah], input[name=korban_masyarakat_pemerintah], input[name=konflik_masyarakat_perusahaan], input[name=korban_masyarakat_perusahaan], input[name=kerugian_masyarakat_perusahaan], input[name=konflik_masyarakat_politik], input[name=korban_masyarakat_politik], input[name=kerugian_masyarakat_politik], input[name=sarpras_rusak], input[name=rumah_terbakar], input[name=korban_luka], input[name=korban_meninggal], input[name=janda], input[name=anak_yatim], input[name=pelaku]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=konflik_tahun_ini], input[name=konflik_sara_tahun_ini]').inputmask(decimalObj);
        });
    </script>
@endpush
