<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./admin/checkInventory/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/23
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 在庫確認</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_menu.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../../js/script_button.js" charset="UTF-8"></script>
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - 在庫確認</h1>
     <table border="1px">
         <?php
         require_once '../../connect_db.php';
         outputInventory();
         ?>
     </table>
     
     <p id="pageTop"><a href="#">△上へ戻る</a></p>
     <p id="pageBack"><a href="../">◁戻る</a></p>
 
 </body>
 </html>