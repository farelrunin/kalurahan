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

class MataPencaharianEnum extends BaseEnum
{
    public const MONTIR                = 51;
    public const PEMULUNG              = 55;
    public const PENGRAJIN_INDUSTRI_RT = 60;
    public const TUKANG_ANYAMAN        = 58;
    public const TUKANG_BATU           = 52;
    public const TUKANG_JAHIT          = 56;
    public const TUKANG_KAYU           = 53;
    public const TUKANG_KUE            = 57;
    public const TUKANG_RIAS           = 59;
    public const TUKANG_SUMUR          = 54;

    public static function all(): array
    {
        return [
            self::MONTIR                => 'Montir',
            self::PEMULUNG              => 'Pemulung',
            self::PENGRAJIN_INDUSTRI_RT => 'Pengrajin industri rumah tangga lainnya',
            self::TUKANG_ANYAMAN        => 'Tukang anyaman',
            self::TUKANG_BATU           => 'Tukang batu',
            self::TUKANG_JAHIT          => 'Tukang jahit',
            self::TUKANG_KAYU           => 'Tukang kayu',
            self::TUKANG_KUE            => 'Tukang kue',
            self::TUKANG_RIAS           => 'Tukang rias',
            self::TUKANG_SUMUR          => 'Tukang sumur',
        ];
    }
}
