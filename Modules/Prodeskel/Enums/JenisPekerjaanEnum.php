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

namespace Modules\Prodeskel\Enums;

defined('BASEPATH') || exit('No direct script access allowed');

class JenisPekerjaanEnum extends BaseEnum
{
    public const AHLI_PENGOBATAN_ALTERNATIF                      = 15;
    public const AKUNTAN                                         = 112;
    public const ANGGOTA_KABINET_KEMENTERIAN                     = 100;
    public const ANGGOTA_LEGISLATIF                              = 93;
    public const ANGGOTA_MAHKAMAH_KONSTITUSI                     = 99;
    public const APOTEKER                                        = 96;
    public const ARSITEKTUR_DESAINER                             = 31;
    public const BELUM_BEKERJA                                   = 37;
    public const BIARAWATI                                       = 113;
    public const BIDAN_SWASTA                                    = 14;
    public const BUPATI_WALIKOTA                                 = 110;
    public const BURUH_HARIAN_LEPAS                              = 42;
    public const BURUH_JASA_PERDAGANGAN_HASIL_BUMI               = 57;
    public const BURUH_MIGRAN                                    = 3;
    public const BURUH_TANI                                      = 2;
    public const BURUH_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA        = 66;
    public const BURUH_USAHA_JASA_HIBURAN_DAN_PARIWISATA         = 64;
    public const BURUH_USAHA_JASA_INFORMASI_DAN_KOMUNIKASI       = 61;
    public const BURUH_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN   = 59;
    public const DOKTER_SWASTA                                   = 12;
    public const DOSEN_SWASTA                                    = 20;
    public const DUKUN_TRADISIONAL                               = 30;
    public const DUKUN_PARANORMAL_SUPRANATURAL                   = 68;
    public const DUTA_BESAR                                      = 101;
    public const GUBERNUR                                        = 19;
    public const GURU_SWASTA                                     = 19;
    public const IBU_RUMAH_TANGGA                                = 39;
    public const JASA_KONSULTANSI_MANAJEMEN_DAN_TEKNIS           = 82;
    public const JASA_PENGOBATAN_ALTERNATIF                      = 69;
    public const JASA_PENYEWAAN_PERALATAN_PESTA                  = 74;
    public const JURU_MASAK                                      = 83;
    public const KARYAWAN_HONORER                                = 84;
    public const KARYAWAN_PERUSAHAAN_PEMERINTAH                  = 33;
    public const KARYAWAN_PERUSAHAAN_SWASTA                      = 32;
    public const KEPALA_DAERAH                                   = 94;
    public const KONSULTAN_MANAJEMEN_DAN_TEKNIS                  = 62;
    public const KONTRAKTOR                                      = 11;
    public const MONTIR                                          = 10;
    public const NELYAN                                          = 29;
    public const NOTARIS                                         = 28;
    public const PEDAGANG_BARANG_KELONTONG                       = 8;
    public const PEDAGANG_KELING                                 = 22;
    public const PEGAWAI_NEGERI_SIPIL                            = 5;
    public const PELAJAR                                         = 38;
    public const PELAUT                                          = 106;
    public const PEMBANTU_RUMAH_TANGGA                           = 27;
    public const PEMILIK_PERUSAHAAN                              = 55;
    public const PEMILIK_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA      = 65;
    public const PEMILIK_USAHA_INFORMASI_DAN_KOMUNIKASI          = 60;
    public const PEMILIK_USAHA_JASA_HIBURAN_DAN_PARIWISATA       = 63;
    public const PEMILIK_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN = 58;
    public const PEMILIK_USAHA_WARUNG_RUMAH_MAKAN_DAN_RESTORAN   = 67;
    public const PEMUKA_AGAMA                                    = 92;
    public const PEMULUNG                                        = 75;
    public const PENAMBANG                                       = 23;
    public const PENELITI                                        = 107;
    public const PENGACARA                                       = 28;
    public const PENGRAJIN                                       = 7;
    public const PENGRAJIN_INDUSTRI_RUMAH_TANGGA_LAINNYA         = 76;
    public const PENGUSAHA_KECIL_MENENGAH_DAN_BESAR              = 18;
    public const PENGUSAHA_PERDAGANGAN_HASIL_BUMI                = 56;
    public const PENYIAR_RADIO                                   = 105;
    public const PERANGKAT_DESA                                  = 41;
    public const PERAWAT_SWASTA                                  = 13;
    public const PETANI                                          = 1;
    public const PETERNAK                                        = 9;
    public const PIALANG                                         = 85;
    public const PILOT                                           = 104;
    public const POLRI                                           = 17;
    public const PRESIDEN                                        = 97;
    public const PSIKIATER_PSIKOLOG                              = 86;
    public const PURNWIRWAN_PENSIUNAN                            = 40;
    public const SATPAM_SECURITY                                 = 108;
    public const SENIMAN_ARTIS                                   = 21;
    public const SOPIR                                           = 70;
    public const TIDAK_MEMPUNYAI_PEKERJAAN_TETAP                 = 36;
    public const TNI                                             = 16;
    public const TUKANG_ANYAMAN                                  = 77;
    public const TUKANG_BATU                                     = 25;
    public const TUKANG_CUCI                                     = 26;
    public const TUKANG_CUKUR                                    = 88;
    public const TUKANG_GIGI                                     = 90;
    public const TUKANG_JAHIT                                    = 78;
    public const TUKANG_KAYU                                     = 24;
    public const TUKANG_KUE                                      = 79;
    public const TUKANG_LAS                                      = 89;
    public const TUKANG_LISTRIK                                  = 91;
    public const TUKANG_RIAS                                     = 80;
    public const TUKANG_SUMUR                                    = 81;
    public const USAHA_JASA_PENGERAH_TENAGA_KERJA                = 71;
    public const WAKIL_BUPATI                                    = 103;
    public const WAKIL_GUBERNUR                                  = 109;
    public const WAKIL_PRESIDEN                                  = 98;
    public const WARTAWAN                                        = 87;
    public const WIRASWASTA                                      = 34;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::AHLI_PENGOBATAN_ALTERNATIF                      => 'Ahli Pengobatan Alternatif',
            self::AKUNTAN                                         => 'Akuntan',
            self::ANGGOTA_KABINET_KEMENTERIAN                     => 'Anggota kabinet kementrian',
            self::ANGGOTA_LEGISLATIF                              => 'Anggota Legislatif',
            self::ANGGOTA_MAHKAMAH_KONSTITUSI                     => 'Anggota mahkamah konstitusi',
            self::APOTEKER                                        => 'Apoteker',
            self::ARSITEKTUR_DESAINER                             => 'Arsitektur/Desainer',
            self::BELUM_BEKERJA                                   => 'Belum Bekerja',
            self::BIARAWATI                                       => 'Biarawati',
            self::BIDAN_SWASTA                                    => 'Bidan swasta',
            self::BUPATI_WALIKOTA                                 => 'Bupati/walikota',
            self::BURUH_HARIAN_LEPAS                              => 'Buruh Harian Lepas',
            self::BURUH_JASA_PERDAGANGAN_HASIL_BUMI               => 'Buruh jasa perdagangan hasil bumi',
            self::BURUH_MIGRAN                                    => 'Buruh Migran',
            self::BURUH_TANI                                      => 'Buruh Tani',
            self::BURUH_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA        => 'Buruh usaha hotel dan penginapan lainnya',
            self::BURUH_USAHA_JASA_HIBURAN_DAN_PARIWISATA         => 'Buruh usaha jasa hiburan dan pariwisata',
            self::BURUH_USAHA_JASA_INFORMASI_DAN_KOMUNIKASI       => 'Buruh usaha jasa informasi dan komunikasi',
            self::BURUH_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN   => 'Buruh usaha jasa transportasi dan perhubungan',
            self::DOKTER_SWASTA                                   => 'Dokter swasta',
            self::DOSEN_SWASTA                                    => 'Dosen swasta',
            self::DUKUN_TRADISIONAL                               => 'Dukun Tradisional',
            self::DUKUN_PARANORMAL_SUPRANATURAL                   => 'Dukun/paranormal/supranatural',
            self::DUTA_BESAR                                      => 'Duta besar',
            self::GUBERNUR                                        => 'Gubernur',
            self::GURU_SWASTA                                     => 'Guru swasta',
            self::IBU_RUMAH_TANGGA                                => 'Ibu Rumah Tangga',
            self::JASA_KONSULTANSI_MANAJEMEN_DAN_TEKNIS           => 'Jasa Konsultansi Manajemen dan Teknis',
            self::JASA_PENGOBATAN_ALTERNATIF                      => 'Jasa pengobatan alternatif',
            self::JASA_PENYEWAAN_PERALATAN_PESTA                  => 'Jasa penyewaan peralatan pesta',
            self::JURU_MASAK                                      => 'Juru Masak',
            self::KARYAWAN_HONORER                                => 'Karyawan Honorer',
            self::KARYAWAN_PERUSAHAAN_PEMERINTAH                  => 'Karyawan Perusahaan Pemerintah',
            self::KARYAWAN_PERUSAHAAN_SWASTA                      => 'Karyawan Perusahaan Swasta',
            self::KEPALA_DAERAH                                   => 'Kepala Daerah',
            self::KONSULTAN_MANAJEMEN_DAN_TEKNIS                  => 'Konsultan Manajemen dan Teknis',
            self::KONTRAKTOR                                      => 'Kontraktor',
            self::MONTIR                                          => 'Montir',
            self::NELYAN                                          => 'Nelayan',
            self::NOTARIS                                         => 'Notaris',
            self::PEDAGANG_BARANG_KELONTONG                       => 'Pedagang barang kelontong',
            self::PEDAGANG_KELING                                 => 'Pedagang Keliling',
            self::PEGAWAI_NEGERI_SIPIL                            => 'Pegawai Negeri Sipil',
            self::PELAJAR                                         => 'Pelajar',
            self::PELAUT                                          => 'Pelaut',
            self::PEMBANTU_RUMAH_TANGGA                           => 'Pembantu rumah tangga',
            self::PEMILIK_PERUSAHAAN                              => 'Pemilik perusahaan',
            self::PEMILIK_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA      => 'Pemilik usaha hotel dan penginapan lainnya',
            self::PEMILIK_USAHA_INFORMASI_DAN_KOMUNIKASI          => 'Pemilik usaha informasi dan komunikasi',
            self::PEMILIK_USAHA_JASA_HIBURAN_DAN_PARIWISATA       => 'Pemilik usaha jasa hiburan dan pariwisata',
            self::PEMILIK_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN => 'Pemilik usaha jasa transportasi dan perhubungan',
            self::PEMILIK_USAHA_WARUNG_RUMAH_MAKAN_DAN_RESTORAN   => 'Pemilik usaha warung, rumah makan dan restoran',
            self::PEMUKA_AGAMA                                    => 'Pemuka Agama',
            self::PEMULUNG                                        => 'Pemulung',
            self::PENAMBANG                                       => 'Penambang',
            self::PENELITI                                        => 'Peneliti',
            self::PENGACARA                                       => 'Pengacara',
            self::PENGRAJIN                                       => 'Pengrajin',
            self::PENGRAJIN_INDUSTRI_RUMAH_TANGGA_LAINNYA         => 'Pengrajin industri rumah tangga lainnya',
            self::PENGUSAHA_KECIL_MENENGAH_DAN_BESAR              => 'Pengusaha kecil, menengah dan besar',
            self::PENGUSAHA_PERDAGANGAN_HASIL_BUMI                => 'Pengusaha perdagangan hasil bumi',
            self::PENYIAR_RADIO                                   => 'Penyiar radio',
            self::PERANGKAT_DESA                                  => 'Perangkat Desa',
            self::PERAWAT_SWASTA                                  => 'Perawat swasta',
            self::PETANI                                          => 'Petani',
            self::PETERNAK                                        => 'Peternak',
            self::PIALANG                                         => 'Pialang',
            self::PILOT                                           => 'Pilot',
            self::POLRI                                           => 'POLRI',
            self::PRESIDEN                                        => 'Presiden',
            self::PSIKIATER_PSIKOLOG                              => 'Pskiater/Psikolog',
            self::PURNWIRWAN_PENSIUNAN                            => 'Purnawirawan/Pensiunan',
            self::SATPAM_SECURITY                                 => 'Satpam/Security',
            self::SENIMAN_ARTIS                                   => 'Seniman/artis',
            self::SOPIR                                           => 'Sopir',
            self::TIDAK_MEMPUNYAI_PEKERJAAN_TETAP                 => 'Tidak Mempunyai Pekerjaan Tetap',
            self::TNI                                             => 'TNI',
            self::TUKANG_ANYAMAN                                  => 'Tukang Anyaman',
            self::TUKANG_BATU                                     => 'Tukang Batu',
            self::TUKANG_CUCI                                     => 'Tukang Cuci',
            self::TUKANG_CUKUR                                    => 'Tukang Cukur',
            self::TUKANG_GIGI                                     => 'Tukang Gigi',
            self::TUKANG_JAHIT                                    => 'Tukang Jahit',
            self::TUKANG_KAYU                                     => 'Tukang Kayu',
            self::TUKANG_KUE                                      => 'Tukang Kue',
            self::TUKANG_LAS                                      => 'Tukang Las',
            self::TUKANG_LISTRIK                                  => 'Tukang Listrik',
            self::TUKANG_RIAS                                     => 'Tukang Rias',
            self::TUKANG_SUMUR                                    => 'Tukang Sumur',
            self::USAHA_JASA_PENGERAH_TENAGA_KERJA                => 'Usaha jasa pengerah tenaga kerja',
            self::WAKIL_BUPATI                                    => 'Wakil bupati',
            self::WAKIL_GUBERNUR                                  => 'Wakil Gubernur',
            self::WAKIL_PRESIDEN                                  => 'Wakil presiden',
            self::WARTAWAN                                        => 'Wartawan',
            self::WIRASWASTA                                      => 'Wiraswasta',
        ];
    }
}
