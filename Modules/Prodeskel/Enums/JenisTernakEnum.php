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

defined('BASEPATH') || exit('No direct script access allowed');

class JenisTernakEnum extends BaseEnum
{
    public const ANGSA                 = 131;
    public const ANJING                = 135;
    public const AYAM_KAMPUNG          = 125;
    public const BABI                  = 124;
    public const BEBEK                 = 127;
    public const BUAYA                 = 145;
    public const BURUNG_BEO            = 142;
    public const BURUNG_CENDRAWASIH    = 140;
    public const BURUNG_KAKATUA        = 141;
    public const BURUNG_LANGKA_LAINNYA = 144;
    public const BURUNG_MERAK          = 143;
    public const BURUNG_MERPATI        = 244;
    public const BURUNG_ONTA           = 138;
    public const BURUNG_PUYUH          = 132;
    public const DOMBA                 = 130;
    public const AYAM_BROILER          = 126;
    public const KAMBING               = 129;
    public const KELINCI               = 133;
    public const KERBAU                = 123;
    public const KUCING                = 136;
    public const KUDA                  = 128;
    public const SAPI                  = 122;
    public const TUNA                  = 146;
    public const ULAR_COBRA            = 137;
    public const ULAR_PITHON           = 139;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::ANGSA                 => 'Angsa',
            self::ANJING                => 'Anjing',
            self::AYAM_KAMPUNG          => 'Ayam kampung',
            self::BABI                  => 'Babi',
            self::BEBEK                 => 'Bebek',
            self::BUAYA                 => 'Buaya',
            self::BURUNG_BEO            => 'Burung beo',
            self::BURUNG_CENDRAWASIH    => 'Burung cendrawasih',
            self::BURUNG_KAKATUA        => 'Burung kakatua',
            self::BURUNG_LANGKA_LAINNYA => 'Burung langka lainnya',
            self::BURUNG_MERAK          => 'Burung merak',
            self::BURUNG_MERPATI        => 'Burung Merpati',
            self::BURUNG_ONTA           => 'Burung onta',
            self::BURUNG_PUYUH          => 'Burung puyuh',
            self::DOMBA                 => 'Domba',
            self::AYAM_BROILER          => 'Jenis ayam broiler',
            self::KAMBING               => 'Kambing',
            self::KELINCI               => 'Kelinci',
            self::KERBAU                => 'Kerbau',
            self::KUCING                => 'Kucing',
            self::KUDA                  => 'Kuda',
            self::SAPI                  => 'Sapi',
            self::TUNA                  => 'Tuna',
            self::ULAR_COBRA            => 'Ular cobra',
            self::ULAR_PITHON           => 'Ular pithon',
        ];
    }
}
