
<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./admin/addmenu/index.html
* Encoding      : UTF-8
* Creation Date : 2020/10/29
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>
 <head>
     <title>食べ物販売 - 新規商品登録</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../../css/style_addmenu.css">
     <link rel="stylesheet" href="../../../css/style_button.css">
     <script type="text/javascript" src="../../../js/script_checkSubmit.js"></script>
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - 商品情報変更</h1>
     <form name="update" method="POST" enctype="multipart/form-data" action="../index.php" onsubmit="return checkSubmit();">
     <?php
        require_once '../../../connect_db.php';
        outputEditMenu($_POST['updateMenu']);
        echo '<label for="price">画像　　：</label>';
        echo '<input type="file" name="upfile" size="30" id="upload"><br>';
        echo '<input type="hidden" name="id_edit" value="'.$_POST['updateMenu'].'">';
        echo '<input type="submit" name="updateMenu" value="更新" onclick="update.key.value=\'updateMenu\'">';
        echo '<input type="submit" name="deleteMenu" value="削除" onclick="update.key.value=\'deleteMenu\'">';
        echo '<input type="hidden" name="key" value="">';
     ?>
     </form>
     
     <p id="pageBack"><a href="../">◁戻る</a></p>
 
 </body>
 </html>