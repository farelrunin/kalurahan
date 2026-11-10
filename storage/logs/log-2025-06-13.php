<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-13 02:14:40 --> GuzzleHttp\Exception\ServerException: Server error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `500 Internal Server Error` response:
{
    "message": "Server Error"
}
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
#11 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#13 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#14 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#15 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#16 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#17 {main}
ERROR - 2025-06-13 02:21:54 --> GuzzleHttp\Exception\ServerException: Server error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `500 Internal Server Error` response:
{
    "message": "Server Error"
}
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
#11 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#13 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#14 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#15 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#16 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#17 {main}
ERROR - 2025-06-13 03:24:45 --> GuzzleHttp\Exception\ServerException: Server error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `500 Internal Server Error` response:
{
    "message": "Server Error"
}
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
#11 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#13 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#14 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#15 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#16 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#17 {main}
ERROR - 2025-06-13 04:23:15 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-06-13 06:12:44 --> GuzzleHttp\Exception\ServerException: Server error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `500 Internal Server Error` response:
{
    "message": "Server Error"
}
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
#11 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#13 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#14 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#15 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#16 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#17 {main}
ERROR - 2025-06-13 06:17:43 --> GuzzleHttp\Exception\ServerException: Server error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `500 Internal Server Error` response:
{
    "message": "Server Error"
}
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
#11 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#13 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#14 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#15 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#16 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#17 {main}
ERROR - 2025-06-13 06:34:55 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
{"message":"Format url tidak valid.","errors":{"url":["Format url tidak valid."]}}
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
#11 /home/sitb2342/public_html/donjo-app/helpers/opensid_helper.php(276): GuzzleHttp\Client->post()
#12 /home/sitb2342/public_html/donjo-app/models/Track_model.php(142): httpPost()
#13 /home/sitb2342/public_html/donjo-app/models/Track_model.php(66): Track_model->kirim_data()
#14 /home/sitb2342/public_html/donjo-app/controllers/First.php(119): Track_model->track_desa()
#15 /home/sitb2342/public_html/vendor/codeigniter/framework/system/core/CodeIgniter.php(533): First->index()
#16 /home/sitb2342/public_html/index.php(284): require_once('/home/sitb2342/...')
#17 {main}
ERROR - 2025-06-13 06:49:32 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-06-13 08:19:04 --> Sudut rotasi diperlukan untuk memutar gambar.
ERROR - 2025-06-13 08:19:04 --> Sudut rotasi diperlukan untuk memutar gambar.
ERROR - 2025-06-13 08:19:04 --> Sudut rotasi diperlukan untuk memutar gambar.
ERROR - 2025-06-13 08:19:04 --> Sudut rotasi diperlukan untuk memutar gambar.
ERROR - 2025-06-13 08:20:57 --> Sudut rotasi diperlukan untuk memutar gambar.
ERROR - 2025-06-13 08:20:57 --> Sudut rotasi diperlukan untuk memutar gambar.
ERROR - 2025-06-13 14:48:52 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-06-13 15:27:09 --> Client error: `GET https://idm.kemendesa.go.id/open/api/desa/rumusan/3402142001/2020` resulted in a `400 Bad Request` response:
{"status":400,"error":true,"message":"ID Desa tidak ditemukan"}

