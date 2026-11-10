<?php

use App\Models\Modul;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('data_presisi_pangan')) {
            Schema::table('data_presisi_pangan', static function ($table) {
                if (!Schema::hasColumn('data_presisi_pangan', 'longitude')) {
                    $table->string('longitude')->nullable()->after('status_pengisian');
                }
                if (!Schema::hasColumn('data_presisi_pangan', 'latitude')) {
                    $table->string('latitude')->nullable()->after('longitude');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('data_presisi_pangan')) {
            Schema::table('data_presisi_pangan', static function ($table) {
                if (Schema::hasColumn('data_presisi_pangan', 'longitude')) {
                    $table->dropColumn('longitude');
                }
                if (Schema::hasColumn('data_presisi_pangan', 'latitude')) {
                    $table->dropColumn('latitude');
                }
            });
        }
    }
};
