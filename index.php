<?php
require_once 'protected/init.php';

$out = array();

$str = '133+';
$out['Leetify'][$str] = Leetify::decode($str);
$str = 'leet';
$out['Leetify'][$str] = Leetify::encode($str);
Leetify::getInstance()->destroy();

$str = '133+';
$out['LeetifySimple']['english'][$str] = LeetifySimple::decode($str);
$str = 'leet';
$out['LeetifySimple']['english'][$str] = LeetifySimple::encode($str);
LeetifySimple::getInstance()->destroy();

$str = '3еz4';
$out['LeetifySimple']['russian'][$str] = LeetifySimple::decode($str);
$str = 'жезл';
$out['LeetifySimple']['russian'][$str] = LeetifySimple::decode($str);

print_r($out);

//Array (
//    [Leetify] => Array (
//        [133+] => teet
//        [leet] => leet
//        )
//    [LeetifySimple] => Array (
//        [english] => Array (
//            [133+] => leet
//            [leet] => 133+
//     )
//        [russian] => Array (
//            [3еz4] => жезл
//            [жезл] => жезл
//                )
//        )
//)
