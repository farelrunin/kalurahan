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
                <h4><u>DATA KEAMANAN DAN KETERTIBAN MASALAH KESEJAHTERAAN SOSIAL</u></h4>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td style="padding: 5px 20px;">
                <table border=1 class="border thick">
                    <thead>
                        <tr class="border thick">
                            <th class="padat">No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Tanggal</th>
                            <th>Jumlah anak, remaja, preman dan pengangguran</th>
                            <th>Jumlah gelandangan</th>
                            <th>Jumlah pengemis jalanan dan terlantar</th>
                            <th>Jumlah manusia lanjut usia terlantar</th>
                            <th>Jumlah orang gila/stress/cacat mental</th>
                            <th>Jumlah orang cacat fisik</th>
                            <th>Jumlah orang kelainan kulit</th>
                            <th>Jumlah orang yang tidur di kolong jembatan/emperan</th>
                            <th>Jumlah rumah dan kawasan kumuh (Unit)</th>
                            <th>Jumlah panti jompo (Unit)</th>
                            <th>Jumlah panti asuhan anak (Unit)</th>
                            <th>Jumlah rumah singgah anak jalanan (Unit)</th>
                            <th>Jumlah penghuni jalur hijau dan taman kota</th>
                            <th>Jumlah penghuni bantaran sungai</th>
                            <th>Jumlah penghuni pinggiran rel kereta api</th>
                            <th>Jumlah penghuni liar di lahan dan fasilitas umum lainnya</th>
                            <th>Jumlah anggota kelompok masyarakat/suku/keluarga terasing, terisolir, terlantar dan primitif</th>
                            <th>Jumlah anak yatim usia 0-18 tahun</th>
                            <th>Jumlah anak piatu 0-18 tahun</th>
                            <th>Jumlah anak yatim piatu 0-18 tahun</th>
                            <th>Jumlah janda</th>
                            <th>Jumlah anak usia 7-12 tahun yang tidak sekolah di SD/sederajat</th>
                            <th>Jumlah anak usia 13-15 tahun yang tidak sekolah di SLTP/sederajat</th>
                            <th>Jumlah anak usia 15-18 tahun yang tidak sekolah di SLTA/sederajat</th>
                            <th>Jumlah anak yang bekerja membantu keluarga menghasilkan uang</th>
                            <th>Jumlah perempuan yang menjadi kepala keluarga</th>
                            <th>Jumlah penduduk eks napi</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana banjir</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana gunung berapi</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana tsunami</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana gempa bumi</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana kebakaran rumah</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana kekeringan</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana tanah longsor</th>
                            <th>Jumlah penduduk tinggal di daerah rawan bencana kebakaran hutan</th>
                            <th>Jumlah penduduk rawan bencana kelaparan</th>
                            <th>Jumlah penduduk tinggal di daerah rawan air bersih</th>
                            <th>Jumlah penduduk tinggal di daerah lahan kritis dan tandus</th>
                            <th>Jumlah penduduk tinggal di kawasan padat penduduk dan kumuh</th>
                            <th>Jumlah warga pendatang yang tidak memiliki keterangan penduduk</th>
                            <th>Jumlah warga pendatang dan atau pekerja musiman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataObjs as $index => $value)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $value->bulan }}</td>
                                <td>{{ $value->tahun }}</td>
                                <td>{{ $value->data['tanggal'] }}</td>
                                <td align="right">{{ $value->data['pengangguran'] }}</td>
                                <td align="right">{{ $value->data['gelandangan'] }}</td>
                                <td align="right">{{ $value->data['pengemis'] }}</td>
                                <td align="right">{{ $value->data['manula'] }}</td>
                                <td align="right">{{ $value->data['orang_gila'] }}</td>
                                <td align="right">{{ $value->data['cacat'] }}</td>
                                <td align="right">{{ $value->data['kelainan'] }}</td>
                                <td align="right">{{ $value->data['emperan'] }}</td>
                                <td align="right">{{ $value->data['kumuh'] }}</td>
                                <td align="right">{{ $value->data['jompo'] }}</td>
                                <td align="right">{{ $value->data['asuhan'] }}</td>
                                <td align="right">{{ $value->data['rumah_singgah'] }}</td>
                                <td align="right">{{ $value->data['taman_kota'] }}</td>
                                <td align="right">{{ $value->data['bantaran_sungai'] }}</td>
                                <td align="right">{{ $value->data['rel_kereta'] }}</td>
                                <td align="right">{{ $value->data['liar'] }}</td>
                                <td align="right">{{ $value->data['primitif'] }}</td>
                                <td align="right">{{ $value->data['yatim'] }}</td>
                                <td align="right">{{ $value->data['piatu'] }}</td>
                                <td align="right">{{ $value->data['yatim_piatu'] }}</td>
                                <td align="right">{{ $value->data['janda'] }}</td>
                                <td align="right">{{ $value->data['sd'] }}</td>
                                <td align="right">{{ $value->data['sltp'] }}</td>
                                <td align="right">{{ $value->data['slta'] }}</td>
                                <td align="right">{{ $value->data['anak_bekerja'] }}</td>
                                <td align="right">{{ $value->data['perempuan_kepala'] }}</td>
                                <td align="right">{{ $value->data['napi'] }}</td>
                                <td align="right">{{ $value->data['banjir'] }}</td>
                                <td align="right">{{ $value->data['gunung'] }}</td>
                                <td align="right">{{ $value->data['tsunami'] }}</td>
                                <td align="right">{{ $value->data['gempa'] }}</td>
                                <td align="right">{{ $value->data['kebakaran'] }}</td>
                                <td align="right">{{ $value->data['kekeringan'] }}</td>
                                <td align="right">{{ $value->data['longsor'] }}</td>
                                <td align="right">{{ $value->data['hutan'] }}</td>
                                <td align="right">{{ $value->data['kelaparan'] }}</td>
                                <td align="right">{{ $value->data['air_bersih'] }}</td>
                                <td align="right">{{ $value->data['tandus'] }}</td>
                                <td align="right">{{ $value->data['padat'] }}</td>
                                <td align="right">{{ $value->data['pendatang'] }}</td>
                                <td align="right">{{ $value->data['musiman'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td align="center" colspan="45">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
