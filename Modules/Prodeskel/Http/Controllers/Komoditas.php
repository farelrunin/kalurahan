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

namespace Modules\Prodeskel\Http\Controllers;

use AdminModulController;
use App\Models\Pamong;
use Modules\Prodeskel\Models\Komoditas as KomoditasModel;

class Komoditas extends AdminModulController
{
    public $modul_ini       = 'prodeskel';
    public $aliasController = 'prodeskel';
    public $sub_modul_ini   = 'prodeskel-potensi';
    protected $kategori     = 'potensi-sda';
    protected $activeMenu   = [];
    protected $jenisKategori;
    protected $jenisKomoditas;
    protected $jenisObj;
    protected $pathRoute;
    protected $viewFolder;
    private $readonlyForm = false;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $dataObjs = $this->jenisObj->get();

        return view('prodeskel::potensi.' . $this->viewFolder . '.index', ['kategori' => $this->kategori, 'dataObjs' => $dataObjs, 'activeMenu' => $this->activeMenu]);
    }

    public function form($id = null)
    {
        isCan('u');
        $data['default'] = ['tahun' => (int) date('Y')];
        if ($id) {
            $potensi             = KomoditasModel::findOrFail($id);
            $data['action']      = 'Ubah';
            $data['form_action'] = ci_route('prodeskel.' . $this->pathRoute . '.update', $id);
            $data['default']     = array_merge($data['default'], $potensi->data);
        } else {
            $data['action']      = 'Tambah';
            $data['form_action'] = ci_route('prodeskel.' . $this->pathRoute . '.insert');
        }
        $data['readonlyForm'] = $this->readonlyForm;

        return view('prodeskel::potensi.' . $this->viewFolder . '.form', $data);
    }

    public function show($id)
    {
        $this->readonlyForm = true;

        return $this->form($id);
    }

    public function insert(): void
    {
        isCan('u');
        $data['kategori']  = $this->jenisKategori;
        $data['data']      = $this->request;
        $data['tahun']     = $data['data']['tahun'];
        $data['komoditas'] = $data['data'][$this->jenisKomoditas];
        $sudahAda          = $this->jenisObj->where(['tahun' => $data['tahun'], 'komoditas' => $data['komoditas']])->count();
        if ($sudahAda) {
            redirect_with('error', 'Data komoditas ' . get_nama_kategori($this->jenisKategori) . ' yang dipilih untuk periode tahun ' . $data['tahun'] . ' sudah ada', ci_route('prodeskel.' . $this->pathRoute . '.form'));
        }
        if (KomoditasModel::create($data)) {
            redirect_with('success', 'Berhasil Tambah Data', ci_route('prodeskel.' . $this->pathRoute));
        }
        redirect_with('error', 'Gagal Tambah Data', ci_route('prodeskel.' . $this->pathRoute . '.form'));
    }

    public function update($id = null): void
    {
        isCan('u');

        $potensi            = KomoditasModel::findOrFail($id);
        $potensi->data      = $this->request;
        $potensi->komoditas = $this->request[$this->jenisKomoditas];
        $potensi->tahun     = $this->request['tahun'];
        $sudahAda           = $this->jenisObj->where('id', '!=', $id)->where(['tahun' => $this->request['tahun'], 'komoditas' => $this->request[$this->jenisKomoditas]])->count();
        if ($sudahAda) {
            redirect_with('error', 'Data komoditas ' . get_nama_kategori($this->jenisKategori) . ' yang dipilih untuk periode tahun ' . $this->request['tahun'] . ' sudah ada', ci_route('prodeskel.' . $this->pathRoute . '.form.' . $id));
        }
        if ($potensi->save()) {
            redirect_with('success', 'Berhasil Ubah Data', ci_route('prodeskel.' . $this->pathRoute));
        }
        redirect_with('error', 'Gagal Ubah Data', ci_route('prodeskel.' . $this->pathRoute . '.form.' . $id));
    }

    public function delete($id = null): void
    {
        isCan('h');

        if (KomoditasModel::destroy($id ?? $this->request['id_cb']) !== 0) {
            redirect_with('success', 'Berhasil Hapus Data', ci_route('prodeskel.' . $this->pathRoute));
        }
        redirect_with('error', 'Gagal Hapus Data', ci_route('prodeskel.' . $this->pathRoute));
    }

    public function dialog($aksi = 'cetak'): void
    {
        $data                = $this->modal_penandatangan();
        $data['aksi']        = ucwords($aksi);
        $data['form_action'] = ci_route('prodeskel.' . $this->pathRoute . '.daftar.' . $aksi);

        view('admin.layouts.components.ttd_pamong', $data);
    }

    public function daftar($aksi = 'cetak'): void
    {
        $data['aksi']           = $aksi;
        $data['config']         = $this->header['desa'];
        $data['input']          = $this->input->post();
        $data['config']         = $this->header['desa'];
        $data['pamong_ttd']     = Pamong::selectData()->where(['pamong_id' => $this->input->post('pamong_ttd')])->first()->toArray();
        $data['pamong_ketahui'] = Pamong::selectData()->where(['pamong_id' => $this->input->post('pamong_ketahui')])->first()->toArray();
        $data['isi']            = 'prodeskel::potensi.' . $this->viewFolder . '.cetak';
        $data['letak_ttd']      = ['1', '1', '1'];
        $data['file']           = $this->jenisKategori . '_' . date('YmdHis');
        $data['dataObjs']       = $this->jenisObj->get();

        view('admin.layouts.components.format_cetak', $data);
    }
}
