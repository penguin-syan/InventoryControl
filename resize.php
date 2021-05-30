<?php
$imageFile = $argv[1];

list($width, $height) = getimagesize($imageFile);
$baseImage = "";
if(exif_imagetype($imageFile) == IMAGETYPE_JPEG)
    $baseImage = imagecreatefromjpeg($imageFile);
else if(exif_imagetype($imageFile) == IMAGETYPE_PNG)
    $baseImage = imagecreatefrompng($imageFile);
$image = imagecreatetruecolor(512, 512);

imagecopyresampled($image, $baseImage, 0, 0, 0, 0, 512, 512, $width, $height);

imagejpeg($image, $imageFile);