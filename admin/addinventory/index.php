
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
     <title>食べ物販売 - 在庫管理</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_purchase.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../../js/script_num.js" charset="UTF-8"></script>
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 在庫登録</h1>
     <form method="POST">
        <table border="1px">
            <tr>
                <?php
                require_once '../../connect_db.php';
                outputAllMenu();
                ?>
            </tr>
        <input type="submit" value="↻更新" id="buy">
     </form>
     
     <p id="pageBack"><a href="../">◁購入をやめる</a></p>
 
 </body>
 </html>