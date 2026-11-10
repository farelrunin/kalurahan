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
use Modules\Prodeskel\Models\Perkembangan as PerkembanganModel;

class Perkembangan extends AdminModulController
{
    public $modul_ini       = 'prodeskel';
    public $aliasController = 'prodeskel';
    public $sub_modul_ini   = 'prodeskel-perkembangan';
    protected $kategori     = '';
    protected $activeMenu   = [];
    protected $jenisKategori;
    protected $jenisObj;
    protected $item;
    protected $pathRoute;
    protected $viewFolder;
    private $readonlyForm   = false;
    protected $selectedMenu = 'penduduk-dan-kepala-keluarga';

    public function __construct()
    {
        parent::__construct();
        $this->jenisObj = PerkembanganModel::whereKategori($this->jenisKategori);
    }

    public function index()
    {
        $dataObjs = $this->jenisObj->get();

        return view('prodeskel::perkembangan.' . $this->viewFolder . '.index', ['child_menu' => $this->selectedMenu, 'dataObjs' => $dataObjs, 'activeMenu' => $this->activeMenu, 'pathRoute' => $this->pathRoute]);
    }

    public function form($id = null)
    {
        isCan('u');
        $config          = identitas();
        $data['default'] = ['bulan' => (int) date('m'), 'tahun' => (int) date('Y'), 'nama_kepala_desa' => $config->nama_kepala_desa];
        if ($id) {
            $perkembangan        = PerkembanganModel::findOrFail($id);
            $data['action']      = 'Ubah';
            $data['form_action'] = ci_route('prodeskel.' . $this->pathRoute . '.update', $id);
            $data['default']     = array_merge($data['default'], $perkembangan->data);
        } else {
            $perkembangan        = $this->jenisObj->orderByDesc('id')->first();
            $data['action']      = 'Tambah';
            $data['form_action'] = ci_route('prodeskel.' . $this->pathRoute . '.insert');
            if ($perkembangan) {
                unset($perkembangan->data['tahun'], $perkembangan->data['bulan']);

                $data['default'] = array_merge($data['default'], $perkembangan->data ?? []);
            }
        }
        $data['readonlyForm'] = $this->readonlyForm;
        $data['pathRoute']    = $this->pathRoute;
        $data['item']         = $this->item;

        return view('prodeskel::perkembangan.' . $this->viewFolder . '.form', $data);
    }

    public function show($id)
    {
        $this->readonlyForm = true;

        return $this->form($id);
    }

    public function insert(): void
    {
        isCan('u');
        $data['kategori'] = $this->jenisKategori;
        $data['data']     = $this->request;
        $data['item']     = $this->request[$this->item] ?? null;
        $data['bulan']    = $data['data']['bulan'];
        $data['tahun']    = $data['data']['tahun'];
        $sudahAda         = $this->jenisObj->where(['tahun' => $data['tahun'], 'bulan' => $data['bulan'], 'item' => $data['item']])->count();
        if ($sudahAda) {
            redirect_with('error', 'Data ' . $this->getNamaKategori($data['item'] ?? $this->jenisKategori) . ' untuk periode tahun ' . $data['tahun'] . ' bulan ' . $data['bulan'] . ' sudah ada', ci_route('prodeskel.' . $this->pathRoute . '.form'));
        }
        if (PerkembanganModel::create($data)) {
            redirect_with('success', 'Berhasil Tambah Data', ci_route('prodeskel.' . $this->pathRoute));
        }
        redirect_with('error', 'Gagal Tambah Data', ci_route('prodeskel.' . $this->pathRoute . '.form'));
    }

    public function update($id = null): void
    {
        isCan('u');

        $perkembangan        = PerkembanganModel::findOrFail($id);
        $perkembangan->data  = $this->request;
        $perkembangan->item  = $this->request[$this->item] ?? null;
        $perkembangan->bulan = $this->request['bulan'];
        $perkembangan->tahun = $this->request['tahun'];
        $sudahAda            = $this->jenisObj->where('id', '!=', $id)->where(['tahun' => $this->request['tahun'], 'bulan' => $this->request['bulan'], 'item' => $perkembangan->item])->count();
        if ($sudahAda) {
            redirect_with('error', 'Data ' . $this->getNamaKategori($perkembangan->item ?? $this->jenisKategori) . ' untuk periode tahun ' . $this->request['tahun'] . ' bulan ' . $this->request['bulan'] . ' sudah ada', ci_route('prodeskel.' . $this->pathRoute . '.form.' . $id));
        }
        if ($perkembangan->save()) {
            redirect_with('success', 'Berhasil Ubah Data', ci_route('prodeskel.' . $this->pathRoute));
        }
        redirect_with('error', 'Gagal Ubah Data', ci_route('prodeskel.' . $this->pathRoute . '.form.' . $id));
    }

    public function delete($id = null): void
    {
        isCan('h');

        if (PerkembanganModel::destroy($id ?? $this->request['id_cb']) !== 0) {
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
        $data['isi']            = 'prodeskel::perkembangan.' . $this->viewFolder . '.cetak';
        $data['letak_ttd']      = ['1', '1', '1'];
        $data['file']           = $this->jenisKategori . '_' . date('YmdHis');
        $data['dataObjs']       = $this->jenisObj->get();

        view('admin.layouts.components.format_cetak', $data);
    }

    protected function getNamaKategori($key)
    {
        return ucwords(str_replace('-', ' ', $key));
    }
}
