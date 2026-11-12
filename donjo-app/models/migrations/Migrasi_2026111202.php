<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026111202 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasColumn('keuangan_manual_ref_pajak', 'batas_otomatis')) {
            DB::statement('ALTER TABLE keuangan_manual_ref_pajak ADD COLUMN batas_otomatis DECIMAL(18,2) NULL DEFAULT NULL AFTER persentase');
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
