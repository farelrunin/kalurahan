<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110887 extends MY_model
{
    public function up(): bool
    {
        $groups = [
            'parameter-keuangan' => [
                'name' => 'Parameter',
                'icon' => 'fa-server',
                'order' => 1,
                'items' => [
                    'param-bidang-kegiatan' => ['Bidang dan Kegiatan', 'keuangan_manual/parameter_rab', 'fa-circle-o', 1],
                    'param-rekening-apbdesa' => ['Rekening APBDesa', 'keuangan_manual/parameter_rab?jenis=rekening', 'fa-circle-o', 2],
                    'param-output-keluaran' => ['Output/Keluaran', 'keuangan_manual/parameter_rab?jenis=output', 'fa-circle-o', 3],
                    'param-pajak' => ['Pajak / Potongan', 'keuangan_manual/parameter_rab?jenis=pajak', 'fa-percent', 4],
                ],
            ],
            'anggaran-keuangan' => [
                'name' => 'Anggaran',
                'icon' => 'fa-list-alt',
                'order' => 2,
                'items' => [
                    'anggaran-pendapatan' => ['Pendapatan', 'keuangan_manual/anggaran_rab/pendapatan', 'fa-circle-o', 1],
                    'anggaran-belanja' => ['Belanja', 'keuangan_manual/anggaran_rab/belanja', 'fa-circle-o', 2],
                    'anggaran-pembiayaan' => ['Pembiayaan', 'keuangan_manual/anggaran_rab/pembiayaan', 'fa-circle-o', 3],
                ],
            ],
            'laporan-keuangan' => [
                'name' => 'Laporan',
                'icon' => 'fa-list-alt',
                'order' => 3,
                'items' => [
                    'laporan-pendapatan' => ['Pendapatan', 'keuangan_manual/laporan_rab/pendapatan', 'fa-circle-o', 1],
                    'laporan-belanja' => ['Belanja', 'keuangan_manual/laporan_rab/belanja', 'fa-circle-o', 2],
                    'laporan-pembiayaan' => ['Pembiayaan', 'keuangan_manual/laporan_rab/pembiayaan', 'fa-circle-o', 3],
                    'laporan-apbdes' => ['APBDes', 'keuangan_manual/laporan_rab/apbdes', 'fa-circle-o', 4],
                    'laporan-penjabaran-apbdes' => ['Penjabaran APBDes', 'keuangan_manual/laporan_rab/penjabaran', 'fa-circle-o', 5],
                    'laporan-apbdes-sumber-dana' => ['APBDes Per Sumber Dana', 'keuangan_manual/laporan_rab/sumber_dana', 'fa-circle-o', 6],
                    'perubahan-pendapatan' => ['Perubahan Pendapatan', 'keuangan_manual/laporan_rab/p/pendapatan', 'fa-circle-o', 7],
                    'perubahan-belanja' => ['Perubahan Belanja', 'keuangan_manual/laporan_rab/p/belanja', 'fa-circle-o', 8],
                    'perubahan-pembiayaan' => ['Perubahan Pembiayaan', 'keuangan_manual/laporan_rab/p/pembiayaan', 'fa-circle-o', 9],
                    'perubahan-apbdes' => ['Perubahan APBDes', 'keuangan_manual/laporan_rab/p/konsolidasi', 'fa-circle-o', 10],
                    'perubahan-penjabaran-apbdes' => ['Perubahan Penjabaran APBDes', 'keuangan_manual/laporan_rab/p/penjabaran', 'fa-circle-o', 11],
                    'perubahan-apbdes-sumber-dana' => ['Perubahan APBDes Per Sumber Dana', 'keuangan_manual/laporan_rab/p/sumber_dana', 'fa-circle-o', 12],
                ],
            ],
        ];

        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $financeId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'keuangan')
                ->value('id');
            if (! $financeId) {
                continue;
            }

            $groupIds = [];
            foreach ($groups as $slug => $group) {
                $groupIds[$slug] = $this->upsertMenu($configId, $slug, [
                    'modul' => $group['name'],
                    'url' => '',
                    'aktif' => 1,
                    'ikon' => $group['icon'],
                    'urut' => $group['order'],
                    'level' => 2,
                    'hidden' => 0,
                    'ikon_kecil' => $group['icon'],
                    'parent' => $financeId,
                ]);

                foreach ($group['items'] as $itemSlug => [$name, $url, $icon, $order]) {
                    $this->upsertMenu($configId, $itemSlug, [
                        'modul' => $name,
                        'url' => $url,
                        'aktif' => 1,
                        'ikon' => $icon,
                        'urut' => $order,
                        'level' => 3,
                        'hidden' => 0,
                        'ikon_kecil' => $icon,
                        'parent' => $groupIds[$slug],
                    ]);
                }
            }

            DB::table('setting_modul')
                ->where('config_id', $configId)
                ->whereIn('slug', ['input-data', 'rincian-rab', 'parameter-rab', 'laporan-rab'])
                ->update(['hidden' => 2]);

            foreach (DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['operator', 'kaur-keuangan'])
                ->get(['id', 'slug']) as $group) {
                $permission = $group->slug === 'operator' ? 3 : 7;
                foreach ($groupIds as $menuId) {
                    $this->upsertAccess($configId, (int) $group->id, $menuId, 0);
                }
                foreach ($groups as $groupSlug => $definition) {
                    foreach ($definition['items'] as $itemSlug => $_item) {
                        $itemId = DB::table('setting_modul')
                            ->where('config_id', $configId)
                            ->where('slug', $itemSlug)
                            ->value('id');
                        $this->upsertAccess($configId, (int) $group->id, (int) $itemId, $permission);
                    }
                }
            }

            $groupIdsToClear = DB::table('user_grup')
                ->where('config_id', $configId)
                ->whereIn('slug', ['administrator', 'operator', 'kaur-keuangan'])
                ->pluck('id');
            foreach ($groupIdsToClear as $groupId) {
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

    private function upsertAccess(int $configId, int $groupId, int $menuId, int $permission): void
    {
        DB::table('grup_akses')->updateOrInsert(
            [
                'config_id' => $configId,
                'id_grup' => $groupId,
                'id_modul' => $menuId,
            ],
            ['akses' => $permission]
        );
    }

    public function down(): bool
    {
        return true;
    }
}
