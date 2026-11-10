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

class SatuanTernakEnum extends BaseEnum
{
    public const BATANG_TH = 1746;
    public const BUAH_TH   = 1013;
    public const EKOR_TH   = 1745;
    public const JENIS_TH  = 965;
    public const KG_TH     = 960;
    public const LITER_TH  = 962;
    public const M_TH      = 963;
    public const M3_TH     = 961;
    public const TON_TH    = 966;
    public const UNIT_TH   = 964;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::BATANG_TH => 'BATANG/TH',
            self::BUAH_TH   => 'BUAH/TH',
            self::EKOR_TH   => 'EKOR/TH',
            self::JENIS_TH  => 'JENIS/TH',
            self::KG_TH     => 'KG/TH',
            self::LITER_TH  => 'LITER/TH',
            self::M_TH      => 'M/TH',
            self::M3_TH     => 'M3/TH',
            self::TON_TH    => 'TON/TH',
            self::UNIT_TH   => 'UNIT/TH',
        ];
    }
}
