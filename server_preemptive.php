<?php

ini_set("swoole.enable_preemptive_scheduler","1");

$http = new swoole_http_server("0.0.0.0", 9501, SWOOLE_BASE);

$http->on("start", function ($server) {
    echo "Swoole http server is started at http://0.0.0.0:9501\n";
});

$http->on("request", function ($request, $response) {
    $response->header("Content-Type", "text/plain");

    if($request->get['p'] == 1) {
    	$i = 0;
    	// 8s CPU heavy logics
	    while ($i < 1000000000) {
	        $i++;
	    }
    }
    
    $response->end("Hello World\n");
});

$http->start();
