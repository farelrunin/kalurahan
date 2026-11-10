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

class KomoditasPotensiWisataEnum extends BaseEnum
{
    public const AGROWISATA    = 74;
    public const AIR_TERJUN    = 80;
    public const ARUNG_JERAM   = 78;
    public const CAGAR_BUDAYA  = 77;
    public const DANAU         = 72;
    public const GOA           = 76;
    public const GUNUNG        = 73;
    public const HUTAN_KHUSUS  = 75;
    public const LAUT          = 71;
    public const PADANG_SAVANA = 81;
    public const SITUS_SEJARAH = 79;

    public static function all(): array
    {
        return [
            self::AGROWISATA    => 'Agrowisata',
            self::AIR_TERJUN    => 'Air Terjun',
            self::ARUNG_JERAM   => 'Arung Jerum',
            self::CAGAR_BUDAYA  => 'Cagar Budaya',
            self::DANAU         => 'Danau (Wisata Air, Hutan Wisata, Situs Purbakala, dll)',
            self::GOA           => 'Goa',
            self::GUNUNG        => 'Gunung (Wisata Hutan, Taman Nasional, Bumi Perkemahan, dll)',
            self::HUTAN_KHUSUS  => 'Hutan Khusus',
            self::LAUT          => 'Laut (Wisata, Pulau, Taman Laut, Situs Sejarah Bahari, dll)',
            self::PADANG_SAVANA => 'Padang Savana(wisata Padang Savana)',
            self::SITUS_SEJARAH => 'Situs Sejarah, dan Museum',
        ];
    }
}
