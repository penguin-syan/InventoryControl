<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/addmenu/addmenu.php
* Encoding      : UTF-8
* Creation Date : 2020/11/04
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

<?php
require_once '../../connect_db.php';
addNewMenu();
?>

<form>
<button type="button" class="button" onclick="location.href='../../'">はじめに戻る</button><br>
<button type="button" class="button" onclick="location.href='./index.php'">次の商品を追加する</button>
</form>