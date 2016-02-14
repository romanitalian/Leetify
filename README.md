# Leetify

Leetify is a funny tool used to make your text "looks like this" -> "|0Ø$ |eye1<|=- +(-)!2"

```php
<?php
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
$out['LeetifySimple']['english'][$str] = LeetifySimple::decode($str);

$str = 'leet';
$out['LeetifySimple']['english'][$str] = LeetifySimple::encode($str);

$str = 'terry';
$out['LeetifySimple']['english'][$str] = LeetifySimple::encode($str);
LeetifySimple::getInstance()->destroy();

$str = '3еz4';
$out['LeetifySimple']['russian'][$str] = LeetifySimple::decode($str);

$str = 'жезл';
$out['LeetifySimple']['russian'][$str] = LeetifySimple::decode($str);

print_r($out);


Array (
    [Leetify] => Array (
        [133+] => teet
        [leet] => |_€&7
        [looks like this] => |0Ø$ |eye1<|=- +(-)!2
        [terry] => †&l2|?λ
        )
    [LeetifySimple] => Array (
        [english] => Array (
            [133+] => leet
            [leet] => 133+
            [terry] => +3rrj
     )
        [russian] => Array (
            [3еz4] => жезл
            [жезл] => жезл
                )
        )
)
```