<?php

namespace Leet;

/**
 * Class LeetifySimple
 */
class LeetifySimple extends Base\LeetifyBase
{
    protected $dictType = 'simple';
    protected $dictionaryPath = 'dictionary.php';

    public function getDictionaryPath() {
        return __DIR__ . DIRECTORY_SEPARATOR . $this->dictionaryPath;
    }

}
