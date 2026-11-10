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
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Musrenbang Desa/Kelurahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Musrenbang Desa/Kelurahan</a>
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
                <label for="jumlah_musyawarah" class="col-sm-4 control-label">Jumlah musyawarah perencanaan pembangunan
                    tingkat Desa/Kelurahan yang dilakukan pada tahun ini, termasuk di tingkat dusun dan lingkungan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_musyawarah" name="jumlah_musyawarah" value="{{ $default['jumlah_musyawarah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kehadiran" class="col-sm-4 control-label">Jumlah kehadiran masyarakat dalam setiap kali
                    musyawarah tingkat dusun/lingkungan dan desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kehadiran" name="jumlah_kehadiran" value="{{ $default['jumlah_kehadiran'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_laki" class="col-sm-4 control-label">Jumlah peserta laki-laki dalam Musrenbang di
                    desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_laki" name="jumlah_laki" value="{{ $default['jumlah_laki'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_perempuan" class="col-sm-4 control-label">Jumlah peserta perempuan dalam Musrenbang di
                    desa dan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_perempuan" name="jumlah_perempuan" value="{{ $default['jumlah_perempuan'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="musyawarah_desa" class="col-sm-4 control-label">Jumlah Musyawarah Antar Desa dalam perencanaan
                    pembangunan yang dikoordinasikan Kecamatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="musyawarah_desa" name="musyawarah_desa" value="{{ $default['musyawarah_desa'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penggunaan_profil" class="col-sm-4 control-label">Penggunaan Profil Desa/Kelurahan sebagai
                    sumber data dasar yang digunakan dalam perencanaan pembangunan desa dan forum Musrenbang
                    Partisipatif</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="penggunaan_profil" class="required" @checked($default['penggunaan_profil'] !== null && $default['penggunaan_profil'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="penggunaan_data" class="col-sm-4 control-label">Penggunaan data BPS dan data sektoral dalam
                    perencanaan pembangunan partisipatif dan Musrenbang di desa dan kelurahan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="penggunaan_data" class="required" @checked($default['penggunaan_data'] !== null && $default['penggunaan_data'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="pelibatan_masyarakat" class="col-sm-4 control-label">Pelibatan masyarakat dalam pemutakhiran
                    data profil desa dan kelurahan sebagai bahan dalam Musrenbang partisipatif</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pelibatan_masyarakat" class="required" @checked($default['pelibatan_masyarakat'] !== null && $default['pelibatan_masyarakat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_masyarakat" class="col-sm-4 control-label">Usulan masyarakat yang disetujui menjadi
                    Rencana Kerja Desa dan Kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_masyarakat" name="usulan_masyarakat" value="{{ $default['usulan_masyarakat'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_pemerintah" class="col-sm-4 control-label">Usulan Pemerintah Desa dan Kelurahan yang
                    disetujui menjadi Rencana Kerja Desa/Kelurahan dan dimuat dalam RAPB-Desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_pemerintah" name="usulan_pemerintah" value="{{ $default['usulan_pemerintah'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_rencana" class="col-sm-4 control-label">Usulan rencana kerja program dan kegiatan dari
                    pemerintah kabupaten/kota/provinsi dan pusat yang dibahas saat Musrenbang dan disetujui untuk
                    dilaksanakan di desa dan kelurahan oleh masyarakat dan lembaga kemasyarakatan
                    desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_rencana" name="usulan_rencana" value="{{ $default['usulan_rencana'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="penggunaan_data_bps" class="col-sm-4 control-label">Penggunaan data BPS dan data sektoral dalam
                    perencanaan pembangunan partisipatif dan Musrenbang di desa dan kelurahan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="penggunaan_data_bps" class="required" @checked($default['penggunaan_data_bps'] !== null && $default['penggunaan_data_bps'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="pelibatan_masyarakat_rencana" class="col-sm-4 control-label">Pelibatan masyarakat dalam
                    pemutakhiran data profil desa dan kelurahan sebagai bahan dalam Musrenbang partisipatif</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\YaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pelibatan_masyarakat_rencana" class="required" @checked($default['pelibatan_masyarakat_rencana'] !== null && $default['pelibatan_masyarakat_rencana'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_masyarakat_setuju" class="col-sm-4 control-label">Usulan masyarakat yang disetujui
                    menjadi Rencana Kerja Desa dan Kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_masyarakat_setuju" name="usulan_masyarakat_setuju" value="{{ $default['usulan_masyarakat_setuju'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_pemerintah_setuju" class="col-sm-4 control-label">Usulan Pemerintah dan Kelurahan yang
                    disetujui menjadi Rencana Kerja Desa/Kelurahan dan dimuat dalam RAPB-Desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_pemerintah_setuju" name="usulan_pemerintah_setuju" value="{{ $default['usulan_pemerintah_setuju'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_rencana_setuju" class="col-sm-4 control-label">Usulan rencana kerja program dan kegiatan
                    dari pemerintah kabupaten/kota/provinsi dan pusat yang dibahas saat Musrenbang dan disetujui untuk
                    dilaksanakan di desa dan kelurahan oleh masyarakat dan lembaga kemasyarakatan
                    desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_rencana_setuju" name="usulan_rencana_setuju" value="{{ $default['usulan_rencana_setuju'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="usulan_rencana_ditolak" class="col-sm-4 control-label">Usulan rencana kerja pemerintah tingkat
                    atas yang ditolak dalam Musrenbangdes/kel</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="usulan_rencana_ditolak" name="usulan_rencana_ditolak" value="{{ $default['usulan_rencana_ditolak'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pemilik_dokumen" class="col-sm-4 control-label">Pemilikan dokumen Rencana Kerja Pembangunan
                    Desa/Kelurahan (RKPD/K)</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pemilik_dokumen" class="required" @checked($default['pemilik_dokumen'] !== null && $default['pemilik_dokumen'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="pemilik_rencana" class="col-sm-4 control-label">Pemilikan Rencana Pembangunan Jangka Menengah
                    Desa/Kelurahan (RPJMD/K)</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pemilik_rencana" class="required" @checked($default['pemilik_rencana'] !== null && $default['pemilik_rencana'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="pemilik_dokumen_hasil" class="col-sm-4 control-label">Pemilikan dokumen hasil Musrenbang tingkat
                    Desa dan Kelurahan yang diusulkan ke pemerintah tingkat atas untuk dibiayai dari APBD Kab/Kota, APBD
                    Provinsi dan APBN maupun sumber biaya dari perusahaan swasta yang investasi
                    di desa/kelurahan</label>
                <div class="col-sm-8">
                    @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                        <div class="radio">
                            <label><input type="radio" name="pemilik_dokumen_hasil" class="required" @checked($default['pemilik_dokumen_hasil'] !== null && $default['pemilik_dokumen_hasil'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_a" class="col-sm-4 control-label">Jumlah kegiatan yang diusulkan masyarakat
                    melalui forum Musrenbangdes/kel yang tidak direalisasikan dalam APB-Desa, APB-Daerah Kabupaten/Kota dan
                    Provinsi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_a" name="jumlah_kegiatan_a" value="{{ $default['jumlah_kegiatan_a'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_kegiatan_b" class="col-sm-4 control-label">Jumlah kegiatan yang diusulkan masyarakat
                    melalui forum Musrenbangdes/kel yang pelaksanaannya tidak sesuai dengan hasil Musrenbang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" id="jumlah_kegiatan_b" name="jumlah_kegiatan_b" value="{{ $default['jumlah_kegiatan_b'] ?? 0 }}">
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
            $('input[name=jumlah_musyawarah], input[name=jumlah_kehadiran], input[name=jumlah_laki], input[name=jumlah_perempuan], input[name=musyawarah_desa], input[name=usulan_rencana], input[name=usulan_rencana_setuju], input[name=jumlah_kegiatan_a], input[name=jumlah_kegiatan_b]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=usulan_masyarakat], input[name=usulan_pemerintah], input[name=usulan_masyarakat_setuju], input[name=usulan_pemerintah_setuju], input[name=usulan_rencana_ditolak]').inputmask(decimalObj);
        });
    </script>
@endpush
