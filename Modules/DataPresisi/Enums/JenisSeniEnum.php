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
 * Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
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
 * @copyright Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

namespace Modules\DataPresisi\Enums;

use App\Enums\BaseEnum;

class JenisSeniEnum extends BaseEnum
{
    public const RUPA               = 1;
    public const PERTUNJUKAN               = 2;
    public const DESAIN               = 3;
    public const KERAJINAN    = 4;
    public const PEKERJAAN_LAINNYA    = 5;
    public const TIDAK_MEMILIKI    = 6;

    /**
     * Override method all()
     */
    public static function all(): array
    {
        return [
            self::RUPA               => 'Seni Rupa',
            self::PERTUNJUKAN               => 'Seni Pertunjukan',
            self::DESAIN               => 'Desain',
            self::KERAJINAN               => 'Kerajinan',
            self::PEKERJAAN_LAINNYA               => 'Kesenian Lainnya',
            self::TIDAK_MEMILIKI               => 'Tidak Memiliki',
        ];
    }

    public static function subItems(): array
    {
        return [
            self::RUPA => [
                'Pelukis',
                'Seniman Patung',
                'Desainer Grafis',
                'Ilustrator',
                'Fotografer',
                'Kurator',
            ],
            self::PERTUNJUKAN => [
                'Penyanyi',
                'Musisi',
                'Penari',
                'Aktor/Aktris',
                'Gamelan',
                'Kekawin'
            ],
            self::DESAIN => [
                'Desainer Interior',
                'Desainer Produk',
                'Perancang Busana',
                'Desainer Website',
            ],
            self::KERAJINAN => [
                'Pembuat Aksesoris Kulit',
                'Pengukir',
                'Pandai Besi',
                'Pembatik',
                'Penjahit',
            ],
            self::PEKERJAAN_LAINNYA => [
                'Guru Seni',
                'Art Director',
            ],
        ];
    }

    public static function getSubItemsByJenis(int $jenis): array
    {
        return self::subItems()[$jenis] ?? [];
    }
}
