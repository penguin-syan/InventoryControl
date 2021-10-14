<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : resize.php
* Encoding      : UTF-8
* Creation Date : 2021/05/30
*
* Copyright (c) 2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

<?php
/**
 * 画像のサイズを変更する
 * @param String $imageFile サイズを変更する画像のファイル名
 */
function resize($imageFile){
    list($width, $height) = getimagesize($imageFile);
    $baseImage = "";
    
    if(exif_imagetype($imageFile) == IMAGETYPE_JPEG)
        $baseImage = imagecreatefromjpeg($imageFile);
    else if(exif_imagetype($imageFile) == IMAGETYPE_PNG)
        $baseImage = imagecreatefrompng($imageFile);
    $image = imagecreatetruecolor(512, 512);
    
    imagecopyresampled($image, $baseImage, 0, 0, 0, 0, 512, 512, $width, $height);
    
    if(exif_imagetype($imageFile) == IMAGETYPE_JPEG)
        imagejpeg($image, $imageFile);
    else if(exif_imagetype($imageFile) == IMAGETYPE_PNG)
        imagepng($image, $imageFile);

    imagedestroy($baseImage);
    imagedestroy($image);
}


/**
 * Exifタグのデータをもとに画像を回転する
 * @param String $imageFile 回転する画像のファイル名
 */
function turn($imageFile){
    $exif_data = exif_read_data($imageFile);
    $baseImage = "";

    if(exif_imagetype($imageFile) == IMAGETYPE_JPEG)
        $baseImage = imagecreatefromjpeg($imageFile);
    else if(exif_imagetype($imageFile) == IMAGETYPE_PNG)
        $baseImage = imagecreatefrompng($imageFile);

    $dgrees = 0;
    switch($exif_data['Orientation']){
        case 2:
            $mode = IMG_FLIP_HORIZONTAL;
            break;
        case 3:
            $dgrees = 180;
            break;
        case 4:
            $mode = IMG_FLIP_VERTICAL;
            break;
        case 5:
            $dgrees = 270;
            $mode = IMG_FLIP_HORIZONTAL;
            break;
        case 6:
            $dgrees = 270;
            break;
        case 7:
            $dgrees = 80;
            $mode = IMG_FLIP_HORIZONTAL;
            break;
        case 8:
            $dgrees = 90;
            break;
    }

    if(isset($mode))
        $baseImage = imageflip($baseImage, $mode);

    if($dgrees > 0)
        $baseImage = imagerotate($baseImage, $dgrees, 0);

    if(exif_imagetype($imageFile) == IMAGETYPE_JPEG)
        imagejpeg($baseImage, $imageFile);
    else if(exif_imagetype($imageFile) == IMAGETYPE_PNG)
        imagepng($baseImage, $imageFile);

    imagedestroy($baseImage);
}