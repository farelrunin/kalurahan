<!-- Header Banner-->
<header class="bg-dark pb-5 bannerArea"
    style="
    min-height: 300px;
    max-height: 600px;
    padding-top: 7rem;
    background-image: linear-gradient(
        rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)
    ), url('{{ ci_route('ppid.ambil-banner') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: white;
"
>
    <div class="container px-4">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder mb-2">Formulir Permohonan</h1>
                    <p class="lead fw-normal mb-4 text-description">
                        Pejabat Pengelola Informasi dan Dokumentasi
                    </p>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-block d-xl-none text-center">
                <button type="button" class="btn btn-primary btn-sm mb-3" id="munculkan-status-permohonan">Cek Status Permohonan</button>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block" id="div-status-permohonan">
                {!! form_open_multipart(ci_route('ppid.status-permohonan'), 'class="form-horizontal row" id="status-permohonan"') !!}

                <div class="col-md-8">
                    <input type="text" name="captcha_code" class="form-control" maxlength="6" placeholder="Masukkan kode disamping" required />
                </div>
                <div class="col-md-4">
                    <button type="button" id="b-captcha" style="color: #000000;">
                        <img id="captcha2" src="<?= site_url('captcha') ?>" onclick="document.getElementById('captcha2').src = '<?= site_url('captcha') ?>?' + Math.random();" alt="CAPTCHA Image" />
                    </button>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="no_telp_email_nik" name="no_telp_email_nik" required placeholder="Masukkan No Telp/Email atau NIK">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-sm btn-primary" title="Cek Status Permohonan">Cek Permohonan</button>
                </div>
                {!! form_close() !!}
            </div>
        </div>
    </div>
</header>
<script>
    document.getElementById('munculkan-status-permohonan').addEventListener('click', function() {
        const divStatusPermohonan = document.getElementById('div-status-permohonan');
        if (divStatusPermohonan.classList.contains('d-none')) {
            divStatusPermohonan.classList.remove('d-none');
        } else {
            divStatusPermohonan.classList.add('d-none');
        }
    });
</script>
