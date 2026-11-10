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

class SaranaWisataEnum extends BaseEnum
{
   public const BILYAR                               = 612;
   public const BIOSKOP                              = 616;
   public const DISKOTIK                             = 611;
   public const HOTEL_BINTANG_1                      = 609;
   public const HOTEL_BINTANG_2                      = 608;
   public const HOTEL_BINTANG_3                      = 607;
   public const HOTEL_BINTANG_4                      = 606;
   public const HOTEL_BINTANG_5                      = 605;
   public const HOTEL_MELATI                         = 610;
   public const JUMLAH_TEMPAT_WISATA                 = 604;
   public const KARAOKE                              = 613;
   public const MUSEUM                               = 614;
   public const PRASARANA_HIBURAN_DAN_WISATA_LAINNYA = 2203;
   public const RESTORAN                             = 615;

    public static function all(): array
    {
        return [
            self::BILYAR                               => 'Bilyar',
            self::BIOSKOP                              => 'Bioskop',
            self::DISKOTIK                             => 'Diskotik',
            self::HOTEL_BINTANG_1                      => 'Hotel bintang 1',
            self::HOTEL_BINTANG_2                      => 'Hotel bintang 2',
            self::HOTEL_BINTANG_3                      => 'Hotel bintang 3',
            self::HOTEL_BINTANG_4                      => 'Hotel bintang 4',
            self::HOTEL_BINTANG_5                      => 'Hotel bintang 5',
            self::HOTEL_MELATI                         => 'Hotel melati',
            self::JUMLAH_TEMPAT_WISATA                 => 'Jumlah Tempat Wisata',
            self::KARAOKE                              => 'Karaoke',
            self::MUSEUM                               => 'Museum',
            self::PRASARANA_HIBURAN_DAN_WISATA_LAINNYA => 'Prasarana Hiburan dan Wisata Lainnya',
            self::RESTORAN                             => 'Restoran',
        ];
    }
}
