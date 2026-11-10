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

use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\PendudukSaja;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\Sandang;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class SandangController extends BaseController
{
    protected $baseRoute = 'data_presisi.sandang';
    protected $baseView = 'datapresisi::backend.sandang';
    protected $modelName = 'Modules\DataPresisi\Models\Sandang';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-sandang';
    private $tahunAktif;
    public function __construct()
    {
        parent::__construct();        
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingSandang();
    }

    public function index()
    {
        if (request()->ajax()) {            
            return datatables()->of($this->sumberData())
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) {                    
                    $aksi = '';
                    if (can('u')) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.sandang', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.sandang.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('tanggal_pengisian', static function ($row) {
                    return $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-';
                })
                ->editColumn('tgl_daftar', static fn ($q) => tgl_indo($q->tgl_daftar))
                ->addColumn('terdaftar', static fn ($q) => $q->sandang_status === 'lengkap' ? '<label class="label label-success">Sudah Isi</label>' : '<label class="label label-danger">Belum Isi</label>')
                ->addColumn('status_kelengkapan_badge', static function ($row) {
                    $status = $row->status_kelengkapan ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($status);
                    $statusText = StatusKelengkapanEnum::valueOf($status);
                    return '<label class="label ' . $badgeClass . '">' . $statusText . '</label>';
                })
                ->rawColumns(['aksi', 'ceklist', 'foto', 'terdaftar', 'status_kelengkapan_badge'])
                ->make();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.sandang.index', $data);
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
        $sandangTable = (new Sandang)->getTable();
        $orders    = $this->input->get('order') ?? [];
        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }
        $rtmTable = (new Rtm)->getTable();
        return Rtm::status()->selectRaw($rtmTable.'.*, '.$sandangTable.'.status_pengisian as sandang_status, '.$sandangTable.'.tanggal_pengisian as tanggal_pengisian, '.$sandangTable.'.status_kelengkapan as status_kelengkapan')        
        ->join($sandangTable, function($join) use ($sandangTable, $rtmTable, $tahunAktif) {
            return $join->on($sandangTable.'.rtm_id', '=' , $rtmTable.'.id')->on($sandangTable.'.anggota_id', '=' , $rtmTable.'.nik_kepala')
                    ->where('data_presisi_tahun_id', $tahunAktif->uuid);
        })->when($status_pengisian != null, function ($q) use ($status_pengisian, $sandangTable) {
            if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                $q->where($sandangTable.'.status_pengisian', 'lengkap');
            } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                $q->whereNull($sandangTable.'.status_pengisian');
            }
        })
            ->when($sex, static fn ($q) => $q->whereHas('kepalaKeluarga', static fn ($r) => $r->whereSex($sex)))
            ->when(in_array($bdt, [BELUM_MENGISI, JUMLAH]), static fn ($q) => $bdt == BELUM_MENGISI ? $q->whereNull('bdt') : $q->whereNotNull('bdt'))
            ->when($idCluster, static fn ($q) => $q->whereHas('kepalaKeluarga.keluarga', static fn ($r) => $r->whereIn('id_cluster', $idCluster)))
            ->whereHas('kepalaKeluarga') // otomatis akan membatasi hak akses berdasarkan wilayah
            ->with(['kepalaKeluarga' => static fn ($q) => $q->withOnly(['keluarga']), 'anggota' => static fn ($q) => $q->select(['id', 'id_rtm', 'id_kk'])])->withCount('anggota')
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
        $tahunAktif = $this->tahunAktif;
        $sandang = Sandang::with(['rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->first();        
        $data['sandang'] = $sandang;
        // hapus anggota yang sudah tidak ada di rtm anggota
        if ($sandang) {
            $anggotaIds = $sandang->rtm->anggota->pluck('id')->toArray();
            Sandang::where('rtm_id', $id)
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->whereNotIn('anggota_id', $anggotaIds)
            ->delete();
        }
        $arr = [];
        
        foreach ($sandang->rtm->anggota as $r) {
            $sandang = Sandang::where('rtm_id', $id)->where('anggota_id', $r->id)->where('data_presisi_tahun_id', $tahunAktif->uuid)->first();
            $arr[] = [
                'nik'                             => $r->nik,
                'no_kk'                           => $r->keluarga->no_kk,
                'nama'                            => $r->nama,
                'rtm_id'                          => $id,
                'keluarga_id'                     => $r->keluarga->id,
                'anggota_id'                      => $r->id,
                'jml_pakaian_yg_dimiliki'         => $sandang ? $sandang->jml_pakaian_yg_dimiliki : '',
                'frekwensi_beli_pakaian_pertahun' => $sandang ? $sandang->frekwensi_beli_pakaian_pertahun : '',
                'jenis_pakaian'                   => $sandang ? $sandang->jenis_pakaian : '',
                'frekwensi_ganti_pakaian'         => $sandang ? $sandang->frekwensi_ganti_pakaian : '',
                'tmpt_cuci_pakaian'               => $sandang ? $sandang->tmpt_cuci_pakaian : '',
                'jml_pakaian_seragam'             => $sandang ? $sandang->jml_pakaian_seragam : '',
                'jml_pakaian_sembahyang'          => $sandang ? $sandang->jml_pakaian_sembahyang : '',
                'jml_pakaian_kerja'               => $sandang ? $sandang->jml_pakaian_kerja : '',
                'tanggal_pengisian'               => $sandang ? $sandang->tanggal_pengisian : '',
                'status_pengisian'                => $sandang ? $sandang->status_pengisian : '',
            ];
        }

        $data['anggota'] = $arr;

        return view('datapresisi::backend.sandang.form', $data);
    }

    public function show($id)
    {
        $tahunAktif = $this->tahunAktif;
        $query = Sandang::with([
            'penduduk',
            'rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->where('rtm_id', $id);

        $data['sandang'] = (clone $query)->first();

        $arr = [];
        
        foreach ($data['sandang']->rtm->anggota as $r) {
            $sandang = Sandang::where('rtm_id', $id)->where('anggota_id', $r->id)->where('data_presisi_tahun_id', $tahunAktif->uuid)->first();
            $arr[] = [
                'nik'                             => $r->nik,
                'no_kk'                           => $r->keluarga->no_kk,
                'nama'                            => $r->nama,
                'rtm_id'                          => $id,
                'keluarga_id'                     => $r->keluarga->id,
                'anggota_id'                      => $r->id,
                'jml_pakaian_yg_dimiliki'         => $sandang ? $sandang->jml_pakaian_yg_dimiliki : '',
                'frekwensi_beli_pakaian_pertahun' => $sandang ? $sandang->frekwensi_beli_pakaian_pertahun : '',
                'jenis_pakaian'                   => $sandang ? $sandang->jenis_pakaian : '',
                'frekwensi_ganti_pakaian'         => $sandang ? $sandang->frekwensi_ganti_pakaian : '',
                'tmpt_cuci_pakaian'               => $sandang ? $sandang->tmpt_cuci_pakaian : '',
                'jml_pakaian_seragam'             => $sandang ? $sandang->jml_pakaian_seragam : '',
                'jml_pakaian_sembahyang'          => $sandang ? $sandang->jml_pakaian_sembahyang : '',
                'jml_pakaian_kerja'               => $sandang ? $sandang->jml_pakaian_kerja : '',
                'tanggal_pengisian'               => $sandang ? $sandang->tanggal_pengisian : '',
                'status_pengisian'                => $sandang ? $sandang->status_pengisian : '',
            ];
        }

        $data['anggota'] = $arr;

        return view('datapresisi::backend.sandang.show', $data);
    }

    public function update($id)
    {
        isCan('u');

        try {

            DB::beginTransaction();

            $data = $this->input->post('form');
            $status_kelengkapan = $this->input->post('status_kelengkapan') ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
            $tahunAktif = $this->tahunAktif;
            
            foreach ($data as $item) {

                $sandang = Sandang::where('rtm_id', $id)->where('anggota_id', $item['anggota_id'])->where('data_presisi_tahun_id',$tahunAktif->uuid)->first();

                // Lakukan update data
                $sandang->update([
                    'jml_pakaian_yg_dimiliki'         => $item['jml_pakaian_yg_dimiliki'],
                    'frekwensi_beli_pakaian_pertahun' => $item['frekwensi_beli_pakaian_pertahun'],
                    'jenis_pakaian'                   => $item['jenis_pakaian'],
                    'frekwensi_ganti_pakaian'         => $item['frekwensi_ganti_pakaian'],
                    'tmpt_cuci_pakaian'               => $item['tmpt_cuci_pakaian'],
                    'jml_pakaian_seragam'             => $item['jml_pakaian_seragam'],
                    'jml_pakaian_sembahyang'          => $item['jml_pakaian_sembahyang'],
                    'jml_pakaian_kerja'               => $item['jml_pakaian_kerja'],
                    'tanggal_pengisian'               => Carbon::now()->format('Y-m-d'),
                    'status_pengisian'                => 'lengkap',
                    'status_kelengkapan'          => $status_kelengkapan,
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

    private function generateMissingSandang(): void
    {
        $sandang  = (new Sandang())->getTable();
        $keluarga = (new Keluarga())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $rtm      = (new Rtm())->getTable();
        $tahunAktif = $this->tahunAktif;
            $all_anggota = PendudukSaja::status()->select(
                'rtm.id as rtm_id',
                "{$penduduk}.id_kk AS keluarga_id",
                "{$penduduk}.id as anggota_id"
            )
                ->join("{$rtm} AS rtm", function($join) use ($penduduk, $rtm) {
                    $join->on("{$penduduk}.id_rtm", '=', 'rtm.no_kk')
                         ->on("{$penduduk}.config_id", '=', 'rtm.config_id')
                         ->where('rtm.nik_kepala','!=',0);
                })
                // satu RTM bisa berisi lebih dari 1 keluarga, maka id_kk diambil dari table tweb_penduduk
                // ->leftJoin("{$keluarga} AS keluarga", 'rtm.nik_kepala', '=', 'keluarga.nik_kepala')                
                ->leftJoin($sandang, function($join) use ($sandang, $tahunAktif, $penduduk) {
                    return $join->on($sandang.'.rtm_id', '=' , 'rtm.id')
                            ->on($sandang.'.anggota_id','=', $penduduk.'.id')
                            ->where($sandang.'.data_presisi_tahun_id', $tahunAktif->uuid);
                })                
                ->whereNull($sandang.'.uuid')
                ->get();
        
        foreach ($all_anggota as $item) {
            Sandang::create(['rtm_id' => $item->rtm_id, 'config_id' => identitas('id'), 'keluarga_id' => $item->keluarga_id, 'anggota_id' => $item->anggota_id, 'data_presisi_tahun_id' => $tahunAktif->uuid]);
        }
    }    
}
