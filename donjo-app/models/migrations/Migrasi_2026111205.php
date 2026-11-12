<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026111205 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasColumn('keuangan_manual_rab_spp', 'nik')) {
            DB::statement('ALTER TABLE keuangan_manual_rab_spp ADD COLUMN nik VARCHAR(16) NULL AFTER alamat');
        }
        if (! Schema::hasColumn('keuangan_manual_rab_spp', 'nama_rekening_bpd')) {
            DB::statement('ALTER TABLE keuangan_manual_rab_spp ADD COLUMN nama_rekening_bpd VARCHAR(191) NULL AFTER nik');
        }
        if (! Schema::hasColumn('keuangan_manual_rab_kuitansi_item', 'pajak_snapshot')) {
            DB::statement('ALTER TABLE keuangan_manual_rab_kuitansi_item ADD COLUMN pajak_snapshot TEXT NULL AFTER jumlah_pajak');
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
