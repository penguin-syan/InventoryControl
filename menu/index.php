<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : menu/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/20
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - メニュー</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../css/style_header.css">
     <link rel="stylesheet" href="../css/style_catTab.css">
     <link rel="stylesheet" href="../css/style_menu.css">
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
            <a href="../" class="header-link">＜</a>
            <h1>メニュー</h1>
            <a href="../purchase/" class="header-link" id="right-button">🛒購入</a>
        </header>

        <div class="header-margin"></div>

        <div class="area">
            <?php
            require_once '../connect_db.php';
            outputMenu();
            ?>
        </div>
    <div id="space"></div>
 
 </body>
 </html>