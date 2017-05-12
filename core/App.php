<?php

namespace core;

/**
 * Description of App
 *
 * @author User
 */
class App
{
    public static $app;

    public function __construct() {
        self::$app = Registry::instance();
    }

}
