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

namespace Modules\DataPresisi\Models;

use App\Enums\StatusEnum;
use App\Models\Rtm;
use App\Traits\Uuid;
use App\Models\Keluarga;
use App\Traits\ConfigId;
use App\Models\BaseModel;
use App\Scopes\AccessWilayahScope;
use Illuminate\Support\Facades\DB;

defined('BASEPATH') || exit('No direct script access allowed');

class Tahun extends BaseModel
{
    use ConfigId;
    use Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_presisi_tahun';

    /**
     * The guarded with the model.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appends = [];

    protected $casts = [
        'created_at'          => 'date:Y-m-d H:i:s',
        'updated_at'          => 'date:Y-m-d H:i:s',
    ];

    protected function scopeActive($query)
    {
        return $query->whereStatus(StatusEnum::YA);
    }

    public function kesehatan()
    {
        return $this->hasMany(Kesehatan::class, 'data_presisi_tahun_id', 'uuid');
    }

    public function papan()
    {
        return $this->hasMany(Papan::class, 'data_presisi_tahun_id', 'uuid');
    }

    public function sandang()
    {
        return $this->hasMany(Sandang::class, 'data_presisi_tahun_id', 'uuid');
    }

}
