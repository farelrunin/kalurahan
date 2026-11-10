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
        ];
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
                unset($item['id']);
                $item['updated_at'] = $now;
                if ($itemId > 0) {
                    if (! isset($existingById[$itemId])) {
                        throw new InvalidArgumentException('ID item bukan bagian dari anggaran ini.');
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
                }
            }

            $removedIds = array_values(array_diff(array_keys($existingById), $submittedIds));
            if ($removedIds !== []) {
                if ('perubahan' === $data['tahap']) {
                    $this->config_id()->where('rab_id', $id)->where_in('id', $removedIds)
                        ->update('keuangan_manual_rab_item', ['dihapus' => 1, 'updated_at' => $now]);
                } else {
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
            ->select('keterangan, volume, satuan, harga_satuan, sumber_dana')
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
                $this->db->insert('keuangan_manual_rab_item', $item + [
                    'config_id' => $this->config_id,
                    'rab_id' => $newId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
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
                    rab.rekening_nama, rab.bidang_kode, rab.sub_bidang, rab.kegiatan, rab.output,
                    rab.klasifikasi_belanja, rab.bulan_mulai, rab.bulan_selesai,
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
