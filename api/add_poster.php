<?php
include('./base.php');
if($_FILES['img']['error'] == 0 && isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $poster['img'] = $_FILES['img']['name'];
    $poster['ani'] = rand(1,3);
    $poster['sh'] = 1;
    $poster['name'] = $_POST['name'];
    $poster['rank'] = $Poster->math('MAX','rank')+1;
    
    // dd($poster);
    $Poster->save($poster);
}

to('../back.php?do=poster');
?>