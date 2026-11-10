@include('ppid::frontend._head')

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('ppid::frontend._header_navbar')
        @include('ppid::frontend._header_keberatan')

        <section class="bg-light">
            <div class="container px-3 px-sm-3 px-md-5">
                <div class="bg-white rounded-3 py-4 px-4 px-md-5">
                    @include('admin.layouts.components.notifikasi')
                    {!! form_open_multipart(ci_route('ppid.simpan-keberatan'), 'class="form-horizontal" id="validasi"') !!}
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="row g-3 mb-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input
                                            class="form-control"
                                            name="nik"
                                            id="nik"
                                            type="text"
                                            maxlength="16"
                                            placeholder="Masukkan NIK"
                                            required
                                        />
                                        <label for="nik">NIK*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <div class="input-group">
                                            <input
                                                class="form-control"
                                                name="permohonan_informasi_nama"
                                                id="permohonan_informasi_nama"
                                                type="text"
                                                readonly
                                                placeholder="Permohonan informasi berdasarkan NIK pemohon"
                                                required
                                            />
                                            <input name="permohonan_informasi_uuid" id="permohonan_informasi_uuid" type="hidden" required />
                                            <button class="btn btn-primary" type="button" id="cari-permohonan-informasi">Cari</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" name="nama" id="nama" type="text" placeholder="Masukkan Nama" required />
                                        <label for="nama">Nama*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" name="alamat" id="alamat" type="text" placeholder="Masukkan Alamat" required />
                                        <label for="alamat">Alamat*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" name="pekerjaan" id="pekerjaan" type="text" placeholder="Masukkan Pekerjaan" required />
                                        <label for="pekerjaan">Pekerjaan*</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input class="form-control" name="telp_email" id="telp_email" type="text" placeholder="Masukkan No Tlp/Email" required />
                                        <label for="telp_email">No Tlp/Email*</label>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Alasan Keberatan*</label>
                                    @foreach ($filtered_options as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="alasan_keberatan" id="{{ $item['id'] }}" value="{{ $item['nama'] }}" required />
                                            <label class="form-check-label" for="{{ $item['id'] }}">{{ $item['nama'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan Penggunaan Informasi*</label>
                                <textarea class="form-control" name="tujuan_penggunaan_informasi" id="tujuan" placeholder="Masukkan Tujuan Penggunaan Informasi" style="height: 100px" required></textarea>
                            </div>
                            <div class="mb-3">
                                <h3>Identitas Kuasa Pemohon</h3>
                            </div>
                            <div class="mb-3">
                                <label for="kuasa_nama">Nama</label>
                                <input class="form-control" name="kuasa_nama" id="kuasa_nama" type="text" placeholder="Masukkan Nama" />
                            </div>
                            <div class="mb-3">
                                <label for="kuasa_alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="kuasa_alamat" id="kuasa_alamat" placeholder="Masukkan Alamat" style="height: 100px"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kuasa_pekerjaan">Pekerjaan</label>
                                <input class="form-control" name="kuasa_pekerjaan" id="kuasa_pekerjaan" type="text" placeholder="Masukkan Pekerjaan" />
                            </div>
                            <div class="mb-3">
                                <label for="kuasa_kasus_posisi" class="form-label">Kasus Posisi</label>
                                <textarea class="form-control" name="kuasa_kasus_posisi" id="kuasa_kasus_posisi" placeholder="Masukkan Kasus Posisi" style="height: 100px"></textarea>
                            </div>
                            <div class="mb-3">
                                <table>
                                    <tr class="captcha">
                                        <td>&nbsp;</td>
                                        <td>
                                            <button type="button" id="b-captcha" style="color: #000000;">
                                                <img id="captcha" src="<?= site_url('captcha') ?>" onclick="document.getElementById('captcha').src = '<?= site_url('captcha') ?>?' + Math.random();" alt="CAPTCHA Image" />
                                            </button>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                        <td>
                                            <input type="text" name="captcha_code" class="form-control" maxlength="6" placeholder="Masukkan kode disamping" required />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg" id="submitButton" type="button">Kirim
                                    Permohonan</button>
                            </div>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </section>

    </main>

    @include('ppid::frontend._footer')

    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>

    <?= view('admin.layouts.components.token') ?>

    <!-- Jquery UI -->
    <script src="{{ asset('bootstrap/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @include('ppid::frontend._modal_cari_permohonan_informasi')

    <script>
        $(document).ready(function() {

            //Delay Alert
            setTimeout(function() {
                $("#notifikasi").fadeIn("slow");
            }, 500);
            setTimeout(function() {
                $("#notifikasi").fadeOut("slow");
            }, 3000);

            $('#submitButton').on('click', function() {
                let btn = $(this);
                btn.prop('disabled', true);
                var formData = new FormData($('#validasi')[0]);
                $.ajax({
                    url: '{{ ci_route('ppid.simpan-keberatan') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        btn.prop('disabled', false);
                    },
                    error: function(xhr) {

                        let response = JSON.parse(xhr.responseText);

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: false
                        });
                        btn.prop('disabled', false);
                    }
                });
            });
        });
    </script>

</body>

</html>
