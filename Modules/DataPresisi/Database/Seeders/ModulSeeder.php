<?php

namespace Modules\DataPresisi\Database\Seeders;

use App\Traits\Migrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ModulSeeder extends Seeder
{
    use Migrator;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Menu Utama
        $this->createModul([
            'modul'  => 'Data Presisi',
            'slug'   => 'data-presisi',
            'url'    => 'data_presisi',
            'ikon'   => 'fa-database',
            'level'  => 1,
            'parent' => 0,
        ]);

        // Sub Menu
        $this->createModuls([
            [
                'modul'       => 'Sandang',
                'url'         => 'data_presisi/sandang',
                'slug'        => 'data-presisi-sandang',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 1,
                'parent_slug' => 'data-presisi',
            ],      
            [
                'modul'       => 'Pangan',
                'url'         => 'data_presisi/pangan',
                'slug'        => 'data-presisi-pangan',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 2,
                'parent_slug' => 'data-presisi',
            ],
            [
                'modul'       => 'Papan',
                'url'         => 'data_presisi/papan',
                'slug'        => 'data-presisi-papan',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 3,
                'parent_slug' => 'data-presisi',
            ],
            [
                'modul'       => 'Kesehatan',
                'url'         => 'data_presisi/kesehatan',
                'slug'        => 'data-presisi-kesehatan',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 4,
                'parent_slug' => 'data-presisi',
            ],                        
            [
                'modul'       => 'Pendidikan',
                'url'         => 'data_presisi/pendidikan',
                'slug'        => 'data-presisi-pendidikan',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 5,
                'parent_slug' => 'data-presisi',
            ],
            [
                'modul'       => 'Aktivitas Keagamaan',
                'url'         => 'data_presisi/aktivitas-agama',
                'slug'        => 'data-presisi-aktivitas-agama',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 6,
                'parent_slug' => 'data-presisi',
            ],            
            [
                'modul'       => 'Ketenagakerjaan',
                'url'         => 'data_presisi/ketenagakerjaan',
                'slug'        => 'data-presisi-ketenagakerjaan',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 7,
                'parent_slug' => 'data-presisi',
            ],                        
            [
                'modul'       => 'Jaminan Sosial',
                'url'         => 'data_presisi/jaminan-sosial',
                'slug'        => 'data-presisi-jaminan-sosial',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 8,
                'parent_slug' => 'data-presisi',
            ],
            [
                'modul'       => 'Aktivitas Adat',
                'url'         => 'data_presisi/aktivitas-adat',
                'slug'        => 'data-presisi-aktivitas-adat',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 9,
                'parent_slug' => 'data-presisi',
            ],  
            [
                'modul'       => 'Seni Budaya',
                'url'         => 'data_presisi/seni_budaya',
                'slug'        => 'data-presisi-seni-budaya',
                'ikon'        => 'fa-circle-o',
                'level'       => 2,
                'urut'        => 10,
                'parent_slug' => 'data-presisi',
            ],
            [
                'modul'       => 'Pengaturan',
                'url'         => 'data_presisi/pengaturan',
                'slug'        => 'data-presisi-pengaturan',
                'ikon'        => 'fa-gear',
                'level'       => 2,
                'urut'        => 15, // pastikan nilainya lebih besar dari sub menu lain
                'parent_slug' => 'data-presisi',
            ],
            // Tambahkan sub menu lain jika diperlukan
        ]);

        // Buat direktori yang diperlukan
        File::makeDirectory(config('data_presisi.path.root'), 0755, true, true);
    }
}