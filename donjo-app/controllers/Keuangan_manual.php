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

defined('BASEPATH') || exit('No direct script access allowed');

class Keuangan_manual extends Admin_Controller
{
    public $modul_ini = 'keuangan';
    public array $finance_filter_years = [];
    public string $finance_filter_year = '';
    public string $finance_filter_label = 'Tahun APBDes';
    public string $finance_filter_type = 'apbdes';
    public array $finance_filter_query = [];
    public string $finance_filter_action = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['keuangan_manual_model', 'keuangan_grafik_manual_model']);
        $yearFilter = $this->current_finance_year_filter_data();
        $this->finance_filter_years = $yearFilter['finance_years'];
        $this->finance_filter_year = $yearFilter['finance_year'];
        $this->finance_filter_type = $this->is_rab_year_context()
            ? 'rab'
            : ($this->router->fetch_method() === 'laporan_rab' ? 'report' : 'apbdes');
        $this->finance_filter_label = [
            'rab' => 'Tahun RAB',
            'report' => 'Tahun Laporan',
            'apbdes' => 'Tahun APBDes',
        ][$this->finance_filter_type];
        $this->finance_filter_query = is_array($this->input->get()) ? $this->input->get() : [];
        $this->finance_filter_action = current_url();
    }

    public function index(): void
    {
        redirect('keuangan_manual/manual_apbdes');
    }

    public function anggaran_rab(?string $pos = null): void
    {
        $positions = [
            'pendapatan' => 'Pendapatan',
            'belanja' => 'Belanja',
            'pembiayaan' => 'Pembiayaan',
        ];
        if (! isset($positions[$pos])) {
            show_404();

            return;
        }

        isCan('b', 'anggaran-' . $pos);
        $this->sub_modul_ini = 'anggaran-' . $pos;
        $data = [
            'pos' => $pos,
            'title' => $positions[$pos],
        ];
        $this->add_finance_year_filter($data);
        $this->render('keuangan/menu_anggaran_rab', $data);
    }

    // Manual Input Anggaran dan Realisasi APBDes
    public function setdata_laporan($tahun, $semester): void
    {
        $sess_manual = [
            'set_tahun'    => $tahun,
            'set_semester' => $semester,
        ];
        $this->session->set_userdata($sess_manual);
        echo json_encode(true, JSON_THROW_ON_ERROR);
    }

    public function laporan_manual(): void
    {
        $data['tahun_anggaran'] = $this->keuangan_manual_model->list_tahun_anggaran_manual();

        if (! empty($data['tahun_anggaran'])) {
            redirect('keuangan_manual/grafik_manual/rincian_realisasi_bidang_manual');
        } else {
            session_error('Data Laporan Keuangan Belum Tersedia');
            redirect('keuangan_manual/manual_apbdes');
        }
    }

    public function grafik_manual($jenis): void
    {
        isCan('b', 'laporan-manual');
        $this->sub_modul_ini = 'laporan-manual';

        $yearFilter = $this->finance_rab_year_filter_data();
        $this->load->model('keuangan_grafik_manual_model');
        $thn = $yearFilter['finance_year'];

        switch ($jenis) {
            case 'rincian_realisasi_bidang_manual':
                $this->rincian_realisasi_manual($thn, 'Akhir Bidang Manual');
                break;

            case 'grafik-RP-APBD-manual':

            default:
                $this->grafik_rp_apbd_manual($thn);
                break;
        }
    }

    private function rincian_realisasi_manual($thn, string $judul): void
    {
        $data                   = $this->keuangan_grafik_manual_model->lap_rp_apbd($thn);
        $data['tahun_anggaran'] = $this->keuangan_manual_model->list_tahun_anggaran_manual();
        $data['ta']             = $this->session->set_tahun;
        $this->add_finance_year_filter($data);
        $this->session->submenu = 'Laporan Keuangan ' . $judul;
        $this->render('keuangan/rincian_realisasi_manual', $data);
    }

    private function grafik_rp_apbd_manual($thn): void
    {
        $data                   = $this->keuangan_grafik_manual_model->grafik_keuangan_tema($thn);
        $data['tahun_anggaran'] = $this->keuangan_manual_model->list_tahun_anggaran_manual();
        $this->add_finance_year_filter($data);
        $this->session->submenu = 'Grafik Keuangan';
        $this->render('keuangan/grafik_rp_apbd_manual', $data);
    }

    public function manual_apbdes(): void
    {
        isCan('b', 'input-data');
        $this->sub_modul_ini = 'input-data';

        $yearFilter = $this->finance_year_filter_data();
        $data['tahun_anggaran'] = $yearFilter['finance_years'];
        $data['finance_filter_years'] = $yearFilter['finance_years'];
        $data['finance_filter_year'] = $yearFilter['finance_year'];
        $data['finance_filter_query'] = $this->input->get() ?: [];
        $data['finance_filter_action'] = current_url();
        $default_tahun          = $data['finance_filter_year'];
        $this->session->set_tahun ??= $default_tahun;
        $this->session->set_jenis ??= '4.PENDAPATAN';
        $data['tahun']       = $this->session->set_tahun;
        $data['jenis']       = $this->session->set_jenis;
        $data['lpendapatan'] = $this->keuangan_manual_model->list_rek_pendapatan();
        $data['lbelanja']    = $this->keuangan_manual_model->list_rek_belanja();
        $data['lbiaya']      = $this->keuangan_manual_model->list_rek_biaya();
        $data['lakun']       = $this->keuangan_manual_model->list_akun();
        $data['main']        = $this->keuangan_manual_model->list_apbdes($data['tahun']);

        $this->render('keuangan/manual_apbdes', $data);
    }

    public function rincian_rab(?string $pos = null): void
    {
        isCan('b', 'rincian-rab');

        $positions = [
            'pendapatan' => '4.PENDAPATAN',
            'belanja' => '5.BELANJA',
            'pembiayaan' => '6.PEMBIAYAAN',
        ];
        $data['initial_pos'] = $positions[$pos] ?? '';
        $this->sub_modul_ini = $data['initial_pos'] === ''
            ? 'rincian-rab'
            : 'anggaran-' . $pos;
        $mode = $this->input->get('mode', true);
        $data['initial_mode'] = in_array($mode, ['input', 'lihat', 'perubahan'], true) ? $mode : '';
        $data['references'] = $this->keuangan_manual_model->list_rab_referensi();
        $data['years']      = $this->keuangan_manual_model->list_tahun_rab();
        if ($data['years'] === []) {
            $data['years'] = [(string) ((int) date('Y') + 1)];
        }
        $yearFilter = $this->finance_rab_year_filter_data();
        $data['finance_filter_years'] = $yearFilter['finance_years'];
        $data['finance_filter_year'] = $yearFilter['finance_year'];
        $data['finance_filter_query'] = $this->input->get() ?: [];
        $data['finance_filter_action'] = current_url();
        $apbdesYearFilter = $this->finance_year_filter_data();
        $data['income_years'] = array_values(array_unique(array_merge(
            $this->keuangan_manual_model->list_tahun_pendapatan_manual(),
            [$apbdesYearFilter['finance_year']]
        )));
        rsort($data['income_years'], SORT_NUMERIC);
        $selectedIncomeYear = $this->input->get('tahun', true);
        $selectedIncomeYear = is_scalar($selectedIncomeYear) && ctype_digit((string) $selectedIncomeYear)
            ? (string) $selectedIncomeYear
            : $apbdesYearFilter['finance_year'];
        $data['selected_income_year'] = $selectedIncomeYear;
        $data['historical_income'] = $selectedIncomeYear !== ''
            ? $this->keuangan_manual_model->list_pendapatan_manual($selectedIncomeYear)
            : [];
        $data['finance_years'] = array_values(array_unique(array_merge(
            $this->keuangan_manual_model->list_tahun_pembiayaan_manual(),
            [$apbdesYearFilter['finance_year']]
        )));
        rsort($data['finance_years'], SORT_NUMERIC);
        $selectedFinanceYear = $this->input->get('tahun', true);
        $selectedFinanceYear = is_scalar($selectedFinanceYear) && ctype_digit((string) $selectedFinanceYear)
            ? (string) $selectedFinanceYear
            : $apbdesYearFilter['finance_year'];
        $data['selected_finance_year'] = $selectedFinanceYear;
        $data['historical_finance'] = $selectedFinanceYear !== ''
            ? $this->keuangan_manual_model->list_pembiayaan_manual($selectedFinanceYear)
            : [];
        $data['can_edit'] = can('u');
        $data['can_delete'] = can('h');
        $data['csrf_name'] = $this->security->get_csrf_token_name();
        $data['csrf_value'] = $this->security->get_csrf_hash();
        $data['api'] = [
            'list'   => site_url('keuangan_manual/data_rab_manual'),
            'get'    => site_url('keuangan_manual/get_rab_manual'),
            'save'   => site_url('keuangan_manual/simpan_rab_manual'),
            'copy'   => site_url('keuangan_manual/salin_rab_perubahan'),
            'copy_previous_year' => site_url('keuangan_manual/impor_rab_tahun_lalu'),
            'delete' => site_url('keuangan_manual/hapus_rab_manual'),
        ];

        $this->render('keuangan/rincian_rab_manual', $data);
    }

    public function data_rab_manual(): void
    {
        isCan('b', 'rincian-rab');

        $filters = [];
        foreach (['tahun', 'tahap', 'pos', 'kd_bidang', 'kd_sub_bidang', 'kd_kegiatan'] as $key) {
            $rawValue = $this->input->get($key);
            if (null !== $rawValue && ! is_scalar($rawValue)) {
                $this->respond_json(['message' => 'Filter tidak valid'], 422);

                return;
            }
            $value = trim((string) $rawValue);
            if ($value !== '') {
                $filters[$key] = $this->security->xss_clean($value);
            }
        }

        $this->respond_json($this->keuangan_manual_model->list_rab_manual($filters));
    }

    public function get_rab_manual($id = null): void
    {
        isCan('b', 'rincian-rab');

        $data = $this->keuangan_manual_model->get_rab_manual((int) $id);
        if (null === $data) {
            $this->respond_json(['message' => 'Data rincian anggaran tidak ditemukan'], 404);

            return;
        }

        $this->respond_json($data);
    }

    public function simpan_rab_manual(): void
    {
        isCan('u', 'rincian-rab');

        $post = $this->input->post();
        if (! is_array($post) || ! is_string($post['rincian'] ?? null)) {
            $this->respond_json(['message' => 'Data rincian tidak valid'], 422);

            return;
        }

        try {
            $rincian = json_decode($post['rincian'], true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            $this->respond_json(['message' => 'Format rincian item tidak valid'], 422);

            return;
        }

        if (! is_array($rincian) || ! array_is_list($rincian) || count($rincian) > 500) {
            $this->respond_json(['message' => 'Rincian item maksimal 500 baris'], 422);

            return;
        }

        $postValue = static fn (string $key): string => is_scalar($post[$key] ?? null)
            ? trim((string) $post[$key])
            : '';
        $year = $postValue('tahun');
        $stage = $postValue('tahap');
        $pos = $postValue('pos');
        $positionTypes = ['4.PENDAPATAN' => 'pendapatan', '5.BELANJA' => 'belanja', '6.PEMBIAYAAN' => 'pembiayaan'];
        $accountCode = $postValue('kd_rekening');

        if (! preg_match('/^\d{4}$/', $year) || (int) $year < 2000 || (int) $year > 2200
            || ! isset($positionTypes[$pos]) || ! in_array($stage, ['Murni', 'Perubahan'], true)) {
            $this->respond_json(['message' => 'Tahun, tahap, atau pos anggaran tidak valid'], 422);

            return;
        }

        $references = $this->keuangan_manual_model->list_rab_referensi();
        $find = static function (array $rows, string $key, string $value): ?array {
            foreach ($rows as $row) {
                if ((string) ($row[$key] ?? '') === $value) {
                    return $row;
                }
            }

            return null;
        };
        $account = $find($references['rekening'], 'kode', $accountCode);
        if ($account === null || ! str_starts_with($accountCode, $pos[0] . '.')) {
            $this->respond_json(['message' => 'Rekening tidak ditemukan pada referensi pos yang dipilih'], 422);

            return;
        }

        $isBelanja = 'belanja' === $positionTypes[$pos];
        $bidang = $isBelanja ? $find($references['bidang'], 'kode', $postValue('kd_bidang')) : null;
        $kegiatan = $isBelanja ? $find($references['kegiatan'], 'kode', $postValue('kd_kegiatan')) : null;
        $subBidang = $isBelanja && $kegiatan !== null
            ? $find($references['sub_bidang'], 'id', (string) $kegiatan['parent_id'])
            : null;
        $subCode = $postValue('kd_sub_bidang');
        if ($isBelanja) {
            $segments = explode('.', rtrim((string) ($kegiatan['kode'] ?? ''), '.'));
            $activitySubCode = count($segments) >= 2 ? $segments[0] . '.' . $segments[1] : '';
            if ($bidang === null || $kegiatan === null
                || $subBidang === null
                || (int) ($subBidang['parent_id'] ?? 0) !== (int) $bidang['id']
                || (int) ($kegiatan['parent_id'] ?? 0) !== (int) $subBidang['id']
                || ltrim((string) ($segments[0] ?? ''), '0') !== ltrim(substr((string) $bidang['kode'], -2), '0')
                || rtrim((string) $subBidang['kode'], '.') !== $activitySubCode
                || $activitySubCode !== $subCode) {
                $this->respond_json(['message' => 'Bidang, sub bidang, atau kegiatan tidak sesuai referensi'], 422);

                return;
            }
        }

        $classification = $postValue('klasifikasi_belanja');
        if ($isBelanja && (! in_array($classification, ['5.1', '5.2', '5.3', '5.4'], true)
            || $classification !== substr($accountCode, 0, 3))) {
            $this->respond_json(['message' => 'Klasifikasi belanja harus sesuai dengan kode rekening'], 422);

            return;
        }

        $number = static function (string $value, string $pattern, string $message, bool $allowZero = true): string {
            if (! preg_match($pattern, $value) || (! $allowZero && (float) $value <= 0)) {
                throw new InvalidArgumentException($message);
            }

            return $value;
        };
        try {
            $startMonth = $isBelanja ? $postValue('bulan_mulai') : '';
            $endMonth = $isBelanja ? $postValue('bulan_selesai') : '';
            if ($isBelanja && (! ctype_digit($startMonth) || ! ctype_digit($endMonth)
                || (int) $startMonth < 1 || (int) $startMonth > 12
                || (int) $endMonth < (int) $startMonth || (int) $endMonth > 12)) {
                throw new InvalidArgumentException('Bulan pelaksanaan harus valid dan bulan mulai tidak boleh melewati bulan selesai.');
            }

            $allowedFunds = array_values(array_filter(array_map(
                static fn (array $source): string => (string) ($source['kode'] ?? $source['nama']),
                $references['sumber_dana']
            )));
            $items = [];
            foreach ($rincian as $item) {
                if (! is_array($item)
                    || ! is_scalar($item['keterangan'] ?? null)
                    || ! is_scalar($item['volume'] ?? null)
                    || ! is_scalar($item['satuan'] ?? null)
                    || ! is_scalar($item['harga_satuan'] ?? null)
                    || ! is_scalar($item['sumber_dana'] ?? null)
                    || ! is_scalar($item['id'] ?? '')) {
                    throw new InvalidArgumentException('Format baris rincian tidak valid.');
                }
                $description = trim((string) ($item['keterangan'] ?? ''));
                $volume = $number(trim((string) ($item['volume'] ?? '')), '/^\d{1,14}(?:\.\d{1,4})?$/', 'Volume item tidak valid.', false);
                $price = $number(trim((string) ($item['harga_satuan'] ?? '')), '/^\d{1,16}(?:\.\d{1,2})?$/', 'Harga satuan tidak valid.');
                $unit = trim((string) ($item['satuan'] ?? ''));
                $fund = trim((string) ($item['sumber_dana'] ?? ''));
                $itemId = trim((string) ($item['id'] ?? ''));
                if ($description === '' || mb_strlen($description) > 255 || $unit === '' || mb_strlen($unit) > 50
                    || ! in_array($fund, $allowedFunds, true)
                    || ($itemId !== '' && ! ctype_digit($itemId))) {
                    throw new InvalidArgumentException('Lengkapi semua kolom rincian dengan nilai yang valid.');
                }
                $items[] = [
                    'id' => $itemId === '' ? null : (int) $itemId,
                    'keterangan' => $this->security->xss_clean($description),
                    'volume' => $volume,
                    'satuan' => $this->security->xss_clean($unit),
                    'harga_satuan' => $price,
                    'sumber_dana' => $fund,
                ];
            }
            if ($items === [] || count($items) > 500) {
                throw new InvalidArgumentException('Rincian harus berisi 1 sampai 500 item.');
            }

            $wholeNumber = static function (string $value, string $label): int {
                if ($value === '') {
                    return 0;
                }
                $number = filter_var($value, FILTER_VALIDATE_INT);
                if ($number === false || $number < 0 || $number > 4294967295) {
                    throw new InvalidArgumentException($label . ' harus bilangan bulat tidak negatif.');
                }

                return $number;
            };
            $text = static function (string $value, int $limit, string $label): ?string {
                $value = trim($value);
                if (mb_strlen($value) > $limit) {
                    throw new InvalidArgumentException($label . ' melebihi batas ' . $limit . ' karakter.');
                }

                return $value === '' ? null : $value;
            };
            $idValue = $postValue('id');
            if ($idValue !== '' && ! ctype_digit($idValue)) {
                throw new InvalidArgumentException('ID anggaran tidak valid.');
            }
            $data = [
                'id' => $idValue === '' ? 0 : (int) $idValue,
                'tahun' => (int) $year,
                'tahap' => strtolower($stage),
                'jenis' => $positionTypes[$pos],
                'rekening_kode' => $account['kode'],
                'rekening_nama' => $account['nama'],
                'bidang_kode' => $bidang['kode'] ?? null,
                'sub_bidang' => $isBelanja ? $subCode : null,
                'kegiatan' => $kegiatan['nama'] ?? null,
                'output' => $isBelanja ? $text($postValue('output'), 191, 'Output') : null,
                'bulan_mulai' => $isBelanja ? (int) $startMonth : null,
                'bulan_selesai' => $isBelanja ? (int) $endMonth : null,
                'penerima_laki' => $wholeNumber($isBelanja ? $postValue('penerima_laki') : '', 'Penerima laki-laki'),
                'penerima_perempuan' => $wholeNumber($isBelanja ? $postValue('penerima_perempuan') : '', 'Penerima perempuan'),
                'penerima_rtm' => $wholeNumber($isBelanja ? $postValue('penerima_rtm') : '', 'Penerima RTM'),
                'lokasi' => $isBelanja ? $text($postValue('lokasi'), 4000, 'Lokasi') : null,
                'target_sdgs' => $isBelanja ? $text($postValue('target_sdgs'), 100, 'Target SDGs') : null,
                'pka' => $isBelanja ? $text($postValue('pka'), 191, 'Nama PKA') : null,
                'tpk' => $isBelanja ? $text($postValue('tpk'), 191, 'Nama TPK') : null,
                'klasifikasi_belanja' => $isBelanja ? $classification : null,
                'data_eksisting' => $isBelanja ? $text($postValue('data_eksisting'), 4000, 'Data eksisting') : null,
                'target_tahun_depan' => $isBelanja ? $text($postValue('target_tahun_depan'), 4000, 'Target tahun depan') : null,
                'volume_rencana' => $isBelanja && $postValue('volume_rencana') !== ''
                    ? $number($postValue('volume_rencana'), '/^\d{1,14}(?:\.\d{1,4})?$/', 'Rencana volume tidak valid.')
                    : null,
                'satuan_rencana' => $isBelanja ? $text($postValue('satuan_rencana'), 50, 'Satuan rencana') : null,
                'nama_paket' => $isBelanja ? $text($postValue('nama_paket'), 191, 'Nama paket') : null,
                'kode_paket' => $isBelanja ? $text($postValue('kode_paket'), 50, 'Kode paket') : null,
            ];
        } catch (InvalidArgumentException $error) {
            $this->respond_json(['message' => $error->getMessage()], 422);

            return;
        }

        try {
            $id = $this->keuangan_manual_model->simpan_rab_manual($data, $items);
        } catch (InvalidArgumentException $error) {
            $this->respond_json(['message' => $error->getMessage()], 422);

            return;
        }

        if (false === $id) {
            $this->respond_json(['message' => 'Gagal menyimpan rincian anggaran. Periksa log aplikasi untuk detail kesalahan.'], 422);

            return;
        }

        $this->respond_json(['message' => 'Rincian APBDes berhasil disimpan', 'id' => $id]);
    }

    public function salin_rab_perubahan($id = null): void
    {
        isCan('u', 'rincian-rab');

        $id = $this->keuangan_manual_model->salin_rab_perubahan((int) $id);
        if (false === $id) {
            $this->respond_json(['message' => 'Anggaran Murni tidak ditemukan atau sudah disalin ke P-APBDes'], 422);

            return;
        }

        $this->respond_json(['message' => 'Anggaran berhasil disalin ke P-APBDes', 'id' => $id]);
    }

    public function impor_rab_tahun_lalu(): void
    {
        isCan('u', 'rincian-rab');

        $post = $this->input->post();
        $sourceId = is_scalar($post['id'] ?? null) ? trim((string) $post['id']) : '';
        $year = is_scalar($post['tahun'] ?? null) ? trim((string) $post['tahun']) : '';
        $position = is_scalar($post['pos'] ?? null) ? trim((string) $post['pos']) : '5.BELANJA';
        $sourceType = ['5.BELANJA' => 'belanja', '6.PEMBIAYAAN' => 'pembiayaan'][$position] ?? null;
        if (! ctype_digit($sourceId) || ! preg_match('/^\d{4}$/', $year)
            || (int) $year < 2000 || (int) $year > 2200 || $sourceType === null) {
            $this->respond_json(['message' => 'Anggaran sumber atau tahun tujuan tidak valid'], 422);

            return;
        }

        $id = $this->keuangan_manual_model->salin_rab_tahun_lalu((int) $sourceId, (int) $year, $sourceType);
        if (false === $id) {
            $this->respond_json(['message' => 'Anggaran Murni untuk jenis anggaran dan tahun sumber tersebut tidak ditemukan'], 422);

            return;
        }

        $this->respond_json(['message' => 'Anggaran tahun lalu berhasil disalin ke tahun ' . $year, 'id' => $id]);
    }

    public function hapus_rab_manual($id = null): void
    {
        isCan('h', 'rincian-rab');

        if (! $this->keuangan_manual_model->hapus_rab_manual((int) $id)) {
            $this->respond_json(['message' => 'Data tidak ditemukan, gagal dihapus, atau masih menjadi sumber anggaran perubahan'], 422);

            return;
        }

        $this->respond_json(['message' => 'Rincian anggaran berhasil dihapus']);
    }

    public function parameter_rab(): void
    {
        $requestedType = $this->input->method(true) === 'POST'
            ? $this->input->post('jenis_parameter', true)
            : $this->input->get('jenis', true);
        if (in_array($requestedType, ['rekening', 'output'], true)) {
            $this->parameter_katalog_rab($requestedType);

            return;
        }

        isCan('b', 'param-bidang-kegiatan');
        $this->sub_modul_ini = 'param-bidang-kegiatan';

        if ($this->input->method(true) === 'POST') {
            $action = $this->input->post('action', true);
            if ($action === 'impor') {
                isCan('u', 'param-bidang-kegiatan');
                $this->load->library('upload');
                $this->upload->initialize([
                    'upload_path' => sys_get_temp_dir(),
                    'allowed_types' => 'csv|xlsx',
                    'max_size' => 10240,
                    'file_ext_tolower' => true,
                ]);
                if (! $this->upload->do_upload('userfile')) {
                    session_error($this->upload->display_errors('', ''));
                } else {
                    $file = $this->upload->data('full_path');
                    try {
                        $rows = (new \Rap2hpoutre\FastExcel\FastExcel())->import($file)->toArray();
                        if ($rows !== []) {
                            $headers = array_map(
                                static fn ($key): string => strtolower(trim(ltrim((string) $key, "\xEF\xBB\xBF"))),
                                array_keys($rows[0])
                            );
                            if (array_diff(['jenis', 'kode', 'nama', 'kode_induk'], $headers) !== []) {
                                throw new InvalidArgumentException('Kolom wajib: jenis, kode, nama, kode_induk.');
                            }
                        }
                        foreach ($rows as &$row) {
                            $row = array_combine(
                                array_map(static fn ($key): string => strtolower(trim(ltrim((string) $key, "\xEF\xBB\xBF"))), array_keys($row)),
                                array_values($row)
                            );
                        }
                        unset($row);
                        $this->keuangan_manual_model->impor_rab_parameter($rows);
                        session_success();
                    } catch (InvalidArgumentException $error) {
                        session_error($error->getMessage());
                    } catch (Throwable $error) {
                        log_message('error', 'Impor parameter Bidang/Kegiatan gagal: ' . $error->getMessage());
                        session_error('Impor gagal. Periksa format berkas dan log aplikasi.');
                    } finally {
                        if (is_file($file)) {
                            unlink($file);
                        }
                    }
                }
            } elseif ($action === 'hapus') {
                isCan('h', 'param-bidang-kegiatan');
                $id = (int) $this->input->post('id');
                if ($id < 1 || ! $this->keuangan_manual_model->nonaktifkan_rab_parameter($id)) {
                    session_error('Data tidak ditemukan atau masih digunakan oleh parameter turunannya.');
                } else {
                    session_success();
                }
            } else {
                isCan('u', 'param-bidang-kegiatan');
                $post = $this->input->post();
                $value = static fn (string $key): string => is_scalar($post[$key] ?? null)
                    ? trim((string) $post[$key])
                    : '';
                $idValue = $value('id');
                $data = [
                    'jenis' => $value('jenis'),
                    'kode' => $this->security->xss_clean($value('kode')),
                    'nama' => $this->security->xss_clean($value('nama')),
                    'parent_id' => $value('parent_id') === '' ? null : (int) $value('parent_id'),
                    'aktif' => 1,
                ];
                $id = $idValue !== '' && ctype_digit($idValue)
                    ? $this->keuangan_manual_model->simpan_rab_parameter($data, (int) $idValue)
                    : ($idValue === '' ? $this->keuangan_manual_model->simpan_rab_parameter($data) : false);
                if ($id === false) {
                    session_error('Parameter tidak tersimpan. Periksa kode, nama, induk, dan pastikan kode belum digunakan.');
                } else {
                    session_success();
                }
            }

            redirect('keuangan_manual/parameter_rab');
        }

        $data = [];
        $this->add_finance_year_filter($data);
        $data['parameters'] = $this->data_parameter_rab();
        $data['parents'] = [
            'bidang' => $this->keuangan_manual_model->list_rab_parameter_parent('sub_bidang'),
            'sub_bidang' => $this->keuangan_manual_model->list_rab_parameter_parent('kegiatan'),
        ];
        $data['types'] = [
            'bidang' => 'Bidang',
            'sub_bidang' => 'Sub Bidang',
            'kegiatan' => 'Kegiatan',
        ];
        $data['can_edit'] = can('u', 'param-bidang-kegiatan');
        $data['can_delete'] = can('h', 'param-bidang-kegiatan');
        $data['can_export'] = can('b', 'param-bidang-kegiatan');
        $this->render('keuangan/parameter_bidang_kegiatan', $data);
    }

    private function parameter_katalog_rab(string $jenis): void
    {
        $slug = $jenis === 'rekening' ? 'param-rekening-apbdesa' : 'param-output-keluaran';
        $title = $jenis === 'rekening' ? 'Rekening APBDesa' : 'Output/Keluaran';
        isCan('b', $slug);
        $this->sub_modul_ini = $slug;

        if ($this->input->method(true) === 'POST') {
            $action = $this->input->post('action', true);
            if ($action === 'hapus') {
                isCan('h', $slug);
                $id = (int) $this->input->post('id');
                if ($id < 1 || ! $this->keuangan_manual_model->nonaktifkan_rab_parameter_katalog($jenis, $id)) {
                    session_error('Data tidak ditemukan atau gagal dinonaktifkan.');
                } else {
                    session_success();
                }
            } elseif ($action === 'impor') {
                isCan('u', $slug);
                $this->load->library('upload');
                $this->upload->initialize([
                    'upload_path' => sys_get_temp_dir(),
                    'allowed_types' => 'csv|xlsx',
                    'max_size' => 10240,
                    'file_ext_tolower' => true,
                ]);
                if (! $this->upload->do_upload('userfile')) {
                    session_error($this->upload->display_errors('', ''));
                } else {
                    $file = $this->upload->data('full_path');
                    try {
                        $rows = (new \Rap2hpoutre\FastExcel\FastExcel())->import($file)->toArray();
                        $headers = $jenis === 'rekening'
                            ? ['kode', 'nama']
                            : ['kode_kegiatan', 'kode_output', 'uraian', 'satuan'];
                        if ($rows === []) {
                            throw new InvalidArgumentException('Berkas tidak berisi data.');
                        }
                        $actualHeaders = array_map(
                            static fn ($key): string => strtolower(trim(ltrim((string) $key, "\xEF\xBB\xBF"))),
                            array_keys($rows[0])
                        );
                        if (array_diff($headers, $actualHeaders) !== []) {
                            throw new InvalidArgumentException('Kolom wajib: ' . implode(', ', $headers) . '.');
                        }
                        foreach ($rows as &$row) {
                            $row = array_combine(
                                array_map(static fn ($key): string => strtolower(trim(ltrim((string) $key, "\xEF\xBB\xBF"))), array_keys($row)),
                                array_values($row)
                            );
                        }
                        unset($row);
                        $this->keuangan_manual_model->impor_rab_parameter_katalog($jenis, $rows);
                        session_success();
                    } catch (InvalidArgumentException $error) {
                        session_error($error->getMessage());
                    } catch (Throwable $error) {
                        log_message('error', 'Impor parameter ' . $title . ' gagal: ' . $error->getMessage());
                        session_error('Impor gagal. Periksa format berkas dan log aplikasi.');
                    } finally {
                        if (is_file($file)) {
                            unlink($file);
                        }
                    }
                }
            } else {
                isCan('u', $slug);
                $post = $this->input->post();
                $value = static fn (string $key): string => is_scalar($post[$key] ?? null)
                    ? trim((string) $post[$key])
                    : '';
                $idValue = $value('id');
                $id = $idValue !== '' && ctype_digit($idValue)
                    ? $this->keuangan_manual_model->simpan_rab_parameter_katalog($jenis, [
                        'kode' => $value('kode'),
                        'nama' => $value('nama'),
                        'parent_id' => $value('parent_id'),
                        'satuan' => $value('satuan'),
                    ], (int) $idValue)
                    : ($idValue === '' ? $this->keuangan_manual_model->simpan_rab_parameter_katalog($jenis, [
                        'kode' => $value('kode'),
                        'nama' => $value('nama'),
                        'parent_id' => $value('parent_id'),
                        'satuan' => $value('satuan'),
                    ]) : false);
                if ($id === false) {
                    session_error('Parameter tidak tersimpan. Periksa kode, uraian, satuan, induk kegiatan, dan pastikan kode belum digunakan.');
                } else {
                    session_success();
                }
            }

            redirect('keuangan_manual/parameter_rab?jenis=' . $jenis);
        }

        $data = [
            'jenis' => $jenis,
            'title' => $title,
            'parameters' => $this->keuangan_manual_model->list_rab_parameter_katalog($jenis),
            'activities' => $jenis === 'output' ? $this->keuangan_manual_model->list_rab_referensi()['kegiatan'] : [],
            'can_edit' => can('u', $slug),
            'can_delete' => can('h', $slug),
            'can_export' => can('b', $slug),
        ];
        $this->add_finance_year_filter($data);
        $this->render('keuangan/parameter_rab_katalog', $data);
    }

    public function ekspor_parameter_katalog_rab(string $jenis, string $format)
    {
        if (! in_array($jenis, ['rekening', 'output'], true) || ! in_array($format, ['pdf', 'xlsx', 'csv'], true)) {
            show_404();

            return;
        }
        $slug = $jenis === 'rekening' ? 'param-rekening-apbdesa' : 'param-output-keluaran';
        isCan('b', $slug);

        $parameters = $this->keuangan_manual_model->list_rab_parameter_katalog($jenis);
        $rows = [];
        foreach ($parameters as $index => $parameter) {
            $rows[] = $jenis === 'rekening'
                ? ['No' => $index + 1, 'Kode' => $parameter['kode'], 'Rekening' => $parameter['nama']]
                : [
                    'No' => $index + 1,
                    'Kode Kegiatan' => $parameter['parent_kode'] ?? '',
                    'Kode Output' => $parameter['kode'],
                    'Uraian' => $parameter['nama'],
                    'Satuan' => $parameter['satuan'] ?? '',
                ];
        }
        if ($rows === []) {
            $rows[] = $jenis === 'rekening'
                ? ['No' => '', 'Kode' => '', 'Rekening' => 'Belum ada data rekening.']
                : ['No' => '', 'Kode Kegiatan' => '', 'Kode Output' => '', 'Uraian' => 'Belum ada data output.', 'Satuan' => ''];
        }

        $fileName = 'parameter-' . $jenis . '-' . date('Ymd');
        if ($format !== 'pdf') {
            if ($format === 'csv') {
                foreach ($rows as &$row) {
                    foreach ($row as &$value) {
                        if (is_string($value) && preg_match('/^[\t\r ]*[=+\-@]/', $value) === 1) {
                            $value = "'" . $value;
                        }
                    }
                    unset($value);
                }
                unset($row);
            }

            return (new \Rap2hpoutre\FastExcel\FastExcel($rows))->download($fileName . '.' . $format);
        }

        $headers = array_keys($rows[0]);
        $html = '<style>body{font-family:helvetica;font-size:10px}h2{text-align:center}table{width:100%;border-collapse:collapse}th,td{border:1px solid #444;padding:5px}th{background-color:#eee}</style>';
        $html .= '<h2>' . html_escape($jenis === 'rekening' ? 'Rekening APBDesa' : 'Output/Keluaran') . '</h2><table><thead><tr>';
        foreach ($headers as $heading) {
            $html .= '<th>' . html_escape($heading) . '</th>';
        }
        $html .= '</tr></thead><tbody>';
        foreach ($rows as $row) {
            $html .= '<tr>';
            foreach ($row as $value) {
                $html .= '<td>' . html_escape((string) $value) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
        $pdf = new \Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en', true, 'UTF-8');
        $pdf->writeHTML($html);
        $pdf->output($fileName . '.pdf', 'D');
    }

    public function unduh_template_parameter_katalog_rab(string $jenis): void
    {
        if (! in_array($jenis, ['rekening', 'output'], true)) {
            show_404();

            return;
        }
        isCan('b', $jenis === 'rekening' ? 'param-rekening-apbdesa' : 'param-output-keluaran');
        $headers = $jenis === 'rekening'
            ? ['kode', 'nama']
            : ['kode_kegiatan', 'kode_output', 'uraian', 'satuan'];
        $stream = fopen('php://temp', 'r+');
        fputcsv($stream, $headers);
        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);
        $this->output
            ->set_content_type('text/csv', 'utf-8')
            ->set_header('Content-Disposition: attachment; filename="template_parameter_' . $jenis . '.csv"')
            ->set_output("\xEF\xBB\xBF" . $csv);
    }

    public function ekspor_parameter_rab(string $format)
    {
        isCan('b', 'param-bidang-kegiatan');
        if (! in_array($format, ['pdf', 'xlsx', 'csv'], true)) {
            show_404();

            return;
        }

        $types = [
            'bidang' => 'Bidang',
            'sub_bidang' => 'Sub Bidang',
            'kegiatan' => 'Kegiatan',
        ];
        $parameters = $this->data_parameter_rab();
        $rows = [];
        foreach ($parameters as $index => $parameter) {
            $rows[] = [
                'No' => $index + 1,
                'Kode' => $parameter['kode_tampil'],
                'Tingkatan' => $types[$parameter['jenis']],
                'Nama' => $parameter['nama'],
                'Kode Induk' => $parameter['parent_kode'] ?? '',
            ];
        }
        if ($rows === []) {
            $rows[] = [
                'No' => '',
                'Kode' => '',
                'Tingkatan' => 'Informasi',
                'Nama' => 'Belum ada data Bidang/Sub Bidang/Kegiatan.',
                'Kode Induk' => '',
            ];
        }

        $fileName = 'parameter-bidang-kegiatan-' . date('Ymd');
        if ($format === 'xlsx' || $format === 'csv') {
            if ($format === 'csv') {
                foreach ($rows as &$row) {
                    foreach ($row as &$value) {
                        if (is_string($value) && preg_match('/^[\t\r ]*[=+\-@]/', $value) === 1) {
                            $value = "'" . $value;
                        }
                    }
                    unset($value);
                }
                unset($row);
            }

            return (new \Rap2hpoutre\FastExcel\FastExcel($rows))
                ->download($fileName . '.' . $format);
        }

        $html = '<style>body{font-family:helvetica;font-size:10px}h2{text-align:center}table{width:100%;border-collapse:collapse}th,td{border:1px solid #444;padding:5px}th{background-color:#eee}</style>';
        $html .= '<h2>Daftar Bidang/Sub Bidang/Kegiatan</h2><table><thead><tr>';
        foreach (['No', 'Kode', 'Tingkatan', 'Nama', 'Kode Induk'] as $heading) {
            $html .= '<th>' . html_escape($heading) . '</th>';
        }
        $html .= '</tr></thead><tbody>';
        foreach ($rows as $row) {
            $html .= '<tr>';
            foreach ($row as $value) {
                $html .= '<td>' . html_escape((string) $value) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';

        $pdf = new \Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en', true, 'UTF-8');
        $pdf->writeHTML($html);
        $pdf->output($fileName . '.pdf', 'D');
    }

    private function data_parameter_rab(): array
    {
        $parameters = $this->keuangan_manual_model->list_rab_parameter(['aktif' => '1']);
        $codesById = array_column($parameters, 'kode', 'id');
        foreach ($parameters as &$parameter) {
            $parameter['parent_kode'] = $codesById[$parameter['parent_id']] ?? '';
            $parts = explode('.', trim((string) $parameter['kode'], '.'));
            if ($parameter['jenis'] === 'bidang') {
                $number = (int) end($parts);
                $parameter['kode_tampil'] = (string) $number;
                $parameter['urutan'] = [$number, 0, 0];
            } else {
                $bidang = (int) ($parts[0] ?? 0);
                $subBidang = (int) ($parts[1] ?? 0);
                $kegiatan = (int) ($parts[2] ?? 0);
                $parameter['urutan'] = [$bidang, $subBidang, $parameter['jenis'] === 'sub_bidang' ? 0 : $kegiatan];
                $parameter['kode_tampil'] = $bidang . '.' . $subBidang . ($parameter['jenis'] === 'sub_bidang' ? '.' : '.' . sprintf('%02d', $kegiatan) . '.');
            }
        }
        unset($parameter);
        usort($parameters, static function (array $left, array $right): int {
            for ($index = 0; $index < 3; ++$index) {
                $comparison = $left['urutan'][$index] <=> $right['urutan'][$index];
                if ($comparison !== 0) {
                    return $comparison;
                }
            }

            return ['bidang' => 0, 'sub_bidang' => 1, 'kegiatan' => 2][$left['jenis']]
                <=> ['bidang' => 0, 'sub_bidang' => 1, 'kegiatan' => 2][$right['jenis']];
        });

        return $parameters;
    }

    public function unduh_template_parameter_rab(): void
    {
        isCan('b', 'param-bidang-kegiatan');
        $stream = fopen('php://temp', 'r+');
        fputcsv($stream, ['jenis', 'kode', 'nama', 'kode_induk']);
        rewind($stream);
        $csv = stream_get_contents($stream);
        fclose($stream);

        $this->output
            ->set_content_type('text/csv', 'utf-8')
            ->set_header('Content-Disposition: attachment; filename="template_bidang_kegiatan.csv"')
            ->set_output("\xEF\xBB\xBF" . $csv);
    }

    public function laporan_rab(?string $shortcut = null, ?string $reportShortcut = null): void
    {
        isCan('b', 'laporan-rab');
        $this->sub_modul_ini = 'laporan-rab';
        $get = $this->input->get();
        $yearFilter = $this->finance_year_filter_data();
        if (isset($get['tahun_anggaran'])) {
            $get['tahun'] = $yearFilter['finance_year'];
        } elseif (! isset($get['tahun'])) {
            $get['tahun'] = $yearFilter['finance_year'];
        }
        if ($reportShortcut !== null) {
            $get['laporan'] = $reportShortcut;
            $get['tahap'] = $shortcut === 'p' ? 'perubahan' : 'murni';
        } elseif ($shortcut !== null) {
            $get['laporan'] = $shortcut;
        }
        $reportKey = is_scalar($get['laporan'] ?? null) ? (string) $get['laporan'] : 'pendapatan';
        $stage = is_scalar($get['tahap'] ?? null) ? (string) $get['tahap'] : '';
        $reportMenu = [
            'pendapatan' => 'pendapatan',
            'belanja' => 'belanja',
            'pembiayaan' => 'pembiayaan',
            'apbdes' => 'apbdes',
            'penjabaran' => 'penjabaran-apbdes',
            'sumber_dana' => 'apbdes-sumber-dana',
            'konsolidasi' => 'apbdes',
        ];
        $reportSlug = $reportMenu[$reportKey] ?? 'pendapatan';
        $this->sub_modul_ini = ($stage === 'perubahan' ? 'perubahan-' : 'laporan-') . $reportSlug;
        $data = $this->data_laporan_rab(is_array($get) ? $get : []);
        $data['years'] = $this->keuangan_manual_model->list_tahun_rab();
        $data['finance_filter_years'] = $yearFilter['finance_years'];
        $data['finance_filter_year'] = $yearFilter['finance_year'];
        $data['finance_filter_query'] = is_array($this->input->get()) ? $this->input->get() : [];
        $data['finance_filter_action'] = current_url();
        $data['references'] = $this->keuangan_manual_model->list_rab_referensi();
        $data['can_export'] = can('b', 'laporan-rab');
        $data['export_url'] = site_url('keuangan_manual/ekspor_laporan_rab') . '?' . http_build_query($get);

        $this->render('keuangan/laporan_rab', $data);
    }

    public function ekspor_laporan_rab()
    {
        isCan('b', 'laporan-rab');
        $get = $this->input->get();
        $data = $this->data_laporan_rab(is_array($get) ? $get : []);
        $rows = [];
        foreach ($data['rows'] as $row) {
            $rows[] = [
                'Tahun' => (int) $row['tahun'],
                'Tahap' => $row['tahap'],
                'Pos Anggaran' => $row['jenis'],
                'Kode Rekening' => $row['rekening_kode'],
                'Uraian Rekening' => $row['rekening_nama'],
                'Bidang' => $row['bidang_kode'],
                'Kegiatan' => $row['kegiatan'],
                'Output' => $row['output'],
                'Keterangan Item' => $row['keterangan'],
                'Volume' => (float) $row['volume'],
                'Satuan' => $row['satuan'],
                'Harga Satuan' => (float) $row['harga_satuan'],
                'Sumber Dana' => $row['sumber_dana'],
                'Semula' => (float) $row['jumlah_semula'],
                'Menjadi' => (float) $row['jumlah_menjadi'],
                'Selisih' => (float) $row['jumlah_menjadi'] - (float) $row['jumlah_semula'],
                'e-RAB Murni' => '',
                'e-RAB Perubahan' => '',
                'Anggaran APBDes Manual' => '',
                'Realisasi APBDes Manual' => '',
                'Status Pencocokan' => '',
                'Laki-laki' => (int) $row['penerima_laki'],
                'Perempuan' => (int) $row['penerima_perempuan'],
                'RTM' => (int) $row['penerima_rtm'],
                'Lokasi' => $row['lokasi'],
                'Target SDGs' => $row['target_sdgs'],
                'PKA' => $row['pka'],
                'TPK' => $row['tpk'],
            ];
        }
        if (in_array($data['report_key'], ['apbdes', 'konsolidasi'], true)) {
            foreach ([
                'Pendapatan' => ['pendapatan_semula', 'pendapatan_menjadi'],
                'Belanja' => ['belanja_semula', 'belanja_menjadi'],
                'Surplus / (Defisit)' => ['surplus_semula', 'surplus_menjadi'],
                'Pembiayaan Netto' => ['pembiayaan_netto_semula', 'pembiayaan_netto_menjadi'],
                'SiLPA Akhir' => ['silpa_semula', 'silpa_menjadi'],
            ] as $label => [$oldKey, $newKey]) {
                $rows[] = [
                    'Tahun' => $data['filters']['tahun'],
                    'Tahap' => 'Ringkasan',
                    'Pos Anggaran' => $label,
                    'Kode Rekening' => '',
                    'Uraian Rekening' => '',
                    'Bidang' => '',
                    'Kegiatan' => '',
                    'Output' => '',
                    'Keterangan Item' => '',
                    'Volume' => '',
                    'Satuan' => '',
                    'Harga Satuan' => '',
                    'Sumber Dana' => '',
                    'Semula' => (float) $data['summary'][$oldKey],
                    'Menjadi' => (float) $data['summary'][$newKey],
                    'Selisih' => (float) $data['summary'][$newKey] - (float) $data['summary'][$oldKey],
                    'e-RAB Murni' => '',
                    'e-RAB Perubahan' => '',
                    'Anggaran APBDes Manual' => '',
                    'Realisasi APBDes Manual' => '',
                    'Status Pencocokan' => '',
                    'Laki-laki' => '',
                    'Perempuan' => '',
                    'RTM' => '',
                    'Lokasi' => '',
                    'Target SDGs' => '',
                    'PKA' => '',
                    'TPK' => '',
                ];
            }
        }
        foreach ($data['account_comparison'] as $comparison) {
            $rows[] = [
                'Tahun' => $data['filters']['tahun'],
                'Tahap' => 'Komparasi Rekening',
                'Pos Anggaran' => $comparison['jenis'],
                'Kode Rekening' => $comparison['kode'],
                'Uraian Rekening' => $comparison['uraian'],
                'Bidang' => '',
                'Kegiatan' => '',
                'Output' => '',
                'Keterangan Item' => '',
                'Volume' => '',
                'Satuan' => '',
                'Harga Satuan' => '',
                'Sumber Dana' => '',
                'Semula' => '',
                'Menjadi' => '',
                'Selisih' => '',
                'e-RAB Murni' => (float) $comparison['murni'],
                'e-RAB Perubahan' => (float) $comparison['perubahan'],
                'Anggaran APBDes Manual' => (float) $comparison['anggaran_manual'],
                'Realisasi APBDes Manual' => (float) $comparison['realisasi_manual'],
                'Status Pencocokan' => $comparison['status'],
                'Laki-laki' => '',
                'Perempuan' => '',
                'RTM' => '',
                'Lokasi' => '',
                'Target SDGs' => '',
                'PKA' => '',
                'TPK' => '',
            ];
        }
        if ($rows === []) {
            $rows[] = ['Informasi' => 'Tidak ada data untuk filter yang dipilih.'];
        }

        return (new \Rap2hpoutre\FastExcel\FastExcel($rows))
            ->download('laporan-e-rab-' . $data['report_key'] . '-' . date('Ymd') . '.xlsx');
    }

    private function data_laporan_rab(array $get): array
    {
        $reports = [
            'pendapatan' => ['Laporan Pendapatan', 'pendapatan'],
            'belanja' => ['Laporan Belanja', 'belanja'],
            'pembiayaan' => ['Laporan Pembiayaan', 'pembiayaan'],
            'apbdes' => ['Laporan APBDes', null],
            'penjabaran' => ['Laporan Penjabaran APBDes & Perubahannya', null],
            'sumber_dana' => ['Laporan APBDes per Sumber Dana', null],
            'konsolidasi' => ['Laporan Perubahan APBDes (Konsolidasian)', null],
        ];
        $reportKey = is_scalar($get['laporan'] ?? null) ? (string) $get['laporan'] : 'pendapatan';
        if (! isset($reports[$reportKey])) {
            $reportKey = 'pendapatan';
        }

        $filter = [];
        $year = is_scalar($get['tahun'] ?? null) ? (string) $get['tahun'] : '';
        if (preg_match('/^\d{4}$/', $year) && (int) $year >= 2000 && (int) $year <= 2200) {
            $filter['tahun'] = (int) $year;
        }
        $stage = is_scalar($get['tahap'] ?? null) ? strtolower((string) $get['tahap']) : '';
        if (in_array($stage, ['murni', 'perubahan'], true)) {
            $filter['tahap'] = $stage;
        } else {
            $stage = '';
        }
        $filterStage = $stage;
        if ($reports[$reportKey][1] !== null) {
            $filter['jenis'] = $reports[$reportKey][1];
        }

        $references = $this->keuangan_manual_model->list_rab_referensi();
        $bidangCode = is_scalar($get['bidang'] ?? null) ? trim((string) $get['bidang']) : '';
        if ($reportKey === 'belanja' && $bidangCode !== '') {
            $filter['bidang_kode'] = $bidangCode;
        }
        $activityCode = is_scalar($get['kegiatan'] ?? null) ? trim((string) $get['kegiatan']) : '';
        if ($reportKey === 'belanja' && $activityCode !== '') {
            foreach ($references['kegiatan'] as $activity) {
                if ($activity['kode'] === $activityCode) {
                    $filter['kegiatan'] = $activity['nama'];
                    break;
                }
            }
        }
        $fund = is_scalar($get['sumber_dana'] ?? null) ? trim((string) $get['sumber_dana']) : '';
        if ($reportKey === 'sumber_dana' && $fund !== '') {
            $filter['sumber_dana'] = $fund;
        }

        $rows = $this->keuangan_manual_model->laporan_rab($filter);
        $summary = [
            'pendapatan_semula' => 0.0,
            'pendapatan_menjadi' => 0.0,
            'belanja_semula' => 0.0,
            'belanja_menjadi' => 0.0,
            'penerimaan_pembiayaan_semula' => 0.0,
            'penerimaan_pembiayaan_menjadi' => 0.0,
            'pengeluaran_pembiayaan_semula' => 0.0,
            'pengeluaran_pembiayaan_menjadi' => 0.0,
        ];
        $stageTotals = [
            'murni' => [],
            'perubahan' => [],
        ];
        foreach ($rows as &$row) {
            $row['tahap_label'] = $row['tahap'] === 'murni' ? 'Murni' : 'Perubahan';
            $row['selisih'] = (float) $row['jumlah_menjadi'] - (float) $row['jumlah_semula'];
            if ($row['jenis'] === 'pendapatan') {
                $group = 'pendapatan';
            } elseif ($row['jenis'] === 'belanja') {
                $group = 'belanja';
            } elseif (str_starts_with((string) $row['rekening_kode'], '6.1')) {
                $group = 'penerimaan_pembiayaan';
            } elseif (str_starts_with((string) $row['rekening_kode'], '6.2')) {
                $group = 'pengeluaran_pembiayaan';
            } else {
                continue;
            }

            $rowStage = $row['tahap'];
            $stageTotals[$rowStage][$group]['semula'] = ($stageTotals[$rowStage][$group]['semula'] ?? 0)
                + (float) $row['jumlah_semula'];
            $stageTotals[$rowStage][$group]['menjadi'] = ($stageTotals[$rowStage][$group]['menjadi'] ?? 0)
                + (float) $row['jumlah_menjadi'];
        }
        unset($row);

        foreach (['pendapatan', 'belanja', 'penerimaan_pembiayaan', 'pengeluaran_pembiayaan'] as $group) {
            $oldKey = $group . '_semula';
            $newKey = $group . '_menjadi';
            if ($filterStage === '' && isset($stageTotals['perubahan'][$group])) {
                $summary[$oldKey] = $stageTotals['perubahan'][$group]['semula'];
                $summary[$newKey] = $stageTotals['perubahan'][$group]['menjadi'];
            } elseif ($filterStage === '' && isset($stageTotals['murni'][$group])) {
                $summary[$oldKey] = $stageTotals['murni'][$group]['menjadi'];
                $summary[$newKey] = $stageTotals['murni'][$group]['menjadi'];
            } else {
                $summary[$oldKey] = $stageTotals[$filterStage][$group]['semula'] ?? 0;
                $summary[$newKey] = $stageTotals[$filterStage][$group]['menjadi'] ?? 0;
            }
        }

        $summary['surplus_semula'] = $summary['pendapatan_semula'] - $summary['belanja_semula'];
        $summary['surplus_menjadi'] = $summary['pendapatan_menjadi'] - $summary['belanja_menjadi'];
        $summary['pembiayaan_netto_semula'] = $summary['penerimaan_pembiayaan_semula'] - $summary['pengeluaran_pembiayaan_semula'];
        $summary['pembiayaan_netto_menjadi'] = $summary['penerimaan_pembiayaan_menjadi'] - $summary['pengeluaran_pembiayaan_menjadi'];
        $summary['silpa_semula'] = $summary['surplus_semula'] + $summary['pembiayaan_netto_semula'];
        $summary['silpa_menjadi'] = $summary['surplus_menjadi'] + $summary['pembiayaan_netto_menjadi'];

        return [
            'report_key' => $reportKey,
            'report_title' => $reports[$reportKey][0],
            'rows' => $rows,
            'summary' => $summary,
            'account_comparison' => $year !== '' ? $this->laporan_realisasi_per_rekening($year) : [],
            'filters' => [
                'tahun' => $year,
                'tahap' => $stage,
                'bidang' => $bidangCode,
                'kegiatan' => $activityCode,
                'sumber_dana' => $fund,
            ],
        ];
    }

    private function laporan_realisasi_per_rekening(string $year): array
    {
        $typeLabels = [
            'pendapatan' => 'Pendapatan',
            'belanja' => 'Belanja',
            'pembiayaan' => 'Pembiayaan',
        ];
        $accountCode = static function ($value): string {
            $parts = preg_split('/\s+/', trim((string) $value), 2);

            return rtrim((string) ($parts[0] ?? ''), '.');
        };
        $comparison = [];

        foreach ($this->keuangan_manual_model->laporan_rab(['tahun' => (int) $year]) as $row) {
            $type = (string) $row['jenis'];
            $stage = (string) $row['tahap'];
            $code = $accountCode($row['rekening_kode'] ?? '');
            if (! isset($typeLabels[$type]) || ! in_array($stage, ['murni', 'perubahan'], true) || $code === '') {
                continue;
            }

            $key = $type . '|' . $code;
            $comparison[$key] ??= [
                'jenis' => $typeLabels[$type],
                'kode' => $code,
                'uraian' => (string) ($row['rekening_nama'] ?? ''),
                'murni' => 0.0,
                'perubahan' => 0.0,
                'anggaran_manual' => 0.0,
                'realisasi_manual' => 0.0,
                'ada_rab' => true,
                'ada_manual' => false,
            ];
            $comparison[$key][$stage] += (float) $row['jumlah_menjadi'];
        }

        foreach ($this->keuangan_manual_model->list_apbdes($year) as $row) {
            $type = [
                '4.PENDAPATAN' => 'pendapatan',
                '5.BELANJA' => 'belanja',
                '6.PEMBIAYAAN' => 'pembiayaan',
            ][$row->Kd_Akun] ?? null;
            $code = $accountCode($row->Kd_Rincian);
            if ($type === null || $code === '') {
                continue;
            }

            $key = $type . '|' . $code;
            $comparison[$key] ??= [
                'jenis' => $typeLabels[$type],
                'kode' => $code,
                'uraian' => '',
                'murni' => 0.0,
                'perubahan' => 0.0,
                'anggaran_manual' => 0.0,
                'realisasi_manual' => 0.0,
                'ada_rab' => false,
                'ada_manual' => false,
            ];
            if ($comparison[$key]['uraian'] === '') {
                $parts = preg_split('/\s+/', trim((string) $row->Kd_Rincian), 2);
                $comparison[$key]['uraian'] = trim((string) ($parts[1] ?? ''));
            }
            $comparison[$key]['anggaran_manual'] += (float) $row->Nilai_Anggaran;
            $comparison[$key]['realisasi_manual'] += (float) $row->Nilai_Realisasi;
            $comparison[$key]['ada_manual'] = true;
        }

        foreach ($comparison as &$row) {
            $row['status'] = $row['ada_rab'] && $row['ada_manual']
                ? 'Cocok berdasarkan tahun, jenis, dan kode rekening'
                : ($row['ada_rab'] ? 'Belum ada data APBDes manual'
                    : 'Tidak ditemukan rincian e-RAB dengan kode rekening ini');
        }
        unset($row);

        usort($comparison, static function (array $left, array $right): int {
            return [$left['jenis'], $left['kode']] <=> [$right['jenis'], $right['kode']];
        });

        return array_values($comparison);
    }

    public function data_anggaran(): void
    {
        $data = $this->keuangan_manual_model->list_apbdes();
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }

    public function load_data(): void
    {
        $data = $this->keuangan_manual_model->list_data_keuangan();
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }

    public function get_anggaran(): void
    {
        $id   = $this->input->get('id');
        $data = $this->keuangan_manual_model->get_anggaran($id);
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }

    public function simpan_anggaran(): void
    {
        isCan('u');
        $insert = $this->validation($this->input->post());
        $data   = $this->keuangan_manual_model->simpan_anggaran($insert);

        status_sukses($data);
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }

    public function update_anggaran(): void
    {
        isCan('u');
        $id     = $this->input->post('id');
        $update = $this->validation($this->input->post());
        $data   = $this->keuangan_manual_model->update_anggaran($id, $update);

        status_sukses($data);
        echo json_encode($data, JSON_THROW_ON_ERROR);
    }

    public function delete_input($id = ''): void
    {
        isCan('h');
        $this->keuangan_manual_model->delete_input($id);
        redirect('keuangan_manual/manual_apbdes');
    }

    public function delete_all(): void
    {
        $this->keuangan_manual_model->delete_all();
        redirect('keuangan_manual/manual_apbdes');
    }

    public function salin_anggaran_tpl()
    {
        $thn_apbdes               = bilangan($this->input->post('kode'));
        $this->session->set_tahun = $thn_apbdes;
        $data                     = $this->keuangan_manual_model->salin_anggaran_tpl($thn_apbdes);

        if ($data) {
            return json($data);
        }

        return json("Duplikat tahun: {$thn_apbdes}", 400);
    }

    // data tahun anggaran untuk keperluan dropdown pada plugin keuangan di text editor
    public function cek_tahun_manual(): void
    {
        $data       = $this->keuangan_manual_model->list_tahun_anggaran_manual();
        $list_tahun = [];

        foreach ($data as $tahun) {
            $list_tahun[] = [
                'text'  => $tahun,
                'value' => $tahun,
            ];
        }
        echo json_encode($list_tahun, JSON_THROW_ON_ERROR);
    }

    /**
     * untuk menghindari double post browser
     * https://en.wikipedia.org/wiki/Post/Redirect/Get
     */
    public function set_terpilih(): void
    {
        $post_tahun = $this->input->post('tahun_anggaran');
        $post_jenis = $this->input->post('jenis_anggaran');
        if (is_scalar($post_tahun) && preg_match('/^\d{4}$/', (string) $post_tahun)
            && (int) $post_tahun >= 2000 && (int) $post_tahun <= 2200) {
            $this->session->set_tahun = (string) $post_tahun;
        }
        if (is_string($post_jenis) && in_array($post_jenis, ['4.PENDAPATAN', '5.BELANJA', '6.PEMBIAYAAN'], true)) {
            $this->session->set_jenis = $post_jenis;
        }
        redirect('keuangan_manual/manual_apbdes');
    }

    private function finance_year_filter_data(): array
    {
        $years = array_values(array_unique(array_merge(
            $this->keuangan_manual_model->list_tahun_anggaran_manual(),
            [date('Y')]
        )));
        $years = array_values(array_filter($years, static fn ($year): bool => preg_match('/^\d{4}$/', (string) $year) === 1));
        rsort($years, SORT_NUMERIC);

        $requestedYear = $this->is_rab_year_context()
            ? $this->input->get('tahun', true)
            : $this->input->get('tahun_anggaran', true);
        if (! is_scalar($requestedYear) || preg_match('/^\d{4}$/', (string) $requestedYear) !== 1
            || (int) $requestedYear < 2000 || (int) $requestedYear > 2200) {
            $requestedYear = $this->is_rab_year_context() ? null : $this->input->get('tahun', true);
        }
        $sessionYear = $this->session->set_tahun ?? null;
        if (is_scalar($requestedYear) && preg_match('/^\d{4}$/', (string) $requestedYear) === 1
            && (int) $requestedYear >= 2000 && (int) $requestedYear <= 2200) {
            $year = (string) $requestedYear;
        } elseif (is_scalar($sessionYear) && preg_match('/^\d{4}$/', (string) $sessionYear) === 1
            && (int) $sessionYear >= 2000 && (int) $sessionYear <= 2200) {
            $year = (string) $sessionYear;
        } else {
            $year = (string) ($years[0] ?? date('Y'));
        }

        if (! in_array($year, array_map('strval', $years), true)) {
            $years[] = $year;
            rsort($years, SORT_NUMERIC);
        }
        $this->session->set_tahun = $year;

        return [
            'finance_years' => array_map('strval', $years),
            'finance_year' => $year,
        ];
    }

    private function finance_rab_year_filter_data(): array
    {
        $nextYear = (int) date('Y') + 1;
        $years = array_values(array_unique(array_merge(
            $this->keuangan_manual_model->list_tahun_rab(),
            [$nextYear]
        )));
        $years = array_values(array_filter($years, static fn ($year): bool => preg_match('/^\d{4}$/', (string) $year) === 1));
        rsort($years, SORT_NUMERIC);

        $requestedYear = $this->input->get('tahun_anggaran', true);
        $sessionYear = $this->session->set_tahun_rab ?? null;
        if (is_scalar($requestedYear) && preg_match('/^\d{4}$/', (string) $requestedYear) === 1
            && (int) $requestedYear >= 2000 && (int) $requestedYear <= 2200) {
            $year = (string) $requestedYear;
        } elseif (is_scalar($sessionYear) && preg_match('/^\d{4}$/', (string) $sessionYear) === 1
            && (int) $sessionYear >= 2000 && (int) $sessionYear <= 2200) {
            $year = (string) $sessionYear;
        } else {
            $year = (string) $nextYear;
        }

        if (! in_array($year, array_map('strval', $years), true)) {
            $years[] = $year;
            rsort($years, SORT_NUMERIC);
        }
        $this->session->set_tahun_rab = $year;

        return [
            'finance_years' => array_map('strval', $years),
            'finance_year' => $year,
        ];
    }

    private function current_finance_year_filter_data(): array
    {
        return $this->is_rab_year_context()
            ? $this->finance_rab_year_filter_data()
            : $this->finance_year_filter_data();
    }

    private function is_rab_year_context(): bool
    {
        return in_array($this->router->fetch_method(), ['anggaran_rab', 'rincian_rab'], true);
    }

    private function add_finance_year_filter(array &$data): void
    {
        $yearFilter = $this->current_finance_year_filter_data();
        $data['finance_filter_years'] = $yearFilter['finance_years'];
        $data['finance_filter_year'] = $yearFilter['finance_year'];
        $data['finance_filter_query'] = is_array($this->input->get()) ? $this->input->get() : [];
        $data['finance_filter_action'] = current_url();
    }

    private function respond_json(array $data, int $status = 200): void
    {
        if ($this->input->method() === 'post') {
            $data['csrf_name'] = $this->security->get_csrf_token_name();
            $data['csrf_value'] = $this->security->get_csrf_hash();
        }

        $this->output
            ->set_status_header($status)
            ->set_content_type('application/json')
            ->set_output(json_encode($data, JSON_THROW_ON_ERROR));
    }

    private function validation($post = []): array
    {
        return [
            'Tahun'           => bilangan($post['Tahun']),
            'Kd_Akun'         => $this->security->xss_clean($post['Kd_Akun']),
            'Kd_Keg'          => $this->security->xss_clean($post['Kd_Keg']),
            'Kd_Rincian'      => $this->security->xss_clean($post['Kd_Rincian']),
            'Nilai_Anggaran'  => ltrim(bilangan_titik($post['Nilai_Anggaran']), '0') ?: '0.00',
            'Nilai_Realisasi' => ltrim(bilangan_titik($post['Nilai_Realisasi']), '0') ?: '0.00',
        ];
    }
}
