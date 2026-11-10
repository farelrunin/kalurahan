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
        <small>Badan Perwakilan Desa</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li>Potensi Kelembagaan</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.badanPerwakilanDesa') }}">Badan Perwakilan Desa</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.badanPerwakilanDesa') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Badan Perwakilan Desa</a>
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
                <label for="" class="col-sm-12 control-label">Gedung Kantor</label>
            </div>

            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-3 control-label">Gedung Kantor</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="gedung_kantor" class="required" @checked($default['gedung_kantor'] !== null && $default['gedung_kantor'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="ruangan_kerja" class="col-sm-3 control-label">Ruangan Kerja</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="ruangan_kerja" value="{{ $default['ruangan_kerja'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Kondisi</label>
            </div>

            <div class="form-group">
                <label for="balai_bpd" class="col-sm-3 control-label">Balai BPD</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="balai_bpd" class="required" @checked($default['balai_bpd'] !== null && $default['balai_bpd'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="kondisi" class="col-sm-3 control-label">Kondisi</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\KondisiEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="kondisi" class="required" @checked($default['kondisi'] !== null && $default['kondisi'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="listrik" class="col-sm-3 control-label">Listrik</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="listrik" class="required" @checked($default['listrik'] !== null && $default['listrik'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="air_bersih" class="col-sm-3 control-label">Air Bersih</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AirBersihEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="air_bersih" class="required" @checked($default['air_bersih'] !== null && $default['air_bersih'] == $key) value="{{ $key }}">
                                {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="telepon" class="col-sm-3 control-label">Telepon</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="telepon" class="required" @checked($default['telepon'] !== null && $default['telepon'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Inventaris dan Alat Tulis Kantor</label>
            </div>

            <div class="form-group">
                <label for="mesin_tik" class="col-sm-3 control-label">Mesin Tik (Buah)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="mesin_tik" value="{{ $default['mesin_tik'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="meja" class="col-sm-3 control-label">Meja (Buah)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="meja" value="{{ $default['meja'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="kursi" class="col-sm-3 control-label">Kursi (Buah)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="kursi" value="{{ $default['kursi'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="lemari_arsip" class="col-sm-3 control-label">Lemari Arsip (Buah)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="lemari_arsip" value="{{ $default['lemari_arsip'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="komputer" class="col-sm-3 control-label">Komputer (Unit)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="komputer" value="{{ $default['komputer'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="mesin_fax" class="col-sm-3 control-label">Mesin Fax (Unit)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="mesin_fax" value="{{ $default['mesin_fax'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="inventaris_lainnya" class="col-sm-3 control-label">Lainnya</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="inventaris_lainnya" class="required" @checked($default['inventaris_lainnya'] !== null && $default['inventaris_lainnya'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Administrasi BPD</label>
            </div>

            <div class="form-group">
                <label for="buku_administrasi_bpd" class="col-sm-3 control-label">Buku Administrasi Kegiatan BPD</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  angka-inputmask" name="buku_administrasi_bpd" value="{{ $default['buku_administrasi_bpd'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="buku_anggota" class="col-sm-3 control-label">Buku-Buku Administrasi Keanggotaan</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="buku_anggota" class="required" @checked($default['buku_anggota'] !== null && $default['buku_anggota'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="buku_kegiatan" class="col-sm-3 control-label">Buku Kegiatan BPD</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="buku_kegiatan" class="required" @checked($default['buku_kegiatan'] !== null && $default['buku_kegiatan'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="buku_perdes" class="col-sm-3 control-label">Buku Himpunan Peraturan Desa</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="buku_perdes" class="required" @checked($default['buku_perdes'] !== null && $default['buku_perdes'] == $key) value="{{ $key }}"> {{ $item }}</label>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="buku_lainnya" class="col-sm-3 control-label">Lainnya</label>
                <div class="col-sm-9">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <label class="radio-inline"><input type="radio" name="buku_lainnya" class="required" @checked($default['buku_lainnya'] !== null && $default['buku_lainnya'] == $key) value="{{ $key }}"> {{ $item }}</label>
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
            $('input[name=mesin_tik], input[name=meja], input[name=kursi], input[name=lemari_arsip], input[name=komputer], input[name=mesin_fax], input[name=buku_administrasi_bpd]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=ruangan_kerja]').inputmask(decimalObj);
        });
    </script>
@endpush
