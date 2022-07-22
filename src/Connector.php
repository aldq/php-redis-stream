<?php

namespace Duqiang\PhpRedisStream;

use Redis;

class Connector
{
    /**
     * @var Redis
     */
    private static $connection;
    public function __construct($host, $port, $timeout)
    {
        self::$connection = new Redis();
        self::$connection->connect($host, $port, $timeout);
        self::$connection->auth('test');
    }

    public function get(): Redis
    {
        return self::$connection;
    }
}
