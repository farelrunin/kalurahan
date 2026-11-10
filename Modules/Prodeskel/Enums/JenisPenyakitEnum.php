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

class JenisPenyakitEnum extends BaseEnum
{
    public const ASMA             = 134;
    public const DIABETES_MELITUS = 126;
    public const GILA_STRESS      = 131;
    public const GINJAL           = 127;
    public const HIVAIDS          = 130;
    public const ISPA             = 133;
    public const JANTUNG          = 121;
    public const KANKER           = 124;
    public const LEPRA_KUSTA      = 129;
    public const LEVER            = 122;
    public const MALARIA          = 128;
    public const PARU_PARU        = 123;
    public const STROKE           = 125;
    public const TBC              = 132;

    public static function all(): array
    {
        return [
            self::ASMA             => 'Asma',
            self::DIABETES_MELITUS => 'Diabetes Melitus',
            self::GILA_STRESS      => 'Gila/stress',
            self::GINJAL           => 'Ginjal',
            self::HIVAIDS          => 'HIV/AIDS',
            self::ISPA             => 'ISPA',
            self::JANTUNG          => 'Jantung',
            self::KANKER           => 'Kanker',
            self::LEPRA_KUSTA      => 'Lepra/Kusta',
            self::LEVER            => 'Lever',
            self::MALARIA          => 'Malaria',
            self::PARU_PARU        => 'Paru-paru',
            self::STROKE           => 'Stroke',
            self::TBC              => 'TBC',
        ];
    }
}
