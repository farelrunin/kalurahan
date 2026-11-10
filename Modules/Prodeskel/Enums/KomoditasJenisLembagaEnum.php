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

class KomoditasJenisLembagaEnum extends BaseEnum
{
    public const BADAN_USAHA_MILIK_DESA      = 2187;
    public const IDI                         = 2195;
    public const KARANG_TARUNA               = 2184;
    public const KELOMPOK_GOTONG_ROYONG      = 2193;
    public const KELOMPOK_PEMIRSA            = 2199;
    public const KELOMPOK_TANI_NELAYAN       = 2185;
    public const LEMBAGA                     = 2201;
    public const LEMBAGA_ADAT                = 2186;
    public const LKD_LKK                     = 2178;
    public const LKMD_LKMK                   = 2179;
    public const LPMD_LPMK_ATAU_SEBUTAN_LAIN = 2180;
    public const ORGANISASI_BAPAK            = 2192;
    public const ORGANISASI_KEAGAMAAN        = 2188;
    public const ORGANISASI_PEMUDA_LAINNYA   = 2190;
    public const ORGANISASI_PEREMPUAN_LAIN   = 2189;
    public const ORGANISASI_PROFESI_LAINNYA  = 2191;
    public const PANTI                       = 2200;
    public const PARFI                       = 2196;
    public const PECINTA_ALAM                = 2197;
    public const PKK                         = 2181;
    public const PWI                         = 2194;
    public const RUKUN_TETANGGA              = 2183;
    public const RUKUN_WARGA                 = 2182;
    public const WREDATAMA                   = 2198;
    public const YAYASAN                     = 2202;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::BADAN_USAHA_MILIK_DESA      => 'Badan Usaha Milik Desa',
            self::IDI                         => 'IDI',
            self::KARANG_TARUNA               => 'Karang Taruna',
            self::KELOMPOK_GOTONG_ROYONG      => 'Kelompok Gotong Royong',
            self::KELOMPOK_PEMIRSA            => 'Kelompok Pemirsa',
            self::KELOMPOK_TANI_NELAYAN       => 'Kelompok Tani/Nelayan',
            self::LEMBAGA                     => 'Lembaga',
            self::LEMBAGA_ADAT                => 'Lembaga Adat',
            self::LKD_LKK                     => 'LKD/LKK',
            self::LKMD_LKMK                   => 'LKMD/LKMK',
            self::LPMD_LPMK_ATAU_SEBUTAN_LAIN => 'LPMD/LPMK atau Sebutan Lain',
            self::ORGANISASI_BAPAK            => 'Organisasi Bapak',
            self::ORGANISASI_KEAGAMAAN        => 'Organisasi Keagamaan',
            self::ORGANISASI_PEMUDA_LAINNYA   => 'Organisasi Pemuda Lainnya',
            self::ORGANISASI_PEREMPUAN_LAIN   => 'Organisasi Perempuan Lain',
            self::ORGANISASI_PROFESI_LAINNYA  => 'Organisasi Profesi Lainnya',
            self::PANTI                       => 'Panti',
            self::PARFI                       => 'PARFI',
            self::PECINTA_ALAM                => 'Pecinta Alam',
            self::PKK                         => 'PKK',
            self::PWI                         => 'PWI',
            self::RUKUN_TETANGGA              => 'Rukun Tetangga',
            self::RUKUN_WARGA                 => 'Rukun Warga',
            self::WREDATAMA                   => 'WREDATAMA',
            self::YAYASAN                     => 'Yayasan',
        ];
    }
}
