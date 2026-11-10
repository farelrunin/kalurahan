<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110895 extends MY_model
{
    public function up(): bool
    {
        foreach (DB::table('config')->pluck('id') as $configId) {
            $configId = (int) $configId;
            $fieldIds = DB::table('keuangan_manual_ref_parameter')
                ->where('config_id', $configId)
                ->where('jenis', 'bidang')
                ->pluck('id', 'kode');

            $activities = DB::table('keuangan_manual_ref_parameter')
                ->where('config_id', $configId)
                ->where('jenis', 'kegiatan')
                ->where('aktif', 1)
                ->get(['id', 'kode']);
            foreach ($activities as $activity) {
                $parts = explode('.', trim((string) $activity->kode, '.'));
                if (count($parts) < 3 || ! ctype_digit($parts[0]) || ! ctype_digit($parts[1])) {
                    continue;
                }

                $fieldCodeSuffix = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
                $fieldId = null;
                foreach ($fieldIds as $fieldCode => $candidateId) {
                    if (substr((string) $fieldCode, -2) === $fieldCodeSuffix) {
                        $fieldId = (int) $candidateId;
                        break;
                    }
                }
                if ($fieldId === null) {
                    continue;
                }

                $subCode = str_pad($parts[0], 2, '0', STR_PAD_LEFT) . '.'
                    . str_pad($parts[1], 2, '0', STR_PAD_LEFT) . '.';
                $subBidang = DB::table('keuangan_manual_ref_parameter')
                    ->where('config_id', $configId)
                    ->where('jenis', 'sub_bidang')
                    ->where('kode', $subCode)
                    ->first(['id']);
                if ($subBidang === null) {
                    $subId = DB::table('keuangan_manual_ref_parameter')->insertGetId([
                        'config_id' => $configId,
                        'jenis' => 'sub_bidang',
                        'kode' => $subCode,
                        'nama' => 'Sub Bidang ' . (int) $parts[0] . '.' . (int) $parts[1],
                        'parent_id' => $fieldId,
                        'aktif' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } else {
                    $subId = (int) $subBidang->id;
                }

                DB::table('keuangan_manual_ref_parameter')
                    ->where('id', $activity->id)
                    ->where('config_id', $configId)
                    ->update(['parent_id' => $subId, 'updated_at' => now()]);
            }

            $financeId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'keuangan')
                ->value('id');
            if (! $financeId) {
                continue;
            }

            $parameterId = $this->upsertMenu($configId, 'parameter-keuangan', [
                'modul' => 'Parameter',
                'url' => '',
                'aktif' => 1,
                'ikon' => 'fa-server',
                'urut' => 1,
                'level' => 2,
                'hidden' => 0,
                'ikon_kecil' => 'fa-server',
                'parent' => (int) $financeId,
            ]);
            $bidangMenuId = $this->upsertMenu($configId, 'param-bidang-kegiatan', [
                'modul' => 'Bidang dan Kegiatan',
                'url' => 'keuangan_manual/parameter_rab',
                'aktif' => 1,
                'ikon' => 'fa-circle-o',
                'urut' => 1,
                'level' => 3,
                'hidden' => 0,
                'ikon_kecil' => 'fa-circle-o',
                'parent' => $parameterId,
            ]);

            $oldParameterId = DB::table('setting_modul')
                ->where('config_id', $configId)
                ->where('slug', 'parameter-rab')
                ->value('id');
            if ($oldParameterId) {
                foreach (DB::table('grup_akses')
                    ->where('config_id', $configId)
                    ->where('id_modul', $oldParameterId)
                    ->get(['id_grup', 'akses']) as $access) {
                    DB::table('grup_akses')->updateOrInsert(
                        [
                            'config_id' => $configId,
                            'id_grup' => $access->id_grup,
                            'id_modul' => $bidangMenuId,
                        ],
                        ['akses' => $access->akses]
                    );
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
