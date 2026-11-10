<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110884 extends MY_model
{
    public function up(): bool
    {
        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $financeId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'keuangan')
                ->value('id');
            if (! $financeId) {
                continue;
            }

            $menuIds = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('parent', $financeId)
                ->pluck('id');
            $affectedGroups = DB::table('grup_akses')
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

            $defaultGroups = DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['administrator', 'operator', 'redaksi', 'kontributor'])
                ->pluck('id');
            foreach ($affectedGroups->merge($defaultGroups)->unique() as $groupId) {
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
