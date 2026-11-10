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

use App\Enums\PekerjaanEnum;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\FrekwensiPelatihanEnum;
use Modules\DataPresisi\Enums\JenisPelatihanEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Enums\TempatKerjaEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\Ketenagakerjaan;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class KetenagakerjaanController extends BaseController
{
    protected $baseRoute = 'data_presisi.ketenagakerjaan';
    protected $baseView = 'datapresisi::backend.ketenagakerjaan';
    protected $modelName = 'Modules\DataPresisi\Models\Ketenagakerjaan';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-ketenagakerjaan';
    // public $kategori_pengaturan = 'data_presisi';
    // public $aliasController     = 'data_presisi';
    private $tahunAktif;
    private $readonly   = false;

    public function __construct()
    {
        parent::__construct();
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingKetenagakerjaan();
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of($this->sumberData())
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) {
                    $aksi = '';
                    if (can('u')) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.ketenagakerjaan', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.ketenagakerjaan.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->addColumn('tanggal_pengisian', static fn ($row) => $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-')
                ->addColumn('status', static function ($row) {
                    $warna = $row->status === 'Sudah isi' ? 'label-success' : 'label-danger';

                    return '<span class="label ' . $warna . '">' . $row->status . '</span>';
                })
                ->addColumn('status_kelengkapan_badge', static function ($row) {
                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($row->status_kelengkapan);
                    $statusText = StatusKelengkapanEnum::valueOf($row->status_kelengkapan);
                    return '<span class="label ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->editColumn('tgl_daftar', static fn ($q) => tgl_indo($q->tgl_daftar))
                ->editColumn('terdaftar_dtks', static fn ($q) => $q->terdaftar_dtks ? 'Terdaftar' : 'Tidak Terdaftar')
                ->rawColumns(['aksi', 'ceklist', 'foto', 'status', 'tanggal_pengisian', 'status_kelengkapan_badge'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.ketenagakerjaan.index', $data);
    }

    protected function sumberData()
    {
        $status           = $this->input->get('status') ?? null;
        $sex              = $this->input->get('jenis_kelamin') ?? null;
        $namaDusun        = $this->input->get('dusun') ?? null;
        $rw               = $this->input->get('rw') ?? null;
        $rt               = $this->input->get('rt') ?? null;
        $status_pengisian = $this->input->get('status_pengisian') ?? null;
        $bdt              = $this->input->get('bdt') ?? null;
        $idCluster        = $rt ? [$rt] : [];
        $tahunAktif       = $this->tahunAktif;

        $rtm             = (new Rtm())->getTable();
        $ketenagakerjaan = (new Ketenagakerjaan())->getTable();
        $kepalaKeluarga  = (new Penduduk())->getTable();

        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }

        return Rtm::status()
            ->when($sex, static fn ($q) => $q->whereHas('kepalaKeluarga', static fn ($r) => $r->whereSex($sex)))
            ->when(in_array($bdt, [BELUM_MENGISI, JUMLAH]), static fn ($q) => $bdt == BELUM_MENGISI ? $q->whereNull('bdt') : $q->whereNotNull('bdt'))
            ->when($idCluster, static fn ($q) => $q->whereHas('kepalaKeluarga.keluarga', static fn ($r) => $r->whereIn('id_cluster', $idCluster)))
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join("{$ketenagakerjaan} AS k", 'k.rtm_id', '=', "{$rtm}.id")
            ->join("{$kepalaKeluarga} AS p", 'p.id', '=', "{$rtm}.nik_kepala")
            ->selectRaw("
            {$rtm}.id,
            {$rtm}.config_id,
            {$rtm}.nik_kepala,
            {$rtm}.no_kk,
            {$rtm}.tgl_daftar,
            CASE
                WHEN COUNT(k.rtm_id) = SUM(k.status_pengisian = 'lengkap') THEN 'Sudah isi'
                ELSE 'Belum isi'
            END as status,
            MAX(k.tanggal_pengisian) as tanggal_pengisian,
            MAX(k.status_kelengkapan) as status_kelengkapan
        ")->when($status_pengisian != null, static function ($q) use ($status_pengisian) {
            if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                $q->where('k.status_pengisian', 'lengkap');
            } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                $q->whereNull('k.status_pengisian');
            }
        })
            ->groupBy(
                "{$rtm}.id",
                "{$rtm}.no_kk",
                "{$rtm}.config_id",
                "{$rtm}.nik_kepala",
                "{$rtm}.tgl_daftar",
            )
            ->with(['kepalaKeluarga' => static fn ($q) => $q->withOnly(['keluarga']), 'anggota' => static fn ($q) => $q->select(['id', 'id_rtm', 'id_kk'])])
            ->withCount('anggota');
    }

    public function form($id)
    {
        $ketenagakerjaan = Ketenagakerjaan::with(['rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->first();
        $data['ketenagakerjaan'] = $ketenagakerjaan;
        // hapus anggota yang sudah tidak ada di rtm anggota
        if ($ketenagakerjaan) {
            $anggotaIds = $ketenagakerjaan->rtm->anggota->pluck('id')->toArray();
            Ketenagakerjaan::where('rtm_id', $id)
            ->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->whereNotIn('anggota_id', $anggotaIds)
            ->delete();
        }
        $arr = [];

        foreach ($ketenagakerjaan->rtm->anggota as $r) {

            $ketenagakerjaan = Ketenagakerjaan::where('rtm_id', $id)->where('anggota_id', $r->id)->where('data_presisi_tahun_id', $this->tahunAktif->uuid)->first();
            if ($ketenagakerjaan) {
                if (! $ketenagakerjaan->frekwensi_mengikuti_pelatihan_setahun) {
                    $ketenagakerjaan->frekwensi_mengikuti_pelatihan_setahun = FrekwensiPelatihanEnum::valueOf(FrekwensiPelatihanEnum::TIDAK_ADA);
                }
                if (! $ketenagakerjaan->jenis_pelatihan_diikuti_setahun) {
                    $ketenagakerjaan->jenis_pelatihan_diikuti_setahun = JenisPelatihanEnum::valueOf(JenisPelatihanEnum::TIDAK_ADA);
                }
                // set change collection eloquent
                $ketenagakerjaan->setRawAttributes($ketenagakerjaan->getAttributes(), true);
            }
            
            $arr[] = (object) [
                'nik'                                   => $r->nik,
                'no_kk'                                 => $r->keluarga->no_kk,
                'nama'                                  => $r->nama,
                'rtm_id'                                => $id,
                'keluarga_id'                           => $r->keluarga->id,
                'anggota_id'                            => $r->id,
                'tanggallahir'                          => $r->tanggallahir,
                'jenis_pekerjaan'                       => PekerjaanEnum::all()[$r->pekerjaan_id] ?? '',
                'tempat_kerja'                          => $ketenagakerjaan ? $ketenagakerjaan->tempat_kerja : '',
                'frekwensi_mengikuti_pelatihan_setahun' => $ketenagakerjaan ? $ketenagakerjaan->frekwensi_mengikuti_pelatihan_setahun : FrekwensiPelatihanEnum::TIDAK_ADA,
                'jenis_pelatihan_diikuti_setahun'       => $ketenagakerjaan ? $ketenagakerjaan->jenis_pelatihan_diikuti_setahun : JenisPelatihanEnum::TIDAK_ADA,
                'tanggal_pengisian'                     => $ketenagakerjaan ? $ketenagakerjaan->tanggal_pengisian : '',
                'status_pengisian'                      => $ketenagakerjaan ? $ketenagakerjaan->status_pengisian : '',
            ];
        }

        $data['anggota'] = $arr;        

        $data['jenis_pekerjaan']                       = PekerjaanEnum::all();
        $data['tempat_kerja']                          = TempatKerjaEnum::all();
        $data['frekwensi_mengikuti_pelatihan_setahun'] = FrekwensiPelatihanEnum::all();
        $data['jenis_pelatihan_diikuti_setahun']       = JenisPelatihanEnum::all();
        $data['readonly'] = $this->readonly;
        return view('datapresisi::backend.ketenagakerjaan.form', $data);
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

            DB::beginTransaction();

            $data = $this->input->post('form');
            $status_kelengkapan = $this->input->post('status_kelengkapan') ?? StatusKelengkapanEnum::TIDAK_LENGKAP;

            foreach ($data as $item) {
                $ketenagakerjaan = Ketenagakerjaan::with('penduduk')->where('rtm_id', $id)->where('anggota_id', $item['anggota_id'])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)->first();

                // Lakukan update data
                $ketenagakerjaan->update([
                    'jenis_pekerjaan'                       => $item['jenis_pekerjaan'],
                    'tempat_kerja'                          => $item['tempat_kerja'],
                    'frekwensi_mengikuti_pelatihan_setahun' => $item['frekwensi_mengikuti_pelatihan_setahun'],
                    'jenis_pelatihan_diikuti_setahun'       => $item['jenis_pelatihan_diikuti_setahun'],
                    'tanggal_pengisian'                     => Carbon::now()->format('Y-m-d'),
                    'status_pengisian'                      => 'lengkap',
                    'status_kelengkapan'                    => $status_kelengkapan,
                ]);

                // update data penduduk jika ada melakukn perubahan pada halaman data ketenagakerjaan
                $ketenagakerjaan->penduduk->update([
                    'pekerjaan_id' => $item['pekerjaan_id'],
                ]);

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

    private function generateMissingKetenagakerjaan(): void
    {
        $ketenagakerjaan = (new Ketenagakerjaan())->getTable();
        $keluarga        = (new Keluarga())->getTable();
        $penduduk        = (new Penduduk())->getTable();
        $rtm             = (new Rtm())->getTable();
        $tahunAktif      = Tahun::active()->first();
        
        // Hanya generate untuk RTM dan anggota yang AKTIF
        // Jangan generate ulang data yang sengaja dihapus karena tidak sinkron
        $all_anggota = Penduduk::select(
            'rtm.id as rtm_id',
            "{$penduduk}.id_kk AS keluarga_id",
            "{$penduduk}.id as anggota_id"
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
            ->leftJoin($ketenagakerjaan, static fn ($join) => $join->on($ketenagakerjaan . '.rtm_id', '=', 'rtm.id')
                ->on($ketenagakerjaan . '.anggota_id', '=', $penduduk . '.id')
                ->where($ketenagakerjaan . '.data_presisi_tahun_id', $tahunAktif->uuid))
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
            ->whereNull($ketenagakerjaan . '.uuid')
            ->get();

            $insertData = [];

            foreach ($all_anggota as $item) {
                $insertData[] = [
                    'rtm_id'                => $item->rtm_id,
                    'config_id'             => identitas('id'),
                    'keluarga_id'           => $item->keluarga_id,
                    'anggota_id'            => $item->anggota_id,
                    'data_presisi_tahun_id' => $tahunAktif->uuid,
                    'uuid'                  => Illuminate\Support\Str::uuid(),
                ];
            }
            if (! empty($insertData)) {
                Ketenagakerjaan::insert($insertData);
            }
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

        return Ketenagakerjaan::query()
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
     * Override dataTidakSinkron untuk modul Ketenagakerjaan
     * Memeriksa sinkronisasi RTM dan Anggota (penduduk)
     */
    protected function dataTidakSinkron(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();
        $orderByClause = implode(', ', $this->uniqueColumn);
        
        // Cek data Ketenagakerjaan yang:
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
            $tableName = (new Ketenagakerjaan())->getTable();
            
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
            log_message('error', 'Error deleteDataGanda Ketenagakerjaan: ' . $e->getMessage());
            
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
