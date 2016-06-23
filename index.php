<?php

function _autoload($class){
    require 'classes' . DIRECTORY_SEPARATOR . $class . '.Class.php';
}

spl_autoload_register('_autoload');
$path = null;
$path = $_GET['go_to']?? null;
$open = $_GET['open']?? null;
$file_read = null;
if ($path != null){
    chdir($path);
    $new_path = getcwd();
    $dir = new FileManager($new_path);
} else {
    $path = getcwd();
    $dir = new FileManager($path);
}

if ($open != null){
    $file_read = new File($open);
}

$up_button = $dir->getDir('..');
$reload_button = $dir->getDir('.');


require 'templates' . DIRECTORY_SEPARATOR . 'main.php';