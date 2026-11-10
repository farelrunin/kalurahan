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

class KomoditasSdmPendidikanEnum extends BaseEnum
{
    public const USIA_3_6_TAHUN_YANG_BELUM_MASUK_TK            = 159;
    public const USIA_3_6_TAHUN_YANG_SEDANG_TK_PLAY_GROUP      = 160;
    public const USIA_7_18_TAHUN_YANG_TIDAK_PERNAH_SEKOLAH     = 161;
    public const USIA_7_18_TAHUN_YANG_SEDANG_SEKOLAH           = 162;
    public const USIA_18_56_TAHUN_TIDAK_PERNAH_SEKOLAH         = 163;
    public const USIA_18_56_TAHUN_PERNAH_SD_TETAPI_TIDAK_TAMAT = 164;
    public const USIA_12_56_TAHUN_TIDAK_TAMAT_SLTP             = 166;
    public const USIA_18_56_TAHUN_TIDAK_TAMAT_SLTA             = 167;
    public const TAMAT_SD_SEDERAJAT                            = 165;
    public const TAMAT_SMP_SEDERAJAT                           = 168;
    public const TAMAT_SMA_SEDERAJAT                           = 169;
    public const TAMAT_D_1_SEDERAJAT                           = 170;
    public const TAMAT_D_2_SEDERAJAT                           = 171;
    public const TAMAT_D_3_SEDERAJAT                           = 172;
    public const TAMAT_S_1_SEDERAJAT                           = 173;
    public const TAMAT_S_2_SEDERAJAT                           = 174;
    public const TAMAT_S_3_SEDERAJAT                           = 175;
    public const TAMAT_SLB_A                                   = 176;
    public const TAMAT_SLB_B                                   = 177;
    public const TAMAT_SLB_C                                   = 178;

    public static function all(): array
    {
        return [
            self::USIA_3_6_TAHUN_YANG_BELUM_MASUK_TK            => 'Usia 3 - 6 tahun yang belum masuk TK',
            self::USIA_3_6_TAHUN_YANG_SEDANG_TK_PLAY_GROUP      => 'Usia 3 - 6 tahun yang sedang TK/play group',
            self::USIA_7_18_TAHUN_YANG_TIDAK_PERNAH_SEKOLAH     => 'Usia 7 - 18 tahun yang tidak pernah sekolah',
            self::USIA_7_18_TAHUN_YANG_SEDANG_SEKOLAH           => 'Usia 7 - 18 tahun yang sedang sekolah',
            self::USIA_18_56_TAHUN_TIDAK_PERNAH_SEKOLAH         => 'Usia 18 - 56 tahun tidak pernah sekolah',
            self::USIA_18_56_TAHUN_PERNAH_SD_TETAPI_TIDAK_TAMAT => 'Usia 18 - 56 tahun pernah SD tetapi tidak tamat',
            self::USIA_12_56_TAHUN_TIDAK_TAMAT_SLTP             => 'Usia 12 - 56 tahun tidak tamat SLTP',
            self::USIA_18_56_TAHUN_TIDAK_TAMAT_SLTA             => 'Usia 18 - 56 tahun tidak tamat SLTA',
            self::TAMAT_SD_SEDERAJAT                            => 'Tamat SD sederajat',
            self::TAMAT_SMP_SEDERAJAT                           => 'Tamat SMP sederajat',
            self::TAMAT_SMA_SEDERAJAT                           => 'Tamat SMA sederajat',
            self::TAMAT_D_1_SEDERAJAT                           => 'Tamat D-1 sederajat',
            self::TAMAT_D_2_SEDERAJAT                           => 'Tamat D-2 sederajat',
            self::TAMAT_D_3_SEDERAJAT                           => 'Tamat D-3 sederajat',
            self::TAMAT_S_1_SEDERAJAT                           => 'Tamat S-1 sederajat',
            self::TAMAT_S_2_SEDERAJAT                           => 'Tamat S-2 sederajat',
            self::TAMAT_S_3_SEDERAJAT                           => 'Tamat S-3 sederajat',
            self::TAMAT_SLB_A                                   => 'Tamat SLB A',
            self::TAMAT_SLB_B                                   => 'Tamat SLB B',
            self::TAMAT_SLB_C                                   => 'Tamat SLB C',
        ];
    }
}
