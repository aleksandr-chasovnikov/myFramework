<?php


namespace libs;

/**
 * Description of Cache
 *
 */
class Cache
{
    public function __construct()
    {}

    public function set($key, $data, $seconds = 3600)
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        if (file_put_contents($filename, $content)) {

        }
    }

    public function get()
    {}

}
