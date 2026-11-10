<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110890 extends MY_model
{
    public function up(): bool
    {
        $menuIds = DB::table('setting_modul')
            ->whereIn('slug', ['param-profil-kalurahan', 'param-wilayah-kalurahan'])
            ->pluck('id');

        if ($menuIds->isNotEmpty()) {
            $groupIds = DB::table('grup_akses')
                ->whereIn('id_modul', $menuIds)
                ->distinct()
                ->pluck('id_grup');
            DB::table('grup_akses')->whereIn('id_modul', $menuIds)->delete();
            DB::table('setting_modul')->whereIn('id', $menuIds)->delete();

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
