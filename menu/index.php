<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./menu/index.html
* Encoding      : UTF-8
* Creation Date : 2020/10/20
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - メニュー</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../css/style_menu.css">
     <link rel="stylesheet" href="../css/style_button.css">
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - メニュー</h1>
     <!-- <table border="1px"> -->
         <?php
         require_once '../connect_db.php';
         outputMenu();
         ?>
     <!-- </table> -->
     
     <p id="pageTop"><a href="../purchase">購入画面へ進む▷</a></p>
     <p id="pageBack"><a href="../">◁戻る</a></p>
 
 </body>
 </html>