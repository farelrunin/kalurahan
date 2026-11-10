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

class KomoditasKualitasAirEnum extends BaseEnum
{
    public const BAK_PENAMPUNG_AIR_HUJAN = 56;
    public const BELI_DARI_TANGKI_SWASTA = 57;
    public const DEPOT_ISI_ULANG         = 58;
    public const EMBUNG                  = 55;
    public const HIDRAN_UMUM             = 51;
    public const MATA_AIR                = 48;
    public const PAM                     = 52;
    public const PIPA                    = 53;
    public const SUMBER_LAIN             = 59;
    public const SUMUR_GALI              = 49;
    public const SUMUR_POMPA             = 50;
    public const SUNGAI                  = 54;

    public static function all(): array
    {
        return [
            self::BAK_PENAMPUNG_AIR_HUJAN => 'Bak penampung air hujan',
            self::BELI_DARI_TANGKI_SWASTA => 'Beli dari tangki swasta',
            self::DEPOT_ISI_ULANG         => 'Depot isi ulang',
            self::EMBUNG                  => 'Embung',
            self::HIDRAN_UMUM             => 'Hidran umum',
            self::MATA_AIR                => 'Mata Air',
            self::PAM                     => 'PAM',
            self::PIPA                    => 'Pipa',
            self::SUMBER_LAIN             => 'Sumber lain',
            self::SUMUR_GALI              => 'Sumur gali',
            self::SUMUR_POMPA             => 'Sumur pompa',
            self::SUNGAI                  => 'Sungai',
        ];
    }
}
