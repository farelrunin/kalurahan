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

class JenisPrasaranaTransportasiDaratEnum extends BaseEnum
{
    // desa
    public const I_PANJANG_JALAN_ASPAL               = 473;
    public const I_PANJANG_JALAN_MAKADAM             = 474;
    public const I_PANJANG_JALAN_TANAH               = 475;
    public const I_PANJANG_JALAN_SIRTU               = 476;
    public const I_PANJANG_JALAN_KONBLOK_SEMEN_BETON = 477;

    // kecamatan
    public const II_PANJANG_JALAN_ASPAL               = 479;
    public const II_PANJANG_JALAN_MAKADAM             = 480;
    public const II_PANJANG_JALAN_TANAH               = 481;
    public const II_PANJANG_JALAN_SIRTU               = 482;
    public const II_PANJANG_JALAN_KONBLOK_SEMEN_BETON = 483;

    // kabupaten
    public const III_PANJANG_JALAN_ASPAL               = 485;
    public const III_PANJANG_JALAN_MAKADAM             = 486;
    public const III_PANJANG_JALAN_TANAH               = 487;
    public const III_PANJANG_JALAN_SIRTU               = 488;
    public const III_PANJANG_JALAN_KONBLOK_SEMEN_BETON = 489;

    // provinsi
    public const IV_PANJANG_JALAN_ASPAL               = 491;
    public const IV_PANJANG_JALAN_MAKADAM             = 492;
    public const IV_PANJANG_JALAN_TANAH               = 493;
    public const IV_PANJANG_JALAN_SIRTU               = 494;
    public const IV_PANJANG_JALAN_KONBLOK_SEMEN_BETON = 495;

    // negara
    public const V_PANJANG_JALAN_ASPAL               = 497;
    public const V_PANJANG_JALAN_MAKADAM             = 498;
    public const V_PANJANG_JALAN_TANAH               = 499;
    public const V_PANJANG_JALAN_SIRTU               = 500;
    public const V_PANJANG_JALAN_KONBLOK_SEMEN_BETON = 501;

    // jembatan
    public const JUMLAH_JEMBATAN_BETON = 503;
    public const JUMLAH_JEMBATAN_BESI  = 504;
    public const JUMLAH_JEMBATAN_KAYU  = 505;

    // angkutan
    public const JUMLAH_PANGKALAN_OJEK = 507;
    public const JUMLAH_STASIUN_KA     = 508;
    public const TERMINAL_BIS_ANGKUTAN = 509;

    public static function all(): array
    {
        return self::desa() + self::kecamatan() + self::kabupaten() + self::provinsi() + self::negara() + self::jembatan() + self::angkutan();
    }

    public static function allMap(): array
    {
        return [
            SaranaTransportasiDaratEnum::JALAN_DESA_KELURAHAN       => self::desa(),
            SaranaTransportasiDaratEnum::JALAN_ANTAR_DESA_KECAMATAN => self::kecamatan(),
            SaranaTransportasiDaratEnum::JALAN_KABUPATEN_KOTA       => self::kabupaten(),
            SaranaTransportasiDaratEnum::JALAN_PROVINSI             => self::provinsi(),
            SaranaTransportasiDaratEnum::JALAN_NEGARA               => self::negara(),
            SaranaTransportasiDaratEnum::JEMBATAN                   => self::jembatan(),
            SaranaTransportasiDaratEnum::PRASARANA_ANGKUTAN_DARAT   => self::angkutan(),
        ];
    }

    public static function desa(): array
    {
        return [
            self::I_PANJANG_JALAN_ASPAL               => '1.1 Panjang jalan aspal',
            self::I_PANJANG_JALAN_MAKADAM             => '1.2 Panjang jalan makadam',
            self::I_PANJANG_JALAN_TANAH               => '1.3 Panjang jalan tanah',
            self::I_PANJANG_JALAN_SIRTU               => '1.4 Panjang jalan sirtu',
            self::I_PANJANG_JALAN_KONBLOK_SEMEN_BETON => '1.5 Panjang jalan konblok/semen/beton',
        ];
    }

    public static function kecamatan(): array
    {
        return [
            self::II_PANJANG_JALAN_ASPAL               => '2.1 Panjang jalan aspal',
            self::II_PANJANG_JALAN_MAKADAM             => '2.2 Panjang jalan makadam',
            self::II_PANJANG_JALAN_TANAH               => '2.3 Panjang jalan tanah',
            self::II_PANJANG_JALAN_SIRTU               => '2.4 Panjang jalan sirtu',
            self::II_PANJANG_JALAN_KONBLOK_SEMEN_BETON => '2.5 Panjang jalan konblok/semen/beton',
        ];
    }

    public static function kabupaten(): array
    {
        return [
            self::III_PANJANG_JALAN_ASPAL               => '3.1 Panjang jalan aspal',
            self::III_PANJANG_JALAN_MAKADAM             => '3.2 Panjang jalan makadam',
            self::III_PANJANG_JALAN_TANAH               => '3.3 Panjang jalan tanah',
            self::III_PANJANG_JALAN_SIRTU               => '3.4 Panjang jalan sirtu',
            self::III_PANJANG_JALAN_KONBLOK_SEMEN_BETON => '3.5 Panjang jalan konblok/semen/beton',
        ];
    }

    public static function provinsi(): array
    {
        return [
            self::IV_PANJANG_JALAN_ASPAL               => '4.1 Panjang jalan aspal',
            self::IV_PANJANG_JALAN_MAKADAM             => '4.2 Panjang jalan makadam',
            self::IV_PANJANG_JALAN_TANAH               => '4.3 Panjang jalan tanah',
            self::IV_PANJANG_JALAN_SIRTU               => '4.4 Panjang jalan sirtu',
            self::IV_PANJANG_JALAN_KONBLOK_SEMEN_BETON => '4.5 Panjang jalan konblok/semen/beton',
        ];
    }

    public static function negara(): array
    {
        return [
            self::V_PANJANG_JALAN_ASPAL               => '5.1 Panjang jalan aspal',
            self::V_PANJANG_JALAN_MAKADAM             => '5.2 Panjang jalan makadam',
            self::V_PANJANG_JALAN_TANAH               => '5.3 Panjang jalan tanah',
            self::V_PANJANG_JALAN_SIRTU               => '5.4 Panjang jalan sirtu',
            self::V_PANJANG_JALAN_KONBLOK_SEMEN_BETON => '5.5 Panjang jalan konblok/semen/beton',
        ];
    }

    public static function jembatan(): array
    {
        return [
            self::JUMLAH_JEMBATAN_BETON => '6.1 Jumlah jembatan beton',
            self::JUMLAH_JEMBATAN_BESI  => '6.2 Jumlah jembatan besi',
            self::JUMLAH_JEMBATAN_KAYU  => '6.3 Jumlah jembatan kayu',
        ];
    }

    public static function angkutan(): array
    {
        return [
            self::JUMLAH_PANGKALAN_OJEK => '7.1 Jumlah pangkalan ojek',
            self::JUMLAH_STASIUN_KA     => '7.2 Jumlah stasiun KA',
            self::TERMINAL_BIS_ANGKUTAN => '7.3 Terminal bis/angkutan pedesaan/perkotaan',
        ];
    }
}
