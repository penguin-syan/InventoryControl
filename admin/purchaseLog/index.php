<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/purchaseLog/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/23
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 販売履歴</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_admin.css">
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
        <h1>販売履歴</h1>
    </header>

    <div class="header-margin"></div>
 
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
 </body>
 </html>