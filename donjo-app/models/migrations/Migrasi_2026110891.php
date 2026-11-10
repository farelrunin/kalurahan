<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110891 extends MY_model
{
    public function up(): bool
    {
        $groupIds = DB::table('user_grup')
            ->where('config_id', identitas('id'))
            ->pluck('id');

        foreach ($groupIds as $groupId) {
            cache()->forget($groupId . '_admin_menu');
            cache()->forget('akses_grup_' . $groupId);
        }

        $this->cache->hapus_cache_untuk_semua('_cache_modul');

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
