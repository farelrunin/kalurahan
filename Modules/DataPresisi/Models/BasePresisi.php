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

use App\Models\Rtm;
use App\Traits\Author;
use App\Traits\Uuid;
use App\Models\Keluarga;
use App\Traits\ConfigId;
use App\Models\BaseModel;
use App\Models\PendudukSaja;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BasePresisi extends BaseModel
{
    use HasFactory;
    use ConfigId;
    use Uuid;
    use Author;

    /**
     * The guarded with the model.
     *
     * @var array
     */
    protected $guarded = [];

    protected $appends = [
    ];
    protected $casts = [
        'created_at'          => 'date:Y-m-d H:i:s',
        'updated_at'          => 'date:Y-m-d H:i:s',
    ];    

    /**
     * Define relationship with Dtks model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dtks()
    {
        return $this->hasOne(\App\Models\Dtks::class, 'id_rtm', 'rtm_id')
            ->where('versi_kuisioner', \App\Enums\Dtks\DtksEnum::VERSION_CODE)
            ->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
    }

    /**
     * Define a one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function rtm()
    {
        return $this->hasOne(Rtm::class, 'id', 'rtm_id');
    }

    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'id', 'keluarga_id');
    }

    public function penduduk()
    {
        return $this->hasOne(PendudukSaja::class, 'id', 'anggota_id');
    }

    public function kepalaRumahTangga()
    {
        return $this->hasOneThrough(
            \App\Models\Penduduk::class,
            \App\Models\Rtm::class,
            'id', // Foreign key on Rtm table
            'id', // Foreign key on Penduduk table
            'rtm_id', // Local key on Papan table
            'nik_kepala' // Local key on Rtm table
        );
    }

    public function getKepalaRumahTanggaAttribute()
    {
        $this->loadMissing([
            'rtm.kepalaKeluarga',
        ]);

        return $this->rtm->kepalaKeluarga;
    }

    public function getAlamatAttribute()
    {
        $this->loadMissing([
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withoutRelations();
            },
        ]);

        return $this->rtm->kepalaKeluarga->alamat_wilayah;
    }

    public function isFilled()
    {
        return $this->updated_at > $this->created_at;
    }
}
