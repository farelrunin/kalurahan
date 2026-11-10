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

class JenisBahanGalianEnum extends BaseEnum
{
    public const ALUMINIUM    = 189;
    public const BATU_APUNG   = 190;
    public const BATU_CADAS   = 191;
    public const BATU_GAMPING = 192;
    public const BATU_GIPS    = 193;
    public const BATU_GRANIT  = 194;
    public const BATU_GUNUNG  = 195;
    public const BATU_KALI    = 196;
    public const BATU_KAPUR   = 197;
    public const BATU_MARMER  = 198;
    public const BATU_PUTIH   = 199;
    public const BATU_TRASS   = 200;
    public const BATUBARA     = 201;
    public const BELERANG     = 202;
    public const BIJI_BESI    = 203;
    public const BOUXIT       = 204;
    public const EMAS         = 205;
    public const GARAM        = 206;
    public const GAS_ALAM     = 207;
    public const GIPS         = 208;
    public const KUNINGAN     = 210;
    public const MANGAN       = 212;
    public const MINYAK       = 233;
    public const MINYAK_BUMI  = 213;
    public const NIKEL        = 214;
    public const PASIR        = 215;
    public const PASIR_BATU   = 216;
    public const PASIR_BESI   = 217;
    public const PASIR_KWARSA = 218;
    public const PERAK        = 219;
    public const PERUNGGU     = 220;
    public const TANAH_GARAM  = 221;
    public const TANAH_LIAT   = 222;
    public const TEMBAGA      = 223;
    public const TIMAH        = 224;
    public const URANIUM      = 225;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::ALUMINIUM    => 'Aluminium',
            self::BATU_APUNG   => 'Batu apung',
            self::BATU_CADAS   => 'Batu cadas',
            self::BATU_GAMPING => 'Batu Gamping',
            self::BATU_GIPS    => 'Batu Gips',
            self::BATU_GRANIT  => 'Batu Granit',
            self::BATU_GUNUNG  => 'Batu gunung',
            self::BATU_KALI    => 'Batu kali',
            self::BATU_KAPUR   => 'Batu kapur',
            self::BATU_MARMER  => 'Batu marmer',
            self::BATU_PUTIH   => 'Batu Putih',
            self::BATU_TRASS   => 'Batu Trass',
            self::BATUBARA     => 'Batubara',
            self::BELERANG     => 'Belerang',
            self::BIJI_BESI    => 'Biji Besi',
            self::BOUXIT       => 'Bouxit',
            self::EMAS         => 'Emas',
            self::GARAM        => 'Garam',
            self::GAS_ALAM     => 'Gas Alam',
            self::GIPS         => 'Gips',
            self::KUNINGAN     => 'Kuningan',
            self::MANGAN       => 'Mangan',
            self::MINYAK       => 'Minyak',
            self::MINYAK_BUMI  => 'Minyak Bumi',
            self::NIKEL        => 'Nikel',
            self::PASIR        => 'Pasir',
            self::PASIR_BATU   => 'Pasir Batu',
            self::PASIR_BESI   => 'Pasir Besi',
            self::PASIR_KWARSA => 'Pasir kwarsa',
            self::PERAK        => 'Perak',
            self::PERUNGGU     => 'Perunggu',
            self::TANAH_GARAM  => 'Tanah Garam',
            self::TANAH_LIAT   => 'Tanah liat',
            self::TEMBAGA      => 'Tembaga',
            self::TIMAH        => 'Timah',
            self::URANIUM      => 'Uranium',
        ];
    }
}
