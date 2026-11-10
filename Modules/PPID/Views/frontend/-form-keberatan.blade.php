<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PPID</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ module_asset('css/styles.css') }}" rel="stylesheet" />

    <!-- custom css -->
    <link rel="stylesheet" href="{{ module_asset('css/custom.css') }}">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container px-3">
                <a class="navbar-brand d-flex align-items-center" href="{{ request()->segment(1) == 'ppid' ? route('ppid.index') : site_url() }}">
                    <img src="assets/img/logo.png" alt="Logo Desa" width="50" height="50" class="me-2">
                    <div class="text-start text-truncate">
                        <span class="d-block small text-mobile-sm">Website Resmi</span>
                        <span class="d-block text-uppercase fw-bold text-mobile-lg">Desa Kembang Merta</span>
                    </div>
                </a>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header Banner-->
        <header class="bg-dark pb-5 bannerArea"
            style="
            min-height: 300px;
            max-height: 600px;
            padding-top: 7rem;
            background-image: linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
            ), url('{{ module_asset('img/banner.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
        "
        >
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder mb-2">Formulir Permohonan</h1>
                            <p class="lead fw-normal mb-4 text-description">
                                Pejabat Pengelola Informasi dan Komunikasi
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"></div>
                </div>
            </div>
        </header>

        <!-- form permohonan -->
        <section class="py-5 bg-light">
            <div class="container px-3 px-sm-3 px-md-5">
                <!-- Contact form-->
                <div class="bg-white rounded-3 py-5 px-4 px-md-5">
                    <div class="text-center mb-5">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder display-3 display-sm-3 display-md-2 text-title">Formulir Permohonan Keberatan</h1>
                        <p class="lead fw-normal text-muted mb-0 text-description">Harap mengisi form untuk permohonan keberatan</p>
                    </div>

                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="permohonanForm">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="noPemohon" type="text" placeholder="Masukkan No Pemohon" required />
                                            <label for="noPemohon">No Pemohon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="namaPemohon" type="text" placeholder="Masukkan Nama Pemohon" required />
                                            <label for="namaPemohon">Nama Pemohon</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="alamat" placeholder="Masukkan Alamat" style="height: 100px" required></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                                <!-- Pekerjaan -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="pekerjaan" type="text" placeholder="Masukkan Pekerjaan" required />
                                    <label for="pekerjaan">Pekerjaan</label>
                                </div>
                                <!-- Email atau No Telepon -->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="kontak" type="text" placeholder="Masukkan Email atau No Telepon" required />
                                    <label for="kontak">Email atau No Telepon</label>
                                </div>
                                <!-- Alasan Keberatan -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Alasan Keberatan</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="alasanKeberatan" id="ditolak" value="Permohonan informasi ditolak" required />
                                        <label class="form-check-label" for="ditolak">Permohonan informasi
                                            ditolak</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="alasanKeberatan" id="tidakDitanggapi" value="Permintaan informasi tidak ditanggapi" required />
                                        <label class="form-check-label" for="tidakDitanggapi">Permintaan informasi tidak
                                            ditanggapi</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="alasanKeberatan" id="tidakDisediakan" value="Informasi berkala tidak disediakan" required />
                                        <label class="form-check-label" for="tidakDisediakan">Informasi berkala tidak
                                            disediakan</label>
                                    </div>
                                </div>
                                <!-- Tujuan Penggunaan Informasi -->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="tujuan" placeholder="Masukkan Tujuan Penggunaan Informasi" style="height: 100px" required></textarea>
                                    <label for="tujuan">Tujuan Penggunaan Informasi</label>
                                </div>
                                <!-- Identitas Kuasa Pemohon -->
                                <div class="accordion mb-3" id="identitasKuasaAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingIdentitas">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIdentitas" aria-expanded="false" aria-controls="collapseIdentitas">
                                                Identitas Kuasa Pemohon
                                            </button>
                                        </h2>
                                        <div id="collapseIdentitas" class="accordion-collapse collapse" aria-labelledby="headingIdentitas" data-bs-parent="#identitasKuasaAccordion">
                                            <div class="accordion-body">
                                                <!-- Nama Kuasa -->
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="namaKuasa" type="text" placeholder="Masukkan Nama Kuasa" />
                                                    <label for="namaKuasa">Nama Kuasa</label>
                                                </div>
                                                <!-- Alamat Kuasa -->
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="alamatKuasa" placeholder="Masukkan Alamat Kuasa" style="height: 100px"></textarea>
                                                    <label for="alamatKuasa">Alamat Kuasa</label>
                                                </div>
                                                <!-- Pekerjaan Kuasa -->
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="pekerjaanKuasa" type="text" placeholder="Masukkan Pekerjaan Kuasa" />
                                                    <label for="pekerjaanKuasa">Pekerjaan Kuasa</label>
                                                </div>
                                                <!-- Kasus Posisi -->
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" id="kasusPosisi" placeholder="Jelaskan Kasus Posisi" style="height: 100px"></textarea>
                                                    <label for="kasusPosisi">Kasus Posisi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Kirim
                                        Permohonan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- CTA-->
        <section class="py-3 py-sm-5 ctaSection">
            <!-- <div class="container px-5 my-5"> -->
            <div class="container px-3 px-sm-3 px-md-5 my-3 my-md-3">
                <!-- Call to action-->
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5">
                    <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white text-title">Ingin mengajukan permohonan informasi?</div>
                        </div>
                        <div class="ms-xl-4">
                            <button type="button" class="btn btn-light btn-lg">
                                Buat Permohonan
                            </button>
                        </div>
                    </div>
                </aside>
            </div>
        </section>

    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
