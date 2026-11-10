<table>
    <tbody>
        <tr>
            <td>
                @if ($aksi != 'unduh')
                    <img class="logo" src="{{ gambar_desa($config['logo']) }}" alt="logo-desa">
                @endif
                <h1 class="judul" align="center">
                    PEMERINTAH {!! strtoupper(setting('sebutan_kabupaten') . ' ' . $config['nama_kabupaten'] . ' <br>' . setting('sebutan_kecamatan') . ' ' . $config['nama_kecamatan'] . ' <br>' . setting('sebutan_desa') . ' ' . $config['nama_desa']) !!}
                </h1>
            </td>
        </tr>
        <tr>
            <td>
                <hr class="garis">
            </td>
        </tr>
        <tr>
            <td align="center">
                <h4><u>DATA {{ strtoupper($tipe) }}</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Tanggal</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Dataran Rendah (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Dataran Berbukit - Bukit (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Dataran (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Lereng Gunung (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Tepi Pantai/Pesisir (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Kawasan Rawa (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Kawasan Gambut (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Aliran Sungai (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Bantaran Sungai (Ha)</th>
                            <th>Lain - Lain (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Rawan Banjir (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Potensial Tsunami (Ha)</th>
                            <th>{{ ucwords(setting('sebutan_desa')) }} Rawan Jalur Gempa (Ha)</th>
                            <th>Jarak Ke Ibu Kota Kecamatan (Km)</th>
                            <th>Jarak Ke Ibu Kota Provinsi (Km)</th>
                            <th>Jarak Ke Ibu Kota Kabupaten/Kota (Km)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $topografi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $topografi->data['tanggal'] }}</td>
                                <td>{{ $topografi->data['dataran_rendah'] }}</td>
                                <td>{{ $topografi->data['berbukit_bukit'] }}</td>
                                <td>{{ $topografi->data['dataran'] }}</td>
                                <td>{{ $topografi->data['lereng_gunung'] }}</td>
                                <td>{{ $topografi->data['tepi_pantai_pesisir'] }}</td>
                                <td>{{ $topografi->data['kawasan_rawa'] }}</td>
                                <td>{{ $topografi->data['kawasan_gambut'] }}</td>
                                <td>{{ $topografi->data['aliran_sungai'] }}</td>
                                <td>{{ $topografi->data['bantaran_sungai'] }}</td>
                                <td>{{ $topografi->data['lain_lain'] }}</td>
                                <td>{{ $topografi->data['rawan_banjir'] }}</td>
                                <td>{{ $topografi->data['potensi_tsunami'] }}</td>
                                <td>{{ $topografi->data['rawan_jalur_gempa'] }}</td>
                                <td>{{ $topografi->data['jarak_ke_ibukota_kecamatan'] }}</td>
                                <td>{{ $topografi->data['jarak_ke_ibukota_provinsi_kota'] }}</td>
                                <td>{{ $topografi->data['jarak_ke_ibukota_kabupaten_kota'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="18">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
