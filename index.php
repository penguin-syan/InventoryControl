<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : ./index.html
* Encoding      : UTF-8
* Creation Date : 2020/10/20
*
* Copyright (c) 2020 YutoMitsuta. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

<?php
	if(isset($_POST['updateNotice'])){
	updateNotice();
}

function updateNotice(){
	$passfile = "./admin/updatenotice/notice.txt";
	$fp = fopen($passfile, 'w');
	fwrite($fp, $_POST['newNotice']);
	fclose($fp);
}
?>

<!DOCTYPE html>

<head>
	<title>食べ物販売 - TOP</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/style_top.css">
	<link rel="stylesheet" href="./css/style_adminButton.css">
	<link rel="stylesheet" href="./css/style_resetIosButtonStyle.css">
	<link rel="apple-touch-icon" href="./images/apple-touch-icon.png">
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="apple-mobile-web-app-capable" content="yes">

	<!--
	<link rel="icon" href="">
	<link rel="apple-touch-icon" href="">
	<script src=""></script>
	 -->
</head>

<body oncontextmenu="return false;">
	<h1>人間共生システム研究室 食べ物販売 - トップ</h1>
	<div class="github">
		<a class="github-button" href="https://github.com/penguin-syan/InventoryControl" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star penguin-syan/InventoryControl on GitHub">Star</a>
		<a class="github-button" href="https://github.com/penguin-syan/InventoryControl/issues" data-icon="octicon-issue-opened" data-size="large" data-show-count="true" aria-label="Issue penguin-syan/InventoryControl on GitHub">Issue</a>
	</div>

	<table border="0" bgcolor="#006A00" cellpadding="5" cellspacing="0" style="border:thick ridge maroon;width:540;height:20;">
		<tr>
			<td>
				<font face="富士ポップ" size="3" color="#FFFFFF"><marquee width="520" scrollamount="4" truespeed="20">
					<?php
					$passfile = "./admin/updatenotice/notice.txt";
					$fp = fopen($passfile, 'r');
					echo fgets($fp);
					fclose($fp);
					?>
				</marquee></font>
			</td>
		</tr>
	</table>
	
	<div class="divform">
		<form>
			<button type="button" id="menu" class="button" onclick="location.href='./menu'"><img src="./images/menu.png"><br>メニュー</button>
			<button type="button" id="purchase" class="button" onclick="location.href='./purchase'"><img src="./images/purchase.png"><br>購入</button>
			<button type="button" id="admin" class="button" onclick="location.href='./admin'" disabled><img src="./images/admin_s.png" id="admin_image"><br>管理</button>
		</form>
	</div>

	<input type="button" id="leftTop" value="左上のボタン">
	<input type="button" id="rightBottom" value="右下のボタン">
    <input type="button" id="leftBottom" value="左下のボタン">
	
	<script type="text/javascript" src="./js/script_adminCommand.js"></script>
</body>
</html>
