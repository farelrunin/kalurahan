<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026111204 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasTable('keuangan_manual_rab_kuitansi_item')) {
            DB::statement("CREATE TABLE keuangan_manual_rab_kuitansi_item (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                config_id INT UNSIGNED NOT NULL,
                rab_item_id BIGINT UNSIGNED NOT NULL,
                tahun SMALLINT UNSIGNED NOT NULL,
                keterangan VARCHAR(255) NOT NULL,
                nomor_kuitansi VARCHAR(100) NOT NULL,
                tanggal_bayar DATE NOT NULL,
                penerima VARCHAR(191) NOT NULL,
                sebagai_pembayaran VARCHAR(500) NOT NULL,
                jumlah_bruto DECIMAL(18,2) NOT NULL DEFAULT 0,
                jumlah_pajak DECIMAL(18,2) NOT NULL DEFAULT 0,
                jumlah_netto DECIMAL(18,2) NOT NULL DEFAULT 0,
                jumlah_dibayar DECIMAL(18,2) NOT NULL DEFAULT 0,
                selisih_bayar DECIMAL(18,2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                UNIQUE KEY rab_kuitansi_item_config_item_unique (config_id, rab_item_id),
                UNIQUE KEY rab_kuitansi_item_config_nomor_unique (config_id, nomor_kuitansi),
                INDEX rab_kuitansi_item_config_tahun_idx (config_id, tahun)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
