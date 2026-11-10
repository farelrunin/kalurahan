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
use Illuminate\Support\Facades\DB;

defined('BASEPATH') || exit('No direct script access allowed');

class Pangan extends BaseModel
{
    use ConfigId;
    use Uuid;
    use Author;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_presisi_pangan';

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

    public function anggota()
    {
        return $this->hasMany(\App\Models\Penduduk::class, 'id_rtm', 'rtm_id')->status();
    }

    public function penduduk()
    {
        return $this->belongsTo(\App\Models\Penduduk::class, 'anggota_id', 'id');
    }

    /**
     * Define a one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function rtm()
    {
        return $this->hasOne(Rtm::class, 'id', 'rtm_id')->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
    }

    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'id', 'keluarga_id')->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
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
        )->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
    }

    /**
     * Get jumlah anggota keluarga attribute
     *
     * @return int
     */
    public function getJumlahAnggotaAttribute()
    {
        return DB::table('tweb_penduduk')
            ->where('id_kk', $this->keluarga_id)
            ->count();
    }

    public function getKepalaRumahTanggaAttribute()
    {
        $this->loadMissing([
            'rtm.kepalaKeluarga',
        ]);

        return $this->rtm->kepalaKeluarga;
    }

    public function getKepalaKeluargaAttribute()
    {
        $this->loadMissing([
            'keluarga.kepalaKeluarga',
        ]);

        return $this->keluarga->kepalaKeluarga;
    }

    public function getKeluargaInRTMAttribute()
    {
        $this->loadMissing([
            'rtm.anggota' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withOnly('keluarga')->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
                // hanya ambil data anggota yg masih hidup (tweb_penduduk)
                $builder->where('status_dasar', 1);
            },
        ]);

        return $this->rtm->anggota->pluck('keluarga')->unique();
    }

    public function getNikKKAttribute()
    {
        $this->loadMissing([
            'keluarga.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withoutRelations();
            },
        ]);

        return $this->keluarga->kepalaKeluarga->nik;
    }

    public function getNikKrtAttribute()
    {
        $this->loadMissing([
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withoutRelations();
            },
        ]);

        return $this->rtm->kepalaKeluarga->nik;
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

    public function tahun()
    {
        return $this->hasOne(Tahun::class, 'uuid', 'data_presisi_tahun_id');
    }

}
