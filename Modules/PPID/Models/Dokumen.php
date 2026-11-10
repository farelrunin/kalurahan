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

use App\Models\Dokumen as ModelsDokumen;
use App\Traits\Author;
use App\Traits\ConfigId;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;
use Modules\PPID\Enums\TipeDokumenEnum;

defined('BASEPATH') || exit('No direct script access allowed');

class Dokumen extends ModelsDokumen
{
    use ConfigId;
    use Author;

    // append attribute
    protected $appends = [
        'url_file',
    ];
    protected $dates = ['retensi_date']; // Untuk soft delete

    public function permohonanInformasi()
    {
        return $this->belongsTo(PermohonanInformasi::class, 'permohonan_informasi_uuid', 'uuid');
    }

    public function scopeActive($query)
    {
        return $query->where(static function ($q) {
            $q->whereNull('retensi_date')
                ->orWhere('retensi_date', '>=', Carbon::now());
        })->whereDate('published_at', '<=', Carbon::now()->format('Y-m-d'));
    }

    /**
     * Mendapatkan URL file dokumen
     */
    public function getUrlFileAttribute(): ?string
    {
        return $this->tipe == TipeDokumenEnum::FILE ? (file_exists(LOKASI_DOKUMEN . $this->satuan) ? base_url(LOKASI_DOKUMEN . $this->satuan) : '') : $this->url;
    }

    /**
     * Scope untuk memfilter dokumen berdasarkan pencarian dan kategori.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, static fn ($query, $search) => $query->where('nama', 'like', '%' . $search . '%')
            ->orWhere('keterangan', 'like', '%' . $search . '%'));

        $query->when($filters['category'] ?? false, static fn ($query, $category) => $query->where('kategori_info_publik', $category));
    }

    public function scopeInformasiPublik($query)
    {
        return $query->whereNull('id_pend');
    }

    /**
     * Get the stat associated with the Dokumen
     */
    public function statistik(): HasOne
    {
        return $this->hasOne(DokumenStatistik::class, 'dokumen_id', 'id');
    }

    public function jenisDokumen()
    {
        return $this->belongsTo(JenisDokumen::class, 'kategori');
    }
}
