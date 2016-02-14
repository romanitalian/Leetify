<?php

/**
 * Class LeetifyAbstract
 */
abstract class LeetifyAbstract extends Singleton implements LeetifyInterface
{
    protected $string = '';
    protected $isEncode = true;

    abstract protected function run();

    abstract protected function main();

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
     * @return mixed
     */
    public static function decode($string) {
        return static::getInstance()->setString($string)->run();
    }

}