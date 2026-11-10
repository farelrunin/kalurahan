<?php

use App\Models\Modul;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $presisi = Modul::where('slug', 'data-presisi')->first();
        // cari max urut selain pengaturan
        $maxUrut = Modul::where('slug', '!=', 'data-presisi-pengaturan')
            ->where('parent', $presisi->id)
            ->where('level', 2)
            ->max('urut');
        // Update urutan menu pengaturan
        $pengaturan = Modul::where('slug', 'data-presisi-pengaturan')->first();
        $urutPengaturan = $pengaturan->urut;
        
        if ($urutPengaturan < $maxUrut) {
            $urutPengaturan = $maxUrut + 1;

            // Update urutan menu pengaturan
            $pengaturan->update([
                'urut' => $urutPengaturan,
            ]);

            cache()->flush();
        }        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
