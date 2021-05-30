<?php
require_once 'resize.php';

$imageFile = $argv[1];
turn($imageFile);
resize($imageFile);