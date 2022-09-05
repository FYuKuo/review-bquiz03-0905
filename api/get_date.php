<?php
include('./base.php');
$movie = $Movie->find($_GET['movie']);
$num = 3-((strtotime(date('Y-m-d'))-strtotime($movie['date']))/60/60/24);

for ($i=0; $i < $num; $i++) { 
    $date = date('Y-m-d',strtotime("+$i days"));
    $dateFront = date('m月d日 l',strtotime("+$i days"));
    
    
    echo "<option value='$date'>$dateFront</option>";
}

?>