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
   <link rel="stylesheet" href="../../css/style_resetIosButtonStyle.css">
   <script type="text/javascript" src="../../js/script_purchased.js"></script>
   <meta http-equiv="Cache-Control" content="no-cache">
   <meta name="apple-mobile-web-app-capable" content="yes">
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

   <div id="dialog">
      <div>
            <p id="msg-dialog">購入完了</p>
            <button type="button" onclick="audioPlay()" id="close-dialog">閉じる</button>
      </div>
   </div>

   <div id="dialog-bg"></div>

   <audio preload="auto" id="koharu">
      <?php
         echo '<source src="../../audio/1_0'.mt_rand(1, 6).'.mp3">';
      ?>
   </audio>

</body>
</html>