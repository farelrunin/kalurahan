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

use App\Models\KeuanganManualRinci;
use App\Models\KeuanganManualTemplate;

defined('BASEPATH') || exit('No direct script access allowed');

class Keuangan_manual_model extends MY_Model
{
    private string $tabel = 'keuangan_manual_rinci';

    public function list_tahun_anggaran_manual()
    {
        $data = $this->config_id()
            ->select('Tahun')
            ->order_by('Tahun DESC')
            ->group_by('Tahun')
            ->get($this->tabel)
            ->result_array();

        return array_column($data, 'Tahun');
    }

    public function list_apbdes($tahun = null)
    {
        if (! empty($tahun)) {
            $this->db->where('Tahun', $tahun);
        }

        return $this->config_id()->get($this->tabel)->result();
    }

    public function list_data_keuangan()
    {
        $filter = [
            'Kd_Akun' => $this->session->set_jenis ?? '4.PENDAPATAN',
            'Tahun'   => $this->session->set_tahun ?? null,
        ];

        return $this->config_id()->where($filter)->get($this->tabel)->result();
    }

    public function list_tahun_pendapatan_manual(): array
    {
        return array_column(
            $this->config_id()
                ->distinct()
                ->select('Tahun AS tahun')
                ->where('Kd_Akun', '4.PENDAPATAN')
                ->order_by('Tahun', 'DESC')
                ->get($this->tabel)
                ->result_array(),
            'tahun'
        );
    }

    public function list_pendapatan_manual(?string $tahun = null): array
    {
        $query = $this->config_id()
            ->where('Kd_Akun', '4.PENDAPATAN')
            ->order_by('Kd_Rincian');

        if ($tahun !== null && ctype_digit($tahun)) {
            $query->where('Tahun', $tahun);
        }

        return $query->get($this->tabel)->result_array();
    }

    public function list_tahun_pembiayaan_manual(): array
    {
        return array_column(
            $this->config_id()
                ->distinct()
                ->select('Tahun AS tahun')
                ->where('Kd_Akun', '6.PEMBIAYAAN')
                ->order_by('Tahun', 'DESC')
                ->get($this->tabel)
                ->result_array(),
            'tahun'
        );
    }

    public function list_pembiayaan_manual(?string $tahun = null): array
    {
        $query = $this->config_id()
            ->where('Kd_Akun', '6.PEMBIAYAAN')
            ->order_by('Kd_Rincian');

        if ($tahun !== null && ctype_digit($tahun)) {
            $query->where('Tahun', $tahun);
        }

        return $query->get($this->tabel)->result_array();
    }

    public function list_rab_referensi(): array
    {
        $reference = function (string $type): array {
            return $this->db->select('id, kode, nama, parent_id')
                ->where('config_id', $this->config_id)
                ->where('jenis', $type)
                ->where('aktif', 1)
                ->order_by('kode')
                ->get('keuangan_manual_ref_parameter')
                ->result_array();
        };

        return [
            'bidang' => $reference('bidang'),
            'sub_bidang' => $reference('sub_bidang'),
            'kegiatan' => $reference('kegiatan'),
            'rekening' => $reference('rekening'),
            'output' => $reference('output'),
            'sumber_dana' => $reference('sumber_dana'),
            'pajak' => $this->list_rab_pajak(true),
        ];
    }

    public function list_laporan_rekening_hierarki(): array
    {
        return [
            'akun' => $this->db->order_by('Akun')
                ->get('keuangan_manual_ref_rek1')
                ->result_array(),
            'kelompok' => $this->db->order_by('Kelompok')
                ->get('keuangan_manual_ref_rek2')
                ->result_array(),
            'jenis' => $this->db->order_by('Jenis')
                ->get('keuangan_manual_ref_rek3')
                ->result_array(),
        ];
    }

    public function impor_rab_murni(array $payload, bool $dryRun = false): array
    {
        $normalizeAccountCode = static function (string $code): string {
            $parts = explode('.', trim($code, ". \t\n\r\0\x0B"));
            if ($parts === [] || count($parts) > 10) {
                throw new InvalidArgumentException('Kode rekening impor tidak valid.');
            }
            foreach ($parts as $part) {
                if (! ctype_digit($part)) {
                    throw new InvalidArgumentException('Kode rekening impor tidak valid.');
                }
            }

            return implode('.', $parts) . '.';
        };
        $normalizeActivityCode = static function (string $code): string {
            $parts = explode('.', trim($code, ". \t\n\r\0\x0B"));
            if (count($parts) !== 3) {
                throw new InvalidArgumentException('Kode kegiatan impor tidak valid.');
            }
            foreach ($parts as &$part) {
                if (! ctype_digit($part)) {
                    throw new InvalidArgumentException('Kode kegiatan impor tidak valid.');
                }
                $part = str_pad((string) (int) $part, 2, '0', STR_PAD_LEFT);
            }
            unset($part);

            return implode('.', $parts) . '.';
        };
        $normalizeSubBidangCode = static function (string $code): string {
            $parts = explode('.', trim($code, ". \t\n\r\0\x0B"));
            if (count($parts) !== 2) {
                throw new InvalidArgumentException('Kode sub bidang impor tidak valid.');
            }
            foreach ($parts as &$part) {
                if (! ctype_digit($part)) {
                    throw new InvalidArgumentException('Kode sub bidang impor tidak valid.');
                }
                $part = str_pad((string) (int) $part, 2, '0', STR_PAD_LEFT);
            }
            unset($part);

            return implode('.', $parts) . '.';
        };
        $cleanImportedText = function (string $value): string {
            $placeholder = '__RAB_LITERAL_PERCENT__';
            while (strpos($value, $placeholder) !== false) {
                $placeholder .= '_';
            }

            return str_replace(
                $placeholder,
                '%',
                $this->security->xss_clean(str_replace('%', $placeholder, $value))
            );
        };
        $year = (int) ($payload['tahun'] ?? 0);
        if ($year !== 2027
            || ! is_array($payload['rekening'] ?? null) || ! array_is_list($payload['rekening'])
            || ! is_array($payload['sumber_dana'] ?? null) || ! array_is_list($payload['sumber_dana'])
            || ! is_array($payload['kegiatan'] ?? null) || ! array_is_list($payload['kegiatan'])
            || ! is_array($payload['rabs'] ?? null) || ! array_is_list($payload['rabs'])
            || count($payload['rekening']) > 2000 || count($payload['sumber_dana']) > 100
            || count($payload['kegiatan']) > 1000
            || count($payload['rabs']) > 2000) {
            throw new InvalidArgumentException('Struktur impor Murni 2027 tidak valid.');
        }

        $accounts = [];
        foreach ($payload['rekening'] as $account) {
            if (! is_array($account) || ! is_scalar($account['kode'] ?? null) || ! is_scalar($account['nama'] ?? null)) {
                throw new InvalidArgumentException('Referensi rekening impor tidak valid.');
            }
            $code = $normalizeAccountCode((string) $account['kode']);
            $name = trim($cleanImportedText((string) $account['nama']));
            if (! in_array(substr($code, 0, 1), ['4', '5', '6'], true) || $name === '' || mb_strlen($name) > 191) {
                throw new InvalidArgumentException('Referensi rekening impor tidak valid: ' . $code);
            }
            if (isset($accounts[$code]) && $accounts[$code]['nama'] !== $name) {
                throw new InvalidArgumentException('Nama rekening impor ganda tidak konsisten: ' . $code);
            }
            $accounts[$code] = ['kode' => $code, 'nama' => $name];
        }

        $funds = [];
        foreach ($payload['sumber_dana'] as $fund) {
            if (! is_array($fund) || ! is_scalar($fund['kode'] ?? null)) {
                throw new InvalidArgumentException('Referensi sumber dana impor tidak valid.');
            }
            $code = strtoupper(trim((string) $fund['kode']));
            if (! preg_match('/^[A-Z0-9\/_-]{1,50}$/', $code)) {
                throw new InvalidArgumentException('Kode sumber dana impor tidak valid.');
            }
            $funds[$code] = $code;
        }

        $existingAccounts = $this->config_id()
            ->where('jenis', 'rekening')
            ->get('keuangan_manual_ref_parameter')
            ->result_array();
        $existingAccountsByCode = [];
        foreach ($existingAccounts as $account) {
            try {
                $existingAccountsByCode[$normalizeAccountCode((string) $account['kode'])] = $account;
            } catch (InvalidArgumentException) {
                continue;
            }
        }
        $existingFunds = $this->config_id()
            ->where('jenis', 'sumber_dana')
            ->get('keuangan_manual_ref_parameter')
            ->result_array();
        $existingFundsByCode = [];
        foreach ($existingFunds as $fund) {
            $existingFundsByCode[strtoupper((string) $fund['kode'])] = $fund;
        }

        $activities = $this->config_id()
            ->where('jenis', 'kegiatan')
            ->where('aktif', 1)
            ->get('keuangan_manual_ref_parameter')
            ->result_array();
        $subBidangRows = $this->config_id()
            ->where('jenis', 'sub_bidang')
            ->where('aktif', 1)
            ->get('keuangan_manual_ref_parameter')
            ->result_array();
        $bidangRows = $this->config_id()
            ->where('jenis', 'bidang')
            ->where('aktif', 1)
            ->get('keuangan_manual_ref_parameter')
            ->result_array();
        $activitiesByCode = [];
        foreach ($activities as $activity) {
            try {
                $activitiesByCode[$normalizeActivityCode((string) $activity['kode'])] = $activity;
            } catch (InvalidArgumentException) {
                continue;
            }
        }
        $subBidangById = [];
        foreach ($subBidangRows as $subBidang) {
            $subBidangById[(int) $subBidang['id']] = $subBidang;
        }
        $bidangById = [];
        foreach ($bidangRows as $bidang) {
            $bidangById[(int) $bidang['id']] = $bidang;
        }

        $subBidangByCode = [];
        foreach ($subBidangRows as $subBidang) {
            try {
                $subBidangByCode[$normalizeSubBidangCode((string) $subBidang['kode'])] = $subBidang;
            } catch (InvalidArgumentException) {
                continue;
            }
        }
        $sourceActivities = [];
        $activitiesToAdd = [];
        $activityNameMismatches = 0;
        foreach ($payload['kegiatan'] as $sourceActivity) {
            if (! is_array($sourceActivity) || ! is_scalar($sourceActivity['kode'] ?? null)
                || ! is_scalar($sourceActivity['nama'] ?? null)) {
                throw new InvalidArgumentException('Referensi kegiatan impor tidak valid.');
            }
            $code = $normalizeActivityCode((string) $sourceActivity['kode']);
            $name = trim($cleanImportedText((string) $sourceActivity['nama']));
            if ($name === '' || mb_strlen($name) > 191) {
                throw new InvalidArgumentException('Nama kegiatan impor tidak valid: ' . $code);
            }
            if (isset($sourceActivities[$code]) && $sourceActivities[$code]['nama'] !== $name) {
                throw new InvalidArgumentException('Nama kegiatan impor ganda tidak konsisten: ' . $code);
            }
            $sourceActivities[$code] = ['kode' => $code, 'nama' => $name];
            $existingActivity = $activitiesByCode[$code] ?? null;
            $subCode = $normalizeSubBidangCode(implode('.', array_slice(explode('.', rtrim($code, '.')), 0, 2)) . '.');
            $subBidang = $subBidangByCode[$subCode] ?? null;
            if ($subBidang === null) {
                throw new InvalidArgumentException('Sub bidang kegiatan tidak ditemukan pada referensi lokal: ' . $subCode);
            }
            if ($existingActivity === null) {
                $activitiesToAdd[$code] = [
                    'kode' => $code,
                    'nama' => $name,
                    'parent_id' => (int) $subBidang['id'],
                ];
            } else {
                if ((int) $existingActivity['parent_id'] !== (int) $subBidang['id']) {
                    throw new InvalidArgumentException('Kegiatan impor memiliki induk yang berbeda dari referensi lokal: ' . $code);
                }
                if (trim((string) $existingActivity['nama']) !== $name) {
                    ++$activityNameMismatches;
                }
            }
        }

        $positionTypes = [
            'pendapatan' => '4',
            'belanja' => '5',
            'pembiayaan' => '6',
        ];
        $records = [];
        $recordKeys = [];
        $totals = ['pendapatan' => 0.0, 'belanja' => 0.0, 'pembiayaan' => 0.0];
        $itemCount = 0;
        foreach ($payload['rabs'] as $record) {
            if (! is_array($record) || ! is_scalar($record['jenis'] ?? null)
                || ! is_scalar($record['rekening_kode'] ?? null)
                || ! is_array($record['items'] ?? null) || ! array_is_list($record['items'])
                || count($record['items']) < 1 || count($record['items']) > 500) {
                throw new InvalidArgumentException('Kelompok anggaran impor tidak valid.');
            }
            $type = (string) $record['jenis'];
            if (! isset($positionTypes[$type])) {
                throw new InvalidArgumentException('Pos anggaran impor tidak valid.');
            }
            $accountCode = $normalizeAccountCode((string) $record['rekening_kode']);
            if (substr($accountCode, 0, 1) !== $positionTypes[$type] || ! isset($accounts[$accountCode])) {
                throw new InvalidArgumentException('Rekening kelompok anggaran tidak cocok dengan pos: ' . $accountCode);
            }

            $activity = $subBidang = $bidang = null;
            if ($type === 'belanja') {
                if (! is_scalar($record['kegiatan_kode'] ?? null) || ! is_scalar($record['waktu_pelaksanaan'] ?? null)) {
                    throw new InvalidArgumentException('Kegiatan atau waktu pelaksanaan belanja tidak valid.');
                }
                $activityCode = $normalizeActivityCode((string) $record['kegiatan_kode']);
                $activity = $activitiesByCode[$activityCode] ?? null;
                $subBidang = $activity !== null ? ($subBidangById[(int) $activity['parent_id']] ?? null) : null;
                $bidang = $subBidang !== null ? ($bidangById[(int) $subBidang['parent_id']] ?? null) : null;
                if ($activity === null && isset($activitiesToAdd[$activityCode])) {
                    $activity = $activitiesToAdd[$activityCode];
                    $subBidang = $subBidangById[(int) $activity['parent_id']] ?? null;
                    $bidang = $subBidang !== null ? ($bidangById[(int) $subBidang['parent_id']] ?? null) : null;
                }
                if ($activity === null || $subBidang === null || $bidang === null) {
                    throw new InvalidArgumentException('Kegiatan impor tidak ditemukan pada referensi lokal: ' . $activityCode);
                }
                if (! isset($sourceActivities[$activityCode])) {
                    throw new InvalidArgumentException('Nama kegiatan sumber tidak tersedia: ' . $activityCode);
                }
                $duration = trim($cleanImportedText((string) $record['waktu_pelaksanaan']));
                if ($duration === '' || mb_strlen($duration) > 100) {
                    throw new InvalidArgumentException('Waktu pelaksanaan belanja harus berisi maksimal 100 karakter.');
                }
            } else {
                $activityCode = '';
                $duration = null;
            }

            $output = is_scalar($record['output'] ?? null)
                ? trim($cleanImportedText((string) $record['output']))
                : '';
            if (mb_strlen($output) > 191) {
                throw new InvalidArgumentException('Output anggaran impor melebihi 191 karakter.');
            }
            $recordKey = implode('|', [$type, $accountCode, $activityCode, $output, $duration ?? '']);
            if (isset($recordKeys[$recordKey])) {
                throw new InvalidArgumentException('Kelompok anggaran impor berulang: ' . $accountCode);
            }
            $recordKeys[$recordKey] = true;

            $items = [];
            foreach ($record['items'] as $item) {
                if (! is_array($item)
                    || ! is_scalar($item['keterangan'] ?? null)
                    || ! is_scalar($item['volume'] ?? null)
                    || ! is_scalar($item['harga_satuan'] ?? null)
                    || ! is_scalar($item['jumlah_sumber'] ?? null)
                    || ! is_scalar($item['sumber_dana'] ?? null)
                    || ! is_scalar($item['satuan'] ?? '')) {
                    throw new InvalidArgumentException('Rincian item impor tidak valid.');
                }
                $description = trim($cleanImportedText((string) $item['keterangan']));
                $volume = trim((string) $item['volume']);
                $unit = trim($cleanImportedText((string) ($item['satuan'] ?? '')));
                $price = trim((string) $item['harga_satuan']);
                $sourceAmount = trim((string) $item['jumlah_sumber']);
                $fundCode = strtoupper(trim((string) $item['sumber_dana']));
                if ($description === '' || mb_strlen($description) > 255
                    || ! preg_match('/^\d{1,14}(?:\.\d{1,4})?$/', $volume)
                    || ! preg_match('/^\d{1,16}(?:\.\d{1,2})?$/', $price)
                    || ! preg_match('/^\d{1,16}(?:\.\d{1,2})?$/', $sourceAmount)
                    || ($unit !== '' && mb_strlen($unit) > 50)
                    || ! isset($funds[$fundCode])) {
                    throw new InvalidArgumentException('Isi rincian, volume, harga, atau sumber dana tidak valid.');
                }
                if (round((float) $volume * (float) $price, 2, PHP_ROUND_HALF_UP)
                    !== round((float) $sourceAmount, 2, PHP_ROUND_HALF_UP)) {
                    throw new InvalidArgumentException('Volume x harga tidak sama dengan jumlah sumber pada item: ' . $description);
                }

                $amount = (float) $sourceAmount;
                $totals[$type] += $amount;
                $items[] = [
                    'keterangan' => $description,
                    'volume' => $volume,
                    'satuan' => $unit === '' ? null : $unit,
                    'harga_satuan' => $price,
                    'sumber_dana' => $fundCode,
                ];
                ++$itemCount;
            }

            $existingAccount = $existingAccountsByCode[$accountCode] ?? null;
            $records[] = [
                'jenis' => $type,
                'rekening_kode' => $accountCode,
                'rekening_nama' => $existingAccount !== null && trim((string) $existingAccount['nama']) !== ''
                    ? $existingAccount['nama']
                    : $accounts[$accountCode]['nama'],
                'bidang_kode' => $bidang['kode'] ?? null,
                'sub_bidang' => $subBidang['kode'] ?? null,
                'kegiatan' => $activity['nama'] ?? null,
                'kegiatan_sumber' => isset($record['kegiatan_kode'])
                    ? ($sourceActivities[$activityCode]['nama'] ?? null)
                    : null,
                'output' => $output === '' ? null : $output,
                'waktu_pelaksanaan' => $duration,
                'items' => $items,
            ];
        }
        if ($records === []) {
            throw new InvalidArgumentException('Tidak ada kelompok anggaran yang dapat diimpor.');
        }

        if ($this->config_id()->where('tahun', $year)->count_all_results('keuangan_manual_rab') > 0) {
            throw new InvalidArgumentException('Data e-RAB tahun 2027 sudah ada; impor dibatalkan agar tidak membuat duplikasi.');
        }

        $accountsToAdd = 0;
        $accountsToActivate = 0;
        foreach ($accounts as $code => $_account) {
            if (! isset($existingAccountsByCode[$code])) {
                ++$accountsToAdd;
            } elseif ((int) $existingAccountsByCode[$code]['aktif'] !== 1) {
                ++$accountsToActivate;
            }
        }
        $fundsToAdd = 0;
        $fundsToActivate = 0;
        foreach ($funds as $code => $_fund) {
            if (! isset($existingFundsByCode[$code])) {
                ++$fundsToAdd;
            } elseif ((int) $existingFundsByCode[$code]['aktif'] !== 1) {
                ++$fundsToActivate;
            }
        }
        $summary = [
            'dry_run' => $dryRun,
            'tahun' => $year,
            'kelompok' => count($records),
            'rincian' => $itemCount,
            'kegiatan_ditambahkan' => count($activitiesToAdd),
            'nama_kegiatan_berbeda' => $activityNameMismatches,
            'rekening_ditambahkan' => $accountsToAdd,
            'rekening_diaktifkan' => $accountsToActivate,
            'sumber_dana_ditambahkan' => $fundsToAdd,
            'sumber_dana_diaktifkan' => $fundsToActivate,
            'total' => array_map(static fn (float $amount): string => number_format($amount, 2, '.', ''), $totals),
        ];
        if ($dryRun) {
            return $summary;
        }

        $this->db->trans_begin();
        try {
            if ($this->config_id()->where('tahun', $year)->count_all_results('keuangan_manual_rab') > 0) {
                throw new InvalidArgumentException('Data e-RAB tahun 2027 sudah ada; impor dibatalkan.');
            }
            $now = date('Y-m-d H:i:s');
            foreach ($accounts as $code => $account) {
                if (! isset($existingAccountsByCode[$code])) {
                    $this->db->insert('keuangan_manual_ref_parameter', [
                        'config_id' => $this->config_id,
                        'jenis' => 'rekening',
                        'kode' => $code,
                        'nama' => $account['nama'],
                        'aktif' => 1,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                } elseif ((int) $existingAccountsByCode[$code]['aktif'] !== 1) {
                    $this->config_id()->where('jenis', 'rekening')->where('kode', $code)
                        ->update(['aktif' => 1, 'updated_at' => $now]);
                }
            }
            foreach ($funds as $code) {
                if (! isset($existingFundsByCode[$code])) {
                    $this->db->insert('keuangan_manual_ref_parameter', [
                        'config_id' => $this->config_id,
                        'jenis' => 'sumber_dana',
                        'kode' => $code,
                        'nama' => $code,
                        'aktif' => 1,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                } elseif ((int) $existingFundsByCode[$code]['aktif'] !== 1) {
                    $this->config_id()->where('jenis', 'sumber_dana')->where('kode', $code)
                        ->update(['aktif' => 1, 'updated_at' => $now]);
                }
            }
            foreach ($activitiesToAdd as $activity) {
                $this->db->insert('keuangan_manual_ref_parameter', [
                    'config_id' => $this->config_id,
                    'jenis' => 'kegiatan',
                    'kode' => $activity['kode'],
                    'nama' => $activity['nama'],
                    'parent_id' => $activity['parent_id'],
                    'aktif' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            foreach ($records as $record) {
                $isExpense = $record['jenis'] === 'belanja';
                $this->db->insert('keuangan_manual_rab', [
                    'config_id' => $this->config_id,
                    'tahun' => $year,
                    'tahap' => 'murni',
                    'jenis' => $record['jenis'],
                    'rekening_kode' => $record['rekening_kode'],
                    'rekening_nama' => $record['rekening_nama'],
                    'bidang_kode' => $record['bidang_kode'],
                    'sub_bidang' => $record['sub_bidang'],
                    'kegiatan' => $record['kegiatan'],
                    'kegiatan_sumber' => $record['kegiatan_sumber'],
                    'output' => $record['output'],
                    'bulan_mulai' => null,
                    'bulan_selesai' => null,
                    'waktu_pelaksanaan' => $record['waktu_pelaksanaan'],
                    'penerima_laki' => 0,
                    'penerima_perempuan' => 0,
                    'penerima_rtm' => 0,
                    'klasifikasi_belanja' => $isExpense ? substr($record['rekening_kode'], 0, 3) : null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
                $rabId = (int) $this->db->insert_id();
                if ($rabId < 1) {
                    throw new RuntimeException('Gagal membuat header e-RAB.');
                }
                foreach ($record['items'] as $item) {
                    $this->db->insert('keuangan_manual_rab_item', [
                        'config_id' => $this->config_id,
                        'rab_id' => $rabId,
                        'keterangan' => $item['keterangan'],
                        'volume' => $item['volume'],
                        'satuan' => $item['satuan'],
                        'harga_satuan' => $item['harga_satuan'],
                        'sumber_dana' => $item['sumber_dana'],
                        'dihapus' => 0,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Gagal menyimpan data impor e-RAB.');
            }
            $this->db->trans_commit();
        } catch (InvalidArgumentException $error) {
            $this->db->trans_rollback();

            throw $error;
        } catch (Throwable $error) {
            $dbError = $this->db->error();
            $this->db->trans_rollback();
            $errorMessage = trim((string) ($dbError['message'] ?? ''));
            log_message('error', 'Gagal menyimpan impor e-RAB Murni 2027: ' . ($errorMessage !== '' ? $errorMessage : $error->getMessage()));

            throw new RuntimeException('Transaksi impor e-RAB gagal dan telah dibatalkan.', 0, $error);
        }

        $summary['dry_run'] = false;

        return $summary;
    }

    public function list_rab_pajak(bool $aktifOnly = false): array
    {
        $query = $this->config_id()->order_by('kode');
        if ($aktifOnly) {
            $query->where('aktif', 1);
        }

        return $query->get('keuangan_manual_ref_pajak')->result_array();
    }

    public function simpan_rab_pajak(array $data, int $id = 0): int|false
    {
        $kode = strtoupper(trim((string) ($data['kode'] ?? '')));
        $nama = trim((string) ($data['nama'] ?? ''));
        $persentase = trim((string) ($data['persentase'] ?? ''));
        if (! preg_match('/^[A-Z0-9_-]{1,50}$/', $kode)
            || $nama === ''
            || mb_strlen($nama) > 191
            || ! preg_match('/^\d{1,3}(?:\.\d{1,4})?$/', $persentase)
            || (float) $persentase > 100) {
            return false;
        }

        if ($id > 0 && $this->config_id()->where('id', $id)->count_all_results('keuangan_manual_ref_pajak') !== 1) {
            return false;
        }

        if ($id > 0 && empty($data['aktif'])
            && $this->config_id()->where('pajak_id', $id)->count_all_results('keuangan_manual_rab_item_pajak') > 0) {
            return false;
        }

        $duplicate = $this->config_id()->where('kode', $kode);
        if ($id > 0) {
            $duplicate->where('id !=', $id);
        }
        if ($duplicate->count_all_results('keuangan_manual_ref_pajak') > 0) {
            return false;
        }

        $values = [
            'kode' => $kode,
            'nama' => $nama,
            'persentase' => $persentase,
            'aktif' => (int) ! empty($data['aktif']),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if ($id > 0) {
            return $this->config_id()->where('id', $id)->update('keuangan_manual_ref_pajak', $values)
                ? $id
                : false;
        }

        $values['config_id'] = $this->config_id;
        $values['created_at'] = $values['updated_at'];
        if (! $this->db->insert('keuangan_manual_ref_pajak', $values)) {
            return false;
        }

        return (int) $this->db->insert_id();
    }

    public function hapus_rab_pajak(int $id): bool
    {
        if ($id < 1 || $this->config_id()->where('pajak_id', $id)->count_all_results('keuangan_manual_rab_item_pajak') > 0) {
            return false;
        }

        return $this->config_id()->where('id', $id)->delete('keuangan_manual_ref_pajak');
    }

    public function list_tahun_rab(): array
    {
        $tahun_lama = $this->config_id()
            ->select('Tahun AS tahun')
            ->group_by('Tahun')
            ->get($this->tabel)
            ->result_array();
        $tahun_rab = $this->config_id()
            ->select('tahun')
            ->group_by('tahun')
            ->get('keuangan_manual_rab')
            ->result_array();
        $tahun = array_unique(array_merge(
            array_column($tahun_lama, 'tahun'),
            array_column($tahun_rab, 'tahun')
        ));
        rsort($tahun, SORT_NUMERIC);

        return $tahun;
    }

    public function list_rab_manual(array $filter = []): array
    {
        $references = $this->list_rab_referensi();
        $where      = ['rab.config_id = ?'];
        $parameters = [$this->config_id];
        $columns    = [
            'tahun'      => 'rab.tahun',
            'tahap'      => 'rab.tahap',
            'kd_bidang'  => 'rab.bidang_kode',
            'kd_kegiatan' => 'rab.kegiatan',
        ];

        foreach ($columns as $key => $column) {
            if (isset($filter[$key]) && $filter[$key] !== '') {
                $value = $filter[$key];
                if ('tahap' === $key) {
                    $value = strtolower($value);
                } elseif ('kd_kegiatan' === $key) {
                    $activity = $this->find_reference($references['kegiatan'], 'kode', $value);
                    $value    = $activity['nama'] ?? '';
                }
                $where[]    = "$column = ?";
                $parameters[] = $value;
            }
        }

        if (! empty($filter['pos'])) {
            $types = ['4.PENDAPATAN' => 'pendapatan', '5.BELANJA' => 'belanja', '6.PEMBIAYAAN' => 'pembiayaan'];
            $where[] = 'rab.jenis = ?';
            $parameters[] = $types[$filter['pos']] ?? '';
        }

        if (! empty($filter['kd_sub_bidang'])) {
            $activities = array_filter($references['kegiatan'], static function (array $activity) use ($filter): bool {
                $parts = explode('.', rtrim((string) $activity['kode'], '.'));

                return count($parts) >= 2 && $parts[0] . '.' . $parts[1] === $filter['kd_sub_bidang'];
            });
            $names = array_values(array_unique(array_column($activities, 'nama')));
            if ($names === []) {
                return [];
            }
            $where[] = 'rab.kegiatan IN (' . implode(',', array_fill(0, count($names), '?')) . ')';
            $parameters = array_merge($parameters, $names);
        }

        $sql = 'SELECT rab.*,
                    COALESCE(SUM(CASE WHEN item.dihapus = 0 THEN item.volume * item.harga_satuan ELSE 0 END), 0) AS nilai_menjadi,
                    COALESCE(SUM(CASE WHEN rab.tahap = \'perubahan\'
                        THEN COALESCE(item.volume_semula, 0) * COALESCE(item.harga_semula, 0)
                        ELSE CASE WHEN item.dihapus = 0 THEN item.volume * item.harga_satuan ELSE 0 END END), 0) AS nilai_semula
                FROM keuangan_manual_rab AS rab
                LEFT JOIN keuangan_manual_rab_item AS item
                    ON item.rab_id = rab.id AND item.config_id = rab.config_id
                WHERE ' . implode(' AND ', $where) . '
                GROUP BY rab.id
                ORDER BY rab.tahun DESC, rab.jenis, rab.id DESC';
        $rows = $this->db->query($sql, $parameters)->result_array();

        foreach ($rows as &$row) {
            $this->map_rab_row($row, $references);
        }
        unset($row);

        return $rows;
    }

    public function get_rab_manual(int $id): ?array
    {
        $rab = $this->config_id()
            ->where('id', $id)
            ->get('keuangan_manual_rab')
            ->row_array();

        if (empty($rab)) {
            return null;
        }

        $items = $this->config_id()
            ->select('id, keterangan, volume, satuan, harga_satuan, sumber_dana, volume_semula, harga_semula, dihapus')
            ->where('rab_id', $id)
            ->order_by('id')
            ->get('keuangan_manual_rab_item')
            ->result_array();

        $rab['rincian'] = array_values(array_filter($items, static fn (array $item): bool => 0 === (int) $item['dihapus']));
        if ($rab['rincian'] !== []) {
            $itemIds = array_column($rab['rincian'], 'id');
            $taxRows = $this->config_id()
                ->where_in('rab_item_id', $itemIds)
                ->order_by('id')
                ->get('keuangan_manual_rab_item_pajak')
                ->result_array();
            $taxesByItem = [];
            foreach ($taxRows as $taxRow) {
                $taxesByItem[(int) $taxRow['rab_item_id']][] = $taxRow;
            }
            foreach ($rab['rincian'] as &$item) {
                $item['pajak'] = $taxesByItem[(int) $item['id']] ?? [];
            }
            unset($item);
        }
        $rab['perbandingan'] = [];
        foreach ($items as $item) {
            $semula = 'perubahan' === $rab['tahap']
                ? (float) ($item['volume_semula'] ?? 0) * (float) ($item['harga_semula'] ?? 0)
                : (float) $item['volume'] * (float) $item['harga_satuan'];
            $menjadi = 0 === (int) $item['dihapus']
                ? (float) $item['volume'] * (float) $item['harga_satuan']
                : 0;
            $rab['perbandingan'][] = [
                'keterangan' => $item['keterangan'],
                'jumlah_semula' => $semula,
                'jumlah_menjadi' => $menjadi,
                'selisih' => $menjadi - $semula,
            ];
        }

        $references = $this->list_rab_referensi();
        $this->map_rab_row($rab, $references);

        return $rab;
    }

    public function simpan_rab_manual(array $data, array $rincian): int|false
    {
        $id = (int) ($data['id'] ?? 0);
        unset($data['id']);
        $existing = $id > 0
            ? $this->config_id()->where('id', $id)->get('keuangan_manual_rab')->row_array()
            : null;

        if ($id > 0 && empty($existing)) {
            return false;
        }

        $this->db->trans_begin();
        try {
            $now = date('Y-m-d H:i:s');
            $existingItems = [];
            if ($existing) {
                if ((int) $existing['tahun'] !== (int) $data['tahun']
                    || $existing['tahap'] !== $data['tahap']
                    || $existing['jenis'] !== $data['jenis']) {
                    throw new InvalidArgumentException('Tahun, tahap, dan jenis anggaran tidak dapat diubah.');
                }
                $existingItems = $this->config_id()
                    ->where('rab_id', $id)
                    ->where('dihapus', 0)
                    ->get('keuangan_manual_rab_item')
                    ->result_array();
                $existingItemIds = array_map('intval', array_column($existingItems, 'id'));
                $committedByItem = [];
                if ($existingItemIds !== []) {
                    $commitments = $this->db
                        ->select('detail.rab_item_id, SUM(detail.jumlah_bruto) AS terpakai')
                        ->from('keuangan_manual_rab_spp_item detail')
                        ->join(
                            'keuangan_manual_rab_spp spp',
                            'spp.id = detail.spp_id AND spp.config_id = detail.config_id',
                            'inner'
                        )
                        ->where('detail.config_id', $this->config_id)
                        ->where_in('detail.rab_item_id', $existingItemIds)
                        ->where('spp.status !=', 'batal')
                        ->group_by('detail.rab_item_id')
                        ->get()
                        ->result_array();
                    foreach ($commitments as $commitment) {
                        $committedByItem[(int) $commitment['rab_item_id']] = (float) $commitment['terpakai'];
                    }
                }
                $this->config_id()->where('id', $id)->update('keuangan_manual_rab', $data + ['updated_at' => $now]);
            } else {
                $data['config_id'] = $this->config_id;
                $data['created_at'] = $now;
                $data['updated_at'] = $now;
                $this->db->insert('keuangan_manual_rab', $data);
                $id = (int) $this->db->insert_id();
            }

            $existingById = [];
            foreach ($existingItems as $item) {
                $existingById[(int) $item['id']] = true;
            }
            $submittedIds = [];
            foreach ($rincian as $item) {
                $itemId = (int) ($item['id'] ?? 0);
                $pajakIds = $item['pajak_ids'] ?? [];
                unset($item['id'], $item['pajak_ids']);
                $item['updated_at'] = $now;
                if ($itemId > 0) {
                    if (! isset($existingById[$itemId])) {
                        throw new InvalidArgumentException('ID item bukan bagian dari anggaran ini.');
                    }
                    $newBudget = round((float) $item['volume'] * (float) $item['harga_satuan'], 2, PHP_ROUND_HALF_UP);
                    if (round($committedByItem[$itemId] ?? 0, 2, PHP_ROUND_HALF_UP) > $newBudget) {
                        throw new InvalidArgumentException('Pagu item tidak dapat dikurangi di bawah nilai SPP yang masih aktif: ' . $item['keterangan']);
                    }
                    $submittedIds[] = $itemId;
                    $this->config_id()
                        ->where('id', $itemId)
                        ->where('rab_id', $id)
                        ->update('keuangan_manual_rab_item', $item);
                } else {
                    $item['config_id'] = $this->config_id;
                    $item['rab_id'] = $id;
                    $item['created_at'] = $now;
                    $this->db->insert('keuangan_manual_rab_item', $item);
                    $itemId = (int) $this->db->insert_id();
                }
                $this->sync_rab_item_pajak(
                    $itemId,
                    $pajakIds,
                    (string) $item['volume'],
                    (string) $item['harga_satuan'],
                    $data['jenis'],
                    $now
                );
            }

            $removedIds = array_values(array_diff(array_keys($existingById), $submittedIds));
            if ($removedIds !== []) {
                if ($this->config_id()->where_in('rab_item_id', $removedIds)->count_all_results('keuangan_manual_rab_spp_item') > 0) {
                    throw new InvalidArgumentException('Rincian yang sudah digunakan pada SPP tidak dapat dihapus.');
                }
                if ('perubahan' === $data['tahap']) {
                    $this->config_id()->where('rab_id', $id)->where_in('id', $removedIds)
                        ->update('keuangan_manual_rab_item', ['dihapus' => 1, 'updated_at' => $now]);
                } else {
                    $this->config_id()->where_in('rab_item_id', $removedIds)
                        ->delete('keuangan_manual_rab_item_pajak');
                    $this->config_id()->where('rab_id', $id)->where_in('id', $removedIds)
                        ->delete('keuangan_manual_rab_item');
                }
            }

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Gagal menyimpan rincian e-RAB.');
            }
            $this->db->trans_commit();
        } catch (InvalidArgumentException $error) {
            $this->db->trans_rollback();

            throw $error;
        } catch (Throwable $error) {
            $dbError = $this->db->error();
            $this->db->trans_rollback();
            $errorMessage = trim((string) ($dbError['message'] ?? ''));
            log_message('error', 'Gagal menyimpan rincian e-RAB: ' . ($errorMessage !== '' ? $errorMessage : $error->getMessage()));

            return false;
        }

        return $id;
    }

    public function salin_rab_perubahan(int $id): int|false
    {
        $sumber = $this->config_id()
            ->where('id', $id)
            ->where('tahap', 'murni')
            ->get('keuangan_manual_rab')
            ->row_array();

        if (empty($sumber)) {
            return false;
        }

        if ($this->config_id()->where('sumber_murni_id', $id)->get('keuangan_manual_rab')->num_rows() > 0) {
            return false;
        }

        $rincian = $this->config_id()
            ->select('id, keterangan, volume, satuan, harga_satuan, sumber_dana')
            ->where('rab_id', $id)
            ->where('dihapus', 0)
            ->get('keuangan_manual_rab_item')
            ->result_array();

        $this->db->trans_begin();
        try {
            $now = date('Y-m-d H:i:s');
            unset($sumber['id'], $sumber['created_at'], $sumber['updated_at']);
            $sumber['tahap'] = 'perubahan';
            $sumber['sumber_murni_id'] = $id;
            $sumber['created_at'] = $now;
            $sumber['updated_at'] = $now;
            $this->db->insert('keuangan_manual_rab', $sumber);
            $idPerubahan = (int) $this->db->insert_id();

            foreach ($rincian as $item) {
                $this->db->insert('keuangan_manual_rab_item', [
                    'config_id' => $this->config_id,
                    'rab_id' => $idPerubahan,
                    'sumber_murni_item_id' => $item['id'],
                    'keterangan' => $item['keterangan'],
                    'volume' => $item['volume'],
                    'satuan' => $item['satuan'],
                    'harga_satuan' => $item['harga_satuan'],
                    'sumber_dana' => $item['sumber_dana'],
                    'volume_semula' => $item['volume'],
                    'harga_semula' => $item['harga_satuan'],
                    'dihapus' => 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
                $newItemId = (int) $this->db->insert_id();
                $this->copy_rab_item_pajak((int) $item['id'], $newItemId, $now);
            }

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Gagal menyalin anggaran ke P-APBDes.');
            }
            $this->db->trans_commit();
        } catch (Throwable $error) {
            $dbError = $this->db->error();
            $this->db->trans_rollback();
            log_message('error', 'Gagal menyalin anggaran ke P-APBDes: ' . ($dbError['message'] ?? $error->getMessage()));

            return false;
        }

        return $idPerubahan;
    }

    private function sync_rab_item_pajak(
        int $itemId,
        array $pajakIds,
        string $volume,
        string $hargaSatuan,
        string $jenis,
        string $now
    ): void {
        if ($jenis !== 'belanja' && $pajakIds !== []) {
            throw new InvalidArgumentException('Pajak hanya dapat diterapkan pada rincian belanja.');
        }

        $pajakIds = array_map('intval', $pajakIds);
        if (count($pajakIds) !== count(array_unique($pajakIds)) || in_array(0, $pajakIds, true)) {
            throw new InvalidArgumentException('Pilihan pajak tidak valid.');
        }

        $existing = $this->config_id()
            ->where('rab_item_id', $itemId)
            ->get('keuangan_manual_rab_item_pajak')
            ->result_array();
        $existingById = [];
        foreach ($existing as $tax) {
            $existingById[(int) $tax['pajak_id']] = $tax;
        }

        $masters = [];
        if ($pajakIds !== []) {
            $masters = $this->config_id()
                ->where_in('id', $pajakIds)
                ->where('aktif', 1)
                ->get('keuangan_manual_ref_pajak')
                ->result_array();
            if (count($masters) !== count($pajakIds)) {
                throw new InvalidArgumentException('Salah satu jenis pajak tidak ditemukan atau tidak aktif.');
            }
        }

        $totalRate = 0.0;
        foreach ($masters as $master) {
            $taxId = (int) $master['id'];
            $snapshot = $existingById[$taxId] ?? $master;
            $rate = (float) $snapshot['persentase'];
            $totalRate += $rate;
        }
        if ($totalRate > 100) {
            throw new InvalidArgumentException('Jumlah persentase pajak pada satu item tidak boleh melebihi 100%.');
        }

        $this->config_id()
            ->where('rab_item_id', $itemId)
            ->delete('keuangan_manual_rab_item_pajak');
        foreach ($masters as $master) {
            $taxId = (int) $master['id'];
            $snapshot = $existingById[$taxId] ?? $master;
            $rate = (float) $snapshot['persentase'];
            $amount = round((float) $volume * (float) $hargaSatuan * $rate / 100, 2, PHP_ROUND_HALF_UP);
            $this->db->insert('keuangan_manual_rab_item_pajak', [
                'config_id' => $this->config_id,
                'rab_item_id' => $itemId,
                'pajak_id' => $taxId,
                'nama_pajak' => $snapshot['nama_pajak'] ?? $snapshot['nama'],
                'persentase' => $snapshot['persentase'],
                'nilai_pajak' => number_format($amount, 2, '.', ''),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    private function copy_rab_item_pajak(int $sourceItemId, int $targetItemId, string $now): void
    {
        $sourceTaxes = $this->config_id()
            ->where('rab_item_id', $sourceItemId)
            ->get('keuangan_manual_rab_item_pajak')
            ->result_array();
        foreach ($sourceTaxes as $tax) {
            unset($tax['id'], $tax['rab_item_id'], $tax['config_id'], $tax['created_at'], $tax['updated_at']);
            $tax['config_id'] = $this->config_id;
            $tax['rab_item_id'] = $targetItemId;
            $tax['created_at'] = $now;
            $tax['updated_at'] = $now;
            $this->db->insert('keuangan_manual_rab_item_pajak', $tax);
        }
    }

    public function salin_rab_tahun_lalu(int $id, int $tahun, string $jenis = 'belanja'): int|false
    {
        $sumber = $this->config_id()
            ->where('id', $id)
            ->where('tahap', 'murni')
            ->where('jenis', $jenis)
            ->get('keuangan_manual_rab')
            ->row_array();

        if (empty($sumber) || (int) $sumber['tahun'] >= $tahun) {
            return false;
        }

        $rincian = $this->config_id()
            ->select('id, keterangan, volume, satuan, harga_satuan, sumber_dana')
            ->where('rab_id', $id)
            ->where('dihapus', 0)
            ->get('keuangan_manual_rab_item')
            ->result_array();

        $this->db->trans_begin();
        try {
            $now = date('Y-m-d H:i:s');
            unset($sumber['id'], $sumber['created_at'], $sumber['updated_at']);
            $sumber['tahun'] = $tahun;
            $sumber['tahap'] = 'murni';
            $sumber['sumber_murni_id'] = null;
            $sumber['created_at'] = $now;
            $sumber['updated_at'] = $now;
            $this->db->insert('keuangan_manual_rab', $sumber);
            $newId = (int) $this->db->insert_id();

            foreach ($rincian as $item) {
                $sourceItemId = (int) $item['id'];
                unset($item['id']);
                $this->db->insert('keuangan_manual_rab_item', $item + [
                    'config_id' => $this->config_id,
                    'rab_id' => $newId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
                $this->copy_rab_item_pajak($sourceItemId, (int) $this->db->insert_id(), $now);
            }

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Gagal mengimpor anggaran tahun lalu.');
            }
            $this->db->trans_commit();
        } catch (Throwable $error) {
            $dbError = $this->db->error();
            $this->db->trans_rollback();
            log_message('error', 'Gagal mengimpor e-RAB tahun lalu: ' . ($dbError['message'] ?? $error->getMessage()));

            return false;
        }

        return $newId;
    }

    public function hapus_rab_manual(int $id): bool
    {
        if ($this->config_id()->where('sumber_murni_id', $id)->count_all_results('keuangan_manual_rab') > 0) {
            return false;
        }
        $this->db->trans_begin();
        $itemIds = array_column(
            $this->config_id()
                ->select('id')
                ->where('rab_id', $id)
                ->get('keuangan_manual_rab_item')
                ->result_array(),
            'id'
        );
        if ($itemIds !== []
            && $this->config_id()->where_in('rab_item_id', $itemIds)->count_all_results('keuangan_manual_rab_spp_item') > 0) {
            $this->db->trans_rollback();

            return false;
        }
        if ($itemIds !== []) {
            $this->config_id()
                ->where_in('rab_item_id', $itemIds)
                ->delete('keuangan_manual_rab_item_pajak');
        }
        $this->config_id()->where('rab_id', $id)->delete('keuangan_manual_rab_item');
        $this->config_id()->where('id', $id)->delete('keuangan_manual_rab');
        $deleted = $this->db->affected_rows() > 0;
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();

            return false;
        }
        $this->db->trans_commit();

        return $deleted;
    }

    public function list_rab_spp(int $tahun, string $tahap): array
    {
        $rows = $this->config_id()
            ->where('tahun', $tahun)
            ->where('tahap', $tahap)
            ->order_by('tanggal_spp', 'DESC')
            ->order_by('id', 'DESC')
            ->get('keuangan_manual_rab_spp')
            ->result_array();
        if ($rows === []) {
            return [];
        }

        $sppIds = array_map('intval', array_column($rows, 'id'));
        $counts = $this->config_id()
            ->select('spp_id, COUNT(*) AS jumlah_item')
            ->where_in('spp_id', $sppIds)
            ->group_by('spp_id')
            ->get('keuangan_manual_rab_spp_item')
            ->result_array();
        $countsById = [];
        foreach ($counts as $count) {
            $countsById[(int) $count['spp_id']] = (int) $count['jumlah_item'];
        }
        $receipts = $this->config_id()
            ->where_in('spp_id', $sppIds)
            ->get('keuangan_manual_rab_kuitansi')
            ->result_array();
        $receiptsById = [];
        foreach ($receipts as $receipt) {
            $receiptsById[(int) $receipt['spp_id']] = $receipt;
        }
        foreach ($rows as &$row) {
            $row['jumlah_item'] = $countsById[(int) $row['id']] ?? 0;
            $receipt = $receiptsById[(int) $row['id']] ?? [];
            $row['nomor_kuitansi'] = $receipt['nomor_kuitansi'] ?? null;
            $row['tanggal_bayar'] = $receipt['tanggal_bayar'] ?? null;
            $row['jumlah_dibayar'] = $receipt['jumlah_dibayar'] ?? null;
            $row['selisih_bayar'] = $receipt['selisih_bayar'] ?? null;
        }
        unset($row);

        return $rows;
    }

    public function list_rab_spp_sources(int $tahun, string $tahap, int $excludeSppId = 0): array
    {
        if (! in_array($tahap, ['murni', 'perubahan'], true)) {
            return [];
        }

        $rows = $this->db
            ->select('rab.id AS rab_id, rab.tahun, rab.tahap, rab.rekening_kode, rab.rekening_nama, rab.kegiatan, item.id AS rab_item_id, item.keterangan, item.volume, item.satuan, item.harga_satuan, item.sumber_dana')
            ->from('keuangan_manual_rab rab')
            ->join(
                'keuangan_manual_rab_item item',
                'item.rab_id = rab.id AND item.config_id = rab.config_id',
                'inner'
            )
            ->where('rab.config_id', $this->config_id)
            ->where('rab.jenis', 'belanja')
            ->where('rab.tahun', $tahun)
            ->where('rab.tahap', $tahap)
            ->where('item.dihapus', 0)
            ->order_by('rab.rekening_kode')
            ->order_by('rab.id')
            ->order_by('item.id')
            ->get()
            ->result_array();

        if ($rows === []) {
            return [];
        }

        $itemIds = array_map('intval', array_column($rows, 'rab_item_id'));
        $taxRows = $this->config_id()
            ->where_in('rab_item_id', $itemIds)
            ->order_by('id')
            ->get('keuangan_manual_rab_item_pajak')
            ->result_array();
        $taxesByItem = [];
        foreach ($taxRows as $tax) {
            $taxesByItem[(int) $tax['rab_item_id']][] = $tax;
        }

        $commitmentQuery = $this->db
            ->select('detail.rab_item_id, SUM(detail.jumlah_bruto) AS terpakai')
            ->from('keuangan_manual_rab_spp_item detail')
            ->join(
                'keuangan_manual_rab_spp spp',
                'spp.id = detail.spp_id AND spp.config_id = detail.config_id',
                'inner'
            )
            ->where('detail.config_id', $this->config_id)
            ->where_in('detail.rab_item_id', $itemIds)
            ->where('spp.status !=', 'batal');
        if ($excludeSppId > 0) {
            $commitmentQuery->where('spp.id !=', $excludeSppId);
        }
        $commitments = $commitmentQuery
            ->group_by('detail.rab_item_id')
            ->get()
            ->result_array();
        $usedByItem = [];
        foreach ($commitments as $commitment) {
            $usedByItem[(int) $commitment['rab_item_id']] = (float) $commitment['terpakai'];
        }

        foreach ($rows as &$row) {
            $itemId = (int) $row['rab_item_id'];
            $budget = round((float) $row['volume'] * (float) $row['harga_satuan'], 2, PHP_ROUND_HALF_UP);
            $used = round($usedByItem[$itemId] ?? 0, 2, PHP_ROUND_HALF_UP);
            $row['jumlah_anggaran'] = $budget;
            $row['terpakai'] = $used;
            $row['tersedia'] = max(0, round($budget - $used, 2));
            $row['pajak'] = $taxesByItem[$itemId] ?? [];
        }
        unset($row);

        return $rows;
    }

    public function get_rab_spp(int $id): ?array
    {
        $spp = $this->db
            ->select('spp.*, kuitansi.id AS kuitansi_id, kuitansi.nomor_kuitansi, kuitansi.tanggal_bayar, kuitansi.penerima AS penerima_kuitansi, kuitansi.alamat AS alamat_kuitansi, kuitansi.npwp AS npwp_kuitansi, kuitansi.jumlah_dibayar, kuitansi.selisih_bayar')
            ->from('keuangan_manual_rab_spp spp')
            ->join(
                'keuangan_manual_rab_kuitansi kuitansi',
                'kuitansi.spp_id = spp.id AND kuitansi.config_id = spp.config_id',
                'left'
            )
            ->where('spp.config_id', $this->config_id)
            ->where('spp.id', $id)
            ->get()
            ->row_array();
        if (empty($spp)) {
            return null;
        }

        $spp['rincian'] = $this->config_id()
            ->select('id, rab_id, rab_item_id, keterangan, jumlah_bruto')
            ->where('spp_id', $id)
            ->order_by('id')
            ->get('keuangan_manual_rab_spp_item')
            ->result_array();
        $itemIds = array_column($spp['rincian'], 'id');
        $taxRows = $itemIds === []
            ? []
            : $this->config_id()
                ->where_in('spp_item_id', $itemIds)
                ->order_by('id')
                ->get('keuangan_manual_rab_spp_item_pajak')
                ->result_array();
        $taxesByItem = [];
        foreach ($taxRows as $tax) {
            $taxesByItem[(int) $tax['spp_item_id']][] = $tax;
        }
        foreach ($spp['rincian'] as &$item) {
            $item['pajak'] = $taxesByItem[(int) $item['id']] ?? [];
        }
        unset($item);

        return $spp;
    }

    public function simpan_rab_spp(array $data, array $items, int $id = 0): int|false
    {
        $year = (int) ($data['tahun'] ?? 0);
        $stage = (string) ($data['tahap'] ?? '');
        $number = trim((string) ($data['nomor_spp'] ?? ''));
        $date = trim((string) ($data['tanggal_spp'] ?? ''));
        $type = (string) ($data['jenis_spp'] ?? '');
        $recipient = trim((string) ($data['penerima'] ?? ''));
        $address = trim((string) ($data['alamat'] ?? ''));
        $npwp = trim((string) ($data['npwp'] ?? ''));
        $purpose = trim((string) ($data['keperluan'] ?? ''));
        $status = (string) ($data['status'] ?? 'draft');
        $receiptNumber = trim((string) ($data['nomor_kuitansi'] ?? ''));
        $receiptDate = trim((string) ($data['tanggal_bayar'] ?? ''));
        $paidAmount = trim((string) ($data['jumlah_dibayar'] ?? '0'));
        $validDate = static function (string $value): bool {
            $parsed = DateTime::createFromFormat('!Y-m-d', $value);

            return $parsed !== false && $parsed->format('Y-m-d') === $value;
        };
        $moneyPattern = '/^\d{1,16}(?:\.\d{1,2})?$/';

        if ($year < 2000 || $year > 2200
            || ! in_array($stage, ['murni', 'perubahan'], true)
            || $number === '' || mb_strlen($number) > 100
            || ! $validDate($date)
            || ! in_array($type, ['LS', 'UP', 'GU', 'TU'], true)
            || $recipient === '' || mb_strlen($recipient) > 191
            || mb_strlen($address) > 255 || mb_strlen($npwp) > 30
            || $purpose === '' || mb_strlen($purpose) > 500
            || ! in_array($status, ['draft', 'diajukan', 'dibayar', 'batal'], true)
            || ! preg_match($moneyPattern, $paidAmount)
            || count($items) < 1 || count($items) > 500) {
            throw new InvalidArgumentException('Data SPP atau rincian pembayaran tidak valid.');
        }

        if ($status === 'dibayar') {
            if ($receiptNumber === '' || mb_strlen($receiptNumber) > 100
                || ! $validDate($receiptDate) || ! preg_match($moneyPattern, $paidAmount)
                || (float) $paidAmount <= 0) {
                throw new InvalidArgumentException('Nomor kuitansi, tanggal bayar, dan nilai pembayaran wajib diisi untuk SPP dibayar.');
            }
        } elseif ($status === 'batal' && $id < 1) {
            throw new InvalidArgumentException('SPP baru tidak dapat langsung dibuat dengan status batal.');
        } else {
            $paidAmount = '0';
            $receiptNumber = '';
            $receiptDate = '';
        }

        $itemAmounts = [];
        foreach ($items as $item) {
            $itemId = is_array($item) && is_scalar($item['rab_item_id'] ?? null)
                ? (int) $item['rab_item_id']
                : 0;
            $amount = is_array($item) && is_scalar($item['jumlah_bruto'] ?? null)
                ? trim((string) $item['jumlah_bruto'])
                : '';
            if ($itemId < 1 || ! preg_match($moneyPattern, $amount) || (float) $amount <= 0
                || isset($itemAmounts[$itemId])) {
                throw new InvalidArgumentException('Rincian SPP harus memilih item RAB yang unik dengan nilai bruto lebih dari nol.');
            }
            $itemAmounts[$itemId] = (float) $amount;
        }
        $itemIds = array_keys($itemAmounts);

        $existing = $id > 0
            ? $this->config_id()->where('id', $id)->get('keuangan_manual_rab_spp')->row_array()
            : null;
        if ($id > 0 && empty($existing)) {
            return false;
        }
        if ($existing && in_array($existing['status'], ['dibayar', 'batal'], true)) {
            throw new InvalidArgumentException('SPP yang sudah dibayar atau dibatalkan tidak dapat diubah.');
        }
        if ($existing && $existing['status'] === 'diajukan' && $status === 'draft') {
            throw new InvalidArgumentException('SPP yang sudah diajukan tidak dapat dikembalikan ke status draft.');
        }

        $duplicateNumberQuery = $this->db
            ->where('config_id', $this->config_id)
            ->where('tahun', $year)
            ->where('nomor_spp', $number);
        if ($id > 0) {
            $duplicateNumberQuery->where('id !=', $id);
        }
        if ($duplicateNumberQuery->count_all_results('keuangan_manual_rab_spp') > 0) {
            throw new InvalidArgumentException('Nomor SPP sudah digunakan pada tahun tersebut.');
        }

        $this->db->trans_begin();
        try {
            $placeholders = implode(',', array_fill(0, count($itemIds), '?'));
            $sourceRows = $this->db->query(
                'SELECT rab.id AS rab_id, rab.tahun, rab.tahap, item.id AS rab_item_id,
                    item.keterangan, item.volume, item.harga_satuan
                 FROM keuangan_manual_rab rab
                 INNER JOIN keuangan_manual_rab_item item
                    ON item.rab_id = rab.id AND item.config_id = rab.config_id
                 WHERE rab.config_id = ? AND item.config_id = ?
                    AND rab.tahun = ? AND rab.tahap = ? AND rab.jenis = \'belanja\'
                    AND item.dihapus = 0 AND item.id IN (' . $placeholders . ')
                 FOR UPDATE',
                array_merge([$this->config_id, $this->config_id, $year, $stage], $itemIds)
            )->result_array();
            if (count($sourceRows) !== count($itemIds)) {
                throw new InvalidArgumentException('Salah satu rincian sumber bukan belanja aktif pada tahun dan tahap yang dipilih.');
            }

            $taxRows = $this->config_id()
                ->where_in('rab_item_id', $itemIds)
                ->order_by('id')
                ->get('keuangan_manual_rab_item_pajak')
                ->result_array();
            $taxesByItem = [];
            foreach ($taxRows as $tax) {
                $taxesByItem[(int) $tax['rab_item_id']][] = $tax;
            }

            $committedQuery = $this->db
                ->select('detail.rab_item_id, SUM(detail.jumlah_bruto) AS terpakai')
                ->from('keuangan_manual_rab_spp_item detail')
                ->join(
                    'keuangan_manual_rab_spp spp',
                    'spp.id = detail.spp_id AND spp.config_id = detail.config_id',
                    'inner'
                )
                ->where('detail.config_id', $this->config_id)
                ->where_in('detail.rab_item_id', $itemIds)
                ->where('spp.status !=', 'batal');
            if ($id > 0) {
                $committedQuery->where('spp.id !=', $id);
            }
            $committed = $committedQuery
                ->group_by('detail.rab_item_id')
                ->get()
                ->result_array();
            $committedByItem = [];
            foreach ($committed as $row) {
                $committedByItem[(int) $row['rab_item_id']] = (float) $row['terpakai'];
            }

            $preparedItems = [];
            $grossTotal = 0.0;
            $taxTotal = 0.0;
            foreach ($sourceRows as $source) {
                $itemId = (int) $source['rab_item_id'];
                $amount = $itemAmounts[$itemId];
                $budget = round((float) $source['volume'] * (float) $source['harga_satuan'], 2, PHP_ROUND_HALF_UP);
                $used = $committedByItem[$itemId] ?? 0.0;
                if (round($used + $amount, 2, PHP_ROUND_HALF_UP) > $budget) {
                    throw new InvalidArgumentException('Nilai SPP melebihi sisa anggaran item: ' . $source['keterangan']);
                }

                $itemTaxes = [];
                $taxRateTotal = 0.0;
                foreach ($taxesByItem[$itemId] ?? [] as $tax) {
                    $rate = (float) $tax['persentase'];
                    if ($rate < 0 || $rate > 100) {
                        throw new InvalidArgumentException('Tarif pajak pada rincian RAB tidak valid.');
                    }
                    $taxRateTotal += $rate;
                    $taxAmount = round($amount * $rate / 100, 2, PHP_ROUND_HALF_UP);
                    $itemTaxes[] = [
                        'pajak_id' => (int) $tax['pajak_id'],
                        'nama_pajak' => (string) $tax['nama_pajak'],
                        'persentase' => number_format($rate, 4, '.', ''),
                        'nilai_pajak' => number_format($taxAmount, 2, '.', ''),
                    ];
                    $taxTotal += $taxAmount;
                }
                if ($taxRateTotal > 100) {
                    throw new InvalidArgumentException('Jumlah tarif pajak pada rincian RAB melebihi 100%.');
                }

                $preparedItems[] = [
                    'rab_id' => (int) $source['rab_id'],
                    'rab_item_id' => $itemId,
                    'keterangan' => (string) $source['keterangan'],
                    'jumlah_bruto' => number_format($amount, 2, '.', ''),
                    'pajak' => $itemTaxes,
                ];
                $grossTotal += $amount;
            }

            $netTotal = round($grossTotal - $taxTotal, 2, PHP_ROUND_HALF_UP);
            if ($status === 'dibayar') {
                $duplicateReceiptQuery = $this->db
                    ->where('config_id', $this->config_id)
                    ->where('nomor_kuitansi', $receiptNumber);
                if ($id > 0) {
                    $duplicateReceiptQuery->where('spp_id !=', $id);
                }
                if ($duplicateReceiptQuery->count_all_results('keuangan_manual_rab_kuitansi') > 0) {
                    throw new InvalidArgumentException('Nomor kuitansi sudah digunakan.');
                }
            }

            $now = date('Y-m-d H:i:s');
            $header = [
                'config_id' => $this->config_id,
                'tahun' => $year,
                'tahap' => $stage,
                'nomor_spp' => $number,
                'tanggal_spp' => $date,
                'jenis_spp' => $type,
                'penerima' => $recipient,
                'alamat' => $address === '' ? null : $address,
                'npwp' => $npwp === '' ? null : $npwp,
                'keperluan' => $purpose,
                'status' => $status,
                'jumlah_bruto' => number_format($grossTotal, 2, '.', ''),
                'jumlah_pajak' => number_format($taxTotal, 2, '.', ''),
                'jumlah_netto' => number_format($netTotal, 2, '.', ''),
                'updated_at' => $now,
            ];
            if ($id > 0) {
                $this->config_id()->where('id', $id)->update('keuangan_manual_rab_spp', $header);
                $oldItemIds = array_column(
                    $this->config_id()
                        ->select('id')
                        ->where('spp_id', $id)
                        ->get('keuangan_manual_rab_spp_item')
                        ->result_array(),
                    'id'
                );
                if ($oldItemIds !== []) {
                    $this->config_id()->where_in('spp_item_id', $oldItemIds)->delete('keuangan_manual_rab_spp_item_pajak');
                }
                $this->config_id()->where('spp_id', $id)->delete('keuangan_manual_rab_spp_item');
                $this->config_id()->where('spp_id', $id)->delete('keuangan_manual_rab_kuitansi');
            } else {
                $header['created_at'] = $now;
                $this->db->insert('keuangan_manual_rab_spp', $header);
                $id = (int) $this->db->insert_id();
            }
            if ($id < 1) {
                throw new RuntimeException('Gagal membuat SPP.');
            }

            foreach ($preparedItems as $item) {
                $itemData = [
                    'config_id' => $this->config_id,
                    'spp_id' => $id,
                    'rab_id' => $item['rab_id'],
                    'rab_item_id' => $item['rab_item_id'],
                    'keterangan' => $item['keterangan'],
                    'jumlah_bruto' => $item['jumlah_bruto'],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                if (! $this->db->insert('keuangan_manual_rab_spp_item', $itemData)) {
                    throw new RuntimeException('Gagal menyimpan rincian SPP.');
                }
                $sppItemId = (int) $this->db->insert_id();
                foreach ($item['pajak'] as $tax) {
                    if (! $this->db->insert('keuangan_manual_rab_spp_item_pajak', [
                        'config_id' => $this->config_id,
                        'spp_item_id' => $sppItemId,
                        'pajak_id' => $tax['pajak_id'],
                        'nama_pajak' => $tax['nama_pajak'],
                        'persentase' => $tax['persentase'],
                        'nilai_pajak' => $tax['nilai_pajak'],
                        'created_at' => $now,
                        'updated_at' => $now,
                    ])) {
                        throw new RuntimeException('Gagal menyimpan snapshot pajak SPP.');
                    }
                }
            }

            if ($status === 'dibayar') {
                $paid = (float) $paidAmount;
                if (! $this->db->insert('keuangan_manual_rab_kuitansi', [
                    'config_id' => $this->config_id,
                    'spp_id' => $id,
                    'tahun' => $year,
                    'nomor_kuitansi' => $receiptNumber,
                    'tanggal_bayar' => $receiptDate,
                    'penerima' => $recipient,
                    'alamat' => $address === '' ? null : $address,
                    'npwp' => $npwp === '' ? null : $npwp,
                    'jumlah_dibayar' => number_format($paid, 2, '.', ''),
                    'selisih_bayar' => number_format(round($paid - $netTotal, 2, PHP_ROUND_HALF_UP), 2, '.', ''),
                    'created_at' => $now,
                    'updated_at' => $now,
                ])) {
                    throw new RuntimeException('Gagal menyimpan data kuitansi.');
                }
            }

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Transaksi SPP gagal.');
            }
            $this->db->trans_commit();
        } catch (InvalidArgumentException $error) {
            $this->db->trans_rollback();

            throw $error;
        } catch (Throwable $error) {
            $dbError = $this->db->error();
            $this->db->trans_rollback();
            $message = trim((string) ($dbError['message'] ?? ''));
            log_message('error', 'Gagal menyimpan SPP e-RAB: ' . ($message !== '' ? $message : $error->getMessage()));

            return false;
        }

        return $id;
    }

    public function hapus_rab_spp(int $id): bool
    {
        $spp = $this->config_id()
            ->where('id', $id)
            ->get('keuangan_manual_rab_spp')
            ->row_array();
        if (empty($spp) || $spp['status'] !== 'draft') {
            return false;
        }

        $this->db->trans_begin();
        $itemIds = array_column(
            $this->config_id()
                ->select('id')
                ->where('spp_id', $id)
                ->get('keuangan_manual_rab_spp_item')
                ->result_array(),
            'id'
        );
        if ($itemIds !== []) {
            $this->config_id()
                ->where_in('spp_item_id', $itemIds)
                ->delete('keuangan_manual_rab_spp_item_pajak');
        }
        $this->config_id()->where('spp_id', $id)->delete('keuangan_manual_rab_spp_item');
        $this->config_id()->where('spp_id', $id)->delete('keuangan_manual_rab_kuitansi');
        $this->config_id()->where('id', $id)->delete('keuangan_manual_rab_spp');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();

            return false;
        }
        $this->db->trans_commit();

        return true;
    }

    private function find_reference(array $rows, string $key, string $value): ?array
    {
        foreach ($rows as $row) {
            if ((string) ($row[$key] ?? '') === $value) {
                return $row;
            }
        }

        return null;
    }

    private function map_rab_row(array &$row, array $references): void
    {
        $row['pos'] = ['pendapatan' => '4.PENDAPATAN', 'belanja' => '5.BELANJA', 'pembiayaan' => '6.PEMBIAYAAN'][$row['jenis']] ?? '';
        $row['tahap'] = 'murni' === $row['tahap'] ? 'Murni' : 'Perubahan';
        $row['kd_rekening'] = $row['rekening_kode'];
        $row['nama_rekening'] = $row['rekening_nama'];
        $row['kd_bidang'] = $row['bidang_kode'];
        $row['kd_sub_bidang'] = $row['sub_bidang'];
        $row['kd_kegiatan'] = '';
        $row['nama_kegiatan'] = $row['kegiatan'];
        $row['nama_sub_bidang'] = $row['sub_bidang'];
        $row['nama_bidang'] = '';

        foreach ($references['bidang'] as $bidang) {
            if ((string) $bidang['kode'] === (string) $row['bidang_kode']) {
                $row['nama_bidang'] = $bidang['nama'];
                break;
            }
        }
        $bidang = $this->find_reference($references['bidang'], 'kode', (string) $row['bidang_kode']);
        foreach ($references['kegiatan'] as $kegiatan) {
            $activityParts = explode('.', rtrim((string) $kegiatan['kode'], '.'));
            $matchesBidang = $bidang === null
                || (count($activityParts) > 0 && ltrim((string) $activityParts[0], '0') === ltrim(substr((string) $bidang['kode'], -2), '0'));
            if ((string) $kegiatan['nama'] === (string) $row['kegiatan'] && $matchesBidang) {
                $row['kd_kegiatan'] = $kegiatan['kode'];
                if (count($activityParts) >= 2) {
                    $row['kd_sub_bidang'] = $activityParts[0] . '.' . $activityParts[1];
                    $row['nama_sub_bidang'] = $row['kd_sub_bidang'];
                }
                break;
            }
        }
    }

    public function list_rab_parameter(array $filter = []): array
    {
        $allowedTypes = ['bidang', 'sub_bidang', 'kegiatan'];
        $query = $this->config_id('parameter')
            ->select('parameter.id, parameter.jenis, parameter.kode, parameter.nama, parameter.parent_id, parameter.aktif, parent.nama AS parent_nama', false)
            ->from('keuangan_manual_ref_parameter AS parameter')
            ->join(
                'keuangan_manual_ref_parameter AS parent',
                'parent.id = parameter.parent_id AND parent.config_id = parameter.config_id',
                'left'
            );

        if (! empty($filter['jenis']) && in_array($filter['jenis'], $allowedTypes, true)) {
            $query->where('parameter.jenis', $filter['jenis']);
        } else {
            $query->where_in('parameter.jenis', $allowedTypes);
        }
        if (! empty($filter['cari'])) {
            $query->group_start()
                ->like('parameter.kode', $filter['cari'])
                ->or_like('parameter.nama', $filter['cari'])
                ->or_like('parent.nama', $filter['cari'])
                ->group_end();
        }
        if (isset($filter['aktif']) && $filter['aktif'] !== '') {
            $query->where('parameter.aktif', (int) $filter['aktif']);
        }

        return $query->order_by('parameter.jenis')
            ->order_by('parameter.kode')
            ->get()
            ->result_array();
    }

    public function list_rab_parameter_katalog(string $jenis): array
    {
        if (! in_array($jenis, ['rekening', 'output'], true)) {
            return [];
        }

        $rows = $this->config_id('parameter')
            ->select('parameter.id, parameter.jenis, parameter.kode, parameter.nama, parameter.satuan, parameter.parent_id, parent.kode AS parent_kode, parent.nama AS parent_nama', false)
            ->from('keuangan_manual_ref_parameter AS parameter')
            ->join(
                'keuangan_manual_ref_parameter AS parent',
                "parent.id = parameter.parent_id AND parent.config_id = parameter.config_id AND parent.jenis = 'kegiatan'",
                'left'
            )
            ->where('parameter.jenis', $jenis)
            ->where('parameter.aktif', 1)
            ->order_by($jenis === 'output' ? 'parent.kode' : 'parameter.kode')
            ->order_by('parameter.kode')
            ->get()
            ->result_array();

        usort($rows, static function (array $left, array $right) use ($jenis): int {
            if ($jenis === 'output') {
                $parentComparison = strnatcmp((string) $left['parent_kode'], (string) $right['parent_kode']);
                if ($parentComparison !== 0) {
                    return $parentComparison;
                }
            }

            return strnatcmp((string) $left['kode'], (string) $right['kode']);
        });

        return $rows;
    }

    public function simpan_rab_parameter_katalog(string $jenis, array $data, int $id = 0): int|false
    {
        if (! in_array($jenis, ['rekening', 'output'], true)) {
            return false;
        }

        $kode = trim((string) ($data['kode'] ?? ''));
        $nama = trim($this->security->xss_clean((string) ($data['nama'] ?? '')));
        $satuan = trim($this->security->xss_clean((string) ($data['satuan'] ?? '')));
        $parentId = $jenis === 'output' ? (int) ($data['parent_id'] ?? 0) : 0;
        if ($jenis === 'rekening') {
            $parts = explode('.', trim($kode, '.'));
            if ($parts === [] || count($parts) > 10) {
                return false;
            }
            foreach ($parts as $part) {
                if (! ctype_digit($part)) {
                    return false;
                }
            }
            $kode = implode('.', $parts) . '.';
        } elseif (preg_match('/^\d{1,50}$/', $kode) !== 1
            || $parentId < 1
            || $this->config_id()
                ->where('id', $parentId)
                ->where('jenis', 'kegiatan')
                ->where('aktif', 1)
                ->count_all_results('keuangan_manual_ref_parameter') === 0
            || $satuan === ''
            || mb_strlen($satuan) > 100) {
            return false;
        }
        if ($kode === '' || mb_strlen($kode) > 50 || $nama === '' || mb_strlen($nama) > 191) {
            return false;
        }

        $existing = $this->config_id()
            ->where('jenis', $jenis)
            ->where('kode', $kode)
            ->where('id !=', $id)
            ->get('keuangan_manual_ref_parameter')
            ->row_array();
        if (! empty($existing)) {
            if ((int) $existing['aktif'] === 1) {
                return false;
            }
            if ($id > 0 && (int) $existing['id'] !== $id) {
                return false;
            }
            $id = (int) $existing['id'];
        }

        $values = [
            'kode' => $kode,
            'nama' => $nama,
            'parent_id' => $jenis === 'output' ? $parentId : null,
            'satuan' => $jenis === 'output' ? $satuan : null,
            'aktif' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if ($id > 0) {
            $current = $this->config_id()
                ->where('id', $id)
                ->where('jenis', $jenis)
                ->get('keuangan_manual_ref_parameter')
                ->row_array();
            if (empty($current)) {
                return false;
            }
            $this->config_id()->where('id', $id)->update('keuangan_manual_ref_parameter', $values);

            return $id;
        }

        $values += [
            'config_id' => $this->config_id,
            'jenis' => $jenis,
            'created_at' => $values['updated_at'],
        ];
        $this->db->insert('keuangan_manual_ref_parameter', $values);

        return $this->db->affected_rows() > 0 ? (int) $this->db->insert_id() : false;
    }

    public function impor_rab_parameter_katalog(string $jenis, array $rows): int
    {
        if (! in_array($jenis, ['rekening', 'output'], true)) {
            throw new InvalidArgumentException('Jenis parameter impor tidak valid.');
        }

        $normalized = [];
        $seen = [];
        $activityIds = [];
        if ($jenis === 'output') {
            $activities = $this->config_id()
                ->select('id, kode')
                ->where('jenis', 'kegiatan')
                ->where('aktif', 1)
                ->get('keuangan_manual_ref_parameter')
                ->result_array();
            $activityIds = array_column($activities, 'id', 'kode');
        }
        foreach ($rows as $index => $row) {
            $row = array_change_key_case($row, CASE_LOWER);
            if ($jenis === 'rekening') {
                $parts = explode('.', trim((string) ($row['kode'] ?? ''), '.'));
                $kode = implode('.', $parts) . '.';
                $nama = trim((string) ($row['nama'] ?? ''));
                $parentId = null;
                $satuan = null;
                $valid = $parts !== [] && count($parts) <= 10;
                foreach ($parts as $part) {
                    $valid = $valid && ctype_digit($part);
                }
            } else {
                $kode = trim((string) ($row['kode_output'] ?? ''));
                $nama = trim((string) ($row['uraian'] ?? ''));
                $activityCode = trim((string) ($row['kode_kegiatan'] ?? ''));
                $satuan = trim((string) ($row['satuan'] ?? ''));
                $parentId = (int) ($activityIds[$activityCode] ?? 0);
                $valid = preg_match('/^\d{1,50}$/', $kode) === 1
                    && $parentId > 0
                    && $satuan !== ''
                    && mb_strlen($satuan) <= 100;
            }

            if ($kode === '.' || $kode === '' || mb_strlen($kode) > 50
                || $nama === '' || mb_strlen($nama) > 191 || ! $valid) {
                throw new InvalidArgumentException('Data pada baris ' . ($index + 2) . ' tidak valid.');
            }

            $key = $jenis . ':' . $kode;
            if (isset($seen[$key])) {
                throw new InvalidArgumentException('Kode duplikat pada baris ' . ($index + 2) . ': ' . $kode);
            }
            $seen[$key] = true;
            $normalized[] = [
                'kode' => $kode,
                'nama' => trim($this->security->xss_clean($nama)),
                'parent_id' => $parentId,
                'satuan' => $satuan === null ? null : trim($this->security->xss_clean($satuan)),
            ];
            if (count($normalized) > 5000) {
                throw new InvalidArgumentException('Impor dibatasi maksimal 5.000 baris.');
            }
        }

        if ($normalized === []) {
            throw new InvalidArgumentException('Berkas tidak berisi parameter.');
        }

        $this->db->trans_begin();
        try {
            $this->config_id()
                ->where('jenis', $jenis)
                ->update('keuangan_manual_ref_parameter', [
                    'aktif' => 0,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            foreach ($normalized as $row) {
                $existing = $this->config_id()
                    ->select('id')
                    ->where('jenis', $jenis)
                    ->where('kode', $row['kode'])
                    ->get('keuangan_manual_ref_parameter')
                    ->row_array();
                $values = [
                    'nama' => $row['nama'],
                    'parent_id' => $row['parent_id'],
                    'satuan' => $row['satuan'],
                    'aktif' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                if (! empty($existing)) {
                    $this->config_id()->where('id', (int) $existing['id'])
                        ->update('keuangan_manual_ref_parameter', $values);
                } else {
                    $this->db->insert('keuangan_manual_ref_parameter', $values + [
                        'config_id' => $this->config_id,
                        'jenis' => $jenis,
                        'kode' => $row['kode'],
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                }
            }
            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Gagal menyimpan parameter hasil impor.');
            }
            $this->db->trans_commit();
        } catch (Throwable $error) {
            $this->db->trans_rollback();
            throw $error;
        }

        return count($normalized);
    }

    public function nonaktifkan_rab_parameter_katalog(string $jenis, int $id): bool
    {
        if (! in_array($jenis, ['rekening', 'output'], true)) {
            return false;
        }
        $this->config_id()
            ->where('id', $id)
            ->where('jenis', $jenis)
            ->update('keuangan_manual_ref_parameter', [
                'aktif' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return $this->db->affected_rows() > 0;
    }

    public function list_rab_parameter_parent(string $jenis): array
    {
        $parentType = ['sub_bidang' => 'bidang', 'kegiatan' => 'sub_bidang'][$jenis] ?? null;
        if ($parentType === null) {
            return [];
        }

        return $this->config_id()
            ->select('id, kode, nama')
            ->where('jenis', $parentType)
            ->where('aktif', 1)
            ->order_by('kode')
            ->get('keuangan_manual_ref_parameter')
            ->result_array();
    }

    public function simpan_rab_parameter(array $data, int $id = 0): int|false
    {
        $allowedTypes = ['bidang', 'sub_bidang', 'kegiatan'];
        if (! in_array($data['jenis'] ?? '', $allowedTypes, true)
            || trim((string) ($data['nama'] ?? '')) === '') {
            return false;
        }

        $parentType = ['sub_bidang' => 'bidang', 'kegiatan' => 'sub_bidang'][$data['jenis']] ?? null;
        $parentId = isset($data['parent_id']) && (int) $data['parent_id'] > 0 ? (int) $data['parent_id'] : null;
        if (($parentType !== null && $parentId === null) || ($parentType === null && $parentId !== null)) {
            return false;
        }
        if ($parentId !== null && $this->config_id()
            ->where('id', $parentId)
            ->where('jenis', $parentType)
            ->where('aktif', 1)
            ->count_all_results('keuangan_manual_ref_parameter') === 0) {
            return false;
        }

        $kode = trim((string) ($data['kode'] ?? ''));
        $kode = $this->format_kode_bidang_kegiatan((string) $data['jenis'], $kode);
        if ($kode === null) {
            return false;
        }
        $data = [
            'jenis' => $data['jenis'],
            'kode' => $kode,
            'nama' => trim((string) $data['nama']),
            'parent_id' => $parentId,
            'aktif' => (int) ($data['aktif'] ?? 1),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if (mb_strlen($data['nama']) > 191 || ($data['kode'] !== null && mb_strlen($data['kode']) > 50)) {
            return false;
        }

        if ($parentId !== null) {
            $parent = $this->config_id()
                ->select('kode')
                ->where('id', $parentId)
                ->get('keuangan_manual_ref_parameter')
                ->row_array();
            if (empty($parent) || ! $this->kode_parameter_sesuai_induk($data['jenis'], $kode, (string) $parent['kode'])) {
                return false;
            }
        }

        $duplicate = $this->config_id()
            ->where('jenis', $data['jenis'])
            ->where('kode', $data['kode'])
            ->where('id !=', $id)
            ->count_all_results('keuangan_manual_ref_parameter');
        if ($data['kode'] !== null && $duplicate > 0) {
            return false;
        }

        if ($id > 0) {
            $existing = $this->config_id()->where('id', $id)->get('keuangan_manual_ref_parameter')->row_array();
            if (empty($existing) || $existing['jenis'] !== $data['jenis']) {
                return false;
            }
            if ($existing['kode'] !== $data['kode']
                && $this->config_id()->where('parent_id', $id)->where('aktif', 1)
                    ->count_all_results('keuangan_manual_ref_parameter') > 0) {
                return false;
            }
            $this->config_id()->where('id', $id)->update('keuangan_manual_ref_parameter', $data);

            return $id;
        }

        $data['config_id'] = $this->config_id;
        $data['created_at'] = $data['updated_at'];
        $this->db->insert('keuangan_manual_ref_parameter', $data);

        return $this->db->affected_rows() > 0 ? (int) $this->db->insert_id() : false;
    }

    public function impor_rab_parameter(array $rows): int
    {
        $normalized = [];
        $seen = [];
        foreach ($rows as $index => $row) {
            $row = array_change_key_case($row, CASE_LOWER);
            $type = str_replace(' ', '_', trim((string) ($row['jenis'] ?? '')));
            $code = $this->format_kode_bidang_kegiatan($type, trim((string) ($row['kode'] ?? '')));
            $name = trim($this->security->xss_clean((string) ($row['nama'] ?? '')));
            $parentCode = trim((string) ($row['kode_induk'] ?? ''));
            if ($type === '' && $code === null && $name === '' && $parentCode === '') {
                continue;
            }
            if (! in_array($type, ['bidang', 'sub_bidang', 'kegiatan'], true)
                || $code === null
                || $name === ''
                || mb_strlen($name) > 191) {
                throw new InvalidArgumentException('Data pada baris ' . ($index + 2) . ' tidak valid. Periksa jenis, kode, dan nama.');
            }
            if (($type === 'bidang' && $parentCode !== '')
                || ($type !== 'bidang' && $parentCode === '')) {
                throw new InvalidArgumentException('Kode induk pada baris ' . ($index + 2) . ' tidak sesuai tingkatan.');
            }
            $parentType = ['sub_bidang' => 'bidang', 'kegiatan' => 'sub_bidang'][$type] ?? null;
            if ($parentType !== null) {
                $parentCode = $this->format_kode_bidang_kegiatan($parentType, $parentCode);
                if ($parentCode === null || ! $this->kode_parameter_sesuai_induk($type, $code, $parentCode)) {
                    throw new InvalidArgumentException('Kode induk pada baris ' . ($index + 2) . ' tidak cocok dengan kode.');
                }
            }

            $key = $type . ':' . $code;
            if (isset($seen[$key])) {
                throw new InvalidArgumentException('Kode duplikat pada baris ' . ($index + 2) . ': ' . $code);
            }
            $seen[$key] = true;
            $normalized[] = [
                'jenis' => $type,
                'kode' => $code,
                'nama' => $name,
                'kode_induk' => $parentCode,
            ];
            if (count($normalized) > 5000) {
                throw new InvalidArgumentException('Impor dibatasi maksimal 5.000 baris.');
            }
        }

        if ($normalized === []) {
            throw new InvalidArgumentException('Berkas tidak berisi baris parameter.');
        }

        $byCode = ['bidang' => [], 'sub_bidang' => []];
        $this->db->trans_begin();
        try {
            $this->config_id()
                ->where_in('jenis', ['bidang', 'sub_bidang', 'kegiatan'])
                ->update('keuangan_manual_ref_parameter', [
                    'aktif' => 0,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            foreach (['bidang', 'sub_bidang', 'kegiatan'] as $type) {
                foreach ($normalized as $row) {
                    if ($row['jenis'] !== $type) {
                        continue;
                    }

                    $parentId = null;
                    if ($type !== 'bidang') {
                        $parentType = $type === 'sub_bidang' ? 'bidang' : 'sub_bidang';
                        $parentId = $byCode[$parentType][$row['kode_induk']] ?? null;
                        if ($parentId === null) {
                            throw new InvalidArgumentException('Induk ' . $row['kode_induk'] . ' untuk ' . $row['kode'] . ' tidak ditemukan. Impor harus memuat hierarki lengkap.');
                        }
                    }

                    $existing = $this->config_id()
                        ->select('id')
                        ->where('jenis', $type)
                        ->where('kode', $row['kode'])
                        ->get('keuangan_manual_ref_parameter')
                        ->row_array();
                    $data = [
                        'nama' => $row['nama'],
                        'parent_id' => $parentId,
                        'aktif' => 1,
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    if (! empty($existing)) {
                        $this->config_id()->where('id', (int) $existing['id'])
                            ->update('keuangan_manual_ref_parameter', $data);
                        $id = (int) $existing['id'];
                    } else {
                        $data += [
                            'config_id' => $this->config_id,
                            'jenis' => $type,
                            'kode' => $row['kode'],
                            'created_at' => date('Y-m-d H:i:s'),
                        ];
                        $this->db->insert('keuangan_manual_ref_parameter', $data);
                        $id = (int) $this->db->insert_id();
                    }
                    $byCode[$type][$row['kode']] = $id;
                }
            }

            if ($this->db->trans_status() === false) {
                throw new RuntimeException('Gagal menyimpan parameter hasil impor.');
            }
            $this->db->trans_commit();
        } catch (Throwable $error) {
            $this->db->trans_rollback();
            throw $error;
        }

        return count($normalized);
    }

    public function nonaktifkan_rab_parameter(int $id): bool
    {
        if ($this->config_id()->where('parent_id', $id)->where('aktif', 1)
            ->count_all_results('keuangan_manual_ref_parameter') > 0) {
            return false;
        }

        $this->config_id()->where('id', $id)->update('keuangan_manual_ref_parameter', [
            'aktif' => 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->db->affected_rows() > 0;
    }

    private function format_kode_bidang_kegiatan(string $jenis, string $kode): ?string
    {
        $parts = explode('.', trim($kode, ". \t\n\r\0\x0B"));
        if ($jenis === 'bidang') {
            if (count($parts) === 1 && ctype_digit($parts[0])) {
                return '00.0000.' . str_pad($parts[0], 2, '0', STR_PAD_LEFT);
            }

            return preg_match('/^\d{2}\.\d{4}\.\d{2}$/', $kode) === 1 ? $kode : null;
        }

        if (! in_array($jenis, ['sub_bidang', 'kegiatan'], true)) {
            return null;
        }
        $expectedParts = $jenis === 'sub_bidang' ? 2 : 3;
        if (count($parts) !== $expectedParts) {
            return null;
        }
        foreach ($parts as $part) {
            if (! ctype_digit($part) || strlen($part) > 2) {
                return null;
            }
        }
        $formatted = array_map(static fn (string $part): string => str_pad($part, 2, '0', STR_PAD_LEFT), $parts);

        return implode('.', $formatted) . '.';
    }

    private function kode_parameter_sesuai_induk(string $jenis, string $kode, string $parentCode): bool
    {
        $codeParts = explode('.', trim($kode, '.'));
        $parentParts = explode('.', trim($parentCode, '.'));
        if ($jenis === 'sub_bidang') {
            return (int) ($codeParts[0] ?? 0) === (int) end($parentParts);
        }

        return $jenis === 'kegiatan'
            && (int) ($codeParts[0] ?? 0) === (int) ($parentParts[0] ?? 0)
            && (int) ($codeParts[1] ?? 0) === (int) ($parentParts[1] ?? 0);
    }

    public function laporan_rab(array $filter = []): array
    {
        $where = ['rab.config_id = ?'];
        $parameters = [$this->config_id];
        foreach (['tahun' => 'rab.tahun', 'tahap' => 'rab.tahap', 'jenis' => 'rab.jenis', 'bidang_kode' => 'rab.bidang_kode'] as $key => $column) {
            if (isset($filter[$key]) && $filter[$key] !== '') {
                $where[] = "$column = ?";
                $parameters[] = $filter[$key];
            }
        }
        if (isset($filter['kegiatan']) && $filter['kegiatan'] !== '') {
            $where[] = 'rab.kegiatan = ?';
            $parameters[] = $filter['kegiatan'];
        }
        if (isset($filter['sumber_dana']) && $filter['sumber_dana'] !== '') {
            $where[] = 'item.sumber_dana = ?';
            $parameters[] = $filter['sumber_dana'];
        }

        $sql = 'SELECT rab.id AS rab_id, rab.tahun, rab.tahap, rab.jenis, rab.rekening_kode,
                    rab.rekening_nama, rab.bidang_kode, rab.sub_bidang, rab.kegiatan, rab.kegiatan_sumber, rab.output,
                    rab.klasifikasi_belanja, rab.bulan_mulai, rab.bulan_selesai, rab.waktu_pelaksanaan,
                    rab.penerima_laki, rab.penerima_perempuan, rab.penerima_rtm,
                    rab.lokasi, rab.target_sdgs, rab.pka, rab.tpk, rab.data_eksisting,
                    rab.target_tahun_depan, rab.volume_rencana, rab.satuan_rencana,
                    rab.nama_paket, rab.kode_paket,
                    item.id AS item_id, item.keterangan, item.volume, item.satuan,
                    item.harga_satuan, item.sumber_dana, item.dihapus,
                    CASE WHEN rab.tahap = \'perubahan\'
                        THEN COALESCE(item.volume_semula, 0) * COALESCE(item.harga_semula, 0)
                        ELSE COALESCE(item.volume, 0) * COALESCE(item.harga_satuan, 0) END AS jumlah_semula,
                    CASE WHEN item.dihapus = 1 THEN 0
                        ELSE COALESCE(item.volume, 0) * COALESCE(item.harga_satuan, 0) END AS jumlah_menjadi
                FROM keuangan_manual_rab AS rab
                LEFT JOIN keuangan_manual_rab_item AS item
                    ON item.rab_id = rab.id AND item.config_id = rab.config_id
                WHERE ' . implode(' AND ', $where) . '
                ORDER BY rab.jenis, rab.rekening_kode, rab.bidang_kode, rab.kegiatan, rab.id, item.id';

        return $this->db->query($sql, $parameters)->result_array();
    }

    public function simpan_anggaran($data = [])
    {
        $data['config_id'] = $this->config_id;
        $output            = $this->db->insert($this->tabel, $data);

        status_sukses($output);

        return $output;
    }

    public function get_anggaran($id)
    {
        $hasil = null;
        $hsl = $this->config_id()
            ->where('id', $id)
            ->get($this->tabel);

        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = [
                    'id'              => $data->id,
                    'Tahun'           => $data->Tahun,
                    'Kd_Akun'         => $data->Kd_Akun,
                    'Kd_Keg'          => $data->Kd_Keg,
                    'Kd_Rincian'      => $data->Kd_Rincian,
                    'Nilai_Anggaran'  => $data->Nilai_Anggaran,
                    'Nilai_Realisasi' => $data->Nilai_Realisasi,
                ];
            }
        }

        return $hasil;
    }

    public function update_anggaran($id = null, $data = [])
    {
        $output = $this->config_id()
            ->where('id', $id)
            ->update($this->tabel, $data);

        status_sukses($output);

        return $output;
    }

    public function list_rek_pendapatan()
    {
        return $this->db
            ->select('*')
            ->where("Jenis LIKE '4.%'")
            ->order_by('Jenis', 'asc')
            ->get('keuangan_manual_ref_rek3')
            ->result_array();
    }

    public function list_rek_belanja()
    {
        return $this->db
            ->order_by('Kd_Bid', 'asc')
            ->get('keuangan_manual_ref_bidang')
            ->result_array();
    }

    public function list_rek_biaya()
    {
        return $this->db
            ->where("Jenis LIKE '6.%'")
            ->order_by('Jenis', 'asc')
            ->get('keuangan_manual_ref_rek3')
            ->result_array();
    }

    public function list_akun()
    {
        return $this->db
            ->where("Akun NOT LIKE '1.%'")
            ->where("Akun NOT LIKE '2.%'")
            ->where("Akun NOT LIKE '3.%'")
            ->where("Akun NOT LIKE '7.%'")
            ->order_by('Akun', 'asc')
            ->get('keuangan_manual_ref_rek1')
            ->result_array();
    }

    public function delete_input($id = ''): void
    {
        $this->config_id()
            ->where('id', $id)
            ->delete($this->tabel);

        if ($this->db->affected_rows() > 0) {
            session_success();
        } else {
            session_error('Gagal menghapus data');
        }
    }

    public function delete_all(): void
    {
        $id_cb = $this->input->post('id_cb');
        // Cek apakah ada data yang dicentang atau dipilih
        if (null !== $id_cb) {
            foreach ($id_cb as $id) {
                $this->delete_input($id);
            }
        } else {
            session_error('Tidak ada data yang dipilih');
        }
    }

    public function get_anggaran_tpl()
    {
        $hasil = null;
        $hsl = $this->db->get('keuangan_manual_rinci_tpl');

        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = [
                    'id'              => $data->id,
                    'Tahun'           => $data->Tahun,
                    'Kd_Akun'         => $data->Kd_Akun,
                    'Kd_Keg'          => $data->Kd_Keg,
                    'Kd_Rincian'      => $data->Kd_Rincian,
                    'Nilai_Anggaran'  => $data->Nilai_Anggaran,
                    'Nilai_Realisasi' => $data->Nilai_Realisasi,
                ];
            }
        }

        return $hasil;
    }

    public function salin_anggaran_tpl($thn_apbdes)
    {
        $config_id = $this->config_id;

        if (KeuanganManualRinci::where('tahun', $thn_apbdes)->exists()) {
            return false;
        }

        $result_set = KeuanganManualTemplate::get(['Kd_Akun', 'Kd_Keg', 'Kd_Rincian', 'Nilai_Anggaran', 'Nilai_Realisasi'])
            ->map(static function ($item) use ($config_id, $thn_apbdes) {
                $item->config_id = $config_id;
                $item->Tahun     = $thn_apbdes;

                return $item;
            })->toArray();

        if (KeuanganManualRinci::insert($result_set)) {
            session_success();
        } else {
            session_error('Gagal salin data');
        }

        return $result_set;
    }
}
