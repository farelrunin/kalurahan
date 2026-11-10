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

class PrasaranaKesehatanEnum extends BaseEnum
{
    public const APOTIK                                     = 574;
    public const BALAI_KESEHATAN_IBU_DAN_ANAK               = 581;
    public const BALAI_PENGOBATAN_MASYARAKAT_YAYASAN_SWASTA = 577;
    public const GUDANG_MENYIMPAN_OBAT                      = 578;
    public const JUMLAH_RUMAH_KANTOR_PRAKTEK_DOKTER         = 579;
    public const POLIKLINIK_BALAI_PENGOBATAN                = 573;
    public const POSYANDU                                   = 575;
    public const PUSKESMAS                                  = 571;
    public const PUSKESMAS_PEMBANTU                         = 572;
    public const RUMAH_BERSALIN                             = 580;
    public const RUMAH_SAKIT_MATA                           = 582;
    public const RUMAH_SAKIT_UMUM                           = 570;
    public const TOKO_OBAT                                  = 576;

    public static function all(): array
    {
        return [
            self::APOTIK                                     => 'Apotik',
            self::BALAI_KESEHATAN_IBU_DAN_ANAK               => 'Balai Kesehatan Ibu Dan Anak',
            self::BALAI_PENGOBATAN_MASYARAKAT_YAYASAN_SWASTA => 'Balai Pengobatan Masyarakat Yayasan/Swasta',
            self::GUDANG_MENYIMPAN_OBAT                      => 'Gudang Menyimpan Obat',
            self::JUMLAH_RUMAH_KANTOR_PRAKTEK_DOKTER         => 'Jumlah Rumah/Kantor Praktek Dokter',
            self::POLIKLINIK_BALAI_PENGOBATAN                => 'Poliklinik/Balai Pengobatan',
            self::POSYANDU                                   => 'Posyandu',
            self::PUSKESMAS                                  => 'Puskesmas',
            self::PUSKESMAS_PEMBANTU                         => 'Puskesmas Pembantu',
            self::RUMAH_BERSALIN                             => 'Rumah Bersalin',
            self::RUMAH_SAKIT_MATA                           => 'Rumah Sakit Mata',
            self::RUMAH_SAKIT_UMUM                           => 'Rumah Sakit Umum',
            self::TOKO_OBAT                                  => 'Toko Obat',
        ];
    }
}
