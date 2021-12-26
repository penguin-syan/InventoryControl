<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/addinventory/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/21
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 在庫管理</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_purchase.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <link rel="stylesheet" href="../../css/style_resetIosButtonStyle.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../../js/script_num.js" charset="UTF-8"></script>
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
        <a href="./" class="header-link" id="right-button">---</a>
    </header>

    <div class="header-margin"></div>

     <form method="POST" action="../checkInventory/index.php">
        <?php
        require_once '../../connect_db.php';
        outputAllMenu();
        ?>
        <input type="submit" value="↻更新" id="buy" name="updateInventory">
     </form>
 
 </body>
 </html>