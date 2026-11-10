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

use App\Enums\DokumenEnum;
use App\Traits\Upload;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\PPID\Enums\StatusDokumenEnum;
use Modules\PPID\Enums\TipeDokumenEnum;
use Modules\PPID\Models\Dokumen;
use Modules\PPID\Models\JenisDokumen;
use Modules\PPID\Models\PermohonanInformasi;

defined('BASEPATH') || exit('No direct script access allowed');

class DaftarDokumenController extends AdminModulController
{
    use Upload;

    public $modul_ini     = 'ppid';
    public $sub_modul_ini = 'ppid-daftar-dokumen';
    private $configUpload = [];

    public function __construct()
    {
        parent::__construct();
        $this->configUpload = [
            'upload_path'   => LOKASI_DOKUMEN,
            'allowed_types' => 'pdf|doc|docx|xls|xlsx',
            'max_size'      => 2048,
        ];
    }

    public function index()
    {
        return view('ppid::backend.daftar_dokumen.index', [
            'jenisDokumen' => JenisDokumen::orderBy('urut')->get(),
        ]);
    }

    public function datatables()
    {
        if (request()->ajax()) {
            $tahun = request('tahun', now('Y'));
            $bulan = request('bulan', now('m'));
            $jenis = request('kategori_info_publik', null);

            $data = Dokumen::informasiPublik()
                ->when($tahun, static fn ($query, $tahun) => $query->whereYear('created_at', $tahun))
                ->when($bulan, static fn ($query, $bulan) => $query->whereMonth('created_at', $bulan))
                ->when($jenis, static fn ($query, $jenis) => $query->where(
                    'kategori_info_publik',
                    $jenis
                ));
            $jenisDokumen = JenisDokumen::pluck('nama_kategori', 'external_code');

            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('drag-handle', static fn (): string => '<i class="fa fa-sort-alpha-desc"></i>')
                ->addColumn('ceklist', static function ($row) {
                    if (can('h')) {
                        return '<input type="checkbox" name="id_cb[]" value="' . $row->id . '"/>';
                    }
                })
                ->addColumn('aksi', static function ($row): string {
                    $aksi = '';

                    if (can('u')) {
                        $aksi .= '<a href="' . ci_route('ppid.daftar-dokumen.form', $row->id) . '" class="btn bg-orange btn-sm edit-btn" title="Ubah Data"><i class="fa fa-edit"></i></a> ';
                        $aksi .= '<a href="' . ci_route('ppid.daftar-dokumen.form', ['id' => $row->id, 'readonly' => true]) . '" class="btn btn-info btn-sm" title="Lihat Data"><i class="fa fa-eye"></i></a> ';
                    }

                    if (can('h')) {
                        if (ci_auth()->id == super_admin()) {
                            $aksi .= '<a href="#" data-href="' . ci_route('ppid.daftar-dokumen.delete', $row->id) . '" class="btn bg-maroon btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> ';
                        } else {
                            $aksi .= '<a href="#" data-href="' . ci_route('ppid.daftar-dokumen.soft-delete', $row->id) . '" class="btn bg-orange btn-sm" title="Soft Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a> ';
                        }
                    }

                    return $aksi;
                })
                ->editColumn('status', static function ($row) {
                    $statusLabel = StatusDokumenEnum::all()[$row->status] ?? 'Tidak Diketahui';
                    $badgeClass  = $row->status == StatusDokumenEnum::TERBIT ? 'label-success' : 'label-danger';

                    return '<span class="label ' . $badgeClass . '">' . $statusLabel . '</span>';
                })
                ->editColumn('keterangan', static fn ($row) => empty($row->keterangan) ? '-' : $row->keterangan)
                ->editColumn('kategori_info_publik', static fn ($row) => '<span class="label label-warning">' . ($jenisDokumen[$row->kategori_info_publik] ?? '-') . '</span>')
                ->addColumn('tanggal_terbit', static function ($row) {
                    $tanggal = $row->published_at;

                    // Cek data kosong / null / dummy tanggal
                    if (empty($tanggal) || $tanggal === '0000-00-00' || $tanggal === '0000-00-00 00:00:00') {
                        return '-';
                    }

                    try {
                        // Coba parsing menggunakan Carbon
                        // Gunakan `Carbon::parse()` karena dia cukup fleksibel.
                        $carbon = Carbon::parse($tanggal);

                        // Cek hasil tahun untuk jaga-jaga kalau ternyata invalid (misal tahun 0 atau negatif)
                        if ($carbon->year < 1900) {
                            return '-';
                        }

                        // Format ke bentuk lokal (misal: "06 Oktober 2025")
                        return $carbon->translatedFormat('d F Y');
                    } catch (\Throwable $e) {
                        // Tangkap semua error (Throwable supaya aman termasuk Error, bukan cuma Exception)
                        \Log::warning('Tanggal published_at tidak valid', [
                            'value' => $tanggal,
                            'error' => $e->getMessage(),
                        ]);
                        return '-';
                    }
                })
                ->addColumn('retensi', static fn ($row) => $row->expired_at_formatted)
                ->rawColumns(['ceklist', 'aksi', 'status', 'drag-handle', 'kategori_info_publik'])
                ->make();
        }

        return show_404();
    }

    public function cariPermohonanInformasi()
    {
        $permohonan = PermohonanInformasi::select('informasi_yang_dibutuhkan', 'tindak_lanjut as status', DB::raw('IF(created_at = updated_at, "", updated_at) as tindak_lanjut_pada'), 'id')
            ->diproses()
            ->get();

        return json(['status' => 'success', 'data' => $permohonan]);
    }

    public function form($id = null, $readonly = null)
    {
        isCan('u');

        $readonly = $readonly == '1';

        if ($id) {
            $dokumen = Dokumen::findOrFail($id);

            if ($readonly) {
                $data['action']      = 'Lihat';
                $data['form_action'] = null;
            } else {
                $data['action']      = 'Ubah';
                $data['form_action'] = ci_route('ppid.daftar-dokumen.update', $id);
            }

            $data['dokumen'] = $dokumen;
        } else {
            $data['action']      = 'Tambah';
            $data['dokumen']     = null;
            $data['form_action'] = ci_route('ppid.daftar-dokumen.store');
        }

        $data['jenis_dokumen'] = JenisDokumen::orderBy('urut')->get();
        $data['readonly']      = $readonly;

        return view('ppid::backend.daftar_dokumen.form', $data);
    }

    public function store()
    {
        isCan('u');

        $data = $this->validate(false); // Mode tambah

        if ($data['tipe'] == 1) {
            // upload dan validasi file
            $filePath = $this->upload('file', $this->configUpload);

            if (! $filePath) {
                return json(['success' => false, 'message' => 'Gagal Tambah Data'], 400);
            }

            if (is_array($filePath)) {
                return json(['success' => false, 'message' => $filePath['error']], 400);
            }

            $data['satuan'] = $filePath;

        }

        // Hitung retensi_date
        $dokumen                         = new Dokumen($data);
        $data['retensi_date']            = $dokumen->calculateRetensiDate();
        $data['permohonan_informasi_id'] = $data['jenis_dokumen_slug'] != 'tersedia-setiap-saat' ? null : $data['permohonan_informasi_id'];
        $data['published_at']            = tgl_indo_in($data['published_at']);
        $data['kategori']                = DokumenEnum::INFORMASI_PUBLIK;
        if ($data['tipe'] == TipeDokumenEnum::FILE) {
            $data['url'] = null;
        }
        if ($data['tipe'] == TipeDokumenEnum::URL) {
            $data['satuan'] = null;
        }
        // Simpan data ke database
        if (Dokumen::create($data)) {
            return json(['success' => true, 'message' => 'Berhasil Tambah Data']);
        }

        return json(['success' => false, 'message' => 'Gagal Tambah Data']);
    }

    public function update($id)
    {
        isCan('u');

        $dokumen = Dokumen::where('id', $id)->firstOrFail();

        $data = $this->validate(true); // Mode edit

        if (request()->hasFile('file')) {
            $upload = $this->upload('file', $this->configUpload);
            if (! $upload) {
                return json(['success' => false, 'message' => 'Gagal Tambah Data'], 400);
            }

            if (is_array($upload)) {
                return json(['success' => false, 'message' => $upload['error']], 400);
            }
            $data['satuan'] = $upload;
        }
        if ($data['tipe'] == TipeDokumenEnum::FILE) {
            $data['url'] = null;
        }
        if ($data['tipe'] == TipeDokumenEnum::URL) {
            $data['satuan'] = null;
        }
        $dokumen->retensi_number = $data['retensi_number'];
        $dokumen->retensi_unit   = $data['retensi_unit'];

        $data['retensi_date']            = $dokumen->calculateRetensiDate();
        $data['permohonan_informasi_id'] = $data['jenis_dokumen_slug'] != 'tersedia-setiap-saat' ? null : $data['permohonan_informasi_id'];
        $data['published_at']            = tgl_indo_in($data['published_at']);
        if ($dokumen->update($data)) {
            return json(['success' => true, 'message' => 'Berhasil Ubah Data']);
        }

        return json(['success' => false, 'message' => 'Gagal Ubah Data']);
    }

    protected function validate($isEdit = false)
    {
        $rules = [
            'nama'                    => 'required|string',
            'retensi_number'          => 'required|integer|min:0|max:31',
            'retensi_unit'            => 'required|string|in:hari,minggu,bulan,tahun',
            'kategori_info_publik'    => 'required|exists:ppid_jenis_dokumen,external_code',
            'permohonan_informasi_id' => 'required_if:jenis_dokumen_slug,tersedia-setiap-saat',
            'keterangan'              => 'nullable|string',
            'status'                  => 'nullable|in:0,1',
            'published_at'            => 'required',
            'tipe'                    => 'required',
            'url'                     => 'required_if:tipe,2|url',
        ];

        if ($isEdit) {
            $rules['file'] = 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:' . (max_upload() * 1024);
        } else {
            $rules['file'] = 'required_if:tipe,1|file|mimes:pdf,doc,docx,xls,xlsx|max:' . (max_upload() * 1024);
        }

        $messages = [
            'nama.required'                       => 'Judul dokumen wajib diisi.',
            'retensi_number.required'             => 'Jumlah retensi wajib diisi.',
            'retensi_number.integer'              => 'Jumlah retensi harus berupa angka.',
            'retensi_number.min'                  => 'Jumlah retensi tidak boleh kurang dari :min.',
            'retensi_number.max'                  => 'Jumlah retensi tidak boleh lebih dari :max.',
            'retensi_unit.required'               => 'Unit retensi wajib diisi.',
            'retensi_unit.in'                     => 'Unit retensi harus berupa salah satu dari hari, minggu, bulan, atau tahun.',
            'kategori_info_publik.required'       => 'Jenis dokumen wajib diisi.',
            'kategori_info_publik.exists'         => 'Jenis dokumen yang dipilih tidak valid.',
            'permohonan_informasi_id.required_if' => 'Permohonan informasi id wajib diisi jika jenis dokumen adalah tersedia setiap saat.',
            'file.required'                       => 'File wajib diunggah.',
            'file.file'                           => 'File yang diunggah tidak valid.',
            'file.mimes'                          => 'File harus berupa PDF, DOC, DOCX, XLS, atau XLSX.',
            'file.max'                            => 'File tidak boleh lebih besar dari :max kilobyte.',
            'published_at.required'               => 'Tanggal terbit wajib diisi.',
        ];

        return $this->validated(request(), $rules, $messages);
    }

    public function delete($id)
    {
        isCan('h');

        $dokumen = Dokumen::where('id', $id)->firstOrFail();

        // Menggunakan forceDelete untuk delete permanen
        if ($dokumen->forceDelete()) {
            redirect_with('success', 'Berhasil Hapus Data Secara Permanen', ci_route('ppid.daftar-dokumen'));
        }

        redirect_with('error', 'Gagal Hapus Data');
    }

    public function softDelete($id)
    {
        isCan('h');

        $dokumen = Dokumen::findOrFail($id);

        if ($dokumen->delete()) {
            redirect_with('success', 'Berhasil Berhasil Hapus Data', ci_route('ppid.daftar-dokumen'));
        }

        redirect_with('error', 'Gagal Berhasil Hapus Data');
    }

    public function delete_all()
    {
        $ids = $this->request['id_cb'];

        if (empty($ids)) {
            redirect_with('error', 'Tidak ada data yang dipilih', ci_route('ppid.daftar-dokumen'));
        }

        $idsArray = is_array($ids) ? $ids : explode(',', $ids);

        $dokumens = Dokumen::whereIn('id', $idsArray)->get();

        foreach ($dokumens as $dokumen) {
            // Administrator: Hapus permanen
            if (ci_auth()->id == super_admin()) {
                // Hapus file jika ada
                $file = config('ppid.path.dokumen') . $dokumen->file;
                if (! empty($dokumen->file) && file_exists($file)) {
                    unlink($file); // Hapus file fisik
                }

                // Hapus data secara permanen
                $dokumen->forceDelete();
            } else {
                // User biasa: Soft delete
                $dokumen->delete();
            }
        }

        redirect_with('success', 'Berhasil Hapus Data', ci_route('ppid.daftar-dokumen'));
    }
}
