<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/checkInventory/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/23
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->
 <?php
	if(isset($_POST['updateInventory'])){
        require_once '../../connect_db.php';
        updateInventory();
    }
?>

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 在庫確認</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_menu.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../../js/script_button.js" charset="UTF-8"></script>
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
        <h1>在庫確認</h1>
        <a href="./" class="header-link" id="buy-button">🛒購入</a>
    </header>

    <div class="header-margin"></div>

    <?php
    require_once '../../connect_db.php';
    outputInventory();
    ?>
     
     <p id="pageTop"><a href="#">△上へ戻る</a></p>
     <div id="space"> </div>
 
 </body>
 </html>