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

use App\Models\Dtks;
use App\Models\Penduduk;
use App\Models\PendudukSaja;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\FrekwensiAktivitasAdatEnum;
use Modules\DataPresisi\Enums\StatusKeanggotaanEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Enums\TerdaftarEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\AktivitasAdat;
use Modules\DataPresisi\Models\Tahun;
use Modules\DataPresisi\Models\Lembaga;

defined('BASEPATH') || exit('No direct script access allowed');

class AktivitasAdatController extends BaseController
{
    protected $baseRoute = 'data_presisi.aktivitas-adat';
    protected $baseView = 'datapresisi::backend.aktivitas_adat';
    protected $modelName = 'Modules\DataPresisi\Models\AktivitasAdat';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-aktivitas-adat';
    private $readonly   = false;

    private $tahunAktif;
    public function __construct()
    {
        parent::__construct();
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingAktivitasAdat();
    }

    public function index()
    {
        if (request()->ajax()) {
            $canUpdate = can('u');
            return datatables($this->sumberData())
                ->addIndexColumn()
                ->addColumn('dtks', static fn($row) => $row->id_dtks)
                ->addColumn('aksi', static function ($row) use ($canUpdate) {
                    $aksi = '';
                    if ($canUpdate) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.aktivitas-adat', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.aktivitas-adat.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('frekwensi_mengikuti_kegiatan_setahun', static function ($row) {
                    return FrekwensiAktivitasAdatEnum::valueOf($row->frekwensi_mengikuti_kegiatan_setahun);
                })
                ->editColumn('status_keanggotaan', static function ($row) {
                    return StatusKeanggotaanEnum::valueOf($row->status_keanggotaan);
                })
                ->editColumn('status_pengisian', static function ($row) {
                    return $row->status_pengisian ? '<span class="label label-success">Sudah isi</span>' : '<span class="label label-danger">Belum Isi</span>';
                })
                ->editColumn('no_kk', static fn ($row) => '<a href="' . ci_route('rtm.anggota', $row?->rtm?->id) . '"><span>' . $row->no_kk . '</span></a>')
                ->editColumn('tanggal_pengisian', static fn($row) => $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-')
                ->editColumn('tgl_daftar', static fn($row) => $row->tgl_daftar ? tgl_indo($row->tgl_daftar) : '-')  
                ->addColumn('status_kelengkapan_badge', static function ($row) {
                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($row->status_kelengkapan);
                    $statusText = StatusKelengkapanEnum::valueOf($row->status_kelengkapan);

                    return '<span class="label ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->filterColumn('no_kk', static fn($query, $keyword) => $query->whereRaw('rtm.no_kk LIKE ?', ['%' . $keyword . '%']))
                ->filterColumn('nama', static fn($query, $keyword) => $query->whereRaw('kepala_rtm.nama LIKE ?', ['%' . $keyword . '%']))
                ->rawColumns(['aksi', 'status_pengisian', 'status_kelengkapan_badge', 'no_kk'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.aktivitas_adat.index', $data);
    }

    public function form($id)
    {
        $data = ['defaultBantuan' => null];
        $aktivitasAdat = AktivitasAdat::with([
            'rtm' => static function ($query) {
                $query->withOnly('anggota');
            },            
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withOnly('wilayah', 'keluarga');
            },
            'dtks',
        ])
            ->findOrFail($id);
        $data['aktivitasAdat'] = $aktivitasAdat;
        $data['anggota'] = AktivitasAdat::whereHas('penduduk', static fn($q) => $q->where('id_rtm', $aktivitasAdat->rtm?->no_kk))->with(['penduduk' => static fn($q) => $q->where('id_rtm', $aktivitasAdat->rtm?->no_kk), 'keluarga'])->where(['rtm_id' => $data['aktivitasAdat']->rtm_id, 'data_presisi_tahun_id' => $data['aktivitasAdat']->data_presisi_tahun_id])
            ->get();
        $dtks = $data['aktivitasAdat']->dtks;
        $data['dtks'] = $dtks ? TerdaftarEnum::YA : TerdaftarEnum::TIDAK;
        $data['lembaga'] = Lembaga::lembaga()->pluck('nama', 'id')->toArray();
        $data['readonly'] = $this->readonly;
        return view('datapresisi::backend.aktivitas_adat.form', $data);
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
                $anggota = AktivitasAdat::with('penduduk')->find($uuid);
                foreach ($item as $key => $value) {
                    if ($value == '') {
                        $value = null;
                    }                    
                    $anggota->$key = $value;
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

    private function generateMissingAktivitasAdat(): void
    {
        $aktivitasAdat    = (new AktivitasAdat())->getTable();
        $rtm      = (new Rtm())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $tahunAktif = $this->tahunAktif;

        $allAnggota = PendudukSaja::status()->select(
            "rtm.id as rtm_id",
            "{$penduduk}.id_kk AS keluarga_id",
            "{$penduduk}.id as anggota_id"
        )
            ->join("{$rtm} AS rtm", function($join) use ($penduduk, $rtm) {
                $join->on("{$penduduk}.id_rtm", '=', 'rtm.no_kk')
                    ->on("{$penduduk}.config_id", '=', 'rtm.config_id')
                    ->where('rtm.nik_kepala','!=',0);
            })
            // satu RTM bisa berisi lebih dari 1 keluarga, maka id_kk diambil dari table tweb_penduduk
            // ->leftJoin("{$keluarga} AS keluarga", "rtm.nik_kepala", '=', 'keluarga.nik_kepala')
            ->leftJoin($aktivitasAdat, function ($join) use ($aktivitasAdat, $penduduk, $tahunAktif) {
                return $join->on($aktivitasAdat . '.rtm_id', '=', 'rtm.id')
                    ->on($aktivitasAdat . '.anggota_id', '=', $penduduk . '.id')
                    ->where($aktivitasAdat . '.data_presisi_tahun_id', $tahunAktif->uuid)
                    ->where($aktivitasAdat . '.config_id', identitas('id'));
            })
            ->where("{$penduduk}.config_id", identitas('id'))
            ->whereNull($aktivitasAdat . '.uuid')
            ->get();
        
        foreach ($allAnggota as $item) {
            AktivitasAdat::create([
                'rtm_id'      => $item->rtm_id,
                'config_id'   => identitas('id'),
                'keluarga_id' => $item->keluarga_id,
                'data_presisi_tahun_id' => $tahunAktif->uuid,
                'anggota_id'  => $item->anggota_id,
            ]);
        }
    }

    protected function sumberData()
    {
        $penduduk  = (new Penduduk())->getTable();
        $aktivitasAdat     = (new AktivitasAdat())->getTable();
        $dtks      = (new Dtks())->getTable();
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
        return AktivitasAdat::with(['rtm.kepalaKeluarga'])->select(
            $aktivitasAdat . '.uuid as id',
            $aktivitasAdat . '.rtm_id',
            $aktivitasAdat . '.status_keanggotaan',
            $aktivitasAdat . '.kelompok_id',
            $aktivitasAdat . '.tanggal_pengisian',
            $aktivitasAdat . '.status_kelengkapan',
            $aktivitasAdat . '.frekwensi_mengikuti_kegiatan_setahun',
            DB::raw("(SELECT max(id) FROM {$dtks} d WHERE d.id_rtm = {$aktivitasAdat}.rtm_id and d.config_id = '{$configId}') as id_dtks"),
            'rtm.nik_kepala',
            'rtm.no_kk',
            'rtm.tgl_daftar',
            'kepala_rtm.id_kk',
            'kepala_rtm.nik as nik',
            'kepala_rtm.nama',
            DB::raw("(SELECT COUNT(*) FROM {$penduduk} p WHERE p.id_rtm = rtm.no_kk and p.config_id = '{$configId}') as jumlah_anggota"),
            DB::raw("case when {$aktivitasAdat}.updated_at > {$aktivitasAdat}.created_at then 1 else 0 end as status_pengisian"),
        )->with(['lembaga'])
            ->join($rtm . ' AS rtm', $aktivitasAdat . '.rtm_id', '=', 'rtm.id')
            ->join("{$penduduk} AS kepala_rtm", function ($join) use ($aktivitasAdat) {
                $join->on('rtm.nik_kepala', '=', 'kepala_rtm.id')
                    ->on($aktivitasAdat . '.anggota_id', '=', 'kepala_rtm.id');
            })
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->whereHas('kepalaRumahTangga')
            ->when($idCluster, static fn($q) => $q->whereIn('kepala_rtm.id_cluster', $idCluster))
            ->when($status_pengisian != null, function ($q) use ($status_pengisian, $aktivitasAdat) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->whereRaw("{$aktivitasAdat}.updated_at > {$aktivitasAdat}.created_at");
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereRaw("{$aktivitasAdat}.updated_at <= {$aktivitasAdat}.created_at");
                }
            })
            // KK Aktif
            ->where('kepala_rtm.status_dasar', 1)
            // ->where('kepala_rtm.kk_level', 1)
            ->where('kepala_rtm.config_id', identitas('id'))
            ->when($orders && ! empty($orders), static function ($query) use ($orders) {
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
            });
    }
    protected function dataPeriksa(){        
        $data = parent::dataPeriksa();
        $data['lembaga'] = Lembaga::pluck('nama','id');
        return $data;
    }
}
