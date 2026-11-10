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

use App\Enums\AktifEnum;
use App\Enums\KategoriPublicEnum;
use Modules\PPID\Models\JenisDokumen;

defined('BASEPATH') || exit('No direct script access allowed');

class JenisDokumenController extends AdminModulController
{
    public $modul_ini     = 'ppid';
    public $sub_modul_ini = 'ppid-jenis-dokumen';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('ppid::backend.jenis_dokumen.index', [
            'defaultStatus' => request('status', AktifEnum::AKTIF),
            'status'        => AktifEnum::all(),
        ]);
    }

    public function datatables()
    {
        if (request()->ajax()) {
            $status = request('status');

            return datatables()->of(JenisDokumen::when($status, static function ($query) use ($status) {
                if ($status == 99) {
                    $query->onlyTrashed();
                } else {
                    $query->where('status', $status);
                }
            }))
                ->addIndexColumn()
                ->addColumn('drag-handle', static fn (): string => '<i class="fa fa-sort-alpha-desc"></i>')
                ->addColumn('ceklist', static function ($row) {
                    if (! in_array($row->external_code, KategoriPublicEnum::keys())) {
                        return '<input type="checkbox" name="id_cb[]" value="' . $row->id . '"/>';
                    }
                })
                ->addColumn('aksi', static function ($row) use($status): string {
                    $aksi = '';

                    if($status == 99) {
                        $aksi .= '<a href="#" data-id="' . $row->id . '" class="btn bg-purple btn-sm restore-btn" title="Pulihkan"><i class="fa fa-undo"></i></a> ';
                        if (can('h')) {
                            $aksi .= '<a href="#" data-href="#' . $row->id . '" data-id="' . $row->id . '" class="btn bg-maroon btn-sm btn-delete-permanen" title="Hapus Permanen" data-toggle="modal" data-target="#confirm-delete-permanen"><i class="fa fa-trash-o"></i></a> ';
                        }
                    } else {
                        
                        if (can('u')) {
                            $aksi .= '<a href="#" data-id="' . $row->id . '" class="btn bg-orange btn-sm edit-btn" title="Ubah"><i class="fa fa-edit"></i></a> ';
                            if ($row->status == '0') {
                                $aksi .= '<a href="#" data-id="' . $row->id . '" class="btn bg-navy btn-sm unlock-btn" title="Aktifkan"><i class="fa fa-lock"></i></a> ';
                            } elseif ($row->status == '1') {
                                $aksi .= '<a href="#" data-id="' . $row->id . '" class="btn bg-navy btn-sm lock-btn" title="Nonaktifkan"><i class="fa fa-unlock"></i></a> ';
                            }
                        }
                        if (can('h') && ! in_array($row->external_code, KategoriPublicEnum::keys())) {
                            $aksi .= '<a href="#" data-href="#' . $row->id . '" data-id="' . $row->id . '" class="btn bg-maroon btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a> ';
                        }
                    }


                    return $aksi;
                })
                ->editColumn('status', static fn ($row) => $row->status == 1
                    ? '<span class="label label-success">Aktif</span>'
                    : '<span class="label label-info">Tidak Aktif</span>')
                ->editColumn('icon_merge', static fn ($row) => '<div class="inline direct-chat-img text-center" style="align-content: space-around;background-color: ' . $row->bgicon . '"><i style="color: white;" class="bi ' . $row->icon . ' fs-1" width="25" height="25"> </i></div>')
                ->rawColumns(['ceklist', 'aksi', 'status', 'drag-handle', 'icon_merge'])
                ->make();
        }

        return show_404();
    }

    public function store()
    {
        $data  = $this->validate($this->request);
        $hasil = true;
        $find  = JenisDokumen::withTrashed()->where('slug', $data['slug'])->first();
        if ($find) {
            $hasil = $hasil && $find->update($data);
            $hasil = $hasil && $find->restore();
        } else {
            $hasil = JenisDokumen::create($data);
        }

        if ($hasil) {
            return json(['success' => true, 'message' => 'Jenis Dokumen berhasil ditambahkan.']);
        }

        return json(['success' => false, 'message' => 'Jenis Dokumen gagal ditambahkan.']);
    }

    public function edit($id)
    {
        $data = JenisDokumen::findOrFail($id);

        return json('data');
    }

    public function update($id)
    {
        $data  = $this->validate(collect(request())->toArray());
        $hasil = JenisDokumen::findOrFail($id);
        if (in_array($hasil['slug'], ['secara-berkala', 'serta-merta', 'tersedia-setiap-saat'])) {
            unset($data['slug']);
        }
        $hasil->update($data);
        if ($hasil) {
            return json(['success' => true, 'message' => 'Jenis Dokumen berhasil diubah.']);
        }

        return json(['success' => false, 'message' => 'Jenis Dokumen gagal diubah.']);
    }

    public function destroy($id)
    {
        if (JenisDokumen::findOrFail($id)->delete()) {
            return json(['success' => true, 'message' => 'Berhasil Hapus Data']);
        }

        return json(['success' => false, 'message' => 'Gagal Hapus Data']);
    }

    public function deleteAll(): void
    {
        isCan('h');

        foreach ($this->request['id_cb'] as $id) {
            JenisDokumen::findOrFail($id)->delete();
        }

        redirect_with('success', 'Berhasil Hapus Data', ci_route('ppid.jenis-dokumen'));
    }

    public function restore($id)
    {
        isCan('u');

        try {
            JenisDokumen::withTrashed()->findOrFail($id)->restore();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());

            return json(['success' => false, 'message' => 'Gagal Pulihkan Data']);
        }

        return json(['success' => true, 'message' => 'Berhasil Pulihkan Data']);
    }

    public function deletePermanen($id)
    {
        isCan('h');

        try {
            JenisDokumen::withTrashed()->findOrFail($id)->forceDelete();
        } catch (Exception $e) {
            log_message('error', $e->getMessage());

            return json(['success' => false, 'message' => 'Gagal Hapus Permanen Data']);
        }

        return json(['success' => true, 'message' => 'Berhasil Hapus Permanen Data']);
    }

    public function toggleLock($id)
    {
        isCan('u');

        try {
            JenisDokumen::updateStatus($id);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());

            return json(['success' => false, 'message' => 'Gagal Ubah Data']);
        }

        return json(['success' => true, 'message' => 'Berhasil Ubah Data']);
    }

    public function tukar()
    {
        $jenisDokumen = $this->input->post('data');

        JenisDokumen::setNewOrder($jenisDokumen);

        return json(['status' => 1]);
    }

    private function validate(array $request = []): array
    {
        return [
            'nama_kategori' => htmlentities((string) $request['nama_kategori']),
            'status'        => htmlentities((string) $request['status']),
            'icon'          => htmlentities((string) $request['icon']),
            'bgicon'        => htmlentities((string) $request['bgicon']),
            'deskripsi'     => htmlentities((string) $request['deskripsi']),
        ];
    }
}
