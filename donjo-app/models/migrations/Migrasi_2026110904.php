<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110904 extends MY_model
{
    public function up(): bool
    {
        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'laporan-belanja')
                ->update(['url' => 'keuangan_manual/laporan_anggaran_belanja']);

            DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'laporan-anggaran-belanja')
                ->update(['hidden' => 2]);

            foreach (DB::table('user_grup')->where('config_id', $configId)->pluck('id') as $groupId) {
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
