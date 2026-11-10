@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data PAPAN
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.papan') }}">Data PAPAN</a></li>
    <li class="active">Formulir</li>
@endsection

@section('content')
    <div class="row">
        <style>
            .title {
                color: #000
            }
        </style>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.papan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Papan</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $papan->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Nama KRT</td>
                            <td>:</td>
                            <td>{{ $papan->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $papan->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Terakhir diubah</td>
                            <td>:</td>
                            <td>{{ tgl_indo2($papan->updated_at) }}</td>
                        </tr>
                    </table>
                    <hr>
                    @if ($papan->dtks)
                        @if (
                            $papan->kd_stat_bangunan_tinggal == $papan->dtks->kd_stat_bangunan_tinggal &&
                                $papan->luas_lantai == $papan->dtks->luas_lantai &&
                                $papan->kd_jenis_lantai_terluas == $papan->dtks->kd_jenis_lantai_terluas &&
                                $papan->kd_jenis_dinding == $papan->dtks->kd_jenis_dinding &&
                                $papan->kd_jenis_atap == $papan->dtks->kd_jenis_atap &&
                                $papan->kd_sumber_air_minum == $papan->dtks->kd_sumber_air_minum &&
                                $papan->kd_jarak_sumber_air_ke_tpl == $papan->dtks->kd_jarak_sumber_air_ke_tpl &&
                                $papan->kd_pembuangan_akhir_tinja == $papan->dtks->kd_pembuangan_akhir_tinja &&
                                $papan->kd_sumber_penerangan_utama == $papan->dtks->kd_sumber_penerangan_utama &&
                                $papan->kd_daya_terpasang == $papan->dtks->kd_daya_terpasang)
                            <div class="alert alert-success">
                                <i class="fa fa-check"></i> Data PAPAN sudah sinkron dengan data DTKS. Lihat detail di menu
                                <a href="{{ ci_route('dtks.form', $papan->dtks->id) }}" class="btn btn-info btn-sm" target="__blank">DTKS</a>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <i class="fa fa-exclamation-triangle"></i> Data PAPAN berbeda dengan data DTKS untuk kolom
                                berikut:
                                <ul>
                                    @if ($papan->kd_stat_bangunan_tinggal != $papan->dtks->kd_stat_bangunan_tinggal)
                                        <li>Status kepemilikan bangunan
                                            {{ $papan->dtks->kd_stat_bangunan_tinggal ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->luas_lantai != $papan->dtks->luas_lantai)
                                        <li>Luas lantai {{ $papan->dtks->luas_lantai ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_jenis_lantai_terluas != $papan->dtks->kd_jenis_lantai_terluas)
                                        <li>Jenis lantai terluas {{ $papan->dtks->kd_jenis_lantai_terluas ?? 'Kosong' }}
                                        </li>
                                    @endif
                                    @if ($papan->kd_jenis_dinding != $papan->dtks->kd_jenis_dinding)
                                        <li>Jenis dinding {{ $papan->dtks->kd_jenis_dinding ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_jenis_atap != $papan->dtks->kd_jenis_atap)
                                        <li>Jenis atap {{ $papan->dtks->kd_jenis_atap ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_sumber_air_minum != $papan->dtks->kd_sumber_air_minum)
                                        <li>Sumber air bersih {{ $papan->dtks->kd_sumber_air_minum ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_jarak_sumber_air_ke_tpl != $papan->dtks->kd_jarak_sumber_air_ke_tpl)
                                        <li>Jarak sumber air ke TPL
                                            {{ $papan->dtks->kd_jarak_sumber_air_ke_tpl ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_pembuangan_akhir_tinja != $papan->dtks->kd_pembuangan_akhir_tinja)
                                        <li>Pembuangan akhir tinja
                                            {{ $papan->dtks->kd_pembuangan_akhir_tinja ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_sumber_penerangan_utama != $papan->dtks->kd_sumber_penerangan_utama)
                                        <li>Sumber penerangan utama
                                            {{ $papan->dtks->kd_sumber_penerangan_utama ?? 'Kosong' }}</li>
                                    @endif
                                    @if ($papan->kd_daya_terpasang != $papan->dtks->kd_daya_terpasang)
                                        <li>Daya terpasang {{ $papan->dtks->kd_daya_terpasang ?? 'Kosong' }}</li>
                                    @endif
                                </ul>
                                Lihat detail di menu <a href="{{ ci_route('dtks.form', $papan->dtks->id) }}" class="btn btn-info btn-sm" target="__blank">DTKS</a>
                                <br>Silahkan simpan data PAPAN ini untuk mensingkronisasi data pada DTKS
                            </div>
                        @endif
                    @else
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle"></i> Data ini tidak memiliki hubungan dengan DTKS
                        </div>
                    @endif
                    <div>
                        {!! form_open('', 'class="form-validasi" id="form-3"') !!}
                        <input type="hidden" name='tipe_save' value='bagian3'>
                        <div class="row">
                            <hr class="col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jumlah_anggota_keluarga">Jumlah anggota keluarga</label>
                                    <input
                                        maxlength="3"
                                        name="jumlah_anggota_keluarga"
                                        id="jumlah_anggota_keluarga"
                                        readonly
                                        class="form-control input-sm luas"
                                        type="text"
                                        value="{{ $papan->jumlah_anggota }}"
                                    >
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status_kelengkapan">Status Kelengkapan Data</label>
                                    <select class="form-control input-sm select2" name="status_kelengkapan" id="status_kelengkapan">
                                        @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                            <option value="{{ $key }}" {{ ($papan->status_kelengkapan ?? 0) == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="col_3_301a" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_301a">Status kepemilikan lahan bangunan tempat tinggal yang
                                        ditempati</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_301a" is_dtks="true" name="pilihan[3][301a]"',
                                        'pilihan' => $pilihan3['301a'],
                                        'selected_value' => $papan->kd_stat_bangunan_tinggal,
                                    ])
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="luas_lahan_pekarangan">Luas Lahan/Pekarangan (m<sup>2</sup>)</label>
                                    <input name="luas_lahan_pekarangan" id="luas_lahan_pekarangan" class="form-control input-sm luas" type="text" value="{{ $papan->luas_lahan_pekarangan }}">
                                </div>
                            </div>
                            <div id="no_rtm_select" class="col-sm-6" style="@if ($papan->rtm_bersama) display: block; @else display: none; @endif">
                                <div class="form-group">
                                    <label for="pilihan_no_rtm">No RTM / Opsi RTM</label>
                                    <select class="form-control select2" id="rtm_bersama" is_dtks="true" name="rtm_bersama">
                                        <option value="">-- Pilih No RTM --</option>
                                        @foreach ($rtm as $key => $value)
                                            <option value="{{ $value->no_kk }}" {{ $papan->rtm_bersama == $value->no_kk ? 'selected' : '' }}>
                                                {{ $value->no_kk . ' - ' . $value->kepalaKeluarga->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jumlah_kamar_tidur">Jumlah kamar tidur</label>
                                    <input maxlength="3" name="jumlah_kamar_tidur" id="jumlah_kamar_tidur" class="form-control input-sm luas" type="text" value="{{ $papan->jumlah_kamar_tidur }}">
                                </div>
                            </div>

                            <div id="col_3_302" class="col-sm-6">
                                <div class="form-group">
                                    <label for="input_3_302">Luas Lantai (m<sup>2</sup>)</label>
                                    <input is_dtks="true" name="input[3][302]" id="input_3_302" class="form-control input-sm luas" type="text" value="{{ $papan->luas_lantai }}">
                                </div>
                            </div>
                            <div id="col_3_303" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_303">Jenis lantai terluas</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_303" is_dtks="true" name="pilihan[3][303]"',
                                        'pilihan' => $pilihan3['303'],
                                        'selected_value' => $papan->kd_jenis_lantai_terluas,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_304" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_304">Jenis dinding terluas</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_304" is_dtks="true" name="pilihan[3][304]"',
                                        'pilihan' => $pilihan3['304'],
                                        'selected_value' => $papan->kd_jenis_dinding,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_305" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_305">Jenis atap terluas</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_305" is_dtks="true" name="pilihan[3][305]"',
                                        'pilihan' => $pilihan3['305'],
                                        'selected_value' => $papan->kd_jenis_atap,
                                    ])
                                </div>
                            </div>
                            <hr class="col-sm-12">
                            <div id="col_3_306a" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_306a">Sumber air bersih</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_306a" is_dtks="true" name="pilihan[3][306a]"',
                                        'pilihan' => $pilihan3['306a'],
                                        'selected_value' => $papan->kd_sumber_air_minum,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_306b" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_306b">Seberapa jauh jarak sumber air bersih utama ke tempat
                                        penampungan limbah/kotoran/tinja terdekat?</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_306b" is_dtks="true" name="pilihan[3][306b]"',
                                        'pilihan' => $pilihan3['306b'],
                                        'selected_value' => $papan->kd_jarak_sumber_air_ke_tpl,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_310" class="col-sm-6">
                                <div class="form-group">
                                    <label for="pilihan_3_310">Tempat pembuangan akhir tinja:</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_310" is_dtks="true" name="pilihan[3][310]"',
                                        'pilihan' => $pilihan3['310'],
                                        'selected_value' => $papan->kd_pembuangan_akhir_tinja,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_307a" class="col-sm-12">
                                <div class="form-group">
                                    <label for="pilihan_3_307a">Sumber penerangan utama</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_307a" is_dtks="true" name="pilihan[3][307a]"',
                                        'pilihan' => $pilihan3['307a'],
                                        'selected_value' => $papan->kd_sumber_penerangan_utama,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_307b" class="col-sm-12">
                                <label>Isikan kode daya untuk setiap meteran yang terpasang</label>
                            </div>
                            <div id="col_3_307b1" class="col-sm-4">
                                <div class="form-group">
                                    <label for="pilihan_3_307b1">Daya terpasang 1</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_307b1" is_dtks="true" name="pilihan[3][307b1]"',
                                        'pilihan' => $pilihan3['307b1'],
                                        'selected_value' => $papan->kd_daya_terpasang,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_307b2" class="col-sm-4">
                                <div class="form-group">
                                    <label for="pilihan_3_307b2">Daya terpasang 2</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_307b2" is_dtks="true" name="pilihan[3][307b2]"',
                                        'pilihan' => $pilihan3['307b2'],
                                        'selected_value' => $papan->kd_daya_terpasang2,
                                    ])
                                </div>
                            </div>
                            <div id="col_3_307b3" class="col-sm-4">
                                <div class="form-group">
                                    <label for="pilihan_3_307b3">Daya terpasang 3</label>
                                    @include('admin.layouts.components.select_pilihan_dtks', [
                                        'class' => 'select2',
                                        'attribut' => 'id="pilihan_3_307b3" is_dtks="true" name="pilihan[3][307b3]"',
                                        'pilihan' => $pilihan3['307b3'],
                                        'selected_value' => $papan->kd_daya_terpasang3,
                                    ])
                                </div>
                            </div>

                            <hr class="col-sm-12">
                            <div class="col-sm-12 text-center">
                                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class='fa fa-times'></i>Batal</button>
                                <button type="subumit" class="btn btn-social btn-info btn-sm"><i class="fa fa-check"></i>Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function show_when_otherwise_hide(condition, element_ids_to_show, element_ids_to_hide) {
            if (condition) {
                element_ids_to_show.forEach(function(el) {
                    $('#' + el).show();
                    // $('#' + el).find('input, select').each(function(index, el){
                    //     if( ! $(el).hasClass('select2-search__field')){
                    //         $(el).addClass('required');
                    //     }
                    // })
                });
            } else {
                element_ids_to_hide.forEach(function(el) {
                    $('#' + el).hide();
                    // $('#' + el).find('input, select').each(function(index, el){
                    //     if( ! $(el).hasClass('select2-search__field')){
                    //         $(el).removeClass('required');
                    //     }
                    // })
                });
            }
        };
        $(document).ready(function() {
            if ($('#pilihan_3_301a').val() !== '6') {
                $('#no_rtm_select').hide();
            }

            let default_hide = ['col_3_301b', 'col_3_306b', 'col_3_307b', 'col_3_307b1', 'col_3_307b2',
                'col_3_307b3'
            ];
            default_hide.forEach(id => {
                $('#' + id).hide();
            });
            show_when_otherwise_hide(['1'].indexOf($('#pilihan_3_301a').val()) > -1, ['col_3_301b'], [
                'col_3_301b'
            ]);
            show_when_otherwise_hide(['4', '5', '6', '7', '8'].indexOf($('#pilihan_3_306a').val()) > -1, [
                'col_3_306b'
            ], ['col_3_306b']);
            show_when_otherwise_hide(['1'].indexOf($('#pilihan_3_307a').val()) > -1, ['col_3_307b', 'col_3_307b1',
                'col_3_307b2', 'col_3_307b3'
            ], ['col_3_307b', 'col_3_307b1', 'col_3_307b2', 'col_3_307b3']);
            show_when_otherwise_hide(['1', '2', '3'].indexOf($('#pilihan_3_309a').val()) > -1, ['col_3_309b'], [
                'col_3_309b'
            ]);

            $('#form-3 button[type=reset]').on('click', function(ev) {
                setTimeout(() => {
                    $('#form-3 select').trigger('change');
                }, 200);
            });
            $('#pilihan_3_301a').on('change', function(ev) {
                var pilihanVal = $('#pilihan_3_301a').val();
                if (pilihanVal === '6') {
                    $('#no_rtm_select').show();
                } else {
                    var rtm_bersama = `{{ $papan->rtm_bersama }}`;
                    // jika ada maka kembalikan input rtm_bersama ke awal
                    $('#rtm_bersama').val(rtm_bersama);
                    $('#no_rtm_select').hide();
                }

                show_when_otherwise_hide(['1'].indexOf($('#pilihan_3_301a').val()) > -1, ['col_3_301b'], [
                    'col_3_301b', 'col_3_301c'
                ]);
            });
            $('#pilihan_3_306a').on('change', function(ev) {
                show_when_otherwise_hide(['4', '5', '6', '7', '8'].indexOf($('#pilihan_3_306a').val()) > -1,
                    ['col_3_306b'], ['col_3_306b']);
            });
            $('#pilihan_3_307a').on('change', function(ev) {
                show_when_otherwise_hide(['1'].indexOf($('#pilihan_3_307a').val()) > -1, ['col_3_307b',
                    'col_3_307b1', 'col_3_307b2', 'col_3_307b3'
                ], ['col_3_307b', 'col_3_307b1', 'col_3_307b2', 'col_3_307b3']);
            });
            $('#pilihan_3_309a').on('change', function(ev) {
                show_when_otherwise_hide(['1', '2', '3'].indexOf($('#pilihan_3_309a').val()) > -1, [
                    'col_3_309b'
                ], ['col_3_309b']);
            });

            $('#form-3').on('submit', function(ev) {
                ev.preventDefault();
                let is_valid = is_form_valid($(this).attr('id'));
                if (!is_valid) {
                    return false;
                }

                let form = $('#form-3').serializeArray();
                $('#form-3 select').each(function(index, el) {
                    form.push({
                        'name': $(el).attr('name'),
                        'value': $(el).val()
                    });
                });

                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.papan.update', $papan->uuid) }}",
                    data: form,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Terjadi kesalahan saat menyimpan data',
                        });
                    }
                });
            });
        });

        // $(document).ready(function() {
        //     $.each($(".tab-content .tab-pane"), function(index, val) {
        //         var id = $(val).attr('id');
        //         $(`#nav-${id}`).on('click', function() {
        //             $('#judul-bagian').text($(`#nav-${id} strong`).text());
        //         });
        //         if (index == 0) {
        //             $(`#nav-${id}`).trigger("click");
        //         }
        //     });
        // });
    </script>
@endpush
