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
    <li>Kedaulatan Politik Masyarakat</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.' . $pathRoute) }}">Partisipasi Politik</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('prodeskel.' . $pathRoute) }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Partisipasi Politik</a>
        </div>
        {!! form_open_multipart($form_action, 'class="form-horizontal" id="validasi"') !!}
        <div class="box-body">

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Partai Politik dan Pemilihan Umum</label>
            </div>
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
                <label for="7a2891c06625f" class="col-sm-4 control-label">Jumlah penduduk yang memiliki hak pilih</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="7a2891c06625f" value="{{ $default['7a2891c06625f'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="3b98d28869cf6" class="col-sm-4 control-label">Jumlah penduduk yang menggunakan hak pilih pada
                    pemilu legislatif yang lalu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="3b98d28869cf6" value="{{ $default['3b98d28869cf6'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="f2a591e760a34" class="col-sm-4 control-label">Jumlah perempuan dari penduduk desa/kelurahan ini
                    yang aktif di partai politik</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="f2a591e760a34" value="{{ $default['f2a591e760a34'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="a4e5b5d17c902" class="col-sm-4 control-label">Jumlah partai politik yang memiliki pengurus
                    sampai di Desa/Kelurahan ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="a4e5b5d17c902" value="{{ $default['a4e5b5d17c902'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="6d91c7f48b530" class="col-sm-4 control-label">Jumlah partai politik yang mempunyai kantor di
                    wilayah desa/kelurahan ini</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="6d91c7f48b530" value="{{ $default['6d91c7f48b530'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="8e2f0a1d45b9d" class="col-sm-4 control-label">Jumlah penduduk yang menjadi pengurus partai
                    politik dari desa/kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="8e2f0a1d45b9d" value="{{ $default['8e2f0a1d45b9d'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="c7132b950e461" class="col-sm-4 control-label">Jumlah penduduk yang dipilih dalam Pemilu
                    Legislatif yang lalu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="c7132b950e461" value="{{ $default['c7132b950e461'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group">
                <label for="5f041d36a8e7b" class="col-sm-4 control-label">Jumlah pemilih yang menggunakan hak pilih dalam
                    pemilihan presiden/wakil</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5f041d36a8e7b" value="{{ $default['5f041d36a8e7b'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pemilihan Kepala Daerah</label>
            </div>
            <div class="form-group">
                <label for="5f041d36a8e7b" class="col-sm-4 control-label">Jumlah penduduk yang mempunyai hak pilih</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="3d35097eeba8d" value="{{ $default['3d35097eeba8d'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="5f041d36a8e7b" class="col-sm-4 control-label">Jumlah pemilih yang menggunakan hak pilih dalam
                    pemilu Bupati/Walikota lalu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5f041d36a8e7a" value="{{ $default['5f041d36a8e7a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="5f041d36a8e7b" class="col-sm-4 control-label">Jumlah pemilih yang menggunakan hak pilih dalam
                    pemilu Gubenur yang lalu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="5f041d36a8e7c" value="{{ $default['5f041d36a8e7c'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Penentuan Kepala Desa/Kelurahan dan Perangkat
                    Desa/Kelurahan</label>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Penentuan Jabatan Kepala Desa</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PenentuanJabatanKepalaDesaEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4d7" class="required" @checked($default['1008ff221d4d7'] !== null && $default['1008ff221d4d7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Penentuan Sekretaris Desa</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PenentuanSektretarisDesaEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4a7" class="required" @checked($default['1008ff221d4a7'] !== null && $default['1008ff221d4a7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Penentuan Perangkat Desa termasuk Kepala
                    Dusun</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PenentuanPerangkatDesaEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4b7" class="required" @checked($default['1008ff221d4b7'] !== null && $default['1008ff221d4b7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="1008ff221d4c7" class="col-sm-4 control-label">Masa jabatan Kepala Desa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1008ff221d4c7" value="{{ $default['1008ff221d4c7'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Penentuan Jabatan Lurah dan Perangkat Kelurahan
                    termasuk Kepala Lingkungan</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PenentuanJabatanLurahEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4e7" class="required" @checked($default['1008ff221d4e7'] !== null && $default['1008ff221d4e7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pemilihan BPD</label>
            </div>
            <div class="form-group">
                <label for="1008ff221d4f7" class="col-sm-4 control-label">Jumlah anggota BPD</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1008ff221d4f7" value="{{ $default['1008ff221d4f7'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Penentuan anggota BPD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PenentuanAnggotaBPDEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4g7" class="required" @checked($default['1008ff221d4g7'] !== null && $default['1008ff221d4g7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pimpinan BPD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PimpinanBPDEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4h7" class="required" @checked($default['1008ff221d4h7'] !== null && $default['1008ff221d4h7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pemilikan kantor/ruang kerja BPD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <input type="radio" name="1008ff221d4i7" class="required" @checked($default['1008ff221d4i7'] !== null && $default['1008ff221d4i7'] == $key) value="{{ $key }}"> {{ $item }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Anggaran untuk BPD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <input type="radio" name="1008ff221d4j7" class="required" @checked($default['1008ff221d4j7'] !== null && $default['1008ff221d4j7'] == $key) value="{{ $key }}"> {{ $item }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="peraturan_desa" class="col-sm-4 control-label">Peraturan Desa (Perdes)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="b02797f4" value="{{ $default['b02797f4'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="permintaan_keterangan" class="col-sm-4 control-label">Permintaan keterangan dari Kepala Desa
                    (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="aebd4c02" value="{{ $default['aebd4c02'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="rancangan_peraturan_desa" class="col-sm-4 control-label">Rancangan Peraturan Desa (Buah)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="76cf9d8a" value="{{ $default['76cf9d8a'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="menyalurkan_aspirasi" class="col-sm-4 control-label">Menyalurkan aspirasi masyarakat
                    (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="c36f4d05" value="{{ $default['c36f4d05'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="menyatakan_pendapat" class="col-sm-4 control-label">Menyatakan pendapat kepada Kepala Desa
                    (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="da9e6fb2" value="{{ $default['da9e6fb2'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="menyampaikan_usul" class="col-sm-4 control-label">Menyampaikan usul dan pendapat kepada Kepala
                    Desa (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="852cb1d3" value="{{ $default['852cb1d3'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="mengevaluasi_efektivitas" class="col-sm-4 control-label">Mengevaluasi efektivitas pelaksanaan
                    APB Desa (Kali)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="fceae1b9" value="{{ $default['fceae1b9'] ?? 0 }}">
                </div>
            </div>

            <div class="form-group subtitle_head">
                <label for="" class="col-sm-12 control-label">Pemilihan dan Fungsi Lembaga Kemasyarakatan</label>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Keberadaan organisasi lembaga kemasyarakatan
                    desa/kelurahan</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\AdaEnum::all() as $key => $item)
                            <input type="radio" name="1008ff222d4k7" class="required" @checked($default['1008ff222d4k7'] !== null && $default['1008ff222d4k7'] == $key) value="{{ $key }}"> {{ $item }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Dasar hukum keberadaan Lembaga Kemasyarakatan
                    Desa/LKD</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\DasarHukumKeberadaanLembagaEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff021d4l7" class="required" @checked($default['1008ff021d4l7'] !== null && $default['1008ff021d4l7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="mengevaluasi_efektivitas" class="col-sm-4 control-label">Jumlah organisasi anggota lembaga
                    kemasyarakatan desa termasuk RT, RW, PKK, LKMD/K, LPM, Karang Taruna, Bumdes,Lembaga Adat, Kelompok Tani
                    dan lembaga lainnya sesuai ketentuan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1008ff221d47" value="{{ $default['1008ff221d47'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Dasar hukum pembentukan Lembaga Kemasyarakatan
                    Kelurahan/LKK</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\DasarHukumPembentukanLembagaEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff211d4j7" class="required" @checked($default['1008ff211d4j7'] !== null && $default['1008ff211d4j7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="mengevaluasi_efektivitas" class="col-sm-4 control-label">Jumlah organisasi anggota lembaga
                    kemasyarakatan kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control angka-inputmask" name="1008ff221d4k7" value="{{ $default['1008ff221d4k7'] ?? 0 }}">
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pemilihan pengurus LKD/LKK</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PemilihanPengurusEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4l7" class="required" @checked($default['1008ff221d4l7'] !== null && $default['1008ff221d4l7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="gedung_kantor" class="col-sm-4 control-label">Pemilihan pengurus organisasi anggota LKD/LKK
                    termasuk PKK, LPM/LKMD/K, Karang Taruna, RT, RW, Bumdes, lembaga adat, kelompok tani dan organisasi
                    anggota LKD/LKK lainnya</label>
                <div class="col-sm-8">
                    <div>
                        @foreach (Modules\Prodeskel\Enums\PemilihanPengurusOrganisasiEnum::all() as $key => $item)
                            <div class="radio">
                                <label><input type="radio" name="1008ff221d4m7" class="required" @checked($default['1008ff221d4m7'] !== null && $default['1008ff221d4m7'] == $key) value="{{ $key }}"> {{ $item }}</label>
                            </div>
                        @endforeach
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
            $('input[name=7a2891c06625f], input[name=3b98d28869cf6], input[name=f2a591e760a34], input[name=a4e5b5d17c902], input[name=6d91c7f48b530], input[name=8e2f0a1d45b9d], input[name=c7132b950e461], input[name=5f041d36a8e7b], input[name=1008ff221d4f7]').inputmask(integerObj);
            // Gunakan decimalObj untuk field nilai/harga/luas
            $('input[name=3d35097eeba8d], input[name=5f041d36a8e7a], input[name=5f041d36a8e7c], input[name=1008ff221d4c7], input[name=b02797f4], input[name=aebd4c02], input[name=76cf9d8a], input[name=c36f4d05], input[name=da9e6fb2], input[name=852cb1d3], input[name=fceae1b9], input[name=1008ff221d47], input[name=1008ff221d4k7]').inputmask(decimalObj);

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
