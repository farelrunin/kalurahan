<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110894 extends MY_model
{
    public function up(): bool
    {
        $removedSlugs = [
            'parameter-keuangan',
            'param-bidang-kegiatan',
            'param-rekening-apbdesa',
            'param-output-keluaran',
        ];

        foreach (DB::table('config')->pluck('id') as $configId) {
            $menuIds = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->whereIn('slug', $removedSlugs)
                ->pluck('id');

            if ($menuIds->isEmpty()) {
                continue;
            }

            $groupIds = DB::table('grup_akses')
                ->where('config_id', $configId)
                ->whereIn('id_modul', $menuIds)
                ->distinct()
                ->pluck('id_grup');

            DB::table('grup_akses')
                ->where('config_id', $configId)
                ->whereIn('id_modul', $menuIds)
                ->delete();
            DB::table('setting_modul')
                ->where('config_id', $configId)
                ->whereIn('id', $menuIds)
                ->delete();

            foreach ($groupIds as $groupId) {
                cache()->forget('akses_grup_' . $groupId);
                cache()->forget($groupId . '_admin_menu');
            }
        }

        $this->cache->hapus_cache_untuk_semua('_cache_modul');

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
