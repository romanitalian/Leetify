<?php

/**
 * Class DetectLanguage
 */
class DetectLanguage
{
    public static function isRus($str) {
        return preg_match('/[А-Яа-яЁё]/u', $str);
    }
}