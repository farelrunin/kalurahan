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

class JenisOrganisasiEnum extends BaseEnum
{
    public const BADAN_USAHA_MILIK_DESA_BUMDES                  = 316;
    public const FORUM_KOMUNIKASI_KADER_PEMBERDAYAAN_MASYARAKAT = 320;
    public const KARANG_TARUNA                                  = 319;
    public const KELOMPOK_GOTONG_ROYONG                         = 311;
    public const KELOMPOK_TANI_NELAYAN                          = 306;
    public const LEMBAGA_ADAT                                   = 321;
    public const LKMD_LPM_SEBUTAN_LAIN                          = 317;
    public const ORGANISASI_BAPAK                               = 310;
    public const ORGANISASI_KEAGAMAAN                           = 313;
    public const ORGANISASI_PEMUDA                              = 308;
    public const ORGANISASI_PEREMPUAN                           = 307;
    public const ORGANISASI_PROFESI                             = 309;
    public const PEMBERDAYAAN_DAN_KESEJAHTERAAN_KELUARGA_PKK    = 318;
    public const POSYANDU                                       = 305;
    public const POSYANTEKDES                                   = 312;
    public const RUKUN_TETANGGA_RT                              = 314;
    public const RUKUN_WARGA_RW                                 = 315;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::BADAN_USAHA_MILIK_DESA_BUMDES                  => 'Badan Usaha Milik Desa (BUMDES)',
            self::FORUM_KOMUNIKASI_KADER_PEMBERDAYAAN_MASYARAKAT => 'Forum Komunikasi Kader Pemberdayaan Masyarakat',
            self::KARANG_TARUNA                                  => 'Karang Taruna',
            self::KELOMPOK_GOTONG_ROYONG                         => 'Kelompok Gotong Royong',
            self::KELOMPOK_TANI_NELAYAN                          => 'Kelompok Tani/Nelayan',
            self::LEMBAGA_ADAT                                   => 'Lembaga Adat',
            self::LKMD_LPM_SEBUTAN_LAIN                          => 'LKMD/LPM/Sebutan Lain',
            self::ORGANISASI_BAPAK                               => 'Organisasi Bapak',
            self::ORGANISASI_KEAGAMAAN                           => 'Organisasi Keagamaan',
            self::ORGANISASI_PEMUDA                              => 'Organisasi Pemuda',
            self::ORGANISASI_PEREMPUAN                           => 'Organisasi Perempuan',
            self::ORGANISASI_PROFESI                             => 'Organisasi Profesi',
            self::PEMBERDAYAAN_DAN_KESEJAHTERAAN_KELUARGA_PKK    => 'Pemberdayaan dan Kesejahteraan Keluarga (PKK)',
            self::POSYANDU                                       => 'Posyandu',
            self::POSYANTEKDES                                   => 'Posyantekdes',
            self::RUKUN_TETANGGA_RT                              => 'Rukun Tetangga (RT)',
            self::RUKUN_WARGA_RW                                 => 'Rukun Warga (RW)',
        ];
    }
}
