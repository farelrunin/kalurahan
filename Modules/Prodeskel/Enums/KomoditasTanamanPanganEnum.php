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

class KomoditasTanamanPanganEnum extends BaseEnum
{
    public const BAWANG_MERAH     = 12;
    public const BAWANG_PUTIH     = 13;
    public const BAYAM            = 22;
    public const BROCOLI          = 20;
    public const BUNCIS           = 19;
    public const CABE             = 11;
    public const JAGUNG           = 1;
    public const JAMUR            = 78;
    public const JERUK_NIPIS      = 48;
    public const KACANG_HIJAU     = 253;
    public const KACANG_KEDELAI   = 2;
    public const KACANG_MERAH     = 6;
    public const KACANG_PANJANG   = 4;
    public const KACANG_TANAH     = 3;
    public const KACANG_TURIS     = 24;
    public const KANGKUNG         = 23;
    public const KEMIRI           = 96;
    public const KENTANG          = 16;
    public const KUBIS            = 17;
    public const MENTIMUN         = 18;
    public const PADI_LADANG      = 8;
    public const PADI_SAWAH       = 7;
    public const SAWI             = 15;
    public const SELADA           = 26;
    public const TERONG           = 21;
    public const TOMAT            = 14;
    public const TUMPANG_SARI     = 29;
    public const UBI_JALAR        = 10;
    public const UBI_KAYU         = 9;
    public const UMBI_UMBIAN_LAIN = 25;
    public const WORTEL           = 28;
    public const KOPI             = 30;
    public const MANGGIS          = 31;
    public const COKLAT           = 32;
    public const KELAPA          = 33;
    public const CENGKEH         = 34;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::BAWANG_MERAH     => 'Bawang Merah',
            self::BAWANG_PUTIH     => 'Bawang Putih',
            self::BAYAM            => 'Bayam',
            self::BROCOLI          => 'Brokoli',
            self::BUNCIS           => 'Buncis',
            self::CABE             => 'Cabe',
            self::JAGUNG           => 'Jagung',
            self::JAMUR            => 'Jamur',
            self::JERUK_NIPIS      => 'Jeruk Nipis',
            self::KACANG_HIJAU     => 'Kacang Hijau',
            self::KACANG_KEDELAI   => 'Kacang Kedelai',
            self::KACANG_MERAH     => 'Kacang Merah',
            self::KACANG_PANJANG   => 'Kacang Panjang',
            self::KACANG_TANAH     => 'Kacang Tanah',
            self::KACANG_TURIS     => 'Kacang Turis',
            self::KANGKUNG         => 'Kangkung',
            self::KEMIRI           => 'Kemiri',
            self::KENTANG          => 'Kentang',
            self::KUBIS            => 'Kubis',
            self::MENTIMUN         => 'Mentimun',
            self::PADI_LADANG      => 'Padi Ladang',
            self::PADI_SAWAH       => 'Padi Sawah',
            self::SAWI             => 'Sawi',
            self::SELADA           => 'Selada',
            self::TERONG           => 'Terong',
            self::TOMAT            => 'Tomat',
            self::TUMPANG_SARI     => 'Tumpang Sari',
            self::UBI_JALAR        => 'Ubi Jalar',
            self::UBI_KAYU         => 'Ubi Kayu',
            self::UMBI_UMBIAN_LAIN => 'Umbi-Umbian Lain',
            self::WORTEL           => 'Wortel',
            self::KOPI             => 'Kopi',
            self::MANGGIS          => 'Manggis',
            self::COKLAT           => 'Coklat',
            self::KELAPA          => 'Kelapa',
            self::CENGKEH         => 'Cengkeh',
        ];
    }
}
