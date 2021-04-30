<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./menu/index.html
* Encoding      : UTF-8
* Creation Date : 2020/11/05
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - メニュー管理</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_updatemenu.css">
     <link rel="stylesheet" href="../../css/style_button.css"
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
     <script type="text/javascript">
        alert('開発中の画面です');
     </script>
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - メニュー管理</h1>
     <form>
     <table border="1px">
     <tr>
         <th>販売中</th>
         <th>商品画像</th>
         <th>商品名</th>
         <th>価格</th>
     </tr>
     <?php
     require_once '../../connect_db.php';
     updateMenuOutput();
     ?>
     </table>
     </form>
     
     <p id="pageTop"><a href="">↻更新</a></p>
     <p id="pageBack"><a href="../">◁戻る</a></p>
 
 </body>
 </html>