<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./admin/purchaseLog/index.html
* Encoding      : UTF-8
* Creation Date : 2020/10/23
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 販売履歴</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_admin.css">
     <link rel="stylesheet" href="../../css/style_button.css">
     <meta http-equiv="Cache-Control" content="no-cache">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - 販売履歴</h1>
     <div>
        <table border="1">
        <tr>
            <th>日時</th>
            <th>品名</th>
            <th>数量</th>
            <th>小計</th>
        </tr>
        <?php
        require_once '../../connect_db.php';
        outputLog();
        ?>
        </table>
    </div>

    <p id="pageBack"><a href="../">◁戻る</a></p>
 </body>
 </html>