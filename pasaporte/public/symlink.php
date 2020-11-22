<?php
$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/../pasaporte/storage/app/public';
$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
symlink($targetFolder,$linkFolder);
$files1 = scandir($targetFolder);
$files2 = scandir($linkFolder);
print_r($files1);
print_r($files2);
?>