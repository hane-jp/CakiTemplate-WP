<?php

$path_parts = pathinfo($_SERVER['REQUEST_URI']);

$dirAry = explode("/", $path_parts['dirname']);
$mydir = implode(" ", $dirAry);
$filename = $path_parts['filename'];

?>