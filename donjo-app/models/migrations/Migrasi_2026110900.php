<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110900 extends MY_model
{
    public function up(): bool
    {
        DB::table('keuangan_manual_ref_parameter')
            ->where('jenis', 'rekening')
            ->where('aktif', 1)
            ->update([
                'aktif' => 0,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
