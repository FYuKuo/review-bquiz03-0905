<?php
include('./base.php');
$session = ['14:00~16:00','16:00~18:00','18:00~20:00','20:00~22:00','22:00~24:00'];
$now = floor(date('H')/2)+1;
$start = ($now-8)+1;
// echo $now;
// // echo "<br>";
// echo $start;

if(date('Y-m-d') == $_GET['date'] && $now >= 8){

    for ($i=$start ; $i < 5; $i++) { 
        $qt = 20-($Order->math('SUM','qt',['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$session[$i]]));
        echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $qt</option>";
    }

}else{

    for ($i=0; $i < 5; $i++) { 
        $qt = 20-($Order->math('SUM','qt',['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$session[$i]]));
        echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $qt</option>";
    }
}

?>