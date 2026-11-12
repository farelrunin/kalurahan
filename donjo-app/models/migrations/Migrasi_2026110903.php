<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110903 extends MY_model
{
    public function up(): bool
    {
        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $parentId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'keuangan')
                ->value('id');
            if (! $parentId) {
                continue;
            }

            $sourceId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'laporan-rab')
                ->value('id');
            $menuId = $this->upsertMenu($configId, 'laporan-anggaran-belanja', [
                'modul' => 'Laporan Anggaran Belanja',
                'url' => 'keuangan_manual/laporan_anggaran_belanja',
                'aktif' => 1,
                'ikon' => 'fa-file-text-o',
                'urut' => 5,
                'level' => 2,
                'hidden' => 0,
                'ikon_kecil' => 'fa-file-text-o',
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
