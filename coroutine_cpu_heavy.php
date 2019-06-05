<?php

use Swoole\Coroutine as co;

$flag = 1;

$id = go(function() use (&$flag){
    $id = co::getUid();
    echo "start coro $id\n";
    $i = 0;
    while ($flag) {
        $i++;
    }
    echo "coro 1 can exit\n";
});

go(function () use (&$flag) {
	$id = co::getUid();
    echo "start coro $id\n";
    echo "coro 2 set flag = false\n";
    $flag = false;
});

Swoole\Event::wait();
