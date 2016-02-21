<?php

namespace Leet\Base;

/**
 * Interface LeetifyInterface
 */
Interface LeetifyInterface
{

    public function setString($string);

    public static function encode($string);

    public static function decode($string);

}