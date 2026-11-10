<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\DataPresisi\Models\Pangan;
use Modules\DataPresisi\Models\Tahun;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('data_presisi_pangan')) {
            if (!Schema::hasColumn('data_presisi_pangan', 'data_presisi_tahun_id')) {
                Schema::table('data_presisi_pangan', static function (Blueprint $table) {
                    $table->foreignUuid('data_presisi_tahun_id')->nullable()->after('config_id')->constrained('data_presisi_tahun')->references('uuid')->cascadeOnUpdate()->cascadeOnDelete();
                });
            }
        }

        $tahun = Tahun::active()->first();

        if (Pangan::where('data_presisi_tahun_id', $tahun->uuid)->doesntExist()) {
            Pangan::where('data_presisi_tahun_id', null)->update(['data_presisi_tahun_id' => $tahun->uuid]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
