<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./purchase/index.html
* Encoding      : UTF-8
* Creation Date : 2020/10/21
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 購入</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../css/style_purchase.css">
     <link rel="stylesheet" href="../css/style_button.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../js/script_num.js" charset="UTF-8"></script>
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - 購入ページ</h1>
     <form method="POST" action="./purchase_check/index.php">
            <?php
            require_once '../connect_db.php';
            view4purchase();
            ?>
        <input type="submit" value="💰購入" id="buy">
        
     </form>
     
     <p id="pageBack"><a href="../">◁購入をやめる</a></p>
     <div id="space"> </div>
 
 </body>
 </html>