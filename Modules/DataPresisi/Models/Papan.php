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
use Illuminate\Database\Eloquent\Factories\HasFactory;

defined('BASEPATH') || exit('No direct script access allowed');

class Papan extends BaseModel
{
    use HasFactory;
    use ConfigId;
    use Uuid;
    use Author;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'data_presisi_papan';

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

    public static $dtksFieldMapping = [
        'pilihan[3][301a]' => 'kd_stat_bangunan_tinggal',
        'input[3][302]' => 'luas_lantai',
        'pilihan[3][303]' => 'kd_jenis_lantai_terluas',
        'pilihan[3][304]' => 'kd_jenis_dinding',
        'pilihan[3][305]' => 'kd_jenis_atap',
        'pilihan[3][306a]' => 'kd_sumber_air_minum',
        'pilihan[3][306b]' => 'kd_jarak_sumber_air_ke_tpl',
        'pilihan[3][310]' => 'kd_pembuangan_akhir_tinja',
        'pilihan[3][307a]' => 'kd_sumber_penerangan_utama',
        'pilihan[3][307b1]' => 'kd_daya_terpasang',
        'pilihan[3][307b2]' => 'kd_daya_terpasang2',
        'pilihan[3][307b3]' => 'kd_daya_terpasang3'
    ];

    public static $dtksItemMapping = [
        '301a' => 'kd_stat_bangunan_tinggal',        
        '303' => 'kd_jenis_lantai_terluas',
        '304' => 'kd_jenis_dinding',
        '305' => 'kd_jenis_atap',
        '306a' => 'kd_sumber_air_minum',
        '306b' => 'kd_jarak_sumber_air_ke_tpl',
        '310' => 'kd_pembuangan_akhir_tinja',
        '307a' => 'kd_sumber_penerangan_utama',
        '307b1' => 'kd_daya_terpasang',
        '307b2' => 'kd_daya_terpasang2',
        '307b3' => 'kd_daya_terpasang3'
    ];
    // /**
    //  * The fillable with the model.
    //  *
    //  * @var array
    //  */
    // protected $fillable = [
    // ];

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
        return $this->hasOne(Rtm::class, 'id', 'rtm_id')->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
    }

    public function keluarga()
    {
        return $this->hasOne(Keluarga::class, 'id', 'keluarga_id')->withoutGlobalScope(\App\Scopes\ConfigIdScope::class);
    }

    public function tahun()
    {
        return $this->hasOne(Tahun::class, 'uuid', 'data_presisi_tahun_id');
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
     * Get jumlah anggota mengikuti anggota rtm
     *
     * @return int
     */
    public function getJumlahAnggotaAttribute()
    {
        return $this->rtm->anggota()->where('status_dasar', 1)->count();
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

    /**
     * Sync data from Dtks to Papan if different
     *
     * @return bool
     */
    public function syncWithDtks()
    {
        $this->loadMissing('dtks');

        if (!$this->dtks) {
            return false;
        }

        $dtksAttributes = [
            'kd_stat_bangunan_tinggal',
            'luas_lantai',
            'kd_jenis_lantai_terluas',
            'kd_jenis_dinding',
            'kd_kondisi_dinding',
            'kd_jenis_atap',
            'kd_kondisi_atap',
            'kd_sumber_air_minum',
            'kd_jarak_sumber_air_ke_tpl',
            'kd_pembuangan_akhir_tinja',
            'kd_sumber_penerangan_utama',
            'kd_daya_terpasang',
            'kd_daya_terpasang2',
            'kd_daya_terpasang3'
        ];

        $updates = [];
        $needUpdate = false;

        foreach ($dtksAttributes as $attribute) {
            $dtksValue = $this->dtks->{$attribute};

            // Hanya update jika nilai DTKS tidak null dan berbeda dengan nilai di Papan
            if ($dtksValue !== null && $this->getOriginal($attribute) !== $dtksValue) {
                $updates[$attribute] = $dtksValue;
                $needUpdate = true;
            }
        }

        if ($needUpdate) {
            return $this->update($updates);
        }

        return false;
    }

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically sync with DTKS after retrieving
        static::retrieved(function ($model) {
            $model->syncWithDtks();
        });
    }

    /**
     * Get attribute from Dtks if exists, otherwise from Papan
     *
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        // List of attributes that should be checked in Dtks first
        $dtksAttributes = [
            'kd_stat_bangunan_tinggal',
            'luas_lantai',
            'kd_jenis_lantai_terluas',
            'kd_jenis_dinding',
            'kd_kondisi_dinding',
            'kd_jenis_atap',
            'kd_kondisi_atap',
            'kd_sumber_air_minum',
            'kd_jarak_sumber_air_ke_tpl',
            'kd_pembuangan_akhir_tinja',
            'kd_sumber_penerangan_utama',
            'kd_daya_terpasang',
            'kd_daya_terpasang2',
            'kd_daya_terpasang3'
        ];

        // If the attribute exists in Dtks list, try to get from Dtks first
        if (in_array($key, $dtksAttributes)) {
            $this->loadMissing('dtks');

            if ($this->dtks && $this->dtks->{$key} !== null) {
                return $this->dtks->{$key};
            }
        }

        // If not found in Dtks or not a Dtks attribute, get from parent
        return parent::getAttribute($key);
    }
}
