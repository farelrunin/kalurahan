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

class KepemilikanAsetEnum extends BaseEnum
{
    public const HELIKOPTER                   = 269;
    public const KAPAL_BARANG                 = 266;
    public const KAPAL_PENUMPANG              = 267;
    public const KAPAL_PESIAR                 = 268;
    public const MOBIL                        = 264;
    public const PERAHU_BERMOTOR              = 265;
    public const PERUSAHAAN_INDUSTRI_MENENGAH = 280;
    public const PERUSAHAAN_INDUSTRI_BESAR    = 279;
    public const PERUSAHAAN_INDUSTRI_KECIL    = 281;
    public const PESAWAT_TERBANG              = 270;
    public const SEPEDA_MOTOR                 = 263;
    public const TERNAK_BESAR                 = 271;
    public const TERNAK_KECIL                 = 272;
    public const TV_ELEKTRONIK                = 262;
    public const USAHA_PASAR_DESA             = 288;
    public const USAHA_PASAR_SWALAYAN         = 286;
    public const USAHA_PASAR_TRADISIONAL      = 287;
    public const USAHA_PERIKANAN              = 282;
    public const USAHA_PERKEBUNAN             = 284;
    public const USAHA_PETERNAKAN             = 283;
    public const USAHA_TRANSPORTASI           = 289;
    public const ASET_TELEKOMUNIKASI          = 290;
    public const BUKU_SURAT_BERHARGA          = 275;
    public const BUKU_TABUNGAN_BANK           = 274;
    public const HIASAN_EMAS_BERLIAN          = 273;
    public const SAHAM_PERUSAHAAN             = 291;
    public const SERTIFIKAT_BANGUNAN          = 278;
    public const SERTIFIKAT_DEPOSITO          = 276;
    public const SERTIFIKAT_TANAH             = 277;

    public static function all(): array
    {
        return [
            self::HELIKOPTER                   => 'Jumlah keluarga memiliki helikopter',
            self::KAPAL_BARANG                 => 'Jumlah keluarga memiliki kapal barang',
            self::KAPAL_PENUMPANG              => 'Jumlah keluarga memiliki kapal penumpang',
            self::KAPAL_PESIAR                 => 'Jumlah keluarga memiliki kapal pesiar',
            self::MOBIL                        => 'Jumlah keluarga memiliki mobil dan sejenisnya',
            self::PERAHU_BERMOTOR              => 'Jumlah keluarga memiliki perahu bermotor',
            self::PERUSAHAAN_INDUSTRI_MENENGAH => 'Jumlah keluarga memiliki perusahaan industri menengah',
            self::PERUSAHAAN_INDUSTRI_BESAR    => 'Jumlah keluarga memiliki perusahaan industri besar',
            self::PERUSAHAAN_INDUSTRI_KECIL    => 'Jumlah keluarga memiliki perusahaan industri kecil',
            self::PESAWAT_TERBANG              => 'Jumlah keluarga memiliki pesawat terbang',
            self::SEPEDA_MOTOR                 => 'Jumlah keluarga memiliki sepeda motor/sejenisnya',
            self::TERNAK_BESAR                 => 'Jumlah keluarga memiliki ternak besar',
            self::TERNAK_KECIL                 => 'Jumlah keluarga memiliki ternak kecil',
            self::TV_ELEKTRONIK                => 'Jumlah keluarga memiliki TV dan elektronik lainnya',
            self::USAHA_PASAR_DESA             => 'Jumlah keluarga memiliki usaha di pasar desa',
            self::USAHA_PASAR_SWALAYAN         => 'Jumlah keluarga memiliki usaha di pasar swalayan',
            self::USAHA_PASAR_TRADISIONAL      => 'Jumlah keluarga memiliki usaha di pasar tradisional',
            self::USAHA_PERIKANAN              => 'Jumlah keluarga memiliki usaha perikanan',
            self::USAHA_PERKEBUNAN             => 'Jumlah keluarga memiliki usaha perkebunan',
            self::USAHA_PETERNAKAN             => 'Jumlah keluarga memiliki usaha peternakan',
            self::USAHA_TRANSPORTASI           => 'Jumlah keluarga memiliki usaha transportasi/pengangkutan',
            self::ASET_TELEKOMUNIKASI          => 'Jumlah keluarga yang memiliki aset telekomunikasi',
            self::BUKU_SURAT_BERHARGA          => 'Jumlah keluarga yang memiliki buku surat berharga',
            self::BUKU_TABUNGAN_BANK           => 'Jumlah keluarga yang memiliki buku tabungan bank',
            self::HIASAN_EMAS_BERLIAN          => 'Jumlah keluarga yang memiliki hiasan emas/berlian',
            self::SAHAM_PERUSAHAAN             => 'Jumlah keluarga yang memiliki saham di perusahaan',
            self::SERTIFIKAT_BANGUNAN          => 'Jumlah keluarga yang memiliki sertifikat bangunan',
            self::SERTIFIKAT_DEPOSITO          => 'Jumlah keluarga yang memiliki sertifikat deposito',
            self::SERTIFIKAT_TANAH             => 'Jumlah keluarga yang memiliki sertifikat tanah',
        ];
    }
}
