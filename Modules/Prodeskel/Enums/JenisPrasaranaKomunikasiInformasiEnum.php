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

class JenisPrasaranaKomunikasiInformasiEnum extends BaseEnum
{
    // telepon
    public const JUMLAH_PELANGGAN_CDMA            = 539;
    public const JUMLAH_PELANGGAN_GSM             = 538;
    public const JUMLAH_PELANGGAN_TELKOM          = 537;
    public const SINYAL_TELEPON_SELULER_HANDPHONE = 540;
    public const TELEPON_UMUM                     = 534;
    public const WARNET                           = 536;
    public const WARTEL                           = 535;

    // kantor pos
    public const KANTOR_POS          = 541;
    public const KANTOR_POS_PEMBANTU = 542;
    public const TUKANG_POS          = 543;

    // radio tv
    public const JUMLAH_PARABOLA = 547;
    public const JUMLAH_RADIO    = 545;
    public const JUMLAH_TV       = 546;
    public const TV_UMUM         = 544;

    // koran majalan bulletin
    public const KORAN_SURAT_KABAR   = 548;
    public const MAJALAH             = 549;
    public const PAPAN_IKLAN_REKLAME = 550;
    public const PAPAN_PENGUMUMAN    = 551;

    public static function all(): array
    {
        return self::telepon()
           + self::kantor_pos()
           + self::radio_tv()
           + self::koran_majalah_bulletin();
    }

    public static function allMap(): array
    {
        return [
            SaranaKomunikasiInformasiEnum::TELEPON                => self::telepon(),
            SaranaKomunikasiInformasiEnum::KANTOR_POS             => self::kantor_pos(),
            SaranaKomunikasiInformasiEnum::RADIO_TV               => self::radio_tv(),
            SaranaKomunikasiInformasiEnum::KORAN_MAJALAH_BULLETIN => self::koran_majalah_bulletin(),
        ];
    }

    public static function telepon(): array
    {
        return [
            self::JUMLAH_PELANGGAN_CDMA            => 'Jumlah Pelanggan CDMA',
            self::JUMLAH_PELANGGAN_GSM             => 'Jumlah Pelanggan GSM',
            self::JUMLAH_PELANGGAN_TELKOM          => 'Jumlah Pelanggan Telkom',
            self::SINYAL_TELEPON_SELULER_HANDPHONE => 'Sinyal Telepon Seluler/Handphone',
            self::TELEPON_UMUM                     => 'Telepon umum',
            self::WARNET                           => 'Warnet',
            self::WARTEL                           => 'Wartel',
        ];
    }

    public static function kantor_pos(): array
    {
        return [
            self::KANTOR_POS          => 'Kantor pos',
            self::KANTOR_POS_PEMBANTU => 'Kantor pos pembantu',
            self::TUKANG_POS          => 'Tukang pos',
        ];
    }

    public static function radio_tv(): array
    {
        return [
            self::JUMLAH_PARABOLA => 'Jumlah parabola',
            self::JUMLAH_RADIO    => 'Jumlah radio',
            self::JUMLAH_TV       => 'Jumlah TV',
            self::TV_UMUM         => 'TV umum',
        ];
    }

    public static function koran_majalah_bulletin(): array
    {
        return [
            self::KORAN_SURAT_KABAR   => 'Koran/surat kabar',
            self::MAJALAH             => 'Majalah',
            self::PAPAN_IKLAN_REKLAME => 'Papan iklan/reklame',
            self::PAPAN_PENGUMUMAN    => 'Papan pengumuman',
        ];
    }
}
