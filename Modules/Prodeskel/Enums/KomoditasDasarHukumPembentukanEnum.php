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

class KomoditasDasarHukumPembentukanEnum extends BaseEnum
{
    public const BELUM_ADA_LKD_LKK                       = 2177;
    public const BERDASARKAN_KEPUTUSAN_BUPATI_WALIKOTA   = 2175;
    public const BERDASARKAN_KEPUTUSAN_CAMAT             = 2176;
    public const BERDASARKAN_KEPUTUSAN_LURAH_KEPALA_DESA = 2208;
    public const BERDASARKAN_PERDES_DAN_PERDA_KAB_KOTA   = 2207;

    public static function all(): array
    {
        return [
            self::BELUM_ADA_LKD_LKK                       => 'Belum ada LKD/LKK atau Belum ada dasar hukum',
            self::BERDASARKAN_KEPUTUSAN_BUPATI_WALIKOTA   => 'Berdasarkan Keputusan Bupati/Walikota',
            self::BERDASARKAN_KEPUTUSAN_CAMAT             => 'Berdasarkan Keputusan Camat',
            self::BERDASARKAN_KEPUTUSAN_LURAH_KEPALA_DESA => 'Berdasarkan Keputusan Lurah/Kepala Desa',
            self::BERDASARKAN_PERDES_DAN_PERDA_KAB_KOTA   => 'Berdasarkan Perdes dan Perda Kab/Kota',
        ];
    }
}
