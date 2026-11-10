<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-01-26 01:40:53 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2026-01-26 02:02:40 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/desa/themes/tema-silir-5.1.2/commons/paging.php 17
ERROR - 2026-01-26 03:22:31 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2026-01-26 03:22:48 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2026-01-26 05:23:17 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2026-01-26 06:08:58 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2026-01-26 06:33:07 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2026-01-26 06:33:22 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2026-01-26 11:50:09 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2026-01-26 13:08:02 --> Severity: error --> Exception: SQLSTATE[23000]: Integrity constraint violation: 1052 Column 'config_id' in WHERE is ambiguous (Connection: default, SQL: select `program`.*, `program_peserta`.`peserta` as `laravel_through_key` from `program` inner join `program_peserta` on `program_peserta`.`program_id` = `program`.`id` where `program_peserta`.`peserta` = 3402140009160007 and `sasaran` = 2 and (`program`.`config_id` = 1 or `config_id` is null)) /home/sitb2342/public_html/vendor/illuminate/database/Connection.php 829
ERROR - 2026-01-26 16:51:29 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2026-01-26 16:51:50 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2026-01-26 17:49:22 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2026-01-26 21:21:12 --> Query error: MySQL server has gone away - Invalid query: SELECT *
FROM `widget`
WHERE   (
`config_id` = 1
 )
AND `jenis_widget` <> 3
AND `enabled` = 1
ERROR - 2026-01-26 21:21:12 --> ["Error Number: 2006","MySQL server has gone away","SELECT *\nFROM `widget`\nWHERE   (\n`config_id` = 1\n )\nAND `jenis_widget` <> 3\nAND `enabled` = 1","Filename: models\/Web_widget_model.php","Line Number: 437"]
ERROR - 2026-01-26 21:21:16 --> Unable to connect to the database
