<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026110897 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasColumn('keuangan_manual_ref_parameter', 'satuan')) {
            Schema::table('keuangan_manual_ref_parameter', static function (Blueprint $table): void {
                $table->string('satuan', 100)->nullable()->after('nama');
            });
        }

        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $parentId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'parameter-keuangan')
                ->value('id');
            if (! $parentId) {
                continue;
            }

            $sourceId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'param-bidang-kegiatan')
                ->value('id');
            foreach ([
                'param-rekening-apbdesa' => [
                    'modul' => 'Rekening APBDesa',
                    'url' => 'keuangan_manual/parameter_rab?jenis=rekening',
                    'ikon' => 'fa-book',
                    'urut' => 2,
                ],
                'param-output-keluaran' => [
                    'modul' => 'Output/Keluaran',
                    'url' => 'keuangan_manual/parameter_rab?jenis=output',
                    'ikon' => 'fa-bullseye',
                    'urut' => 3,
                ],
            ] as $slug => $values) {
                $menuId = $this->upsertMenu($configId, $slug, [
                    'modul' => $values['modul'],
                    'url' => $values['url'],
                    'aktif' => 1,
                    'ikon' => $values['ikon'],
                    'urut' => $values['urut'],
                    'level' => 3,
                    'hidden' => 0,
                    'ikon_kecil' => $values['ikon'],
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
