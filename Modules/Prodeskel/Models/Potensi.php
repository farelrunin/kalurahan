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
use App\Traits\ConfigId;
use Illuminate\Database\Eloquent\Builder;

defined('BASEPATH') || exit('No direct script access allowed');

class Potensi extends BaseModel
{
    use ConfigId;

    public $table = 'prodeskel_potensi';

    /**
     * The guarded with the model.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The casts with the model.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'json',
    ];

    protected function scopeBatasWilayah(Builder $query)
    {
        return $query->where('kategori', 'batas-wilayah');
    }

    protected function scopeJenisLahan(Builder $query)
    {
        return $query->where('kategori', 'jenis-lahan');
    }

    protected function scopeIklim(Builder $query)
    {
        return $query->where('kategori', 'iklim');
    }

    protected function scopeTopografi(Builder $query)
    {
        return $query->where('kategori', 'topografi');
    }

    protected function scopeKepemilikanLahan(Builder $query)
    {
        return $query->where('kategori', 'kepemilikan-lahan');
    }

    protected function scopeKepemilikanLahanBuah(Builder $query)
    {
        return $query->where('kategori', 'kepemilikan-lahan-buah');
    }

    protected function scopeKepemilikanLahanKebun(Builder $query)
    {
        return $query->where('kategori', 'kepemilikan-lahan-kebun');
    }

    protected function scopeLahanPakanTernak(Builder $query)
    {
        return $query->where('kategori', 'lahan-dan-pakan-ternak');
    }

    protected function scopeKepemilikanLahanHutan(Builder $query)
    {
        return $query->where('kategori', 'kepemilikan-lahan-hutan');
    }

    protected function scopeDampakPengolahanHutan(Builder $query)
    {
        return $query->where('kategori', 'dampak-pengolahan-hutan');
    }

    protected function scopeKondisiHutan(Builder $query)
    {
        return $query->where('kategori', 'kondisi-hutan');
    }

    protected function scopeSdmUsia(Builder $query)
    {
        return $query->where('kategori', 'sdm-usia');
    }

    protected function scopeSdmJumlah(Builder $query)
    {
        return $query->where('kategori', 'sdm-jumlah');
    }

    protected function scopeLembagaPemerintah(Builder $query)
    {
        return $query->where('kategori', 'lembaga-pemerintah');
    }

    protected function scopePrasaranaLembagaKemasyarakatan(Builder $query)
    {
        return $query->where('kategori', 'prasarana-lembaga-kemasyarakatan');
    }

    protected function scopePrasaranaIrigasi(Builder $query)
    {
        return $query->where('kategori', 'prasarana-irigasi');
    }

    protected function scopeSanitasi(Builder $query)
    {
        return $query->where('kategori', 'sanitasi');
    }

    protected function scopeSaranaEnergi(Builder $query)
    {
        return $query->where('kategori', 'sarana-energi');
    }

    protected function scopeAirBersih(Builder $query)
    {
        return $query->where('kategori', 'air-bersih');
    }

    protected function scopeLembagaAdat(Builder $query)
    {
        return $query->where('kategori', 'lembaga-adat');
    }

    protected function scopeSaranaKebersihan(Builder $query)
    {
        return $query->where('kategori', 'sarana-kebersihan');
    }

    protected function scopeSaranaDesa(Builder $query)
    {
        return $query->where('kategori', 'sarana-desa');
    }

    protected function scopeSaranaDusun(Builder $query)
    {
        return $query->where('kategori', 'sarana-dusun');
    }

    protected function scopeBadanPerwakilanDesa(Builder $query)
    {
        return $query->where('kategori', 'badan-perwakilan-desa');
    }

    protected function scopeLembagaKeamanan(Builder $query)
    {
        return $query->where('kategori', 'lembaga-keamanan');
    }
}
