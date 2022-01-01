<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/21
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->
<?php
if(isset($_POST['debugsave'])){
	updateDebug();
}

function updateDebug(){
	$passfile = "./setting.txt";
	$fp = fopen($passfile, 'w');
	fwrite($fp, $_POST['debugMode']);
	fclose($fp);
}
?>

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 管理</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../css/style_header.css">
     <link rel="stylesheet" href="../css/style_admin.css">
     <link rel="stylesheet" href="../css/style_button.css">
     <link rel="stylesheet" href="../css/style_resetIosButtonStyle.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../js/script_button.js" charset="UTF-8"></script>
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
        <a href="../" class="header-link">＜</a>
        <h1>管理画面</h1>
    </header>

    <div class="header-margin"></div>

    <div>
        <form id="toggle" method="POST">
            <select id="debugMode" name="debugMode">
            <?php
            $passfile = "./setting.txt";
            $fp = fopen($passfile, 'r');
            $debug = fgets($fp);
            fclose($fp);

            if($debug == 1)
                echo "<option value='1' selected>デバッグモード有効</option><option value='0'>デバッグモード無効</option>";
            else
                echo "<option value='1'>デバッグモード有効</option><option value='0' selected>デバッグモード無効</option>";
            ?>
            </select>
            <input type="submit" id="debugsave" name="debugsave" value="保存">
        </form>
    </div>

    <form>
        <button type="button" class="button_u" onclick="location.href='./addmenu'">新商品追加</button>
        <button type="button" class="button_u" onclick="location.href='./updatemenu'">商品管理</button>
        <button type="button" class="button_u" onclick="location.href='./addinventory'">在庫登録</button>
        <button type="button" class="button" onclick="location.href='./checkInventory'">在庫確認</button>
        <button type="button" class="button" onclick="location.href='./purchaseLog'">販売履歴</button>
        <button type="button" class="button" onclick="location.href='./updatenotice'">お知らせ変更</button>
    </form>
</body>
</html>