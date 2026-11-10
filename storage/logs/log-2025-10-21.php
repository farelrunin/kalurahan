<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-10-21 00:09:20 --> Unable to connect to the database
ERROR - 2025-10-21 00:17:04 --> Unable to connect to the database
ERROR - 2025-10-21 00:17:27 --> Unable to connect to the database
ERROR - 2025-10-21 00:17:36 --> Unable to connect to the database
ERROR - 2025-10-21 00:17:43 --> Unable to connect to the database
ERROR - 2025-10-21 00:17:49 --> Unable to connect to the database
ERROR - 2025-10-21 00:17:51 --> Unable to connect to the database
ERROR - 2025-10-21 00:18:02 --> Unable to connect to the database
ERROR - 2025-10-21 02:24:22 --> Unable to connect to the database
ERROR - 2025-10-21 03:11:31 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2020` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2025-10-21 11:08:10 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2025-10-21 14:05:34 --> Unable to connect to the database
ERROR - 2025-10-21 14:05:34 --> Unable to connect to the database
ERROR - 2025-10-21 14:05:35 --> Unable to connect to the database
ERROR - 2025-10-21 14:05:35 --> Unable to connect to the database
ERROR - 2025-10-21 14:39:48 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select `program`.*, `program_peserta`.`peserta` as `laravel_through_key` from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `program_peserta`.`peserta` = 3402141203190009 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2025-10-21 14:41:36 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select `program`.*, `program_peserta`.`peserta` as `laravel_through_key` from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `program_peserta`.`peserta` = 3402141203190009 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2025-10-21 14:41:40 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select `program`.*, `program_peserta`.`peserta` as `laravel_through_key` from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `program_peserta`.`peserta` = 3402141203190009 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2025-10-21 14:45:30 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select `program`.*, `program_peserta`.`peserta` as `laravel_through_key` from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `program_peserta`.`peserta` = 3402141203190009 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2025-10-21 15:06:17 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select `program`.*, `program_peserta`.`peserta` as `laravel_through_key` from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `program_peserta`.`peserta` = 3402141203190009 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2025-10-21 15:21:10 --> Unable to connect to the database
ERROR - 2025-10-21 15:21:16 --> Unable to connect to the database
ERROR - 2025-10-21 15:30:10 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select count(*) as aggregate from (select `tweb_keluarga`.*, (select count(*) from `tweb_penduduk` where `tweb_keluarga`.`id` = `tweb_penduduk`.`id_kk` and `status_dasar` = 1) as `anggota_count` from `tweb_keluarga` where exists (select * from `tweb_penduduk` where `tweb_keluarga`.`nik_kepala` = `tweb_penduduk`.`id` and `status_dasar` = 1) and exists (select * from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `tweb_keluarga`.`no_kk` = `program_peserta`.`peserta` and `program_id` = 1 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) and `tweb_keluarga`.`config_id` = 1 order by CASE
                WHEN CHAR_LENGTH(no_kk) < 16 THEN 1
                WHEN no_kk LIKE '0%' AND CHAR_LENGTH(no_kk) = 16 THEN 2
                ELSE 3
            END asc) count_row_table) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2025-10-21 19:38:51 --> Unable to connect to the database
ERROR - 2025-10-21 23:55:02 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2025-10-21 23:55:19 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
