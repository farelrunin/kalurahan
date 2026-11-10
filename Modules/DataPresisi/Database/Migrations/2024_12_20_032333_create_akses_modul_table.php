<?php

use App\Traits\Migrator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;
use Modules\DataPresisi\Database\Seeders\ModulSeeder;

return new class () extends Migration {
    use Migrator;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        (new ModulSeeder())->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $id = identitas('id');
      $this->deleteSetting(['config_id' => $id, 'kategori' => 'data_presisi']);
      $this->deleteModul(['config_id' => $id, 'slug' => 'data_presisi']);

      // Hapus folder desa/modules/data_presisi
      File::deleteDirectory(config('data_presisi.path.root'));
    }
};