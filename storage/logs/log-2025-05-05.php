<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-05-05 04:08:46 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 04:12:22 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2025` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

ERROR - 2025-05-05 06:01:52 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 06:04:27 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2025-05-05 06:09:01 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 06:27:28 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-05-05 06:58:51 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/donjo-app/controllers/First.php 355
ERROR - 2025-05-05 10:18:09 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 10:18:17 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 10:18:23 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 10:19:09 --> Severity: error --> Exception: Laporan_penduduk_model::select_jml_penduduk_per_kategori(): Argument #1 ($id_referensi) must be of type string, null given, called in /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php on line 530 /home/sitb2342/public_html/donjo-app/models/Laporan_penduduk_model.php 229
ERROR - 2025-05-05 10:20:09 --> GuzzleHttp\Exception\ConnectException: cURL error 28: Operation timed out after 5001 milliseconds with 0 bytes received (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:275
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
#14 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#15 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#16 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#17 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#18 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#19 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#20 {main}
ERROR - 2025-05-05 10:23:10 --> GuzzleHttp\Exception\ConnectException: cURL error 28: Operation timed out after 5001 milliseconds with 0 bytes received (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:275
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
#14 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#15 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#16 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#17 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#18 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#19 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#20 {main}
ERROR - 2025-05-05 11:01:10 --> GuzzleHttp\Exception\ConnectException: cURL error 28: Operation timed out after 5001 milliseconds with 0 bytes received (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:275
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
#14 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#15 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#16 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#17 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#18 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#19 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#20 {main}
