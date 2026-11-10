<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            // Check if table exists
            if (Schema::hasTable('data_presisi_seni_budaya')) {
                // Check and add index for anggota_id if not exists
                if (!$this->hasIndexOnColumn('data_presisi_seni_budaya', 'anggota_id')) {
                    try {
                        Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
                            $table->index('anggota_id', 'FK_data_presisi_seni_budaya_anggota');
                        });
                        Log::info('Successfully added index for anggota_id on data_presisi_seni_budaya table');
                    } catch (\Exception $e) {
                        Log::error('Failed to add index for anggota_id on data_presisi_seni_budaya table: ' . $e->getMessage());
                    }
                } else {
                    Log::info('Index for anggota_id already exists on data_presisi_seni_budaya table');
                }

                // Check and add index for keluarga_id if not exists
                if (!$this->hasIndexOnColumn('data_presisi_seni_budaya', 'keluarga_id')) {
                    try {
                        Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
                            $table->index('keluarga_id', 'FK_data_presisi_seni_budaya_keluarga');
                        });
                        Log::info('Successfully added index for keluarga_id on data_presisi_seni_budaya table');
                    } catch (\Exception $e) {
                        Log::error('Failed to add index for keluarga_id on data_presisi_seni_budaya table: ' . $e->getMessage());
                    }
                } else {
                    Log::info('Index for keluarga_id already exists on data_presisi_seni_budaya table');
                }

                // Check and add index for rtm_id if not exists
                if (!$this->hasIndexOnColumn('data_presisi_seni_budaya', 'rtm_id')) {
                    try {
                        Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
                            $table->index('rtm_id', 'FK_data_presisi_seni_budaya_rtm');
                        });
                        Log::info('Successfully added index for rtm_id on data_presisi_seni_budaya table');
                    } catch (\Exception $e) {
                        Log::error('Failed to add index for rtm_id on data_presisi_seni_budaya table: ' . $e->getMessage());
                    }
                } else {
                    Log::info('Index for rtm_id already exists on data_presisi_seni_budaya table');
                }

                // Check and add foreign key for anggota_id if not exists
                if (!$this->hasForeignKeyToColumn('data_presisi_seni_budaya', 'anggota_id', 'tweb_penduduk')) {
                    try {
                        Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
                            $table->foreign('anggota_id')
                                  ->references('id')->on('tweb_penduduk')
                                  ->onUpdate('cascade')
                                  ->onDelete('cascade');
                        });
                        Log::info('Successfully added foreign key for anggota_id on data_presisi_seni_budaya table');
                    } catch (\Exception $e) {
                        Log::error('Failed to add foreign key for anggota_id on data_presisi_seni_budaya table: ' . $e->getMessage());
                    }
                } else {
                    Log::info('Foreign key for anggota_id already exists on data_presisi_seni_budaya table');
                }

                // Check and add foreign key for keluarga_id if not exists
                if (!$this->hasForeignKeyToColumn('data_presisi_seni_budaya', 'keluarga_id', 'tweb_keluarga')) {
                    try {
                        Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
                            $table->foreign('keluarga_id')
                                  ->references('id')->on('tweb_keluarga')
                                  ->onUpdate('cascade')
                                  ->onDelete('cascade');
                        });
                        Log::info('Successfully added foreign key for keluarga_id on data_presisi_seni_budaya table');
                    } catch (\Exception $e) {
                        Log::error('Failed to add foreign key for keluarga_id on data_presisi_seni_budaya table: ' . $e->getMessage());
                    }
                } else {
                    Log::info('Foreign key for keluarga_id already exists on data_presisi_seni_budaya table');
                }

                // Check and add foreign key for rtm_id if not exists
                if (!$this->hasForeignKeyToColumn('data_presisi_seni_budaya', 'rtm_id', 'tweb_rtm')) {
                    try {
                        Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
                            $table->foreign('rtm_id')
                                  ->references('id')->on('tweb_rtm')
                                  ->onUpdate('cascade')
                                  ->onDelete('cascade');
                        });
                        Log::info('Successfully added foreign key for rtm_id on data_presisi_seni_budaya table');
                    } catch (\Exception $e) {
                        Log::error('Failed to add foreign key for rtm_id on data_presisi_seni_budaya table: ' . $e->getMessage());
                    }
                } else {
                    Log::info('Foreign key for rtm_id already exists on data_presisi_seni_budaya table');
                }
            } else {
                Log::warning('Table data_presisi_seni_budaya does not exist');
            }
        } catch (\Exception $e) {
            Log::error('Migration failed for data_presisi_seni_budaya table: ' . $e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // if (Schema::hasTable('data_presisi_seni_budaya')) {
        //     // Drop foreign keys
        //     $this->dropForeignKeyIfExists('data_presisi_seni_budaya', 'anggota_id');
        //     $this->dropForeignKeyIfExists('data_presisi_seni_budaya', 'keluarga_id');
        //     $this->dropForeignKeyIfExists('data_presisi_seni_budaya', 'rtm_id');

        //     // Drop indexes
        //     Schema::table('data_presisi_seni_budaya', function (Blueprint $table) {
        //         $table->dropIndex('FK_data_presisi_seni_budaya_anggota');
        //         $table->dropIndex('FK_data_presisi_seni_budaya_keluarga');
        //         $table->dropIndex('FK_data_presisi_seni_budaya_rtm');
        //     });
        // }
    }   

    /**
     * Check if a foreign key exists for a specific column
     */
    private function hasForeignKeyToColumn(string $table, string $column, string $referencedTable): bool
    {
        try {
            $foreignKeys = Schema::getConnection()
                ->getDoctrineSchemaManager()
                ->listTableForeignKeys($table);
            
            foreach ($foreignKeys as $key) {
                $localColumns = $key->getLocalColumns();
                $foreignTable = $key->getForeignTableName();
                
                if (in_array($column, $localColumns) && $foreignTable === $referencedTable) {
                    return true;
                }
            }
            
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }   

    /**
     * Check if an index exists for a specific column
     */
    private function hasIndexOnColumn(string $table, string $column): bool
    {
        try {
            $indexes = Schema::getConnection()
                ->getDoctrineSchemaManager()
                ->listTableIndexes($table);
            
            foreach ($indexes as $index) {
                $columns = $index->getColumns();
                if (in_array($column, $columns)) {
                    return true;
                }
            }
            
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
};