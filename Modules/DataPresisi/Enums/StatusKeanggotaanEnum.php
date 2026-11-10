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

class StatusKeanggotaanEnum extends BaseEnum
{    
    public const KETUA           = 1;
    public const WAKIL_KETUA     = 2;
    public const SEKRETARIS           = 3;
    public const WAKIL_SEKRETARIS     = 4;
    public const BENDAHARA           = 5;
    public const WAKIL_BENDAHARA     = 6;
    public const ANGGOTA              = 7;
    
    /**
     * Override method all()
     */
    public static function all(): array
    {        
        return [
            self::KETUA               => 'Ketua/Kepala Adat',
            self::WAKIL_KETUA         => 'Wakil Ketua Adat',
            self::SEKRETARIS           => 'Sekretaris',
            self::WAKIL_SEKRETARIS     => 'Wakil Sekretaris',
            self::BENDAHARA           => 'Bendahara',
            self::WAKIL_BENDAHARA     => 'Wakil Bendahara',
            self::ANGGOTA              => 'Anggota',            
        ];
    }
}