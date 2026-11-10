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

use Modules\PPID\Models\PermohonanKeberatan;

defined('BASEPATH') || exit('No direct script access allowed');

class PermohonanKeberatanController extends AdminModulController
{
    public $modul_ini     = 'ppid';
    public $sub_modul_ini = 'ppid-permohonan-keberatan';
    // public $aliasController = 'ppid';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('ppid::backend.permohonan_keberatan.index');
    }

    public function datatables()
    {
        if (request()->ajax()) {
            return datatables()->of(PermohonanKeberatan::with('permohonanInformasi'))
                ->addIndexColumn()
                ->addColumn('ceklist', static fn ($row) => '<input type="checkbox" name="id_cb[]" value="' . $row->uuid . '"/>')
                ->addColumn('aksi', static function ($row): string {
                    $aksi = '';

                    if (can('u')) {
                        if ($row->tindak_lanjut == null) {
                            $aksi .= '<a href="#" data-uuid="' . $row->uuid . '" class="btn bg-blue btn-sm tindak-lanjut-btn" title="Tindak Lanjut"><i class="fa fa-arrow-right"></i></a> ';
                        }
                    }

                    return $aksi;
                })
                ->rawColumns(['ceklist', 'aksi'])
                ->make();
        }

        return show_404();
    }

    public function update(string $uuid)
    {
        isCan('u');

        $data = $this->validated(request(), [
            'tindak_lanjut' => 'required|string',
        ]);

        if (PermohonanKeberatan::findOrFail($uuid)->update(['tindak_lanjut' => $data['tindak_lanjut']])) {
            return json(['success' => true, 'message' => 'Berhasil Update Tindak Lanjut']);
        }

        return json(['success' => false, 'message' => 'Gagal Update Tindak Lanjut']);
    }

    public function updateTindakLanjutAll(): void
    {
        isCan('u');

        $affectedRows = 0;

        foreach ($this->request['id_cb'] as $uuid) {
            $affectedRows += PermohonanKeberatan::findOrFail($uuid)->update(['tindak_lanjut' => request('tindak_lanjut')]);
        }

        redirect_with('success', 'Berhasil Update Tindak Lanjut ' . $affectedRows . ' Permohonan', ci_route('ppid.permohonan-keberatan'));
    }
}
