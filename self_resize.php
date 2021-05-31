<?php
/**
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./resize.php
* Encoding      : UTF-8
* Creation Date : 2021/05/30
*
* Copyright (c) 2021 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
*/

/**
 * ファイル起動時に第1引数として渡された画像を回転・リサイズする．
 */
require_once 'resize.php';

$imageFile = $argv[1];
turn($imageFile);
resize($imageFile);