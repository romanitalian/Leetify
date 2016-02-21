<?php

/**
 * Class Utils
 */
class Utils
{
    public static function str_split_($str) {
        $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
        return $chars;
    }

    /**
     * Return
     * @param string $c
     * @param string $char
     * @return string
     */
    public static function upperCharByEnotherChar($c = '', $char = '') {
        if(mb_strlen($char) > 1) {
            // not throw new Exception but get first char
            $chars = Utils::str_split_($char);
            $char = isset($chars[0]) ? $chars[0] : '';
        }
        return $char && ctype_upper($char) ? mb_strtoupper($c) : $c;
    }

    public static function inc($path) {
        $t = file_exists($path) && is_readable($path) ? include $path : null;
        return $t;
    }
}