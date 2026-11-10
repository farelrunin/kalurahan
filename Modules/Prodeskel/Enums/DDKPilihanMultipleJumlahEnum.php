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

defined('BASEPATH') || exit('No direct script access allowed');

class DDKPilihanMultipleJumlahEnum
{
    public const KEPEMILIKAN_JENIS_TERNAK_KELUARGA_TAHUN_INI = [
        1  => 'Sapi',
        2  => 'Kerbau',
        3  => 'Babi',
        4  => 'Ayam kampung',
        5  => 'Ayam Broiler',
        6  => 'Bebek',
        7  => 'Kuda',
        8  => 'Kambing',
        9  => 'Domba',
        10 => 'Angsa',
        11 => 'Burung Puyuh',
        12 => 'Kelinci',
        13 => 'Burung walet',
        14 => 'Anjing',
        15 => 'Kucing',
        16 => 'Ular cobra',
        17 => 'Burung Onta',
        18 => 'Ular pithon',
        19 => 'Burung cendrawasih',
        20 => 'Burung kakatua',
        21 => 'Burung beo',
        22 => 'Burung merak',
        23 => 'Burung langka lainnya',
        24 => 'Buaya',
    ];
    public const ALAT_PRODUKSI_BUDIDAYA_IKAN = [
        1 => 'Karamba',
        2 => 'Tambak',
        3 => 'Jermal',
        4 => 'Pancing',
        5 => 'Pukat',
        6 => 'Jala',
    ];
    public const KUALITAS_PERTOLONGAN_PERSALINAN = [
        1 => 'Jumlah Persalinan ditolong Dokter',
        2 => 'Jumlah persalinan ditolong bidan',
        3 => 'Jumlah persalinan ditolong perawat',
        4 => 'Jumlah persalinan ditolong dukun bersalin',
        5 => 'Jumlah persalinan ditolong keluarga',
    ];

    /**
     * prodeskel_ddk_detail ~ jumlah
     */
    final public static function semuaJumlah(): array
    {
        return [
            DDKEnum::KODE_KEPEMILIKAN_JENIS_TERNAK_KELUARGA_TAHUN_INI => self::KEPEMILIKAN_JENIS_TERNAK_KELUARGA_TAHUN_INI,
            DDKEnum::KODE_ALAT_PRODUKSI_BUDIDAYA_IKAN                 => self::ALAT_PRODUKSI_BUDIDAYA_IKAN,
            DDKEnum::KODE_KUALITAS_PERTOLONGAN_PERSALINAN             => self::KUALITAS_PERTOLONGAN_PERSALINAN,
        ];
    }

    public static function semuaKode(): array
    {
        return [
            DDKEnum::KODE_KEPEMILIKAN_JENIS_TERNAK_KELUARGA_TAHUN_INI,
            DDKEnum::KODE_ALAT_PRODUKSI_BUDIDAYA_IKAN,
            DDKEnum::KODE_KUALITAS_PERTOLONGAN_PERSALINAN,
        ];
    }
}
