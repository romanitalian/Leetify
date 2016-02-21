<?php

/**
 * Class LeetifySimple
 */
class LeetifySimple extends LeetifyBase
{
    protected $dictType = 'simple';
    protected $dictionaryPath = 'dictionary.php';

    public function getDictionaryPath() {
        return __DIR__ . DIRECTORY_SEPARATOR . $this->dictionaryPath;
    }

}
