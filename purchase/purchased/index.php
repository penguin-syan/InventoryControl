<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./purchase/purchased/index.html
* Encoding      : UTF-8
* Creation Date : 2020/10/22
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 購入完了</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_purchased.css">
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - 購入完了</h1>
     <h2>購入品一覧・支払い金額</h2>
     <table>
         <tr>
             <th>物品名</th>
             <th id="unitprice">単価</th>
             <th id="num">数量</th>
             <th id="subtotal">小計</th>
         </tr>
         <?php
         require_once '../../connect_db.php';
         updateInventory_buy();
         ?>
     </table>
     <form>
         <button type="button" id="bought" onclick="location.href='../../'">はじめに戻る</button>
     </form>
 
 </body>
 </html>

 <script type="text/javascript">alert('購入完了');</script>