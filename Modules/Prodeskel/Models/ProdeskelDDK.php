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

namespace Modules\Prodeskel\Models;

use App\Models\BaseModel;
use App\Models\Keluarga;
use App\Traits\ConfigId;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

defined('BASEPATH') || exit('No direct script access allowed');

class ProdeskelDDK extends BaseModel
{
    use ConfigId;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prodeskel_ddk';

    /**
     * The guarded with the model.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    /**
     * Define a one-to-one relationship.
     */
    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id');
    }

    public function produksi()
    {
        return $this->hasMany(ProdeskelDDKProduksi::class, 'prodeskel_ddk_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany(ProdeskelDDKDetail::class, 'prodeskel_ddk_id', 'id');
    }

    public function bahanGalianAnggota()
    {
        return $this->hasMany(ProdeskelDDKBahanGalianAnggota::class, 'prodeskel_ddk_id', 'id');
    }

    public function getKepalaKeluargaAttribute()
    {
        $this->loadMissing([
            'keluarga.kepalaKeluarga' => static function ($builder): void {
                $builder->withoutDefaultRelations();
            },
        ]);

        return $this->keluarga->kepalaKeluarga;
    }

    /**
     * @return detailKeluarga[kode_field] => item
     */
    public function getDetailKeluargaAttribute()
    {
        $this->loadMissing(['detail']);

        return $this->detail->whereNull('penduduk_id')->keyBy('kode_field');
    }

    /**
     * @return detailAnggota[penduduk_id][kode_field] => item
     * */
    public function getDetailAnggotaAttribute()
    {
        $this->loadMissing(['detail']);

        return $this->detail->whereNotNull('penduduk_id')
            ->groupBy('penduduk_id')
            ->transform(static fn ($item, $key) => $item->keyBy('kode_field'));
    }

    public function getJenisKelaminKepalaKeluargaAttribute()
    {
        $this->loadMissing([
            'keluarga.kepalaKeluarga' => static function ($builder): void {
                $builder->withoutDefaultRelations();
            },
        ]);

        return $this->keluarga->kepalaKeluarga->sex;
    }

    public function getNikKKAttribute()
    {
        $this->loadMissing([
            'keluarga.kepalaKeluarga' => static function ($builder): void {
                $builder->withoutDefaultRelations();
            },
        ]);

        return $this->keluarga->kepalaKeluarga->nik;
    }

    public function getNoKKAttribute()
    {
        return $this->getKepalaKeluargaAttribute()->keluarga->no_kk;
    }
}
