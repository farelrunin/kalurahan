@php
    use Modules\Prodeskel\Enums\DDKEnum;
    use Modules\Prodeskel\Enums\DDKPilihanProduksiTahunIniEnum;
    use Modules\Prodeskel\Services\ProdeskelDDKPilihanServices;
    use Modules\Prodeskel\Enums\DDKPilihanCheckboxEnum;
@endphp

<div class="row">
    <div class="col-md-6">
        <table width="100%">
            <tr>
                <td>Nomor Kartu Keluarga</td>
                <td>:</td>
                <td>{{ $keluarga->no_kk }}</td>
            </tr>
            <tr>
                <td>Nama Kepala Keluarga</td>
                <td>:</td>
                <td>{{ $keluarga->kepalaKeluarga->nama }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $keluarga->kepalaKeluarga->alamat_wilayah }}</td>
            </tr>
            <tr>
                <td>RT / RW</td>
                <td>:</td>
                <td>{{ $keluarga->wilayah->rt . '/' . $keluarga->wilayah->rw }}</td>
            </tr>
            <tr>
                <td>Dusun / Lingkungan</td>
                <td>:</td>
                <td>{{ $keluarga->wilayah->dusun }}</td>
            </tr>
            <tr>
                <td>Desa / Kelurahan</td>
                <td>:</td>
                <td>{{ $config->nama_desa }}</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>{{ $config->nama_kecamatan }}</td>
            </tr>
            <tr>
                <td>Kabupaten / Kota</td>
                <td>:</td>
                <td>{{ $config->nama_kabupaten }}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td>{{ $config->nama_propinsi }}</td>
            </tr>
        </table>
    </div>
    {{-- form samping --}}
    <div class="col-md-6">
        <hr>
        <table width="100%">
            <tr>
                <td width="20%">Bulan</td>
                <td width="1%">:</td>
                <td>
                    @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                        'class' => 'select2',
                        'attribut' => 'name="bulan"',
                        'pilihan' => $bulan,
                        'selected_value' => $ddk->bulan ?? '',
                    ])
                </td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td>
                    @include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                        'class' => 'select2',
                        'attribut' => 'name="tahun"',
                        'pilihan' => $tahun,
                        'selected_value' => $ddk->tahun ?? '',
                    ])
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="button" id="btn_kosongkan_periode" class="btn btn-sm btn-info">Kosongkan
                        Periode</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <hr>
        <table width="100%">
            <tr>
                <td width="20%">Nama Pengisi</td>
                <td width="1%">:</td>
                <td>
                    <input name="nama_pengisi" maxlength="100" class="form-control input-sm nama" type="text" value="{{ $ddk->nama_pengisi ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>
                    <input name="pekerjaan" maxlength="100" class="form-control input-sm nama" type="text" value="{{ $ddk->pekerjaan ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>
                    <input name="jabatan" maxlength="100" class="form-control input-sm nama" type="text" value="{{ $ddk->jabatan ?? '' }}">
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-12">
        <h5>Sumber Data Untuk Mengisi Data Dasar Keluarga</h5>
        <table width="100%">
            @for ($i = 1; $i <= 4; $i++)
                <tr>
                    <td width="20%">
                        Sumber {{ $i }}
                        @if ($i == 1 && ($ddk->{'sumber_data_' . $i} ?? null) == null)
                            <button type="button" onclick="$('#sumber_data_{{ $i }}').val('Aplikasi OpenSID {{ $sebutan_desa . ' ' . $config->nama_desa }}')" class="btn-sm btn btn-info">
                                <i class="fa fa-check"></i> Terapkan Tulisan Placeholder
                            </button>
                        @endif
                    </td>
                    <td width="1%">:</td>
                    <td>
                        <input
                            id="sumber_data_{{ $i }}"
                            name="sumber_data_{{ $i }}"
                            maxlength="100"
                            class="form-control input-sm alamat"
                            type="text"
                            placeholder="{{ $i == 1 && ($ddk->{'sumber_data_' . $i} ?? null) == null
                                ? " Aplikasi OpenSID
                                                                                                                                                                                                $sebutan_desa {$config->nama_desa}"
                                : '' }}"
                            value="{{ $ddk->{'sumber_data_' . $i} ?? '' }}"
                        >
                    </td>
                </tr>
            @endfor
        </table>

    </div>
    <br>
    <!-- jadikan tab -->
    <div class="box-body" style="padding-left:30px; padding-right:30px;">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#penghasilan-keluarga" data-toggle="tab" id="nav-penghasilan-keluarga"><strong>Penghasilan (1.1 - 1.3)</strong></a></li>
                <li><a href="#sumber-air" data-toggle="tab" id="nav-sumber-air"><strong>Sumber Air Minum
                            (1.4)</strong></a></li>
                <li><a href="#kepemilikan-lahan" data-toggle="tab" id="nav-kepemilikan-lahan"><strong>Kepemilikan
                            Lahan</strong></a></li>
                <li><a href="#tanaman-pangan" data-toggle="tab" id="nav-tanaman-pangan"><strong>Prod Tanaman
                            Pangan</strong></a></li>
                <li><a href="#jenis-ternak" data-toggle="tab" id="nav-jenis-ternak"><strong>Jenis Ternak</strong></a>
                </li>
                <li><a href="#produksi-perikanan" data-toggle="tab" id="nav-produksi-perikanan"><strong>Alat Prd.
                            Perikanan (1.8)</strong></a></li>
                <li><a href="#fasilitas-umum" data-toggle="tab" id="nav-fasilitas-umum"><strong>Fasilitas
                            Umum</strong></a></li>
                <li><a href="#perumahan" data-toggle="tab" id="nav-perumahan"><strong>Perumahan</strong></a></li>
                <li><a href="#kesehatan" data-toggle="tab" id="nav-kesehatan"><strong>Kesehatan</strong></a></li>
                <li><a href="#kejahatan" data-toggle="tab" id="nav-kejahatan"><strong>Kejahatan</strong></a></li>
            </ul>
        </div>
        <div class="tab-content">
            @include('prodeskel::ddk.partials.penghasilan')
            @include('prodeskel::ddk.partials.sumber_air')
            @include('prodeskel::ddk.partials.kepemilikan_lahan')
            @include('prodeskel::ddk.partials.tanaman_pangan')
            @include('prodeskel::ddk.partials.jenis_ternak')
            @include('prodeskel::ddk.partials.produksi_perikanan')
            @include('prodeskel::ddk.partials.fasilitas_umum')
            @include('prodeskel::ddk.partials.perumahan')
            @include('prodeskel::ddk.partials.kesehatan')
            @include('prodeskel::ddk.partials.kejahatan')
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            let $kode_tersimpan = [];
            let $jml_ternak = '{{ DDKEnum::KODE_KEPEMILIKAN_JENIS_TERNAK_KELUARGA_TAHUN_INI }}';
            let $jml_alat_produksi_ikan = '{{ DDKEnum::KODE_ALAT_PRODUKSI_BUDIDAYA_IKAN }}';
            let $jml_kualitas_pp = '{{ DDKEnum::KODE_KUALITAS_PERTOLONGAN_PERSALINAN }}';

            ['sumber_air_minum', 'kepemilikan_lahan', 'produksi_tahun_ini', $jml_ternak, $jml_alat_produksi_ikan, $jml_kualitas_pp].forEach(kategori => {
                if ($('#table_' + kategori + ' tr').length == 1) {
                    $('#table_' + kategori + '').hide();
                } else {
                    $('#table_' + kategori).prev().html('<div class="alert alert-warning" style="margin: 0 auto;padding: 0px;text-align-last: center;user-select: none;">Kosongkan pilihan dan isian jika baris data tidak ingin disimpan/ingin dihapus</div>');
                    $('#table_' + kategori + ' tr').each(function(index, item) {
                        if (kategori == 'produksi_tahun_ini') {
                            $kode_tersimpan.push($(item).find('td').eq(0).text());
                        } else {
                            $kode_tersimpan.push(kategori + '_' + $(item).find('td').eq(0).text());
                        }
                        // ulangi header(tr pertama) per 10 baris
                        if (index % 10 == 0 && index != 0) {
                            $('#table_' + kategori + ' tr').eq(0).clone().insertAfter(item);
                        }
                    });
                }
            });
            $('#tambahkan_sumber_air_minum, #tambahkan_kepemilikan_lahan, #tambahkan_produksi_tahun_ini, #tambahkan_' + $jml_ternak + ', #tambahkan_' + $jml_alat_produksi_ikan + ', #tambahkan_' + $jml_kualitas_pp).on('click', function(ev) {
                let kategori = ev.currentTarget.id.replace('tambahkan_', '');
                let template_select = '';
                let template_input_jumlah = '';
                let pengaturan_produksi = '';
                if (kategori == 'sumber_air_minum') {
                    template_select = `@include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                        'class' => 'select2 {kode}',
                        'attribut' => 'name="' . DDKEnum::KODE_SUMBER_AIR_MINUM . '[{kode}]"',
                        'pilihan' => DDKEnum::valuesOf(DDKEnum::KODE_SUMBER_AIR_MINUM_CHECKBOX),
                    ])`;
                } else if (kategori == 'kepemilikan_lahan') {
                    template_select = `@include('prodeskel::ddk.components.select_pilihan_prodeskel', [
                        'class' => 'select2 {kode}',
                        'attribut' => 'name="' . DDKEnum::KODE_KEPEMILIKAN_LAHAN . '[{kode}]"',
                        'pilihan' => DDKEnum::valuesOf(DDKEnum::KODE_KEPEMILIKAN_LAHAN_CHECKBOX),
                    ])`;
                } else if (kategori == 'produksi_tahun_ini') {
                    pengaturan_produksi = {!! json_encode(DDKPilihanProduksiTahunIniEnum::PENGATURAN) !!};
                } else if ([$jml_ternak, $jml_alat_produksi_ikan, $jml_kualitas_pp].indexOf(kategori) !== -1) {
                    template_input_jumlah = '<input name="' + kategori + '[{kode}]" maxlength="5" class="form-control input-sm bilangan" type="text">';
                } else {
                    Swal.fire({
                        icon: 'error',
                        html: 'Event tidak ditemukan, Silahkan hubungi developer',
                        timer: 1000,
                    });
                    return;
                }

                function tambahkan_pilihan_ke_tabel(kategori, pilihan, pilihan_text, judul_notif_khusus, template_select, template_input_jumlah, pengaturan_produksi) {
                    if ($kode_tersimpan.indexOf(kategori + '_' + pilihan) != -1) {
                        $(document).find('#' + pilihan).focus();
                        return;
                    }
                    $kode_tersimpan.push(kategori + '_' + pilihan);
                    $('#table_' + kategori).show();
                    $('#table_' + kategori).prev().html('<div class="alert alert-warning" style="margin: 0 auto;padding: 0px;text-align-last: center;user-select: none;">Kosongkan pilihan dan isian jika baris data tidak ingin disimpan/ingin dihapus</div>');

                    if (kategori == 'produksi_tahun_ini') {
                        let satuan_produksi = $('#pilihan_' + kategori + ' option[value="' + pilihan + '"]').data('satuan'),
                            kategori_produksi = $('#pilihan_' + kategori + ' option[value="' + pilihan + '"]').data('kategori');
                        jumlah_pohon = '',
                            luas_panen = '',
                            nilai_produksi_per_satuan = '<input name="produksi_tahun_ini[' + pilihan + '][nilai_produksi_per_satuan]" maxlength="20" class="form-control input-sm bilangan_titik" type="text">',
                            pemasaran_hasil = '<input name="produksi_tahun_ini[' + pilihan + '][pemasaran_hasil]" maxlength="150" class="form-control input-sm alamat" type="text">';

                        if (pengaturan_produksi[kategori_produksi]['jumlah_pohon']) {
                            jumlah_pohon = '<input name="produksi_tahun_ini[' + pilihan + '][jumlah_pohon]" maxlength="11" class="form-control input-sm bilangan_titik" type="text">';
                        }
                        if (pengaturan_produksi[kategori_produksi]['luas_panen']) {
                            luas_panen = '<input name="produksi_tahun_ini[' + pilihan + '][luas_panen]" maxlength="20" class="form-control input-sm bilangan_titik" type="text">';
                        }
                        $('#table_' + kategori).append(
                            '<tr>' +
                            '<td>' + pilihan + '</td>' +
                            '<td>' + pilihan_text + '</td>' +
                            '<td>' + jumlah_pohon + '</td>' +
                            '<td>' + luas_panen + '</td>' +
                            '<td>' + nilai_produksi_per_satuan + '</td>' +
                            '<td>' + satuan_produksi + '</td>' +
                            '<td>' + pemasaran_hasil + '</td>' +
                            '</tr>'
                        );
                    } else if ([$jml_ternak, $jml_alat_produksi_ikan, $jml_kualitas_pp].indexOf(kategori) !== -1) {
                        $('#table_' + kategori).append(
                            '<tr>' +
                            '<td>' + pilihan.replace(kategori + '_', '') + '</td>' +
                            '<td>' + pilihan_text + '</td>' +
                            '<td>' + template_input_jumlah.replaceAll('{kode}', pilihan) + '</td>' +
                            '</tr>'
                        );
                    } else {
                        $('#table_' + kategori).append(
                            '<tr>' +
                            '<td>' + pilihan.replace(kategori + '_', '') + '</td>' +
                            '<td>' + pilihan_text + '</td>' +
                            '<td>' + template_select.replaceAll('{kode}', pilihan) + '</td>' +
                            '</tr>'
                        );
                        $(document).find('.' + pilihan).select2({
                            width: '100%',
                            dropdownAutoWidth: true
                        });
                    }

                    setTimeout(() => {
                        $('#pilihan_' + kategori).val(['']).trigger('change');
                    }, 500);
                }

                let judul_notif_khusus = $(document).find('#table_' + kategori).find('tr').eq(0).find('th').eq(1).text();
                let pilihan = $('#pilihan_' + kategori).val();
                if ((typeof pilihan == 'object' || typeof pilihan == 'array') && pilihan.length == 0 || pilihan == '') {
                    Swal.fire({
                        icon: 'info',
                        html: 'Silahkan pilih ' + judul_notif_khusus,
                        timer: 1000,
                    });
                    return;
                }
                if (typeof pilihan == 'object' || typeof pilihan == 'array') {
                    // Loop through the array and set the selected value of the select element
                    $.each(pilihan, function(index, value_pilihan) {
                        let pilihan_text = $('#pilihan_' + kategori + ' option[value="' + value_pilihan + '"]').text();
                        tambahkan_pilihan_ke_tabel(kategori, value_pilihan, pilihan_text, judul_notif_khusus, template_select, template_input_jumlah, pengaturan_produksi);
                    });
                } else {
                    let pilihan_text = $('#pilihan_' + kategori + ' option:selected').text();
                    tambahkan_pilihan_ke_tabel(kategori, pilihan, pilihan_text, judul_notif_khusus, template_select, template_input_jumlah, pengaturan_produksi);
                }
            });
            $('#btn_kosongkan_periode').on('click', function() {
                $('select[name="bulan"]', document).val('').trigger('change');
                $('select[name="tahun"]', document).val('').trigger('change');
            });
        })
    </script>
@endpush
