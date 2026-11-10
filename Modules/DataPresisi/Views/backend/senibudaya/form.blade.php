@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Formulir Data Seni Budaya
    </h1>
@endsection

@section('breadcrumb')
    <li>Data Presisi</li>
    <li><a href="{{ ci_route('data_presisi.seni_budaya') }}">Data Seni Budaya</a></li>
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
                    <a href="{{ ci_route('data_presisi.seni_budaya') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Data Seni Budaya</a>
                </div>

                <div class="box-body tab-content" style="padding-left:30px; padding-right:30px">
                    <table>
                        <tr>
                            <td>No Kartu Rumah Tangga(KRT)</td>
                            <td>:</td>
                            <td>{{ $seni_budaya->rtm->no_kk }}</td>
                        </tr>
                        <tr>
                            <td>Kepala Rumah Tangga</td>
                            <td>:</td>
                            <td>{{ $seni_budaya->kepala_rumah_tangga->nama }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $seni_budaya->alamat }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah KK</td>
                            <td>:</td>
                            <td> {{ $seni_budaya->rtm->jumlah_kk }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Anggota</td>
                            <td>:</td>
                            <td>{{ count($seni_budaya->rtm->anggota) }}</td>
                        </tr>
                        <tr>
                            <td>Status Kelengkapan</td>
                            <td>:</td>
                            <td>
                                <select class="form-control input-sm select2" name="status_kelengkapan" id="status_kelengkapan" style="width:100%;">
                                    @foreach (\Modules\DataPresisi\Enums\StatusKelengkapanEnum::all() as $key => $value)
                                        <option value="{{ $key }}" @selected($seni_budaya->status_kelengkapan == $key)>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="box-body">
                    <h5><b>Daftar Anggota</b></h5>
                    {!! form_open('', 'class="form-validasi" id="form-1"') !!}
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable table-striped table-hover tabel-daftar">
                            <thead class="bg-gray disabled color-palette">
                                <tr>

                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NOMOR KK</th>
                                    <th>NAMA</th>
                                    <th>JENIS SENI YANG DI KUASAI</th>
                                    <th>JUMLAH PENGHASILAN DARI SENI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($anggota) > 0)
                                    @foreach ($anggota as $key => $data)
                                        <tr>
                                            <td class="padat">{{ $loop->iteration }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->no_kk }}</td>
                                            <td nowrap>{{ strtoupper($data->nama) }}</td>
                                            <td>
                                                <input type="hidden" name="nik[]" value="{{ $data->nik }}">
                                                <input type="hidden" name="rtm_id[]" value="{{ $data->rtm_id }}">
                                                <input type="hidden" name="keluarga_id[]" value="{{ $data->keluarga_id }}">
                                                <input type="hidden" name="anggota_id[]" value="{{ $data->anggota_id }}">
                                                <div class="form-inline">
                                                    <div class="form-group" style="width: 48%; display: inline-block;">
                                                        <select class="form-control input-sm select2 jenis-seni" name="jenis_seni_yang_dikuasai[]" data-index="{{ $loop->index }}" style="width: 100%;">
                                                            <option value="">-- Pilih--</option>
                                                            @foreach ($jenis_seni_yang_dikuasai as $key => $value)
                                                                <option value="{{ $key }}" data-nilai="{{ $value }}" @selected($data->jenis_seni_yang_dikuasai == $key)>{{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group" style="width: 48%; display: inline-block; margin-left: 2%;">
                                                        <select class="form-control input-sm select2 sub-jenis-seni" name="sub_jenis_seni_yang_dikuasai[]" data-index="{{ $loop->index }}" style="width: 100%;" data-selected="{{ $data->sub_jenis_seni_yang_dikuasai ?? '' }}" disabled>
                                                            <option value="">-- Pilih Sub Jenis Seni --</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </td>
                                            <td>
                                                <input name="jumlah_penghasilan_dari_seni[]" class="form-control input-sm text-right rupiah-input sub-jenis-seni" type="text" @if ($data->jenis_seni_yang_dikuasai == 6) disabled @endif
                                                    value="{{ $data->jumlah_penghasilan_dari_seni ? 'Rp. ' . number_format($data->jumlah_penghasilan_dari_seni, 0, ',', '.') : '' }}"
                                                >

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="9">Data Tidak Tersedia</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if (!$readonly)
                        <div class="modal-footer">
                            {!! batal() !!}
                            <button type="submit" class="btn btn-social btn-info btn-sm"><i class='fa fa-check'></i>
                                Simpan</button>
                        </div>
                    @endif
                    {!! form_close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            const subJenisMap = @json($sub_jenis_seni);

            // Load awal dari database
            $('.jenis-seni').each(function(i) {
                var selectedJenis = $(this).val();
                var subJenisSelect = $(this).closest('td').find('.sub-jenis-seni');
                var subJenisFromDb = subJenisSelect.data('selected');

                if (subJenisFromDb && selectedJenis) {
                    subJenisSelect.prop('disabled', false);
                    subJenisSelect.empty().append('<option value="">-- Pilih Sub Jenis Seni --</option>');

                    var subItems = subJenisMap[selectedJenis] || [];
                    $.each(subItems, function(index, value) {
                        var selected = (value === subJenisFromDb) ? 'selected' : '';
                        subJenisSelect.append('<option value="' + value + '" ' + selected + '>' +
                            value + '</option>');
                    });
                }
            });

            @if ($readonly)
                $('table.dataTable tbody tr>td select').each(function() {
                    const _td = $(this).parent();
                    let _text = $(this).find('option:selected').text();
                    if (_text == '-- Pilih--') {
                        _text = '';
                    }
                    _td.html(_text)
                })
                $('table.dataTable tbody tr>td input').each(function() {
                    const _td = $(this).parent();
                    let _text = $(this).val();
                    _td.html(_text)
                })
            @endif

            // Event ketika user pilih jenis seni baru
            $('.jenis-seni').on('change', function() {
                var selectedJenis = $(this).val();

                // jika selectedJenis == 6 maka subJenisSelect dan penghasilan seni di disable dan dikosongkan
                if (selectedJenis == '6') {
                    var subJenisSelect = $(this).closest('td').find('.sub-jenis-seni');
                    var penghasilanInput = $(this).closest('tr').find(
                        'input[name="jumlah_penghasilan_dari_seni[]"]');

                    // Kosongkan dan disable sub jenis seni
                    subJenisSelect.empty().append('<option value="">-- Pilih Sub Jenis Seni --</option>');
                    subJenisSelect.prop('disabled', true);

                    // Kosongkan dan disable input penghasilan
                    penghasilanInput.val('');
                    penghasilanInput.prop('disabled', true);
                    return; // Keluar dari fungsi agar tidak melanjutkan ke bagian bawah
                } else {
                    // Jika bukan 6, pastikan input penghasilan diaktifkan kembali
                    var penghasilanInput = $(this).closest('tr').find(
                        'input[name="jumlah_penghasilan_dari_seni[]"]');
                    penghasilanInput.prop('disabled', false);
                }

                var subJenisSelect = $(this).closest('td').find('.sub-jenis-seni');

                subJenisSelect.empty().append('<option value="">-- Pilih Sub Jenis Seni --</option>');

                if (selectedJenis) {
                    subJenisSelect.prop('disabled', false);
                    var subItems = subJenisMap[selectedJenis] || [];
                    $.each(subItems, function(index, value) {
                        subJenisSelect.append('<option value="' + value + '">' + value +
                            '</option>');
                    });
                } else {
                    subJenisSelect.prop('disabled', true);
                }
            });


            function formatRupiah(angka, prefix) {
                angka = angka.replace(/[^,\d]/g, '').replace(/^0+/, ''); // hanya angka & hilangkan 0 di depan
                if (angka === '') return ''; // Jangan tampilkan "Rp. 0" jika kosong, cukup biarkan kosong

                var split = angka.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    var separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix ? 'Rp. ' + rupiah : rupiah;
            }

            document.querySelectorAll('.rupiah-input').forEach(function(el) {
                // Format default saat load
                el.value = formatRupiah(el.value.replace(/[^0-9]/g, ''), true) ||
                    ''; // Kosongkan jika tidak ada nilai

                el.addEventListener('input', function() {
                    let val = this.value.replace(/[^0-9,]/g, ''); // Mengambil nilai yang valid saja
                    if (val === "") {
                        this.value = ''; // Biarkan kosong saat input kosong
                    } else {
                        this.value = formatRupiah(val, true); // Format dengan prefix 'Rp.'
                    }
                });

                el.addEventListener('keypress', function(e) {
                    if (!/[0-9]/.test(String.fromCharCode(e.which))) {
                        e.preventDefault(); // Cegah karakter yang bukan angka
                    }
                });

                el.addEventListener('paste', function(e) {
                    e.preventDefault();
                    let pasteData = (e.clipboardData || window.clipboardData).getData('text');
                    let clean = pasteData.replace(/[^0-9]/g, ''); // Hanya ambil angka
                    this.value = formatRupiah(clean, true); // Format dengan prefix 'Rp.'
                });
            });



            $('#form-1').on('submit', function(ev) {
                ev.preventDefault(); // Cegah form agar tidak langsung disubmit

                var structuredData = []; // Array untuk menyusun data berdasarkan index
                var isValid = true; // Flag untuk validasi form
                var totalRows = $("input[name='rtm_id[]']")
                    .length; // Inisialisasi jumlah data berdasarkan jumlah rtm_id[]

                // Loop sesuai jumlah baris
                for (var i = 0; i < totalRows; i++) {
                    var jenisSeni = $("select[name='jenis_seni_yang_dikuasai[]']").eq(i).val();
                    var jenisSeniNilai = $("select[name='jenis_seni_yang_dikuasai[]']").eq(i).find(
                        ":selected").data('nilai');
                    var subJenisSeni = $("select[name='sub_jenis_seni_yang_dikuasai[]']").eq(i).val();

                    var jumlahPenghasilan = $("input[name='jumlah_penghasilan_dari_seni[]']").eq(i).val();

                    // Bersihkan jumlah_penghasilan_dari_seni dari titik, koma, dan Rp.
                    jumlahPenghasilan = jumlahPenghasilan.replace(/[^\d]/g,
                        ''); // Hapus karakter selain angka

                    // Cek jika jenis seni dipilih tapi sub jenis seni tidak dipilih
                    // jenisSeni == 6 (Tidak Memiliki) maka subJenisSeni tidak perlu divalidasi
                    if (jenisSeni && !subJenisSeni && jenisSeni != 6) {
                        isValid = false; // Set flag validasi ke false jika sub jenis seni belum dipilih
                        var subJenisSeniSelect = $("select[name='sub_jenis_seni_yang_dikuasai[]']").eq(i);

                        // Tambah class invalid pada select
                        subJenisSeniSelect.addClass('is-invalid');

                        // Cek jika pesan error belum ada
                        if (subJenisSeniSelect.closest('.form-group').find('.invalid-feedback').length ===
                            0) {
                            // Menambahkan pesan error di bawah select dalam .form-group
                            subJenisSeniSelect.closest('.form-group').append(
                                '<small class="text-danger invalid-feedback">Silakan pilih sub jenis seni.</small>'
                            );
                        }
                    } else {
                        // Jika sub jenis seni sudah dipilih, hapus class invalid
                        $("select[name='sub_jenis_seni_yang_dikuasai[]']").eq(i).removeClass('is-invalid');
                        // Hapus pesan error jika ada
                        $("select[name='sub_jenis_seni_yang_dikuasai[]']").eq(i).next('.invalid-feedback')
                            .remove();
                    }

                    // Jika form valid, simpan data
                    if (isValid) {
                        structuredData[i] = {
                            nik: $("input[name='nik[]']").eq(i).val(),
                            rtm_id: $("input[name='rtm_id[]']").eq(i).val(),
                            keluarga_id: $("input[name='keluarga_id[]']").eq(i).val(),
                            anggota_id: $("input[name='anggota_id[]']").eq(i).val(),
                            jenis_seni_yang_dikuasai: jenisSeniNilai,
                            sub_jenis_seni_yang_dikuasai: subJenisSeni,
                            jumlah_penghasilan_dari_seni: jumlahPenghasilan,
                            jenis_seni_json: {
                                'jenis_seni_id': jenisSeni,
                                'jenis_seni_value': jenisSeniNilai,
                                'sub_jenis_seni': subJenisSeni,
                            }
                        };
                    }
                }

                // Jika validasi gagal, batalkan submit
                if (!isValid) {
                    return; // Tidak lanjutkan dengan ajax jika ada error
                }

                //Jika validasi berhasil, lanjutkan dengan ajax
                $.ajax({
                    type: 'POST',
                    url: "{{ ci_route('data_presisi.seni_budaya.update', $seni_budaya->rtm_id) }}",
                    data: {
                        form: structuredData,
                        status_kelengkapan: $('#status_kelengkapan').val()
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                            }).then(function() {
                                window.location.href =
                                    "{{ ci_route('data_presisi.seni_budaya') }}";
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        Swal.fire({
                            icon: 'error',
                            text: 'Terjadi kesalahan saat menyimpan data',
                        });
                    }
                });
            });


        });
    </script>
@endpush
