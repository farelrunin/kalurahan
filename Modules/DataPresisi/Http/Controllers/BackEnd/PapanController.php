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

use App\Enums\Dtks\Regsosek2022kEnum;
use App\Enums\StatusDasarEnum;
use App\Models\Dtks;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\Papan;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class PapanController extends BaseController
{
    protected $baseRoute = 'data_presisi.papan';
    protected $baseView = 'datapresisi::backend.papan';
    protected $modelName = 'Modules\DataPresisi\Models\Papan';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-papan';
    protected $uniqueColumn = ['config_id', 'data_presisi_tahun_id', 'rtm_id', 'keluarga_id'];
    private $tahunAktif;
    public function __construct()
    {
        parent::__construct();
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingPapan();
    }

    public function index()
    {
        if (request()->ajax()) {
            $regsosek = pilihanBagianTanpaNomor(Regsosek2022kEnum::pilihanBagian3());
            return datatables($this->sumberData())
                ->addIndexColumn()
                ->addColumn('dtks', static fn($row) => $row->id_dtks)
                ->addColumn('aksi', static function ($row) {
                    $aksi = '';
                    if (can('u')) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.papan', $row->uuid) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.papan.show', $row->uuid) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('tanggal_pengisian', static function ($row) {
                    return $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-';
                })
                ->editColumn('tgl_daftar', static fn ($q) => tgl_indo($q->tgl_daftar))
                ->addColumn('jumlah_anggota', static fn($row) => $row->anggota_count ?? 0)
                ->addColumn('kd_stat_bangunan_tinggal', static fn($row) => $regsosek['301a'][$row->kd_stat_bangunan_tinggal] ?? '')
                ->addColumn('kd_jenis_lantai_terluas', static fn($row) => $regsosek['303'][$row->kd_jenis_lantai_terluas] ?? '')
                ->addColumn('kd_jenis_dinding', static fn($row) => $regsosek['304'][$row->kd_jenis_dinding] ?? '')
                ->addColumn('kd_jenis_atap', static fn($row) => $regsosek['305'][$row->kd_jenis_atap] ?? '')
                ->addColumn('kd_sumber_air_minum', static fn($row) => $regsosek['306a'][$row->kd_sumber_air_minum] ?? '')
                ->addColumn('kd_jarak_sumber_air_ke_tpl', static fn($row) => $regsosek['306b'][$row->kd_jarak_sumber_air_ke_tpl] ?? '')
                ->addColumn('kd_pembuangan_akhir_tinja', static fn($row) => $regsosek['310'][$row->kd_pembuangan_akhir_tinja] ?? '')
                ->addColumn('kd_sumber_penerangan_utama', static fn($row) => $regsosek['307a'][$row->kd_sumber_penerangan_utama] ?? '')
                ->addColumn('kd_daya_terpasang', static fn($row) => $regsosek['307b1'][$row->kd_daya_terpasang] ?? '')
                ->addColumn('kd_daya_terpasang2', static fn($row) => $regsosek['307b2'][$row->kd_daya_terpasang2] ?? '')
                ->addColumn('kd_daya_terpasang3', static fn($row) => $regsosek['307b3'][$row->kd_daya_terpasang3] ?? '')
                ->editColumn('status_pengisian', static function ($row) {
                    return $row->status_pengisian ? '<span class="label label-success">Sudah isi</span>' : '<span class="label label-danger">Belum Isi</span>';
                })
                ->addColumn('status_kelengkapan_badge', static function ($row) {
                    $status = $row->status_kelengkapan ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
                    $badgeClass = StatusKelengkapanEnum::getBadgeClass($status);
                    $statusText = StatusKelengkapanEnum::valueOf($status);
                    return '<label class="label ' . $badgeClass . '">' . $statusText . '</label>';
                })//->filterColumn('no_kk', static fn($query, $keyword) => $query->whereRaw('kepala_rtm.nik LIKE ?', ['%' . $keyword . '%']))
                //->filterColumn('nama', static fn($query, $keyword) => $query->whereRaw('kepala_rtm.nama LIKE ?', ['%' . $keyword . '%']))
                ->rawColumns(['aksi', 'status_pengisian', 'status_kelengkapan_badge'])
                ->toJson();
        }

        $data = [
            'wilayah' => Wilayah::treeAccess(),
        ];

        return view('datapresisi::backend.papan.index', $data);
    }

    public function form($id)
    {
        $data['papan'] = Papan::with([
            'rtm',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withOnly('Wilayah', 'keluarga');
            },
            'dtks',
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->findOrFail($id);
        // dd($data['papan']);
        $data['rtm'] = Rtm::with('kepalaKeluarga')
            ->where('id', '!=', $data['papan']->rtm_id)
            ->orderBy('no_kk')
            ->get();

        $data['pilihan3'] = pilihanBagianTanpaNomor(Regsosek2022kEnum::pilihanBagian3());

        return view('datapresisi::backend.papan.form', $data);
    }

    public function show($id)
    {
        $papan = (new Papan())->getTable();
        $dtks = (new Dtks())->getTable();
        $item = Papan::with([
            'rtm',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                // override all items within the $with property in Penduduk
                $builder->withOnly('Wilayah', 'keluarga');
            },
            'dtks',
        ])->select([
                    $papan . '.*',
                    DB::raw('CASE
                    WHEN (' . $papan . '.kd_stat_bangunan_tinggal = ' . $dtks . '.kd_stat_bangunan_tinggal
                            OR (' . $papan . '.kd_stat_bangunan_tinggal IS NULL AND ' . $dtks . '.kd_stat_bangunan_tinggal IS NULL)
                        )
                    AND (' . $papan . '.luas_lantai = ' . $dtks . '.luas_lantai
                            OR (' . $papan . '.luas_lantai IS NULL AND ' . $dtks . '.luas_lantai IS NULL)
                        )
                    AND (' . $papan . '.kd_jenis_lantai_terluas = ' . $dtks . '.kd_jenis_lantai_terluas
                            OR (' . $papan . '.kd_jenis_lantai_terluas IS NULL AND ' . $dtks . '.kd_jenis_lantai_terluas IS NULL)
                        )
                    AND (' . $papan . '.kd_jenis_dinding = ' . $dtks . '.kd_jenis_dinding
                            OR (' . $papan . '.kd_jenis_dinding IS NULL AND ' . $dtks . '.kd_jenis_dinding IS NULL)
                        )
                    AND (' . $papan . '.kd_jenis_atap = ' . $dtks . '.kd_jenis_atap
                            OR (' . $papan . '.kd_jenis_atap IS NULL AND ' . $dtks . '.kd_jenis_atap IS NULL)
                        )
                    AND (' . $papan . '.kd_sumber_air_minum = ' . $dtks . '.kd_sumber_air_minum
                            OR (' . $papan . '.kd_sumber_air_minum IS NULL AND ' . $dtks . '.kd_sumber_air_minum IS NULL)
                        )
                    AND (' . $papan . '.kd_jarak_sumber_air_ke_tpl = ' . $dtks . '.kd_jarak_sumber_air_ke_tpl
                            OR (' . $papan . '.kd_jarak_sumber_air_ke_tpl IS NULL AND ' . $dtks . '.kd_jarak_sumber_air_ke_tpl IS NULL)
                        )
                    AND (' . $papan . '.kd_pembuangan_akhir_tinja = ' . $dtks . '.kd_pembuangan_akhir_tinja
                            OR (' . $papan . '.kd_pembuangan_akhir_tinja IS NULL AND ' . $dtks . '.kd_pembuangan_akhir_tinja IS NULL)
                        )
                    AND (' . $papan . '.kd_sumber_penerangan_utama = ' . $dtks . '.kd_sumber_penerangan_utama
                            OR (' . $papan . '.kd_sumber_penerangan_utama IS NULL AND ' . $dtks . '.kd_sumber_penerangan_utama IS NULL)
                        )
                    AND (' . $papan . '.kd_daya_terpasang = ' . $dtks . '.kd_daya_terpasang
                            OR (' . $papan . '.kd_daya_terpasang IS NULL AND    ' . $dtks . '.kd_daya_terpasang IS NULL)
                        )
                    AND (' . $papan . '.kd_daya_terpasang2 = ' . $dtks . '.kd_daya_terpasang2
                            OR (' . $papan . '.kd_daya_terpasang2 IS NULL AND ' . $dtks . '.kd_daya_terpasang2 IS NULL)
                        )
                    AND (' . $papan . '.kd_daya_terpasang3 = ' . $dtks . '.kd_daya_terpasang3
                            OR (' . $papan . '.kd_daya_terpasang3 IS NULL AND ' . $dtks . '.kd_daya_terpasang3 IS NULL)
                        )
                    THEN 1 ELSE 0 END as is_sync'),
                ])->join($dtks . ' AS dtks', $papan . '.rtm_id', '=', 'dtks.id_rtm', 'left')
            ->where('uuid', $id)->first();
        $dtksFieldMapping = array_flip(Papan::$dtksItemMapping);
        $pilihanBagian3 = pilihanBagianTanpaNomor(Regsosek2022kEnum::pilihanBagian3());

        foreach ($dtksFieldMapping as $key => $value) {
            $mapKey = 'value_' . $key;
            $item->{$mapKey} = $pilihanBagian3[$value][$item->{$key}] ?? '';
        }
        $isSync = $item->is_sync;
        if ($item->dtks) {
            $syncLabel = $isSync ? 'Data Sinkron' : 'Data Berbeda';
            $labelClass = $isSync ? 'label-success' : 'label-danger';
            $alertClass = $isSync ? 'info' : 'primary';
        } else {
            $syncLabel = 'Tidak Terdaftar';
            $labelClass = 'label-info';
            $alertClass = 'danger';
        }

        $data = [
            'item' => $item,
            'namaKepala' => $item->rtm->kepalaKeluarga->nama,
            'nikKepala' => $item->rtm->kepalaKeluarga->nik,
            'pilihanRegsosek' => pilihanBagianTanpaNomor(Regsosek2022kEnum::pilihanBagian3()),
            'syncLabel' => $syncLabel,
            'labelClass' => $labelClass,
            'alertClass' => $alertClass,
        ];

        return view('datapresisi::backend.papan.show', $data);
    }

    public function update($id)
    {
        isCan('u');

        try {
            $papan = Papan::findOrFail($id);
            $data = $this->validate($this->request);

            DB::beginTransaction();

            // Update data Papan
            $data['tanggal_pengisian'] = Carbon::now()->toDateString();
            $data['status_kelengkapan'] = $this->input->post('status_kelengkapan') ?? StatusKelengkapanEnum::TIDAK_LENGKAP;
            $papan->update($data);

            // Jika ada DTKS terkait, update juga data DTKS
            if ($papan->dtks) {
                $dtksData = array_intersect_key($data, array_flip([
                    'kd_stat_bangunan_tinggal',
                    'luas_lantai',
                    'kd_jenis_lantai_terluas',
                    'kd_jenis_dinding',
                    'kd_jenis_atap',
                    'kd_sumber_air_minum',
                    'kd_jarak_sumber_air_ke_tpl',
                    'kd_pembuangan_akhir_tinja',
                    'kd_sumber_penerangan_utama',
                    'kd_daya_terpasang',
                ]));

                if (!empty($dtksData)) {
                    $papan->dtks->update($dtksData);
                }
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

    private function validate(array $request = []): array
    {
        $validated = [];
        $message = [];

        // Validasi input luas lantai
        foreach ($request['input']['3'] as $key => $input) {
            if ($key == '302') {
                if ($input != '' && !is_numeric($input)) {
                    $message[] = 'Luas lantai harus berupa angka';
                }
            }
        }

        // Validasi pilihan-pilihan
        foreach ($request['pilihan']['3'] as $key => $input) {
            if ($input == '') {
                continue;
            }

            $fieldName = "pilihan[3][{$key}]";
            if (isset(Papan::$dtksFieldMapping[$fieldName])) {
                $mappedField = Papan::$dtksFieldMapping[$fieldName];

                if (!array_key_exists($input, Regsosek2022kEnum::pilihanBagian3()["{$key}"])) {
                    switch ($mappedField) {
                        case 'kd_stat_bangunan_tinggal':
                            $message[] = 'Status kepemilikan bangunan tidak valid';
                            break;

                        case 'kd_jenis_lantai_terluas':
                            $message[] = 'Jenis lantai tidak valid';
                            break;

                        case 'kd_jenis_dinding':
                            $message[] = 'Jenis dinding tidak valid';
                            break;

                        case 'kd_jenis_atap':
                            $message[] = 'Jenis atap tidak valid';
                            break;

                        case 'kd_sumber_air_minum':
                            $message[] = 'Sumber air minum tidak valid';
                            break;

                        case 'kd_jarak_sumber_air_ke_tpl':
                            $message[] = 'Jarak sumber air ke tempat pembuangan limbah tidak valid';
                            break;

                        case 'kd_pembuangan_akhir_tinja':
                            $message[] = 'Tempat pembuangan akhir tinja tidak valid';
                            break;

                        case 'kd_sumber_penerangan_utama':
                            $message[] = 'Sumber penerangan utama tidak valid';
                            break;

                        case 'kd_daya_terpasang':
                        case 'kd_daya_terpasang2':
                        case 'kd_daya_terpasang3':
                            $message[] = 'Daya listrik terpasang tidak valid';
                            break;

                        default:
                            $message[] = "Pilihan tidak valid untuk {$mappedField}";
                    }
                }
            }
        }

        if (!empty($message)) {
            throw new Exception(implode(', ', $message));
        }

        // Isi $validated sesuai mapping jika input ada
        foreach (Papan::$dtksFieldMapping as $requestKey => $dbField) {
            // Pisahkan string berdasarkan karakter '[' dan ']'
            $parts = explode('[', str_replace(']', '', $requestKey));

            // Ambil tipe (pilihan/input) dari bagian pertama
            $type = $parts[0];

            // Ambil nomor bagian dari array kedua
            $number = $parts[1];

            // Ambil kode pertanyaan dari array ketiga
            $key = $parts[2] ?? '';

            // Untuk debugging, tampilkan hasil parsing
            // var_dump("Tipe: {$type}, Nomor: {$number}, Kode: {$key}"); echo '<br>';
            if (isset($request[$type][$number][$key])) {
                $value = $request[$type][$number][$key];
                $value = empty($value) ? null : $value;
                $validated[$dbField] = $value;
            }
        }

        // Validasi khusus field Papan yang tidak ada di DTKS
        if (isset($request['luas_lahan_pekarangan'])) {
            if (is_numeric($request['luas_lahan_pekarangan']) && $request['luas_lahan_pekarangan'] >= 0) {
                $validated['luas_lahan_pekarangan'] = (int) $request['luas_lahan_pekarangan'];
            } else {
                $validated['luas_lahan_pekarangan'] = null;
            }
        }

        if (isset($request['jumlah_kamar_tidur'])) {
            if (is_numeric($request['jumlah_kamar_tidur']) && $request['jumlah_kamar_tidur'] >= 0) {
                $validated['jumlah_kamar_tidur'] = (int) $request['jumlah_kamar_tidur'];
            } else {
                $validated['jumlah_kamar_tidur'] = null;
            }
        }

        if($validated['kd_stat_bangunan_tinggal'] == 6) {
            $validated['rtm_bersama'] = $request['rtm_bersama'];
        } else {
            $validated['rtm_bersama'] = null;
        }

        return $validated;
    }

    private function generateMissingPapan(): void
    {
        $papan = (new Papan())->getTable();
        $keluarga = (new Keluarga())->getTable();
        $rtm = (new Rtm())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $tahunAktif = $this->tahunAktif;
        $all_rtm = Rtm::select([
            "{$rtm}.id as rtm_id",
            'kepala_rtm.id_kk as keluarga_id',
        ])
            ->join("{$penduduk} AS kepala_rtm", function($join) use ($penduduk, $rtm) {
                $join->on("{$rtm}.nik_kepala", '=', 'kepala_rtm.id')
                     ->on("{$rtm}.config_id", '=', 'kepala_rtm.config_id')
                     ->where('kepala_rtm.nik','!=',0)
                     ->where('kepala_rtm.status_dasar', '=', 1); // Hanya generate untuk kepala RTM yang masih hidup
            })
            //->join("{$keluarga} AS keluarga", 'kepala_rtm.id_kk', '=', 'keluarga.id')
            ->leftJoin($papan, function ($join) use ($papan, $tahunAktif) {
                return $join->on($papan . '.rtm_id', '=', 'tweb_rtm.id')
                    ->where($papan . '.data_presisi_tahun_id', $tahunAktif->uuid);
            })
            // Pastikan RTM sesuai dengan id_rtm penduduk kepala RTM
            ->whereRaw('tweb_rtm.no_kk = kepala_rtm.id_rtm')
            ->whereNull($papan . '.uuid')
            ->get();

        foreach ($all_rtm as $item) {
            Papan::create([
                'rtm_id' => $item->rtm_id,
                'config_id' => identitas('id'),
                'keluarga_id' => $item->keluarga_id,
                'data_presisi_tahun_id' => $tahunAktif->uuid,
            ]);
        }
    }

    protected function sumberData()
    {
        $keluarga = (new Keluarga())->getTable();
        $penduduk = (new Penduduk())->getTable();
        $papan = (new Papan())->getTable();
        $dtks = (new Dtks())->getTable();
        $rtm = (new Rtm())->getTable();
        $namaDusun = $this->input->get('dusun') ?? null;
        $rw = $this->input->get('rw') ?? null;
        $rt = $this->input->get('rt') ?? null;
        $status_pengisian  = $this->input->get('status_pengisian') ?? null;
        $orders = $this->input->get('order') ?? [];
        $tahunAktif = $this->tahunAktif;
        $idCluster = $rt ? [$rt] : [];

        if (empty($idCluster) && !empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && !empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }
        $configId = identitas('id');

        // Gunakan Rtm::status() sebagai base query untuk memastikan jumlah baris sama seperti di Kesehatan
        $query = Rtm::status()
            ->with(
                ['kepalaKeluarga' => static fn($q) => $q->withOnly(['keluarga', 'wilayah']), 'anggota' => static fn($q) => $q->select(['id', 'id_rtm', 'id_kk'])]
                )
            ->join("{$papan} AS papan", 'papan.rtm_id', '=', "{$rtm}.id")
            ->leftJoin("{$dtks} AS dtks", 'papan.rtm_id', '=', 'dtks.id_rtm')
            //->join("{$penduduk} AS kepala_rtm", "{$rtm}.nik_kepala", '=', 'kepala_rtm.id')
            ->select([
                "{$rtm}.no_kk",
                "{$rtm}.tgl_daftar",
                "{$rtm}.nik_kepala",  
                'papan.uuid',
                'papan.rtm_id',
                'papan.data_presisi_tahun_id',
                'papan.tanggal_pengisian',
                'dtks.id as id_dtks',
                //'kepala_rtm.id_kk',
                //'kepala_rtm.nik as nik_kepala',
                //'kepala_rtm.nama',
                'papan.luas_lahan_pekarangan',
                'papan.jumlah_kamar_tidur',
                'papan.keluarga_id',
                'papan.kd_stat_bangunan_tinggal',
                'papan.luas_lantai',
                'papan.kd_jenis_lantai_terluas',
                'papan.kd_jenis_dinding',
                'papan.kd_jenis_atap',
                'papan.kd_sumber_air_minum',
                'papan.kd_jarak_sumber_air_ke_tpl',
                'papan.kd_pembuangan_akhir_tinja',
                'papan.kd_sumber_penerangan_utama',
                'papan.kd_daya_terpasang',
                'papan.kd_daya_terpasang2',
                'papan.kd_daya_terpasang3',
                'papan.updated_at',
                'papan.status_kelengkapan',
                // Cek apakah data papan dan dtks sama
                DB::raw('CASE
                    WHEN (papan.kd_stat_bangunan_tinggal = dtks.kd_stat_bangunan_tinggal
                            OR (papan.kd_stat_bangunan_tinggal IS NULL AND dtks.kd_stat_bangunan_tinggal IS NULL)
                        )
                    AND (papan.luas_lantai = dtks.luas_lantai
                            OR (papan.luas_lantai IS NULL AND dtks.luas_lantai IS NULL)
                        )
                    AND (papan.kd_jenis_lantai_terluas = dtks.kd_jenis_lantai_terluas
                            OR (papan.kd_jenis_lantai_terluas IS NULL AND dtks.kd_jenis_lantai_terluas IS NULL)
                        )
                    AND (papan.kd_jenis_dinding = dtks.kd_jenis_dinding
                            OR (papan.kd_jenis_dinding IS NULL AND dtks.kd_jenis_dinding IS NULL)
                        )
                    AND (papan.kd_jenis_atap = dtks.kd_jenis_atap
                            OR (papan.kd_jenis_atap IS NULL AND dtks.kd_jenis_atap IS NULL)
                        )
                    AND (papan.kd_sumber_air_minum = dtks.kd_sumber_air_minum
                            OR (papan.kd_sumber_air_minum IS NULL AND dtks.kd_sumber_air_minum IS NULL)
                        )
                    AND (papan.kd_jarak_sumber_air_ke_tpl = dtks.kd_jarak_sumber_air_ke_tpl
                            OR (papan.kd_jarak_sumber_air_ke_tpl IS NULL AND dtks.kd_jarak_sumber_air_ke_tpl IS NULL)
                        )
                    AND (papan.kd_pembuangan_akhir_tinja = dtks.kd_pembuangan_akhir_tinja
                            OR (papan.kd_pembuangan_akhir_tinja IS NULL AND dtks.kd_pembuangan_akhir_tinja IS NULL)
                        )
                    AND (papan.kd_sumber_penerangan_utama = dtks.kd_sumber_penerangan_utama
                            OR (papan.kd_sumber_penerangan_utama IS NULL AND dtks.kd_sumber_penerangan_utama IS NULL)
                        )
                    AND (papan.kd_daya_terpasang = dtks.kd_daya_terpasang
                            OR (papan.kd_daya_terpasang IS NULL AND dtks.kd_daya_terpasang IS NULL)
                        )
                    AND (papan.kd_daya_terpasang2 = dtks.kd_daya_terpasang2
                            OR (papan.kd_daya_terpasang2 IS NULL AND dtks.kd_daya_terpasang2 IS NULL)
                        )
                    AND (papan.kd_daya_terpasang3 = dtks.kd_daya_terpasang3
                            OR (papan.kd_daya_terpasang3 IS NULL AND dtks.kd_daya_terpasang3 IS NULL)
                        )
                    THEN 1 ELSE 0 END as is_sync'),
                DB::raw("case when papan.updated_at > papan.created_at then 1 else 0 end as status_pengisian")
            ])
            ->where('papan.data_presisi_tahun_id', $tahunAktif->uuid)
            ->when($idCluster, static fn($q) => $q->whereHas('kepalaKeluarga.keluarga', static fn($r) => $r->whereIn('id_cluster', $idCluster)))
            ->when($status_pengisian != null, function ($q) use ($status_pengisian) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->whereRaw('papan.updated_at > papan.created_at');
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereRaw('papan.updated_at <= papan.created_at');
                }
            });

        // Ordering (preserve previous logic)
        if ($orders && !empty($orders)) {
            foreach ($orders as $order) {
                $orderDirection = $order['dir'] ?? 'asc';
                $orderColumn = $order['column'] ?? 0;
                if ($orderColumn == 3 && $orderDirection == 'asc') {
                    $query->orderBy('is_sync', 'asc')->orderBy('id_dtks', 'asc');
                }
                if ($orderColumn == 3 && $orderDirection == 'desc') {
                    $query->orderBy('is_sync', 'desc')->orderBy('id_dtks', 'desc');
                }
                if ($orderColumn == 2 && $orderDirection == 'asc') {
                    $query->orderBy('status_pengisian', 'asc');
                }
                if ($orderColumn == 2 && $orderDirection == 'desc') {
                    $query->orderBy('status_pengisian', 'desc');
                }
            }
        }

        return $query->withCount('anggota');
    }
    
    /**
     * Override method dataGanda dari BaseController
     * karena Papan tidak memiliki kolom anggota_id
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
        $query = $model->with(['rtm', 'rtm.kepalaKeluarga'])
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->where(function($q) use ($duplicateSubquery, $tableName) {
                $q->whereExists(function($subquery) use ($duplicateSubquery, $tableName) {
                    $subquery->select(DB::raw(1))
                        ->from(DB::raw("({$duplicateSubquery->toSql()}) as duplicates"))
                        ->whereRaw("duplicates.config_id = {$tableName}.config_id")
                        ->whereRaw("duplicates.data_presisi_tahun_id = {$tableName}.data_presisi_tahun_id")
                        ->whereRaw("duplicates.rtm_id = {$tableName}.rtm_id")
                     //   ->whereRaw("duplicates.keluarga_id = {$tableName}.keluarga_id")
                        ->mergeBindings($duplicateSubquery);
                });
            });                            
        
        $orderByClause = implode(', ', $this->uniqueColumn);
        return $query->orderByRaw($orderByClause)->orderBy('created_at')->get();
    }

    /**
     * Override method dataTidakSinkron dari BaseController
     * karena Papan adalah data per RTM, bukan per anggota
     * Mengecek data Papan yang RTM-nya sudah tidak aktif atau tidak ada
     */
    protected function dataTidakSinkron(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();
        $orderByClause = implode(', ', $this->uniqueColumn);
        
        // Cek data Papan yang:
        // 1. RTM-nya tidak ada di tweb_rtm
        // 2. RTM-nya ada tapi kepala RTM-nya tidak aktif (status_dasar != 1)
        return $model->selectRaw($tableName.'.*,current_rtm.no_kk as rtm_aktif, tweb_rtm.no_kk as rtm_sebelumnya, kepala_rtm.status_dasar as status_kepala')
            ->with(['rtm', 'rtm.kepalaKeluarga'])
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join('tweb_rtm as current_rtm', function($q) use ($tableName) {
                return $q->on('current_rtm.id','=',$tableName.'.rtm_id')
                    ->on('current_rtm.config_id','=',$tableName.'.config_id');
            })->join('tweb_penduduk as kepala_rtm', function($q) {
                return $q->on('kepala_rtm.id','=','current_rtm.nik_kepala')
                    ->on('kepala_rtm.config_id','=','current_rtm.config_id');
            })->leftJoin('tweb_rtm', function($q) {
                return $q->on('tweb_rtm.no_kk','=','kepala_rtm.id_rtm')
                    ->on('tweb_rtm.config_id','=','kepala_rtm.config_id');
            })->whereRaw($tableName.'.rtm_id != tweb_rtm.id or (tweb_rtm.id is null or kepala_rtm.status_dasar != 1)')
            ->orderByRaw($orderByClause)->orderBy('created_at')
            ->limit(300) // sengaja di limit 300, agar tidak berat
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
                ->join('tweb_rtm as current_rtm', function ($q) use($tableName) {
                    return $q->on('current_rtm.id', '=', $tableName.'.rtm_id');
                })                
                ->join('tweb_penduduk as kepala_rtm', function($q) {
                    return $q->on('kepala_rtm.id','=','current_rtm.nik_kepala')
                        ->on('kepala_rtm.config_id','=','current_rtm.config_id');
                })->leftJoin('tweb_rtm', function ($q) {
                    return $q->on('tweb_rtm.no_kk', '=', 'kepala_rtm.id_rtm')
                        ->on('tweb_rtm.config_id', '=', 'kepala_rtm.config_id');
                })->whereRaw($tableName . '.rtm_id != tweb_rtm.id and kepala_rtm.status_dasar =' . StatusDasarEnum::HIDUP)
                ->get();

            if(!$pindah->isEmpty()){
                foreach ($pindah as $key => $item) {                                        
                    $model->where(
                        [                            
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

    public function export($privasi_nik = 0): void
    {        
        request()->merge(['length' => null]);
        // remove parameter orders
        request()->merge(['order' => []]);
        $query = datatables(
            $this->sumberDataLengkap()
                ->when($this->input->post('id_cb'), static function ($query, $id) {
                        $query->whereIn('id', $id);
                    })
        );
        $dtksFieldMapping = array_flip(Papan::$dtksItemMapping);
        $pilihanBagian3 = pilihanBagianTanpaNomor(Regsosek2022kEnum::pilihanBagian3());
        $data = [
            'main'  => $query->prepareQuery()->results(),            
            'judul' => $this->input->post('judul'),
            'dtksFieldMapping' => $dtksFieldMapping,
            'pilihanRegsosek' => $pilihanBagian3,
        ];        

        if ($privasi_nik == 1) {
            $data['privasi_nik'] = true;
        }

        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header('Content-Disposition: attachment; filename=' . $this->sub_modul_ini . '_' . date('Ymd') . '.xls');
        header('Pragma: no-cache');
        header('Expires: 0');

        view($this->baseView.'.export', $data);
    }
}
