<?php
header('Content-Type: text/html; charset=UTF-8');

/**
 * データベース上でsqlコマンドを実行する
 */
function mysqlCommand($sqlCommand){
    require_once 'db_info.php';
    
    $db = new PDO($DB_info, $DB_id, $DB_pass);
    $sql = $db->prepare($sqlCommand);
    $sql->execute();

    return $sql;
}


/**
 * 取り扱い中のメニューを表示する
 */
function outputMenu(){
    $sqlCommand = "select * from inventory;";
    $sql = mysqlCommand($sqlCommand);

    $count = 0;
    echo "<tr>";
    foreach($sql as $value){
        if($value[4] == 1){
            echo '<td>'.$value[1].'<br><img src="../images/'.$value[2].'"><br>';
            if($value[5] > 0){
                echo "\\".number_format($value[3])."</td>";
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
 * 取り扱い中メニューの在庫を表示する
 */
function outputInventory(){
    $sqlCommand = "select * from inventory;";
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
    $sqlCommand = "select * from inventory;";
    $sql = mysqlCommand($sqlCommand);

    $count = 0;
    echo "<tr>";
    foreach($sql as $value){
        if($value[5] > 0 && $value[4] == 1){
            echo '<td>'.$value[1].'<br><img src="../images/'.$value[2].'"><br>\\'.number_format($value[3]).'<br>';
            echo '<input type="button" value="<" id="'.$value[0].'d" onclick="numDown(\''.$value[0].'n\');">';
            echo '<input type="number" class="inputText" value="0" id="'.$value[0].'n" name="'.$value[0].'n" min="0" max="'.$value[5].'">';
            echo '<input type="button" value=">" id="'.$value[0].'u" onclick="numUp(\''.$value[0].'n\');"></td>';
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
    echo "</tr>";
}


/**
 * 購入状況をDBに適用する
 */
function updateInventory(){
    $sqlCommand = "select * from inventory;";
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
    $sqlCommand = "select * from inventory;";
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
 * 新規メニューを登録する
 */
// function addNewMenu() {
//     $image = uniqid(mt_rand(), true);
//     $image .= '.'.substr(strrchr($_FILES['image']['name'], '.'), 1);
//     $file = "images/$image";
//     $sqlCommand = "insert into inventory values(0, 'name', );";
// }