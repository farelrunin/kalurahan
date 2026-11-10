<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    private $listTables = [
        'data_presisi_pendidikan',
        'data_presisi_kesehatan',
        'data_presisi_sandang',
        'data_presisi_jaminan_sosial',
        'data_presisi_aktivitas_agama',
        'data_presisi_aktivitas_adat',
        'data_presisi_ketenagakerjaan',
        'data_presisi_seni_budaya',
        'data_presisi_papan',
        'data_presisi_pangan',
    ];

    public function up(): void
    {
        // biarkan kosong
    }
    /**
     * Run the migrations. barangkali nanti dipakai
     */
    public function hapusDataSalah(): void
    {
        $configId = identitas('id');
        
        foreach ($this->listTables as $table) {
            // Get the wrong data records first for logging
            $wrongData = DB::table("{$table} as dp")
                ->join('tweb_rtm as tr', 'tr.id', '=', 'dp.rtm_id')
                ->where('dp.config_id', '!=', 'tr.config_id')
                ->where('dp.config_id', '=', $configId)
                ->select('dp.uuid', 'dp.config_id as dp_config_id', 'tr.config_id as rtm_config_id', 'dp.rtm_id')
                ->get();

            // Log the wrong data that will be deleted
            if ($wrongData->isNotEmpty()) {
                Log::info("Removing wrong data from {$table}:", [
                    'count' => $wrongData->count(),
                    'data' => $wrongData->toArray()
                ]);

                // Delete the wrong data using raw SQL for better performance
                DB::statement("
                    DELETE dp FROM {$table} dp
                    INNER JOIN tweb_rtm tr ON tr.id = dp.rtm_id
                    WHERE dp.config_id != tr.config_id
                    AND dp.config_id = ?
                ", [$configId]);
            } else {
                Log::info("No wrong data found in {$table} table");
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not reversible as we're deleting data
        // In a real scenario, you might want to backup the data before deletion
        Log::warning('Migration 2025_11_03_092400_remove_wrong_data_presisi.php is not reversible. Data has been permanently deleted.');
    }
};