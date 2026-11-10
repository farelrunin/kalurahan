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

// NOTE : Digunakan untuk replace data pilihan di RTF
class DDKPatternEnum
{
    public const KODE_TEXT                             = 't[*]';
    public const KODE_VALUE                            = 'v[*]';
    public const SUMBER_AIR_MINUM_BAIK                 = 'v[*]1';
    public const SUMBER_AIR_MINUM_BERASA               = 'v[*]2';
    public const SUMBER_AIR_MINUM_BERWARNA             = 'v[*]3';
    public const SUMBER_AIR_MINUM_BERBAU               = 'v[*]4';
    public const KEPEMILIKAN_LAHAN_KURANG_05           = 'v[*]1';
    public const KEPEMILIKAN_LAHAN_ANTARA_05_1         = 'v[*]2';
    public const KEPEMILIKAN_LAHAN_LEBIH_1             = 'v[*]3';
    public const KEPEMILIKAN_LAHAN_TIDAK_MEMILIKI      = 'v[*]4';
    public const PRODUKSI_TAHUN_INI_JUMLAH_POHON       = 'prod_j[*]';
    public const PRODUKSI_TAHUN_INI_LUAS_PANEN         = 'prod_l[*]';
    public const PRODUKSI_TAHUN_INI_PRODUKSI           = 'prod_n[*]';
    public const PRODUKSI_TAHUN_INI_SATUAN             = 'prod_s[*]';
    public const PRODUKSI_TAHUN_INI_PEMASARAN_HASIL    = 'prod_p[*]';
    public const PRODUKSI_BAHAN_GALIAN_PRODUKSI        = 'bg_n[*]';
    public const PRODUKSI_BAHAN_GALIAN_MILIK_ADAT      = 'bg_m[*]';
    public const PRODUKSI_BAHAN_GALIAN_PERORANGAN      = 'bg_o[*]';
    public const PRODUKSI_BAHAN_GALIAN_PEMASARAN_HASIL = 'bg_p[*]';
}
