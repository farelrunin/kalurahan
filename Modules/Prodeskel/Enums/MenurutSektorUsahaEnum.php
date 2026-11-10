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

class MenurutSektorUsahaEnum extends BaseEnum
{
    public const INDUSTRI_KECIL_MENENGAH_DAN_BESAR = 14;
    public const JASA_DAN_PERDAGANGAN              = 15;
    public const KEHUTANAN                         = 13;
    public const KERAJINAN                         = 11;
    public const PERIKANAN                         = 10;
    public const PERKEBUNAN                        = 8;
    public const PERTAMBANGAN                      = 12;
    public const PERTANIAN                         = 7;
    public const PETERNAKAN                        = 9;

    public static function all(): array
    {
        return [
            self::INDUSTRI_KECIL_MENENGAH_DAN_BESAR => 'Industri kecil, menengah dan besar',
            self::JASA_DAN_PERDAGANGAN              => 'Jasa dan perdagangan',
            self::KEHUTANAN                         => 'Kehutanan',
            self::KERAJINAN                         => 'Kerajinan',
            self::PERIKANAN                         => 'Perikanan',
            self::PERKEBUNAN                        => 'Perkebunan',
            self::PERTAMBANGAN                      => 'Pertambangan',
            self::PERTANIAN                         => 'Pertanian',
            self::PETERNAKAN                        => 'Peternakan',
        ];
    }
}
