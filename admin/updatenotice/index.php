<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : admin/updatenotice/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/22
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 通知変更</title>
     <meta charset="UTF-8">
     <link rel="stylesheet" href="../../css/style_header.css">
     <link rel="stylesheet" href="../../css/style_notice.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script type="text/javascript" src="../../js/script_button.js" charset="UTF-8"></script>
     <meta http-equiv="Cache-Control" content="no-cache">
     <meta name="apple-mobile-web-app-capable" content="yes">
     <!--
     <link rel="icon" href="">
     <link rel="apple-touch-icon" href="">
     <script type="text/javascript" src=""></script>
      -->
 </head>
 
 <body>
 <body oncontextmenu="return false;">
    <header class="site-header">
        <a onclick="history.back()" class="header-link">＜</a>
        <h1>お知らせ変更</h1>
    </header>

    <div class="header-margin"></div>
     <form method="POST" autocomplete="off" action="../../">
         <input type="text" maxlength="50" placeholder="新しいお知らせを入力" name="newNotice" id="newNotice">
         <input type="submit" value="決定" name="updateNotice">

         <p id="nowNotice">～現在のお知らせ～</p>
         <p>
             <?php
             echo readNotice();
             ?>
         </p>
     </form>
     
 </body>
 </html>

 <?php
    function readNotice(){
        $passfile = "./notice.txt";
        $fp = fopen($passfile, 'r');
        $notice = fgets($fp);
        fclose($fp);
        return $notice;
 }