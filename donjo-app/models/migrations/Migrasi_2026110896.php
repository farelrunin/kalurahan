<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026110896 extends MY_model
{
    public function up(): bool
    {
        DB::table('keuangan_manual_ref_parameter')
            ->whereIn('jenis', ['bidang', 'sub_bidang', 'kegiatan'])
            ->where('aktif', 1)
            ->update([
                'aktif' => 0,
                'updated_at' => now(),
            ]);

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
