@include('ppid::frontend._head')

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('ppid::frontend._header_navbar')
        @include('ppid::frontend._header_permohonan')

        <!-- form permohonan -->
        <section class="bg-light">
            <div class="container px-3 px-sm-3 px-md-5">
                <div class="bg-white rounded-3 py-4 px-4 px-md-5">
                    @include('admin.layouts.components.notifikasi')
                    {!! form_open_multipart(ci_route('ppid.simpan-permohonan'), 'class="form-horizontal" id="validasi"') !!}
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
                                    <label class="form-label fw-bold">Cara Memperoleh Informasi*</label>
                                    @foreach ($filtered_options as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cara_memperoleh_informasi" id="{{ $item['id'] }}" value="{{ $item['nama'] }}" required />
                                            <label class="form-check-label" for="{{ $item['id'] }}">{{ $item['nama'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label fw-bold">Cara Mendapat Salinan Informasi*</label>
                                    @foreach ($filtered_mendapat_salinan_options as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="cara_mendapat_salinan_informasi" id="{{ $item['id'] }}" value="{{ $item['nama'] }}" required />
                                            <label class="form-check-label" for="{{ $item['id'] }}">{{ $item['nama'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="informasi" class="form-label">Informasi yang dibutuhkan*</label>
                                <textarea class="form-control" name="informasi_yang_dibutuhkan" id="informasi" placeholder="Informasi yang dibutuhkan" style="height: 100px" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan Penggunaan Informasi*</label>
                                <textarea class="form-control" name="tujuan_penggunaan_informasi" id="tujuan" placeholder="Tujuan Penggunaan Informasi" style="height: 100px" required></textarea>
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
                                <button class="btn btn-primary btn-lg" id="submitButton" type="button">Kirim Permohonan</button>
                            </div>
                        </div>
                    </div>
                    {!! form_close() !!}
                </div>
            </div>
        </section>

        @if (setting('ppid_aktifkan_permohonan_keberatan'))
            <!-- CTA-->
            <section class="py-3 py-sm-5 ctaSection">
                <!-- <div class="container px-5 my-5"> -->
                <div class="container px-3 px-sm-3 px-md-5 my-3 my-md-3">
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white text-title">Ingin mengajukan Keberatan Informasi Publik?</div>
                            </div>
                            <div class="ms-xl-4">
                                <a href="{{ ci_route('ppid.form-keberatan') }}" class="btn btn-light btn-lg">
                                    Buat Pengajuan Keberatan
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        @endif

    </main>

    @include('ppid::frontend._footer')

    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>

    <?= view('admin.layouts.components.token') ?>

    <!-- Jquery UI -->
    <script src="{{ asset('bootstrap/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>

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
                    url: '{{ ci_route('ppid.simpan-permohonan') }}',
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
