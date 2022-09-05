<?php
$date = ['2022-09-05','2022-09-04','2022-09-03'];
for ($i=1; $i < 10; $i++) { 
    $type = rand(1,4);
    $num = rand(0,2);
    echo("INSERT INTO `movie`(`name`, `date`, `time`, `img`, `movie`, `pub`, `dir`, `intro`, `type`, `sh`, `rank`) VALUES ('院線片$i','{$date[$num]}','90','03B0$i.png','03B0{$i}v.mp4','院線片$i 發行商','院線片$i 導演','院線片$i 介紹簡介','$type','1','$i');");
}

?>