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

class AngkatanKerjaEnum extends BaseEnum
{
    public const PENDUDUK_USIA_18_56_BUTA_AKSARA    = 281;
    public const PENDUDUK_USIA_18_56_TAMAT_PT       = 286;
    public const PENDUDUK_USIA_18_56_TAMAT_SD       = 283;
    public const PENDUDUK_USIA_18_56_TAMAT_SLTA     = 285;
    public const PENDUDUK_USIA_18_56_TAMAT_SLTP     = 284;
    public const PENDUDUK_USIA_18_56_TIDAK_TAMAT_SD = 282;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::PENDUDUK_USIA_18_56_BUTA_AKSARA    => 'Penduduk usia 18 - 56 tahun yang buta aksara dan huruf/angka latin',
            self::PENDUDUK_USIA_18_56_TAMAT_PT       => 'Penduduk usia 18 - 56 tahun yang tamat Perguruan Tinggi',
            self::PENDUDUK_USIA_18_56_TAMAT_SD       => 'Penduduk usia 18 - 56 tahun yang tamat SD',
            self::PENDUDUK_USIA_18_56_TAMAT_SLTA     => 'Penduduk usia 18 - 56 tahun yang tamat SLTA',
            self::PENDUDUK_USIA_18_56_TAMAT_SLTP     => 'Penduduk usia 18 - 56 tahun yang tamat SLTP',
            self::PENDUDUK_USIA_18_56_TIDAK_TAMAT_SD => 'Penduduk usia 18 - 56 tahun yang tidak tamat SD',
        ];
    }
}
