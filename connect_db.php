<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'db_info.php';

/**
 * データベース上でsqlコマンドを実行する
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

    foreach($sql as $value){
        if($value['category'] === "test") continue;
        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);

        echo "<h2>".$value['category']."</h2>";
        $count = 0;
        echo "<table border='1'><tr>";
        foreach($sql2 as $value2){
            if($value2['onsale'] == 1){
                echo '<td>'.$value2['name'].'<br><img src="../images/'.$value2['image'].'"><br>';
                if($value2['num'] > 0){
                    echo "￥".number_format($value2['price'])."</td>";
                }
                else
                    echo "<strong>SOLD OUT</strong></td>";
                $count++;
                    
                if($count % 4 == 0){
                    $count = 0;
                    echo"</tr><tr>";
                }
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
 * 取り扱い中メニューの在庫を表示する
 */
function outputInventory(){
    $sqlCommand = "select * from inventory order by id asc;";
    $sql = mysqlCommand($sqlCommand);

    $count = 0;
    echo "<tr>";
    foreach($sql as $value){
        if($value[4] == 1){
            echo '<td>'.$value[1].'<br><img src="../../images/'.$value[2].'"><br>';
            if($value[5] > 0){
                echo $value['num']."</td>";
            }
            else
                echo "<strong>SOLD OUT</strong></td>";
            $count++;
                
            if($count % 4 == 0){
                $count = 0;
                echo"</tr><tr>";
            }
        }
    }

    while($count < 4 && $count != 0){
        echo "<td></td>";
        $count++;
    }
    echo "</tr>";
}


/**
 * 販売中のメニューを表形式で販売する．
 */
function view4purchase(){
    $sqlCommand = "select * from categorize order by category_id asc;";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        if($value['category'] === 'test') continue;
        $sqlCommand2 = "select * from inventory where category_id = ".$value['category_id']." order by id asc;";
        $sql2 = mysqlCommand($sqlCommand2);
        
        echo "<h2>".$value['category']."</h2>";
        $count = 0;
        echo "<tr><table border='1'>";
        foreach($sql2 as $value2){
            if($value2['num'] > 0 && $value2['onsale'] == 1){
                echo '<td>'.$value2['name'].'<br><img src="../images/'.$value2['image'].'"><br>\\'.number_format($value2['price']).'<br>';
                echo '<input type="button" value="<" id="'.$value2['id'].'d" onclick="numDown(\''.$value2['id'].'n\');">';
                echo '<input type="number" class="inputText" value="0" id="'.$value2['id'].'n" name="'.$value2['id'].'n" min="0" max="'.$value2['num'].'">';
                echo '<input type="button" value=">" id="'.$value2['id'].'u" onclick="numUp(\''.$value2['id'].'n\');"></td>';
                $count++;
            }
            
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
 * 購入状況をDBに適用する
 */
function updateInventory_buy(){
    $sqlCommand = "select * from inventory order by id asc ;";
    $sql = mysqlCommand($sqlCommand);

    $total = 0;
    foreach($sql as $value){
        //販売中かつ残量が1以上なら，テキストボックス内の数値を確認し，1以上でupdateする．
        if($value['onsale'] == 1 && $value['num'] > 0){
            $temp = $value[0].'n';
            if((int)$_POST[$temp] != 0){
                echo '<tr><td>'.$value['name'].'</td><td class="int">\\'.number_format($value['price']).'</td><td class="int">'.$_POST[$temp].'</td><td class="int">\\'.$value['price'] * (int)$_POST[$temp].'</td></tr>';
                $total += ($value['price'] * (int)$_POST[$temp]);
                $result = mysqlCommand("update inventory set num = ".((int)$value[5] - (int)$_POST[$temp])." where id = ".$value[0].";");
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
            $temp = $value[0].'n';
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
 * 登録済みのメニューを表示する(addinventory)
 */
function outputAllMenu(){
    $sqlCommand = "select * from inventory order by id asc;";
    $sql = mysqlCommand($sqlCommand);

    $count = 0;
    echo "<tr>";
    foreach($sql as $value){
        echo '<td>'.$value[1].'<br><img src="../../images/'.$value[2].'"><br>\\'.number_format($value[3]).'<br>';
        echo '<input type="button" value="<" id="'.$value[0].'d" onclick="numDown(\''.$value[0].'n\');">';
        echo '<input type="number" class="inputText" value="'.$value['num'].'" id="'.$value[0].'n" name="'.$value[0].'n" min="0">';
        echo '<input type="button" value=">" id="'.$value[0].'u" onclick="numUp(\''.$value[0].'n\');"></td>';
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
    echo "</tr>";
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
            $temp = $value[0].'n';
            $result = mysqlCommand("update inventory set num = ".((int)$_POST[$temp])." where id = ".$value[0].";");
        }
    }
}


/**
 * 新規メニューを登録する
 */
function addNewMenu() {
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
    $sqlCommand = "insert into inventory values(0, '".$_POST['itemName']."', '".$imageFile."', ".$_POST['price'].", 1, 0);";
    $result = mysqlCommand($sqlCommand);
}

/**
 * 
 */
function updateMenuOutput(){
    $sqlCommand = "select * from inventory order by id asc;";
    $sql = mysqlCommand($sqlCommand);

    foreach($sql as $value){
        echo '<tr><td><input type="checkbox" name="'.$value['id'].'_onsale" ';
        echo $value['onsale'] == 1 ? 'checked="checked"></td>' : '></td>';
        echo '<td><img src="../../images/'.$value['image'].'"></td>';
        echo '<td id="name"><input type="text" maxlength="12" value="'.$value['name'].'"></td>';
        echo '<td id="value">\<input type="tel" value="'.number_format($value['price']).'"></td></tr>';
    }
}