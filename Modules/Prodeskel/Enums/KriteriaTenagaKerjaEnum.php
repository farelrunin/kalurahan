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

class KriteriaTenagaKerjaEnum extends BaseEnum
{
    public const ANGKATAN_KERJA                    = 280;
    public const PENDUDUK_SEKOLAH                  = 278;
    public const PENDUDUK_USIA_0_6                 = 277;
    public const PENDUDUK_USIA_18_56               = 274;
    public const PENDUDUK_USIA_18_56_BEKERJA       = 275;
    public const PENDUDUK_USIA_18_56_TIDAK_BEKERJA = 276;
    public const PENDUDUK_USIA_56_KE_ATAS          = 279;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::ANGKATAN_KERJA                    => 'Angkatan kerja',
            self::PENDUDUK_SEKOLAH                  => 'Penduduk masih sekolah 7 - 18 tahun',
            self::PENDUDUK_USIA_0_6                 => 'Penduduk usia 0 - 6 tahun',
            self::PENDUDUK_USIA_18_56               => 'Penduduk usia 18 - 56 tahun',
            self::PENDUDUK_USIA_18_56_BEKERJA       => 'Penduduk usia 18 - 56 tahun yang bekerja',
            self::PENDUDUK_USIA_18_56_TIDAK_BEKERJA => 'Penduduk usia 18 - 56 tahun yang belum atau tidak bekerja',
            self::PENDUDUK_USIA_56_KE_ATAS          => 'Penduduk usia 56 tahun ke atas',
        ];
    }
}
