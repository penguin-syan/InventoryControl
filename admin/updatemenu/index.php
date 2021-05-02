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
 <?php
	if(isset($_POST['updateMenu'])){
        require_once '../../connect_db.php';
        updateMenu();
    }
?>

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
 </head>
 
 <body oncontextmenu="return false;">
     <h1>人間共生システム研究室 食べ物販売 - メニュー管理</h1>
     <form method="POST" action="./editmenu/index.php">
     <?php
     require_once '../../connect_db.php';
     updateMenuOutput();
     ?>
     </form>
     
     <p id="pageBack"><a href="../">◁戻る</a></p>
     <div id="space"> </div>
 
 </body>
 </html>