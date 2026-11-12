<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Migrasi_2026110902 extends MY_model
{
    public function up(): bool
    {
        if (! Schema::hasTable('keuangan_manual_rab_spp')) {
            DB::statement("CREATE TABLE keuangan_manual_rab_spp (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                config_id INT UNSIGNED NOT NULL,
                tahun SMALLINT UNSIGNED NOT NULL,
                tahap VARCHAR(12) NOT NULL,
                nomor_spp VARCHAR(100) NOT NULL,
                tanggal_spp DATE NOT NULL,
                jenis_spp VARCHAR(20) NOT NULL,
                penerima VARCHAR(191) NOT NULL,
                alamat VARCHAR(255) NULL,
                npwp VARCHAR(30) NULL,
                keperluan VARCHAR(500) NOT NULL,
                status VARCHAR(20) NOT NULL DEFAULT 'draft',
                jumlah_bruto DECIMAL(18,2) NOT NULL DEFAULT 0,
                jumlah_pajak DECIMAL(18,2) NOT NULL DEFAULT 0,
                jumlah_netto DECIMAL(18,2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                UNIQUE KEY rab_spp_config_tahun_nomor_unique (config_id, tahun, nomor_spp),
                INDEX rab_spp_config_tahun_status_idx (config_id, tahun, status),
                INDEX rab_spp_config_tahap_idx (config_id, tahap)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        }

        if (! Schema::hasTable('keuangan_manual_rab_spp_item')) {
            DB::statement("CREATE TABLE keuangan_manual_rab_spp_item (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                config_id INT UNSIGNED NOT NULL,
                spp_id BIGINT UNSIGNED NOT NULL,
                rab_id BIGINT UNSIGNED NOT NULL,
                rab_item_id BIGINT UNSIGNED NOT NULL,
                keterangan VARCHAR(255) NOT NULL,
                jumlah_bruto DECIMAL(18,2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                UNIQUE KEY rab_spp_item_unique (spp_id, rab_item_id),
                INDEX rab_spp_item_config_parent_idx (config_id, spp_id),
                INDEX rab_spp_item_config_source_idx (config_id, rab_item_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        }

        if (! Schema::hasTable('keuangan_manual_rab_spp_item_pajak')) {
            DB::statement("CREATE TABLE keuangan_manual_rab_spp_item_pajak (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                config_id INT UNSIGNED NOT NULL,
                spp_item_id BIGINT UNSIGNED NOT NULL,
                pajak_id BIGINT UNSIGNED NULL,
                nama_pajak VARCHAR(191) NOT NULL,
                persentase DECIMAL(8,4) NOT NULL DEFAULT 0,
                nilai_pajak DECIMAL(18,2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                INDEX rab_spp_item_pajak_parent_idx (config_id, spp_item_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        }

        if (! Schema::hasTable('keuangan_manual_rab_kuitansi')) {
            DB::statement("CREATE TABLE keuangan_manual_rab_kuitansi (
                id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                config_id INT UNSIGNED NOT NULL,
                spp_id BIGINT UNSIGNED NOT NULL,
                tahun SMALLINT UNSIGNED NOT NULL,
                nomor_kuitansi VARCHAR(100) NOT NULL,
                tanggal_bayar DATE NOT NULL,
                penerima VARCHAR(191) NOT NULL,
                alamat VARCHAR(255) NULL,
                npwp VARCHAR(30) NULL,
                jumlah_dibayar DECIMAL(18,2) NOT NULL DEFAULT 0,
                selisih_bayar DECIMAL(18,2) NOT NULL DEFAULT 0,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL,
                UNIQUE KEY rab_kuitansi_spp_unique (spp_id),
                UNIQUE KEY rab_kuitansi_config_nomor_unique (config_id, nomor_kuitansi),
                INDEX rab_kuitansi_config_tahun_idx (config_id, tahun)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        }

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
