<?php
use Leet\Leetify;
use Leet\LeetifySimple;

require_once 'protected/autoload.php';

$out = array();

$str = '133+';
$out['Leetify'][$str] = Leetify::decode($str);

$str = 'leet';
$out['Leetify'][$str] = Leetify::encode($str);

$str = 'looks like this';
$out['Leetify'][$str] = Leetify::encode($str);

$str = 'terry';
$out['Leetify'][$str] = Leetify::encode($str);
Leetify::getInstance()->destroy();


$str = '133+';
$out['LeetifySimple'][$str] = LeetifySimple::decode($str);

$str = 'leet';
$out['LeetifySimple'][$str] = LeetifySimple::encode($str);

$str = 'terry';
$out['LeetifySimple'][$str] = LeetifySimple::encode($str);

$str = '3ез4';
$out['LeetifySimple'][$str] = LeetifySimple::decode($str, 'cyrillic');

$str = 'жезл';
$out['LeetifySimple'][$str] = LeetifySimple::encode($str);

$str = '«Мягкий leet — это очень весело»';
$out['LeetifySimple'][$str] = LeetifySimple::encode($str);

$str = 'm99k11 l33t — 3t0 0ch3n v35310.';
$out['LeetifySimple'][$str] = LeetifySimple::decode($str, 'cyrillic');

$str = "Мя4кZй 133+ — это о|-|ен' весе4о";
$out['LeetifySimple'][$str] = LeetifySimple::decode($str);

$str = 'Shut the fuck up, noob. I owned your ass.';
$out['LeetifySimple'][$str] = LeetifySimple::encode($str);

var_dump($out);

/*
array (size=2)
  'Leetify' =>
    array (size=4)
      '133+' => string 'teet' (length=4)
      'leet' => string '|33t' (length=4)
      'looks like this' => string 'ВЈ<>o1<§ £eye|cə †}-{][2' (length=31)
      'terry' => string '~|~|=-|2|2'/' (length=12)
  'LeetifySimple' =>
    array (size=9)
      '133+' => string 'фжжу' (length=8)
      'leet' => string '133+' (length=4)
      'terry' => string '+3rrj' (length=5)
      '3ез4' => string 'жезл' (length=8)
      'жезл' => string '3еz4' (length=5)
      '«Мягкий leet — это очень весело»' => string '«Мя4кZй 133+ — это о|-|ен' весе4о»' (length=53)
      'm99k11 l33t — 3t0 0ch3n v35310.' => string 'm99kфф lжжt — жtр рchжn vж5жфр.' (length=45)
      'Мя4кZй 133+ — это о|-|ен' весе4о' => string 'Мялкий фжжу — это о|-|ень весело' (length=57)
      'Shut the fuck up, noob. I owned your ass.' => string 'Zhu+ +h3 fuck up, n00b. I 0wn3d j0ur 4zz.' (length=41)
*/
