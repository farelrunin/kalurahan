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

use App\Models\BaseModel;
use App\Traits\ConfigId;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\PPID\Enums\TindakLanjutEnum;

defined('BASEPATH') || exit('No direct script access allowed');

class PermohonanInformasi extends BaseModel
{
    use HasFactory;
    use ConfigId;
    use Uuid;

    protected $table    = 'ppid_permohonan_informasi';
    protected $fillable = [
        'config_id',
        'nik',
        'nama',
        'alamat',
        'pekerjaan',
        'telp_email',
        'cara_memperoleh_informasi',
        'cara_mendapat_salinan_informasi',
        'informasi_yang_dibutuhkan',
        'tujuan_penggunaan_informasi',
        'tindak_lanjut',
    ];

    public function keberatan()
    {
        return $this->hasMany(PermohonanKeberatan::class, 'permohonan_informasi_uuid', 'uuid');
    }

    /**
     * Mendapatkan nama kolom tindak lanjut.
     */
    private static function getTindakLanjutColumn(): string
    {
        return 'tindak_lanjut';
    }

    /**
     * Scope untuk tindak lanjut tertentu.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string                                $tindakLanjut
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTindakLanjut($query, $tindakLanjut)
    {
        return $query->when($tindakLanjut !== '', static function ($query) use ($tindakLanjut) {
            $query->where(self::getTindakLanjutColumn(), $tindakLanjut);
        });
    }

    /**
     * Scope untuk tindak lanjut diajukan.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDiajukan($query)
    {
        return $query->where(self::getTindakLanjutColumn(), TindakLanjutEnum::DIAJUKAN);
    }

    /**
     * Scope untuk tindak lanjut diproses.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDiproses($query)
    {
        return $query->where(self::getTindakLanjutColumn(), TindakLanjutEnum::DIPROSES);
    }

    /**
     * Scope untuk tindak lanjut selesai.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSelesai($query)
    {
        return $query->where(self::getTindakLanjutColumn(), TindakLanjutEnum::SELESAI);
    }

    /**
     * Scope untuk tindak lanjut ditolak.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDitolak($query)
    {
        return $query->where(self::getTindakLanjutColumn(), TindakLanjutEnum::DITOLAK);
    }
}
