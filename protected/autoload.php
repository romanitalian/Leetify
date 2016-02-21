<?php
spl_autoload_register('autoload');

/**
 * @param $class
 * @param null $dir
 */
function autoload($class, $dir = null) {
    if (is_null($dir)) {
        $dir = __DIR__ . DIRECTORY_SEPARATOR;
    }
    $p = explode('\\', $class);
    if(count($p) > 1) {
        $class = array_pop($p);
        $nameSpaceDir = strtolower(implode(DIRECTORY_SEPARATOR, $p));
        $dir = $dir.$nameSpaceDir.DIRECTORY_SEPARATOR;
    }
    foreach (scandir($dir) as $file) {
        if (is_dir($dir . $file) && substr($file, 0, 1) !== '.') {
            autoload($class, $dir . $file . '/');
        }
        if (substr($file, 0, 2) !== '._' && preg_match("/.php$/i", $file)) {
            if (str_replace('.php', '', $file) == $class || str_replace('.class.php', '', $file) == $class) {
                include $dir . $file;
            }
        }
    }
}
