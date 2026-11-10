<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('data_presisi_jaminan_sosial')
            ->where('config_id', identitas('id'))
            ->where('jns_bantuan', 'BNPT')
            ->update(['jns_bantuan' => 'BPNT']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('data_presisi_jaminan_sosial')
            ->where('config_id', identitas('id'))
            ->where('jns_bantuan', 'BPNT')
            ->update(['jns_bantuan' => 'BNPT']);
    }
};
