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

class KomoditasTanamanKebunEnum extends BaseEnum
{
    public const CENGKEH      = 83;
    public const COKLAT       = 84;
    public const JARAK_KEPYAR = 93;
    public const JARAK_PAGAR  = 92;
    public const KACANG_MEDE  = 5;
    public const KAPUK        = 95;
    public const KARET        = 87;
    public const KELAPA       = 80;
    public const KELAPA_SAWIT = 81;
    public const KEMIRI       = 256;
    public const KOPI         = 82;
    public const LADA         = 86;
    public const PALA         = 90;
    public const PINANG       = 85;
    public const TEBU         = 94;
    public const TEH          = 97;
    public const TEMBAKAU     = 89;
    public const VANILI       = 91;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::CENGKEH      => 'Cengkeh',
            self::COKLAT       => 'Coklat',
            self::JARAK_KEPYAR => 'Jarak Kepyar',
            self::JARAK_PAGAR  => 'Jarak Pagar',
            self::KACANG_MEDE  => 'Kacang Mede',
            self::KAPUK        => 'Kapuk',
            self::KARET        => 'Karet',
            self::KELAPA       => 'Kelapa',
            self::KELAPA_SAWIT => 'Kelapa Sawit',
            self::KEMIRI       => 'Kemiri',
            self::KOPI         => 'Kopi',
            self::LADA         => 'Lada',
            self::PALA         => 'Pala',
            self::PINANG       => 'Pinang',
            self::TEBU         => 'Tebu',
            self::TEH          => 'Teh',
            self::TEMBAKAU     => 'Tembakau',
            self::VANILI       => 'Vanili',
        ];
    }
}
