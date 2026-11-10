<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110885 extends MY_model
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
                $financeId = DB::table('setting_modul')->insertGetId([
                    'config_id' => $configId,
                    'modul' => 'Keuangan',
                    'slug' => 'keuangan',
                    'url' => '',
                    'aktif' => 1,
                    'ikon' => 'fa-balance-scale',
                    'urut' => 80,
                    'level' => 2,
                    'hidden' => 0,
                    'ikon_kecil' => 'fa-balance-scale',
                    'parent' => 0,
                ]);
            }

            $financeGroups = DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['operator', 'kaur-keuangan'])
                ->get(['id', 'slug']);
            foreach ($financeGroups as $group) {
                if (! DB::table('grup_akses')
                    ->where('config_id', $configId)
                    ->where('id_grup', $group->id)
                    ->where('id_modul', $financeId)
                    ->exists()) {
                    DB::table('grup_akses')->insert([
                        'config_id' => $configId,
                        'id_grup' => $group->id,
                        'id_modul' => $financeId,
                        'akses' => 0,
                    ]);
                }
            }

            $financeGroups = DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['operator', 'kaur-keuangan'])
                ->pluck('id');
            foreach ($financeGroups as $groupId) {
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
