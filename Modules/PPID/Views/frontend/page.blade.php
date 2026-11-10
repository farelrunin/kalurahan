@include('ppid::frontend._head')

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('ppid::frontend._header_navbar')

        <!-- Page Content-->
        <section class="py-5 bg-light detailSection">
            <div class="container px-md-5 px-sm-3 px-3 my-3 my-md-5">
                <!-- <div class="container px-3 px-sm-3 px-md-5"> -->
                <div class="row gx-5">
                    <!-- Bagian Detail Dokumen -->
                    <div class="col-xl-12">
                        <h2 class="fw-bolder mb-3">{{ $artikel->judul }}</h2>
                        <p class="text-muted mb-4 text-description">{!! $artikel->isi !!}</p>

                        <!-- Metadata dengan Ikon dan Tabel Informasi Tambahan -->
                        <div class="row metaData">
                            <!-- Kolom Metadata dengan Ikon -->
                            <div class="col-md-4 d-flex flex-column justify-content-between" style="min-height: 100%;">

                                <div class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-white text-black-50 shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-calendar-check fs-4" aria-label="Upload Date"></i>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-bold">Tanggal Upload</p>
                                        <p class="text-muted mb-0">{{ $artikel->tgl_upload }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>

    </main>

    @include('ppid::frontend._footer')
</body>

</html>
