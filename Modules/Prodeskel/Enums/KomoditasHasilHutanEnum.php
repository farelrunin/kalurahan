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

class KomoditasHasilHutanEnum extends BaseEnum
{
    public const ARANG             = 121;
    public const BAMBU             = 102;
    public const CEMARA            = 109;
    public const DAMAR             = 101;
    public const ENAU              = 107;
    public const GAMBIR            = 117;
    public const GULA_ENAU         = 119;
    public const GULA_LONTAR       = 120;
    public const IJUK_ENAU         = 245;
    public const JATI              = 103;
    public const KAYU              = 98;
    public const KAYU_BAKAR        = 247;
    public const KAYU_BESI         = 114;
    public const KAYU_CENDANA      = 110;
    public const KAYU_GAHARU       = 111;
    public const KAYU_SENGON       = 246;
    public const KAYU_ULIN         = 115;
    public const KEMENYAN          = 116;
    public const LONTAR            = 105;
    public const MADU_LEBAH        = 99;
    public const MAHONI            = 108;
    public const MERANTI           = 113;
    public const MINYAK_KAYU_PUTIH = 118;
    public const NILAM             = 104;
    public const ROTAN             = 100;
    public const RUMBIA            = 259;
    public const SAGU              = 106;
    public const SARANG_BURUNG     = 112;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::ARANG             => 'Arang',
            self::BAMBU             => 'Bambu',
            self::CEMARA            => 'Cemara',
            self::DAMAR             => 'Damar',
            self::ENAU              => 'Enau',
            self::GAMBIR            => 'Gambir',
            self::GULA_ENAU         => 'Gula enau',
            self::GULA_LONTAR       => 'Gula lontar',
            self::IJUK_ENAU         => 'Ijuk Enau',
            self::JATI              => 'Jati',
            self::KAYU              => 'Kayu',
            self::KAYU_BAKAR        => 'Kayu Bakar',
            self::KAYU_BESI         => 'Kayu besi',
            self::KAYU_CENDANA      => 'Kayu cendana',
            self::KAYU_GAHARU       => 'Kayu gaharu',
            self::KAYU_SENGON       => 'Kayu Sengon',
            self::KAYU_ULIN         => 'Kayu ulin',
            self::KEMENYAN          => 'Kemenyan',
            self::LONTAR            => 'Lontar',
            self::MADU_LEBAH        => 'Madu lebah',
            self::MAHONI            => 'Mahoni',
            self::MERANTI           => 'Meranti',
            self::MINYAK_KAYU_PUTIH => 'Minyak kayu putih',
            self::NILAM             => 'Nilam',
            self::ROTAN             => 'Rotan',
            self::RUMBIA            => 'Rumbia',
            self::SAGU              => 'Sagu',
            self::SARANG_BURUNG     => 'Sarang burung',
        ];
    }
}
