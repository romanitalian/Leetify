<?php

/**
 * Class LeetifySimple
 */
class LeetifySimple extends LeetifyAbstract
{
    protected $lang = 'en';
    private $en =   array("a", "e", "s", "S", "A", "o", "O", "t", "l", "ph", "y", "H",   "W",      "M",     "D", "V", "x");
    private $ru =   array('г', 'ж', 'з', 'и', 'л', 'п', 'р', 'у', 'ф', 'х',  'ц', 'ч',   'ш',      'щ',     'ъ', 'ы', 'ь');
    private $leet = array("4", "3", "z", "Z", "4", "0", "0", "+", "1", "f",  "j", "|-|", "\\/\\/", "|\\/|", "|)", "\\/", "><");
    private $dict;

    public static function getInstance($lang = 'en') {
        if (is_null(static::$inst)) {
            static::$inst = new static($lang);
        }
        return static::$inst;
    }

    public function setDictionaryByRegex() {
        $this->setDictionaryByLanguageCode();
        if (DetectLanguage::isRus($this->string)) {
            $this->setDictionaryByLanguageCode('ru');
        }
        return $this;
    }

    public function setDictionaryByLanguageCode($lang = 'en') {
        switch ($lang) {
            case 'ru':
                $this->dict = $this->ru;
                break;
            default:
                $this->dict = $this->en;
                break;
        }
        return $this;
    }

    public function getDictionary() {
        return $this->dict;
    }

    /**
     * Internal main method
     * @return string
     */
    protected function main() {
        $out = '';
        $this->setDictionaryByRegex();
        if ($this->isEncode) {
            $dict = $this->getDictionary();
            $leet = $this->leet;
        } else {
            $dict = $this->leet;
            $leet = $this->getDictionary();
        }
        $chars = Utils::str_split_($this->string);
        $flippedDict = array_flip($dict); // for good performance
        foreach($chars as $char) {
            $out .= isset($flippedDict[$char]) ? $leet[$flippedDict[$char]] : $char;
        }
        return $out;
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

}
