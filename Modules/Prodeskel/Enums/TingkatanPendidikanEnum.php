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

class TingkatanPendidikanEnum extends BaseEnum
{
    // formal
    public const FORMAL_PLAY_GROUP       = 423;
    public const FORMAL_TK               = 424;
    public const FORMAL_SD               = 430;
    public const FORMAL_SMP              = 443;
    public const FORMAL_SMA              = 444;
    public const FORMAL_PERGURUAN_TINGGI = 452;
    public const FORMAL_SLB_A            = 2238;
    public const FORMAL_SLB_B            = 2239;
    public const FORMAL_SLB_C            = 2240;

    // islam
    public const ISLAM_RAUDHATUL_ATHFAL = 432;
    public const ISLAM_IBTIDAYAH        = 433;
    public const ISLAM_TSANAWIYAH       = 434;
    public const ISLAM_ALIYAH           = 435;
    public const ISLAM_PONPES           = 436;

    // katholik
    public const KATHOLIK_SEMINARI_MENENGAH = 439;
    public const KATHOLIK_SEMINARI_TINGGI   = 440;
    public const KATHOLIK_BIARA             = 441;
    public const KATHOLIK_SD                = 2260;
    public const KATHOLIK_SMP               = 2261;
    public const KATHOLIK_SMA               = 2262;

    // protestan
    public const PROTESTAN_SEKOLAH_PROTESTAN = 448;

    // hindhu
    public const HINDU_SEKOLAH_HINDU = 454;

    // budha
    public const BUDHA_SEKOLAH_BUDHA = 447;

    // konghuchu
    public const KONGHUCU_SEKOLAH_KONGHUCU = 455;

    // non formal
    public const NONFORMAL_KOMPUTER   = 456;
    public const NONFORMAL_SENI_MUSIK = 457;
    public const NONFORMAL_MONTIR     = 458;
    public const NONFORMAL_MENJAHIT   = 459;
    public const NONFORMAL_DRAFTER    = 460;
    public const NONFORMAL_BAHASA     = 461;
    public const NONFORMAL_MESIN      = 462;
    public const NONFORMAL_SATPAM     = 463;
    public const NONFORMAL_BELADIRI   = 464;
    public const NONFORMAL_MENGEMUDI  = 465;
    public const NONFORMAL_KECANTIKAN = 466;

    public static function all(): array
    {
        return self::formal() + self::islam() + self::katholik() + self::protestan() + self::hindu() + self::budha() + self::konghuchu() + self::nonformal();
    }

    public static function allMap(): array
    {
        return [
            KomoditasLembagaPendidikanEnum::FORMAL    => self::formal(),
            KomoditasLembagaPendidikanEnum::ISLAM     => self::islam(),
            KomoditasLembagaPendidikanEnum::KATHOLIK  => self::katholik(),
            KomoditasLembagaPendidikanEnum::PROTESTAN => self::protestan(),
            KomoditasLembagaPendidikanEnum::HINDHU    => self::hindu(),
            KomoditasLembagaPendidikanEnum::BUDHA     => self::budha(),
            KomoditasLembagaPendidikanEnum::KONGHUCHU => self::konghuchu(),
            KomoditasLembagaPendidikanEnum::NONFORMAL => self::nonformal(),
        ];
    }

    public static function formal(): array
    {
        return [
            self::FORMAL_PLAY_GROUP       => 'Play Group',
            self::FORMAL_TK               => 'TK',
            self::FORMAL_SD               => 'SD',
            self::FORMAL_SMP              => 'SMP',
            self::FORMAL_SMA              => 'SMA',
            self::FORMAL_PERGURUAN_TINGGI => 'Perguruan Tinggi',
            self::FORMAL_SLB_A            => 'SLB A',
            self::FORMAL_SLB_B            => 'SLB B',
            self::FORMAL_SLB_C            => 'SLB C',
        ];
    }

    public static function islam(): array
    {
        return [
            self::ISLAM_RAUDHATUL_ATHFAL => 'Raudhatul Athfal',
            self::ISLAM_IBTIDAYAH        => 'Ibtidayah',
            self::ISLAM_TSANAWIYAH       => 'Tsanawiyah',
            self::ISLAM_ALIYAH           => 'Aliyah',
            self::ISLAM_PONPES           => 'Ponpes',
        ];
    }

    public static function katholik(): array
    {
        return [
            self::KATHOLIK_SEMINARI_MENENGAH => 'Seminari Menengah',
            self::KATHOLIK_SEMINARI_TINGGI   => 'Seminari Tinggi',
            self::KATHOLIK_BIARA             => 'Biara',
            self::KATHOLIK_SD                => 'SD',
            self::KATHOLIK_SMP               => 'SMP',
            self::KATHOLIK_SMA               => 'SMA',
        ];
    }

    public static function protestan(): array
    {
        return [
            self::PROTESTAN_SEKOLAH_PROTESTAN => 'Sekolah Protestan',
        ];
    }

    public static function hindu(): array
    {
        return [
            self::HINDU_SEKOLAH_HINDU => 'Sekolah Hindu',
        ];
    }

    public static function budha(): array
    {
        return [
            self::BUDHA_SEKOLAH_BUDHA => 'Sekolah Budha',
        ];
    }

    public static function konghuchu(): array
    {
        return [
            self::KONGHUCU_SEKOLAH_KONGHUCU => 'Sekolah Konghuchu',
        ];
    }

    public static function nonformal(): array
    {
        return [
            self::NONFORMAL_KOMPUTER   => 'Komputer',
            self::NONFORMAL_SENI_MUSIK => 'Seni Musik',
            self::NONFORMAL_MONTIR     => 'Montir',
            self::NONFORMAL_MENJAHIT   => 'Menjahit',
            self::NONFORMAL_DRAFTER    => 'Drafter',
            self::NONFORMAL_BAHASA     => 'Bahasa',
            self::NONFORMAL_MESIN      => 'Mesin',
            self::NONFORMAL_SATPAM     => 'Satpam',
            self::NONFORMAL_BELADIRI   => 'Beladiri',
            self::NONFORMAL_MENGEMUDI  => 'Mengemudi',
            self::NONFORMAL_KECANTIKAN => 'Kecantikan',
        ];
    }
}
