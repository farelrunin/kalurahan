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

use App\Repositories\SettingAplikasiRepository;
use App\Traits\Upload;

defined('BASEPATH') || exit('No direct script access allowed');

class PengaturanController extends AdminModulController
{
    use Upload;

    public $modul_ini       = 'ppid';
    public $sub_modul_ini   = 'ppid-pengaturan';
    public $aliasController = 'ppid';
    protected $settingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->settingRepository = new SettingAplikasiRepository();
    }

    public function index()
    {
        $settings = $this->settingRepository->getByKategori('ppid');

        return view('ppid::backend.pengaturan.index', [
            'list_setting'        => $settings,
            'pengaturan_kategori' => ['ppid'],
        ]);
    }

    public function ambilBanner(): void
    {
        $file = is_file($banner = config('ppid.path.pengaturan') . setting('ppid_banner'))
            ? $banner
            : config('ppid.file.default_banner');

        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        readfile($file);
    }

    public function simpanPengaturan()
    {
        isCan('u');

        $hasil              = true;
        $multiSelectDynamic = ['ppid_permohonan_keberatan', 'ppid_cara_memperoleh_informasi'];

        foreach ($this->input->post() as $key => $value) {
            if ($this->settingRepository->firstByKey($key)->value != $value) {
                if (in_array($key, $multiSelectDynamic)) {
                    $options = array_map(static fn ($k, $v) => ['id' => strtolower(fixTag($k)), 'nama' => SebutanDesa(fixTag($v))], array_keys($value['options']), $value['options']);
                    unset($value['options']);
                    $value          = array_map('strtolower', array_map('fixTag', array_values($value)));
                    $option         = $this->settingRepository->firstByKey($key);
                    $option->option = $options;
                    $option->value  = $value;
                    $option->save();
                } else {
                    $hasil = $hasil && $this->settingRepository->updateWithKey($key, $value);
                }
            }
        }

        if ($hasil) {
            set_session('success', 'Berhasil Ubah Data');
        } else {
            set_session('error', 'Gagal Ubah Data. ' . session('flash_error_msg'));
        }

        $this->settingRepository->flushCache();

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function simpanBanner()
    {
        $bannerLama = setting('ppid_banner');
        $upload     = $this->upload('ppid_banner', [
            'upload_path'   => config('ppid.path.pengaturan'),
            'allowed_types' => 'jpg|jpeg|png',
            'max_size'      => 2048,
            'file_name'     => 'ppid_banner',
        ], 'ppid/pengaturan');

        $ppidBanner = $this->settingRepository->updateWithKey('ppid_banner', $upload);

        if ($ppidBanner) {
            if ($bannerLama !== $upload) {
                $file = config('ppid.path.pengaturan') . $bannerLama;
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            set_session('success', 'Berhasil Ubah Data');
        } else {
            set_session('error', 'Gagal Ubah Data. ' . session('flash_error_msg'));
        }

        $this->settingRepository->flushCache();

        redirect($_SERVER['HTTP_REFERER']);
    }
}
