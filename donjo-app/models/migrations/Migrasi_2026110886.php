<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110886 extends MY_model
{
    public function up(): bool
    {
        $menus = [
            'input-data' => ['Input Data', 'keuangan_manual/manual_apbdes', 'fa-keyboard-o', 1],
            'rincian-rab' => ['Rincian e-RAB', 'keuangan_manual/rincian_rab', 'fa-list-alt', 2],
            'parameter-rab' => ['Parameter Keuangan', 'keuangan_manual/parameter_rab', 'fa-gear', 3],
            'laporan-rab' => ['Laporan e-RAB', 'keuangan_manual/laporan_rab', 'fa-file-text-o', 4],
        ];

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

            $menuIds = [];
            foreach ($menus as $slug => [$name, $url, $icon, $order]) {
                $menuId = DB::table('setting_modul')
                    ->where('config_id', $configId)
                    ->where('slug', $slug)
                    ->value('id');
                $values = [
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
                ];

                if ($menuId) {
                    DB::table('setting_modul')->where('id', $menuId)->update($values);
                } else {
                    $menuId = DB::table('setting_modul')->insertGetId($values);
                }
                $menuIds[$slug] = (int) $menuId;
            }

            $groupAccess = [
                'operator' => [
                    'input-data' => 3,
                    'rincian-rab' => 3,
                    'parameter-rab' => 3,
                    'laporan-rab' => 3,
                ],
                'kaur-keuangan' => [
                    'input-data' => 7,
                    'rincian-rab' => 7,
                    'parameter-rab' => 7,
                    'laporan-rab' => 7,
                ],
            ];
            foreach ($groupAccess as $groupSlug => $permissions) {
                $groupId = DB::table('user_grup')
                    ->where('config_id', $configId)
                    ->where('slug', $groupSlug)
                    ->value('id');
                if (! $groupId) {
                    continue;
                }

                $parentAccess = DB::table('grup_akses')
                    ->where('config_id', $configId)
                    ->where('id_grup', $groupId)
                    ->where('id_modul', $financeId)
                    ->exists();
                if (! $parentAccess) {
                    DB::table('grup_akses')->insert([
                        'config_id' => $configId,
                        'id_grup' => $groupId,
                        'id_modul' => $financeId,
                        'akses' => 0,
                    ]);
                }

                foreach ($permissions as $slug => $permission) {
                    DB::table('grup_akses')->updateOrInsert(
                        [
                            'config_id' => $configId,
                            'id_grup' => $groupId,
                            'id_modul' => $menuIds[$slug],
                        ],
                        ['akses' => $permission]
                    );
                }
            }

            $groupIds = DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['administrator', 'operator', 'kaur-keuangan'])
                ->pluck('id');
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
