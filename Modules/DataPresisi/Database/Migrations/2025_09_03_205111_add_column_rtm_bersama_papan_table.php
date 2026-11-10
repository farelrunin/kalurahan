<?php

use App\Models\Modul;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('data_presisi_papan')) {
            Schema::table('data_presisi_papan', static function ($table) {
                if (!Schema::hasColumn('data_presisi_papan', 'rtm_bersama')) {
                    $table->string('rtm_bersama')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('data_presisi_papan')) {
            Schema::table('data_presisi_papan', static function ($table) {
                if (Schema::hasColumn('data_presisi_papan', 'rtm_bersama')) {
                    $table->dropColumn('rtm_bersama');
                }
            });
        }
    }
};
