<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026110893 extends MY_model
{
    public function up(): bool
    {
        Schema::table('keuangan_manual_rab', static function (Blueprint $table): void {
            if (! Schema::hasColumn('keuangan_manual_rab', 'data_eksisting')) {
                $table->text('data_eksisting')->nullable();
            }
            if (! Schema::hasColumn('keuangan_manual_rab', 'target_tahun_depan')) {
                $table->text('target_tahun_depan')->nullable();
            }
            if (! Schema::hasColumn('keuangan_manual_rab', 'volume_rencana')) {
                $table->decimal('volume_rencana', 18, 4)->nullable();
            }
            if (! Schema::hasColumn('keuangan_manual_rab', 'satuan_rencana')) {
                $table->string('satuan_rencana', 50)->nullable();
            }
            if (! Schema::hasColumn('keuangan_manual_rab', 'nama_paket')) {
                $table->string('nama_paket', 191)->nullable();
            }
            if (! Schema::hasColumn('keuangan_manual_rab', 'kode_paket')) {
                $table->string('kode_paket', 50)->nullable();
            }
        });

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
