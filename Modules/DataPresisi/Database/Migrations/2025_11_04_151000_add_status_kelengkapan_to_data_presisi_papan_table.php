<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'data_presisi_sandang',
            'data_presisi_papan',
            'data_presisi_pangan',
            'data_presisi_kesehatan',
            'data_presisi_pendidikan',
            'data_presisi_jaminan_sosial',
            'data_presisi_ketenagakerjaan',
            'data_presisi_seni_budaya',
            'data_presisi_aktivitas_agama',
            'data_presisi_aktivitas_adat',
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, static function (Blueprint $table) use ($tableName) {
                    if (!Schema::hasColumn($tableName, 'status_kelengkapan')) {
                        $table->tinyInteger('status_kelengkapan')->default(0)->after('tanggal_pengisian')->comment('0=Tidak Lengkap, 1=Lengkap Sebagian, 2=Data Lengkap');
                    }
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'data_presisi_sandang',
            'data_presisi_papan',
            'data_presisi_pangan',
            'data_presisi_kesehatan',
            'data_presisi_pendidikan',
            'data_presisi_jaminan_sosial',
            'data_presisi_ketenagakerjaan',
            'data_presisi_seni_budaya',
            'data_presisi_aktivitas_agama',
            'data_presisi_aktivitas_adat',
        ];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, static function (Blueprint $table) use ($tableName) {
                    if (Schema::hasColumn($tableName, 'status_kelengkapan')) {
                        $table->dropColumn('status_kelengkapan');
                    }
                });
            }
        }
    }
};
