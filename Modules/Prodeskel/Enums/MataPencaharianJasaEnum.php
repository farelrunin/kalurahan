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

use App\Enums\BaseEnum;

defined('BASEPATH') || exit('No direct script access allowed');

class MataPencaharianJasaEnum extends BaseEnum
{
    public const BIDAN_SWASTA                                    = 83;
    public const BURUH_MIGRAN_LAKI_LAKI                          = 99;
    public const BURUH_MIGRAN_PEREMPUAN                          = 98;
    public const BURUH_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA        = 77;
    public const BURUH_USAHA_JASA_HIBURAN_DAN_PARIWISATA         = 75;
    public const BURUH_USAHA_JASA_INFORMASI_DAN_KOMUNIKASI       = 72;
    public const BURUH_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN   = 70;
    public const DOKTER_SWASTA                                   = 82;
    public const DOSEN_SWASTA                                    = 87;
    public const DUKUN_PARANORMAL_SUPRANATURAL                   = 85;
    public const GURU_SWASTA                                     = 88;
    public const JASA_KONSULTANSI_MANAJEMEN_DAN_TEKNIS           = 94;
    public const JASA_PENGOBATAN_ALTERNATIF                      = 86;
    public const JASA_PENYEWAAN_PERALATAN_PESTA                  = 103;
    public const KONTRAKTOR                                      = 73;
    public const NOTARIS                                         = 93;
    public const PEGAWAI_NEGERI_SIPIL                            = 79;
    public const PEMBANTU_RUMAH_TANGGA                           = 96;
    public const PEMILIK_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA      = 76;
    public const PEMILIK_USAHA_INFORMASI_DAN_KOMUNIKASI          = 71;
    public const PEMILIK_USAHA_JASA_HIBURAN_DAN_PARIWISATA       = 74;
    public const PEMILIK_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN = 69;
    public const PEMILIK_USAHA_WARUNG_RUMAH_MAKAN_DAN_RESTORAN   = 78;
    public const PENGACARA                                       = 92;
    public const PENSIUNAN_PNS                                   = 90;
    public const PENSIUNAN_SWASTA                                = 91;
    public const PENSIUNAN_TNI_POLRI                             = 89;
    public const PERAWAT_SWASTA                                  = 84;
    public const POLRI                                           = 81;
    public const SENIMAN_ARTIS                                   = 95;
    public const SOPIR                                           = 97;
    public const TIDAK_MEMPUNYAI_MATAPENCAHARIAN_TETAP           = 102;
    public const TNI                                             = 80;
    public const USAHA_JASA_PENGERAH_TENAGA_KERJA                = 100;
    public const WIRASWASTA_LAINNYA                              = 101;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::BIDAN_SWASTA                                    => 'Bidan swasta',
            self::BURUH_MIGRAN_LAKI_LAKI                          => 'Buruh migran laki-laki',
            self::BURUH_MIGRAN_PEREMPUAN                          => 'Buruh migran perempuan',
            self::BURUH_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA        => 'Buruh usaha hotel dan penginapan lainnya',
            self::BURUH_USAHA_JASA_HIBURAN_DAN_PARIWISATA         => 'Buruh usaha jasa hiburan dan pariwisata',
            self::BURUH_USAHA_JASA_INFORMASI_DAN_KOMUNIKASI       => 'Buruh usaha jasa informasi dan komunikasi',
            self::BURUH_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN   => 'Buruh usaha jasa transportasi dan perhubungan',
            self::DOKTER_SWASTA                                   => 'Dokter swasta',
            self::DOSEN_SWASTA                                    => 'Dosen swasta',
            self::DUKUN_PARANORMAL_SUPRANATURAL                   => 'Dukun/paranormal/supranatural',
            self::GURU_SWASTA                                     => 'Guru swasta',
            self::JASA_KONSULTANSI_MANAJEMEN_DAN_TEKNIS           => 'Jasa Konsultansi Manajemen dan Teknis',
            self::JASA_PENGOBATAN_ALTERNATIF                      => 'Jasa pengobatan alternatif',
            self::JASA_PENYEWAAN_PERALATAN_PESTA                  => 'Jasa penyewaan peralatan pesta',
            self::KONTRAKTOR                                      => 'Kontraktor',
            self::NOTARIS                                         => 'Notaris',
            self::PEGAWAI_NEGERI_SIPIL                            => 'Pegawai Negeri Sipil',
            self::PEMBANTU_RUMAH_TANGGA                           => 'Pembantu rumah tangga',
            self::PEMILIK_USAHA_HOTEL_DAN_PENGINAPAN_LAINNYA      => 'Pemilik usaha hotel dan penginapan lainnya',
            self::PEMILIK_USAHA_INFORMASI_DAN_KOMUNIKASI          => 'Pemilik usaha informasi dan komunikasi',
            self::PEMILIK_USAHA_JASA_HIBURAN_DAN_PARIWISATA       => 'Pemilik usaha jasa hiburan dan pariwisata',
            self::PEMILIK_USAHA_JASA_TRANSPORTASI_DAN_PERHUBUNGAN => 'Pemilik usaha jasa transportasi dan perhubungan',
            self::PEMILIK_USAHA_WARUNG_RUMAH_MAKAN_DAN_RESTORAN   => 'Pemilik usaha warung, rumah makan dan restoran',
            self::PENGACARA                                       => 'Pengacara',
            self::PENSIUNAN_PNS                                   => 'Pensiunan PNS',
            self::PENSIUNAN_SWASTA                                => 'Pensiunan swasta',
            self::PENSIUNAN_TNI_POLRI                             => 'Pensiunan TNI/POLRI',
            self::PERAWAT_SWASTA                                  => 'Perawat swasta',
            self::POLRI                                           => 'POLRI',
            self::SENIMAN_ARTIS                                   => 'Seniman/artis',
            self::SOPIR                                           => 'Sopir',
            self::TIDAK_MEMPUNYAI_MATAPENCAHARIAN_TETAP           => 'Tidak mempunyai matapencaharian tetap',
            self::TNI                                             => 'TNI',
            self::USAHA_JASA_PENGERAH_TENAGA_KERJA                => 'Usaha jasa pengerah tenaga kerja',
            self::WIRASWASTA_LAINNYA                              => 'Wiraswasta lainnya',
        ];
    }
}
