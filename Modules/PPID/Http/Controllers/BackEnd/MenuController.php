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

use App\Enums\TipeLinkEnum;
use App\Models\Artikel;
use Illuminate\Support\Facades\View;
use Modules\PPID\Models\Menu as MenuModel;

class MenuController extends Admin_Controller
{
    public $modul_ini     = 'ppid';
    public $sub_modul_ini = 'ppid-menu';

    public function __construct()
    {
        parent::__construct();
        isCan('b');
    }

    public function index(): void
    {
        $parent = $this->input->get('parent') ?? 0;
        $status = $this->input->get('status') ?? 1;
        $data   = [
            'listStatus' => [MenuModel::UNLOCK => 'Aktif', MenuModel::LOCK => 'Tidak Aktif'],
            'subtitle'   => $parent > 0 ? '<a href="' . ci_route('ppid.menu.index') . '?parent=0">MENU UTAMA </a> / ' . MenuModel::find($parent)->getSelfParents()->reverse()->map(static fn ($item) => $parent == $item['uuid'] ? strtoupper($item['nama']) : '<a href="' . ci_route('ppid.menu.index') . '?parent=' . $item['uuid'] . '">' . strtoupper($item['nama']) . '</a>')->join(' / ') : '',
            'parent'     => $parent,
            'status'     => $status,
        ];

        view('ppid::backend.menu.index', $data);
    }

    public function datatables()
    {
        if ($this->input->is_ajax_request()) {
            $parent    = $this->input->get('parent') ?? 0;
            $status    = $this->input->get('status') ?? null;
            $canDelete = can('h');
            $canUpdate = can('u');

            return datatables()->of(MenuModel::child($parent)->with(['parent'])->orderBy('urut', 'asc')->when(in_array($status, ['0', '1']), static fn ($q) => $q->where('enabled', $status)))
                ->addColumn('drag-handle', static fn () => '<i class="fa fa-sort-alpha-desc"></i>')
                ->addColumn('ceklist', static function ($row) use ($canDelete) {
                    if ($canDelete) {
                        return '<input type="checkbox" name="id_cb[]" value="' . $row->uuid . '"/>';
                    }
                })
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) use ($parent, $canUpdate, $canDelete): string {
                    $aksi  = '';
                    $judul = $parent > 0 ? 'Submenu' : 'Menu';
                    if ($canUpdate) {

                        $aksi .= View::make('admin.layouts.components.tombol_detail', [
                            'url'   => ci_route('ppid.menu.index') . '?parent=' . $row->uuid,
                            'judul' => 'Submenu',
                        ])->render();

                        $aksi .= '<a href="' . ci_route('ppid.menu.ajax_menu', implode('/', [$row->parent->uuid ?? $parent, $row->uuid])) . '" class="btn bg-orange btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah ' . $judul . '" title="Ubah"><i class="fa fa-edit"></i></a> ';
                        if ($row->isActive()) {
                            $aksi .= '<a href="' . ci_route('ppid.menu.lock', implode('/', [$row->parent->uuid ?? $parent, $row->uuid])) . '" class="btn bg-navy btn-sm" title="Nonaktifkan"><i class="fa fa-unlock">&nbsp;</i></a> ';
                        } else {
                            $aksi .= '<a href="' . ci_route('ppid.menu.lock', implode('/', [$row->parent->uuid ?? $parent, $row->uuid])) . '" class="btn bg-navy btn-sm" title="Aktifkan"><i class="fa fa-lock"></i></a> ';
                        }
                    }

                    if ($canDelete) {
                        $aksi .= '<a href="#" data-href="' . ci_route('ppid.menu.delete', implode('/', [$row->parent->uuid ?? $parent, $row->uuid])) . '" class="btn bg-maroon btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> ';
                    }

                    return $aksi;
                })->editColumn('link', static fn ($row) => '<a href="' . $row->linkUrl . '" target="_blank">' . $row->linkUrl . '</a>' )
                ->editColumn('nama', static fn ($row) => html_entity_decode($row->nama))
                ->rawColumns(['drag-handle', 'aksi', 'ceklist', 'link'])
                ->make();
        }

        return show_404();
    }

    public function ajax_menu($parent, $id = ''): void
    {
        isCan('u');
        $menu                   = new MenuModel();
        $data['link_tipe']      = [TipeLinkEnum::ARTIKEL_STATIS => TipeLinkEnum::valueOf(TipeLinkEnum::ARTIKEL_STATIS), TipeLinkEnum::EKSTERNAL => TipeLinkEnum::valueOf(TipeLinkEnum::EKSTERNAL)];
        $data['artikel_statis'] = Artikel::select(['id', 'judul'])->statis()->get()->toArray();

        if ($id) {
            $data['menu']        = MenuModel::findOrFail($id)->toArray();
            $data['form_action'] = ci_route("ppid.menu.update.{$parent}.{$id}");
            $data['menu_utama']  = $menu->buildArray($menu->tree());
        } else {
            $data['menu']        = null;
            $data['form_action'] = ci_route("ppid.menu.insert.{$parent}");
        }
        view('ppid::backend.menu.ajax_form', $data);
    }

    public function insert($parent): void
    {
        isCan('u');
        $data            = $this->validasi($this->input->post(), $parent);
        $data['parrent'] = $parent;

        try {
            MenuModel::create($data);
            // TODO:: hapus cache hanya prefix *_admin_menu
            cache()->forget('menu_ppid');
            redirect_with('success', 'Menu berhasil disimpan', ci_route('ppid.menu.index') . '?parent=' . $parent);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            redirect_with('error', 'Menu gagal disimpan', ci_route('ppid.menu.index') . '?parent=' . $parent);
        }
    }

    public function update($parent, $id): void
    {
        isCan('u');
        $data = $this->validasi($this->input->post(), $parent, $id);

        try {
            $obj = MenuModel::findOrFail($id);
            $obj->update($data);
            cache()->forget('menu_ppid');
            redirect_with('success', 'Menu berhasil disimpan', ci_route('ppid.menu.index') . '?parent=' . $parent);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            redirect_with('error', 'Menu gagal disimpan', ci_route('ppid.menu.index') . '?parent=' . $parent);
        }
    }

    public function delete($parent, $id = null): void
    {
        isCan('h');

        if (MenuModel::whereIn('uuid', $this->request['id_cb'] ?? [$id] )->whereHas('children')->count()) {
            redirect_with('error', 'Menu tidak dapat dihapus karena masih memiliki submenu');
        }

        try {
            MenuModel::destroy($this->request['id_cb'] ?? $id);
            cache()->forget('menu_ppid');
            redirect_with('success', 'Menu berhasil dihapus', ci_route('ppid.menu.index') . '?parent=' . $parent);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            redirect_with('error', 'Menu gagal dihapus', ci_route('ppid.menu.index') . '?parent=' . $parent);
        }
    }

    public function lock($parent, $id): void
    {
        isCan('h');

        try {
            MenuModel::gantiStatus($id, 'enabled');
            cache()->forget('menu_ppid');
            redirect_with('success', 'Berhasil ubah status', ci_route('ppid.menu.index') . '?parent=' . $parent);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
            redirect_with('error', 'Gagal ubah status', ci_route('ppid.menu.index') . '?parent=' . $parent);
        }
    }

    public function tukar()
    {
        isCan('u');
        $menu = $this->input->post('data');
        MenuModel::setNewOrder($menu);
        cache()->forget('menu_ppid');

        return json(['status' => 1]);
    }

    private function validasi($post, $parent = null, $id = null): array
    {
        $cek = MenuModel::where('link', $post['link'])->where('uuid', '!=', $id)->first();

        if ($cek && $post['link_tipe'] != TipeLinkEnum::EKSTERNAL) {

            if ($cek->parrent) {
                $link = ci_route('ppid.menu.index') . '?parent=' . $cek->parrent . '&status=';
            } else {
                $link = ci_route('ppid.menu') . '?status=';
            }
            redirect_with('error', 'Link sudah digunakan', $link);
        }

        $parrent = $post['parrent'] ?? 0;

        return [
            'nama'      => htmlentities($post['nama']),
            'link'      => $post['link'],
            'parrent'   => $parrent,
            'link_tipe' => $post['link_tipe'],
            'enabled'   => $post['enabled'] ?? 0,
        ];
    }
}
