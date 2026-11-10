@include('ppid::frontend._head')

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        @include('ppid::frontend._header_navbar')
        @include('ppid::frontend._header_keberatan')

        <!-- form keberatan -->
        <section class="bg-light">
            <div class="container px-3 px-sm-3 px-md-5">
                <div class="bg-white rounded-3 py-4 px-4 px-md-5">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>No Telp/Email</th>
                                <th>Alasan Keberatan</th>
                                <th>Tujuan Penggunaan Informasi</th>
                                <th>Berkaitan dengan Pengajuan Informasi</th>
                                <th>Kuasa Pemohon Kasus Posisi</th>
                                <th>Tindak Lanjut</th>
                                <th>Dibuat pada</th>
                                <th>Tindak Lanjut Pada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permohonan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ substr($item->nama, 0, 4) . '***' }}
                                        <hr class="m-0 p-1">
                                        {{ !$item->kuasa_nama ? '' : 'Kuasa Pemohon : ' . substr($item->kuasa_nama, 0, 4) . '***' }}
                                    </td>
                                    <td>
                                        {{ substr($item->alamat, 0, 4) . '***' }}
                                        <hr class="m-0 p-1">
                                        {{ !$item->kuasa_alamat ? '' : 'Kuasa Pemohon : ' . substr($item->kuasa_alamat, 0, 4) . '***' }}
                                    </td>
                                    <td>
                                        {{ substr($item->pekerjaan, 0, 4) . '***' }}
                                        <hr class="m-0 p-1">
                                        {{ !$item->kuasa_pekerjaan ? '' : 'Kuasa Pemohon : ' . substr($item->kuasa_pekerjaan, 0, 4) . '***' }}
                                    </td>
                                    <td>{{ substr($item->telp_email, 0, 4) . '***' }}</td>
                                    <td>{{ $item->alasan_keberatan }}</td>
                                    <td>{{ $item->tujuan_penggunaan_informasi }}</td>
                                    <td>
                                        {{ $item->permohonanInformasi->informasi_yang_dibutuhkan }}
                                        <br>
                                        {{ $item->permohonanInformasi->created_at }}
                                    </td>
                                    <td>{{ $item->kuasa_kasus_posisi }}</td>
                                    <td>{{ $item->tindak_lanjut }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at == $item->created_at ? '-' : $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    @include('ppid::frontend._footer')
</body>

</html>
