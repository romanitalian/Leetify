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
}