<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026110883 extends MY_model
{
    public function up(): bool
    {
        $this->ensureRabTables();
        $this->seedLegacyRabReferences();

        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $financeId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'keuangan')
                ->value('id');
            if (! $financeId) {
                continue;
            }

            $menus = [
                'rincian-rab' => ['Rincian e-RAB', 'keuangan_manual/rincian_rab', 'fa-list-alt', 6, 'input-data'],
                'parameter-rab' => ['Parameter Keuangan', 'keuangan_manual/parameter_rab', 'fa-gear', 7, 'input-data'],
                'laporan-rab' => ['Laporan e-RAB', 'keuangan_manual/laporan_rab', 'fa-file-text-o', 8, 'laporan-manual'],
            ];
            foreach ($menus as $slug => [$name, $url, $icon, $order, $sourceSlug]) {
                $menuId = DB::table('setting_modul')
                    ->where('config_id', $configId)
                    ->where('slug', $slug)
                    ->value('id');
                if (! $menuId) {
                    $menuId = DB::table('setting_modul')->insertGetId([
                        'config_id' => $configId,
                        'modul' => $name,
                        'slug' => $slug,
                        'url' => $url,
                        'aktif' => 1,
                        'ikon' => $icon,
                        'urut' => $order,
                        'level' => 2,
                        'hidden' => 0,
                        'ikon_kecil' => $icon,
                        'parent' => $financeId,
                    ]);
                }

                $sourceId = DB::table('setting_modul')
                    ->where('config_id', $configId)
                    ->where('slug', $sourceSlug)
                    ->value('id');
                if (! $sourceId) {
                    continue;
                }
                $accessRows = DB::table('grup_akses')
                    ->where('config_id', $configId)
                    ->where('id_modul', $sourceId)
                    ->get()
                    ->unique('id_grup');
                foreach ($accessRows as $access) {
                    if (! DB::table('grup_akses')
                        ->where('config_id', $configId)
                        ->where('id_grup', $access->id_grup)
                        ->where('id_modul', $menuId)
                        ->exists()) {
                        DB::table('grup_akses')->insert([
                            'config_id' => $configId,
                            'id_grup' => $access->id_grup,
                            'id_modul' => $menuId,
                            'akses' => $access->akses,
                        ]);
                    }
                }
            }

            $affectedGroups = DB::table('grup_akses')
                ->where('config_id', $configId)
                ->whereIn('id_modul', DB::table('setting_modul')
                    ->where('config_id', $configId)
                    ->whereIn('slug', ['input-data', 'laporan-manual', 'rincian-rab', 'parameter-rab', 'laporan-rab'])
                    ->select('id'))
                ->distinct()
                ->pluck('id_grup');
            $defaultGroups = DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['administrator', 'operator', 'redaksi', 'kontributor'])
                ->pluck('id');
            foreach ($affectedGroups->merge($defaultGroups)->unique() as $groupId) {
                cache()->forget('akses_grup_' . $groupId);
            }
            $this->cache->hapus_cache_untuk_semua('_cache_modul');

            foreach (['ADD', 'DDS', 'PAD', 'PBH', 'PBK/BMP', 'PBP', 'SDD', 'SWA', 'DLL'] as $fund) {
                if (! DB::table('keuangan_manual_ref_parameter')
                    ->where('config_id', $configId)
                    ->where('jenis', 'sumber_dana')
                    ->where('kode', $fund)
                    ->exists()) {
                    DB::table('keuangan_manual_ref_parameter')->insert([
                        'config_id' => $configId,
                        'jenis' => 'sumber_dana',
                        'kode' => $fund,
                        'nama' => $fund,
                        'parent_id' => null,
                        'aktif' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return true;
    }

    private function ensureRabTables(): void
    {
        DB::statement("CREATE TABLE IF NOT EXISTS keuangan_manual_rab (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            config_id INT UNSIGNED NOT NULL,
            tahun SMALLINT UNSIGNED NOT NULL,
            tahap VARCHAR(12) NOT NULL DEFAULT 'murni',
            jenis VARCHAR(16) NOT NULL,
            rekening_kode VARCHAR(50) NULL,
            rekening_nama VARCHAR(191) NULL,
            bidang_kode VARCHAR(50) NULL,
            sub_bidang VARCHAR(191) NULL,
            kegiatan VARCHAR(191) NULL,
            output VARCHAR(191) NULL,
            bulan_mulai TINYINT UNSIGNED NULL,
            bulan_selesai TINYINT UNSIGNED NULL,
            penerima_laki INT UNSIGNED NOT NULL DEFAULT 0,
            penerima_perempuan INT UNSIGNED NOT NULL DEFAULT 0,
            penerima_rtm INT UNSIGNED NOT NULL DEFAULT 0,
            lokasi TEXT NULL,
            target_sdgs VARCHAR(100) NULL,
            pka VARCHAR(191) NULL,
            tpk VARCHAR(191) NULL,
            klasifikasi_belanja VARCHAR(8) NULL,
            sumber_murni_id BIGINT UNSIGNED NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            INDEX rab_config_tahun_tahap_jenis_idx (config_id, tahun, tahap, jenis),
            INDEX rab_sumber_murni_idx (sumber_murni_id),
            UNIQUE KEY rab_config_source_unique (config_id, sumber_murni_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        DB::statement("CREATE TABLE IF NOT EXISTS keuangan_manual_rab_item (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            config_id INT UNSIGNED NOT NULL,
            rab_id BIGINT UNSIGNED NOT NULL,
            sumber_murni_item_id BIGINT UNSIGNED NULL,
            keterangan VARCHAR(255) NOT NULL,
            volume DECIMAL(18,4) NOT NULL DEFAULT 0,
            satuan VARCHAR(50) NULL,
            harga_satuan DECIMAL(18,2) NOT NULL DEFAULT 0,
            sumber_dana VARCHAR(50) NULL,
            volume_semula DECIMAL(18,4) NULL,
            harga_semula DECIMAL(18,2) NULL,
            dihapus TINYINT(1) NOT NULL DEFAULT 0,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            INDEX rab_item_config_parent_idx (config_id, rab_id),
            INDEX rab_item_sumber_murni_idx (sumber_murni_item_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        DB::statement("CREATE TABLE IF NOT EXISTS keuangan_manual_ref_parameter (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            config_id INT UNSIGNED NOT NULL,
            jenis VARCHAR(24) NOT NULL,
            kode VARCHAR(50) NULL,
            nama VARCHAR(191) NOT NULL,
            parent_id BIGINT UNSIGNED NULL,
            aktif TINYINT(1) NOT NULL DEFAULT 1,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            UNIQUE KEY rab_ref_config_type_code_unique (config_id, jenis, kode),
            INDEX rab_ref_config_type_name_idx (config_id, jenis, nama),
            INDEX rab_ref_parent_idx (parent_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    }

    private function seedLegacyRabReferences(): void
    {
        $now = now();
        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $fieldIds = [];

            if (Schema::hasTable('keuangan_manual_ref_bidang')) {
                foreach (DB::table('keuangan_manual_ref_bidang')->get(['Kd_Bid', 'Nama_Bidang']) as $field) {
                    $code = trim((string) $field->Kd_Bid);
                    DB::table('keuangan_manual_ref_parameter')->updateOrInsert(
                        ['config_id' => $configId, 'jenis' => 'bidang', 'kode' => $code],
                        ['nama' => trim((string) $field->Nama_Bidang), 'aktif' => 1, 'updated_at' => $now, 'created_at' => $now]
                    );
                    $fieldIds[substr($code, -2)] = DB::table('keuangan_manual_ref_parameter')
                        ->where('config_id', $configId)
                        ->where('jenis', 'bidang')
                        ->where('kode', $code)
                        ->value('id');
                }
            }

            if (Schema::hasTable('keuangan_manual_ref_kegiatan')) {
                foreach (DB::table('keuangan_manual_ref_kegiatan')->get(['ID_Keg', 'Nama_Kegiatan']) as $activity) {
                    $code = trim((string) $activity->ID_Keg);
                    $segments = explode('.', rtrim($code, '.'));
                    $parentId = $fieldIds[$segments[0] ?? ''] ?? null;
                    DB::table('keuangan_manual_ref_parameter')->updateOrInsert(
                        ['config_id' => $configId, 'jenis' => 'kegiatan', 'kode' => $code],
                        [
                            'nama' => trim((string) $activity->Nama_Kegiatan),
                            'parent_id' => $parentId,
                            'aktif' => 1,
                            'updated_at' => $now,
                            'created_at' => $now,
                        ]
                    );
                }
            }

            foreach (['keuangan_ta_kegiatan', 'keuangan_ta_rpjm_kegiatan'] as $table) {
                if (! Schema::hasTable($table)) {
                    continue;
                }

                foreach (DB::table($table)
                    ->where('config_id', $configId)
                    ->whereNotNull('Keluaran')
                    ->where('Keluaran', '<>', '')
                    ->get(['ID_Keg', 'Keluaran']) as $output) {
                    $activityCode = trim((string) $output->ID_Keg);
                    $activityId = DB::table('keuangan_manual_ref_parameter')
                        ->where('config_id', $configId)
                        ->where('jenis', 'kegiatan')
                        ->where('kode', $activityCode)
                        ->value('id');
                    $name = trim((string) $output->Keluaran);
                    if (! $activityId || $name === '') {
                        continue;
                    }

                    $exists = DB::table('keuangan_manual_ref_parameter')
                        ->where('config_id', $configId)
                        ->where('jenis', 'output')
                        ->where('parent_id', $activityId)
                        ->where('nama', $name)
                        ->exists();
                    if (! $exists) {
                        DB::table('keuangan_manual_ref_parameter')->insert([
                            'config_id' => $configId,
                            'jenis' => 'output',
                            'kode' => null,
                            'nama' => $name,
                            'parent_id' => $activityId,
                            'aktif' => 1,
                            'created_at' => $now,
                            'updated_at' => $now,
                        ]);
                    }
                }
            }

            if (Schema::hasTable('keuangan_manual_ref_rek3')) {
                foreach (DB::table('keuangan_manual_ref_rek3')
                    ->where(function ($query): void {
                        $query->where('Jenis', 'like', '4.%')
                            ->orWhere('Jenis', 'like', '5.%')
                            ->orWhere('Jenis', 'like', '6.%');
                    })
                    ->get(['Jenis', 'Nama_Jenis']) as $account) {
                    $code = trim((string) $account->Jenis);
                    DB::table('keuangan_manual_ref_parameter')->updateOrInsert(
                        ['config_id' => $configId, 'jenis' => 'rekening', 'kode' => $code],
                        [
                            'nama' => trim((string) $account->Nama_Jenis),
                            'aktif' => 1,
                            'updated_at' => $now,
                            'created_at' => $now,
                        ]
                    );
                }
            }
        }
    }

    public function down(): bool
    {
        foreach (['rincian-rab', 'parameter-rab', 'laporan-rab'] as $slug) {
            $menuIds = DB::table('setting_modul')->where('slug', $slug)->pluck('id');
            DB::table('grup_akses')->whereIn('id_modul', $menuIds)->delete();
            DB::table('setting_modul')->whereIn('id', $menuIds)->delete();
        }

        return true;
    }
}
