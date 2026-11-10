<?php

use App\Models\Modul;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $menus = [
            [
                'urut' => 1,
                'nama' => 'Sandang',
            ],
            [
                'urut' => 2,
                'nama' => 'Papan',
            ],
            [
                'urut' => 3,
                'nama' => 'Pangan',
            ],
            [
                'urut' => 4,
                'nama' => 'Kesehatan',
            ],
            [
                'urut' => 5,
                'nama' => 'Jaminan Sosial',
            ],
            [
                'urut' => 6,
                'nama' => 'Aktifitas Keagamaan',
            ],
            [
                'urut' => 7,
                'nama' => 'Ketenagkerjaan',
            ],
            [
                'urut' => 8,
                'nama' => 'Aktivitas adat',
            ],
            [
                'urut' => 9,
                'nama' => 'Pendidikan',
            ],
            [
                'urut' => 10,
                'nama' => 'Seni Budaya',
            ],
            [
                'urut' => 99,
                'nama' => 'Pengaturan',
            ],
        ];

        foreach ($menus as $menu) {
            Modul::where('slug', 'data-presisi-' . str_replace(' ', '-', strtolower($menu['nama'])))
                ->update(['urut' => $menu['urut']]);
        }

        cache()->flush();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
