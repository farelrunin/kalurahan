<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026111203 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasColumn('keuangan_manual_rab_kuitansi', 'spp_item_id')) {
            DB::statement('ALTER TABLE keuangan_manual_rab_kuitansi ADD COLUMN spp_item_id BIGINT UNSIGNED NULL AFTER spp_id');
        }
        if (! Schema::hasColumn('keuangan_manual_rab_kuitansi', 'sebagai_pembayaran')) {
            DB::statement('ALTER TABLE keuangan_manual_rab_kuitansi ADD COLUMN sebagai_pembayaran VARCHAR(500) NULL AFTER penerima');
        }

        $indexes = DB::select("SHOW INDEX FROM keuangan_manual_rab_kuitansi WHERE Key_name IN ('rab_kuitansi_spp_unique', 'rab_kuitansi_spp_idx', 'rab_kuitansi_spp_item_unique')");
        $indexNames = array_unique(array_map(static fn (object $index): string => (string) $index->Key_name, $indexes));
        if (in_array('rab_kuitansi_spp_unique', $indexNames, true)) {
            DB::statement('ALTER TABLE keuangan_manual_rab_kuitansi DROP INDEX rab_kuitansi_spp_unique');
        }
        if (! in_array('rab_kuitansi_spp_idx', $indexNames, true)) {
            DB::statement('ALTER TABLE keuangan_manual_rab_kuitansi ADD INDEX rab_kuitansi_spp_idx (config_id, spp_id)');
        }
        if (! in_array('rab_kuitansi_spp_item_unique', $indexNames, true)) {
            DB::statement('ALTER TABLE keuangan_manual_rab_kuitansi ADD UNIQUE KEY rab_kuitansi_spp_item_unique (spp_item_id)');
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
