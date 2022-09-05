<?php
include('./base.php');
if($_FILES['img']['error'] == 0 && isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
if($_FILES['movie']['error'] == 0 && isset($_FILES['movie']['tmp_name'])){
    move_uploaded_file($_FILES['movie']['tmp_name'],'../upload/'.$_FILES['movie']['name']);
    $_POST['movie'] = $_FILES['movie']['name'];
}


$_POST['sh'] = 1;
$_POST['rank'] = $Movie->math('MAX','rank')+1;
$_POST['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);

$Movie->save($_POST);
to('../back.php?do=movie');
?>