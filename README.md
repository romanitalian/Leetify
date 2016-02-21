# Leetify

Leetify is a funny tool used to make any msgs like this: "looks like this" -> "100kz 1ik3 +hiz"

You can use composer scripts to invoke this package - Leetify.
Just add it to you composer.json:
    ...
    "require": {
        "romanitalian/leetify": "dev-master"
    }
    ...
Or after init composer - execute this:
> composer require romanitalian/leetify

```php
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
$out['LeetifySimple'][$str] = LeetifySimple::decode($str, 'latin');

$str = 'leet';
$out['LeetifySimple'][$str] = LeetifySimple::encode($str);

$str = 'looks like this';
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
      'leet' => string 'ВЈəe-|-' (length=10)
      'looks like this' => string '1Øo|(z ¬3y3|c& +I+I¡es' (length=25)
      'terry' => string '~|~[-|2|`λ' (length=11)
  'LeetifySimple' =>
    array (size=10)
      '133+' => string 'leet' (length=4)
      'leet' => string '133+' (length=4)
      'looks like this' => string '100kz 1ik3 +hiz' (length=15)
      'terry' => string '+3rrj' (length=5)
      '3ез4' => string 'eезA' (length=6)
      'жезл' => string 'жезл' (length=8)
      '«Мягкий leet — это очень весело»' => string '«Мягкий 133+ — это очень весело»' (length=56)
      'm99k11 l33t — 3t0 0ch3n v35310.' => string 'm99kll leet — etO Ochen ve5elO.' (length=33)
      'Мя4кZй 133+ — это о|-|ен' весе4о' => string 'МяAкSй leet — это о|-|ен' весеAо' (length=49)
      'Shut the fuck up, noob. I owned your ass.' => string 'Zhu+ +h3 fuck up, n00b. I 0wn3d j0ur 4zz.' (length=41)
*/

```


