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

defined('BASEPATH') || exit('No direct script access allowed');

use App\Enums\AktifEnum;
use App\Enums\KategoriPublicEnum;
use Modules\PPID\Enums\StatusDokumenEnum;
use Modules\PPID\Http\Controllers\FrontEnd\PPIDController;
use Modules\PPID\Models\Dokumen;
use Modules\PPID\Models\JenisDokumen;

// use Illuminate\Support\Facades\Response;

class PublikController extends PPIDController
{
    public function index()
    {
        $category = null;
        if (request('category')) {
            $category = request('category');
        }

        $dokumensQuery = Dokumen::filter(request(['search', 'category']))
            ->with('statistik')
            ->informasiPublik()
            ->where('status', StatusDokumenEnum::TERBIT)
            ->active() // query scope untuk hanya menampilkan dokumen yang aktif
            ->latest();

        // Jika kategori ditemukan, lakukan pencarian hanya dalam kategori tersebut
        if ($category) {
            $dokumensQuery->where('kategori_info_publik', $category);
        }

        $dokumens = $dokumensQuery->paginate(10)->withQueryString();

        $jenisDokumens = JenisDokumen::where('status', AktifEnum::AKTIF)->get();

        return view('ppid::frontend.index', [
            'dokumens'      => $dokumens,
            'jenisDokumens' => $jenisDokumens,
            'totalDokumen'  => $dokumens->total(),
        ]);
    }

    public function show($id)
    {
        $dokumen = Dokumen::with(['statistik', 'permohonanInformasi'])
            ->findOrFail($id);

        // Tambahkan jumlah views
        if ($dokumen->statistik) {
            $dokumen->statistik->increment('view_count');
        } else {
            $dokumen->statistik()->create(['view_count' => 1]);
        }

        return view('ppid::frontend.single-page', ['dokumen' => $dokumen]);
    }

    public function formKeberatan()
    {
        return view('ppid::frontend.form-keberatan');
    }

    public function ambilBanner(): void
    {
        $file = is_file($banner = config('ppid.path.pengaturan') . setting('ppid_banner'))
            ? $banner
            : config('ppid.file.default_banner');

        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        readfile($file);
    }

    public function download($id)
    {
        $dokumen = Dokumen::with('statistik')->findOrFail($id);
        // Hanya jalankan validasi jika dokumen memiliki relasi permohonanInformasi
        if ($dokumen->permohonanInformasi && $dokumen->kategori_info_publik == KategoriPublicEnum::INFORMASI_SEIAP_SAAT) {
            if (request('nik') != $dokumen->permohonanInformasi->nik) {
                return request()->ajax() ? json(['status' => false, 'message' => 'Anda tidak diperbolehkan mengunduh dokumen ini'], 401) : redirect_with('error', 'Anda tidak diperbolehkan mengunduh dokumen ini');
            }
        }

        // Tingkatkan jumlah unduhan
        if ($dokumen->statistik) {
            $dokumen->statistik->increment('download_count');
        } else {
            $dokumen->statistik()->create(['download_count' => 1]);
        }

        // Jika permintaan adalah AJAX, kirim respons JSON
        if (request()->ajax()) {
            if (empty($dokumen->url_file)) {
                return json([
                    'success' => false,
                    'message' => 'Dokumen tidak ditemukan!',
                ], 400);
            }

            return json([
                'success'   => true,
                'downloads' => $dokumen->statistik->download_count ?? 0,
                'file_url'  => $dokumen->url_file,
            ]);
        }

        if (empty($dokumen->url_file)) {
            show_404();
        }

        return redirect($dokumen->url_file);
    }
}
