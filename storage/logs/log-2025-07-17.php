<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-07-17 01:19:16 --> GuzzleHttp\Exception\ConnectException: cURL error 6: Could not resolve host: layanan.opendesa.id (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://layanan.opendesa.id/api/v1/pelanggan/catat-versi in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:275
Stack trace:
#0 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php(205): GuzzleHttp\Handler\CurlFactory::createRejection()
#1 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php(157): GuzzleHttp\Handler\CurlFactory::finishError()
#2 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlHandler.php(47): GuzzleHttp\Handler\CurlFactory::finish()
#3 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/Proxy.php(28): GuzzleHttp\Handler\CurlHandler->__invoke()
#4 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/Proxy.php(48): GuzzleHttp\Handler\Proxy::GuzzleHttp\Handler\{closure}()
#5 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/PrepareBodyMiddleware.php(64): GuzzleHttp\Handler\Proxy::GuzzleHttp\Handler\{closure}()
#6 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Middleware.php(31): GuzzleHttp\PrepareBodyMiddleware->__invoke()
#7 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/RedirectMiddleware.php(71): GuzzleHttp\Middleware::GuzzleHttp\{closure}()
#8 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Middleware.php(66): GuzzleHttp\RedirectMiddleware->__invoke()
#9 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/HandlerStack.php(75): GuzzleHttp\Middleware::GuzzleHttp\{closure}()
#10 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Client.php(333): GuzzleHttp\HandlerStack->__invoke()
#11 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Client.php(169): GuzzleHttp\Client->transfer()
#12 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Client.php(189): GuzzleHttp\Client->requestAsync()
#13 /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/ClientTrait.php(95): GuzzleHttp\Client->request()
#14 /home/sitb2342/public_html/donjo-app/helpers/general_helper.php(576): GuzzleHttp\Client->post()
#15 /home/sitb2342/public_html/donjo-app/models/Track_model.php(68): kirim_versi_opensid()
#16 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#17 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#18 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#19 {main}
ERROR - 2025-07-17 04:16:07 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 05:41:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:42:36 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:43:14 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:43:22 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:43:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:45:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:45:30 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:45:44 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:04 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:07 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:34 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:36 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:44 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:46:44 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 05:47:43 --> API Request /ppid/ dari 164.90.171.93
ERROR - 2025-07-17 06:43:31 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 07:54:25 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 08:18:13 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 08:18:49 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 08:27:33 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2025-07-17 09:31:49 --> Unable to connect to the database
ERROR - 2025-07-17 09:49:35 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 11:14:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 13:41:09 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 13:41:27 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 13:41:45 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 13:41:47 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 13:42:11 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 88
ERROR - 2025-07-17 13:42:12 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 13:42:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:08:32 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:08:33 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:13:17 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:13:19 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:14:54 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:14:56 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:18:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 15:18:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 16:17:46 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 16:41:21 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at __mnx_runtime:1) /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/Security.php 287
ERROR - 2025-07-17 17:20:30 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 17:40:44 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2025-07-17 18:50:00 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-07-17 19:37:24 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2020` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2025-07-17 21:09:54 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
