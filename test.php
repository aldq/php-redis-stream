<?php

require_once __DIR__ . '/vendor/autoload.php';

use Duqiang\PhpRedisStream\Connector;
use Duqiang\PhpRedisStream\RedisStream;

$Connector = new Connector('127.0.0.1', '6379', 1);

$redis_stream = new RedisStream($Connector);
$add = $redis_stream->xadd('mystream', '*', ['hello', 'world']);
var_dump($add);
$t1 = $redis_stream->xrevrange('mystream', '1658475236000', '+');
var_dump($t1);