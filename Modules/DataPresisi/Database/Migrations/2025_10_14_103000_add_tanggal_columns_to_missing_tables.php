<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add tanggal_pengisian and tanggal_terdaftar to data_presisi_jaminan_sosial table
        if (Schema::hasTable('data_presisi_jaminan_sosial')) {
            if (!Schema::hasColumn('data_presisi_jaminan_sosial', 'tanggal_pengisian')) {
                Schema::table('data_presisi_jaminan_sosial', function (Blueprint $table) {
                    $table->date('tanggal_pengisian')->nullable();
                });

                DB::statement('UPDATE data_presisi_jaminan_sosial SET tanggal_pengisian = updated_at where tanggal_pengisian is null and created_at < updated_at');
            }            
        }

        // Add tanggal_pengisian and tanggal_terdaftar to data_presisi_aktivitas_agama table
        if (Schema::hasTable('data_presisi_aktivitas_agama')) {
            if (!Schema::hasColumn('data_presisi_aktivitas_agama', 'tanggal_pengisian')) {
                Schema::table('data_presisi_aktivitas_agama', function (Blueprint $table) {
                    $table->date('tanggal_pengisian')->nullable();
                });
                DB::statement('UPDATE data_presisi_aktivitas_agama SET tanggal_pengisian = updated_at where tanggal_pengisian is null and created_at < updated_at');
            }            
        }

        // Add tanggal_pengisian and tanggal_terdaftar to data_presisi_aktivitas_adat table
        if (Schema::hasTable('data_presisi_aktivitas_adat')) {
            if (!Schema::hasColumn('data_presisi_aktivitas_adat', 'tanggal_pengisian')) {
                Schema::table('data_presisi_aktivitas_adat', function (Blueprint $table) {
                    $table->date('tanggal_pengisian')->nullable();
                });
                DB::statement('UPDATE data_presisi_aktivitas_adat SET tanggal_pengisian = updated_at where tanggal_pengisian is null and created_at < updated_at');
            }            
        }

        // Add tanggal_pengisian and tanggal_terdaftar to data_presisi_papan table
        if (Schema::hasTable('data_presisi_papan')) {
            if (!Schema::hasColumn('data_presisi_papan', 'tanggal_pengisian')) {
                Schema::table('data_presisi_papan', function (Blueprint $table) {
                    $table->date('tanggal_pengisian')->nullable();
                });
                DB::statement('UPDATE data_presisi_papan SET tanggal_pengisian = updated_at where tanggal_pengisian is null and created_at < updated_at');
            }            
        }
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};