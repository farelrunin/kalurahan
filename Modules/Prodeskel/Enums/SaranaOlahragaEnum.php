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

class SaranaOlahragaEnum extends BaseEnum
{
    public const ARUM_JERAM            = 566;
    public const GELANGGANG_REMAJA     = 569;
    public const LAPANGAN_BASKET       = 567;
    public const LAPANGAN_BULU_TANGKIS = 560;
    public const LAPANGAN_FUTSAL       = 2264;
    public const LAPANGAN_GOLF         = 564;
    public const LAPANGAN_SEPAK_BOLA   = 559;
    public const LAPANGAN_TENIS        = 562;
    public const LAPANGAN_VOLI         = 563;
    public const MEJA_PINGPONG         = 561;
    public const PACUAN_KUDA           = 565;
    public const PUSAT_KEBUGARAN       = 568;

    public static function all(): array
    {
        return [
            self::ARUM_JERAM            => 'Arum jeram',
            self::GELANGGANG_REMAJA     => 'Gelanggang Remaja',
            self::LAPANGAN_BASKET       => 'Lapangan basket',
            self::LAPANGAN_BULU_TANGKIS => 'Lapangan bulu tangkis',
            self::LAPANGAN_FUTSAL       => 'Lapangan futsal',
            self::LAPANGAN_GOLF         => 'Lapangan golf',
            self::LAPANGAN_SEPAK_BOLA   => 'Lapangan sepak bola',
            self::LAPANGAN_TENIS        => 'Lapangan tenis',
            self::LAPANGAN_VOLI         => 'Lapangan voli',
            self::MEJA_PINGPONG         => 'Meja pingpong',
            self::PACUAN_KUDA           => 'Pacuan kuda',
            self::PUSAT_KEBUGARAN       => 'Pusat kebugaran',
        ];
    }
}
