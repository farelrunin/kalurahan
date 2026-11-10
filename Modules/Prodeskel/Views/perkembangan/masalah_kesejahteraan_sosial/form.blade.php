@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::perkembangan.readonly_form')
@section('title')
    <h1>
        Prodeskel
        <small>Keamanan dan Ketertiban</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Keamanan dan Ketertiban</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Masalah Kesejahteraan Sosial</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Masalah Kesejahteraan Sosial</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            <div class="col-sm-6">
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
                    <label for="pengangguran" class="col-sm-4 control-label">Jumlah anak, remaja, preman dan
                        pengangguran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="pengangguran" value="{{ $default['pengangguran'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="gelandangan" class="col-sm-4 control-label">Jumlah gelandangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="gelandangan" value="{{ $default['gelandangan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pengemis" class="col-sm-4 control-label">Jumlah pengemis jalanan dan terlantar</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="pengemis" value="{{ $default['pengemis'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="manula" class="col-sm-4 control-label">Jumlah manusia lanjut usia terlantar</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="manula" value="{{ $default['manula'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="orang_gila" class="col-sm-4 control-label">Jumlah orang gila/stress/cacat mental</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="orang_gila" value="{{ $default['orang_gila'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cacat" class="col-sm-4 control-label">Jumlah orang cacat fisik</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="cacat" value="{{ $default['cacat'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelainan" class="col-sm-4 control-label">Jumlah orang kelainan kulit</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="kelainan" value="{{ $default['kelainan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="emperan" class="col-sm-4 control-label">Jumlah orang yang tidur di kolong
                        jembatan/emperan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="emperan" value="{{ $default['emperan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kumuh" class="col-sm-4 control-label">Jumlah rumah dan kawasan kumuh (Unit)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="kumuh" value="{{ $default['kumuh'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="jompo" class="col-sm-4 control-label">Jumlah panti jompo (Unit)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="jompo" value="{{ $default['jompo'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="asuhan" class="col-sm-4 control-label">Jumlah panti asuhan anak (Unit)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="asuhan" value="{{ $default['asuhan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="rumah_singgah" class="col-sm-4 control-label">Jumlah rumah singgah anak jalanan
                        (Unit)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="rumah_singgah" value="{{ $default['rumah_singgah'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="taman_kota" class="col-sm-4 control-label">Jumlah penghuni jalur hijau dan taman
                        kota</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="taman_kota" value="{{ $default['taman_kota'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="bantaran_sungai" class="col-sm-4 control-label">Jumlah penghuni bantaran sungai</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="bantaran_sungai" value="{{ $default['bantaran_sungai'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="rel_kereta" class="col-sm-4 control-label">Jumlah penghuni pinggiran rel kereta api</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="rel_kereta" value="{{ $default['rel_kereta'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="liar" class="col-sm-4 control-label">Jumlah penghuni liar di lahan dan fasilitas umum
                        lainnya</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="liar" value="{{ $default['liar'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="primitif" class="col-sm-4 control-label">Jumlah anggota kelompok masyarakat/suku/keluarga
                        terasing, terisolir, terlantar dan primitif</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="primitif" value="{{ $default['primitif'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="yatim" class="col-sm-4 control-label">Jumlah anak yatim usia 0-18 tahun</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="yatim" value="{{ $default['yatim'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="piatu" class="col-sm-4 control-label">Jumlah anak piatu 0-18 tahun</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="piatu" value="{{ $default['piatu'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="yatim_piatu" class="col-sm-4 control-label">Jumlah anak yatim piatu 0-18 tahun</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="yatim_piatu" value="{{ $default['yatim_piatu'] ?? 0 }}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="janda" class="col-sm-4 control-label">Jumlah janda</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="janda" value="{{ $default['janda'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sd" class="col-sm-4 control-label">Jumlah anak usia 7-12 tahun yang tidak sekolah di
                        SD/sederajat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="sd" value="{{ $default['sd'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sltp" class="col-sm-4 control-label">Jumlah anak usia 7-12 tahun yang tidak sekolah di
                        SLTP/sederajat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="sltp" value="{{ $default['sltp'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="slta" class="col-sm-4 control-label">Jumlah anak usia 7-12 tahun yang tidak sekolah di
                        SLTA/sederajat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="slta" value="{{ $default['slta'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="anak_bekerja" class="col-sm-4 control-label">Jumlah anak yang bekerja membantu keluarga
                        menghasilkan uang</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="anak_bekerja" value="{{ $default['anak_bekerja'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="perempuan_kepala" class="col-sm-4 control-label">Jumlah perempuan yang menjadi kepala
                        keluarga</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="perempuan_kepala" value="{{ $default['perempuan_kepala'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="napi" class="col-sm-4 control-label">Jumlah penduduk eks napi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="napi" value="{{ $default['napi'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="banjir" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        banjir</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="banjir" value="{{ $default['banjir'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="gunung" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        gunung berapi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="gunung" value="{{ $default['gunung'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tsunami" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        tsunami</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="tsunami" value="{{ $default['tsunami'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="gempa" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana gempa
                        bumi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="gempa" value="{{ $default['gempa'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kebakaran" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        kebakaran rumah</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="kebakaran" value="{{ $default['kebakaran'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kekeringan" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        kekeringan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="kekeringan" value="{{ $default['kekeringan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="longsor" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        tanah longsor</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="longsor" value="{{ $default['longsor'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="hutan" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan bencana
                        kebakaran hutan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="hutan" value="{{ $default['hutan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelaparan" class="col-sm-4 control-label">Jumlah penduduk rawan bencana kelaparan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="kelaparan" value="{{ $default['kelaparan'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="air_bersih" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah rawan air
                        bersih</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="air_bersih" value="{{ $default['air_bersih'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="tandus" class="col-sm-4 control-label">Jumlah penduduk tinggal di daerah lahan kritis dan
                        tandus</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="tandus" value="{{ $default['tandus'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="padat" class="col-sm-4 control-label">Jumlah penduduk tinggal di kawasan padat penduduk dan
                        kumuh</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="padat" value="{{ $default['padat'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pendatang" class="col-sm-4 control-label">Jumlah warga pendatang yang tidak memiliki
                        keterangan penduduk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="pendatang" value="{{ $default['pendatang'] ?? 0 }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="musiman" class="col-sm-4 control-label">Jumlah warga pendatang dan atau pekerja
                        musiman</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control  angka-inputmask" name="musiman" value="{{ $default['musiman'] ?? 0 }}">
                    </div>
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
            $('input[name=pengangguran], input[name=gelandangan], input[name=pengemis], input[name=manula], input[name=orang_gila], input[name=cacat], input[name=kelainan], input[name=emperan], input[name=kumuh], input[name=jompo], input[name=asuhan], input[name=rumah_singgah], input[name=taman_kota], input[name=bantaran_sungai], input[name=rel_kereta], input[name=liar], input[name=primitif], input[name=yatim], input[name=piatu], input[name=yatim_piatu], input[name=janda], input[name=sd], input[name=sltp], input[name=slta], input[name=anak_bekerja], input[name=perempuan_kepala], input[name=napi], input[name=banjir], input[name=gunung], input[name=tsunami], input[name=gempa], input[name=kebakaran], input[name=kekeringan], input[name=longsor], input[name=hutan], input[name=kelaparan], input[name=air_bersih], input[name=tandus], input[name=padat], input[name=pendatang], input[name=musiman]').inputmask(integerObj);
        });
    </script>
@endpush
