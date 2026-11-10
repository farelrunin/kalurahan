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

use App\Libraries\Captcha;
use App\Repositories\SettingAplikasiRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Modules\PPID\Http\Controllers\FrontEnd\PPIDController;
use Modules\PPID\Models\PermohonanInformasi;
use Modules\PPID\Models\PermohonanKeberatan;

defined('BASEPATH') || exit('No direct script access allowed');

class PermohonanKeberatanController extends PPIDController
{
    protected $settingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->settingRepository = new SettingAplikasiRepository();
    }

    public function formKeberatan()
    {
        if (! setting('ppid_aktifkan_permohonan_keberatan')) {
            return redirect_with('error', 'Form permohonan keberatan belum aktif.', ci_route('ppid'));
        }

        $alasan_keberatan = $this->settingRepository->firstByKey('ppid_permohonan_keberatan');
        $filtered_options = collect($alasan_keberatan->option)->whereIn('id', json_decode($alasan_keberatan->value, true));

        return view('ppid::frontend.form-keberatan', compact('alasan_keberatan', 'filtered_options'));
    }

    public function cariPermohonanInformasi()
    {
        $permohonan = PermohonanInformasi::select('informasi_yang_dibutuhkan', 'tindak_lanjut as status', DB::raw('IF(created_at = updated_at, "", updated_at) as tindak_lanjut_pada'), 'uuid')
            ->where('nik', request('nik'))
            ->get();

        return json(['status' => 'success', 'data' => $permohonan, 'nik' => request('nik')]);
    }

    public function simpanKeberatan()
    {
        if (! setting('ppid_aktifkan_permohonan_keberatan')) {
            return json(['status' => 'error', 'message' => 'Form permohonan keberatan belum aktif.'], 422);
        }

        $captcha = new Captcha();
        if (! $captcha->check(request('captcha_code'))) {
            return json(['status' => 'error', 'message' => 'Kode captcha anda salah. Silakan ulangi lagi.'], 422);
        }

        $validatedData = $this->validated(request(), [
            'nik'                         => 'required|int|digits:16',
            'nama'                        => 'required|string',
            'alamat'                      => 'required|string',
            'pekerjaan'                   => 'required|string',
            'telp_email'                  => 'required|string',
            'alasan_keberatan'            => 'required|string',
            'tujuan_penggunaan_informasi' => 'required|string',
            'kuasa_nama'                  => 'nullable|string',
            'kuasa_pekerjaan'             => 'nullable|string',
            'kuasa_alamat'                => 'nullable|string',
            'kuasa_kasus_posisi'          => 'nullable|string',
            'permohonan_informasi_uuid'     => ['required', 'string', Rule::exists('ppid_permohonan_informasi', 'uuid')->where('nik', request('nik'))],
        ]);

        if (PermohonanKeberatan::where('permohonan_informasi_uuid', request('permohonan_informasi_uuid'))->count() >= 1) {
            return json(['status' => 'error', 'message' => 'Anda sudah mengajukan permohonan keberatan pada permohonan informasi ini.'], 422);
        }

        if (PermohonanKeberatan::create($validatedData)) {
            return json(['status' => 'success', 'message' => 'Berhasil Kirim Permohonan Keberatan'], 201);
        }

        return json(['status' => 'error', 'message' => 'Gagal Kirim Permohonan Keberatan'], 500);
    }

    public function daftarKeberatan()
    {
        if (! setting('ppid_aktifkan_permohonan_keberatan')) {
            return redirect_with('error', 'Form permohonan keberatan belum aktif.', ci_route('ppid'));
        }

        $captcha = new Captcha();
        if (! $captcha->check(request('captcha_code'))) {
            return redirect_with('error', 'Kode captcha anda salah. Silakan ulangi lagi.', ci_route('ppid.form-keberatan'));
        }

        $permohonan = PermohonanKeberatan::with('permohonanInformasi')
            ->where('nik', request('nik'))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ppid::frontend.daftar-keberatan', compact('permohonan'));
    }
}
