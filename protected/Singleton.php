<?php

/**
 * Class Singleton
 */
class Singleton
{
    protected static $inst;

    public static function getInstance() {
        if (is_null(static::$inst)) {
            static::$inst = new static();
        }
        return static::$inst;
    }

    /**
     * For init new instance of other class (parent vs child) - we need destroy old instance class (destroy instance of singleton)
     */
    public function destroy() {
        static::$inst = null;
    }

    protected function __construct() {
    }

    private function __clone() {
    }

    private function __wakeup() {
    }
}
