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

use Modules\PPID\Enums\TindakLanjutEnum;
use Modules\PPID\Models\PermohonanInformasi;

defined('BASEPATH') || exit('No direct script access allowed');

class PermohonanInformasiController extends AdminModulController
{
    public $modul_ini     = 'ppid';
    public $sub_modul_ini = 'ppid-permohonan-informasi';
    // public $aliasController = 'ppid';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $tindak_lanjut_options = TindakLanjutEnum::all();

        return view('ppid::backend.permohonan_informasi.index', compact('tindak_lanjut_options'));
    }

    public function datatables()
    {
        if (request()->ajax()) {
            $tindakLanjut = request('tindak_lanjut', TindakLanjutEnum::DIAJUKAN);

            return datatables()->of(PermohonanInformasi::tindakLanjut($tindakLanjut))
                ->addIndexColumn()
                ->addColumn('ceklist', static fn ($row) => '<input type="checkbox" name="id_cb[]" value="' . $row->uuid . '"/>')
                ->addColumn('aksi', static function ($row): string {
                    $aksi = '';

                    if (can('u')) {
                        if ($row->tindak_lanjut == TindakLanjutEnum::DIAJUKAN) {
                            $aksi .= '<a href="#" data-uuid="' . $row->uuid . '" class="btn bg-blue btn-sm process-btn" title="Proses"><i class="fa fa-arrow-right"></i></a> ';
                            $aksi .= '<a href="#" data-uuid="' . $row->uuid . '" class="btn bg-maroon btn-sm reject-btn" title="Tolak"><i class="fa fa-ban"></i></a> ';
                        } elseif ($row->tindak_lanjut == TindakLanjutEnum::DIPROSES) {
                            $aksi .= '<a href="#" data-uuid="' . $row->uuid . '" class="btn bg-green btn-sm finish-btn" title="Selesai"><i class="fa fa-check"></i></a> ';
                        }
                    }

                    return $aksi;
                })
                ->editColumn('tindak_lanjut', static function ($row) {
                    $status = TindakLanjutEnum::all()[$row->tindak_lanjut] ?? 'Unknown';

                    $labelClass = match ($row->tindak_lanjut) {
                        TindakLanjutEnum::DIAJUKAN => 'label-warning',
                        TindakLanjutEnum::DIPROSES => 'label-primary',
                        TindakLanjutEnum::DITOLAK  => 'label-danger',
                        TindakLanjutEnum::SELESAI  => 'label-success',
                        default                    => 'label-info',
                    };

                    return '<span class="label ' . $labelClass . '">' . $status . '</span>';
                })
                ->rawColumns(['ceklist', 'aksi', 'tindak_lanjut'])
                ->make();
        }

        return show_404();
    }

    public function update(string $uuid)
    {
        isCan('u');

        $data = $this->validated(request(), [
            'tindak_lanjut' => 'required|in:' . implode(',', TindakLanjutEnum::keys()),
        ]);

        $updateCondition = match ($data['tindak_lanjut']) {
            TindakLanjutEnum::DIPROSES => 'tindak_lanjut = "' . TindakLanjutEnum::DIAJUKAN . '"',
            TindakLanjutEnum::DITOLAK  => 'tindak_lanjut = "' . TindakLanjutEnum::DIAJUKAN . '"',
            TindakLanjutEnum::SELESAI  => 'tindak_lanjut = "' . TindakLanjutEnum::DIPROSES . '"',
            default                    => '',
        };

        $messages = [
            TindakLanjutEnum::DIPROSES => 'Berhasil Proses Permohonan',
            TindakLanjutEnum::SELESAI  => 'Berhasil Selesai Permohonan',
            TindakLanjutEnum::DITOLAK  => 'Berhasil Tolak Permohonan',
        ];

        if (PermohonanInformasi::whereRaw($updateCondition)->findOrFail($uuid)->update(['tindak_lanjut' => $data['tindak_lanjut']])) {
            return json(['success' => true, 'message' => $messages[$data['tindak_lanjut']]]);
        }

        return json(['success' => false, 'message' => 'Gagal Update Tindak Lanjut']);
    }

    public function updateTindakLanjutAll(string $tindak_lanjut): void
    {
        isCan('u');

        $updateCondition = match ($tindak_lanjut) {
            TindakLanjutEnum::DIPROSES => 'tindak_lanjut = "' . TindakLanjutEnum::DIAJUKAN . '"',
            TindakLanjutEnum::DITOLAK  => 'tindak_lanjut = "' . TindakLanjutEnum::DIAJUKAN . '"',
            TindakLanjutEnum::SELESAI  => 'tindak_lanjut = "' . TindakLanjutEnum::DIPROSES . '"',
            default                    => '',
        };

        if (! empty($updateCondition)) {
            $affectedRows = 0;

            foreach ($this->request['id_cb'] as $uuid) {
                $affectedRows += PermohonanInformasi::whereRaw($updateCondition)->update(['tindak_lanjut' => $tindak_lanjut]);
            }

            $messages = [
                TindakLanjutEnum::DIPROSES => 'Berhasil Proses ' . $affectedRows . ' Permohonan',
                TindakLanjutEnum::SELESAI  => 'Berhasil Selesai ' . $affectedRows . ' Permohonan',
                TindakLanjutEnum::DITOLAK  => 'Berhasil Tolak ' . $affectedRows . ' Permohonan',
            ];

            redirect_with('success', $messages[$tindak_lanjut] ?? 'Berhasil Update Tindak Lanjut', ci_route('ppid.permohonan-informasi'));
        }
    }
}
