<!--
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : purchase/index.php
* Encoding      : UTF-8
* Creation Date : 2020/10/21
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
 -->

 <!DOCTYPE html>

 <head>
     <title>食べ物販売 - 購入</title>
     <meta charset="UTF-8">
     <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style_header.css">
        <link rel="stylesheet" href="../css/style_catTab.css">
        <link rel="stylesheet" href="../css/style_purchase.css">
        <link rel="stylesheet" href="../css/style_button.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="../js/script_purchase.js" charset="UTF-8"></script>
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
        <h1>商品購入</h1>
    </header>

    <div class="header-margin"></div>

    <div class="area">
        <?php
        require_once '../connect_db.php';
        view4purchase();
        ?>
    </div>

    <form method="POST" action="./purchase_check/">
        <div class="right_area">
            <input type="submit" value="💰購入" id="buy" class="right-button-up">
            <h2>購入内容</h2>
            <div class="basket-item" id="basket-item-1">
                <h3>ライスバーガー（牛カルビ）</h3>
                <div class="basket-item-counter">
                    <input type="button" value="-" onclick="numDown('1n');">
                    <input type="number" value="1" id="1n" class="inputText">
                    <input type="button" value="+" onclick="numUp('1n');">
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="./purchase_check/index.php">
            <h2>test</h2><table border='1'><tr><td>test<br><img src="../images/test.png"><br>￥100<br><input type="button" value="<" id="1d" onclick="numDown('1n');"><input type="number" class="inputText" value="0" id="1n" name="1n" min="0" max="96"><input type="button" value=">" id="1u" onclick="numUp('1n');"></td><td>test2<br><img src="../images/test.png"><br>￥150<br><input type="button" value="<" id="2d" onclick="numDown('2n');"><input type="number" class="inputText" value="0" id="2n" name="2n" min="0" max="97"><input type="button" value=">" id="2u" onclick="numUp('2n');"></td><td></td><td></td></tr></table><h2>ごはん</h2><table border='1'><tr><td>お米<br><img src="../images/201023_171203.jpeg"><br>￥80<br><input type="button" value="<" id="8d" onclick="numDown('8n');"><input type="number" class="inputText" value="0" id="8n" name="8n" min="0" max="3"><input type="button" value=">" id="8u" onclick="numUp('8n');"></td><td></td><td></td><td></td></tr></table><h2>冷凍麺</h2><table border='1'><tr><td>キノコとほうれん草のパスタ<br><img src="../images/20210602-181437AA84B15B-8578-4A1D-A64F-84D3F56A49F5.jpeg"><br>￥160<br><input type="button" value="<" id="12d" onclick="numDown('12n');"><input type="number" class="inputText" value="0" id="12n" name="12n" min="0" max="2"><input type="button" value=">" id="12u" onclick="numUp('12n');"></td><td>バター醤油のパスタ<br><img src="../images/IMG_6458.jpg"><br>￥160<br><input type="button" value="<" id="15d" onclick="numDown('15n');"><input type="number" class="inputText" value="0" id="15n" name="15n" min="0" max="1"><input type="button" value=">" id="15u" onclick="numUp('15n');"></td><td>和風たらこの大盛りパスタ<br><img src="../images/20201223-165134IMG_6590.JPG"><br>￥160<br><input type="button" value="<" id="9996d" onclick="numDown('9996n');"><input type="number" class="inputText" value="0" id="9996n" name="9996n" min="0" max="3"><input type="button" value=">" id="9996u" onclick="numUp('9996n');"></td><td>カルボナーラのパスタ<br><img src="../images/20210420-13035063DC0FEA-7B54-4BCD-83B4-BA5B71FD3C43.jpeg"><br>￥160<br><input type="button" value="<" id="10010d" onclick="numDown('10010n');"><input type="number" class="inputText" value="0" id="10010n" name="10010n" min="0" max="1"><input type="button" value=">" id="10010u" onclick="numUp('10010n');"></td></tr><tr></tr></table><h2>カップ麺</h2><table border='1'><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr><td>酸辣湯麺<br><img src="../images/20210601-132517IMG_0096.JPG"><br>￥130<br><input type="button" value="<" id="10029d" onclick="numDown('10029n');"><input type="number" class="inputText" value="0" id="10029n" name="10029n" min="0" max="3"><input type="button" value=">" id="10029u" onclick="numUp('10029n');"></td><td>焼きそば<br><img src="../images/20210602-181557A202EDB8-D121-4F46-B0EB-14873F7919AA.jpeg"><br>￥110<br><input type="button" value="<" id="10031d" onclick="numDown('10031n');"><input type="number" class="inputText" value="0" id="10031n" name="10031n" min="0" max="3"><input type="button" value=">" id="10031u" onclick="numUp('10031n');"></td><td>デカうま醤油<br><img src="../images/20210623-1048361E363E2C-5124-4783-9166-45B78C471070.jpeg"><br>￥130<br><input type="button" value="<" id="10032d" onclick="numDown('10032n');"><input type="number" class="inputText" value="0" id="10032n" name="10032n" min="0" max="4"><input type="button" value=">" id="10032u" onclick="numUp('10032n');"></td><td>大盛りきつねうどん<br><img src="../images/20210714-103706IMG_0111.jpeg"><br>￥130<br><input type="button" value="<" id="10033d" onclick="numDown('10033n');"><input type="number" class="inputText" value="0" id="10033n" name="10033n" min="0" max="3"><input type="button" value=">" id="10033u" onclick="numUp('10033n');"></td></tr><tr><td>大盛りわかめラーメン<br><img src="../images/20210831-1354551A675B2F-4C18-4E61-9844-2AA0A521F204.jpeg"><br>￥100<br><input type="button" value="<" id="10037d" onclick="numDown('10037n');"><input type="number" class="inputText" value="0" id="10037n" name="10037n" min="0" max="1"><input type="button" value=">" id="10037u" onclick="numUp('10037n');"></td><td>辛ラーメン<br><img src="../images/20211224-160215AE34F6F1-563C-4ED0-984D-A69714E3919E.jpeg"><br>￥110<br><input type="button" value="<" id="10045d" onclick="numDown('10045n');"><input type="number" class="inputText" value="0" id="10045n" name="10045n" min="0" max="1"><input type="button" value=">" id="10045u" onclick="numUp('10045n');"></td><td></td><td></td></tr></table><h2>主菜</h2><table border='1'><tr><td>カレー<br><img src="../images/201023_170850.jpeg"><br>￥60<br><input type="button" value="<" id="7d" onclick="numDown('7n');"><input type="number" class="inputText" value="0" id="7n" name="7n" min="0" max="2"><input type="button" value=">" id="7u" onclick="numUp('7n');"></td><td></td><td></td><td></td></tr></table><h2>汁物</h2><table border='1'><tr></tr><tr><td>玉ねぎスープ<br><img src="../images/20201111-102809IMG_6489.jpeg"><br>￥40<br><input type="button" value="<" id="32d" onclick="numDown('32n');"><input type="number" class="inputText" value="0" id="32n" name="32n" min="0" max="10"><input type="button" value=">" id="32u" onclick="numUp('32n');"></td><td>わかめスープ<br><img src="../images/20201111-102836IMG_6490.jpeg"><br>￥30<br><input type="button" value="<" id="33d" onclick="numDown('33n');"><input type="number" class="inputText" value="0" id="33n" name="33n" min="0" max="7"><input type="button" value=">" id="33u" onclick="numUp('33n');"></td><td>コーンスープ<br><img src="../images/20201111-102903IMG_6491.jpeg"><br>￥30<br><input type="button" value="<" id="34d" onclick="numDown('34n');"><input type="number" class="inputText" value="0" id="34n" name="34n" min="0" max="8"><input type="button" value=">" id="34u" onclick="numUp('34n');"></td><td></td></tr></table><h2>お菓子</h2><table border='1'><tr></tr><tr></tr><tr><td>ポップコーン（バター醤油）<br><img src="../images/20210420-13023220851056-EBB0-4C27-8440-02B217351F27.jpeg"><br>￥80<br><input type="button" value="<" id="10009d" onclick="numDown('10009n');"><input type="number" class="inputText" value="0" id="10009n" name="10009n" min="0" max="3"><input type="button" value=">" id="10009u" onclick="numUp('10009n');"></td><td>柿の種<br><img src="../images/20210513-18341458338ACA-2659-4CDA-B08D-67ED9342693E.jpeg"><br>￥90<br><input type="button" value="<" id="10014d" onclick="numDown('10014n');"><input type="number" class="inputText" value="0" id="10014n" name="10014n" min="0" max="1"><input type="button" value=">" id="10014u" onclick="numUp('10014n');"></td><td>アーモンドチョコ<br><img src="../images/20210513-18344746535B72-49FE-469A-84DC-99E36F566700.jpeg"><br>￥170<br><input type="button" value="<" id="10015d" onclick="numDown('10015n');"><input type="number" class="inputText" value="0" id="10015n" name="10015n" min="0" max="1"><input type="button" value=">" id="10015u" onclick="numUp('10015n');"></td><td>柿の種 わさび<br><img src="../images/20210714-103823IMG_0109.jpeg"><br>￥90<br><input type="button" value="<" id="10035d" onclick="numDown('10035n');"><input type="number" class="inputText" value="0" id="10035n" name="10035n" min="0" max="2"><input type="button" value=">" id="10035u" onclick="numUp('10035n');"></td></tr><tr></tr><tr><td>ドリトス<br><img src="../images/20211130-17233979640DEC-3196-4DAB-839D-F8ECDC2ED423.jpeg"><br>￥80<br><input type="button" value="<" id="10042d" onclick="numDown('10042n');"><input type="number" class="inputText" value="0" id="10042n" name="10042n" min="0" max="1"><input type="button" value=">" id="10042u" onclick="numUp('10042n');"></td><td>ベビースター<br><img src="../images/20211130-17242850D3B956-1ECA-40A7-BA31-EEA472246869.jpeg"><br>￥90<br><input type="button" value="<" id="10043d" onclick="numDown('10043n');"><input type="number" class="inputText" value="0" id="10043n" name="10043n" min="0" max="2"><input type="button" value=">" id="10043u" onclick="numUp('10043n');"></td><td>ポップコーン大<br><img src="../images/20211224-160056B48988B7-107C-4A1A-A15D-2C70AC45635F.jpeg"><br>￥130<br><input type="button" value="<" id="10044d" onclick="numDown('10044n');"><input type="number" class="inputText" value="0" id="10044n" name="10044n" min="0" max="1"><input type="button" value=">" id="10044u" onclick="numUp('10044n');"></td><td></td></tr></table><h2>粉もの</h2><table border='1'><tr></tr><tr></tr><tr></tr></table><h2>弁当類</h2><table border='1'><tr></tr><tr></tr><tr></tr><tr></tr></table><h2>軽食</h2><table border='1'><tr></tr><tr></tr><tr></tr></table><h2>皿</h2><table border='1'><tr><td>スプーン<br><img src="../images/noimage.jpg"><br>￥10<br><input type="button" value="<" id="9990d" onclick="numDown('9990n');"><input type="number" class="inputText" value="0" id="9990n" name="9990n" min="0" max="66"><input type="button" value=">" id="9990u" onclick="numUp('9990n');"></td><td>箸<br><img src="../images/noimage.jpg"><br>￥10<br><input type="button" value="<" id="9991d" onclick="numDown('9991n');"><input type="number" class="inputText" value="0" id="9991n" name="9991n" min="0" max="32"><input type="button" value=">" id="9991u" onclick="numUp('9991n');"></td><td>平皿<br><img src="../images/noimage.jpg"><br>￥10<br><input type="button" value="<" id="9992d" onclick="numDown('9992n');"><input type="number" class="inputText" value="0" id="9992n" name="9992n" min="0" max="19"><input type="button" value=">" id="9992u" onclick="numUp('9992n');"></td><td>どんぶり<br><img src="../images/noimage.jpg"><br>￥10<br><input type="button" value="<" id="9993d" onclick="numDown('9993n');"><input type="number" class="inputText" value="0" id="9993n" name="9993n" min="0" max="46"><input type="button" value=">" id="9993u" onclick="numUp('9993n');"></td></tr><tr><td>フォーク<br><img src="../images/20210716-1724462FFE074B-99BE-4490-AE87-12F20DCAD323.jpeg"><br>￥10<br><input type="button" value="<" id="10036d" onclick="numDown('10036n');"><input type="number" class="inputText" value="0" id="10036n" name="10036n" min="0" max="44"><input type="button" value=">" id="10036u" onclick="numUp('10036n');"></td><td></td><td></td><td></td></tr></table>        <input type="submit" value="💰購入" id="buy">
        
     </form>
 </body>
 </html>