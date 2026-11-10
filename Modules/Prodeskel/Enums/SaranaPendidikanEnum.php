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

class SaranaPendidikanEnum extends BaseEnum
{
    public const GEDUNG_KAMPUS_PTN                       = 593;
    public const GEDUNG_KAMPUS_PTS                       = 594;
    public const GEDUNG_SD_SEDERAJAT                     = 597;
    public const GEDUNG_SMA_SEDERAJAT                    = 595;
    public const GEDUNG_SMP_SEDERAJAT                    = 596;
    public const GEDUNG_TEMPAT_BERMAIN_ANAK              = 599;
    public const GEDUNG_TK                               = 598;
    public const JUMLAH_LEMBAGA_PENDIDIKAN_AGAMA         = 600;
    public const JUMLAH_PERPUSTAKAAN_KELILING            = 601;
    public const PERPUSTAKAAN_DESA_ELURAHAN              = 602;
    public const PRASARANA_DAN_SARANA_PENDIDIKAN_LAINNYA = 2204;
    public const TAMAN_BACAAN                            = 603;

    public static function all(): array
    {
        return [
            self::GEDUNG_KAMPUS_PTN                       => 'Gedung kampus PTN',
            self::GEDUNG_KAMPUS_PTS                       => 'Gedung Kampus PTS',
            self::GEDUNG_SD_SEDERAJAT                     => 'Gedung SD/sederajat',
            self::GEDUNG_SMA_SEDERAJAT                    => 'Gedung SMA/sederajat',
            self::GEDUNG_SMP_SEDERAJAT                    => 'Gedung SMP/sederajat',
            self::GEDUNG_TEMPAT_BERMAIN_ANAK              => 'Gedung Tempat Bermain Anak',
            self::GEDUNG_TK                               => 'Gedung TK',
            self::JUMLAH_LEMBAGA_PENDIDIKAN_AGAMA         => 'Jumlah Lembaga Pendidikan Agama',
            self::JUMLAH_PERPUSTAKAAN_KELILING            => 'Jumlah perpustakaan keliling',
            self::PERPUSTAKAAN_DESA_ELURAHAN              => 'Perpustakaan desa/kelurahan',
            self::PRASARANA_DAN_SARANA_PENDIDIKAN_LAINNYA => 'Prasarana dan Sarana Pendidikan Lainnya',
            self::TAMAN_BACAAN                            => 'Taman bacaan',
        ];
    }
}
