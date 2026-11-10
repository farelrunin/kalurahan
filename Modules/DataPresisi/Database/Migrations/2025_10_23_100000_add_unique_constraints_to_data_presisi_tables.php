<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * List of tables with all columns (config_id, data_presisi_tahun_id, rtm_id, keluarga_id, anggota_id)
     */
    private array $tablesWithAllColumns = [
        'data_presisi_pendidikan',
        'data_presisi_kesehatan',
        'data_presisi_sandang',
        'data_presisi_jaminan_sosial',
        'data_presisi_aktivitas_agama',
        'data_presisi_aktivitas_adat',
        'data_presisi_ketenagakerjaan',
        'data_presisi_seni_budaya',
    ];

    /**
     * List of tables without keluarga_id and anggota_id
     */
    private array $tablesWithoutFamilyAndMember = [
        'data_presisi_papan',
        // tidak bisa diset unique karena satu keluarga bisa lebih dari 1 inputan tanah
        //'data_presisi_pangan',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add unique constraints for tables with all columns
        foreach ($this->tablesWithAllColumns as $tableName) {
            try {
                Schema::table($tableName, static function (Blueprint $table) use ($tableName) {
                    $constraintName = $tableName . '_unique';
                    
                    // Check if constraint already exists by trying to get index list
                    $indexes = DB::select("SHOW INDEX FROM {$tableName} WHERE Key_name = ?", [$constraintName]);
                    
                    if (empty($indexes)) {
                        // Create unique constraint for combination of config_id, data_presisi_tahun_id, rtm_id, keluarga_id, anggota_id
                        $table->unique(['config_id', 'data_presisi_tahun_id', 'rtm_id', 'keluarga_id', 'anggota_id'], $constraintName);
                    }
                });
            } catch (\Exception $e) {
                Log::error("Error adding unique constraint to table {$tableName}: " . $e->getMessage());
                continue;
            }
        }

        // Add unique constraints for tables without keluarga_id and anggota_id
        foreach ($this->tablesWithoutFamilyAndMember as $tableName) {
            try {
                Schema::table($tableName, static function (Blueprint $table) use ($tableName) {
                    $constraintName = $tableName . '_unique';
                    
                    // Check if constraint already exists by trying to get index list
                    $indexes = DB::select("SHOW INDEX FROM {$tableName} WHERE Key_name = ?", [$constraintName]);
                    
                    if (empty($indexes)) {
                        // Create unique constraint for combination of config_id, data_presisi_tahun_id, rtm_id, keluarga_id
                        $table->unique(['config_id', 'data_presisi_tahun_id', 'rtm_id', 'keluarga_id'], $constraintName);
                    }
                });
            } catch (\Exception $e) {
                Log::error("Error adding unique constraint to table {$tableName}: " . $e->getMessage());
                continue;
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