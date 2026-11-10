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

use App\Models\Rtm;
use App\Models\Wilayah;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\PendudukSaja;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\DataPresisi\Enums\JenisSeniEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\SeniBudaya;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class SeniBudayaController extends BaseController
{
    protected $baseRoute = 'data_presisi.seni_budaya';
    protected $baseView = 'datapresisi::backend.senibudaya';
    protected $modelName = 'Modules\DataPresisi\Models\SeniBudaya';
    public $modul_ini           = 'data-presisi';
    public $sub_modul_ini       = 'data-presisi-seni-budaya';

    private $tahunAktif;
    private $readonly   = false;
    public function __construct()
    {
        parent::__construct();
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingSeniBudaya();
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of($this->sumberData())
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) {
                    $aksi = '';
                    if (can('u')) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.seni_budaya', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.seni_budaya.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('tgl_daftar', static fn($q) => tgl_indo($q->tanggal_terdaftar ?: $q->tanggal_terdaftar))
                ->addColumn('tanggal_pengisian', static function ($row) {
                    return $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-';
                })
                ->addColumn('status', static fn($q) => $q->seni_budaya_status === 'lengkap' ? '<label class="label label-success">Sudah Isi</label>' : '<label class="label label-danger">Belum Isi</label>')
                ->addColumn('status_kelengkapan_badge', function ($row) {
                    // Jika status_kelengkapan null dari join, ambil dari database
                    // Ambil status_kelengkapan dari record mana saja di RTM ini (semua anggota punya status sama)
                    if ($row->status_kelengkapan === null) {
                        $seniBudaya = SeniBudaya::where('rtm_id', $row->id)
                            ->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
                            ->whereNotNull('status_kelengkapan')
                            ->first();
                        $statusKelengkapan = $seniBudaya ? $seniBudaya->status_kelengkapan : null;
                    } else {
                        $statusKelengkapan = $row->status_kelengkapan;
                    }

                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($statusKelengkapan);
                    $statusText = StatusKelengkapanEnum::valueOf($statusKelengkapan);
                    return '<span class="label ' . $badgeClass . '">' . $statusText . '</span>';
                })
                ->rawColumns(['aksi', 'ceklist', 'foto', 'status', 'status_kelengkapan_badge'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.senibudaya.index', $data);
    }


    protected function sumberData()
    {
        $sex       = $this->input->get('jenis_kelamin') ?? null;
        $namaDusun = $this->input->get('dusun') ?? null;
        $rw        = $this->input->get('rw') ?? null;
        $rt        = $this->input->get('rt') ?? null;
        $status_pengisian  = $this->input->get('status_pengisian') ?? null;
        $bdt       = $this->input->get('bdt') ?? null;
        $idCluster = $rt ? [$rt] : [];
        $tahunAktif = $this->tahunAktif;
        $seniBudayaTable = (new SeniBudaya)->getTable();
        $orders    = $this->input->get('order') ?? [];
        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }
        $rtmTable = (new Rtm)->getTable();
        return Rtm::status()->selectRaw($rtmTable . '.*, ' . $seniBudayaTable . '.status_pengisian as seni_budaya_status, ' . $seniBudayaTable . '.tanggal_pengisian, ' . $seniBudayaTable . '.status_kelengkapan, ' . $rtmTable . '.tgl_daftar as tanggal_terdaftar')
            ->leftJoin($seniBudayaTable, function ($join) use ($seniBudayaTable, $rtmTable, $tahunAktif) {
                return $join->on($seniBudayaTable . '.rtm_id', '=', $rtmTable . '.id')->on($seniBudayaTable . '.anggota_id', '=', $rtmTable . '.nik_kepala')
                    ->where('data_presisi_tahun_id', $tahunAktif->uuid);
            })->when($status_pengisian != null, function ($q) use ($status_pengisian, $seniBudayaTable) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->where($seniBudayaTable . '.status_pengisian', 'lengkap');
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereNull($seniBudayaTable . '.status_pengisian');
                }
            })
            ->when($sex, static fn($q) => $q->whereHas('kepalaKeluarga', static fn($r) => $r->whereSex($sex)))
            ->when(in_array($bdt, [BELUM_MENGISI, JUMLAH]), static fn($q) => $bdt == BELUM_MENGISI ? $q->whereNull('bdt') : $q->whereNotNull('bdt'))
            ->when($idCluster, static fn($q) => $q->whereHas('kepalaKeluarga.keluarga', static fn($r) => $r->whereIn('id_cluster', $idCluster)))
            ->whereHas('kepalaKeluarga') // otomatis akan membatasi hak akses berdasarkan wilayah
            ->with(['kepalaKeluarga' => static fn($q) => $q->withOnly(['keluarga']), 'anggota' => static fn($q) => $q->select(['id', 'id_rtm', 'id_kk'])])->withCount('anggota')
            ->when($orders && ! empty($orders), static function ($query) use ($orders) {
                foreach ($orders as $order) {
                    $orderDirection = $order['dir'] ?? 'asc';
                    $orderColumn    = $order['column'] ?? 0;
                    if ($orderColumn == 5) {
                        // Order by jumlah unique id_kk anggota rtm (jumlah keluarga unik per RTM)
                        return $query->withCount(['anggota as unique_keluarga_count' => function ($q) {
                            $q->select(DB::raw('count(distinct id_kk)'));
                        }])->orderBy('unique_keluarga_count', $orderDirection);
                    }
                }
            });
    }

    public function form($id)
    {
        $seniBudaya = SeniBudaya::with([
            'rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->first();
        $data['seni_budaya'] = $seniBudaya;
        // hapus anggota yang sudah tidak ada di rtm anggota
        if ($seniBudaya) {
            $anggotaIds = $seniBudaya->rtm->anggota->pluck('id')->toArray();
            SeniBudaya::where('rtm_id', $id)
                ->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
                ->whereNotIn('anggota_id', $anggotaIds)
                ->delete();
        }
        $arr = [];

        foreach ($seniBudaya->rtm->anggota as $r) {

            $seniBudaya = SeniBudaya::where('rtm_id', $id)->where('anggota_id', $r->id)->where('data_presisi_tahun_id', $this->tahunAktif->uuid)->first();

            $arr[] = (object) [
                'nik' => $r->nik,
                'no_kk' => $r->keluarga->no_kk,
                'nama' => $r->nama,
                'rtm_id' => $id,
                'keluarga_id' => $r->keluarga->id,
                'anggota_id' => $r->id,
                'tanggallahir' => $r->tanggallahir,
                'jenis_seni_yang_dikuasai' => $seniBudaya && !empty($seniBudaya->jenis_seni_yang_dikuasai) ? $seniBudaya->jenis_seni_yang_dikuasai['jenis_seni_id'] : '',
                'sub_jenis_seni_yang_dikuasai' => $seniBudaya && !empty($seniBudaya->jenis_seni_yang_dikuasai) ? $seniBudaya->jenis_seni_yang_dikuasai['sub_jenis_seni'] : '',
                'jumlah_penghasilan_dari_seni' => $seniBudaya ? $seniBudaya->jumlah_penghasilan_dari_seni : '',
                'tanggal_pengisian' => $seniBudaya ? $seniBudaya->tanggal_pengisian : '',
                'status_pengisian' => $seniBudaya ? $seniBudaya->status_pengisian : '',
            ];
        }

        $data['anggota'] = $arr;

        $data['jenis_seni_yang_dikuasai'] = JenisSeniEnum::all();
        $data['sub_jenis_seni'] = JenisSeniEnum::subItems();
        $data['readonly'] = $this->readonly;
        return view('datapresisi::backend.senibudaya.form', $data);
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
                $seniBudaya = SeniBudaya::with('penduduk')->where('rtm_id', $id)->where('anggota_id', $item['anggota_id'])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)->first();

                // if(!empty($item['jenis_seni_yang_dikuasai']) && !empty($item['sub_jenis_seni_yang_dikuasai'])){
                if (!empty($item['jenis_seni_yang_dikuasai'])) {
                    // Lakukan update data
                    $seniBudaya->update([
                        'jenis_seni_yang_dikuasai'       => $item['jenis_seni_json'],
                        'jumlah_penghasilan_dari_seni'       => is_numeric($item['jumlah_penghasilan_dari_seni'] ?? null)
                            ? $item['jumlah_penghasilan_dari_seni']
                            : null,
                        'tanggal_pengisian'              => Carbon::now()->format('Y-m-d'),
                        'status_pengisian'               => 'lengkap',
                        'status_kelengkapan'             => $status_kelengkapan,
                    ]);
                }
            }

            // Update status_kelengkapan untuk semua anggota RTM ini
            // Terutama penting untuk kepala RTM agar tampil di datatable
            SeniBudaya::where('rtm_id', $id)
                ->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
                ->update(['status_kelengkapan' => $status_kelengkapan]);

            DB::commit();
            return json([
                'success' => true,
                'message' => 'Berhasil Ubah Data'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function generateMissingSeniBudaya(): void
    {
        $seniBudaya  = (new SeniBudaya())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $rtm      = (new Rtm())->getTable();
        $tahunAktif = $this->tahunAktif;
        $all_anggota = PendudukSaja::status()->select(
            'rtm.id as rtm_id',
            "{$penduduk}.id_kk AS keluarga_id",
            "{$penduduk}.id as anggota_id"
        )
            ->join("{$rtm} AS rtm", function ($join) use ($penduduk, $rtm) {
                $join->on("{$penduduk}.id_rtm", '=', 'rtm.no_kk')
                    ->on("{$penduduk}.config_id", '=', 'rtm.config_id')
                    ->where('rtm.nik_kepala', '!=', 0);
            })
            // satu RTM bisa berisi lebih dari 1 keluarga, maka id_kk diambil dari table tweb_penduduk
            ->leftJoin($seniBudaya, function ($join) use ($seniBudaya, $tahunAktif, $penduduk) {
                return $join->on($seniBudaya . '.rtm_id', '=', 'rtm.id')
                    ->on($seniBudaya . '.anggota_id', '=', $penduduk . '.id')
                    ->where($seniBudaya . '.data_presisi_tahun_id', $tahunAktif->uuid);
            })
            ->where("{$penduduk}.config_id", identitas('id'))
            ->whereNull($seniBudaya . '.uuid')
            ->get();

        foreach ($all_anggota as $item) {
            SeniBudaya::create(['rtm_id' => $item->rtm_id, 'config_id' => identitas('id'), 'keluarga_id' => $item->keluarga_id, 'anggota_id' => $item->anggota_id, 'data_presisi_tahun_id' => $tahunAktif->uuid]);
        }
    }    
}
