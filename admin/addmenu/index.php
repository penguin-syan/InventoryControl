<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/addmenu/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/29
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>
 <head>
     <title>食べ物販売 - 新規商品登録</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_addmenu.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <meta http-equiv="Cache-Control" content="no-cache">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
    <header class="site-header">
        <a onclick="history.back()" class="header-link">＜</a>
        <h1>在庫登録</h1>
    </header>

    <div class="header-margin"></div>

     <form method="POST" enctype="multipart/form-data" action="addmenu.php">
         <label for="itemName">商品名　：</label>
         <input type="text" id="itemName" name="itemName" maxlength="20" size="22"><br>
         <label for="category">商品分類：</label>
         <select id = "category" name="category">
         <?php
            require_once '../../connect_db.php';
            outputCategorize();
         ?>
         </select><br>
         <label for="price">価格　　：</label>
         <input type="number" id="price" name="price" min="0"><br>
         <label for="image">画像　　：</label>
         <input type="file" name="upfile" size="30" id="upload"><br>
         <input type="submit" name="add" value="追加">
     </form>
 
 </body>
 </html>