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

class JenisLembagaEkonomiEnum extends BaseEnum
{
    // lembaga ekonomi
    public const BUMDES                 = 328;
    public const KELOMPOK_SIMPAN_PINJAM = 327;
    public const KOPERASI_SIMPAN_PINJAM = 326;
    public const KOPERASI_UNIT_DESA     = 325;

    // lembaga keuangan
    public const BANK_PEMERINTAH           = 333;
    public const BANK_PERKREDITAN_RAKYAT   = 331;
    public const JASA_ASURANSI             = 329;
    public const LEMBAGA_KEUANGAN_NON_BANK = 330;
    public const PEGADAIAN                 = 332;

    // industri kecil dan menengah
    public const INDUSTRI_ALAT_PERTANIAN          = 338;
    public const INDUSTRI_ALAT_RUMAH_TANGGA       = 335;
    public const INDUSTRI_KERAJINAN               = 339;
    public const INDUSTRI_MAKANAN                 = 334;
    public const INDUSTRI_MATERIAL_BAHAN_BANGUNAN = 336;
    public const RUMAH_MAKAN_DAN_RESTORAN         = 340;

    public static function all(): array
    {
        return self::ekonomi() + self::keuangan() + self::industri();
    }

    public static function allMap(): array
    {
        return [
            KomoditasLembagaEkonomiEnum::EKONOMI_UNIT_USAHA      => self::ekonomi(),
            KomoditasLembagaEkonomiEnum::LEMBAGA_KEUANGAN        => self::keuangan(),
            KomoditasLembagaEkonomiEnum::INDUSTRI_KECIL_MENENGAH => self::industri(),
        ];
    }

    public static function ekonomi(): array
    {
        return [
            self::BUMDES                 => 'Bumdes',
            self::KELOMPOK_SIMPAN_PINJAM => 'Kelompok Simpan Pinjam',
            self::KOPERASI_SIMPAN_PINJAM => 'Koperasi Simpan Pinjam',
            self::KOPERASI_UNIT_DESA     => 'Koperasi Unit Desa',
        ];
    }

    public static function keuangan(): array
    {
        return [
            self::BANK_PEMERINTAH           => 'Bank Pemerintah',
            self::BANK_PERKREDITAN_RAKYAT   => 'Bank Perkreditan Rakyat',
            self::JASA_ASURANSI             => 'Jasa Asuransi',
            self::LEMBAGA_KEUANGAN_NON_BANK => 'Lembaga Keuangan Non Bank',
            self::PEGADAIAN                 => 'Pegadaian',
        ];
    }

    public static function industri(): array
    {
        return [
            self::INDUSTRI_ALAT_PERTANIAN          => 'Industri Alat Pertanian',
            self::INDUSTRI_ALAT_RUMAH_TANGGA       => 'Industri Alat Rumah Tangga',
            self::INDUSTRI_KERAJINAN               => 'Industri Kerajinan',
            self::INDUSTRI_MAKANAN                 => 'Industri Makanan',
            self::INDUSTRI_MATERIAL_BAHAN_BANGUNAN => 'Industri Material Bahan Bangunan',
            self::RUMAH_MAKAN_DAN_RESTORAN         => 'Rumah makan dan restoran',
        ];
    }
}
