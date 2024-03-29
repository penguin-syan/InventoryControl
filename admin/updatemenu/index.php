<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/updatemenu/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/30
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->
 <?php
	if(isset($_POST['updateMenu'])){
        require_once '../../connect_db.php';
        updateMenu();
    }

    else if(isset($_POST['deleteMenu'])){
        require_once '../../connect_db.php';
        deleteMenu();
    }
?>

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - メニュー管理</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_updatemenu.css">
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
        <h1>メニュー管理</h1>
    </header>

    <div class="header-margin"></div>

     <form method="POST" action="./editmenu/index.php">
     <?php
     require_once '../../connect_db.php';
     updateMenuOutput();
     ?>
     </form>
     
 </body>
 </html>
 