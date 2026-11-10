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

class KomoditasTanamanBuahEnum extends BaseEnum
{
    public const ALPOKAT      = 31;
    public const ANGGUR       = 54;
    public const APEL         = 36;
    public const BELIMBING    = 38;
    public const DUKU         = 41;
    public const DURIAN       = 39;
    public const GANDARIA     = 258;
    public const JAMBU_AIR    = 50;
    public const JAMBU_KLUTUK = 57;
    public const JAMBU_METE   = 88;
    public const JERUK        = 30;
    public const KEDONDONG    = 53;
    public const KESEMEK      = 257;
    public const KOKOSAN      = 42;
    public const LENGKENG     = 45;
    public const LIMAU        = 47;
    public const MANGGA       = 32;
    public const MANGGIS      = 34;
    public const MARKISA      = 44;
    public const MATOA        = 249;
    public const MELINJO      = 55;
    public const MELON        = 49;
    public const MURBEI       = 58;
    public const NANGKA       = 51;
    public const NENAS        = 56;
    public const PEPAYA       = 37;
    public const PISANG       = 43;
    public const RAMBUTAN     = 33;
    public const SALAK        = 35;
    public const SAWO         = 40;
    public const SEMANGKA     = 46;
    public const SIRSAK       = 52;
    public const STROBERI     = 255;
    public const TALAS        = 27;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::ALPOKAT      => 'Alpokat',
            self::ANGGUR       => 'Anggur',
            self::APEL         => 'Apel',
            self::BELIMBING    => 'Belimbing',
            self::DUKU         => 'Duku',
            self::DURIAN       => 'Durian',
            self::GANDARIA     => 'Gandaria',
            self::JAMBU_AIR    => 'Jambu Air',
            self::JAMBU_KLUTUK => 'Jambu Klutuk',
            self::JAMBU_METE   => 'Jambu Mete',
            self::JERUK        => 'Jeruk',
            self::KEDONDONG    => 'Kedondong',
            self::KESEMEK      => 'Kesemek',
            self::KOKOSAN      => 'Kokosan',
            self::LENGKENG     => 'Lengkeng',
            self::LIMAU        => 'Limau',
            self::MANGGA       => 'Mangga',
            self::MANGGIS      => 'Manggis',
            self::MARKISA      => 'Markisa',
            self::MATOA        => 'Matoa',
            self::MELINJO      => 'Melinjo',
            self::MELON        => 'Melon',
            self::MURBEI       => 'Murbei',
            self::NANGKA       => 'Nangka',
            self::NENAS        => 'Nenas',
            self::PEPAYA       => 'Pepaya',
            self::PISANG       => 'Pisang',
            self::RAMBUTAN     => 'Rambutan',
            self::SALAK        => 'Salak',
            self::SAWO         => 'Sawo',
            self::SEMANGKA     => 'Semangka',
            self::SIRSAK       => 'Sirsak',
            self::STROBERI     => 'Stroberi',
            self::TALAS        => 'Talas',
        ];
    }
}
