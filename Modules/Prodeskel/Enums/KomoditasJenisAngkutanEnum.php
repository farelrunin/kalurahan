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

class KomoditasJenisAngkutanEnum extends BaseEnum
{
    // Angkutan Darat
    public const ANTAR_KOTA_PROVINSI             = 347;
    public const PEMILIK_ANGKUTAN_DESA_PERKOTAAN = 346;

    // Angkutan Sungai
    public const JUMLAH_ANGKUTAN_JETBOAT                                     = 350;
    public const JUMLAH_ANGKUTAN_SUNGAI_10_100                               = 353;
    public const JUMLAH_ANGKUTAN_SUNGAI_100_500                              = 354;
    public const JUMLAH_ANGKUTAN_SUNGAI_KURANG_10_KURSI                      = 352;
    public const JUMLAH_PEMILIK_ANGKUTAN_PENUMPANG_SUNGAI_KAPASITAS_10_ORANG = 351;

    // Angkutan Laut
    public const JUMLAH_PEMILIK_PERAHU_MOTOR_KLOTOK                = 348;
    public const JET_FOIL                                          = 357;
    public const JUMLAH_PEMILIK_JET_BOAT                           = 355;
    public const JUMLAH_PEMILIK_PERAHU_JENIS_FERRY_KAPAL_PENUMPANG = 356;

    // Angkutan Udara
    public const JUMLAH_PEMILIK_PESAWAT_JENIS_RINGAN_HELIKOPTER = 358;

    public static function all(): array
    {
        return self::darat() + self::sungai() + self::laut() + self::udara() + self::ekspedisi();
    }

    public static function allMap(): array
    {
        return [
            KomoditasKategoriPengangkutanEnum::DARAT     => self::darat(),
            KomoditasKategoriPengangkutanEnum::SUNGAI    => self::sungai(),
            KomoditasKategoriPengangkutanEnum::LAUT      => self::laut(),
            KomoditasKategoriPengangkutanEnum::UDARA     => self::udara(),
            KomoditasKategoriPengangkutanEnum::EKSPEDISI => self::ekspedisi(),
        ];
    }

    public static function darat()
    {
        return [
            self::ANTAR_KOTA_PROVINSI             => 'Angkutan Antar Kota/Provinsi',
            self::PEMILIK_ANGKUTAN_DESA_PERKOTAAN => 'Jumlah pemilik Angkutan Desa/Perkotaan',
        ];
    }

    public static function sungai()
    {
        return [
            self::JUMLAH_ANGKUTAN_JETBOAT                                     => 'Jumlah angkutan jetboat',
            self::JUMLAH_ANGKUTAN_SUNGAI_10_100                               => 'Jumlah angkutan sungai yang kapasitas antara 10 - 100',
            self::JUMLAH_ANGKUTAN_SUNGAI_100_500                              => 'Jumlah angkutan sungai yang kapasitas antara 100 - 500',
            self::JUMLAH_ANGKUTAN_SUNGAI_KURANG_10_KURSI                      => 'Jumlah angkutan sungai yang kapasitas kurang dari 10 kursi',
            self::JUMLAH_PEMILIK_ANGKUTAN_PENUMPANG_SUNGAI_KAPASITAS_10_ORANG => 'Jumlah Pemilik Angkutan Penumpang Sungai dgn kapasitas lebih dari 10 orang',
        ];
    }

    public static function laut()
    {
        return [
            self::JUMLAH_PEMILIK_JET_BOAT                           => 'Jumlah pemilik Jet boat',
            self::JUMLAH_PEMILIK_PERAHU_MOTOR_KLOTOK                => 'Jumlah Pemilik Perahu Motor/Klotok atau sejenisnya',
            self::JET_FOIL                                          => 'Jet Foil',
            self::JUMLAH_PEMILIK_JET_BOAT                           => 'Jumlah pemilik Jet boat',
            self::JUMLAH_PEMILIK_PERAHU_JENIS_FERRY_KAPAL_PENUMPANG => 'Jumlah Pemilik Perahu Jenis Ferry/Kapal penumpang',
        ];
    }

    public static function udara()
    {
        return [
            self::JUMLAH_PEMILIK_PESAWAT_JENIS_RINGAN_HELIKOPTER => 'Jumlah pemilik pesawat jenis ringan/helikopter',
        ];
    }

    public static function ekspedisi()
    {
        return [
            self::JUMLAH_PEMILIK_PESAWAT_JENIS_RINGAN_HELIKOPTER => 'Jumlah pemilik pesawat jenis ringan/helikopter',
        ];
    }
}
