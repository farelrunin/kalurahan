<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

namespace Modules\Prodeskel\Libraries;

use Illuminate\Support\Collection;
use Modules\Prodeskel\Enums\JenisAtapEnum;
use Modules\Prodeskel\Enums\JenisDindingEnum;
use Modules\Prodeskel\Enums\JenisLantaiEnum;
use Modules\Prodeskel\Enums\JenisOrganisasiEnum;
use Modules\Prodeskel\Enums\JenisPenyakitEnum;

defined('BASEPATH') || exit('No direct script access allowed');

class Perkembangan
{
    private $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function convert()
    {
        $batasWilayah            = $this->data['batas-wilayah'] ? $this->data['batas-wilayah']->sortByDesc('bulan')->first()->data : [];
        $jumlahPenduduk          = $this->data['penduduk-kepalakeluarga'] ? $this->data['penduduk-kepalakeluarga']->sortByDesc('bulan')->first()->data : [];
        $pengangguran            = $this->data['pengangguran'] ? $this->data['pengangguran']->sortByDesc('bulan')->first()->data : [];
        $kesejahteraanKeluarga   = $this->data['kesejahteraan-keluarga'] ? $this->data['kesejahteraan-keluarga']->sortByDesc('bulan')->first()->data : [];
        $pertambanganGalian      = $this->data['sektor-pertambangan-dan-galian'] ? $this->data['sektor-pertambangan-dan-galian']->sortByDesc('bulan')->first()->data : [];
        $kerajinan               = $this->data['subsektor-kerajinan'] ? $this->data['subsektor-kerajinan']->sortByDesc('bulan')->first()->data : [];
        $kehutanan               = $this->data['subsektor-kehutanan'] ? $this->data['subsektor-kehutanan']->sortByDesc('bulan')->first()->data : [];
        $perdaganganHotel        = $this->data['sektor-perdagangan-hotel-dan-restoran'] ? $this->data['sektor-perdagangan-hotel-dan-restoran']->sortByDesc('bulan')->first()->data : [];
        $bangunanKonstruksi      = $this->data['subsektor-bangunan-konstruksi'] ? $this->data['subsektor-bangunan-konstruksi']->sortByDesc('bulan')->first()->data : [];
        $keuanganJasa            = $this->data['sektor-keuangan-jasa-perusahaan'] ? $this->data['sektor-keuangan-jasa-perusahaan']->sortByDesc('bulan')->first()->data : [];
        $jasaJasa                = $this->data['sektor-jasa-jasa'] ? $this->data['sektor-jasa-jasa']->sortByDesc('bulan')->first()->data : [];
        $angkutanKomunikasi      = $this->data['sektor-angkutan-dan-komunikasi'] ? $this->data['sektor-angkutan-dan-komunikasi']->sortByDesc('bulan')->first()->data : [];
        $listrikGasAir           = $this->data['sektor-listrik-gas-dan-air-minum'] ? $this->data['sektor-listrik-gas-dan-air-minum']->sortByDesc('bulan')->first()->data : [];
        $pendapatanRiilKeluarga  = $this->data['pendapatan-riil-keluarga'] ? $this->data['pendapatan-riil-keluarga']->sortByDesc('bulan')->first()->data : [];
        $sektorPertanian         = $this->data['sektor-pertanian'] ? $this->data['sektor-pertanian']->sortByDesc('bulan')->first()->data : [];
        $sektorPerkebunan        = $this->data['sektor-perkebunan'] ? $this->data['sektor-perkebunan']->sortByDesc('bulan')->first()->data : [];
        $sektorPeternakan        = $this->data['sektor-peternakan'] ? $this->data['sektor-peternakan']->sortByDesc('bulan')->first()->data : [];
        $sektorPerikanan         = $this->data['sektor-perikanan'] ? $this->data['sektor-perikanan']->sortByDesc('bulan')->first()->data : [];
        $sektorKehutanan         = $this->data['sektor-kehutanan'] ? $this->data['sektor-kehutanan']->sortByDesc('bulan')->first()->data : [];
        $sektorPertambangan      = $this->data['sektor-pertambangan'] ? $this->data['sektor-pertambangan']->sortByDesc('bulan')->first()->data : [];
        $sektorPerdagangan       = $this->data['sektor-perdagangan'] ? $this->data['sektor-perdagangan']->sortByDesc('bulan')->first()->data : [];
        $asetTanah               = $this->data['aset-tanah'] ? $this->data['aset-tanah']->sortByDesc('bulan')->first()->data : [];
        $saranaProduksi          = $this->data['sarana-produksi'] ? $this->data['sarana-produksi']->sortByDesc('bulan')->first()->data : [];
        $rumahMenurutDinding     = $this->data['rumah-menurut-dinding'] ? $this->data['rumah-menurut-dinding']->groupBy('item') : [];
        $dataRumahMenurutDinding = [];
        if ($rumahMenurutDinding) {
            foreach ($rumahMenurutDinding as $key => $item) {
                $dataItem                                                 = $item->sortByDesc('bulan')->first()->data;
                $dataRumahMenurutDinding[JenisDindingEnum::valueOf($key)] = $dataItem['jumlah'];
            }
        }
        $rumahMenurutAtap     = $this->data['rumah-menurut-atap'] ? $this->data['rumah-menurut-atap']->groupBy('item') : [];
        $dataRumahMenurutAtap = [];
        if ($rumahMenurutAtap) {
            foreach ($rumahMenurutAtap as $key => $item) {
                $dataItem                                           = $item->sortByDesc('bulan')->first()->data;
                $dataRumahMenurutAtap[JenisAtapEnum::valueOf($key)] = $dataItem['jumlah'];
            }
        }
        $rumahMenurutLantai     = $this->data['rumah-menurut-lantai'] ? $this->data['rumah-menurut-lantai']->groupBy('item') : [];
        $dataRumahMenurutLantai = [];
        if ($rumahMenurutLantai) {
            foreach ($rumahMenurutLantai as $key => $item) {
                $dataItem                                               = $item->sortByDesc('bulan')->first()->data;
                $dataRumahMenurutLantai[JenisLantaiEnum::valueOf($key)] = $dataItem['jumlah'];
            }
        }

        $tingkatPendidikanMasyarakat        = $this->data['tingkat-pendidikan-masyarakat'] ? $this->data['tingkat-pendidikan-masyarakat']->sortByDesc('bulan')->first()->data : [];
        $wajibBelajar                       = $this->data['wajib-belajar-9-tahun'] ? $this->data['wajib-belajar-9-tahun']->sortByDesc('bulan')->first()->data : [];
        $rasioGuruMurid                     = $this->data['rasio-guru-dan-murid'] ? $this->data['rasio-guru-dan-murid']->sortByDesc('bulan')->first()->data : [];
        $kelembagaanPendidikanMasyarakat    = $this->data['kelembagaan-pendidikan-masyarakat'] ? $this->data['kelembagaan-pendidikan-masyarakat']->sortByDesc('bulan')->first()->data : [];
        $kualitasIbuHamil                   = $this->data['kualitas-ibu-hamil'] ? $this->data['kualitas-ibu-hamil']->sortByDesc('bulan')->first()->data : [];
        $kualitasBayi                       = $this->data['kualitas-bayi'] ? $this->data['kualitas-bayi']->sortByDesc('bulan')->first()->data : [];
        $kualitasPersalinan                 = $this->data['kualitas-persalinan'] ? $this->data['kualitas-persalinan']->sortByDesc('bulan')->first()->data : [];
        $cakupanImunisasi                   = $this->data['cakupan-imunisasi'] ? $this->data['cakupan-imunisasi']->sortByDesc('bulan')->first()->data : [];
        $pasanganUsiaSubur                  = $this->data['pasangan-usia-subur-dan-kb'] ? $this->data['pasangan-usia-subur-dan-kb']->sortByDesc('bulan')->first()->data : [];
        $wabahPenyakit                      = $this->data['wabah-penyakit'] ? $this->data['wabah-penyakit']->sortByDesc('bulan')->first()->data : [];
        $angkaHarapanHidup                  = $this->data['angka-harapan-hidup'] ? $this->data['angka-harapan-hidup']->sortByDesc('bulan')->first()->data : [];
        $cakupanPemenuhanKebutuhanAirBersih = $this->data['cakupan-pemenuhan-kebutuhan-air-bersih'] ? $this->data['cakupan-pemenuhan-kebutuhan-air-bersih']->sortByDesc('bulan')->first()->data : [];
        $perilakuHidupBersihSehat           = $this->data['perilaku-hidup-bersih-dan-sehat'] ? $this->data['perilaku-hidup-bersih-dan-sehat']->sortByDesc('bulan')->first()->data : [];
        $statusGiziBalita                   = $this->data['status-gizi-balita'] ? $this->data['status-gizi-balita']->sortByDesc('bulan')->first()->data : [];
        $penderitaSakit                     = $this->data['penderita-sakit'] ? $this->data['penderita-sakit']->groupBy('item') : [];
        $dataPenderitaSakit                 = [];
        if ($penderitaSakit) {
            foreach ($penderitaSakit as $key => $item) {
                $dataItem                                             = $item->sortByDesc('bulan')->first()->data;
                $dataPenderitaSakit[JenisPenyakitEnum::valueOf($key)] = ['jumlah' => $dataItem['jumlah_penderita'], 'tempat' => $dataItem['tempat_perawatan']];
            }
        }
        $perkembanganSaranaPrasarana = $this->data['perkembangan-sarana-dan-prasarana'] ? $this->data['perkembangan-sarana-dan-prasarana']->sortByDesc('bulan')->first()->data : [];
        $konflikSara                 = $this->data['konflik-sara'] ? $this->data['konflik-sara']->sortByDesc('bulan')->first()->data : [];
        $perkelahian                 = $this->data['perkelahian'] ? $this->data['perkelahian']->sortByDesc('bulan')->first()->data : [];
        $pencurian                   = $this->data['pencurian'] ? $this->data['pencurian']->sortByDesc('bulan')->first()->data : [];
        $penjarahanPenyerobotanTanah = $this->data['penjarahan-dan-penyerobotan-tanah'] ? $this->data['penjarahan-dan-penyerobotan-tanah']->sortByDesc('bulan')->first()->data : [];
        $perjudianPenipuan           = $this->data['perjudian-penipuan-dan-penggelapan'] ? $this->data['perjudian-penipuan-dan-penggelapan']->sortByDesc('bulan')->first()->data : [];
        $pemakaianMiras              = $this->data['pemakaian-miras-dan-narkoba'] ? $this->data['pemakaian-miras-dan-narkoba']->sortByDesc('bulan')->first()->data : [];
        $prostitusi                  = $this->data['prostitusi'] ? $this->data['prostitusi']->sortByDesc('bulan')->first()->data : [];
        $pembunuhan                  = $this->data['pembunuhan'] ? $this->data['pembunuhan']->sortByDesc('bulan')->first()->data : [];
        $penculikan                  = $this->data['penculikan'] ? $this->data['penculikan']->sortByDesc('bulan')->first()->data : [];
        $kejahatanSeksual            = $this->data['kejahatan-seksual'] ? $this->data['kejahatan-seksual']->sortByDesc('bulan')->first()->data : [];
        $masalahKesejahteraanSosial  = $this->data['masalah-kesejahteraan-sosial'] ? $this->data['masalah-kesejahteraan-sosial']->sortByDesc('bulan')->first()->data : [];
        $kekerasanRT                 = $this->data['kekerasan-dalam-rumah-tangga'] ? $this->data['kekerasan-dalam-rumah-tangga']->sortByDesc('bulan')->first()->data : [];
        $terorIntimidasi             = $this->data['teror-dan-intimidasi'] ? $this->data['teror-dan-intimidasi']->sortByDesc('bulan')->first()->data : [];
        $pelembagaanSistemKeamanan   = $this->data['pelembagaan-sistem-keamanan'] ? $this->data['pelembagaan-sistem-keamanan']->sortByDesc('bulan')->first()->data : [];
        $kesadaranBerbangsa          = $this->data['kesadaran-berbangsa-dan-bernegara'] ? $this->data['kesadaran-berbangsa-dan-bernegara']->sortByDesc('bulan')->first()->data : [];
        $kesadaranPajak              = $this->data['kesadaran-membayar-pajak-dan-retribusi'] ? $this->data['kesadaran-membayar-pajak-dan-retribusi']->sortByDesc('bulan')->first()->data : [];
        $partisipasiPolitik          = $this->data['perkembangan-partisipasi-politik'] ? $this->data['perkembangan-partisipasi-politik']->sortByDesc('bulan')->first()->data : [];
        $musrenbangDesa              = $this->data['musrenbang-desa-kelurahan'] ? $this->data['musrenbang-desa-kelurahan']->sortByDesc('bulan')->first()->data : [];
        $pelaksanaanPelestarian      = $this->data['pelaksanaan-dan-pelestarian-hasil-pembangunan'] ? $this->data['pelaksanaan-dan-pelestarian-hasil-pembangunan']->sortByDesc('bulan')->first()->data : [];
        $semangatGotongRoyong        = $this->data['semangat-kegotongroyongan-penduduk'] ? $this->data['semangat-kegotongroyongan-penduduk']->sortByDesc('bulan')->first()->data : [];
        $adatIstiadat                = $this->data['adat-istiadat'] ? $this->data['adat-istiadat']->sortByDesc('bulan')->first()->data : [];
        $sikapMental                 = $this->data['sikap-dan-mental-masyarakat'] ? $this->data['sikap-dan-mental-masyarakat']->sortByDesc('bulan')->first()->data : [];
        $lembagaDesa                 = $this->data['organisasi-lembaga-kemasyarakatan'] ? $this->data['organisasi-lembaga-kemasyarakatan']->groupBy('item') : [];
        $datalembagaDesa             = [];
        if ($lembagaDesa) {
            foreach ($lembagaDesa as $key => $item) {
                $dataItem                                            = $item->sortByDesc('bulan')->first()->data;
                $datalembagaDesa[JenisOrganisasiEnum::valueOf($key)] = $dataItem;
            }
        }

        $pembinaanCamat          = $this->data['pembinaan-dan-pengawasan-camat'] ? $this->data['pembinaan-dan-pengawasan-camat']->sortByDesc('bulan')->first()->data : [];
        $pembinaanPemkab         = $this->data['pembinaan-pemerintah-kabupaten-kota'] ? $this->data['pembinaan-pemerintah-kabupaten-kota']->sortByDesc('bulan')->first()->data : [];
        $pembinaanPemprov        = $this->data['pembinaan-pemerintah-provinsi'] ? $this->data['pembinaan-pemerintah-provinsi']->sortByDesc('bulan')->first()->data : [];
        $pembinaanPusat          = $this->data['pembinaan-pemerintah-pusat'] ? $this->data['pembinaan-pemerintah-pusat']->sortByDesc('bulan')->first()->data : [];
        $pertanggungjawabanKades = $this->data['pertanggungjawaban-kepala-desa-lurah'] ? $this->data['pertanggungjawaban-kepala-desa-lurah']->sortByDesc('bulan')->first()->data : [];
        $apbdesa                 = $this->data['apb-desa-dan-anggaran-kelurahan'] ? $this->data['apb-desa-dan-anggaran-kelurahan']->sortByDesc('bulan')->first()->data : [];

        $potensiPertanian  = $this->data['hasil-produksi-pangan'] ? $this->data['hasil-produksi-pangan']->keyBy('item') : [];
        $potensiPerkebunan = $this->data['hasil-produksi-kebun'] ? $this->data['hasil-produksi-kebun']->keyBy('item') : [];
        $potensiPerikanan  = $this->data['produksi-perikanan'] ? $this->data['produksi-perikanan']->keyBy('item') : [];
        $potensiPeternakan = $this->data['produksi-peternakan'] ? $this->data['produksi-peternakan']->keyBy('item') : [];
        // sarana desa
        $saranaDesa  = $this->data['sarana-desa'] ? $this->data['sarana-desa']->sortByDesc('bulan')->first()->data : [];
        $saranaBpd   = $this->data['badan-perwakilan-desa'] ? $this->data['badan-perwakilan-desa']->sortByDesc('bulan')->first()->data : [];
        $saranaDusun = $this->data['sarana-dusun'] ? $this->data['sarana-dusun']->sortByDesc('bulan')->first()->data : [];

        return [
            'data_umum' => [
                'luas_desa'        => $batasWilayah['luas_desa'] ?? 0,
                'nama_kepala_desa' => $batasWilayah['nama_kepala_desa'] ?? '',
                'nama_pengisi'     => $batasWilayah['nama_pengisi'] ?? '',
                'pekerjaan'        => $batasWilayah['pekerjaan'] ?? '',
                'jabatan'          => $batasWilayah['jabatan'] ?? '',
                'peta_wilayah'     => $batasWilayah['peta_wilayah'] ?? '',
                'referensi_1'      => $batasWilayah['referensi_1'] ?? '',
                'referensi_2'      => $batasWilayah['referensi_2'] ?? '',
                'referensi_3'      => $batasWilayah['referensi_3'] ?? '',
                'referensi_4'      => $batasWilayah['referensi_4'] ?? '',
            ],
            'jumlah_penduduk' => [
                'lk_tahun_ini'    => $jumlahPenduduk['jumlah_penduduk_laki_laki_tahun_ini'] ?? 0,
                'pr_tahun_ini'    => $jumlahPenduduk['jumlah_penduduk_perempuan_tahun_ini'] ?? 0,
                'lk_tahun_lalu'   => $jumlahPenduduk['jumlah_penduduk_laki_laki_tahun_lalu'] ?? 0,
                'pr_tahun_lalu'   => $jumlahPenduduk['jumlah_penduduk_perempuan_tahun_lalu'] ?? 0,
                'lk_perkembangan' => $jumlahPenduduk ? persen2($jumlahPenduduk['jumlah_penduduk_laki_laki_tahun_ini'] - $jumlahPenduduk['jumlah_penduduk_laki_laki_tahun_lalu'], $jumlahPenduduk['jumlah_penduduk_laki_laki_tahun_lalu']) : 0,
                'pr_perkembangan' => $jumlahPenduduk ? persen2($jumlahPenduduk['jumlah_penduduk_perempuan_tahun_ini'] - $jumlahPenduduk['jumlah_penduduk_perempuan_tahun_lalu'], $jumlahPenduduk['jumlah_penduduk_perempuan_tahun_lalu']) : 0,
            ],
            'jumlah_keluarga' => [
                'lk_kk_tahun_ini'     => $jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_ini'] ?? 0,
                'pr_kk_tahun_ini'     => $jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_ini'] ?? 0,
                'lk_kk_tahun_lalu'    => $jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_lalu'] ?? 0,
                'pr_kk_tahun_lalu'    => $jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_lalu'] ?? 0,
                'total_kk_tahun_ini'  => $jumlahPenduduk ? $jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_ini'] + $jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_ini'] : 0,
                'total_kk_tahun_lalu' => $jumlahPenduduk ? $jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_lalu'] + $jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_lalu'] : 0,
                'lk_kk_perkembangan'  => $jumlahPenduduk ? persen2($jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_ini'] - $jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_lalu'], $jumlahPenduduk['jumlah_kepala_keluarga_laki_laki_tahun_lalu']) : 0,
                'pr_kk_perkembangan'  => $jumlahPenduduk ? persen2($jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_ini'] - $jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_lalu'], $jumlahPenduduk['jumlah_kepala_keluarga_perempuan_tahun_lalu']) : 0,
            ],
            'pengangguran' => [
                'jumlah_angkatan_kerja_penduduk_usia_18_56_tahun'                       => $pengangguran['jumlah_angkatan_kerja'] ?? 0,
                'jumlah_penduduk_usia_18_56_tahun_yang_masih_sekolah_dan_tidak_bekerja' => $pengangguran['jumlah_penduduk_masih_sekolah_tidak_bekerja'] ?? 0,
                'jumlah_penduduk_usia_18_56_tahun_yang_menjadi_ibu_rumah_tangga'        => $pengangguran['jumlah_penduduk_ibu_rumah_tangga'] ?? 0,
                'jumlah_penduduk_usia_18_56_tahun_yang_bekerja_penuh'                   => $pengangguran['jumlah_penduduk_bekerja_penuh'] ?? 0,
                'jumlah_penduduk_usia_18_56_tahun_yang_bekerja_tidak_tentu'             => $pengangguran['jumlah_penduduk_bekerja_tidak_tentu'] ?? 0,
                'jumlah_penduduk_usia_18_56_tahun_yang_cacat_dan_tidak_bekerja'         => $pengangguran['jumlah_penduduk_cacat_tidak_bekerja'] ?? 0,
                'jumlah_penduduk_usia_18_56_tahun_yang_cacat_dan_bekerja'               => $pengangguran['jumlah_penduduk_cacat_bekerja'] ?? 0,
            ],
            'kesejahteraan_keluarga' => [
                'jumlah_keluarga_prasejahtera'     => $kesejahteraanKeluarga['prasejahtera'] ?? 0,
                'jumlah_keluarga_sejahtera_1'      => $kesejahteraanKeluarga['sejahtera_satu'] ?? 0,
                'jumlah_keluarga_sejahtera_2'      => $kesejahteraanKeluarga['sejahtera_dua'] ?? 0,
                'jumlah_keluarga_sejahtera_3'      => $kesejahteraanKeluarga['sejahtera_tiga'] ?? 0,
                'jumlah_keluarga_sejahtera_3_plus' => $kesejahteraanKeluarga['sejahtera_tiga_lebih'] ?? 0,
                'total_jumlah_kepala_keluarga'     => $kesejahteraanKeluarga ? $kesejahteraanKeluarga['prasejahtera'] + $kesejahteraanKeluarga['sejahtera_satu'] + $kesejahteraanKeluarga['sejahtera_dua'] + $kesejahteraanKeluarga['sejahtera_tiga'] + $kesejahteraanKeluarga['sejahtera_tiga_lebih'] : 0,
            ],
            'pertanian'                      => $potensiPertanian,
            'perkebunan'                     => $potensiPerkebunan,
            'peternakan'                     => $potensiPeternakan,
            'perikanan'                      => $potensiPerikanan,
            'sektor_pertambangan_dan_galian' => [
                'total_nilai_produksi_tahun_ini'                       => $pertambanganGalian['total_nilai_produksi_tahun_ini'] ?? 0,
                'total_nilai_bahan_baku_yang_digunakan'                => $pertambanganGalian['total_nilai_bahan_baku_yang_digunakan'] ?? 0,
                'total_nilai_bahan_penolong_yang_digunakan'            => $pertambanganGalian['total_nilai_bahan_penolong_yang_digunakan'] ?? 0,
                'total_biaya_antara_yang_dihabiskan'                   => $pertambanganGalian['total_biaya_antara_yang_dihabiskan'] ?? 0,
                'jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada' => $pertambanganGalian['jumlah_total_jenis_bahan_tambang_dan_galian_yang_ada'] ?? 0,
            ],
            'subsektor_kerajinan' => [
                'total_nilai_produksi_tahun_ini'            => $kerajinan['total_nilai_produksi'] ?? 0,
                'total_nilai_bahan_baku_yang_digunakan'     => $kerajinan['total_nilai_bahan_baku_yang_digunakan'] ?? 0,
                'total_nilai_bahan_penolong_yang_digunakan' => $kerajinan['total_nilai_bahan_penolong_yang_digunakan'] ?? 0,
                'total_biaya_antara_yang_dihabiskan'        => $kerajinan['total_biaya_antara_yang_dihabiskan'] ?? 0,
                'total_jenis_kerajinan_rumah_tangga'        => $kerajinan['total_jenis_kerajinan_rumah_tangga'] ?? 0,
            ],

            'sektor_industri_pengolahan' => [

            ],
            'subsektor_kehutanan' => [
                'total_nilai_produksi_tahun_ini'            => $kehutanan['produksi'] ?? 0,
                'total_nilai_bahan_baku_yang_digunakan'     => $kehutanan['bahan_baku'] ?? 0,
                'total_nilai_bahan_penolong_yang_digunakan' => $kehutanan['bahan_penolong'] ?? 0,
                'total_biaya_antara_yang_dihabiskan'        => $kehutanan['biaya'] ?? 0,
            ],
            'subsektor_perdagangan_besar' => [
                'total_nilai_transaksi'                 => $perdaganganHotel['besar_total_nilai_transaksi'] ?? 0,
                'total_nilai_aset_perdagangan_yang_ada' => $perdaganganHotel['total_nilai_aset_perdagangan_yang_ada'] ?? 0,
                'total_jumlah_jenis_perdagangan_besar'  => $perdaganganHotel['total_jumlah_jenis_perdagangan_besar'] ?? 0,
                'total_nilai_biaya_yang_dikeluarkan'    => $perdaganganHotel['besar_total_nilai_biaya_yang_dikeluarkan'] ?? 0,
                'total_biaya_antara_lainnya'            => $perdaganganHotel['total_biaya_antara_lainnya'] ?? 0,
            ],

            'subsektor_perdagangan_eceran' => [
                'jumlah_total_jenis_perdagangan_eceran' => $perdaganganHotel['jumlah_total_jenis_perdagangan_eceran'] ?? 0,
                'total_nilai_transaksi'                 => $perdaganganHotel['kecil_total_nilai_transaksi'] ?? 0,
                'total_nilai_biaya_yang_dikeluarkan'    => $perdaganganHotel['kecil_total_nilai_biaya_yang_dikeluarkan'] ?? 0,
                'total_nilai_aset_perdagangan_eceran'   => $perdaganganHotel['total_nilai_aset_perdagangan_eceran'] ?? 0,
            ],
            'subsektor_hotel' => [
                'jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada' => $perdaganganHotel['jumlah_total_penginapan_dan_penyediaan_akomodasi_yang_ada'] ?? 0,
                'jumlah_total_pendapatan'                                   => $perdaganganHotel['jumlah_total_pendapatan'] ?? 0,
                'jumlah_total_biaya_pemeliharaan'                           => $perdaganganHotel['jumlah_total_biaya_pemeliharaan'] ?? 0,
                'jumlah_biaya_antara_yang_dikeluarkan'                      => $perdaganganHotel['jumlah_biaya_antara_yang_dikeluarkan'] ?? 0,
                'jumlah_total_pendapatan_yang_diperoleh'                    => $perdaganganHotel['hotel_jumlah_total_pendapatan_yang_diperoleh'] ?? 0,
            ],
            'subsektor_restoran' => [
                'jumlah_tempat_penyediaan_konsumsi'      => $perdaganganHotel['jumlah_tempat_penyediaan_konsumsi'] ?? 0,
                'biaya_konsumsi_yang_dikeluarkan'        => $perdaganganHotel['biaya_konsumsi_yang_dikeluarkan'] ?? 0,
                'biaya_antara_lainnya'                   => $perdaganganHotel['biaya_antara_lainnya'] ?? 0,
                'jumlah_total_pendapatan_yang_diperoleh' => $perdaganganHotel['resto_jumlah_total_pendapatan_yang_diperoleh'] ?? 0,
            ],

            'sektor_bangunan_konstruksi' => [
                'jumlah_bangunan_yang_ada_tahun_ini'  => $bangunanKonstruksi['jumlah_bangunan_yang_ada_tahun_ini'] ?? 0,
                'biaya_pemeliharaan_yang_dikeluarkan' => $bangunanKonstruksi['biaya_pemeliharaan_yang_dikeluarkan'] ?? 0,
                'total_nilai_bangunan_yang_ada'       => $bangunanKonstruksi['total_nilai_bangunan_yang_ada'] ?? 0,
                'biaya_antara_lainnya'                => $bangunanKonstruksi['biaya_antara_lainnya'] ?? 0,
            ],

            'subsektor_bank' => [
                'jumlah_transaksi_perbankan'       => $keuanganJasa['jumlah_transaksi_perbankan'] ?? 0,
                'jumlah_nilai_transaksi_perbankan' => $keuanganJasa['jumlah_nilai_transaksi_perbankan'] ?? 0,
                'jumlah_biaya_yang_dikeluarkan'    => $keuanganJasa['jumlah_biaya_yang_dikeluarkan'] ?? 0,
            ],

            'subsektor_lembaga_keuangan_bukan_bank' => [
                'jumlah_lembaga_keuangan_bukan_bank'                         => $keuanganJasa['jumlah_lembaga_keuangan_bukan_bank'] ?? 0,
                'jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank' => $keuanganJasa['jumlah_kegiatan_jasa_penunjang_lembaga_keuangan_bukan_bank'] ?? 0,
                'nilai_transaksi_lembaga_keuangan_bukan_bank'                => $keuanganJasa['nilai_transaksi_lembaga_keuangan_bukan_bank'] ?? 0,
                'biaya_yang_dikeluarkan'                                     => $keuanganJasa['biaya_yang_dikeluarkan'] ?? 0,
            ],

            'subsektor_sewa_bangunan' => [
                'jumlah_usaha_persewaan_bangunan_dan_tanah' => $keuanganJasa['jumlah_usaha_persewaan_bangunan_dan_tanah'] ?? 0,
                'total_nilai_persewaan_yang_dicapai'        => $keuanganJasa['total_nilai_persewaan_yang_dicapai'] ?? 0,
                'biaya_yang_dikeluarkan'                    => $keuanganJasa['biaya_yang_dikeluarkan_A'] ?? 0,
                'biaya_lainnya'                             => $keuanganJasa['biaya_lainnya_A'] ?? 0,
            ],

            'subsektor_jasa_perusahaan' => [
                'jumlah_perusahaan_jasa'          => $keuanganJasa['jumlah_perusahaan_jasa'] ?? 0,
                'nilai_transaksi_perusahaan_jasa' => $keuanganJasa['nilai_transaksi_perusahaan_jasa'] ?? 0,
                'biaya_yang_dikeluarkan'          => $keuanganJasa['biaya_yang_dikeluarkan_B'] ?? 0,
                'biaya_lainnya'                   => $keuanganJasa['biaya_lainnya_B'] ?? 0,
            ],

            'subsektor_jasa_pemerintahan_umum' => [
                'jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat' => $jasaJasa['jumlah_jenis_jasa_pelayanan_pemerintahan_kepada_masyarakat'] ?? 0,
                'nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat'   => $jasaJasa['nilai_transaksi_pelayanan_pemerintahan_kepada_masyarakat_rp'] ?? 0,
                'biaya_yang_dikeluarkan_dalam_pelayanan'                     => $jasaJasa['biaya_yang_dikeluarkan_dalam_pelayanan_rp'] ?? 0,
            ],
            'subsektor_jasa_swasta' => [
                'jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat' => $jasaJasa['jumlah_usaha_jasa_pelayanan_sosial_yang_disediakan_masyarakat_jenis'] ?? 0,
                'nilai_aset_produksi_jasa_pelayanan_sosial'                     => $jasaJasa['nilai_aset_produksi_jasa_pelayanan_sosial_rp'] ?? 0,
                'biaya_yang_dikeluarkan'                                        => $jasaJasa['biaya_yang_dikeluarkan_rp'] ?? 0,

            ],

            'subsektor_jasa_hiburan_dan_rekreasi' => [
                'jumlah_jenis_jasa_hiburan_dan_rekreasi'          => $jasaJasa['jumlah_jenis_jasa_hiburan_dan_rekreasi_jenis'] ?? 0,
                'nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi' => $jasaJasa['nilai_transaksi_usaha_jasa_hiburan_dan_rekreasi_rp'] ?? 0,
                'biaya_antara_yang_dikeluarkan'                   => $jasaJasa['biaya_antara_yang_dikeluarkan_rp'] ?? 0,
            ],
            'subsektor_jasa_perorangan_dan_rumah_tangga' => [
                'jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tangga' => $jasaJasa['jumlah_jenis_kegiatan_jasa_pelayanan_perorangan_dan_rumah_tanggan_jenis'] ?? 0,
                'nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga'            => $jasaJasa['nilai_aset_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] ?? 0,
                'nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga'       => $jasaJasa['nilai_transaksi_jasa_pelayanan_perorangan_dan_rumah_tangga_rp'] ?? 0,
                'biaya_antara_yang_dikeluarkan'                                    => $jasaJasa['biaya_antara_yang_dikeluarkan_rp_dua'] ?? 0,
            ],
            'subsektor_angkutan' => [
                'jumlah_jenis_kegiatan_pengangkutan_orang_dan_barang_dengan_alat_angkut_kendaraan_jalan_raya_laut_rel_udara_dan_sungai_danau_penyeberangan' => $angkutanKomunikasi['jumlah_jenis_kegiatan_pengangkutan'] ?? 0,
                'jumlah_total_kendaraan_angkutan'                                                                                                           => $angkutanKomunikasi['jumlah_total_kendaraan_angkutan'] ?? 0,
                'nilai_total_transaksi_pengangkutan'                                                                                                        => $angkutanKomunikasi['nilai_total_transaksi_pengangkutan'] ?? 0,
                'nilai_total_biaya_yang_dikeluarkan'                                                                                                        => $angkutanKomunikasi['nilai_total_biaya_yang_dikeluarkan'] ?? 0,
            ],

            'subsektor_listrik' => [
                'jumlah_jenis_kegiatan_pembangkitan_dan_penyaluran_tenaga_listrik' => $listrikGasAir['jumlah_jenis_kegiatan_pembangkit_dan_penyaluran_tenaga_listrik'] ?? 0,
                'jumlah_nilai_produksi_listrik'                                    => $listrikGasAir['jumlah_nilai_produksi_listrik'] ?? 0,
                'jumlah_total_nilai_transaksi'                                     => $listrikGasAir['jumlah_total_nilai_transaksi'] ?? 0,
                'jumlah_biaya_antara_yang_dikeluarkan'                             => $listrikGasAir['jumlah_biaya_antara_yang_dikeluarkan'] ?? 0,
            ],

            'subsektor_gas' => [
                'jumlah_kegiatan_penyediaan_gas' => $listrikGasAir['jumlah_kegiatan_penyediaan_gas'] ?? 0,
                'nilai_aset_produksi_gas'        => $listrikGasAir['nilai_aset_produksi_gas'] ?? 0,
                'nilai_transaksi'                => $listrikGasAir['nilai_transaksi'] ?? 0,
                'biaya_antara_yang_dikeluarkan'  => $listrikGasAir['biaya_antara_yang_dikeluarkan'] ?? 0,
            ],

            'subsektor_air_minum' => [
                'jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum' => $listrikGasAir['jumlah_jenis_kegiatan_penyediaan_dan_penyaluran_air_minum'] ?? 0,
                'nilai_aset_penyediaan_air_minum'                           => $listrikGasAir['nilai_aset_penyediaan_air_minum'] ?? 0,
                'nilai_produksi_air_minum'                                  => $listrikGasAir['nilai_produksi_air_minum'] ?? 0,
                'nilai_transaksi_air_minum'                                 => $listrikGasAir['nilai_transaksi_air_minum'] ?? 0,
                'biaya_antara_yang_dikeluarkan'                             => 0,
            ],

            'pendapatan_riil_keluarga' => [
                'jumlah_kepala_keluarga'                               => $pendapatanRiilKeluarga['jumlah_kepala_keluarga'] ?? 0,
                'jumlah_anggota_keluarga'                              => $pendapatanRiilKeluarga['jumlah_anggota_keluarga'] ?? 0,
                'jumlah_pendapatan_kepala_keluarga'                    => $pendapatanRiilKeluarga['jumlah_pendapatan_kepala_keluarga'] ?? 0,
                'jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja' => $pendapatanRiilKeluarga['jumlah_pendapatan_dari_anggota_keluarga_yang_bekerja'] ?? 0,
            ],
            'sektor_pertanian' => [
                'petani'             => $sektorPertanian['petani'] ?? 0,
                'buruh_tani'         => $sektorPertanian['buruh'] ?? 0,
                'pemilik_usaha_tani' => $sektorPertanian['pemilik'] ?? 0,
            ],

            'sektor_perkebunan' => [
                'karyawan_perusahaan_perkebunan' => $sektorPerkebunan['pekebun'] ?? 0,
                'buruh_perkebunan'               => $sektorPerkebunan['buruh'] ?? 0,
                'pemilik_usaha_perkebunan'       => $sektorPerkebunan['pemilik'] ?? 0,

            ],

            'sektor_peternakan' => [
                'peternakan_perorangan'    => $sektorPeternakan['peternakan_perorangan'] ?? 0,
                'buruh_usaha_peternakan'   => $sektorPeternakan['buruh_usaha_peternakan'] ?? 0,
                'pemilik_usaha_peternakan' => $sektorPeternakan['pemilik_usaha_peternakan'] ?? 0,

            ],

            'sektor_perikanan' => [
                'nelayan'                 => $sektorPerikanan['nelayan'] ?? 0,
                'buruh_usaha_perikanan'   => $sektorPerikanan['buruh_usaha_perikanan'] ?? 0,
                'pemilik_usaha_perikanan' => $sektorPerikanan['pemilik_usaha_perikanan'] ?? 0,

            ],

            'sektor_kehutanan' => [
                'pengumpul_hasil_hutan'                => $sektorKehutanan['pengumpul_hutan'] ?? 0,
                'buruh_usaha_pengolahan_hasil_hutan'   => $sektorKehutanan['buruh'] ?? 0,
                'pemilik_usaha_pengolahan_hasil_hutan' => $sektorKehutanan['pemilik'] ?? 0,
            ],

            'sektor_pertambangan_dan_bahan_galian_c' => [
                'penambang_galian_c_perorangan' => $sektorPertambangan['penambang'] ?? 0,
                'buruh_usaha_pertambangan'      => $sektorPertambangan['buruh'] ?? 0,
                'pemilik_usaha_pertambangan'    => $sektorPertambangan['pemilik'] ?? 0,

            ],

            'sektor_perdagangan' => [
                'karyawan_perdagangan_hasil_bumi'  => $sektorPerdagangan['karyawan_perdagangan_hasil_bumi'] ?? 0,
                'buruh_perdagangan_hasil_bumi'     => $sektorPerdagangan['buruh_perdagangan_hasil_bumi'] ?? 0,
                'pengusaha_perdagangan_hasil_bumi' => $sektorPerdagangan['pengusaha_perdagangan_hasil_bumi'] ?? 0,
            ],
            'aset_tanah' => [
                'tidak_memiliki_tanah'              => $asetTanah['tanah_00'] ?? 0,
                'memiliki_tanah_antara_0_1_0_2_ha'  => $asetTanah['tanah_01'] ?? 0,
                'memiliki_tanah_antara_0_21_0_3_ha' => $asetTanah['tanah_02'] ?? 0,
                'memiliki_tanah_antara_0_31_0_4_ha' => $asetTanah['tanah_03'] ?? 0,
                'memiliki_tanah_antara_0_41_0_5_ha' => $asetTanah['tanah_04'] ?? 0,
                'memiliki_tanah_antara_0_51_0_6_ha' => $asetTanah['tanah_05'] ?? 0,
                'memiliki_tanah_antara_0_61_0_7_ha' => $asetTanah['tanah_06'] ?? 0,
                'memiliki_tanah_antara_0_71_0_8_ha' => $asetTanah['tanah_07'] ?? 0,
                'memiliki_tanah_antara_0_81_0_9_ha' => $asetTanah['tanah_08'] ?? 0,
                'memiliki_tanah_antara_0_91_1_0_ha' => $asetTanah['tanah_09'] ?? 0,
                'memiliki_tanah_antara_1_0_5_0_ha'  => $asetTanah['tanah_10'] ?? 0,
                'memiliki_tanah_antara_5_0_10_ha'   => $asetTanah['tanah_50'] ?? 0,
                'memiliki_tanah_lebih_dari_10_ha'   => $asetTanah['tanah_100'] ?? 0,
                'jumlah_total_penduduk'             => $asetTanah['jumlah'] ?? 0,
            ],
            'aset_sarana_produksi' => [
                'memiliki_penggilingan_padi'                                                                     => $saranaProduksi['penggilingan_padi'] ?? 0,
                'memiliki_traktor'                                                                               => $saranaProduksi['traktor'] ?? 0,
                'memiliki_pabrik_pengolahan_hasil_pertanian'                                                     => $saranaProduksi['pabrik_pengolahan_pertanian'] ?? 0,
                'memiliki_kapal_penangkap_ikan'                                                                  => $saranaProduksi['kapal_penangkap_ikan'] ?? 0,
                'memiliki_alat_pengolahan_hasil_perikanan'                                                       => $saranaProduksi['alat_pengolahan_hasil_perikanan'] ?? 0,
                'memiliki_alat_pengolahan_hasil_peternakan'                                                      => $saranaProduksi['alat_pengolahan_hasil_peternakan'] ?? 0,
                'memiliki_alat_pengolahan_hasil_perkebunan'                                                      => $saranaProduksi['alat_pengolahan_hasil_perkebunan'] ?? 0,
                'memiliki_alat_pengolahan_hasil_hutan'                                                           => $saranaProduksi['alat_pengolahan_hasil_hutan'] ?? 0,
                'memiliki_alat_produksi_dan_pengolah_hasil_pertambangan'                                         => $saranaProduksi['alat_produksi_pengolah_hasil_tambang'] ?? 0,
                'memiliki_alat_produksi_dan_pengolah_hasil_pariwisata'                                           => $saranaProduksi['alat_produksi_pengolah_hasil_pariwisata'] ?? 0,
                'memiliki_alat_produksi_dan_pengolah_hasil_industri_jasa_perdagangan'                            => $saranaProduksi['alat_produksi_pengolah_hasil_industri_jasa_perdagangan'] ?? 0,
                'memiliki_alat_produksi_dan_pengolah_hasil_industri_kerajinan_keluarga_skala_kecil_dan_menengah' => $saranaProduksi['alat_produksi_pengolah_hasil_industri_kerajinan'] ?? 0,
                'memiliki_alat_produksi_dan_pengolahan_hasil_industri_migas'                                     => $saranaProduksi['alat_produksi_pengolah_hasil_industri_migas'] ?? 0,
            ],
            'aset_perumahan_rumah_menurut_dinding' => $dataRumahMenurutDinding,
            'rumah_menurut_lantai'                 => $dataRumahMenurutLantai,
            'rumah_menurut_atap'                   => $dataRumahMenurutAtap,
            'tingkat_pendidikan_penduduk'          => [
                'jumlah_penduduk_buta_aksara_dan_huruf_latin'                            => $tingkatPendidikanMasyarakat['jumlah_penduduk_buta_aksara_dan_huruf_latin'] ?? 0,
                'jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak' => $tingkatPendidikanMasyarakat['jumlah_penduduk_usia_3_6_tahun_yang_masuk_tk_dan_kelompok_bermain_anak'] ?? 0,
                'jumlah_anak_dan_penduduk_cacat_fisik_dan_mental'                        => $tingkatPendidikanMasyarakat['jumlah_anak_dan_penduduk_cacat_fisik_dan_mental'] ?? 0,
                'jumlah_penduduk_sedang_sd_sederajat'                                    => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_sdsederajat'] ?? 0,
                'jumlah_penduduk_tamat_sd_sederajat'                                     => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_sdsederajat'] ?? 0,
                'jumlah_penduduk_tidak_tamat_sd_sederajat'                               => $tingkatPendidikanMasyarakat['jumlah_penduduk_tidak_tamat_sdsederajat'] ?? 0,
                'jumlah_penduduk_sedang_sltp_sederajat'                                  => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_sltpsederajat'] ?? 0,
                'jumlah_penduduk_tamat_sltp_sederajat'                                   => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_sltpsederajat'] ?? 0,
                'jumlah_penduduk_sedang_slta_sederajat'                                  => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_slta_sederajat'] ?? 0,
                'jumlah_penduduk_tidak_tamat_sltp_sederajat'                             => $tingkatPendidikanMasyarakat['jumlah_penduduk_tidak_tamat_sltpsederajat'] ?? 0,
                'jumlah_penduduk_tamat_slta_sederajat'                                   => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_slta_sederajat'] ?? 0,
                'jumlah_penduduk_sedang_d_1'                                             => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_d1'] ?? 0,
                'jumlah_penduduk_tamat_d_1'                                              => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_d1'] ?? 0,
                'jumlah_penduduk_sedang_d_2'                                             => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_d2'] ?? 0,
                'jumlah_penduduk_tamat_d_2'                                              => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_d2'] ?? 0,
                'jumlah_penduduk_sedang_d_3'                                             => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_d3'] ?? 0,
                'jumlah_penduduk_tamat_d_3'                                              => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_d3'] ?? 0,
                'jumlah_penduduk_sedang_s_1'                                             => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_s1'] ?? 0,
                'jumlah_penduduk_tamat_s_1'                                              => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_s1'] ?? 0,
                'jumlah_penduduk_sedang_s_2'                                             => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_s2'] ?? 0,
                'jumlah_penduduk_tamat_s_2'                                              => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_s2'] ?? 0,
                'jumlah_penduduk_tamat_s_3'                                              => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_s3'] ?? 0,
                'jumlah_penduduk_sedang_slb_a'                                           => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_slb_a'] ?? 0,
                'jumlah_penduduk_tamat_slb_a'                                            => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_slb_a'] ?? 0,
                'jumlah_penduduk_sedang_slb_b'                                           => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_slb_b'] ?? 0,
                'jumlah_penduduk_tamat_slb_b'                                            => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_slb_b'] ?? 0,
                'jumlah_penduduk_sedang_slb_c'                                           => $tingkatPendidikanMasyarakat['jumlah_penduduk_sedang_slb_c'] ?? 0,
                'jumlah_penduduk_tamat_slb_c'                                            => $tingkatPendidikanMasyarakat['jumlah_penduduk_tamat_slb_c'] ?? 0,
                'jumlah_penduduk_cacat_fisik_dan_mental'                                 => $tingkatPendidikanMasyarakat['jumlah_penduduk_cacat_fisik_dan_mental'] ?? 0,
            ],
            'wajib_belajar_9_tahun' => [
                'jumlah_penduduk_usia_7_15_tahun'                    => $wajibBelajar['penduduk'] ?? 0,
                'jumlah_penduduk_usia_7_15_tahun_yang_masih_sekolah' => $wajibBelajar['masih_sekolah'] ?? 0,
                'jumlah_penduduk_usia_7_15_tahun_yang_tidak_sekolah' => $wajibBelajar['tidak_sekolah'] ?? 0,
            ],

            'rasio_guru_dan_murid' => [
                'jumlah_guru_tk_dan_kelompok_bermain_anak'  => $rasioGuruMurid['guru_tk'] ?? 0,
                'jumlah_siswa_tk_dan_kelompok_bermain_anak' => $rasioGuruMurid['siswa_tk'] ?? 0,
                'jumlah_guru_sd_dan_sederajat'              => $rasioGuruMurid['guru_sd'] ?? 0,
                'jumlah_siswa_sd_dan_sederajat'             => $rasioGuruMurid['siswa_sd'] ?? 0,
                'jumlah_guru_sltp_dan_sederajat'            => $rasioGuruMurid['guru_sltp'] ?? 0,
                'jumlah_siswa_sltp_dan_sederajat'           => $rasioGuruMurid['siswa_sltp'] ?? 0,
                'jumlah_guru_slta_sederajat'                => $rasioGuruMurid['guru_slta'] ?? 0,
                'jumlah_siswa_slta_sederajat'               => $rasioGuruMurid['siswa_slta'] ?? 0,
                'jumlah_siswa_slb'                          => $rasioGuruMurid['siswa_slb'] ?? 0,
                'jumlah_guru_slb'                           => $rasioGuruMurid['guru_slb'] ?? 0,
            ],

            'kelembagaan_pendidikan_masyarakat' => [
                'jumlah_perpustakaan_desa_kelurahan'              => $kelembagaanPendidikanMasyarakat['jumlah_perpustakaan_desa_kelurahan'] ?? 0,
                'jumlah_taman_bacaan_desa_kelurahan'              => $kelembagaanPendidikanMasyarakat['jumlah_taman_bacaan_desa_kelurahan'] ?? 0,
                'jumlah_perpustakaan_keliling'                    => $kelembagaanPendidikanMasyarakat['jumlah_perpustakaan_keliling'] ?? 0,
                'jumlah_sanggar_belajar'                          => $kelembagaanPendidikanMasyarakat['jumlah_sanggar_belajar'] ?? 0,
                'jumlah_kegiatan_lembaga_pendidikan_luar_sekolah' => $kelembagaanPendidikanMasyarakat['jumlah_kegiatan_lembaga_pendidikan_luar_sekolah'] ?? 0,
                'jumlah_kelompok_belajar_paket_a'                 => $kelembagaanPendidikanMasyarakat['jumlah_kelompok_belajar_paket_a'] ?? 0,
                'jumlah_peserta_ujian_paket_a'                    => $kelembagaanPendidikanMasyarakat['jumlah_peserta_ujian_paket_a'] ?? 0,
                'jumlah_kelompok_belajar_paket_b'                 => $kelembagaanPendidikanMasyarakat['jumlah_kelompok_belajar_paket_b'] ?? 0,
                'jumlah_peserta_ujian_paket_b'                    => $kelembagaanPendidikanMasyarakat['jumlah_peserta_ujian_paket_b'] ?? 0,
                'jumlah_kelompok_belajar_paket_c'                 => $kelembagaanPendidikanMasyarakat['jumlah_kelompok_belajar_paket_c'] ?? 0,
                'jumlah_peserta_ujian_paket_c'                    => $kelembagaanPendidikanMasyarakat['jumlah_peserta_ujian_paket_c'] ?? 0,
                'jumlah_lembaga_kursus_keterampilan'              => $kelembagaanPendidikanMasyarakat['jumlah_lembaga_kursus_keterampilan'] ?? 0,
                'jumlah_peserta_kursus_keterampilan'              => $kelembagaanPendidikanMasyarakat['jumlah_peserta_kursus_keterampilan'] ?? 0,
            ],

            'kualitas_ibu_hamil' => [
                'jumlah_ibu_hamil'                           => $kualitasIbuHamil['ibu_hamil'] ?? 0,
                'jumlah_ibu_hamil_periksa_di_posyandu'       => $kualitasIbuHamil['ibu_hamil_periksa_di_posyandu'] ?? 0,
                'jumlah_ibu_hamil_periksa_di_puskesmas'      => $kualitasIbuHamil['ibu_hamil_periksa_di_puskesmas'] ?? 0,
                'jumlah_ibu_hamil_periksa_di_rumah_sakit'    => $kualitasIbuHamil['ibu_hamil_periksa_di_rumah_sakit'] ?? 0,
                'jumlah_ibu_hamil_periksa_di_dokter_praktek' => $kualitasIbuHamil['ibu_hamil_periksa_di_dokter_praktek'] ?? 0,
                'jumlah_ibu_hamil_periksa_di_bidan_praktek'  => $kualitasIbuHamil['ibu_hamil_periksa_di_bidan_praktek'] ?? 0,
                'jumlah_ibu_hamil_periksa_di_dukun_terlatih' => $kualitasIbuHamil['ibu_hamil_periksa_di_dukun_terlatih'] ?? 0,
                'jumlah_kematian_ibu_hamil'                  => $kualitasIbuHamil['kematian_ibu_hamil'] ?? 0,
                'jumlah_ibu_hamil_melahirkan'                => $kualitasIbuHamil['ibu_hamil_melahirkan'] ?? 0,
                'jumlah_ibu_nifas'                           => $kualitasIbuHamil['ibu_nifas'] ?? 0,
                'jumlah_kematian_ibu_nifas'                  => $kualitasIbuHamil['kematian_ibu_nifas'] ?? 0,
                'jumlah_ibu_nifas_hidup'                     => $kualitasIbuHamil['ibu_nifas_hidup'] ?? 0,
            ],

            'kualitas_bayi' => [
                'jumlah_keguguran_kandungan'                                                       => $kualitasBayi['keguguran_kandungan'] ?? 0,
                'jumlah_bayi_lahir'                                                                => $kualitasBayi['bayi_lahir'] ?? 0,
                'jumlah_bayi_lahir_mati'                                                           => $kualitasBayi['bayi_lahir_mati'] ?? 0,
                'jumlah_bayi_lahir_hidup'                                                          => $kualitasBayi['bayi_lahir_hidup'] ?? 0,
                'jumlah_bayi_mati_usia_0_1_bulan'                                                  => $kualitasBayi['bayi_mati_usia_0_1_bulan'] ?? 0,
                'jumlah_bayi_mati_usia_1_12_bulan'                                                 => $kualitasBayi['bayi_mati_usia_1_12_bulan'] ?? 0,
                'jumlah_bayi_lahir_berat_kurang_dari_2_5_kg'                                       => $kualitasBayi['bayi_lahir_berat_kurang_dari_2_5_kg'] ?? 0,
                'jumlah_bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental' => $kualitasBayi['bayi_0_5_tahun_hidup_yang_menderita_kelainan_organ_tubuh_fisik_dan_mental'] ?? 0,
            ],

            'kualitas_persalinan' => [
                'tempat_persalinan'                          => $kualitasPersalinan['tempat_persalinan'] ?? 0,
                'tempat_persalinan_rumah_sakit_umum'         => $kualitasPersalinan['persalinan_rumah_sakit_umum'] ?? 0,
                'tempat_persalinan_rumah_bersalin'           => $kualitasPersalinan['persalinan_rumah_bersalin'] ?? 0,
                'tempat_persalinan_puskesmas'                => $kualitasPersalinan['persalinan_puskesmas'] ?? 0,
                'tempat_persalinan_polindes'                 => $kualitasPersalinan['persalinan_polindes'] ?? 0,
                'tempat_persalinan_balai_kesehatan_ibu_anak' => $kualitasPersalinan['persalinan_balai_kesehatan_ibu_anak'] ?? 0,
                'tempat_persalinan_rumah_praktek_bidan'      => $kualitasPersalinan['persalinan_rumah_praktek_bidan'] ?? 0,
                'tempat_praktek_dokter'                      => $kualitasPersalinan['praktek_dokter'] ?? 0,
                'rumah_dukun'                                => $kualitasPersalinan['rumah_dukun'] ?? 0,
                'rumah_sendiri'                              => $kualitasPersalinan['rumah_sendiri'] ?? 0,
            ],
            'pertolongan_persalinan' => [
                'jumlah_persalinan_ditolong_dokter'         => $kualitasPersalinan['persalinan_ditolong_dokter'] ?? 0,
                'jumlah_persalinan_ditolong_bidan'          => $kualitasPersalinan['persalinan_ditolong_bidan'] ?? 0,
                'jumlah_persalinan_ditolong_perawat'        => $kualitasPersalinan['persalinan_ditolong_perawat'] ?? 0,
                'jumlah_persalinan_ditolong_dukun_bersalin' => $kualitasPersalinan['persalinan_ditolong_dukun_bersalin'] ?? 0,
                'jumlah_persalinan_ditolong_keluarga'       => $kualitasPersalinan['persalinan_ditolong_keluarga'] ?? 0,
            ],
            'cakupan_imunisasi' => [
                'jumlah_bayi_usia_2_bulan'                           => $cakupanImunisasi['bayi_usia_2_bulan'] ?? 0,
                'jumlah_bayi_2_bulan_imunisasi_dpt1_bcg_dan_polio1'  => $cakupanImunisasi['bayi_2_bulan_imunisasi_dpt_1_bcg_dan_polio_1'] ?? 0,
                'jumlah_bayi_usia_3_bulan'                           => $cakupanImunisasi['bayi_usia_3_bulan'] ?? 0,
                'jumlah_bayi_3_bulan_yang_imunisasi_dpt2_dan_polio2' => $cakupanImunisasi['bayi_3_bulan_yang_imunisasi_dpt_2_dan_polio_2'] ?? 0,
                'jumlah_bayi_usia_4_bulan'                           => $cakupanImunisasi['bayi_usia_4_bulan'] ?? 0,
                'jumlah_bayi_4_bulan_yang_imunisasi_dpt3_dan_polio3' => $cakupanImunisasi['bayi_4_bulan_yang_imunisasi_dpt_3_dan_polio_3'] ?? 0,
                'jumlah_bayi_9_bulan'                                => $cakupanImunisasi['bayi_9_bulan'] ?? 0,
                'jumlah_bayi_9_bulan_yang_imunisasi_campak'          => $cakupanImunisasi['bayi_9_bulan_yang_imunisasi_campak'] ?? 0,
                'jumlah_bayi_yang_sudah_imunisasi_cacar'             => $cakupanImunisasi['bayi_yang_sudah_imunisasi_cacar'] ?? 0,
            ],

            'perkembangan_pasangan_usia_subur' => [
                'jumlah_remaja_putri_usia_12_17_tahun'               => $pasanganUsiaSubur['remaja_putri_usia_12_17_tahun'] ?? 0,
                'jumlah_perempuan_usia_subur_15_49_tahun'            => $pasanganUsiaSubur['perempuan_usia_subur_15_49_tahun'] ?? 0,
                'jumlah_wanita_kawin_muda_usia_kurang_dari_16_tahun' => $pasanganUsiaSubur['wanita_kawin_muda_usia_kurang_dari_16_tahun'] ?? 0,
                'jumlah_pasangan_usia_subur'                         => $pasanganUsiaSubur['pasangan_usia_subur_pasangan'] ?? 0,
            ],
            'keluarga_berencana' => [
                'jumlah_akseptor_kb'                            => $pasanganUsiaSubur['jumlah_kb'] ?? 0,
                'jumlah_pengguna_alat_kontrasepsi_suntik'       => $pasanganUsiaSubur['pengguna_alat_kontrasepsi_suntik'] ?? 0,
                'jumlah_pengguna_metode_kontrasepsi_spiral'     => $pasanganUsiaSubur['pengguna_metode_kontrasepsi_spiral'] ?? 0,
                'jumlah_pengguna_alat_kontrasepsi_kondom'       => $pasanganUsiaSubur['pengguna_alat_kontrasepsi_kondom'] ?? 0,
                'jumlah_pengguna_metode_kontrasepsi_pil'        => $pasanganUsiaSubur['pengguna_metode_kontrasepsi_pil'] ?? 0,
                'jumlah_pengguna_metode_vasektomi'              => $pasanganUsiaSubur['pengguna_metode_vasektomi'] ?? 0,
                'jumlah_pengguna_metode_kontrasepsi_tubektomi'  => $pasanganUsiaSubur['pengguna_metode_kontrasepsi_tubektomi'] ?? 0,
                'jumlah_pengguna_metode_kb_kelender_kb_alamiah' => $pasanganUsiaSubur['pengguna_metode_kb_kelender_kb_alamiah'] ?? 0,
                'jumlah_pengguna_metode_kb_obat_tradisional'    => $pasanganUsiaSubur['pengguna_metode_kb_obat_tradisional'] ?? 0,
                'jumlah_pengguna_alat_kontrasepsi_metode_xxx'   => $pasanganUsiaSubur['pengguna_alat_kontrasepsi_metode_lainnya'] ?? 0,
                'jumlah_pus_yang_tidak_menggunakan_metode_kb'   => $pasanganUsiaSubur['jumlah_pus'] ?? 0,
            ],

            'wabah_penyakit' => [],

            'angka_harapan_hidup' => [
                'angka_harapan_hidup_penduduk_desa_kelurahan' => $angkaHarapanHidup['harapan_hidup_desa'] ?? 0,
                'angka_harapan_hidup_penduduk_kabupaten_kota' => $angkaHarapanHidup['harapan_hidup_kab'] ?? 0,
                'angka_harapan_hidup_provinsi'                => $angkaHarapanHidup['harapan_hidup_prov'] ?? 0,
                'angka_harapan_hidup_nasional'                => $angkaHarapanHidup['harapan_hidup_nasional'] ?? 0,
            ],
            'cakupan_pemenuhan_kebutuhan_air_bersih' => [
                'jumlah_keluarga_menggunakan_sumur_gali'                                     => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_sumur_gali'] ?? 0,
                'jumlah_keluarga_pelanggan_pam'                                              => $cakupanPemenuhanKebutuhanAirBersih['keluarga_pelanggan_pam'] ?? 0,
                'jumlah_keluarga_menggunakan_penampung_air_hujan'                            => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_penampung_air_hujan'] ?? 0,
                'jumlah_keluarga_menggunakan_sumur_pompa'                                    => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_sumur_pompa'] ?? 0,
                'jumlah_keluarga_menggunakan_perpipaan_air_kran'                             => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_perpipaan_air_kran'] ?? 0,
                'jumlah_keluarga_menggunakan_hidran_umum'                                    => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_hidran_umum'] ?? 0,
                'jumlah_keluarga_menggunakan_air_sungai'                                     => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_air_sungai'] ?? 0,
                'jumlah_keluarga_menggunakan_embung'                                         => $cakupanPemenuhanKebutuhanAirBersih['keluarga_menggunakan_embung'] ?? 0,
                'jumlah_keluarga_yang_menggunakan_mata_air'                                  => $cakupanPemenuhanKebutuhanAirBersih['keluarga_yang_menggunakan_mata_air'] ?? 0,
                'jumlah_keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut'       => $cakupanPemenuhanKebutuhanAirBersih['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_air_laut'] ?? 0,
                'jumlah_keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas' => $cakupanPemenuhanKebutuhanAirBersih['keluarga_yang_tidak_mendapatkan_akses_air_minum_dari_sumber_di_atas'] ?? 0,
                'total_jumlah_keluarga'                                                      => $cakupanPemenuhanKebutuhanAirBersih['total_jumlah_keluarga'] ?? 0,
            ],
            'perilaku_hidup_bersih_dan_sehat' => [
                'jumlah_keluarga_memiliki_wc_yang_sehat'                             => $perilakuHidupBersihSehat['jumlah_keluarga_memiliki_wc_yang_sehat'] ?? 0,
                'jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan' => $perilakuHidupBersihSehat['jumlah_keluarga_memiliki_wc_yang_kurang_memenuhi_standar_kesehatan'] ?? 0,
                'jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan'  => $perilakuHidupBersihSehat['jumlah_keluarga_biasa_buang_air_besar_di_sungai_parit_kebun_hutan'] ?? 0,
                'jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum'                => $perilakuHidupBersihSehat['jumlah_keluarga_yang_menggunakan_fasilitas_mck_umum'] ?? 0,
            ],

            'pola_makan' => [
                'kebiasaan_penduduk_makan_dlm_sehari_1_kali'        => $perilakuHidupBersihSehat['kebiasaan_penduduk_makan_dalam_sehari_1_kali'] ?? 0,
                'kebiasaan_penduduk_makan_sehari_2_kali'            => $perilakuHidupBersihSehat['kebiasaan_penduduk_makan_sehari_2_kali'] ?? 0,
                'kebiasaan_penduduk_makan_sehari_3_kali'            => $perilakuHidupBersihSehat['kebiasaan_penduduk_makan_sehari_3_kali'] ?? 0,
                'kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali' => $perilakuHidupBersihSehat['kebiasaan_penduduk_makan_sehari_lebih_dari_3_kali'] ?? 0,
                'penduduk_yang_belum_tentu_sehari_makan_1_kali'     => $perilakuHidupBersihSehat['penduduk_yang_belum_tentu_sehari_makan_1_kali'] ?? 0,
            ],

            'kebiasaan_berobat_bila_sakit' => [
                'dukun_terlatih'                                           => $perilakuHidupBersihSehat['dukun_terlatih'] ?? 0,
                'dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu' => $perilakuHidupBersihSehat['dokter_puskesmas_mantri_kesehatan_perawat_bidan_posyandu'] ?? 0,
                'obat_tradisional_dari_dukun_pengobatan_alternatif'        => $perilakuHidupBersihSehat['obat_tradisional_dari_dukun_pengobatan_alternatif'] ?? 0,
                'paranormal'                                               => $perilakuHidupBersihSehat['paranormal'] ?? 0,
                'obat_tradisional_dari_keluarga_sendiri'                   => $perilakuHidupBersihSehat['obat_tradisional_dari_keluarga_sendiri'] ?? 0,
                'tidak_diobati'                                            => $perilakuHidupBersihSehat['tidak_diobati'] ?? 0,

            ],
            'status_gizi_balita' => [
                'jumlah_balita'                => $statusGiziBalita['jumlah_balita'] ?? 0,
                'jumlah_balita_bergizi_buruk'  => $statusGiziBalita['jumlah_balita_bergizi_buruk'] ?? 0,
                'jumlah_balita_bergizi_baik'   => $statusGiziBalita['jumlah_balita_bergizi_baik'] ?? 0,
                'jumlah_balita_bergizi_kurang' => $statusGiziBalita['jumlah_balita_bergizi_kurang'] ?? 0,
                'jumlah_balita_bergizi_lebih'  => $statusGiziBalita['jumlah_balita_bergizi_lebih'] ?? 0,

            ],
            'penderita_sakit'                                        => $dataPenderitaSakit,
            'perkembangan_sarana_dan_prasarana_kesehatan_masyarakat' => [
                'jumlah_mck_umum'                                  => $perkembanganSaranaPrasarana['jumlah_mck_umum'] ?? 0,
                'jumlah_posyandu'                                  => $perkembanganSaranaPrasarana['jumlah_posyandu'] ?? 0,
                'jumlah_kader_posyandu_aktif'                      => $perkembanganSaranaPrasarana['jumlah_kader_posyandu_aktif'] ?? 0,
                'jumlah_pembina_posyandu'                          => $perkembanganSaranaPrasarana['jumlah_pembina_posyandu'] ?? 0,
                'jumlah_dasawisma'                                 => $perkembanganSaranaPrasarana['jumlah_dasawisma'] ?? 0,
                'jumlah_pengurus_dasa_wisma_aktif'                 => $perkembanganSaranaPrasarana['jumlah_pengurus_dasa_wisma_aktif'] ?? 0,
                'jumlah_kader_bina_keluarga_balita_aktif'          => $perkembanganSaranaPrasarana['jumlah_kader_bina_keluarga_balita_aktif'] ?? 0,
                'jumlah_petugas_lapangan_keluarga_berencana_aktif' => $perkembanganSaranaPrasarana['jumlah_petugas_lapangan_keluarga_berencana_aktif'] ?? 0,
                'buku_rencana_kegiatan_posyandu'                   => $perkembanganSaranaPrasarana['buku_rencana_kegiatan_posyandu'] ?? 0,
                'buku_data_pengunjung_posyandu'                    => $perkembanganSaranaPrasarana['buku_data_pengunjung_posyandu'] ?? 0,
                'buku_kegiatan_pelayanan_posyandu'                 => $perkembanganSaranaPrasarana['buku_kegiatan_pelayanan_posyandu'] ?? 0,
                'buku_administrasi_posyandu_lainnya'               => $perkembanganSaranaPrasarana['buku_administrasi_posyandu_lainnya'] ?? 0,
                'jumlah_kegiatan_posyandu'                         => $perkembanganSaranaPrasarana['jumlah_kegiatan_posyandu_jenis'] ?? 0,
                'jumlah_kader_kesehatan_lainnya'                   => $perkembanganSaranaPrasarana['jumlah_kader_kesehatan_lainnya'] ?? 0,
                'jumlah_kegiatan_pengobatan_gratis'                => $perkembanganSaranaPrasarana['jumlah_kegiatan_pengobatan_gratis_jenis'] ?? 0,
                'jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn'  => $perkembanganSaranaPrasarana['jumlah_kegiatan_pemberantasan_sarang_nyamuk_psn_jenis'] ?? 0,
                'jumlah_kegiatan_pembersihan_lingkungan'           => $perkembanganSaranaPrasarana['jumlah_kegiatan_pembersihan_lingkungan_jenis'] ?? 0,
                'lainnya'                                          => $perkembanganSaranaPrasarana['kegiatan_lainnya_jenis'] ?? 0,
            ],
            'konflik_sara' => [
                'kasus_konflik_pada_tahun_ini'                                                                                    => $konflikSara['konflik_tahun_ini'] ?? 0,
                'kasus_konflik_sara_pada_tahun_ini'                                                                               => $konflikSara['konflik_sara_tahun_ini'] ?? 0,
                'jumlah_kasus_pertengkaran_dan_atau_perkelahian_antar_tetangga'                                                   => $konflikSara['kasus_antar_tetangga'] ?? 0,
                'jumlah_kasus_pertengkaran_dan_atau_perkelahian_antar_rt_rw'                                                      => $konflikSara['kasus_antar_rt'] ?? 0,
                'jumlah_konflik_antar_masyarakat_pendatang_dengan_penduduk_asli'                                                  => $konflikSara['konflik_masyarakat_penduduk'] ?? 0,
                'jumlah_kasus_antar_kelompok_masyarakat_dalam_desa_kelurahan_dengan_kelompok_masyarakat_dari_desa_kelurahan_lain' => $konflikSara['kasus_kelompok_masyarakat'] ?? 0,
                'jumlah_konflik_antara_masyarakat_dengan_pemerintah'                                                              => $konflikSara['konflik_masyarakat_pemerintah'] ?? 0,
                'jumlah_kerugian_material_akibat_konflik_antara_masyarakat_dan_pemerintah'                                        => $konflikSara['kerugian_masyarakat_pemerintah'] ?? 0,
                'jumlah_korban_jiwa_akibat_konflik_antara_masyarakat_dengan_pemerintah'                                           => $konflikSara['korban_masyarakat_pemerintah'] ?? 0,
                'jumlah_konflik_antara_masyarakat_dengan_perusahaan'                                                              => $konflikSara['konflik_masyarakat_perusahaan'] ?? 0,
                'jumlah_korban_jiwa_akibat_konflik_antara_masyarakat_dengan_perusahaan'                                           => $konflikSara['korban_masyarakat_perusahaan'] ?? 0,
                'jumlah_konflik_politik_antara_masyarakat_dengan_lembaga_politik'                                                 => $konflikSara['konflik_masyarakat_politik'] ?? 0,
                'jumlah_korban_jiwa_akibat_konflik_politik_antara_masyarakat_dengan_lembaga_politik'                              => $konflikSara['korban_masyarakat_politik'] ?? 0,
                'jumlah_kerugian_material_akibat_konflik_politik_antara_masyarakat_dengan_lembaga_politik'                        => $konflikSara['kerugian_masyarakat_politik'] ?? 0,
                'jumlah_prasarana_dan_sarana_yang_rusak_terbakar_akibat_konflik_sara'                                             => $konflikSara['sarpras_rusak'] ?? 0,
                'jumlah_rumah_penduduk_yang_rusak_terbakar_akibat_konflik_sara'                                                   => $konflikSara['rumah_terbakar'] ?? 0,
                'jumlah_korban_luka_akibat_konflik_sara'                                                                          => $konflikSara['korban_luka'] ?? 0,
                'jumlah_korban_meninggal_akibat_konflik_sara'                                                                     => $konflikSara['korban_meninggal'] ?? 0,
                'jumlah_janda_akibat_konflik_sara'                                                                                => $konflikSara['janda'] ?? 0,
                'jumlah_anak_yatim_akibat_konflik_sara'                                                                           => $konflikSara['anak_yatim'] ?? 0,
                'jumlah_pelaku_konflik_yang_diadili_atau_diproses_secara_hukum'                                                   => $konflikSara['pelaku'] ?? 0,
            ],
            'perkelahian' => [
                'kasus_perkelahian_yang_terjadi_pada_tahun_ini'                 => $perkelahian['kejadian'] ?? 0,
                'kasus_perkelahian_yang_menimbulkan_korban_jiwa'                => $perkelahian['korban_jiwa'] ?? 0,
                'kasus_perkelahian_yang_menimbulkan_luka_parah'                 => $perkelahian['luka_parah'] ?? 0,
                'kasus_perkelahian_yang_menimbulkan_kerugian_material'          => $perkelahian['kerugian'] ?? 0,
                'jumlah_pelaku_konflik_yang_diadili_atau_diproses_secara_hukum' => $perkelahian['jumlah'] ?? 0,
            ],
            'pencurian' => [
                'kasus_pencurian_dan_perampokan_yang_terjadi_tahun_ini'                      => $pencurian['kejadian'] ?? 0,
                'kasus_pencurian_perampokan_yang_korbannya_penduduk_desa_kelurahan_setempat' => $pencurian['korban'] ?? 0,
                'kasus_pencurian_perampokan_yang_pelakunya_penduduk_desa_kelurahan_setempat' => $pencurian['pelaku'] ?? 0,
                'jumlah_pencurian_dengan_kekerasan_senjata_api'                              => $pencurian['jumlah_pencurian'] ?? 0,
                'jumlah_pelaku_yang_diadili_atau_diproses_secara_hukum'                      => $pencurian['jumlah_pelaku'] ?? 0,

            ],
            'penjarahan_dan_penyerobotan_tanah' => [
                'jumlah_kasus_penjarahan_dan_penyerobotan_tanah_yang_korban_dan_pelakunya_penduduk_setempat'                            => $penjarahanPenyerobotanTanah['korban_pelaku_setempat'] ?? 0,
                'jumlah_kasus_penjarahan_dan_penyerobotan_tanah_yang_korban_penduduk_setempat_tetapi_pelakunya_bukan_penduduk_setempat' => $penjarahanPenyerobotanTanah['korban_setempat'] ?? 0,
                'jumlah_kasus_penjarahan_dan_penyerobotan_tanah_yang_korban_bukan_penduduk_setempat_tetapi_pelakunya_penduduk_setempat' => $penjarahanPenyerobotanTanah['pelaku_setempat'] ?? 0,
                'jumlah_pelaku_yang_diadili_atau_diproses_secara_hukum'                                                                 => $penjarahanPenyerobotanTanah['jumlah'] ?? 0,
            ],
            'perjudian_penipuan_dan_penggelapan' => [
                'jumlah_penduduk_yang_memiliki_kebiasaan_berjudi'           => $perjudianPenipuan['penduduk'] ?? 0,
                'jenis_perjudian_yang_ada_di_desa_kelurahan_ini'            => $perjudianPenipuan['perjudian'] ?? 0,
                'jumlah_kasus_penipuan_dan_atau_penggelapan'                => $perjudianPenipuan['penipuan'] ?? 0,
                'jumlah_kasus_sengketa_warisan_jual_beli_dan_utang_piutang' => $perjudianPenipuan['sengketa'] ?? 0,

            ],
            'pemakaian_miras_dan_narkoba' => [
                'jumlah_warung_toko_yang_menyediakan_miras'                     => $pemakaianMiras['warung_miras'] ?? 0,
                'jumlah_penduduk_yang_mengkonsumsi_miras'                       => $pemakaianMiras['penduduk_miras'] ?? 0,
                'jumlah_kasus_mabuk_akibat_miras'                               => $pemakaianMiras['mabuk_miras'] ?? 0,
                'jumlah_pengedar_narkoba'                                       => $pemakaianMiras['pengedar_narkoba'] ?? 0,
                'jumlah_penduduk_yang_mengkonsumsi_narkoba'                     => $pemakaianMiras['penduduk_narkoba'] ?? 0,
                'jumlah_kasus_mabuk_teler_akibat_narkoba'                       => $pemakaianMiras['mabuk_narkoba'] ?? 0,
                'jumlah_kasus_kematian_akibat_narkoba'                          => $pemakaianMiras['kematian_narkoba'] ?? 0,
                'jumlah_pelaku_miras_yang_diadili_atau_diproses_secara_hukum'   => $pemakaianMiras['pelaku_miras'] ?? 0,
                'jumlah_pelaku_narkoba_yang_diadili_atau_diproses_secara_hukum' => $pemakaianMiras['pelaku_narkoba'] ?? 0,
            ],
            'prostitusi' => [
                'jumlah_penduduk_pekerja_pramu_nikmat'                                                                            => $prostitusi['penduduk'] ?? 0,
                'lokalisasi_prostitusi'                                                                                           => $prostitusi['lokalisasi'] ?? 0,
                'jumlah_tempat_yang_menyediakan_wanita_pramunikmat_secara_terselubung_warung_remang_remang_panti_pijat_hotel_dll' => $prostitusi['wanita_pramunikmat'] ?? 0,
                'jumlah_kasus_konflik_akibat_maraknya_praktek_prostitusi'                                                         => $prostitusi['kasus'] ?? 0,
                'jumlah_pembinaan_pelaku_prostitusi'                                                                              => $prostitusi['pembinaan'] ?? 0,
                'jumlah_penertiban_penyediaan_tempat_prostitusi'                                                                  => $prostitusi['penertiban'] ?? 0,
            ],
            'pembunuhan' => [
                'jumlah_kasus_pembunuhan_pada_tahun_ini'                                 => $pembunuhan['kejadian'] ?? 0,
                'jumlah_kasus_pembunuhan_dengan_korban_penduduk_desa_kelurahan_setempat' => $pembunuhan['korban'] ?? 0,
                'jumlah_kasus_pembunuhan_dengan_pelaku_penduduk_setempat'                => $pembunuhan['pelaku'] ?? 0,
                'jumlah_kasus_bunuh_diri'                                                => $pembunuhan['bunuh_diri'] ?? 0,
                'jumlah_kasus_yang_diproses_secara_hukum'                                => $pembunuhan['jumlah'] ?? 0,
            ],
            'penculikan' => [
                'jumlah_kasus_penculikan'                                                => $penculikan['kejadian'] ?? 0,
                'jumlah_kasus_penculikan_dengan_korban_penduduk_desa_kelurahan_setempat' => $penculikan['korban'] ?? 0,
                'jumlah_kasus_penculikan_dengan_pelaku_penduduk_setempat'                => $penculikan['pelaku'] ?? 0,
                'jumlah_kasus_penculikan_yang_diselesaikan_secara_hukum'                 => $penculikan['jumlah'] ?? 0,
            ],
            'kejahatan_seksual' => [
                'jumlah_kasus_perkosaan_pada_tahun_ini'                       => $kejahatanSeksual['kejadian'] ?? 0,
                'jumlah_kasus_perkosaan_anak_pada_tahun_ini'                  => $kejahatanSeksual['anak'] ?? 0,
                'jumlah_kasus_kehamilan_di_luar_nikah_menurut_hukum_negara'   => $kejahatanSeksual['hukum_negara'] ?? 0,
                'jumlah_kasus_kehamilan_di_luar_nikah_menurut_hukum_adat'     => $kejahatanSeksual['hukum_adat'] ?? 0,
                'jumlah_tempat_penampungan_persewaan_kamar_bagi_pekerja_seks' => $kejahatanSeksual['penampungan'] ?? 0,
            ],
            'masalah_kesejahteraan_sosial' => [
                'jumlah_gelandangan'                                                                         => $masalahKesejahteraanSosial['gelandangan'] ?? 0,
                'jumlah_pengemis_jalanan'                                                                    => $masalahKesejahteraanSosial['pengemis'] ?? 0,
                'jumlah_anak_jalanan_dan_terlantar'                                                          => $masalahKesejahteraanSosial[''] ?? 0,
                'jumlah_manusia_lanjut_usia_terlantar'                                                       => $masalahKesejahteraanSosial['manula'] ?? 0,
                'jumlah_orang_gila_stress_cacat_mental'                                                      => $masalahKesejahteraanSosial['orang_gila'] ?? 0,
                'jumlah_orang_cacat_fisik'                                                                   => $masalahKesejahteraanSosial['cacat'] ?? 0,
                'jumlah_orang_kelainan_kulit'                                                                => $masalahKesejahteraanSosial['kelainan'] ?? 0,
                'jumlah_orang_yang_tidur_di_kolong_jembatan_emperan'                                         => $masalahKesejahteraanSosial['emperan'] ?? 0,
                'jumlah_rumah_dan_kawasan_kumuh'                                                             => $masalahKesejahteraanSosial['kumuh'] ?? 0,
                'jumlah_panti_jompo'                                                                         => $masalahKesejahteraanSosial['jompo'] ?? 0,
                'jumlah_panti_asuhan_anak'                                                                   => $masalahKesejahteraanSosial['asuhan'] ?? 0,
                'jumlah_rumah_singgah_anak_jalanan'                                                          => $masalahKesejahteraanSosial['rumah_singgah'] ?? 0,
                'jumlah_penghuni_jalur_hijau_dan_taman_kota'                                                 => $masalahKesejahteraanSosial['taman_kota'] ?? 0,
                'jumlah_penghuni_bantaran_sungai'                                                            => $masalahKesejahteraanSosial['bantaran_sungai'] ?? 0,
                'jumlah_penghuni_pinggiran_rel_kereta_api'                                                   => $masalahKesejahteraanSosial['rel_kereta'] ?? 0,
                'jumlah_penghuni_liar_di_lahan_dan_fasilitas_umum_lainnya'                                   => $masalahKesejahteraanSosial['liar'] ?? 0,
                'jumlah_anggota_kelompok_masyarakat_suku_keluarga_terasing_terisolir_terlantar_dan_primitif' => $masalahKesejahteraanSosial['primitif'] ?? 0,
                'jumlah_anak_yatim_usia_0_18_tahun'                                                          => $masalahKesejahteraanSosial['yatim'] ?? 0,
                'jumlah_anak_piatu_0___18_tahun'                                                             => $masalahKesejahteraanSosial['piatu'] ?? 0,
                'jumlah_anak_yatim_piatu_0_18_tahun'                                                         => $masalahKesejahteraanSosial['yatim_piatu'] ?? 0,
                'jumlah_janda'                                                                               => $masalahKesejahteraanSosial['janda'] ?? 0,
                'jumlah_duda'                                                                                => $masalahKesejahteraanSosial['duda'] ?? 0,
                'jumlah_anak_remaja_preman_dan_pengangguran'                                                 => $masalahKesejahteraanSosial['pengangguran'] ?? 0,
                'jumlah_anak_usia_7_12_tahun_yang_tidak_sekolah_di_sd_sederajat'                             => $masalahKesejahteraanSosial['sd'] ?? 0,
                'jumlah_anak_usia_13_15_tahun_yang_tidak_sekolah_di_sltp_sederajat'                          => $masalahKesejahteraanSosial['sltp'] ?? 0,
                'jumlah_anak_usia_15_18_tahun_yang_tidak_sekolah_di_slta_sederajat'                          => $masalahKesejahteraanSosial['slta'] ?? 0,
                'jumlah_anak_yang_bekerja_membantu_keluarga_menghasilkan_uang'                               => $masalahKesejahteraanSosial['anak_bekerja'] ?? 0,
                'jumlah_perempuan_yang_menjadi_kepala_keluarga'                                              => $masalahKesejahteraanSosial['perempuan_kepala'] ?? 0,
                'jumlah_penduduk_eks_napi'                                                                   => $masalahKesejahteraanSosial['napi'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_banjir'                                     => $masalahKesejahteraanSosial['banjir'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_gunung_berapi'                              => $masalahKesejahteraanSosial['gunung'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_tsunami'                                    => $masalahKesejahteraanSosial['tsunami'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_gempa_bumi'                                 => $masalahKesejahteraanSosial['gempa'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_kebakaran_rumah'                            => $masalahKesejahteraanSosial['kebakaran'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_kekekeringan'                               => $masalahKesejahteraanSosial['kekeringan'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_tanah_longsor'                              => $masalahKesejahteraanSosial['longsor'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_bencana_kebakaran_hutan'                            => $masalahKesejahteraanSosial['hutan'] ?? 0,
                'jumlah_penduduk_rawan_bencana_kelaparan'                                                    => $masalahKesejahteraanSosial['kelaparan'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_rawan_air_bersih'                                         => $masalahKesejahteraanSosial['air_bersih'] ?? 0,
                'jumlah_penduduk_tinggal_di_daerah_lahan_kritis_dan_tandus'                                  => $masalahKesejahteraanSosial['tandus'] ?? 0,
                'jumlah_penduduk_tinggal_di_kawasan_padat_penduduk_dan_kumuh'                                => $masalahKesejahteraanSosial['padat'] ?? 0,
                'jumlah_warga_pendatang_yang_tidak_memiliki_keterangan_penduduk'                             => $masalahKesejahteraanSosial['pendatang'] ?? 0,
                'jumlah_warga_pendatang_dan_atau_pekerja_musiman'                                            => $masalahKesejahteraanSosial['musiman'] ?? 0,
            ],

            'kekerasan_dalam_rumah_tangga' => [
                'jumlah_kasus_kekerasan_suami_terhadap_istri'                              => $kekerasanRT['suami'] ?? 0,
                'jumlah_kasus_kekerasan_istri_terhadap_suami'                              => $kekerasanRT['istri'] ?? 0,
                'jumlah_kasus_kekerasan_orang_tua_terhadap_anak'                           => $kekerasanRT['ortu'] ?? 0,
                'jumlah_kasus_kekerasan_anak_terhadap_orang_tua'                           => $kekerasanRT['anak'] ?? 0,
                'jumlah_kasus_kekerasan_kepala_keluarga_terhadap_anggota_keluarga_lainnya' => $kekerasanRT['kepala_keluarga'] ?? 0,
            ],
            'teror_dan_intimidasi' => [
                'jumlah_kasus_intimidasi_dan_atau_teror_anggota_masyarakat_dari_pihak_dalam_desa_dan_kelurahan'                   => $terorIntimidasi['intimidasi_pihak_dalam'] ?? 0,
                'jumlah_kasus_intimidasi_dan_atau_teror_anggota_masyarakat_dari_pihak_luar_desa_atau_kelurahan'                   => $terorIntimidasi['intimidasi_pihak_luar'] ?? 0,
                'jumlah_kasus_selebaran_gelap_dan_atau_isu_yang_bersifat_teror_dan_ancaman_untuk_menimbulkan_ketakutan_penduduk'  => $terorIntimidasi['selebaran_gelap'] ?? 0,
                'jumlah_kasus_terorisme_yang_terjadi_di_desa_dan_kelurahan_tahun_ini'                                             => $terorIntimidasi['terorisme'] ?? 0,
                'jumlah_kasus_hasutan_dan_pemaksaan_kehendak_kelompok_tertentu_kepada_masyarakat'                                 => $terorIntimidasi['hasutan'] ?? 0,
                'jumlah_penyelesaian_kasus_teror_dan_intimidasi_serta_hasutan_di_masyarakat_baik_secara_adat_maupun_hukum_formal' => $terorIntimidasi['penyelesaian'] ?? 0,
            ],
            'pelembagaan_sistem_keamanan_lingkungan_semesta' => [
                'organisasi_siskamling'                                        => $pelembagaanSistemKeamanan['siskamling'] ?? 0,
                'organisasi_pertahanan_sipil_dan_perlindungan_masyarakat'      => $pelembagaanSistemKeamanan['pertahanan'] ?? 0,
                'jumlah_rt_atau_sebutan_lainnya_yang_ada_siskamlimg_pos_ronda' => $pelembagaanSistemKeamanan['jumlah_siskamling'] ?? 0,
                'jumlah_anggota_hansip_dan_linmas'                             => $pelembagaanSistemKeamanan['jumlah_hansip'] ?? 0,
                'jadwal_kegiatan_siskamling_dan_pos_ronda'                     => $pelembagaanSistemKeamanan['jadwal'] ?? 0,
                'buku_anggota_hansip_dan_linmas'                               => $pelembagaanSistemKeamanan['buku_anggota'] ?? 0,
                'jumlah_kelompok_satuan_pengamanan_satpam_swasta'              => $pelembagaanSistemKeamanan['satpam'] ?? 0,
                'jumlah_pembinaan_siskamling_oleh_pengurus_dan_kades_lurah'    => $pelembagaanSistemKeamanan['pembinaan'] ?? 0,
                'jumlah_pos_jaga_induk_desa_kelurahan'                         => $pelembagaanSistemKeamanan['pos_jaga'] ?? 0,
            ],
            // abaikan dulu, nama field aneh
            'kesadaran_berpemerintahan_berbangsa_dan_bernegara' => [
                'jenis_kegiatan_pemantapan_nilai_ideologi_pancasila_sebagai_dasar_negara'                                                                                                                   => $kesadaranBerbangsa['7a2891c06625f'] ?? 0,
                'jumlah_kegiatan_pemantapan_nilai_ideologi_pancasila_sebagai_dasar_negara'                                                                                                                  => $kesadaranBerbangsa['af23bc98e4d57'] ?? 0,
                'jenis_jenis_kegiatan_pemantapan_nilai_bhinneka_tunggal_ika'                                                                                                                                => $kesadaranBerbangsa['1b4c3d82e5f96'] ?? 0,
                'jumlah_kegiatan_pemantapan_nilai_bhinneka_tunggal_ika'                                                                                                                                     => $kesadaranBerbangsa['c6a7d8e2b9f34'] ?? 0,
                'jenis_kegiatan_pemantapan_kesatuan_bangsa_lainnya'                                                                                                                                         => $kesadaranBerbangsa['5e4a3b2c1d8f9'] ?? 0,
                'jumlah_kegiatan_pemantapan_kesatuan_bangsa_lainnya'                                                                                                                                        => $kesadaranBerbangsa['92c3b5e7d8f1a'] ?? 0,
                'jumlah_kasus_warga_desa_kelurahan_yang_minta_suaka_lari_ke_luar_negeri'                                                                                                                    => $kesadaranBerbangsa['6b7c2d8e1f9a3'] ?? 0,
                'jumlah_warga_yang_melintasi_perbatasan_ke_negara_tetangga_secara_resmi'                                                                                                                    => $kesadaranBerbangsa['3a4b5c2d8f1e9'] ?? 0,
                'jumlah_warga_yang_melintasi_perbatasan_negara_tetangga_secara_tidak_resmi'                                                                                                                 => $kesadaranBerbangsa['8d1e4f7c2b9a6'] ?? 0,
                'jumlah_kasus_pertempuran_atau_perlawanan_antar_kelompok_pengacau_keamanan_di_perbatasan_negara_dengan_warga_aparat_dari_desa_kelurahan'                                                    => $kesadaranBerbangsa['5a2b8c3d4f1e9'] ?? 0,
                'jumlah_serangan_terhadap_fasilitas_umum_dan_milik_masyarakat_oleh_kelompok_pengacau_di_desa_kelurahan_perbatasan_negara_tetangga'                                                          => $kesadaranBerbangsa['4b6c9d1e2f3a5'] ?? 0,
                'jumlah_kasus_yang_diklasifikasikan_merongrong_keutuhan_nkri_dan_kesatuan_bangsa_indonesia_di_desa_kelurahan_tahun_ini'                                                                     => $kesadaranBerbangsa['d5a6b7c3e8f2'] ?? 0,
                'jumlah_korban_manusia_baik_luka_maupun_tewas_serta_korban_materi_lainnya_akibat_serangan_kelompok_pengacau_keamanan'                                                                       => $kesadaranBerbangsa['6c2d3e4a5b8f'] ?? 0,
                'jumlah_masalah_ketenagakerjaan_di_perbatasan_antar_negara_yang_terjadi_tahun_ini'                                                                                                          => $kesadaranBerbangsa['1a3b4c6d8e5f'] ?? 0,
                'jumlah_kasus_kejahatan_pencurian_penjarahan_perampokan_dan_intimidasi_serta_teror_yang_terjadi_di_desa_kelurahan_perbatasan_antar_negara'                                                  => $kesadaranBerbangsa['9c2d4e6f8a1b'] ?? 0,
                'jumlah_sengketa_perbatasan_antar_negara_yang_terjadi_desa_kelurahan_ini'                                                                                                                   => $kesadaranBerbangsa['5d3e4f6a7b1c'] ?? 0,
                'jumlah_kasus_sengketa_perbatasan_yang_terjadi_baik_antar_desa_kelurahan_dalam_kecamatan_maupun_antar_kecamatan_antar_kabupaten_kota_dan_desa_kelurahan_antar_provinsi'                     => $kesadaranBerbangsa['2e3f4c5d6b7a'] ?? 0,
                'jumlah_kasus_yang_terkait_dengan_perbatasan_antar_negara_yang_dilaporkan_kepala_desa_lurah_ke_pemerintah_tingkat_atasnya'                                                                  => $kesadaranBerbangsa['1d4e5f7b8c2a'] ?? 0,
                'jumlah_kasus_yang_mengarah_kepada_tindakan_disintegrasi_bangsa_dan_pengingkaran_nkri_pancasila_uud_1945_dan_bhinneka_tunggal_ika_yang_difasilitasi_penyelesaiannya_oleh_kepala_desa_lurah' => $kesadaranBerbangsa['a3b4c5e6f8d9'] ?? 0,
                'jumlah_kasus_penangkapan_nelayan_asing_di_wilayah_perairan_desa_kelurahan'                                                                                                                 => $kesadaranBerbangsa['4c5d7e8f2a3b'] ?? 0,
                'jumlah_kasus_penangkapan_nelayan_petani_peternak__pekebun_perambah_hutan_asal_desa_kelurahan_di_perairan_dan_daratan_wilayah_negara_lain'                                                  => $kesadaranBerbangsa['b2c3d5e7f8a1'] ?? 0,
            ],
            // abaikan dulu, nama field aneh
            'kesadaran_membayar_pajak_dan_retribusi' => [
                'jenis_pajak_yang_dipungut_sebagai_kewenangan_dan_atau_tugas_desa_kelurahan' => $kesadaranPajak['7a2891c06625f'] ?? 0,
                'jumlah_wajib_pajak'                                                         => $kesadaranPajak['af23bc98e4d57'] ?? 0,
                'target_pbb'                                                                 => $kesadaranPajak['1b4c3d82e5f96'] ?? 0,
                'realisasi_pbb'                                                              => $kesadaranPajak['c6a7d8e2b9f34'] ?? 0,
                'jumlah_tindakan_terhadap_penunggak_pbb'                                     => $kesadaranPajak['5e4a3b2c1d8f9'] ?? 0,
                'jenis_retribusi_yang_dipungut_sebagai_tugas_dan_kewenangan_desa_kelurahan'  => $kesadaranPajak['92c3b5e7d8f1a'] ?? 0,
                'jumlah_wajib_retribusi_yang_menjadi_tugas_kewenangan_desa_kelurahan'        => $kesadaranPajak['6b7c2d8e1f9a3'] ?? 0,
                'target_retribusi_yang_menjadi_tugas_kewenangan_desa_kelurahan'              => $kesadaranPajak['3a4b5c2d8f1e9'] ?? 0,
                'realisasi_retribusi_yang_menjadi_tugas_kewenangan_desa_kelurahan'           => $kesadaranPajak['8d1e4f7c2b9a6'] ?? 0,
                'jenis_pungutan_resmi_lainnya_di_desa_kelurahan'                             => $kesadaranPajak['5a2b8c3d4f1e9'] ?? 0,
                'target_pungutan_resmi_tingkat_desa_kelurahan'                               => $kesadaranPajak['4b6c9d1e2f3a5'] ?? 0,
                'realisasi_pungutan_resmi_di_desa_kelurahan'                                 => $kesadaranPajak['d5a6b7c3e8f2'] ?? 0,
                'jumlah_kasus_pungutan_liar'                                                 => $kesadaranPajak['6c2d3e4a5b8f'] ?? 0,
                'jumlah_penyelesaian_kasus_pungutan_liar'                                    => $kesadaranPajak['1a3b4c6d8e5f'] ?? 0,
            ],
            // abaikan dulu, nama field aneh
            'partisipasi_politik' => [
                'jumlah_penduduk_yang_memiliki_hak_pilih'                                        => $partisipasiPolitik['7a2891c06625f'] ?? 0,
                'jumlah_penduduk_yang_menggunakan_hak_pilih_pada_pemilu_legislatif_yang_lalu'    => $partisipasiPolitik['3b98d28869cf6'] ?? 0,
                'jumlah_perempuan_dari_penduduk_desa_kelurahan_ini_yang_aktif_di_partai_politik' => $partisipasiPolitik['f2a591e760a34'] ?? 0,
                'jumlah_partai_politik_yang_memiliki_pengurus_sampai_di_desa_kelurahan_ini'      => $partisipasiPolitik['a4e5b5d17c902'] ?? 0,
                'jumlah_partai_politik_yang_mempunyai_kantor_di_wilayah_desa_kelurahan_ini'      => $partisipasiPolitik['6d91c7f48b530'] ?? 0,
                'jumlah_penduduk_yang_menjadi_pengurus_partai_politik_dari_desa_kelurahan'       => $partisipasiPolitik['8e2f0a1d45b9d'] ?? 0,
                'jumlah_penduduk_yang_dipilih_dalam_pemilu_legislatif_yang_lalu'                 => $partisipasiPolitik['c7132b950e461'] ?? 0,
                'jumlah_pemilih_yang_menggunakan_hak_pilih_dalam_pemilihan_presiden_wakil'       => $partisipasiPolitik['5f041d36a8e7b'] ?? 0,
            ],

            'pemilihan_kepala_daerah' => [
                'jumlah_penduduk_yang_mempunyai_hak_pilih'                                    => $partisipasiPolitik['3d35097eeba8d'] ?? 0,
                'jumlah_pemilih_yang_menggunakan_hak_pilih_dalam_pemilu_bupati_walikota_lalu' => $partisipasiPolitik['5f041d36a8e7a'] ?? 0,
                'jumlah_pemilih_yang_menggunakan_hak_pilih_dalam_pemilu_gubenur_yang_lalu'    => $partisipasiPolitik['5f041d36a8e7c'] ?? 0,
            ],
            'penentuan_kepala_desa_lurah_dan_perangkat_desa_kelurahan' => [
                'penentuan_jabatan_kepala_desa'                                              => $partisipasiPolitik['1008ff221d4d7'] ?? 0,
                'penentuan_sekretaris_desa'                                                  => $partisipasiPolitik['1008ff221d4a7'] ?? 0,
                'penentuan_perangkat_desa_termasuk_kepala_dusun'                             => $partisipasiPolitik['1008ff221d4b7'] ?? 0,
                'masa_jabatan_kepala_desa'                                                   => $partisipasiPolitik['1008ff221d4c7'] ?? 0,
                'penentuan_jabatan_lurah_dan_perangkat_kelurahan_termasuk_kepala_lingkungan' => $partisipasiPolitik['1008ff221d4e7'] ?? 0,
            ],
            'pemilihan_bpd' => [
                'jumlah_anggota_bpd'               => $partisipasiPolitik['1008ff221d4f7'] ?? 0,
                'penentuan_anggota_bpd'            => $partisipasiPolitik['1008ff221d4g7'] ?? 0,
                'pimpinan_bpd'                     => $partisipasiPolitik['1008ff221d4h7'] ?? 0,
                'pemilikan_kantor_ruang_kerja_bpd' => $partisipasiPolitik['1008ff221d4i7'] ?? 0,
                'anggaran_untuk_bpd'               => $partisipasiPolitik['1008ff221d4j7'] ?? 0,
            ],

            'produk_keputusan_bpd_tahun_ini' => [
                'peraturan_desa'                   => $partisipasiPolitik['b02797f4'] ?? 0,
                'permintaan_keterangan_kades'      => $partisipasiPolitik['aebd4c02'] ?? 0,
                'rancangan_peraturan_desa'         => $partisipasiPolitik['76cf9d8a'] ?? 0,
                'menyalurkan_aspirasi_masyarakat'  => $partisipasiPolitik['c36f4d05'] ?? 0,
                'menyatakan_pendapat_kepada_kades' => $partisipasiPolitik['da9e6fb2'] ?? 0,
                'menyampaikan_usul_kades'          => $partisipasiPolitik['852cb1d3'] ?? 0,
                'mengevaluasi_efektivitas_APBDes'  => $partisipasiPolitik['fceae1b9'] ?? 0,
            ],
            // abaikan dulu
            'pemilihan_dan_fungsi_lembaga_kemasyarakatan' => [
                'keberadaan_organisasi_lembaga_kemasyarakatan_desa_kelurahan'                                                                                                              => $partisipasiPolitik['1008ff222d4k7'] ?? 0,
                'dasar_hukum_keberadaan_lembaga_kemasyarakatan_desa_lkd'                                                                                                                   => $partisipasiPolitik['1008ff021d4l7'] ?? 0,
                'jumlah_organisasi_anggota_lembaga_kemasyarakatan_desa_termasuk_rt_rw_pkk_lkmd_k_lpm_karang_taruna_bumdes_lembaga_adat_kelompok_tani_dan_lembaga_lainnya_sesuai_ketentuan' => $partisipasiPolitik['1008ff221d47'] ?? 0,
                'dasar_hukum_pembentukan_lembaga_kemasyarakatan_kelurahan_lkk'                                                                                                             => $partisipasiPolitik['1008ff211d4j7'] ?? 0,
                'jumlah_organisasi_anggota_lembaga_kemasyarakatan_kelurahan'                                                                                                               => $partisipasiPolitik['1008ff221d4k7'] ?? 0,
                'pemilihan_pengurus_lkd_lkk'                                                                                                                                               => $partisipasiPolitik['1008ff221d4l7'] ?? 0,
                'pemilihan_pengurus_organisasi_anggota_lkd_lkk_termasuk_pkk_lpm_lkmd_k_karang_taruna_rt_rw_bumdes_lembaga_adat_kelompok_tani_dan_organisasi_anggota_lkd_lkk_lainnya'       => $partisipasiPolitik['1008ff221d4m7'] ?? 0,
                'implementasi_tugas_fungsi_dan_kewajiban_lkd_lkk'                                                                                                                          => 0,
                'jumlah_kegiatan_yang_dilaksanakan_lkd_lkk'                                                                                                                                => 0,
                'fungsi_tugas_dan_kewajiban_lembaga_kemasyarakatan_yang_dijalankan_organisasi_anggota_lkd_lkk'                                                                             => 0,
                'jumlah_kegiatan_lembaga_kemasyarakatan_yang_dijalankan_organisasi_anggota_lkd_lkk'                                                                                        => 0,
                'alokasi_anggaran_untuk_lkd_lkk'                                                                                                                                           => 0,
                'alokasi_anggaran_untuk_organisasi_anggota_lkd_lkk_termasuk_pkk_pm_lkmd_k_karang_taruna_rt_rw_kelompok_tani_dan_organisasi_lainnya'                                        => 0,
                'kantor_dan_ruangan_kerja_untuk_lkd_lkk'                                                                                                                                   => 0,
                'dukungan_pembiayaan_personil_dan_atk_untuk_sekretariat_lkd_lkk_dari_apb_desa_dan_anggaran_kelurahan_apbd'                                                                 => 0,
                'realisasi_program_kerja_organisasi_anggota_lkd_lkk'                                                                                                                       => 0,
                'keberadaan_alat_kelengkapan_organisasi_anggota_lkd_lkk_termasuk_dasawisma_dan_pokja_bidang_seksi_urusan_dan_terisi_tidaknya_struktur_organisasi_anggota_lkd_lkk'          => 0,
                'kegiatan_administrasi_dan_ketatausahaan_lkd_lkk'                                                                                                                          => 0,
            ],
            'musyawarah_perencanaan_pembangunan_desa_kelurahan_musrenbangdes_kelurahan' => [
                'jumlah_musyawarah_perencanaan_pembangunan_tingkat_desa_kelurahan_yang_dilakukan_pada_tahun_ini_termasuk_di_tingkat_dusun_dan_lingkungan'                                                                                                      => $musrenbangDesa['jumlah_musyawarah'] ?? 0,
                'jumlah_kehadiran_masyarakat_dalam_setiap_kali_musyawarah_tingkat_dusun_lingkungan_dan_desa_kelurahan'                                                                                                                                         => $musrenbangDesa['jumlah_kehadiran'] ?? 0,
                'jumlah_peserta_laki_laki_dalam_musrenbang_di_desa_kelurahan'                                                                                                                                                                                  => $musrenbangDesa['jumlah_laki'] ?? 0,
                'jumlah_peserta_perempuan_dalam_musrenbang_di_desa_dan_kelurahan'                                                                                                                                                                              => $musrenbangDesa['jumlah_perempuan'] ?? 0,
                'jumlah_musyawarah_antar_desa_dalam_perencanaan_pembangunan_yang_dikoordinasikan_kecamatan'                                                                                                                                                    => $musrenbangDesa['musyawarah_desa'] ?? 0,
                'penggunaan_profil_desa_kelurahan_sebagai_sumber_data_dasar_yang_digunakan_dalam_perencanaan_pembangunan_desa_dan_forum_musrenbang_partisipatif'                                                                                               => $musrenbangDesa['penggunaan_profil'] ?? 0,
                'penggunaan_data_bps_dan_data_sektoral_dalam_perencanaan_pembangunan_partisipatif_dan_musrenbang_di_desa_dan_kelurahan'                                                                                                                        => $musrenbangDesa['penggunaan_data'] ?? 0,
                'pelibatan_masyarakat_dalam_pemutakhiran_data_profil_desa_dan_kelurahan_sebagai_bahan_dalam_musrenbang_partisipatif'                                                                                                                           => $musrenbangDesa['pelibatan_masyarakat'] ?? 0,
                'usulan_masyarakat_yang_disetujui_menjadi_rencana_kerja_desa_dan_kelurahan'                                                                                                                                                                    => $musrenbangDesa['usulan_masyarakat'] ?? 0,
                'usulan_pemerintah_desa_dan_kelurahan_yang_disetujui_menjadi_rencana_kerja_desa_kelurahan_dan_dimuat_dalam_rapb_desa'                                                                                                                          => $musrenbangDesa['usulan_pemerintah'] ?? 0,
                'usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan'    => $musrenbangDesa['usulan_rencana'] ?? 0,
                'usulan_rencana_kerja_pemerintah_tingkat_atas_yang_ditolak_dalam_musrenbangdes_kel'                                                                                                                                                            => $musrenbangDesa['usulan_rencana_ditolak'] ?? 0,
                'pemilikan_dokumen_rencana_kerja_pembangunan_desa_kelurahan_rkpd_k'                                                                                                                                                                            => $musrenbangDesa['pemilik_dokumen'] ?? 0,
                'pemilikan_rencana_pembangunan_jangka_menengah_desa_kelurahan_rpjmd_k'                                                                                                                                                                         => $musrenbangDesa['pemilik_rencana'] ?? 0,
                'pemilikan_dokumen_hasil_musrenbang_tingkat_desa_dan_kelurahan_yang_diusulkan_ke_pemerintah_tingkat_atas_untuk_dibiayai_dari_apbd_kab_kota_apbd_provinsi_dan_apbn_maupun_sumber_biaya_dari_perusahaan_swasta_yang_investasi_di_desa_kelurahan' => $musrenbangDesa['pemilik_dokumen_hasil'] ?? 0,
                'jumlah_kegiatan_yang_diusulkan_masyarakat_melalui_forum_musrenbangdes_kel_yang_tidak_direalisasikan_dalam_apb_desa_apb_daerah_kabupaten_kota_dan_provinsi'                                                                                    => $musrenbangDesa['jumlah_kegiatan_a'] ?? 0,
                'jumlah_kegiatan_yang_diusulkan_masyarakat_melalui_forum_musrenbangdes_kel_yang_pelaksanaannya_tidak_sesuai_dengan_hasil_musrenbang'                                                                                                           => $musrenbangDesa['jumlah_kegiatan_b'] ?? 0,
            ],

            'peranserta_masyarakat_dalam_pelaksanaan_dan_pelestarian_hasil_pembangunan' => [
                'jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_musrenbang'                                                                               => $pelaksanaanPelestarian['jumlah_masyarakat_yang_terlibat_dalam_pelaksanaan_pembangunan_fisik_di_desa_dan_kelurahan_sesuai_hasil_Musrenbang'] ?? 0,
                'jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_atau_kabupaten_kota'                                          => $pelaksanaanPelestarian['jumlah_penduduk_yang_dilibatkan_dalam_pelaksanaan_proyek_padat_karya_oleh_pengelola_proyek_yang_ditunjuk_pemerintah_desa_kelurahan_dan_kabupaten_kota'] ?? 0,
                'jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_apb_desa'                                                      => $pelaksanaanPelestarian['jumlah_kegiatan_yang_dilaksanakan_oleh_masyarakat_dan_lembaga_kemasyarakatan_desa_kelurahan_yang_sudah_ada_sesuai_ketetapan_dalam_APB-Desa'] ?? 0,
                'jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_apb_daerah'                                                                               => $pelaksanaanPelestarian['jumlah_kegiatan_yang_dilaksanakan_oleh_pihak_ketiga_tanpa_melibatkan_masyarakat_sesuai_ketentuan_dalam_APB-Daerah'] ?? 0,
                'jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_saat_musrenbang'                                                                             => $pelaksanaanPelestarian['jumlah_kegiatan_yang_masuk_desa_kelurahan_di_luar_yang_telah_direncanakan_dan_disepakati_masyarakat_dalam_Musrenbang'] ?? 0,
                'usulan_masyarakat_yang_disetujui_menjadi_rencana_kerja_desa_dan_kelurahan'                                                                                                                       => $pelaksanaanPelestarian['usulan_masyarakat_yang_disetujui_menjadi_Rencana_Kerja_Desa_dan_Kelurahan'] ?? 0,
                'usulan_pemerintah_desa_dan_kelurahan_yang_disetujui_menjadi_rencana_kerja_desa_kelurahan'                                                                                                        => $pelaksanaanPelestarian['usulan_Pemerintah_Desa_dan_Kelurahan_yang_disetujui_menjadi_Rencana_Kerja_Desa_Kelurahan'] ?? 0,
                'usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat' => $pelaksanaanPelestarian['usulan_rencana_kerja_program_dan_kegiatan_dari_pemerintah_kabupaten_kota_provinsi_dan_pusat_yang_dibahas_saat_Musrenbang_dan_disetujui_untuk_dilaksanakan_di_desa_dan_kelurahan_oleh_masyarakat'] ?? 0,
                'penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada'                                                                           => $pelaksanaanPelestarian['penyelenggaraan_musyawarah_desa_kelurahan_untuk_menerima_memelihara_dan_melestarikan_hasil_pembangunan_yang_sudah_ada'] ?? 0,
                'pelaksanaan_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya'                                                        => $pelaksanaanPelestarian['pelaksanaa_kegiatan_dari_masyarakat_untuk_menyelesaikan_atau_menindaklanjuti_kegiatan_yang_belum_diselesaikan_oleh_pelaksana_sebelumnya'] ?? 0,
                'jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_kepala_desa_lurah'                                       => $pelaksanaanPelestarian['jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_yang_dilaporkan_masyarakat_atau_lembaga_kemasyarakatan_desa_kelurahan_kepada_Kepala_Desa_Lurah'] ?? 0,
                'jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan'                                                                                                   => $pelaksanaanPelestarian['jumlah_kasus_penyimpangan_pelaksanaan_pembangunan_yang_diselesaikan_di_tingkat_desa_kelurahan'] ?? 0,
                'jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum'                                                                                        => $pelaksanaanPelestarian['jumlah_kasus_penyimpangan_pelaksanaan_kegiatan_pembangunan_desa_kelurahan_yang_diselesaikan_secara_hukum'] ?? 0,
                'jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan'                                                                                   => $pelaksanaanPelestarian['jenis_kegiatan_masyarakat_untuk_melestarikan_hasil_pembangunan_yang_dikoordinasikan_pemerintah_desa_kelurahan'] ?? 0,
                'jumlah_kegiatan_yang_didanai_dari_apb_desa_dan_swadaya_masyarakat_di_kelurahan'                                                                                                                  => $pelaksanaanPelestarian['jumlah_kegiatan_yang_didanai_dari_APB-Desa_dan_swadaya_masyarakat_di_kelurahan'] ?? 0,
                'jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_dari_apb_daerah_kabupaten_kota'                                                                                                               => $pelaksanaanPelestarian['jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APB_Daerah_Kabupaten_Kota'] ?? 0,
                'jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_dari_apbd_provinsi'                                                                                                                           => $pelaksanaanPelestarian['jumlah_kegiatan_di_desa_kelurahan_yang_didanai_dari_APBD_Provinsi'] ?? 0,
                'jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_apbn'                                                                                                                                         => $pelaksanaanPelestarian['jumlah_kegiatan_di_desa_dan_kelurahan_yang_didanai_APBN'] ?? 0,
            ],

            'semangat_kegotongroyongan_penduduk' => [
                'jumlah_kelompok_arisan'                                                                                                                   => $semangatGotongRoyong['jumlah_kelompok_arisan'] ?? 0,
                'jumlah_penduduk_menjadi_orang_tua_asuh'                                                                                                   => $semangatGotongRoyong['jumlah_penduduk_menjadi_orangtua_asuh'] ?? 0,
                'ada_tidaknya_dana_sehat'                                                                                                                  => $semangatGotongRoyong['ada_tidaknya_dana_sehat'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pembangunan_rumah'                                                     => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pembangunan_rumah'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pengolahan_tanah'                                                      => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pengolahan_tanah'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pembiayaan_pendidikan_anak_sekolah_kuliah_kursus'                      => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pembiayaan_pendidikan'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pemeliharaan_fasilitas_umum_dan_fasilitas_sosial_prasarana_dan_sarana' => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pemeliharaan_fasilitas_umum'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pemberian_modal_usaha'                                                 => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pemberian_modal_usaha'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pengerjaan_sawah_dan_kebun'                                            => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pengerjaan_sawah_kebun'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_penangkapan_ikan_dan_usaha_peternakan_lainnya'                         => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_penangkapan_ikan'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_menjaga_ketertiban_ketentraman_dan_keamanan'                           => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_jaga_ketertiban'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_peristiwa_kematian'                                                    => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_peristiwa_kematian'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_menjaga_kebersihan_desa_kelurahan'                                                                    => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_jaga_kebersihan'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_membangun_jalan_jembatan_saluran_air_irigasi'                                                         => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_membangun_infrastruktur'] ?? 0,
                'ada_tidaknya_kegiatan_gotong_royong_atau_sambatan_sejenisnya_dalam_pemberantasan_sarang_nyamuk_dan_kesehatan_lingkungan_lainnya'          => $semangatGotongRoyong['ada_tidaknya_kegiatan_gotong_royong_pemberantasan_nyamuk'] ?? 0,
            ],

            'adat_istiadat' => [
                'adat_istiadat_dalam_perkawinan'                                                                => $adatIstiadat['adat_istiadat_dalam_perkawinan'] ?? 0,
                'adat_istiadat_dalam_kelahiran_anak'                                                            => $adatIstiadat['adat_istiadat_dalam_kelahiran_anak'] ?? 0,
                'adat_istiadat_dalam_upacara_kematian'                                                          => $adatIstiadat['adat_istiadat_dalam_upacara_kematian'] ?? 0,
                'adat_istiadat_dalam_pengelolaan_hutan'                                                         => $adatIstiadat['adat_istiadat_dalam_pengelolaan_hutan'] ?? 0,
                'adat_istiadat_dalam_tanah_pertanian'                                                           => $adatIstiadat['adat_istiadat_dalam_tanah_pertanian'] ?? 0,
                'adat_istiadat_dalam_pengelolaan_laut_pantai'                                                   => $adatIstiadat['adat_istiadat_dalam_pengelolaan_laut_pantai'] ?? 0,
                'adat_istiadat_dalam_memecahkan_konflik_warga'                                                  => $adatIstiadat['adat_istiadat_dalam_memecahkan_konflik_warga'] ?? 0,
                'adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam'                                 => $adatIstiadat['adat_istiadat_dalam_menjauhkan_bala_penyakit_dan_bencana_alam'] ?? 0,
                'adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya'  => $adatIstiadat['adat_istiadat_dalam_memulihkan_hubungan_antara_alam_semesta_dengan_manusia_dan_lingkungannya'] ?? 0,
                'adat_istiadat_dalam_penanggulangan_kemiskinanbagi_keluarga_tidak_mampu_fakir_miskin_terlantar' => $adatIstiadat['adat_istiadat_dalam_penanggulangan_kemiskinan_bagi_keluarga_tidak_mampu_fakir_miskin_terlantar'] ?? 0,
            ],
            'sikap_dan_mental_masyarakat' => [
                'jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan'                                                                                                           => $sikapMental['jumlah_jenis_pungutan_liar_dari_anak_gelandangan_di_sudut_jalanan'] ?? 0,
                'jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar'                                                                                                                  => $sikapMental['jumlah_jenis_pungutan_liar_di_terminal_pelabuhan_dan_pasar'] ?? 0,
                'peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah'                                                                                                                      => $sikapMental['peminta_minta_sumbangan_perorangan_dari_rumah_ke_rumah'] ?? 0,
                'peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah'                                                                                                                   => $sikapMental['peminta_minta_sumbangan_terorganisasi_dari_rumah_ke_rumah'] ?? 0,
                'semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal'                                                                                 => $sikapMental['semakin_berkembang_praktek_jalan_pintas_dalam_mencari_uang_secara_gampang_walau_tidak_halal'] ?? 0,
                'jenis_pungutan_dari_rt_atau_sebutan_lain_kepada_warga'                                                                                                                       => $sikapMental['jenis_pungutan_dari_RT_atau_sebutan_lain_kepada_warga'] ?? 0,
                'jenis_pungutan_dari_rw_atau_sebutan_lain_kepada_warga'                                                                                                                       => $sikapMental['jenis_pungutan_dari_RW_atau_sebutan_lain_kepada_warga'] ?? 0,
                'jenis_pungutan_dari_desa_kelurahan_kepada_warga'                                                                                                                             => $sikapMental['jenis_pungutan_dari_desa_kelurahan_kepada_warga'] ?? 0,
                'kasus_aparat_rt_rw_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'                                                => $sikapMental['kasus_aparat_RT_RW_atau_sebutan_lainnya_di_desa_dan_kelurahan_yang_dipecat_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0,
                'dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'                                                                                                           => $sikapMental['dipindah_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0,
                'diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'                                                                                        => $sikapMental['diberhentikan_dengan_hormat_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0,
                'dimutasi_karena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'                                                                                                                => $sikapMental['dimutasi_karena_kena_kasus_pungutan_liar_pemerasan_dan_sejenisnya'] ?? 0,
                'banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terima_kasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan' => $sikapMental['banyak_masyarakat_yang_memberikan_biaya_lebih_dari_yang_ditentukan_sebagai_uang_rokok_atau_ucapan_terimakasih_dalam_proses_pelayanan_administrasi_di_kantor_desa_kelurahan'] ?? 0,
                'banyak_warga_yang_ingin_mendapatkan_pelayanan_gratis_dari_aparat_desa_kelurahan'                                                                                             => $sikapMental['banyak_warga_yang_ingin_mendapatkan_pelayanan_gratis_dari_aparat_desa_kelurahan'] ?? 0,
                'banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat'                                                                                           => $sikapMental['banyak_penduduk_yang_mengeluhkan_memburuknya_kualitas_pelayanan_kepada_masyarakat'] ?? 0,
                'banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_diinisiatifi_masyarakat_sendiri'                                                                                     => $sikapMental['banyak_kegiatan_yang_bersifat_hiburan_dan_rekreasi_yang_di_inisiatifi_masyarakat_sendiri'] ?? 0,
                'masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain'                                                   => $sikapMental['masyarakat_agak_kurang_toleran_dengan_keberadaan_kelompok_masyarakat_dari_unsur_etnis_agama_dan_kelompok_kepentingan_lain'] ?? 0,
            ],
            'etos_kerja_penduduk' => [
                'luas_wilayah_desa_kelurahan_sangat_luas'                                                                                                             => $sikapMental['luas_wilayah_desa_kelurahan_sangat_luas'] ?? 0,
                'banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi'                                                                                => $sikapMental['banyak_lahan_terlantar_yang_tidak_dikelola_pemiliknya_petani_berdasi'] ?? 0,
                'banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan'                                                                                => $sikapMental['banyak_lahan_pekarangan_di_sekitar_perumahan_yang_tidak_dimanfaatkan'] ?? 0,
                'banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan'                                                                                         => $sikapMental['banyak_lahan_tidur_milik_masyarakat_yang_tidak_dimanfaatkan'] ?? 0,
                'jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain'                                                             => $sikapMental['jumlah_petani_pada_musim_gagal_tanam_panen_yang_pasrah_dan_tidak_mencari_pekerjaan_lain'] ?? 0,
                'jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain'                                 => $sikapMental['jumlah_nelayan_pada_musim_tidak_melaut_yang_memanfaatkan_keterampilan_keahlian_lainnya_untuk_mencari_pekerjaan_lain'] ?? 0,
                'banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota'                                             => $sikapMental['banyak_penduduk_yang_mencari_pekerjaan_di_luar_desa_kelurahan_tetapi_masih_dalam_wilayah_kabupaten_kota'] ?? 0,
                'banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya'                                                                                        => $sikapMental['banyak_penduduk_yang_mencari_pekerjaan_di_kota_besar_lainnya'] ?? 0,
                'kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak'                                                                       => $sikapMental['kebiasaan_masyarakat_merayakan_pesta_dengan_menghadirkan_undangan_yang_banyak'] ?? 0,
                'masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan'      => $sikapMental['masyarakat_sering_mendatangi_kantor_desa_dan_lurah_menuntut_penyediaan_kebutuhan_dasar_sembilan_bahan_pokok_pada_saat_kelaparan_dan_kekeringan'] ?? 0,
                'kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen'                   => $sikapMental['kebiasaan_masyarakat_untuk_mencari_mengumpulkan_bahan_makanan_pengganti_beras_jagung_pada_saat_rawan_pangan_kelaparan_gagal_panen'] ?? 0,
                'kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu'                                                        => $sikapMental['kebiasaan_pemotongan_hewan_dalam_jumlah_besar_untuk_pesta_adat_dan_perayaan_upacara_tertentu'] ?? 0,
                'kebiasaan_masyarakat_berdemonstrasi_protes_terhadap_kebijakan_pemerintah'                                                                            => $sikapMental['kebiasaan_masyarakat_mendemonstrasi_protes_terhadap_kebijakan_pemerintah'] ?? 0,
                'kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan'                                                                                   => $sikapMental['kebiasaan_masyarakat_terprovokasi_karena_isu_isu_yang_menyesatkan'] ?? 0,
                'kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan'                                                     => $sikapMental['kebiasaan_masyarakat_bermusyawarah_untuk_menyelesaikan_berbagai_persoalan_sosial_kemasyarakatan'] ?? 0,
                'lebih_banyak_masyarakat_yang_diam_masabodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya'                                       => $sikapMental['lebih_banyak_masyarakat_yang_diam_masa_bodoh_apatis_ketika_ada_persoalan_yang_terjadi_di_lingkungan_sekitarnya'] ?? 0,
                'kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_rt_rw_dusun_dan_lingkungan_yang_kurang_menanggapi_kesulitan_yang_dihadapi_masyarakat' => $sikapMental['kebiasaan_aparat_pemerintah_desa_kelurahan_terlebih_di_tingkat_RT_RW_Dusun_dan_Lingkungan_yang_kurang_menanggapi_kesuliatan_yang_dihadapi_masyarakat'] ?? 0,
            ],
            'lembaga_kemasyarakatan_desa_kelurahan' => [
                'keberadaan_organisasi_lembaga_kemasyarakatan_desa_dan_kelurahan_lkd_lk' => 'Tidak',
                'jumlah_kegiatan'                                                        => 0,
            ],

            'organisasi_anggota_lembaga_kemasyarakatan' => $datalembagaDesa,
            'apb_desa_dan_anggaran_kelurahan'           => [
                'jumlah_anggaran_belanja_dan_penerimaan_desa_kelurahan_tahun_ini' => $apbdesa['3e4f5a6b7c8'] ?? 0,
                'apbd_kabupaten_kota'                                             => $apbdesa['ac1e34b29f3d5'] ?? 0,
                'bantuan_pemerintah_kabupaten_kota'                               => $apbdesa['5f2b8c1d9a6e7'] ?? 0,
                'bantuan_pemerintah_provinsi'                                     => $apbdesa['4c2d5e6f1a3b'] ?? 0,
                'bantuan_pemerintah_pusat'                                        => $apbdesa['9d2e3f4a5b6c'] ?? 0,
                'pendapatan_asli_desa'                                            => $apbdesa['7e8f1c3d4b5a'] ?? 0,
                'swadaya_masyarakat_desa_dan_kelurahan'                           => $apbdesa['6a7b8c9d1e2f'] ?? 0,
                'alokasi_dana_desa'                                               => $apbdesa['5b6c7d8e9f1a'] ?? 0,
                'sumber_pendapatan_dari_perusahaan_yang_ada_di_desa_kelurahan'    => $apbdesa['8c9d1a2b3e4f'] ?? 0,
                'sumber_pendapatan_lain_yang_sah_dan_tidakmengikat'               => $apbdesa['2d3e4f5a6b7'] ?? 0,
                'jumlah_belanja_publik_belanja_pembangunan'                       => $apbdesa['f1e2d3c4b5a6'] ?? 0,
                'jumlah_belanja_aparatur_pegawai'                                 => $apbdesa['7d8e9f1a2b3'] ?? 0,
            ],
            'pertanggungjawaban_kepala_desa_lurah' => [
                'penyampaian_laporan_keterangan_pertanggungan_jawab_kepala_desa_kepada_bpd'                                                                                        => $pertanggungjawabanKades['1008ff221d4d7'] ?? 0,
                'jumlah_informasi_yang_disampaikan_kepala_desa_dan_lurah_tentang_laporan_penyelenggaraan_tugas_wewenang_hak_dan_kewajiban_kepala_desa_dan_lurah_kepada_masyarakat' => $pertanggungjawabanKades['abda02914eb96'] ?? 0,
                'status_laporan_keterangan_pertanggungjawaban_kepala_desa'                                                                                                         => $pertanggungjawabanKades['a1d8c8f48d313'] ?? 0,
                'laporan_kinerja_penyelenggaraan_tugas_wewenang_kewajiban_dan_hak_kepala_desa_dan_lurah_kepada_bupati_walikota'                                                    => $pertanggungjawabanKades['598e4d0f9e4d5'] ?? 0,
                'jumlah_jenis_media_informasi_kinerja_kepala_desa_dan_lurah_kepada_masyarakat'                                                                                     => $pertanggungjawabanKades['de7ff7a974539'] ?? 0,
                'jumlah_kasus_pengaduan_masyarakat_terhadap_masalah_pembangunan_pelayanan_dan_pembinaan_kemasyarakatan_yang_disampaikan_kepada_kepala_desa_lurah'                  => $pertanggungjawabanKades['77288087cd133'] ?? 0,
                'jumlah_kasus_pengaduan_masyarakat_terhadap_masalah_pembangunan_pelayanan_dan_pembinaan_kemasyarakatan_yang_diselesaikan_kepala_desa_lurah'                        => $pertanggungjawabanKades['f6920f31228ac'] ?? 0,
            ],
            // belum tau sumber datanya
            'prasarana_dan_administrasi_pemerintahan_desa_kelurahan' => [
                'gedung_kantor'                   => $saranaDesa['gedung_kantor'] ?? 0,
                'jumlah_ruang_kerja'              => $saranaDesa['jumlah_ruang_kerja_ruang'] ?? 0,
                'balai_desa_kelurahan_sejenisnya' => $saranaDesa['balai_desa_kelurahan_sejenisnya'] ?? 0,
                'listrik'                         => $saranaDesa['listrik'] ?? 0,
                'air_bersih'                      => $saranaDesa['air_bersih'] ?? 0,
                'telepon'                         => $saranaDesa['telepon'] ?? 0,

            ],

            'inventaris_dan_alat_tulis_kantor' => [
                'jumlah_mesin_tik'                  => $saranaDesa['mesin_tik_buah'] ?? 0,
                'jumlah_meja'                       => $saranaDesa['meja_buah'] ?? 0,
                'jumlah_kursi'                      => $saranaDesa['kursi_buah'] ?? 0,
                'jumlah_almari_arsip'               => $saranaDesa['lemari_arsip_buah'] ?? 0,
                'komputer'                          => $saranaDesa['komputer_unit'] ?? 0,
                'mesin_fax'                         => $saranaDesa['mesin_fax_unit'] ?? 0,
                'kendaraan_dinas_lurah_kepala_desa' => $saranaDesa['kendaraan_dinas_unit'] ?? 0,
            ],

            'administrasi_pemerintahan_desa_kelurahan' => [
                'buku_data_peraturan_desa'                        => $saranaDesa['buku_data_peraturan_desa'] ?? 0,
                'buku_keputusan_kepala_desa_lurah'                => $saranaDesa['buku_keputusan_kepala_desa_lurah'] ?? 0,
                'buku_administrasi_kependudukan'                  => $saranaDesa['buku_administrasi_kependudukan'] ?? 0,
                'buku_data_inventaris'                            => $saranaDesa['buku_data_inventaris'] ?? 0,
                'buku_data_aparat'                                => $saranaDesa['buku_data_aparat'] ?? 0,
                'buku_data_tanah_kas_desa'                        => $saranaDesa['buku_data_tanah_kas_desa'] ?? 0,
                'buku_administrasi_pajak_dan_retribusi'           => $saranaDesa['buku_administrasi_pajak_dan_retribusi'] ?? 0,
                'buku_data_tanah'                                 => $saranaDesa['buku_data_tanah'] ?? 0,
                'buku_laporan_pengaduan_masyarakat'               => $saranaDesa['buku_laporan_pengaduan_masyarakat'] ?? 0,
                'buku_agenda_ekspedisi'                           => $saranaDesa['buku_agenda_ekspedisi'] ?? 0,
                'buku_profil_desa_dan_kelurahan'                  => $saranaDesa['buku_profil_desa_dan_kelurahan'] ?? 0,
                'buku_data_induk_penduduk'                        => $saranaDesa['buku_data_induk_penduduk'] ?? 0,
                'buku_data_mutasi_penduduk'                       => $saranaDesa['buku_data_mutasi_penduduk'] ?? 0,
                'buku_rekapitulasi_penduduk_akhir_bulan'          => $saranaDesa['buku_rekapitulasi_penduduk_akhir_bulan'] ?? 0,
                'buku_registrasi_pelayanan_penduduk'              => $saranaDesa['buku_registrasi_pelayanan_penduduk'] ?? 0,
                'buku_data_penduduk_sementara'                    => $saranaDesa['buku_data_penduduk_sementara'] ?? 0,
                'buku_anggaran_penerimaan'                        => $saranaDesa['buku_anggaran_penerimaan'] ?? 0,
                'buku_anggaran_pengeluaran_pegawai_pembangunan'   => $saranaDesa['buku_anggaran_pengeluaran_pegawai_pembangunan'] ?? 0,
                'buku_kas_umum'                                   => $saranaDesa['buku_kas_umum'] ?? 0,
                'buku_kas_pembantu_penerimaan'                    => $saranaDesa['buku_kas_pembantu_penerimaan'] ?? 0,
                'buku_kas_pembantu_pengeluaran_rutin_pembangunan' => $saranaDesa['buku_kas_pembantu_pengeluaran_rutin_pembangunan'] ?? 0,
                'buku_data_lembaga_kemasyarakatan'                => $saranaDesa['buku_data_lembaga_kemasyarakatan'] ?? 0,
            ],

            'prasarana_dan_sarana_badan_permusyawaratan_desa_bpd' => [
                'gedung_kantor'      => $saranaBpd['gedung_kantor'] ?? 0,
                'jumlah_ruang_kerja' => $saranaBpd['ruangan_kerja'] ?? 0,
                'balai_bpd'          => $saranaBpd['balai_bpd'] ?? 0,
                'listrik'            => $saranaBpd['listrik'] ?? 0,
                'air_bersih'         => $saranaBpd['air_bersih'] ?? 0,
                'telepon'            => $saranaBpd['telepon'] ?? 0,
            ],

            'inventaris_dan_alat_tulis_kantor_bpd' => [
                'jumlah_mesin_tik'    => $saranaBpd['mesin_tik'] ?? 0,
                'jumlah_meja'         => $saranaBpd['meja'] ?? 0,
                'jumlah_kursi'        => $saranaBpd['kursi'] ?? 0,
                'jumlah_almari_arsip' => $saranaBpd['lemari_arsip'] ?? 0,
                'komputer'            => $saranaBpd['komputer'] ?? 0,
                'mesin_fax'           => $saranaBpd['mesin_fax'] ?? 0,

            ],

            'administrasi_bpd' => [
                'buku_buku_administrasi_kegiatan_bpd' => $saranaBpd['buku_administrasi_bpd'] ?? 0,
                'buku_buku_administrasi_keanggotaan'  => $saranaBpd['buku_anggota'] ?? 0,
                'buku_kegiatan_bpd'                   => $saranaBpd['buku_kegiatan'] ?? 0,
                'buku_himpunan_peraturan_desa'        => $saranaBpd['buku_perdes'] ?? 0,
                'buku_lainnya'                        => $saranaBpd['buku_lainnya'] ?? 0,
            ],

            'prasarana_dan_sarana_dusun_lingkungan_sebutan_lain' => [
                'gedung_kantor_atau_balai_pertemuan' => $saranaDusun['gedung_kantor_atau_balai_pertemuan'] ?? 0,
                'alat_tulis_kantor'                  => $saranaDusun['alat_tulis_kantor'] ?? 0,
                'barang_inventaris'                  => $saranaDusun['barang_inventaris'] ?? 0,
                'buku_administrasi'                  => $saranaDusun['buku_administrasi'] ?? 0,
                'jenis_kegiatan'                     => $saranaDusun['jenis_kegiatan'] ?? 0,
                'jumlah_pengurus'                    => $saranaDusun['jumlah_pengurus'] ?? 0,
                'jumlah_ruang_kerja'                 => $saranaDusun['ruang_kerja'] ?? 0,
            ],

            'jenis_pembinaan_pemerintah_pusat_kepada_pemerintahan_desa_dan_kelurahan' => [
                'pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan'                                                                                                                                                                                                                                                                                                                 => $pembinaanPusat['pedoman_dan_standar_pelaksanaan_urusan_pemerintahan_desakelurahan_lembaga_kemasyarakatan'] ?? 0,
                'pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan'                                                                                                                                                                                                                                                                                   => $pembinaanPusat['pedoman_dan_standar_bantuan_pembiayaan_dari_pemerintah_pemerintah_provinsi_dan_kabupaten_kota_kepada_desa_dan_kelurahan'] ?? 0,
                'pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'                                                                                                                                                                                                                                                                                                                            => $pembinaanPusat['pedoman_umum_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'] ?? 0,
                'pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkatdesa_kelurahan_serta_bpd'                                                                                                                                                                                                                                                                                  => $pembinaanPusat['pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_dan_perangkat_desa_kelurahan_serta_bpd'] ?? 0,
                'pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing'                                                                                                                                                                                                                                                                                      => $pembinaanPusat['pedoman_pendidikan_dan_pelatihan_bagi_pemerintahan_desa_kelurahan_lembaga_kemasyarakatan_dan_perangkat_masing_masing'] ?? 0,
                'jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan'                                                                                                                                                                                                                                                                           => $pembinaanPusat['jumlah_bimbingan_supervisi_dan_konsultasi_pelaksanaan_pemerintahan_desa_dan_kelurahan_serta_pemberdayaan_lembaga_kemasyarakatan'] ?? 0,
                'jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan'                                                                                                                                                                                                                                                                                                          => $pembinaanPusat['jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] ?? 0,
                'penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan'                                                                                                                                                                                                                                                                                                                                 => $pembinaanPusat['penelitian_dan_pengkajian_penyelenggaraan_pemerintahan_desa_dan_kelurahan'] ?? 0,
                'jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn' => $pembinaanPusat['jumlah_kegiatan_yang_terkait_dengan_upaya_percepatan_atau_akselerasi_pembangunan_desa_dan_kelurahan_dalam_bidang_ekonomi_keluarga_penanganan_bencana_penanggulangan_kemiskinan_percepatan_keberdayaan_masyarakat_peningkatan_prasarana_dan_sarana_pedesaan_kelurahan_pemanfaatan_sumber_daya_alam_dan_teknologi_tepat_guna_pengembangan_sosial_budaya_masyarakat_di_desa_dan_kelurahan_yang_dibiayai_apbn'] ?? 0,
                'pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'                                                                                                                                                                                                                                                       => $pembinaanPusat['pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'] ?? 0,
                'pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'                                                                                                                                                                                                                                                                                                           => $pembinaanPusat['pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'] ?? 0,
            ],

            'pembinaan_pemerintah_provinsi_kepada_pemerintahan_desa_dan_kelurahan' => [
                'pedoman_pelaksanaan_tugas_pembantuan_dari_provinsi_ke_desa_kelurahan'                                                                                                          => $pembinaanPemprov['1005b160e3f22'] ?? 0,
                'pedoman_bantuan_keuangan_dari_provinsi'                                                                                                                                        => $pembinaanPemprov['50d9f91a97220'] ?? 0,
                'kegiatan_fasilitasi_keberadaan_kesatuan_masyarakat_hukum_adat_nilai_adat_istiadat_dan_lembaga_adat_beserta_hak_dan_kewajibannya_dalam_pelaksanaan_pemerintahan_desa_kelurahan' => $pembinaanPemprov['59948998e7025'] ?? 0,
                'fasilitasi_pelaksanaan_pedoman_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'                                                                              => $pembinaanPemprov['76a507d1c90a0'] ?? 0,
                'jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan_berskala_provinsi'                                                            => $pembinaanPemprov['bea54f5e0ba2c'] ?? 0,
                'kegiatan_penanggulangan_kemiskinan_yang_dibiayai_apbd_provinsi_yang_masuk_desa_dan_kelurahan'                                                                                  => $pembinaanPemprov['aba260e5a36cb'] ?? 0,
                'kegiatan_penanganan_bencana_yang_dibiayai_apbd_provinsi_untuk_desa_dan_kelurahan'                                                                                              => $pembinaanPemprov['9b1d9204efafe'] ?? 0,
                'kegiatan_peningkatan_pendapatan_keluarga_yang_dibiayai_apbd_provinsi_di_desa_dan_kelurahan'                                                                                    => $pembinaanPemprov['a4a4fa2014f3a'] ?? 0,
                'kegiatan_penyediaan_sarana_dan_prasarana_desa_dan_kelurahan_yang_dibiayai_apbd_provinsi_yang_masuk_desa_dan_kelurahan'                                                         => $pembinaanPemprov['03019b8a5fb24'] ?? 0,
                'kegiatan_pemanfaatan_sumber_daya_alam_dan_pengembangan_teknologi_tepat_guna_yang_dibiayai_apbd_provinsi_di_desa_dan_kelurahan'                                                 => $pembinaanPemprov['fb318be147185'] ?? 0,
                'kegiatan_pengembangan_sosial_budaya_masyarakat_pedoman_pendataan_dan_pendayagunaan_data_profil_desa_dan_kelurahan'                                                             => $pembinaanPemprov['9a8f6b01f383a'] ?? 0,
                'pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'                                                                               => $pembinaanPemprov['1127ed873f26b'] ?? 0,
                'pemberian_penghargaan_atas_prestasi_yang_dilaksanakan_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_lembaga_kemasyarakatan'                           => $pembinaanPemprov['1dad44d3e5c1d'] ?? 0,
            ],
            'pembinaan_pemerintah_kabupaten_kota_kepada_pemerintahan_desa_dan_kelurahan' => [
                'pelimpahan_tugas_bupati_walikota_kepada_lurah_dan_kepala_desa'                                                                                                                 => $pembinaanPemkab['1dad44d3e5c1d'] ?? 0,
                'penetapan_pengaturan_kewenangan_kabupaten_kota_yang_diserahkan_pengaturannya_kepada_desa'                                                                                      => $pembinaanPemkab['2e98a743fbc2e'] ?? 0,
                'pedoman_pelaksanaan_tugas_pembantuan_dari_kabupaten_kota_kepada_desa'                                                                                                          => $pembinaanPemkab['3c7b01a5de8f3'] ?? 0,
                'pedoman_teknis_penyusunan_peraturan_desa_peraturan_kepala_desa_keputusan_lurah_dan_peraturan_daerah_kepada_kepala_desa_dan_lurah'                                              => $pembinaanPemkab['4f6e32b4a91d2'] ?? 0,
                'pedoman_teknis_penyusunan_perencanaan_pembangunan_partisipatif_serta_pengembangan_lembaga_kemasyarakatan_desa_dan_kelurahan'                                                   => $pembinaanPemkab['543df8c2e7a5b'] ?? 0,
                'kegiatan_fasilitasi_keberadaan_kesatuan_masyarakat_hukum_adat_nilai_adat_istiadat_dan_lembaga_adat_beserta_hak_dan_kewajibannya_dalam_pelaksanaan_pemerintahan_desa_kelurahan' => $pembinaanPemkab['6a2bc957d3e4f'] ?? 0,
                'penetapan_pembiayaan_alokasi_dana_perimbangan_untuk_desa'                                                                                                                      => $pembinaanPemkab['7f9a81e632bd1'] ?? 0,
                'fasilitasi_pelaksanaan_pedoman_administrasi_tata_naskah_dan_pelaporan_bagi_kepala_desa_dan_lurah'                                                                              => $pembinaanPemkab['8954c3de1ab2e'] ?? 0,
                'jumlah_kegiatan_pendidikan_dan_pelatihan_tentang_penyelenggaraan_pemerintahan_desa_dan_kelurahan_berskala_kabupaten_kota'                                                      => $pembinaanPemkab['9d7c5e1a3b2f4'] ?? 0,
                'kegiatan_penanggulangan_kemiskinan_yang_dibiayai_apbd_kabupaten_kota_yang_masuk_desa_dan_kelurahan'                                                                            => $pembinaanPemkab['a4fb92c6e5d1a'] ?? 0,
                'kegiatan_penanganan_bencana_yang_dibiayai_apbd_kabupaten_kota_untuk_desa_dan_kelurahan'                                                                                        => $pembinaanPemkab['b8dc4f63e2a1d'] ?? 0,
                'kegiatan_peningkatan_pendapatan_keluarga_yang_dibiayai_apbd_kabupaten_kota_di_desa_dan_kelurahan'                                                                              => $pembinaanPemkab['c7eab19d3f2a4'] ?? 0,
                'fasilitasi_penetapan_pedoman_dan_standar_tanda_jabatan_pakaian_dinas_dan_atribut_bagi_kepala_desa_lurah_perangkat_desa_kelurahan_dan_bpd'                                      => $pembinaanPemkab['d3bfc6a9e2d4f'] ?? 0,
                'kegiatan_fasilitasi_keberadaan_kesatuan_masyarakat_hukum_adat_nilai_adat_istiadat_dan_lembaga_adat_beserta_hak_dan_kewajibannya_dalam_pelaksanaan_pemerintahan_desa'           => $pembinaanPemkab['e5ac9f2d3b1e4'] ?? 0,
                'pedoman_pendataan_dan_pendayagunaan_profil_desa_dan_kelurahan'                                                                                                                 => $pembinaanPemkab['f1c32d9ea5b7d'] ?? 0,
                'program_dan_kegiatan_pemeliharaan_motivasi_desa_kelurahan_berprestasi_pascaperlombaan_desa_dan_kelurahan'                                                                      => $pembinaanPemkab['g8b9a23f1c6d5'] ?? 0,
                'pemberian_penghargaan_atas_prestasi_yang_dicapai_pemerintahan_desa_dan_kelurahan_dalam_penyelenggaraan_pemerintahan_dan_pemberdayaan_lembaga_kemasyarakatan'                   => $pembinaanPemkab['h6e5fbc3d9a2d'] ?? 0,
                'pemberian_sanksi_atas_penyimpangan_yang_dilakukan_kepala_desa_lurah_dan_perangkat_masing_masing'                                                                               => $pembinaanPemkab['i4f3b91e8d2c7'] ?? 0,
                'mengawasi_pengelolaan_keuangan_desa_serta_anggaran_kelurahan_dan_pendayagunaan_aset_pemerintahan_desa_badan_usaha_milik_desa_dan_sumber_pendapatan_daerah_yang_dikelola_lurah' => $pembinaanPemkab['j2a9bd1f6c8e5'] ?? 0,
            ],
            'pembinaan_dan_pengawasan_camat_kepada_desa_kelurahan' => [
                'jumlah_kegiatan_fasilitasi_penyusunan_peraturan_desa_dan_peraturan_kepala_desa'                                                                                                                                          => $pembinaanCamat['1dad44d3e5c1d'] ?? 0,
                'jumlah_kegiatan_fasilitasi_administrasi_tata_pemerintahan_desa_dan_kelurahan'                                                                                                                                            => $pembinaanCamat['2e98a743fbc2e'] ?? 0,
                'fasilitasi_pengelolaan_keuangan_desa_dan_pendayagunaan_aset_desa_serta_anggaran_kelurahan'                                                                                                                               => $pembinaanCamat['3c7b01a5de8f3'] ?? 0,
                'jumlah_kegiatan_fasilitasi_pelaksanaan_urusan_otonomi_daerah_kabupaten_kota_yang_diserahkan_kepada_desa'                                                                                                                 => $pembinaanCamat['4f6e32b4a91d2'] ?? 0,
                'fasilitasi_penerapan_dan_penegakan_peraturan_perundang__undangan'                                                                                                                                                        => $pembinaanCamat['543df8c2e7a5b'] ?? 0,
                'fasilitasi_penyediaan_data_dan_pendayagunaan_data_profil_desa_dan_kelurahan'                                                                                                                                             => $pembinaanCamat['6a2bc957d3e4f'] ?? 0,
                'jumlah_kegiatan_fasilitasi_pelaksanaan_tugas_wewenang_fungsi_hak_dan_kewajiban_kepala_desa_bpd_lurah_dan_lembaga_kemasyarakatan'                                                                                         => $pembinaanCamat['7f9a81e632bd1'] ?? 0,
                'jumlah_kegiatan_fasilitasi_upaya_penyelenggaraan_ketenteraman_dan_ketertiban_umum'                                                                                                                                       => $pembinaanCamat['8954c3de1ab2e'] ?? 0,
                'fasilitasi_penataan_penguatan_dan_efektivitas_pelaksanaan_tugas_fungsi_dan_kewajiban_lembaga_kemasyarakatan_desa_dan_kelurahan'                                                                                          => $pembinaanCamat['9d7c5e1a3b2f4'] ?? 0,
                'jumlah_kegiatan_fasilitasi_partisipasi_masyarakat_dalam_perencanaan_pelaksanaan_pemanfaatan_dan_pemeliharaan_serta_pengembangan_dan_pelestarian_hasil_pembangunan'                                                       => $pembinaanCamat['a4fb92c6e5d1a'] ?? 0,
                'fasilitasi_kerjasama_antar_desa_kelurahan_dan_kerjasama_desa_kelurahan_dengan_pihak_ketiga'                                                                                                                              => $pembinaanCamat['b8dc4f63e2a1d'] ?? 0,
                'jumlah_kegiatan_fasilitasi_pelaksanaan_program_dan_kegiatan_pemberdayaan_masyarakat'                                                                                                                                     => $pembinaanCamat['c7eab19d3f2a4'] ?? 0,
                'jumlah_kegiatan_pemeliharaan_motivasi_bagi_desa_dan_kelurahan_juara_perlombaan_dan_pasca_perlombaan'                                                                                                                     => $pembinaanCamat['d3bfc6a9e2d4f'] ?? 0,
                'jumlah_kegiatan_fasilitasi_kerjasama_antar_lembaga_kemasyarakatan_dan_lembaga_kemasyarakatan_dengan_organisasi_anggota_lembaga_kemasyarakatan_serta_dengan_pihak_ketiga_sebagai_mitra_percepatan_keberdayaan_masyarakat' => $pembinaanCamat['e5ac9f2d3b1e4'] ?? 0,
                'jumlah_kegiatan_fasilitasi_bantuan_teknis_dan_pendampingan_kepada_lembaga_kemasyarakatan_dan_organisasi_anggotanya'                                                                                                      => $pembinaanCamat['f1c32d9ea5b7d'] ?? 0,
                'jumlah_kegiatan_koordinasi_unit_kerja_pemerintahan_dalam_pengembangan_lembaga_kemasyarakatan_desa_kelurahan'                                                                                                             => $pembinaanCamat['g8b9a23f1c6d5'] ?? 0,
            ],
        ];
    }
}
