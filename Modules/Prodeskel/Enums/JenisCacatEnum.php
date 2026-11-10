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

class JenisCacatEnum extends BaseEnum
{
    public const AUTIS                          = 273;
    public const CACAT_FISIK_TUNA_DAKSA_LAINNYA = 269;
    public const CACAT_KULIT                    = 268;
    public const GILA                           = 271;
    public const IDIOT                          = 270;
    public const LUMPUH                         = 266;
    public const STRESS                         = 272;
    public const SUMBING                        = 267;
    public const TUNA_NETRA                     = 265;
    public const TUNA_RUNGU                     = 263;
    public const TUNA_WICARA                    = 264;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::AUTIS                          => 'Autis',
            self::CACAT_FISIK_TUNA_DAKSA_LAINNYA => 'Cacat fisik/tuna daksa lainnya',
            self::CACAT_KULIT                    => 'Cacat kulit',
            self::GILA                           => 'Gila',
            self::IDIOT                          => 'Idiot',
            self::LUMPUH                         => 'Lumpuh',
            self::STRESS                         => 'Stress',
            self::SUMBING                        => 'Sumbing',
            self::TUNA_NETRA                     => 'Tuna netra',
            self::TUNA_RUNGU                     => 'Tuna rungu',
            self::TUNA_WICARA                    => 'Tuna wicara',
        ];
    }
}
