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

namespace Modules\PPID\Database\Seeders;

use App\Enums\KategoriPublicEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\PPID\Models\JenisDokumen;

class JenisDokumenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $dataBerkala = ['nama_kategori' => 'Secara Berkala', 'status' => StatusEnum::YA, 'icon' => 'bi-calendar-check', 'bgicon' => '#0e15d8', 'deskripsi' => 'Informasi yang rutin diterbitkan dan diperbaharui untuk publik'];
        $berkala     = JenisDokumen::withTrashed()->whereSlug('secara-berkala')->first();
        if (! $berkala) {
            $dataBerkala['external_code'] = KategoriPublicEnum::INFORMASI_BERKALA;
            JenisDokumen::create($dataBerkala);
        } else {
            $berkala->update(['external_code' => KategoriPublicEnum::INFORMASI_BERKALA]);
        }
        $dataSertaMerta = ['nama_kategori' => 'Serta Merta', 'status' => StatusEnum::YA, 'icon' => 'bi-lightning', 'bgicon' => '#059e17', 'deskripsi' => 'Informasi yang wajib diumumkan segera karena penting bagi masyarakat'];
        $sertaMerta     = JenisDokumen::withTrashed()->whereSlug('serta-merta')->first();
        if (! $sertaMerta) {
            $dataSertaMerta['external_code'] = KategoriPublicEnum::INFORMASI_SERTA_MERTA;
            JenisDokumen::create($dataSertaMerta);
        } else {
            $sertaMerta->update(['external_code' => KategoriPublicEnum::INFORMASI_SERTA_MERTA]);
        }
        $dataSetiapSaat = ['nama_kategori' => 'Tersedia Setiap Saat', 'status' => StatusEnum::YA, 'icon' => 'bi-globe', 'bgicon' => '#ff9900', 'deskripsi' => 'Informasi yang tersedia dan dapat diakses setiap saat'];
        $setiapSaat     = JenisDokumen::withTrashed()->whereSlug('tersedia-setiap-saat')->first();
        if (! $setiapSaat) {
            $dataSetiapSaat['external_code'] = KategoriPublicEnum::INFORMASI_SEIAP_SAAT;
            JenisDokumen::create($dataSetiapSaat);
        } else {
            $setiapSaat->update(['external_code' => KategoriPublicEnum::INFORMASI_SEIAP_SAAT]);
        }
        $dataDikecualikan = ['nama_kategori' => 'Dikecualikan', 'status' => StatusEnum::YA, 'icon' => 'bi-x-circle', 'bgicon' => '#ff0000', 'deskripsi' => 'Informasi yang tidak diumumkan karena dikecualikan oleh peraturan perundang-undangan'];
        $dikecualikan     = JenisDokumen::withTrashed()->whereSlug('dikecualikan')->first();
        if (! $dikecualikan) {
            $dataDikecualikan['external_code'] = KategoriPublicEnum::INFORMASI_DIKECUALIKAN;
            JenisDokumen::create($dataDikecualikan);
        } else {
            $dikecualikan->update(['external_code' => KategoriPublicEnum::INFORMASI_DIKECUALIKAN]);
        }
    }
}
