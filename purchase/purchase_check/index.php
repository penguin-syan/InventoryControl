<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : purchase/purchase_check/index.php
* Encoding      : UTF-8
* Creation Date : 2020/11/08
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 購入確認</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_purchased.css">
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
        <h1>購入確認</h1>
        <!--<a href="./" class="header-link" id="buy-button">🛒購入</a>-->
    </header>

    <div class="header-margin"></div>

     <h2>購入確認</h2>
     <form method="POST" action="../purchased/index.php">
     <table>
         <tr>
             <th>物品名</th>
             <th id="unitprice">単価</th>
             <th id="num">数量</th>
             <th id="subtotal">小計</th>
            </tr>
            <?php
            require_once '../../connect_db.php';
            updateInventory_buycheck();
            ?>
        </table>
        <h3>注意：購入処理は完了していません．購入を決定するには，購入ボタンを押してください．</h3>
        <input type="submit" value="💰購入" id="buy">
     </form>

    </body>
 </html>