<?php


namespace Duqiang\PhpRedisStream;


class RedisStream
{

    /**
     * @var Connector
     */
    private static $connector;

    public function __construct(Connector $connector)
    {
        self::$connector = $connector;
    }

    /**
     * @param string $key
     * @param string $id
     * @param array $messages
     * @param int $maxLen
     * @param false $isApproximate
     * @return string
     */
    public function xadd(string $key,
                               string $id,
                               array $messages,
                               int $maxLen=0,
                               bool $isApproximate=false): string
    {
        return self::$connector->get()->xadd($key, $id, $messages, $maxLen, $isApproximate);
    }

    /**
     * @param string $stream
     * @return int
     */
    public function xlen(string $stream): int
    {
        return self::$connector->get()->xlen($stream);
    }

    /**
     * @param string $stream
     * @param string $start
     * @param string $end
     * @param int $count
     * @return false|string
     */
    public function xrange(string $stream, string $start, string $end, int $count=null)
    {
        if (empty($count)) {
            return json_encode(self::$connector->get()->xrange($stream, $start, $end));
        }
        return json_encode(self::$connector->get()->xrange($stream, $start, $end, $count));
    }

    public function xrevrange(string $stream, string $end, int $start,  int $count = null)
    {
        if (empty($count)) {
            return json_encode(self::$connector->get()->xrevrange($stream, $end, $start));
        }
        return json_encode(self::$connector->get()->xRevRange($stream, $end, $start, $count));
    }
}