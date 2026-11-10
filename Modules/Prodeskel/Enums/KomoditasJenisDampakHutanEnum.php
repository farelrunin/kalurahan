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

class KomoditasJenisDampakHutanEnum extends BaseEnum
{
    public const BERUBAHNYA_FUNGSI_HUTAN                 = 15;
    public const BISING                                  = 9;
    public const HILANGNYA_DAERAH_TANGKAPAN_AIR          = 17;
    public const HILANGNYA_SUMBER_MATA_AIR               = 12;
    public const KEBAKARAN_HUTAN                         = 13;
    public const KEMUSNAHAN_FLORA_FAUNA_DAN_SATWA_LANGKA = 11;
    public const KERUSAKAN_BIOTA_PLASMA_NUTFAH_HUTAN     = 10;
    public const LONGSOR_EROSI                           = 8;
    public const MUSNAHNYA_HABITAT_BINATANG_HUTAN        = 18;
    public const PENCEMARAN_AIR                          = 7;
    public const PENCEMARAN_UDARA                        = 6;
    public const TERJADINYA_KEKERINGAN_SULIT_AIR         = 14;
    public const TERJADINYA_LAHAN_KRITIS                 = 16;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::BERUBAHNYA_FUNGSI_HUTAN                 => 'Berubahnya Fungsi Hutan',
            self::BISING                                  => 'Bising',
            self::HILANGNYA_DAERAH_TANGKAPAN_AIR          => 'Hilangnya Daerah Tangkapan Air',
            self::HILANGNYA_SUMBER_MATA_AIR               => 'Hilangnya Sumber Mata Air',
            self::KEBAKARAN_HUTAN                         => 'Kebakaran Hutan',
            self::KEMUSNAHAN_FLORA_FAUNA_DAN_SATWA_LANGKA => 'Kemusnahan Flora, Fauna dan Satwa Langka',
            self::KERUSAKAN_BIOTA_PLASMA_NUTFAH_HUTAN     => 'Kerusakan Biota/Plasma Nutfah Hutan',
            self::LONGSOR_EROSI                           => 'Longsor/Erosi',
            self::MUSNAHNYA_HABITAT_BINATANG_HUTAN        => 'Musnahnya Habitat Binatang Hutan',
            self::PENCEMARAN_AIR                          => 'Pencemaran Air',
            self::PENCEMARAN_UDARA                        => 'Pencemaran Udara',
            self::TERJADINYA_KEKERINGAN_SULIT_AIR         => 'Terjadinya Kekeringan/Sulit Air',
            self::TERJADINYA_LAHAN_KRITIS                 => 'Terjadinya Lahan Kritis',
        ];
    }
}
