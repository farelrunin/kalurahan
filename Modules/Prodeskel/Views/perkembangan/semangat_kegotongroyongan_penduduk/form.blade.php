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
    <li>Peranserta Masyarakat dalam Pembangunan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Semangat Kegotongroyongan Penduduk</a>
    </li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Semangat Kegotongroyongan Penduduk</a>
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
                <label for="jumlah_kelompok_arisan" class="col-sm-4 control-label">Jumlah kelompok arisan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kelompok_arisan" name="jumlah_kelompok_arisan" value="{{ $default['jumlah_kelompok_arisan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk_menjadi_orangtua_asuh" class="col-sm-4 control-label">Jumlah penduduk menjadi
                    orangtua asuh</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_penduduk_menjadi_orangtua_asuh" name="jumlah_penduduk_menjadi_orangtua_asuh" value="{{ $default['jumlah_penduduk_menjadi_orangtua_asuh'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_dana_sehat" class="col-sm-4 control-label">Ada tidaknya dana sehat</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_dana_sehat" class="required" @checked($default['ada_tidaknya_dana_sehat'] !== null && $default['ada_tidaknya_dana_sehat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pembangunan_rumah" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pembangunan rumah</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pembangunan_rumah" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pembangunan_rumah'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pembangunan_rumah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pengolahan_tanah" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pengolahan tanah</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pengolahan_tanah" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pengolahan_tanah'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pengolahan_tanah'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pembiayaan_pendidikan" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pembiayaan pendidikan anak
                    sekolah/kuliah/kursus</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pembiayaan_pendidikan" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pembiayaan_pendidikan'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pembiayaan_pendidikan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pemeliharaan_fasilitas_umum" class="col-sm-4 control-label">Ada tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam
                    pemeliharaan fasilitas umum dan fasilitas sosial/prasarana dan sarana</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pemeliharaan_fasilitas_umum" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pemeliharaan_fasilitas_umum'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pemeliharaan_fasilitas_umum'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pemberian_modal_usaha" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pemberian modal usaha</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pemberian_modal_usaha" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pemberian_modal_usaha'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pemberian_modal_usaha'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pengerjaan_sawah_kebun" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pengerjaan sawah atau kebun</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pengerjaan_sawah_kebun" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pengerjaan_sawah_kebun'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pengerjaan_sawah_kebun'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_penangkapan_ikan" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam penangkapan ikan dan usaha peternakan
                    lainnya</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_penangkapan_ikan" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_penangkapan_ikan'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_penangkapan_ikan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_jaga_ketertiban" class="col-sm-4 control-label">Ada tidaknya
                    kegiatan gotong royong atau sambatan/sejenisnya dalam menjaga ketertiban, ketentraman dan
                    keamanan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_jaga_ketertiban" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_jaga_ketertiban'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_jaga_ketertiban'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_peristiwa_kematian" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam peristiwa kematian</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_peristiwa_kematian" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_peristiwa_kematian'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_peristiwa_kematian'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_jaga_kebersihan" class="col-sm-4 control-label">Ada tidaknya
                    kegiatan gotong royong menjaga kebersihan Desa/Kelurahan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_jaga_kebersihan" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_jaga_kebersihan'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_jaga_kebersihan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_membangun_infrastruktur" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong membangun jalan/jembatan/saluran air/irigasi</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_membangun_infrastruktur" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_membangun_infrastruktur'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_membangun_infrastruktur'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="ada_tidaknya_kegiatan_gotong_royong_pemberantasan_nyamuk" class="col-sm-4 control-label">Ada
                    tidaknya kegiatan gotong royong atau sambatan/sejenisnya dalam pemberantasan sarang nyamuk dan kesehtan
                    lingkungan lainnya</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="ada_tidaknya_kegiatan_gotong_royong_pemberantasan_nyamuk" class="required" @checked($default['ada_tidaknya_kegiatan_gotong_royong_pemberantasan_nyamuk'] !== null && $default['ada_tidaknya_kegiatan_gotong_royong_pemberantasan_nyamuk'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
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
            $('input[name=jumlah_kelompok_arisan], input[name=jumlah_penduduk_menjadi_orangtua_asuh]').inputmask(integerObj);
        });
    </script>
@endpush
