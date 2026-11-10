@include('ppid::frontend._head')

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('ppid::frontend._header_navbar')
        @include('ppid::frontend._header_permohonan')

        <!-- form permohonan -->
        <section class="bg-light">
            <div class="container px-3 px-sm-3 px-md-5">
                <div class="bg-white rounded-3 py-4 px-4 px-md-5">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Pekerjaan</th>
                                    <th>No Telp/Email</th>
                                    <th>Cara Memperoleh Informasi</th>
                                    <th>Informasi yang Dibutuhkan</th>
                                    <th>Tujuan Penggunaan Informasi</th>
                                    <th>Status</th>
                                    <th>Diajukan pada</th>
                                    <th>Tindak Lanjut Pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permohonan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ substr($item->nama, 0, 4) . '***' }}</td>
                                        <td>{{ substr($item->alamat, 0, 4) . '***' }}</td>
                                        <td>{{ substr($item->pekerjaan, 0, 4) . '***' }}</td>
                                        <td>{{ substr($item->telp_email, 0, 4) . '***' }}</td>
                                        <td>{{ $item->cara_memperoleh_informasi }}</td>
                                        <td>{{ $item->informasi_yang_dibutuhkan }}</td>
                                        <td>{{ $item->tujuan_penggunaan_informasi }}</td>
                                        <td>{{ ucwords($item->tindak_lanjut) }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at == $item->created_at ? '-' : $item->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

    </main>

    @include('ppid::frontend._footer')
</body>

</html>
