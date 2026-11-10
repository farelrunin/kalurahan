<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-11 01:39:29 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 03:10:50 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 03:47:14 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 05:49:56 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 05:49:57 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 06:03:59 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 06:04:35 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 06:05:35 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 06:06:02 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 08:43:56 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 09:06:32 --> GuzzleHttp\Exception\ConnectException: cURL error 28: Connection timed out after 4001 milliseconds (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:275
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
ERROR - 2025-06-11 09:09:48 --> GuzzleHttp\Exception\ConnectException: cURL error 28: Connection timed out after 4001 milliseconds (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw in /home/sitb2342/public_html/vendor/guzzlehttp/guzzle/src/Handler/CurlFactory.php:275
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
ERROR - 2025-06-11 09:33:41 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 09:59:48 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:27:25 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:29:18 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:29:26 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:29:27 --> Severity: error --> Exception: syntax error, unexpected identifier "version" (View: /home/sitb2342/public_html/resources/views/sitemap.blade.php) /home/sitb2342/public_html/storage/framework/views/9a78fc5216fb1ea931384d682e93457d.php 1
ERROR - 2025-06-11 12:29:46 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:38:01 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:38:11 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 12:38:12 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 14:50:12 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 16:51:44 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 17:40:37 --> Severity: error --> Exception: Unsupported operand types: string - int /home/sitb2342/public_html/desa/themes/tema-silir-5.0.6/commons/paging.php 17
ERROR - 2025-06-11 18:45:35 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 19:57:55 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 23:25:11 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 23:53:07 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
ERROR - 2025-06-11 23:58:38 --> GuzzleHttp\Exception\ClientException: Client error: `POST https://pantau.opensid.my.id/api/track/desa?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6bnVsbCwidGltZXN0YW1wIjoxNjAzNDY2MjM5fQ.HVCNnMLokF2tgHwjQhSIYo6-2GNXB4-Kf28FSIeXnZw` resulted in a `422 Unprocessable Content` response:
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
