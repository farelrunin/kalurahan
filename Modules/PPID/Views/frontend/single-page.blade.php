@include('ppid::frontend._head')

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('ppid::frontend._header_navbar')

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
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder mb-2">Detail Dokumen PPID</h1>
                            <p class="lead fw-normal mb-4 text-description">
                                Halaman ini menyediakan informasi lengkap mengenai dokumen PPID, termasuk jenis dokumen,
                                tanggal upload, serta jumlah unduhan dan tampilan. Temukan berbagai informasi terkait
                                dokumen ini di bawah.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"></div>
                </div>
            </div>
        </header>

        <!-- Page Content-->
        <section class="py-5 bg-light detailSection">
            <div class="container px-md-5 px-sm-3 px-3 my-3 my-md-5">
                <!-- <div class="container px-3 px-sm-3 px-md-5"> -->
                <div class="row gx-5">
                    <!-- Bagian Detail Dokumen -->
                    <div class="col-xl-12">
                        <h2 class="fw-bolder mb-3">{{ $dokumen->judul }}</h2>
                        <p class="text-muted mb-4 text-description">{{ $dokumen->keterangan }}</p>

                        <!-- Metadata dengan Ikon dan Tabel Informasi Tambahan -->
                        <div class="row metaData">
                            <!-- Kolom Metadata dengan Ikon -->
                            <div class="col-md-4 d-flex flex-column justify-content-between" style="min-height: 100%;">
                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-white text-black-50 shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-file-earmark-pdf fs-4" aria-label="PDF File"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-bold">Jenis File</p>
                                        <p class="text-muted mb-0">{{ pathinfo($dokumen['url_file'], PATHINFO_EXTENSION) }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-white text-black-50 shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-calendar-check fs-4" aria-label="Upload Date"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-bold">Tanggal Upload</p>
                                        <p class="text-muted mb-0">{{ $dokumen->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-white text-black-50 shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-eye fs-4" aria-label="View Count"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-bold">Jumlah Dilihat</p>
                                        <p class="text-muted mb-0">{{ $dokumen->statistik->view_count ?? 1 }}</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-white text-black-50 shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-download fs-4" aria-label="Download Count"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-bold">Jumlah Diunduh</p>
                                        <p class="text-muted mb-0">{{ $dokumen->statistik->download_count ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Tabel Informasi Tambahan -->
                            <div class="col-md-8 d-flex flex-column" style="min-height: 100%;">
                                <table class="table align-middle flex-grow-1">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Jenis Informasi</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Jenis Dokumen</td>
                                            <td>{{ $dokumen->jenisDokumen->nama_kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ketersediaan Dokumentasi</td>
                                            <td>Tersedia hingga {{ $dokumen->expired_at_formatted }}
                                                {{ $dokumen->permohonanInformasi ? '(Terbatas untuk pemohon)' : '(Untuk umum)' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Upload</td>
                                            <td>{{ $dokumen->created_at->translatedFormat('d F Y') }}</td>
                                        </tr>
                                        @if ($dokumen->permohonanInformasi)
                                            <tr>
                                                <td>Nama Pemohon Data</td>
                                                <td>{{ $dokumen->permohonanInformasi->nama }}</td>
                                            </tr>
                                            <tr>
                                                <td>Surat Permohonan Data</td>
                                                <td>Tidak Ada Data</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                                <!-- Action Buttons -->
                                <div class="row mb-4">
                                    <!-- Action Buttons -->
                                    <div class="d-flex justify-content-start">

                                        <a href="javascript:void(0);" data-id="{{ $dokumen->id }}" data-url="{{ route('ppid.download-dokumen', $dokumen->id) }}" target="_blank" class="btn btn-sm btn-primary me-3 download-button">
                                            <i class="bi bi-download me-2"></i> Unduh
                                        </a>

                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-secondary share-button" data-doc-name="{{ $dokumen->nama }}" data-doc-link="{{ route('dokumen.show', $dokumen->id) }}">
                                            <i class="bi bi-share me-2"></i>
                                            Bagikan
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <!-- Informasi Lainnya (Iklan atau Info Tambahan) -->
                    {{-- <div class="col-xl-4">
                        <div class="card shadow-sm border-0 mt-xl-5">
                            <div class="card-body p-4 py-lg-5">
                                <div class="text-center">
                                    <div class="h6 fw-bolder">Butuh Bantuan?</div>
                                    <p class="text-muted mb-4">Hubungi kami
                                        </br>
                                        <a href="mailto:support@domain.com">support@domain.com</a>
                                    </p>
                                    <div class="h6 fw-bolder">Ikuti Kami</div>
                                    <a class="fs-5 px-2 link-dark" href="#"><i class="bi-twitter"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#"><i class="bi-facebook"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#"><i class="bi-linkedin"></i></a>
                                    <a class="fs-5 px-2 link-dark" href="#"><i class="bi-youtube"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Iklan atau Info Lainnya -->
                        <div class="card shadow-sm border-0 mt-4">
                            <div class="card-body text-center">
                                <p>Temukan Iklan Terbaru Disini!</p>
                                <button class="btn btn-primary">Lihat Iklan</button>
                            </div>
                        </div>

                    </div> --}}
                </div>
        </section>

        <!-- Dokumen Terkait -->
        {{-- <section id="latest-info" class="py-5 bg-light latestInfoSection">
            <!-- <div class="container px-5 px-sm-3"> -->
            <div class="container px-3 px-sm-3 px-md-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder display-3 display-sm-3 display-md-2 text-title">Dokumen Terkait</h1>
                </div>
                <!-- Card List -->
                <div class="row gx-3">
                    <!-- Card 1 -->
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <!-- Icon dan Title -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-box bg-primary text-white rounded-circle me-3">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0 card-title-responsive">Perdes Nomor 3 Tahun 2022 tentang
                                        Perubahan RKP Desa 2022</h5>
                                </div>
                                <!-- View Counter, Share Button, Download Counter, and Tanggal -->
                                <div class="d-flex flex-wrap align-items-center mb-0 mb-md-3">
                                    <!-- View Counter -->
                                    <div class="d-flex align-items-center text-muted me-4 mb-2">
                                        <i class="bi bi-eye me-2"></i>
                                        <small>105 Dilihat</small>
                                    </div>
                                    <!-- Share Button -->
                                    <div class="d-flex align-items-center text-muted me-4 mb-2">
                                        <i class="bi bi-share me-2"></i>
                                        <small><a href="#" class="text-decoration-none text-muted">Bagikan</a></small>
                                    </div>
                                    <!-- Download Counter -->
                                    <div class="d-flex align-items-center text-muted me-4 mb-2 d-none d-md-flex">
                                        <i class="bi bi-download me-2"></i>
                                        <small>25 Kali Diunduh</small>
                                    </div>
                                    <!-- Tanggal Publish -->
                                    <div class="d-flex align-items-center text-muted mb-2 d-none d-md-flex">
                                        <i class="bi bi-clock me-2"></i>
                                        <small>01 Januari 2024</small>
                                    </div>
                                </div>
                                <!-- Mobile Layout: Download Counter dan Tanggal -->
                                <div class="d-flex flex-wrap align-items-center text-muted d-md-none">
                                    <!-- Download Counter -->
                                    <div class="d-flex align-items-center me-4 mb-2">
                                        <i class="bi bi-download me-2"></i>
                                        <small>25 Kali Diunduh</small>
                                    </div>
                                    <!-- Tanggal Publish -->
                                    <div class="d-flex align-items-center me-4 mb-2">
                                        <i class="bi bi-clock me-2"></i>
                                        <small>01 Januari 2024</small>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-start">
                                    <div class="d-none d-sm-flex w-100">
                                        <a href="#" class="btn btn-primary btn-sm me-2 d-flex align-items-center">
                                            <i class="bi bi-download me-2"></i> Unduh
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                                            <i class="bi bi-search me-2"></i> Lihat Detail
                                        </a>
                                    </div>
                                </div>

                                <!-- Tombol untuk mobile (Di bawah, masing-masing penuh) -->
                                <div class="d-flex d-sm-none justify-content-between mt-3">
                                    <!-- Tombol Unduh (di kiri) -->
                                    <a href="#" class="btn btn-primary btn-sm d-flex align-items-center w-100 me-2">
                                        <i class="bi bi-download me-2"></i> Unduh
                                    </a>
                                    <!-- Tombol Lihat Detail (di kanan) -->
                                    <a href="#" class="btn btn-outline-secondary btn-sm d-flex align-items-center w-100 ms-2">
                                        <i class="bi bi-search me-2"></i> Lihat Detail
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body">
                                <!-- Icon dan Title -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-box bg-primary text-white rounded-circle me-3">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </div>
                                    <h5 class="fw-bold mb-0 card-title-responsive">Perdes Nomor 3 Tahun 2022 tentang
                                        Perubahan RKP Desa 2022</h5>
                                </div>
                                <!-- View Counter, Share Button, Download Counter, and Tanggal -->
                                <div class="d-flex flex-wrap align-items-center mb-0 mb-md-3">
                                    <!-- View Counter -->
                                    <div class="d-flex align-items-center text-muted me-4 mb-2">
                                        <i class="bi bi-eye me-2"></i>
                                        <small>105 Dilihat</small>
                                    </div>
                                    <!-- Share Button -->
                                    <div class="d-flex align-items-center text-muted me-4 mb-2">
                                        <i class="bi bi-share me-2"></i>
                                        <small><a href="#" class="text-decoration-none text-muted">Bagikan</a></small>
                                    </div>
                                    <!-- Download Counter -->
                                    <div class="d-flex align-items-center text-muted me-4 mb-2 d-none d-md-flex">
                                        <i class="bi bi-download me-2"></i>
                                        <small>25 Kali Diunduh</small>
                                    </div>
                                    <!-- Tanggal Publish -->
                                    <div class="d-flex align-items-center text-muted mb-2 d-none d-md-flex">
                                        <i class="bi bi-clock me-2"></i>
                                        <small>01 Januari 2024</small>
                                    </div>
                                </div>
                                <!-- Mobile Layout: Download Counter dan Tanggal -->
                                <div class="d-flex flex-wrap align-items-center text-muted d-md-none">
                                    <!-- Download Counter -->
                                    <div class="d-flex align-items-center me-4 mb-2">
                                        <i class="bi bi-download me-2"></i>
                                        <small>25 Kali Diunduh</small>
                                    </div>
                                    <!-- Tanggal Publish -->
                                    <div class="d-flex align-items-center me-4 mb-2">
                                        <i class="bi bi-clock me-2"></i>
                                        <small>01 Januari 2024</small>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex justify-content-start">
                                    <div class="d-none d-sm-flex w-100">

                                        <a href="javascript:void(0);" data-id="{{ $dokumen->id }}"
                                            data-url="{{ route('ppid.download-dokumen', $dokumen->id) }}"
                                            target="_blank"
                                            class="btn btn-primary btn-sm me-2 d-flex align-items-center download-button">
                                            <i class="bi bi-download me-2"></i> Unduh
                                        </a>
                                    </div>
                                </div>

                                <!-- Tombol untuk mobile (Di bawah, masing-masing penuh) -->
                                <div class="d-flex d-sm-none justify-content-between mt-3">
                                    <!-- Tombol Unduh (di kiri) -->
                                    <a href="javascript:void(0);" data-id="{{ $dokumen->id }}"
                                        data-url="{{ route('ppid.download-dokumen', $dokumen->id) }}"
                                        target="_blank"
                                        class="btn btn-primary btn-sm d-flex align-items-center w-100 me-2 download-button">
                                        <i class="bi bi-download me-2"></i> Unduh
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- More Cards can be added similarly -->
                </div>
            </div>
        </section> --}}

        <!-- Modal Bagikan -->
        <div class="modal fade" id="sharedModal" tabindex="-1" aria-labelledby="sharedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sharedModalLabel">Bagikan Dokumen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modalContent">Konten modal akan diisi di sini.</p>
                        <div id="modalLinks" class="text-center">
                            <!-- Platform bagikan akan ditampilkan di sini -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('ppid::frontend._footer')

    <!-- jQuery 3 -->
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
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

            function downloadDokumen(id, url, nik = null) {
                let data = {};
                if (nik) {
                    data = {
                        nik: nik
                    };
                }
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            $('#downloads-' + id).text(response.downloads + ' Kali Diunduh');

                            // Buka file di tab baru
                            window.open(response.file_url, '_blank');
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'Terjadi kesalahan saat mengunduh dokumen';
                        try {
                            const response = JSON.parse(xhr.responseText);
                            errorMessage = response.message || errorMessage;
                        } catch (e) {
                            // responseText is not JSON, fallback to default message
                            console.error('Error parsing response:', e);
                        }

                        if (xhr.status === 401) {
                            Swal.fire({
                                icon: 'error',
                                title: errorMessage,
                                text: 'Masukan NIK yang melakukan permohonan untuk melanjutkan.',
                                input: 'text',
                                inputPlaceholder: 'NIK',
                                showCancelButton: true,
                                confirmButtonText: 'Submit',
                                showLoaderOnConfirm: true,
                                preConfirm: (nik) => {
                                    downloadDokumen(id, url, nik);
                                },
                                allowOutsideClick: () => !Swal.isLoading()
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: errorMessage,
                                showConfirmButton: false
                            });
                        }
                    }
                });
            }

            $(document).on('click', '.download-button', function(e) {
                e.preventDefault();

                let button = $(this);
                let id = button.data('id');
                let url = button.data('url');

                downloadDokumen(id, url);
            });

            $('.share-button').on('click', function() {
                const docName = $(this).data('doc-name');
                const docLink = $(this).data('doc-link');

                $('#modalContent').html(
                    `Bagikan dokumen <strong>${docName}</strong> melalui platform berikut:`);

                // link untuk platform berbagi
                $('#modalLinks').html(`
                    <a href="https://wa.me/?text=${encodeURIComponent(docName + ' - ' + docLink)}"
                    target="_blank" class="btn btn-success mb-2" title="Whatsapp">
                    <i class="bi bi-whatsapp"></i>
                    </a>
                    <a href="https://t.me/share/url?url=${encodeURIComponent(docLink)}&text=${encodeURIComponent(docName)}"
                    target="_blank" class="btn btn-primary mb-2" title="Telegram">
                    <i class="bi bi-telegram"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(docLink)}"
                    target="_blank" class="btn btn-primary mb-2" title="Facebook">
                    <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(docLink)}&text=${encodeURIComponent(docName)}"
                    target="_blank" class="btn btn-info mb-2" title="Twitter">
                    <i class="bi bi-twitter text-white"></i>
                    </a>
                `);

                $('#sharedModal').modal('show');
            });
        });
    </script>
</body>

</html>
