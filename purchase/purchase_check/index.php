<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./purchase/purchase_check/index.php
* Encoding      : UTF-8
* Creation Date : 2020/11/08
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 購入確認</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_purchased.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - 購入確認</h1>
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

     <p id="pageBack"><a type="button" onclick="history.back()">◁修正する</a></p>
 
 </body>
 </html>