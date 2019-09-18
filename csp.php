<?php

use Swoole\Coroutine as co;

$chan = new chan(1);

$producer = go(function() use ($chan) {
    while(1) {
    	$time = date('Y-m-d H:i:s', time());
    	$chan->push($time);
    	co::sleep(1);
    }
});

$consumer = go(function() use ($chan) {
	while(1) {
		$time = $chan->pop();
		echo "$time\n";
	}
});