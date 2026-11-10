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

use App\Enums\StatusEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class PengaturanController extends BaseController
{
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-pengaturan';    

    public function __construct()
    {
        parent::__construct();                
    }

    public function index()
    {
        if (request()->ajax()) {            
            $canUpdate = can('u');
            $canDelete = can('h');
            return datatables()->of(Tahun::query())            
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) use ($canDelete, $canUpdate) {
                    $aksi = '';                    
                    if($canUpdate) {
                        $aksi .= '<a href="' . route('data-presisi.pengaturan.salin-form', $row->uuid). '" class="btn btn-sm btn-primary btn-salin" title="Salin"><i class="fa fa-copy"></i></a> ';
                        if($row->status == StatusEnum::TIDAK) {                            
                            $aksi .= '<a href="' . route('data-presisi.pengaturan.lock', $row->uuid) . '" class="btn btn-sm btn-success" title="Status" ><i class="fa fa-check-square-o"></i></a> ';
                        }                        
                    }
                    if($canDelete && $row->status == StatusEnum::TIDAK) {   
                        $aksi .= ' <a href="#" data-href="' . route('data-presisi.pengaturan.delete', $row->uuid) . '" class="btn bg-maroon btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>';                        
                    }
                    return $aksi;
                })->editColumn('status', function ($row) {
                    return $row->status == StatusEnum::YA ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Non Aktif</span>';
                })
                ->rawColumns(['aksi', 'status'])
                ->make();
        }        
        $data = [
            'tahunAktif' => Tahun::active()->first(),
        ];
        return view('datapresisi::backend.pengaturan.index', $data);
    }    

    public function lock($id = 0): void
    {
        isCan('u');
        // tidak bisa menggunakan method gantiStatus, karena belum support kolom uuid
        if (Tahun::gantiStatus($id, 'status')) {
            $statusSekarang = Tahun::where('uuid', $id)->first()->status;
            // Set status tahun lain menjadi tidak aktif
            Tahun::where('uuid', '!=', $id)->update(['status' => !($statusSekarang ? StatusEnum::YA : StatusEnum::TIDAK)]);
            redirect_with('success', 'Berhasil Ubah Status', route('data-presisi.pengaturan.index'));
        }

        redirect_with('error', 'Gagal Ubah Status', route('data-presisi.pengaturan.index'));
    }

    public function delete($id): void
    {
        isCan('h');        
        
        if (Tahun::destroy($id ) !== 0) {
            redirect_with('success', 'Berhasil Hapus Data', route('data-presisi.pengaturan.index'));
        }
        redirect_with('error', 'Gagal Hapus Data', route('data-presisi.pengaturan.index'));
    }

    public function salinForm($id)
    {
        isCan('u');

        $tahun = Tahun::find($id);
        if (!$tahun) {
            redirect_with('error', 'Data tidak ditemukan', route('data-presisi.pengaturan.index'));
        }
        
        return view('datapresisi::backend.pengaturan.form', [
            'tahun' => $tahun,
        ]);
    }
    public function salin($id): void
    {
        isCan('u');
        $tahun = request()->input('tahun');
        if(Tahun::where('tahun', $tahun)->exists()) {
            redirect_with('error', 'Tahun sudah ada', route('data-presisi.pengaturan.index'));
        }

        DB::beginTransaction();
        
        try {
            $tahunBaru = Tahun::create([
                'tahun' => $tahun,
                'status' => StatusEnum::TIDAK,
            ]);

            // Use Laravel Query Builder to copy data for all 10 presisi fields with config_id restriction
            $this->copyPresisiDataWithQuery('data_presisi_pangan', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_kesehatan', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_sandang', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_papan', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_pendidikan', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_ketenagakerjaan', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_jaminan_sosial', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_aktivitas_adat', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_aktivitas_agama', $id, $tahunBaru->uuid);
            $this->copyPresisiDataWithQuery('data_presisi_seni_budaya', $id, $tahunBaru->uuid);

            DB::commit();
            
            if ($tahunBaru) {
                redirect_with('success', 'Berhasil Salin Data', route('data-presisi.pengaturan.index'));
            } else {
                redirect_with('error', 'Gagal Salin Data', route('data-presisi.pengaturan.index'));
            }
        } catch (\Exception $e) {            
            DB::rollback();
            Log::error('Salin data pertahun', [
                'file' => __FILE__,
                'method'  => __METHOD__,
                'message' => $e->getMessage()
            ]);
            redirect_with('error', 'Gagal Salin Data: ' . $e->getMessage(), route('data-presisi.pengaturan.index'));
        }
    }

    private function copyPresisiDataWithQuery($tableName, $oldTahunId, $newTahunId): void
    {                
        // Get the current config_id
        $currentConfigId = identitas('id');
        
        // Get all column names for the table to build dynamic query
        $columnsResult = DB::select("SELECT COLUMN_NAME
                                   FROM INFORMATION_SCHEMA.COLUMNS
                                   WHERE TABLE_NAME = ?
                                   AND TABLE_SCHEMA = DATABASE()
                                   ORDER BY ORDINAL_POSITION", [$tableName]);
        
        $allColumns = array_map(function($col) {
            return $col->COLUMN_NAME;
        }, $columnsResult);
        
        // Build the SELECT part dynamically
        $selectParts = [];
        foreach ($allColumns as $column) {
            if ($column === 'uuid') {
                $selectParts[] = 'UUID()';
            } elseif ($column === 'data_presisi_tahun_id') {
                $selectParts[] = '?';
            } elseif ($column === 'created_at' || $column === 'updated_at') {
                $selectParts[] = 'NOW()';
            } else {
                $selectParts[] = $column;
            }
        }
        
        $selectClause = implode(', ', $selectParts);
        $columnList = implode(', ', $allColumns);
        $query = "INSERT INTO {$tableName} ({$columnList})
                      SELECT {$selectClause}
                      FROM {$tableName}
                      WHERE data_presisi_tahun_id = ? AND config_id = ?";
        //Log::error('sql', ['query' => $query]);                      
        // Execute the copy query limited to current config_id
        DB::statement($query,
                     [$newTahunId, $oldTahunId, $currentConfigId]);
    }
}
