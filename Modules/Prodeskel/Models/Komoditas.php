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

class Komoditas extends BaseModel
{
    use ConfigId;

    public $table = 'prodeskel_komoditas';

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

    protected function scopeAlatProduksiIkanLaut(Builder $query)
    {
        return $query->where('kategori', 'alat-produksi-ikan-laut');
    }

    protected function scopeAlatProduksiIkanTawar(Builder $query)
    {
        return $query->where('kategori', 'alat-produksi-ikan-tawar');
    }

    protected function scopeProduksiPerikanan(Builder $query)
    {
        return $query->where('kategori', 'produksi-perikanan');
    }

    protected function scopeJenisPopulasiTernak(Builder $query)
    {
        return $query->where('kategori', 'jenis-populasi-ternak');
    }

    protected function scopeProduksiPeternakan(Builder $query)
    {
        return $query->where('kategori', 'produksi-peternakan');
    }

    protected function scopeApotikHidup(Builder $query)
    {
        return $query->where('kategori', 'apotik-hidup');
    }

    protected function scopePengolahanHasilTernak(Builder $query)
    {
        return $query->where('kategori', 'pengolahan-hasil-ternak');
    }

    protected function scopeHasilProduksiPangan(Builder $query)
    {
        return $query->where('kategori', 'hasil-produksi-pangan');
    }

    protected function scopeHasilProduksiBuah(Builder $query)
    {
        return $query->where('kategori', 'hasil-produksi-buah');
    }

    protected function scopeHasilProduksiKebun(Builder $query)
    {
        return $query->where('kategori', 'hasil-produksi-kebun');
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

    protected function scopeHasilHutan(Builder $query)
    {
        return $query->where('kategori', 'hasil-hutan');
    }

    protected function scopeDepositProduksiGalian(Builder $query)
    {
        return $query->where('kategori', 'deposit-dan-produksi-bahan-galian');
    }

    protected function scopePemanfaatanAir(Builder $query)
    {
        return $query->where('kategori', 'potensi-dan-pemanfaatan-air');
    }

    protected function scopeKualitasSumberAir(Builder $query)
    {
        return $query->where('kategori', 'kualitas-air');
    }

    protected function scopeSumberAir(Builder $query)
    {
        return $query->where('kategori', 'sumber-air-bersih');
    }

    protected function scopeSdmPekerjaan(Builder $query)
    {
        return $query->where('kategori', 'mata-pencarian-pokok');
    }

    protected function scopeSdmCacat(Builder $query)
    {
        return $query->where('kategori', 'cacat-mental-dan-fisik');
    }

    protected function scopeSdmSuku(Builder $query)
    {
        return $query->where('kategori', 'etnis-suku');
    }

    protected function scopeSdmTenagakerja(Builder $query)
    {
        return $query->where('kategori', 'tenaga-kerja');
    }

    protected function scopeSdmKualitas(Builder $query)
    {
        return $query->where('kategori', 'kualitas-angkatan-kerja');
    }

    protected function scopeAgama(Builder $query)
    {
        return $query->where('kategori', 'agama');
    }

    protected function scopeWargaNegara(Builder $query)
    {
        return $query->where('kategori', 'kewarganegaraan');
    }

    protected function scopeAirPanas(Builder $query)
    {
        return $query->where('kategori', 'air-panas');
    }

    protected function scopeKualitasUdara(Builder $query)
    {
        return $query->where('kategori', 'kualitas-udara');
    }

    protected function scopePartisipasiPolitik(Builder $query)
    {
        return $query->where('kategori', 'partisipasi-politik');
    }

    protected function scopeJasaPengangkutan(Builder $query)
    {
        return $query->where('kategori', 'jasa-pengangkutan');
    }

    protected function scopeKebisingan(Builder $query)
    {
        return $query->where('kategori', 'kebisingan');
    }

    protected function scopeRuangPublik(Builder $query)
    {
        return $query->where('kategori', 'ruang-publik');
    }

    protected function scopePotensiWisata(Builder $query)
    {
        return $query->where('kategori', 'potensi-wisata');
    }

    protected function scopeLembagaPendidikan(Builder $query)
    {
        return $query->where('kategori', 'lembaga-pendidikan');
    }

    protected function scopeLembagaKemasyarakatan(Builder $query)
    {
        return $query->where('kategori', 'lembaga-kemasyarakatan');
    }

    protected function scopeSdmPendidikan(Builder $query)
    {
        return $query->where('kategori', 'sdm-pendidikan');
    }

    protected function scopeSaranaOlahraga(Builder $query)
    {
        return $query->where('kategori', 'sarana-olahraga');
    }

    protected function scopeSaranaPendidikan(Builder $query)
    {
        return $query->where('kategori', 'sarana-pendidikan');
    }

    protected function scopePrasaranaKesehatan(Builder $query)
    {
        return $query->where('kategori', 'prasarana-kesehatan');
    }

    protected function scopeSaranaWisata(Builder $query)
    {
        return $query->where('kategori', 'sarana-wisata');
    }

    protected function scopeLembagaEkonomi(Builder $query)
    {
        return $query->where('kategori', 'lembaga-ekonomi');
    }

    protected function scopeJasaHiburan(Builder $query)
    {
        return $query->where('kategori', 'usaha-jasa-hiburan');
    }

    protected function scopeAngkutanLainnya(Builder $query)
    {
        return $query->where('kategori', 'sarana-angkutan-lainnya');
    }

    protected function scopeTransportasiDarat(Builder $query)
    {
        return $query->where('kategori', 'sarana-transportasi-darat');
    }

    protected function scopePrasaranaPeribadatan(Builder $query)
    {
        return $query->where('kategori', 'prasarana-peribadatan');
    }

    protected function scopeSaranaKesehatan(Builder $query)
    {
        return $query->where('kategori', 'sarana-kesehatan');
    }

    protected function scopeKomunikasiInformasi(Builder $query)
    {
        return $query->where('kategori', 'sarana-komunikasi-informasi');
    }
}
