@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@push('css')
    <style>
        .radio-inline {
            min-width: 40px;
            margin-right: 20px;
        }

        div>.radio-inline:first-child {
            margin-left: 20px;
        }
    </style>
@endpush

@section('title')
    <h1>
        Prodeskel
        <small>Lembaga Pemerintah</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.lembagaPemerintah') }}">Lembaga Pemerintah</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.lembagaPemerintah') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Lembaga Pemerintah</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun', ['controlLabel' => 'col-sm-3', 'controlInput' => 'col-sm-9'])
            <div class="form-group">
                <label for="tanggal" class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-9">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pemerintah
                    {{ ucwords(setting('sebutan_desa')) }}</label>
            </div>

            <div class="form-group">
                <label for="dasar_pembentukan" class="col-sm-3 control-label">Dasar Hukum Pembentukan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\DasarHukumDesaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="dasar_pembentukan" class="required" @checked($default['dasar_pembentukan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="dasar_pembentukan_bpd" class="col-sm-3 control-label">Dasar Hukum Pembentukan BPD</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\DasarHukumBpdEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="dasar_pembentukan_bpd" class="required" @checked($default['dasar_pembentukan_bpd'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_aparat_pemerintah" class="col-sm-3 control-label">Jumlah Aparat Pemerintahan
                    (Orang)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_aparat_pemerintah" value="{{ $default['jumlah_aparat_pemerintah'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_perangkat_desa" class="col-sm-3 control-label">Jumlah Perangkat
                    {{ ucwords(setting('sebutan_desa')) }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_perangkat_desa" value="{{ $default['jumlah_perangkat_desa'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kepala_desa" class="col-sm-3 control-label">Kepala
                    {{ ucwords(setting('sebutan_desa')) }}</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_desa" class="required" @checked($default['kepala_desa'] !== null && $default['kepala_desa'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="sekretaris_desa" class="col-sm-3 control-label">Sekretaris
                    {{ ucwords(setting('sebutan_desa')) }}</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="sekretaris_desa" class="required" @checked($default['sekretaris_desa'] !== null && $default['sekretaris_desa'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="kepala_urusan_seksi_pemerintahan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Pemerintahan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_pemerintahan" class="required" @checked($default['kepala_urusan_seksi_pemerintahan'] !== null && $default['kepala_urusan_seksi_pemerintahan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_pembangunan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Pembangunan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_pembangunan" class="required" @checked($default['kepala_urusan_seksi_pembangunan'] !== null && $default['kepala_urusan_seksi_pembangunan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_pemberdayaan_masyarakat" class="col-sm-3 control-label">Kepala
                    Urusan/Seksi Seksi Pemberdayaan Masyarakat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_pemberdayaan_masyarakat" class="required" @checked($default['kepala_urusan_seksi_pemberdayaan_masyarakat'] !== null && $default['kepala_urusan_seksi_pemberdayaan_masyarakat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_kesejahteraan_rakyat" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Seksi Kesejahteraan Rakyat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_kesejahteraan_rakyat" class="required" @checked($default['kepala_urusan_seksi_kesejahteraan_rakyat'] !== null && $default['kepala_urusan_seksi_kesejahteraan_rakyat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_umum" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Umum</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_umum" class="required" @checked($default['kepala_urusan_seksi_umum'] !== null && $default['kepala_urusan_seksi_umum'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_keuangan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Keuangan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_keuangan" class="required" @checked($default['kepala_urusan_seksi_keuangan'] !== null && $default['kepala_urusan_seksi_keuangan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_perekonomian" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Perekonomian</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_perekonomian" class="required" @checked($default['kepala_urusan_seksi_perekonomian'] !== null && $default['kepala_urusan_seksi_perekonomian'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_urusan_seksi_data_informasi" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Data Informasi</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_urusan_seksi_data_informasi" class="required" @checked($default['kepala_urusan_seksi_data_informasi'] !== null && $default['kepala_urusan_seksi_data_informasi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_staff" class="col-sm-3 control-label">Jumlah Staf</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_staff" value="{{ $default['jumlah_staff'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah_dusun" class="col-sm-3 control-label">Jumlah
                    {{ ucwords(setting('sebutan_dusun')) }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_dusun" value="{{ $default['jumlah_dusun'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kepala_dusun_lingkungan_1" class="col-sm-3 control-label">Kepala Dusun Lingkungan 1</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PasifEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_dusun_lingkungan_1" class="required" @checked($default['kepala_dusun_lingkungan_1'] !== null && $default['kepala_dusun_lingkungan_1'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_dusun_lingkungan_2" class="col-sm-3 control-label">Kepala Dusun Lingkungan 2</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PasifEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_dusun_lingkungan_2" class="required" @checked($default['kepala_dusun_lingkungan_2'] !== null && $default['kepala_dusun_lingkungan_2'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_dusun_lingkungan_3" class="col-sm-3 control-label">Kepala Dusun Lingkungan 3</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PasifEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_dusun_lingkungan_3" class="required" @checked($default['kepala_dusun_lingkungan_3'] !== null && $default['kepala_dusun_lingkungan_3'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_dusun_lingkungan_4" class="col-sm-3 control-label">Kepala Dusun Lingkungan 4</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PasifEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_dusun_lingkungan_4" class="required" @checked($default['kepala_dusun_lingkungan_4'] !== null && $default['kepala_dusun_lingkungan_4'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="kepala_dusun_lingkungan_5" class="col-sm-3 control-label">Kepala Dusun Lingkungan 5</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PasifEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kepala_dusun_lingkungan_5" class="required" @checked($default['kepala_dusun_lingkungan_5'] !== null && $default['kepala_dusun_lingkungan_5'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pendidikan Aparat
                    {{ ucwords(setting('sebutan_desa')) }}</label>
            </div>

            <div class="form-group">
                <label for="pendidikan_kepala_desa" class="col-sm-3 control-label">Kepala Desa</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_desa" class="required" @checked($default['pendidikan_kepala_desa'] !== null && $default['pendidikan_kepala_desa'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pangkat_golongan_kades" class="col-sm-3 control-label">Pangkat/Golongan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pangkat_golongan_kades" value="{{ $default['pangkat_golongan_kades'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nip_kades" class="col-sm-3 control-label">NIP</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nip_kades" value="{{ $default['nip_kades'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pelatihan_kades" class="col-sm-3 control-label">Pelatihan yang pernah diikuti</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="pelatihan_kades">{{ $default['pelatihan_kades'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin_kades" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\JenisKelaminEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin_kades" class="required" @checked(($default['jenis_kelamin_kades'] ?? 0) == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_sekretaris_desa" class="col-sm-3 control-label">Sekretaris Desa</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_sekretaris_desa" class="required" @checked($default['pendidikan_sekretaris_desa'] !== null && $default['pendidikan_sekretaris_desa'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_sekdes" class="col-sm-3 control-label">Nama Sekretaris
                    {{ ucwords(setting('sebutan_desa')) }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_sekdes" value="{{ $default['nama_sekdes'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="status_pegawai_sekdes" class="col-sm-3 control-label">Status Kepegawaian</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\StatusPnsEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="status_pegawai_sekdes" class="required" @checked($default['status_pegawai_sekdes'] !== null && $default['status_pegawai_sekdes'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pangkat_golongan_sekdes" class="col-sm-3 control-label">Pangkat/Golongan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pangkat_golongan_sekdes" value="{{ $default['pangkat_golongan_sekdes'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="nip_sekdes" class="col-sm-3 control-label">NIP</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nip_sekdes" value="{{ $default['nip_sekdes'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pelatihan_sekdes" class="col-sm-3 control-label">Pelatihan yang pernah diikuti</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="pelatihan_sekdes">{{ $default['pelatihan_sekdes'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin_sekdes" class="col-sm-3 control-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\JenisKelaminEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="jenis_kelamin_sekdes" class="required" @checked(($default['jenis_kelamin_sekdes'] ?? 0) == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_pemerintahan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Pemerintahan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_pemerintahan" class="required" @checked($default['pendidikan_kepala_urusan_pemerintahan'] !== null && $default['pendidikan_kepala_urusan_pemerintahan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_pembangunan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Pembangunan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_pembangunan" class="required" @checked($default['pendidikan_kepala_urusan_pembangunan'] !== null && $default['pendidikan_kepala_urusan_pembangunan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_pemberdayaan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Pemberdayaan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_pemberdayaan" class="required" @checked($default['pendidikan_kepala_urusan_pemberdayaan'] !== null && $default['pendidikan_kepala_urusan_pemberdayaan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_kesejahteraan_rakyat" class="col-sm-3 control-label">Kepala
                    Urusan/Seksi Kesejahteraan Rakyat</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_kesejahteraan_rakyat" class="required" @checked($default['pendidikan_kepala_urusan_kesejahteraan_rakyat'] !== null && $default['pendidikan_kepala_urusan_kesejahteraan_rakyat'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_umum" class="col-sm-3 control-label">Kepala Urusan/Seksi Umum</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_umum" class="required" @checked($default['pendidikan_kepala_urusan_umum'] !== null && $default['pendidikan_kepala_urusan_umum'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_keuangan" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Keuangan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_keuangan" class="required" @checked($default['pendidikan_kepala_urusan_keuangan'] !== null && $default['pendidikan_kepala_urusan_keuangan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_perekonomian" class="col-sm-3 control-label">Kepala Urusan/Seksi
                    Perekonomian</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_perekonomian" class="required" @checked($default['pendidikan_kepala_urusan_perekonomian'] !== null && $default['pendidikan_kepala_urusan_perekonomian'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_kepala_urusan_seksi_data_informasi" class="col-sm-3 control-label">Kepala
                    Urusan/Seksi Seksi Data Informasi</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_kepala_urusan_seksi_data_informasi" class="required" @checked($default['pendidikan_kepala_urusan_seksi_data_informasi'] !== null && $default['pendidikan_kepala_urusan_seksi_data_informasi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Badan Perwakilan
                    {{ ucwords(setting('sebutan_desa')) }}</label>
            </div>
            <div class="form-group">
                <label for="keberadaan_bpd" class="col-sm-3 control-label">Keberadaan BPD</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KeaktifanEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="keberadaan_bpd" class="required" @checked($default['keberadaan_bpd'] !== null && $default['keberadaan_bpd'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jumlah_anggota_bpd" class="col-sm-3 control-label">Jumlah Anggota BPD</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="jumlah_anggota_bpd" value="{{ $default['jumlah_anggota_bpd'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_ketua_bpd" class="col-sm-3 control-label">Pendidikan Ketua BPD</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_ketua_bpd" class="required" @checked($default['pendidikan_ketua_bpd'] !== null && $default['pendidikan_ketua_bpd'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_ketua_bpd" class="col-sm-3 control-label">Nama Ketua BPD</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_ketua_bpd" value="{{ $default['nama_ketua_bpd'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pelatihan_ketua_bpd" class="col-sm-3 control-label">Pelatihan yang pernah diikuti</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="pelatihan_ketua_bpd">{{ $default['pelatihan_ketua_bpd'] ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_wakil_ketua_bpd" class="col-sm-3 control-label">Pendidikan Wakil Ketua Bpd</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_wakil_ketua_bpd" class="required" @checked($default['pendidikan_wakil_ketua_bpd'] !== null && $default['pendidikan_wakil_ketua_bpd'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_wakil_ketua_bpd" class="col-sm-3 control-label">Nama Wakil Ketua BPD</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_wakil_ketua_bpd" value="{{ $default['nama_wakil_ketua_bpd'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_sekretaris_bpd" class="col-sm-3 control-label">Sekretaris BPD</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_sekretaris_bpd" class="required" @checked($default['pendidikan_sekretaris_bpd'] !== null && $default['pendidikan_sekretaris_bpd'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_sekretaris_bpd" class="col-sm-3 control-label">Nama Sekretaris BPD</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_sekretaris_bpd" value="{{ $default['nama_sekretaris_bpd'] ?? '' }}">
                </div>
            </div>
            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pendidikan Anggota BPD</label>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_1" class="col-sm-3 control-label">Nama Anggota 1</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_1" value="{{ $default['nama_anggota_bpd_1'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_1" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_1" class="required" @checked($default['pendidikan_anggota_bpd_1'] !== null && $default['pendidikan_anggota_bpd_1'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_2" class="col-sm-3 control-label">Nama Anggota 2</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_2" value="{{ $default['nama_anggota_bpd_2'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_2" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_2" class="required" @checked($default['pendidikan_anggota_bpd_2'] !== null && $default['pendidikan_anggota_bpd_2'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_3" class="col-sm-3 control-label">Nama Anggota 3</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_3" value="{{ $default['nama_anggota_bpd_3'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_3" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_3" class="required" @checked($default['pendidikan_anggota_bpd_3'] !== null && $default['pendidikan_anggota_bpd_3'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_4" class="col-sm-3 control-label">Nama Anggota 4</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_4" value="{{ $default['nama_anggota_bpd_4'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_4" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_4" class="required" @checked($default['pendidikan_anggota_bpd_4'] !== null && $default['pendidikan_anggota_bpd_4'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_5" class="col-sm-3 control-label">Nama Anggota 5</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_5" value="{{ $default['nama_anggota_bpd_5'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_5" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_5" class="required" @checked($default['pendidikan_anggota_bpd_5'] !== null && $default['pendidikan_anggota_bpd_5'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_6" class="col-sm-3 control-label">Nama Anggota 6</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_6" value="{{ $default['nama_anggota_bpd_6'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_6" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_6" class="required" @checked($default['pendidikan_anggota_bpd_6'] !== null && $default['pendidikan_anggota_bpd_6'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_7" class="col-sm-3 control-label">Nama Anggota 7</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_7" value="{{ $default['nama_anggota_bpd_7'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_7" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_7" class="required" @checked($default['pendidikan_anggota_bpd_7'] !== null && $default['pendidikan_anggota_bpd_7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_8" class="col-sm-3 control-label">Nama Anggota 8</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_8" value="{{ $default['nama_anggota_bpd_8'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_8" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_8" class="required" @checked($default['pendidikan_anggota_bpd_8'] !== null && $default['pendidikan_anggota_bpd_8'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_9" class="col-sm-3 control-label">Nama Anggota 9</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_9" value="{{ $default['nama_anggota_bpd_9'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_9" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_9" class="required" @checked($default['pendidikan_anggota_bpd_9'] !== null && $default['pendidikan_anggota_bpd_9'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_10" class="col-sm-3 control-label">Nama Anggota 10</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_10" value="{{ $default['nama_anggota_bpd_10'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_10" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_10" class="required" @checked($default['pendidikan_anggota_bpd_10'] !== null && $default['pendidikan_anggota_bpd_10'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_11" class="col-sm-3 control-label">Nama Anggota 11</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_11" value="{{ $default['nama_anggota_bpd_11'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_11" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_11" class="required" @checked($default['pendidikan_anggota_bpd_11'] !== null && $default['pendidikan_anggota_bpd_11'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_12" class="col-sm-3 control-label">Nama Anggota 12</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_12" value="{{ $default['nama_anggota_bpd_12'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_12" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_12" class="required" @checked($default['pendidikan_anggota_bpd_12'] !== null && $default['pendidikan_anggota_bpd_12'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_13" class="col-sm-3 control-label">Nama Anggota 13</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_13" value="{{ $default['nama_anggota_bpd_13'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_13" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_13" class="required" @checked($default['pendidikan_anggota_bpd_13'] !== null && $default['pendidikan_anggota_bpd_13'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_14" class="col-sm-3 control-label">Nama Anggota 14</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_14" value="{{ $default['nama_anggota_bpd_14'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_14" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_14" class="required" @checked($default['pendidikan_anggota_bpd_14'] !== null && $default['pendidikan_anggota_bpd_14'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_anggota_bpd_15" class="col-sm-3 control-label">Nama Anggota 15</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_anggota_bpd_15" value="{{ $default['nama_anggota_bpd_15'] ?? '' }}">
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan_anggota_bpd_15" class="col-sm-3 control-label">Pendidikan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PendidikanPerangkatEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="pendidikan_anggota_bpd_15" class="required" @checked($default['pendidikan_anggota_bpd_15'] !== null && $default['pendidikan_anggota_bpd_15'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-danger btn-sm" onclick="reset_form($(this).val());"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" onclick="$(this).closest('form').submit()" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
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
            $('input[name=jumlah_aparat_pemerintah], input[name=jumlah_perangkat_desa], input[name=jumlah_staff], input[name=jumlah_dusun], input[name=jumlah_anggota_bpd]').inputmask(integerObj);
        });
    </script>
@endpush
