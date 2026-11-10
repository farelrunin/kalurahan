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

class JenisJasaHiburanEnum extends BaseEnum
{
    // perdagangan
    public const INDUSTRI_CAROSERI_CAT_MOBIL         = 379;
    public const INDUSTRI_FARMASI                    = 378;
    public const INDUSTRI_PENYAMAKAN_KULIT           = 380;
    public const INDUSTRI_PERAKITAN_ELEKTRONIK       = 382;
    public const JUMLAH_USAHA_TOKO_KIOS              = 370;
    public const PASAR_BULANAN                       = 368;
    public const PASAR_HASIL_BUMI_TRADISIONAL_HARIAN = 366;
    public const PASAR_KAGET_PASAR_KHUSUS            = 369;
    public const PASAR_MINGGUAN                      = 367;
    public const PENGOLAHAN_KAYU                     = 383;
    public const PENITIPAN_KENDARAAN_BERMOTOR        = 381;
    public const SWALAYAN                            = 371;
    public const TOKO_KELONTONG                      = 373;
    public const USAHA_MINUMAN                       = 377;
    public const USAHA_PERBENGKELAN                  = 2263;
    public const USAHA_PERIKANAN                     = 375;
    public const USAHA_PERKEBUNAN                    = 376;
    public const USAHA_PETERNAKAN                    = 374;
    public const WARUNG_SERBA_ADA                    = 372;

    // hiburan
    public const BIOSKOP                             = 384;
    public const FILM_KELILING                       = 385;
    public const GROUP_LAWAK                         = 387;
    public const GROUP_MUSIK_BAND                    = 390;
    public const GROUP_VOKAL_PADUAN_SUARA            = 391;
    public const SANDIWARA_DRAMA                     = 386;
    public const SIRKUS_KELILING_TOPENG_MONYET_ONDEL = 388;
    public const WAYANG_ORANG_WAYANG_GOLEK           = 389;

    // bbm
    public const PANGKALAN_MINYAK_TANAH              = 394;
    public const PENGECER_GAS_DAN_BAHAN_BAKAR_MINYAK = 395;
    public const SPBU                                = 393;
    public const USAHA_AIR_MINUM_KEMASAN_ISI_ULANG   = 396;
    public const USAHA_PENYEWAAN_TENAGA_LISTRIK      = 392;

    // keterampilan
    public const TUKANG_BATU                  = 398;
    public const TUKANG_BESI                  = 402;
    public const TUKANG_CUKUR                 = 400;
    public const TUKANG_GALI_SUMUR            = 403;
    public const TUKANG_JAHIT_BORDIR          = 399;
    public const TUKANG_KAYU                  = 397;
    public const TUKANG_PIJAT_URUT_PENGOBATAN = 404;
    public const TUKANG_SERVICE_ELEKTRONIK    = 401;

    // konsultan
    public const KONSULTAN_MANAJEMEN        = 407;
    public const KONSULTAN_TEKNIS           = 408;
    public const NOTARIS                    = 405;
    public const PEJABAT_PEMBUAT_AKTA_TANAH = 409;
    public const PENGACARA_ADVOKAT          = 406;

    // penginapan
    public const ASRAMA          = 412;
    public const HOME_STAY       = 417;
    public const HOTEL           = 416;
    public const KONTRAKAN_RUMAH = 414;
    public const LOSMEN          = 410;
    public const MESS            = 415;
    public const PERSEWAAN_KAMAR = 413;
    public const TOWN_HOUSE      = 419;
    public const VILLA           = 418;
    public const WISMA           = 411;

    public static function all(): array
    {
        return self::perdagangan() + self::hiburan() + self::bbm() + self::keterampilan() + self::konsultan() + self::penginapan();
    }

    public static function allMap(): array
    {
        return [
            KomoditasJasaHiburanEnum::USAHA_JASA_DAN_PERDAGANGAN         => self::perdagangan(),
            KomoditasJasaHiburanEnum::USAHA_JASA_HIBURAN                 => self::hiburan(),
            KomoditasJasaHiburanEnum::USAHA_JASA_GAS_LISTRIK_BBM_DAN_AIR => self::bbm(),
            KomoditasJasaHiburanEnum::USAHA_JASA_KETERAMPILAN            => self::keterampilan(),
            KomoditasJasaHiburanEnum::USAHA_JASA_HUKUM_DAN_KONSULTANSI   => self::konsultan(),
            KomoditasJasaHiburanEnum::USAHA_JASA_PENGINAPAN              => self::penginapan(),
        ];
    }

    public static function perdagangan(): array
    {
        return [
            self::INDUSTRI_CAROSERI_CAT_MOBIL         => 'Industri Caroseri/cat mobil',
            self::INDUSTRI_FARMASI                    => 'Industri Farmasi',
            self::INDUSTRI_PENYAMAKAN_KULIT           => 'Industri Penyamakan Kulit',
            self::INDUSTRI_PERAKITAN_ELEKTRONIK       => 'Industri Perakitan Elektronik',
            self::JUMLAH_USAHA_TOKO_KIOS              => 'Jumlah Usaha Toko/Kios',
            self::PASAR_BULANAN                       => 'Pasar Bulanan',
            self::PASAR_HASIL_BUMI_TRADISIONAL_HARIAN => 'Pasar Hasil Bumi/Tradisonal/Harian',
            self::PASAR_KAGET_PASAR_KHUSUS            => 'Pasar Kaget/Pasar Khusus (mis. Psr Ternak, dll)',
            self::PASAR_MINGGUAN                      => 'Pasar Mingguan',
            self::PENGOLAHAN_KAYU                     => 'Pengolahan Kayu',
            self::PENITIPAN_KENDARAAN_BERMOTOR        => 'Penitipan Kendaraan Bermotor',
            self::SWALAYAN                            => 'Swalayan',
            self::TOKO_KELONTONG                      => 'Toko Kelontong',
            self::USAHA_MINUMAN                       => 'Usaha Minuman (kemasan, dll)',
            self::USAHA_PERBENGKELAN                  => 'Usaha Perbengkelan',
            self::USAHA_PERIKANAN                     => 'Usaha Perikanan',
            self::USAHA_PERKEBUNAN                    => 'Usaha Perkebunan',
            self::USAHA_PETERNAKAN                    => 'Usaha Peternakan',
            self::WARUNG_SERBA_ADA                    => 'Warung Serba Ada',
        ];
    }

    public static function hiburan(): array
    {
        return [
            self::BIOSKOP                             => 'Bioskop',
            self::FILM_KELILING                       => 'Film Keliling',
            self::GROUP_LAWAK                         => 'Group Lawak',
            self::GROUP_MUSIK_BAND                    => 'Group Musik/Band',
            self::GROUP_VOKAL_PADUAN_SUARA            => 'Group Vokal/Paduan Suara',
            self::SANDIWARA_DRAMA                     => 'Sandiwara/Drama',
            self::SIRKUS_KELILING_TOPENG_MONYET_ONDEL => 'Sirkus Keliling/Topeng monyet/Ondel-ondel, dll',
            self::WAYANG_ORANG_WAYANG_GOLEK           => 'Wayang Orang/Wayang Golek',
        ];
    }

    public static function bbm(): array
    {
        return [
            self::PANGKALAN_MINYAK_TANAH              => 'Pangkalan Minyak Tanah',
            self::PENGECER_GAS_DAN_BAHAN_BAKAR_MINYAK => 'Pengecer Gas dan Bahan Bakar Minyak',
            self::SPBU                                => 'SPBU',
            self::USAHA_AIR_MINUM_KEMASAN_ISI_ULANG   => 'Usaha air minum kemasan/isi ulang',
            self::USAHA_PENYEWAAN_TENAGA_LISTRIK      => 'Usaha Penyewaan Tenaga Listrik',
        ];
    }

    public static function keterampilan(): array
    {
        return [
            self::TUKANG_BATU                  => 'Tukang Batu',
            self::TUKANG_BESI                  => 'Tukang Besi',
            self::TUKANG_CUKUR                 => 'Tukang Cukur',
            self::TUKANG_GALI_SUMUR            => 'Tukang Gali Sumur',
            self::TUKANG_JAHIT_BORDIR          => 'Tukang Jahit/Bordir',
            self::TUKANG_KAYU                  => 'Tukang Kayu',
            self::TUKANG_PIJAT_URUT_PENGOBATAN => 'Tukang Pijat/Urut/Pengobatan',
            self::TUKANG_SERVICE_ELEKTRONIK    => 'Tukang Service Elektronik',
        ];
    }

    public static function konsultan(): array
    {
        return [
            self::KONSULTAN_MANAJEMEN        => 'Konsultan Manajemen',
            self::KONSULTAN_TEKNIS           => 'Konsultan Teknis',
            self::NOTARIS                    => 'Notaris',
            self::PEJABAT_PEMBUAT_AKTA_TANAH => 'Pejabat Pembuat Akta Tanah',
            self::PENGACARA_ADVOKAT          => 'Pengacara/Advokat',
        ];
    }

    public static function penginapan(): array
    {
        return [
            self::ASRAMA          => 'Asrama',
            self::HOME_STAY       => 'Home Stay',
            self::HOTEL           => 'Hotel',
            self::KONTRAKAN_RUMAH => 'Kontrakan Rumah',
            self::LOSMEN          => 'Losmen',
            self::MESS            => 'Mess',
            self::PERSEWAAN_KAMAR => 'Persewaan Kamar',
            self::TOWN_HOUSE      => 'Town House',
            self::VILLA           => 'Villa',
            self::WISMA           => 'Wisma',
        ];
    }
}
