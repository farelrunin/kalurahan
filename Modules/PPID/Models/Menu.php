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

namespace Modules\PPID\Models;

use App\Enums\TipeLinkEnum;
use App\Models\BaseModel;
use App\Traits\Author;
use App\Traits\ConfigId;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\SortableTrait;

defined('BASEPATH') || exit('No direct script access allowed');

class Menu extends BaseModel
{
    use ConfigId;
    use Uuid;
    use SoftDeletes;
    use Author;
    use SortableTrait;

    // TODO:: Ganti menggunakan StatusEnum
    public const LOCK   = 0;
    public const UNLOCK = 1;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ppid_menu';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'config_id',
        'nama',
        'link',
        'parrent',
        'link_tipe',
        'enabled',
        'urut',

    ];

    public $sortable = [
        'order_column_name'  => 'urut',
        'sort_when_creating' => false,
    ];
    protected $appends      = ['link_url'];
    private array $listMenu = [];

    public static function boot(): void
    {
        parent::boot();

        static::creating(static function ($model): void {
            $urutTerakhir = Menu::select(['urut'])->whereParrent($model->parrent)->orderBy('urut', 'desc')->first();
            $model->urut  = $urutTerakhir ? (int) ($urutTerakhir->urut) + 1 : 1;
        });
    }

    protected function scopeChild($query, string $parent)
    {
        return $query->whereParrent($parent);
    }

    protected function scopeActive($query)
    {
        return $query->whereEnabled(self::UNLOCK);
    }

    public function isActive(): bool
    {
        return $this->enabled == self::UNLOCK;
    }

    /**
     * Get the parent that owns the Polygon
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parrent', 'uuid');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parrent', 'uuid');
    }

    public function childrens(): HasMany
    {
        return $this->hasMany(Menu::class, 'parrent', 'uuid')->where('enabled', 1)->with(['childrens' => static fn ($q) => $q->select(['uuid', 'nama', 'parrent', 'link_tipe', 'link'])->orderBy('urut')->where('enabled', 1)]);
    }

    protected function getLinkUrlAttribute()
    {
        $prefix = $this->attributes['link_tipe'] == TipeLinkEnum::ARTIKEL_STATIS ? 'ppid/page/' : '';

        return $prefix . $this->attributes['link'];
    }

    public function getSelfParents()
    {
        $result = collect([$this->toArray()]);
        $node   = $this->parent;
        if (! $node) {
            return $result;
        }

        do {
            $result->push($node->toArray());
            $node = $node->parent;
        } while ($node);

        return $result;
    }

    public function tree()
    {
        return $this->select(['uuid', 'nama', 'parrent', 'link_tipe', 'link'])
            ->where('parrent', '0')->where('enabled', 1)
            ->with('childrens', static fn ($q) => $q->orderBy('urut'))
            ->orderBy('urut')
            ->get();
    }

    public function buildArray($nodes, $prefix = []): array
    {
        foreach ($nodes as $node) {
            $tmpPrefix                   = $prefix;
            $this->listMenu[$node->uuid] = (empty($tmpPrefix) ? '' : implode(' / ', $tmpPrefix) . ' / ') . $node->nama;
            $tmpPrefix                   = array_merge($tmpPrefix, [$node->nama]);
            if ($node->childrens) {
                $this->buildArray($node->childrens, $tmpPrefix);
            }
        }

        return $this->listMenu;
    }

    protected function scopeArtikel($query)
    {
        return $query->where('link', 'like', 'artikel/%');
    }
}
