<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026111206 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasColumn('keuangan_manual_rab_spp', 'nomor_rekening_bpd')) {
            DB::statement('ALTER TABLE keuangan_manual_rab_spp ADD COLUMN nomor_rekening_bpd VARCHAR(50) NULL AFTER nama_rekening_bpd');
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
