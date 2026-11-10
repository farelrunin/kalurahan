<div class="box box-info">
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="#">Potensi Umum
                <span class="pull-right">
                    <i class="fa fa-{{ in_array('potensi-umum', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span>
            </a>
            <ul class="nav-menu collapse {{ in_array('potensi-umum', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'batas_wilayah',
                ])><a href="{{ ci_route('prodeskel.batasWilayah') }}">Batas Wilayah</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#">Potensi Sumber Daya Alam
                <span class="pull-right">
                    <i class="fa fa-{{ in_array('potensi-sda', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span>
            </a>
            <ul class="nav-menu collapse {{ in_array('potensi-sda', $activeMenu) ? 'in' : '' }}">
                <li @class(['nav-item' => true, 'active' => $childMenu == 'jenis_lahan'])><a href="{{ ci_route('prodeskel.jenisLahan') }}">Jenis Lahan</a></li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'iklim'])><a href="{{ ci_route('prodeskel.iklim') }}">Iklim, Tanah & Erosi</a>
                </li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'topografi'])><a href="{{ ci_route('prodeskel.topografi') }}">Topografi</a></li>
                <li class="nav-item">
                    <a href="#">Potensi Pertanian
                        <span class="pull-right">
                            <i class="fa fa-{{ in_array('potensi-pertanian', $activeMenu) ? 'minus' : 'plus' }}"></i>
                        </span>
                    </a>
                    <ul class="nav-menu collapse {{ in_array('potensi-pertanian', $activeMenu) ? 'in' : '' }}">
                        <li class="nav-item">
                            <a href="#">Tanaman Pangan
                                <span class="pull-right">
                                    <i class="fa fa-{{ in_array('potensi-pertanian-tanaman-pangan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                                </span>
                            </a>
                            <ul class="nav-menu collapse {{ in_array('potensi-pertanian-tanaman-pangan', $activeMenu) ? 'in' : '' }}">
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'kepemilikan_lahan',
                                ])><a href="{{ ci_route('prodeskel.kepemilikanLahan') }}">Kepemilikan Lahan</a></li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'hasil_produksi_pangan',
                                ])><a href="{{ ci_route('prodeskel.hasilProduksiPangan') }}">Hasil dan Luas
                                        Produksi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#">Tanaman Buah - Buahan
                                <span class="pull-right">
                                    <i class="fa fa-{{ in_array('potensi-pertanian-tanaman-buah', $activeMenu) ? 'minus' : 'plus' }}"></i>
                                </span>
                            </a>
                            <ul class="nav-menu collapse {{ in_array('potensi-pertanian-tanaman-buah', $activeMenu) ? 'in' : '' }}">
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'kepemilikan_lahan_buah',
                                ])><a href="{{ ci_route('prodeskel.kepemilikanLahanBuah') }}">Kepemilikan Lahan</a>
                                </li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'hasil_produksi_buah',
                                ])><a href="{{ ci_route('prodeskel.hasilProduksiBuah') }}">Hasil dan Luas
                                        Produksi</a></li>
                            </ul>
                        </li>
                        <li @class(['nav-item' => true, 'active' => $childMenu == 'apotik_hidup'])><a href="{{ ci_route('prodeskel.apotikHidup') }}">Apotik
                                Hidup</a></li>
                        <li class="nav-item">
                            <a href="#">Perkebunan
                                <span class="pull-right">
                                    <i class="fa fa-{{ in_array('potensi-pertanian-tanaman-kebun', $activeMenu) ? 'minus' : 'plus' }}"></i>
                                </span>
                            </a>
                            <ul class="nav-menu collapse {{ in_array('potensi-pertanian-tanaman-kebun', $activeMenu) ? 'in' : '' }}">
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'kepemilikan_lahan_kebun',
                                ])><a href="{{ ci_route('prodeskel.kepemilikanLahanKebun') }}">Kepemilikan Lahan</a>
                                </li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'hasil_produksi_kebun',
                                ])><a href="{{ ci_route('prodeskel.hasilProduksiKebun') }}">Hasil dan Luas
                                        Produksi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#">Kehutanan
                                <span class="pull-right">
                                    <i class="fa fa-{{ in_array('potensi-pertanian-kehutanan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                                </span>
                            </a>
                            <ul class="nav-menu collapse {{ in_array('potensi-pertanian-kehutanan', $activeMenu) ? 'in' : '' }}">
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'kepemilikan_lahan_hutan',
                                ])><a href="{{ ci_route('prodeskel.kepemilikanLahanHutan') }}">Kepemilikan Lahan</a>
                                </li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'hasil_hutan',
                                ])><a href="{{ ci_route('prodeskel.hasilHutan') }}">Hasil Hutan</a></li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'kondisi_hutan',
                                ])><a href="{{ ci_route('prodeskel.kondisiHutan') }}">Kondisi Hutan</a></li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'dampak_pengolahan_hutan',
                                ])><a href="{{ ci_route('prodeskel.dampakPengolahanHutan') }}">Dampak Pengolahan
                                        Hutan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#">Peternakan
                                <span class="pull-right">
                                    <i class="fa fa-{{ in_array('potensi-jenis-populasi-ternak', $activeMenu) ? 'minus' : 'plus' }}"></i>
                                </span>
                            </a>
                            <ul class="nav-menu collapse {{ in_array('potensi-jenis-populasi-ternak', $activeMenu) ? 'in' : '' }}">
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'jenis_populasi_ternak',
                                ])><a href="{{ ci_route('prodeskel.jenisPopulasiTernak') }}">Jenis Populasi
                                        Ternak</a></li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'produksi_peternakan',
                                ])><a href="{{ ci_route('prodeskel.produksiPeternakan') }}">Produksi Peternakan</a>
                                </li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'lahan_pakan_ternak',
                                ])><a href="{{ ci_route('prodeskel.lahanPakanTernak') }}">Lahan dan Pakan Ternak</a>
                                </li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'pengolahan_hasil_ternak',
                                ])><a href="{{ ci_route('prodeskel.pengolahanHasilTernak') }}">Pengolahan Hasil
                                        Ternak</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#">Perikanan
                                <span class="pull-right">
                                    <i class="fa fa-{{ in_array('potensi-produksi-ikan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                                </span>
                            </a>
                            <ul class="nav-menu collapse {{ in_array('potensi-produksi-ikan', $activeMenu) ? 'in' : '' }}">
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'produksi_perikanan',
                                ])><a href="{{ ci_route('prodeskel.produksiPerikanan') }}">Jenis dan Produksi
                                        Ikan</a></li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'alat_produksi_ikan_tawar',
                                ])><a href="{{ ci_route('prodeskel.alatProduksiIkanTawar') }}">Alat Produksi Budidaya
                                        Ikan Air Tawar</a></li>
                                <li @class([
                                    'nav-item' => true,
                                    'active' => $childMenu == 'alat_produksi_ikan_laut',
                                ])><a href="{{ ci_route('prodeskel.alatProduksiIkanLaut') }}">Alat Produksi Budidaya
                                        Ikan Air Laut</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'deposit_produksi_galian',
                ])><a href="{{ ci_route('prodeskel.depositProduksiGalian') }}">Deposit
                        dan Produksi bahan Galian</a></li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sumberdaya_air',
                ])>
                    <a href="#">Sumber Daya Air
                        <span class="pull-right">
                            <i class="fa fa-{{ in_array('potensi-sumberdaya-air', $activeMenu) ? 'minus' : 'plus' }}"></i>
                        </span>
                    </a>
                    <ul class="nav-menu collapse {{ in_array('potensi-sumberdaya-air', $activeMenu) ? 'in' : '' }}">
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'pemanfaatan_air',
                        ])><a href="{{ ci_route('prodeskel.pemanfaatanAir') }}">Potensi
                                dan Pemanfaatan</a></li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'sumber_air',
                        ])><a href="{{ ci_route('prodeskel.sumberAir') }}">Sumber Air
                                Bersih</a></li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'kualitas_air',
                        ])><a href="{{ ci_route('prodeskel.kualitasAir') }}">Kualitas
                                Air</a></li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'air_panas',
                        ])><a href="{{ ci_route('prodeskel.airPanas') }}">Air Panas</a>
                        </li>
                    </ul>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'kualitas_udara',
                ])><a href="{{ ci_route('prodeskel.kualitasUdara') }}">Kualitas
                        Udara</a></li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'kebisingan'])><a href="{{ ci_route('prodeskel.kebisingan') }}">Kebisingan</a></li>
                <li @class(['nav-item' => true, 'active' => $childMenu == 'ruang_publik'])><a href="{{ ci_route('prodeskel.ruangPublik') }}">Ruang
                        Publik/Taman</a></li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'potensi_wisata',
                ])><a href="{{ ci_route('prodeskel.potensiWisata') }}">Potensi
                        Wisata</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#">Potensi Sumber Daya Manusia
                <span class="pull-right">
                    <i class="fa fa-{{ in_array('potensi-sdm', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span>
            </a>
            <ul class="nav-menu collapse {{ in_array('potensi-sdm', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_jumlah',
                ])><a href="{{ ci_route('prodeskel.sdmJumlah') }}">Jumlah</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_usia',
                ])><a href="{{ ci_route('prodeskel.sdmUsia') }}">Usia</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_pendidikan',
                ])><a href="{{ ci_route('prodeskel.sdmPendidikan') }}">Pendidikan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_pekerjaan',
                ])><a href="{{ ci_route('prodeskel.sdmPekerjaan') }}">Mata Pencaharian Pokok</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_agama',
                ])><a href="{{ ci_route('prodeskel.sdmAgama') }}">Agama</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_warganegara',
                ])><a href="{{ ci_route('prodeskel.sdmWarganegara') }}">Kewarganegaraan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_suku',
                ])><a href="{{ ci_route('prodeskel.sdmSuku') }}">Etnis/Suku</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_cacat',
                ])><a href="{{ ci_route('prodeskel.sdmCacat') }}">Cacat Mental dan Fisik</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_tenagakerja',
                ])><a href="{{ ci_route('prodeskel.sdmTenagakerja') }}">Tenaga Kerja</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sdm_kualitas',
                ])><a href="{{ ci_route('prodeskel.sdmKualitas') }}">Kualitas Angkatan Kerja</a>
                </li>
            </ul>
        </li>
        <li @class([
            'nav-item' => true,
            'active' => $childMenu == 'potensi_kelembagaan',
        ])><a href="#">Potensi Kelembagaan
                <span class="pull-right">
                    <i class="fa fa-{{ in_array('potensi-kelembagaan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span>
            </a>
            <ul class="nav-menu collapse {{ in_array('potensi-kelembagaan', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'lembaga_pemerintah',
                ])><a href="{{ ci_route('prodeskel.lembagaPemerintah') }}">Lembaga Pemerintah</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'lembaga_kemasyarakatan',
                ])><a href="{{ ci_route('prodeskel.lembagaKemasyarakatan') }}">Lembaga Kemasyarakatan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'partisipasi_politik',
                ])><a href="{{ ci_route('prodeskel.partisipasiPolitik') }}">Partisipasi Politik</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'lembaga_ekonomi',
                ])><a href="{{ ci_route('prodeskel.lembagaEkonomi') }}">Lembaga Ekonomi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'jasa_pengangkutan',
                ])><a href="{{ ci_route('prodeskel.jasaPengangkutan') }}">Usaha Jasa Pengangkutan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'jasa_hiburan',
                ])><a href="{{ ci_route('prodeskel.jasaHiburan') }}">Usaha Jasa, Hiburan DLL</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'lembaga_pendidikan',
                ])><a href="{{ ci_route('prodeskel.lembagaPendidikan') }}">Lembaga Pendidikan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'lembaga_adat',
                ])><a href="{{ ci_route('prodeskel.lembagaAdat') }}">Lembaga Adat</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'lembaga_keamanan',
                ])><a href="{{ ci_route('prodeskel.lembagaKeamanan') }}">Lembaga Keamanan</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#">Potensi Prasarana-Sarana
                <span class="pull-right">
                    <i class="fa fa-{{ in_array('potensi-sarana', $activeMenu) ? 'minus' : 'plus' }}"></i>
                </span>
            </a>
            <ul class="nav-menu collapse {{ in_array('potensi-sarana', $activeMenu) ? 'in' : '' }}">
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'transportasi_darat',
                ])><a href="{{ ci_route('prodeskel.transportasiDarat') }}">Prasarana Transportasi Darat</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'angkutan_lainnya',
                ])><a href="{{ ci_route('prodeskel.angkutanLainnya') }}">Prasarana dan Sarana Angkutan Lainnya</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'komunikasi_informasi',
                ])><a href="{{ ci_route('prodeskel.komunikasiInformasi') }}">Prasarana Komunikasi dan Informasi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'air_bersih',
                ])><a href="{{ ci_route('prodeskel.airBersih') }}">Prasarana Air Bersih</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sanitasi',
                ])><a href="{{ ci_route('prodeskel.sanitasi') }}">Prasarana Sanitasi</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'irigasi',
                ])><a href="{{ ci_route('prodeskel.prasaranaIrigasi') }}">Prasarana Kondisi Irigasi</a>
                </li>
                <li class="nav-item">
                    <a href="#">Prasarana dan Sarana Pemerintahan
                        <span class="pull-right">
                            <i class="fa fa-{{ in_array('potensi-sarana-pemerintahan', $activeMenu) ? 'minus' : 'plus' }}"></i>
                        </span>
                    </a>
                    <ul class="nav-menu collapse {{ in_array('potensi-sarana-pemerintahan', $activeMenu) ? 'in' : '' }}">
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'sarana_desa',
                        ])><a href="{{ ci_route('prodeskel.saranaDesa') }}">Desa/Kelurahan</a>
                        </li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'badan_perwakilan_desa',
                        ])><a href="{{ ci_route('prodeskel.badanPerwakilanDesa') }}">Badan Perwakilan Desa</a>
                        </li>
                        <li @class([
                            'nav-item' => true,
                            'active' => $childMenu == 'sarana_dusun',
                        ])><a href="{{ ci_route('prodeskel.saranaDusun') }}">Dusun atau Sebutan Lainnya</a>
                        </li>
                    </ul>
                </li>

                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'prasarana_lembaga_kemasyarakatan',
                ])><a href="{{ ci_route('prodeskel.prasaranaLembagaKemasyarakatan') }}">Prasarana Lembaga Kemasyarakatan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'prasarana_peribadatan',
                ])><a href="{{ ci_route('prodeskel.prasaranaPeribadatan') }}">Prasarana Peribadatan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana_olahraga',
                ])><a href="{{ ci_route('prodeskel.saranaOlahraga') }}">Prasarana Olahraga</a>
                </li>

                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'prasarana_kesehatan',
                ])><a href="{{ ci_route('prodeskel.prasaranaKesehatan') }}">Prasarana Kesehatan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana_kesehatan',
                ])><a href="{{ ci_route('prodeskel.saranaKesehatan') }}">Sarana Kesehatan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana_pendidikan',
                ])><a href="{{ ci_route('prodeskel.saranaPendidikan') }}">Prasarana dan Sarana Pendidikan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana_energi',
                ])><a href="{{ ci_route('prodeskel.saranaEnergi') }}">Prasarana Energi dan Penerangan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana_wisata',
                ])><a href="{{ ci_route('prodeskel.saranaWisata') }}">Prasarana Wisata dan Hiburan</a>
                </li>
                <li @class([
                    'nav-item' => true,
                    'active' => $childMenu == 'sarana_kebersihan',
                ])><a href="{{ ci_route('prodeskel.saranaKebersihan') }}">Prasarana Kebersihan</a>
                </li>
            </ul>
        </li>
    </ul>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.nav-menu > li.nav-item > a').on('click', function(e) {
                $(this).find('i').toggleClass('fa-plus fa-minus');
                $(this).parent().toggleClass('collapsed');
                $(this).next().collapse('toggle');
                if ($(this).attr('href') == '#') {
                    e.preventDefault();
                }

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
