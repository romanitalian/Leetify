<?php

/**
 * Class Leetify
 */
class Leetify extends LeetifyBase
{
    protected $dictType = 'extended';
    protected $dictionaryPath = 'dictionary.php';

    public function getDictionaryPath() {
        return __DIR__ . DIRECTORY_SEPARATOR. $this->dictionaryPath;
    }

}
