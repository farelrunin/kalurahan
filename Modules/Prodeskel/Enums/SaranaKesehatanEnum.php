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

class SaranaKesehatanEnum extends BaseEnum
{
    public const BIDAN                           = 588;
    public const DUKUN_PENGOBATAN_ALTERNATIF     = 590;
    public const JUMLAH_DOKTER_GIGI              = 584;
    public const JUMLAH_DOKTER_PRAKTEK           = 591;
    public const JUMLAH_DOKTER_SPESIALIS_LAINNYA = 585;
    public const JUMLAH_DOKTER_UMUM              = 583;
    public const JUMLAH_DUKUN_BERSALIN_TERLATIH  = 587;
    public const JUMLAH_PARAMEDIS                = 586;
    public const LABORATORIUM_KESEHATAN          = 592;
    public const PERAWAT                         = 589;
    public const SARANA_KESEHATAN_LAINNYA        = 2205;

    public static function all(): array
    {
        return [
            self::BIDAN                           => 'Bidan',
            self::DUKUN_PENGOBATAN_ALTERNATIF     => 'Dukun pengobatan alternatif',
            self::JUMLAH_DOKTER_GIGI              => 'Jumlah dokter gigi',
            self::JUMLAH_DOKTER_PRAKTEK           => 'Jumlah dokter praktek',
            self::JUMLAH_DOKTER_SPESIALIS_LAINNYA => 'Jumlah dokter spesialis lainnya',
            self::JUMLAH_DOKTER_UMUM              => 'Jumlah dokter umum',
            self::JUMLAH_DUKUN_BERSALIN_TERLATIH  => 'Jumlah dukun bersalin terlatih',
            self::JUMLAH_PARAMEDIS                => 'Jumlah paramedis',
            self::LABORATORIUM_KESEHATAN          => 'Laboratorium kesehatan',
            self::PERAWAT                         => 'Perawat',
            self::SARANA_KESEHATAN_LAINNYA        => 'Sarana Kesehatan Lainnya',
        ];
    }
}
