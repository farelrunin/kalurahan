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

use App\Enums\AgamaEnum;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\PendudukSaja;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\FrekwensiAktivitasKeagamaanEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\AktivitasAgama;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class AktivitasAgamaController extends BaseController
{
    protected $baseRoute = 'data_presisi.aktivitas-agama';
    protected $baseView = 'datapresisi::backend.aktivitas_agama';
    protected $modelName = 'Modules\DataPresisi\Models\AktivitasAgama';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-aktivitas-agama';
    private $readonly   = false;   

    private $tahunAktif;
    public function __construct()
    {
        parent::__construct();        
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingAktivitasAgama();
    }

    public function index()
    {
        if (request()->ajax()) {
            $canUpdate = can('u');                        
            return datatables($this->sumberData())
                ->addIndexColumn()                
                ->addColumn('aksi', static function ($row) use ($canUpdate) {
                    $aksi = '';
                    if ($canUpdate) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.aktivitas-agama', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.aktivitas-agama.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('tgl_daftar', static function ($row) {
                    return $row->tgl_daftar ? tgl_indo($row->tgl_daftar) : '-';
                })
                ->editColumn('tanggal_pengisian', static function ($row) {
                    return $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-';
                })
                ->editColumn('agama_id', static function ($row) {
                    return AgamaEnum::valueOf($row->agama_id);
                })
                ->editColumn('frekwensi_mengikuti_kegiatan_setahun', static function ($row) {
                    return FrekwensiAktivitasKeagamaanEnum::valueOf($row->frekwensi_mengikuti_kegiatan_setahun);
                })
                ->editColumn('status_pengisian', static function ($row) {
                    return $row->status_pengisian ? '<span class="label label-success">Sudah isi</span>' : '<span class="label label-danger">Belum Isi</span>';
                })
                ->editColumn('no_kk', static fn ($row) => '<a href="' . ci_route('rtm.anggota', $row?->rtm?->id) . '"><span>' . $row->no_kk . '</span></a>')
                ->addColumn('status_kelengkapan_badge', static function ($row) {
                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($row->status_kelengkapan);
                    $statusText = StatusKelengkapanEnum::valueOf($row->status_kelengkapan);

                    return '<span class="label ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->filterColumn('no_kk', static fn ($query, $keyword) => $query->whereRaw('rtm.no_kk LIKE ?', ['%' . $keyword . '%']))
                ->filterColumn('nama', static fn ($query, $keyword) => $query->whereRaw('kepala_rtm.nama LIKE ?', ['%' . $keyword . '%']))
                ->rawColumns(['aksi', 'status_pengisian', 'status_kelengkapan_badge', 'no_kk'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.aktivitas_agama.index', $data);
    }

    public function form($id)
    {
        $data = ['defaultBantuan' => null];        
        $aktivitasAgama = AktivitasAgama::with(['rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withOnly(['wilayah', 'keluarga']);
            },            
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->findOrFail($id);        
        $data['aktivitasAgama'] = $aktivitasAgama;
        $data['anggota'] = AktivitasAgama::whereHas('penduduk', static fn($q) => $q->where('id_rtm', $aktivitasAgama->rtm?->no_kk))->with(['penduduk' => static fn($q) => $q->where('id_rtm', $aktivitasAgama->rtm?->no_kk), 'keluarga'])->where(['rtm_id' => $data['aktivitasAgama']->rtm_id, 'data_presisi_tahun_id' => $data['aktivitasAgama']->data_presisi_tahun_id])            
            ->get();        
        
        $data['readonly'] = $this->readonly;
        return view('datapresisi::backend.aktivitas_agama.form', $data);
    }

    public function show($id)
    {
        $this->readonly = true;
        $this->form($id);
    }

    public function update($id)
    {
        isCan('u');

        try {            
            $items = $this->input->post('items');
            $status_kelengkapan = $this->input->post('status_kelengkapan') ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
            DB::beginTransaction();
            foreach ($items as $uuid => $item) {                
                $anggota = AktivitasAgama::with('penduduk')->find($uuid);
                foreach ($item as $key => $value) {
                    if($value == '') {
                        $value = null;
                    }
                    $anggota->$key = $value;                    
                }
                if($anggota->agama_id != $anggota->penduduk->agama_id) {
                    $anggota->penduduk->agama_id = $anggota->agama_id;
                    $anggota->penduduk->save();
                }
                $anggota->tanggal_pengisian = Carbon::now()->toDateString();
                $anggota->status_kelengkapan = $status_kelengkapan;
                $anggota->save();
            }

            DB::commit();

            return json([
                'success' => true,
                'message' => 'Berhasil Ubah Data',
            ]);
        } catch (Exception $e) {
            DB::rollback();

            return json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }  

    private function generateMissingAktivitasAgama(): void
    {
        $aktivitasAgama    = (new AktivitasAgama())->getTable();
        $keluarga = (new Keluarga())->getTable();
        $rtm      = (new Rtm())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $tahunAktif = $this->tahunAktif;

        // Hanya generate untuk RTM dan anggota yang AKTIF
        // Jangan generate ulang data yang sengaja dihapus karena tidak sinkron
        $allAnggota = PendudukSaja::select(
            "rtm.id as rtm_id",
            "{$penduduk}.id_kk AS keluarga_id",
            "{$penduduk}.id as anggota_id",
            "{$penduduk}.agama_id as agama_id"
        )
        ->join("{$rtm} AS rtm", function($join) use ($penduduk, $rtm) {
            $join->on("{$penduduk}.id_rtm", '=', 'rtm.no_kk')
                 ->on("{$penduduk}.config_id", '=', 'rtm.config_id');
        })
        // Join dengan kepala RTM untuk mengecek status kepala
        ->join("{$penduduk} AS kepala_rtm", function($join) use ($penduduk) {
            $join->on('kepala_rtm.id', '=', 'rtm.nik_kepala')
                 ->on('kepala_rtm.config_id', '=', "{$penduduk}.config_id");
        })
        // satu RTM bisa berisi lebih dari 1 keluarga, maka id_kk diambil dari table tweb_penduduk
        // ->leftJoin("{$keluarga} AS keluarga", "rtm.nik_kepala", '=', 'keluarga.nik_kepala')
        ->leftJoin($aktivitasAgama, function($join) use ($aktivitasAgama, $penduduk, $tahunAktif) {
            return $join->on($aktivitasAgama.'.rtm_id', '=' , 'rtm.id')
                ->on($aktivitasAgama.'.anggota_id', '=' , $penduduk.'.id')
                ->where($aktivitasAgama.'.data_presisi_tahun_id', $tahunAktif->uuid)
                ->where($aktivitasAgama.'.config_id', identitas('id'));
        })        
        ->where("{$penduduk}.config_id", identitas('id'))
        // PENTING: Hanya generate untuk anggota yang AKTIF (status_dasar = 1 atau NULL)
        ->where(function($q) use ($penduduk) {
            $q->where("{$penduduk}.status_dasar", '=', 1)
              ->orWhereNull("{$penduduk}.status_dasar");
        })
        // PENTING: Hanya generate untuk RTM yang kepala-nya AKTIF (status_dasar = 1 atau NULL)
        ->where(function($q) {
            $q->where('kepala_rtm.status_dasar', '=', 1)
              ->orWhereNull('kepala_rtm.status_dasar');
        })
        // PENTING: Hanya generate untuk data yang RTM-nya sinkron
        ->whereRaw('rtm.no_kk = '.$penduduk.'.id_rtm')
        ->whereNull($aktivitasAgama.'.uuid')
        ->get(); 
        foreach ($allAnggota as $item) {
            AktivitasAgama::create([
                'rtm_id'      => $item->rtm_id,
                'config_id'   => identitas('id'),
                'keluarga_id' => $item->keluarga_id,
                'data_presisi_tahun_id' => $tahunAktif->uuid,
                'anggota_id'  => $item->anggota_id,
                'agama_id' => $item->agama_id ?? null,
            ]);
        }
    }

    protected function sumberData()
    {        
        $penduduk  = (new Penduduk())->getTable();
        $aktivitasAgama     = (new AktivitasAgama())->getTable();        
        $rtm       = (new Rtm())->getTable();
        $namaDusun = $this->input->get('dusun') ?? null;
        $rw        = $this->input->get('rw') ?? null;
        $rt        = $this->input->get('rt') ?? null;
        $status_pengisian        = $this->input->get('status_pengisian') ?? null;
        $orders    = $this->input->get('order') ?? [];
        $tahunAktif = $this->tahunAktif;
        $idCluster = $rt ? [$rt] : [];

        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }
        $configId = identitas('id');
        return AktivitasAgama::with(['rtm.kepalaKeluarga'])->select(
            $aktivitasAgama . '.uuid as id',
            $aktivitasAgama . '.rtm_id',
            $aktivitasAgama . '.agama_id',
            $aktivitasAgama . '.tanggal_pengisian',
            $aktivitasAgama . '.status_kelengkapan',
            $aktivitasAgama . '.frekwensi_mengikuti_kegiatan_setahun',
            'rtm.nik_kepala',
            'rtm.no_kk',
            'rtm.tgl_daftar',
            'kepala_rtm.id_kk',
            'kepala_rtm.nik as nik',
            'kepala_rtm.nama',
            DB::raw("(SELECT COUNT(*) FROM {$penduduk} p WHERE p.id_rtm = rtm.no_kk and p.config_id = '{$configId}') as jumlah_anggota"),
            DB::raw("case when {$aktivitasAgama}.updated_at > {$aktivitasAgama}.created_at then 1 else 0 end as status_pengisian"),
        )->whereHas('rtm', static fn($q) => $q->status())
            ->join($rtm . ' AS rtm', $aktivitasAgama . '.rtm_id', '=', 'rtm.id')            
            ->join("{$penduduk} AS kepala_rtm", function($join) use($aktivitasAgama) {
                $join->on('rtm.nik_kepala', '=', 'kepala_rtm.id')
                    ->on($aktivitasAgama . '.anggota_id', '=', 'kepala_rtm.id');
            })//->join("{$keluarga} AS keluarga", 'kepala_rtm.id_kk', '=', 'keluarga.id')            
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)            
            ->when($idCluster, static fn ($q) => $q->whereIn('kepala_rtm.id_cluster', $idCluster))
            ->whereHas('kepalaRumahTangga') // otomatis akan membatasi hak akses berdasarkan wilayah
            ->where('kepala_rtm.status_dasar', 1)            
            ->where('kepala_rtm.config_id', identitas('id'))
            ->when($status_pengisian != null, function ($q) use ($status_pengisian, $aktivitasAgama) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->whereRaw("{$aktivitasAgama}.updated_at > {$aktivitasAgama}.created_at");
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereRaw("{$aktivitasAgama}.updated_at <= {$aktivitasAgama}.created_at");
                }
            })
            ->when($orders && ! empty($orders), static function ($query) use ($orders, $penduduk) {
                foreach ($orders as $order) {
                    $orderDirection = $order['dir'] ?? 'asc';
                    $orderColumn    = $order['column'] ?? 0;
                    if ($orderColumn == 2 && $orderDirection == 'asc') {
                        return $query->orderBy('status_pengisian', 'asc');
                    }
                    if ($orderColumn == 2 && $orderDirection == 'desc') {
                        return $query->orderBy('status_pengisian', 'desc');
                    }
                    if ($orderColumn == 4 && $orderDirection == 'asc') {
                        return $query->orderBy('kepala_rtm.nik', 'asc');
                    }
                    if ($orderColumn == 4 && $orderDirection == 'desc') {
                        return $query->orderBy('kepala_rtm.nik', 'desc');
                    }
                    if ($orderColumn == 5 && $orderDirection == 'asc') {
                        return $query->orderBy('kepala_rtm.nama', 'asc');
                    }
                    if ($orderColumn == 5 && $orderDirection == 'desc') {
                        return $query->orderBy('kepala_rtm.nama', 'desc');
                    }
                }
            });;
   }

    /**
     * Method untuk mendapatkan sumber data lengkap dengan relasi untuk export
     */
    protected function sumberDataLengkap()
    {
        $namaDusun        = $this->input->get('dusun') ?? null;
        $rw               = $this->input->get('rw') ?? null;
        $rt               = $this->input->get('rt') ?? null;
        $status_pengisian = $this->input->get('status_pengisian') ?? null;
        $idCluster        = $rt ? [$rt] : [];
        $tahunAktif = $this->tahunAktif;

        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }

        return AktivitasAgama::query()
            ->where('config_id', identitas('id'))
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->when($status_pengisian != null, static function ($q) use ($status_pengisian) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->whereNotNull('tanggal_pengisian');
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereNull('tanggal_pengisian');
                }
            })
            ->when($idCluster, static fn ($q) => $q->whereHas('rtm.kepalaKeluarga.keluarga', static fn ($r) => $r->whereIn('id_cluster', $idCluster)))
            ->with(['rtm.kepalaKeluarga.keluarga.wilayah', 'penduduk']);
    }

    /**
     * Override dataTidakSinkron untuk modul Aktivitas Agama
     * Memeriksa sinkronisasi RTM dan Anggota (penduduk)
     */
    protected function dataTidakSinkron(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();
        $orderByClause = implode(', ', $this->uniqueColumn);
        
        // Cek data Aktivitas Agama yang:
        // 1. RTM-nya tidak ada di tweb_rtm atau tidak sinkron
        // 2. Anggota tidak aktif (status_dasar != 1)
        return $model->selectRaw($tableName.'.*,current_rtm.no_kk as rtm_aktif, tweb_rtm.no_kk as rtm_sebelumnya')
            ->with(['penduduk', 'rtm'])
            ->where($tableName . '.data_presisi_tahun_id', $tahunAktif->uuid)
            ->join('tweb_rtm as current_rtm', function($q) use ($tableName) {
                return $q->on('current_rtm.id','=',$tableName.'.rtm_id')
                    ->on('current_rtm.config_id','=',$tableName.'.config_id');
            })->join('tweb_penduduk', function($q) use($tableName) {
                return $q->on('tweb_penduduk.id','=',$tableName.'.anggota_id')
                    ->on('tweb_penduduk.config_id','=',$tableName.'.config_id');
            })->leftJoin('tweb_rtm', function($q) {
                return $q->on('tweb_rtm.no_kk','=','tweb_penduduk.id_rtm')
                    ->on('tweb_rtm.config_id','=','tweb_penduduk.config_id');
            })->where(function($q) use ($tableName) {
                $q->whereNull('tweb_rtm.id')
                  ->orWhereRaw($tableName.'.rtm_id != tweb_rtm.id')
                  ->orWhere('tweb_penduduk.status_dasar', '!=', 1);
            })
            ->orderByRaw($orderByClause)
            ->orderBy($tableName.'.created_at')
            ->limit(300) // sengaja di limit 300, agar tidak berat
            ->get();
    }

    /**
     * Override deleteDataGanda untuk menangani foreign key constraint
     * Data tidak sinkron mungkin memiliki referensi yang sudah tidak valid
     */
    public function deleteDataGanda()
    {
        try {
            $ids = $this->request['id_cb'] ?? [];
            
            if (empty($ids)) {
                redirect_with('error', 'Tidak ada data yang dipilih untuk dihapus', ci_route($this->baseRoute.'.periksa', 1));
                return;
            }

            // Gunakan raw query untuk memastikan delete berhasil
            $tableName = (new AktivitasAgama())->getTable();
            
            DB::beginTransaction();
            
            try {
                // Nonaktifkan foreign key check sementara untuk menghapus data dengan referensi tidak valid
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                
                // Delete menggunakan raw query dengan placeholders
                $placeholders = implode(',', array_fill(0, count($ids), '?'));
                $sql = "DELETE FROM {$tableName} WHERE uuid IN ({$placeholders})";
                $deleted = DB::delete($sql, $ids);
                
                // Aktifkan kembali foreign key check
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
                
                DB::commit();
                
                $message = $deleted > 0 
                    ? "Berhasil menghapus {$deleted} data yang dipilih" 
                    : 'Tidak ada data yang berhasil dihapus. Mungkin data sudah terhapus sebelumnya.';
                    
                redirect_with('success', $message, ci_route($this->baseRoute.'.periksa', 1));
                
            } catch (\Exception $e) {
                // Rollback inner transaction
                throw $e;
            }
            
        } catch (\Exception $e) {
            DB::rollback();
            
            // Log error untuk troubleshooting
            log_message('error', 'Error deleteDataGanda AktivitasAgama: ' . $e->getMessage());
            
            // Pastikan foreign key check diaktifkan kembali jika terjadi error
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
            } catch (\Exception $ignored) {
                // Ignore jika gagal
            }
            
            redirect_with('error', 'Gagal menghapus data: ' . $e->getMessage(), ci_route($this->baseRoute.'.periksa', 1));
        }
    }
}
