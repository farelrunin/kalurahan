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
 * Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
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
 * @copyright Hak Cipta 2016 - 2024 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

use App\Enums\StatusDasarEnum;
use App\Models\Penduduk;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Modules\DataPresisi\Enums\FrekwensiKonsumsiBuahPerHariEnum;
use Modules\DataPresisi\Enums\FrekwensiKonsumsiDagingPerHariEnum;
use Modules\DataPresisi\Enums\FrekwensiKonsumsiSayurPerHariEnum;
use Modules\DataPresisi\Enums\FrekwensiMakanPerHariEnum;
use Modules\DataPresisi\Enums\JenisLahanEnum;
use Modules\DataPresisi\Enums\JumlahPopulasiEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusLahanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Enums\UsiaKomoditiEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\Pangan;
use Modules\DataPresisi\Models\Tahun;
use Modules\Prodeskel\Enums\JenisPerikananEnum;
use Modules\Prodeskel\Enums\JenisTernakEnum;
use Modules\Prodeskel\Enums\KomoditasTanamanPanganEnum;
use Modules\Prodeskel\Models\Komoditas;

defined('BASEPATH') || exit('No direct script access allowed');

class PanganController extends BaseController
{
    protected $baseRoute = 'data_presisi.pangan';
    protected $baseView = 'datapresisi::backend.pangan';
    protected $modelName = 'Modules\DataPresisi\Models\Pangan';
    public $modul_ini = 'data-presisi';

    public $sub_modul_ini = 'data-presisi-pangan';
    // public $kategori_pengaturan = 'data_presisi';
    // public $aliasController     = 'data_presisi';
    private $tahunAktif;

    protected $uniqueColumn = ['config_id', 'data_presisi_tahun_id', 'rtm_id', 'keluarga_id'];
    public function __construct()
    {
        parent::__construct();
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingPangan();
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of($this->sumberData())
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) {
                    $aksi = '';
                    // if (can('u')) {
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.pangan', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    // }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.pangan.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->addColumn('tanggal_pengisian', static function ($row) {
                    return $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-';
                })
                ->addColumn('status', static function ($row) {
                    $warna = $row->status === 'Sudah isi' ? 'label-success' : 'label-danger';

                    return '<span class="label ' . $warna . '">' . $row->status . '</span>';
                })
                ->addColumn('status_kelengkapan_badge', static function ($row) {
                    $status = $row->status_kelengkapan ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($status);
                    $statusText = StatusKelengkapanEnum::valueOf($status);
                    return '<label class="label ' . $badgeClass . '">' . $statusText . '</label>';
                })
                ->editColumn('tgl_daftar', static fn($q) => tgl_indo($q->tgl_daftar))
                ->editColumn('terdaftar_dtks', static fn($q) => $q->terdaftar_dtks ? 'Terdaftar' : 'Tidak Terdaftar')
                ->rawColumns(['aksi', 'ceklist', 'foto', 'status', 'tanggal_pengisian', 'status_kelengkapan_badge'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.pangan.index', $data);
    }

    protected function sumberData()
    {
        $status = $this->input->get('status') ?? null;
        $sex = $this->input->get('jenis_kelamin') ?? null;
        $namaDusun = $this->input->get('dusun') ?? null;
        $rw = $this->input->get('rw') ?? null;
        $rt = $this->input->get('rt') ?? null;
        $status_pengisian  = $this->input->get('status_pengisian') ?? null;
        $bdt = $this->input->get('bdt') ?? null;
        $idCluster = $rt ? [$rt] : [];
        $tahunAktif = $this->tahunAktif;

        $rtm = (new Rtm())->getTable();
        $pangan = (new Pangan())->getTable();
        $kepalaKeluarga = (new Penduduk())->getTable();

        $rtm_id = $this->input->get('rtm_id') ?? null;

        if (empty($idCluster) && !empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && !empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }

        return Rtm::status()
            ->when($status_pengisian != null, function ($q) use ($status_pengisian) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->where('k.status_pengisian', 'lengkap');
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereNull('k.status_pengisian');
                }
            })
            ->when($rtm_id, static fn($q) => $q->where("{$rtm}.id", $rtm_id))
            ->when($sex, static fn($q) => $q->whereHas('kepalaKeluarga', static fn($r) => $r->whereSex($sex)))
            ->when(in_array($bdt, [BELUM_MENGISI, JUMLAH]), static fn($q) => $bdt == BELUM_MENGISI ? $q->whereNull('bdt') : $q->whereNotNull('bdt'))
            ->when($idCluster, static fn($q) => $q->whereHas('kepalaKeluarga.keluarga', static fn($r) => $r->whereIn('id_cluster', $idCluster)))
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join("{$pangan} AS k", 'k.rtm_id', '=', "{$rtm}.id")
            ->join("{$kepalaKeluarga} AS p", 'p.id', '=', "{$rtm}.nik_kepala")
            //  ->when(!$rtm_id, static fn($q) => $q->whereNotNull("k.keluarga_id"))
            ->selectRaw("
            {$rtm}.id as id,
            {$rtm}.tgl_daftar,
            {$rtm}.nik_kepala,
            {$rtm}.no_kk,  
            {$rtm}.terdaftar_dtks,            
            count(k.rtm_id) as jumlah_jenis_lahan,            
            CASE 
                WHEN COUNT(k.rtm_id) = SUM(k.status_pengisian = 'lengkap') THEN 'Sudah isi'
                ELSE 'Belum isi' 
            END as status,
            MAX(k.tanggal_pengisian) as tanggal_pengisian,
            MAX(k.status_kelengkapan) as status_kelengkapan
        ")
            ->groupBy(["{$rtm}.id", "{$rtm}.nik_kepala", "{$rtm}.no_kk", "{$rtm}.terdaftar_dtks", "{$rtm}.tgl_daftar"])
            ->with(['kepalaKeluarga' => static fn($q) => $q->withOnly(['keluarga'])])
            ->withCount('anggota');
    }

    public function getKomoditas(string $kategori): ?Komoditas
    {
        return Komoditas::where('config_id', identitas('id'))
            ->where('tahun', date('Y'))
            ->where('kategori', $kategori)
            ->latest()
            ->first();
    }

    public function form($id)
    {
        $pangan = Pangan::with([
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->first();
        $data['pangan'] = $pangan;

        $data['jenis_lahan'] = JenisLahanEnum::all();
        $data['status_lahan'] = StatusLahanEnum::all();
        $data['komoditi_utama_tanaman_pangan'] = KomoditasTanamanPanganEnum::all();
        $data['komoditi_tanaman_pangan_lainnya'] = KomoditasTanamanPanganEnum::all();
        $data['usia_komoditi'] = UsiaKomoditiEnum::all();
        $data['jenis_peternakan'] = JenisTernakEnum::all();
        $data['jumlah_populasi'] = JumlahPopulasiEnum::all();
        $data['jenis_perikanan'] = JenisPerikananEnum::all();
        $data['frekwensi_makan'] = FrekwensiMakanPerHariEnum::all();
        $data['frekwensi_sayur'] = FrekwensiKonsumsiSayurPerHariEnum::all();
        $data['frekwensi_buah'] = FrekwensiKonsumsiBuahPerHariEnum::all();
        $data['frekwensi_daging'] = FrekwensiKonsumsiDagingPerHariEnum::all();

        return view('datapresisi::backend.pangan.form', $data);
    }

    public function formTanah($rtm_id = null, $id = null)
    {
        $pangan = Pangan::with([
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])
            ->find($id);
        $rtm = Rtm::withCount('anggota')->find($rtm_id);

        if ($id) {
            $data['pageTitle'] = 'Ubah';
        }
        $data['jumlah_anggota'] = $rtm->anggota_count ?? 0;
        $data['pangan'] = $pangan;
        $data['rtm_id'] = $rtm_id;

        $data['jenis_lahan'] = JenisLahanEnum::all();
        $data['status_lahan'] = StatusLahanEnum::all();
        $data['komoditi_utama_tanaman_pangan'] = KomoditasTanamanPanganEnum::all();
        $data['komoditi_tanaman_pangan_lainnya'] = KomoditasTanamanPanganEnum::all();
        $data['usia_komoditi'] = UsiaKomoditiEnum::all();
        $data['jenis_peternakan'] = JenisTernakEnum::all();
        $data['jumlah_populasi'] = JumlahPopulasiEnum::all();
        $data['jenis_perikanan'] = JenisPerikananEnum::all();
        $data['frekwensi_makan'] = FrekwensiMakanPerHariEnum::all();
        $data['frekwensi_sayur'] = FrekwensiKonsumsiSayurPerHariEnum::all();
        $data['frekwensi_buah'] = FrekwensiKonsumsiBuahPerHariEnum::all();
        $data['frekwensi_daging'] = FrekwensiKonsumsiDagingPerHariEnum::all();

        return view('datapresisi::backend.pangan.form_tanah', $data);
    }

    public function lahanPanganAjax()
    {
        if (request()->ajax()) {
            $tahunAktif = $this->tahunAktif;
            $rtm_id = $this->input->get('rtm_id');
            return datatables()->of(Pangan::where(['rtm_id' => $rtm_id, 'data_presisi_tahun_id' => $tahunAktif->uuid]))
                ->addIndexColumn()
                ->addColumn('ceklist', static function ($row) {
                    return '<input type="checkbox" name="id_cb[]" value="' . $row->uuid . '"/>';
                })
                ->addColumn('aksi', static function ($row) {
                    $aksi = '';
                    // if (can('u')) {
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.pangan.form', [$row->rtm_id, $row->uuid]) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    // }

                    $aksi .= '<a href="#" data-href="' . ci_route('data_presisi.pangan.delete', [$row->rtm_id, $row->uuid]) . '" class="btn bg-maroon btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> ';

                    return $aksi;
                })
                ->rawColumns(['aksi', 'ceklist'])
                ->make();
        }
    }

    public function show($id)
    {
        // Ambil data pangan pertama untuk informasi header
        $pangan = Pangan::with([
            'penduduk',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->first();

        // Ambil semua data kepemilikan tanah untuk RTM ini
        $semuaKepemilikanTanah = Pangan::with([
            'penduduk',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->get();

        $data['pangan'] = $pangan;
        $data['semuaKepemilikanTanah'] = $semuaKepemilikanTanah;

        return view('datapresisi::backend.pangan.show', $data);
    }

    public function update($id)
    {
        // isCan('u');

        try {

            $data = $this->input->post();

            $data['tanggal_pengisian'] = Carbon::now()->format('Y-m-d');
            $data['status_pengisian'] = 'lengkap';
            $data['status_kelengkapan'] = $this->input->post('status_kelengkapan') ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
            $data['data_presisi_tahun_id'] = Tahun::active()->first()->uuid;
            if ($data['status_lahan'] == StatusLahanEnum::labelTidakMemiliki()) {
                $data['jenis_lahan'] = '';
                $data['komoditi_utama_tanaman_pangan'] = '';
                $data['komoditi_tanaman_pangan_lainnya'] = '';
                $data['usia_komoditi'] = '';
                $data['jenis_peternakan'] = '';
                $data['jenis_perikanan'] = '';
            }
            $pangan = Pangan::find($id);
            $message = 'Berhasil Ubah Data';
            if ($pangan) {
                $pangan->update($data);
            } else {;
                $message = 'Berhasil Tambah Data';
                Pangan::create($data);
            }

            return json([
                'success' => true,
                'message' => $message,
            ]);
        } catch (\Exception $e) {

            return json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function updateStatus($rtmId)
    {
        // isCan('u');

        try {

            $data = $this->input->post();

            $data['tanggal_pengisian'] = Carbon::now()->format('Y-m-d');
            $data['status_pengisian'] = 'lengkap';
            $data['status_kelengkapan'] = $this->input->post('status_kelengkapan') ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
            $data_presisi_tahun_id = Tahun::active()->first()->uuid;

            $pangan = Pangan::where('data_presisi_tahun_id', $data_presisi_tahun_id)->where('rtm_id', $rtmId)->update($data);
            $message = 'Berhasil Ubah Data';

            return json([
                'success' => true,
                'message' => $message,
            ]);
        } catch (\Exception $e) {

            return json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function delete($rtm_id = null, $id = null): void
    {
        if (Pangan::destroy($id)) {
            redirect_with('success', 'Berhasil Hapus Data', ci_route('data_presisi.pangan', $rtm_id));
        }

        redirect_with('error', 'Gagal Hapus Data', ci_route('data_presisi.pangan', $rtm_id));
    }

    public function delete_all($rtm_id = null): void
    {
        if (Pangan::destroy($this->request['id_cb'])) {
            redirect_with('success', 'Berhasil Hapus Data', ci_route('data_presisi.pangan', $rtm_id));
        }

        redirect_with('error', 'Gagal Hapus Data', ci_route('data_presisi.pangan', $rtm_id));
    }

    private function generateMissingPangan(): void
    {
        $pangan = (new Pangan())->getTable();
        $rtm = (new Rtm())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $tahunAktif = $this->tahunAktif;
        $all_rtm = Rtm::status()->select([
            "{$rtm}.id as rtm_id",
            "kepala_rtm.id_kk AS keluarga_id"
        ])
            ->join("{$penduduk} AS kepala_rtm", function ($join) use ($penduduk, $rtm) {
                $join->on("{$rtm}.nik_kepala", '=', 'kepala_rtm.id')
                    ->on("{$rtm}.config_id", '=', 'kepala_rtm.config_id')
                    ->where('kepala_rtm.status_dasar', StatusDasarEnum::HIDUP);
            })
            ->leftJoin($pangan, function ($join) use ($pangan, $tahunAktif) {
                return $join->on($pangan . '.rtm_id', '=', 'tweb_rtm.id')
                    ->where($pangan . '.data_presisi_tahun_id', $tahunAktif->uuid);
            })->where('nik_kepala', '!=', 0)
            ->whereNull($pangan . '.uuid')
            ->get();

        if ($all_rtm->isNotEmpty()) {
            $dataInsert = [];
            $configId = identitas('id');
            $now = Carbon::now();
            $userId = ci_auth()->id;
            foreach ($all_rtm as $item) {
                $dataInsert[] = [
                    'config_id' => $configId,
                    'rtm_id' => $item->rtm_id,
                    'keluarga_id' => $item->keluarga_id,
                    'data_presisi_tahun_id' => $tahunAktif->uuid,
                    'created_at' => $now,
                    'updated_at' => $now,
                    'created_by' => $userId,
                    'updated_by' => $userId,
                    'uuid' => (string) \Illuminate\Support\Str::uuid()
                ];
            }

            // Bulk insert dengan chunk untuk performa lebih baik pada data besar
            foreach (array_chunk($dataInsert, 500) as $chunk) {
                Pangan::insert($chunk);
            }
        }
    }

    /**
     * Mendapatkan data lengkap dengan subquery untuk filter data ganda
     */
    protected function dataGanda(Tahun $tahunAktif)
    {
        // perlu didiskusikan lebih lanjut, karena data pangan memang bisa lebih dari satu
        return collect([]);
    }

    protected function dataTidakSinkron(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();
        $orderByClause = implode(', ', $this->uniqueColumn);
        return $model->selectRaw($tableName . '.*,current_rtm.no_kk as rtm_aktif, tweb_rtm.no_kk as rtm_sebelumnya')
            ->with(['kepalaRumahTangga', 'rtm'])
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join('tweb_rtm as current_rtm', function ($q) use ($tableName) {
                return $q->on('current_rtm.id', '=', $tableName . '.rtm_id')
                    ->on('current_rtm.config_id', '=', $tableName . '.config_id');
            })->leftJoin('tweb_penduduk', function ($q) use ($tableName) {
                return $q->on('tweb_penduduk.id', '=', 'current_rtm.nik_kepala')
                    ->on('tweb_penduduk.config_id', '=', $tableName . '.config_id');
            })->leftJoin('tweb_rtm', function ($q) {
                return $q->on('tweb_rtm.no_kk', '=', 'tweb_penduduk.id_rtm')
                    ->on('tweb_rtm.config_id', '=', 'tweb_penduduk.config_id');
            })->whereRaw($tableName . '.rtm_id != tweb_rtm.id or tweb_penduduk.status_dasar != 1')
            ->orderByRaw($orderByClause)->orderBy('created_at')
            ->limit(300) // sengaja di limit 100, agar tidak berat
            ->get();
    }

    public function pindahkanRTM()
    {
        $tahunAktif = Tahun::active()->first();
        try {
            $model = new $this->modelName;
            $tableName = $model->getTable();
            $pindah = $model->selectRaw($tableName . '.*, tweb_rtm.id as rtm_seharusnya')
                ->whereIn('uuid', $this->request['id_cb'])
                ->where('data_presisi_tahun_id', $tahunAktif->uuid)
                ->join('tweb_rtm as current_rtm', function ($q) use ($tableName) {
                    return $q->on('current_rtm.id', '=', $tableName . '.rtm_id')
                        ->on('current_rtm.config_id', '=', $tableName . '.config_id');
                })->leftJoin('tweb_penduduk', function ($q) use ($tableName) {
                    return $q->on('tweb_penduduk.id', '=', 'current_rtm.nik_kepala')
                        ->on('tweb_penduduk.config_id', '=', $tableName . '.config_id');
                })->leftJoin('tweb_rtm', function ($q) {
                    return $q->on('tweb_rtm.no_kk', '=', 'tweb_penduduk.id_rtm')
                        ->on('tweb_rtm.config_id', '=', 'tweb_penduduk.config_id');
                })->whereRaw($tableName . '.rtm_id != tweb_rtm.id and tweb_penduduk.status_dasar =' . StatusDasarEnum::HIDUP)
                ->get();

            if (!$pindah->isEmpty()) {
                foreach ($pindah as $key => $item) {
                    $item->rtm_id = $item->rtm_seharusnya;
                    $item->save();
                }
            }
            redirect_with('success', 'Berhasil memindahkan data yang dipilih', ci_route($this->baseRoute . '.periksa', 1));
        } catch (\Exception $e) {
            redirect_with('error', 'Gagal memindahkan data: ' . $e->getMessage(), ci_route($this->baseRoute . '.periksa', 1));
        }
    }
}
