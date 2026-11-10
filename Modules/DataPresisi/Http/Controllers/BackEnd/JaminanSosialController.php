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
use App\Models\Dtks;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\PendudukSaja;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\JenisBantuanEnum;
use Modules\DataPresisi\Enums\JenisGangguanMentalEnum;
use Modules\DataPresisi\Enums\PenangananGangguanMentalEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Enums\TerdaftarEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\JaminanSosial;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class JaminanSosialController extends BaseController
{
    protected $baseRoute = 'data_presisi.jaminan-sosial';
    protected $baseView = 'datapresisi::backend.jaminan_sosial';
    protected $modelName = 'Modules\DataPresisi\Models\JaminanSosial';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-jaminan-sosial';
    private $readonly   = false;   

    private $tahunAktif;

    public function __construct()
    {
        parent::__construct();        
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingJaminanSosial();
    }

    public function index()
    {
        if (request()->ajax()) {
            $canUpdate = can('u');                        
            return datatables($this->sumberData())
                ->addIndexColumn()
                ->addColumn('dtks', static fn ($row) => $row->id_dtks)
                ->addColumn('aksi', static function ($row) use ($canUpdate) {
                    $aksi = '';
                    if ($canUpdate) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.jaminan-sosial', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.jaminan-sosial.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('tanggal_pengisian', static fn ($row) => $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-')
                ->editColumn('tgl_daftar', static fn ($row) => $row->tgl_daftar ? tgl_indo($row->tgl_daftar) : '-')
                ->editColumn('jns_gangguan_mental', static function ($row) {
                    return empty($row->jns_gangguan_mental) && !is_null($row->jns_gangguan_mental) ? 'Normal' : $row->jns_gangguan_mental;
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
                ->rawColumns(['aksi' , 'status_pengisian', 'status_kelengkapan_badge', 'no_kk'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.jaminan_sosial.index', $data);
    }

    public function form($id)
    {
        $data = ['defaultBantuan' => null];
        $jaminanSosial = JaminanSosial::with(relations: ['rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withOnly(['wilayah', 'keluarga']);
            },
            'dtks',
        ])
            ->findOrFail($id);        
        $data['jaminanSosial'] = $jaminanSosial;
        $data['anggota'] = JaminanSosial::whereHas('penduduk', static fn($q) => $q->where('id_rtm', $jaminanSosial->rtm?->no_kk))->with(['penduduk' => static fn($q) => $q->where('id_rtm', $jaminanSosial->rtm?->no_kk), 'keluarga'])->where(['rtm_id' => $data['jaminanSosial']->rtm_id, 'data_presisi_tahun_id' => $data['jaminanSosial']->data_presisi_tahun_id])
            ->get()->map(function ($item) {                
                if (!$item->jns_bantuan) {                    
                    $item->jns_bantuan = JenisBantuanEnum::TIDAK_ADA;                    
                }
                if (!$item->jns_gangguan_mental) {
                    $item->jns_gangguan_mental = JenisGangguanMentalEnum::NORMAL;
                }
                if (!$item->terapi_gangguan_mental) {
                    $item->terapi_gangguan_mental = PenangananGangguanMentalEnum::TIDAK_ADA;
                }
                return $item;
            });
        // untuk menampilkan status dtks
        $dtks = $data['jaminanSosial']->dtks;
        $data['dtks'] = $dtks ? TerdaftarEnum::YA : TerdaftarEnum::TIDAK;
        // berlaku hanya untuk kepala keluarta, di dtks tidak per anggota keluarga
        if($dtks){
            $defaultBantuan = NULL;
            $bnpt = $dtks->kd_bss_bnpt;
            $pkh  = $dtks->kd_pkh;
            
            if($bnpt == StatusEnum::YA){
                $defaultBantuan = 'BPNT';
            } elseif($pkh == StatusEnum::YA){
                $defaultBantuan = 'PKH';
            }
            if($defaultBantuan){
                $data['defaultBantuan'] = $defaultBantuan;
            }                        
        }
        $data['readonly'] = $this->readonly;
        return view('datapresisi::backend.jaminan_sosial.form', $data);
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
                $item['tanggal_pengisian'] = Carbon::now()->toDateString();
                $anggota = JaminanSosial::find($uuid);
                foreach ($item as $key => $value) {
                    if($value == '') {
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

    private function generateMissingJaminanSosial(): void
    {
        $jaminanSosial    = (new JaminanSosial())->getTable();
        $keluarga = (new Keluarga())->getTable();
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
                 ->on("{$penduduk}.config_id", '=', 'rtm.config_id');
        })
        // satu RTM bisa berisi lebih dari 1 keluarga, maka id_kk diambil dari table tweb_penduduk
        // ->leftJoin("{$keluarga} AS keluarga", "rtm.nik_kepala", '=', 'keluarga.nik_kepala')
        ->leftJoin($jaminanSosial, function($join) use ($jaminanSosial, $penduduk, $tahunAktif) {
            return $join->on($jaminanSosial.'.rtm_id', '=' , 'rtm.id')
                ->on($jaminanSosial.'.anggota_id', '=' , $penduduk.'.id')
                ->where($jaminanSosial.'.data_presisi_tahun_id', $tahunAktif->uuid)
                ->where($jaminanSosial.'.config_id', identitas('id'));
        })        
        ->where("{$penduduk}.config_id", identitas('id'))
        ->whereNull($jaminanSosial.'.uuid')
        ->get(); 
        foreach ($allAnggota as $item) {
            JaminanSosial::create([
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
        $jaminanSosial     = (new JaminanSosial())->getTable();
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
        return JaminanSosial::with(['rtm.kepalaKeluarga'])->select(
            $jaminanSosial . '.uuid as id',
            $jaminanSosial . '.rtm_id',
            $jaminanSosial . '.tanggal_pengisian',
            $jaminanSosial . '.jns_bantuan',
            $jaminanSosial . '.jns_gangguan_mental',
            $jaminanSosial . '.terapi_gangguan_mental',
            $jaminanSosial . '.status_kelengkapan',
            DB::raw("(SELECT max(id) FROM {$dtks} d WHERE d.id_rtm = {$jaminanSosial}.rtm_id and d.config_id = '{$configId}') as id_dtks"),            
            'rtm.nik_kepala',
            'rtm.tgl_daftar',
            'rtm.no_kk',
            'kepala_rtm.id_kk',
            'kepala_rtm.nik as nik',
            'kepala_rtm.nama',
            DB::raw("(SELECT COUNT(*) FROM {$penduduk} p WHERE p.id_rtm = rtm.no_kk and p.config_id = '{$configId}') as jumlah_anggota"),
            DB::raw("case when {$jaminanSosial}.updated_at > {$jaminanSosial}.created_at then 1 else 0 end as status_pengisian")
        )
            ->join($rtm . ' AS rtm', $jaminanSosial . '.rtm_id', '=', 'rtm.id')            
            ->join("{$penduduk} AS kepala_rtm", function($join) use($jaminanSosial) {
                $join->on('rtm.nik_kepala', '=', 'kepala_rtm.id')
                    ->on($jaminanSosial . '.anggota_id', '=', 'kepala_rtm.id');
            })            
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)            
            ->when($idCluster, static fn ($q) => $q->whereIn('kepala_rtm.id_cluster', $idCluster))
            ->when($status_pengisian != null, function ($q) use ($status_pengisian, $jaminanSosial) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->whereRaw("{$jaminanSosial}.updated_at > {$jaminanSosial}.created_at");
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereRaw("{$jaminanSosial}.updated_at <= {$jaminanSosial}.created_at");
                }
            })
            ->whereHas('penduduk') // otomatis akan membatasi hak akses berdasarkan wilayah
            ->where('kepala_rtm.status_dasar', 1)            
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
                    if ($orderColumn == 5 && $orderDirection == 'asc') {
                        return $query->orderBy('kepala_rtm.nik', 'asc');
                    }
                    if ($orderColumn == 5 && $orderDirection == 'desc') {
                        return $query->orderBy('kepala_rtm.nik', 'desc');
                    }
                    if ($orderColumn == 6 && $orderDirection == 'asc') {
                        return $query->orderBy('kepala_rtm.nama', 'asc');
                    }
                    if ($orderColumn == 6 && $orderDirection == 'desc') {
                        return $query->orderBy('kepala_rtm.nama', 'desc');
                    }
                }
            });
   }
}
