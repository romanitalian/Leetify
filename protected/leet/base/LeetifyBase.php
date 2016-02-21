<?php

namespace Leet\Base;
use Leet\Common\Singleton;
use Leet\Common\Utils;

/**
 * Class LeetifyBase
 */
abstract class LeetifyBase extends Singleton implements LeetifyInterface
{
    protected $string = '';
    protected $isEncode = true;
    protected $dictType = '';
    protected $dictionaryPath = '';
    protected $langGroup;
    protected $langGroupDefault = 'common';
    private $dict;

    abstract public function getDictionaryPath();

    /**
     * @param $string
     * @return Leetify|null
     */
    public function setString($string) {
        $this->string = $string;
        return $this;
    }

    /**
     * example: 'leetr' return '133+'
     * @param $string
     * @return mixed
     */
    public static function encode($string) {
        return static::getInstance()->setString($string)->run(true);
    }

    /**
     * example: '133+' return 'leet'
     * @param $string
     * @param null $langGroup
     * @return mixed
     */
    public static function decode($string, $langGroup = null) {
        return static::getInstance()->setLangGroup($langGroup)->setString($string)->run();
    }

    public function setLangGroup($langGroup) {
        $this->langGroup = $langGroup;
        return $this;
    }

    /**
     * @return array
     */
    public function getDictionary() {
        if (empty($this->dict)) {
            $path = $this->getDictionaryPath();
            $dict = Utils::inc($path);
            if (!empty($dict)) {
                if (isset($dict[$this->dictType][$this->langGroup])) {
                    $this->dict = $dict[$this->dictType][$this->langGroup];
                } else {
                    if(isset($dict[$this->dictType])) {
                        $this->dict = isset($dict[$this->dictType][$this->langGroupDefault])
                            ? $dict[$this->dictType][$this->langGroupDefault]
                            : $dict[$this->dictType];
                    } else {
                        $this->dict = $dict;
                    }
                }
            }
        }
        return $this->dict;
    }

    /**
     * @param bool|false $isEncode
     * @return string
     */
    protected function run($isEncode = false) {
        $out = '';
        if ($this->string) {
            $this->isEncode = $isEncode;
            $out = $this->main();
        }
        return $out;
    }

    /**
     * Internal main method
     * @return string
     */
    protected function main() {
        $out = '';
        $dict = $this->getDictionary();
        if(!empty($dict)) {
            $chars = Utils::str_split_($this->string);
            if ($this->isEncode) {
                foreach($chars as $char) {
                    if (isset($dict[$char])) {
                        $cnt = count($dict[$char]);
                        $randomIndex = $cnt > 1 ? rand(0, $cnt) : 0;
                        $c = isset($dict[$char][$randomIndex]) ? $dict[$char][$randomIndex] : $char;
                        $c = Utils::upperCharByEnotherChar($c, $char);
                    } else {
                        $c = $char;
                    }
                    $out .= $c;
                }
            } else {
                $tt = '';
                foreach($chars as $char) {
                    foreach ($dict as $charDict => $rowDict) {
                        if (in_array($char, $rowDict, true)) {
                            $tt = $charDict;
                        }
                    }
                    if ($tt) {
                        $out .= $tt;
                    } else {
                        $out .= $char;
                    }
                    $tt = '';
                }
            }
        }
        return $out;
    }
}