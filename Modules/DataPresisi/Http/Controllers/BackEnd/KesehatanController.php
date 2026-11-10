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

use App\Enums\AsuransiEnum;
use App\Enums\CacatEnum;
use App\Enums\CaraKBEnum;
use App\Enums\SakitMenahunEnum;
use App\Models\Anak;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Rtm;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\DataPresisi\Enums\StatusKelengkapanEnum;
use Modules\DataPresisi\Enums\StatusPengisianEnum;
use Modules\DataPresisi\Http\Controllers\BackEnd\BaseController;
use Modules\DataPresisi\Models\Kesehatan;
use Modules\DataPresisi\Models\Tahun;

defined('BASEPATH') || exit('No direct script access allowed');

class KesehatanController extends BaseController
{
    protected $baseRoute = 'data_presisi.kesehatan';
    protected $baseView = 'datapresisi::backend.kesehatan';
    protected $modelName = 'Modules\DataPresisi\Models\Kesehatan';
    public $modul_ini     = 'data-presisi';
    public $sub_modul_ini = 'data-presisi-kesehatan';
    // public $kategori_pengaturan = 'data_presisi';
    // public $aliasController     = 'data_presisi';
    private $tahunAktif;

    private $readonly   = false;
    public function __construct()
    {
        parent::__construct();
        $this->tahunAktif = Tahun::active()->first();
        $this->generateMissingKesehatan();
    }

    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of($this->sumberData())
                ->addIndexColumn()
                ->addColumn('aksi', static function ($row) {
                    $aksi = '';
                    if (can('u')) {
                        $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.kesehatan', $row->id) . '" class="btn btn-warning btn-sm"  title="Lihat & Ubah Data"><i class="fa fa-edit"></i></a> ';
                    }
                    $aksi .= '&nbsp;<a href="' . ci_route('data_presisi.kesehatan.show', $row->id) . '" class="btn btn-primary btn-sm"  title="Lihat Selengkapnya"><i class="fa fa-eye"></i></a> ';

                    return $aksi;
                })
                ->editColumn('tanggal_pengisian', static fn($row) => $row->tanggal_pengisian ? tgl_indo($row->tanggal_pengisian) : '-')
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

        return view('datapresisi::backend.kesehatan.index', $data);
    }

    protected function sumberData()
    {
        $status           = $this->input->get('status') ?? 1;
        $sex              = $this->input->get('jenis_kelamin') ?? null;
        $namaDusun        = $this->input->get('dusun') ?? null;
        $rw               = $this->input->get('rw') ?? null;
        $rt               = $this->input->get('rt') ?? null;
        $status_pengisian = $this->input->get('status_pengisian') ?? null;
        $bdt              = $this->input->get('bdt') ?? null;
        $idCluster        = $rt ? [$rt] : [];
        $tahunAktif = $this->tahunAktif;

        $rtm            = (new Rtm())->getTable();
        $kesehatan      = (new Kesehatan())->getTable();
        $kepalaKeluarga = (new Penduduk())->getTable();

        if (empty($idCluster) && ! empty($rw)) {
            [$namaDusun, $namaRw] = explode('__', $rw);
            $idCluster            = Wilayah::whereDusun($namaDusun)->whereRw($namaRw)->select(['id'])->get()->pluck('id')->toArray();
        }

        if (empty($idCluster) && ! empty($namaDusun)) {
            $idCluster = Wilayah::whereDusun($namaDusun)->select(['id'])->get()->pluck('id')->toArray();
        }

        return Rtm::status()
            ->when($sex, static fn($q) => $q->whereHas('kepalaKeluarga', static fn($r) => $r->whereSex($sex)))
            ->when(in_array($bdt, [BELUM_MENGISI, JUMLAH]), static fn($q) => $bdt == BELUM_MENGISI ? $q->whereNull('bdt') : $q->whereNotNull('bdt'))
            ->when($idCluster, static fn($q) => $q->whereHas('kepalaKeluarga.keluarga', static fn($r) => $r->whereIn('id_cluster', $idCluster)))
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->join("{$kesehatan} AS k", 'k.rtm_id', '=', "{$rtm}.id")
            ->join("{$kepalaKeluarga} AS p", 'p.id', '=', "{$rtm}.nik_kepala")
            ->selectRaw("
            {$rtm}.id,
            {$rtm}.config_id,
            {$rtm}.nik_kepala,
            {$rtm}.no_kk,
            {$rtm}.tgl_daftar,
            k.status_kelengkapan,
            CASE
                WHEN COUNT(k.rtm_id) = SUM(k.status_pengisian = 'lengkap') THEN 'Sudah isi'
                ELSE 'Belum isi'
            END as status,
            MAX(k.tanggal_pengisian) as tanggal_pengisian
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
                'k.status_kelengkapan'
            )
            ->with(['kepalaKeluarga' => static fn($q) => $q->withOnly(['keluarga']), 'anggota' => static fn($q) => $q->select(['id', 'id_rtm', 'id_kk'])])
            ->withCount('anggota');
    }

    public function form($id)
    {
        $kesehatan = Kesehatan::with([
            'rtm.anggota',
            'rtm.kepalaKeluarga' => static function ($builder): void {
                $builder->withOnly('Wilayah', 'keluarga');
            },
        ])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
            ->where('rtm_id', $id)
            ->first();
        $data['kesehatan'] = $kesehatan;
        // hapus anggota yang sudah tidak ada di rtm anggota
        if ($kesehatan) {
            $anggotaIds = $kesehatan->rtm->anggota->pluck('id')->toArray();
            Kesehatan::where('rtm_id', $id)
                ->where('data_presisi_tahun_id', $this->tahunAktif->uuid)
                ->whereNotIn('anggota_id', $anggotaIds)
                ->delete();
        }
        $arr = [];

        foreach ($kesehatan->rtm->anggota as $r) {

            $kesehatan = Kesehatan::where('rtm_id', $id)->where('anggota_id', $r->id)->where('data_presisi_tahun_id', $this->tahunAktif->uuid)->first();

            $r->load('kia_anak.bulananAnak');

            $bulananAnak = $r->kia_anak?->bulananAnak;

            $arr[] = (object) [
                'nik'                                 => $r->nik,
                'no_kk'                               => $r->keluarga->no_kk,
                'nama'                                => $r->nama,
                'rtm_id'                              => $id,
                'keluarga_id'                         => $r->keluarga->id,
                'anggota_id'                          => $r->id,
                'tanggallahir'                        => $r->tanggallahir,
                'jns_ansuransi'                       => AsuransiEnum::all()[$r->id_asuransi] ?? '',
                'jns_penggunaan_alat_kontrasepsi'     => CaraKBEnum::all()[$r->cara_kb_id] ?? '',
                'jns_penyakit_diderita'               => SakitMenahunEnum::all()[$r->sakit_menahun_id] ?? '',
                'frekwensi_kunjungan_faskes_pertahun' => $kesehatan ? $kesehatan->frekwensi_kunjungan_faskes_pertahun : '',
                'frekwensi_rawat_inap_pertahun'       => $kesehatan ? $kesehatan->frekwensi_rawat_inap_pertahun : '',
                'frekwensi_kunjungan_dokter_pertahun' => $kesehatan ? $kesehatan->frekwensi_kunjungan_dokter_pertahun : '',
                'kondisi_fisik_sejak_lahir'           => CacatEnum::all()[$r->cacat_id] ?? CacatEnum::valueOf(CacatEnum::TIDAK_CACAT),
                'status_gizi_balita'                  => collect(Anak::STATUS_GIZI_ANAK)->firstWhere('id', $bulananAnak?->status_gizi)['nama'] ?? '',
                'tanggal_pengisian'                   => $kesehatan ? $kesehatan->tanggal_pengisian : '',
                'status_pengisian'                    => $kesehatan ? $kesehatan->status_pengisian : '',
                'isBulananAnak'                       => $bulananAnak ? true : false,
                'penduduk'                            => $r,
            ];
        }

        $data['anggota'] = $arr;

        $data['status_gizi_balita']              = collect(Anak::STATUS_GIZI_ANAK)->pluck('nama', 'id');
        $data['kondisi_fisik_sejak_lahir']       = CacatEnum::all();
        $data['jns_penyakit_diderita']           = SakitMenahunEnum::all();
        $data['jns_penggunaan_alat_kontrasepsi'] = CaraKBEnum::all();
        $data['jns_ansuransi']                   = AsuransiEnum::all();
        $data['readonly'] = $this->readonly;
        return view('datapresisi::backend.kesehatan.form', $data);
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
                $kesehatan = Kesehatan::with('penduduk')->where('rtm_id', $id)->where('anggota_id', $item['anggota_id'])->where('data_presisi_tahun_id', $this->tahunAktif->uuid)->first();

                // Lakukan update data
                $kesehatan->update([
                    'jns_ansuransi'                       => $item['jns_ansuransi'],
                    'jns_penggunaan_alat_kontrasepsi'     => $item['jns_penggunaan_alat_kontrasepsi'],
                    'jns_penyakit_diderita'               => $item['jns_penyakit_diderita'],
                    'frekwensi_kunjungan_faskes_pertahun' => $item['frekwensi_kunjungan_faskes_pertahun'],
                    'frekwensi_rawat_inap_pertahun'       => $item['frekwensi_rawat_inap_pertahun'],
                    'frekwensi_kunjungan_dokter_pertahun' => $item['frekwensi_kunjungan_dokter_pertahun'],
                    'kondisi_fisik_sejak_lahir'           => $item['kondisi_fisik_sejak_lahir'],
                    'status_gizi_balita'                  => $item['status_gizi_balita'],
                    'tanggal_pengisian'                   => Carbon::now()->format('Y-m-d'),
                    'status_pengisian'                    => 'lengkap',
                    'status_kelengkapan'                  => $status_kelengkapan,
                ]);

                // update data penduduk jika ada melakukn perubahan pada halaman data kesehatan
                $kesehatan->penduduk->update([
                    'id_asuransi'      => $item['jns_ansuransi_id'],
                    'cara_kb_id'       => $item['jns_penggunaan_alat_kontrasepsi_id'],
                    'sakit_menahun_id' => $item['jns_penyakit_diderita_id'],
                    'cacat_id'         => $item['kondisi_fisik_sejak_lahir_id'],
                ]);

                // jika sudah ada data bulanan anak dan status_gizi_balita_id tidak null (untuk balita saja)
                // maka update column status_gizi di table bulanan_anak
                if ($kesehatan?->penduduk?->kia_anak?->bulananAnak) {
                    if ($item['status_gizi_balita_id'] !== null) {
                        $kesehatan->penduduk->kia_anak->bulananAnak->update([
                            'status_gizi' => $item['status_gizi_balita_id'],
                        ]);
                    }
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

    private function generateMissingKesehatan(): void
    {
        $kesehatan       = (new Kesehatan())->getTable();
        $keluarga        = (new Keluarga())->getTable();
        $penduduk        = (new Penduduk())->getTable();
        $rtm             = (new Rtm())->getTable();
        $tahunAktif      = $this->tahunAktif;

        // Hanya generate untuk RTM dan anggota yang AKTIF
        // Jangan generate ulang data yang sengaja dihapus karena tidak sinkron
        $all_anggota = Penduduk::select(
            'rtm.id as rtm_id',
            "{$penduduk}.id_kk AS keluarga_id",
            "{$penduduk}.id as anggota_id"
        )
            ->join("{$rtm} AS rtm", "{$penduduk}.id_rtm", '=', 'rtm.no_kk')
            // Join dengan kepala RTM untuk mengecek status kepala
            ->join("{$penduduk} AS kepala_rtm", function ($join) use ($penduduk) {
                $join->on('kepala_rtm.id', '=', 'rtm.nik_kepala')
                    ->on('kepala_rtm.config_id', '=', "{$penduduk}.config_id");
            })
            ->leftJoin($kesehatan, static fn($join) => $join->on($kesehatan . '.rtm_id', '=', 'rtm.id')
                ->on($kesehatan . '.anggota_id', '=', $penduduk . '.id')
                ->where($kesehatan . '.data_presisi_tahun_id', $tahunAktif->uuid)
                ->where($kesehatan . '.config_id', identitas('id')))
            ->where("{$penduduk}.config_id", identitas('id'))
            // PENTING: Hanya generate untuk anggota yang AKTIF (status_dasar = 1 atau NULL)
            ->where(function ($q) use ($penduduk) {
                $q->where("{$penduduk}.status_dasar", '=', 1)
                    ->orWhereNull("{$penduduk}.status_dasar");
            })
            // PENTING: Hanya generate untuk RTM yang kepala-nya AKTIF (status_dasar = 1 atau NULL)
            ->where(function ($q) {
                $q->where('kepala_rtm.status_dasar', '=', 1)
                    ->orWhereNull('kepala_rtm.status_dasar');
            })
            // PENTING: Pastikan RTM sesuai dengan id_rtm penduduk (sinkron)
            ->whereRaw('rtm.no_kk = ' . $penduduk . '.id_rtm')
            ->whereNull($kesehatan . '.uuid')
            ->get();

        // Bulk insert menggunakan insert() agar lebih cepat
        $insertData = [];
        $now = Carbon::now();
        $userId = ci_auth()->id;
        foreach ($all_anggota as $item) {
            $insertData[] = [
                'rtm_id'                => $item->rtm_id,
                'config_id'             => identitas('id'),
                'keluarga_id'           => $item->keluarga_id,
                'anggota_id'            => $item->anggota_id,
                'data_presisi_tahun_id' => $tahunAktif->uuid,
                'uuid'                  => Illuminate\Support\Str::uuid()->toString(),
                'created_at' => $now,
                'updated_at' => $now,
                'created_by' => $userId,
                'updated_by' => $userId,
            ];
        }

        // Insert secara batch (jika ada data)
        if (! empty($insertData)) {
            // Bagi menjadi chunk agar tidak overload
            $chunks = array_chunk($insertData, 500);

            foreach ($chunks as $chunk) {
                Kesehatan::insert($chunk);
            }
        }
    }    
    /**
     * Sumber data lengkap untuk ekspor
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

        return Kesehatan::query()
            ->where('config_id', identitas('id'))
            ->where('data_presisi_tahun_id', $tahunAktif->uuid)
            ->when($status_pengisian != null, static function ($q) use ($status_pengisian) {
                if ($status_pengisian == StatusPengisianEnum::SUDAH_MENGISI) {
                    $q->where('status_pengisian', 'lengkap');
                } elseif ($status_pengisian == StatusPengisianEnum::BELUM_MENGISI) {
                    $q->whereNull('status_pengisian');
                }
            })
            ->when($idCluster, static fn($q) => $q->whereHas('rtm.kepalaKeluarga.keluarga', static fn($r) => $r->whereIn('id_cluster', $idCluster)))
            ->with(['rtm.kepalaKeluarga.keluarga.wilayah', 'penduduk', 'dtks']);
    }

    /**
     * Override dataTidakSinkron untuk modul Kesehatan
     * Memeriksa sinkronisasi RTM dan Anggota (penduduk)
     */
    protected function dataTidakSinkron(Tahun $tahunAktif)
    {
        $model = new $this->modelName;
        $tableName = $model->getTable();
        $orderByClause = implode(', ', $this->uniqueColumn);

        // Cek data Kesehatan yang:
        // 1. RTM tercatat berbeda dengan RTM seharusnya
        // 2. Penduduk tidak aktif (status_dasar != 1)
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
            })->where(function ($q) use ($tableName) {
                // Kondisi 1: RTM seharusnya tidak ditemukan (NULL dari left join)
                // Kondisi 2: RTM tercatat berbeda dengan RTM seharusnya
                // Kondisi 3: Penduduk tidak aktif
                $q->whereNull('tweb_rtm.id')
                    ->orWhereRaw($tableName . '.rtm_id != tweb_rtm.id')
                    ->orWhere('tweb_penduduk.status_dasar', '!=', 1);
            })
            ->orderByRaw($orderByClause)->orderBy('created_at')
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
                redirect_with('error', 'Tidak ada data yang dipilih untuk dihapus', ci_route($this->baseRoute . '.periksa', 1));
                return;
            }

            // Gunakan raw query untuk memastikan delete berhasil
            $tableName = (new Kesehatan())->getTable();

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

                redirect_with('success', $message, ci_route($this->baseRoute . '.periksa', 1));
            } catch (\Exception $e) {
                // Rollback inner transaction
                throw $e;
            }
        } catch (\Exception $e) {
            DB::rollback();

            // Log error untuk troubleshooting
            log_message('error', 'Error deleteDataGanda Kesehatan: ' . $e->getMessage());

            // Pastikan foreign key check diaktifkan kembali jika terjadi error
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
            } catch (\Exception $ignored) {
                // Ignore jika gagal
            }

            redirect_with('error', 'Gagal menghapus data: ' . $e->getMessage(), ci_route($this->baseRoute . '.periksa', 1));
        }
    }
}
