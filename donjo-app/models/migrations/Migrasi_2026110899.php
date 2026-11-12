<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110899 extends MY_model
{
    public function up(): bool
    {
        DB::statement("CREATE TABLE IF NOT EXISTS keuangan_manual_ref_pajak (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            config_id INT UNSIGNED NOT NULL,
            kode VARCHAR(50) NOT NULL,
            nama VARCHAR(191) NOT NULL,
            persentase DECIMAL(7,4) NOT NULL DEFAULT 0.0000,
            aktif TINYINT(1) NOT NULL DEFAULT 0,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            UNIQUE KEY pajak_config_kode_unique (config_id, kode),
            INDEX pajak_config_aktif_idx (config_id, aktif)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        DB::statement("CREATE TABLE IF NOT EXISTS keuangan_manual_rab_item_pajak (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            config_id INT UNSIGNED NOT NULL,
            rab_item_id BIGINT UNSIGNED NOT NULL,
            pajak_id BIGINT UNSIGNED NOT NULL,
            nama_pajak VARCHAR(191) NOT NULL,
            persentase DECIMAL(7,4) NOT NULL,
            nilai_pajak DECIMAL(18,2) NOT NULL DEFAULT 0.00,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            UNIQUE KEY rab_item_pajak_unique (config_id, rab_item_id, pajak_id),
            INDEX rab_item_pajak_config_idx (config_id, rab_item_id),
            INDEX rab_item_pajak_master_idx (config_id, pajak_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        $now = date('Y-m-d H:i:s');
        $seedTaxes = [
            'PPH21' => 'PPh 21',
            'PPH22' => 'PPh 22',
            'PPH23' => 'PPh 23',
            'PPN' => 'PPN',
            'POTONGAN_LAIN' => 'Potongan Lain',
        ];
        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            foreach ($seedTaxes as $kode => $nama) {
                if (! DB::table('keuangan_manual_ref_pajak')
                    ->where('config_id', $configId)
                    ->where('kode', $kode)
                    ->exists()) {
                    DB::table('keuangan_manual_ref_pajak')->insert([
                        'config_id' => $configId,
                        'kode' => $kode,
                        'nama' => $nama,
                        'persentase' => 0,
                        'aktif' => 0,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }
            }

            $parentId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'parameter-keuangan')
                ->value('id');
            if (! $parentId) {
                continue;
            }

            $sourceId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'param-bidang-kegiatan')
                ->value('id');
            $menuId = $this->upsertMenu($configId, 'param-pajak', [
                'modul' => 'Parameter Pajak',
                'url' => 'keuangan_manual/parameter_rab?jenis=pajak',
                'aktif' => 1,
                'ikon' => 'fa-percent',
                'urut' => 4,
                'level' => 3,
                'hidden' => 0,
                'ikon_kecil' => 'fa-percent',
                'parent' => (int) $parentId,
            ]);
            if ($sourceId) {
                foreach (DB::table('grup_akses')
                    ->where('config_id', $configId)
                    ->where('id_modul', $sourceId)
                    ->get(['id_grup', 'akses']) as $access) {
                    DB::table('grup_akses')->updateOrInsert(
                        [
                            'config_id' => $configId,
                            'id_grup' => $access->id_grup,
                            'id_modul' => $menuId,
                        ],
                        ['akses' => $access->akses]
                    );
                }
            }

            foreach (DB::table('user_grup')->where('config_id', $configId)->pluck('id') as $groupId) {
                cache()->forget('akses_grup_' . $groupId);
                cache()->forget($groupId . '_admin_menu');
            }
        }

        $this->cache->hapus_cache_untuk_semua('_cache_modul');

        return true;
    }

    private function upsertMenu(int $configId, string $slug, array $values): int
    {
        $id = DB::table('setting_modul')
            ->where('config_id', $configId)
            ->where('slug', $slug)
            ->value('id');
        $values['config_id'] = $configId;
        $values['slug'] = $slug;
        if ($id) {
            DB::table('setting_modul')->where('id', $id)->update($values);

            return (int) $id;
        }

        return (int) DB::table('setting_modul')->insertGetId($values);
    }

    public function down(): bool
    {
        return true;
    }
}
