@extends('admin.layouts.index')
@include('prodeskel::assets.style')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@includeWhen($readonlyForm, 'prodeskel::potensi.readonly_form')

@section('title')
    <h1>
        Prodeskel
        <small>Jenis Lahan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Sumber Daya Alam</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.jenisLahan') }}">Jenis Lahan</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.jenisLahan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Jenis Lahan</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">
            @include('prodeskel::potensi.bulan_tahun')
            <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-10">
                    <div class="input-group input-group-sm" style="margin-bottom: 5px;">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control input-sm datepicker required" name="tanggal" value="{{ $default['tanggal'] }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Tanah Sawah</label>
                    </div>
                    <div class="form-group">
                        <label for="sawah_irigasi_teknis" class="col-sm-4 control-label">Sawah Irigasi Teknis (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_sawah" name="sawah_irigasi_teknis" value="{{ $default['sawah_irigasi_teknis'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sawah_irigasi_setengah_teknis" class="col-sm-4 control-label">Sawah Irigasi 1/2 Teknis
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_sawah" name="sawah_irigasi_setengah_teknis" value="{{ $default['sawah_irigasi_setengah_teknis'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sawah_tadah_hujan" class="col-sm-4 control-label">Sawah Tadah Hujan(Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_sawah" name="sawah_tadah_hujan" value="{{ $default['sawah_tadah_hujan'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sawah_pasang_surut" class="col-sm-4 control-label">Sawah Pasang Surut(Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_sawah" name="sawah_pasang_surut" value="{{ $default['sawah_pasang_surut'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="luas_tanah_sawah" class="col-sm-4 control-label text-primary">Luas Tanah Sawah
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" name="luas_tanah_sawah" data-summary="luas_tanah_entri_data" readonly value="{{ $default['luas_tanah_sawah'] ?? 0 }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Tanah Kering</label>
                    </div>
                    <div class="form-group">
                        <label for="tegal_ladang" class="col-sm-4 control-label">Tegal/Ladang (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kering" name="tegal_ladang" value="{{ $default['tegal_ladang'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pemukiman" class="col-sm-4 control-label">Pemukiman (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kering" name="pemukiman" value="{{ $default['pemukiman'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pekarangan" class="col-sm-4 control-label">Pekarangan (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kering" name="pekarangan" value="{{ $default['pekarangan'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah_kering" class="col-sm-4 control-label text-primary">Luas Tanah Kering
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" name="luas_tanah_kering" data-summary="luas_tanah_entri_data" readonly value="{{ $default['luas_tanah_kering'] ?? 0 }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Tanah Basah</label>
                    </div>
                    <div class="form-group">
                        <label for="tanah_rawa" class="col-sm-4 control-label">Tanah Rawa (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_basah" name="tanah_rawa" value="{{ $default['tanah_rawa'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_pasang_surut" class="col-sm-4 control-label">Pasang Surut (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_basah" name="tanah_pasang_surut" value="{{ $default['tanah_pasang_surut'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_lahan_gambut" class="col-sm-4 control-label">Lahan Gambut (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_basah" name="tanah_lahan_gambut" value="{{ $default['tanah_lahan_gambut'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_situ_danau" class="col-sm-4 control-label">Situ/Waduk/Danau (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_basah" name="tanah_situ_danau" value="{{ $default['tanah_situ_danau'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="luas_tanah_basah" class="col-sm-4 control-label text-primary">Luas Tanah Basah
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" name="luas_tanah_basah" data-summary="luas_tanah_entri_data" readonly value="{{ $default['luas_tanah_basah'] ?? 0 }}">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Tanah Perkebunan</label>
                    </div>
                    <div class="form-group">
                        <label for="tanah_kebun_rakyat" class="col-sm-4 control-label">Perkebunan Rakyat (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_perkebunan" name="tanah_kebun_rakyat" value="{{ $default['tanah_kebun_rakyat'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_kebun_negara" class="col-sm-4 control-label">Perkebunan Negara (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_perkebunan" name="tanah_kebun_negara" value="{{ $default['tanah_kebun_negara'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_kebun_swasta" class="col-sm-4 control-label">Perkebunan Swasta (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_perkebunan" name="tanah_kebun_swasta" value="{{ $default['tanah_kebun_swasta'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_kebun_perorangan" class="col-sm-4 control-label">Perkebunan Perorangan
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_perkebunan" name="tanah_kebun_perorangan" value="{{ $default['tanah_kebun_perorangan'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah_perkebunan" class="col-sm-4 control-label text-primary">Luas Tanah Perkebunan
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" name="luas_tanah_perkebunan" data-summary="luas_tanah_entri_data" readonly value="{{ $default['luas_tanah_perkebunan'] ?? 0 }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Tanah Fasilitas Umum</label>
                    </div>
                    <div class="form-group">
                        <label for="tanah_bengkok" class="col-sm-4 control-label">a. Tanah Bengkok (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kas" name="tanah_bengkok" value="{{ $default['tanah_bengkok'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_titi_sara" class="col-sm-4 control-label">b. Tanah Titi Sara (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kas" name="tanah_titi_sara" value="{{ $default['tanah_titi_sara'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_kebun_desa" class="col-sm-4 control-label">c. Kebun {{ setting('sebutan_desa') }}
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kas" name="tanah_kebun_desa" value="{{ $default['tanah_kebun_desa'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_sawah_desa" class="col-sm-4 control-label">d. Sawah {{ setting('sebutan_desa') }}
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_kas" name="tanah_sawah_desa" value="{{ $default['tanah_sawah_desa'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="luas_tanah_kas" class="col-sm-4 control-label text-primary">Kas {{ setting('sebutan_desa') }} (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="luas_tanah_kas" readonly value="{{ $default['luas_tanah_kas'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lokasi_tanah_desa" class="col-sm-4 control-label">Lokasi Tanah Kas {{ setting('sebutan_desa') }} (Ha) *</label>
                        <div class="col-sm-8">
                            <select class="form-control required" name="lokasi_tanah_desa">
                                @foreach (['Di dalam ' . setting('sebutan_desa'), 'Di luar ' . setting('sebutan_desa'), 'Sebagian di luar ' . setting('sebutan_desa')] as $item)
                                    <option @selected($default['lokasi_tanah_desa'] == $item) value='{{ $item }}'>{{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_lapangan_olahraga" class="col-sm-4 control-label">Lapangan Olahraga (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_lapangan_olahraga" value="{{ $default['tanah_lapangan_olahraga'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_perkantoran" class="col-sm-4 control-label">Perkantoran Pemerintah (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_perkantoran" value="{{ $default['tanah_perkantoran'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_ruang_publik" class="col-sm-4 control-label">Ruang Publik/Taman Kota (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_ruang_publik" value="{{ $default['tanah_ruang_publik'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_pemakaman_umum" class="col-sm-4 control-label">Tempat Pemakaman Umum (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_pemakaman_umum" value="{{ $default['tanah_pemakaman_umum'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_pembuangan_sampah" class="col-sm-4 control-label">Tempat Pembuangan Sampah
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_pembuangan_sampah" value="{{ $default['tanah_pembuangan_sampah'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_sekolah" class="col-sm-4 control-label">Bangunan Sekolah/Perguruan Tinggi
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_sekolah" value="{{ $default['tanah_sekolah'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_pertokoan" class="col-sm-4 control-label">Pertokoan (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_pertokoan" value="{{ $default['tanah_pertokoan'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_pasar" class="col-sm-4 control-label">Fasilitas Pasar (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_pasar" value="{{ $default['tanah_pasar'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_terminal" class="col-sm-4 control-label">Terminal (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_terminal" value="{{ $default['tanah_terminal'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_jalan" class="col-sm-4 control-label">Jalan (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_jalan" value="{{ $default['tanah_jalan'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_pertokoan" class="col-sm-4 control-label">Pertokoan (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_pertokoan" value="{{ $default['tanah_pertokoan'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_tangkapan_air" class="col-sm-4 control-label">Daerah Tangkapan Air (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_tangkapan_air" value="{{ $default['tanah_tangkapan_air'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_perikanan" class="col-sm-4 control-label">Usaha Perikanan (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_perikanan" value="{{ $default['tanah_perikanan'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_sutet" class="col-sm-4 control-label">Sutet/Aliran Listrik Tegangan Tinggi
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_fasilitas_umum" name="tanah_sutet" value="{{ $default['tanah_sutet'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah_fasilitas_umum" class="col-sm-4 control-label text-primary">Luas Tanah
                            Fasilitas Umum (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" name="luas_tanah_fasilitas_umum" data-summary="luas_tanah_entri_data" readonly value="{{ $default['luas_tanah_fasilitas_umum'] ?? 0 }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group subtitle_head">
                        <label for="" class="col-sm-12 control-label">Tanah Hutan</label>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_lindung" class="col-sm-4 control-label">Hutan Lindung (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_produktif" name="tanah_hutan_lindung" value="{{ $default['tanah_hutan_lindung'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_produksi_tetap" class="col-sm-4 control-label">a. Hutan Produksi Tetap
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_produktif" name="tanah_hutan_produksi_tetap" value="{{ $default['tanah_hutan_produksi_tetap'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_produksi_terbatas" class="col-sm-4 control-label">b. Hutan Produksi Terbatas
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_produktif" name="tanah_hutan_produksi_terbatas" value="{{ $default['tanah_hutan_produksi_terbatas'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="luas_tanah_hutan_produktif" class="col-sm-4 control-label text-primary">Hutan Produksi
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="luas_tanah_hutan_produktif" readonly value="{{ $default['luas_tanah_hutan_produktif'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_hutan_konservatif" class="col-sm-4 control-label">Hutan Konservasi (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_konservatif" value="{{ $default['tanah_hutan_konservatif'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_hutan_adat" class="col-sm-4 control-label">Hutan Adat (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_adat" value="{{ $default['tanah_hutan_adat'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_sekunder" class="col-sm-4 control-label">Hutan Sekunder (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_sekunder" value="{{ $default['tanah_hutan_sekunder'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_buatan" class="col-sm-4 control-label">Hutan Buatan (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_buatan" value="{{ $default['tanah_hutan_buatan'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanah_hutan_manggrove" class="col-sm-4 control-label">Hutan Manggrove (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_manggrove" value="{{ $default['tanah_hutan_manggrove'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_suaka_alam" class="col-sm-4 control-label">a. Suaka Alam (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_suaka_alam" value="{{ $default['tanah_hutan_suaka_alam'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_suaka_margasatwa" class="col-sm-4 control-label">b. Suaka Margasatwa
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan_suaka" name="tanah_hutan_suaka_margasatwa" value="{{ $default['tanah_hutan_suaka_margasatwa'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah_hutan_suaka" class="col-sm-4 control-label text-primary">Hutan Suaka
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan" name="luas_tanah_hutan_suaka" readonly value="{{ $default['luas_tanah_hutan_suaka'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanah_hutan_rakyat" class="col-sm-4 control-label">Hutan Rakyat (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_hutan" name="tanah_hutan_rakyat" value="{{ $default['tanah_hutan_rakyat'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah_hutan" class="col-sm-4 control-label text-primary">Luas Tanah Hutan
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" data-summary="luas_tanah_entri_data" name="luas_tanah_hutan" readonly value="{{ $default['luas_tanah_hutan'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ringkasan_entri_data" class="col-sm-4 control-label text-danger"><u>Ringkasan Entri
                                Data</u></label>
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah_desa" class="col-sm-4 control-label">Luas {{ setting('sebutan_desa') }}
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" name="luas_tanah_desa" value="{{ $default['luas_tanah_desa'] ?? 0 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="luas_tanah_entri_data" class="col-sm-4 control-label text-primary">Total Luas Entri Data
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" readonly name="luas_tanah_entri_data" value="{{ $default['luas_tanah_entri_data'] ?? 0 }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="selisih_luas_tanah_entri_data" class="col-sm-4 control-label text-danger">Selisih Luas
                            (Ha)</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  angka-inputmask-decimal" readonly name="selisih_luas_tanah_entri_data" value="{{ $default['selisih_luas_tanah_entri_data'] ?? 0 }}">
                        </div>
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
            $('.angka-inputmask-decimal').inputmask({
                alias: 'decimal',
                groupSeparator: '.',
                radixPoint: ",",
                digits: 2,
                autoGroup: true,
                autoUnmask: true
            })

            $('[data-summary]').change(function() {
                let summary = $(this).data('summary')
                let total = 0.0
                $(`[data-summary=${summary}]`).each(function(item) {
                    total += parseFloat($(this).val().replace('.', '').replace(',', '.'))
                })

                $(`input[name=${summary}]`).val(total.toString().replace('.', ','))
                updateSelisih()
            })

            $('input[name=luas_tanah_desa]').change(function() {
                updateSelisih()
            })

            function updateSelisih() {
                const totalEntri = parseFloat($('input[name=luas_tanah_entri_data]').val().replace('.', '').replace(',', '.'))
                const luasDesa = parseFloat($('input[name=luas_tanah_desa]').val().replace('.', '').replace(',', '.'))
                const selisih = Math.abs(luasDesa - totalEntri)
                $('input[name=selisih_luas_tanah_entri_data]').val(selisih.toString().replace('.', ','))
            }
        });
    </script>
@endpush
