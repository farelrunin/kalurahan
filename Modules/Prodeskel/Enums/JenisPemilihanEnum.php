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

class JenisPemilihanEnum extends BaseEnum
{
    public const PEMILU_KEPALA_DESA_KELURAHAN = 639;
    public const PEMILU_KEPALA_KABUPATEN_KOTA = 640;
    public const PEMILU_KEPALA_GOVERNUR       = 641;
    public const PEMILU_LEGISLATIF            = 642;
    public const PEMILU_PRESIDEN              = 643;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::PEMILU_KEPALA_DESA_KELURAHAN => 'Pemilu Kepala Desa/Kelurahan',
            self::PEMILU_KEPALA_KABUPATEN_KOTA => 'Pemilu Kepala Kabupaten/Kota',
            self::PEMILU_KEPALA_GOVERNUR       => 'Pemilu Kepala Gubernur',
            self::PEMILU_LEGISLATIF            => 'Pemilu Legislatif (DPD/DPR/DPRD)',
            self::PEMILU_PRESIDEN              => 'Pemilu Presiden',
        ];
    }
}
