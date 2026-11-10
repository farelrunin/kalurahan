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

class JenisPerikananEnum extends BaseEnum
{
    public const AYAM_AYAM        = 168;
    public const BANDENG          = 171;
    public const BARABARA         = 165;
    public const BARONANG         = 160;
    public const BAWAL            = 159;
    public const BELANAK          = 155;
    public const BELUT            = 184;
    public const CUCUT            = 166;
    public const CUMI             = 156;
    public const GABUS            = 179;
    public const GURAME           = 183;
    public const GURITA           = 157;
    public const HIU              = 149;
    public const IKAN_EKOR_KUNING = 162;
    public const JAMBAL           = 152;
    public const KAKAP            = 150;
    public const KATAK            = 188;
    public const KEMBUNG          = 161;
    public const KEPITING         = 174;
    public const KERANG           = 173;
    public const KERAPU_SUNUK     = 163;
    public const KODOK            = 187;
    public const KULIT_KERANG     = 209;
    public const KUWE             = 154;
    public const LAYUR            = 167;
    public const LELE             = 178;
    public const MAS              = 175;
    public const MUJAIR           = 177;
    public const NENER            = 172;
    public const NILA             = 181;
    public const PARI             = 153;
    public const PATIN            = 180;
    public const PENYU            = 185;
    public const RAJUNGAN         = 176;
    public const RUMPUT_LAUT      = 186;
    public const SALMON           = 147;
    public const SARDEN           = 158;
    public const SEPAT            = 182;
    public const TEMBANG          = 170;
    public const TENGGIRI         = 151;
    public const TERI             = 254;
    public const TERIPANG         = 164;
    public const TONGKOL_CAKALANG = 148;
    public const TUNA             = 251;
    public const UDANG_LOBSTER    = 169;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::AYAM_AYAM        => 'Ayam-ayam',
            self::BANDENG          => 'Bandeng',
            self::BARABARA         => 'Barabara',
            self::BARONANG         => 'Baronang',
            self::BAWAL            => 'Bawal',
            self::BELANAK          => 'Belanak',
            self::BELUT            => 'Belut',
            self::CUCUT            => 'Cucut',
            self::CUMI             => 'Cumi',
            self::GABUS            => 'Gabus',
            self::GURAME           => 'Gurame',
            self::GURITA           => 'Gurita',
            self::HIU              => 'Hiu',
            self::IKAN_EKOR_KUNING => 'Ikan ekor kuning',
            self::JAMBAL           => 'Jambal',
            self::KAKAP            => 'Kakap',
            self::KATAK            => 'Katak',
            self::KEMBUNG          => 'Kembung',
            self::KEPITING         => 'Kepiting',
            self::KERANG           => 'Kerang',
            self::KERAPU_SUNUK     => 'Kerapu sunuk',
            self::KODOK            => 'Kodok',
            self::KULIT_KERANG     => 'Kulit kerang',
            self::KUWE             => 'Kuwe',
            self::LAYUR            => 'Layur',
            self::LELE             => 'Lele',
            self::MAS              => 'Mas',
            self::MUJAIR           => 'Mujair',
            self::NENER            => 'Nener',
            self::NILA             => 'Nila',
            self::PARI             => 'Pari',
            self::PATIN            => 'Patin',
            self::PENYU            => 'Penyu',
            self::RAJUNGAN         => 'Rajungan',
            self::RUMPUT_LAUT      => 'Rumput laut',
            self::SALMON           => 'Salmon',
            self::SARDEN           => 'Sarden',
            self::SEPAT            => 'Sepat',
            self::TEMBANG          => 'Tembang',
            self::TENGGIRI         => 'Tenggiri',
            self::TERI             => 'Teri',
            self::TERIPANG         => 'Teripang',
            self::TONGKOL_CAKALANG => 'Tongkol/cakalang',
            self::TUNA             => 'Tuna',
            self::UDANG_LOBSTER    => 'Udang lobster',
        ];
    }
}
