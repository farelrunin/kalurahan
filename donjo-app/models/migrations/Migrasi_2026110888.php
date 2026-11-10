<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110888 extends MY_model
{
    public function up(): bool
    {
        DB::table('setting_modul')
            ->where('slug', 'param-profil-kalurahan')
            ->update(['url' => 'keuangan_manual/profil_kalurahan']);

        $this->cache->hapus_cache_untuk_semua('_cache_modul');

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
