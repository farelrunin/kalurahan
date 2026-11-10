<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2026-09-06 00:00:55 --> GuzzleHttp\Exception\ServerException: Server error: `POST https://layanan.opendesa.id/api/v1/pelanggan/catat-versi` resulted in a `522 <none>` response:
error code: 522

 in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Exception/RequestException.php:111
Stack trace:
#0 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Middleware.php(72): GuzzleHttp\Exception\RequestException::create()
#1 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(209): GuzzleHttp\Middleware::GuzzleHttp\{closure}()
#2 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(158): GuzzleHttp\Promise\Promise::callHandler()
#3 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/TaskQueue.php(52): GuzzleHttp\Promise\Promise::GuzzleHttp\Promise\{closure}()
#4 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(251): GuzzleHttp\Promise\TaskQueue->run()
#5 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(227): GuzzleHttp\Promise\Promise->invokeWaitFn()
#6 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(272): GuzzleHttp\Promise\Promise->waitIfPending()
#7 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(229): GuzzleHttp\Promise\Promise->invokeWaitList()
#8 /home/sitb2342/public_html/vendor/guzzlehttp/promises/src/Promise.php(69): GuzzleHttp\Promise\Promise->waitIfPending()
#9 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Client.php(189): GuzzleHttp\Promise\Promise->wait()
#10 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/ClientTrait.php(95): GuzzleHttp\Client->request()
#11 /home/sitb2342/public_html/donjo-app/helpers/general_helper.php(576): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(68): kirim_versi_opensid()
#13 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#14 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#15 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#16 {main}
ERROR - 2026-09-06 00:25:52 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 00:57:58 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 01:02:16 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 01:32:45 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 01:50:28 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2025` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2026-09-06 02:18:58 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2025` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2026-09-06 02:26:58 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 02:28:52 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 02:58:10 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 03:01:14 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 04:32:42 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 04:33:24 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 05:00:39 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 05:13:43 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 06:22:15 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 06:24:28 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 06:45:32 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 07:00:05 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 08:03:40 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2025` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2026-09-06 08:20:41 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 08:24:42 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 08:58:15 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 09:00:01 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 09:08:50 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2026-09-06 09:29:57 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2025` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2026-09-06 10:19:46 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 10:55:07 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 11:00:09 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 12:25:50 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 12:29:04 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 12:50:06 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 13:08:43 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 14:18:37 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 14:20:23 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 14:44:20 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 14:57:14 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 16:25:32 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 17:02:56 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 18:27:52 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 19:09:43 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 20:02:28 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 20:17:46 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 20:47:57 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 20:48:58 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 22:03:25 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 22:19:09 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 22:21:15 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2026-09-06 22:56:27 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
