<div class="box box-info">
    <ul class="nav-menu">
        <li class="nav-item"> <a href="#">Perkembangan Kependudukan <span class="pull-right"> <i class="fa fa-{{ in_array('perkembangan-kependudukan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('perkembangan-kependudukan', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'penduduk-dan-kepala-keluarga',
                ])><a href="{{ ci_route('prodeskel.pendudukDanKepalaKeluarga') }}">Penduduk
                        dan Kepala Keluarga</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Ekonomi Masyarakat <span class="pull-right"> <i class="fa fa-{{ in_array('ekonomi-masyarakat', $activeMenu) ? 'minus' : 'plus' }}"></i> </span>
            </a>
            <ul class="nav-menu collapse {{ in_array('ekonomi-masyarakat', $activeMenu) ? 'in' : '' }}">
                <li @class(['nav-item' => true, 'active' => $childMenu == 'pengangguran'])><a href="{{ ci_route('prodeskel.pengangguran') }}">Pengangguran</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kesejahteraan-keluarga',
                ])><a href="{{ ci_route('prodeskel.kesejahteraanKeluarga') }}">Kesejahteraan Keluarga</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Produk Domestik Desa Bruto <span class="pull-right"> <i class="fa fa-{{ in_array('produk-domestik-desa-bruto', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('produk-domestik-desa-bruto', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-pertambangan-dan-galian',
                ])><a href="{{ ci_route('prodeskel.sektorPertambanganDanGalian') }}">Sektor Pertambangan dan
                        Galian</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'subsektor-kerajinan',
                ])><a href="{{ ci_route('prodeskel.subsektorKerajinan') }}">Subsektor
                        Kerajinan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-industri-pengolahan',
                ])><a href="{{ ci_route('prodeskel.sektorIndustriPengolahan') }}">Sektor
                        Industri Pengolahan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'subsektor-kehutanan',
                ])><a href="{{ ci_route('prodeskel.subsektorKehutanan') }}">Subsektor
                        Kehutanan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-perdagangan-hotel-dan-restoran',
                ])><a href="{{ ci_route('prodeskel.sektorPerdaganganHotelDanRestoran') }}">Sektor Perdagangan, Hotel
                        dan Restoran</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-bangunan-konstruksi',
                ])><a href="{{ ci_route('prodeskel.sektorBangunanKonstruksi') }}">Sektor
                        Bangunan Konstruksi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-keuangan-jasa-perusahaan',
                ])><a href="{{ ci_route('prodeskel.sektorKeuanganJasaPerusahaan') }}">Sektor Keuangan - Jasa
                        Perusahaan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-jasa-jasa',
                ])><a href="{{ ci_route('prodeskel.sektorJasaJasa') }}">Sektor
                        Jasa-Jasa</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-angkutan-dan-komunikasi',
                ])><a href="{{ ci_route('prodeskel.sektorAngkutanDanKomunikasi') }}">Sektor Angkutan dan
                        Komunikasi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-listrik-gas-dan-air-minum',
                ])><a href="{{ ci_route('prodeskel.sektorListrikGasDanAirMinum') }}">Sektor Listrik, Gas dan Air
                        Minum</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Pendapatan Perkapita <span class="pull-right"> <i class="fa fa-{{ in_array('pendapatan-perkapita', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('pendapatan-perkapita', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'menurut-sektor-usaha',
                ])><a href="{{ ci_route('prodeskel.menurutSektorUsaha') }}">Menurut
                        Sektor Usaha</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pendapatan-riil-keluarga',
                ])><a href="{{ ci_route('prodeskel.pendapatanRiilKeluarga') }}">Pendapatan Riil Keluarga</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Struktur Mata Pencaharian Menurut Sektor <span class="pull-right"> <i class="fa fa-{{ in_array('struktur-mata-pencaharian-menurut-sektor', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('struktur-mata-pencaharian-menurut-sektor', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-pertanian',
                ])><a href="{{ ci_route('prodeskel.sektorPertanian') }}">Sektor
                        Pertanian</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-perkebunan',
                ])><a href="{{ ci_route('prodeskel.sektorPerkebunan') }}">Sektor
                        Perkebunan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-peternakan',
                ])><a href="{{ ci_route('prodeskel.sektorPeternakan') }}">Sektor
                        Peternakan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-perikanan',
                ])><a href="{{ ci_route('prodeskel.sektorPerikanan') }}">Sektor
                        Perikanan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-kehutanan',
                ])><a href="{{ ci_route('prodeskel.sektorKehutanan') }}">Sektor
                        Kehutanan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-pertambangan',
                ])><a href="{{ ci_route('prodeskel.sektorPertambangan') }}">Sektor
                        Pertambangan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-perdagangan',
                ])><a href="{{ ci_route('prodeskel.sektorPerdagangan') }}">Sektor
                        Perdagangan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-industri-kecil-dan-kerajinan-rt',
                ])><a href="{{ ci_route('prodeskel.sektorIndustriKecilDanKerajinanRt') }}">Sektor Industri Kecil dan
                        Kerajinan RT</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sektor-industri-menengah-dan-besar',
                ])><a href="{{ ci_route('prodeskel.sektorIndustriMenengahDanBesar') }}">Sektor Industri Menengah dan
                        Besar</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'sektor-jasa'])><a href="{{ ci_route('prodeskel.sektorJasa') }}">Sektor Jasa</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Penguasaan Aset Ekonomi Masyarakat <span class="pull-right"> <i class="fa fa-{{ in_array('penguasaan-aset-ekonomi-masyarakat', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('penguasaan-aset-ekonomi-masyarakat', $activeMenu) ? 'in' : '' }}">
                <li @class(['nav-item' => true, 'active' => $childMenu == 'aset-tanah'])><a href="{{ ci_route('prodeskel.asetTanah') }}">Aset Tanah</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana-transportasi-umum',
                ])><a href="{{ ci_route('prodeskel.saranaTransportasiUmum') }}">Sarana
                        Transportasi Umum</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana-produksi',
                ])><a href="{{ ci_route('prodeskel.saranaProduksi') }}">Sarana
                        Produksi</a>
                </li>

                <li class="nav-item"> <a href="#">Aset Perumahan <span class="pull-right"> <i class="fa fa-{{ in_array('aset-perumahan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                        </span> </a>
                    <ul class="nav-menu collapse {{ in_array('aset-perumahan', $activeMenu) ? 'in' : '' }}">
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'rumah-menurut-dinding',
                        ])><a href="{{ ci_route('prodeskel.rumahMenurutDinding') }}">Rumah Menurut Dinding</a>
                        </li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'rumah-menurut-lantai',
                        ])><a href="{{ ci_route('prodeskel.rumahMenurutLantai') }}">Rumah Menurut Lantai</a>
                        </li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'rumah-menurut-atap',
                        ])><a href="{{ ci_route('prodeskel.rumahMenurutAtap') }}">Rumah
                                Menurut Atap</a>
                        </li>

                    </ul>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pemilikan-aset-ekonomi-lainnya',
                ])><a href="{{ ci_route('prodeskel.pemilikanAsetEkonomiLainnya') }}">Pemilikan Aset Ekonomi
                        Lainnya</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Pendidikan Masyarakat <span class="pull-right"> <i class="fa fa-{{ in_array('pendidikan-masyarakat', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('pendidikan-masyarakat', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'tingkat-pendidikan-masyarakat',
                ])><a href="{{ ci_route('prodeskel.tingkatPendidikanMasyarakat') }}">Tingkat Pendidikan
                        Masyarakat</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'wajib-belajar-9-tahun',
                ])><a href="{{ ci_route('prodeskel.wajibBelajar9Tahun') }}">Wajib
                        Belajar 9 Tahun</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'rasio-guru-dan-murid',
                ])><a href="{{ ci_route('prodeskel.rasioGuruDanMurid') }}">Rasio Guru
                        dan Murid</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kelembagaan-pendidikan-masyarakat',
                ])><a href="{{ ci_route('prodeskel.kelembagaanPendidikanMasyarakat') }}">Kelembagaan Pendidikan
                        Masyarakat</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Kesehatan Masyarakat <span class="pull-right"> <i class="fa fa-{{ in_array('kesehatan-masyarakat', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('kesehatan-masyarakat', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kualitas-ibu-hamil',
                ])><a href="{{ ci_route('prodeskel.kualitasIbuHamil') }}">Kualitas Ibu
                        Hamil</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kualitas-bayi',
                ])><a href="{{ ci_route('prodeskel.kualitasBayi') }}">Kualitas Bayi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kualitas-persalinan',
                ])><a href="{{ ci_route('prodeskel.kualitasPersalinan') }}">Kualitas
                        Persalinan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'cakupan-imunisasi',
                ])><a href="{{ ci_route('prodeskel.cakupanImunisasi') }}">Cakupan
                        Imunisasi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pasangan-usia-subur-dan-kb',
                ])><a href="{{ ci_route('prodeskel.pasanganUsiaSuburDanKb') }}">Pasangan
                        Usia Subur dan KB</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'wabah-penyakit',
                ])><a href="{{ ci_route('prodeskel.wabahPenyakit') }}">Wabah
                        Penyakit</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'angka-harapan-hidup',
                ])><a href="{{ ci_route('prodeskel.angkaHarapanHidup') }}">Angka Harapan
                        Hidup</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'cakupan-pemenuhan-kebutuhan-air-bersih',
                ])><a href="{{ ci_route('prodeskel.cakupanPemenuhanKebutuhanAirBersih') }}">Cakupan Pemenuhan
                        Kebutuhan Air Bersih</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'perilaku-hidup-bersih-dan-sehat',
                ])><a href="{{ ci_route('prodeskel.perilakuHidupBersihDanSehat') }}">Perilaku Hidup Bersih dan
                        Sehat</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'status-gizi-balita',
                ])><a href="{{ ci_route('prodeskel.statusGiziBalita') }}">Status Gizi
                        Balita</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'penderita-sakit',
                ])><a href="{{ ci_route('prodeskel.penderitaSakit') }}">Penderita
                        Sakit</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'perkembangan-sarana-dan-prasarana',
                ])><a href="{{ ci_route('prodeskel.perkembanganSaranaDanPrasarana') }}">Perkembangan Sarana dan
                        Prasarana</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Keamanan dan Ketertiban <span class="pull-right"> <i class="fa fa-{{ in_array('keamanan-dan-ketertiban', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('keamanan-dan-ketertiban', $activeMenu) ? 'in' : '' }}">
                <li @class(['nav-item' => true, 'active' => $childMenu == 'konflik-sara'])><a href="{{ ci_route('prodeskel.konflikSara') }}">Konflik SARA</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'perkelahian'])><a href="{{ ci_route('prodeskel.perkelahian') }}">Perkelahian</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'pencurian'])><a href="{{ ci_route('prodeskel.pencurian') }}">Pencurian</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'penjarahan-dan-penyerobotan-tanah',
                ])><a href="{{ ci_route('prodeskel.penjarahanDanPenyerobotanTanah') }}">Penjarahan dan Penyerobotan
                        Tanah</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'perjudian-penipuan-dan-penggelapan',
                ])><a href="{{ ci_route('prodeskel.perjudianPenipuanDanPenggelapan') }}">Perjudian, Penipuan dan
                        Penggelapan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pemakaian-miras-dan-narkoba',
                ])><a href="{{ ci_route('prodeskel.pemakaianMirasDanNarkoba') }}">Pemakaian Miras dan Narkoba</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'prostitusi'])><a href="{{ ci_route('prodeskel.prostitusi') }}">Prostitusi</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'pembunuhan'])><a href="{{ ci_route('prodeskel.pembunuhan') }}">Pembunuhan</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'penculikan'])><a href="{{ ci_route('prodeskel.penculikan') }}">Penculikan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kejahatan-seksual',
                ])><a href="{{ ci_route('prodeskel.kejahatanSeksual') }}">Kejahatan
                        Seksual</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'masalah-kesejahteraan-sosial',
                ])><a href="{{ ci_route('prodeskel.masalahKesejahteraanSosial') }}">Masalah Kesejahteraan Sosial</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kekerasan-dalam-rumah-tangga',
                ])><a href="{{ ci_route('prodeskel.kekerasanDalamRumahTangga') }}">Kekerasan Dalam Rumah Tangga</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'teror-dan-intimidasi',
                ])><a href="{{ ci_route('prodeskel.terorDanIntimidasi') }}">Teror dan
                        Intimidasi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pelembagaan-sistem-keamanan',
                ])><a href="{{ ci_route('prodeskel.pelembagaanSistemKeamanan') }}">Pelembagaan Sistem Keamanan</a>
                </li>

            </ul>
        </li>
        <li class="nav-item"> <a href="#">Kedaulatan Politik Masyarakat <span class="pull-right"> <i class="fa fa-{{ in_array('kedaulatan-politik-masyarakat', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('kedaulatan-politik-masyarakat', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kesadaran-berbangsa-dan-bernegara',
                ])><a href="{{ ci_route('prodeskel.kesadaranBerbangsaDanBernegara') }}">Kesadaran Berbangsa dan
                        Bernegara</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kesadaran-membayar-pajak-dan-retribusi',
                ])><a href="{{ ci_route('prodeskel.kesadaranMembayarPajakDanRetribusi') }}">Kesadaran Membayar Pajak
                        dan Retribusi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'perkembangan-partisipasi-politik',
                ])><a href="{{ ci_route('prodeskel.perkembanganPartisipasiPolitik') }}">Partisipasi
                        Politik</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Peranserta Masyarakat dalam Pembangunan <span class="pull-right"> <i class="fa fa-{{ in_array('peranserta-masyarakat-dalam-pembangunan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('peranserta-masyarakat-dalam-pembangunan', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'musrenbang-desa-kelurahan',
                ])><a href="{{ ci_route('prodeskel.musrenbangDesaKelurahan') }}">Musrenbang Desa/Kelurahan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pelaksanaan-dan-pelestarian-hasil-pembangunan',
                ])><a href="{{ ci_route('prodeskel.pelaksanaanDanPelestarianHasilPembangunan') }}">Pelaksanaan dan
                        Pelestarian Hasil
                        Pembangunan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'semangat-kegotongroyongan-penduduk',
                ])><a href="{{ ci_route('prodeskel.semangatKegotongroyonganPenduduk') }}">Semangat Kegotongroyongan
                        Penduduk</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'adat-istiadat',
                ])><a href="{{ ci_route('prodeskel.adatIstiadat') }}">Adat Istiadat</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sikap-dan-mental-masyarakat',
                ])><a href="{{ ci_route('prodeskel.sikapDanMentalMasyarakat') }}">Sikap
                        dan Mental Masyarakat</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Lembaga Kemasyarakatan <span class="pull-right"> <i class="fa fa-{{ in_array('lembaga-kemasyarakatan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('lembaga-kemasyarakatan', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'organisasi-lembaga-kemasyarakatan',
                ])><a href="{{ ci_route('prodeskel.organisasiLembagaKemasyarakatan') }}">Organisasi Lembaga
                        Kemasyarakatan</a>
                </li>
            </ul>
        </li>
        <li class="nav-item"> <a href="#">Pemerintahan Desa dan Kelurahan <span class="pull-right"> <i class="fa fa-{{ in_array('pemerintahan-desa-dan-kelurahan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span> </a>
            <ul class="nav-menu collapse {{ in_array('pemerintahan-desa-dan-kelurahan', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'apb-desa-dan-anggaran-kelurahan',
                ])><a href="{{ ci_route('prodeskel.apbDesaDanAnggaranKelurahan') }}">APB-Desa dan Anggaran
                        Kelurahan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pertanggungjawaban-kepala-desa-lurah',
                ])><a href="{{ ci_route('prodeskel.pertanggungjawabanKepalaDesaLurah') }}">Pertanggungjawaban
                        Kepala Desa Lurah</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pembinaan-pemerintah-pusat',
                ])><a href="{{ ci_route('prodeskel.pembinaanPemerintahPusat') }}">Pembinaan Pemerintah Pusat</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pembinaan-pemerintah-provinsi-',
                ])><a href="{{ ci_route('prodeskel.pembinaanPemerintahProvinsi') }}">Pembinaan Pemerintah Provinsi
                    </a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pembinaan-pemerintah-kabupaten-kota',
                ])><a href="{{ ci_route('prodeskel.pembinaanPemerintahKabupatenKota') }}">Pembinaan Pemerintah
                        Kabupaten Kota</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'pembinaan-dan-pengawasan-camat',
                ])><a href="{{ ci_route('prodeskel.pembinaanDanPengawasanCamat') }}">Pembinaan dan Pengawasan
                        Camat</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Set ikon default sebagai "fa-plus" untuk semua menu kecuali yang aktif
            $('.nav-menu > li.nav-item > a').each(function() {
                let $icon = $(this).find('i');
                let $parent = $(this).parent();
                let $submenu = $(this).next('.collapse');

                // Jika menu aktif saat halaman dimuat, set ikon menjadi minus (-)
                if ($submenu.hasClass('in')) {
                    $icon.removeClass('fa-plus').addClass('fa-minus');
                    $parent.addClass('collapsed');
                } else {
                    $icon.removeClass('fa-minus').addClass('fa-plus');
                }
            });

            // Event handler ketika menu diklik
            $('.nav-menu > li.nav-item > a').on('click', function(e) {
                let $icon = $(this).find('i');
                let $parent = $(this).parent();
                let $submenu = $(this).next('.collapse');

                // Jika menu punya sub-menu, cegah klik & toggle ikon
                if ($submenu.length > 0) {
                    e.preventDefault();

                    // Jika submenu sedang terbuka, ubah ikon menjadi plus (+), jika tertutup ubah menjadi minus (-)
                    if ($parent.hasClass('collapsed')) {
                        $icon.removeClass('fa-minus').addClass('fa-plus');
                    } else {
                        $icon.removeClass('fa-plus').addClass('fa-minus');
                    }

                    // Toggle class "collapsed" & tampilkan/sembunyikan sub-menu
                    $parent.toggleClass('collapsed');
                    $submenu.collapse('toggle');
                }
            });
        });
    </script>
@endpush

@push('css')
    <style type="text/css">
        .nav-menu {
            list-style: none;
            padding: 2px;
            margin: 0;
        }

        .nav-menu .nav-item {
            position: relative;
            padding: 0 0 0 2em;
            line-height: 2em;
        }

        /* Styling untuk link menu */
        .nav-menu .nav-item > a {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Ikon tetap di kanan */
            padding: 5px;
            text-decoration: none;
        }

        .nav-menu .nav-item:before {
            content: "";
            position: absolute;
            top: 0.5em;
            left: 0.5em;
            width: 1em;
            height: 1em;
            background: url('/assets/images/folder.svg') no-repeat;
            background-size: contain;
        }

        .nav-menu .nav-item.collapsed:before {
            background-image: url('/assets/images/folder.svg');
        }

        .nav-item.active a {
            font-size: 100%;
            font-weight: 700;
            color: #a94442;
            width: 100%;
        }
    </style>
@endpush
