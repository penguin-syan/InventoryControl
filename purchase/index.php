<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : purchase/index.php
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
     <title>食べ物販売 - 購入</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../css/style_header.css">
     <link rel="stylesheet" href="../css/style_purchase.css">
     <link rel="stylesheet" href="../css/style_button.css">
     <link rel="stylesheet" href="../css/style_resetIosButtonStyle.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../js/script_num.js" charset="UTF-8"></script>
     <meta http-equiv="Cache-Control" content="no-cache">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
<body oncontextmenu="return false;">
    <form method="POST" action="./purchase_check/index.php">
    <header class="site-header">
        <a href="../" class="header-link">＜</a>
        <h1>商品購入</h1>
        <a href="./purchase_check/" class="header-link" id="right-button">💰購入</a>
    </header>

    <div class="header-margin"></div>    


            <?php
            require_once '../connect_db.php';
            view4purchase();
            ?>
        <input type="submit" value="💰購入" id="buy">
        
     </form>
 </body>
 </html>