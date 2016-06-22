<?php
require 'FileManager.php';
$path = null;
$path = $_GET['go_to']?? null;
unset($_GET);
if ($path != null){
    chdir($path);
    $new_path = getcwd();
    $dir = new FileManager($new_path);
} else {
    $path = getcwd();
    $dir = new FileManager($path);
}
$up_button = $dir->getDir('..');
$reload_button = $dir->getDir('.');


require 'main.php';