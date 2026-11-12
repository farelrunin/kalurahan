<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026110901 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasColumn('keuangan_manual_rab', 'waktu_pelaksanaan')
            || ! Schema::hasColumn('keuangan_manual_rab', 'kegiatan_sumber')) {
            Schema::table('keuangan_manual_rab', static function (Blueprint $table): void {
                if (! Schema::hasColumn('keuangan_manual_rab', 'waktu_pelaksanaan')) {
                    $table->string('waktu_pelaksanaan', 100)->nullable()->after('bulan_selesai');
                }
                if (! Schema::hasColumn('keuangan_manual_rab', 'kegiatan_sumber')) {
                    $table->string('kegiatan_sumber', 191)->nullable()->after('kegiatan');
                }
            });
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
