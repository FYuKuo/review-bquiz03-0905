<?php
include('./base.php');
$nowDate =date('Y-m-d');
$startDate =date('Y-m-d',strtotime('-2 days'));
$movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$startDate' AND '$nowDate' ORDER BY `rank`");

foreach ($movies as $key => $movie) {
    echo "<option value='{$movie['id']}'>{$movie['name']}</option>";
}
?>