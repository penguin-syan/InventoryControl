
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
     <link rel="stylesheet" href="../../css/style_button.css">
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 在庫登録</h1>
     <form method="POST" enctype="multipart/form-data" action="addmenu.php">
         <label for="itemName">商品名：</label>
         <input type="text" id="itemName" name="itemName" maxlength="12" size="15"><br>
         <label for="price">価格　：</label>
         <input type="number" id="price" name="price" min="0"><br>
         <label for="image">画像　：</label>
         <input type="file" name="upfile" size="30" id="upload"><br>
         <input type="submit" name="add" value="追加">
     </form>
     
     <p id="pageBack"><a href="../">◁戻る</a></p>
 
 </body>
 </html>