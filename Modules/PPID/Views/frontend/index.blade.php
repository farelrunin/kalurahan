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
                            <h1 class="display-5 fw-bolder mb-2">{{ setting('ppid_judul_portal') }}</h1>
                            <p class="lead fw-normal mb-4 text-description">
                                {{ setting('ppid_informasi_singkat') }}
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#search">Cari Koleksi Dokumen</a>
                                @if (setting('ppid_aktifkan_permohonan'))
                                    <a class="btn btn-light btn-lg px-4" href="{{ route('ppid.form-permohonan') }}">Buat
                                        Permohonan</a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"></div>
                </div>
            </div>
        </header>

        <!-- Fitur Kategori -->
        <section id="search" class="pt-5 pb-3 bg-light">
            <div class="container px-3 px-sm-3 px-md-5">
                @include('admin.layouts.components.notifikasi')

                <div class="row gx-5">
                    @foreach ($jenisDokumens as $jenis)
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="{{ route('ppid.index') }}?category={{ $jenis->external_code }}" class="text-decoration-none text-dark">
                                    <div class="card-body text-center">
                                        <div class="icon-box text-white rounded-circle mx-auto mb-3" style="background-color: {{ $jenis->bgicon }}">
                                            <i class="{{ $jenis->icon }} fs-1"></i>
                                        </div>
                                        <h5 class="fw-bold">{{ $jenis->nama_kategori }}</h5>
                                        <p class="text-muted">
                                            {{ $jenis->deskripsi }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Latest info -->
        <section id="latest-info" class="py-5 bg-light latestInfoSection">
            <div class="container px-3 px-sm-3 px-md-5">

                <div class="text-center mb-5">
                    <h1 class="fw-bolder display-3 display-sm-3 display-md-2 text-title">Informasi Dokumen Terkini</h1>
                    <p class="text-muted text-description">
                        Temukan dokumen informasi publik pada daftar dokumen dibawah, pastikan informasi dapat digunakan
                        sebaik mungkin sesuai kebutuhan anda, jika terdapat ketidak sesuaian informasi dapat menghubungi
                        perangkat {{ ucwords(setting('sebutan_desa') . ' ' . $desa['nama_desa']) }}.
                    </p>
                </div>

                <div class="mb-3 mb-md-4">

                    <!-- Start Form Pencarian -->
                    <!-- Mobile Layout: Form Pencarian -->
                    <div class="row mb-3 d-md-none">
                        <div class="col-12">
                            <form action="{{ route('ppid.index') }}" method="GET">
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <div class="form-group has-search position-relative mb-2">
                                    <i class="bi bi-search form-control-feedback"></i>
                                    <input type="text" class="form-control" id="mobileSearch" name="search" placeholder="Masukkan kata kunci..." value="{{ request('search') }}">
                                </div>
                                <button type="submit" class="btn btn-secondary w-100">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Desktop Layout: Bagian Tengah: Form Pencarian -->
                    <div class="card border-0 shadow-sm mb-4 d-none d-md-flex">
                        <div class="card-body px-4 py-3" style="padding: 26px 60px;">
                            <form action="{{ route('ppid.index') }}" method="GET">
                                @if (request('category'))
                                    <input type="hidden" name="category" value="{{ request('category') }}">
                                @endif
                                <div class="d-flex flex-wrap justify-content-center align-items-center">
                                    <label for="search" class="me-3 fw-semibold mb-2">Kata Kunci Pencarian:</label>
                                    <input
                                        type="text"
                                        id="search"
                                        class="form-control me-3 mb-2"
                                        placeholder="Masukkan kata kunci..."
                                        style="max-width: 400px;"
                                        name="search"
                                        value="{{ request('search') }}"
                                    >
                                    <button type="submit" class="btn btn-secondary mb-2">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Form Pencarian -->

                    <!-- Bagian bawah: Total Dokumen -->
                    <div class="d-flex justify-content-start text-muted">
                        <span>Total ada <strong>{{ $totalDokumen }}</strong> file</span>
                    </div>
                </div>

                <!-- Card List -->
                <div class="row gx-3">
                    @forelse ($dokumens as $dokumen)
                        <div class="col-12 col-md-6 mx-auto mb-4">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body">
                                    <!-- Icon dan Title -->
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="icon-box bg-primary text-white rounded-circle me-3">
                                            <i class="bi bi-file-earmark-pdf"></i>
                                        </div>
                                        <h5 class="fw-bold mb-0 card-title-responsive">{{ $dokumen->nama }}</h5>
                                    </div>
                                    <!-- View Counter, Share Button, Download Counter, and Tanggal -->
                                    <div class="d-flex flex-wrap align-items-center mb-0 mb-md-3">
                                        <!-- View Counter -->
                                        <div class="d-flex align-items-center text-muted me-4 mb-2">
                                            <i class="bi bi-eye me-2"></i>
                                            <small>{{ $dokumen->statistik->view_count ?? 0 }} Dilihat</small>
                                        </div>
                                        <!-- Share Button -->
                                        <div class="d-flex align-items-center text-muted me-4 mb-2">
                                            <small>
                                                <a href="javascript:void(0);" class="text-decoration-none text-muted share-button" data-doc-name="{{ $dokumen->nama }}" data-doc-link="{{ route('dokumen.show', $dokumen->id) }}">
                                                    <i class="bi bi-share me-2"></i>
                                                    Bagikan
                                                </a>
                                            </small>
                                        </div>
                                        <!-- Download Counter -->
                                        <div class="d-flex align-items-center text-muted me-4 mb-2">
                                            <i class="bi bi-download me-2"></i>
                                            <small id="downloads-{{ $dokumen->id }}">{{ $dokumen->statistik->download_count ?? 0 }}
                                                Kali Diunduh</small>
                                        </div>
                                        <!-- Tanggal Publish -->
                                        <div class="d-flex align-items-center text-muted mb-2 me-4">
                                            <i class="bi bi-clock me-2"></i>
                                            <small>{{ \Illuminate\Support\Carbon::parse($dokumen->created_at)->translatedFormat('d F Y H:i') }}</small>
                                        </div>

                                        <div class="d-flex align-items-center text-muted me-4 mb-2">
                                            <i class="bi bi-link-45deg me-2"></i>
                                            <small>
                                                <a href="{{ route('ppid.index') }}?category={{ $dokumen->jenisDokumen->id }}" class="text-decoration-none text-muted">
                                                    {{ $dokumen->jenisDokumen->nama_kategori }}
                                                </a>
                                            </small>
                                        </div>

                                    </div>

                                    <!-- Mobile Layout: Download Counter dan Tanggal -->

                                    <!-- Action Buttons -->
                                    <div class="d-flex justify-content-start">
                                        <div class="d-none d-sm-flex w-100">
                                            <a href="javascript:void(0);" data-id="{{ $dokumen->id }}" data-url="{{ route('ppid.download-dokumen', $dokumen->id) }}" target="_blank" class="btn btn-primary btn-sm me-2 d-flex align-items-center download-button">
                                                <i class="bi bi-download me-2"></i> Unduh
                                            </a>
                                            <a href="{{ route('dokumen.show', $dokumen->id) }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center">
                                                <i class="bi bi-search me-2"></i> Lihat Detail
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tombol untuk mobile (Di bawah, masing-masing penuh) -->
                                    <div class="d-flex d-sm-none justify-content-between mt-3">
                                        <!-- Tombol Unduh (di kiri) -->
                                        <a href="javascript:void(0);" data-id="{{ $dokumen->id }}" data-url="{{ route('ppid.download-dokumen', $dokumen->id) }}" target="_blank" class="btn btn-primary btn-sm d-flex align-items-center w-100 me-2 download-button">
                                            <i class="bi bi-download me-2"></i> Unduh
                                        </a>
                                        <!-- Tombol Lihat Detail (di kanan) -->
                                        <a href="{{ route('dokumen.show', $dokumen->id) }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center w-100 ms-2">
                                            <i class="bi bi-search me-2"></i> Lihat Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <h1 class="text-center">Tidak ada data</h1>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    @if ($dokumens->hasPages())
                        <nav>
                            <ul class="pagination">
                                {{-- Tombol Previous --}}
                                @if ($dokumens->onFirstPage())
                                    <li class="page-item disabled" aria-disabled="true">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $dokumens->previousPageUrl() }}" rel="prev">Previous</a>
                                    </li>
                                @endif

                                {{-- Nomor Halaman --}}
                                @foreach ($dokumens->getUrlRange(1, $dokumens->lastPage()) as $page => $url)
                                    @if ($page == $dokumens->currentPage())
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">{{ $page }}</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                {{-- Tombol Next --}}
                                @if ($dokumens->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $dokumens->nextPageUrl() }}" rel="next">Next</a>
                                    </li>
                                @else
                                    <li class="page-item disabled" aria-disabled="true">
                                        <span class="page-link">Next</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    @endif
                </div>

            </div>
        </section>

        @if (setting('ppid_aktifkan_permohonan_keberatan'))
            <section class="py-3 py-sm-5 ctaSection">
                <!-- <div class="container px-5 my-5"> -->
                <div class="container px-3 px-sm-3 px-md-5 my-3 my-md-3">
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white text-title">
                                    Ada dokumen atau informasi yang tidak sesuai?
                                </div>
                            </div>
                            <div class="ms-xl-4">
                                <a href="{{ route('ppid.form-keberatan') }}" type="button" class="btn btn-light btn-lg">
                                    Permohonan Keberatan
                                </a>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        @endif

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
