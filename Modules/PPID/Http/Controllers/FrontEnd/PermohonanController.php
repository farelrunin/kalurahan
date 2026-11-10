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
use Modules\PPID\Http\Controllers\FrontEnd\PPIDController;
use Modules\PPID\Models\PermohonanInformasi;

defined('BASEPATH') || exit('No direct script access allowed');

class PermohonanController extends PPIDController
{
    protected $settingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->settingRepository = new SettingAplikasiRepository();
    }

    public function formPermohonan()
    {
        if (! setting('ppid_aktifkan_permohonan')) {
            return redirect_with('error', 'Form permohonan belum aktif.', ci_route('ppid'));
        }

        $cara_memperoleh_informasi = $this->settingRepository->firstByKey('ppid_cara_memperoleh_informasi');

        $cara_mendapat_salinan_informasi = $this->settingRepository->firstByKey('ppid_mendapat_salinan_informasi');

        $filtered_options          = collect($cara_memperoleh_informasi->option)->whereIn('id', json_decode($cara_memperoleh_informasi->value, true));

        $filtered_mendapat_salinan_options          = collect($cara_mendapat_salinan_informasi->option)->whereIn('id', json_decode($cara_mendapat_salinan_informasi->value, true));

        return view('ppid::frontend.form-permohonan', compact('cara_memperoleh_informasi','cara_mendapat_salinan_informasi', 'filtered_options', 'filtered_mendapat_salinan_options'));
    }

    public function simpanPermohonan()
    {
        if (! setting('ppid_aktifkan_permohonan')) {
            return json(['status' => 'error', 'message' => 'Form permohonan belum aktif.'], 422);
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
            'cara_memperoleh_informasi'   => 'required|string',
            'cara_mendapat_salinan_informasi'   => 'required|string',
            'informasi_yang_dibutuhkan'   => 'required|string',
            'tujuan_penggunaan_informasi' => 'required|string',
        ]);

        if (PermohonanInformasi::diajukan()->where('telp_email', request('no_telp_email'))->count() >= setting('ppid_batas_permohonan_informasi_diajukan')) {
            return json(['status' => 'error', 'message' => 'Anda sudah mencapai batas maksimal permohonan. ' . setting('ppid_batas_permohonan_informasi_diajukan') . ' permohonan dengan status diajukan.'], 422);
        }

        if (PermohonanInformasi::create($validatedData)) {
            return json(['status' => 'success', 'message' => 'Berhasil Kirim Permohonan'], 201);
        }

        return json(['status' => 'error', 'message' => 'Gagal Kirim Permohonan'], 500);
    }

    public function statusPermohonan()
    {
        if (! setting('ppid_aktifkan_permohonan')) {
            return redirect_with('error', 'Form permohonan belum aktif.', ci_route('ppid'));
        }

        $captcha = new Captcha();
        if (! $captcha->check(request('captcha_code'))) {
            return redirect_with('error', 'Kode captcha anda salah. Silakan ulangi lagi.', ci_route('ppid.form-permohonan'));
        }

        $permohonan = PermohonanInformasi::where('telp_email', request('no_telp_email_nik'))
            ->orWhere('nik', request('no_telp_email_nik'))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('ppid::frontend.status-permohonan', compact('permohonan'));
    }
}
