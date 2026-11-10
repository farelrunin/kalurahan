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

namespace Modules\DataPresisi\Http\Controllers\BackEnd;

use AdminModulController;
use App\Enums\StatusDasarEnum;
use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Models\Tahun;

class BaseController extends AdminModulController
{
    protected $baseRoute = "";
    protected $baseView = "";
    protected $modelName = "";
    public $sub_modul_ini = '';
    protected $uniqueColumn = ['config_id', 'data_presisi_tahun_id', 'rtm_id', 'keluarga_id', 'anggota_id'];
    public function export($privasi_nik = 0): void
    {
        request()->merge(['length' => 100000]);
        // remove parameter orders
        request()->merge(['order' => []]);
        $query = datatables(
            $this->sumberDataLengkap()
                ->when($this->input->post('id_cb'), static function ($query, $id) {
                    $query->whereIn('id', $id);
                })
        );

        $data = [
            'main'  => $query->prepareQuery()->results(),
            'judul' => $this->input->post('judul'),
        ];

        if ($privasi_nik == 1) {
            $data['privasi_nik'] = true;
        }
        
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment; filename=' . $this->sub_modul_ini . '_' . date('Ymd') . '.xls');
        header('Pragma: no-cache');
        header('Expires: 0');

        view($this->baseView . '.export', $data);
    }

    public function ajax_export($aksi = ''): void
    {
        $data['aksi'] = $aksi;
        $data['action'] = ci_route($this->baseRoute . '.export');

        view('datapresisi::components.ajax_cetak_bersama', $data);
    }

    protected function sumberDataLengkap()
    {
        $namaDusun        = $this->input->get('dusun') ?? null;
        $rw               = $this->input->get('rw') ?? null;
        $rt               = $this->input->get('rt') ?? null;
        $status_pengisian = $this->input->get('status_pengisian') ?? null;
        $idCluster        = $rt ? [$rt] : [];
        $tahunAktif = Tahun::active()->first();


        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }
        $model = new $this->modelName; 
        $tableName = $model->getTable();
        $relasi = ['rtm.kepalaKeluarga', 'penduduk'];
        switch ($this->modelName) {
            case 'Modules\DataPresisi\Models\Pangan':
            case 'Modules\DataPresisi\Models\Papan':
                $relasi = ['rtm.kepalaKeluarga'];
                break;
            case 'Modules\DataPresisi\Models\AktivitasAdat':
                $relasi = ['rtm.kepalaKeluarga', 'penduduk', 'lembaga'];
                break;
            default:
        }
        return $model->selectRaw($tableName.'.*')->with($relasi)->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join('tweb_rtm', 'tweb_rtm.id', '=', 'rtm_id')
            ->when($idCluster, static fn($q) => $q->whereHas('kepalaRumahTangga', static fn($r) => $r->whereIn('id_cluster', $idCluster)))
            ->when($status_pengisian != null, function ($q) use ($status_pengisian) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->whereRaw("updated_at > created_at");
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereRaw("updated_at <= created_at");
                }
            })
            ->whereHas('kepalaRumahTangga') // otomatis akan membatasi hak akses berdasarkan wilayah;
            ->orderBy('tweb_rtm.no_kk');
    }

    public function periksa()
    {
        view('datapresisi::backend.periksa', $this->dataPeriksa());
    }

    protected function dataPeriksa()
    {
        $tahunAktif = Tahun::active()->first();

        // Query untuk mendapatkan data ganda (berdasarkan rtm_id yang sama)
        $dataGanda = $this->dataGanda($tahunAktif);
        // Query untuk mendapatkan data yang tidak sinkron dengan RTM
        $dataTidakSinkron = $this->dataTidakSinkron(tahunAktif: $tahunAktif);

        return [
            'dataGanda' => $dataGanda,
            'dataTidakSinkron' => $dataTidakSinkron,
            'baseRoute' => $this->baseRoute,
            'baseView' => $this->baseView,
            'sub_modul_ini' => $this->sub_modul_ini
        ];
    }

    public function deleteDataGanda()
    {
        try {
            $model = new $this->modelName;
            $model->whereIn('uuid', $this->request['id_cb'])->delete();

            redirect_with('success', 'Berhasil menghapus data yang dipilih', ci_route($this->baseRoute . '.periksa', 1));
        } catch (\Exception $e) {
            redirect_with('error', 'Gagal menghapus data: ' . $e->getMessage(), ci_route($this->baseRoute . '.periksa', 1));
        }
    }

    /**
     * Mendapatkan data lengkap dengan subquery untuk filter data ganda
     */
    protected function dataGanda(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();

        // Subquery untuk mengidentifikasi data ganda
        $duplicateSubquery = DB::table($tableName)
            ->select($this->uniqueColumn)
            ->selectRaw('count(*) as total')
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->where('config_id', $tahunAktif->config_id)
            ->groupBy($this->uniqueColumn)
            ->having('total', '>', 1);

        // Query utama dengan subquery
        $query = $model->with(['penduduk', 'rtm'])
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->where(function ($q) use ($duplicateSubquery, $tableName) {
                $q->whereExists(function ($subquery) use ($duplicateSubquery, $tableName) {
                    $subquery->select(DB::raw(1))
                        ->from(DB::raw("({$duplicateSubquery->toSql()}) as duplicates"))
                        ->whereRaw("duplicates.config_id = {$tableName}.config_id")
                        ->whereRaw("duplicates.data_presisi_tahun_id = {$tableName}.data_presisi_tahun_id")
                        ->whereRaw("duplicates.rtm_id = {$tableName}.rtm_id")
                        //->whereRaw("duplicates.keluarga_id = {$tableName}.keluarga_id")
                        ->whereRaw("duplicates.anggota_id = {$tableName}.anggota_id")
                        ->mergeBindings($duplicateSubquery);
                });
            });
        // Fix: orderBy() expects a string, not an array
        $orderByClause = implode(', ', $this->uniqueColumn);
        return $query->orderByRaw($orderByClause)->orderBy('created_at')->get();
    }

    protected function dataTidakSinkron(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();
        $orderByClause = implode(', ', $this->uniqueColumn);
        return $model->selectRaw($tableName . '.*,current_rtm.no_kk as rtm_aktif, tweb_rtm.no_kk as rtm_sebelumnya')
            ->with(['penduduk', 'rtm'])
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join('tweb_rtm as current_rtm', function ($q) use ($tableName) {
                return $q->on('current_rtm.id', '=', $tableName . '.rtm_id')
                    ->on('current_rtm.config_id', '=', $tableName . '.config_id');
            })->join('tweb_penduduk', function ($q) use ($tableName) {
                return $q->on('tweb_penduduk.id', '=', $tableName . '.anggota_id')
                    ->on('tweb_penduduk.config_id', '=', $tableName . '.config_id');
            })->leftJoin('tweb_rtm', function ($q) {
                return $q->on('tweb_rtm.no_kk', '=', 'tweb_penduduk.id_rtm')
                    ->on('tweb_rtm.config_id', '=', 'tweb_penduduk.config_id');
            })->whereRaw($tableName . '.rtm_id != tweb_rtm.id or (tweb_rtm.id is null or tweb_penduduk.status_dasar != 1)')
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
                ->join('tweb_penduduk', function ($q) use ($tableName) {
                    return $q->on('tweb_penduduk.id', '=', $tableName . '.anggota_id')
                        ->on('tweb_penduduk.config_id', '=', $tableName . '.config_id');
                })->leftJoin('tweb_rtm', function ($q) {
                    return $q->on('tweb_rtm.no_kk', '=', 'tweb_penduduk.id_rtm')
                        ->on('tweb_rtm.config_id', '=', 'tweb_penduduk.config_id');
                })->whereRaw($tableName . '.rtm_id != tweb_rtm.id and tweb_penduduk.status_dasar =' . StatusDasarEnum::HIDUP)
                ->get();

            if(!$pindah->isEmpty()){
                foreach ($pindah as $key => $item) {                                        
                    $model->where(
                        [
                            'anggota_id' => $item->anggota_id,
                            'data_presisi_tahun_id' => $item->data_presisi_tahun_id,
                            'config_id' => $item->config_id,
                            'rtm_id' => $item->rtm_seharusnya
                        ]
                    )->where('uuid','!=', $item->uuid)->delete();
                    $item->rtm_id = $item->rtm_seharusnya;
                    $item->save();
                }
            }    
            redirect_with('success', 'Berhasil memindahkan data yang dipilih', ci_route($this->baseRoute . '.periksa', 1));
        } catch (\Exception $e) {
            redirect_with('error', 'Gagal memindahkan data: ' . $e->getMessage(), ci_route($this->baseRoute . '.periksa', 1));
        }
    }

    protected function sumberData(){
        return Builder::query();
    }
    public function cetak($aksi = 'cetak', $privasi_nik = 0): void
    {        
        request()->merge(['length' => null]);
        $query = datatables(
            $this->sumberData()
                ->when($this->input->post('id_cb'), static function ($query, $id) {
                        $query->whereIn('id', $id);
                    })
        );
        
        $data = [
            'main'  => $query->prepareQuery()->results(),
            'start' => app('datatables.request')->start(),
            'judul' => $this->input->post('judul'),
        ];
        if ($privasi_nik == 1) {
            $data['privasi_nik'] = true;
        }
        if ($aksi == 'unduh') {
            $filename = $data['judul'] ?: Str::replace('-','_', $this->sub_modul_ini);
            header('Content-type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.$filename.'_'. date('Ymd') . '.xls');
            header('Pragma: no-cache');
            header('Expires: 0');
        }
        view($this->baseView.'.cetak', $data);
    }

    public function ajax_cetak($aksi = ''): void
    {
        $data['aksi']   = $aksi;
        $data['action'] = ci_route($this->baseRoute.'.cetak.' . $aksi);

        view('datapresisi::components.ajax_cetak_bersama', $data);
    }
}
