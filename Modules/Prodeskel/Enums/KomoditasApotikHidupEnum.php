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

class KomoditasApotikHidupEnum extends BaseEnum
{
    public const AKAR_WANGI   = 76;
    public const BUAH_MERAH   = 65;
    public const DAUN_DEWA    = 63;
    public const DAUN_SEREH   = 74;
    public const DAUN_SIRIH   = 72;
    public const DEWI_DEWI    = 79;
    public const JAHE         = 59;
    public const JAMUR        = 252;
    public const KAYU_MANIS   = 73;
    public const KENCUR       = 77;
    public const KUMIS_KUCING = 64;
    public const KUNYIT       = 60;
    public const LENGKUAS     = 61;
    public const MAHKOTA_DEWA = 75;
    public const MENGKUDU     = 62;
    public const SAMBILOTO    = 66;
    public const TEMU_HITAM   = 68;
    public const TEMU_KUNCI   = 71;
    public const TEMU_PUTIH   = 69;
    public const TEMU_PUTRI   = 70;
    public const TEMULAWAK    = 67;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::AKAR_WANGI   => 'Akar Wangi',
            self::BUAH_MERAH   => 'Buah Merah',
            self::DAUN_DEWA    => 'Daun Dewa',
            self::DAUN_SEREH   => 'Daun Sereh',
            self::DAUN_SIRIH   => 'Daun Sirih',
            self::DEWI_DEWI    => 'Dewi-Dewi',
            self::JAHE         => 'Jahe',
            self::JAMUR        => 'Jamur',
            self::KAYU_MANIS   => 'Kayu Manis',
            self::KENCUR       => 'Kencur',
            self::KUMIS_KUCING => 'Kumis Kucing',
            self::KUNYIT       => 'Kunyit',
            self::LENGKUAS     => 'Lengkuas',
            self::MAHKOTA_DEWA => 'Mahkota Dewa',
            self::MENGKUDU     => 'Mengkudu',
            self::SAMBILOTO    => 'Sambiloto',
            self::TEMU_HITAM   => 'Temu Hitam',
            self::TEMU_KUNCI   => 'Temu Kunci',
            self::TEMU_PUTIH   => 'Temu Putih',
            self::TEMU_PUTRI   => 'Temu Putri',
            self::TEMULAWAK    => 'Temulawak',
        ];
    }
}
