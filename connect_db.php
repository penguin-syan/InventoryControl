<?php
/**
*=============================================================
* Project Name  : penguin-syan/InventoryControl
* File Name     : connect_db.php
* Encoding      : UTF-8
*
* Copyright (c) 2020-2021 penguin_syan. All rights reserved.
*
* Released under the MIT license
* see https://opensource.org/licenses/MIT
*=============================================================
*/
header('Content-Type: text/html; charset=UTF-8');
require_once '/home/penguin/secure/hsslab/db_info.php';

/**
 * データベース上でsqlコマンドを実行する
 * @param String $sqlCommand データベース上で実行するSQLコマンド
 */
function mysqlCommand($sqlCommand){
    extract($GLOBALS);
    
    $db = new PDO($DB_info, $DB_id, $DB_pass);
    $sql = $db->prepare($sqlCommand);
    $sql->execute();

    return $sql;
}


/**
 * 取り扱い中のメニューを表示する
 */
function outputMenu(){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    $rad_count = 0;
    foreach($sql as $value){
        $passfile = "../admin/setting.txt";
        $fp = fopen($passfile, 'r');
        $debug = fgets($fp);
        fclose($fp);

        if($debug == 0){
            if($value['category'] === "test") continue;
        }

        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);

        if($rad_count == 0)
            echo '<input type="radio" name="cat_tab" id="tab_'.$value['category'].'" checked>';
        else
            echo '<input type="radio" name="cat_tab" id="tab_'.$value['category'].'">';
        echo '<label class="category_tab" for="tab_'.$value['category'].'">'.$value['category'].'</label>';
        echo '<div class="menu_class">';
        
        $count = 0;
        foreach($sql2 as $value2){
            if($value2['onsale'] == 1){
                echo '<div class="menu_item">';
                echo '<img src="../images/'.$value2['image'].'">';
                echo '<div><h2>'.$value2['name'].'</h2>';
                if($value2['num'] > 0){
                    echo '<h3>￥'.number_format($value2['price']).'</h3></div></div>';
                }
                else
                    echo "<h3><strong>SOLD OUT</strong></h3></div></div>";
                $count ++;

                if($count % 3 == 0)
                    $count = 0;
            }
        }
        while($count < 3 && $count != 0){
            echo '<div class="menu_item_space"></div>';
            $count++;
        }
        echo '</div>';
        $rad_count ++;
    }

}


/**
 * 取り扱い中メニューの在庫を表示する
 */
function outputInventory(){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    $rad_count = 0;
    foreach($sql as $value){
        $passfile = "../setting.txt";
        $fp = fopen($passfile, 'r');
        $debug = fgets($fp);
        fclose($fp);

        if($debug == 0){
            if($value['category'] === "test") continue;
        }

        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);

        if($rad_count == 0)
            echo '<input type="radio" name="cat_tab" id="tab_'.$value['category'].'" checked>';
        else
            echo '<input type="radio" name="cat_tab" id="tab_'.$value['category'].'">';
        echo '<label class="category_tab" for="tab_'.$value['category'].'">'.$value['category'].'</label>';
        echo '<div class="menu_class">';
        
        $count = 0;
        foreach($sql2 as $value2){
            if($value2['onsale'] == 1){
                echo '<div class="menu_item">';
                echo '<img src="../../images/'.$value2['image'].'">';
                echo '<div><h2>'.$value2['name'].'</h2>';
                if($value2['num'] > 0){
                    echo '<h3>残り：'.number_format($value2['num']).'</h3></div></div>';
                }
                else
                    echo "<h3><strong>SOLD OUT</strong></h3></div></div>";
                $count ++;

                if($count % 4 == 0)
                    $count = 0;
            }
        }
        while($count < 4 && $count != 0){
            echo '<div class="menu_item_space"></div>';
            $count++;
        }
        echo '</div>';
        $rad_count ++;
    }

}


/**
 * 販売中のメニューを表形式で販売する．
 */
function view4purchase(){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    $rad_count = 0;
    foreach($sql as $value){
        $passfile = "../admin/setting.txt";
        $fp = fopen($passfile, 'r');
        $debug = fgets($fp);
        fclose($fp);

        if($debug == 0){
            if($value['category'] === "test") continue;
        }
        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);
        
        if($rad_count == 0)
            echo '<input type="radio" name="cat_tab" id="tab_'.$value['category'].'" checked>';
        else
            echo '<input type="radio" name="cat_tab" id="tab_'.$value['category'].'">';
        echo '<label class="category_tab" for="tab_'.$value['category'].'">'.$value['category'].'</label>';
        echo '<div class="menu_class">';

        $count = 0;
        foreach($sql2 as $value2){
            if($value2['num'] > 0 && $value2['onsale'] == 1){
                echo '<div class="menu_item" onclick="addItem('.$value2['id'].', \''.$value2['name'].'\', '. $value2['num'] .');">';
                echo '<img src="../images/'.$value2['image'].'">';
                echo '<div>';
                echo '<h2>'.$value2['name'].'</h2>';
                echo '<h3>￥'.$value2['price'].'</h3>';
                echo '</div>';
                echo '</div>';
                $count++;
            }
            
            if($count % 2 == 0){
                $count = 0;
            }
        }
    
        while($count == 1){
            echo '<div class="menu_item_space"></div>';
            $count++;
        }
        echo "</div>";
        $rad_count ++;
    }

}


/**
 * 購入状況をDBに適用する
 */
function updateInventory_buy(){
    $sqlCommand = "select * from inventory order by id asc ;";
    $sql = mysqlCommand($sqlCommand);

    $total = 0;
    foreach($sql as $value){
        //販売中かつ残量が1以上なら，テキストボックス内の数値を確認し，1以上でupdateする．
        if($value['onsale'] == 1 && $value['num'] > 0){
            $temp = $value['id'].'n';
            if((int)$_POST[$temp] != 0){
                echo '<tr><td>'.$value['name'].'</td><td class="int">\\'.number_format($value['price']).'</td><td class="int">'.$_POST[$temp].'</td><td class="int">\\'.$value['price'] * (int)$_POST[$temp].'</td></tr>';
                $total += ($value['price'] * (int)$_POST[$temp]);
                $result = mysqlCommand("update inventory set num = ".((int)$value['num'] - (int)$_POST[$temp])." where id = ".$value['id'].";");
                $result = mysqlCommand("insert into purchaseLog values('".date("Y/m/d H:i:s")."', '".$value['name']."', ".(int)$_POST[$temp].", ".((int)$value['price'] * (int)$_POST[$temp]).");");
            }
        }
    }
    echo '<tr><th>合計（支払う金額）</th><th colspan="3" class="int">\\'.number_format($total).'</th></tr>';
}


/**
 * 購入確認
 */
function updateInventory_buycheck(){
    $sqlCommand = "select * from inventory order by id asc;";
    $sql = mysqlCommand($sqlCommand);

    $total = 0;
    foreach($sql as $value){
        //販売中かつ残量が1以上なら，テキストボックス内の数値を確認し，1以上でupdateする．
        if($value['onsale'] == 1 && $value['num'] > 0){
            $temp = $value['id'].'n';
            if((int)$_POST[$temp] != 0){
                echo '<tr><td>'.$value['name'].'</td><td class="int">\\'.number_format($value['price']).'</td><td class="int">'.$_POST[$temp].'</td><td class="int">\\'.$value['price'] * (int)$_POST[$temp].'</td></tr>';
                echo '<input type="hidden" name="'.$temp.'" value="'.$_POST[$temp].'">';
                $total += ($value['price'] * (int)$_POST[$temp]);
            }
        }
    }
    echo '<tr><th>合計（支払う金額）</th><th colspan="3" class="int">\\'.number_format($total).'</th></tr>';
}


/**
 * 販売ログを表示する
 */
function outputLog(){
    $sqlCommand = "select * from purchaseLog";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        echo "<tr>";
        for($i = 0; $i < 4; $i++){
            echo "<td>".$value[$i]."</td>";
        }
        echo "</tr>";
    }
}


/**
 * 在庫登録用画面を表示する(addinventory)
 */
function outputAllMenu(){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        $passfile = "../setting.txt";
        $fp = fopen($passfile, 'r');
        $debug = fgets($fp);
        fclose($fp);

        if($debug == 0){
            if($value['category'] === "test") continue;
        }

        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." and onsale = 1 order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);

        echo "<h2>".$value['category']."</h2>";
        $count = 0;
        echo "<table border='1'><tr>";
        foreach($sql2 as $value2){
            echo '<td>'.$value2['name'].'<br><img src="../../images/'.$value2['image'].'"><br>\\'.number_format($value2['price']).'<br>';
            echo '<input type="button" value="<" id="'.$value2['id'].'d" onclick="numDown(\''.$value2['id'].'n\');">';
            echo '<input type="number" class="inputText" value="'.$value2['num'].'" id="'.$value2['id'].'n" name="'.$value2['id'].'n" min="0">';
            echo '<input type="button" value=">" id="'.$value2['id'].'u" onclick="numUp(\''.$value2['id'].'n\');"></td>';
            $count++;
            
            if($count % 4 == 0){
                $count = 0;
                echo"</tr><tr>";
            }
        }
    
        while($count < 4 && $count != 0){
            echo "<td></td>";
            $count++;
        }
        echo "</tr></table>";
    }
}

/**
 * 在庫状況をDBに適用する
 */
function updateInventory(){
    $sqlCommand = "select * from inventory order by id asc;";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        //販売中なら，テキストボックス内の数値を確認しupdateする．
        if($value['onsale'] == 1){
            $temp = $value['id'].'n';
            $result = mysqlCommand("update inventory set num = ".((int)$_POST[$temp])." where id = ".$value['id'].";");
        }
    }
}


/**
 * 新規メニューを登録する
 */
function addNewMenu() {
    //画像ファイルのアップロード
    if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
        $imageFile = date("Ymd-His").$_FILES['upfile']['name'];
        if (move_uploaded_file ($_FILES["upfile"]["tmp_name"], "../../images/".$imageFile)) {
           chmod("../../images/".$imageFile, 0644);
           echo "メニューを追加しました．";
       } else {
           echo "ファイルをアップロードできません。";
           return;
       }
    } else {
        echo "ファイルが選択されていません。";
        return;
    }

    //DBへの登録
    $sqlCommand = "insert into inventory values(0, ".$_POST['category'].", '".$_POST['itemName']."', '".$imageFile."', ".$_POST['price'].", 1, 0);";
    $result = mysqlCommand($sqlCommand);

    require_once 'resize.php';
    turn("../../images/".$imageFile);
    resize("../../images/".$imageFile);
}


/**
 * 新規メニュー登録時のカテゴリを表示
 */
function outputCategorize() {
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        echo "<option value='".$value['category_id']."'>".$value['category']."</option>";
    }
}

/**
 * 商品情報の更新用に，すべての商品の一覧を表示する
 */
function updateMenuOutput(){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        $passfile = "../setting.txt";
        $fp = fopen($passfile, 'r');
        $debug = fgets($fp);
        fclose($fp);

        if($debug == 0){
            if($value['category'] === "test") continue;
        }

        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);

        echo "<h2>".$value['category']."</h2>";
        echo "<table border='1'><tr><th width='10%'>販売中</th><th>商品画像</th><th width='55%'>商品名</th><th width='15%'>価格</th><th width='5%'>操作</th></tr>";
        foreach($sql2 as $value2){
            echo $value2['onsale'] == 1 ? '<tr><td>○</td>' : '<tr><td>×</td>';
            echo '<td><img src="../../images/'.$value2['image'].'"></td>';
            echo '<td>'.$value2['name'].'</td>';
            echo '<td>￥'.number_format($value2['price']).'</td>';
            echo '<td><button type="submit" name="updateMenu" value="'.$value2['id'].'">編集</button></td></tr>';
        }
        echo "</table>";
    }

}


/**
 * 商品情報の更新用ページを表示する
 * @param int $id 情報を更新する商品のid
 */
function outputEditMenu($id){
    $sqlCommand = "select * from inventory where id = ".$id.";";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        echo '<label for="onsale">販売中　：</label>';
        echo '<select id="onsale" name="onsale">';
        outputOnsale($id);
        echo '</select><br>';
        echo '<label for="itemName">商品名　：</label>';
        echo '<input type="text" id="itemName" name="itemName" maxlength="20" size="22" value='.$value['name'].'><br>';
        echo '<label for="category">商品分類：</label>';
        echo '<select id="category" name="category">';
        outputEditCategorize($id);
        echo '</select><br>';
        echo '<label for="price">価格　　：</label>';
        echo '<input type="number" id="price" name="price" min="0" value='.$value['price'].'><br>';
    }
}


/**
 * 商品の販売状況を表示する
 * @param int $id 表示する商品のid
 * @see outputEditMenu()
 */
function outputOnsale($id){
    $sqlCommand = "select * from inventory where id = ".$id.";";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        if($value['onsale'] == 1)
            echo "<option value='1' selected>販売中</option><option value='0'>販売休止</option>";
        else
            echo "<option value='1'>販売中</option><option value='0' selected>販売休止</option>";
    }
}


/**
 * 商品の分類をドロップダウンリストで表示する
 * @param int $id 表示する商品のid
 * @see outputEditMenu()
 */
function outputEditCategorize($id){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sqlCommand2 = "select category_id from inventory where id = ".$id.";";
    $sql = mysqlCommand($sqlCommand);
    $sql2 = mysqlCommand($sqlCommand2);

    foreach($sql2 as $value2){
        foreach($sql as $value){
            if($value2['category_id'] == $value['category_id'])
                echo "<option value='".$value['category_id']."' selected>".$value['category']."</option>";
            else
                echo "<option value='".$value['category_id']."'>".$value['category']."</option>";
        }
    }
}


/**
 * 商品情報の更新
 */
function updateMenu(){
    //画像ファイルのアップロード
    if (is_uploaded_file($_FILES["upfile"]["tmp_name"])) {
        $imageFile = date("Ymd-His").$_FILES['upfile']['name'];
        if (move_uploaded_file ($_FILES["upfile"]["tmp_name"], "../../images/".$imageFile)) {
           chmod("../../images/".$imageFile, 0644);
           require_once 'resize.php';
           turn("../../images/".$imageFile);
           resize("../../images/".$imageFile);

           $sqlCommand = "select image from inventory where id = ".$_POST['id_edit'].";";
           $result = mysqlCommand($sqlCommand);
           foreach($result as $value){
               unlink("../../images/".$value['image']);
           }

           $sqlCommand = "update inventory set image = '".$imageFile."' where id = ".$_POST['id_edit'].";";
           $result = mysqlCommand($sqlCommand);
        } else {
           echo "ファイルをアップロードできません。";
           return;
        }
    }

    //商品情報の更新内容をDBに反映
    $sqlCommand = "update inventory set onsale = ".$_POST['onsale'].", name = '".$_POST['itemName']."', category_id = ".$_POST['category'].", price = ".$_POST['price']." where id = ".$_POST['id_edit'].";";
    $result = mysqlCommand($sqlCommand);
}


/**
 * 商品の削除
 */
function deleteMenu(){
    $sqlCommand = "select image from inventory where id = ".$_POST['id_edit'].";";
    $result = mysqlCommand($sqlCommand);
    foreach($result as $value){
        unlink("../../images/".$value['image']);
    }
    
    $sqlCommand = "delete from inventory where id = ".$_POST['id_edit'].";";
    $result = mysqlCommand($sqlCommand);
}
